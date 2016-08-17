<?php
/**
 * Template Name: Contact Us
 * @package 99colorthemes
 * @subpackage RainbowNews
 */
?>

<?php get_header(); ?>

<?php
if ($default_sidebar_layout == 'left-sidebar'):
    ?>
    <aside id="secondary" class="widget-area" role="complementary">
        <?php dynamic_sidebar('rainbownews_left_sidebar'); ?>
    </aside><!-- #secondary -->
    <?php
endif;

?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php
            while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content', 'page' );

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;

            endwhile; // End of the loop.
            ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
if ($default_sidebar_layout == 'right-sidebar'):
	get_sidebar();
endif;
get_footer();

    