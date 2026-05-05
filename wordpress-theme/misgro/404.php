<?php
/**
 * Template for displaying 404 pages (not found)
 */
get_header();
?>

<main id="primary" class="site-main">
  <div class="container">
    <section class="error-404 not-found">
      <header class="page-header">
        <h1 class="page-title">Oops! Page Not Found</h1>
      </header>

      <div class="page-content">
        <p>It looks like nothing was found at this location. Maybe try a search?</p>

        <div class="error-search">
          <?php get_search_form(); ?>
        </div>

        <h2>What You Can Do:</h2>
        <ul>
          <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Go to Homepage</a></li>
          <li><a href="<?php echo esc_url( misgro_page_url( 'services' ) ); ?>">View Our Services</a></li>
          <li><a href="<?php echo esc_url( misgro_page_url( 'contact' ) ); ?>">Contact Us</a></li>
        </ul>
      </div>
    </section>
  </div>
</main>

<?php get_footer(); ?>
