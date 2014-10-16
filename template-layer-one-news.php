<?php
/*
 Template Name: News
 */

get_header();

?>


<div id="content-container" class="content-gradient">

	<div id="full-width">

		<div class="columns-wrapper">
			<div class="homepage-column left-column">
				<div class="box-title-bar">
					<h3><a href="weibo.com">新闻动态</a></h3>
					<a class="alignbottom alignright" href="">更多</a>
				</div>
				<?php
					global $more;
					query_posts( array ('category_name' => 'news') );
					while (have_posts()) : the_post();
				?>
				<div class="box-post-entry">
					<div class="box-post-thumbnail alignleft">
						<?php the_post_thumbnail( ); ?>
					</div>
					<div class="box-post-brief">
						<h4><?php the_title(); ?></h4>
						<hr align="left" />
						<?php $more = 0; ?>
						<p><?php the_content('[继续阅读]'); ?></p>
					</div>
				</div>
				<?php
					endwhile;
					wp_reset_query();
				?>
			</div>
			<div class="three-columns-3">
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


		</div>




	</div>
	</div> <!-- end content-->

	<div class="clear"></div>
</div> <!-- end #content-container-->

<?php get_footer(); ?>
