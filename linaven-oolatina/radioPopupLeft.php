<?php

include "config.php";

?>
<a href="#" onclick="closeFullScreenPopup()"><div style="float:right;margin:10px;background-color:#D00355;padding:16px;color:#ffffff;font-size:20px;font-weight:bold;">X</div></a>
<?php

$flux = $_REQUEST['flux'];
$data = file_get_contents("http://webradio.oolatina.com/getInfoFlux.php?flux=$flux&command=getRadioMobileInfo2&width=500&height=500");
$json = json_decode($data);

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

?>
<div style="width:100%;height:110px;text-align:center;padding-top:10px;">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Oolatina FR 728*90 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-3832064664277561"
     data-ad-slot="9860196134"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
<div style="margin-left:auto;margin-right:auto;width:1300px;height:470px;">
	<div style="float:left;width:470px;height:470px;">
		<img src="<?php echo $json->cover; ?>" style="width:470px;height:470px;">
	</div>
	<div style="float:left;width:800px;height:350px;">
			<div style="color:#ffffff;font-size:18px;font-weight:bold;font-family: 'Roboto',Arial,sans-serif;padding-left:88px;margin-bottom:10px;margin-top:0px;">Albums</div>
			<div class="video-grid" style="padding-left:80px;width:750px;height:220px;">
			<?php
			
			$artistname = explode("-",$json->song_artist);
			$artistname = $artistname[0];
			$SQL = "SELECT * FROM artist WHERE name = '$artistname'";
			$reponse = mysql_query($SQL);
			$req = mysql_fetch_array($reponse);
			
			$idartist = $req['id'];
			
			if($idartist != 0)
			{
			
				$SQL = "SELECT COUNT(*) FROM albums WHERE idartist = $idartist";
				$reponse = mysql_query($SQL);
				$req = mysql_fetch_array($reponse);
				
				if($req[0] != 0)
				{
			
				$SQL = "SELECT * FROM albums WHERE idartist = $idartist";
				$reponse = mysql_query($SQL);
				while($req = mysql_fetch_array($reponse))
				{
					?>
					<a href="#" onclick="loadpageCloseAllPopup('albums-<?php echo $req['slug']; ?>-partial.html')" style="text-decoration:none;display:inline;margin:7px;;float:left;width:200px;height:200px;margin-bottom:20px;">
						<div style="width:200px;height:200px;">
						<img src="<?php echo $req['coverurl']; ?>" alt="#" style="width:200px;height:200px;">
						<div style="position:absolute;background-color:rgba(69,132,240,0.75);font-size:10px;color:#ffffff;margin-top:-49px;padding:3px;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;margin-left:100px;width:100px;"><?php echo $req['category']; ?></div>
						<div style="position:relative;font-family:Tahoma;background-color:#000000;font-size:12px;color:#ffffff;margin-top:-30px;height:30px;width:100%;padding:3px;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;margin-left:0px;text-align:center;"><b><span style="margin-top:5px;color:#ffffff;">
						<?php echo utf8_encode($req['title']); ?>																</b>
						</span>
						</div>
						</div>
					</a>
					<?php
				}
				
				}
				else
				{
					?>
					<img src="images/banniere_radio.png">
					<?php
				}
			
			}
			
			?>
			</div>
			<div style="color:#ffffff;font-size:18px;font-weight:bold;font-family: 'Roboto',Arial,sans-serif;padding-left:88px;margin-bottom:0px;margin-top:10px;">Video</div>
			<div class="video-grid" style="padding-left:80px;">
			<?php
			
			$artistname = trim($artistname);
			
			$SQL = "SELECT COUNT(*) FROM video WHERE title LIKE '%$artistname%'";
			$reponse = mysql_query($SQL);
			$req = mysql_fetch_array($reponse);
			
			if($req[0] != 0)
			{
			
			$SQL = "SELECT * FROM video WHERE title LIKE '%$artistname%' LIMIT 3";
			$reponse = mysql_query($SQL);
			while($req = mysql_fetch_array($reponse))
			{
				$cat = getNameCategory($req['category']);
			
				?>
				<a href="#" onclick="loadpageCloseAllPopup('videos-<?php echo $req['slug']; ?>-partial.html')" class="grid_3" style="margin-bottom:20px;">
					<div style="width:200px;height:160px;">
					<img src="<?php echo $req['thumbnail_url']; ?>" alt="#" style="width:200px;height:160px;">
					<div style="position:absolute;background-color:rgba(69,132,240,0.75);font-size:10px;color:#ffffff;margin-top:-49px;padding:3px;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;margin-left:100px;width:100px;"><?php echo $cat; ?></div>
					<div style="position:absolute;font-family:Tahoma;background-color:#000000;font-size:12px;color:#ffffff;margin-top:-30px;height:30px;width:100%;padding:3px;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;margin-left:0px;text-align:center;">
						<b>
							<span style="margin-top:5px;color:#ffffff;">
							<?php echo utf8_encode(substr($req['title'],0,25))."..."; ?>
							</span>
						</b>
					</div>
					</div>
				</a>
				<?php
			}
			
			}
			else
			{
				?>
				<img src="images/banniere_radio.png">
				<?php
			}
			
			?>
			</div>
	</div>
</div>
<div style="float:left;width:100%;height:250px;">
	<div style="float:left;width:70%;height:250px;">
		<div style="width:100%;height:125px;text-align:center;padding-top:35px;">
			<a href="javascript:void(0);" onclick="playRadio('kizomba');"><img src="images/web-radio-kizomba.png" title="Radio Kizomba"></a>
			<a href="javascript:void(0);" onclick="playRadio('bachata');"><img src="images/web-radio-bachata.png" title="Radio Bachata"></a>
			<a href="javascript:void(0);" onclick="playRadio('oolatina');"><img src="images/web-radio-oolatina.png" title="Radio OOLatina"></a>
			<a href="javascript:void(0);" onclick="playRadio('salsa_cubaine');"><img src="images/web-radio-salsa-cubaine.png" title="Radio Salsa Cubaine"></a>
			<a href="javascript:void(0);" onclick="playRadio('salsa_portoricaine');"><img src="images/web-radio-salsa-portoricaine.png" title="Radio Salsa Portoricaine"></a>			
		</div>
		<div style="width:100%;height:125px;text-align:center;padding-top:15px;">
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<!-- Oolatina FR 728*90 -->
			<ins class="adsbygoogle"
				 style="display:inline-block;width:728px;height:90px"
				 data-ad-client="ca-pub-3832064664277561"
				 data-ad-slot="9860196134"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
		</div>
	</div>
	<div style="float:left;width:30%;text-align:center;height;250px;">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- Oolatina FR 300250 haut -->
		<ins class="adsbygoogle"
			 style="display:inline-block;width:300px;height:250px"
			 data-ad-client="ca-pub-3832064664277561"
			 data-ad-slot="7339114936"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div>
	<script>
	document.write = function(t)
	{
	var d = document.getElementById("content_pub_google");
	if(d) d.innerHTML += t;
	else document.body.innerHTML += t;
	}
	</script>
</div>
