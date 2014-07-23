<?php

// Youtube API - http://studio.shua-creation.com 2014

class youtube_api 
{
	// Cette clé s'obtiens à cette page il faut avoir un compte developper Google -> https://cloud.google.com/console
	// Assurez vous d'avoir activer les "YouTube Data API" dans l'interface pour que celà fonctionne
	var $youtube_key_developper = "AIzaSyCgMHUnbxAJck54BFBsS2EhRfV9lWL7Drg";
	
	function getYoutubeVideoInformation($idvideo,$region,$debug)
	{
		$url = "https://www.googleapis.com/youtube/v3/search?part=snippet&maxResults=1&order=relevance&q=$idvideo&regionCode=$region&type=video&key=".$this->youtube_key_developper;
		$reponse = file_get_contents($url);
		$json = json_decode($reponse);		
		$item = $json->items[0];
		
		$youtube_video = $item;
		$array['videoId'] = $youtube_video->id->videoId;
		$array['publishDate'] = $youtube_video->snippet->publishedAt;
		$array['channelId'] = $youtube_video->snippet->channelId;
		$array['channelTitle'] = $youtube_video->channelTitle;
		$array['title'] = $youtube_video->snippet->title;
		$array['description'] = $youtube_video->snippet->description;
		$array['thumbnail_default'] = $youtube_video->snippet->thumbnails->default->url;
		$array['thumbnail_medium'] = $youtube_video->snippet->thumbnails->medium->url;
		$array['thumbnail_high'] = $youtube_video->snippet->thumbnails->high->url;
		$array['liveBroadcastContent'] = $youtube_video->liveBroadcastContent;
		
		return $array;
	}
	
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
		$string = $this->remove_accents($string);
		$string = $this->remove_accents($string);
		$string = strtolower($string);
		return $string;		
	}
	
	// Permet de faire une recherche de video youtube indiquez une region (US,FR,etc)
	function searchYoutubeVideo($search,$region,$maximumResult,$debug,$pageToken)
	{
		$search = urlencode($search);
		$url = "https://www.googleapis.com/youtube/v3/search?part=snippet&maxResults=$maximumResult&order=relevance&q=$search&regionCode=$region&type=video&pageToken=$pageToken&key=".$this->youtube_key_developper;
		$reponse = file_get_contents($url);
		$json = json_decode($reponse);		
		
		$totalResults = $json->pageInfo->totalResults;
		$resultparPage = $json->pageInfo->resultsPerPage;
		$nextPageToken = $json->nextPageToken;
		$prevPageToken = $json->prevPageToken;
		$item = $json->items;
		
		$array['nextPageToken'] = $nextPageToken;
		$array['prevPageToken'] = $prevPageToken;
		$array['totalResult'] = $totalResults;
		
		if($debug)
		{
			echo "** DEBUG MODE ** [Url] : ".$url."<br>";
			echo "** DEBUG MODE ** [Set Max Result] : ".$maximumResult."<br>";
			echo "** DEBUG MODE ** [Next Page Token] : ".$nextPageToken."<br>";
			echo "** DEBUG MODE ** [Prev Page Token] : ".$prevPageToken."<br>";
			echo "** DEBUG MODE ** [Youtube_Key] : ".$this->youtube_key_developper."<br>";
			echo "** DEBUG MODE ** [Nombre de résultat] : $totalResults<br>";
			echo "** DEBUG MODE ** [Resultat par page] : $resultparPage<br>";
			echo "** DEBUG MODE ** [Recherche] : $search<br>";
			echo "** DEBUG MODE ** [Array Reponse] : <br>";
			var_dump($json);
		}
		
		$i = 0;
		for($x=0;$x<count($item);$x++)
		{
			$youtube_video = $item[$x];
			$array[$i]['videoId'] = $youtube_video->id->videoId;
			$array[$i]['publishDate'] = $youtube_video->snippet->publishedAt;
			$array[$i]['channelId'] = $youtube_video->snippet->channelId;
			$array[$i]['channelTitle'] = $youtube_video->channelTitle;
			$array[$i]['title'] = $youtube_video->snippet->title;
			$array[$i]['description'] = $youtube_video->snippet->description;
			$array[$i]['thumbnail_default'] = $youtube_video->snippet->thumbnails->default->url;
			$array[$i]['thumbnail_medium'] = $youtube_video->snippet->thumbnails->medium->url;
			$array[$i]['thumbnail_high'] = $youtube_video->snippet->thumbnails->high->url;
			$array[$i]['liveBroadcastContent'] = $youtube_video->liveBroadcastContent;
			$i++;
		}
		
		return $array;
	}
}

?>