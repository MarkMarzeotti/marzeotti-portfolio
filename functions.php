<?php
/**
 * Marzeotti Portfolio functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Marzeotti_Portfolio
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function mzp_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Marzeotti Base, use a find and replace
	 * to change 'marzeotti-portfolio' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'marzeotti-portfolio', get_stylesheet_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head.
	 */
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable the title tag controlled by WordPress.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	/*
	 * Register menu locations.
	 *
	 * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
	 */
	register_nav_menus(
		array(
			'primary-menu' => esc_html__( 'Primary Menu', 'marzeotti-portfolio' ),
			'button-menu'  => esc_html__( 'Button Menu', 'marzeotti-portfolio' ),
			'footer-menu'  => esc_html__( 'Footer Menu', 'marzeotti-portfolio' ),
		)
	);

	/**
	 * Overide medium size to crop.
	 */
	add_image_size( 'medium', 600, 460, true );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	/**
	 * Add support for wide and full width blocks.
	 */
	add_theme_support( 'align-wide' );

	/**
	 * Add a custom color pallete
	 */
	add_theme_support(
		'editor-color-palette',
		array(
			array(
				'name'  => __( 'Black', 'marzeotti-portfolio' ),
				'slug'  => 'black',
				'color' => '#000000',
			),
			array(
				'name'  => __( 'White', 'marzeotti-portfolio' ),
				'slug'  => 'white',
				'color' => '#ffffff',
			),
			array(
				'name'  => __( 'Gallery', 'marzeotti-portfolio' ),
				'slug'  => 'gallery',
				'color' => '#eeeeee',
			),
		)
	);
}
add_action( 'after_setup_theme', 'mzp_setup' );

/**
 * Enqueue scripts and styles.
 */
function mzp_scripts() {
	wp_enqueue_style( 'marzeotti-portfolio-style', get_stylesheet_directory_uri() . '/dist/css/style.css', array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_script( 'marzeotti-portfolio-script', get_stylesheet_directory_uri() . '/dist/js/app.js', array( 'jquery' ), '2.0', true );
}
add_action( 'wp_enqueue_scripts', 'mzp_scripts' );

/**
 * Enqueue admin scripts and styles.
 */
function mzp_admin_scripts() {
	wp_enqueue_style( 'admin-styles', get_stylesheet_directory_uri() . '/dist/css/admin.css', array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_script( 'admin-script', get_stylesheet_directory_uri() . '/dist/js/admin.js', array( 'jquery' ), wp_get_theme()->get( 'Version' ), true );
}
add_action( 'admin_enqueue_scripts', 'mzp_admin_scripts' );

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
 * Remove WordPress base menu classes.
 *
 * @param array  $classes An array of classes for this menu item.
 * @param object $item    The post object for the menu item.
 */
function mzp_discard_menu_classes( $classes, $item ) {
	return (array) get_post_meta( $item->ID, '_menu_item_classes', true );
}
add_filter( 'mzp_nav_menu_css_class', 'mzp_discard_menu_classes', 10, 2 );

/**
 * Allow the excerpt field to show on pages.
 */
function mzp_allow_excerpt() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'mzp_allow_excerpt' );

/**
 * Set number of words to show in the excerpt.
 *
 * @param int $length Allowed length of the excerpt.
 */
function mzp_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'mzp_excerpt_length', 999 );

/**
 * Set characters to show after excerpt.
 *
 * @param string $more The text to display at the end of a generated excerpt.
 */
function mzp_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'mzp_excerpt_more' );

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
 * Custom template tags for this theme.
 */
require get_stylesheet_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_stylesheet_directory() . '/inc/template-functions.php';

/**
 * Additional custom post types and custom taxonomies.
 */
require get_stylesheet_directory() . '/inc/post-types-taxonomies.php';

/**
 * A custom walker class to modify the navigation markup.
 */
require get_stylesheet_directory() . '/inc/class-mzp-walker-nav-menu.php';

if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page();
}

remove_action( 'wp_head', 'rsd_link' );

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

function stop_heartbeat() {
	wp_deregister_script('heartbeat');
}
add_action( 'init', 'stop_heartbeat', 1 );

function disable_pingback( &$links ) {
	foreach ( $links as $l => $link ) {
		if ( 0 === strpos( $link, get_option( 'home' ) ) ) {
			unset( $links[$l] );
		}
	}
}
add_action( 'pre_ping', 'disable_pingback' );

remove_action( 'wp_head', 'wlwmanifest_link' );

add_filter( 'xmlrpc_enabled', '__return_false' );

function disable_embed() {
	wp_dequeue_script( 'wp-embed' );
}

add_action( 'wp_footer', 'disable_embed' );

function remove_wp_block_library_css() {
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
}
add_action( 'wp_print_styles', 'remove_wp_block_library_css', 100 );
