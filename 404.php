<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Marzeotti_Base
 */

get_header();
?>

	<div id="main" class="content__blocks">

		<div class="wp-block-portfolio-blocks-page-heading">
			<div class="page-heading">
				<div class="page-heading__content">
					<span>404</span>
					<h1><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'marzeotti_portfolio' ); ?></h1>
				</div>
			</div>
		</div>

	</div>

	<div class="content__single">
		<article>
			<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try searching?', 'marzeotti_portfolio' ); ?></p>
			<?php get_search_form(); ?>
		</article>
	</div>

<?php
get_footer();
