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

// client short code
	function client( $atts, $content = "" ) {
		$client = '<div class="client">' . do_shortcode( $content ) . '</div>';
		return $client;
	}
	add_shortcode( 'client', 'client' );

// skill short code
	function skill( $atts, $content = "" ) {
		$skill = '<div class="skill">' . do_shortcode( $content ) . '</div>';
		return $skill;
	}
	add_shortcode( 'skill', 'skill' );

// card short code
	function card( $atts, $content = "" ) {
		$card = '<div class="card">' . do_shortcode( $content ) . '</div>';
		return $card;
	}
	add_shortcode( 'card', 'card' );

// section_title short code
	function skill_content( $atts, $content = "" ) {
		extract( shortcode_atts( array( 'title'  => "" ), $atts ) );
		$skill_section = '<h2>' . $title . '</h2>';
		return $skill_section;
	}
	add_shortcode( 'skill_content', 'skill_content' );

// event short code
	function event( $atts, $content = "" ) {
		$event = '<div class="event">' . do_shortcode( $content ) . '</div>';
		return $event;
	}
	add_shortcode( 'event', 'event' );

// testimonial code
	function testimonial( $atts, $content = "" ) {
		$testimonial = '<div class="testo">' . do_shortcode( $content ) . '</div>';
		return $testimonial;
	}
	add_shortcode( 'testimonial', 'testimonial' );

// button code
	function button( $atts, $content = "" ) {
		extract( shortcode_atts( array( 'text' => "",
			'new_tab' => "",
			'size'    => "",
			'icon'    => "",
			'url'     => "" ), $atts ) );
		if ( $new_tab == 'yes' ) {
			$new_tab = ' target="_blank"';
		}
		if ( $icon != "" ) {
			$icon = '<i class="' . $icon . '"></i>';
		}
		$button = '<a' . $new_tab . ' class="button ' . $size . '" href="' . $url . '">' . $icon . $text . '</a>';
		return $button;
	}
	add_shortcode( 'button', 'button' );

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
	add_shortcode( 'client', 'client' );
	add_shortcode( 'skill', 'skill' );
	add_shortcode( 'card', 'card' );
	add_shortcode( 'skill_content', 'skill_content' );
	add_shortcode( 'event', 'event' );
	add_shortcode( 'testimonial', 'testimonial' );
	add_shortcode( 'button', 'button' );

	// Do the shortcode ( only the one above is registered )
  $content = do_shortcode( $content );
  // Put the original shortcodes back
  $shortcode_tags = $orig_shortcode_tags;
  return $content;
}
add_filter('the_content', 'portfolio__run_shortcode', 7);
?>