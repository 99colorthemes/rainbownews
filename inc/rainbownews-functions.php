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
        'name'          => esc_html__( 'Top Advertisement (728x90)', 'rainbownews' ),
        'id'            => 'rainbownews_top_advertisement',
        'description'   => esc_html__( 'Add widgets here.', 'rainbownews' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'rainbownews_widgets_init' );
