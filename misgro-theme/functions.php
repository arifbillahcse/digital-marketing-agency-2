<?php
/**
 * Misgro theme functions and definitions.
 *
 * @package Misgro
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'MISGRO_VERSION' ) ) {
	define( 'MISGRO_VERSION', '1.0.0' );
}

/**
 * Theme setup: supports, menus, image sizes.
 */
function misgro_setup() {
	load_theme_textdomain( 'misgro', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo', array(
		'height'      => 60,
		'width'       => 200,
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
	add_theme_support( 'align-wide' );

	register_nav_menus( array(
		'primary'         => __( 'Primary Menu', 'misgro' ),
		'mobile'          => __( 'Mobile Menu', 'misgro' ),
		'footer-services' => __( 'Footer — Services', 'misgro' ),
		'footer-company'  => __( 'Footer — Company', 'misgro' ),
		'footer-contact'  => __( 'Footer — Contact', 'misgro' ),
	) );
}
add_action( 'after_setup_theme', 'misgro_setup' );

/**
 * Enqueue styles and scripts.
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
		'misgro-font-awesome',
		'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css',
		array(),
		'6.6.0'
	);

	// Required theme stylesheet (style.css at theme root).
	wp_enqueue_style(
		'misgro-style',
		get_stylesheet_uri(),
		array(),
		MISGRO_VERSION
	);

	// Main theme stylesheet.
	wp_enqueue_style(
		'misgro-main',
		get_template_directory_uri() . '/assets/styles.css',
		array( 'misgro-style' ),
		MISGRO_VERSION
	);

	// Theme JavaScript.
	wp_enqueue_script(
		'misgro-app',
		get_template_directory_uri() . '/assets/app.js',
		array(),
		MISGRO_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'misgro_enqueue_assets' );

/**
 * Preconnect hints for Google Fonts.
 */
function misgro_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type && wp_style_is( 'misgro-google-fonts', 'enqueued' ) ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
		$urls[] = array(
			'href' => 'https://fonts.googleapis.com',
		);
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'misgro_resource_hints', 10, 2 );

/**
 * Add the legacy "act" class to the active anchor in the primary menu so the
 * existing CSS can keep highlighting the current page without modification.
 */
function misgro_nav_active_class( $atts, $item, $args ) {
	if ( ! empty( $args->theme_location ) && in_array( $args->theme_location, array( 'primary', 'mobile' ), true ) ) {
		if ( in_array( 'current-menu-item', (array) $item->classes, true )
			|| in_array( 'current_page_item', (array) $item->classes, true )
			|| in_array( 'current-menu-ancestor', (array) $item->classes, true ) ) {
			$existing       = isset( $atts['class'] ) ? $atts['class'] : '';
			$atts['class']  = trim( $existing . ' act' );
		}
	}
	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'misgro_nav_active_class', 10, 3 );

/**
 * Fallback menu used until the user assigns a real menu in Appearance → Menus.
 * Mirrors the original static markup so the design works out of the box.
 */
function misgro_default_primary_menu() {
	$current = '';
	if ( is_front_page() || is_home() ) {
		$current = 'home';
	} elseif ( is_page() ) {
		$slug = get_post_field( 'post_name', get_queried_object_id() );
		$current = $slug;
	}

	$items = array(
		'home'           => array( 'label' => __( 'Home', 'misgro' ),           'url' => home_url( '/' ) ),
		'services'       => array( 'label' => __( 'Services', 'misgro' ),       'url' => home_url( '/services/' ) ),
		'about'          => array( 'label' => __( 'About', 'misgro' ),          'url' => home_url( '/about/' ) ),
		'why-choose-us'  => array( 'label' => __( 'Why Choose Us', 'misgro' ),  'url' => home_url( '/why-choose-us/' ) ),
		'portfolio'      => array( 'label' => __( 'Portfolio', 'misgro' ),      'url' => home_url( '/portfolio/' ) ),
		'contact'        => array( 'label' => __( 'Contact', 'misgro' ),        'url' => home_url( '/contact/' ) ),
	);

	echo '<ul class="nav-l">';
	foreach ( $items as $key => $item ) {
		$class = ( $key === $current ) ? ' class="act"' : '';
		printf(
			'<li><a href="%s"%s>%s</a></li>',
			esc_url( $item['url'] ),
			$class,
			esc_html( $item['label'] )
		);
	}
	echo '</ul>';
}

/**
 * Fallback mobile menu.
 */
function misgro_default_mobile_menu() {
	$items = array(
		array( 'label' => __( 'Home', 'misgro' ),          'url' => home_url( '/' ) ),
		array( 'label' => __( 'Services', 'misgro' ),      'url' => home_url( '/services/' ) ),
		array( 'label' => __( 'About', 'misgro' ),         'url' => home_url( '/about/' ) ),
		array( 'label' => __( 'Why Choose Us', 'misgro' ), 'url' => home_url( '/why-choose-us/' ) ),
		array( 'label' => __( 'Portfolio', 'misgro' ),     'url' => home_url( '/portfolio/' ) ),
		array( 'label' => __( 'Contact', 'misgro' ),       'url' => home_url( '/contact/' ) ),
	);

	foreach ( $items as $item ) {
		printf(
			'<a href="%s" onclick="closeMob()">%s</a>',
			esc_url( $item['url'] ),
			esc_html( $item['label'] )
		);
	}
}

/**
 * Helper that returns the URL of the site logo, falling back to the bundled
 * misgro.png if no custom logo has been set.
 */
function misgro_logo_url() {
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	if ( $custom_logo_id ) {
		$src = wp_get_attachment_image_src( $custom_logo_id, 'full' );
		if ( $src ) {
			return $src[0];
		}
	}
	return get_template_directory_uri() . '/img/misgro.png';
}
