<?php 
register_nav_menus( array(
        'primary' => esc_html__( 'Primary', 'rainbownews' ),
        'top-header' => esc_html__( 'Top Header', 'rainbownews' ),
    ) ); 

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
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
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
        'name'          => esc_html__( 'Front Page: Latest Post', 'rainbownews' ),
        'id'            => 'rainbownews_front_page_latest_post',
        'description'   => esc_html__( 'Add widgets here.', 'rainbownews' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Front Page: Content Area', 'rainbownews' ),
        'id'            => 'rainbownews_front_page_content_area',
        'description'   => esc_html__( 'Add widgets here.', 'rainbownews' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'rainbownews_widgets_init' );


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