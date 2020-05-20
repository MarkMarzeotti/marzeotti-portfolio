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
	$mzp_args = array(
		'post_type'              => array( 'modal' ),
		'post_status'            => array( 'publish' ),
		'posts_per_page'         => 100,
	);

	$mzp_query = new WP_Query( $mzp_args );

	if ( $mzp_query->have_posts() ) :
		?>

		<div class="modals">

			<?php
			while ( $mzp_query->have_posts() ) :
				$mzp_query->the_post();

				$mzp_modal_id = sanitize_title( $post->post_title );
				?>

				<div id="<?php echo esc_attr( $mzp_modal_id ); ?>">
					<button class="nav__button modal-close" aria-controls="<?php echo esc_attr( $mzp_modal_id ); ?>" aria-expanded="false">
						<span class="screen-reader-text"><?php esc_html_e( 'Close', 'marzeotti-portfolio' ); ?></span>
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
			<?php $mzp_date = gmdate( 'Y' ); ?>
			<p>&copy; <?php echo esc_html( $mzp_date ); ?> <?php bloginfo( 'name' ); ?>. All Rights Reserved.</p>
		</div>

		<div class="footer__social">
			<ul>
				<li><a class="icon-twitter" href="https://twitter.com/MarkMarzeotti" target="_blank"><span>Twitter</span></a></li>
				<li><a class="icon-instagram" href="https://www.instagram.com/MarkMarzeotti/" target="_blank"><span>Instagram</span></a></li>
				<li><a class="icon-linkedin" href="https://www.linkedin.com/in/markmarzeotti/" target="_blank"><span>LinkedIn</span></a></li>
				<li><a class="icon-github" href="https://github.com/MarkMarzeotti" target="_blank"><span>Github</span></a></li>
				<li><a class="icon-wordpress" href="https://profiles.wordpress.org/mmarzeotti/" target="_blank"><span>WordPress</span></a></li>
			</ul>
		</div>

		<nav class="footer__nav">
			<?php
			wp_nav_menu(
				array(
					'container'      => false,
					'menu_class'     => false,
					'theme_location' => 'footer-menu',
				)
			);
			?>
		</nav>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
