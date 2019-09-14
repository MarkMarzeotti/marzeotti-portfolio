<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Marzeotti_Portfolio
 */

$marzeotti_portfolio_taxonomy           = get_query_var( 'taxonomy' );
$marzeotti_portfolio_allowed_taxonomies = array(
	'post_tag',
	'category',
);

if ( ! in_array( $marzeotti_portfolio_taxonomy, $marzeotti_portfolio_allowed_taxonomies, true ) ) {
	$marzeotti_portfolio_url = esc_url( home_url( '/' ) );
	wp_safe_redirect( $marzeotti_portfolio_url );
	exit;
}

get_header();
?>

	<div class="container">
		<main id="main" class="content__main">

			<?php if ( have_posts() ) : ?>

				<header>
					<?php
					the_archive_title( '<h1>', '</h1>' );
					the_archive_description( '<p>', '</p>' );
					?>
				</header>

				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', get_post_type() );

				endwhile;

				the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

			endif;
				?>

		</main>
		<?php get_sidebar(); ?>
	</div>

<?php
get_footer();
