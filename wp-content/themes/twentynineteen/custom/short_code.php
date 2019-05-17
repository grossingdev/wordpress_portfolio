<?php
// rotate words short code
	function rotate_words( $atts, $content = "" ) {
		extract( shortcode_atts( array( 'titles' => "" ), $atts ) );
		$items_with_commas = $titles;
		$items_in_array = preg_split( "/[\s]*[,][\s]*/", $items_with_commas );
		$item_first = $items_in_array[0];
		$items_in_array[0] = "";
		$items_with_commas = "";
		foreach ( $items_in_array as $item ) {
			$items_with_commas .= $item . ',';
		}
		$items_with_commas = substr( $items_with_commas, 1 ); // remove first char
		$items_with_commas = substr( $items_with_commas, 0, -1 ); // remove last char
		$output = '<strong id="typist-element" data-typist="' . $items_with_commas . '">' . $item_first . '</strong>';
		return $output;
	}
	add_shortcode( 'rotate_words', 'rotate_words' );

// section_title short code
	function section_title( $atts, $content = "" ) {
		extract( shortcode_atts( array( 'align' => 'center', 'text'  => "" ), $atts ) );
		$section_title = '<div class="section-title ' . $align . '"><h2><i>' . $text . '</i></h2></div>';
		return $section_title;
	}
	add_shortcode( 'section_title', 'section_title' );

// row short code
	function row( $atts, $content = "" ) {
		$row = '<div class="row">' . do_shortcode( $content ) . '</div>';
		return $row;
	}
	add_shortcode( 'row', 'row' );
// column short code
	function column( $atts, $content = "" ) {
		extract( shortcode_atts( array( 'width'    => "",
			'width_xs' => "",
			'width_md' => "",
			'width_lg' => "" ), $atts ) );
		if ( $width != "" ) {
			$width = 'col-sm-' . $width;
		}
		if ( $width_xs != "" ) {
			$width_xs = ' col-xs-' . $width_xs;
		}
		if ( $width_md != "" ) {
			$width_md = ' col-md-' . $width_md;
		}
		if ( $width_lg != "" ) {
			$width_lg = ' col-lg-' . $width_lg;
		}
		$column = '<div class="' . $width . $width_xs . $width_md . $width_lg . '">' . do_shortcode( $content ) . '</div>';
		return $column;
	}
	add_shortcode( 'column', 'column' );

// service short code
	function service( $atts, $content = "" ) {
		$service = '<div class="service">' . do_shortcode( $content ) . '</div>';
		return $service;
	}
	add_shortcode( 'service', 'service' );

// process short code
	function process( $atts, $content = "" ) {
		$process = '<div class="process">' . do_shortcode( $content ) . '</div>';
		return $process;
	}
	add_shortcode( 'process', 'process' );

// icon short code
	function icon( $atts, $content = "" ) {
		extract( shortcode_atts( array( 'name' => "" ), $atts ) );
		$icon = '<i class="' . $name . '"></i>';
		return $icon;
	}
	add_shortcode( 'icon', 'icon' );

// Actual processing of the shortcode happens here
function portfolio__run_shortcode($content) {
  global $shortcode_tags;
  // Backup current registered shortcodes and clear them all out
  $orig_shortcode_tags = $shortcode_tags;
  remove_all_shortcodes();

  add_shortcode( 'rotate_words', 'rotate_words' );
	add_shortcode( 'section_title', 'section_title' );
	add_shortcode( 'row', 'row' );
	add_shortcode( 'column', 'column' );
	add_shortcode( 'service', 'service' );
	add_shortcode( 'process', 'process' );
	add_shortcode( 'icon', 'icon' );
  // Do the shortcode ( only the one above is registered )
  $content = do_shortcode( $content );
  // Put the original shortcodes back
  $shortcode_tags = $orig_shortcode_tags;
  return $content;
}
add_filter('the_content', 'portfolio__run_shortcode', 7);
?>