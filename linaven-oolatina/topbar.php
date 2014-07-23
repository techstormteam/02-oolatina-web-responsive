<div class="topbar">
	<!-- LOGO -->
	<div class="topBarLogo">
		<a href="javascript:void(0);" onclick="loadpage('index-partial.html')"><img src="images/logo_big.png" alt="" style="width:150px;"></a><!-- LOGO -->
	</div>

	<!-- RECHERCHE -->
	<div class="topBarSearchBlock">
		<form>
		  <div class="input-group" style="float:left;width:500px;height:30px;margin-top:17px;">
			<input placeholder="Search" id="search" class="form-control" type="text" style="float:left;width:350px;height:30px;" name="search">
			<input type="button" onclick="launchSearch();" value="" style="float:left;width:59px;height:30px;background-color:#4486F7;border-width:0px;border-radius:10px;-moz-border-radius:10px;background-image:url('images/search_icon.png');background-repeat:no-repeat;background-position:center;">
		  </div>
		</form>
	</div>

	<!-- ESPACE -->
	<div style="float:left;width:100px;height:100%;">

	</div>

	<div style="float:left;width:200px;height:100%;display:block;">
		<!-- BEGIN CART -->
		<div class="cart-block" id="topCartBlockDiv">
		</div>
		<!-- END CART -->
	</div>

	<!-- LANG -->
	<div class="topBarConnectBlock">
		<ul class="list-unstyled list-inline pull-right" style="padding-top:15px;">
		<?php
		
		if(isset($_SESSION['username']))
		{
			$SQL = "SELECT COUNT(*) FROM user WHERE username = '".$_SESSION['username']."' AND password = '".$_SESSION['password']."'";
			$reponse = mysql_query($SQL);
			$req = mysql_fetch_array($reponse);
			
			if($req[0] != 0)
			{
			?>
				<li>
					<div style="width:295px;height:28px;">
						<a href="javascript:void(0);" onclick="loadpage('userconfig.php?show=1');">
						<div style="float:left;width:34px;height:34px;">
							<img src="images/icon_user.png">
						</div>
						<div style="float:left;background-color:#ffffff;color:#000000;padding-top:8px;padding-left:7px;padding-right:7px;padding-bottom:7px;width:126px;height:34px;text-transform:lowercase;text-align:center;vertical-align:middle;">
							<?php echo $_SESSION['username']; ?>
						</div>
						</a>
						<div style="float:left;height:28px;width:126px;">
							<a href="logout.php" class="btn blue" style="float:left;">Deconnexion</a>
						</div>
					</div>
				</li>
			<?php
			}
			else
			{
			?>
				<li><a href="#" class="btn blue" style="border-radius:5px;" onclick="showConnect();">Connexion</a></li>
			<?php
			}
		}
		else
		{		
		?>
			<li><a href="#" class="btn blue" style="border-radius:5px;" onclick="showConnect();">Connexion</a></li>
		<?php
		}
		?>
		</ul>
	</div>
	
	<div style="float:right;height:100%;">
		<div class="langs">
        	<a href="#"><img src="images/flags/en.png" alt="en" /> Changer de langues<i></i></a>
		</div>
		<div class="flags" style="display:none;">
				<div class="closedd">X</div>
				<div class="rowflags">
						<div class="col-lg-2">
								<ul class="list-unstyled">
										<li><a href="#"><img src="images/flags/en.png" alt="en" /> Anglais</a></li>
											<li><a href="#"><img src="images/flags/es.png" alt="es" /> Espagnol</a></li>
											<li><a href="#"><img src="images/flags/gr.png" alt="gr" /> Allemand</a></li>
											<li><a href="#"><img src="images/flags/fr.png" alt="fr" /> Français</a></li>
											<li><a href="#"><img src="images/flags/it.png" alt="it" /> Italien</a></li>
											<li><a href="#"><img src="images/flags/it.png" alt="it" /> Italiano</a></li>
									</ul>
							</div>
							<div class="col-lg-2">
								<ul class="list-unstyled">
										<li><a href="#"><img src="images/flags/por.png" alt="por" /> Português</a></li>
											<li><a href="#"><img src="images/flags/ru.png" alt="ru" /> Russian</a></li>
											<li><a href="#"><img src="images/flags/cn.png" alt="cn" /> Chinese</a></li>
											<li><a href="#"><img src="images/flags/czr.png" alt="czr" /> Czech</a></li>
											<li><a href="#"><img src="images/flags/den.png" alt="den" /> Danish</a></li>
											<li><a href="#"><img src="images/flags/it.png" alt="it" /> Italiano</a></li>
									</ul>
							</div>
							<div class="col-lg-2">
								<ul class="list-unstyled">
										<li><a href="#"><img src="images/flags/cro.png" alt="cro" /> Hrvatski</a></li>
											<li><a href="#"><img src="images/flags/nl.png" alt="nl" /> Dutch</a></li>
											<li><a href="#"><img src="images/flags/pol.png" alt="pol" /> Polski</a></li>
											<li><a href="#"><img src="images/flags/rom.png" alt="rom" /> Română</a></li>
											<li><a href="#"><img src="images/flags/jp.png" alt="jp" /> 日本語</a></li>
											<li><a href="#"><img src="images/flags/it.png" alt="it" /> Italiano</a></li>
									</ul>
							</div>
							<div class="col-lg-2">
								<ul class="list-unstyled">
										<li><a href="#"><img src="images/flags/cro.png" alt="cro" /> Hrvatski</a></li>
											<li><a href="#"><img src="images/flags/nl.png" alt="nl" /> Dutch</a></li>
											<li><a href="#"><img src="images/flags/pol.png" alt="pol" /> Polski</a></li>
											<li><a href="#"><img src="images/flags/rom.png" alt="rom" /> Română</a></li>
											<li><a href="#"><img src="images/flags/jp.png" alt="jp" /> 日本語</a></li>
											<li><a href="#"><img src="images/flags/it.png" alt="it" /> Italiano</a></li>
									</ul>
							</div>
							<div class="col-lg-2">
								<ul class="list-unstyled">
										<li><a href="#"><img src="images/flags/cro.png" alt="cro" /> Hrvatski</a></li>
											<li><a href="#"><img src="images/flags/nl.png" alt="nl" /> Dutch</a></li>
											<li><a href="#"><img src="images/flags/pol.png" alt="pol" /> Polski</a></li>
											<li><a href="#"><img src="images/flags/rom.png" alt="rom" /> Română</a></li>
											<li><a href="#"><img src="images/flags/jp.png" alt="jp" /> 日本語</a></li>
									</ul>
							</div>
							<div class="col-lg-2">
								<ul class="list-unstyled">
										<li><a href="#"><img src="images/flags/cro.png" alt="cro" /> Hrvatski</a></li>
											<li><a href="#"><img src="images/flags/nl.png" alt="nl" /> Dutch</a></li>
											<li><a href="#"><img src="images/flags/pol.png" alt="pol" /> Polski</a></li>
											<li><a href="#"><img src="images/flags/rom.png" alt="rom" /> Română</a></li>
											<li><a href="#"><img src="images/flags/jp.png" alt="jp" /> 日本語</a></li>
											<li><a href="#"><img src="images/flags/it.png" alt="it" /> Italiano</a></li>
									</ul>
							</div>
					</div>
			</div>
	</div>
</div>
