<?php
get_header();
?>

<div id="main" class="site-main">
    <div class="portfolio-single page-layout">
        <div class="layout-full">
            <?php
            while (have_posts()) : the_post();
                ?>
              <article id="post-<?php the_ID(); ?>" <?php post_class('hentry'); ?>>
                  <header class="entry-header">
                    <?php
                    portfolio__single_navigation();
                    ?>
                      <h1 class="entry-title"><?php the_title(); ?></h1>
                  </header>

                  <div class="entry-content">
                    <?php
                    portfolio__content();
                    ?>
                    <?php
                    portfolio__single_navigation( $portfolio_nav = 'bottom' );
                    ?>
                  </div>
              </article>
					<?php
					endwhile;
					?>
        </div>
    </div>
</div>
</div>
<?php
wp_footer();
?>
</body>
</html>