<?php

include "config.php";
include "panier.class.php";

$panier = new panier();

function getNameCategory($cat)
{
	if($cat == "10")
	{
		$cat = "Dance Shows";
	}
	else if($cat == "20")
	{
		$cat = "Bachata";
	}
	else if($cat == "21")
	{
		$cat = "Kizomba";
	}
	else if($cat == "22")
	{
		$cat = "Salsa Cubaine";
	}
	else if($cat == "23")
	{
		$cat = "Reggaeton";
	}
	else if($cat == "26")
	{
		$cat = "Merengue";
	}
	else if($cat == "45")
	{
		$cat = "Dance Workshops";
	}
	else if($cat == "46")
	{
		$cat = "Dance Party";
	}
	else if($cat == "47")
	{
		$cat = "Salsa Portoricaine";
	}
	
	return $cat;
}

if(!isset($_REQUEST['hide']))
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
  <!-- Theme styles END -->
</head>
<!-- Body BEGIN -->
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
			<div class="col-md-12 sale-product">
				<img src="images/pub.png" style="width:100%;margin-bottom:10px;">
				<div class="posts">
				<div class="def-block">
						<?php
							
							$arrayId[0]['title'] = "Dernière Ajouts";
							$arrayId[0]['id'] = "last_add";
							$arrayId[0]['number'] = "";
							$arrayId[1]['title'] = "Dance Shows";
							$arrayId[1]['id'] = "dance_shows";
							$arrayId[1]['number'] = "10";
							$arrayId[2]['title'] = "Dance Workshops";
							$arrayId[2]['id'] = "dance_workshops";
							$arrayId[2]['number'] = "45";
							$arrayId[3]['title'] = "Dance Party";
							$arrayId[3]['id'] = "dance_party";
							$arrayId[3]['number'] = "46";
							$arrayId[4]['title'] = "Salsa Cubaine";
							$arrayId[4]['id'] = "salsa_cubaine";
							$arrayId[4]['number'] = "22";
							$arrayId[5]['title'] = "Salsa Portoricaine";
							$arrayId[5]['id'] = "salsa_portoricaine";
							$arrayId[5]['number'] = "47";
							$arrayId[6]['title'] = "Bachata";
							$arrayId[6]['id'] = "bachata";
							$arrayId[6]['number'] = "20";
							$arrayId[7]['title'] = "Kizomba";
							$arrayId[7]['id'] = "kizomba";
							$arrayId[7]['number'] = "21";
							$arrayId[8]['title'] = "Merengue";
							$arrayId[8]['id'] = "merengue";
							$arrayId[8]['number'] = "26";
							$arrayId[9]['title'] = "Reggeaton";
							$arrayId[9]['id'] = "reggeaton";
							$arrayId[9]['number'] = "23";
							
							?>
							<ul class="tabsCategory">
							<?php
							for($x=0;$x<count($arrayId);$x++)
							{
								if($x == 0)
								{
								?>
									<li><a href="#<?php echo $arrayId[$x]['id']; ?>" class="active"> <?php echo $arrayId[$x]['title']; ?></a></li>
								<?php
								}
								else
								{
								?>
									<li><a href="#<?php echo $arrayId[$x]['id']; ?>"> <?php echo $arrayId[$x]['title']; ?></a></li>
								<?php
								}
							}
							?>
							</ul>
							<ul class="tabsCategory-content">
							<?php
							
							for($x=0;$x<count($arrayId);$x++)
							{
								if($x == 0)
								{
									?>
										<li id="<?php echo $arrayId[$x]['id']; ?>" class="active">
											<div class="video-grid">
											<?php
								
												$idNumber = $arrayId[$x]['number'];
												if($idNumber != '')
												{
													$idNumber = "WHERE category = $idNumber ";
												}
								
												$SQL = "SELECT * FROM video $idNumber ORDER BY id DESC LIMIT 50";
												$reponse = mysql_query($SQL);
												while($req = mysql_fetch_array($reponse))
												{
												
													$cat = $req['category'];
													$catName = getNameCategory($cat);
													
													?>
													<a href="#" onclick="loadpage('showvideo.php?idvideo=<?php echo $req['id']; ?>')" class="grid_3" style="margin-bottom:20px;">
													<div style="width:230px;height:160px;">
														<img src="<?php echo $req['thumbnail_url']; ?>" alt="#" style="width:230px;height:160px;">
														<div style="position:absolute;background-color:rgba(69,132,240,0.75);font-size:10px;color:#ffffff;margin-top:-49px;padding:3px;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;margin-left:130px;width:100px;"><?php echo $catName; ?></div>
														<div style="position:absolute;font-family:Tahoma;background-color:#000000;font-size:12px;color:#ffffff;margin-top:-30px;height:30px;width:100%;padding:3px;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;margin-left:0px;text-align:center;"><b><span style="margin-top:5px;color:#ffffff;">
														<?php
														
														if(strlen($req['title']) > 30)
														{											
															echo substr($req['title'],0,30)."...";
														}
														else
														{
															echo $req['title'];
														}
														?>
																</b>
																</span>
																</div>
															</div>
														</a>
														<?php
												}
												
											?>
											</div>
										</li>
									<?php
								}
								else
								{
									?>
										<li id="<?php echo $arrayId[$x]['id']; ?>">
											<div class="video-grid">
											<?php
								
												$idNumber = $arrayId[$x]['number'];
												if($idNumber != '')
												{
													$idNumber = "WHERE category = $idNumber ";
												}
								
												$SQL = "SELECT * FROM video $idNumber ORDER BY id DESC LIMIT 50";
												$reponse = mysql_query($SQL);
												while($req = mysql_fetch_array($reponse))
												{
													?>
													<a href="#" onclick="loadpage('showvideo.php?idvideo=<?php echo $req['id']; ?>')" class="grid_3" style="margin-bottom:20px;">
													<div style="width:230px;height:160px;">
														<img src="<?php echo $req['thumbnail_url']; ?>" alt="#" style="width:230px;height:160px;">
														<div style="position:absolute;background-color:rgba(69,132,240,0.75);font-size:10px;color:#ffffff;margin-top:-49px;padding:3px;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;margin-left:130px;width:100px;"><?php echo $arrayId[$x]['title']; ?></div>
														<div style="position:absolute;font-family:Tahoma;background-color:#000000;font-size:12px;color:#ffffff;margin-top:-30px;height:30px;width:100%;padding:3px;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;margin-left:0px;text-align:center;"><b><span style="margin-top:5px;color:#ffffff;">
														<?php
														
														if(strlen($req['title']) > 30)
														{											
															echo substr($req['title'],0,30)."...";
														}
														else
														{
															echo $req['title'];
														}
														?>
																</b>
																</span>
																</div>
															</div>
														</a>
														<?php
												}
												
											?>
											</div>
										</li>
									<?php
								}
							}
						
						?>
						</ul>
				</div>
				</div>
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

		if(!isset($_REQUEST['hide']))
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
    <div style="width:100%;height:89px;background-color:#4584F0;">
		<div style="width:1600px;margin-left:auto;margin-right:auto;">
			<div style="float:left;width:200px;margin-top:12px;text-align:center;">
					<div style="font-size:36px;color:#ffffff;width:200px;height:40px;">1 000 456</div>
					<div style="font-size:20px;color:#ffffff;width:100%;">Utilisateur</div>
			</div>
			<div style="float:left;width:200px;margin-top:12px;text-align:center;">
					<div style="font-size:36px;color:#ffffff;width:200px;height:40px;">10 560</div>
					<div style="font-size:20px;color:#ffffff;width:100%;">Evenements</div>
			</div>
			<div style="float:left;width:200px;margin-top:12px;text-align:center;">
					<div style="font-size:36px;color:#ffffff;width:200px;height:40px;">84 605</div>
					<div style="font-size:20px;color:#ffffff;width:100%;">Photos</div>
			</div>
			<div style="float:left;width:200px;margin-top:12px;text-align:center;">
					<div style="font-size:36px;color:#ffffff;width:200px;height:40px;">99 485</div>
					<div style="font-size:20px;color:#ffffff;width:100%;">Video</div>
			</div>
			<div style="float:left;width:200px;margin-top:12px;text-align:center;">
					<div style="font-size:36px;color:#ffffff;width:200px;height:40px;">65 410</div>
					<div style="font-size:20px;color:#ffffff;width:100%;">Audio</div>
			</div>
			<div style="float:left;width:200px;margin-top:12px;text-align:center;">
					<div style="font-size:36px;color:#ffffff;width:200px;height:40px;">78 000</div>
					<div style="font-size:20px;color:#ffffff;width:100%;">Tv</div>
			</div>
			<div style="float:left;width:200px;margin-top:12px;text-align:center;">
					<div style="font-size:36px;color:#ffffff;width:200px;height:40px;">0</div>
					<div style="font-size:20px;color:#ffffff;width:100%;">Radio</div>
			</div>
			<div style="float:left;width:200px;margin-top:12px;text-align:center;">
					<div style="font-size:36px;color:#ffffff;width:200px;height:40px;">0</div>
					<div style="font-size:20px;color:#ffffff;width:100%;">Pays</div>
			</div>
		</div>
	</div>
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