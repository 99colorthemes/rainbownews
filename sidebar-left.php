<?php
if ( ! is_active_sidebar( 'rainbownews_left_sidebar' ) ) {
return;
}
?>

<aside id="secondary">
   <?php do_action( 'rainbownews_before_sidebar' ); ?>
   <?php if ( ! dynamic_sidebar( 'rainbownews_left_sidebar' ) ) :
      the_widget( 'WP_Widget_Text',
          array(
              'title'  => esc_html__( 'Example Widget', 'rainbownews' ),
              'text'   => sprintf( __( 'This is an example widget to show how the Left Sidebar looks by default. You can add custom widgets from the %swidgets screen%s in the admin. If custom widgets is added than this will be replaced by those widgets.', 'rainbownews' ), current_user_can( 'edit_theme_options' ) ? '<a href="' . admin_url( 'widgets.php' ) . '">' : '', current_user_can( 'edit_theme_options' ) ? '</a>' : '' ),
              'filter' => true,
          ),
          array(
              'before_widget' => '<section id="%1$s" class="widget %2$s">',
              'after_widget'  => '</section>',
              'before_title'  => '<h3 class="widget-title"><span>',
              'after_title'   => '</span></h3>'
          )
      );
   endif; ?>
   <?php do_action( 'rainbownews_after_sidebar' ); ?>

</aside><!-- #secondary -->
