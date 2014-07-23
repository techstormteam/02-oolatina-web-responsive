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
	<div class="pageContainer">
		<div style="float:left;width:12.4%;">
		&nbsp;
		</div>
		<div style="float:left;width:69.60%;" id="ajax-container">
		<?php

		}

		?>
			<div class="single-content" style="background-color:rgba(0,0,0,0.5);width:100%;height:650px;padding:20px;">
							<div class="single-title">
				<h1 style="color:#ffffff;">Plan du Site</h1>	
			</div>
				<p>&nbsp;</p>
				<div class="blockSiteMapMax">
					<div class="blockSiteMap">
						<div style="margin-left:-15px;font-weight:bold;font-size:18px;"><a href="#" onclick="loadpage('index-partial.html')">Accueil</a></div>
					</div>
					<div class="blockSiteMap">
						<div style="margin-left:-15px;font-weight:bold;font-size:18px;"><a href="#" onclick="loadpage('agenda-partial.html');">Agenda</a></div>
					</div>
					<div class="blockSiteMap">
					<div style="margin-left:-15px;font-weight:bold;font-size:18px;"><a href="#" onclick="loadpage('photos-partial.html');">Photo</a></div>
					</div>
					<div class="blockSiteMap">
						<div style="margin-left:-15px;font-weight:bold;font-size:18px;"><a href="javascript:void(0);" onclick="loadpage('audio-partial-last-add.html')">Audio</a></div>
						<li><a href="javascript:void(0);" onclick="loadpage('audio-partial-last-add.html')">Dernière Ajouts</a></li>
						<li><a href="javascript:void(0);" onclick="loadpage('audio-partial-kizomba.html')">Kizomba</a></li>
						<li><a href="javascript:void(0);" onclick="loadpage('audio-partial-bachata.html')">Bachata</a></li>
						<li><a href="javascript:void(0);" onclick="loadpage('audio-partial-salsa-cubaine.html')">Salsa Cubaine</a></li>
						<li><a href="javascript:void(0);" onclick="loadpage('audio-partial-salsa-portoricaine.html')">Salsa Portoricaine</a></li>
						<li><a href="javascript:void(0);" onclick="loadpage('audio-partial-reggaeton.html')">Reggaeton</a></li>
						<li><a href="javascript:void(0);" onclick="loadpage('audio-partial-merengue.html')">Merengue</a></li>
					</div>
					<div class="blockSiteMap">
						<div style="margin-left:-15px;font-weight:bold;font-size:18px;"><a href="javascript:void(0);" onclick="loadpage('video-partial-last-add.html')">Video</a></div>
						<li><a href="javascript:void(0);" onclick="loadpage('video-partial-last-add.html')">Dernière Ajouts</a></li>
						<li><a href="javascript:void(0);" onclick="loadpage('video-partial-dance-shows.html')">Dance Shows</a></li>
						<li><a href="javascript:void(0);" onclick="loadpage('video-partial-dance-workshops.html')">Dance Workshops</a></li>
						<li><a href="javascript:void(0);" onclick="loadpage('video-partial-dance-party.html')">Dance Party</a></li>
						<li><a href="javascript:void(0);" onclick="loadpage('video-partial-salsa-cubaine.html')">Salsa Cubaine</a></li>
						<li><a href="javascript:void(0);" onclick="loadpage('video-partial-salsa-portoricaine.html')">Salsa Portoricaine</a></li>
						<li><a href="javascript:void(0);" onclick="loadpage('video-partial-bachata.html')">Bachata</a></li>
						<li><a href="javascript:void(0);" onclick="loadpage('video-partial-kizomba.html')">Kizomba</a></li>
						<li><a href="javascript:void(0);" onclick="loadpage('video-partial-merengue.html')">Merengue</a></li>
						<li><a href="javascript:void(0);" onclick="loadpage('video-partial-reggeaton.html')">Reggeaton</a></li>
					</div>
				</div>
				<div class="blockSiteMapMax">
					<div class="blockSiteMap">
						<div style="margin-left:-15px;font-weight:bold;font-size:18px;"><a href="javascript:void(0);" onclick="loadpage('audio-partial-last-add.html')">Radio</a></div>
						<li><a href="javascript:void(0);" onclick="loadpage('audio-partial-last-add.html')">Bachata</a></li>
						<li><a href="javascript:void(0);" onclick="loadpage('audio-partial-kizomba.html')">Kizomba</a></li>
						<li><a href="javascript:void(0);" onclick="loadpage('audio-partial-bachata.html')">OOLatina</a></li>
						<li><a href="javascript:void(0);" onclick="loadpage('audio-partial-salsa-cubaine.html')">Salsa Cubaine</a></li>
						<li><a href="javascript:void(0);" onclick="loadpage('audio-partial-salsa-portoricaine.html')">Salsa Portoricaine</a></li>
					</div>
					<div class="blockSiteMap">
						<div style="margin-left:-15px;font-weight:bold;font-size:18px;"><a href="javascript:void(0);" onclick="loadpage('video-partial-last-add.html')">Mentions Légales</a></div>
						<li><a href="javascript:void(0);" onclick="loadpage('video-partial-last-add.html')">Règlement du site</a></li>
						<li><a href="javascript:void(0);" onclick="loadpage('video-partial-dance-shows.html')">Mentions Légales</a></li>
						<li><a href="javascript:void(0);" onclick="loadpage('video-partial-dance-workshops.html')">Cookie</a></li>
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
    <div style="width:100%;height:89px;background-color:#4584F0;">
		<div style="width:1600px;margin-left:auto;margin-right:auto;">
			<div style="float:left;width:200px;margin-top:12px;text-align:center;">
					<div id="user_count" style="font-size:36px;color:#ffffff;width:200px;height:40px;">0</div>
					<div style="font-size:20px;color:#ffffff;width:100%;">Utilisateur</div>
			</div>
			<div style="float:left;width:200px;margin-top:12px;text-align:center;">
					<div id="events_count" style="font-size:36px;color:#ffffff;width:200px;height:40px;">0</div>
					<div style="font-size:20px;color:#ffffff;width:100%;">Evenements</div>
			</div>
			<div style="float:left;width:200px;margin-top:12px;text-align:center;">
					<div id="photo_count" style="font-size:36px;color:#ffffff;width:200px;height:40px;">0</div>
					<div style="font-size:20px;color:#ffffff;width:100%;">Photos</div>
			</div>
			<div style="float:left;width:200px;margin-top:12px;text-align:center;">
					<div id="video_count" style="font-size:36px;color:#ffffff;width:200px;height:40px;">0</div>
					<div style="font-size:20px;color:#ffffff;width:100%;">Video</div>
			</div>
			<div style="float:left;width:200px;margin-top:12px;text-align:center;">
					<div id="audio_count" style="font-size:36px;color:#ffffff;width:200px;height:40px;">0</div>
					<div style="font-size:20px;color:#ffffff;width:100%;">Audio</div>
			</div>
			<div style="float:left;width:200px;margin-top:12px;text-align:center;">
					<div id="tv_count" style="font-size:36px;color:#ffffff;width:200px;height:40px;">0</div>
					<div style="font-size:20px;color:#ffffff;width:100%;">Tv</div>
			</div>
			<div style="float:left;width:200px;margin-top:12px;text-align:center;">
					<div id="radio_count" style="font-size:36px;color:#ffffff;width:200px;height:40px;">0</div>
					<div style="font-size:20px;color:#ffffff;width:100%;">Radio</div>
			</div>
			<div style="float:left;width:200px;margin-top:12px;text-align:center;">
					<div id="country_count" style="font-size:36px;color:#ffffff;width:200px;height:40px;">0</div>
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