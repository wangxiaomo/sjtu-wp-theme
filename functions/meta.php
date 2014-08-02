<?php

/* ------------------------------------------------------------------------*
 * CALL THE FUNCTIONS FOR CREATING CUSTOM FIELDS
 * ------------------------------------------------------------------------*/

add_action( 'admin_menu', 'create_meta_box' );
add_action( 'admin_menu', 'create_meta_post_box' );
add_action( 'save_post', 'save_postdata' );


$portfolio_cats=pexeto_get_taxonomies( 'portfolio_category' );

for ( $i=0; $i<count( $portfolio_cats ); $i++ ) {
	$portfolio_cat_ids[$i]=$portfolio_cats[$i]->term_id;
	$portfolio_cat_names[$i]=$portfolio_cats[$i]->name;
}

//get the sidebars available for the portfolio posts content
$sidebar_ids=array();
$sidebar_names=array();
foreach ( $pexeto_sidebars as $sidebar ) {
	$sidebar_ids[]=$sidebar['id'];
	$sidebar_names[]=$sidebar['name'];
}

$pexeto_slider_data=pexeto_get_slider_data();



/* ------------------------------------------------------------------------*
 * ADD NEW META BOXES TO THE PAGES
 * ------------------------------------------------------------------------*/


$new_meta_boxes =
	array(

	array(
		"title" => '<div class="ui-icon ui-icon-wrench"></div>Main Page Settings - 
		available for all page templates',
		"type" => "heading" ),

	array(
		"title" => "Slider",
		"name" => "slider",
		"type" => "select",
		"options" => array( 'None' , 'Tumbnail Slider', 'Nivo Slider/Fader', 'Accordion Slider', 'Content Slider', 'Static Header Image' ),
		"values" => array( 'none', 'slider-thumbnail', 'slider-nivo', 'slider-accordion', 'slider-content', 'static-header'),
		"classes" => array( 'none', 'thumbnailslider', 'nivoslider', 'accordionslider', 'contentslider', 'static'),
		"std" => 'none',
		"description" => 'If one of the 4 sliders has been selected, 
		you can add the images in the "Dandelion Options" page in the section of 
		the selected slider. If "Static Header Image" has been selected, you can 
		upload the image in the Featured Image section on this page in the
		right sidebar. If "None" has been selected, you can set a subtitle to 
		the main header line in the "Subtitle" field below.'
	),

	array(
		"title" => "Slider Name",
		"name" => "slider_name",
		"type" => "select",
		"options" => $pexeto_slider_data['names'],
		"values" => $pexeto_slider_data['ids'],
		"classes" => $pexeto_slider_data['classes'],
		"std" => 'default',
		"description" => 'If you have created additional sliders you can select 
		the name of the slider to be displayed on this page. By default the 
		Default slider for each slider type is displayed.'
	),

	array(
			"title" => "Page Layout",
			"name" => "layout",
			"type" => "imageradio",
			"options" => array(array("img"=>PEXETO_IMAGES_URL.'layout-right-sidebar.png', "id"=>"right", "title"=>"Right Sidebar Layout"),
			array("img"=>PEXETO_IMAGES_URL.'layout-left-sidebar.png', "id"=>"left", "title"=>"Left Sidebar Layout"),
			array("img"=>PEXETO_IMAGES_URL.'layout-full-width.png', "id"=>"full", "title"=>"Full Width Layout")),
			"std" => 'right',
			"description" => 'Available for Default, Featured Posts and Contact page templates'
			),

	"image" => array(
		"name" => "subtitle",
		"std" => "",
		"type" => "text",
		"title" => "Subtitle",
		"description" => "This is the subtitle that will be shown on the page if 
		no slider is enabled" ),

	array(
		"name" => "sidebar",
		"title" => "Sidebar",
		"type" => "select",
		"options" => $sidebar_names,
		"values" => $sidebar_ids,
		"std" => 'default',
		"description" => 'You can select a sidebar for this page between the default 
		one and another one that you have created. If you would like to use another 
		sidebar, rather than the default one, you can create a new sidebar in 
		"Dandelion Options->Sidebars" section and after that you will be able to 
		select the sidebar here.' ),

	array(
		"title" => '<div class="ui-icon ui-icon-image"></div>Portfolio Settings - available only for Portfolio page templates',
		"type" => "heading" ),

	array(
		"name" => "postCategory",
		"title" => "Display items from categories",
		"type" => "select",
		"none" => true,
		"options" => $portfolio_cat_names,
		"values" => $portfolio_cat_ids,
		"std" => '-1',
		"description" => 'If "All Categories" selected, all the Portfolio items 
		will be displayed. If another category is selected, only the Portfolio 
		items that belong to this category or this category\'s subcategories 
		will be displayed.' ),

	array(
		"name" => "column_number",
		"title" => "Number of columns",
		"type" => "select",
		"options" => array( 'Two Columns ', 'Three Columns', 'Four Columns' ),
		"values" => array( '2', '3', '4' ),
		"std" => '3',
		"description" => 'Available for the Gallery template' ),

	array(
		"name" => "order",
		"title" => "Portfolio item order",
		"type" => "select",
		"options" => array( 'By Date', 'By Custom Order' ),
		"values" => array( 'date', 'custom' ),
		"std" => 'date',
		"description" => 'If you select "By Date" the last created item will be 
		displayed first. If you select by "By Custom Order" you will have to set 
		the order field of each of the items.' ),


	array(
		"name" => "categories",
		"title" => "Show portfolio categories",
		"type" => "select",
		"options" => array( 'Show ', 'Hide ' ),
		"values" => array( 'show', 'hide' ),
		"std" => 'show',
		"description" => 'If "Show" selected, a category filter will be displayed 
		above the portfolio items (only for the Gallery template)' ),


	array(
		"name" => "showdesc",
		"title" => "Show item descriptions",
		"type" => "select",
		"options" => array( 'Hide ', 'Show ' ),
		"values" => array( 'false', 'true' ),
		"std" => 'hide',
		"description" => 'If "Show" selected, portfolio item title and description 
		will be displayed below the image (only for the Gallery template)'
	),


	array(
		"title" => "Number of posts per page",
		"name" => "postNumber",
		"std" => "6",
		"type" => "text",
		"description" => "The number of smaller thumbnails to be displayed per page"
	),

	array(
		"title" => "Turn on/off automatic thumbnail generation",
		"name" => "_auto_portfolio_thumbnail",
		"type" => "select",
		"options" => array( "ON ", "OFF " ),
		"values" => array( "on", "off" ),
		"description" => "If you turn off this functionality you will be able to 
		add your own thumbnail images to your portfolio items- you can do this 
		by inserting the thumbnail URL in the Thumbnail field of the Portfolio 
		item post."
	),

	array(
		"title" => "Turn on/off title link",
		"name" => "_title_link",
		"type" => "select",
		"options" => array( "ON ", "OFF " ),
		"values" => array( "on", "off" ),
		"description" => "If this functionality is turned on, the titles of 
		your portfolio items will be links and will link to the section which 
		contains the content of the portfolio item post. (only for the Gallery template)"
	),
);


/* ------------------------------------------------------------------------*
 * ADD NEW META BOXES TO THE PORTFOLIO POSTS
 * ------------------------------------------------------------------------*/



$new_meta_post_boxes =
	array(

	array(
		"title" => "When clicked on the image open:",
		"name" => "action",
		"type" => "select",
		"options" => array( "Preview image in lightbox", "The content of the item", "Play Video", "Custom link", "Do Nothing" ),
		"values" => array( "lightbox", "permalink", "video", "custom", "nothing" ),
		"std" => "lightbox",
		"description" => "Select the action to be performed after clicking on a 
		portfolio item. (only for the Gallery template)"
	),

	array(
		"title" => "Thumbnail URL",
		"name" => "thumbnail",
		"std" => "",
		"type" => "upload",
		"description" => "The URL for the smaller thumbnail image- <b>only if 
		automatic thumbnail generation is set to OFF</b> in the containing
		portfolio page."
	),

	array(
		"title" => "Preview Image URL",
		"name" => "preview",
		"std" => "",
		"type" => "upload",
		"description" => 'If "Preview image in lightbox" you can insert the URL 
		of the preview image'
	),

	array(
		"title" => "Custom Link/Video URL",
		"name" => "custom",
		"std" => "",
		"type" => "text",
		"description" => 'If "Play Video" selected above, you can insert a video 
		URL here. If "Custom link" selected above, you can insert the custom URL 
		(only for the Gallery template)'
	),

	array(
			"title" => "Crop thumbnail image from",
			"name" => "crop",
			"type" => "imageradio",
			"options" => array(array("img"=>PEXETO_IMAGES_URL.'crop-c.png', "id"=>"c", "title"=>"Center"),
			array("img"=>PEXETO_IMAGES_URL.'crop-t.png', "id"=>"t", "title"=>"Top"),
			array("img"=>PEXETO_IMAGES_URL.'crop-b.png', "id"=>"b", "title"=>"Bottom"),
			array("img"=>PEXETO_IMAGES_URL.'crop-l.png', "id"=>"l", "title"=>"Left"),
			array("img"=>PEXETO_IMAGES_URL.'crop-r.png', "id"=>"r", "title"=>"Right")
			),
			"std" => "c",
			"description" => 'This option is available when the thumbnail will be 
			automatically generated from the preview image (when the automatic image
			resizing is enabled in the gallery page)- you can see above how the cropping 
			settings will affect both portrait and landscape oriented images.
			'
			),

	array(
		"title" => "Item Description",
		"name" => "description",
		"std" => "",
		"type" => "textarea",
		"description" => 'If the "Show item descriptions" field in enabled in the 
		portfolio page, the description text will be displayed below the item image. 
		If it is disabled, the description will be displayed in the lightbox. 
		(only for the Gallery template)'
	),

	"image" => array(
		"name" => "subtitle",
		"std" => "",
		"type" => "text",
		"title" => "Subtitle",
		"description" => "This is the subtitle that will be shown in the horizontal 
		bar below the main menu" ),

);


if(!function_exists('new_meta_boxes')){
	/**
	 * Calls the print method for page meta boxes.
	 */
	function new_meta_boxes() {
		global $post, $new_meta_boxes;

		foreach ( $new_meta_boxes as $meta_box ) {
			print_meta_box( $meta_box, $post );
		}
	}
}


if(!function_exists('new_meta_post_boxes')){
	/**
	 * Calls the print method for post meta boxes.
	 */
	function new_meta_post_boxes() {
		global $post, $new_meta_post_boxes;

		foreach ( $new_meta_post_boxes as $meta_box ) {
			print_meta_box( $meta_box, $post );
		}
	}
}

if(!function_exists('print_meta_box')){
	/**
	 * Prints the meta box
	 *
	 * @param unknown $meta_box the meta box to be printed
	 * @param unknown $post     the post to contain the meta box
	 */
	function print_meta_box( $meta_box, $post ) {
		$meta_box_value = "";
		if(isset($meta_box['name'])){
			$meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);
		}

		if(empty($meta_box_value) && isset($meta_box['std'])){
			$meta_box_value = $meta_box['std'];
		}

		switch ( $meta_box['type'] ) {
		case 'heading':
			echo'<div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
	<h4>'.$meta_box['title'].'</h4></div>';
			break;
		case 'text':
			echo '<div class="option-container">';
			echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename( __FILE__ ) ).'" />';

			echo'<h4 class="page-option-title">'.$meta_box['title'].'</h4>';

			echo'<input type="text" name="'.$meta_box['name'].'_value" value="'.$meta_box_value.'" class="option-input"/><br />';

			echo'<span class="option-description">'.$meta_box['description'].'</span>';
			echo '</div>';
			break;
		case 'upload':
			echo '<div class="option-container">';
			echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename( __FILE__ ) ).'" />';

			echo'<h4 class="page-option-title">'.$meta_box['title'].'</h4>';

			echo'<input type="text" name="'.$meta_box['name'].'_value" value="'.$meta_box_value.'" id="pexeto-'.$meta_box['name'].'" class="option-input upload"/>';

			echo '<div id="pexeto-'.$meta_box['name'].'_button" class="upload-button upload-logo" ><a class="button button-upload"><span>Upload</span></a></div><br/>';

			//call the script for this upload button particularly
			echo '<script type="text/javascript">jQuery(document).ready(function($){
					pexetoOptions.loadUploader(jQuery("div#pexeto-'.$meta_box['name'].'_button"), "'.PEXETO_FUNCTIONS_URL.'upload-handler.php", "'.PEXETO_UPLOADS_URL.'");
				});</script>';

			echo'<span class="option-description">'.$meta_box['description'].'</span>';
			echo '</div>';
			break;
		case 'textarea':
			echo '<div class="option-container">';
			echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename( __FILE__ ) ).'" />';

			echo'<h4 class="page-option-title">'.$meta_box['title'].'</h4>';

			echo'<textarea name="'.$meta_box['name'].'_value" class="option-textarea" />'.$meta_box_value.'</textarea><br />';

			echo'<span class="option-description">'.$meta_box['description'].'</span>';
			echo '</div>';
			break;
		case 'imageradio':
			echo '<div class="option-container">';
			echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename( __FILE__ ) ).'" />';

			echo'<h4 class="page-option-title">'.$meta_box['title'].'</h4>';
				if(sizeof($meta_box['options'])>0){
					foreach ($meta_box['options'] as $option) { 
						$checked= $meta_box_value == $option['id']?'checked="checked"':'';
						echo '<div class="imageradio"><input type="radio" name="'.$meta_box['name'].'_value" value="'.$option['id'].'" '.$checked.'/><img src="'.$option['img'].'" title="'.$option['title'].'"/></div>';
					}
				}

			echo'<span class="option-description">'.$meta_box['description'].'</span>';
			echo '</div>';
			break;
		case 'select':

			echo '<div class="option-container">';
			echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename( __FILE__ ) ).'" />';

			echo'<h4 class="page-option-title">'.$meta_box['title'].'</h4>';
			echo '<select name="'.$meta_box['name'].'_value" id="'.$meta_box['name'].'_value">';

			if ( $meta_box['none'] ) {
	?>
	<option value="-1">All Categories</option>
					<?php
			}
			$counter=0;

			if ( sizeof( $meta_box['options'] )>0 ) {
				foreach ( $meta_box['options'] as $option ) { ?>
	<option
	<?php if ( $meta_box_value == $meta_box['values'][$counter] ) {
						echo ' selected="selected"';
					}
					if ( $meta_box['values'][$counter]=='disabled' ) {
						echo ' disabled="disabled"';
					}

					if ( isset($meta_box['classes']) && sizeof( $meta_box['classes'] )>0 ) {
						echo ' class="'.$meta_box['classes'][$counter].'"';
					}
	?>
		value="<?php echo $meta_box['values'][$counter];?>"><?php echo $option; ?></option>
	<?php
					$counter++;
				}
			}
			echo '</select>';

			echo'<span class="option-description">'.$meta_box['description'].'</span>';
			echo '</div>';
			break;
		}

		wp_nonce_field( 'pexeto_meta', 'pexeto_meta_nonce' );
	}
}


if ( !function_exists( 'create_meta_box' ) ) {
	/**
	 * Creates page a meta box.
	 */
	function create_meta_box() {
		global $theme_name;
		if ( function_exists( 'add_meta_box' ) ) {
			add_meta_box( 'new-meta-boxes', '<div class="icon-small"></div> DANDELION PAGE SETTINGS', 'new_meta_boxes', 'page', 'normal', 'high' );
		}
	}
}


if ( !function_exists( 'create_meta_post_box' ) ) {
	/**
	 * Creates a post meta box.
	 */
	function create_meta_post_box() {
		global $theme_name;
		if ( function_exists( 'add_meta_box' ) ) {
			add_meta_box( 'new-meta-post-boxes', '<div class="icon-small"></div> DANDELION PORTFOLIO ITEM SETTINGS', 'new_meta_post_boxes', 'portfolio', 'normal', 'high' );
		}
	}
}


if ( !function_exists( 'save_postdata' ) ) {
	/**
	 * Saves the meta box content of a page
	 *
	 * @param unknown $post_id the ID of the page that contains the meta box
	 */
	function save_postdata( $post_id ) {
		global $post, $new_meta_boxes, $new_meta_post_boxes;

		if(isset($post) && isset($post->post_type)){
			if($post->post_type=='page'){
				$meta_boxes = $new_meta_boxes;
			}elseif($post->post_type=='portfolio'){
				$meta_boxes = $new_meta_post_boxes;
			}else{
				return $post_id;
			}
		}else{
			return $post_id;
		}

		if(!wp_verify_nonce($_POST['pexeto_meta_nonce'], 'pexeto_meta')){
			return $post_id;
		}

		foreach ( $meta_boxes as $meta_box ) {

			if ( $meta_box['type']!='heading' && isset( $_POST[$meta_box['name'].'_value'])) {
			
				if ( 'page' == $_POST['post_type'] ) {
					if ( !current_user_can( 'edit_page', $post_id ) )
						return $post_id;
				} else {
					if ( !current_user_can( 'edit_post', $post_id ) )
						return $post_id;
				}

				$data = $_POST[$meta_box['name'].'_value'];



				if ( get_post_meta( $post_id, $meta_box['name'].'_value' ) == "" )
					add_post_meta( $post_id, $meta_box['name'].'_value', $data, true );
				elseif ( $data != get_post_meta( $post_id, $meta_box['name'].'_value', true ) )
					update_post_meta( $post_id, $meta_box['name'].'_value', $data );
				elseif ( $data == "" )
					delete_post_meta( $post_id, $meta_box['name'].'_value', get_post_meta( $post_id, $meta_box['name'].'_value', true ) );

			}
		}
	}
}
