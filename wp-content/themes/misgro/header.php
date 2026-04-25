<?php
/**
 * Header — opens the document, prints <head>, and outputs the navbar / mobile menu.
 *
 * @package MISGRO
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link rel="profile" href="https://gmpg.org/xfn/11"/>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php if ( function_exists( 'wp_body_open' ) ) { wp_body_open(); } ?>

<div id="cursor" class="cursor"></div>
<div id="cursorRing" class="cursor-ring"></div>

<a href="#" class="back-top" id="backTop" aria-label="Back to top"><i class="fas fa-arrow-up"></i></a>
<a href="#" id="bt" aria-label="Back to top"><i class="fas fa-arrow-up"></i></a>

<div class="mob" id="mob">
	<span class="mclose" id="mclose" onclick="closeMob()"><i class="fas fa-xmark"></i></span>
	<?php misgro_mobile_menu_links(); ?>
</div>

<nav id="nav">
	<div class="nav-in">
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
		<?php misgro_primary_menu(); ?>
		<div class="nav-r">
			<a href="<?php echo esc_url( misgro_url( 'contact' ) ); ?>" class="btn btn-p">Work With Us <i class="fas fa-arrow-right"></i></a>
		</div>
		<button class="hbg" id="hbg" aria-label="Menu"><span></span><span></span><span></span></button>
	</div>
</nav>
