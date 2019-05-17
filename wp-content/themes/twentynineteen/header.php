<?php
if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)) {
	header('X-UA-Compatible: IE=edge,chrome=1');
}

if (is_page_template('template-homepage.php')) {
	$portfolio__page_layout = 'one-page-layout';
} else {
	$portfolio__page_layout = 'single-page-layout';
}

$portfolio__classic_layout = get_option('classic_layout', 'false');
$portfolio__mobile_only_classic_layout = get_option('mobile_only_classic_layout', 'false');
$portfolio__setting_animation_1 = get_theme_mod('portfolio__setting_animation_1', false);
$portfolio__setting_animation_2 = get_theme_mod('portfolio__setting_animation_2', '61');
$portfolio__setting_animation_3 = get_theme_mod('portfolio__setting_animation_3', '60');
?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js <?php echo esc_attr($portfolio__page_layout); ?>"
                                      data-classic-layout="<?php echo esc_attr($portfolio__classic_layout); ?>"
                                      data-mobile-classic-layout="<?php echo esc_attr($portfolio__mobile_only_classic_layout); ?>"
                                      data-prev-animation="<?php echo esc_attr($portfolio__setting_animation_2); ?>"
                                      data-next-animation="<?php echo esc_attr($portfolio__setting_animation_3); ?>"
                                      data-random-animation="<?php echo ($portfolio__setting_animation_1) ? 'true' : 'false'; ?>">
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="profile" href="https://gmpg.org/xfn/11"/>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="hfeed sit">
    <header id="masthead" class="header" role="banner">
    <?php
      require get_template_directory() . '/widgets/sidebar.php';
      ?>
    </header>
