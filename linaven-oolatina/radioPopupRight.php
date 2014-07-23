<?php

include "config.php";

$flux = $_REQUEST['flux'];

?>
<div class="fb-comments" data-href="http://www.oolatina.com/radio-<?php echo $flux; ?>.html" data-numposts="5" data-width="475" data-colorscheme="light"></div>
<div style="margin-top:85%;width:100%;height:300px;">
<div style="color:#000000;font-size:18px;font-weight:bold;font-family: 'Roboto',Arial,sans-serif;margin-bottom:10px;margin-top:0px;padding:5px;">Evenement Sponsorisé</div>
<?php

$SQL = "SELECT * FROM event";
$reponse = mysql_query($SQL);
while($req = mysql_fetch_array($reponse))
{
	?>
	<a href="#" onclick="loadpage('showagenda.php?id=<?php echo $req['id']; ?>')" class="grid_3" style="margin-bottom:20px;">
		<div style="width:180px;height:180px;">
			<img src="<?php echo $req['thumbnail_url']; ?>" alt="#" style="width:180px;height:180px;">
			<div style="position:absolute;font-family:Tahoma;background-color:#000000;font-size:12px;color:#ffffff;margin-top:-30px;height:30px;width:100%;padding:3px;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;margin-left:0px;text-align:center;"><b><span style="margin-top:5px;color:#ffffff;">
				<?php
				
				if(strlen($req['title']) > 20)
				{											
					echo substr($req['title'],0,20)."...";
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