<?php
/**
 * Prints HTML with meta information for the current author.
 */
function marzeotti_base_posted_by() {
	$byline = sprintf(
		/* translators: %s: post author. */
		esc_html_x( 'by %s', 'post author', 'marzeotti-base' ),
		'<span class="author">' . esc_html( get_the_author() ) . '</span>'
	);

	echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore Standard.Category.SniffName.ErrorCode

}
