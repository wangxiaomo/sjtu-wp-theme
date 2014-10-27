  <div id="footer-container">
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
<div id="copyrights-wrapper">
	<div id="copyrights">
		<div id="sjtu-badge">
			<a href="xxx"></a>
		</div>
        <hr class="dotted-footer-hr">
		<div id="sjtu-footer-info" class="center">
			<p id="sjtu-address">地址 上海市闵行区东川路800号上海交通大学媒体与设计学院 邮编 200240</p>
            <p id="stju-copyrights">&copy; 2014 SMD of SJTU.All rights reserved.</p>
		</div>
	</div>
</div>
<!-- FOOTER ENDS -->
</div>
</div>
<?php wp_footer(); 
echo(get_opt('_analytics')); ?>
</body>
</html>
