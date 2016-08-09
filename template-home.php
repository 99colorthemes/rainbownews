<?php
/**
 * Template Name: HomePage
 * @package 99colorthemes
 * @subpackage RainbowNews
 */
?>

<?php get_header();

$page_sidebar_layout = get_post_meta(get_the_ID(),'rainbownews_sidebar_layout', true);




?>

    <!-- banner-start -->
    <div class="nnc-highlight-banner nnc-clearblock"> 
        <div class="nnc-highlight-slider">
            <?php
            if (is_active_sidebar('rainbownews_front_page_left_area')) {
                if (!dynamic_sidebar('rainbownews_front_page_left_area')):
                endif;
            }
            ?>
        </div>

        <div class="nnc-highlight-post">
            <?php
            if (is_active_sidebar('rainbownews_front_page_right_area')) {
                if (!dynamic_sidebar('rainbownews_front_page_right_area')):
                endif;
            }
            ?>
        </div> 
    </div>
    <!-- banner-end -->

    <!-- latest-start -->
    <div class="nnc-top-latest nnc-clearblock"> 
        <?php
        if (is_active_sidebar('rainbownews_front_page_latest_post_area')) {
            if (!dynamic_sidebar('rainbownews_front_page_latest_post_area')):
            endif;
        }
        ?> 
    </div>
    <!-- latest-end -->
<?php if($page_sidebar_layout == 'left-sidebar'):
    ?>
    <aside id="secondary" class="widget-area" role="complementary">
        <?php dynamic_sidebar('left-sidebar'); ?>
    </aside><!-- #secondary -->
    <?php
endif;
?>

    <div id="content" class="content nnc-clearblock"> 
        <div id="primary">
            <main id="main" class="site-main">

                <?php
                if (is_active_sidebar('rainbownews_front_page_content_area')) {
                    if (!dynamic_sidebar('rainbownews_front_page_content_area')):
                    endif;
                }
                ?>
               <!-- <div class="nnc-middle-ads">
                    <img src="<?php /*echo get_template_directory_uri(); */?>/images/wide-ads2.png" alt="advertisement">
                </div>


                <div class="nnc-middle-ads">
                    <img src="<?php /*echo get_template_directory_uri(); */?>/images/wide-ads3.png" alt="advertisement">
                </div>
-->
                <div class="nnc-category nnc-category-layout-3 nnc-left">
                    <?php
                    if (is_active_sidebar('rainbownews_front_page_middle_left_content_area')) {
                        if (!dynamic_sidebar('rainbownews_front_page_middle_left_content_area')):
                        endif;
                    }
                    ?>
                </div>
                <div class="nnc-category nnc-category-layout-3 nnc-right">
                    <?php
                    if (is_active_sidebar('rainbownews_front_page_middle_right_content_area')) {
                        if (!dynamic_sidebar('rainbownews_front_page_middle_right_content_area')):
                        endif;
                    }
                    ?>
                </div>

                <?php
                if (is_active_sidebar('rainbownews_front_page_bottom_content_area')) {
                    if (!dynamic_sidebar('rainbownews_front_page_bottom_content_area')):
                    endif;
                }
                ?>

            </main>
        </div>

        <?php
        if($page_sidebar_layout == 'right-sidebar'):
            get_sidebar();
        endif; ?>
    </div>

<?php get_footer(); ?>