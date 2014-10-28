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

		//include the page header template
		//locate_template( array( 'includes/page-header.php' ), true, true );
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
            var jssor_slider1 = new $JssorSlider$("slider1_container", options);

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


            //if (navigator.userAgent.match(/(iPhone|iPod|iPad)/)) {
            //    $(window).bind("orientationchange", ScaleSlider);
            //}
            //responsive code end
        });
    </script>
    <!-- Jssor Slider Begin -->
    <!-- You can move inline styles to css file or css block. -->
    <div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 600px; height: 280px; overflow: hidden; ">

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
        <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 600px; height: 280px; overflow: hidden;">
            <div>
                <img u="image" src="<?php echo get_stylesheet_directory_uri(); ?>/images/slider/01.jpg" />
            </div>
            <div>
                <img u="image" src="<?php echo get_stylesheet_directory_uri(); ?>/images/slider/02.jpg" />
            </div>
        </div>

        <!-- Bullet Navigator Skin Begin -->
        <style>
            /* jssor slider bullet navigator skin 05 css */
            /*
            .jssorb05 div           (normal)
            .jssorb05 div:hover     (normal mouseover)
            .jssorb05 .av           (active)
            .jssorb05 .av:hover     (active mouseover)
            .jssorb05 .dn           (mousedown)
            */
            .jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
                background: url(<?php echo get_stylesheet_directory_uri(); ?>/images/slider/b10.png) no-repeat;
                overflow: hidden;
                cursor: pointer;
            }

            .jssorb05 div {
                background-position: -7px -7px;
            }

                .jssorb05 div:hover, .jssorb05 .av:hover {
                    background-position: -37px -7px;
                }

            .jssorb05 .av {
                background-position: -67px -7px;
            }

            .jssorb05 .dn, .jssorb05 .dn:hover {
                background-position: -97px -7px;
            }
        </style>
        <!-- bullet navigator container -->
        <div u="navigator" class="jssorb05" style="position: absolute; bottom: 16px; right: 6px;">
            <!-- bullet navigator item prototype -->
            <div u="prototype" style="POSITION: absolute; WIDTH: 16px; HEIGHT: 16px;"></div>
        </div>
        <!-- Bullet Navigator Skin End -->
        <!-- Arrow Navigator Skin Begin -->
        <style>
            /* jssor slider arrow navigator skin 12 css */
            /*
            .jssora12l              (normal)
            .jssora12r              (normal)
            .jssora12l:hover        (normal mouseover)
            .jssora12r:hover        (normal mouseover)
            .jssora12ldn            (mousedown)
            .jssora12rdn            (mousedown)
            */
            .jssora12l, .jssora12r, .jssora12ldn, .jssora12rdn {
                position: absolute;
                cursor: pointer;
                display: block;
                background: url(<?php echo get_stylesheet_directory_uri(); ?>/images/slider/a18.png) no-repeat;
                overflow: hidden;
            }

            .jssora12l {
                background-position: -16px -37px;
            }

            .jssora12r {
                background-position: -75px -37px;
            }

            .jssora12l:hover {
                background-position: -136px -37px;
            }

            .jssora12r:hover {
                background-position: -195px -37px;
            }

            .jssora12ldn {
                background-position: -256px -37px;
            }

            .jssora12rdn {
                background-position: -315px -37px;
            }
        </style>
        <!-- Arrow Left -->
        <span u="arrowleft" class="jssora12l" style="width: 30px; height: 46px; top: 123px; left: 0px;">
        </span>
        <!-- Arrow Right -->
        <span u="arrowright" class="jssora12r" style="width: 30px; height: 46px; top: 123px; right: 0px">
        </span>

    </div>




<div id="content-container" class="content-gradient">

	<div id="full-width">

		<div class="columns-wrapper">
			<div class="left-column">
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
