<?php
/*
 Template Name: Contact
 */

get_header();

?>

<div id="content-container" class="content-gradient">

  <div id="full-width">
    <h2 id="content-title">
      >> 联系我们 | 
      <font color="grey">CONTACT</font>
      <div class="hr"></div>
    </h2>

    <div class="columns-wrapper">
      <div class="homepage-column left-column">
        <?php 
          //include the contact form
          locate_template( array( 'includes/form.php' ), true, true );
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
<?php
get_footer();
?>
