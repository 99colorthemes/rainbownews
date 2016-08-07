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
function rainbownews_customize_register($wp_customize) {
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

    // Category Color Options
    $wp_customize->add_panel('rainbownews_category_panel', array(
        'priority' => 535,
        'title' => __('Category Options', 'rainbownews'),
        'capability' => 'edit_theme_options',
        'description' => __('Change the Layout and Color of each category items as you want.', 'rainbownews')
    ));

    $wp_customize->add_section('rainbownews_category_setting', array(
        'priority' => 1,
        'title' => __('Category Settings', 'rainbownews'),
        'panel' => 'rainbownews_category_panel'
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

        $wp_customize->add_setting('rainbownews_category_separator_'.get_cat_id($wp_category_list[$category_list->cat_ID]), array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'rainbownews_separator_label_sanitize'
        ));

      /*  $wp_customize->add_control(new RainbowNews_Mag_Label_Highlight($wp_customize, 'rainbownews_category_separator_'.get_cat_id($wp_category_list[$category_list->cat_ID]), array(
            'label' => sprintf(__('%s', 'rainbownews'), $wp_category_list[$category_list->cat_ID] ),
            'section' => 'rainbownews_category_setting',
            'settings' => 'rainbownews_category_separator_'.get_cat_id($wp_category_list[$category_list->cat_ID]),
            'priority' => $i
        )));*/

        //category color

        $wp_customize->add_setting('rainbownews_category_color_'.get_cat_id($wp_category_list[$category_list->cat_ID]), array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'rainbownews_color_option_hex_sanitize',
            'sanitize_js_callback' => 'rainbownews_color_escaping_option_sanitize'
        ));

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'rainbownews_category_color_'.get_cat_id($wp_category_list[$category_list->cat_ID]), array(
            'label' => sprintf(__('%s', 'rainbownews'), $wp_category_list[$category_list->cat_ID] ),
            'section' => 'rainbownews_category_setting',
            'settings' => 'rainbownews_category_color_'.get_cat_id($wp_category_list[$category_list->cat_ID]),
            'priority' => $i
        )));

        // category Layout
        $wp_customize->add_setting('rainbownews_category_layout_'.get_cat_id($wp_category_list[$category_list->cat_ID]), array(
            'default' => '',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
            //'sanitize_js_callback' => 'rainbownews_color_escaping_option_sanitize'
        ));


        $wp_customize->add_control('rainbownews_category_layout_'.get_cat_id($wp_category_list[$category_list->cat_ID]), array(
            'type' => 'select',
            'label' => __('Layout', 'rainbownews'),
            'section' => 'rainbownews_category_setting',
            'settings' => 'rainbownews_category_layout_'.get_cat_id($wp_category_list[$category_list->cat_ID]),
            'choices' => array(
                'layout-1' => __('Layout 1', 'rainbownews'),
                'layout-2' => __('Layout 2', 'rainbownews'),
            ),
            'priority' => $i
        ));

        $i++;
    }




/************************************** THEME-OPTIONS *******************************************************/
$wp_customize->add_panel(
    'rainbownews_design_options',
    array(
        'capabitity'            => 'edit_theme_options',
        'priority'              => 220,
        'title'                 => esc_html__('Theme Options', 'rainbownews')
    )
);

// site layout setting
$wp_customize->add_section(
    'rainbownews_site_layout_section',
    array(
        'priority'              => 15,
        'title'                 => esc_html__( 'Site Layout', 'rainbownews' ),
        'panel'                 => 'rainbownews_design_options'
    )
);

$wp_customize->add_setting(
    'rainbownews_site_layout',
    array(
        'default'               => 'wide',
        'capability'            => 'edit_theme_options',
        'sanitize_callback'     => 'rainbownews_sanitize_radio'
    )
);

$wp_customize->add_control(
    'rainbownews_site_layout',
    array(
        'type'               => 'radio',
        'priority'           => 10,
        'label'              => esc_html__('Choose your site layout. The change is reflected in whole site.', 'rainbownews'),
        'section'            => 'rainbownews_site_layout_section',
        'choices'            => array(
            'box'            => esc_html__('Boxed layout', 'rainbownews'),
            'wide'           => esc_html__('Wide layout', 'rainbownews')
        )
    )
);

// Default Layout
$wp_customize->add_section(
    'rainbownews_global_layout_section',
    array(
        'priority'              => 30,
        'title'                 => esc_html__( 'Default Layout', 'rainbownews' ),
        'panel'                 => 'rainbownews_design_options'
    )
);

$wp_customize->add_setting(
    'rainbownews_global_layout',
    array(
        'default'               => 'right_sidebar',
        'capability'            => 'edit_theme_options',
        'sanitize_callback'     => 'rainbownews_sanitize_radio'
    )
);

$wp_customize->add_control(
    new RAINBOWNEWS_Image_Radio_Control(
        $wp_customize,
        'rainbownews_global_layout',
        array(
            'type'               => 'radio',
            'priority'           => 10,
            'label'              => esc_html__('Select default layout. This layout will be reflected in whole site archives, categories, search page etc. The layout for a single post and page can be controlled from below options.', 'rainbownews'),
            'section'            => 'rainbownews_global_layout_section',
            'choices'            => array(
                'right_sidebar'               => RAINBOWNEWS_IMAGES_ADMIN_URL . '/right-sidebar.png',
                'left_sidebar'                => RAINBOWNEWS_IMAGES_ADMIN_URL . '/left-sidebar.png',
                'no_sidebar_full_width'       => RAINBOWNEWS_IMAGES_ADMIN_URL . '/no-sidebar-full-width-layout.png',
                'no_sidebar_content_centered' => RAINBOWNEWS_IMAGES_ADMIN_URL . '/no-sidebar-content-centered-layout.png'
            )
        )
    )
);

// Default Pages Layout
$wp_customize->add_section(
    'rainbownews_default_page_layout_section',
    array(
        'priority'              => 45,
        'title'                 => esc_html__( 'Default Page Layout', 'rainbownews' ),
        'panel'                 => 'rainbownews_design_options'
    )
);

$wp_customize->add_setting(
    'rainbownews_default_page_layout',
    array(
        'default'               => 'right_sidebar',
        'capability'            => 'edit_theme_options',
        'sanitize_callback'     => 'rainbownews_sanitize_radio'
    )
);

$wp_customize->add_control(
    new RAINBOWNEWS_Image_Radio_Control(
        $wp_customize,
        'rainbownews_default_page_layout',
        array(
            'type'               => 'radio',
            'priority'           => 10,
            'label'              => esc_html__('Select default layout for pages. This layout will be reflected in all pages unless unique layout is set for specific page.', 'rainbownews'),
            'section'            => 'rainbownews_default_page_layout_section',
            'choices'            => array(
                'right_sidebar'               => RAINBOWNEWS_IMAGES_ADMIN_URL . '/right-sidebar.png',
                'left_sidebar'                => RAINBOWNEWS_IMAGES_ADMIN_URL . '/left-sidebar.png',
                'no_sidebar_full_width'       => RAINBOWNEWS_IMAGES_ADMIN_URL . '/no-sidebar-full-width-layout.png',
                'no_sidebar_content_centered' => RAINBOWNEWS_IMAGES_ADMIN_URL . '/no-sidebar-content-centered-layout.png'
            )
        )
    )
);

// Default Single Post Layout
$wp_customize->add_section(
    'rainbownews_default_single_post_layout_section',
    array(
        'priority'              => 60,
        'title'                 => esc_html__( 'Default Single Post Layout', 'rainbownews' ),
        'panel'                 => 'rainbownews_design_options'
    )
);

$wp_customize->add_setting(
    'rainbownews_default_single_post_layout',
    array(
        'default'               => 'right_sidebar',
        'capability'            => 'edit_theme_options',
        'sanitize_callback'     => 'rainbownews_sanitize_radio'
    )
);

$wp_customize->add_control(
    new RAINBOWNEWS_Image_Radio_Control(
        $wp_customize,
        'rainbownews_default_single_post_layout',
        array(
            'type'               => 'radio',
            'priority'           => 10,
            'label'              => esc_html__('Select default layout for single posts. This layout will be reflected in all single posts unless unique layout is set for specific post.', 'rainbownews'),
            'section'            => 'rainbownews_default_single_post_layout_section',
            'choices'            => array(
                'right_sidebar'               => RAINBOWNEWS_IMAGES_ADMIN_URL . '/right-sidebar.png',
                'left_sidebar'                => RAINBOWNEWS_IMAGES_ADMIN_URL . '/left-sidebar.png',
                'no_sidebar_full_width'       => RAINBOWNEWS_IMAGES_ADMIN_URL . '/no-sidebar-full-width-layout.png',
                'no_sidebar_content_centered' => RAINBOWNEWS_IMAGES_ADMIN_URL . '/no-sidebar-content-centered-layout.png'
            )
        )
    )
);

/************************************** THEME-OPTIONS *******************************************************/



// radio sanitization
function rainbownews_sanitize_radio( $input, $setting ) {
    // Ensuring that the input is a slug.
    $input = sanitize_key( $input );
    // Get the list of choices from the control associated with the setting.
    $choices = $setting->manager->get_control( $setting->id )->choices;
    // If the input is a valid key, return it, else, return the default.
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
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
