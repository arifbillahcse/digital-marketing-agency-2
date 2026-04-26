<?php
/**
 * The footer template.
 *
 * @package Misgro
 */
?>

<!-- ════════ FOOTER ════════ -->
<footer class="footer">
	<div class="footer-top">
		<div class="footer-brand">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-link">
				<img src="<?php echo esc_url( misgro_logo_url() ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="logo-img"/>
			</a>
			<p><?php esc_html_e( 'Data-driven digital marketing that delivers real, measurable growth. Your success is our only metric.', 'misgro' ); ?></p>
			<div class="social-links">
				<a href="#" class="social-link" aria-label="X Twitter"><i class="fab fa-x-twitter"></i></a>
				<a href="#" class="social-link" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
				<a href="#" class="social-link" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social-link" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
				<a href="#" class="social-link" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
			</div>
		</div>

		<div class="footer-col">
			<h4><?php esc_html_e( 'Services', 'misgro' ); ?></h4>
			<?php
			if ( has_nav_menu( 'footer-services' ) ) {
				wp_nav_menu( array(
					'theme_location' => 'footer-services',
					'container'      => false,
					'menu_class'     => 'footer-links',
					'depth'          => 1,
				) );
			} else {
				$services_url = home_url( '/services/' );
				$services     = array(
					__( 'SEO Optimization', 'misgro' ),
					__( 'Google Ads', 'misgro' ),
					__( 'Facebook & Instagram Ads', 'misgro' ),
					__( 'Social Media Marketing', 'misgro' ),
					__( 'Content Marketing', 'misgro' ),
					__( 'Email Marketing', 'misgro' ),
					__( 'Analytics', 'misgro' ),
				);
				echo '<ul class="footer-links">';
				foreach ( $services as $label ) {
					printf( '<li><a href="%s">%s</a></li>', esc_url( $services_url ), esc_html( $label ) );
				}
				echo '</ul>';
			}
			?>
		</div>

		<div class="footer-col">
			<h4><?php esc_html_e( 'Company', 'misgro' ); ?></h4>
			<?php
			if ( has_nav_menu( 'footer-company' ) ) {
				wp_nav_menu( array(
					'theme_location' => 'footer-company',
					'container'      => false,
					'menu_class'     => 'footer-links',
					'depth'          => 1,
				) );
			} else {
				?>
				<ul class="footer-links">
					<li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About Us', 'misgro' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/about/#team' ) ); ?>"><?php esc_html_e( 'Our Team', 'misgro' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/why-choose-us/' ) ); ?>"><?php esc_html_e( 'Why Choose Us', 'misgro' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/portfolio/' ) ); ?>"><?php esc_html_e( 'Portfolio', 'misgro' ); ?></a></li>
				</ul>
				<?php
			}
			?>
		</div>

		<div class="footer-col">
			<h4><?php esc_html_e( 'Contact', 'misgro' ); ?></h4>
			<?php
			if ( has_nav_menu( 'footer-contact' ) ) {
				wp_nav_menu( array(
					'theme_location' => 'footer-contact',
					'container'      => false,
					'menu_class'     => 'footer-links',
					'depth'          => 1,
				) );
			} else {
				?>
				<ul class="footer-links">
					<li><a href="mailto:contact@misgro.com">contact@misgro.com</a></li>
					<li><a href="tel:+12125550190">+1 (212) 555-0190</a></li>
					<li><a href="#">340 Park Ave, Suite 400<br/>New York, NY 10022</a></li>
				</ul>
				<?php
			}
			?>
		</div>
	</div>

	<div class="footer-bottom">
		<div class="footer-legal">&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?>. <?php esc_html_e( 'All rights reserved.', 'misgro' ); ?></div>
		<div class="footer-legal-links">
			<a href="#"><?php esc_html_e( 'Privacy Policy', 'misgro' ); ?></a>
			<a href="#"><?php esc_html_e( 'Terms of Service', 'misgro' ); ?></a>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
