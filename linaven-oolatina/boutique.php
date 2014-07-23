<?php

include "config.php";
include "func.php";

connectDatabase(false);

?>
<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- Head BEGIN -->
<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- Head BEGIN -->
<head>
  <meta charset="utf-8">
  <title>Page</title>

  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <meta content="Metronic Shop UI description" name="description">
  <meta content="Metronic Shop UI keywords" name="keywords">
  <meta content="keenthemes" name="author">

  <meta property="og:site_name" content="-CUSTOMER VALUE-">
  <meta property="og:title" content="-CUSTOMER VALUE-">
  <meta property="og:description" content="-CUSTOMER VALUE-">
  <meta property="og:type" content="website">
  <meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
  <meta property="og:url" content="-CUSTOMER VALUE-">

  <?php
  
  include "topcss.php";
  
  ?>
  <!-- Theme styles END -->
</head>
<!-- Head END -->

<!-- Body BEGIN -->
<body style="background: url('images/bg.jpg') no-repeat fixed center top / cover transparent;" >

	<!-- TOP BAR -->		
	<?php

	include "topbar.php";

	?>
	<!-- END TOP BAR -->

	<?php
	
	include "popupconnect.php";
	
	?>

	<!-- MENU LEFT -->
	<?php

	include "menu.php";

	?>

    <!-- BEGIN SLIDER -->
    <div class="page-slider margin-bottom-35">
      <!--LayerSlider begin-->
      <div id="layerslider" style="width: 100%; height: 494px; margin: 0 auto;">
          <!--LayerSlider layer-->
          <div class="ls-layer ls-layer1" style="slidedirection: right; transition2d: 24,25,27,28; ">
            <img src="assets/temp/sliders/slide1/bg.jpg" class="ls-bg" alt="Slide background">
            <div class="ls-s-1 title" style=" top: 96px; left: 35%; slidedirection : fade; slideoutdirection : fade; durationin : 750; durationout : 750; easingin : easeOutQuint; rotatein : 90; rotateout : -90; scalein : .5; scaleout : .5; showuntil : 4000; white-space: nowrap;">
              Tones of <strong>shop UI features</strong> designed
            </div>
            <div class="ls-s-1 mini-text" style=" top: 338px; left: 35%; slidedirection : fade; slideoutdirection : fade; durationout : 750; easingin : easeOutQuint; delayin : 300; showuntil : 4000; white-space: nowrap;">
              Lorem ipsum dolor sit amet  constectetuer diam<br > adipiscing elit euismod ut laoreet dolore.
            </div>
          </div>

          <!--LayerSlider layer-->
          <div class="ls-layer ls-layer2" style="slidedirection: right; transition2d: 110,111,112,113; ">
            <img src="assets/temp/sliders/slide2/bg.jpg" class="ls-bg" alt="Slide background">
            <div class="ls-s-1 ls-title title" style=" top: 40%; left: 21%; slidedirection : fade; slideoutdirection : fade; durationin : 750; durationout : 750; easingin : easeOutQuint; easingout : easeInOutQuint; delayin : 0; delayout : 0; rotatein : 90; rotateout : -90; scalein : .5; scaleout : .5; showuntil : 4000; white-space: nowrap;">
              <strong class="title">Unlimted</strong>
              Layout Options
              <em class="title">Fully Responsive</em>
            </div>

            <div class="ls-s-2 ls-price title" style=" top: 50%; left: 45%; slidedirection : fade; slideoutdirection : fade; durationout : 109750; easingin : easeOutQuint; delayin : 300; scalein : .8; scaleout : .8; showuntil : 4000; white-space: nowrap;">
              <b>from</b>
              <strong><span>$</span>25</strong>
            </div>

            <a href="#" class="ls-s-1 ls-more mini-text" style=" top: 72%; left: 21%; slidedirection : fade; slideoutdirection : fade; durationin : 750; durationout : 750; easingin : easeOutQuint; easingout : easeInOutQuint; delayin : 0; delayout : 0; rotatein : 90; rotateout : -90; scalein : .5; scaleout : .5; showuntil : 4000; display: inline-block; white-space: nowrap;">
              See More Details
            </a>
          </div>

          <!--LayerSlider layer-->
          <div class="ls-layer ls-layer3" style="slidedirection: right; transition2d: 92,93,105; ">
            <img src="assets/temp/sliders/slide3/bg.jpg" class="ls-bg" alt="Slide background">

            <div class="ls-s-1 ls-title" style=" top: 83px; left: 33%; slidedirection : fade; slideoutdirection : fade; durationin : 750; durationout : 750; easingin : easeOutQuint; rotatein : 90; rotateout : -90; scalein : .5; scaleout : .5; showuntil : 4000; white-space: nowrap;">
              Full Admin & Frontend
              <strong>eCommerce UI</strong>
              Is Ready For Your Project
            </div>

            <div class="ls-s-1" style=" top: 333px; left: 33%; slidedirection : fade; slideoutdirection : fade; durationout : 750; easingin : easeOutQuint; delayin : 300; scalein : .8; scaleout : .8; showuntil : 4000; white-space: nowrap; font-size: 20px; font: 20px 'Open Sans Light', sans-serif;">
              <a href="#" class="ls-buy">
                Buy It Now!
              </a>
              <div class="ls-price">
                <span>All these for only:</span>
                <strong>25<sup>$</sup></strong>
              </div>
            </div>
          </div>

          <!--LayerSlider layer-->
          <div class="ls-layer ls-layer5" style="slidedirection: right; transition2d: 110,111,112,113; ">
            <img src="assets/temp/sliders/slide5/bg.jpg" class="ls-bg" alt="Slide background">

            <div class="ls-s-1 title" style=" top: 35%; left: 60%; slidedirection : fade; slideoutdirection : fade; durationin : 750; durationout : 750; easingin : easeOutQuint; rotatein : 90; rotateout : -90; scalein : .5; scaleout : .5; showuntil : 4000; white-space: nowrap;">
              The most<br>
              wanted bijouterie
            </div>

            <div class="ls-s-1 mini-text" style=" top: 70%; left: 60%; slidedirection : fade; slideoutdirection : fade; durationout : 750; easingin : easeOutQuint; delayin : 300; scalein : .8; scaleout : .8; showuntil : 4000; white-space: nowrap;">
              <span>Lorem ipsum and</span>
              <a href="#">Buy It Now!</a>
            </div>
          </div>
      </div>
      <!--LayerSlider end-->
    </div>
    <!-- END SLIDER -->

    <div class="main">
	<div style="position:absolute;margin-top:37px;width:100%;">
		<div class="pubright" style="float:left;">
			<!-- BEGIN Hi-Media Media RedirectTag, oolatina.com 300x250 - v1.0 -->
			<script type="text/javascript" src="http://js.himediads.com/js?lang=fr&s=oolatina.com&z=ros&f=300x250&kv=&d=&rd_click="></script>
			<!-- END Hi-Media Media RedirectTag, oolatina.com 300x250 - v1.0 -->
		</div>
		<div class="pubright" style="float:right;">
			<!-- BEGIN Hi-Media Media RedirectTag, oolatina.com 300x250 - v1.0 -->
			<script type="text/javascript" src="http://js.himediads.com/js?lang=fr&s=oolatina.com&z=ros&f=300x250&kv=&d=&rd_click="></script>
			<!-- END Hi-Media Media RedirectTag, oolatina.com 300x250 - v1.0 -->
		</div>
	</div>
      <div class="container">
        <!-- BEGIN SALE PRODUCT & NEW ARRIVALS -->
        <div class="row margin-bottom-40">
          <!-- BEGIN SALE PRODUCT -->
          <div class="col-md-12 sale-product">



          </div>
          <!-- END SALE PRODUCT -->
        </div>
        <!-- END SALE PRODUCT & NEW ARRIVALS -->

        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40 ">
          <!-- BEGIN SIDEBAR -->
          <?php
			require_once 'sidebar_category_list.php';
		  ?>
          <!-- END SIDEBAR -->
          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-8" id="topProductSlideDiv">


          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->

        <!-- BEGIN TWO PRODUCTS & PROMO -->
		<div id="productListDiv">

		</div> <!-- productListDiv -->

      </div>
    </div>

    <!-- BEGIN STEPS -->
    <?php
		  include 'steps.php';
	?>
    <!-- END STEPS -->

    <!-- BEGIN PRE-FOOTER -->
    <?php
		  include 'prefooter.php';
	?>
    <!-- END PRE-FOOTER -->

    <!-- BEGIN FOOTER -->
    <?php
		include 'footer.php';
	?>
	
	<?php
	
	include "player.php";
	
	?>
	
    <!-- END FOOTER -->
	<?php
	
	include "javascript.php";
	
	?>

</body>
<!-- END BODY -->
</html>
<?php
	closeConnection();
?>
