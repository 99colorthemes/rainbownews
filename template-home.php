<?php
/**
 * Template Name: HomePage
 * @package 99colorthemes
 * @subpackage RainbowNews
 */
?>

<?php get_header();

?>

    <!-- banner-start -->
<?php if (is_active_sidebar('rainbownews_front_page_left_area') || is_active_sidebar('rainbownews_front_page_right_area')): ?>

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
<?php endif; ?>
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

    <?php if (is_active_sidebar('rainbownews_front_page_content_area') || is_active_sidebar('rainbownews_front_page_middle_left_content_area')
        || is_active_sidebar('rainbownews_front_page_middle_right_content_area') || is_active_sidebar('rainbownews_front_page_bottom_content_area')
        ): ?>

    <div id="content" class="content nnc-clearblock">

        <div id="primary">
            <main id="main" class="site-main">

                <?php
                if (is_active_sidebar('rainbownews_front_page_content_area')) {

                    if (!dynamic_sidebar('rainbownews_front_page_content_area')):
                    endif;

                }
                ?>

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
            ?>
        </aside>

    </div>
<?php endif;

get_footer();

?>