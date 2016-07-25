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

    class RAINBOWNEWS_Image_Radio_Control extends WP_Customize_Control {
    
         public function render_content() {
    
            if ( empty( $this->choices ) )
               return;
    
            $name = '_customize-radio-' . $this->id;
    
            ?>
            <style>
               #<?php echo $this->id; ?> .rainbownews-radio-img-img {
                  border: 3px solid #DEDEDE;
                  margin: 0 5px 5px 0;
                  cursor: pointer;
                  border-radius: 3px;
                  -moz-border-radius: 3px;
                  -webkit-border-radius: 3px;
               }
               #<?php echo $this->id; ?> .rainbownews-radio-img-selected {
                  border: 3px solid #AAA;
                  border-radius: 3px;
                  -moz-border-radius: 3px;
                  -webkit-border-radius: 3px;
               }
               input[type=checkbox]:before {
                  content: '';
                  margin: -3px 0 0 -4px;
               }
            </style>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <ul class="controls" id='<?php echo $this->id; ?>'>
            <?php
               foreach ( $this->choices as $value => $label ) :
                  $class = ($this->value() == $value)?'rainbownews-radio-img-selected rainbownews-radio-img-img':'rainbownews-radio-img-img';
                  ?>
                  <li style="display: inline;">
                  <label>
                     <input <?php $this->link(); ?>style = 'display:none' type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />
                     <img src = '<?php echo esc_html( $label ); ?>' class = '<?php echo $class; ?>' />
                  </label>
                  </li>
                  <?php
               endforeach;
            ?>
            </ul>
            <script type="text/javascript">
    
               jQuery(document).ready(function($) {
                  $('.controls#<?php echo $this->id; ?> li img').click(function(){
                     $('.controls#<?php echo $this->id; ?> li').each(function(){
                        $(this).find('img').removeClass ('rainbownews-radio-img-selected') ;
                     });
                     $(this).addClass ('rainbownews-radio-img-selected') ;
                  });
               });
    
            </script>
            <?php
         }
      }


   // Latest  News layout Options
    $wp_customize->add_panel('rainbownews_theme_options', array(
       'capabitity' => 'edit_theme_options',
       'description' => __('Theme options settings here', 'rainbownews'),
       'priority' => 3,
       'title' => __('Theme Options', 'rainbownews')
    ));
    
    //Theme Menu option
     $wp_customize->add_section('rainbownews_menu_section', array(
      'priority' => 1,
      'title' => __('Menu Settings', 'rainbownews'),
         'panel' => 'rainbownews_theme_options'
   ));

   $wp_customize->add_setting('rainbownews_latest_news_layout_type_setting', array(
      'default' => 1,
         'capability' => 'edit_theme_options',
      'sanitize_callback' => 'menu_type_coumbobox_sanitize'
   ));

   $wp_customize->add_setting('rainbownews_latest_news_layout_style_setting', array(
      'default' => 'menu-1',
         'capability' => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_text_field'
   ));

  $wp_customize->add_control(new  RAINBOWNEWS_Image_Radio_Control($wp_customize, 'rainbownews_latest_news_layout_style_setting', array(
      'type' => 'radio',
      'label' => __('Latest News Styles', 'rainbownews'),
      'section' => 'rainbownews_menu_section',
      'settings' => 'rainbownews_latest_news_layout_style_setting',
      'choices' => array(
         'menu-1' =>  RAINBOWNEWS_ADMIN_IMAGES_URL . '/latest_news_layout1.png',
         'menu-2' =>  RAINBOWNEWS_ADMIN_IMAGES_URL . '/latest_news_layout2.png', 
      )
   )));
    
    //Menu Style sanitization
    function menu_style_coumbobox_sanitize( $input ) {
        $valid = array(
                        '1' => __( 'Style 1' , 'rainbownews' ),
                        '2' => __( 'Style 2' , 'rainbownews' ), 
                        );
        if( array_key_exists( $input, $valid ) ) {
            return $input;
        } else {
            return '';
        }
    }

   










	// Category Color Options
   $wp_customize->add_panel('rainbownews_category_color_panel', array(
      'priority' => 10,
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
