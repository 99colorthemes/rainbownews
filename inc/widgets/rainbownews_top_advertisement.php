<?php
/**
 * RainbowNews functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package RainbowNews
 */

/* 
Rainbownews Top Advertisement Widget Section
*/ 
add_action( 'widgets_init', 'register_rainbownews_top_advertisement' );

function register_rainbownews_top_advertisement()
{
    register_widget("rainbownews_top_advertisement");
}

/**
 * Project Widget section.
 */
class rainbownews_top_advertisement extends WP_Widget {
    function __construct() {
        $widget_ops           = array(
            'classname'       => 'widget_top_advertisement',
            'description'     => esc_html__( 'Add your 728x90 Advertisement here', 'rainbownews' )
        );
        $control_ops        = array(
            'width'           => 200,
            'height'          =>250
        );
        parent::__construct(
            false,
            $name             = esc_html__( 'NNC: Top Advertisement', 'rainbownews' ),
            $widget_ops,
            $control_ops
        );
    }// end of construct.


    function form( $instance ) {
        $defaults[ 'title' ]    = '';
        $instance               = wp_parse_args( (array) $instance, $defaults );
        $title                  = $instance[ 'title' ];
        $ads_url                 = $instance[ 'ads_url' ];

        ?>
        <p><?php esc_html_e( 'Note: Upload your image for advertisement.', 'rainbownews' ); ?>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'rainbownews' ); ?></label>
            <input id="<?php echo $this->get_field_id( 'title' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'ads_url' ); ?>"><?php esc_html_e( 'Advertisement Image URL:', 'rainbownews' ); ?></label>
            <input id="<?php echo $this->get_field_id( 'ads_url' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'ads_url' ); ?>" type="text" value="<?php echo $ads_url; ?>" size="3" />
        </p>


        <?php
    }// end of form function.

    function update( $new_instance, $old_instance ) {
        $instance                 = $old_instance;
        $instance[ 'title' ]      = sanitize_text_field( $new_instance[ 'title' ] );
        $instance[ 'ads_url' ]     = absint( $new_instance[ 'ads_url' ] ); 


        return $instance;
    }// end of update function.

    function widget( $args, $instance ) {
        extract( $args );
        extract( $instance );

        global $post; 
        ?>

<?php echo $before_widget; ?>
<!-- ~~~=| Banner START |=~~~ -->

    

                 

                   

<!-- ~~~=| Banner END |=~~~ -->

<?php echo $after_widget; ?>
        <?php
}// end of widdget function.
}// end of apply for action widget.



