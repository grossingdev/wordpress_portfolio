<?php
function create_custom_post_type__portfolio()
{
	$labels = array('name'               => __( 'Portfolio', 'read' ),
		'singular_name'      => __( 'Portfolio Item', 'read' ),
		'add_new'            => __( 'Add New', 'read' ),
		'add_new_item'       => __( 'Add New', 'read' ),
		'edit_item'          => __( 'Edit', 'read' ),
		'new_item'           => __( 'New', 'read' ),
		'all_items'          => __( 'All', 'read' ),
		'view_item'          => __( 'View', 'read' ),
		'search_items'       => __( 'Search', 'read' ),
		'not_found'          => __( 'No Items found', 'read' ),
		'not_found_in_trash' => __( 'No Items found in Trash', 'read' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Portfolio' );


	$args = array(  'labels' => $labels,
		'public' => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'query_var'           => true,
		'show_in_nav_menus'   => true,
		'capability_type'     => 'post',
		'hierarchical'        => false,
		'menu_position'       => 5,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
		'rewrite'             => array( 'slug' => 'portfolio', 'with_front' => false ) );


	register_post_type( 'portfolio' , $args );
}

add_action( 'init', 'create_custom_post_type__portfolio' );

function custom__portfolio_columns( $pf_columns ) {
	$pf_columns = array('cb'                   => '<input type="checkbox">',
		'title'                => __( 'Title', 'read' ),
		'pf_featured_image'    => __( 'Featured Image', 'read' ),
		'portfolio-categories' => __( 'Portfolio Categories', 'read' ),
		'date'                 => __( 'Date', 'read' ) );
	return $pf_columns;
}

add_filter( 'manage_edit-portfolio_columns', 'custom__portfolio_columns' );

function manage__custom_columns__portfolio( $pf_column ) {
	global $post, $post_ID;
	switch ( $pf_column )
	{
		case 'pf_featured_image':
			if ( has_post_thumbnail() )  {
				the_post_thumbnail( 'thumbnail' );
			}
			break;
		case 'portfolio-categories':
			$taxonomy = 'portfolio-category';
			$terms_list = get_the_terms( $post_ID, $taxonomy );
			if ( ! empty( $terms_list ) ) {
				$out = array();
				foreach ( $terms_list as $term_list ) {
					$out[] = '<a href="edit.php?post_type=portfolio&portfolio-category=' . $term_list->slug . '">' . $term_list->name . ' </a>';
				}
				echo join( ', ', $out );
			}
			break;
	}
}

add_action( 'manage_posts_custom_column',  'manage__custom_columns__portfolio' );

function custom__taxonomy__portfolio() {
	$labels_cat = array('name'              => __( 'Portfolio Categories', 'read' ),
		'singular_name'     => __( 'Portfolio Category', 'read' ),
		'search_items'      => __( 'Search', 'read' ),
		'all_items'         => __( 'All', 'read' ),
		'parent_item'       => __( 'Parent', 'read' ),
		'parent_item_colon' => __( 'Parent:', 'read' ),
		'edit_item'         => __( 'Edit', 'read' ),
		'update_item'       => __( 'Update', 'read' ),
		'add_new_item'      => __( 'Add New', 'read' ),
		'new_item_name'     => __( 'New Name', 'read' ),
		'menu_name'         => __( 'Portfolio Categories', 'read' ) );


	register_taxonomy(  'portfolio-category',
		array( 'portfolio' ),
		array(  'hierarchical' => true,
			'labels'       => $labels_cat,
			'show_ui'      => true,
			'public'       => true,
			'query_var'    => true,
			'rewrite'      => array( 'slug' => 'portfolio-category' ) ) );
}

add_action( 'init', 'custom__taxonomy__portfolio' );

function portfolio__content()
{
	if ( is_home() || is_archive() || is_search() )
	{
		if ( has_excerpt() )
		{
			the_excerpt();

			echo '<p class="more"><a class="more-link" href="' . get_permalink( get_the_ID() ) . '">' . __( 'Read More', 'empathy' ) . '</a></p>';
		}
		else
		{
			$theme_excerpt = get_option( 'theme_excerpt', 'No' );

			if ( $theme_excerpt == 'Yes' )
			{
				the_excerpt();
			}
			elseif ( $theme_excerpt == 'standard' )
			{
				$format = get_post_format();

				if ( $format == false )
				{
					the_excerpt();
				}
				else
				{
					the_content( __( 'Read More', 'empathy' ) );
				}
			}
			else
			{
				the_content( __( 'Read More', 'empathy' ) );
			}
		}
	}
	else
	{
		the_content();
	}


	wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'empathy' ), 'after' => '</div>' ) );
}
?>