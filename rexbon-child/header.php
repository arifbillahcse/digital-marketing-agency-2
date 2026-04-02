<?php
/**
 * Rexbon Child – header.php
 *
 * Outputs:
 *  1. Announcement bar  (Customizer-driven, dismissable)
 *  2. Sticky header      (logo + AJAX search + primary nav)
 *  3. Category strip     (dark pill row, driven by the Category Strip menu)
 */

defined( 'ABSPATH' ) || exit;
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
/* ─────────────────────────────────────────────
   1. ANNOUNCEMENT BAR
───────────────────────────────────────────── */
$ann_enabled     = get_theme_mod( 'rexbon_ann_bar_enabled', true );
$ann_dismissable = get_theme_mod( 'rexbon_ann_bar_dismissable', true );

if ( $ann_enabled ) :
    $ann_icon       = get_theme_mod( 'rexbon_ann_bar_icon',      '🎉' );
    $ann_text       = get_theme_mod( 'rexbon_ann_bar_text',      __( 'Prime Day is coming!', 'rexbon-child' ) );
    $ann_link_text  = get_theme_mod( 'rexbon_ann_bar_link_text', __( 'Bookmark our live deal tracker', 'rexbon-child' ) );
    $ann_link_url   = get_theme_mod( 'rexbon_ann_bar_link_url',  '#' );
    $ann_suffix     = get_theme_mod( 'rexbon_ann_bar_suffix',    __( '— we update it hourly.', 'rexbon-child' ) );
?>
<div class="ann-bar" id="rexbon-ann-bar" role="banner" aria-label="<?php esc_attr_e( 'Announcement', 'rexbon-child' ); ?>">
    <div class="ann-bar-inner">
        <?php if ( $ann_icon ) : ?>
            <span class="ann-icon" aria-hidden="true"><?php echo esc_html( $ann_icon ); ?></span>
        <?php endif; ?>
        <span class="ann-text">
            <?php echo esc_html( $ann_text ); ?>
            <?php if ( $ann_link_text && $ann_link_url ) : ?>
                <a href="<?php echo esc_url( $ann_link_url ); ?>"><?php echo esc_html( $ann_link_text ); ?></a>
            <?php endif; ?>
            <?php if ( $ann_suffix ) : ?>
                <?php echo esc_html( $ann_suffix ); ?>
            <?php endif; ?>
        </span>
        <?php if ( $ann_dismissable ) : ?>
            <button class="ann-close" id="rexbon-ann-close" aria-label="<?php esc_attr_e( 'Dismiss announcement', 'rexbon-child' ); ?>">
                <span aria-hidden="true">&times;</span>
            </button>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>

<?php
/* ─────────────────────────────────────────────
   2. STICKY HEADER
───────────────────────────────────────────── */
$deals_label = get_theme_mod( 'rexbon_deals_label', '🔥 Hot Deals' );
$deals_url   = get_theme_mod( 'rexbon_deals_url',   '#deals' );
?>
<header class="rexbon-header" id="rexbon-header" role="banner">
    <div class="header-inner">

        <!-- LOGO -->
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" aria-label="<?php bloginfo( 'name' ); ?> – <?php esc_attr_e( 'Go to homepage', 'rexbon-child' ); ?>">
            <?php
            $logo_id = get_theme_mod( 'custom_logo' );
            if ( $logo_id ) :
                echo wp_get_attachment_image( $logo_id, 'full', false, [ 'class' => 'logo-img', 'alt' => get_bloginfo( 'name' ) ] );
            else :
                $name_parts = explode( 'bon', get_bloginfo( 'name' ), 2 );
                if ( count( $name_parts ) === 2 ) :
                    echo esc_html( $name_parts[0] ) . '<em>bon</em>' . esc_html( $name_parts[1] );
                else :
                    echo esc_html( get_bloginfo( 'name' ) );
                endif;
            endif;
            ?>
        </a>

        <!-- SEARCH -->
        <div class="search-bar" role="search" aria-label="<?php esc_attr_e( 'Site search', 'rexbon-child' ); ?>">
            <label for="rexbon-search-input" class="screen-reader-text"><?php esc_html_e( 'Search', 'rexbon-child' ); ?></label>
            <input
                type="search"
                id="rexbon-search-input"
                class="search-input"
                name="s"
                placeholder="<?php esc_attr_e( 'Search reviews, guides, products…', 'rexbon-child' ); ?>"
                value="<?php echo esc_attr( get_search_query() ); ?>"
                autocomplete="off"
                aria-expanded="false"
                aria-controls="rexbon-search-results"
                aria-autocomplete="list"
            />
            <button class="search-btn" type="submit" form="rexbon-search-form" aria-label="<?php esc_attr_e( 'Submit search', 'rexbon-child' ); ?>">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
                </svg>
            </button>
            <!-- Hidden form for full-page search fallback -->
            <form id="rexbon-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" hidden>
                <input type="hidden" name="s" id="rexbon-search-form-s"/>
            </form>
            <!-- Live results dropdown -->
            <div class="search-results-dropdown" id="rexbon-search-results" role="listbox" aria-label="<?php esc_attr_e( 'Search suggestions', 'rexbon-child' ); ?>" hidden>
                <div class="sri-list" id="rexbon-sri-list"></div>
                <a href="#" class="sri-view-all" id="rexbon-view-all" hidden></a>
            </div>
            <div class="search-backdrop" id="rexbon-search-backdrop" aria-hidden="true"></div>
        </div>

        <!-- PRIMARY NAV (desktop) -->
        <nav class="nav-links" id="rexbon-primary-nav" aria-label="<?php esc_attr_e( 'Primary navigation', 'rexbon-child' ); ?>">
            <?php
            if ( has_nav_menu( 'rexbon-primary' ) ) {
                wp_nav_menu( [
                    'theme_location' => 'rexbon-primary',
                    'container'      => false,
                    'menu_class'     => 'primary-menu',
                    'walker'         => new Walker_Rexbon_Primary(),
                    'fallback_cb'    => false,
                ] );
            } else {
                // Fallback static links when no menu is assigned
                ?>
                <ul class="primary-menu">
                    <li class="nav-item"><a href="<?php echo esc_url( home_url( '/reviews' ) ); ?>" class="nav-link"><span class="nav-label"><?php esc_html_e( 'Reviews', 'rexbon-child' ); ?></span></a></li>
                    <li class="nav-item"><a href="<?php echo esc_url( home_url( '/guides' ) ); ?>" class="nav-link"><span class="nav-label"><?php esc_html_e( 'Guides', 'rexbon-child' ); ?></span></a></li>
                    <li class="nav-item"><a href="<?php echo esc_url( home_url( '/compare' ) ); ?>" class="nav-link"><span class="nav-label"><?php esc_html_e( 'Compare', 'rexbon-child' ); ?></span></a></li>
                    <li class="nav-item"><a href="<?php echo esc_url( home_url( '/about' ) ); ?>" class="nav-link"><span class="nav-label"><?php esc_html_e( 'About', 'rexbon-child' ); ?></span></a></li>
                </ul>
                <?php
            }
            ?>
            <!-- Hot Deals CTA -->
            <?php if ( $deals_label ) : ?>
                <a href="<?php echo esc_url( $deals_url ); ?>" class="btn-deals">
                    <?php echo esc_html( $deals_label ); ?>
                </a>
            <?php endif; ?>
        </nav>

        <!-- MOBILE HAMBURGER -->
        <button class="hamburger" id="rexbon-hamburger" aria-label="<?php esc_attr_e( 'Open menu', 'rexbon-child' ); ?>" aria-expanded="false" aria-controls="rexbon-mobile-menu">
            <span></span><span></span><span></span>
        </button>

    </div><!-- .header-inner -->
</header>

<?php
/* ─────────────────────────────────────────────
   MOBILE DRAWER
───────────────────────────────────────────── */
?>
<div class="mobile-menu" id="rexbon-mobile-menu" role="dialog" aria-modal="true" aria-label="<?php esc_attr_e( 'Mobile navigation', 'rexbon-child' ); ?>" hidden>
    <button class="mobile-close" id="rexbon-mobile-close" aria-label="<?php esc_attr_e( 'Close menu', 'rexbon-child' ); ?>">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" aria-hidden="true">
            <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
        </svg>
    </button>

    <!-- Mobile search -->
    <div class="mobile-search-wrap">
        <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" role="search">
            <input type="search" name="s" placeholder="<?php esc_attr_e( 'Search…', 'rexbon-child' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>"/>
            <button type="submit" aria-label="<?php esc_attr_e( 'Search', 'rexbon-child' ); ?>">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
                </svg>
            </button>
        </form>
    </div>

    <!-- Mobile nav items -->
    <nav aria-label="<?php esc_attr_e( 'Mobile navigation', 'rexbon-child' ); ?>">
        <?php
        if ( has_nav_menu( 'rexbon-primary' ) ) {
            wp_nav_menu( [
                'theme_location' => 'rexbon-primary',
                'container'      => false,
                'menu_class'     => 'mobile-nav-list',
                'walker'         => new Walker_Rexbon_Primary(),
                'fallback_cb'    => false,
            ] );
        }
        ?>
        <?php if ( $deals_label ) : ?>
            <a href="<?php echo esc_url( $deals_url ); ?>" class="mobile-deals-btn"><?php echo esc_html( $deals_label ); ?></a>
        <?php endif; ?>
    </nav>
</div>
<div class="mobile-overlay" id="rexbon-mobile-overlay" aria-hidden="true"></div>

<?php
/* ─────────────────────────────────────────────
   3. CATEGORY STRIP
───────────────────────────────────────────── */
$cat_strip_enabled = get_theme_mod( 'rexbon_cat_strip_enabled', true );
if ( $cat_strip_enabled ) :
?>
<div class="cat-strip" id="rexbon-cat-strip" aria-label="<?php esc_attr_e( 'Browse by category', 'rexbon-child' ); ?>">
    <div class="cat-strip-inner">
        <?php
        if ( has_nav_menu( 'rexbon-category' ) ) {
            wp_nav_menu( [
                'theme_location' => 'rexbon-category',
                'container'      => false,
                'items_wrap'     => '%3$s',   // no wrapper ul — walker outputs <a> directly
                'walker'         => new Walker_Rexbon_Category(),
                'fallback_cb'    => false,
            ] );
        } else {
            // Default fallback pills
            $defaults = [
                [ '🏠', 'Home & Kitchen', home_url( '/category/home-kitchen' ) ],
                [ '💻', 'Tech',           home_url( '/category/tech' ) ],
                [ '🎮', 'Gaming',         home_url( '/category/gaming' ) ],
                [ '💪', 'Fitness',        home_url( '/category/fitness' ) ],
                [ '🌿', 'Beauty',         home_url( '/category/beauty' ) ],
                [ '🐾', 'Pet Supplies',   home_url( '/category/pet-supplies' ) ],
                [ '📚', 'Books',          home_url( '/category/books' ) ],
                [ '👶', 'Baby',           home_url( '/category/baby' ) ],
                [ '🚗', 'Auto',           home_url( '/category/auto' ) ],
                [ '🎒', 'Travel',         home_url( '/category/travel' ) ],
            ];
            foreach ( $defaults as $pill ) {
                printf(
                    '<a href="%s" class="cat-pill"><span class="nav-icon" aria-hidden="true">%s</span><span class="cat-label">%s</span></a>',
                    esc_url( $pill[2] ),
                    esc_html( $pill[0] ),
                    esc_html( $pill[1] )
                );
            }
        }
        ?>
    </div>
</div>
<?php endif; ?>

<!-- Page content wrapper opened here, closed in footer.php -->
<div id="rexbon-page" class="rexbon-page-wrapper">
