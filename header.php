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
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#main"><?php esc_html_e('Skip to content', 'rainbownews'); ?></a>

   <?php  if ( get_theme_mod( 'rainbownews_top_bar_activate' ) == '1' ) : ?>

    <div class="nnc-top-header">
        <div class="nnc-container">
            <?php if ( has_nav_menu( 'top-menu' ) ) : ?>
            <div class="nnc-top-menu">
                <?php wp_nav_menu(array('theme_location' => 'top-menu', 'menu_id' => 'top-menu')); ?>
            </div>
            <?php endif; ?>

            <?php if ( has_nav_menu( 'social-icon' ) ) : ?>
            <div class="nnc-social">
                <?php wp_nav_menu(array('theme_location' => 'social-icon', 'menu_id' => 'social-menu')); ?>
            </div><?php endif; ?>

            <?php  if ( get_theme_mod( 'rainbownews_top_bar_date' ) == '1' ) : ?>

                <div class="nnc-time">
                    <i class="fa fa-calendar"></i> <?php echo date_i18n( 'l, F j, Y', time() ); ?>
                </div>

            <?php endif; ?>

        </div>
    </div>

    <?php endif; ?>

    <header id="masthead" class="site-header" role="banner">
        <div class="nnc-logo-bar">
            <div class="nnc-container">
                <div class="site-branding">

                    <?php if ((get_theme_mod('rainbownews_header_logo_placement', 'header_text_only') == 'show_both'
                            || get_theme_mod('rainbownews_header_logo_placement', 'header_text_only') == 'header_logo_only')
                            && has_custom_logo()) : ?>

                        <div class="nnc-logo-img">
                            <?php rainbownews_the_custom_logo(); ?>
                        </div>

                    <?php endif; ?>

                    <div class="nnc-logo">
                        <?php
                        if (is_front_page() && is_home()) : ?>
                            <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                                      rel="home"><?php bloginfo('name'); ?></a></h1>
                        <?php else : ?>
                            <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                                     rel="home"><?php bloginfo('name'); ?></a></p>
                            <?php
                        endif;

                        $description = get_bloginfo('description', 'display');
                        if ($description || is_customize_preview()) : ?>
                            <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                            <?php
                        endif; ?>
                    </div>
                </div><!-- .site-branding -->

                <!-- widget advertisement -->
                <?php
                if (is_active_sidebar('rainbownews_advertisement')) {
                    if (!dynamic_sidebar('rainbownews_advertisement')):
                    endif;
                }
                ?>

            </div>
        </div>

        <?php /*<nav id="site-navigation" class="main-navigation" role="navigation">
            <div class="nnc-container">
                <button class="menu-toggle" aria-controls="primary-menu"
                        aria-expanded="false"><?php esc_html_e('Primary Menu', 'rainbownews'); ?></button>
                <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'primary-menu')); ?>
            </div>
        </nav><!-- #site-navigation -->
    */ ?>

        <?php if ( has_nav_menu( 'primary' ) ) : ?>
        <div class="nnc-main-navigation">
            <div class="nnc-container">
                <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'primary-menu')); ?>
            </div
        </div>
        <?php endif; ?>

    </header><!-- #masthead -->

    <div id="content" class="site-content">
        <div class="nnc-container">
            <!-- trending-start -->
            <div class="nnc-trending-news nnc-clearblock">

                <?php

                if(get_theme_mod('rainbownews_top_bar_ticker') == 1 || get_theme_mod('rainbownews_activate_breadcrumb') == 1 ) :

                $news_ticker = get_theme_mod('rainbownews_new_ticker_layout', 'latest_post');

                if (is_home() || is_front_page()) {
                    if ($news_ticker == 'category_post') {
                        rainbownews_category_news();
                    } else {
                        if ($news_ticker == 'popular_post') {
                            rainbownews_latest_news();
                        } else {
                            rainbownews_trending_news();
                        }
                    }
                }
                else {
                    ?>
                    <div class="nnc-breadcrumbs nnc-trending-single">
                        <?php rainbownews_breadcrumbs(); ?>
                    </div>

                <?php } ?>

                <?php endif; ?>

                <?php if(get_theme_mod('rainbownews_activate_search') == 1) : ?>

                <div class="nnc-search nnc-clearblock">
                    <?php get_search_form(); ?>
                </div>

                <?php endif; ?>

            </div>
            <!-- trending-end -->

		    