<?php
/**
 * Footer template — site footer markup + closing tags.
 *
 * Two footer styles exist in the original HTML: the standard `<footer class="footer">`
 * used on most pages, and the `<footer>` (with `.ft`/`.fb`/`.fcol`) used on portfolio.html.
 * We render the standard one here; portfolio.php uses its own inline footer markup.
 */
?>

<!-- ════════ FOOTER ════════ -->
<footer class="footer">
  <div class="footer-top">
    <div class="footer-brand">
      <a href="<?php echo esc_url( misgro_page_url( 'home' ) ); ?>" class="logo-link">
        <img src="<?php echo esc_url( misgro_get_option( 'misgro_logo' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="logo-img"/>
      </a>
      <p><?php echo esc_html( misgro_get_option( 'misgro_footer_text' ) ); ?></p>
      <div class="social-links">
        <?php
        $facebook = misgro_get_option( 'misgro_social_facebook' );
        if ( $facebook ) {
          echo '<a href="' . esc_url( $facebook ) . '" class="social-link" aria-label="Facebook" target="_blank" rel="noopener"><i class="fab fa-facebook-f"></i></a>';
        }
        $twitter = misgro_get_option( 'misgro_social_twitter' );
        if ( $twitter ) {
          echo '<a href="' . esc_url( $twitter ) . '" class="social-link" aria-label="X Twitter" target="_blank" rel="noopener"><i class="fab fa-x-twitter"></i></a>';
        }
        $linkedin = misgro_get_option( 'misgro_social_linkedin' );
        if ( $linkedin ) {
          echo '<a href="' . esc_url( $linkedin ) . '" class="social-link" aria-label="LinkedIn" target="_blank" rel="noopener"><i class="fab fa-linkedin-in"></i></a>';
        }
        $instagram = misgro_get_option( 'misgro_social_instagram' );
        if ( $instagram ) {
          echo '<a href="' . esc_url( $instagram ) . '" class="social-link" aria-label="Instagram" target="_blank" rel="noopener"><i class="fab fa-instagram"></i></a>';
        }
        $youtube = misgro_get_option( 'misgro_social_youtube' );
        if ( $youtube ) {
          echo '<a href="' . esc_url( $youtube ) . '" class="social-link" aria-label="YouTube" target="_blank" rel="noopener"><i class="fab fa-youtube"></i></a>';
        }
        $tiktok = misgro_get_option( 'misgro_social_tiktok' );
        if ( $tiktok ) {
          echo '<a href="' . esc_url( $tiktok ) . '" class="social-link" aria-label="TikTok" target="_blank" rel="noopener"><i class="fab fa-tiktok"></i></a>';
        }
        ?>
      </div>
    </div>
    <div class="footer-col">
      <h4>Services</h4>
      <ul class="footer-links">
        <li><a href="<?php echo esc_url( misgro_page_url( 'services' ) ); ?>">SEO Optimization</a></li>
        <li><a href="<?php echo esc_url( misgro_page_url( 'services' ) ); ?>">Google Ads</a></li>
        <li><a href="<?php echo esc_url( misgro_page_url( 'services' ) ); ?>">Facebook &amp; Instagram Ads</a></li>
        <li><a href="<?php echo esc_url( misgro_page_url( 'services' ) ); ?>">Social Media Marketing</a></li>
        <li><a href="<?php echo esc_url( misgro_page_url( 'services' ) ); ?>">Content Marketing</a></li>
        <li><a href="<?php echo esc_url( misgro_page_url( 'services' ) ); ?>">Email Marketing</a></li>
        <li><a href="<?php echo esc_url( misgro_page_url( 'services' ) ); ?>">Analytics</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h4>Company</h4>
      <ul class="footer-links">
        <li><a href="<?php echo esc_url( misgro_page_url( 'about' ) ); ?>">About Us</a></li>
        <li><a href="<?php echo esc_url( misgro_page_url( 'about' ) ); ?>#team">Our Team</a></li>
        <li><a href="<?php echo esc_url( misgro_page_url( 'why-choose-us' ) ); ?>">Why Choose Us</a></li>
        <li><a href="<?php echo esc_url( misgro_page_url( 'portfolio' ) ); ?>">Portfolio</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h4>Contact</h4>
      <ul class="footer-links">
        <?php
        $email = misgro_get_option( 'misgro_email' );
        if ( $email ) {
          echo '<li><a href="mailto:' . esc_attr( $email ) . '">' . esc_html( $email ) . '</a></li>';
        }
        $phone = misgro_get_option( 'misgro_phone' );
        if ( $phone ) {
          $phone_link = preg_replace( '/[^0-9+]/', '', $phone );
          echo '<li><a href="tel:' . esc_attr( $phone_link ) . '">' . esc_html( $phone ) . '</a></li>';
        }
        $address = misgro_get_option( 'misgro_address' );
        if ( $address ) {
          echo '<li>' . nl2br( esc_html( $address ) ) . '</li>';
        }
        ?>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="footer-legal"><?php echo wp_kses_post( misgro_get_option( 'misgro_copyright' ) ); ?></div>
    <div class="footer-legal-links">
      <a href="#">Privacy Policy</a>
      <a href="#">Terms of Service</a>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
