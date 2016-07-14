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

class rainbownews_top_advertisement extends WP_Widget {
    function __construct() {
        $widget_ops           = array(
            'classname'       => 'widget_top_advertisement',
            'description'     => esc_html__( 'Add your 728x90 Advertisement', 'rainbownews' )
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
        $image_link = '728x90_image_link';
        $image_url = '728x90_image_url';

        $instance[ $image_link ] = esc_url( $instance[ $image_link ] );
        $instance[ $image_url ] = esc_url( $instance[ $image_url ] );

        ?>

        <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'rainbownews' ); ?></label>
            <input id="<?php echo $this->get_field_id( 'title' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>



        <p>
            <label for="<?php echo $this->get_field_id( 'ads_url' ); ?>"><?php esc_html_e( 'Advertisement Image URL:', 'rainbownews' ); ?></label>
            <input id="<?php echo $this->get_field_id( 'ads_url' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'ads_url' ); ?>" type="text" value="<?php echo $ads_url; ?>" size="3" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( $image_link ); ?>"> <?php _e( 'Advertisement Image Link ', 'rainbownews' ); ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id( $image_link ); ?>" name="<?php echo $this->get_field_name( $image_link ); ?>" value="<?php echo $instance[$image_link]; ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( $image_url ); ?>"> <?php _e( 'Advertisement Image ', 'rainbownews' ); ?></label>

            <?php
            if ( $instance[ $image_url ] != '' ) :
                echo '<img id="' . $this->get_field_id( $instance[ $image_url ] . 'preview') . '"src="' . $instance[ $image_url ] . '"style="max-width:250px;" /><br />';
            endif;
            ?>

            <input type="text" class="widefat custom_media_url" id="<?php echo $this->get_field_id( $image_url ); ?>" name="<?php echo $this->get_field_name( $image_url ); ?>" value="<?php echo $instance[$image_url]; ?>" style="margin-top:5px;"/>

            <input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="<?php echo $this->get_field_name( $image_url ); ?>" value="<?php _e( 'Upload Image', 'rainbows' ); ?>" style="margin-top:5px; margin-right: 30px;" onclick="imageWidget.uploader( '<?php echo $this->get_field_id( $image_url ); ?>' ); return false;"/>
        </p>


        <?php
    }// end of form function.

    function update( $new_instance, $old_instance ) {
        $instance                 = $old_instance;
        $instance[ 'title' ]      = sanitize_text_field( $new_instance[ 'title' ] );
        $instance[ 'ads_url' ]     = absint( $new_instance[ 'ads_url' ] );
        $image_link = '728x90_image_link';
        $image_url = '728x90_image_url';

        $instance[ $image_link ] = esc_url_raw( $new_instance[ $image_link ] );
        $instance[ $image_url ] = esc_url_raw( $new_instance[ $image_url ] );


        return $instance;
    }// end of update function.

    function widget( $args, $instance ) {
        extract( $args );
        extract( $instance );

        $title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';


        $image_link = '728x90_image_link';
        $image_url = '728x90_image_url';

        $image_link = isset( $instance[ $image_link ] ) ? $instance[ $image_link ] : '';
        $image_url = isset( $instance[ $image_url ] ) ? $instance[ $image_url ] : '';


        global $post; 
        ?>

<?php echo $before_widget; ?>
<!-- ~~~=| Banner START |=~~~ -->

    

                 

                   

<!-- ~~~=| Banner END |=~~~ -->

<?php echo $after_widget; ?>
        <?php
}// end of widdget function.
}// end of apply for action widget.



