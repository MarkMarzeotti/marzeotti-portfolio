<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Marzeotti_Portfolio
 */

if ( is_author() || is_tax( 'agency' ) ) {
	$marzeotti_portfolio_url = esc_url( home_url( '/' ) );
	wp_safe_redirect( $marzeotti_portfolio_url );
	exit;
}

get_header();
?>

	<div class="container">
		<main id="main" class="content__blocks page">

			<div class="wp-block-portfolio-blocks-page-heading">
				<div class="page-heading">
					<div class="page-heading__content">
						<span>Snippets</span>
						<h1><?php single_term_title(); ?></h1>
					</div>
				</div>
			</div>


			<div class="wp-block-portfolio-blocks-archive-content">
				<div class="archive-content">
					<div class="archive-content__posts column">

						<?php
						if ( have_posts() ) :

							while ( have_posts() ) :
								the_post();

								$post_permalink = get_permalink();

								$target = strpos( $post_permalink, home_url( '/' ) ) !== false ? '' : ' target="_blank"';
								?>

								<div class="archive-content__item">
									<?php if ( has_post_thumbnail() ) : ?>
										<div class="archive-content__image">
											<a href="<?php echo esc_url( $post_permalink ); ?>"<?php echo $target; ?>>
												<?php the_post_thumbnail( 'post', array( 'alt' => get_the_title() ) ); ?>
											</a>
										</div>
									<?php endif; ?>
									<div class="archive-content__content">
										<h2 class="h3"><a href="<?php echo esc_url( $post_permalink ); ?>"<?php echo $target; ?>><?php the_title(); ?></a></h2>
										<?php
										the_excerpt();

										$button_text = $post->post_type === 'post' ? 'See How It\'s Done' : 'View ' . get_the_title();
										?>
										<a class="archive-content__button" href="<?php echo esc_url( $post_permalink ); ?>"<?php echo $target; ?>><?php echo esc_html( $button_text ); ?></a>
									</div>
								</div>

								<?php
							endwhile;

						endif;
						?>

					</div>
				</div>
			</div>

		</main>
	</div>

<?php
get_footer();
