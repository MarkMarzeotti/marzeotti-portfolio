<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Marzeotti_Base
 */

get_header();
?>

	<main id="main" class="content__blocks">

		<div class="wp-block-portfolio-blocks-page-heading">
			<div class="page-heading">
				<div class="page-heading__content">
					<span>Search</span>
					<h1>
						<?php
						/* translators: %s: search query. */
						printf( esc_html__( 'Search Results for: %s', 'marzeotti-portfolio' ), get_search_query() );
						?>
					</h1>
				</div>
			</div>
		</div>

		<div class="wp-block-portfolio-blocks-archive-content">
			<div class="archive-content">
				<div class="archive-content__posts wide">

					<?php
					if ( have_posts() ) :
						while ( have_posts() ) :
							the_post();
							?>

							<div class="archive-content__item">
								<div class="archive-content__content">
									<h2 class="h3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<?php the_excerpt(); ?>
									<a class="archive-content__button" href="<?php the_permalink(); ?>">Read More</a>
								</div>
							</div>

							<?php
						endwhile;

						the_posts_navigation();

						else :
							?>

						<article>
							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try searching?', 'marzeotti-portfolio' ); ?></p>
							<?php get_search_form(); ?>
						</article>

							<?php
					endif;
						?>

				</div>
			</div>
		</div>

	</main>

<?php
get_footer();
