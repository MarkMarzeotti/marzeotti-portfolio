<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Marzeotti_Base
 */

get_header();
?>

	<main id="main" class="content__single">

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>">
				<header>
					<?php
					if ( is_singular() ) :
						the_title( '<h1>', '</h1>' );
					else :
						the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif;
			
					if ( 'post' === get_post_type() ) :
						?>
						<div>
							<?php
							marzeotti_base_posted_on();
							marzeotti_base_posted_by();
							?>
						</div>
					<?php endif; ?>
				</header>
			
				<div>
					<?php
					the_content( sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'marzeotti-base' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					) );
			
					wp_link_pages( array(
						'before' => '<div>' . esc_html__( 'Pages:', 'marzeotti-base' ),
						'after'  => '</div>',
					) );
					?>
				</div>
			</article>

		<?php endwhile; ?>

	</main>
	<?php get_sidebar(); ?>

<?php
get_footer();
