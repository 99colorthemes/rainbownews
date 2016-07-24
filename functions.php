<?php
/**
 * RainbowNews functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package RainbowNews
 */

if ( ! function_exists( 'rainbownews_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function rainbownews_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on RainbowNews, use a find and replace
	 * to change 'rainbownews' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'rainbownews', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'rainbownews' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'rainbownews_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'rainbownews_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rainbownews_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'rainbownews_content_width', 640 );
}
add_action( 'after_setup_theme', 'rainbownews_content_width', 0 );


/**
 * Enqueue scripts and styles.
 */
function rainbownews_scripts() {
	wp_enqueue_style( 'rainbownews-style', get_stylesheet_uri() );

	//Register font-awesome style
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css', false, '4.6.2' );

	//Register responsive style
	wp_enqueue_style( 'rainbownews-responsive', get_template_directory_uri() . '/css/responsive.css', false, '1.0.0' );

	//Register style
	wp_enqueue_style( 'rainbownews-styles', get_template_directory_uri() . '/css/styles.css', false, '1.0.0' );

	//Register swiper
	wp_enqueue_style( 'swiper', get_template_directory_uri() . '/css/swiper.css', false, '1.0.0' );

	//Register jquery
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-2.2.3.js', array( 'jquery' ), '2.2.3', true );

	//Register swiper
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/js/swiper.js', array( 'jquery' ), '3.3.1', true );

	//Register main.js
	wp_enqueue_script( 'rainbownews-main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), '1.0.0', true );

	wp_enqueue_script( 'rainbownews-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'rainbownews-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rainbownews_scripts' );

/**
 * Image Uploader
 */
add_action('admin_enqueue_scripts', 'rainbownews_image_uploader');
function rainbownews_image_uploader() {
	wp_enqueue_media();
	wp_enqueue_script('rainbownews-widget-image-upload', get_template_directory_uri() . '/js/image-uploader.js', false, '20150309', true);
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Rainbow news widget.
 */
require get_template_directory() . '/inc/rainbownews-functions.php'; 

require get_template_directory() . '/inc/rainbownews-widget.php';


/**************************************************************************************/

/*
 * Category Color for widgets and other
 */
if ( !function_exists('rainbownews_colored_category') ) :
   function rainbownews_colored_category() {
      global $post;
      $categories = get_the_category();
      $separator = '&nbsp;';
      $output = '';
      if($categories) {
         $output .= '<div class="above-entry-meta"><span class="cat-links">';
         foreach($categories as $category) {
            $color_code = rainbownews_category_color(get_cat_id($category->cat_name));
            if (!empty($color_code)) {
               $output .= '<a href="'.get_category_link( $category->term_id ).'" style="background:' . rainbownews_category_color(get_cat_id($category->cat_name)) . '" rel="category tag">'.$category->cat_name.'</a>'.$separator;
            } else {
               $output .= '<a href="'.get_category_link( $category->term_id ).'"  rel="category tag">'.$category->cat_name.'</a>'.$separator;
            }
      }
         $output .='</span></div>';
         echo trim($output, $separator);
      }
   }
endif;

/**************************************************************************************/

/*
 * Category Color Options
 */
if ( ! function_exists( 'rainbownews_category_color' ) ) :
function rainbownews_category_color( $wp_category_id ) {
   $args = array(
      'orderby' => 'id',
      'hide_empty' => 0
   );
   $category = get_categories( $args );
   foreach ($category as $category_list ) {
      $color = get_theme_mod('rainbownews_category_color_'.$wp_category_id);
      return $color;
   }
}
endif;