<?php
/**
 * Template Name: Blog
 * Template Slug: blog
 * Description: Blog page — displays all posts with pagination
 *
 * Loads automatically for the WordPress page with slug "blog".
 */
get_header();
?>

<section class="blog-section">
  <div class="container">

    <div class="section-head reveal">
      <div class="section-label">
        <span class="label-dot"></span>
        Blog & Insights
      </div>
      <h2 class="section-title">
        Marketing Tips & Strategies<br>
        <span class="gt">That Actually Work</span>
      </h2>
      <p class="section-sub">
        Stay updated with the latest digital marketing trends, strategies, and insights from our team of experts.
      </p>
    </div>

    <div class="blog-grid">
      <?php
      if ( have_posts() ) {
        while ( have_posts() ) {
          the_post();
          ?>
          <article class="blog-card reveal" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="card-header">
              <?php
              if ( has_post_thumbnail() ) {
                the_post_thumbnail( 'medium', array( 'class' => 'card-image' ) );
              } else {
                echo '<div class="card-image-placeholder" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); height: 250px;"></div>';
              }
              ?>
            </div>
            <div class="card-body">
              <div class="card-meta">
                <span class="post-date"><?php echo get_the_date( 'F j, Y' ); ?></span>
                <span class="post-author">by <?php the_author(); ?></span>
              </div>
              <h3 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <p class="card-excerpt"><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
              <a href="<?php the_permalink(); ?>" class="btn btn-outline">Read Article →</a>
            </div>
          </article>
          <?php
        }
        ?>
      </div>

      <!-- Pagination -->
      <div class="blog-pagination">
        <?php the_posts_pagination( array(
          'mid_size'           => 2,
          'prev_text'          => '← Previous',
          'next_text'          => 'Next →',
          'screen_reader_text' => 'Posts navigation',
        ) ); ?>
      </div>

      <?php
      } else {
        ?>
        <div class="no-posts">
          <h2>No posts found</h2>
          <p>Sorry, there are no published articles yet. Check back soon!</p>
        </div>
        <?php
      }
      ?>
    </div>

  </div>
</section>

<style>
.blog-section {
  padding: 80px 20px;
}

.blog-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
  gap: 30px;
  margin-top: 50px;
}

.blog-card {
  background: white;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
  transition: all 0.3s ease;
}

.blog-card:hover {
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
  transform: translateY(-5px);
}

.blog-card .card-header {
  height: 250px;
  overflow: hidden;
}

.blog-card .card-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.3s ease;
}

.blog-card:hover .card-image {
  transform: scale(1.05);
}

.blog-card .card-image-placeholder {
  width: 100%;
}

.blog-card .card-body {
  padding: 25px;
}

.blog-card .card-meta {
  display: flex;
  gap: 15px;
  font-size: 13px;
  color: #888;
  margin-bottom: 12px;
}

.blog-card .card-title {
  font-size: 18px;
  font-weight: 600;
  margin: 15px 0;
  line-height: 1.4;
}

.blog-card .card-title a {
  color: #222;
  text-decoration: none;
  transition: color 0.3s ease;
}

.blog-card .card-title a:hover {
  color: #667eea;
}

.blog-card .card-excerpt {
  font-size: 14px;
  color: #666;
  margin-bottom: 20px;
  line-height: 1.6;
}

.blog-pagination {
  margin-top: 50px;
  text-align: center;
}

.blog-pagination .page-numbers {
  display: inline-flex;
  gap: 8px;
  align-items: center;
}

.blog-pagination a,
.blog-pagination span {
  padding: 8px 12px;
  border-radius: 6px;
  text-decoration: none;
  color: #667eea;
  border: 1px solid #e0e0e0;
  transition: all 0.3s ease;
}

.blog-pagination a:hover {
  background: #667eea;
  color: white;
  border-color: #667eea;
}

.blog-pagination .page-numbers.current {
  background: #667eea;
  color: white;
  border-color: #667eea;
  pointer-events: none;
}

.no-posts {
  text-align: center;
  padding: 60px 20px;
}

.no-posts h2 {
  font-size: 28px;
  color: #222;
  margin-bottom: 12px;
}

.no-posts p {
  font-size: 16px;
  color: #888;
}

@media (max-width: 768px) {
  .blog-grid {
    grid-template-columns: 1fr;
  }

  .blog-section {
    padding: 50px 20px;
  }
}
</style>

<?php get_footer(); ?>
