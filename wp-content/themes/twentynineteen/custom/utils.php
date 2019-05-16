<?php
if (! function_exists('portfolio_site_title'))
{
  function portfolio_site_title($mobile_title = "")
  {
    $site_title = get_bloginfo('name');

    if (! empty($site_title))
    {
      ?>
      <h1 class="site-title <?php echo esc_attr($mobile_title); ?>">
        <?php
        echo esc_html($site_title);
        ?>
      </h1>
      <?php
    }
  }
}
?>