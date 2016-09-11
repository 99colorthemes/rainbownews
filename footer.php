<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RainbowNews
 */

?>

</div>
</div><!-- #content -->
 

<?php do_action( 'rainbownews_after_body_content' ); ?>

<!-- Gallery-start -->
<div class="nnc-f-gallery nnc-top-latest"> 
    <?php
    if (is_active_sidebar('rainbownews_front_page_gallery_area')) {
        if (!dynamic_sidebar('rainbownews_front_page_gallery_area')):
        endif;
    }
    ?> 
</div>
<!-- Gallery-end -->

<div class="nnc-footer">
    <div class="nnc-container">
        <?php if (is_active_sidebar('rainbownews_footer1_area') || is_active_sidebar('rainbownews_footer2_area') || is_active_sidebar('rainbownews_footer3_area') || is_active_sidebar('rainbownews_footer4_area')) : ?>
            <div class="nnc-footer-block nnc-clearblock nnc-footer-column-<?php echo rainbownews_footer_count(); ?>">
                <?php if (is_active_sidebar('rainbownews_footer1_area')) { ?>
                    <div class="nnc-footer-single">
                        <?php
                        if (!dynamic_sidebar('rainbownews_footer1_area')):
                        endif;
                        ?>
                    </div>
                <?php } ?>

                <?php if (is_active_sidebar('rainbownews_footer2_area')) { ?>
                    <div class="nnc-footer-single">
                        <?php
                        if (!dynamic_sidebar('rainbownews_footer2_area')):
                        endif;
                        ?>

                    </div>
                <?php } ?>

                <?php if (is_active_sidebar('rainbownews_footer3_area')) { ?>
                    <div class="nnc-footer-single">
                        <?php
                        if (!dynamic_sidebar('rainbownews_footer3_area')):
                        endif;
                        ?>
                    </div>
                <?php } ?>
                <?php if (is_active_sidebar('rainbownews_footer4_area')) { ?>
                    <div class="nnc-footer-single">
                        <?php
                        if (!dynamic_sidebar('rainbownews_footer4_area')):
                        endif;

                        ?>
                    </div>
                <?php } ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="nnc-bottom-footer">
    <div class="nnc-container">
    <?php rainbownews_footer_copyright_info(); ?>


    </div>
</div>

<div class="nnc-scroll-top">
    <span class="nnc-scroll-top-inner"><i class="fa fa-long-arrow-up"></i></span>
</div>

</div><!-- #page -->

<?php wp_footer(); ?>



</body>
</html>
