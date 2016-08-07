<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RainbowNews
 */

if ( ! is_active_sidebar( 'rainbownews_right_sidebar' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">

	<?php
	if (is_active_sidebar('rainbownews_right_sidebar')) {
		if (!dynamic_sidebar('rainbownews_right_sidebar')):
		endif;
	}
	?>

</aside><!-- #secondary -->
