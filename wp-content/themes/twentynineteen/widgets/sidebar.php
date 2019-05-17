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