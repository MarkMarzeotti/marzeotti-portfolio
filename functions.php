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
