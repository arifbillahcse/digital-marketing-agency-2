<?php
/**
 * Rexbon Child – Admin helpers for menu icon system
 *
 * • Makes "Description" screen option default-checked in nav menu editor
 * • Adds a quick-reference notice about the icon syntax
 */

defined( 'ABSPATH' ) || exit;

/* Force the "Description" column visible on the nav-menus screen */
add_filter( 'default_hidden_meta_boxes', 'rexbon_show_menu_description', 10, 2 );
function rexbon_show_menu_description( $hidden, $screen ) {
    if ( isset( $screen->id ) && $screen->id === 'nav-menus' ) {
        $hidden = array_diff( $hidden, [ 'description' ] );
    }
    return $hidden;
}

/* Admin notice on the Menus page */
add_action( 'admin_notices', 'rexbon_menu_icon_notice' );
function rexbon_menu_icon_notice() {
    $screen = get_current_screen();
    if ( ! $screen || $screen->id !== 'nav-menus' ) return;
    ?>
    <div class="notice notice-info is-dismissible" style="border-left-color:#6EA54F;">
        <p>
            <strong>Rexbon Icon System</strong> —
            <?php esc_html_e( 'Add an icon to any menu item by entering it in the <em>Description</em> field:', 'rexbon-child' ); ?>
            <code>🏠</code> <?php esc_html_e( '(emoji),', 'rexbon-child' ); ?>
            <code>fa-house</code> <?php esc_html_e( '(Font Awesome name),', 'rexbon-child' ); ?>
            <code>fa-solid fa-fire</code> <?php esc_html_e( '(full FA class).', 'rexbon-child' ); ?>
        </p>
    </div>
    <?php
}

/* Save the description field value properly */
add_action( 'wp_update_nav_menu_item', 'rexbon_save_menu_item_description', 10, 3 );
function rexbon_save_menu_item_description( $menu_id, $menu_item_db_id, $args ) {
    if ( isset( $_POST['menu-item-description'][ $menu_item_db_id ] ) ) {
        $desc = sanitize_text_field( wp_unslash( $_POST['menu-item-description'][ $menu_item_db_id ] ) );
        update_post_meta( $menu_item_db_id, '_menu_item_description', $desc );
    }
}
