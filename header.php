<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RainbowNews
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'rainbownews' ); ?></a>

	<div class="nnc-top-header">
		<div class="nnc-container">
			<div class="nnc-top-menu">
				<?php wp_nav_menu( array( 'theme_location' => 'top-menu', 'menu' => 'Top Menu', 'menu_id' => 'top-menu' ) ); ?>
			</div>
			<div class="nnc-social">
				<?php wp_nav_menu( array( 'theme_location' => 'social', 'container' => 'ul', 'menu_class' => 'nnc-social-icon' ) ); ?>
			</div>
			<div class="nnc-time">
				<i class="fa fa-calendar-o"></i> 4 Aug, 2016
			</div>
		</div>
	</div>

	<header id="masthead" class="site-header" role="banner">
		<div class="nnc-logo-bar">
			<div class="nnc-container">
				<div class="site-branding nnc-logo">
					<?php
					if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
					endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
					<?php
					endif; ?>
				</div><!-- .site-branding -->

				<!-- widget advertisement -->
				<?php
				     if( is_active_sidebar( 'rainbownews_advertisement' ) ) {
				        if ( !dynamic_sidebar( 'rainbownews_advertisement' ) ):
				        endif;
				     }
			     ?>
				
			</div>
		</div>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<div class="nnc-container">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'rainbownews' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu') ); ?>
			</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->


	<div id="content" class="site-content">
		<div class="nnc-container"> 
			<!-- trending-start -->
		    <div class="nnc-trending-news nnc-clearblock"> 
		        <?php
					if (is_home() || is_front_page()) {
						rainbownews_trending_news();
					}
					else {

					?>
		        <div class="nnc-breadcrumbs nnc-trending-single">
					<?php rainbownews_breadcrumbs(); ?> 
			    </div>
				<?php } ?>

		        <div class="nnc-search nnc-clearblock">
		            <?php get_search_form(); ?>
		        </div> 
		    </div>
		    <!-- trending-end -->

		    