<?php

include "config.php";
include "panier.class.php";

$panier = new panier();

if(isset($_REQUEST['slug']))
{
	$slug = $_REQUEST['slug'];
}

if(isset($_REQUEST['hide']))
{
	$hide = $_REQUEST['hide'];
}

if($hide == 'full')
{

?>
<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- Head BEGIN -->
<head>
  <meta charset="utf-8">
  <title>OOLatina v2 - Alpha</title>

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
  
</head>
<body style="background: url('images/bg.jpg') no-repeat fixed center top / cover transparent;">
    
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
    <!-- END MENU LEFT -->
    <div class="pageContainer" style="margin-top:28px;">
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&appId=676803582366437&version=v2.0";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
		</script>
		<div style="float:left;width:270px;">
		&nbsp;
		</div>
		<div style="float:left;width:69.60%;" id="ajax-container">
		<?php

		}

		?>
			<div class="col-md-12 sale-product">
				<img src="images/pub.png" style="width:100%;margin-bottom:10px;">
				
				<div class="def-block">
				<?php
				
				$SQL = "SELECT * FROM video WHERE slug = '$slug'";
				$reponse = mysql_query($SQL);
				$req = mysql_fetch_array($reponse);
				
				$title = $req['title'];
				$idvideo = $req['id'];
				$youtube = $req['url'];
				$thumbnail_url = $req['thumbnail_url'];
				$nbrshow = $req['nbrshow'];
				
				// Update show video
				$SQL = "UPDATE video SET nbrshow = nbrshow + 1 WHERE id = $idvideo";
				mysql_query($SQL);
				
				?>
				<div style="font-size:25px;padding-bottom:10px;color:#ffffff;"><H1><?php echo $title; ?></H1></div>
				<div style="width:100%;height:1px;background-color:#88898C;margin-bottom:16px;"></div>
				<div style="width:100%;margin-bottom:10px;">
					<div class="social-likes social-likes_vertical" style="float:left;">
						<div class="facebook" title="Share link on Facebook">Facebook</div>
						<div class="twitter" title="Share link on Twitter">Twitter</div>
						<div class="plusone" title="Share link on Google+">Google+</div>
						<div class="pinterest" title="Share image on Pinterest" data-media="">Pinterest</div>
						<div style="margin-left:5px;"><img src="images/show_icon.png" width=25>&nbsp;&nbsp;<?php echo $nbrshow; ?></div>
					</div>
					<div class="video-container" style="float:left;width:80%;height:80%;margin-left:20px;">
						<iframe style="width:100%;height:100%;" src="//www.youtube.com/embed/<?php echo $youtube; ?>" frameborder="0" allowfullscreen></iframe>
					</div>
				</div>
					<div style="margin-top:10px;" class="fb-comments" data-href="http://exemple.com/comments" data-numposts="5" data-colorscheme="dark" data-width="1240"></div>
				</div>
			</div>
		<?php

		if($hide == 'full')
		{

		?>
        </div>
		<div style="float:left;width:300px;padding-top:0px;text-align:center;">
		<?php
		
		include "rightcolumns.php";
		
		?>
		</div>
	</div>

    <!-- BEGIN STEPS -->
    <?php
	
	include "counter.php";
	
	?>
    <!-- END STEPS -->

    <!-- BEGIN PRE-FOOTER -->
    <?php
	
	include "prefooter.php";
	
	?>
    <!-- END PRE-FOOTER -->

    <!-- BEGIN FOOTER -->
    <?php
	
	include "footer.php";
	
	?>
	
	<?php
	
	include "player.php";
	
	?>
    <!-- END FOOTER -->

    <!-- BEGIN fast view of a product -->
    <div id="product-pop-up" style="display: none; width: 700px;">
            <div class="product-page product-pop-up">
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-3">
                  <div class="product-main-image">
                    <img src="assets/temp/products/model7.jpg" alt="Cool green dress with red bell" class="img-responsive">
                  </div>
                  <div class="product-other-images">
                    <a href="#" class="active"><img alt="Berry Lace Dress" src="assets/temp/products/model3.jpg"></a>
                    <a href="#"><img alt="Berry Lace Dress" src="assets/temp/products/model4.jpg"></a>
                    <a href="#"><img alt="Berry Lace Dress" src="assets/temp/products/model5.jpg"></a>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-9">
                  <h1>Cool green dress with red bell</h1>
                  <div class="price-availability-block clearfix">
                    <div class="price">
                      <strong><span>$</span>47.00</strong>
                      <em>$<span>62.00</span></em>
                    </div>
                    <div class="availability">
                      Availability: <strong>In Stock</strong>
                    </div>
                  </div>
                  <div class="description">
                    <p>Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed nonumy nibh sed euismod laoreet dolore magna aliquarm erat volutpat 
Nostrud duis molestie at dolore.</p>
                  </div>
                  <div class="product-page-options">
                    <div class="pull-left">
                      <label class="control-label">Size:</label>
                      <select class="form-control input-sm">
                        <option>L</option>
                        <option>M</option>
                        <option>XL</option>
                      </select>
                    </div>
                    <div class="pull-left">
                      <label class="control-label">Color:</label>
                      <select class="form-control input-sm">
                        <option>Red</option>
                        <option>Blue</option>
                        <option>Black</option>
                      </select>
                    </div>
                  </div>
                  <div class="product-page-cart">
                    <div class="product-quantity">
                        <input id="product-quantity" type="text" value="1" readonly name="product-quantity" class="form-control input-sm">
                    </div>
                    <button class="btn btn-primary" type="submit">Add to cart</button>
                    <button class="btn btn-default" type="submit">More details</button>
                  </div>
                </div>

                <div class="sticker sticker-sale"></div>
              </div>
            </div>
    </div>
    <?php
	
	include "javascript.php";
	
	?>
</body>
<!-- END BODY -->
</html>

<?php

}

?>