<?php
/**
 * Marzeotti Portfolio functions and definitions
 *
 * @package Marzeotti_Portfolio
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function mzp_setup() {
	/*
	 * Register menu locations.
	 *
	 * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
	 */
	register_nav_menus(
		array(
			'button-menu' => esc_html__( 'Button Menu', 'marzeotti-portfolio' ),
		)
	);

	/**
	 * Overide medium size to crop.
	 */
	add_image_size( 'medium', 600, 460, true );
}
add_action( 'after_setup_theme', 'mzp_setup' );

/**
 * Add Google Analytics scripts to the head.
 */
function mzp_add_google_analytics() {
	wp_enqueue_script( 'google-analytics', 'https://www.googletagmanager.com/gtag/js?id=UA-84468069-6', array(), '1.0', false );
	wp_add_inline_script( 'mytheme-typekit', 'window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag(\'js\', new Date());gtag(\'config\', \'UA-84468069-6\');' );
}
add_action( 'wp_enqueue_scripts', 'mzp_add_google_analytics' );

/**
 * Allow the excerpt field to show on pages.
 */
function mzp_allow_excerpt() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'mzp_allow_excerpt' );

/**
 * Overwrite default functionality for byline.
 */
function mzp_posted_by() {
	$byline = sprintf(
		/* translators: %s: post author. */
		esc_html_x( 'by %s', 'post author', 'marzeotti-portfolio' ),
		'<span class="author"><a href="' . esc_url( home_url( '/' ) ) . 'about/">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore
}

/**
 * Add post taxonomies to Archive Content posts.
 */
function mzp_archive_content_after_title() {
	$content = '';
	$terms   = get_the_terms( $post, 'agency' );
	if ( ! empty( $terms ) ) {
		foreach ( $terms as $term ) {
			$agency_logo_id = get_field( 'logo', $term );
			$content       .= '<span class="agency-logo" aria-label="This project was completed for ' . $term->name . '.">' . wp_get_attachment_image( $agency_logo_id, 'thumbnail', false, array( 'alt' => $term->name . ' logo' ) ) . '</span>';
		}
	}
	return $content;
}
add_filter( 'archive_content_after_title', 'mzp_archive_content_after_title' );

/**
 * Add post type archive page to Yoast breadcrumbs.
 *
 * @param array $breadcrumbs An array of individual breadcrumbs provided by Yoast.
 */
function mzp_change_yoast_breadcrumbs( $breadcrumbs ) {
	$last_item = array_pop( $breadcrumbs );
	$post_type = get_post_type( $last_item['id'] );

	switch ( $post_type ) {
		case 'talk':
			$parent_breadcrumb = array(
				array(
					'text'       => 'Talks',
					'url'        => home_url( '/' ) . 'talks/',
					'allow_html' => 1,
				),
				$last_item,
			);
			break;
		case 'work':
			$parent_breadcrumb = array(
				array(
					'text'       => 'Work',
					'url'        => home_url( '/' ) . 'work/',
					'allow_html' => 1,
				),
				$last_item,
			);
			break;
		case 'post':
			$parent_breadcrumb = array(
				array(
					'text'       => 'Snippets',
					'url'        => home_url( '/' ) . 'snippets/',
					'allow_html' => 1,
				),
				$last_item,
			);
			break;
		default:
			$parent_breadcrumb = array( $last_item );
			break;
	}

	$breadcrumbs = array_merge( $breadcrumbs, $parent_breadcrumb );

	return $breadcrumbs;
}
add_filter( 'wpseo_breadcrumb_links', 'mzp_change_yoast_breadcrumbs' );

/**
 * Conditionally change archive content block post link.
 *
 * @param array $post_permalink The permalink to the archive post.
 */
function mzp_modify_archive_content_post_link( $post_permalink ) {
	$post_id      = url_to_postid( $post_permalink ); // phpcs:ignore WordPress.VIP.RestrictedFunctions.url_to_postid_url_to_postid
	$post_content = get_the_content( $post_id );
	$project_url  = get_field( 'project_url', $post_id );

	if ( empty( $post_content ) && ! empty( $project_url ) ) {
		$post_permalink = $project_url;
	}

	return $post_permalink;
}
add_filter( 'archive_content_post_link', 'mzp_modify_archive_content_post_link' );

/**
 * Move jQuery to footer.
 */
function mzp_jquery_in_footer() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, '1.12.4', true );
	wp_enqueue_script( 'jquery' );
}
add_action( 'wp_enqueue_scripts', 'mzp_jquery_in_footer' );

/**
 * Set allowed redirect locations.
 *
 * @param array $content An array of allowed redirect hosts.
 */
function mzp_allowed_redirect_hosts( $content ) {
	$content[] = 'markmarzeotti.com';
	return $content;
}
add_filter( 'allowed_redirect_hosts', 'mzp_allowed_redirect_hosts', 10 );

/**
 * Remove plugin provided Maps API script.
 */
function mzp_remove_maps_api_script() {
	wp_dequeue_script( 'google-maps' );
}
add_action( 'wp_print_scripts', 'mzp_remove_maps_api_script', 10 );

/**
 * Custom template tags for this theme.
 */
// require get_template_directory() . '/inc/template-tags.php';
