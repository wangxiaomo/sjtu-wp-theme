<?php
/*
 Template Name: Contact
 */

get_header();

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();

		//get the default page settings
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
		$show_title=get_opt( '_show_page_title' );
		$sidebar=get_post_meta( $post->ID, 'sidebar_value', $single = true );
		if ( $sidebar=='' ) {
			$sidebar='default';
		}

		//include the page header template
		locate_template( array( 'includes/page-header.php' ), true, true );
?>

<div id="content-container" class="content-gradient <?php echo $layoutclass; ?> ">
<div id="<?php echo $content_id; ?>">
	<div id="full-width">
		<div class="columns-wrapper">
			<div class="homepage-column left-column">
		<!--content-->
	    <?php
			if ( $show_title!='off' ) {?>
	    	<h1 class="page-heading"><?php the_title(); ?></h1><hr/>
	    <?php }

			the_content();

			//include the contact form
			locate_template( array( 'includes/form.php' ), true, true );
		}
	}

	?>
			</div>
			<div class="three-columns-3">
			<h4>邮箱</h4><hr/>
			<p>global@global.com</p>
			<h4>电话</h4><hr/>
			<p>021-8888888</p>
			<h4>社交网络</h4><hr/>
			</div>	
		</div>	
	</div>	
</div>
<div class="clear"></div>
  </div>
<?php
get_footer();
?>
