<?php
/**
 * Rexbon Child – AJAX Live Search
 *
 * Endpoint: wp_ajax_rexbon_search  (logged-in users)
 *           wp_ajax_nopriv_rexbon_search  (guests)
 *
 * Returns JSON: { html, total, query }
 */

defined( 'ABSPATH' ) || exit;

add_action( 'wp_ajax_rexbon_search',        'rexbon_ajax_search' );
add_action( 'wp_ajax_nopriv_rexbon_search', 'rexbon_ajax_search' );

function rexbon_ajax_search() {
    check_ajax_referer( 'rexbon_search_nonce', 'nonce' );

    $query = isset( $_POST['query'] ) ? sanitize_text_field( wp_unslash( $_POST['query'] ) ) : '';

    if ( strlen( $query ) < 2 ) {
        wp_send_json_success( [ 'html' => '', 'total' => 0, 'query' => $query ] );
    }

    $args = [
        's'              => $query,
        'post_type'      => [ 'post', 'page', 'product' ],
        'post_status'    => 'publish',
        'posts_per_page' => 8,
        'no_found_rows'  => false,
    ];

    $search = new WP_Query( $args );
    $total  = $search->found_posts;
    $html   = '';

    if ( $search->have_posts() ) {
        while ( $search->have_posts() ) {
            $search->the_post();
            $thumb = get_the_post_thumbnail_url( null, 'thumbnail' );
            $type  = get_post_type();
            $label = $type === 'product' ? __( 'Product', 'rexbon-child' )
                   : ( $type === 'post'  ? __( 'Article', 'rexbon-child' )
                   :                       ucfirst( $type ) );

            ob_start(); ?>
            <a href="<?php the_permalink(); ?>" class="search-result-item">
                <?php if ( $thumb ) : ?>
                    <img src="<?php echo esc_url( $thumb ); ?>" alt="" class="sri-thumb" loading="lazy" width="52" height="52"/>
                <?php else : ?>
                    <span class="sri-thumb sri-thumb-placeholder" aria-hidden="true">🔍</span>
                <?php endif; ?>
                <span class="sri-body">
                    <span class="sri-type"><?php echo esc_html( $label ); ?></span>
                    <span class="sri-title"><?php the_title(); ?></span>
                </span>
            </a>
            <?php
            $html .= ob_get_clean();
        }
        wp_reset_postdata();
    }

    wp_send_json_success( [ 'html' => $html, 'total' => $total, 'query' => $query ] );
}
