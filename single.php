<?php
/**
 * This is the template for the single blog post page.
 */
get_header();

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		
		//get the post settings
		$id=get_the_ID();
		$cat=get_the_category();
		$postTitle=get_the_title();
		$post_type=get_post_type( $post );
		$subtitle='';
		$slider='none';
		$layout=get_opt( '_blog_layout' );
		$sidebar=get_opt( '_blog_sidebar' );

		//include the page header template
		locate_template( array( 'includes/page-header.php' ), true, true );
?>

		<div id="content-container" class="content-gradient <?php echo $layoutclass; ?> ">
		<div id="<?php echo $content_id; ?>">
		<!--content-->
	   	<?php

		//include the post template
		locate_template( array( 'includes/post-template.php' ), true, true );

	}
} ?>

</div>

			<div class="three-columns-3">
				<div class="empty-box">
				</div>
				<div class="column-box">
					<div class="box-title-bar">
						<h3><a href="">成果展示</a></h3>
						<a class="alignbottom alignright">更多</a>
					</div>
					<div class="box-content">
					<?php
						query_posts( array ('category_name' => 'achievement') );
						while (have_posts()) : the_post();
					?>
					<div class="box-achievement-entry">
						<div class="box-achievement-thumbnail aligncenter">
							<?php the_post_thumbnail( ); ?>
						</div>
						<h6><?php the_title(); ?></h6>
					</div>
					<?php
						endwhile;
						wp_reset_query();
					?>
					</div>
				</div>
				<div class="column-box">
					<div class="box-title-bar">
						<h3><a href="">视频资料</a></h3>
						<a class="alignbottom alignright">更多</a>
					</div>
				</div>
			</div>


<div class="clear"></div>
</div>
<?php get_footer();   ?>
