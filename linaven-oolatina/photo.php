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

  <link rel="shortcut icon" href="favicon.ico">
  <link href="/favicon.ico" rel="SHORTCUT ICON" type="image/ico">
  
  <?php
  
  include "topcss.php";
  
  ?>

<!-- Body BEGIN -->
<body style="background: url('images/bg.jpg') no-repeat fixed center top / cover transparent;">
    
	<!-- TOP BAR -->
	<?php
	
	include "topbar.php";
	
	?>
	<!-- END TOP BAR -->
	
	<div id="mask" onclick="closePopup();" style="position:fixed;display:none;top:0;left:0;width:100%;height:100%;background-color:rgba(0,0,0,0.8);z-index:15;">
	</div>

	<div id="popupConnect" style="position:fixed;z-index:16;display:none;height:0px;width:600px;background-color:rgba(255,255,255,0.8);top:15%;left:33.5%;">
	<a href="#" onclick="closePopup();" style="float: right;font-size:14px;font: 15px/1.5em Helvetica,sans-serif;font-weight: bold;line-height: 20px;color: #000;text-shadow: 0px 1px 0px #FFF;opacity: 0.2;margin-top:5px;margin-right:10px;">X</a>
	
	<form class="login-form" action="connexion.php" method="post" style="padding:40px;">
		<h3 class="form-title">Connectez-vous</h3>
				
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Nom d'utilisateur</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Nom d'utilisateur" name="username"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Mot de passe</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Mot de passe" name="password"/>
			</div>
		</div>
		<div class="form-actions">
			<button type="submit" class="btn blue pull-right">
			Se Connecter <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
		<div class="forget-password">
			<h4>Mot de passe oublié ?</h4>
			<p>
				pas de soucis, cliquez				<a href="javascript:;" id="forget-password">
					 ici				</a>
				 pour réinitialiser votre mot de passe.			</p>
		</div>
		<div class="create-account">
			<p>
				 Vous n'avez pas encore de compte ?&nbsp;
				<a href="javascript:;" id="register-btn" class="btn blue" style="margin-top:10px;width:100%;">
					 Créer un compte ( 100% Gratuit )				</a>
			</p>
		</div>
	</form>
	
	</div>
	
	<!-- MENU LEFT -->
	<?php
	
	include "menu.php";
	
	?>
    <!-- END MENU LEFT -->

    <div class="main" style="background-color:rgba(18, 19, 20, 0.8);padding-top:80px;padding-bottom:10px;">
		<div style="float:left;width:270px;">
		&nbsp;
		</div>
		<div style="float:left;width:69.60%;">
		<?php
		
		}
		
		?>
				<img src="images/pub.png" style="width:100%;margin-bottom:10px;">
				
				<div class="titleHome">
					<img src="images/movie_icon.png">&nbsp;&nbsp;Photos
				</div>
				<div class="separator"><div class="sep_pink"></div></div>
				
				<div class="wrapper">

					
					<span id="close"><a href="javascript:void(0);" class="btn btchange">Voir les autre soirée</a></span>
					<br>
					<ul id="tp-grid" class="tp-grid" style="margin-top:10px;">
					<?php
					
					function parcourir_repertoire($repertoire)
					{
						$x = 0;
						$le_repertoire = opendir($repertoire) or die("Erreur le repertoire $repertoire existe pas");
						while($fichier = @readdir($le_repertoire))
						{

							// enlever les traitements inutile
							if ($fichier == "." || $fichier == "..") continue;

							if(is_dir($repertoire.'/'.$fichier))
							{
								$array[$x] = $fichier;
								$x++;
							}
						}

						closedir($le_repertoire);
						
						return $array;
					}
					
					function parcourir_fichier($repertoire)
					{
						$x = 0;
						$le_repertoire = opendir($repertoire) or die("Erreur le repertoire $repertoire existe pas");
						while($fichier = @readdir($le_repertoire))
						{

							// enlever les traitements inutile
							if ($fichier == "." || $fichier == "..") continue;

							if(is_dir($repertoire.'/'.$fichier))
							{
							}
							else
							{
								$array[$x] = $fichier;
								$x++;
							}
						}

						closedir($le_repertoire);
						
						return $array;
					}
					
					mysql_connect("localhost", "linavenf_connect", "0eocje@le987dslz");
					mysql_select_db("linavenf_connect");
					
					$SQL = "SELECT * FROM evenement";
					$reponse = mysql_query($SQL);
					while($req = mysql_fetch_array($reponse))
					{
						$idevent = $req['id'];
						$title = $req['title'];
						$array = parcourir_repertoire('photoevent/');
						
						for($x=0;$x<count($array);$x++)
						{
							$iduser = $array[$x];
							if(file_exists('photoevent/'.$iduser.'/'.$idevent))
							{
								$photoarray = parcourir_fichier("photoevent/".$iduser."/".$idevent."/");
								if(count($photoarray) != 0)
								{
								
									for($i = 0;$i<count($photoarray);$i++)
									{									
										$filename = $photoarray[$i];
										$exclusion = explode("-mini",$filename);
										if(count($exclusion) == 1)
										{
										?>
											<li data-pile="<?php echo utf8_encode($title); ?>">
												<a href="photoevent/<?php echo $iduser; ?>/<?php echo $idevent; ?>/<?php echo $filename; ?>">
													<span class="tp-info"><span>Photo n°<?php echo $i+1; ?></span></span>
													<img src="getThumb.php?filename=photoevent/<?php echo $iduser; ?>/<?php echo $idevent; ?>/<?php echo $filename; ?>&width=300&height=300">
												</a>
											</li>
										<?php
										}										
									}
								}
							}
						}
					}
					
					?>
					</ul>
				</div>
				
				<script src="js/jquery.stapel.js" type="text/javascript"></script>

				<script type="text/javascript">	
					$(function() {

						var $grid = $( '#tp-grid' ),
							$name = $( '#name' ),
							$close = $( '#close' ),
							$loader = $( '<div class="loader"><i></i><i></i><i></i><i></i><i></i><i></i><span>Loading...</span></div>' ).insertBefore( $grid ),
							stapel = $grid.stapel( {
								onLoad : function() {
									$loader.remove();
								},
								onBeforeOpen : function( pileName ) {
									$name.html( pileName );
								},
								onAfterOpen : function( pileName ) {
									$close.show();
								}
							} );

						$close.on( 'click', function() {
							$close.hide();
							$name.empty();
							stapel.closePile();
						} );

					} );
				</script>
		<?php
		
		if($hide == 'full')
		{
		
		?>
        </div>
		</div>
		<div style="float:left;width:300px;padding-top:0px;">
		<?php
		
		include "rightcolumns.php";
		
		?>
		</div>
        <div class="row">
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
    <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
<?php

}

?>