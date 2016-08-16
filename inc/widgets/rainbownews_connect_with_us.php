<?php
/**
 * RainbowNews functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package RainbowNews
 *
 * Rainbownews Advertisement Widget Section
 */

add_action('widgets_init', 'register_rainbownews_connect_with_us');

function register_rainbownews_connect_with_us()
{
    register_widget("rainbownews_connect_with_us");
}


/**
 * 300x250 Advertisement Ads
 */
class Rainbownews_connect_with_us extends WP_Widget
{

    function __construct()
    {
        $widget_ops = array(
            'classname'      =>  'rainbownews_connect_with_us',
            'description'    =>  esc_html__(' Connect With Us ', 'rainbownews')
        );

        parent::__construct( 'rainbownews_connect_with_us', '&nbsp;' . __('NNC: Connect With Us', 'rainbownews' ), $widget_ops);
    }// end of construct.

    function form($instance)
    {

        $defaults['title']            =  '';
        $defaults['facebook']         =  '';
        $defaults['facebook_link']    =  '';
        $defaults['twitter']          =  '';
        $defaults['twitter_link']     =  '';
        $defaults['google_plus']      =  '';
        $defaults['google_plus_link'] =  '';
        $defaults['linked']           =  '';
        $defaults['linked_link']      =  '';
        $defaults['instagram']        =  '';
        $defaults['instagram_link']   =  '';
        $defaults['youtube']          =  '';
        $defaults['youtube_link']     =  '';
        $defaults['tumblr']           =  '';
        $defaults['tumblr_link']      =  '';
        $defaults['rss']              =  '';
        $defaults['rss_link']         =  '';

        $instance                     =  wp_parse_args((array)$instance, $defaults);

        $title                        =  esc_attr($instance['title']);
        $facebook                     =  esc_attr($instance['facebook']);
        $facebook_link                =  esc_attr($instance['facebook_link']);
        $twitter                      =  esc_attr($instance['twitter']);
        $twitter_link                 =  esc_attr($instance['twitter_link']);
        $google_plus                  =  esc_attr($instance['google_plus']);
        $google_plus_link             =  esc_attr($instance['google_plus_link']);
        $linked                       =  esc_attr($instance['linked']);
        $linked_link                  =  esc_attr($instance['linked_link']);
        $instagram                    =  esc_attr($instance['instagram']);
        $instagram_link               =  esc_attr($instance['instagram_link']);
        $youtube                      =  esc_attr($instance['youtube']);
        $youtube_link                 =  esc_attr($instance['youtube_link']);
        $tumblr                       =  esc_attr($instance['tumblr']);
        $tumblr_link                  =  esc_attr($instance['tumblr_link']);
        $rss                          =  esc_attr($instance['rss']);
        $rss_link                     =  esc_attr($instance['rss_link']);

    ?>

        <p>
            <label  for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title :', 'rainbownews'); ?></label>   <br>

            <input id="<?php echo $this->get_field_id('title'); ?>" class="widefat" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook :', 'rainbownews'); ?></label>

            <input id="<?php echo $this->get_field_id('facebook'); ?>" class="widefat" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo $facebook; ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('facebook_link'); ?>"><?php _e('Facebook Link :', 'rainbownews'); ?></label>

            <input id="<?php echo $this->get_field_id('facebook_link'); ?>" class="widefat" name="<?php echo $this->get_field_name('facebook_link'); ?>" type="text" value="<?php echo $facebook_link; ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter:', 'rainbownews'); ?></label>

            <input id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" class="widefat" type="text" value="<?php echo $twitter; ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('twitter_link'); ?>"><?php _e('Twitter Link:', 'rainbownews'); ?></label>

            <input id="<?php echo $this->get_field_id('twitter_link'); ?>" name="<?php echo $this->get_field_name('twitter_link'); ?>" class="widefat" type="text" value="<?php echo $twitter_link; ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('google_plus'); ?>"><?php _e('Google Plus :', 'rainbownews'); ?></label>

            <input id="<?php echo $this->get_field_id('google_plus'); ?>" name="<?php echo $this->get_field_name('google_plus'); ?>" class="widefat" type="text" value="<?php echo $google_plus; ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('google_plus_link'); ?>"><?php _e('Google Plus Link:', 'rainbownews'); ?></label>

            <input id="<?php echo $this->get_field_id('google_plus_link'); ?>" name="<?php echo $this->get_field_name('google_plus_link'); ?>" class="widefat" type="text" value="<?php echo $google_plus_link; ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('linked'); ?>"><?php _e('Linked :', 'rainbownews'); ?></label>

            <input id="<?php echo $this->get_field_id('linked'); ?>" name="<?php echo $this->get_field_name('linked'); ?>" class="widefat" type="text" value="<?php echo $linked; ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('linked_link'); ?>"><?php _e('Linked Link :', 'rainbownews'); ?></label>

            <input id="<?php echo $this->get_field_id('linked_link'); ?>" name="<?php echo $this->get_field_name('linked_link'); ?>" class="widefat" type="text" value="<?php echo $linked_link; ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('instagram'); ?>"><?php _e('Instagram :', 'rainbownews'); ?></label>

            <input id="<?php echo $this->get_field_id('instagram'); ?>" name="<?php echo $this->get_field_name('instagram'); ?>" class="widefat" type="text" value="<?php echo $instagram; ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('instagram_link'); ?>"><?php _e('Instagram Link :', 'rainbownews'); ?></label>

            <input id="<?php echo $this->get_field_id('instagram_link'); ?>" name="<?php echo $this->get_field_name('instagram_link'); ?>" class="widefat" type="text" value="<?php echo $instagram_link; ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('youtube'); ?>"><?php _e('Youtube :', 'rainbownews'); ?></label>

            <input id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" class="widefat" type="text" value="<?php echo $youtube; ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('youtube_link'); ?>"><?php _e('Youtube Link :', 'rainbownews'); ?></label>

            <input id="<?php echo $this->get_field_id('youtube_link'); ?>" name="<?php echo $this->get_field_name('youtube_link'); ?>" class="widefat" type="text" value="<?php echo $youtube_link; ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('tumblr'); ?>"><?php _e('Tumblr :', 'rainbownews'); ?></label>

            <input id="<?php echo $this->get_field_id('tumblr'); ?>" name="<?php echo $this->get_field_name('tumblr'); ?>" class="widefat" type="text" value="<?php echo $tumblr; ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('tumblr_link'); ?>"><?php _e('Tumblr Link :', 'rainbownews'); ?></label>

            <input id="<?php echo $this->get_field_id('tumblr_link'); ?>" name="<?php echo $this->get_field_name('tumblr_link'); ?>" class="widefat" type="text" value="<?php echo $tumblr_link; ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('rss'); ?>"><?php _e('Rss :', 'rainbownews'); ?></label>

            <input id="<?php echo $this->get_field_id('rss'); ?>" name="<?php echo $this->get_field_name('rss'); ?>" class="widefat" type="text" value="<?php echo $rss; ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('rss_link'); ?>"><?php _e('Rss Link :', 'rainbownews'); ?></label>

            <input id="<?php echo $this->get_field_id('rss_link'); ?>" name="<?php echo $this->get_field_name('rss_link'); ?>" class="widefat" type="text" value="<?php echo $rss_link; ?>"/>
        </p>





        <?php
    }// end of form.

    function update($new_instance, $old_instance)
    {
        $instance                      =  $old_instance;
        $instance['title']             =  strip_tags($new_instance['title']);
        $instance['facebook']          =  strip_tags($new_instance['facebook']);
        $instance['facebook_link']     =  esc_url_raw($new_instance['facebook_link']);
        $instance['twitter']           =  strip_tags($new_instance['twitter']);
        $instance['twitter_link']      =  esc_url_raw($new_instance['twitter_link']);
        $instance['google_plus']       =  strip_tags($new_instance['google_plus']);
        $instance['google_plus_link']  =  esc_url_raw($new_instance['google_plus_link']);
        $instance['linked']            =  strip_tags($new_instance['linked']);
        $instance['linked_link']       =  esc_url_raw($new_instance['linked_link']);
        $instance['instagram']         =  strip_tags($new_instance['instagram']);
        $instance['instagram_link']    =  esc_url_raw($new_instance['instagram_link']);
        $instance['youtube']           =  strip_tags($new_instance['youtube']);
        $instance['youtube_link']      =  esc_url_raw($new_instance['youtube_link']);
        $instance['tumblr']            =  strip_tags($new_instance['tumblr']);
        $instance['tumblr_link']       =  esc_url_raw($new_instance['tumblr_link']);
        $instance['rss']               =  strip_tags($new_instance['rss']);
        $instance['rss_link']          =  esc_url_raw($new_instance['rss_link']);

        return $instance;
    }// end of update.

    function widget($args, $instance)
    {

        extract($args);
        extract($instance);

        $title             =  isset($instance['title']) ? $instance['title'] : '';
        $facebook          =  isset($instance['facebook']) ? $instance['facebook'] : '';
        $facebook_link     =  isset($instance['facebook_link']) ? $instance['facebook_link'] : '';
        $twitter           =  isset($instance['twitter']) ? $instance['twitter'] : '';
        $twitter_link      =  isset($instance['twitter_link']) ? $instance['twitter_link'] : '';
        $google_plus       =  isset($instance['google_plus']) ? $instance['google_plus'] : '';
        $google_plus_link  =  isset($instance['google_plus_link']) ? $instance['google_plus_link'] : '';
        $linked            =  isset($instance['linked']) ? $instance['linked'] : '';
        $linked_link       =  isset($instance['linked_link']) ? $instance['linked_link'] : '';
        $instagram         =  isset($instance['instagram']) ? $instance['instagram'] : '';
        $instagram_link    =  isset($instance['instagram_link']) ? $instance['instagram_link'] : '';
        $youtube           =  isset($instance['youtube']) ? $instance['youtube'] : '';
        $youtube_link      =  isset($instance['youtube_link']) ? $instance['youtube_link'] : '';
        $tumblr            =  isset($instance['tumblr']) ? $instance['tumblr'] : '';
        $tumblr_link       =  isset($instance['tumblr_link']) ? $instance['tumblr_link'] : '';
        $rss               =  isset($instance['rss']) ? $instance['rss'] : '';
        $rss_link          =  isset($instance['rss_link']) ? $instance['rss_link'] : '';

        ?>





        <section class="widget">

           <span style="color:red;"> <?php echo $before_title. esc_html( $title ) . $after_title; ?></span>

            <div class="nnc-social-sidebar-icons">

                <ul>

                    <?php if($facebook): ?>

                    <li class="nnc-fb">
                        <a href="<?php echo $facebook_link; ?>" target="_blank"><i class="fa fa-facebook"></i>
                            <span><?php echo esc_html( $facebook ); ?></span></a>
                    </li>

                    <?php endif; ?>

                     <?php if($twitter): ?>

                    <li class="nnc-twt">
                        <a href="<?php echo $twitter_link; ?>" target="_blank"><i class="fa fa-twitter"></i>
                            <span><?php echo esc_html( $twitter ); ?></span></a>
                    </li>

                    <?php endif; ?>

                    <?php if($google_plus): ?>

                    <li class="nnc-gplus">
                        <a href="<?php echo $google_plus_link; ?>" target="_blank"><i class="fa fa-google-plus"></i>
                            <span><?php echo esc_html( $google_plus ); ?></span></a>
                    </li>

                    <?php endif; ?>

                    <?php if($linked): ?>

                    <li class="nnc-linked">
                        <a href="<?php echo $linked_link; ?>" target="_blank"><i class="fa fa-linkedin"></i>
                            <span><?php echo esc_html( $linked ); ?></span></a>
                    </li>

                    <?php endif; ?>

                    <?php if($instagram): ?>

                    <li class="nnc-insta">
                        <a href="<?php echo $instagram_link; ?>" target="_blank"><i class="fa fa-instagram"></i>
                            <span><?php echo esc_html( $instagram ); ?></span></a>
                    </li>

                    <?php endif; ?>

                    <?php if($youtube): ?>

                    <li class="nnc-utube">
                        <a href="<?php echo $youtube_link; ?>" target="_blank"><i class="fa fa-youtube"></i>
                            <span><?php echo esc_html( $youtube ); ?></span></a>
                    </li>

                    <?php endif; ?>

                    <?php if($tumblr): ?>

                    <li class="nnc-tumb">
                        <a href="<?php echo $tumblr_link; ?>" target="_blank" ><i class="fa fa-tumblr"></i>
                            <span><?php echo esc_html( $tumblr ); ?></span></a>
                    </li>

                    <?php endif; ?>

                    <?php if($rss): ?>

                    <li class="nnc-rss">
                        <a href="<?php echo $rss_link; ?>" target="_blank" ><i class="fa fa-rss"></i>
                            <span><?php echo esc_html( $rss ); ?></span></a>
                    </li>

                    <?php endif; ?>
                </ul>

            </div>

        </section>

        <?php
    }// end of widdget function.
}// end of apply for action widget.

