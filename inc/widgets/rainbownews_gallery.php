<?php
/**
 * RainbowNews functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package RainbowNews
 *
 * Rainbownews Gallery Widget Section
 */

add_action('widgets_init', 'register_rainbownews_gallery');

function register_rainbownews_gallery()
{
    register_widget("rainbownews_gallery");
}

class Rainbownews_gallery extends WP_Widget {

    function __construct() {
        $widget_ops           = array(
            'classname'       => 'rainbownews_gallery',
            'description'     => esc_html__( 'Display your images as in grid gallery views.', 'rainbownews' )
        );

    parent::__construct('rainbownews_gallery', '&nbsp;' . __(' NNC: Gallery', 'rainbownews'), $widget_ops);
    }// end of construct.

    function form( $instance ) {

        $defaults                 =  array();
        $defaults['title']        =  '';

        for ($i=0; $i< 6; $i++) {
           $defaults['image_'.$i] =  '';
        }

        $instance                 =  wp_parse_args( (array) $instance, $defaults );

        $title                    =  $instance['title'];
    ?>
    <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'rainbownews' ); ?></label>

        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>

    <?php for ( $i=0; $i<6; $i++ ) : ?>
          <p>
             <label for="<?php echo $this->get_field_id('image_'.$i); ?>"> <?php esc_html_e( 'Image ', 'rainbownews' ); ?> </label> <br />

             <div class="media-uploader" id="<?php echo $this->get_field_id('image_'.$i); ?>">

                <div class="custom_media_preview">
                   <?php if ( $instance['image_'.$i] != '') : ?>
                      <img class="custom_media_preview_default" src="<?php echo $instance['image_'.$i]; ?>" style="max-width:100%;" />
                   <?php endif; ?>
                </div>

                <input type="text" class="widefat custom_media_input" id="<?php echo $this->get_field_id('image_'.$i); ?>" name="<?php echo $this->get_field_name('image_'.$i); ?>" value="<?php echo $instance['image_'.$i]; ?>" style="margin-top:5px;" />

                <button class="custom_media_upload button button-secondary button-large" id="<?php echo $this->get_field_id('image_'.$i); ?>" data-choose="<?php esc_attr_e( 'Choose an image', 'rainbownews' ); ?>" data-update="<?php esc_attr_e( 'Use image', 'rainbownews' ); ?>" style="width:100%;margin-top:6px;margin-right:30px;"><?php esc_html_e( 'Select an Image', 'rainbownews' ); ?></button>

             </div>
          </p>
          <hr/>
        <?php endfor; ?>

    <p>
        <strong><?php esc_html_e( 'Note:', 'rainbownews'); ?></strong><br/>

        <?php esc_html_e( '1. Recommanded Image size 320 x 320 Pixels.', 'rainbownews' ); ?><br/>
    </p>

    <?php }// end of form function.

    function update( $new_instance, $old_instance ) {
        $instance                    = $old_instance;
        $instance['title']           = sanitize_text_field( $new_instance['title'] );

        for( $i=0; $i<6; $i++ ) {
            $instance['image_'.$i]   = esc_url_raw( $new_instance['image_'.$i] );
        }

        return $instance;
    }// end of update function.

    function widget( $args, $instance ) {
        extract( $args );
        extract( $instance );

        global $post;

        $title             = apply_filters( 'widget_title', isset( $instance['title'] ) ? $instance['title'] : '');
        $images            = array();

        for( $i=0; $i<6; $i++ ) {
             $images[]     = isset( $instance['image_'.$i] ) ? $instance['image_'.$i] : '';
        } ?>

        <?php echo $before_widget; ?>
           <div class="nnc-latest">
                <div class="nnc-container">

                    <div class="nnc-title nnc-clearblock">

                    <?php if ( !empty( $title ) ) :?>
                        <h2 class="widget-title"><span style="color:#8224e3;"><?php echo esc_attr( $title ); ?></span></h2>
                    <?php  endif; ?>

                        <div class="nnc-viewmore"><i class="fa fa-th-large"></i></div>

                    </div>

                </div>

                <div class="nnc-gallery-block nnc-latest-block nnc-clearblock">

                  <?php if ( !empty( $images ) ) :
                    foreach ( $images as $key => $image ) {
                        if ( $image !='' ){ ?>

                            <div class="nnc-gallery-single nnc-latest-single">

                                <figure class="nnc-g-img">

                                    <a href="#"><img src="<?php echo esc_url( $image ); ?>"></a>
                                </figure>
                                

                                <div class="nnc-ico-dtl"><a href="#"><i class="fa fa-search-plus"></i></a></div>
                            </div>

                       <?php
                        }
                    }
                     endif; ?>
                </div>
            </div>
        <!-- Gallery-end -->
        <?php echo $after_widget; ?>
        <?php
    }// end of widget function.
}// end of apply for action widget.