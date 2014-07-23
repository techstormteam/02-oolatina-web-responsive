<?php

include "config.php";
include "panier.class.php";

$panier = new panier();

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
<style>
.adp-substep b
{
	color:#4584F0;
}
</style>
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
		<div style="float:left;width:270px;">
		&nbsp;
		</div>
		<div style="float:left;width:69.60%;" id="ajax-container">
		<?php
		
		}
		
		?>
			<div class="col-md-12 sale-product" style="background-color:rgba(39,39,39,0.8);padding-top:10px;">
			<?php

				$slug = $_REQUEST['slug'];
				$SQL = "SELECT * FROM event WHERE slug = '$slug'";
				$reponse = mysql_query($SQL);
				$req = mysql_fetch_array($reponse);
				
				$genre = $req['genre'];
				$genre = explode(",",$genre);
			
			?>
			
					<div class="agenda_listing_box">
						<div class="agenda_listing_thumbnail">
							<img src="<?php echo $req['thumbnail_url']; ?>">
						</div>
						<div style="float:left;width:1000px;">
							<div class="agenda_listing_title">
								<?php echo $req['title']; ?>
							</div>
							<div class="agenda_info_list">
								<div class="badge_list">
								<?php
								
								for($x=0;$x<count($genre);$x++)
								{
									if($genre[$x] == 'salsa')
									{
										?>
										<div class="badge badge_orange">Salsa</div>
										<?php
									}
									
									if($genre[$x] == 'bachata')
									{
										?>
										<div class="badge badge_red">Bachata</div>
										<?php
									}
									
									if($genre[$x] == 'kizomba')
									{
										?>
										<div class="badge badge_blue">Kizomba</div>
										<?php
									}
								}
								
								?>
								<div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
								</div>
								<div class="agenda_info_venue">
								<?php
								
								// Adresse
								$SQL = "SELECT * FROM venue WHERE id = ".$req['idvenue'];
								$r = mysql_query($SQL);
								$rReq = mysql_fetch_array($r);
								
								echo "<div style=\"padding-left:18px;background-image:url('images/pin_icon.png');background-repeat:no-repeat;background-position:0px 1px;\"><b>".$rReq['title']."<br>".$rReq['street']."<br>".$rReq['postalcode']." ".$rReq['city']."</b></div><br><img src=\"images/phone_icon.png\"> ".$rReq['phone'];
								
								?>
								</div>
							</div>
						</div>
						<div style="float:left;background-color:#ffffff;width:94px;height:165px;">
							<div style="width:100%;height:90px;background-color:#ff0000;font-size:30px;color:#ffffff;text-align:center;font-family: 'Roboto',Arial,sans-serif;">
								<span style="padding-top:20px;">
								Ven
								JUIN
								</span>
							</div>
							<div style="width:100%;height:45px;color:#000000;font-size:40px;text-align:center;">
							27
							</div>
							<div style="width:100%;height:20px;color:#000000;font-size:18px;text-align:center;">
							2014
							</div>
						</div>
					</div>
					<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
					<div class="posts">
						<div class="def-block">
							<ul class="tabsCategory">
								<li><a href="#description" class="active"> Description</a></li>
								<li><a href="#carte"> Carte</a></li>
								<li><a href="#hotel"> Hôtel</a></li>
								<li><a href="#vol"> Vol</a></li>
								<li><a href="#covoiturage"> Co-Voiturage</a></li>
								<li><a href="#colocation"> Co-Location</a></li>
								<li><a href="#restaurant"> Restaurant</a></li>
							</ul>
							<ul class="tabsCategory-content">
								<li id="description" class="active">
									<div class="video-grid">
										<div class="agenda_description_texte">
											<H2><?php echo utf8_encode(nl2br($req['description'])); ?></H2>
										</div>
									</div>
								</li>
								<li id="carte">
									<div class="video-grid">
									<div>
										<label style="width:100%;font-size:14px;color:#ffffff;font-weight:bold;">Votre itinéraires Au départ de : </label>
										<input type="text" id="from" value="" placeholder="Indiquez votre point de départ" class="form-control" style="width:400px;float:left;" />
										<input type="hidden" id="to" value="<?php echo $rReq['title']." ".$rReq['street']." ".$rReq['postalcode']." ".$rReq['city']; ?>" class="inputTxt" />
										<input type="button" onClick="showConnect();" value="Rechercher" class="btn blue" style="float:left;height:34px;margin-bottom:10px;"/>
									</div>
									<?php
									
									/*include "class/GoogleMapAPIv3.class.php";

									$gmap = new GoogleMapAPI();
									//$gmap->setCenter('Nantes');
									$gmap->setEnableWindowZoom(true);
									//$gmap->setEnableAutomaticCenterZoom(true);
									$gmap->setDisplayDirectionFields(true);
									// $gmap->setClusterer(true);
									$gmap->setSize('100%','600px');
									$gmap->setZoom(11);
									$gmap->setLang('fr');
									$gmap->setDefaultHideMarker(false);

									// cat4
									$coordtab = array();
									$coordtab []= array('48.8792','2.34778','test','<strong>test paris</strong>');
									$gmap->addArrayMarkerByCoords($coordtab,'cat4');

									$gmap->generate();
									echo $gmap->getGoogleMap();*/

									?>
									</div>
								</li>
								<li id="hotel">
									<div class="video-grid">
									<span style="font-size:15px;color:#ffffff;text-align:center;width:1240px;"><center>Bientôt disponible<br>Rester information via notre page facebook</center></span>
									</div>
								</li>
								<li id="vol">
									<div class="video-grid">
									<span style="font-size:15px;color:#ffffff;text-align:center;width:1240px;"><center>Bientôt disponible<br>Rester information via notre page facebook</center></span>
									</div>
								</li>
								<li id="covoiturage">
									<div class="video-grid">
									<span style="font-size:15px;color:#ffffff;text-align:center;width:1240px;"><center>Bientôt disponible<br>Rester information via notre page facebook</center></span>
									</div>
								</li>
								<li id="colocation">
									<div class="video-grid">
									<span style="font-size:15px;color:#ffffff;text-align:center;width:1240px;"><center>Bientôt disponible<br>Rester information via notre page facebook</center></span>
									</div>
								</li>
								<li id="restaurant">
									<div class="video-grid">
									<span style="font-size:15px;color:#ffffff;text-align:center;width:1240px;"><center>Bientôt disponible<br>Rester information via notre page facebook</center></span>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div style="margin-top:10px;" class="fb-comments" data-href="http://exemple.com/comments" data-numposts="5" data-colorscheme="dark" data-width="1240"></div>
			
			</div>
			<!-- TABS -->
			<script type="text/javascript">	
				var tabs = jQuery('ul.tabsCategory');
				tabs.each(function (i) 
				{
					// get tabs
					var tab = jQuery(this).find('> li > a');
					tab.click(function (e) {
						// get tab's location
						var contentLocation = jQuery(this).attr('href');
						// Let go if not a hashed one
						if (contentLocation.charAt(0) === "#") {
							e.preventDefault();
							// add class active
							tab.removeClass('active');
							jQuery(this).addClass('active');
							// show tab content & add active class
							jQuery(contentLocation).fadeIn(500).addClass('active').siblings().hide().removeClass('active');
						}
					});
				});
			</script>
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
    <!-- END fast view of a product -->

    <?php
	
	include "javascript.php";
	
	?>
</body>
<!-- END BODY -->
</html>
<?php

}

?>