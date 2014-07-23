<?php

// API OOLatina v2.0

include "config.php";
include "func.php";

if(isset($_REQUEST['pass']))
{
	$pass = $_REQUEST['pass'];
	if($pass == '4f20r9df5s0e4d1fflrke014854')
	{
		$command = $_REQUEST['command'];
		
		if($command == 'ADD_ARTIST')
		{
			$name = $_REQUEST['name'];
			$thumbnail = $_REQUEST['thumbnail'];
			
			$SQL = "SELECT COUNT(*) FROM artist WHERE name = '$name'";
			$reponse = mysql_query($SQL);
			$req = mysql_fetch_array($reponse);
			
			if($req[0] == 0)
			{
				$SQL = "INSERT INTO artist VALUES ('','$name','$thumbnail')";
				mysql_query($SQL);
				
				$SQL = "SELECT * FROM artist WHERE name = '$name'";
				$reponse = mysql_query($SQL);
				$req = mysql_fetch_array($reponse);
											
				echo $req['id'];
				exit;
			}
			
			echo "-1";
		}
		
		if($command == 'ADD_ALBUMS')
		{
			$coverurl = $_REQUEST['coverurl'];
			$title = $_REQUEST['title'];
			$idartist = $_REQUEST['idartist'];
			$date = $_REQUEST['date'];
			$category = $_REQUEST['category'];
			$itunes_link = $_REQUEST['itunes_link'];	
			
			$SQL = "SELECT COUNT(*) FROM albums WHERE title = '$title' AND idartist = '$idartist'";
			$reponse = mysql_query($SQL);
			$req = mysql_fetch_array($reponse);
			
			if($req[0] == 0)
			{			
				$slug = slugify($title);
				$SQL = "INSERT INTO albums VALUES ('','$idartist','$coverurl','$title','$date','$category','$itunes_link','$slug','0')";
				mysql_query($SQL);
				
				$SQL = "SELECT * FROM albums WHERE title = '$title' AND idartist = '$idartist'";
				$reponse = mysql_query($SQL);
				$req = mysql_fetch_array($reponse);
				
				echo $req['id'];
				exit;
			}
			else
			{
				$SQL = "SELECT * FROM albums WHERE title = '$title' AND idartist = '$idartist'";
				$reponse = mysql_query($SQL);
				$req = mysql_fetch_array($reponse);
				
				echo $req['id'];
				exit;
			}
		}
		
		if($command == 'ADD_PISTE')
		{
			$idalbum = $_REQUEST['idalbum'];
			$title = $_REQUEST['title'];
			$time = $_REQUEST['time'];
			$number = $_REQUEST['number'];
			$cover = $_REQUEST['cover'];
			$itunes = $_REQUEST['itunes'];
			$mp3 = $_REQUEST['mp3'];
			$genre = $_REQUEST['genre'];
			
			$SQL = "SELECT COUNT(*) FROM piste WHERE idalbums = $idalbum AND title = '$title'";
			$reponse = mysql_query($SQL);
			$req = mysql_fetch_array($reponse);
			
			if($req[0] == 0)
			{
				$SQL = "INSERT INTO piste VALUES ('',$idalbum,'$title','$time','$number','$cover','$itunes','$mp3','$genre',0)";
				mysql_query($SQL);
				
				$SQL = "SELECT * FROM piste WHERE idalbums = $idalbum AND title = '$title'";
				$reponse = mysql_query($SQL);
				$req = mysql_fetch_array($reponse);
				
				echo $req['id'];
				exit;
			}
			
			$SQL = "SELECT * FROM piste WHERE idalbums = $idalbum AND title = '$title'";
			$reponse = mysql_query($SQL);
			$req = mysql_fetch_array($reponse);
				
			echo $req['id'];
		}
		
		// Debug pour peupler la base64_decode
		if($command == 'POPULATE_VIDEO')
		{
			$category = "47";
		
			$json = file_get_contents("http://www.oolatina.com/webservice/oolatina_api.php?command=GET_VIDEO_CATEGORIE&idcategory=$category");
			$json = json_decode($json);
			//print_r($json);
			
			for($x=0;$x<count($json);$x++)
			{
				$array = $json[$x];
				$title = $array->title;
				$thumbnail = $array->thumbnail;
				$youtube = $array->youtube;
				
				$SQL = "SELECT COUNT(*) FROM video WHERE url = '$youtube'";
				$reponse = mysql_query($SQL);
				$req = mysql_fetch_array($reponse);
				
				// Permet l'ajout de video qui n'existe pas.
				if($req[0] == 0)
				{				
					$slug = slugify($title);
					$SQL = "INSERT INTO video VALUES ('','$category','$title','$youtube','$thumbnail','$slug',0)";
					echo "<b>*** INSERTION *** : </b>".$SQL;
					mysql_query($SQL);
				}
			}
		}
	}
}

?>