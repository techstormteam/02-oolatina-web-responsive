<?php

class playlist
{
	function __construct()
	{
		session_start();
		if(!isset($_SESSION['playlist']))
		{
			$_SESSION['playlist'] = array();
		}
	}
	
	function addMusicPlaylist($id)
	{
		$SQL = "SELECT * FROM piste WHERE id = $id";
		$reponse = mysql_query($SQL);
		$req = mysql_fetch_array($reponse);
		
		$title = $req['title'];
		$cover = $req['cover'];
		$mp3 = $req['mp3'];
		$nbrplay = $req['nbrplay'];
		$idalbums = $req['idalbums'];
		$idpiste = $req['id'];
		
		$SQL = "SELECT * FROM albums WHERE id = $idalbums";
		$reponse = mysql_query($SQL);
		$req = mysql_fetch_array($reponse);
		
		$idartist = $req['idartist'];
		
		$SQL = "SELECT * FROM artist WHERE id = $idartist";
		$reponse = mysql_query($SQL);
		$req = mysql_fetch_array($reponse);
		
		$artistname = $req['name'];
		
		$array['id'] = $idpiste;
		$array['title'] = $title;
		$array['artist'] = '<a href="#" onclick="loadpage(\'artist-'.$req['slug'].'-partial.html\')">'.$artistname.'</a>';
		$array['cover'] = $cover;
		$array['mp3'] = $mp3;
		$array['nbrplay'] = $nbrplay;
		
		$_SESSION['playlist'][count($_SESSION['playlist'])] = $array;
	}
	
	function clear()
	{
		$_SESSION['playlist'] = NULL;
	}
	
	function getCount()
	{
		echo count($_SESSION['playlist']);
	}
	
	function addcountplay($id)
	{
		$SQL = "UPDATE piste SET nbrplay = nbrplay + 1 WHERE id = $id";
		mysql_query($SQL);
		
		$SQL = "SELECT * FROM piste WHERE id = $id";
		$reponse = mysql_query($SQL);
		$req = mysql_fetch_array($reponse);
		
		return $req['nbrplay'];
	}
	
	function getCurrentMusic($number)
	{
		for($x=0;$x<count($_SESSION['playlist']);$x++)
		{
			$array = $_SESSION['playlist'][$x];
			if($x == $number)
			{
				$nbrplay = $this->addcountplay($array['id']);
				echo $array['title']."|".$array['cover']."|".$array['mp3']."|".$array['artist']."|<img src=\"images/stat_icon.png\"> ".$nbrplay." Lecture";
				exit;
			}
		}
	}
	
	function getLastMusic()
	{
		$array = $_SESSION['playlist'][count($_SESSION['playlist'])-1];
		$nbrplay = $this->addcountplay($array['id']);
		echo $array['title']."|".$array['cover']."|".$array['mp3']."|".$array['artist']."|<img src=\"images/stat_icon.png\"> ".$nbrplay." Lecture";
		exit;
	}
	
	function removeMusicPlaylist($number)
	{
		// Todo à faire
	}
}

?>