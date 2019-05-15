<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Marzeotti_Base
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="featured-image-container">
		<?php $imageThumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
		if ($imageThumb[0]) {
			$image = $imageThumb[0];
		} else {
			$image = get_stylesheet_directory_uri() . '/assets/img/blog-placeholder.png';
		} ?>
		<div class="featured-image" style="background-image: url(<?php echo $image; ?>)"></div>
		<a href="<?php the_permalink(); ?>"></a>
	</div>

	<header class="entry-header">
		<div class="entry-meta">
			<?php marzeotti_base_posted_on(); ?>
		</div><!-- .entry-meta -->

		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_excerpt(); ?>

		<a class="btn btn-alt blue" href="<?php the_permalink(); ?>">Read Post</a>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
