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

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'rainbownews' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'rainbownews' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'rainbownews' ), 'rainbownews', '<a href="http://99colorthemes.com" rel="designer">99colorthemes</a>' ); ?>
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
