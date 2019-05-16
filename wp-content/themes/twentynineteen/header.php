<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="profile" href="https://gmpg.org/xfn/11"/>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>
<?php wp_body_open(); ?>
<div id="page" class="hfeed sit">
    <header id="masthead" class="header" role="banner">
      <a class="menu-toggle toggle-link"></a>

      <?php
      portfolio_site_title('mobile-title');
      ?>

      <div class="header-wrap">
      <?php
        $logo_image = get_option('logo_image', "");
        if ($logo_image != "") {
        ?>
          <img alt="<?php bloginfo('name'); ?>" src="<?php echo esc_url($logo_image); ?>">
      <?php
        }
      ?>
      <?php
        portfolio_site_title();
        $classic_navigation_menu = get_option('classic_navigation_menu', 'No');
        if (is_page_template('template-homepage.php')) {
      ?>
          <nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
              <div class="nav-menu">
                  <ul class="menu-auto">

                  </ul>

                  <script>
                      jQuery(document).ready(function ($) {
                          var menu_html = "";

                          $('#main').find('section').each(function () {
                              var id = $(this).attr('id');
                              var icon = $(this).find('.page-title  i').attr('class');
                              var title = $(this).find('.page-title input').val();
                              var menu_item = '<li><a href="#/' + id + '"><i class="' + icon + '"></i>' + title + '</a></li>';

                              menu_html += menu_item;
                              $('.menu-auto').html(menu_html);
                          });
                      });
                  </script>
              </div>
          </nav>
      <?php } ?>
    </header>
