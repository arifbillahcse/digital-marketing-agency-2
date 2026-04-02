<?php
/**
 * Rexbon Child – Custom Nav Menu Walkers
 *
 * Walker_Rexbon_Primary   – renders the top-nav with optional icons.
 * Walker_Rexbon_Category  – renders the dark category strip pills.
 *
 * Icon system
 * ───────────
 * In Appearance → Menus, enable the "Description" screen option.
 * Enter one of the following in the Description field for any item:
 *
 *   • An emoji directly:              🏠
 *   • A Font Awesome solid class:     fa-house
 *   • A Font Awesome brands class:    fab fa-amazon
 *   • Any full FA class string:       fa-solid fa-fire
 *
 * The walker detects which format you used and renders accordingly.
 */

defined( 'ABSPATH' ) || exit;

/* ══════════════════════════════════════════════════════════
   PRIMARY NAV WALKER
══════════════════════════════════════════════════════════ */
class Walker_Rexbon_Primary extends Walker_Nav_Menu {

    public function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
        $item = $data_object;

        $classes   = empty( $item->classes ) ? [] : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        $is_active = in_array( 'current-menu-item', $classes, true )
                  || in_array( 'current-menu-parent', $classes, true )
                  || in_array( 'current-menu-ancestor', $classes, true );

        $class_str = 'nav-item' . ( $is_active ? ' active' : '' );
        if ( ! empty( $item->classes ) ) {
            $extra = implode( ' ', array_filter( $item->classes, fn( $c ) => ! in_array( $c, [ 'menu-item', 'menu-item-type-post_type', 'menu-item-object-page', 'current-menu-item' ] ) ) );
            if ( $extra ) $class_str .= ' ' . esc_attr( $extra );
        }

        // Hot-Deals check: if the item has class "btn-deals" treat it as CTA
        $is_deals = in_array( 'btn-deals', $classes, true );

        $atts              = [];
        $atts['href']      = ! empty( $item->url ) ? esc_url( $item->url ) : '';
        $atts['title']     = ! empty( $item->attr_title ) ? esc_attr( $item->attr_title ) : '';
        $atts['target']    = ! empty( $item->target ) ? esc_attr( $item->target ) : '';
        $atts['rel']       = ! empty( $item->xfn ) ? esc_attr( $item->xfn ) : '';
        $atts['class']     = 'nav-link' . ( $is_deals ? ' btn-deals' : '' );
        if ( $is_active && ! $is_deals ) {
            $atts['aria-current'] = 'page';
        }

        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

        $attr_str = '';
        foreach ( $atts as $attr => $value ) {
            if ( $value !== '' ) {
                $attr_str .= ' ' . $attr . '="' . $value . '"';
            }
        }

        // Build icon markup from Description field
        $icon_html = rexbon_build_icon_html( $item->description ?? '' );

        $title = apply_filters( 'the_title', $item->title, $item->ID );
        $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

        $has_children = in_array( 'menu-item-has-children', $classes, true );

        $output .= sprintf(
            '<li class="%s"><a%s>%s<span class="nav-label">%s</span>%s</a>',
            esc_attr( $class_str ),
            $attr_str,
            $icon_html,
            esc_html( $title ),
            $has_children ? '<span class="submenu-arrow" aria-hidden="true">&#8964;</span>' : ''
        );
    }

    public function end_el( &$output, $data_object, $depth = 0, $args = null ) {
        $output .= '</li>';
    }

    public function start_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '<ul class="submenu depth-' . $depth . '" role="menu">';
    }

    public function end_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '</ul>';
    }
}

/* ══════════════════════════════════════════════════════════
   CATEGORY STRIP WALKER
══════════════════════════════════════════════════════════ */
class Walker_Rexbon_Category extends Walker_Nav_Menu {

    public function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
        $item = $data_object;

        $classes   = empty( $item->classes ) ? [] : (array) $item->classes;
        $is_active = in_array( 'current-menu-item', $classes, true )
                  || in_array( 'current-menu-parent', $classes, true );

        // Build icon markup from Description field
        $icon_html = rexbon_build_icon_html( $item->description ?? '' );

        $title = apply_filters( 'the_title', $item->title, $item->ID );
        $url   = ! empty( $item->url ) ? esc_url( $item->url ) : '#';

        $output .= sprintf(
            '<a href="%s" class="cat-pill%s" data-cat="%s">%s<span class="cat-label">%s</span></a>',
            $url,
            $is_active ? ' on' : '',
            esc_attr( sanitize_title( $title ) ),
            $icon_html,
            esc_html( $title )
        );
    }

    public function end_el( &$output, $data_object, $depth = 0, $args = null ) {
        // Anchor already closed in start_el
    }
}

/* ══════════════════════════════════════════════════════════
   HELPER: build icon HTML from a description string
══════════════════════════════════════════════════════════ */
function rexbon_build_icon_html( string $desc ): string {
    $desc = trim( $desc );
    if ( $desc === '' ) return '';

    // Font Awesome: starts with "fa" (fas, far, fab, fa-solid, etc.)
    if ( preg_match( '/^(fa[srb]?\s|fa-)/i', $desc ) ) {
        // Normalise: "fa-house" → "fa-solid fa-house"
        if ( preg_match( '/^fa-[a-z]/i', $desc ) ) {
            $desc = 'fa-solid ' . $desc;
        }
        return '<i class="' . esc_attr( $desc ) . ' nav-icon" aria-hidden="true"></i>';
    }

    // Otherwise treat as emoji / text icon
    return '<span class="nav-icon" aria-hidden="true">' . esc_html( $desc ) . '</span>';
}
