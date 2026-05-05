<?php
/**
 * Template for displaying pages
 *
 * Fallback template for any page without a specific template.
 * The template hierarchy will try to load page-{slug}.php first.
 */
get_header();
?>

<main id="primary" class="site-main">
  <div class="container">
    <?php
    while ( have_posts() ) {
      the_post();
      ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
          <?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
        </header>
        <div class="entry-content">
          <?php the_content(); ?>
        </div>
      </article>
      <?php
      if ( comments_open() || get_comments_number() ) {
        comments_template();
      }
    }
    ?>
  </div>
</main>

<?php get_footer(); ?>
