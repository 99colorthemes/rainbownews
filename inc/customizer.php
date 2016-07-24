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
function rainbownews_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';



	// Category Color Options
   $wp_customize->add_panel('rainbownews_category_color_panel', array(
      'priority' => 535,
      'title' => __('Category Color Options', 'rainbownews'),
      'capability' => 'edit_theme_options',
      'description' => __('Change the color of each category items as you want.', 'rainbownews')
   ));

   $wp_customize->add_section('rainbownews_category_color_setting', array(
      'priority' => 1,
      'title' => __('Category Color Settings', 'rainbownews'),
      'panel' => 'rainbownews_category_color_panel'
   ));

   $i = 1;
   $args = array(
       'orderby' => 'id',
       'hide_empty' => 0
   );
   $categories = get_categories( $args );
   $wp_category_list = array();
   foreach ($categories as $category_list ) {
      $wp_category_list[$category_list->cat_ID] = $category_list->cat_name;

      $wp_customize->add_setting('rainbownews_category_color_'.get_cat_id($wp_category_list[$category_list->cat_ID]), array(
         'default' => '',
         'capability' => 'edit_theme_options',
         'sanitize_callback' => 'rainbownews_color_option_hex_sanitize',
         'sanitize_js_callback' => 'rainbownews_color_escaping_option_sanitize'
      ));

      $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'rainbownews_category_color_'.get_cat_id($wp_category_list[$category_list->cat_ID]), array(
         'label' => sprintf(__('%s', 'rainbownews'), $wp_category_list[$category_list->cat_ID] ),
         'section' => 'rainbownews_category_color_setting',
         'settings' => 'rainbownews_category_color_'.get_cat_id($wp_category_list[$category_list->cat_ID]),
         'priority' => $i
      )));
      $i++;
   }
 // color sanitization
   function rainbownews_color_option_hex_sanitize($color) {
      if ($unhashed = sanitize_hex_color_no_hash($color))
         return '#' . $unhashed;

      return $color;
   }

   function rainbownews_color_escaping_option_sanitize($input) {
      $input = esc_attr($input);
      return $input;
   }

}
add_action( 'customize_register', 'rainbownews_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function rainbownews_customize_preview_js() {
	wp_enqueue_script( 'rainbownews_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'rainbownews_customize_preview_js' );
