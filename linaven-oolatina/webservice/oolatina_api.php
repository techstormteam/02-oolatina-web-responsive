<?php

include "config.php";
include "youtube_api.php";
include "image_api.php";

function remove_accents($string) {
    if ( !preg_match('/[\x80-\xff]/', $string) )
        return $string;

    $chars = array(
    // Decompositions for Latin-1 Supplement
    chr(195).chr(128) => 'A', chr(195).chr(129) => 'A',
    chr(195).chr(130) => 'A', chr(195).chr(131) => 'A',
    chr(195).chr(132) => 'A', chr(195).chr(133) => 'A',
    chr(195).chr(135) => 'C', chr(195).chr(136) => 'E',
    chr(195).chr(137) => 'E', chr(195).chr(138) => 'E',
    chr(195).chr(139) => 'E', chr(195).chr(140) => 'I',
    chr(195).chr(141) => 'I', chr(195).chr(142) => 'I',
    chr(195).chr(143) => 'I', chr(195).chr(145) => 'N',
    chr(195).chr(146) => 'O', chr(195).chr(147) => 'O',
    chr(195).chr(148) => 'O', chr(195).chr(149) => 'O',
    chr(195).chr(150) => 'O', chr(195).chr(153) => 'U',
    chr(195).chr(154) => 'U', chr(195).chr(155) => 'U',
    chr(195).chr(156) => 'U', chr(195).chr(157) => 'Y',
    chr(195).chr(159) => 's', chr(195).chr(160) => 'a',
    chr(195).chr(161) => 'a', chr(195).chr(162) => 'a',
    chr(195).chr(163) => 'a', chr(195).chr(164) => 'a',
    chr(195).chr(165) => 'a', chr(195).chr(167) => 'c',
    chr(195).chr(168) => 'e', chr(195).chr(169) => 'e',
    chr(195).chr(170) => 'e', chr(195).chr(171) => 'e',
    chr(195).chr(172) => 'i', chr(195).chr(173) => 'i',
    chr(195).chr(174) => 'i', chr(195).chr(175) => 'i',
    chr(195).chr(177) => 'n', chr(195).chr(178) => 'o',
    chr(195).chr(179) => 'o', chr(195).chr(180) => 'o',
    chr(195).chr(181) => 'o', chr(195).chr(182) => 'o',
    chr(195).chr(182) => 'o', chr(195).chr(185) => 'u',
    chr(195).chr(186) => 'u', chr(195).chr(187) => 'u',
    chr(195).chr(188) => 'u', chr(195).chr(189) => 'y',
    chr(195).chr(191) => 'y',
    // Decompositions for Latin Extended-A
    chr(196).chr(128) => 'A', chr(196).chr(129) => 'a',
    chr(196).chr(130) => 'A', chr(196).chr(131) => 'a',
    chr(196).chr(132) => 'A', chr(196).chr(133) => 'a',
    chr(196).chr(134) => 'C', chr(196).chr(135) => 'c',
    chr(196).chr(136) => 'C', chr(196).chr(137) => 'c',
    chr(196).chr(138) => 'C', chr(196).chr(139) => 'c',
    chr(196).chr(140) => 'C', chr(196).chr(141) => 'c',
    chr(196).chr(142) => 'D', chr(196).chr(143) => 'd',
    chr(196).chr(144) => 'D', chr(196).chr(145) => 'd',
    chr(196).chr(146) => 'E', chr(196).chr(147) => 'e',
    chr(196).chr(148) => 'E', chr(196).chr(149) => 'e',
    chr(196).chr(150) => 'E', chr(196).chr(151) => 'e',
    chr(196).chr(152) => 'E', chr(196).chr(153) => 'e',
    chr(196).chr(154) => 'E', chr(196).chr(155) => 'e',
    chr(196).chr(156) => 'G', chr(196).chr(157) => 'g',
    chr(196).chr(158) => 'G', chr(196).chr(159) => 'g',
    chr(196).chr(160) => 'G', chr(196).chr(161) => 'g',
    chr(196).chr(162) => 'G', chr(196).chr(163) => 'g',
    chr(196).chr(164) => 'H', chr(196).chr(165) => 'h',
    chr(196).chr(166) => 'H', chr(196).chr(167) => 'h',
    chr(196).chr(168) => 'I', chr(196).chr(169) => 'i',
    chr(196).chr(170) => 'I', chr(196).chr(171) => 'i',
    chr(196).chr(172) => 'I', chr(196).chr(173) => 'i',
    chr(196).chr(174) => 'I', chr(196).chr(175) => 'i',
    chr(196).chr(176) => 'I', chr(196).chr(177) => 'i',
    chr(196).chr(178) => 'IJ',chr(196).chr(179) => 'ij',
    chr(196).chr(180) => 'J', chr(196).chr(181) => 'j',
    chr(196).chr(182) => 'K', chr(196).chr(183) => 'k',
    chr(196).chr(184) => 'k', chr(196).chr(185) => 'L',
    chr(196).chr(186) => 'l', chr(196).chr(187) => 'L',
    chr(196).chr(188) => 'l', chr(196).chr(189) => 'L',
    chr(196).chr(190) => 'l', chr(196).chr(191) => 'L',
    chr(197).chr(128) => 'l', chr(197).chr(129) => 'L',
    chr(197).chr(130) => 'l', chr(197).chr(131) => 'N',
    chr(197).chr(132) => 'n', chr(197).chr(133) => 'N',
    chr(197).chr(134) => 'n', chr(197).chr(135) => 'N',
    chr(197).chr(136) => 'n', chr(197).chr(137) => 'N',
    chr(197).chr(138) => 'n', chr(197).chr(139) => 'N',
    chr(197).chr(140) => 'O', chr(197).chr(141) => 'o',
    chr(197).chr(142) => 'O', chr(197).chr(143) => 'o',
    chr(197).chr(144) => 'O', chr(197).chr(145) => 'o',
    chr(197).chr(146) => 'OE',chr(197).chr(147) => 'oe',
    chr(197).chr(148) => 'R',chr(197).chr(149) => 'r',
    chr(197).chr(150) => 'R',chr(197).chr(151) => 'r',
    chr(197).chr(152) => 'R',chr(197).chr(153) => 'r',
    chr(197).chr(154) => 'S',chr(197).chr(155) => 's',
    chr(197).chr(156) => 'S',chr(197).chr(157) => 's',
    chr(197).chr(158) => 'S',chr(197).chr(159) => 's',
    chr(197).chr(160) => 'S', chr(197).chr(161) => 's',
    chr(197).chr(162) => 'T', chr(197).chr(163) => 't',
    chr(197).chr(164) => 'T', chr(197).chr(165) => 't',
    chr(197).chr(166) => 'T', chr(197).chr(167) => 't',
    chr(197).chr(168) => 'U', chr(197).chr(169) => 'u',
    chr(197).chr(170) => 'U', chr(197).chr(171) => 'u',
    chr(197).chr(172) => 'U', chr(197).chr(173) => 'u',
    chr(197).chr(174) => 'U', chr(197).chr(175) => 'u',
    chr(197).chr(176) => 'U', chr(197).chr(177) => 'u',
    chr(197).chr(178) => 'U', chr(197).chr(179) => 'u',
    chr(197).chr(180) => 'W', chr(197).chr(181) => 'w',
    chr(197).chr(182) => 'Y', chr(197).chr(183) => 'y',
    chr(197).chr(184) => 'Y', chr(197).chr(185) => 'Z',
    chr(197).chr(186) => 'z', chr(197).chr(187) => 'Z',
    chr(197).chr(188) => 'z', chr(197).chr(189) => 'Z',
    chr(197).chr(190) => 'z', chr(197).chr(191) => 's'
    );

    $string = strtr($string, $chars);

    return $string;
}
	
	function transformString($string)
	{
		$string = utf8_encode($string);
		$string = str_replace("&","",$string);
		$string = str_replace("/","",$string);
		$string = str_replace('\\',"",$string);
		$string = str_replace(',','',$string);
		$string = str_replace(':','',$string);
		$string = str_replace('@','',$string);
		$string = str_replace('[','',$string);
		$string = str_replace(']','',$string);
		$string = str_replace('!','',$string);
		$string = str_replace('€','',$string);
		$string = str_replace('#','',$string);
		$string = str_replace('%','',$string);
		$string = str_replace('{','',$string);
		$string = str_replace('}','',$string);
		$string = str_replace('<','',$string);
		$string = str_replace('>','',$string);
		$string = str_replace('*','',$string);
		$string = str_replace('?','',$string);
		$string = str_replace('$','',$string);
		$string = str_replace('!','',$string);
		$string = str_replace("'",'',$string);
		$string = str_replace('"','',$string);
		$string = str_replace('+','',$string);
		$string = str_replace('|','',$string);
		$string = str_replace('=','',$string);
		$string = str_replace('`','',$string);
		$string = str_replace(" - ","-",$string);
		$string = str_replace(".","",$string);
		$string = str_replace("(","",$string);
		$string = str_replace(")","",$string);
		$string = str_replace(" ","-",$string);
		$string = str_replace("--","-",$string);
		$string = remove_accents($string);
		$string = remove_accents($string);
		$string = strtolower($string);
		return $string;		
	}

function getLastId($table)
{
	$SQL = "SELECT id FROM $table ORDER BY id DESC LIMIT 1";
	$reponse = mysql_query($SQL);
	$req = mysql_fetch_array($reponse);
	return $req['id']+1;
}

function getLastId2($table,$id)
{
	$SQL = "SELECT $id FROM $table ORDER BY $id DESC LIMIT 1";
	$reponse = mysql_query($SQL);
	$req = mysql_fetch_array($reponse);
	return $req[$id]+1;
}

function getArtistName($idartist)
{
	$SQL = "SELECT * FROM oo_10_posts WHERE ID = $idartist";
	$reponse = mysql_query($SQL);
	$req = mysql_fetch_array($reponse);
	return $req['post_title'];
}

function getAlbumName($idalbum)
{
	$SQL = "SELECT * FROM oo_10_posts WHERE ID = $idalbum";
	$reponse = mysql_query($SQL);
	$req = mysql_fetch_array($reponse);
	return $req['post_title'];
}

function getCoverAlbum($idalbum)
{
	$SQL = "SELECT COUNT(*) FROM oo_10_postmeta WHERE meta_key = '_thumbnail_url' AND post_id = $idalbum";
	$reponse = mysql_query($SQL);
	$req = mysql_fetch_array($reponse);
	
	if($req[0] != 0)
	{
		// Il y'a un thumbnail url
		$SQL = "SELECT * FROM oo_10_postmeta WHERE meta_key = '_thumbnail_url' AND post_id = $idalbum";
		$reponse = mysql_query($SQL);
		$req = mysql_fetch_array($reponse);
		$thumbnail = $req['meta_value'];
		return $thumbnail;
	}
	else
	{

		$SQL = "SELECT * FROM oo_10_postmeta WHERE meta_key = '_thumbnail_id' AND post_id = $idalbum";
		$reponse = mysql_query($SQL);
		$req = mysql_fetch_array($reponse);
		$thumbnail_id = $req['meta_value'];
		
		$SQL = "SELECT * FROM oo_10_postmeta WHERE meta_key = '_wp_attached_file' AND post_id = $thumbnail_id";
		$reponse = mysql_query($SQL);
		$req = mysql_fetch_array($reponse);
		$thumbnail = $req['meta_value'];
		
		if(file_exists("../wp-content/uploads/sites/10/".$thumbnail))
		{
			return "http://music.oolatina.com/wp-content/uploads/sites/10/".$thumbnail;
		}
		else
		{
			return $thumbnail;
		}
	
	}
}

function getNameTerm($idterm)
{
	$SQL = "SELECT * FROM oo_2_terms WHERE term_id = $idterm";
	$reponse = mysql_query($SQL);
	while($req = mysql_fetch_array($reponse))
	{
		return $req['name'];
	}
}

function getCategorieid($name)
{
	$SQL = "SELECT * FROM eventWebAPICategorie WHERE name = '$name'";
	$reponse = mysql_query($SQL);
	$req = mysql_fetch_array($reponse);
	return $req['id'];
}

function isEventCategorieArray($eventId,$catArray)
{
	for($x=0;$x<count($catArray);$x++)
	{
		$id = $catArray[$x];
		$SQL = "SELECT COUNT(*) FROM eventWebAPIRelation WHERE idevent = $eventId AND idcategorie = $id";
		$reponse = mysql_query($SQL);
		$req = mysql_fetch_array($reponse);
		
		if($req[0] != 0)
		{
			return true;
		}
	}
	
	return false;
}

if(isset($_REQUEST['command']))
{
	$command = $_REQUEST['command'];
	
	// Recuperation de toute les categorie
	if($command == 'GET_ALL_VIDEO_CATEGORIE')
	{
		$site = $_REQUEST['site'];
		$array = getAllVideoCategory($site);
		echo json_encode($array);
	}
	
	if($command == 'UPDATE_EVENT_RELATION_CATEGORIE')
	{
		// On Clean avant d'update
		$SQL = "DELETE FROM eventWebAPIRelation";
		mysql_query($SQL);
		
		$SQL = "SELECT * FROM eventWebAPI";
		$reponse = mysql_query($SQL);
		while($req = mysql_fetch_array($reponse))
		{
			$id = $req['id'];
			$eventid = $req['eventid'];
			$SQL = "SELECT * FROM oo_2_term_relationships WHERE object_id = $eventid";
			$r = mysql_query($SQL);
			while($rReq = mysql_fetch_array($r))
			{
				$taxonomy_id = $rReq['term_taxonomy_id'];
				$name = getNameTerm($taxonomy_id);
				$name = str_replace("'","''",$name);
				
				// Get id cat
				$idCategorie = getCategorieid($name);
				$SQL = "INSERT INTO eventWebAPIRelation VALUES ('',$id,$idCategorie)";
				mysql_query($SQL);
			}
		}
	}
	
	if($command == 'UPDATE_EVENT_CATEGORIE')
	{
		$SQL = "SELECT * FROM eventWebAPI";
		$reponse = mysql_query($SQL);
		while($req = mysql_fetch_array($reponse))
		{
			$eventid = $req['eventid'];
			$SQL = "SELECT * FROM oo_2_term_relationships WHERE object_id = $eventid";
			$r = mysql_query($SQL);
			while($rReq = mysql_fetch_array($r))
			{
				$taxonomy_id = $rReq['term_taxonomy_id'];
				$name = getNameTerm($taxonomy_id);
				$name = str_replace("'","''",$name);
				
				// On check s'il existe pas
				$SQL = "SELECT COUNT(*) FROM eventWebAPICategorie WHERE name = '$name'";
				$ur = mysql_query($SQL);
				$uur = mysql_fetch_array($ur);
				
				if($uur[0] == 0)
				{				
					$SQL = "INSERT INTO eventWebAPICategorie VALUES ('','$name')";
					mysql_query($SQL);
				}
			}
		}
	}
	
	if($command == 'UPDATE_EVENT')
	{
		$SQL = "DELETE FROM eventWebAPI";
		mysql_query($SQL);
	
		$data = file_get_contents("http://www.oolatina.com/WS/event/jsonCache.json");
		//$data = file_get_contents("http://www.oolatina.com/WS/event/wsevent-fr.php");
		//echo $data;
		//exit;
		$data = json_decode($data);
		for($x=0;$x<count($data);$x++)
		{
			$event = $data[$x];
			$eventAdress = $event->eventAdresse;
			
			$date = $event->eventStartDate;
			$date = explode(" ",$date);
			$date = $date[0];
			
			$date = explode("-",$date);
			$annee = $date[0];
			$mois = $date[1];
			$jour = $date[2];
			
			$eventId = $event->eventId;
			$title = $event->eventTitle;
			$photo = $event->eventPhoto;
			
			// Adresse
			$longitude = $eventAdress->_VenueLng;
			$latitude = $eventAdress->_VenueLat;
			$telephone = $eventAdress->_VenuePhone;
			$country = $eventAdress->_VenueCountry;
			$lieu = $eventAdress->_VenueVenue;
			$adresse = $eventAdress->_VenueAddress;
			$ville = $eventAdress->_VenueCity;
			$ville = strtolower($ville);
			$codepostal = $eventAdress->_VenueZip;
			
			$SQL = "INSERT INTO eventWebAPI VALUES ('',$eventId,'$title','$photo','$lieu','$adresse','$ville','$codepostal','$longitude','$latitude','$jour','$mois','$annee','$annee-$mois-$jour')";
			echo $SQL."<br>";
			mysql_query($SQL);
		}
	}
	
	if($command == 'GET_ARRAY_DROPDOWN')
	{
		$i = 0;
		$genre = $_REQUEST['genre'];
		$SQL = "SELECT * FROM eventWebAPICategorie WHERE genre = '$genre'";
		$reponse = mysql_query($SQL);
		while($req = mysql_fetch_array($reponse))
		{
			$array[$i]['id'] = $req['id'];
			$array[$i]['name'] = utf8_encode($req['name']);
			$i++;
		}
		
		echo json_encode($array);
		exit;
	}
	
	// Recupération de toute les villes
	if($command == 'GET_ARRAY_VILLE')
	{
		$i = 0;
		$genre = $_REQUEST['genre'];
		$SQL = "SELECT DISTINCT(ville) FROM `eventWebAPI` ORDER BY ville ASC";
		$reponse = mysql_query($SQL);
		while($req = mysql_fetch_array($reponse))
		{
			$ville = $req[0];
			$ville = strtolower($ville);
			if($ville != '')
			{
				$array[$i]['name'] = ucwords($ville);
				$i++;
			}
		}
		
		echo json_encode($array);
		exit;
	}
	
	if($command == 'GET_EVENT')
	{
		$search = $_REQUEST['search'];
		$day = $_REQUEST['day'];
		$month = $_REQUEST['month'];
		$year = $_REQUEST['year'];
		$ville = $_REQUEST['ville'];
		$music = $_REQUEST['music'];
		if($music != '')
		{
			if(count($music) != 0)
			{
				$music = explode(",",$music);
			}
			else
			{
				$music[0] = $music;
			}
		}
		$ville = strtolower($ville);
		$genre = $_REQUEST['genre'];
		if($genre != '')
		{
			if(count($genre) != 0)
			{
				$genre = explode(",",$genre);
			}
			else
			{
				$genre[0] = $genre;
			}
		}
		
		if($day != '')
		{
			$dayReq = " AND day = '$day'";
		}
		
		if($year == '')
		{
			$year = '2014';
		}
		
		if($ville != '')
		{
			$villeReq = " AND ville = '$ville'";
		}
		
		if($month != '')
		{
			$monthReq = " AND month = '$month'";
		}
		
		// Search
		if($search != '')
		{
			$searchReq = " AND title like '%$search%'";
		}
		
		$i = 0;
		
		if($dayReq == '')
		{
			$day = date('d');
			$dDay = '';
			for($x = $day;$x<32;$x++)
			{
				if($x == 31)
				{
					$dDay .= "'$x'";
				}
				else
				{
					$dDay .= "'$x',";
				}
			}
			
			$SQL = "SELECT * FROM eventWebAPI WHERE year = '$year' $monthReq $searchReq $villeReq AND day IN ($dDay) ORDER BY date ASC";
		}
		else
		{
			$SQL = "SELECT * FROM eventWebAPI WHERE year = '$year' $dayReq $monthReq $searchReq $villeReq ORDER BY date ASC";
		}
		
		$reponse = mysql_query($SQL);
		while($req = mysql_fetch_array($reponse))
		{			
			$idEvent = $req['id'];
			if($music != '')
			{
				if(isEventCategorieArray($idEvent,$music))
				{
					if($genre != '')
					{
						if(isEventCategorieArray($idEvent,$genre))
						{
							$event['day'] = $req['day'];
							$event['month'] = $req['month'];
							$event['year'] = $req['year'];
							$event['title'] = $req['title'];
							$event['thumbnail'] = $req['thumbnail'];
							$event['lieu'] = $req['lieu'];
							$event['adresse'] = $req['adresse'];
							$event['ville'] = $req['ville'];
							$event['codepostal'] = $req['codepostal'];
							$event['longitude'] = $req['longitude'];
							$event['latitude'] = $req['latitude'];
							
							$array[$i]['event'] = $event;
							$i++;
						}
					}
					else
					{
						$event['day'] = $req['day'];
						$event['month'] = $req['month'];
						$event['year'] = $req['year'];
						$event['title'] = $req['title'];
						$event['thumbnail'] = $req['thumbnail'];
						$event['lieu'] = $req['lieu'];
						$event['adresse'] = $req['adresse'];
						$event['ville'] = $req['ville'];
						$event['codepostal'] = $req['codepostal'];
						$event['longitude'] = $req['longitude'];
						$event['latitude'] = $req['latitude'];
						
						$array[$i]['event'] = $event;
						$i++;
					}
				}				
			}
			else if($genre != '')
			{
				if(isEventCategorieArray($idEvent,$genre))
				{
					$event['day'] = $req['day'];
					$event['month'] = $req['month'];
					$event['year'] = $req['year'];
					$event['title'] = $req['title'];
					$event['thumbnail'] = $req['thumbnail'];
					$event['lieu'] = $req['lieu'];
					$event['adresse'] = $req['adresse'];
					$event['ville'] = $req['ville'];
					$event['codepostal'] = $req['codepostal'];
					$event['longitude'] = $req['longitude'];
					$event['latitude'] = $req['latitude'];
					
					$array[$i]['event'] = $event;
					$i++;
				}
			}
			else
			{
				$event['day'] = $req['day'];
				$event['month'] = $req['month'];
				$event['year'] = $req['year'];
				$event['title'] = $req['title'];
				$event['thumbnail'] = $req['thumbnail'];
				$event['lieu'] = $req['lieu'];
				$event['adresse'] = $req['adresse'];
				$event['ville'] = $req['ville'];
				$event['codepostal'] = $req['codepostal'];
				$event['longitude'] = $req['longitude'];
				$event['latitude'] = $req['latitude'];
				
				$array[$i]['event'] = $event;
				$i++;
			}
		}

		echo json_encode($array);
		exit;
	}
	
	// Recupere tous les video d'une categorie
	if($command == 'GET_VIDEO_CATEGORIE')
	{
		$idcategory = $_REQUEST['idcategory'];
		$slugactive = $_REQUEST['slugactive'];
			
		$i = 0;
		if(isset($_REQUEST['site']))
		{
			$site = $_REQUEST['site'];
			$SQL = "SELECT * FROM ".$site."_term_relationships WHERE term_taxonomy_id = $idcategory";
		}
		else
		{
			$SQL = "SELECT * FROM oo_11_term_relationships WHERE term_taxonomy_id = $idcategory";
		}
		$reponse = mysql_query($SQL);
		while($req = mysql_fetch_array($reponse))
		{
			$array[$i] = $req['object_id'];
			$i++;
		}
		
		$i = 0;
		for($x=0;$x<count($array);$x++)
		{
			$id = $array[$x];
			if(isset($_REQUEST['site']))
			{
				$site = $_REQUEST['site'];
				$SQL = "SELECT COUNT(*) FROM ".$site."_posts WHERE ID = $id AND post_status = 'publish'";
			}
			else
			{
				$SQL = "SELECT COUNT(*) FROM oo_11_posts WHERE ID = $id AND post_status = 'publish'";
			}
			$reponse = mysql_query($SQL);
			$req = mysql_fetch_array($reponse);
			
			if($req[0] != 0)
			{
				if(isset($_REQUEST['site']))
				{
					$site = $_REQUEST['site'];
					$SQL = "SELECT * FROM ".$site."_posts WHERE ID = $id AND post_status = 'publish'";
				}
				else
				{
					$SQL = "SELECT * FROM oo_11_posts WHERE ID = $id AND post_status = 'publish'";
				}
				$reponse = mysql_query($SQL);
				$req = mysql_fetch_array($reponse);
				$title = $req['post_title'];
				$slug = $req['post_name'];
				$title = utf8_encode($title);
				if(isset($_REQUEST['site']))
				{
					$site = $_REQUEST['site'];
					$number = str_replace("oo_","",$site);
					$thumbnail = "http://video.oolatina.com/wp-content/uploads/sites/".$number."/".$req['post_name'].".jpg";
				}
				else
				{
					$thumbnail = "http://video.oolatina.com/wp-content/uploads/sites/11/".$req['post_name'].".jpg";
				}
				// Url youtube
				if(isset($_REQUEST['site']))
				{
					$site = $_REQUEST['site'];
					$SQL = "SELECT * FROM ".$site."_postmeta WHERE post_id = $id AND meta_key = '_tern_wp_youtube_video'";
				}
				else
				{
					$SQL = "SELECT * FROM oo_11_postmeta WHERE post_id = $id AND meta_key = '_tern_wp_youtube_video'";
				}
				$r = mysql_query($SQL);
				$rReq = mysql_fetch_array($r);
				
				if($title != '')
				{
					$narray[$i]['title'] = $title;
					$narray[$i]['thumbnail'] = $thumbnail;
					$narray[$i]['youtube'] = $rReq['meta_value'];
					if($slugactive == "1")
					{
						$narray[$i]['url'] = $slug;
					}
					$i++;
				}
			}
		}
		//print_r($narray);
		echo json_encode($narray);
		exit;
	}
	
	// Recupere tous les artistes
	if($command == 'GET_ALL_ARTIST_AUDIO')
	{
		$SQL = "SELECT * FROM oo_10_posts WHERE post_status = 'publish' AND post_type = 'POST'";
		$reponse = mysql_query($SQL);
		$i = 0;
		while($req = mysql_fetch_array($reponse))
		{
			$artistId = $req['ID'];
			$array[$i]['artistname'] = utf8_encode($req['post_title']);
			$array[$i]['artistid'] = $artistId;
			
			$SQL = "SELECT * FROM oo_10_postmeta WHERE post_id = $artistId AND meta_key = '_thumbnail_url'";
			$mReponse = mysql_query($SQL);
			$mreq = mysql_fetch_array($mReponse);
			
			$thumbnail = $mreq['meta_value'];
			if($thumbnail)
			{
				// Pour le moment adapté à l'iphone uniquement à voir par la suite
				$thumbnail = str_replace("199","320",$thumbnail);
				$thumbnail = str_replace("113","240",$thumbnail);
			
				$array[$i]['image'] = $thumbnail;
			}
			else
			{
				$array[$i]['image'] = "http://music.oolatina.com/wp-content/uploads/sites/10/no_cover_hd.png";
			}
			
			/*if(file_exists("../wp-content/uploads/sites/10/".$req['post_name'].".jpg"))
			{
				$array[$i]['image'] = "http://music.oolatina.com/wp-content/uploads/sites/10/".$req['post_name'].".jpg";
			}
			else
			{
				$array[$i]['image'] = "http://music.oolatina.com/wp-content/uploads/sites/10/no_cover_hd.png";
			}*/			
			$i++;
		}
		
		echo json_encode($array);
		exit;
	}
	
	// Methode pour ajouter une musique
	if($command == 'ADD_SONG')
	{
		$idartist = $_REQUEST['artist_id'];
		$idalbum = $_REQUEST['album_id'];
		$title = $_REQUEST['title'];
		$title = utf8_decode($title);
		$title = str_replace("'","''",$title);
		$mp3path = $_REQUEST['mp3path'];
		$timing = $_REQUEST['timing'];
		$artist_name = $_REQUEST['artist_name'];
		$artist_album = $_REQUEST['artist_album'];
		$track_number = $_REQUEST['track_number'];
		$itunes = $_REQUEST['itunes'];
		
		$id = getLastId("oo_10_posts");
		$date = date('Y-m-d h:i:s');
		$slug = transformString($title);
		
		$array['length_formatted'] = $timing;
		$array['track_number'] = $track_number;
		
		$SQL = "INSERT INTO oo_10_posts VALUES ($id,'1','$date','$date','','$title','','inherit','open','open','','$slug','','','$date','$date','','0','$mp3path','0','attachment','audio/mpeg','0')";
		mysql_query($SQL) or die("Error");
		
		$data = serialize($array);
		
		$SQL = "INSERT INTO oo_10_postmeta VALUES ('','$id','_wp_attached_file','$mp3path')";
		mysql_query($SQL);
		$SQL = "INSERT INTO oo_10_postmeta VALUES ('','$id','_wp_attachment_metadata','$data')";
		mysql_query($SQL);
		$SQL = "INSERT INTO oo_10_postmeta VALUES ('','$id','_artist_id','$idartist')";
		mysql_query($SQL);
		
		if($itunes)
		{
			$SQL = "INSERT INTO oo_10_postmeta VALUES ('','$id','_itunes_url','$itunes')";
			mysql_query($SQL);
		}
		
		$SQL = "INSERT INTO oo_10_postmeta VALUES ('','$id','_album_id','$idalbum')";
		mysql_query($SQL);
		
		echo $id;
	}
	
	// Methode supprimer deprecated
	/*if($command == 'CLEAN_ALL_PISTE')
	{
		$i = 0;
		$SQL = "SELECT * FROM oo_10_posts WHERE post_mime_type = 'audio/mpeg'";
		$reponse = mysql_query($SQL);
		while($req = mysql_fetch_array($reponse))
		{		
			$id = $req['ID'];
			$array[$i] = $id;
			$i++;
		
			$SQL = "DELETE FROM oo_10_postmeta WHERE post_id = $id";
			mysql_query($SQL);
		}
		
		for($x=0;$x<count($array);$x++)
		{
			$SQL = "DELETE FROM oo_10_posts WHERE ID = ".$array[$x];
			mysql_query($SQL);
		}
	}*/
	
	// Check si la musique existe
	if($command == 'SONG_EXIST')
	{
		$mp3path = $_REQUEST['mp3path'];
		
		$SQL = "SELECT COUNT(*) FROM oo_10_postmeta WHERE meta_key = '_wp_attached_file' AND meta_value = '$mp3path'";
		$reponse = mysql_query($SQL);
		$req = mysql_fetch_array($reponse);
		
		if($req[0] == 0)
		{
			$array['result'] = "0";
		}
		else
		{
			$SQL = "SELECT * FROM oo_10_postmeta WHERE meta_key = '_wp_attached_file' AND meta_value = '$mp3path'";
			$reponse = mysql_query($SQL);
			$req = mysql_fetch_array($reponse);
			
			$array['result'] = "1";
			$array['idsong'] = $req['post_id'];
		}
		
		echo json_encode($array);
	}
	
	// Check si l'album existe
	if($command == 'ALBUM_EXIST')
	{
		$album_title = $_REQUEST['title'];
		$artist_id = $_REQUEST['artistid'];
		
		$SQL = "SELECT COUNT(*) FROM oo_10_posts WHERE post_title = '$album_title' AND post_type = 'albumpost' AND post_status = 'publish'";
		$reponse = mysql_query($SQL);
		$req = mysql_fetch_array($reponse);
		
		if($req[0] == 0)
		{
			$array['result'] = "0";
		}
		else
		{
			$SQL = "SELECT * FROM oo_10_posts WHERE post_title = '$album_title' AND post_type = 'albumpost' AND post_status = 'publish'";
			$reponse = mysql_query($SQL);
			$req = mysql_fetch_array($reponse);
			$idalbum = $req['ID'];
			$array['result'] = "1";
			$array['albumid'] = $idalbum;
		}
		
		echo json_encode($array);
		exit;
	}

	// Ajout d'un album
	if($command == 'ADD_ALBUM_AUDIO')
	{
		$id = getLastId("oo_10_posts");
		$album_title = $_REQUEST['album_title'];
		$artist_id = $_REQUEST['artist_id'];
		$thumbnail = $_REQUEST['thumbnail'];
		$year = $_REQUEST['year'];
		$itunes = $_REQUEST['itunes'];
		$date = date('Y-m-d h:i:s');
		$slug = transformString($album_title);
		$SQL = "INSERT INTO oo_10_posts VALUES ($id,'2','$date','$date','','$album_title','','publish','open','open','','$slug','','','$date','$date','','0','http://music.oolatina.com/?albumpost=$slug','0','albumpost','','0')";
		mysql_query($SQL) or die("Error");
		
		$SQL = "INSERT INTO oo_10_postmeta VALUES ('','$id','post_views_count','0')";
		mysql_query($SQL);
		
		// Add Custom thumbnail
		$idThumbnail = getLastId2("oo_10_postmeta","post_id");
		$idThumbnail = $idThumbnail+120000;

		$SQL = "INSERT INTO oo_10_postmeta VALUES ('','$id','_year','$year')";
		mysql_query($SQL);
		$SQL = "INSERT INTO oo_10_postmeta VALUES ('','$id','_artist_id','$artist_id')";
		mysql_query($SQL);
		$SQL = "INSERT INTO oo_10_postmeta VALUES ('','$id','_itunes_url','$itunes')";
		mysql_query($SQL);
		$SQL = "INSERT INTO oo_10_postmeta VALUES ('','$id','_thumbnail_url','".$thumbnail."')";
		mysql_query($SQL);
		
		echo $id;
		exit;
	}
	
	if($command == 'ARTIST_EXIST')
	{
		$name_artist = $_REQUEST['name_artist'];
		$SQL = "SELECT COUNT(*) FROM oo_10_posts WHERE post_title = '$name_artist' AND post_status = 'publish' AND post_author = 1 AND post_type = 'post'";
		$reponse = mysql_query($SQL);
		$req = mysql_fetch_array($reponse);
		if($req[0] == 0)
		{
			$array['result'] = "0";
			echo json_encode($array);
		}
		else
		{
			$SQL = "SELECT * FROM oo_10_posts WHERE post_title = '$name_artist' AND post_status = 'publish' AND post_author = 1 AND post_type = 'post'";
			$reponse = mysql_query($SQL);
			$req = mysql_fetch_array($reponse);
			$idartist = $req['ID'];
			$array['result'] = "1";
			$array['idartist'] = $idartist;
			echo json_encode($array);
		}
	}
	
	if($command == 'ADD_ARTIST_AUDIO')
	{
		$name_artist = $_REQUEST['name_artist'];
		$name_artist = str_replace("'","''",$name_artist);
		$thumbnailartist = $_REQUEST['thumbnail'];
		$SQL = "SELECT COUNT(*) FROM oo_10_posts WHERE post_title = '$name_artist' AND post_status = 'publish'";
		$reponse = mysql_query($SQL);
		$req = mysql_fetch_array($reponse);
		
		if($req[0] == 0)
		{
			$date = date('Y-m-d h:i:s');
			$slug = transformString($name_artist);
			$id = getLastId("oo_10_posts");
			$SQL = "INSERT INTO oo_10_posts VALUES ($id,'1','$date','$date','','$name_artist','','publish','open','open','','$slug','','','$date','$date','','0','http://music.oolatina.com/?p=$id','0','post','','0')";
			echo $id;
			mysql_query($SQL);
			
			$SQL = "INSERT INTO oo_10_postmeta VALUES ('','$id','_ajax_fetch_list_nonce','5d585200545206555d5304535354')";
			mysql_query($SQL);		
			$SQL = "INSERT INTO oo_10_postmeta VALUES ('','$id','_ajax_nonce','03560405030400515a0806595400')";
			mysql_query($SQL);
			$SQL = "INSERT INTO oo_10_postmeta VALUES ('','$id','_ajax_nonce-add-meta','03555450565102040e025d500351')";
			mysql_query($SQL);
			$SQL = "INSERT INTO oo_10_postmeta VALUES ('','$id','_sfoolm_meta_nonce','00505c56010404535f0601595001')";
			mysql_query($SQL);
			$SQL = "INSERT INTO oo_10_postmeta VALUES ('','$id','_wp_original_http_referer','http://music.oolatina.com/wp-admin/edit.php')";
			mysql_query($SQL);
			$SQL = "INSERT INTO oo_10_postmeta VALUES ('','$id','post_category','a:2:{i:0;s:1:\"0\";i:1;s:2:\"9\";}')";
			mysql_query($SQL);
			$SQL = "INSERT INTO oo_10_postmeta VALUES ('','$id','_ajax_nonce-add-category','515757065b075003000351590352')";
			mysql_query($SQL);
			$SQL = "INSERT INTO oo_10_postmeta VALUES ('','$id','tax_input','a:1:{s:8:\"post_tag\";s:0:\"\";}')";
			mysql_query($SQL);
			$SQL = "INSERT INTO oo_10_postmeta VALUES ('','$id','newtag','a:1:{s:8:\"post_tag\";s:0:\"\";}')";
			mysql_query($SQL);
			$SQL = "INSERT INTO oo_10_postmeta VALUES ('','$id','_ajax_nonce-add-acn_models','121330cf5b')";
			mysql_query($SQL);
			$SQL = "INSERT INTO oo_10_postmeta VALUES ('','$id','gallImg','a:1:{i:1;s:0:\"\";}')";
			mysql_query($SQL);
			$SQL = "INSERT INTO oo_10_postmeta VALUES ('','$id','_edit_lock','1394996878:1')";
			mysql_query($SQL);
			$SQL = "INSERT INTO oo_10_postmeta VALUES ('','$id','_edit_last','1')";
			mysql_query($SQL);
			$SQL = "INSERT INTO oo_10_postmeta VALUES ('','$id','socialGalleryDisabled','0')";
			mysql_query($SQL);
			$SQL = "INSERT INTO oo_10_postmeta VALUES ('','$id','_wpnonce','51590706500404530a0701075156')";
			mysql_query($SQL);
			$SQL = "INSERT INTO oo_10_postmeta VALUES ('','$id','meta','')";
			mysql_query($SQL);

			
			$SQL = "INSERT INTO oo_10_postmeta VALUES ('','$id','_thumbnail_url','$thumbnailartist')";
			mysql_query($SQL);
			//$SQL = "INSERT INTO oo_10_postmeta VALUES ('','$id','_thumbnail_id','$idThumbnail')";
			//mysql_query($SQL);
			$SQL = "INSERT INTO oo_10_postmeta VALUES ('','$id','post_showblog_id','')";
			mysql_query($SQL);
			$SQL = "INSERT INTO oo_10_postmeta VALUES ('','$id','dynamicMetaShowBlog_noncename','5c07565a56570b525d0401550302')";
			mysql_query($SQL);
			$SQL = "INSERT INTO oo_10_postmeta VALUES ('','$id','post_views_count','5')";
			mysql_query($SQL);
		}
		else
		{
			$SQL = "SELECT * FROM oo_10_posts WHERE post_title = '$name_artist' AND post_status = 'publish'";
			$reponse = mysql_query($SQL);
			$req = mysql_fetch_array($reponse);
			echo $req['ID'];
			exit;
		}
	}
	
	if($command == 'GET_ALL_ALBUM_ARTIST')
	{
		// On fait une array de tous les albums
		$idartist = $_REQUEST['idartist'];
				
		$i = 0;
		$SQL = "SELECT * FROM oo_10_posts WHERE post_type = 'albumpost'";
		$reponse = mysql_query($SQL);
		while($req = mysql_fetch_array($reponse))
		{
			$array[$i] = $req['ID'];
			$i++;
		}
		
		$i = 0;
		for($x=0;$x<count($array);$x++)
		{
			$idPost = $array[$x];
			$SQL = "SELECT COUNT(*) FROM oo_10_postmeta WHERE meta_key = '_artist_id' AND meta_value = '$idartist' AND post_id = $idPost";
			$r = mysql_query($SQL);
			$mReq = mysql_fetch_array($r);
			if($mReq[0] != 0)
			{
				// L'artiste est dedans donc cette id est un album de l'artist
				$narray[$i] = $idPost;
				$i++;
			}
		}
		
		// Maintenant que l'ont à tous les post_id de chaque album on va chercher les info
		$i = 0;
		for($x=0;$x<count($narray);$x++)
		{
			$idpost = $narray[$x];
			$SQL = "SELECT * FROM oo_10_posts WHERE ID = $idpost";
			$reponse = mysql_query($SQL);
			$req = mysql_fetch_array($reponse);
			
			$thumb = getCoverAlbum($idpost);
			$thumb = explode("/",$thumb);
			$thumbid = $thumb[count($thumb)-1];
			$thumbid = str_replace(".jpg","",$thumbid);
			
			$url_thumb = "http://webradio.oolatina.com/getCover.php?id=$thumbid&action=CROP_RATIO&type=ALBUM&width=320&height=240";
			
			$arrayAlbum[$i]['title'] = utf8_encode($req['post_title']);
			//$arrayAlbum[$i]['cover'] = getCoverAlbum($idpost);
			$arrayAlbum[$i]['cover'] = $url_thumb;
			$arrayAlbum[$i]['idalbum'] = $idpost;
			$i++;
		}
		
	    echo json_encode($arrayAlbum);		
		exit;
	}
	
	if($command == 'GET_ALL_MUSIC_ALBUM')
	{
		$idalbum = $_REQUEST['idalbum'];
		$i = 0;
		
		// Recuperation du titre de l'artiste
		$SQL = "SELECT * FROM oo_10_postmeta WHERE meta_key = '_artist_id' AND post_id = $idalbum";
		$reponse = mysql_query($SQL);
		$req = mysql_fetch_array($reponse);
		$idartist = $req['meta_value'];
		$artistname = getArtistName($idartist);
		$albumname = getAlbumName($idalbum);
		$coveralbum = getCoverAlbum($idalbum);
		
		$thumb = getCoverAlbum($idalbum);
		$thumb = explode("/",$thumb);
		$thumbid = $thumb[count($thumb)-1];
		$thumbid = str_replace(".jpg","",$thumbid);
			
		$url_thumb = "http://webradio.oolatina.com/getCover.php?id=$thumbid&action=CROP_RATIO&type=ALBUM&width=320&height=320";
		
		$SQL = "SELECT * FROM oo_10_postmeta WHERE meta_key = '_album_id' AND meta_value = '$idalbum'";
		$reponse = mysql_query($SQL);
		while($req = mysql_fetch_array($reponse))
		{
			$array[$i] = $req['post_id'];
			$i++;
		}
		
		// Recuperation de chaque musique
		for($x=0;$x<count($array);$x++)
		{
			$SQL = "SELECT * FROM oo_10_posts WHERE ID = ".$array[$x]." AND post_status = 'inherit'";
			$reponse = mysql_query($SQL);
			$req = mysql_fetch_array($reponse);
			
			$postid = $req['ID'];
			
			$SQL = "SELECT * FROM oo_10_postmeta WHERE post_id = ".$array[$x]." AND meta_key = '_wp_attachment_metadata'";
			$r = mysql_query($SQL);
			$rreq = mysql_fetch_array($r);
			$meta_data = $rreq['meta_value'];
			$meta_data = unserialize($meta_data);
			
			$length = $meta_data['length_formatted'];
			$track_number = $meta_data['track_number'];
			
			$larray[$x]['track_number'] = $track_number;
			$larray[$x]['title'] = utf8_encode($req['post_title']);
			$larray[$x]['audio'] = $req['guid'];
			$larray[$x]['artistname'] = utf8_encode($artistname);
			$larray[$x]['albumname'] = utf8_encode($albumname);
			$larray[$x]['coveralbum'] = $url_thumb;
			
			/*$narray[$x]['title'] = "$track_number - ".utf8_encode($req['post_title']);
			$narray[$x]['audio'] = $req['guid'];
			$narray[$x]['artistname'] = utf8_encode($artistname);
			$narray[$x]['albumname'] = utf8_encode($albumname);
			$narray[$x]['coveralbum'] = $url_thumb;*/
		}
		
		sort($larray);
		for($x=0;$x<count($larray);$x++)
		{
			$narray[$x]['title'] = $larray[$x]['track_number']." - ".$larray[$x]['title'];
			$narray[$x]['audio'] = $larray[$x]['audio'];
			$narray[$x]['artistname'] = $larray[$x]['artistname'];
			$narray[$x]['albumname'] = $larray[$x]['albumname'];
			$narray[$x]['coveralbum'] = $larray[$x]['coveralbum'];
		}
		
		echo json_encode($narray);
		exit;
	}
	
	if($command == 'GET_ALL_ID_VIDEO_CATEGORIE')
	{
		$i = 0;
		$site = $_REQUEST['site'];
		$SQL = "SELECT * FROM ".$site."_term_relationships WHERE term_taxonomy_id = 4";
		$reponse = mysql_query($SQL);
		while($req = mysql_fetch_array($reponse))
		{
			$postid = $req['object_id'];
			$SQL = "SELECT * FROM ".$site."_postmeta WHERE post_id = $postid AND meta_key = '_tern_wp_youtube_video'";
			$r = mysql_query($SQL);
			while($rReq = mysql_fetch_array($r))
			{
				$array[$i] = $rReq['meta_value'];
				$i++;
			}
		}
		
		echo json_encode($array);
		exit;
	}
	
	if($command == 'GET_ALL_VIDEO')
	{
		$i = 0;
		$SQL = "SELECT * FROM oo_11_posts WHERE post_status = 'publish'";
		$reponse = mysql_query($SQL);
		while($req = mysql_fetch_array($reponse))
		{
			$id = $req['ID'];
			
			if($id != '2' && $id != '3' && $id != '4' && $id != '5' && $id != '6' && $id != '184')
			{
				$title = $req['post_title'];
				if($title != '')
				{
					$attachmentid = $id+1;
					$slug = $req['post_name'];
					
					$SQL = "SELECT * FROM oo_11_postmeta WHERE post_id = $attachmentid AND meta_key = '_wp_attached_file'";
					$r = mysql_query($SQL);
					$rr = mysql_fetch_array($r);
					$filename = $rr['meta_value'];
					
					if($filename != '')
					{					
						$url = "http://video.oolatina.com/$slug/";
						$image = "http://video.oolatina.com/wp-content/uploads/sites/11/$filename";
						
						$array[$i]['id'] = $id;
						$array[$i]['title'] = $title;
						$array[$i]['slug'] = $slug;
						$array[$i]['filename'] = $filename;
						$array[$i]['urlimage'] = $image;
						$array[$i]['url'] = $url;
						$i++;
					}
				}
			}
		}
		
		echo json_encode($array);
		exit;
	}
	
	if($command == 'ADD_EVENT')
	{
		$password = $_REQUEST['password'];
		if($password == 'b81f48e9000af5d31fa2f1471fdce40c')
		{
			$pays = $_REQUEST['pays'];
			
			if($pays == 'gb')
			{
				$tableOO = "oo_35";
				$urlsite = "http://united-kingdom.oolatina.com/";
				$number = "35";
			}
			
			if($pays == 'fr')
			{
				$tableOO = "oo_2";
				$urlsite = "http://france.oolatina.com/";
				$number = "2";
			}
			
			if($pays == 'sp')
			{
				$tableOO = "oo_34";
				$urlsite = "http://espana.oolatina.com/";
				$number = "34";
			}
		
			$title = $_REQUEST['title'];
			$description = $_REQUEST['description'];
			$fbid = $_REQUEST['fbid'];
			$startdate = $_REQUEST['startdate'];
			$enddate = $_REQUEST['enddate'];
			$venuetitle = $_REQUEST['venuetitle'];
			$venuetitle = str_replace("'","''",$venuetitle);
			$venuestreet = $_REQUEST['venuestreet'];
			$venuestreet = str_replace("'","''",$venuestreet);
			$venuecity = $_REQUEST['venuecity'];
			$venuecity = str_replace("'","''",$venuecity);
			$venueprovince = $_REQUEST['venueprovince'];
			$venueprovince = str_replace("'","''",$venueprovince);
			$venuecountry = $_REQUEST['venuecountry'];
			$venuecountry = str_replace("'","''",$venuecountry);
			$venuezip = $_REQUEST['venuezip'];
			$venuelat = $_REQUEST['venuelat'];
			$venuelong = $_REQUEST['venuelong'];
			$venuefbid = $_REQUEST['venuefbid'];
			$orgaid = $_REQUEST['orgaid'];
			$orgatitle = $_REQUEST['orgatitle'];
			$orgatitle = str_replace("'","''",$orgatitle);
			$urlimage = $_REQUEST['urlimage'];
			
			$title = str_replace("*","",$title);
			$title = str_replace("?","",$title);
			
			$description = str_replace("*","",$description);
			$description = str_replace("?","",$description);
			
			//2020-08-04T18:15:00+0200
			$startdate = str_replace("T"," ",$startdate);
			$startdate = str_replace("+0000","",$startdate);
			$startdate = str_replace(" 0100","",$startdate);
			$startdate = str_replace(" 0200","",$startdate);
			$startdate = str_replace(" 0300","",$startdate);
			$startdate = str_replace(" 0400","",$startdate);
			$startdate = str_replace(" 0500","",$startdate);
			$startdate = str_replace(" 0600","",$startdate);
			$startdate = str_replace(" 0700","",$startdate);
			$startdate = str_replace(" 0800","",$startdate);
			$startdate = str_replace("+0100","",$startdate);
			$startdate = str_replace("+0200","",$startdate);
			$startdate = str_replace("+0300","",$startdate);
			$startdate = str_replace("+0400","",$startdate);
			$startdate = str_replace("+0500","",$startdate);
			$startdate = str_replace("+0600","",$startdate);
			$startdate = str_replace("+0700","",$startdate);
			$startdate = str_replace("+0800","",$startdate);
			$startdate = str_replace("-0100","",$startdate);
			$startdate = str_replace("-0200","",$startdate);
			$startdate = str_replace("-0300","",$startdate);
			$startdate = str_replace("-0400","",$startdate);
			$startdate = str_replace("-0500","",$startdate);
			$startdate = str_replace("-0600","",$startdate);
			$startdate = str_replace("-0700","",$startdate);
			$startdate = str_replace("-0800","",$startdate);
			
			$enddate = str_replace("T"," ",$enddate);
			$enddate = str_replace("+0000","",$enddate);
			$enddate = str_replace("+0100","",$enddate);
			$enddate = str_replace(" 0100","",$enddate);
			$enddate = str_replace(" 0200","",$enddate);
			$enddate = str_replace(" 0300","",$enddate);
			$enddate = str_replace(" 0400","",$enddate);
			$enddate = str_replace(" 0500","",$enddate);
			$enddate = str_replace(" 0600","",$enddate);
			$enddate = str_replace(" 0700","",$enddate);
			$enddate = str_replace(" 0800","",$enddate);
			$enddate = str_replace("+0200","",$enddate);
			$enddate = str_replace("+0300","",$enddate);
			$enddate = str_replace("+0400","",$enddate);
			$enddate = str_replace("+0500","",$enddate);
			$enddate = str_replace("+0600","",$enddate);
			$enddate = str_replace("+0700","",$enddate);
			$enddate = str_replace("+0800","",$enddate);
			$enddate = str_replace("-0100","",$enddate);
			$enddate = str_replace("-0200","",$enddate);
			$enddate = str_replace("-0300","",$enddate);
			$enddate = str_replace("-0400","",$enddate);
			$enddate = str_replace("-0500","",$enddate);
			$enddate = str_replace("-0600","",$enddate);
			$enddate = str_replace("-0700","",$enddate);
			$enddate = str_replace("-0800","",$enddate);
			
			$date = date('Y-m-d h:i:s');
			if(strlen($title) > 40)
			{
				$slug = substr($title,0,40);
				$slug = transformString($slug);
			}
			else
			{
				$slug = transformString($title);
			}
			
			if($slug[strlen($slug)-1] == '-')
			{
				$slug = substr($slug,0,strlen($slug)-1);
			}
			
			// Venue ID
			$id = getLastId($tableOO."_posts");
			$SQL = "INSERT INTO ".$tableOO."_posts VALUES ($id,1,'$date','$date','','$titleVenue','','publish','open','open','','','','','$date','$date','',0,'$urlsite?post_type=tribe_venue&p=$id',0,'tribe_venue','',0)";
			mysql_query($SQL);
			$venueid = $id;
			
			$SQL = "INSERT INTO ".$tableOO."_postmeta VALUES ('',$id,'_VenueOrigin','AdminJL')";
			mysql_query($SQL);
			$SQL = "INSERT INTO ".$tableOO."_postmeta VALUES ('',$id,'_EventShowMapLink','')";
			mysql_query($SQL);
			$SQL = "INSERT INTO ".$tableOO."_postmeta VALUES ('',$id,'_EventShowMap','')";
			mysql_query($SQL);
			$SQL = "INSERT INTO ".$tableOO."_postmeta VALUES ('',$id,'_VenueFacebookID','$venuefbid')";
			mysql_query($SQL);
			$SQL = "INSERT INTO ".$tableOO."_postmeta VALUES ('',$id,'_VenueVenue','$venuetitle')";
			mysql_query($SQL);
			$SQL = "INSERT INTO ".$tableOO."_postmeta VALUES ('',$id,'_VenueAddress','$venuestreet')";
			mysql_query($SQL);
			$SQL = "INSERT INTO ".$tableOO."_postmeta VALUES ('',$id,'_VenueCity','$venuecity')";
			mysql_query($SQL);
			$SQL = "INSERT INTO ".$tableOO."_postmeta VALUES ('',$id,'_VenueStateProvince','$venueprovince')";
			mysql_query($SQL);
			$SQL = "INSERT INTO ".$tableOO."_postmeta VALUES ('',$id,'_VenueCountry','$venuecountry')";
			mysql_query($SQL);
			$SQL = "INSERT INTO ".$tableOO."_postmeta VALUES ('',$id,'_VenueZip','$venuezip')";
			mysql_query($SQL);
			$SQL = "INSERT INTO ".$tableOO."_postmeta VALUES ('',$id,'_VenuePhone','')";
			mysql_query($SQL);
			$SQL = "INSERT INTO ".$tableOO."_postmeta VALUES ('',$id,'_VenueLat','$venuelat')";
			mysql_query($SQL);
			$SQL = "INSERT INTO ".$tableOO."_postmeta VALUES ('',$id,'_VenueLng','$venuelong')";
			mysql_query($SQL);
			$SQL = "INSERT INTO ".$tableOO."_postmeta VALUES ('',$id,'_VenueGeoAddress','')";
			mysql_query($SQL);
			
			// Organisateur ID
			$id = getLastId($tableOO."_posts");
			$SQL = "INSERT INTO ".$tableOO."_posts VALUES ($id,1,'$date','$date','','$titleOrga','','publish','open','open','','','','','$date','$date','',0,'$urlsite?post_type=tribe_organizer&p=$id',0,'tribe_organizer','',0)";
			mysql_query($SQL);
			$organisateurid = $id;
			
			$SQL = "INSERT INTO ".$tableOO."_postmeta VALUES ('',$id,'_OrganizerOrigin','AdminJL')";
			mysql_query($SQL);
			$SQL = "INSERT INTO ".$tableOO."_postmeta VALUES ('',$id,'_OrganizerFacebookID','$orgaid')";
			mysql_query($SQL);
			$SQL = "INSERT INTO ".$tableOO."_postmeta VALUES ('',$id,'_OrganizerOrganizer','$orgatitle')";
			mysql_query($SQL);
			$SQL = "INSERT INTO ".$tableOO."_postmeta VALUES ('',$id,'_OrganizerPhone','')";
			mysql_query($SQL);
			$SQL = "INSERT INTO ".$tableOO."_postmeta VALUES ('',$id,'_OrganizerWebsite','http://www.facebook.com/$orgaid')";
			mysql_query($SQL);
			$SQL = "INSERT INTO ".$tableOO."_postmeta VALUES ('',$id,'_OrganizerEmail','')";
			mysql_query($SQL);
			
			$id = getLastId($tableOO."_posts");
			$idthumbnail = $id+1;
			$title = str_replace("'","''",$title);
			$description = str_replace("'","''",$description);
			$SQL = "INSERT INTO ".$tableOO."_posts VALUES ($id,1,'$date','$date','$description','$title','','publish','open','open','','$slug','','','$date','$date','',0,'$urlsite?post_type=tribe_events&#038;p=$id',0,'tribe_events','',0)";
			//echo "$SQL<br>";
			mysql_query($SQL);
			
			// Event Id
			$SQL = "INSERT INTO ".$tableOO."_postmeta VALUES ('',$id,'_EventOrigin','AdminJL')";
			mysql_query($SQL);
			$SQL = "INSERT INTO ".$tableOO."_postmeta VALUES ('',$id,'_EventShowMap','1')";
			mysql_query($SQL);
			$SQL = "INSERT INTO ".$tableOO."_postmeta VALUES ('',$id,'_EventVenueID','$venueid')";
			mysql_query($SQL);
			$SQL = "INSERT INTO ".$tableOO."_postmeta VALUES ('',$id,'_EventShowMapLink','')";
			mysql_query($SQL);
			$SQL = "INSERT INTO ".$tableOO."_postmeta VALUES ('',$id,'_EventCost','')";
			mysql_query($SQL);
			$SQL = "INSERT INTO ".$tableOO."_postmeta VALUES ('',$id,'_EventOrganizerID','$organisateurid')";
			mysql_query($SQL);
			$SQL = "INSERT INTO ".$tableOO."_postmeta VALUES ('',$id,'_EventRecurrence','a:0:{}')";
			mysql_query($SQL);
			$SQL = "INSERT INTO ".$tableOO."_postmeta VALUES ('',$id,'_EventStartDate','$startdate')";
			mysql_query($SQL);
			$SQL = "INSERT INTO ".$tableOO."_postmeta VALUES ('',$id,'_EventEndDate','$enddate')";
			mysql_query($SQL);
			$SQL = "INSERT INTO ".$tableOO."_postmeta VALUES ('',$id,'_EventDuration','')";
			mysql_query($SQL);
			// URL Facebook
			$SQL = "INSERT INTO ".$tableOO."_postmeta VALUES ('',$id,'_FacebookID','$fbid')";
			mysql_query($SQL);
			$SQL = "INSERT INTO ".$tableOO."_postmeta VALUES ('',$id,'_thumbnail_id','$idthumbnail')";
			mysql_query($SQL);
			
			// Thumbnail ID
			$SQL = "INSERT INTO ".$tableOO."_posts VALUES ($idthumbnail,1,'$date','$date','','facebook_event_$fbid','','inherit','open','open','','facebook_event_$fbid','','','$date','$date','',$id,'".$urlsite."wp-content/uploads/sites/$number/facebook_event_$fbid.jpg',0,'attachment','image/jpeg',0)";
			mysql_query($SQL);
			
			$data = file_get_contents($urlimage);
			$handle = fopen("../wp-content/uploads/sites/$number/facebook_event_$fbid.jpg","w");
			fwrite($handle,$data);
			fclose($handle);
			
			$SQL = "INSERT INTO ".$tableOO."_postmeta VALUES ('',$idthumbnail,'_wp_attached_file','facebook_event_$fbid.jpg')";
			mysql_query($SQL);
			
			$array['width'] = 200;
			$array['height'] = 200;
			$array['file'] = "facebook_event_$fbid.jpg";
			$array = serialize($array);
			
			$SQL = "INSERT INTO ".$tableOO."_postmeta VALUES ('',$idthumbnail,'_wp_attachment_metadata','$array')";
			mysql_query($SQL);
			
			$narray['id'] = $id;
			$narray['idvenue'] = $venueid;
			$narray['idowner'] = $organisateurid;
			$narray['idthumbnail'] = $idthumbnail;
			echo json_encode($narray);			
		}
	}
	
	if($command == 'ADD_VIDEO_CATEGORIE')
	{
		$description = $_REQUEST['description'];
		$title = $_REQUEST['title'];
		$youtube_id = $_REQUEST['youtube_id'];
		$categorie = $_REQUEST['categorie'];
		$site = $_REQUEST['site'];
		
		/*echo "Youtube : ".$youtube_id;
		echo "Categorie : ".$categorie;
		echo "Title : ".$title;
		echo "Description :".$description;*/
		
		$numbersite = str_replace("oo_","",$site);	
		$description = '';
		
		$title = utf8_decode($title);
		
		$ytapi = new youtube_api;
		$array = $ytapi->getYoutubeVideoInformation($youtube_id,"US",false);
		
		$stripfilename = $ytapi->transformString($title);
		$stripfilename = str_replace("--","-",$stripfilename);
		$data = file_get_contents($array['thumbnail_high']);
		$handle = fopen("../wp-content/uploads/sites/$numbersite/".$stripfilename.".jpg","w");
		fwrite($handle,$data);
		fclose($handle);
		
		// Resizing image
		$image_api = new image_api;
		$image_api->loadImage("../wp-content/uploads/sites/$numbersite/".$stripfilename.".jpg");
		$img = $image_api->forceResample(1024,576);
		$image_api->saveImage('jpg',$img,'../wp-content/uploads/sites/$numbersite/'.$stripfilename.'-1024x576.jpg',100);
		$img = $image_api->forceResample(150,100);
		$image_api->saveImage('jpg',$img,'../wp-content/uploads/sites/$numbersite/'.$stripfilename.'-150x100.jpg',100);
		$img = $image_api->forceResample(150,150);
		$image_api->saveImage('jpg',$img,'../wp-content/uploads/sites/$numbersite/'.$stripfilename.'-150x150.jpg',100);
		$img = $image_api->forceResample(199,129);
		$image_api->saveImage('jpg',$img,'../wp-content/uploads/sites/$numbersite/'.$stripfilename.'-199x129.jpg',100);
		$img = $image_api->forceResample(280,161);
		$image_api->saveImage('jpg',$img,'../wp-content/uploads/sites/$numbersite/'.$stripfilename.'-280x161.jpg',100);
		$img = $image_api->forceResample(300,168);
		$image_api->saveImage('jpg',$img,'../wp-content/uploads/sites/$numbersite/'.$stripfilename.'-300x168.jpg',100);
		$img = $image_api->forceResample(430,244);
		$image_api->saveImage('jpg',$img,'../wp-content/uploads/sites/$numbersite/'.$stripfilename.'-430x244.jpg',100);
		$img = $image_api->forceResample(628,250);
		$image_api->saveImage('jpg',$img,'../wp-content/uploads/sites/$numbersite/'.$stripfilename.'-628x250.jpg',100);
		$img = $image_api->forceResample(628,356);
		$image_api->saveImage('jpg',$img,'../wp-content/uploads/sites/$numbersite/'.$stripfilename.'-628x356.jpg',100);
		$img = $image_api->forceResample(80,60);
		$image_api->saveImage('jpg',$img,'../wp-content/uploads/sites/$numbersite/'.$stripfilename.'-80x60.jpg',100);
		$img = $image_api->forceResample(956,450);
		$image_api->saveImage('jpg',$img,'../wp-content/uploads/sites/$numbersite/'.$stripfilename.'-956x450.jpg',100);
	
		// Insert post Wordpress
		$date = date('Y-m-d h:i:s');
		$id = getLastId($site."_posts");
		$idAttachement = $id+1;
		$SQL = "INSERT INTO ".$site."_posts VALUES ($id,'1','$date','0000-00-00 00:00:00','http://www.youtube.com/watch?v=$youtube_id"."\n"."','$title','','publish','open','open','','$stripfilename','','','$date','0000-00-00 00:00:00','',0,'http://video.oolatina.com/?p=$id',0,'post','',0)";
		mysql_query($SQL);
		
		// Post Attachment
		$SQL = "INSERT INTO ".$site."_posts VALUES ($idAttachement,'1','$date','$date','','".strtoupper($title)."','','inherit','open','open','','$stripfilename','','','$date','$date','',$id,'',0,'attachment','image/jpeg',0)";
		mysql_query($SQL);
		
		// Add Meta-Id
		$SQL = "INSERT INTO ".$site."_postmeta VALUES ('','$id','views','0')";
		mysql_query($SQL);
		$SQL = "INSERT INTO ".$site."_postmeta VALUES ('','$id','_tern_wp_youtube_video','$youtube_id')";
		mysql_query($SQL);
		$SQL = "INSERT INTO ".$site."_postmeta VALUES ('','$id','_tern_wp_youtube_published','$date')";
		mysql_query($SQL);
		$SQL = "INSERT INTO ".$site."_postmeta VALUES ('','$id','_tern_wp_youtube_author','Auteur')";
		mysql_query($SQL);
		$SQL = "INSERT INTO ".$site."_postmeta VALUES ('','$id','_thumbnail_id','$idAttachement')";
		mysql_query($SQL);
		$SQL = "INSERT INTO ".$site."_postmeta VALUES ('','$id','post_views_count','0')";
		mysql_query($SQL);
		$SQL = "INSERT INTO ".$site."_postmeta VALUES ('','$id','_edit_lock','0')";
		mysql_query($SQL);
		$SQL = "INSERT INTO ".$site."_postmeta VALUES ('','$id','_edit_last','1')";
		mysql_query($SQL);
		$SQL = "INSERT INTO ".$site."_postmeta VALUES ('','$id','socialGalleryDisabled','0')";
		mysql_query($SQL);
		$SQL = "INSERT INTO ".$site."_postmeta VALUES ('','$id','pg_redirect','a:0:{}')";
		mysql_query($SQL);
		$SQL = "INSERT INTO ".$site."_postmeta VALUES ('','$id','_wpnonce','')";
		mysql_query($SQL);
		$SQL = "INSERT INTO ".$site."_postmeta VALUES ('','$id','_wp_http_referer','/wp-admin/post.php?post=$id&action=edit')";
		mysql_query($SQL);
		$SQL = "INSERT INTO ".$site."_postmeta VALUES ('','$id','user_ID','1')";
		mysql_query($SQL);
		$SQL = "INSERT INTO ".$site."_postmeta VALUES ('','$id','action','editpost')";
		mysql_query($SQL);
		$SQL = "INSERT INTO ".$site."_postmeta VALUES ('','$id','originalaction','editpost')";
		mysql_query($SQL);
		$SQL = "INSERT INTO ".$site."_postmeta VALUES ('','$id','post_author','1')";
		mysql_query($SQL);
		$SQL = "INSERT INTO ".$site."_postmeta VALUES ('','$id','post_type','post')";
		mysql_query($SQL);
		$SQL = "INSERT INTO ".$site."_postmeta VALUES ('','$id','original_post_status','publish')";
		mysql_query($SQL);
		$SQL = "INSERT INTO ".$site."_postmeta VALUES ('','$id','referredby','http://video.oolatina.com/wp-admin/edit.php?paged=..')";
		mysql_query($SQL);
		$SQL = "INSERT INTO ".$site."_postmeta VALUES ('','$id','_wp_original_http_referer','http://video.oolatina.com/wp-admin/edit.php?paged=..')";
		mysql_query($SQL);
		$SQL = "INSERT INTO ".$site."_postmeta VALUES ('','$id','post_ID','$id')";
		mysql_query($SQL);
		$SQL = "INSERT INTO ".$site."_postmeta VALUES ('','$id','autosavenonce','')";
		mysql_query($SQL);
		$SQL = "INSERT INTO ".$site."_postmeta VALUES ('','$id','meta-box-order-nonce','')";
		mysql_query($SQL);
		$SQL = "INSERT INTO ".$site."_postmeta VALUES ('','$id','closedpostboxesnonce','')";
		mysql_query($SQL);
		$SQL = "INSERT INTO ".$site."_postmeta VALUES ('','$id','post_title','$title')";
		mysql_query($SQL);
		
		// Ajout de meta pour la miniature
		// wp-content/uploads/sites/11
		$stripfilename = $stripfilename.".jpg";
		$SQL = "INSERT INTO ".$site."_postmeta VALUES ('','$idAttachement','_wp_attached_file','$stripfilename')";
		mysql_query($SQL);
		//$SQL = "INSERT INTO ".$site."_postmeta VALUES ('','$idAttachement','_wp_attachment_metadata','a:6:{s:5:\"width\";i:1280;s:6:\"height\";i:720;s:4:\"file\";s:51:\"$stripfilename\";s:5:\"sizes\";a:11:{s:9:\"thumbnail\";a:5:{s:4:\"file\";s:59:\"$stripfilename\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";s:10:\"wp_smushit\";s:28:\"Reduced by 2.6% (104&nbsp;B)\";}s:6:\"medium\";a:5:{s:4:\"file\";s:59:\"$stripfilename\";s:5:\"width\";i:300;s:6:\"height\";i:168;s:9:\"mime-type\";s:10:\"image/jpeg\";s:10:\"wp_smushit\";s:28:\"Reduced by 2.1% (123&nbsp;B)\";}s:5:\"large\";a:5:{s:4:\"file\";s:60:\"$stripfilename\";s:5:\"width\";i:1024;s:6:\"height\";i:576;s:9:\"mime-type\";s:10:\"image/jpeg\";s:10:\"wp_smushit\";s:29:\"Reduced by 5.0% (1.5&nbsp;KB)\";}s:11:\"full-slider\";a:5:{s:4:\"file\";s:59:\"$stripfilename\";s:5:\"width\";i:956;s:6:\"height\";i:450;s:9:\"mime-type\";s:10:\"image/jpeg\";s:10:\"wp_smushit\";s:29:\"Reduced by 4.8% (1.2&nbsp;KB)\";}s:12:\"small-slider\";a:5:{s:4:\"file\";s:59:\"$stripfilename\";s:5:\"width\";i:628;s:6:\"height\";i:356;s:9:\"mime-type\";s:10:\"image/jpeg\";s:10:\"wp_smushit\";s:28:\"Reduced by 3.8% (613&nbsp;B)\";}s:8:\"big-magz\";a:5:{s:4:\"file\";s:59:\"$stripfilename\";s:5:\"width\";i:430;s:6:\"height\";i:244;s:9:\"mime-type\";s:10:\"image/jpeg\";s:10:\"wp_smushit\";s:28:\"Reduced by 2.5% (240&nbsp;B)\";}s:10:\"small-magz\";a:5:{s:4:\"file\";s:57:\"$stripfilename\";s:5:\"width\";i:80;s:6:\"height\";i:60;s:9:\"mime-type\";s:10:\"image/jpeg\";s:10:\"wp_smushit\";s:27:\"Reduced by 4.4% (76&nbsp;B)\";}s:8:\"carousel\";a:5:{s:4:\"file\";s:59:\"$stripfilename\";s:5:\"width\";i:199;s:6:\"height\";i:129;s:9:\"mime-type\";s:10:\"image/jpeg\";s:10:\"wp_smushit\";s:27:\"Reduced by 2.3% (91&nbsp;B)\";}s:12:\"related-post\";a:5:{s:4:\"file\";s:59:\"$stripfilename\";s:5:\"width\";i:280;s:6:\"height\";i:161;s:9:\"mime-type\";s:10:\"image/jpeg\";s:10:\"wp_smushit\";s:28:\"Reduced by 2.1% (120&nbsp;B)\";}s:12:\"content-magz\";a:5:{s:4:\"file\";s:59:\"$stripfilename\";s:5:\"width\";i:628;s:6:\"height\";i:250;s:9:\"mime-type\";s:10:\"image/jpeg\";s:10:\"wp_smushit\";s:28:\"Reduced by 3.4% (408&nbsp;B)\";}s:29:\"tribe-related-posts-thumbnail\";a:5:{s:4:\"file\";s:59:\"$stripfilename\";s:5:\"width\";i:150;s:6:\"height\";i:100;s:9:\"mime-type\";s:10:\"image/jpeg\";s:10:\"wp_smushit\";s:27:\"Reduced by 3.0% (91&nbsp;B)\";}}s:10:\"image_meta\";a:10:{s:8:\"aperture\";i:0;s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";i:0;s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";i:0;s:3:\"iso\";i:0;s:13:\"shutter_speed\";i:0;s:5:\"title\";s:0:\"\";}s:10:\"wp_smushit\";s:10:\"No savings\";}')";
		//mysql_query($SQL);
		$SQL = "INSERT INTO ".$site."_postmeta VALUES ('','$idAttachement','video_thumbnail','1')";
		mysql_query($SQL);
		
		// Taxonomy relationship
		$SQL = "INSERT INTO ".$site."_term_relationships VALUES ($id,4,0)";
		mysql_query($SQL);
		// Regeaton Video
		$SQL = "INSERT INTO ".$site."_term_relationships VALUES ($id,$categorie,0)";
		mysql_query($SQL);
		
		echo "La video à bien été ajouter au site.";
	}
}

function getAllVideoCategory($site)
{
	$i = 0;
	$SQL = "SELECT * FROM `".$site."_terms`";
	$reponse = mysql_query($SQL);
	while($req = mysql_fetch_array($reponse))
	{
		$slug = trim($req['slug']);
		if($slug != 'uncategorized' && $slug != 'navigation-principale' && $slug != 'post-format-video' && $slug != 'post-format-audio')
		{
			$array[$i]['name'] = utf8_encode($req['name']);
			$array[$i]['term_id'] = $req['term_id'];
			$i++;
		}
	}
	
	/*$SQL = "SELECT * FROM `oo_11_terms` WHERE slug like '%-video'";
	$reponse = mysql_query($SQL);
	while($req = mysql_fetch_array($reponse))
	{
		if($req['name'] != 'post-format-video')
		{
			$array[$i]['name'] = $req['name'];
			$array[$i]['term_id'] = $req['term_id'];
			$i++;
		}
	}
	
	$SQL = "SELECT * FROM `oo_11_terms` WHERE slug like '%-shows'";
	$reponse = mysql_query($SQL);
	while($req = mysql_fetch_array($reponse))
	{
		$array[$i]['name'] = $req['name'];
		$array[$i]['term_id'] = $req['term_id'];
		$i++;
	}
	
	$SQL = "SELECT * FROM `oo_11_terms` WHERE slug like '%-artist'";
	$reponse = mysql_query($SQL);
	while($req = mysql_fetch_array($reponse))
	{
		$array[$i]['name'] = $req['name'];
		$array[$i]['term_id'] = $req['term_id'];
		$i++;
	}*/
	
	return $array;
}

?>

