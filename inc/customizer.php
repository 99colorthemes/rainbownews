<?php
/**
 * RainbowNews Theme Customizer.
 *
 * @package RainbowNews
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function rainbownews_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    require_once get_template_directory() . '/inc/wp-customize-class.php';

/********************************* IMPORTANT-LINKS ****************************************/
    $wp_customize->add_section(
        'rainbownews_important_links',
        array(
            'priority' => 1,
            'title' => esc_html__('Rainbownews Important Links', 'rainbownews')
        )
    );

    /**
     * This setting has the dummy Sanitization function as it contains no value to be sanitized
     */
    $wp_customize->add_setting(
        'rainbownews_important_links',
        array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'rainbownews_sanitize_links'
        )
    );

    $wp_customize->add_control(
        new RainbowNews_Important_Links(
            $wp_customize,
            'important_links',
            array(
                'section' => 'rainbownews_important_links',
                'settings' => 'rainbownews_important_links'
            )
        )
    );
/********************************* END OF IMPORTANT-LINKS ****************************************/

/********************************* SITE-IDENTITY-OPTIONS ****************************************/
// logo and site title position options
    $wp_customize->add_setting(
        'rainbownews_header_logo_placement',
        array(
            'default' => 'header_text_only',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'rainbownews_sanitize_radio'
        )
    );

    $wp_customize->add_control(
        'rainbownews_header_logo_placement',
        array(
            'type' => 'radio',
            'priority' => 20,
            'label' => esc_html__('Choose the option that you want from below.', 'rainbownews'),
            'section' => 'title_tagline',
            'choices' => array(
                'header_logo_only' => esc_html__('Header Logo Only', 'rainbownews'),
                'header_text_only' => esc_html__('Header Text Only', 'rainbownews'),
                'show_both' => esc_html__('Show Both', 'rainbownews'),
                'disable' => esc_html__('Disable', 'rainbownews')
            )
        )
    );
/*********************************END OF SITE-IDENTITY-OPTIONS ****************************************/

/************************************** THEME-OPTIONS *******************************************************/

    // Theme Options panel
    $wp_customize->add_panel('rainbownews_theme_options', array(
        'capabitity' => 'edit_theme_options',
        'description' => __('Theme options settings here', 'rainbownews'),
        'priority' => 500,
        'title' => __('Theme Options', 'rainbownews')
    ));

    $wp_customize->add_section('rainbownews_sidebar_section', array(
        'priority' => 15,
        'title' => __('Category Sidebar Settings', 'rainbownews'),
        'panel' => 'rainbownews_theme_options'
    ));

    $wp_customize->add_setting('rainbownews_category_sidebar_setting', array(
        'default' => __('right-sidebar', 'rainbownews'),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control(new RainbowNews_Image_Radio_Control($wp_customize, 'rainbownews_category_sidebar_setting', array(
        'type' => 'radio',
        'label' => esc_html__('Select Category Sidebar layout for category. This layout will be reflected in all category page.', 'rainbownews'),
        'section' => 'rainbownews_sidebar_section',
        'settings' => 'rainbownews_category_sidebar_setting',
        'choices' => array(
            'right-sidebar' => RAINBOWNEWS_IMAGES_ADMIN_URL . '/right-sidebar.png',
            'left-sidebar' => RAINBOWNEWS_IMAGES_ADMIN_URL . '/left-sidebar.png',
            'no-sidebar'	=> RAINBOWNEWS_IMAGES_ADMIN_URL . '/no-sidebar-content-centered-layout.png',
            //'both-sidebar'	=> RAINBOWNEWS_IMAGES_ADMIN_URL . '/both-sidebar.png'
        )
    )));

    $wp_customize->add_section('rainbownews_default_sidebar_section', array(
        'priority' => 10,
        'title' => __('Default Sidebar Settings', 'rainbownews'),
        'panel' => 'rainbownews_theme_options'
    ));


    $wp_customize->add_setting('rainbownews_default_sidebar_setting', array(
        'default' => __('right-sidebar', 'rainbownews'),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control(new RainbowNews_Image_Radio_Control($wp_customize, 'rainbownews_default_sidebar_setting', array(
        'type' => 'radio',
        'label' => esc_html__('Select default layout for default pages.', 'rainbownews'),
        'section' => 'rainbownews_default_sidebar_section',
        'settings' => 'rainbownews_default_sidebar_setting',
        'choices' => array(
            'right-sidebar' => RAINBOWNEWS_IMAGES_ADMIN_URL . '/right-sidebar.png',
            'left-sidebar' => RAINBOWNEWS_IMAGES_ADMIN_URL . '/left-sidebar.png',
            'no-sidebar'	=> RAINBOWNEWS_IMAGES_ADMIN_URL . '/no-sidebar-content-centered-layout.png',
            //'both-sidebar'	=> RAINBOWNEWS_IMAGES_ADMIN_URL . '/both-sidebar.png'
        )
    )));

    $wp_customize->add_section('rainbownews_category_setting', array(
        'priority' => 20,
        'title' => __('Category Settings', 'rainbownews'),
        'panel' => 'rainbownews_theme_options'
    ));

    $i = 1;
    $args = array(
        'orderby' => 'id',
        'hide_empty' => 0
    );
    $categories = get_categories($args);
    $wp_category_list = array();
    foreach ($categories as $category_list) {
        $wp_category_list[$category_list->cat_ID] = $category_list->cat_name;

        $wp_customize->add_setting('rainbownews_category_separator_' . get_cat_id($wp_category_list[$category_list->cat_ID]), array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'rainbownews_separator_label_sanitize'
        ));

        //category color

        $wp_customize->add_setting('rainbownews_category_color_' . get_cat_id($wp_category_list[$category_list->cat_ID]), array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'rainbownews_color_option_hex_sanitize',
            'sanitize_js_callback' => 'rainbownews_color_escaping_option_sanitize'
        ));

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'rainbownews_category_color_' . get_cat_id($wp_category_list[$category_list->cat_ID]), array(
            'label' => sprintf(__('%s', 'rainbownews'), $wp_category_list[$category_list->cat_ID]),
            'section' => 'rainbownews_category_setting',
            'settings' => 'rainbownews_category_color_' . get_cat_id($wp_category_list[$category_list->cat_ID]),
            'priority' => $i
        )));

        // category Layout
        $wp_customize->add_setting('rainbownews_category_layout_' . get_cat_id($wp_category_list[$category_list->cat_ID]), array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
            //'sanitize_js_callback' => 'rainbownews_color_escaping_option_sanitize'
        ));


        $wp_customize->add_control('rainbownews_category_layout_' . get_cat_id($wp_category_list[$category_list->cat_ID]), array(
            'type' => 'select',
            'label' => __('Layout', 'rainbownews'),
            'section' => 'rainbownews_category_setting',
            'settings' => 'rainbownews_category_layout_' . get_cat_id($wp_category_list[$category_list->cat_ID]),
            'choices' => array(
                'layout-1' => __('Layout 1', 'rainbownews'),
                'layout-2' => __('Layout 2', 'rainbownews'),
            ),
            'priority' => $i
        ));

        $i++;
    }


    /************************************** THEME-OPTIONS *******************************************************/

    /************************************** FUNCTION SANITIZE*******************************************************/
// sanitization of links
    function rainbownews_sanitize_links()
    {
        return false;
    }

// radio sanitization
    function rainbownews_sanitize_radio($input, $setting)
    {
        // Ensuring that the input is a slug.
        $input = sanitize_key($input);
        // Get the list of choices from the control associated with the setting.
        $choices = $setting->manager->get_control($setting->id)->choices;
        // If the input is a valid key, return it, else, return the default.
        return (array_key_exists($input, $choices) ? $input : $setting->default);
    }

// color sanitization
    function rainbownews_color_option_hex_sanitize($color)
    {
        if ($unhashed = sanitize_hex_color_no_hash($color))
            return '#' . $unhashed;

        return $color;
    }

    function rainbownews_color_escaping_option_sanitize($input)
    {
        $input = esc_attr($input);
        return $input;
    }

    /**************************************END FUNCTION SANITIZE*******************************************************/

}

add_action('customize_register', 'rainbownews_customize_register');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function rainbownews_customize_preview_js()
{
    wp_enqueue_script('rainbownews_customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '20151215', true);
}

add_action('customize_preview_init', 'rainbownews_customize_preview_js');
