<?php
/**
 * Header template — site DOCTYPE, <head>, and the static navigation.
 *
 * Mirrors the markup from the original static HTML (index.html, services.html, etc.)
 * with WordPress hooks added for plugins/SEO and asset enqueuing.
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
<a href="#" class="back-top" id="backTop" aria-label="Back to top"><i class="fas fa-arrow-up"></i></a>
<a href="#" id="bt"><i class="fas fa-arrow-up"></i></a>

<!-- Mobile menu -->
<div class="mob" id="mob">
  <span class="mclose" id="mclose" onclick="closeMob()"><i class="fas fa-xmark"></i></span>
  <a href="<?php echo esc_url( misgro_page_url( 'home' ) ); ?>" onclick="closeMob()">Home</a>
  <a href="<?php echo esc_url( misgro_page_url( 'services' ) ); ?>" onclick="closeMob()">Services</a>
  <a href="<?php echo esc_url( misgro_page_url( 'about' ) ); ?>" onclick="closeMob()">About</a>
  <a href="<?php echo esc_url( misgro_page_url( 'why-choose-us' ) ); ?>" onclick="closeMob()">Why Choose Us</a>
  <a href="<?php echo esc_url( misgro_page_url( 'portfolio' ) ); ?>" onclick="closeMob()">Portfolio</a>
  <a href="<?php echo esc_url( misgro_page_url( 'blog' ) ); ?>" onclick="closeMob()">Blog</a>
  <a href="<?php echo esc_url( misgro_page_url( 'contact' ) ); ?>" onclick="closeMob()">Contact</a>
</div>

<!-- ══════════════ NAVBAR ══════════════ -->
<nav id="nav">
  <div class="nav-in">
    <a href="<?php echo esc_url( misgro_page_url( 'home' ) ); ?>" class="logo-link">
      <img src="<?php echo esc_url( get_template_directory_uri() . '/img/misgro.png' ); ?>" alt="MISGRO" class="logo-img"/>
    </a>
    <ul class="nav-l">
      <li><a href="<?php echo esc_url( misgro_page_url( 'home' ) ); ?>" class="<?php echo esc_attr( misgro_active_class( 'home' ) ); ?>">Home</a></li>
      <li><a href="<?php echo esc_url( misgro_page_url( 'services' ) ); ?>" class="<?php echo esc_attr( misgro_active_class( 'services' ) ); ?>">Services</a></li>
      <li><a href="<?php echo esc_url( misgro_page_url( 'about' ) ); ?>" class="<?php echo esc_attr( misgro_active_class( 'about' ) ); ?>">About</a></li>
      <li><a href="<?php echo esc_url( misgro_page_url( 'why-choose-us' ) ); ?>" class="<?php echo esc_attr( misgro_active_class( 'why-choose-us' ) ); ?>">Why Choose Us</a></li>
      <li><a href="<?php echo esc_url( misgro_page_url( 'portfolio' ) ); ?>" class="<?php echo esc_attr( misgro_active_class( 'portfolio' ) ); ?>">Portfolio</a></li>
      <li><a href="<?php echo esc_url( misgro_page_url( 'blog' ) ); ?>" class="<?php echo esc_attr( misgro_active_class( 'blog' ) ); ?>">Blog</a></li>
      <li><a href="<?php echo esc_url( misgro_page_url( 'contact' ) ); ?>" class="<?php echo esc_attr( misgro_active_class( 'contact' ) ); ?>">Contact</a></li>
    </ul>
    <div class="nav-r">
      <a href="<?php echo esc_url( misgro_page_url( 'contact' ) ); ?>" class="btn btn-p">Work With Us <i class="fas fa-arrow-right"></i></a>
    </div>
    <button class="hbg" id="hbg" aria-label="Menu"><span></span><span></span><span></span></button>
  </div>
</nav>
