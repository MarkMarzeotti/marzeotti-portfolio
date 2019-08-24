<?php
/**
 * The template for displaying all pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Marzeotti_Portfolio
 */

get_header();
?>

	<main id="main" class="content__blocks page">

		<?php
		while ( have_posts() ) : the_post();
		
			the_content();
			
		endwhile;
		?>

	</main>

<?php
get_footer();
