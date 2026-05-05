<?php
/**
 * Contact Form Handler
 *
 * Processes contact form submissions via AJAX and sends email notifications
 * to the website owner and confirmation emails to the user.
 */

/**
 * AJAX handler for contact form submission
 */
function misgro_handle_contact_form() {
	// Check nonce for security
	if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], 'misgro_contact_nonce' ) ) {
		wp_send_json_error( array( 'message' => 'Security check failed.' ) );
	}

	// Sanitize input data
	$name = isset( $_POST['name'] ) ? sanitize_text_field( $_POST['name'] ) : '';
	$email = isset( $_POST['email'] ) ? sanitize_email( $_POST['email'] ) : '';
	$phone = isset( $_POST['phone'] ) ? sanitize_text_field( $_POST['phone'] ) : '';
	$subject = isset( $_POST['subject'] ) ? sanitize_text_field( $_POST['subject'] ) : '';
	$message = isset( $_POST['message'] ) ? sanitize_textarea_field( $_POST['message'] ) : '';

	// Validate required fields
	$errors = array();
	if ( empty( $name ) ) {
		$errors[] = 'Name is required.';
	}
	if ( empty( $email ) || ! is_email( $email ) ) {
		$errors[] = 'Valid email is required.';
	}
	if ( empty( $subject ) ) {
		$errors[] = 'Subject is required.';
	}
	if ( empty( $message ) ) {
		$errors[] = 'Message is required.';
	}

	if ( ! empty( $errors ) ) {
		wp_send_json_error( array( 'message' => implode( ' ', $errors ) ) );
	}

	// Get admin email from customizer or WordPress settings
	$admin_email = misgro_get_option( 'misgro_email' );
	if ( empty( $admin_email ) ) {
		$admin_email = get_option( 'admin_email' );
	}

	// Prepare email to admin
	$admin_subject = 'New Contact Form Submission: ' . $subject;
	$admin_message = misgro_format_admin_email( $name, $email, $phone, $subject, $message );
	$admin_headers = array( 'Content-Type: text/html; charset=UTF-8' );

	// Send email to admin
	$admin_sent = wp_mail( $admin_email, $admin_subject, $admin_message, $admin_headers );

	// Prepare confirmation email to user
	$user_subject = 'We Received Your Message - ' . get_bloginfo( 'name' );
	$user_message = misgro_format_user_email( $name, $subject );
	$user_headers = array( 'Content-Type: text/html; charset=UTF-8' );

	// Send confirmation email to user
	$user_sent = wp_mail( $email, $user_subject, $user_message, $user_headers );

	if ( $admin_sent ) {
		// Log the submission if desired (optional)
		misgro_log_contact_submission( $name, $email, $phone, $subject, $message );
		wp_send_json_success( array( 'message' => 'Message sent successfully!' ) );
	} else {
		wp_send_json_error( array( 'message' => 'Failed to send email. Please try again.' ) );
	}
}
add_action( 'wp_ajax_misgro_contact_form', 'misgro_handle_contact_form' );
add_action( 'wp_ajax_nopriv_misgro_contact_form', 'misgro_handle_contact_form' );

/**
 * Format admin notification email
 */
function misgro_format_admin_email( $name, $email, $phone, $subject, $message ) {
	$site_name = get_bloginfo( 'name' );
	$site_url = get_bloginfo( 'url' );

	$html = '
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="UTF-8">
		<style>
			body { font-family: Arial, sans-serif; color: #333; }
			.container { max-width: 600px; margin: 0 auto; padding: 20px; background: #f9f9f9; }
			.header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px; border-radius: 8px 8px 0 0; }
			.content { background: white; padding: 20px; border-radius: 0 0 8px 8px; }
			.field { margin-bottom: 15px; }
			.label { font-weight: bold; color: #667eea; }
			.value { padding: 10px; background: #f5f5f5; border-radius: 4px; margin-top: 5px; }
			.footer { margin-top: 20px; padding-top: 15px; border-top: 1px solid #ddd; font-size: 12px; color: #888; }
		</style>
	</head>
	<body>
		<div class="container">
			<div class="header">
				<h2 style="margin: 0;">New Contact Form Submission</h2>
			</div>
			<div class="content">
				<p>You have received a new message from your website contact form.</p>

				<div class="field">
					<div class="label">Name:</div>
					<div class="value">' . esc_html( $name ) . '</div>
				</div>

				<div class="field">
					<div class="label">Email:</div>
					<div class="value"><a href="mailto:' . esc_attr( $email ) . '">' . esc_html( $email ) . '</a></div>
				</div>';

	if ( ! empty( $phone ) ) {
		$html .= '
				<div class="field">
					<div class="label">Phone:</div>
					<div class="value"><a href="tel:' . esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ) . '">' . esc_html( $phone ) . '</a></div>
				</div>';
	}

	$html .= '
				<div class="field">
					<div class="label">Subject:</div>
					<div class="value">' . esc_html( $subject ) . '</div>
				</div>

				<div class="field">
					<div class="label">Message:</div>
					<div class="value" style="white-space: pre-wrap; line-height: 1.6;">' . esc_html( $message ) . '</div>
				</div>

				<div class="footer">
					<p><strong>Submitted from:</strong> ' . esc_html( $site_name ) . '</p>
					<p><strong>Website:</strong> <a href="' . esc_url( $site_url ) . '">' . esc_html( $site_url ) . '</a></p>
					<p>This is an automated email. Please do not reply directly to this email.</p>
				</div>
			</div>
		</div>
	</body>
	</html>';

	return $html;
}

/**
 * Format user confirmation email
 */
function misgro_format_user_email( $name, $subject ) {
	$site_name = get_bloginfo( 'name' );
	$site_url = get_bloginfo( 'url' );
	$support_email = misgro_get_option( 'misgro_email' );
	if ( empty( $support_email ) ) {
		$support_email = get_option( 'admin_email' );
	}

	$html = '
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="UTF-8">
		<style>
			body { font-family: Arial, sans-serif; color: #333; }
			.container { max-width: 600px; margin: 0 auto; padding: 20px; background: #f9f9f9; }
			.header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px; border-radius: 8px 8px 0 0; text-align: center; }
			.content { background: white; padding: 20px; border-radius: 0 0 8px 8px; }
			.footer { margin-top: 20px; padding-top: 15px; border-top: 1px solid #ddd; font-size: 12px; color: #888; }
			.cta { margin: 20px 0; }
			.cta a { display: inline-block; padding: 12px 24px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; text-decoration: none; border-radius: 4px; }
		</style>
	</head>
	<body>
		<div class="container">
			<div class="header">
				<h2 style="margin: 0;">Message Received!</h2>
			</div>
			<div class="content">
				<p>Hi ' . esc_html( $name ) . ',</p>

				<p>Thank you for contacting us about <strong>' . esc_html( $subject ) . '</strong>. We have received your message and appreciate you reaching out.</p>

				<p>A member of our team will review your message and get back to you within one business day. We look forward to speaking with you!</p>

				<div class="cta">
					<a href="' . esc_url( $site_url ) . '">Visit Our Website</a>
				</div>

				<p><strong>What to expect next:</strong></p>
				<ul>
					<li>One of our team members will review your inquiry</li>
					<li>We\'ll send you a personalized response within 24 hours</li>
					<li>If appropriate, we may suggest scheduling a discovery call</li>
				</ul>

				<p>If you have any urgent matters, feel free to call us or email us directly at <a href="mailto:' . esc_attr( $support_email ) . '">' . esc_html( $support_email ) . '</a></p>

				<div class="footer">
					<p>Best regards,<br><strong>' . esc_html( $site_name ) . ' Team</strong></p>
					<p>This is an automated confirmation email. Your message is safe with us.</p>
				</div>
			</div>
		</div>
	</body>
	</html>';

	return $html;
}

/**
 * Optional: Log contact submissions to database
 * (useful for keeping track of all submissions in WordPress)
 */
function misgro_log_contact_submission( $name, $email, $phone, $subject, $message ) {
	global $wpdb;

	$table_name = $wpdb->prefix . 'misgro_contact_submissions';

	// Create table if it doesn't exist
	if ( $wpdb->get_var( "SHOW TABLES LIKE '$table_name'" ) !== $table_name ) {
		$charset_collate = $wpdb->get_charset_collate();
		$sql = "CREATE TABLE $table_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			submitted_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
			name varchar(255) NOT NULL,
			email varchar(255) NOT NULL,
			phone varchar(20),
			subject varchar(255) NOT NULL,
			message longtext NOT NULL,
			PRIMARY KEY  (id)
		) $charset_collate;";

		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		dbDelta( $sql );
	}

	// Insert submission
	$wpdb->insert(
		$table_name,
		array(
			'name'    => $name,
			'email'   => $email,
			'phone'   => $phone,
			'subject' => $subject,
			'message' => $message,
		),
		array( '%s', '%s', '%s', '%s', '%s' )
	);
}
