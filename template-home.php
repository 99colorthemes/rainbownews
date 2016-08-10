<?php
/**
 * Template Name: HomePage
 * @package 99colorthemes
 * @subpackage RainbowNews
 */
?>

<?php get_header();

$layout_meta = get_post_meta( $post->ID, 'rainbownews_page_specific_layout', true );

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


            <aside id="secondary" class="widget-area" role="complementary">
                <?php
                if (is_active_sidebar('rainbownews_front_page_sidebar')) {
                    if (!dynamic_sidebar('rainbownews_front_page_sidebar')):
                    endif;
                }
                ?>rainbownews_front_page_gallery_area
            </aside>

    </div> 


<?php get_footer(); ?>