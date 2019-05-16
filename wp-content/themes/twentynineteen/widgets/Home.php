<?php

class portfolio__Widget__Home extends WP_Widget
{
  public function __construct()
  {
    parent::__construct('portfolio__Widget__Home',
      __('(Portfolio) [PAGE] Home', 'empathy'),
      array('description' => __('Intro page.', 'portfolio')));
  }

  public function form($instance)
  {
    if (isset($instance['title'])) {
      $title = $instance['title'];
    } else {
      $title = "";
    }
    if (isset($instance['custom_page_slug'])) {
      $custom_page_slug = $instance['custom_page_slug'];
    } else {
      $custom_page_slug = "";
    }
    if (isset($instance['icon'])) {
      $icon = $instance['icon'];
    } else {
      $icon = "";
    }

    ?>
      <table style="width: 100%; margin-top: 5px;">
          <tr>
              <td>
                  <label for="<?php echo $this->get_field_id('title'); ?>"><?php echo __('Title', 'empathy'); ?></label>
              </td>
              <td>
                  <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                         name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>">
              </td>
          </tr>
          <tr>
              <td>

              </td>
              <td>
                  <span style="display: inline-block; margin-bottom: 5px; font-size: 11px; color: #999999;"><?php echo __('For menu item.', 'empathy'); ?></span>
              </td>
          </tr>
          <tr>
              <td>
                  <label for="<?php echo $this->get_field_id('icon'); ?>"><?php echo __('Icon', 'empathy'); ?></label>
              </td>
              <td>
                  <input type="text" class="widefat" id="<?php echo $this->get_field_id('icon'); ?>"
                         name="<?php echo $this->get_field_name('icon'); ?>" value="<?php echo esc_attr($icon); ?>">
              </td>
          </tr>
          <tr>
              <td>

              </td>
              <td>
                  <span style="display: inline-block; margin-bottom: 5px; font-size: 11px; color: #999999;"><?php echo __('For page icon and menu icon.', 'empathy'); ?> <?php echo __('Use icon name.', 'empathy'); ?> <?php echo __('Available', 'empathy'); ?> <a
                              target="_blank"
                              href="http://themes-pixeden.com/font-demos/7-stroke/"><?php echo __('icons', 'empathy'); ?></a>.</span>
              </td>
          </tr>
          <tr>
              <td>
                  <label for="<?php echo $this->get_field_id('custom_page_slug'); ?>"><?php echo __('Page', 'empathy'); ?></label>
              </td>
              <td>
                  <select class="widefat" id="<?php echo $this->get_field_id('custom_page_slug'); ?>"
                          name="<?php echo $this->get_field_name('custom_page_slug'); ?>">
                      <option>&mdash; <?php echo __('Select', 'empathy'); ?> &mdash;</option>
                    <?php
                    $pages = get_pages();

                    foreach ($pages as $page) {
                      if ($custom_page_slug == $page->post_name) {
                        $option = '<option selected="selected" value="' . esc_attr($page->post_name) . '">' . $page->post_title . '</option>';
                        echo $option;
                      } else {
                        $option = '<option value="' . esc_attr($page->post_name) . '">' . $page->post_title . '</option>';
                        echo $option;
                      }
                    }
                    ?>
                  </select>
              </td>
          </tr>
          <tr>
              <td>

              </td>
              <td>
                  <span style="display: inline-block; font-size: 11px; color: #999999;"><?php echo __('Select a page for this widget. Set featured image to selected page for background image.', 'empathy'); ?></span>
              </td>
          </tr>
      </table>
      <hr>
    <?php
  }

  public function update($new_instance, $old_instance)
  {
    $instance = array();
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['custom_page_slug'] = strip_tags($new_instance['custom_page_slug']);
    $instance['icon'] = strip_tags($new_instance['icon']);
    return $instance;
  }

  public function widget($args, $instance)
  {
    extract($args);
    $title = apply_filters('widget_title', $instance['title']);
    $custom_page_slug = apply_filters('widget_custom_page_slug', $instance['custom_page_slug']);
    $icon = apply_filters('widget_icon', $instance['icon']);

    echo $before_widget;

    if (!empty($title)) {
      // echo $before_title . $title . $after_title;
    }

    $args_custom_page = 'pagename=' . $custom_page_slug;
    $loop_custom_page = new WP_Query($args_custom_page);

    if ($loop_custom_page->have_posts()) :
      while ($loop_custom_page->have_posts()) : $loop_custom_page->the_post();
        ?>
        <?php
        $background_video = "";
        $background_media = "";
        $background_media_class = "";

        if (isset($_GET['bg_video'])) {
          if ($_GET['bg_video'] == 'yes') {
            if (!empty($background_video)) {
              if (has_post_thumbnail()) {
                $attachment_id = get_post_thumbnail_id(get_the_ID());
                $background_media = 'style="background-image: url(' . wp_get_attachment_url($attachment_id) . ');"' . ' ' . 'data-parallax-video="' . esc_url($background_video) . '"';
                $background_media_class = 'has-bg-img';
              } else {
                $background_media = 'data-parallax-video="' . esc_url($background_video) . '"';
                $background_media_class = 'has-bg-img';
              }
            }
          } elseif (has_post_thumbnail()) {
            $attachment_id = get_post_thumbnail_id(get_the_ID());
            $background_media = 'style="background-image: url(' . wp_get_attachment_url($attachment_id) . ');"';
            $background_media_class = 'has-bg-img';
          }
        } else {
          if (!empty($background_video)) {
            if (has_post_thumbnail()) {
              $attachment_id = get_post_thumbnail_id(get_the_ID());
              $background_media = 'style="background-image: url(' . wp_get_attachment_url($attachment_id) . ');"' . ' ' . 'data-parallax-video="' . esc_url($background_video) . '"';
              $background_media_class = 'has-bg-img';
            } else {
              $background_media = 'data-parallax-video="' . esc_url($background_video) . '"';
              $background_media_class = 'has-bg-img';
            }
          } elseif (has_post_thumbnail()) {
            $attachment_id = get_post_thumbnail_id(get_the_ID());
            $background_media = 'style="background-image: url(' . wp_get_attachment_url($attachment_id) . ');"';
            $background_media_class = 'has-bg-img';
          }
        }
        ?>
          <section id="<?php echo esc_attr($custom_page_slug); ?>"
                   class="pt-page page-layout home-section <?php echo esc_attr($background_media_class); ?>" <?php echo $background_media; ?>>
              <div class="content">
                  <div class="layout-medium">
                      <h1 class="page-title" style="display: none;">
                        <?php
                        if (!empty($icon)) {
                          ?>
                            <i class="<?php echo esc_attr($icon); ?>"></i>
                          <?php
                        }
                        ?>
                        <?php
                        $page = get_page_by_path($custom_page_slug);

                        if ($page) {
                          echo get_the_title($page);
                        }

                        if (!empty($title)) {
                          ?>
                            <input type="hidden" name="menu-item-title" value="<?php echo esc_attr($title); ?>">
                          <?php
                        } else {
                          ?>
                            <input type="hidden" name="menu-item-title"
                                   value="<?php the_title_attribute(array('post' => $page)); ?>">
                          <?php
                        }
                        ?>
                      </h1> <!-- .page-title -->
                    <?php
                    the_content();
                    ?>
                  </div> <!-- .layout-medium -->
              </div> <!-- .content -->
          </section> <!-- .pt-page .page-layout .home-section -->
      <?php
      endwhile;
    endif;
    wp_reset_postdata();

    echo $after_widget;
  }
}

function portfolio__Widget__Home_fuc()
{
  return register_widget("portfolio__Widget__Home");
}

add_action('widgets_init', 'portfolio__Widget__Home_fuc');