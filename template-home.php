<?php
/**
    Template Name: HomePage
 * @package 99colorthemes
 * @subpackage RainbowNews
 */
?>

<?php get_header(); ?>

<!-- trending-start -->
<div class="nnc-trending-news">
    <div class="nnc-container">
        <div class="nnc-trending-single">
            <div class="nnc-trend-title">Trending Now</div>

        </div>
        <div class="nnc-search nnc-clearblock">
            <form class="s-form" action="" method="POST" role="form">
                <div class="search-form">
                    <input type="text" id="" placeholder="Search Here...">
                </div>
                <div class="search-icon"><i class="fa fa-search"></i></div>
            </form>
        </div>
    </div>
</div>
<!-- trending-end -->

<!-- banner-start -->
<div class="nnc-highlight-banner">
    <div class="nnc-container">
        <div class="nnc-highlight-slider">

            <?php
            if( is_active_sidebar( 'rainbownews_front_page_left_area' ) ) {
                if ( !dynamic_sidebar( 'rainbownews_front_page_left_area' ) ):
                endif;
            }
            ?>

        </div>

        <?php
        if( is_active_sidebar( 'rainbownews_front_page_right_area' ) ) {
            if ( !dynamic_sidebar( 'rainbownews_front_page_right_area' ) ):
            endif;
        }
        ?>



    </div>
</div>
<!-- banner-end -->

<?php get_footer(); ?>