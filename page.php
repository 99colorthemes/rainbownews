<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package RainbowNews
 */

get_header();
$layout_meta = get_post_meta( $post->ID, 'rainbownews_page_specific_layout', true );

?>
<?php if($layout_meta == 'left-sidebar'):
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

//rainbownews_sidebar_select();
if($layout_meta == 'right-sidebar'):
	get_sidebar();
endif;
get_footer();
