<?php
/**
 * Rexbon Child – Customizer Settings
 *
 * Registers the Announcement Bar and Category Strip panels
 * so site editors can manage them without touching code.
 */

defined( 'ABSPATH' ) || exit;

add_action( 'customize_register', 'rexbon_customizer_register' );
function rexbon_customizer_register( WP_Customize_Manager $wp_customize ) {

    /* ══════════════════════════════════════════
       PANEL: Rexbon Header
    ══════════════════════════════════════════ */
    $wp_customize->add_panel( 'rexbon_header_panel', [
        'title'       => __( 'Rexbon Header', 'rexbon-child' ),
        'description' => __( 'Control the announcement bar, primary header, and category strip.', 'rexbon-child' ),
        'priority'    => 30,
    ] );

    /* ──────────────────────────────────────────
       SECTION: Announcement Bar
    ────────────────────────────────────────── */
    $wp_customize->add_section( 'rexbon_ann_bar', [
        'title'    => __( 'Announcement Bar', 'rexbon-child' ),
        'panel'    => 'rexbon_header_panel',
        'priority' => 10,
    ] );

    // Enable / disable
    $wp_customize->add_setting( 'rexbon_ann_bar_enabled', [
        'default'           => true,
        'sanitize_callback' => 'rexbon_sanitize_checkbox',
    ] );
    $wp_customize->add_control( 'rexbon_ann_bar_enabled', [
        'type'    => 'checkbox',
        'label'   => __( 'Show Announcement Bar', 'rexbon-child' ),
        'section' => 'rexbon_ann_bar',
    ] );

    // Prefix emoji / icon (plain text)
    $wp_customize->add_setting( 'rexbon_ann_bar_icon', [
        'default'           => '🎉',
        'sanitize_callback' => 'sanitize_text_field',
    ] );
    $wp_customize->add_control( 'rexbon_ann_bar_icon', [
        'type'        => 'text',
        'label'       => __( 'Icon / Emoji', 'rexbon-child' ),
        'description' => __( 'Emoji or leave blank.', 'rexbon-child' ),
        'section'     => 'rexbon_ann_bar',
    ] );

    // Message text (before the link)
    $wp_customize->add_setting( 'rexbon_ann_bar_text', [
        'default'           => __( 'Prime Day is coming!', 'rexbon-child' ),
        'sanitize_callback' => 'sanitize_text_field',
    ] );
    $wp_customize->add_control( 'rexbon_ann_bar_text', [
        'type'    => 'text',
        'label'   => __( 'Announcement Text', 'rexbon-child' ),
        'section' => 'rexbon_ann_bar',
    ] );

    // Link label
    $wp_customize->add_setting( 'rexbon_ann_bar_link_text', [
        'default'           => __( 'Bookmark our live deal tracker', 'rexbon-child' ),
        'sanitize_callback' => 'sanitize_text_field',
    ] );
    $wp_customize->add_control( 'rexbon_ann_bar_link_text', [
        'type'    => 'text',
        'label'   => __( 'Link Label', 'rexbon-child' ),
        'section' => 'rexbon_ann_bar',
    ] );

    // Link URL
    $wp_customize->add_setting( 'rexbon_ann_bar_link_url', [
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ] );
    $wp_customize->add_control( 'rexbon_ann_bar_link_url', [
        'type'    => 'url',
        'label'   => __( 'Link URL', 'rexbon-child' ),
        'section' => 'rexbon_ann_bar',
    ] );

    // Suffix text (after the link)
    $wp_customize->add_setting( 'rexbon_ann_bar_suffix', [
        'default'           => __( '— we update it hourly.', 'rexbon-child' ),
        'sanitize_callback' => 'sanitize_text_field',
    ] );
    $wp_customize->add_control( 'rexbon_ann_bar_suffix', [
        'type'    => 'text',
        'label'   => __( 'Suffix Text (after link)', 'rexbon-child' ),
        'section' => 'rexbon_ann_bar',
    ] );

    // Background colour
    $wp_customize->add_setting( 'rexbon_ann_bar_bg', [
        'default'           => '#6EA54F',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ] );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rexbon_ann_bar_bg', [
        'label'   => __( 'Background Colour', 'rexbon-child' ),
        'section' => 'rexbon_ann_bar',
    ] ) );

    // Text colour
    $wp_customize->add_setting( 'rexbon_ann_bar_color', [
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ] );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rexbon_ann_bar_color', [
        'label'   => __( 'Text Colour', 'rexbon-child' ),
        'section' => 'rexbon_ann_bar',
    ] ) );

    // Link / accent colour
    $wp_customize->add_setting( 'rexbon_ann_bar_link_color', [
        'default'           => '#f5c842',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ] );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rexbon_ann_bar_link_color', [
        'label'   => __( 'Link / Accent Colour', 'rexbon-child' ),
        'section' => 'rexbon_ann_bar',
    ] ) );

    // Dismissable toggle
    $wp_customize->add_setting( 'rexbon_ann_bar_dismissable', [
        'default'           => true,
        'sanitize_callback' => 'rexbon_sanitize_checkbox',
    ] );
    $wp_customize->add_control( 'rexbon_ann_bar_dismissable', [
        'type'        => 'checkbox',
        'label'       => __( 'Allow visitors to dismiss the bar', 'rexbon-child' ),
        'section'     => 'rexbon_ann_bar',
    ] );

    /* ──────────────────────────────────────────
       SECTION: Hot Deals Button
    ────────────────────────────────────────── */
    $wp_customize->add_section( 'rexbon_deals_btn', [
        'title'    => __( 'Hot Deals Button', 'rexbon-child' ),
        'panel'    => 'rexbon_header_panel',
        'priority' => 20,
    ] );

    $wp_customize->add_setting( 'rexbon_deals_label', [
        'default'           => '🔥 Hot Deals',
        'sanitize_callback' => 'sanitize_text_field',
    ] );
    $wp_customize->add_control( 'rexbon_deals_label', [
        'type'    => 'text',
        'label'   => __( 'Button Label', 'rexbon-child' ),
        'section' => 'rexbon_deals_btn',
    ] );

    $wp_customize->add_setting( 'rexbon_deals_url', [
        'default'           => '#deals',
        'sanitize_callback' => 'esc_url_raw',
    ] );
    $wp_customize->add_control( 'rexbon_deals_url', [
        'type'    => 'url',
        'label'   => __( 'Button URL', 'rexbon-child' ),
        'section' => 'rexbon_deals_btn',
    ] );

    /* ──────────────────────────────────────────
       SECTION: Category Strip
    ────────────────────────────────────────── */
    $wp_customize->add_section( 'rexbon_cat_strip', [
        'title'       => __( 'Category Strip', 'rexbon-child' ),
        'description' => __( 'The category strip is powered by the "Rexbon Category Strip" menu (Appearance → Menus). Add icons via the Description field of each menu item.', 'rexbon-child' ),
        'panel'       => 'rexbon_header_panel',
        'priority'    => 30,
    ] );

    $wp_customize->add_setting( 'rexbon_cat_strip_enabled', [
        'default'           => true,
        'sanitize_callback' => 'rexbon_sanitize_checkbox',
    ] );
    $wp_customize->add_control( 'rexbon_cat_strip_enabled', [
        'type'    => 'checkbox',
        'label'   => __( 'Show Category Strip', 'rexbon-child' ),
        'section' => 'rexbon_cat_strip',
    ] );

    $wp_customize->add_setting( 'rexbon_cat_strip_bg', [
        'default'           => '#1a1f16',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ] );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rexbon_cat_strip_bg', [
        'label'   => __( 'Background Colour', 'rexbon-child' ),
        'section' => 'rexbon_cat_strip',
    ] ) );
}

/* ─────────────────────────────────────────────
   LIVE PREVIEW (postMessage transport)
───────────────────────────────────────────── */
add_action( 'customize_preview_init', 'rexbon_customizer_live_preview' );
function rexbon_customizer_live_preview() {
    wp_enqueue_script(
        'rexbon-customizer-preview',
        get_stylesheet_directory_uri() . '/assets/js/customizer-preview.js',
        [ 'customize-preview', 'jquery' ],
        '1.0.0',
        true
    );
}

/* ─────────────────────────────────────────────
   INLINE CSS: dynamic colours from Customizer
───────────────────────────────────────────── */
add_action( 'wp_head', 'rexbon_dynamic_header_css', 99 );
function rexbon_dynamic_header_css() {
    $ann_bg         = get_theme_mod( 'rexbon_ann_bar_bg',         '#6EA54F' );
    $ann_color      = get_theme_mod( 'rexbon_ann_bar_color',      '#ffffff' );
    $ann_link_color = get_theme_mod( 'rexbon_ann_bar_link_color', '#f5c842' );
    $cat_bg         = get_theme_mod( 'rexbon_cat_strip_bg',       '#1a1f16' );
    ?>
    <style id="rexbon-dynamic-css">
        .ann-bar { background: <?php echo esc_attr( $ann_bg ); ?>; color: <?php echo esc_attr( $ann_color ); ?>; }
        .ann-bar a { color: <?php echo esc_attr( $ann_link_color ); ?>; }
        .cat-strip { background: <?php echo esc_attr( $cat_bg ); ?>; }
    </style>
    <?php
}

/* ─────────────────────────────────────────────
   SANITIZE HELPERS
───────────────────────────────────────────── */
function rexbon_sanitize_checkbox( $value ) {
    return (bool) $value;
}
