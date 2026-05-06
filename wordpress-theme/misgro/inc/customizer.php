<?php
/**
 * Customizer Setup
 *
 * Adds custom sections and controls to the WordPress Customizer
 * for managing site logo, contact info, social media, and footer text.
 */

function misgro_customize_register( $wp_customize ) {

	// ══════════════ LOGO SECTION ══════════════
	$wp_customize->add_section( 'misgro_logo_section', array(
		'title'       => 'Site Logo',
		'description' => 'Manage your site logo',
		'priority'    => 30,
	) );

	$wp_customize->add_setting( 'misgro_logo', array(
		'type'              => 'theme_mod',
		'default'           => get_template_directory_uri() . '/img/misgro.png',
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'refresh',
	) );

	$wp_customize->add_control(
		new WP_Customize_Image_Control( $wp_customize, 'misgro_logo', array(
			'label'       => 'Logo Image',
			'description' => 'Upload or select your site logo',
			'section'     => 'misgro_logo_section',
			'settings'    => 'misgro_logo',
		) )
	);

	// ══════════════ CONTACT INFORMATION SECTION ══════════════
	$wp_customize->add_section( 'misgro_contact_section', array(
		'title'       => 'Contact Information',
		'description' => 'Manage contact details displayed in footer and contact page',
		'priority'    => 31,
	) );

	// Phone Number
	$wp_customize->add_setting( 'misgro_phone', array(
		'default'           => '+1 (212) 555-0190',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'misgro_phone', array(
		'type'        => 'text',
		'label'       => 'Phone Number',
		'description' => 'Your business phone number',
		'section'     => 'misgro_contact_section',
	) );

	// Email Address
	$wp_customize->add_setting( 'misgro_email', array(
		'default'           => 'hello@misgro.com',
		'sanitize_callback' => 'sanitize_email',
	) );

	$wp_customize->add_control( 'misgro_email', array(
		'type'        => 'email',
		'label'       => 'Email Address',
		'description' => 'Your business email',
		'section'     => 'misgro_contact_section',
	) );

	// Business Address
	$wp_customize->add_setting( 'misgro_address', array(
		'default'           => '123 Business Street, New York, NY 10001',
		'sanitize_callback' => 'sanitize_textarea_field',
	) );

	$wp_customize->add_control( 'misgro_address', array(
		'type'        => 'textarea',
		'label'       => 'Business Address',
		'description' => 'Your office address',
		'section'     => 'misgro_contact_section',
	) );

	// ══════════════ SOCIAL MEDIA SECTION ══════════════
	$wp_customize->add_section( 'misgro_social_section', array(
		'title'       => 'Social Media',
		'description' => 'Add your social media links',
		'priority'    => 32,
	) );

	$social_platforms = array(
		'facebook'  => 'Facebook',
		'twitter'   => 'Twitter / X',
		'linkedin'  => 'LinkedIn',
		'instagram' => 'Instagram',
		'youtube'   => 'YouTube',
		'tiktok'    => 'TikTok',
	);

	foreach ( $social_platforms as $key => $label ) {
		$wp_customize->add_setting( 'misgro_social_' . $key, array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		) );

		$wp_customize->add_control( 'misgro_social_' . $key, array(
			'type'        => 'url',
			'label'       => $label . ' URL',
			'description' => 'Leave blank to hide',
			'section'     => 'misgro_social_section',
		) );
	}

	// ══════════════ FOOTER SECTION ══════════════
	$wp_customize->add_section( 'misgro_footer_section', array(
		'title'       => 'Footer',
		'description' => 'Manage footer content and copyright',
		'priority'    => 33,
	) );

	// Footer Text/Description
	$wp_customize->add_setting( 'misgro_footer_text', array(
		'default'           => 'We\'re a data-driven digital marketing agency obsessed with your growth.',
		'sanitize_callback' => 'sanitize_textarea_field',
	) );

	$wp_customize->add_control( 'misgro_footer_text', array(
		'type'        => 'textarea',
		'label'       => 'Footer Description',
		'description' => 'Short company description in footer',
		'section'     => 'misgro_footer_section',
	) );

	// Copyright Text
	$wp_customize->add_setting( 'misgro_copyright', array(
		'default'           => '© ' . date( 'Y' ) . ' MISGRO. All rights reserved.',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'misgro_copyright', array(
		'type'        => 'text',
		'label'       => 'Copyright Text',
		'description' => 'Displayed at the bottom of footer',
		'section'     => 'misgro_footer_section',
	) );

	// Footer Links Heading
	$wp_customize->add_setting( 'misgro_footer_links_heading', array(
		'default'           => 'Quick Links',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'misgro_footer_links_heading', array(
		'type'        => 'text',
		'label'       => 'Footer Links Section Heading',
		'description' => 'Title for the links column in footer',
		'section'     => 'misgro_footer_section',
	) );

}

add_action( 'customize_register', 'misgro_customize_register' );

/**
 * Helper function to get customizer values with proper defaults
 */
function misgro_get_option( $option_name ) {
	$defaults = array(
		'misgro_logo'                 => get_template_directory_uri() . '/img/misgro.png',
		'misgro_phone'                => '+1 (212) 555-0190',
		'misgro_email'                => get_option( 'admin_email' ),
		'misgro_address'              => '123 Business Street, New York, NY 10001',
		'misgro_footer_text'          => 'We\'re a data-driven digital marketing agency obsessed with your growth.',
		'misgro_copyright'            => '© ' . date( 'Y' ) . ' MISGRO. All rights reserved.',
		'misgro_footer_links_heading' => 'Quick Links',
	);

	$value = get_theme_mod( $option_name );

	if ( ! empty( $value ) ) {
		return $value;
	}

	return isset( $defaults[ $option_name ] ) ? $defaults[ $option_name ] : '';
}

/**
 * Save customizer values to database on publish
 */
function misgro_customize_save( $wp_customize ) {
	// Customizer automatically saves values
}

add_action( 'customize_save_after', 'misgro_customize_save' );
