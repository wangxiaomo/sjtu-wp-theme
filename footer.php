  <div id="footer-container">
  <img src="http://ww4.sinaimg.cn/mw690/6e57586btw1e93a9ftn88j205k00u0sj.jpg">
  <?php if(get_opt('_widgetized_footer')!='off'){?>
    <div id="footer">
      <div id="footer-columns">
<?php 
print_footer_sidebar('footer-first', false);
print_footer_sidebar('footer-second', false);
print_footer_sidebar('footer-third', false);
print_footer_sidebar('footer-fourth', true);
?>
</div>
</div>
</div>
<?php } ?>
<div id="copyrights">
<h5><?php 
//copyright text - can be changed in Dandelion Options -> Translation -> Other
echo pex_text('_footer_copyright_text');
?></h5>
</div>
<!-- FOOTER ENDS -->
</div>
</div>
</div>
<?php wp_footer(); 
echo(get_opt('_analytics')); ?>
</body>
</html>
