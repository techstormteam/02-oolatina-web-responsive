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
<!-- Head END -->
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
			
			<div class="block_agenda">
				<div class="block_agenda_search">
					<label>Rechercher : </label>
					<i class="agenda_input_search"></i><input class="agenda_input" type="text" name="search" placeholder="Rechercher" style="">
					<label>&nbsp;&nbsp;&nbsp;&nbsp;Calendrier : </label>	
					<i class="agenda_input_calendar"></i>
					<?php
						
					echo '<input type="text" class="datepicker agenda_input" placeholder="" value="">';
						
					?>
					<label>&nbsp;&nbsp;&nbsp;&nbsp;Ville : </label>
					<i class="agenda_input_pin"></i><input class="agenda_input" type="text" name="ville" placeholder="" style="">
				</div>
				
				<div class="block_agenda_genre">
					<input type="checkbox" name="genre" value="Cours"> <label><div style="margin-top:2px;">Cours</div></label>
					<input type="checkbox" name="genre" value="Festival"> <label>Festival</label>
					<input type="checkbox" name="genre" value="Soirée">	<label>Soirée</label>
					<input type="checkbox" name="genre" value="Stage"> <label>Stage</label>
					<input type="checkbox" name="music" value="bachata"> <label>Bachata</label>
					<input type="checkbox" name="music" value="kizomba"> <label>Kizomba</label>
					<input type="checkbox" name="music" value="merengue"> <label>Merengue</label>
					<input type="checkbox" name="music" value="salsa"> <label>Salsa</label>
				</div>
				
				<div class="block_agenda_final">
					<a href="#" class="btn btchange">Trouver des evenements</a>
				</div>
			</div>
			
			<?php
			
			$SQL = "SELECT * FROM event";
			$reponse = mysql_query($SQL);
			while($req = mysql_fetch_array($reponse))
			{
			
				$title = $req['title'];
				$thumbnail_url = $req['thumbnail_url'];
				$description = $req['description'];
				$idvenue = $req['idvenue'];
				$start_date = $req['start_date'];
				
				$start_date = explode(" ",$start_date);
				$start_date = $start_date[0];
				$start_date = explode("-",$start_date);
				
				$SQL = "SELECT * FROM venue WHERE id = $idvenue";
				$r = mysql_query($SQL);
				$rReq = mysql_fetch_array($r);
				
				$city = $rReq['city'];
			
				?>
				<div class="agenda_listing_box" style="background-color:rgba(39,39,39,0.8);">
					<div style="float:left;width:200px;height:200px;"><img src="<?php echo $thumbnail_url; ?>" style="width:200px;height:200px;"></div>
					<div style="float:left;width:1000px;">
						<div class="titleAgenda"><a href="javascript:void(0)" onclick="loadpage('event-<?php echo $req['slug']; ?>-partial.html');"><H1><?php echo $title; ?></H1></a></div>
						<div style="width:800px;padding-left:15px;font-family: 'Roboto',Arial,sans-serif;color:#ffffff;"><H2><?php echo utf8_encode(substr($description,0,250))."..."; ?></H2><a href="javascript:void(0);" onclick="loadpage('event-<?php echo $req['slug']; ?>-partial.html');" class="btn btchange">En savoir plus</a></div>
					</div>
					<div style="float:left;background-color:#ffffff;width:94px;height:180px;">
						<div style="width:100%;height:90px;background-color:#ff0000;font-size:30px;color:#ffffff;text-align:center;font-family: 'Roboto',Arial,sans-serif;">
						<span style="padding-top:20px;">
						Ven<br>
						<b style="font-size:40px;"><?php echo $start_date[2]; ?></b>
						</span>
						</div>
						<div style="width:100%;height:35px;color:#000000;font-size:33px;text-align:center;">
						<b><?php echo monthToLetter($start_date[1]); ?></b>
						</div>
						<div style="width:100%;height:40px;color:#000000;font-size:20px;text-align:center;">
						<?php echo $start_date[0]; ?>
						<br><H2><?php echo $city; ?></H2>
						</div>
					</div>
				</div>
				<?php
			}
			
			?>				
			</div>
			<?php

			echo "<script type='text/javascript' src='js/bootstrap-datepicker.js'></script>";
			echo "<script>";
			echo "$('.datepicker').datepicker();";
			echo "</script>";

			?>
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