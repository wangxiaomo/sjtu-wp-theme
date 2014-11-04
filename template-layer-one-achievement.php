<?php
/*
 Template Name: Achievement
 */

include "pagination.php";

get_header();

?>


<div id="content-container" class="content-gradient">
	<div id="full-width">
		<div class="columns-wrapper">
				<div class="box-title-bar">
          <h2 id="content-title">
            >> 研究成果 | <font color="grey">ACHIEVEMENT</font>
            <div class="hr"></div>
          </h2>
				</div>
				<?php
					global $more;
					query_posts( array ('category_name' => 'achievement') );
					while (have_posts()) : the_post();
				?>
		        <div class="box-post-entry">
		          <div class="box-post-thumbnail alignleft">
		            <?php the_post_thumbnail( ); ?>
		          </div>
		          <div class="box-post-brief">
		            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
		            <hr align="left" />
		            <?php $more = 0; ?>
		            <p><?php the_content('[继续阅读]'); ?></p>
		          </div>
		        </div>
		        <hr color="red">
				<?php
					endwhile;
					get_pagination();
					wp_reset_query();
				?>
			</div>
	</div>
	</div> <!-- end content-->
</div> <!-- end #content-container-->

<?php get_footer(); ?>
