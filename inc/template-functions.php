<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Marzeotti_Base
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function marzeotti_base_body_classes( $classes ) {
  // Adds a class of hfeed to non-singular pages.
  if ( ! is_singular() ) {
    $classes[] = 'hfeed';
  }

  return $classes;
}
add_filter( 'body_class', 'marzeotti_base_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function marzeotti_base_pingback_header() {
  if ( is_singular() && pings_open() ) {
    echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
  }
}
add_action( 'wp_head', 'marzeotti_base_pingback_header' );

/**
 * Set number of words to show in the excerpt.
 */
function marzeotti_base_excerpt_length( $length ) {
  return 15;
}
add_filter( 'excerpt_length', 'marzeotti_base_excerpt_length', 999 );

/**
 * Set characters to show after excerpt.
 */
function marzeotti_base_excerpt_more( $more ) {
  return '';
}
add_filter( 'excerpt_more', 'marzeotti_base_excerpt_more' );

/**
 * Call more posts on posts page.
 */
function more_post_ajax(){
  $offset = $_POST["offset"];
  $ppp = $_POST["ppp"];
  // header("Content-Type: text/html");

  $args = array(
    'post_type' => 'post',
    'posts_per_page' => $ppp,
    'offset' => $offset
    );

  $loop = new WP_Query($args);
  while ($loop->have_posts()) { $loop->the_post();
    get_template_part('template-parts/content');
  }
  exit;
}
add_action('wp_ajax_more_post_ajax', 'more_post_ajax' );
add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax' );
