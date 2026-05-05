<?php
/**
 * MISGRO theme functions
 *
 * Method 3 implementation: static HTML wrapped in WordPress.
 * Keeps all original markup, CSS, and JS intact.
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
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'automatic-feed-links' );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'misgro' ),
		'footer'  => __( 'Footer Menu', 'misgro' ),
	) );
}
add_action( 'after_setup_theme', 'misgro_setup' );

/**
 * Enqueue styles and scripts.
 *
 * Loads the same Google Fonts, Font Awesome, and project CSS/JS files
 * that the original static HTML used.
 */
function misgro_enqueue_assets() {
	// Google Fonts (Outfit + Plus Jakarta Sans).
	wp_enqueue_style(
		'misgro-google-fonts',
		'https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap',
		array(),
		null
	);

	// Font Awesome 6.6.0.
	wp_enqueue_style(
		'misgro-fontawesome',
		'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css',
		array(),
		'6.6.0'
	);

	// Main project stylesheet.
	wp_enqueue_style(
		'misgro-main',
		get_template_directory_uri() . '/assets/css/styles.css',
		array( 'misgro-google-fonts', 'misgro-fontawesome' ),
		MISGRO_VERSION
	);

	// WordPress required style.css (theme metadata).
	wp_enqueue_style(
		'misgro-style',
		get_stylesheet_uri(),
		array( 'misgro-main' ),
		MISGRO_VERSION
	);

	// Main project script.
	wp_enqueue_script(
		'misgro-app',
		get_template_directory_uri() . '/assets/js/app.js',
		array(),
		MISGRO_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'misgro_enqueue_assets' );

/**
 * Add Google Fonts preconnect tags to <head>.
 */
function misgro_resource_hints( $hints, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$hints[] = array(
			'href' => 'https://fonts.googleapis.com',
		);
		$hints[] = array(
			'href'        => 'https://fonts.gstatic.com',
			'crossorigin' => 'anonymous',
		);
	}
	return $hints;
}
add_filter( 'wp_resource_hints', 'misgro_resource_hints', 10, 2 );

/**
 * Helper: returns "act" if the given page slug matches the current request.
 *
 * Used in the static nav to highlight the active menu item, mirroring the
 * `class="act"` pattern used throughout the original HTML files.
 *
 * @param string $page Slug to test (home, services, about, why-choose-us, portfolio, contact).
 * @return string
 */
function misgro_active_class( $page ) {
	$is_active = false;

	switch ( $page ) {
		case 'home':
			$is_active = is_front_page() || is_home();
			break;
		default:
			$is_active = is_page( $page );
			break;
	}

	return $is_active ? 'act' : '';
}

/**
 * Helper: returns the URL for a known site page.
 *
 * Falls back to the home URL with the slug appended if the page does not
 * yet exist in WordPress (e.g. on a fresh install before pages are created).
 *
 * @param string $slug Page slug.
 * @return string
 */
function misgro_page_url( $slug ) {
	if ( 'home' === $slug ) {
		return home_url( '/' );
	}

	$page = get_page_by_path( $slug );
	if ( $page ) {
		return get_permalink( $page );
	}

	return home_url( '/' . $slug . '/' );
}
