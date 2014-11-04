<?php
get_header();

$subtitle=pex_text( '_search_results_text' ).' "'.get_search_query().'"';
$slider='none';
$layout=get_opt( '_blog_layout' );
$excerpt=true;


?>
<div id="content-container" class="content-gradient <?php echo $layoutclass; ?> ">
<div id="full-width">
<div id="<?php echo $content_id; ?>"><?php

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		global $more;
		$more = 0;

		//include the post template
		locate_template( array( 'includes/post-template.php' ), true, false );

	}
}else {
	echo '<p>'.pex_text( '_no_results_text' ).'</p>';
	get_search_form();
}

?>
</div>
</div>
</div>
<?php
get_footer();
?>
