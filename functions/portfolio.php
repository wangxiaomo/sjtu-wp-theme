<?php


/* ------------------------------------------------------------------------*
 * REGISTER THE PORTFOLIO CUSTOM POST TYPE
 * ------------------------------------------------------------------------*/

if ( !function_exists( 'pexeto_register_portfolio' ) ) {
	function pexeto_register_portfolio() {

		//fix an incompatibility with WP 3.1
		if ( !get_option( 'custom_type_updated' ) ) {
			global $wpdb;
			$wpdb->query( "UPDATE $wpdb->posts SET post_type = 'portfolio' WHERE post_type = 'Portfolio'" );
			update_option( 'custom_type_updated', 'true' );
		}

		$labels = array(
			'name' => _x( 'Portfolio', 'portfolio name' ),
			'singular_name' => _x( 'Portfolio Item', 'portfolio type singular name' ),
			'add_new' => _x( 'Add New', 'portfolio' ),
			'add_new_item' => __( 'Add New Item' ),
			'edit_item' => __( 'Edit Item' ),
			'new_item' => __( 'New Portfolio Item' ),
			'view_item' => __( 'View Item' ),
			'search_items' => __( 'Search Portfolio Items' ),
			'not_found' =>  __( 'No portfolio items found' ),
			'not_found_in_trash' => __( 'No portfolio items found in Trash' ),
			'parent_item_colon' => ''
		);

		//register the portfolio category taxonomy
		register_taxonomy( "portfolio_category",
			array( "portfolio" ),
			array( "hierarchical" => true,
				"label" => "Portfolio Categories",
				"singular_label" => "Portfolio Categories",
				"rewrite" => true,
				"query_var" => true
			) );

		//register the portfolio custom post type
		register_post_type( 'portfolio',
			array( 'labels' => $labels,
				'public' => true,
				'show_ui' => true,
				'capability_type' => 'post',
				'hierarchical' => false,
				'rewrite'=>array( 'slug'=>'portfolio', 'feeds'=>false, 'pages'=>false ),
				'taxonomies' => array( 'portfolio_category', 'post_tag' ),
				'supports' => array( 'title', 'editor', 'thumbnail', 'comments', 'page-attributes' ) ) );
		register_taxonomy_for_object_type( 'post_tag', 'portfolio' );


	}
}

add_action( 'init', 'pexeto_register_portfolio' );


/* ------------------------------------------------------------------------*
 * SET THE DEFAULT IMAGE SIZES FOR THE PORTFOLIO ITEMS REGARDING THE
 * NUMBER OF COLUMNS
 * ------------------------------------------------------------------------*/

$pexetoImageSizes=array();

if(!function_exists('pexeto_set_gallery_image_sizes')){
	function pexeto_set_gallery_image_sizes(){
		global $pexetoImageSizes;

		$pexetoImageSizes[2]=array( 'width'=>427, 'height'=>230 );
		$pexetoImageSizes[3]=array( 'width'=>272, 'height'=>183 );
		$pexetoImageSizes[4]=array( 'width'=>195, 'height'=>130 );
	}
}
add_action( 'init', 'pexeto_set_gallery_image_sizes' );


/* ------------------------------------------------------------------------*
 * ADD A CATEGORY COLUMN TO THE PORTFOLIO ITEMS PAGE
 * ------------------------------------------------------------------------*/

if(!function_exists('pexeto_portfolio_columns')){
	function pexeto_portfolio_columns( $columns ) {
		$columns['category'] = 'Portfolio Category';
		return $columns;
	}
}
add_filter( 'manage_edit-portfolio_columns', 'pexeto_portfolio_columns' );


if(!function_exists('pexeto_portfolio_show_columns')){
	function pexeto_portfolio_show_columns( $name ) {
		global $post;
		switch ( $name ) {
		case 'category':
			$cats = get_the_term_list( $post->ID, 'portfolio_category', '', ', ', '' );
			echo $cats;
		}
	}
}
add_action( 'manage_posts_custom_column',  'pexeto_portfolio_show_columns' );

if(!function_exists('pexeto_get_taxonomies')){
	/**
	 * Gets a list of custom taxomomies by type
	 *
	 * @param unknown $type the type of the taxonomy
	 */
	function pexeto_get_taxonomies( $type ) {
		global $wpdb;

		$res = $wpdb->get_results( $wpdb->prepare( "SELECT t.term_id, t.name, t.slug FROM $wpdb->terms as t LEFT JOIN $wpdb->term_taxonomy tt ON t.term_id=tt.term_id WHERE tt.taxonomy=%s;", $type ) );
		return $res;
	}
}

if(!function_exists('pexeto_get_taxonomy_slug')){
	function pexeto_get_taxonomy_slug( $term_id ) {
		global $wpdb;

		$res = $wpdb->get_results( $wpdb->prepare( "SELECT slug FROM $wpdb->terms WHERE term_id=%s LIMIT 1;", $term_id ) );
		$res=$res[0];
		return $res->slug;
	}
}

if(!function_exists('pexeto_get_taxonomy_children')){
	function pexeto_get_taxonomy_children( $type, $parent_id ) {
		global $wpdb;

		if ( $parent_id!='-1' ) {
			$res = $wpdb->get_results( $wpdb->prepare( "SELECT t.term_id, t.name, t.slug FROM $wpdb->terms as t LEFT JOIN $wpdb->term_taxonomy tt ON t.term_id=tt.term_id WHERE tt.taxonomy=%s AND tt.parent=%s;", $type, $parent_id ) );
		}else {
			$res = $wpdb->get_results( $wpdb->prepare( "SELECT t.term_id, t.name, t.slug FROM $wpdb->terms as t LEFT JOIN $wpdb->term_taxonomy tt ON t.term_id=tt.term_id WHERE tt.taxonomy=%s;", $type ) );
		}
		return $res;
	}
}
