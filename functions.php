<?php
/**
 * Marzeotti Base functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Marzeotti_Base
 */

if ( ! function_exists( 'marzeotti_base_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function marzeotti_base_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Marzeotti Base, use a find and replace
		 * to change 'marzeotti-base' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'marzeotti-base', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary-menu' => esc_html__( 'Primary', 'marzeotti-base' ),
			'button-menu' => esc_html__( 'Button', 'marzeotti-base' ),
			'footer-menu' => esc_html__( 'Footer', 'marzeotti-base' )
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'marzeotti_base_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		/**
		 * Add support for wide and full width blocks.
		 */
		add_theme_support( 'align-wide' );
	}
endif;
add_action( 'after_setup_theme', 'marzeotti_base_setup' );

// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function marzeotti_base_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'marzeotti-base' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'marzeotti-base' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'marzeotti_base_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function marzeotti_base_scripts() {
	// wp_enqueue_style( 'marzeotti-base-style', get_stylesheet_uri() );

	// wp_enqueue_style( 'marzeotti-base-fonts', '//fonts.googleapis.com/css?family=Montserrat:400,500', array(), '20171115' );

	wp_enqueue_style( 'slick-slider-style', get_template_directory_uri() . '/assets/css/slick.css', array(), '20171115' );

	wp_enqueue_style( 'slick-slider-theme-style', get_template_directory_uri() . '/assets/css/slick-theme.css', array(), '20171115' );

	wp_enqueue_style( 'tingle-style', get_template_directory_uri() . '/assets/css/tingle.min.css', array(), '20171115' );

	wp_enqueue_style( 'font-awesome-style', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '20171115' );

	wp_enqueue_style( 'marzeotti-base-style', get_template_directory_uri() . '/assets/css/main.min.css', array(), '20171115' );

	wp_enqueue_script( 'marzeotti-base-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	// wp_enqueue_script( 'marzeotti-base-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'slick-slider',  get_template_directory_uri() . '/assets/js/vendor/slick.min.js', array('jquery'), '20171115', true );

	wp_enqueue_script( 'tingle',  get_template_directory_uri() . '/assets/js/vendor/tingle.min.js', array('jquery'), '20171115', true );

	wp_enqueue_script( 'marzeotti-base-script', get_template_directory_uri() . '/assets/js/main.min.js', array('jquery', 'slick-slider'), '20171115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'marzeotti_base_scripts' );

/**
 * Enqueue admin scripts and styles.
 */
function marzeotti_admin_scripts() {
	wp_enqueue_style( 'editor-styles', get_template_directory_uri() . '/assets/css/editor.min.css' );
}
add_action( 'admin_enqueue_scripts', 'marzeotti_admin_scripts' );

/**
 * Add additional file extensions.
 */
function marzeotti_add_mime_types( $mime_types ) {
	$mime_types['svg'] = 'image/svg+xml';     // Adding .svg extension
	return $mime_types;
}
add_filter( 'upload_mimes', 'marzeotti_add_mime_types', 1, 1 );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Shortcodes.
 */
require get_template_directory() . '/inc/shortcodes.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}