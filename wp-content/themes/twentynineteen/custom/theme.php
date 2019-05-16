<?php

function portfolio__enqueue()
{
  $theme_directory = get_template_directory_uri();
  global $subset;
  $extra_char_set = false;
  $subset = '&subset=';

  if ( get_option( 'char_set_latin', false ) ) { $subset .= 'latin,'; $extra_char_set = true; }
  if ( get_option( 'char_set_latin_ext', false ) ) { $subset .= 'latin-ext,'; $extra_char_set = true; }
  if ( get_option( 'char_set_cyrillic', false ) ) { $subset .= 'cyrillic,'; $extra_char_set = true; }
  if ( get_option( 'char_set_cyrillic_ext', false ) ) { $subset .= 'cyrillic-ext,'; $extra_char_set = true; }
  if ( get_option( 'char_set_greek', false ) ) { $subset .= 'greek,'; $extra_char_set = true; }
  if ( get_option( 'char_set_greek_ext', false ) ) { $subset .= 'greek-ext,'; $extra_char_set = true; }
  if ( get_option( 'char_set_vietnamese', false ) ) { $subset .= 'vietnamese,'; $extra_char_set = true; }
  if ( $extra_char_set == false ) { $subset = ""; } else { $subset = substr( $subset, 0, -1 ); }

  wp_enqueue_style( 'montserrat', '//fonts.googleapis.com/css?family=Montserrat:400,700' . $subset, null, null );
  wp_enqueue_style( 'roboto', '//fonts.googleapis.com/css?family=Roboto:400,400italic,700,700italic' . $subset, null, null );
  wp_enqueue_style( 'bootstrap', $theme_directory . '/css/bootstrap.min.css', null, null );
  wp_enqueue_style( 'pe-icon-7-stroke', $theme_directory . '/css/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css', null, null );
  wp_enqueue_style( 'fontello', $theme_directory . '/css/fonts/fontello/css/fontello.css', null, null );
  wp_enqueue_style( 'nprogress', $theme_directory . '/js/nprogress/nprogress.css', null, null );
  wp_enqueue_style( 'magnific-popup', $theme_directory . '/js/jquery.magnific-popup/magnific-popup.css', null, null );
  wp_enqueue_style( 'uniform', $theme_directory . '/js/jquery.uniform/uniform.default.css', null, null );
  wp_enqueue_style( 'animations', $theme_directory . '/css/animations.css', null, null );
  wp_enqueue_style( 'portfolio-main', $theme_directory . '/css/main.css', null, null );
  wp_enqueue_style( 'portfolio-768', $theme_directory . '/css/768.css', null, null );
  wp_enqueue_style( 'portfolio-wp-fix', $theme_directory . '/css/wp-fix.css', null, null );
  wp_enqueue_style( 'portfolio-style', get_stylesheet_uri(), null, null );


  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
  {
    wp_enqueue_script( 'comment-reply' );
  }

  wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'modernizr', $theme_directory . '/js/modernizr.min.js', null, null );
  wp_enqueue_script( 'address', $theme_directory . '/js/jquery.address-1.5.min.js', null, null, true );
  wp_enqueue_script( 'nprogress', $theme_directory . '/js/nprogress/nprogress.js', null, null, true );
  wp_enqueue_script( 'fastclick', $theme_directory . '/js/fastclick.js', null, null, true );
  wp_enqueue_script( 'typist', $theme_directory . '/js/typist.js', null, null, true );
  wp_enqueue_script( 'imagesloaded', $theme_directory . '/js/imagesloaded.pkgd.min.js', null, null, true );
  wp_enqueue_script( 'isotope', $theme_directory . '/js/jquery.isotope.min.js', null, null, true );
  wp_enqueue_script( 'fitvids', $theme_directory . '/js/jquery.fitvids.js', null, null, true );
  wp_enqueue_script( 'validate', $theme_directory . '/js/jquery.validate.min.js', null, null, true );
  wp_enqueue_script( 'uniform', $theme_directory . '/js/jquery.uniform/jquery.uniform.min.js', null, null, true );
  wp_enqueue_script( 'magnific-popup', $theme_directory . '/js/jquery.magnific-popup/jquery.magnific-popup.min.js', null, null, true );
  wp_enqueue_script( 'socialstream', $theme_directory . '/js/socialstream.jquery.js', null, null, true );
  wp_enqueue_script( 'portfolio-jarallax', $theme_directory . '/js/jarallax.min.js', null, null, true );
  wp_enqueue_script( 'portfolio-jarallax-video', $theme_directory . '/js/jarallax-video.min.js', null, null, true );
  wp_enqueue_script( 'portfolio-main', $theme_directory . '/js/main.js', null, null, true );
  wp_enqueue_script( 'portfolio-wp-fix', $theme_directory . '/js/wp-fix.js', null, null, true );

  if (is_customize_preview())
  {
    wp_enqueue_script( 'portfolio-wp-fix-2', $theme_directory . '/js/wp-fix-2.js', null, null, true );
  }
}

function portfolio_after_setup_theme()
{
//  load_theme_textdomain('portfolio', get_template_directory() . '/languages');
  register_nav_menus(array('theme_menu_location_1' => esc_html__('Classic Navigation Menu', 'portfolio')));

  add_theme_support('title-tag');
  add_theme_support('automatic-feed-links');
  add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
  add_theme_support('post-formats', array('image', 'gallery', 'audio', 'video', 'quote', 'link', 'chat', 'status', 'aside'));
  add_theme_support('post-thumbnails', array('post', 'portfolio', 'page'));

  add_action('wp_enqueue_scripts', 'portfolio__enqueue');
}

add_action('after_setup_theme', 'portfolio_after_setup_theme');
?>