<?php
/**
 * The header template.
 *
 * @package Misgro
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="cursor" class="cursor"></div>
<div id="cursorRing" class="cursor-ring"></div>

<!-- Back to top -->
<a href="#" class="back-top" id="backTop" aria-label="<?php esc_attr_e( 'Back to top', 'misgro' ); ?>"><i class="fas fa-arrow-up"></i></a>

<!-- Mobile menu -->
<div class="mob" id="mob">
	<span class="mclose" id="mclose" onclick="closeMob()"><i class="fas fa-xmark"></i></span>
	<?php
	if ( has_nav_menu( 'mobile' ) ) {
		wp_nav_menu( array(
			'theme_location' => 'mobile',
			'container'      => false,
			'items_wrap'     => '%3$s',
			'depth'          => 1,
			'link_after'     => '',
		) );
	} else {
		misgro_default_mobile_menu();
	}
	?>
</div>

<!-- ══════════════ NAVBAR ══════════════ -->
<nav id="nav">
	<div class="nav-in">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-link">
			<img src="<?php echo esc_url( misgro_logo_url() ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="logo-img"/>
		</a>
		<?php
		if ( has_nav_menu( 'primary' ) ) {
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container'      => false,
				'menu_class'     => 'nav-l',
				'depth'          => 1,
			) );
		} else {
			misgro_default_primary_menu();
		}
		?>
		<div class="nav-r">
			<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-p"><?php esc_html_e( 'Work With Us', 'misgro' ); ?> <i class="fas fa-arrow-right"></i></a>
		</div>
		<button class="hbg" id="hbg" aria-label="<?php esc_attr_e( 'Menu', 'misgro' ); ?>"><span></span><span></span><span></span></button>
	</div>
</nav>
