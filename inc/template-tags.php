<?php
/**
 * Overrides of base theme template tags.
 *
 * @package Marzeotti_Base
 */

/**
 * Prints HTML with meta information for the current author.
 */
function marz_posted_by() { // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedFunctionFound
	$byline = sprintf(
		/* translators: %s: post author. */
		esc_html_x( 'by %s', 'post author', 'marzeotti-portfolio' ),
		'<span class="author">' . esc_html( get_the_author() ) . '</span>'
	);

	echo '<span class="byline"> ' . wp_kses( $byline, 'post' ) . '</span>';

}
