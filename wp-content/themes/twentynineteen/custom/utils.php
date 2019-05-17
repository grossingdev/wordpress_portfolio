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

function portfolio__single_navigation( $portfolio_nav = "" )
{
	if ( wp_attachment_is_image() )
	{
		?>
      <nav class="row nav-single">
          <div class="col-sm-6 nav-previous">
              <h5>
								<?php
								previous_image_link( false, '<span class="meta-nav">&#8592;</span>' . __( 'PREVIOUS IMAGE', 'empathy' ) );
								?>
              </h5>
          </div>

          <div class="col-sm-6 nav-next">
              <h5>
								<?php
								next_image_link( false, __( 'NEXT IMAGE', 'empathy' ) . '<span class="meta-nav">&#8594;</span>' );
								?>
              </h5>
          </div>
      </nav>
		<?php
	}
  elseif ( is_singular( 'portfolio' ) )
	{
		?>
      <div class="portfolio-nav <?php echo esc_attr( $portfolio_nav ); ?>">
				<?php
				next_post_link( '<span class="left-arrow">%link</span>', "" );
				?>

				<?php
				$portfolio_page_slug = get_option( 'portfolio_page_slug', "" );

				if ( $portfolio_page_slug != "" )
				{
					$portfolio_page_url = get_home_url() . '/#/' . $portfolio_page_slug;

					?>
            <a class="back" href="<?php echo esc_url( $portfolio_page_url ); ?>"></a>
					<?php
				}
				?>

				<?php
				previous_post_link( '<span class="right-arrow">%link</span>', "" );
				?>
      </div>
		<?php
	}
	else
	{
		?>
      <nav class="row nav-single">
          <div class="col-sm-6 nav-previous">
						<?php
						previous_post_link( '<h6>' . __( 'PREVIOUS POST', 'empathy' ) . '</h6><h5>%link</h5>', '<span class="meta-nav">&#8592;</span> %title' );
						?>
          </div>

          <div class="col-sm-6 nav-next">
						<?php
						next_post_link( '<h6>' . __( 'NEXT POST', 'empathy' ) . '</h6><h5>%link</h5>', '%title <span class="meta-nav">&#8594;</span>' );
						?>
          </div>
      </nav>
		<?php
	}
}
?>