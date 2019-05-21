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

// mini_text from portfolio
	function mini_text( $atts, $content = "" ){
		$output = '<div class="mini-text">' . do_shortcode( $content ) . '</div>';
		return $output;
	}

	add_shortcode( 'mini_text', 'mini_text' );

// social icon
	function social_icon( $atts, $content = "" ) {
		extract( shortcode_atts( array( 'first_icon' => "",
			'last_icon' => "",
			'type' => "",
			'url' => "" ), $atts ) );
		if ( $first_icon == 'yes' ) {
			$first_icon = '<ul class="social">';
		}
		if ( $last_icon == 'yes' ) {
			$last_icon = '</ul>';
		}
		$social_icon = $first_icon;
		$social_icon .= '<li>';
		$social_icon .= '<a target="_blank" class="' . $type . '" href="' . $url . '"></a>';
		$social_icon .= '</li>';
		$social_icon .= $last_icon;
		return $social_icon;
	}
	add_shortcode( 'social_icon', 'social_icon' );

// fun_fact
	function fun_fact( $atts, $content = "" ) {
		$fun_fact = '<div class="fun-fact">' . do_shortcode( $content ) . '</div>';
		return $fun_fact;
	}
	add_shortcode( 'fun_fact', 'fun_fact' );
// contact_form
function contact_form($atts, $content = "")
{
	extract(shortcode_atts(array('to' => "",  'subject' => ""), $atts));
	if ($to != "") {
		update_option('contact_form_to', $to);
	} else {
		$admin_email = get_bloginfo('admin_email');
		update_option('contact_form_to', $admin_email);
	}
	// Get the site domain and get rid of www.
	$site_url = strtolower($_SERVER['SERVER_NAME']);
	if (substr($site_url, 0, 4) == 'www.') {
		$site_url = substr($site_url, 4);
	}
	$sender_domain = 'server@' . $site_url;
	$output = '<div class="contact-form">';
	$output .= '<form id="contact-form" method="post" action="' . get_template_directory_uri() . '/send-mail.php">';
	$output .= '<p><label for="name">' . __('NAME', 'empathy') . '</label><input type="text" id="name" name="name" class="required"></p>';
	$output .= '<p><label for="email">' . __('EMAIL', 'empathy') . '</label><input type="text" id="email" name="email" class="required email"></p>';
	$output .= '<p class="antispam"><label for="url">' . __('Leave this empty', 'empathy') . '</label><input type="text" id="url" name="url"></p>';
	$output .= '<p><label for="message">' . __('MESSAGE', 'empathy') . '</label><textarea id="message" name="message" class="required"></textarea></p>';
	$output .= '<p style="padding: 0px; margin: 0px;"><input type="hidden" id="sender_domain" name="sender_domain" value="' . $sender_domain . '"></p>';
	$output .= '<p style="padding: 0px; margin: 0px;"><input type="hidden" id="subject" name="subject" value="' . $subject . '"></p>';
	$output .= '<p><input type="submit" class="submit button primary" value="' . __('SEND', 'empathy') . '"></p>';
	$output .= '</form>';
	$output .= '</div>';
	return $output;
}
add_shortcode('contact_form', 'contact_form');

function map($atts, $content = "") {
	extract(shortcode_atts(array('latitude'  => "",
		'longitude' => "",
		'zoom'      => "",
		'image'     => ""), $atts));
	$output = "";
	$output .= '<div class="map">';
	$google_map_api_key = get_option('google_map_api_key', "");
	if ($google_map_api_key != "") {
		$output .= '<p style="padding: 0px; margin: 0px;"><script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=' . esc_attr($google_map_api_key) . '"></script></p>';
	} else {
		$output .= '<p style="padding: 0px; margin: 0px;"><script type="text/javascript" src="//maps.googleapis.com/maps/api/js"></script></p>';
	}
	$output .= '<div id="map-canvas" class="map-canvas" data-latitude="' . $latitude . '" data-longitude="' . $longitude . '" data-zoom="' . $zoom . '" data-marker-image="' . $image . '"></div>';
	$output .= '</div>';
	return $output;
}

add_shortcode('map', 'map');
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
	add_shortcode( 'mini_text', 'mini_text' );
	add_shortcode( 'social_icon', 'social_icon' );
	add_shortcode( 'fun_fact', 'fun_fact' );
	add_shortcode('contact_form', 'contact_form');
	add_shortcode('map', 'map');
	// Do the shortcode ( only the one above is registered )
  $content = do_shortcode( $content );
  // Put the original shortcodes back
  $shortcode_tags = $orig_shortcode_tags;
  return $content;
}
add_filter('the_content', 'portfolio__run_shortcode', 7);
?>