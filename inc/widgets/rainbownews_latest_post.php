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
add_action('widgets_init', 'register_rainbownews_latest_post');

function register_rainbownews_latest_post()
{
    register_widget("rainbownews_latest_post");
}

class rainbownews_latest_post extends WP_Widget
{

    function __construct()
    {
        $widget_ops = array('classname' => 'widget_latest_post', 'description' => __('Display latest posts or posts of specific category.', 'rainbownews'));
        $control_ops = array('width' => 200, 'height' => 250);
        parent::__construct(false, $name = __(' NNC: Latest Post ', 'rainbownews'), $widget_ops);
    }

    function form($instance)
    {
        $tg_defaults['title'] = '';
        $tg_defaults['text'] = '';
        $tg_defaults['number'] = 4;
        $tg_defaults['type'] = 'latest';
        $tg_defaults['category'] = '';
        $tg_defaults['style'] = 'style1';

        $instance = wp_parse_args((array)$instance, $tg_defaults);
        $title = esc_attr($instance['title']);
        $text = esc_textarea($instance['text']);
        $number = $instance['number'];
        $type = $instance['type'];
        $category = $instance['category'];
        $style = $instance['style'];
        ?>
        <p><?php _e('Layout will be as below:', 'rainbownews') ?></p>
        <!--   <div style="text-align: center;"><img src="<?php echo get_template_directory_uri(); ?>/<?php echo get_template_directory_uri() . '/img/style-1.jpg' ?>"></div> -->
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'rainbownews'); ?></label>
            <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>"
                   type="text" value="<?php echo $title; ?>"/>
        </p>
        <?php _e('Description', 'rainbownews'); ?>
        <textarea class="widefat" rows="5" cols="20" id="<?php echo $this->get_field_id('text'); ?>"
                  name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
        <p>
            <label
                for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to display:', 'rainbownews'); ?></label>
            <input id="<?php echo $this->get_field_id('number'); ?>"
                   name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>"
                   size="3"/>
        </p>

        <p><input type="radio" <?php checked($type, 'latest') ?> id="<?php echo $this->get_field_id('type'); ?>"
                  name="<?php echo $this->get_field_name('type'); ?>"
                  value="latest"/><?php _e('Show latest Posts', 'rainbownews'); ?><br/>
            <input type="radio" <?php checked($type, 'category') ?> id="<?php echo $this->get_field_id('type'); ?>"
                   name="<?php echo $this->get_field_name('type'); ?>"
                   value="category"/><?php _e('Show posts from a category', 'rainbownews'); ?><br/></p>

        <p><input type="radio" <?php checked($style, 'style1') ?> id="<?php echo $this->get_field_id('style'); ?>"
                  name="<?php echo $this->get_field_name('style'); ?>"
                  value="style1"/><?php _e('Style 1', 'rainbownews'); ?><br/>
            <input type="radio" <?php checked($style, 'style2') ?> id="<?php echo $this->get_field_id('style'); ?>"
                   name="<?php echo $this->get_field_name('style'); ?>"
                   value="style2"/><?php _e('Style 2', 'rainbownews'); ?><br/></p>
        <p>
            <label for="<?php echo $this->get_field_id('category'); ?>"><?php _e('Select category', 'rainbownews'); ?>
                :</label>
            <?php wp_dropdown_categories(array('show_option_none' => ' ', 'name' => $this->get_field_name('category'), 'selected' => $category)); ?>
        </p>
        <?php
    }

    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        if (current_user_can('unfiltered_html'))
            $instance['text'] = $new_instance['text'];
        else
            $instance['text'] = stripslashes(wp_filter_post_kses(addslashes($new_instance['text'])));
        $instance['number'] = absint($new_instance['number']);
        $instance['type'] = $new_instance['type'];
        $instance['style'] = $new_instance['style'];
        $instance['category'] = $new_instance['category'];

        return $instance;
    }

    function widget($args, $instance)
    {
        extract($args);
        extract($instance);

        global $post;
        $title = isset($instance['title']) ? $instance['title'] : '';
        $text = isset($instance['text']) ? $instance['text'] : '';
        $number = empty($instance['number']) ? 4 : $instance['number'];
        $type = isset($instance['type']) ? $instance['type'] : 'latest';
        $style = isset($instance['style']) ? $instance['style'] : 'style1';
        $category = isset($instance['category']) ? $instance['category'] : '';

        if ($type == 'latest') {
            $get_featured_posts = new WP_Query(array(
                'posts_per_page' => $number,
                'post_type' => 'post',
                'ignore_sticky_posts' => true
            ));
        } else {
            $get_featured_posts = new WP_Query(array(
                'posts_per_page' => $number,
                'post_type' => 'post',
                'category__in' => $category
            ));
        }
        echo $before_widget;
        ?>
        <div class="nnc-latest">
            <div class="nnc-title nnc-clearblock">
                <?php
                if ($type != 'latest') {
                    $border_color = 'style="border-bottom-color:' . rainbownews_category_color($category) . ';"';
                    $title_color = 'style="color:' . rainbownews_category_color($category) . ';"';
                } else {
                    $border_color = '';
                    $title_color = 'style="color:#4db2ec;"';
                }
                if (!empty($title)) {
                    echo '<h2 class="widget-title" ' . $border_color . '><span ' . $title_color . '>' . esc_html($title) . '</span></h2>';
                }
                if($category != '')
                    $cat_slug = get_category( $category );

                ?>
                <div class="nnc-viewmore"><a <?php if(!empty($cat_slug->slug)) { ?> href="<?php echo site_url(). __('/category/', 'rainbownews') . $cat_slug->slug; ?>" <?php } ?>><i class="fa fa-th-large" title="View All"></i></a>
            </div>
            <!-- use (nnc-latest-layout-2) class for Layout2 -->
            <div class="nnc-latest-block nnc-clearblock <?php echo $style == 'style1'?'':'nnc-latest-layout-2'; ?> ">
                <?php
                while ($get_featured_posts->have_posts()):$get_featured_posts->the_post();
                    ?>
                    <div class="nnc-latest-single <?php echo has_post_thumbnail()?'':'nnc-no-image'; ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <figure class="nnc-img">
                                <?php the_post_thumbnail('large'); ?>
                            </figure>
                        <?php endif; ?>
                        <div class="nnc-dtl">
                            <div class="nnc-entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></div>
                            <div class="nnc-entry-meta">
									<span class="posted-on">
                                         <a href="<?php the_permalink(); ?>" title="<?php echo get_the_time(); ?>"
                                            rel="bookmark">
                                             <time class="entry-date" datetime="">
                                                 <i class="fa fa-calendar"></i> <?php echo get_the_date(); ?>
                                             </time>
                                         </a>
									</span>
                                <span class="comments-link"><i class="fa fa-comments" aria-hidden="true"></i> <a
                                        href="<?php the_permalink(); ?>" title="No Comments"><?php comments_popup_link('No Comment', '1', '%'); ?></a></span>
                            </div>
                            <div class="nnc-category-list">
                                <?php  rainbownews_colored_category(); ?>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
                // Reset Post Data
                wp_reset_query();
                ?>

            </div>
        </div>

        <!-- </div> -->
        <?php echo $after_widget;
    }
}// end of apply for action widget.



