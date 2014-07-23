<?php

$SQL = "SELECT COUNT(*) FROM user WHERE username = '".$_SESSION['username']."' AND password = '".$_SESSION['password']."'";
$reponse = mysql_query($SQL);
$req = mysql_fetch_array($reponse);

$connect = 0;
if($req[0] != 0)
{
	$connect = 1;
}

?>
<div class="playerAudio_box">
	<div class="playerAudio_toolbar">
		<div class="playerContentBar">
			<a href="javascript:void(0)" id="downplayer" style="float:right;"><img src="images/player/player_down.png" id="imgUpPlayer" style="width:20px;height:20px;margin-top:5px;margin-right:5px;"></a>
			<a href="javascript:void(0)" id="popover" class="popOverSelectRadio"><img src="images/player/icon_radio.png" width=15 height=15><div style="float:right;margin-top:3px;">&nbsp;&nbsp;Ecouter vos radio</div></a>
		</div>
	</div>
	<div id="debugrequestPlayer"></div>
	<div class="playerMusic">
			<audio id="audioplayer" class="audio_radio_player" src="" ontimeupdate='updateTrackTime(this);'>
			</audio>
			<img src="http://webradio.oolatina.com/images/cover/no_cover_hd.png" class="playerAudio_thumbnail_cover">
			<div class="playerMusicTitleBox">
				<div class="playerMusicTitle">Aucune musique selectionné</div>
				<div class="playerMusicArtistTitle">&nbsp;Pour commencer la lecture choissisez une musique<br>
				&nbsp;sur le site</div>
				<div class="playerMusicCount"></div>
			</div>
			<div class="playerMusicControlOne">
			<a href="javascript:void(0)" id="prevMusic"><img src="images/player/playerMusic_prev.png"></a>
			<a href="javascript:void(0)" id="playMusic"><img src="images/player/playerMusic_play.png" id="playerMusicButtonPlay"></a>
			<a href="javascript:void(0)" id="nextMusic"><img src="images/player/playerMusic_next.png"></a>
			</div>
			<div class="playerMusicControlPlaying">
				<div class="playerMusicControlVolume">
					<div class="iconVolume" id="iconVolume"></div><div id="playerMusicVolume"></div>
				</div>
				
				<div class="playerMusicControlPlay">
				<div id="playerMusicCurrentTime" class="playerMusicCurrentTime">00:00</div> <div id="playerMusicTrackLength" class="playerMusicTrackLength"></div> <div id="playerMusicDurationTime" class="playerMusicDurationTime">00:00</div>
				</div>
			</div>
	</div>
</div>