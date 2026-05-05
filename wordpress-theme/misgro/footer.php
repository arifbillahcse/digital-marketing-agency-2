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
        <img src="<?php echo esc_url( get_template_directory_uri() . '/img/misgro.png' ); ?>" alt="MISGRO" class="logo-img"/>
      </a>
      <p>Data-driven digital marketing that delivers real, measurable growth. Your success is our only metric.</p>
      <div class="social-links">
        <a href="#" class="social-link" aria-label="X Twitter"><i class="fab fa-x-twitter"></i></a>
        <a href="#" class="social-link" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
        <a href="#" class="social-link" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="social-link" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
        <a href="#" class="social-link" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
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
        <li><a href="mailto:contact@misgro.com">contact@misgro.com</a></li>
        <li><a href="tel:+12125550190">+1 (212) 555-0190</a></li>
        <li><a href="#">340 Park Ave, Suite 400<br/>New York, NY 10022</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="footer-legal">&copy; <?php echo esc_html( date( 'Y' ) ); ?> MISGRO Agency. All rights reserved.</div>
    <div class="footer-legal-links">
      <a href="#">Privacy Policy</a>
      <a href="#">Terms of Service</a>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
