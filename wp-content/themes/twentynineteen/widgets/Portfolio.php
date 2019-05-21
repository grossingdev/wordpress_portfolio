<?php
class portfolio__Widget__Portfolio extends WP_Widget
{
	public function __construct()
	{
		parent::__construct('portfolio__widget__portfolio',
			__( '(Portfolio) [PAGE] Portfolio', 'portfolio' ),
			array( 'description' => __( 'Portfolio items.', 'portfolio' ) ) );
	}

	public function form( $instance )
	{
		if ( isset( $instance[ 'title' ] ) ) { $title = $instance[ 'title' ]; } else { $title = ""; }
		if ( isset( $instance[ 'portfolio_page_slug' ] ) ) { $portfolio_page_slug = $instance[ 'portfolio_page_slug' ]; } else { $portfolio_page_slug = ""; }
		if ( isset( $instance[ 'item_width' ] ) ) { $item_width = $instance[ 'item_width' ]; } else { $item_width = '340'; }
		if ( isset( $instance[ 'icon' ] ) ) { $icon = $instance[ 'icon' ]; } else { $icon = ""; }

		?>
		<table style="width: 100%; margin-top: 5px;">
			<tr>
				<td>
					<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo __( 'Title', 'portfolio' ); ?></label>
				</td>
				<td>
					<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>">
				</td>
			</tr>
			<tr>
				<td>

				</td>
				<td>
					<span style="display: inline-block; margin-bottom: 5px; font-size: 11px; color: #999999;"><?php echo __('For menu item.', 'portfolio'); ?></span>
				</td>
			</tr>
			<tr>
				<td>
					<label for="<?php echo $this->get_field_id( 'icon' ); ?>"><?php echo __( 'Icon', 'portfolio' ); ?></label>
				</td>
				<td>
					<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'icon' ); ?>" name="<?php echo $this->get_field_name( 'icon' ); ?>" value="<?php echo esc_attr( $icon ); ?>">
				</td>
			</tr>
			<tr>
				<td>

				</td>
				<td>
					<span style="display: inline-block; margin-bottom: 5px; font-size: 11px; color: #999999;"><?php echo __('For page icon and menu icon.', 'portfolio'); ?> <?php echo __('Use icon name.', 'portfolio'); ?> <?php echo __('Available', 'portfolio'); ?> <a target="_blank" href="http://themes-pixeden.com/font-demos/7-stroke/"><?php echo __('icons', 'portfolio'); ?></a>.</span>
				</td>
			</tr>
			<tr>
				<td>
					<label for="<?php echo $this->get_field_id( 'portfolio_page_slug' ); ?>"><?php echo __( 'Page', 'portfolio' ); ?></label>
				</td>
				<td>
					<select id="<?php echo $this->get_field_id( 'portfolio_page_slug' ); ?>" name="<?php echo $this->get_field_name( 'portfolio_page_slug' ); ?>" class="widefat">
						<option>&mdash; <?php echo __('Select', 'portfolio'); ?> &mdash;</option>
						<?php
						$pages = get_pages();

						foreach ( $pages as $page )
						{
							if ( $portfolio_page_slug == $page->post_name )
							{
								$option = '<option selected="selected" value="' . esc_attr( $page->post_name ) . '">' . $page->post_title . '</option>';
								echo $option;
							}
							else
							{
								$option = '<option value="' . esc_attr( $page->post_name ) . '">' . $page->post_title . '</option>';
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
					<span style="display: inline-block; margin-bottom: 5px; font-size: 11px; color: #999999;"><?php echo __('Select a page for this widget.', 'portfolio'); ?></span>
				</td>
			</tr>
		</table>
		<table style="width: 100%; margin-top: 5px;">
			<tr>
				<td style="width: 80px;">
					<label for="<?php echo $this->get_field_id( 'item_width' ); ?>"><?php echo __( 'Item Width', 'portfolio' ); ?></label>
				</td>
				<td>
					<input type="number" min="100" max="500" step="10" class="widefat" id="<?php echo $this->get_field_id( 'item_width' ); ?>" name="<?php echo $this->get_field_name( 'item_width' ); ?>" value="<?php echo esc_attr( $item_width ); ?>">
				</td>
			</tr>
			<tr>
				<td>

				</td>
				<td>
					<span style="font-size: 11px; color: #999999;"><?php echo __('Default: 340 (px)', 'portfolio'); ?></span>
				</td>
			</tr>
		</table>

		<hr>
		<?php
	}

	public function update( $new_instance, $old_instance )
	{
		$instance = array();
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['portfolio_page_slug'] = strip_tags( $new_instance['portfolio_page_slug'] );
		update_option( 'portfolio_page_slug', strip_tags( $new_instance['portfolio_page_slug'] ) );
		$instance['item_width'] = strip_tags( $new_instance['item_width'] );
		$instance['icon'] = strip_tags( $new_instance['icon'] );

		return $instance;
	}

	public function widget( $args, $instance )
	{
		extract( $args );

		$title = apply_filters( 'widget_title', $instance['title'] );
		$portfolio_page_slug = apply_filters( 'widget_portfolio_page_slug', $instance['portfolio_page_slug'] );
		$portfolio_page_id = "";
		$item_width = apply_filters( 'widget_item_width', $instance['item_width'] );
		$icon = apply_filters( 'widget_icon', $instance['icon'] );

		echo $before_widget;

		if ( ! empty( $title ) )
		{
			// echo $before_title . $title . $after_title;
		}

		if (! empty($portfolio_page_slug))
		{
			$args_pf_content = 'pagename=' . $portfolio_page_slug;
			$loop_pf_content = new WP_Query( $args_pf_content );

			if ( $loop_pf_content->have_posts() ) :
				while ( $loop_pf_content->have_posts() ) : $loop_pf_content->the_post();

					$portfolio_page_id = get_the_ID();

					$attachment_id = get_post_thumbnail_id(get_the_ID());

					?>
					<section id="<?php echo esc_attr( $portfolio_page_slug ); ?>" class="pt-page page-layout portfolio <?php if ( has_post_thumbnail() ) { echo 'has-bg-img' . '"' . ' style="background-image: url( ' . wp_get_attachment_url( $attachment_id ) . ' );"'; } else { echo '"'; } ?>>
									<div class="content">
					<div class="layout-medium">
					<h1 class="page-title">
						<?php
						if (! empty($icon))
						{
							?>
							<i class="<?php echo esc_attr($icon); ?>"></i>
							<?php
						}
						?>
						<?php
						$page = get_page_by_path($portfolio_page_slug);

						if ($page)
						{
							echo get_the_title($page);
						}

						if (! empty($title))
						{
							?>
							<input type="hidden" name="menu-item-title" value="<?php echo esc_attr($title); ?>">
							<?php
						}
						else
						{
							?>
							<input type="hidden" name="menu-item-title" value="<?php the_title_attribute(array('post' => $page)); ?>">
							<?php
						}
						?>
					</h1> <!-- .page-title -->

					<?php
					$portfolio_page_content = get_the_content();
					$portfolio_page_content = trim( $portfolio_page_content );

					if ( ! empty( $portfolio_page_content ) )
					{
						?>
						<div class="entry-content">
							<?php
							the_content();
							?>
						</div>
						<?php
					}

				endwhile;
			endif;
			wp_reset_postdata();
		}
		else
		{
			?>
			<section id="<?php echo esc_attr( $portfolio_page_slug ); ?>" class="pt-page page-layout portfolio">
			<div class="content">
			<div class="layout-medium">
			<h1 class="page-title">
				<?php
				if (! empty($icon))
				{
					?>
					<i class="<?php echo esc_attr($icon); ?>"></i>
					<?php
				}
				?>
				<?php
				$page = get_page_by_path($portfolio_page_slug);

				if ($page)
				{
					echo get_the_title($page);
				}

				if (! empty($title))
				{
					?>
					<input type="hidden" name="menu-item-title" value="<?php echo esc_attr($title); ?>">
					<?php
				}
				else
				{
					?>
					<input type="hidden" name="menu-item-title" value="<?php the_title_attribute(array('post' => $page)); ?>">
					<?php
				}
				?>
			</h1> <!-- .page-title -->
			<?php
		}

		?>

			<ul id="filters" class="filters">
				<?php
				    $pf_terms = get_categories('type=portfolio&taxonomy=portfolio-category');
				    if (count($pf_terms) >= 2) {
                ?>
					    <li class="current"><a href="#" data-filter="*"><?php _e('All', 'portfolio'); ?></a></li>
                <?php
    				}
	    			foreach ($pf_terms as $pf_term)
		    		{
                ?>
				    	<li><a href="#" data-filter=".<?php echo esc_attr($pf_term->slug); ?>"><?php echo esc_attr($pf_term->name); ?></a></li>
                <?php
	    			}
				?>
			</ul>

			<div class="portfolio-items media-grid masonry" data-layout="masonry" data-item-width="<?php echo esc_attr( $item_width ); ?>">
				<?php
				$args_portfolio = array(    'post_type'      => 'portfolio',
					'posts_per_page' => -1 );

				$loop_portfolio = new WP_Query( $args_portfolio );

				if ( $loop_portfolio->have_posts() ) :

					while ( $loop_portfolio->have_posts() ) : $loop_portfolio->the_post();

						$pf_type = get_option( get_the_ID() . 'pf_type', 'Standard' );
						$pf_type_icon = "image";
						$terms = get_the_terms( get_the_ID(), 'portfolio-category' );
						$on_draught = "";

						if ( $terms && ! is_wp_error( $terms ) ) {
							$draught_links = array();
							foreach ( $terms as $term ) {
								$draught_links[] = $term->slug;
							}
							$on_draught = join( ' ', $draught_links );
						}

						?>
						<div id="post-<?php the_ID(); ?>" <?php post_class( 'media-cell hentry' . ' ' . $on_draught . ' ' . $pf_type_icon ); ?>>
							<?php
							if ( has_post_thumbnail() )
							{
								?>
								<div class="media-box">
									<?php
									the_post_thumbnail( 'portfolio__image_size_2' );
									?>

									<div class="mask">
                                        <h3><?php the_title(); ?></h3>
                                        <h4><?php if ( has_excerpt() ) { echo get_the_excerpt(); }?></h4>
                                    </div>

									<?php
									{
										$portfolio__ajax = get_option( 'portfolio__ajax', 'Yes' );
										if ( $portfolio__ajax != 'No' )
										{
											?>
											<a class="ajax" href="<?php the_permalink(); ?>"></a>
											<?php
										}
										else
										{
											?>
											<a href="<?php the_permalink(); ?>"></a>
											<?php
										}
									}
									?>
								</div>
								<?php
							}
							?>
<!---->
<!--							<div class="media-cell-desc">-->

<!--								--><?php
//								if ( has_excerpt() ) {
//                                ?>
<!--									<p class="category">-->
<!--										--><?php
//										    echo get_the_excerpt();
//										?>
<!--									</p>-->
<!--									--><?php
//								}
//								?>
<!--							</div>-->
						</div>
					<?php

					endwhile;
				endif;
				wp_reset_postdata();
				?>
			</div>
		</div>
		</div>
		</section>
		<?php
		echo $after_widget;
	}
}


function portfolio__Widget__Portfolio_fuc()
{
	return register_widget("portfolio__Widget__Portfolio");
}

add_action('widgets_init', 'portfolio__Widget__Portfolio_fuc');
?>