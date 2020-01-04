<?php
/**
 * Overrides of base theme template tags.
 *
 * @package Marzeotti_Portfolio
 */

/**
 * Prints HTML with meta information for the current author.
 */
function mzp_posted_by() {
	$byline = sprintf(
		/* translators: %s: post author. */
		esc_html_x( 'by %s', 'post author', 'marzeotti-portfolio' ),
		'<span class="author"><a href="' . esc_url( home_url( '/' ) ) . 'about/">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore
}
