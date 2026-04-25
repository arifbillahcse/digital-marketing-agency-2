<?php
/**
 * MISGRO theme functions and definitions.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'MISGRO_VERSION' ) ) {
	define( 'MISGRO_VERSION', '1.0.0' );
}

/**
 * Theme setup.
 */
function misgro_setup() {
	load_theme_textdomain( 'misgro', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo', array(
		'height'      => 80,
		'width'       => 240,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'style',
		'script',
	) );
	add_theme_support( 'responsive-embeds' );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'misgro' ),
		'footer_services' => __( 'Footer — Services', 'misgro' ),
		'footer_company'  => __( 'Footer — Company', 'misgro' ),
		'footer_legal'    => __( 'Footer — Legal', 'misgro' ),
	) );
}
add_action( 'after_setup_theme', 'misgro_setup' );

/**
 * Enqueue scripts and styles.
 */
function misgro_enqueue_assets() {
	// Google Fonts.
	wp_enqueue_style(
		'misgro-google-fonts',
		'https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap',
		array(),
		null
	);

	// Font Awesome.
	wp_enqueue_style(
		'misgro-fontawesome',
		'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css',
		array(),
		'6.6.0'
	);

	// Theme stylesheet (root).
	wp_enqueue_style(
		'misgro-style',
		get_stylesheet_uri(),
		array(),
		MISGRO_VERSION
	);

	// Main visual stylesheet.
	wp_enqueue_style(
		'misgro-main',
		get_template_directory_uri() . '/assets/css/styles.css',
		array( 'misgro-style' ),
		MISGRO_VERSION
	);

	// Main JS.
	wp_enqueue_script(
		'misgro-app',
		get_template_directory_uri() . '/assets/js/app.js',
		array(),
		MISGRO_VERSION,
		true
	);

	// Pass AJAX URL + nonce to JS for the contact form.
	wp_localize_script(
		'misgro-app',
		'misgroAjax',
		array(
			'url'   => admin_url( 'admin-ajax.php' ),
			'nonce' => wp_create_nonce( 'misgro_contact_nonce' ),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'misgro_enqueue_assets' );

/**
 * Helper: render the primary menu, falling back to a hand-coded list
 * so the site looks correct before the user assigns a menu in WP admin.
 */
function misgro_primary_menu( $extra_class = '' ) {
	if ( has_nav_menu( 'primary' ) ) {
		wp_nav_menu( array(
			'theme_location' => 'primary',
			'container'      => false,
			'menu_class'     => trim( 'nav-l ' . $extra_class ),
			'depth'          => 2,
			'fallback_cb'    => false,
		) );
		return;
	}

	$current = misgro_current_slug();
	$items = array(
		'home'           => array( 'label' => 'Home',          'url' => home_url( '/' ) ),
		'services'       => array( 'label' => 'Services',      'url' => home_url( '/services/' ) ),
		'about'          => array( 'label' => 'About',         'url' => home_url( '/about/' ) ),
		'why-choose-us'  => array( 'label' => 'Why Choose Us', 'url' => home_url( '/why-choose-us/' ) ),
		'portfolio'      => array( 'label' => 'Portfolio',     'url' => home_url( '/portfolio/' ) ),
		'contact'        => array( 'label' => 'Contact',       'url' => home_url( '/contact/' ) ),
	);

	echo '<ul class="nav-l ' . esc_attr( $extra_class ) . '">';
	foreach ( $items as $slug => $item ) {
		$active = ( $slug === $current ) ? ' class="act"' : '';
		printf(
			'<li><a href="%s"%s>%s</a></li>',
			esc_url( $item['url'] ),
			$active,
			esc_html( $item['label'] )
		);
	}
	echo '</ul>';
}

/**
 * Helper: render the mobile menu links.
 */
function misgro_mobile_menu_links() {
	if ( has_nav_menu( 'primary' ) ) {
		wp_nav_menu( array(
			'theme_location' => 'primary',
			'container'      => false,
			'items_wrap'     => '%3$s',
			'depth'          => 1,
			'walker'         => new Misgro_Mobile_Walker(),
			'fallback_cb'    => false,
		) );
		return;
	}

	$items = array(
		array( 'Home',          home_url( '/' ) ),
		array( 'Services',      home_url( '/services/' ) ),
		array( 'About',         home_url( '/about/' ) ),
		array( 'Why Choose Us', home_url( '/why-choose-us/' ) ),
		array( 'Portfolio',     home_url( '/portfolio/' ) ),
		array( 'Contact',       home_url( '/contact/' ) ),
	);
	foreach ( $items as $item ) {
		printf(
			'<a href="%s" onclick="closeMob()">%s</a>',
			esc_url( $item[1] ),
			esc_html( $item[0] )
		);
	}
}

/**
 * Helper: detect a "current page" slug for active-link styling.
 */
function misgro_current_slug() {
	if ( is_front_page() || is_home() ) {
		return 'home';
	}
	if ( is_page() ) {
		$post = get_queried_object();
		if ( $post && isset( $post->post_name ) ) {
			return $post->post_name;
		}
	}
	return '';
}

/**
 * Helper: pretty URL for a known site page slug.
 */
function misgro_url( $slug ) {
	if ( 'home' === $slug ) {
		return home_url( '/' );
	}
	$page = get_page_by_path( $slug );
	if ( $page ) {
		return get_permalink( $page );
	}
	return home_url( '/' . $slug . '/' );
}

/**
 * Mobile-menu walker — outputs raw <a> tags with the closeMob() handler.
 */
class Misgro_Mobile_Walker extends Walker_Nav_Menu {
	public function start_lvl( &$output, $depth = 0, $args = null ) {}
	public function end_lvl( &$output, $depth = 0, $args = null ) {}
	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$output .= sprintf(
			'<a href="%s" onclick="closeMob()">%s</a>',
			esc_url( $item->url ),
			esc_html( $item->title )
		);
	}
	public function end_el( &$output, $item, $depth = 0, $args = null ) {}
}

/**
 * AJAX handler: replaces the original send_mail.php endpoint.
 */
function misgro_handle_contact_form() {
	$nonce = isset( $_POST['nonce'] ) ? sanitize_text_field( wp_unslash( $_POST['nonce'] ) ) : '';
	if ( ! wp_verify_nonce( $nonce, 'misgro_contact_nonce' ) ) {
		wp_send_json( array( 'success' => false, 'message' => 'Security check failed.' ) );
	}

	$name    = isset( $_POST['name'] )    ? sanitize_text_field( wp_unslash( $_POST['name'] ) )    : '';
	$email   = isset( $_POST['email'] )   ? sanitize_email( wp_unslash( $_POST['email'] ) )         : '';
	$phone   = isset( $_POST['phone'] )   ? sanitize_text_field( wp_unslash( $_POST['phone'] ) )    : '';
	$subject = isset( $_POST['subject'] ) ? sanitize_text_field( wp_unslash( $_POST['subject'] ) )  : '';
	$message = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

	if ( '' === $name ) {
		wp_send_json( array( 'success' => false, 'message' => 'Name is required.' ) );
	}
	if ( ! is_email( $email ) ) {
		wp_send_json( array( 'success' => false, 'message' => 'Valid email is required.' ) );
	}
	if ( '' === $subject ) {
		wp_send_json( array( 'success' => false, 'message' => 'Subject is required.' ) );
	}
	if ( strlen( $message ) < 5 ) {
		wp_send_json( array( 'success' => false, 'message' => 'Message is too short.' ) );
	}

	$to = get_option( 'admin_email' );
	$contact_email = get_theme_mod( 'misgro_contact_email', 'contact@misgro.com' );
	if ( $contact_email && is_email( $contact_email ) ) {
		$to = $contact_email;
	}

	$headers = array(
		'From: ' . $name . ' <' . $email . '>',
		'Reply-To: ' . $email,
		'Content-Type: text/plain; charset=UTF-8',
	);

	$body  = "You have a new message from the MISGRO website contact form.\n\n";
	$body .= "Name:    {$name}\n";
	$body .= "Email:   {$email}\n";
	if ( $phone ) {
		$body .= "Phone:   {$phone}\n";
	}
	$body .= "Subject: {$subject}\n\n";
	$body .= "Message:\n{$message}\n";

	$sent = wp_mail( $to, 'New Contact: ' . $subject, $body, $headers );

	wp_send_json( array(
		'success' => (bool) $sent,
		'message' => $sent ? 'Message sent successfully.' : 'Mail failed. Please try again.',
	) );
}
add_action( 'wp_ajax_misgro_contact', 'misgro_handle_contact_form' );
add_action( 'wp_ajax_nopriv_misgro_contact', 'misgro_handle_contact_form' );

/**
 * Customizer: site contact details used by the templates.
 */
function misgro_customize_register( $wp_customize ) {
	$wp_customize->add_section( 'misgro_contact', array(
		'title'    => __( 'MISGRO Contact Details', 'misgro' ),
		'priority' => 30,
	) );

	$wp_customize->add_setting( 'misgro_contact_email', array(
		'default'           => 'contact@misgro.com',
		'sanitize_callback' => 'sanitize_email',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'misgro_contact_email', array(
		'label'   => __( 'Contact Email', 'misgro' ),
		'section' => 'misgro_contact',
		'type'    => 'email',
	) );

	$wp_customize->add_setting( 'misgro_contact_phone', array(
		'default'           => '+1 (212) 555-0190',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'misgro_contact_phone', array(
		'label'   => __( 'Contact Phone', 'misgro' ),
		'section' => 'misgro_contact',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'misgro_contact_address', array(
		'default'           => "340 Park Ave, Suite 400\nNew York, NY 10022",
		'sanitize_callback' => 'sanitize_textarea_field',
	) );
	$wp_customize->add_control( 'misgro_contact_address', array(
		'label'   => __( 'Office Address', 'misgro' ),
		'section' => 'misgro_contact',
		'type'    => 'textarea',
	) );
}
add_action( 'customize_register', 'misgro_customize_register' );

/**
 * Convenience getter for theme mods.
 */
function misgro_get_contact( $key, $default = '' ) {
	$map = array(
		'email'   => array( 'misgro_contact_email',   'contact@misgro.com' ),
		'phone'   => array( 'misgro_contact_phone',   '+1 (212) 555-0190' ),
		'address' => array( 'misgro_contact_address', "340 Park Ave, Suite 400\nNew York, NY 10022" ),
	);
	if ( ! isset( $map[ $key ] ) ) {
		return $default;
	}
	return get_theme_mod( $map[ $key ][0], $map[ $key ][1] );
}

/**
 * Auto-create the standard pages when the theme is activated, so the user
 * gets a working site without having to manually create each page.
 */
function misgro_create_default_pages() {
	$pages = array(
		'home'          => 'Home',
		'about'         => 'About',
		'services'      => 'Services',
		'portfolio'     => 'Portfolio',
		'contact'       => 'Contact',
		'why-choose-us' => 'Why Choose Us',
	);

	foreach ( $pages as $slug => $title ) {
		if ( ! get_page_by_path( $slug ) ) {
			wp_insert_post( array(
				'post_title'   => $title,
				'post_name'    => $slug,
				'post_status'  => 'publish',
				'post_type'    => 'page',
				'post_content' => '',
			) );
		}
	}

	// Set Home as the static front page.
	$home = get_page_by_path( 'home' );
	if ( $home ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $home->ID );
	}
}
add_action( 'after_switch_theme', 'misgro_create_default_pages' );
