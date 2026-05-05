<?php
/**
 * Main index template - fallback for blog/archives
 */
get_header();
?>

<main id="primary" class="site-main">
  <div class="container">
    <?php
    if ( have_posts() ) {
      while ( have_posts() ) {
        the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <header class="entry-header">
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            <div class="entry-meta">
              <?php echo get_the_date(); ?>
            </div>
          </header>
          <div class="entry-content">
            <?php the_excerpt(); ?>
            <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More →</a>
          </div>
        </article>
        <?php
      }
      the_posts_pagination();
    } else {
      ?>
      <div class="no-posts">
        <h2>No posts found</h2>
        <p>Sorry, no posts matched your criteria.</p>
      </div>
      <?php
    }
    ?>
  </div>
</main>

<?php get_footer(); ?>
