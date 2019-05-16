<?php
function rotate_words( $atts, $content = "" )
{
  extract( shortcode_atts( array( 'titles' => "" ), $atts ) );


  $items_with_commas = $titles;

  $items_in_array = preg_split( "/[\s]*[,][\s]*/", $items_with_commas );

  $item_first = $items_in_array[0];

  $items_in_array[0] = "";

  $items_with_commas = "";

  foreach ( $items_in_array as $item )
  {
    $items_with_commas .= $item . ',';
  }

  $items_with_commas = substr( $items_with_commas, 1 ); // remove first char

  $items_with_commas = substr( $items_with_commas, 0, -1 ); // remove last char


  $output = '<strong id="typist-element" data-typist="' . $items_with_commas . '">' . $item_first . '</strong>';


  return $output;
}

add_shortcode( 'rotate_words', 'rotate_words' );
// Actual processing of the shortcode happens here
function portfolio__run_shortcode($content)
{
  global $shortcode_tags;

  // Backup current registered shortcodes and clear them all out
  $orig_shortcode_tags = $shortcode_tags;
  remove_all_shortcodes();

  add_shortcode( 'rotate_words', 'rotate_words' );

  // Do the shortcode ( only the one above is registered )
  $content = do_shortcode( $content );

  // Put the original shortcodes back
  $shortcode_tags = $orig_shortcode_tags;

  return $content;
}

add_filter('the_content', 'portfolio__run_shortcode', 7);

?>