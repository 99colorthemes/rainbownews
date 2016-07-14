<?php
/**
 * RainbowNews functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package RainbowNews
 */

/* 
Rainbownews Slider Widget Section
*/ 
add_action( 'widgets_init', 'register_rainbownews_featured_post_layout1' );

function register_rainbownews_featured_post_layout1()
{
    register_widget("rainbownews_featured_post_layout1");
}

class rainbownews_featured_post_layout1 extends WP_Widget {

    function __construct() {
        $widget_ops = array( 'classname' => 'widget_featured_post_layout1 widget_featured_meta', 'description' =>__( 'Display latest posts or posts of specific category.' , 'colormag') );
        $control_ops = array( 'width' => 200, 'height' =>250 );
        parent::__construct( false,$name= __( ' NNC: Featured Posts (Layout 1)', 'rainbownews' ),$widget_ops);
    }

    function form( $instance ) {
        $tg_defaults['title'] = '';
        $tg_defaults['text'] = '';
        $tg_defaults['number'] = 4;
        $tg_defaults['type'] = 'latest';
        $tg_defaults['category'] = '';
        $instance = wp_parse_args( (array) $instance, $tg_defaults );
        $title = esc_attr( $instance[ 'title' ] );
        $text = esc_textarea($instance['text']);
        $number = $instance['number'];
        $type = $instance['type'];
        $category = $instance['category'];
        ?>
        <p><?php _e( 'Layout will be as below:', 'rainbownews' ) ?></p>
      <!--   <div style="text-align: center;"><img src="<?php echo get_template_directory_uri() . '/img/style-1.jpg'?>"></div> -->
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'rainbownews' ); ?></label>
            <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <?php _e( 'Description','rainbownews' ); ?>
        <textarea class="widefat" rows="5" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
        <p>
            <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e( 'Number of posts to display:', 'rainbownews' ); ?></label>
            <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
        </p>

        <p><input type="radio" <?php checked($type, 'latest') ?> id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" value="latest"/><?php _e( 'Show latest Posts', 'rainbownews' );?><br />
            <input type="radio" <?php checked($type,'category') ?> id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" value="category"/><?php _e( 'Show posts from a category', 'rainbownews' );?><br /></p>

        <p>
            <label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Select category', 'rainbownews' ); ?>:</label>
            <?php wp_dropdown_categories( array( 'show_option_none' =>' ','name' => $this->get_field_name( 'category' ), 'selected' => $category ) ); ?>
        </p>
        <?php
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
        if ( current_user_can('unfiltered_html') )
            $instance['text'] =  $new_instance['text'];
        else
            $instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) );
        $instance[ 'number' ] = absint( $new_instance[ 'number' ] );
        $instance[ 'type' ] = $new_instance[ 'type' ];
        $instance[ 'category' ] = $new_instance[ 'category' ];

        return $instance;
    }

    function widget( $args, $instance ) {
        extract( $args );
        extract( $instance );

        global $post;
        $title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
        $text = isset( $instance[ 'text' ] ) ? $instance[ 'text' ] : '';
        $number = empty( $instance[ 'number' ] ) ? 4 : $instance[ 'number' ];
        $type = isset( $instance[ 'type' ] ) ? $instance[ 'type' ] : 'latest' ;
        $category = isset( $instance[ 'category' ] ) ? $instance[ 'category' ] : '';

        if( $type == 'latest' ) {
            $get_featured_posts = new WP_Query( array(
                'posts_per_page'        => $number,
                'post_type'             => 'post',
                'ignore_sticky_posts'   => true
            ) );
        }
        else {
            $get_featured_posts = new WP_Query( array(
                'posts_per_page'        => $number,
                'post_type'             => 'post',
                'category__in'          => $category
            ) );
        }
        echo $before_widget;
        ?>
       
        <!-- </div> -->
        <?php echo $after_widget;
    }
}// end of apply for action widget.


