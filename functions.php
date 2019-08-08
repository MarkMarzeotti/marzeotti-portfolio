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
 * Enqueue scripts and styles.
 */
function marzeotti_portfolio_scripts() {
	wp_enqueue_style( 'marzeotti-portfolio-style', get_stylesheet_directory_uri() . '/dist/css/style.css' );

	wp_enqueue_script( 'marzeotti-portfolio-script', get_stylesheet_directory_uri() . '/dist/js/bundle.js', array( 'jquery' ), '20151215', true );
}
add_action( 'wp_enqueue_scripts', 'marzeotti_portfolio_scripts' );

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
    );;
}
add_filter( 'marzeotti_base_custom_taxonomies', 'marzeotti_portfolio_taxonomies' );

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
