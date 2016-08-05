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
                <?php if (is_active_sidebar('rainbownews_footer3_area')) { ?>
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
        <p class="nnc-left">&copy RainbowNews 2016, All Rights Reserved. | Powered By WordPress.</p>

        <p class="nnc-right">Built By 99colorthemes.</p>
    </div>
</div>

<div class="nnc-scroll-top">
    <span class="nnc-scroll-top-inner"><i class="fa fa-long-arrow-up"></i></span>
</div>


<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="site-info">
        <a href="<?php echo esc_url(__('https://wordpress.org/', 'rainbownews')); ?>"><?php printf(esc_html__('Proudly powered by %s', 'rainbownews'), 'WordPress'); ?></a>
        <span class="sep"> | </span>
        <?php printf(esc_html__('Theme: %1$s by %2$s.', 'rainbownews'), 'rainbownews', '<a href="http://99colorthemes.com" rel="designer">99colorthemes</a>'); ?>
    </div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>


<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-2.2.3.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jQuery.scrollSpeed.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/swiper.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/newsTicker.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>

</body>
</html>
