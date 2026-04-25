<?php
/**
 * Footer — common footer block + closing tags.
 *
 * @package MISGRO
 */
?>
<footer class="footer">
	<div class="footer-top">
		<div class="footer-brand">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-link">
				<?php
				$custom_logo_id = get_theme_mod( 'custom_logo' );
				if ( $custom_logo_id ) {
					$logo = wp_get_attachment_image_src( $custom_logo_id, 'full' );
					if ( $logo ) {
						printf(
							'<img src="%s" alt="%s" class="logo-img"/>',
							esc_url( $logo[0] ),
							esc_attr( get_bloginfo( 'name' ) )
						);
					}
				} else {
					printf(
						'<img src="%s/assets/img/misgro.png" alt="%s" class="logo-img"/>',
						esc_url( get_template_directory_uri() ),
						esc_attr( get_bloginfo( 'name' ) )
					);
				}
				?>
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
			<?php
			if ( has_nav_menu( 'footer_services' ) ) {
				wp_nav_menu( array(
					'theme_location' => 'footer_services',
					'container'      => false,
					'menu_class'     => 'footer-links',
					'depth'          => 1,
				) );
			} else {
				$services_url = esc_url( misgro_url( 'services' ) );
				echo '<ul class="footer-links">';
				echo '<li><a href="' . $services_url . '">SEO Optimization</a></li>';
				echo '<li><a href="' . $services_url . '">Google Ads</a></li>';
				echo '<li><a href="' . $services_url . '">Facebook &amp; Instagram Ads</a></li>';
				echo '<li><a href="' . $services_url . '">Social Media Marketing</a></li>';
				echo '<li><a href="' . $services_url . '">Content Marketing</a></li>';
				echo '<li><a href="' . $services_url . '">Email Marketing</a></li>';
				echo '<li><a href="' . $services_url . '">Analytics</a></li>';
				echo '</ul>';
			}
			?>
		</div>
		<div class="footer-col">
			<h4>Company</h4>
			<?php
			if ( has_nav_menu( 'footer_company' ) ) {
				wp_nav_menu( array(
					'theme_location' => 'footer_company',
					'container'      => false,
					'menu_class'     => 'footer-links',
					'depth'          => 1,
				) );
			} else {
				echo '<ul class="footer-links">';
				echo '<li><a href="' . esc_url( misgro_url( 'about' ) ) . '">About Us</a></li>';
				echo '<li><a href="' . esc_url( misgro_url( 'about' ) . '#team' ) . '">Our Team</a></li>';
				echo '<li><a href="' . esc_url( misgro_url( 'why-choose-us' ) ) . '">Why Choose Us</a></li>';
				echo '<li><a href="' . esc_url( misgro_url( 'portfolio' ) ) . '">Portfolio</a></li>';
				echo '</ul>';
			}
			?>
		</div>
		<div class="footer-col">
			<h4>Contact</h4>
			<ul class="footer-links">
				<li><a href="mailto:<?php echo esc_attr( misgro_get_contact( 'email' ) ); ?>"><?php echo esc_html( misgro_get_contact( 'email' ) ); ?></a></li>
				<li><a href="tel:<?php echo esc_attr( preg_replace( '/[^+0-9]/', '', misgro_get_contact( 'phone' ) ) ); ?>"><?php echo esc_html( misgro_get_contact( 'phone' ) ); ?></a></li>
				<li><a href="#"><?php echo nl2br( esc_html( misgro_get_contact( 'address' ) ) ); ?></a></li>
			</ul>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="footer-legal">&copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?>. All rights reserved.</div>
		<div class="footer-legal-links">
			<?php
			if ( has_nav_menu( 'footer_legal' ) ) {
				wp_nav_menu( array(
					'theme_location' => 'footer_legal',
					'container'      => false,
					'items_wrap'     => '%3$s',
					'depth'          => 1,
				) );
			} else {
				echo '<a href="#">Privacy Policy</a>';
				echo '<a href="#">Terms of Service</a>';
			}
			?>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
