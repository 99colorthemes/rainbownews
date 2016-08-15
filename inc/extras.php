<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package RainbowNews
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function rainbownews_body_classes($classes)
{
    // Adds a class of group-blog to blogs with more than 1 published author.
    if (is_multi_author()) {
        $classes[] = 'group-blog';
    }

    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    // Add class site layout style.
    if ( get_theme_mod ( 'rainbownews_site_layout', 'wide' ) == 'wide' ) {
        $classes[] = 'wide';
    } else {
        $classes[] = 'box';
    }

    return $classes;
}

add_filter('body_class', 'rainbownews_body_classes');


function rainbownews_page_post_layout($rainbownews_classes)
{

    global $post;

    $rainbownews_cat_sidebar_layout = get_theme_mod('rainbownews_category_sidebar_setting', 'right-sidebar');
    $rainbownews_default_sidebar_layout = get_theme_mod('rainbownews_default_sidebar_setting', 'right-sidebar');

    if (is_home() || is_page_template('template-home.php') || is_front_page()) {

        $rainbownews_classes[] = '';

    }
    elseif (is_singular()) {

        $rainbownews_post_class = get_post_meta($post->ID, 'rainbownews_page_specific_layout', true);

        if (empty($rainbownews_post_class)) {

            $rainbownews_post_class = 'right-sidebar';
            $rainbownews_classes[] = $rainbownews_post_class;

        } else {

            $rainbownews_post_class = get_post_meta($post->ID, 'rainbownews_page_specific_layout', true);
            $rainbownews_classes[] = $rainbownews_post_class;

        }

    }
    elseif (is_category()) {

        if (empty($rainbownews_cat_sidebar_layout)) {

            $rainbownews_classes[] = 'right-sidebar';

        }
        else {

            $rainbownews_classes[] = $rainbownews_cat_sidebar_layout;
        }
    }
    elseif (is_archive()) {

        if (empty($rainbownews_default_sidebar_layout)) {

            $rainbownews_classes[] = 'right-sidebar';

        } else {

            $rainbownews_classes[] = $rainbownews_default_sidebar_layout;

        }
    }
    elseif (is_search()) {

        if (empty($rainbownews_default_sidebar_layout)) {

            $rainbownews_classes[] = 'right-sidebar';

        } else {

            $rainbownews_classes[] = $rainbownews_default_sidebar_layout;

        }
    }
    elseif (is_404()) {

        $rainbownews_classes[] = '';

    }
    else {

        $rainbownews_classes[] = 'right-sidebar';

    }

    return $rainbownews_classes;
}

add_filter('body_class', 'rainbownews_page_post_layout');
