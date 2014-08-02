<?php
/*
 Template Name: Featured page
 */

get_header();

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();

		//get the page settings
		$title=get_the_title();
		$cat_id=get_opt( '_featured_cat' );
		$subtitle=get_post_meta( $post->ID, 'subtitle_value', true );
		$slider=get_post_meta( $post->ID, 'slider_value', $single = true );
		$slider_prefix=get_post_meta( $post->ID, 'slider_name_value', true );
		if ( $slider_prefix=='default' ) {
			$slider_prefix='';
		}
		$layout=get_post_meta( $post->ID, 'layout_value', true );
		if ( $layout=='' ) {
			$layout='right';
		}
		$sidebar=get_post_meta( $post->ID, 'sidebar_value', true );
		if ( $sidebar=='' ) {
			$sidebar='default';
		}

		//include the page header template
		locate_template( array( 'includes/page-header.php' ), true, true );

?>
<div id="content-container" class="content-gradient <?php echo $layoutclass; ?> ">
<div id="<?php echo $content_id; ?>">
<?php
		the_content();

	}
}
?>
<div class="post-boxes">
<?php
query_posts( array(
		'cat' => $cat_id,
		'posts_per_page' => -1
	) );


if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		global $more;
		$more = 0;

		//include the post template
		locate_template( array( 'includes/post-template.php' ), true, false );

	}
}    ?>
</div>
</div>

<?php
if ( $layout!='full' ) {
	print_sidebar( $sidebar );
}
?>

<div class="clear"></div>
</div>
<?php
get_footer();
?>
