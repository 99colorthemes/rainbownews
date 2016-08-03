<?php  

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function rainbownews_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'rainbownews' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'rainbownews' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title"><span>',
        'after_title'   => '</span></h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Top Advertisement', 'rainbownews' ),
        'id'            => 'rainbownews_top_advertisement',
        'description'   => esc_html__( 'Add widgets here.', 'rainbownews' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Front Page: Left Area', 'rainbownews' ),
        'id'            => 'rainbownews_front_page_left_area',
        'description'   => esc_html__( 'Add widgets here.', 'rainbownews' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Front Page: Right Area', 'rainbownews' ),
        'id'            => 'rainbownews_front_page_right_area',
        'description'   => esc_html__( 'Add widgets here.', 'rainbownews' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Front Page: Top Content Area', 'rainbownews' ),
        'id'            => 'rainbownews_front_page_content_area',
        'description'   => esc_html__( 'Add widgets here.', 'rainbownews' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Front Page: Middle Left Content Area', 'rainbownews' ),
        'id'            => 'rainbownews_front_page_middle_left_content_area',
        'description'   => esc_html__( 'Add widgets here.', 'rainbownews' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Front Page: Middle Right Content Area', 'rainbownews' ),
        'id'            => 'rainbownews_front_page_middle_right_content_area',
        'description'   => esc_html__( 'Add widgets here.', 'rainbownews' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Front Page: Bottom Content Area', 'rainbownews' ),
        'id'            => 'rainbownews_front_page_bottom_content_area',
        'description'   => esc_html__( 'Add widgets here.', 'rainbownews' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Front Page: Latest Posts Area', 'rainbownews' ),
        'id'            => 'rainbownews_front_page_latest_post_area',
        'description'   => esc_html__( 'Add widgets here.', 'rainbownews' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer 1', 'rainbownews' ),
        'id'            => 'rainbownews_footer1_area',
        'description'   => esc_html__( 'Add widgets here.', 'rainbownews' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title"><span>',
        'after_title'   => '</span></h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer 2', 'rainbownews' ),
        'id'            => 'rainbownews_footer2_area',
        'description'   => esc_html__( 'Add widgets here.', 'rainbownews' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title"><span>',
        'after_title'   => '</span></h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer 3', 'rainbownews' ),
        'id'            => 'rainbownews_footer3_area',
        'description'   => esc_html__( 'Add widgets here.', 'rainbownews' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title"><span>',
        'after_title'   => '</span></h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer 4', 'rainbownews' ),
        'id'            => 'rainbownews_footer4_area',
        'description'   => esc_html__( 'Add widgets here.', 'rainbownews' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title"><span>',
        'after_title'   => '</span></h2>',
    ) );

}
add_action( 'widgets_init', 'rainbownews_widgets_init' );


function rainbownews_excerpt( $rainbownews_content , $rainbownews_letter_count){
    $rainbownews_letter_count = !empty($rainbownews_letter_count) ? $rainbownews_letter_count : 100 ;
    $rainbownews_striped_content = strip_shortcodes($rainbownews_content);
    $rainbownews_striped_content = strip_tags($rainbownews_striped_content);
    $rainbownews_excerpt = mb_substr($rainbownews_striped_content, 0 , $rainbownews_letter_count);
    if(strlen($rainbownews_striped_content) > strlen($rainbownews_excerpt)){
        $rainbownews_excerpt.= "...";
    }
    return $rainbownews_excerpt;
}

/*----------  Trending News  ----------*/


function rainbownews_trending_news()
{
    $rainbownews = array('post_type' => 'post',
                                'posts_per_page' => 5,
                                'ignore_sticky_posts' => true,
                                'post_status' => 'publish'
                                );
    $query = new WP_Query($rainbownews);
    ?>


    <div class="nnc-trending-single">
        <div class="nnc-trend-title"><?php echo __('Trending News', 'rainbownews'); ?></div>
        <ul class="newsticker"> 
            <?php
                while($query->have_posts() ){
                    $query->the_post();
                ?> 
                <li class="pm_single_title"><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></li> 
            <?php
            }
            ?>  
        </ul>
    </div> 
    <?php
}


function rainbownews_footer_count(){
$rainbownews_count = 0;
if(is_active_sidebar('rainbownews_footer1_area'))
$rainbownews_count++;

if(is_active_sidebar('rainbownews_footer2_area'))
$rainbownews_count++;

if(is_active_sidebar('rainbownews_footer3_area'))
$rainbownews_count++;

if(is_active_sidebar('rainbownews_footer4_area'))
$rainbownews_count++;

return $rainbownews_count;
}


// rainbownews Category Layouts

if ( ! function_exists( 'rainbownews_category_layout' ) ) :
    function rainbownews_category_layout( $wp_category_id ) {

        $args = array(
            'orderby' => 'id',
            'hide_empty' => 0
        );
        $category = get_categories( $args );
        foreach ($category as $category_list ) {
            $layout = get_theme_mod('rainbownews_category_layout_'.$wp_category_id, 'layout-1');
            return $layout;
        }
    }
endif;
