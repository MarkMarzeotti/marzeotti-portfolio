<?php
/**
 * Marzeotti Portfolio functions and definitions
 *
 * @package Marzeotti_Portfolio
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function marzeotti_portfolio_setup() {
	/*
	 * Register menu locations.
	 *
	 * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
	 */
	register_nav_menus( array(
		'button-menu' => esc_html__( 'Button Menu', 'marzeotti-portfolio' ),
	) );

	/**
	 * Overide medium size to crop.
	 */
	add_image_size( 'medium', 600, 460, true );
}
add_action( 'after_setup_theme', 'marzeotti_portfolio_setup' );

/**
 * Allow the excerpt field to show on pages.
 */
function marzeotti_portfolio_allow_excerpt() {
    add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'marzeotti_portfolio_allow_excerpt' );

/**
 * Add custom post types.
 */
function marzeotti_portfolio_post_types( $post_types ) {
	return array(
		array( 
			'slug'          => 'talk', 
			'url_base'      => 'talks', 
			'name_singular' => 'Talk', 
			'name_plural'   => 'Talks', 
			'icon'          => 'dashicons-format-status',
			'taxonomies'    => array(),
			'has_archive'   => false 
		),
		array( 
			'slug'          => 'work', 
			'url_base'      => 'work', 
			'name_singular' => 'Work', 
			'name_plural'   => 'Work', 
			'icon'          => 'dashicons-editor-code',
			'taxonomies'    => array(),
			'has_archive'   => false 
		),
		array( 
			'slug'          => 'modal', 
			'url_base'      => 'modals', 
			'name_singular' => 'Modal', 
			'name_plural'   => 'Modals', 
			'icon'          => 'dashicons-editor-expand',
			'taxonomies'    => array(),
			'has_archive'   => false 
		)
	);
}
add_filter( 'marzeotti_base_custom_post_types', 'marzeotti_portfolio_post_types' );

/**
 * Add custom taxonomies.
 */
function marzeotti_portfolio_taxonomies( $taxonomies ) {
	return array(
		array( 
			'slug'              => 'agency', 
			'url_base'          => 'agency', 
			'name_singular'     => 'Agency', 
			'name_plural'       => 'Agencies', 
			'post_types'        => array( 'work' ),
			'show_admin_column' => true 
		)
	);
}
add_filter( 'marzeotti_base_custom_taxonomies', 'marzeotti_portfolio_taxonomies' );

/**
 * Enqueue scripts and styles.
 */
function marzeotti_portfolio_scripts() {
	wp_enqueue_style( 'marzeotti-portfolio-fonts', 'https://fonts.googleapis.com/css?family=Fira+Sans:400,600|Livvic:400,600|Nunito+Sans:400,600|Titillium+Web:400,600|PT+Serif:700' );
}
// add_action( 'wp_enqueue_scripts', 'marzeotti_portfolio_scripts' );

/**
 * Overwrite default functionality for byline.
 */
function marzeotti_base_posted_by() {
	$byline = sprintf(
		/* translators: %s: post author. */
		esc_html_x( 'by %s', 'post author', 'marzeotti-base' ),
		'<span class="author"><a href="' . esc_url( home_url( '/' ) ) . 'about/">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
}

/**
 * Sets image size for Yoast to use for Facebook shares.
 */
function marzeotti_portfolio_set_yoast_facebook_share_image_size() {
	return 'share-facebook';
}
add_filter( 'wpseo_opengraph_image_size', 'marzeotti_portfolio_set_yoast_facebook_share_image_size' );

/**
 * Sets image size for Yoast to use for Twitter shares.
 */
function marzeotti_portfolio_set_yoast_twitter_share_image_size() {
	return 'share-twitter';
}
add_filter( 'wpseo_twitter_image_size', 'marzeotti_portfolio_set_yoast_twitter_share_image_size' );

/**
 * Add post taxonomies to Archive Content posts.
 */
function marzeotti_portfolio_archive_content_after_title() {
	$content = '';
	$terms = get_the_terms( $post, 'agency' );
	if ( ! empty( $terms ) ) {
		foreach ( $terms as $term ) {
			$agency_logo_id = get_field( 'logo', $term );
			$content .= '<span class="agency-logo" aria-label="This project was completed for ' . $term->name . '.">' . wp_get_attachment_image( $agency_logo_id, 'thumbnail', false, array( 'alt' => $term->name . ' logo' ) ) . '</span>';
		}
	}
	return $content;
}
add_filter( 'archive_content_after_title', 'marzeotti_portfolio_archive_content_after_title' );

/**
 * Add post type archive page to Yoast breadcrumbs.
 */
function marzeotti_portfolio_change_yoast_breadcrumbs( $breadcrumbs ) {

	$last_item = array_pop( $breadcrumbs );
	$post_type = get_post_type( $last_item['id'] );

	switch ( $post_type ) {
		case 'talk':
			$parent_breadcrumb = array(
				array(
					'text' => 'Talks',
					'url' => home_url( '/' ) . 'talks/',
					'allow_html' => 1
				),
				$last_item
			);
			break;
		case 'work':
			$parent_breadcrumb = array(
				array(
					'text' => 'Work',
					'url' => home_url( '/' ) . 'work/',
					'allow_html' => 1
				),
				$last_item
			);
			break;
		case 'post':
			$parent_breadcrumb = array(
				array(
					'text' => 'Snippets',
					'url' => home_url( '/' ) . 'snippets/',
					'allow_html' => 1
				),
				$last_item
			);
			break;
		default:
			$parent_breadcrumb = array( $last_item );
			break;
	}

	$breadcrumbs = array_merge( $breadcrumbs, $parent_breadcrumb );

	return $breadcrumbs;
}
add_filter( 'wpseo_breadcrumb_links', 'marzeotti_portfolio_change_yoast_breadcrumbs' );

/**
 * Conditionally change archive content block post link.
 */
function marzeotti_portfolio_modify_archive_content_post_link( $post_permalink ) {
	$post_id = url_to_postid( $post_permalink );
	$post_content = get_the_content( $post_id );
	$project_url = get_field( 'project_url', $post_id );

	if ( empty( $post_content ) && ! empty( $project_url ) ) {
		$post_permalink = $project_url;
	}
	
	return $post_permalink;
}
add_filter( 'archive_content_post_link', 'marzeotti_portfolio_modify_archive_content_post_link' );

/**
 * Move jQuery to footer.
 */
function marzeotti_portfolio_jquery_in_footer() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
    wp_enqueue_script( 'jquery' );
}
add_action( 'wp_enqueue_scripts', 'marzeotti_portfolio_jquery_in_footer' );

/**
 * Remove plugin provided Maps API script.
 */
function marzeotti_portfolio_remove_maps_api_script() {
	wp_dequeue_script( 'google-maps' );
}
add_action( 'wp_print_scripts', 'marzeotti_portfolio_remove_maps_api_script', 10 );
