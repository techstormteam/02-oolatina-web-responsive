<?php

include "config.php";
include "panier.class.php";
include "func.php";

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
							$arrayId[0]['id'] = "last-add";
							$arrayId[0]['number'] = "";
							$arrayId[1]['title'] = "Kizomba";
							$arrayId[1]['id'] = "kizomba";
							$arrayId[1]['number'] = "kizomba";
							$arrayId[2]['title'] = "Bachata";
							$arrayId[2]['id'] = "bachata";
							$arrayId[2]['number'] = "bachata";
							$arrayId[3]['title'] = "Salsa Cubaine";
							$arrayId[3]['id'] = "salsa-cubaine";
							$arrayId[3]['number'] = "salsa_cubaine";
							$arrayId[4]['title'] = "Salsa Portoricaine";
							$arrayId[4]['id'] = "salsa-portoricaine";
							$arrayId[4]['number'] = "salsa_portoricaine";
							$arrayId[5]['title'] = "Reggaeton";
							$arrayId[5]['id'] = "reggaeton";
							$arrayId[5]['number'] = "reggaeton";
							$arrayId[6]['title'] = "Merengue";
							$arrayId[6]['id'] = "merengue";
							$arrayId[6]['number'] = "merengue";
							
							if(isset($_REQUEST['category']))
							{
								$categorySelect = $_REQUEST['category'];
							}
							else
							{
								$categorySelect = "lastadd";
							}
							
							?>
							<ul class="tabsCategory">
							<?php
							for($x=0;$x<count($arrayId);$x++)
							{
								if($categorySelect == $arrayId[$x]['id'])
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
								if($categorySelect == $arrayId[$x]['id'])
								{
									?>
										<li id="<?php echo $arrayId[$x]['id']; ?>" class="active">
											<div class="video-grid">
											<?php
								
												$idNumber = $arrayId[$x]['number'];
												if($idNumber != '')
												{
													$idNumber = "WHERE category = '$idNumber' ";
												}
								
												$SQL = "SELECT * FROM albums $idNumber ORDER BY id DESC LIMIT 50";
												$reponse = mysql_query($SQL);
												while($req = mysql_fetch_array($reponse))
												{
												
													$cat = $req['category'];
													$catName = getNameCategoryNormal($cat);
													
													?>
													<a href="javascript:void(0);" onclick="loadpage('albums-<?php echo $req['slug']; ?>-partial.html')" class="grid_3" style="margin-bottom:20px;">
													<div style="width:230px;height:230px;">
														<img src="<?php echo $req['coverurl']; ?>" alt="#" style="width:230px;height:230px;">
														<div style="position:absolute;background-color:rgba(69,132,240,0.75);font-size:10px;color:#ffffff;margin-top:-49px;padding:3px;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;margin-left:130px;width:100px;"><?php echo $catName; ?></div>
														<div style="position:absolute;font-family:Tahoma;background-color:#000000;font-size:12px;color:#ffffff;margin-top:-30px;height:30px;width:100%;padding:3px;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;margin-left:0px;text-align:center;"><b><span style="margin-top:5px;color:#ffffff;">
														<?php
														
														if(strlen($req['title']) > 30)
														{											
															echo utf8_encode(substr($req['title'],0,30))."...";
														}
														else
														{
															echo utf8_encode($req['title']);
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
													$idNumber = "WHERE category = '$idNumber' ";
												}
								
												$SQL = "SELECT * FROM albums $idNumber ORDER BY id DESC LIMIT 50";
												$reponse = mysql_query($SQL);
												while($req = mysql_fetch_array($reponse))
												{
													?>
													<a href="javascript:void(0);" onclick="loadpage('albums-<?php echo $req['slug']; ?>-partial.html')" class="grid_3" style="margin-bottom:20px;">
													<div style="width:230px;height:230px;">
														<img src="<?php echo $req['coverurl']; ?>" alt="#" style="width:230px;height:230px;">
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