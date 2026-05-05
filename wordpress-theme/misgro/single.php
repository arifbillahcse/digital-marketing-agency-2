<?php
/**
 * Template for displaying single posts
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
          <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
          <div class="entry-meta">
            <span class="posted-on">
              <?php echo 'Posted on ' . get_the_date(); ?>
            </span>
            <span class="byline">
              <?php echo 'by ' . get_the_author(); ?>
            </span>
          </div>
        </header>
        <div class="entry-content">
          <?php the_content(); ?>
        </div>
        <footer class="entry-footer">
          <?php
          $categories = get_the_category();
          if ( $categories ) {
            echo 'Categories: ';
            foreach ( $categories as $category ) {
              echo '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a> ';
            }
          }
          ?>
        </footer>
      </article>

      <nav class="post-navigation">
        <div class="nav-previous">
          <?php previous_post_link( '%link', '← Previous Post' ); ?>
        </div>
        <div class="nav-next">
          <?php next_post_link( '%link', 'Next Post →' ); ?>
        </div>
      </nav>

      <?php
      if ( comments_open() || get_comments_number() ) {
        comments_template();
      }
    }
    ?>
  </div>
</main>

<?php get_footer(); ?>
