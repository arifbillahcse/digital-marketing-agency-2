<?php
/**
 * The main template file. Required by WordPress as a fallback for any view
 * that does not have a more specific template. The Misgro theme renders the
 * homepage via front-page.php; remaining page templates are introduced in
 * later parts of the theme build.
 *
 * @package Misgro
 */

get_header();
?>

<main class="container" style="padding:160px 0 120px;min-height:60vh">
	<?php if ( have_posts() ) : ?>
		<div class="services-head reveal" style="margin-bottom:60px">
			<div class="section-label"><i class="fas fa-newspaper"></i> <?php esc_html_e( 'Latest', 'misgro' ); ?></div>
			<h1 class="section-title"><?php single_post_title(); ?></h1>
		</div>

		<div class="services-grid">
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'service-card reveal' ); ?>>
					<div class="sc-title"><a href="<?php the_permalink(); ?>" style="color:inherit"><?php the_title(); ?></a></div>
					<div class="sc-desc"><?php the_excerpt(); ?></div>
				</article>
				<?php
			endwhile;
			?>
		</div>

		<?php
		the_posts_pagination( array(
			'mid_size'  => 2,
			'prev_text' => __( '← Previous', 'misgro' ),
			'next_text' => __( 'Next →', 'misgro' ),
		) );
		?>
	<?php else : ?>
		<div class="services-head reveal">
			<h1 class="section-title"><?php esc_html_e( 'Nothing Found', 'misgro' ); ?></h1>
			<p class="section-sub"><?php esc_html_e( 'It looks like nothing was found at this location.', 'misgro' ); ?></p>
		</div>
	<?php endif; ?>
</main>

<?php
get_footer();
