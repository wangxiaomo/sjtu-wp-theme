    <?php
/*
 Template Name: Home page
 */

get_header();

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();

		//get the page settings
		$title=get_the_title();
		$subtitle=get_post_meta( $post->ID, 'subtitle_value', true );
		$slider=get_post_meta( $post->ID, 'slider_value', true );
		$slider_prefix=get_post_meta( $post->ID, 'slider_name_value', true );
		if ( $slider_prefix=='default' ) {
			$slider_prefix='';
		}
	}
} ?>




    <!-- it works the same with all jquery version from 1.x to 2.x -->
    <!-- <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/script/jquery-1.9.1.min.js"></script> -->
    <!-- use jssor.slider.mini.js (40KB) or jssor.sliderc.mini.js (32KB, with caption, no slideshow) or jssor.sliders.mini.js (28KB, no caption, no slideshow) instead for release -->
    <!-- jssor.slider.mini.js = jssor.sliderc.mini.js = jssor.sliders.mini.js = (jssor.core.js + jssor.utils.js + jssor.slider.js) -->
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/script/jssor.core.js"></script>
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/script/jssor.utils.js"></script>
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/script/jssor.slider.js"></script>

    <script>

        jQuery(document).ready(function ($) {

            var _SlideshowTransitions = [
            //Fade
            { $Duration: 1200, $Opacity: 2 }
            ];

            var options = {
            	$FillMode: 2,                                       //[Optional] The way to fill image in slide, 0 stretch, 1 contain (keep aspect ratio and put all inside slide), 2 cover (keep aspect ratio and cover whole slide), 4 actual size, 5 contain for large image, actual size for small image, default value is 0
                
                $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlaySteps: 1,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
                $AutoPlayInterval: 3000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1,                               //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

                $ArrowKeyNavigation: false,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideDuration: 500,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
                //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 0, 					                //[Optional] Space between each slide in pixels, default value is 0
                $DisplayPieces: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                $ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                $DragOrientation: 2,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

                $SlideshowOptions: {                                //[Optional] Options to specify and enable slideshow or not
                    $Class: $JssorSlideshowRunner$,                 //[Required] Class to create instance of slideshow
                    $Transitions: _SlideshowTransitions,            //[Required] An array of slideshow transitions to play slideshow
                    $TransitionsOrder: 1,                           //[Optional] The way to choose transition to play slide, 1 Sequence, 0 Random
                    $ShowLink: true                                    //[Optional] Whether to bring slide link on top of the slider when slideshow is running, default value is false
                },

                $BulletNavigatorOptions: {                                //[Optional] Options to specify and enable navigator or not
                    $Class: $JssorBulletNavigator$,                       //[Required] Class to create navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 1,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
                    $Lanes: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
                    $SpacingX: 5,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
                    $SpacingY: 5,                                   //[Optional] Vertical space between each item in pixel, default value is 0
                    $Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
                },

                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
                }
            };
            var jssor_slider1 = new $JssorSlider$("slider-container", options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes

            function ScaleSlider() {
                var bodyWidth = document.body.clientWidth;
                if (bodyWidth)
                	if (bodyWidth > 980)
                    	jssor_slider1.$SetScaleWidth(Math.min(bodyWidth, 1920));
                    else
                    	jssor_slider1.$SetScaleWidth(980);
                else
                    window.setTimeout(ScaleSlider, 30);
            }

            ScaleSlider();

            if (!navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile)/)) {
                $(window).bind('resize', ScaleSlider);
            }

        });
    </script>
    <!-- Jssor Slider Begin -->
    <!-- You can move inline styles to css file or css block. -->
    <div id="slider-container">

        <!-- Loading Screen -->
        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                background-color: #000000; top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
            <div style="position: absolute; display: block; background: url(<?php echo get_stylesheet_directory_uri(); ?>/images/slider/loading.gif) no-repeat center center;
                top: 0px; left: 0px;width: 100%; height:100%;">
            </div>
        </div>

        <!-- Slides Container -->
        <div id="slides" u="slides">
            <div>
                <img u="image" src="<?php echo get_stylesheet_directory_uri(); ?>/images/slider/03.jpg" />
            </div>
            <div>
                <img u="image" src="<?php echo get_stylesheet_directory_uri(); ?>/images/slider/01.jpg" />
            </div>
            <div>
                <img u="image" src="<?php echo get_stylesheet_directory_uri(); ?>/images/slider/02.jpg" />
            </div>
            <div>
                <img u="image" src="<?php echo get_stylesheet_directory_uri(); ?>/images/slider/04.jpg" />
            </div>
        </div>

        <!-- bullet navigator container -->
        <div id="bullet" u="navigator" class="jssorb05">
            <!-- bullet navigator item prototype -->
            <div u="prototype" style="POSITION: absolute; WIDTH: 16px; HEIGHT: 16px;"></div>
        </div>

        <!-- Arrow Left -->
        <span id="arrowleft" u="arrowleft" class="jssora12l">
        </span>
        <!-- Arrow Right -->
        <span id="arrowright" u="arrowright" class="jssora12r">
        </span>

    </div>




<div id="content-container" class="content-gradient">

	<div id="full-width">

		<div class="columns-wrapper">
			<div class="left-column">
				<div class="box-title-bar">
					<h3><a href="weibo.com">新闻动态 | NEWS</a></h3>
					<a class="alignbottom alignright" href="">更多|More</a>
				</div>
                <hr color="red">
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
						<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
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
                        <h3><a href="">第六届全球传播论坛|6th GCF </a></h3>
                        
                    </div>
                    <hr color="red">
                    <div class="box-content">
        
                    <div id="info-link">
                        <a href="http://pan.baidu.com/s/1dDmwWmd">>>会议议程下载 | Schedule Download <<</a>
                    </div>
                    <div id="info-content">
                        <p><font color="red">11/8/2014 Sat 周六</font></p>
                        <p>08:00-10:00 与会嘉宾到场 Guest Arrving</p>
                        <p>20:00-22:00 国际学术委员会议 Preconference</p>
                        <p><font color="red">11/9/2014 Sun 周日</font></p>
                        <p>08:30-09:00 开幕式 The Opening Ceremony</p>
                        <p>09:00-10:30 主题演讲 Keynote Speeches</p>
                        <p>10:30-11:00 茶歇 Coffee Break</p>
                        <p>10:00-12:30 主题演讲 Keynote Speeches</p>
                        <p>12:30-14:00 午餐 Lunch</p>
                        <p>14:00-14:45 主题演讲 Keynote Speeches</p>
                        <p>14:45-15:30 产学对话 Round Table Dialogue</p>
                        <p>15:30-16:00 茶歇 Coffee Break</p>
                        <p>16:00-17:30 产学对话 Round Table Dialogue</p>
                        <p>17:30-18:00 闭幕式 发布中国网络文化课题报告</br>
                                       The Closing Ceremony</br>
                                       “Report on Chinese Cyber-Culture”</p>
                        <p>18:00-18:30 摄影 交流 Photograph</p>
                        <p>18:30-20:00 晚餐 Dinner</p>
                        </br>
                    </div>
                </div>
				<div class="column-box">
					<div class="box-title-bar">
						<h3><a href="">成果展示 | <font size="2">ACHIEVEMENT</font></a></h3>
						<a class="alignbottom alignright">更多</a>
					</div>
                    <hr color="red">
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
			</div>
		</div>


    	<div class="columns-wrapper">
		<?php
		//print the services boxes
		for ( $i=1; $i<=3; $i++ ) {
			$suf=$i==3?'-3':''; ?>
			<div class="services-box three-columns<?php echo $suf; ?>">
				<h4><?php echo get_opt( '_home_box_title'.$i ); ?></h4>
				<?php if ( get_opt( '_home_box_icon'.$i )!='' ) { ?>
					<img src="<?php echo get_opt( '_home_box_icon'.$i ); ?>" class="img-frame" />
				<?php } ?>
				<?php echo get_opt( '_home_box_desc'.$i ); ?>
				<?php if ( trim( get_opt( '_home_box_btn_text'.$i ) )!='' ) { ?>
					<a href="<?php echo get_opt( '_home_box_btn_link'.$i ); ?>" ><?php echo get_opt( '_home_box_btn_text'.$i ); ?><span class="more-arrow">&raquo;</span></a>
				<?php } ?>
			</div>
		<?php } ?>
		</div>
	</div> <!-- full width -->
<div class="clear"></div>
</div> <!-- content container -->
<?php get_footer(); ?>
