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

add_action('widgets_init', 'register_rainbownews_advertisement');

function register_rainbownews_advertisement()
{
    register_widget("rainbownews_advertisement");
}


/**
 * 300x250 Advertisement Ads
 */
class rainbownews_advertisement extends WP_Widget
{

    function __construct()
    {
        $widget_ops = array(
            'classname'      => 'widget_advertisement',
            'description'    => __('Add your 728x90 Advertisement', 'rainbownews')
        );

        parent::__construct('nnc-advertisement', '&nbsp;' . __('NNC: Advertisement', 'rainbownews'), $widget_ops);
    }

    function form($instance)
    {
        $instance = wp_parse_args((array)$instance, array('title' => '', '728x90_image_url' => '', '728x90_image_link' => '', 'style' => ''));
        $title = esc_attr($instance['title']);
        $style = esc_attr($instance['style']);

        $image_link = '728x90_image_link';
        $image_url = '728x90_image_url';

        $instance[$image_link] = esc_url($instance[$image_link]);
        $instance[$image_url] = esc_url($instance[$image_url]);

        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'rainbownews'); ?></label>
            <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>"
                   type="text" value="<?php echo $title; ?>"/>
        </p>

        <label><?php _e('Add your Advertisement 728x90 Images Here', 'rainbownews'); ?></label>

        <p>
            <label
                for="<?php echo $this->get_field_id($image_link); ?>"> <?php _e('Advertisement Image Link ', 'rainbownews'); ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id($image_link); ?>"
                   name="<?php echo $this->get_field_name($image_link); ?>"
                   value="<?php echo $instance[$image_link]; ?>"/>
        </p>

        <p>
            <label
                for="<?php echo $this->get_field_id($image_url); ?>"> <?php _e('Advertisement Image ', 'rainbownews'); ?></label>
            <?php
            if ($instance[$image_url] != '') :
                echo '<img id="' . $this->get_field_id($instance[$image_url] . 'preview') . '"src="' . $instance[$image_url] . '"style="max-width:250px;" /><br />';
            endif;
            ?>

            <input type="text" class="widefat custom_media_url" id="<?php echo $this->get_field_id($image_url); ?>"
                   name="<?php echo $this->get_field_name($image_url); ?>" value="<?php echo $instance[$image_url]; ?>"
                   style="margin-top:5px;"/>

            <input type="button" class="button button-primary custom_media_button" id="custom_media_button"
                   name="<?php echo $this->get_field_name($image_url); ?>"
                   value="<?php _e('Upload Image', 'rainbownews'); ?>" style="margin-top:5px; margin-right: 30px;"
                   onclick="imageWidget.uploader( '<?php echo $this->get_field_id($image_url); ?>' ); return false;"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('category'); ?>"><?php _e('Select Sizes', 'rainbownews'); ?>
                :</label>
            <select name="<?php echo $this->get_field_name('style'); ?>">
                <option value="style1" <?php if ($style == 'style1') echo 'selected="selected"'; ?>
                        id="<?php echo $this->get_field_id('style'); ?>"
                        name="<?php echo $this->get_field_name('style'); ?>"><?php _e('728X90', 'rainbownews'); ?></option>
                <option value="style2" <?php if ($style == 'style2') echo 'selected="selected"'; ?>
                        id="<?php echo $this->get_field_id('style'); ?>"
                        name="<?php echo $this->get_field_name('style'); ?>"><?php _e('970X250', 'rainbownews'); ?></option>
                <option value="style3" <?php if ($style == 'style3') echo 'selected="selected"'; ?>
                        id="<?php echo $this->get_field_id('style'); ?>"
                        name="<?php echo $this->get_field_name('style'); ?>"><?php _e('970X90', 'rainbownews'); ?></option>
            </select>
        </p>

    <?php }

    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['style'] = $new_instance['style'];

        $image_link = '728x90_image_link';
        $image_url = '728x90_image_url';

        $instance[$image_link] = esc_url_raw($new_instance[$image_link]);
        $instance[$image_url] = esc_url_raw($new_instance[$image_url]);

        return $instance;
    }

    function widget($args, $instance)
    {
        extract($args);
        extract($instance);

        $title = isset($instance['title']) ? $instance['title'] : '';

        $image_link = '728x90_image_link';
        $image_url = '728x90_image_url';

        $image_link = isset($instance[$image_link]) ? $instance[$image_link] : '';
        $image_url = isset($instance[$image_url]) ? $instance[$image_url] : '';
        $style = isset($instance['style']) ? $instance['style'] : 'style1';

        ?>
        <div class="<?php if ($style == 'style2') {
            echo 'nnc-970X250-ads';
        } elseif ($style == 'style3') {
            echo 'nnc-970X90-ads';
        } else {
            echo 'nnc-728X90-ads';
        } ?>">
            <?php if (!empty($title)) { ?>
                <!-- <div class="nnc-advertisement-title">
                    <?php /*echo $before_title. esc_html( $title ) . $after_title; */ ?>
                </div>-->
            <?php }
            $output = '';
            if (!empty($image_url)) {
                if (!empty($image_link)) {
                    $output .= '<a href="' . $image_link . '" target="_blank" rel="nofollow">
                                    <img src="' . $image_url . '">
                           </a>';
                } else {
                    $output .= '<img src="' . $image_url . '" >';
                }
                echo $output;
            } ?>
        </div>
        <?php
    }
}

