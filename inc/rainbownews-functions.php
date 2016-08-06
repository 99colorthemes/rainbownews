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
        'name'          => esc_html__( 'Advertisement', 'rainbownews' ),
        'id'            => 'rainbownews_advertisement',
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







/****************************** BREADCRUMBS ******************************************/
if ( ! function_exists( 'rainbownews_breadcrumbs' ) ) :
    /**
     * Display Breadcrumbs
     *
     * This code is a modified version of Melissacabral's original menu code for dimox_breadcrumbs().
     *
     */

    function rainbownews_breadcrumbs($delimiter='') {
        global $post;
        //$rainbownews_breadcrumb_option_single = get_post_meta( $post->ID, 'rainbownews_breadcrumbs_options', true );
        //$rainbownews_breadcrumb_option_text_single = get_post_meta( $post->ID, 'rainbownews_breadcrumbs_separator', true );
        $rainbownews_et_to = get_theme_mod('rainbownews_breadcrumbs_activate',1);

        //$rainbownews_breadcrumb_option_single = 'enable-breadcrumbs';
        if($rainbownews_et_to == 1):
            $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
            if(isset($rainbownews_et_to['breadcrumb_separator'])){
                $delimiter = '<span class="breadcrumb_separator">'.$rainbownews_et_to['breadcrumb_separator'].'</span>';
            }else{
                $delimiter = '<span class="breadcrumb_separator"> <i class="fa fa-angle-right"></i> </span>'; // delimiter between crumbs
            }

            if(isset($rainbownews_et_to['breadcrumb_home_text'])){
                $home = $rainbownews_et_to['breadcrumb_home_text'];
            }else{
                $home = '<i class="fa fa-home"></i>'; // text for the 'Home' link
            }

            $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
            $before = '<span class="current">'; // tag before the current crumb
            $after = '</span>'; // tag after the current crumb

            $homeLink = esc_url( home_url() );

            if (is_home() || is_front_page()) {
                if ($showOnHome == 1) echo '<div id="rainbownews--breadcrumbs"><div class="pm-container"><a href="' . $homeLink . '" class="breadcrumb_home_text">' . $home . '</a></div></div>';
            } else {
                echo '<div id="rainbownews--breadcrumbs"><div class="pm-container"><a href="' . $homeLink . '" class="breadcrumb_home_text">' . $home . '</a>' . $delimiter . ' ';

                if ( is_category() ) {
                    $thisCat = get_category(get_query_var('cat'), false);
                    if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
                    echo $before . single_cat_title('', false) . $after;

                } elseif ( is_search() ) {
                    echo $before . 'Search results for "' . get_search_query() . '"' . $after;

                } elseif ( is_day() ) {
                    echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
                    echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
                    echo $before . get_the_time('d') . $after;

                } elseif ( is_month() ) {
                    echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
                    echo $before . get_the_time('F') . $after;

                } elseif ( is_year() ) {
                    echo $before . get_the_time('Y') . $after;

                } elseif ( is_single() && !is_attachment() ) {
                    if ( get_post_type() != 'post' ) {
                        $post_type = get_post_type_object(get_post_type());
                        $slug = $post_type->rewrite;
                        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
                        if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
                    } else {
                        $cat = get_the_category(); $cat = $cat[0];
                        $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                        if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
                        echo $cats;
                        if ($showCurrent == 1) echo $before . get_the_title() . $after;
                    }

                } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
                    $post_type = get_post_type_object(get_post_type());
                    echo $before . $post_type->labels->singular_name . $after;

                } elseif ( is_attachment() ) {
                    $parent = get_post($post->post_parent);
                    $cat = get_the_category($parent->ID); $cat = $cat[0];
                    echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                    echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
                    if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

                } elseif ( is_page() && !$post->post_parent ) {
                    if ($showCurrent == 1) echo $before . get_the_title() . $after;

                } elseif ( is_page() && $post->post_parent ) {
                    $parent_id  = $post->post_parent;
                    $breadcrumbs = array();
                    while ($parent_id) {
                        $page = get_page($parent_id);
                        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                        $parent_id  = $page->post_parent;
                    }
                    $breadcrumbs = array_reverse($breadcrumbs);
                    for ($i = 0; $i < count($breadcrumbs); $i++) {
                        echo $breadcrumbs[$i];
                        if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
                    }
                    if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

                } elseif ( is_tag() ) {
                    echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;

                } elseif ( is_author() ) {
                    global $author;
                    $userdata = get_userdata($author);
                    echo $before . 'Articles posted by ' . $userdata->display_name . $after;

                } elseif ( is_404() ) {
                    echo $before . 'Error 404' . $after;
                }

                if ( get_query_var('paged') ) {
                    if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
                    echo __('Page' , 'power-mag') . ' ' . get_query_var('paged');
                    if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
                }

                echo '</div></div>';

            }
        endif;
    } // end rainbownews_breadcrumbs()
endif;




