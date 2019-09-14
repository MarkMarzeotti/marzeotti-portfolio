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
	$marzeotti_portfolio_args = array(
		'post_type'              => array( 'modal' ),
		'post_status'            => array( 'publish' ),
		'posts_per_page'         => 100,
	);

	$marzeotti_portfolio_query = new WP_Query( $marzeotti_portfolio_args );

	if ( $marzeotti_portfolio_query->have_posts() ) :
		?>

		<div class="modals">

			<?php
			while ( $marzeotti_portfolio_query->have_posts() ) :
				$marzeotti_portfolio_query->the_post();

				$marzeotti_portfolio_modal_id = sanitize_title( $post->post_title );
				?>

				<div id="<?php echo esc_attr( $marzeotti_portfolio_modal_id ); ?>">
					<button class="nav__button modal-close" aria-controls="<?php echo esc_attr( $marzeotti_portfolio_modal_id ); ?>" aria-expanded="false">
						<span class="screen-reader-text"><?php esc_html_e( 'Close', 'marzeotti_portfolio' ); ?></span>
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
			<?php $marzeotti_portfolio_date = date( 'Y' ); ?>
			<p>&copy; <?php echo esc_html( $marzeotti_portfolio_date ); ?> <?php bloginfo( 'name' ); ?>. All Rights Reserved.</p>
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
