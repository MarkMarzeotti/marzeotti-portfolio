<?php
/**
 * Shortcodes for this theme
 *
 * @package Marzeotti_Base
 */

if ( ! function_exists( 'shortcode_button' ) ) :
  /**
   * Prints normal button.
   */
  // [button link="#" text="Click Here"]
  function shortcode_button( $atts ) {
      $a = shortcode_atts( array(
          'link' => '#',
          'text' => 'Click Here'
      ), $atts );

      return "<a class='btn' href='{$a['link']}'>{$a['text']}</a>";
  }
  add_shortcode( 'button', 'shortcode_button' );
endif;
