<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Marzeotti_Portfolio
 */

?>

	</div>

	<?php
	$args = array(
		'post_type'              => array( 'modal' ),
		'post_status'            => array( 'publish' ),
		'posts_per_page'         => 100,
	);

	$query = new WP_Query( $args );

	if ( $query->have_posts() ) :
		?>

		<div class="modals">

			<?php
			while ( $query->have_posts() ) :
				$query->the_post();

				$modal_id = sanitize_title( $post->post_title );
				?>

				<div id="<?php echo esc_attr( $modal_id ); ?>">
					<button class="nav__button modal-close" aria-controls="<?php echo esc_attr( $modal_id ); ?>" aria-expanded="false">
						<span class="screen-reader-text"><?php esc_html_e( 'Close', 'marzeotti-base' ); ?></span>
						<span class="hamburger">
							<span class="hamburger__top"></span>
							<span class="hamburger__middle"></span>
							<span class="hamburger__bottom"></span>
						</span>
					</button>
					<?php the_content(); ?>
				</div>

				<?php
			endwhile;
			?>

		</div>

		<?php
	endif;

	wp_reset_postdata();
	?>

	<footer id="footer" class="footer">
		<div class="footer__copyright">
			<p>&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>. All Rights Reserved.</p>
		</div>

		<div class="footer__social">
			<ul>
				<li><a class="icon-twitter" href="https://twitter.com/MarkMarzeotti" target="_blank"><span>Twitter</span></a></li>
				<li><a class="icon-instagram" href="https://www.instagram.com/MarkMarzeotti/" target="_blank"><span>Instagram</span></a></li>
				<li><a class="icon-linkedin" href="https://www.linkedin.com/in/markmarzeotti/" target="_blank"><span>LinkedIn</span></a></li>
				<li><a class="icon-github" href="https://github.com/MarkMarzeotti" target="_blank"><span>Github</span></a></li>
			</ul>
		</div>

		<nav class="footer__nav">
			<?php
			wp_nav_menu( array(
				'container'      => false,
				'menu_class'     => false,
				'theme_location' => 'footer-menu',
			) );
			?>
		</nav>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
