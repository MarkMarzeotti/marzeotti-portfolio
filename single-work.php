<?php
/**
 * The template for displaying single posts in the Work post type
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Marzeotti_Base
 */

if ( empty( $post->post_content ) ) {
	$url = esc_url( home_url( '/work/' ) );
	wp_redirect( $url );
	exit;
}

get_header();
?>

	<main id="main" class="content__blocks">

		<?php
		while ( have_posts() ) : the_post();
		
			the_content();
			
		endwhile;
		?>

	</main>
	<?php get_sidebar(); ?>

<?php
get_footer();
