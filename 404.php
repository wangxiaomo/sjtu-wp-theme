<?php
get_header();

$subtitle='';
$slider='none';
$layout=get_opt( '_blog_layout' );
if ( $layout=='' ) {
	$layout='right';
}

//include the page header template
locate_template( array( 'includes/page-header.php' ), true, true );
?>

<div id="content-container" class="content-gradient <?php echo $layoutclass; ?> ">
	<div id="<?php echo $content_id; ?>">
<img src="http://ww4.sinaimg.cn/mw690/6e57586btw1e93a9ftn88j205k00u0sj.jpg">
	<h2><?php echo pex_text( '_404_text' ); ?></h2>

	</div>
	<?php
	if ( $layout!='full' ) {
		print_sidebar( get_opt( '_blog_sidebar' ) );
	}
	?>
	<div class="clear"></div>
</div>
<?php
get_footer();
?>
