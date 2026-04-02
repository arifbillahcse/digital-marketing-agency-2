<?php
/**
 * Rexbon Child Theme – functions.php
 *
 * Loads parent styles, registers nav menus, customizer settings,
 * AJAX search, and admin helpers for icon-aware menus.
 */

defined( 'ABSPATH' ) || exit;

/* ─────────────────────────────────────────────
   1. ENQUEUE PARENT + CHILD STYLES & SCRIPTS
───────────────────────────────────────────── */
add_action( 'wp_enqueue_scripts', 'rexbon_enqueue_assets' );
function rexbon_enqueue_assets() {
    // Parent theme stylesheet
    wp_enqueue_style(
        'rehub-parent-style',
        get_template_directory_uri() . '/style.css',
        [],
        wp_get_theme( get_template() )->get( 'Version' )
    );

    // Child header stylesheet
    wp_enqueue_style(
        'rexbon-header-style',
        get_stylesheet_directory_uri() . '/assets/css/header.css',
        [ 'rehub-parent-style' ],
        '1.0.0'
    );

    // Font Awesome (for nav icons)
    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css',
        [],
        '6.5.0'
    );

    // Google Fonts
    wp_enqueue_style(
        'rexbon-fonts',
        'https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=Nunito:wght@300;400;500;600;700&display=swap',
        [],
        null
    );

    // Header JS (mobile menu, sticky, category active state)
    wp_enqueue_script(
        'rexbon-header-js',
        get_stylesheet_directory_uri() . '/assets/js/header.js',
        [ 'jquery' ],
        '1.0.0',
        true
    );

    // AJAX search JS
    wp_enqueue_script(
        'rexbon-search-js',
        get_stylesheet_directory_uri() . '/assets/js/search.js',
        [ 'jquery' ],
        '1.0.0',
        true
    );

    // Pass AJAX url and nonce to JS
    wp_localize_script( 'rexbon-search-js', 'RexbonSearch', [
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'rexbon_search_nonce' ),
        'i18n'    => [
            'noResults'  => __( 'No results found.', 'rexbon-child' ),
            'searching'  => __( 'Searching…', 'rexbon-child' ),
            'viewAll'    => __( 'View all results for "%s"', 'rexbon-child' ),
        ],
    ] );
}

/* ─────────────────────────────────────────────
   2. REGISTER NAVIGATION MENUS
───────────────────────────────────────────── */
add_action( 'after_setup_theme', 'rexbon_register_menus' );
function rexbon_register_menus() {
    register_nav_menus( [
        'rexbon-primary'  => __( 'Rexbon Primary Navigation', 'rexbon-child' ),
        'rexbon-category' => __( 'Rexbon Category Strip', 'rexbon-child' ),
    ] );

    // Enable the custom logo uploader in Appearance → Customize → Site Identity
    add_theme_support( 'custom-logo', [
        'height'               => 80,
        'width'                => 300,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => [ 'site-title', 'site-description' ],
        'unlink-homepage-logo' => false,
    ] );
}

/* ─────────────────────────────────────────────
   3. LOAD ADDITIONAL FILES
───────────────────────────────────────────── */
require_once get_stylesheet_directory() . '/inc/customizer.php';
require_once get_stylesheet_directory() . '/inc/walker-nav-menu.php';
require_once get_stylesheet_directory() . '/inc/ajax-search.php';

// Load admin helpers only in the dashboard
if ( is_admin() ) {
    require_once get_stylesheet_directory() . '/admin/menu-icons.php';
}

/* ─────────────────────────────────────────────
   4. OVERRIDE REHUB HEADER
   Tell ReHub to use our header.php instead of its own.
───────────────────────────────────────────── */
add_filter( 'rehub_header_template', 'rexbon_use_child_header' );
function rexbon_use_child_header() {
    return get_stylesheet_directory() . '/header.php';
}

/* ─────────────────────────────────────────────
   5. ADD DESCRIPTION FIELD VISIBILITY IN MENUS
   WordPress hides "Description" by default in Appearance > Menus.
   We enable it so editors can enter icon classes or emoji.
───────────────────────────────────────────── */
add_filter( 'wp_setup_nav_menu_item', 'rexbon_expose_menu_description' );
function rexbon_expose_menu_description( $item ) {
    $item->description = get_post_meta( $item->ID, '_menu_item_description', true );
    return $item;
}

add_filter( 'manage_nav-menus_columns', 'rexbon_add_description_column' );
function rexbon_add_description_column( $columns ) {
    $columns['description'] = __( 'Icon (emoji or fa-class)', 'rexbon-child' );
    return $columns;
}

/* ─────────────────────────────────────────────
   6. BODY CLASSES
───────────────────────────────────────────── */
add_filter( 'body_class', 'rexbon_body_classes' );
function rexbon_body_classes( $classes ) {
    $classes[] = 'rexbon-child';
    if ( get_theme_mod( 'rexbon_ann_bar_enabled', true ) ) {
        $classes[] = 'has-ann-bar';
    }
    return $classes;
}
