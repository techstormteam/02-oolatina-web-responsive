<?php

include "config.php";
include "func.php";
include "panier.class.php";	

/* Newsletter */
if(isset($_REQUEST['action']))
{
	$action = $_REQUEST['action'];
	if($action == 'addnewsletter')
	{
		$email = $_REQUEST['email'];
		$reponse = VerifierAdresseMail($email);
		if($reponse == 1)
		{
			// Check si l'email existe passthru
			$SQL = "SELECT COUNT(*) FROM newsletter WHERE email = '$email'";
			$reponse = mysql_query($SQL);
			$req = mysql_fetch_array($reponse);
			
			if($req[0] == 0)
			{
		
				$SQL = "INSERT INTO newsletter VALUES ('','$email')";
				mysql_query($SQL);
				
				header("Location: index.php?checknewsletter=1");
			
			}
			else
			{
				header("Location: index.php?checknewsletter=-3");
			}
		}
		else if($reponse == -1)
		{
			header("Location: index.php?checknewsletter=-1");
		}
		else if($reponse == -2)
		{
			header("Location: index.php?checknewsletter=-2");
		}
	}
}

$panier = new panier();

if(!isset($_REQUEST['hide']))
{

?>
<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- Head BEGIN --><head>
  <meta charset="utf-8">
  <title>OOLatina</title>

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
    <!-- END MENU LEFT -->
    <!-- BEGIN SLIDER -->
    <?php

	include "slider.php";

	?>
    <!-- END SLIDER -->
	<div class="pageContainer">
		<div style="float:left;width:12.4%;">
		&nbsp;
		</div>
		<div style="float:left;width:69.60%;" id="ajax-container">
		<?php

		}

		?>
			<div class="col-md-12 sale-product">				
				<div class="def-block">
					<div class="titleHome">
					<img src="images/calendar_icon.png">&nbsp;&nbsp;Agenda
					</div>
					<div class="separator"><div class="sep_pink"></div></div>
					<div class="video-grid miniThumbLine">
						<?php
						
						$SQL = "SELECT * FROM event ORDER BY id DESC LIMIT 5";
						$reponse = mysql_query($SQL);
						while($req = mysql_fetch_array($reponse))
						{
						
						?>
						<a href="javascript:void(0);" onclick="loadpage('event-<?php echo $req['slug']; ?>-partial.html');" class="miniThumbGridBlock">
							<div class="miniThumbBlock">
								<img src="<?php echo $req['thumbnail_url']; ?>" alt="#" class="miniThumbAlbum">
								<div class="miniThumbTitle">
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
								</div>
							</div>
						</a>
						<?php
						
						}
						
						?>
					</div>
					<div class="titleHome">
					<img src="images/music_icon.png">&nbsp;&nbsp;Audio
					</div>
					<div class="separator"><div class="sep_pink"></div></div>
					<div class="video-grid miniThumbLine">
						<?php
						
						$SQL = "SELECT * FROM albums ORDER BY id DESC LIMIT 5";
						$reponse = mysql_query($SQL);
						while($req = mysql_fetch_array($reponse))
						{
						
						?>
						<a href="javascript:void(0);" onclick="loadpage('albums-<?php echo $req['slug']; ?>-partial.html')" class="miniThumbGridBlock">
							<div class="miniThumbBlock">
								<img src="<?php echo $req['coverurl']; ?>" alt="#" class="miniThumbAlbum">
								<div class="miniThumbCategory"><?php echo $req['category']; ?></div>
								<div class="miniThumbTitle">
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
								</div>
							</div>
						</a>
						<?php
						
						}
						
						?>
					</div>
					<div class="titleHome">
					<img src="images/movie_icon.png">&nbsp;&nbsp;Video
					</div>
					<div class="separator"><div class="sep_pink"></div></div>
					<div class="video-grid miniThumbLine">
						<?php
						
						$SQL = "SELECT * FROM video ORDER BY id DESC LIMIT 5";
						$reponse = mysql_query($SQL);
						while($req = mysql_fetch_array($reponse))
						{
							$cat = $req['category'];
							$namecat = getNameCategory($cat);
							
						?>
						<a href="javascript:void(0);" onclick="loadpage('videos-<?php echo $req['slug']; ?>-partial.html')" class="miniThumbGridBlockVideo">
							<div style="miniThumbBlock">
								<img src="<?php echo $req['thumbnail_url']; ?>" alt="#" class="miniThumbVideo">
								<div class="miniThumbCategory"><?php echo $namecat; ?></div>
								<div class="miniThumbTitle">
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
								</div>
							</div>
						</a>
						<?php
						
						}
						
						?>
					</div>
				</div>
			</div>
		<?php

		if(!isset($_REQUEST['hide']))
		{

		?>
		</div>
		<div style="float:left;width:18%;padding-top:0px;text-align:center;">
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
