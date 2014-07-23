<?php

// Session Playlist

include "config.php";
include "class/playlist.class.php";

$playlist = new playlist();

if(isset($_REQUEST['command']))
{
	$command = $_REQUEST['command'];
	if($command == 'ADDPLAYLIST')
	{
		$id = $_REQUEST['id'];
		$playlist->addMusicPlaylist($id);
	}
	
	if($command == 'COUNT')
	{
		$playlist->getCount();
	}
	
	if($command == 'CLEAR')
	{
		$playlist->clear();
	}
	
	if($command == 'GETCURRENTMUSIC')
	{
		$number = $_REQUEST['number'];
		$playlist->getCurrentMusic($number);
	}
	
	if($command == 'GETLASTMUSIC')
	{
		$playlist->getLastMusic();
	}
}

?>