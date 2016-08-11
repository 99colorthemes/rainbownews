<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package RainbowNews
 */

get_header(); 

?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h2>404</h2>
					<h1 class="page-title"><?php esc_html_e( 'Unfortunately, the page you are looking for does not exist.', 'rainbownews' ); ?></h1>
				</header><!-- .page-header -->

				<?php /* <div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'rainbownews' ); ?></p>

					<?php
						get_search_form();
 
					*/ ?>
 
			 

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
 

<?php
get_footer();
