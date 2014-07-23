<!-- Load javascripts at bottom, this will reduce page load time -->
<!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
<!--[if lt IE 9]>
<script src="assets/plugins/respond.min.js"></script>  
<![endif]-->  
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script src="assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>      
<script type="text/javascript" src="assets/plugins/jQuery-slimScroll/jquery.slimscroll.min.js"></script>
<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
<script type="text/javascript" src="assets/plugins/fancybox/source/jquery.fancybox.pack.js"></script><!-- pop up -->
<script type="text/javascript" src="assets/plugins/bxslider/jquery.bxslider.min.js"></script><!-- slider for products -->
<script type="text/javascript" src='assets/plugins/zoom/jquery.zoom.min.js'></script><!-- product zoom -->
<script src="assets/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script><!-- Quantity -->

<script src="js/social_like/social-likes.min.js"></script>
<script src="js/modernizr.js"></script>

<!-- BEGIN LayerSlider -->
<script src="assets/plugins/layerslider/jQuery/jquery-easing-1.3.js" type="text/javascript"></script>
<script src="assets/plugins/layerslider/jQuery/jquery-transit-modified.js" type="text/javascript"></script>
<script src="assets/plugins/layerslider/js/layerslider.transitions.js" type="text/javascript"></script>
<script src="assets/plugins/layerslider/js/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script>
<!-- END LayerSlider -->

<!-- SonIT -->
<script type="text/javascript" src="js/cart.js"></script>
<script type="text/javascript" src="js/app_modified.js"></script>
<script type="text/javascript" src="js/jquery.blockUI.js"></script>

<!-- POPUP CONTACT -->
<script>
function showPopupContact()
{
	$('#errormail_contact').html('');
	$('#email_contact').val('');
	$('#subject_contact').val('');
	$('#message_contact').val('');
	$('.popup_contact').css('display','block');
}

function closePopupContact()
{
	$('.popup_contact').css('display','none');
}

function sendContactForm()
{
	var email = $('#email_contact').val();
	var subjet = $('#subject_contact').val();
	var msg = $('#message_contact').val();
	
	if(checkemail(email))
	{
		var jqxhr = $.get("sending_contact.php?email="+encodeURIComponent(email)+"&subjet="+encodeURIComponent(subjet)+"&msg="+encodeURIComponent(msg),function(data)
		{
			alert('Votre message à bien été envoyez.');
			closePopupContact();
		});
	}
	else
	{
		$('#errormail_contact').html('<font color=red><b>Veuillez renseigner une adresse email valide</b></font>');
	}
}
</script>

<!-- SEARCH -->
<script>
function launchSearch()
{
	var search = $('#search').val();
	search = search.replace(" ","-");
	loadpage('search-partial-'+search+'.html');
}
</script>

<!-- NEWSLETTER -->
<script>

function checkemail(email)
{
	var reg = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');

	if(reg.test(email))
	{
		return(true);
	}
	else
	{
		return(false);
	}
}

function addnewsletter()
{
	var email = $('#emailnewsletter').val();
	if(checkemail(email))
	{
		$('#erroremailnewsletter').load('addnewsletter.php?email='+email);
		$('#emailnewsletter').val('');
		
	}
	else
	{
		$('#erroremailnewsletter').html('<font color=red size=2><b>Veuillez entrer une adresse valide.</b></font>');
	}
}
</script>

<!-- LANG DROPDOWN -->
<script>
//dropdown
  $('.langs a').click(function () {
	  if ($('.flags').is(":hidden")) {
		  $('.langs i').removeClass('fa fa-angle-down').addClass('fa fa-angle-up');
		  $('.flags').slideDown('slow', function () {
			  timer = setTimeout(function () {
				  $('.flags').slideUp("slow");
			  }, 15000);
		  });
	  } else {
		  $('.langs i').removeClass('fa fa-angle-up').addClass('fa fa-angle-down');
		  $('.flags').slideUp('slow');
		  clearTimeout(timer);
	  }
	  return false;
  });

  $('.closedd').on('click', function(){
	  $('.langs i').removeClass('fa fa-angle-up').addClass('fa fa-angle-down');
	  $('.flags').slideUp('slow');
  });
</script>

<!-- POPUP FULL -->
<script>
function showFullPopup(name)
{
	$('#fullPopup').css('display','block');
	$( "#fullPopup" ).animate({
	opacity: 1.0
	}, 500, function() 
	{
		$('#fullPopupleft').css('backgroundImage','url(assets/temp/sliders/bg2.jpg)');
		$('#fullpopupLeft').load('radioPopupLeft.php?flux='+name);
		$('#fullPopupRight').load('radioPopupRight.php?flux='+name, function() 
		{
			FB.XFBML.parse();
		});
		showRight();
	});
}

function showFullPopupAndRadio(name)
{
	showFullPopup(name);
	playRadio(name);
}

function showRight()
{
	$("#fullPopupRight").animate({
	right:"0"
	},500,function()
	{
	
	});
}

function hideRight()
{
	$("#fullPopupRight").animate({
	right:"-25%"
	},500,function()
	{
		closeFullPopup();
	});
}

function closeFullPopup()
{
	$( "#fullPopup" ).animate({
	opacity: 0.0
	}, 500, function() 
	{
		$('#fullPopup').css('display','none');
	});
}

function closeFullScreenPopup()
{
	hideRight();
}

</script>

<!-- VIDEO SEARCH -->
<script>
function searchVideo()
{
	var videosearch = $('#searchvideo').val();
	alert(videosearch);
}
</script>

<!-- SLIDER -->
<script>
$('.bxslider').bxSlider({
  adaptiveHeight: true,
  infiniteLoop: false,
  hideControlOnEnd: false,
  controls: false,
  auto: true
});
</script>
	
<!-- COUNT -->
<script>
(function ($) {
$(document).ready(setInterval(function() {
  $('#user_count').load('count.php?uo');
  $('#events_count').load('count.php?ec');
  $('#photo_count').load('count.php?pc');
  $('#video_count').load('count.php?vc');
  $('#audio_count').load('count.php?ac');
  $('#tv_count').load('count.php?tc');
  $('#radio_count').load('count.php?rc');
  $('#country_count').load('count.php?cn');
}, 5 * 1000));
})(jQuery);
</script>

<!-- MENU NAVIGATION -->
<script>
  $(window).load(function () {
	$(".navigation > a").click(function() {
	  if (!$(this).hasClass("active")) {
		$(".navigation").unbind('mouseleave');
		$(".navigation .second_level").removeClass("animated fadeInDown").hide();
		var el = $(this);
		el.addClass("hover");
		$(".navigation > a.active").fadeOut("fast", function() {
		  var prev = $(this)
		  prev.removeClass('active');
		  container_pos = $(".navigation").offset()
		  button_pos = el.offset()
		  el.animate({ top: container_pos.top - button_pos.top }, 500, function() {
			el.addClass("active").removeClass("hover").css("top", 0);
			if (el.attr("href").length > 1 && el.attr("href") != "#") {
			  $(".navigation > a:not(.active)").removeClass("fadeInLeft animated").hide();
			  $(el.attr("href")).addClass("fadeInDown animated").show();
			} else {
			  prev.addClass("fadeInLeft animated").fadeIn("fast");
			}
		  });
		});
	  }

	});

	$(".navigation .back").hover(
	  function () {
		var el = $(this)
		$(".navigation .second_level").removeClass("animated fadeInDown").hide();
		$(".navigation > a:not(.active)").addClass("fadeInLeft animated").show()
		$(".navigation").hover(function() {}, function() {
		  $(this).unbind('mouseleave');
		  $(".navigation > a:visible:not(.active)").hide().removeClass("fadeInLeft animated");
		  el.closest(".second_level").addClass("animated fadeInDown").show();
		});
	  });
  });
</script>

<script>
jQuery.fn.center = function () {

    var $self = $(this), _self = this;
    var window_resize = function(){
        var window_obj = $(window);
        $self.css({
            "position": "absolute",
            "top": (( window_obj.height() - _self.outerHeight()) / 2),
            "left": (( window_obj.width() - _self.outerWidth()) / 2)
        });
    }
    $self.bind('centerit', window_resize).trigger('centerit');
    $(window).bind('resize', function(){
        $self.trigger('centerit');
    });
    return _self;

}
$('.popup_box').center();
$(document).ready(
    function(){
        $("#show_popup_box").click(function () {
            $(".popup_box").show("slow");
        });

    });
$(document).ready(
    function(){
        $(".close_popup").click(function () {
            $(".popup_box").hide("slow");
        });

    });
</script>

<script type="text/javascript">
$(document).ready(function($){
   $('.content').click(function () {
       $(this).next('.unfold_menu').toggle("slow");
    });

});
</script>


<!-- LOADER PAGE -->
<script>
function loadpage(url)
{
	if(url != 'index')
	{
		$('.page-slider').css('display','none');
		$('.topbar').css('position','relative');
	}
	else
	{
		$('.page-slider').css('display','block');
		$('.topbar').css('position','absolute');
	}
	$('#ajax-container').load(url+'?hide=1', function() {
		FB.XFBML.parse();
	});
	
	url = url.replace("-partial","-full");
	
	// si index
	if(url == 'index-full.html')
	{
		url = '';
	}
	
	history.pushState('data', '', 'http://www.oolatina.com/'+url);
}

function loadpageCloseAllPopup(url)
{
	if(url != 'index')
	{
		$('.page-slider').css('display','none');
		$('.topbar').css('position','relative');
	}
	else
	{
		$('.page-slider').css('display','block');
		$('.topbar').css('position','absolute');
	}
	$('#ajax-container').load(url+'?hide=1', function() {
		FB.XFBML.parse();
	});
	
	closeFullScreenPopup();
	
	url = url.replace("-partial","-full");
	
	// si index
	if(url == 'index-full.html')
	{
		url = '';
	}
	
	history.pushState('data', '', 'http://www.oolatina.com/'+url);
}
</script>

<!-- ???? -->
<script type="text/javascript">
        function changeFlag() {
		
		var CountryList= document.getElementById('country').value;
		if(CountryList!=''){
		 document.getElementById('dvFlag').style.backgroundImage = "url('flags24.png')";
		var cou=CountryList.toLowerCase();
		
		 document.getElementById('dvFlag').className=cou;
		 
		
		
}else{

 document.getElementById('dvFlag').style.backgroundImage = "";
  document.getElementById('dvFlag').className="";
}    }
</script>

<!-- POPOVER -->
<script>
var popoverradioactive = false;
$('#popover').click(function()
{
	if(popoverradioactive)
	{
		$("#popoverRadio").animate({
		height:"0px"
		},500,function()
		{
			$('#popoverRadio').css('display','none');
			$('#popOverRadioCorner').css('display','none');
			popoverradioactive = false;
		});
	}
	else
	{
		$('#popoverRadio').css('display','block');
		$('#popOverRadioCorner').css('display','block');
		popoverradioactive = true;
		$("#popoverRadio").animate({
		height:"350px"
		},500,function()
		{
			//$("#coverThumb1").attr('src','images/728.GIF');
			//$("#coverThumb2").attr('src','images/728.GIF');
			//$("#coverThumb3").attr('src','images/728.GIF');
			//$("#coverThumb4").attr('src','images/728.GIF');
			//$("#coverThumb5").attr('src','images/728.GIF');
		
			// Update des covers des radio
			$.getJSON( "getRadioInfo.php?flux=bachata&width=110&height=110", function( data ) 
			{
				var items = [];
				$.each( data, function( key, val ) 
				{
					if(key == 'cover')
					{
						$("#coverThumb1").attr('src',val);
					}
					
					if(key == 'song_artist')
					{
						$("#TitleActually1").html(val);
					}
				});
			});
			
			$.getJSON( "getRadioInfo.php?flux=kizomba&width=110&height=110", function( data ) 
			{
				var items = [];
				$.each( data, function( key, val ) 
				{
					if(key == 'cover')
					{
						$("#coverThumb2").attr('src',val);
					}
					
					if(key == 'song_artist')
					{
						$("#TitleActually2").html(val);
					}
				});
			});
			
			$.getJSON( "getRadioInfo.php?flux=oolatina&width=110&height=110", function( data ) 
			{
				var items = [];
				$.each( data, function( key, val ) 
				{
					if(key == 'cover')
					{
						$("#coverThumb3").attr('src',val);
					}
					
					if(key == 'song_artist')
					{
						$("#TitleActually3").html(val);
					}
				});
			});
			
			$.getJSON( "getRadioInfo.php?flux=salsa_cubaine&width=110&height=110", function( data ) 
			{
				var items = [];
				$.each( data, function( key, val ) 
				{
					if(key == 'cover')
					{
						$("#coverThumb4").attr('src',val);
					}
					
					if(key == 'song_artist')
					{
						$("#TitleActually4").html(val);
					}
				});
			});
			
			$.getJSON( "getRadioInfo.php?flux=salsa_portoricaine&width=110&height=110", function( data ) 
			{
				var items = [];
				$.each( data, function( key, val ) 
				{
					if(key == 'cover')
					{
						$("#coverThumb5").attr('src',val);
					}
					
					if(key == 'song_artist')
					{
						$("#TitleActually5").html(val);
					}
				});
			});
		});
	}
});
</script>

<!-- PLAYER -->
<script>
var playerShow = true;
var numberplaylist = 0;
var currentplay = 0;
var isplaying = false;
var isradioplaying = false;
<?php

$SQL = "SELECT COUNT(*) FROM user WHERE username = '".$_SESSION['username']."' AND password = '".$_SESSION['password']."'";
$reponse = mysql_query($SQL);
$req = mysql_fetch_array($reponse);

$connect = 0;
if($req[0] != 0)
{
	$connect = 1;
}

if($connect == 1)
{
?>
var demo = false;
<?php
}
else
{
?>
var demo = true;
<?php
}
?>
var coverurl;
var title;
var mp3url;
var currentRadio;
var nextactive;

$("#downplayer").click(function() 
{
	if(playerShow)
	{	
		$('.playerAudio_box').animate(
		{
			bottom: '-90px'
		});
		$('#imgUpPlayer').attr('src','images/player/player_up.png');
		playerShow = false;
	
		$("#popoverRadio").animate({
		bottom:"40px"
		},500,function()
		{
		});

		$("#popOverRadioCorner").animate({
		bottom:"33px"
		},500,function()
		{
		});
	}
	else
	{
		$('.playerAudio_box').animate({
		bottom: '0px'
		});
		$('#imgUpPlayer').attr('src','images/player/player_down.png');
		playerShow = true;
		
		$("#popoverRadio").animate({
		bottom:"130px"
		},500,function()
		{
		});			
		
		$("#popOverRadioCorner").animate({
		bottom:"123px"
		},500,function()
		{
		});
	}
});

$("#playMusic").click(function()
{
	var v = document.getElementsByTagName("audio")[0];
	if(!v.paused)
	{
		$('#playerMusicButtonPlay').attr('src','images/player/playerMusic_play.png');
		isplaying = false;
		v.pause();
	}
	else
	{
		$('#playerMusicButtonPlay').attr('src','images/player/playerMusic_pause.png');
		isplaying = true;
		v.play();
		if(demo)
		{
			timeout = setTimeout('stopMusic()', 30000);
			clearTimeout(timeout);
		}
	}
});

function playRadio(name)
{
	currentRadio = name;
	isradioplaying = true;
	var v = document.getElementsByTagName("audio")[0];
	if(isplaying)
	{
		v.pause();
		v.currentTime = 0;
	}
	
	$('#playerMusicCurrentTime').css('display','none');
	$('#playerMusicTrackLength').css('display','none');
	$('#playerMusicDurationTime').css('display','none');
	
	$('#audioplayer').attr('src','http://37.187.137.144:8000/'+name);
	$('#audioplayer').load();
	v.play();
	$('.playerMusicArtistTitle').html('&nbsp;'+name+' - Radio');	
	$('#playerMusicButtonPlay').attr('src','images/player/playerMusic_pause.png');
	refreshCover();
	
	$("#popoverRadio").animate({
	height:"0px"
	},500,function()
	{
		$('#popoverRadio').css('display','none');
		$('#popOverRadioCorner').css('display','none');
		popoverradioactive = false;
	});
	
	showFullPopup(name);
}

function refreshCover()
{	
	if(isradioplaying)
	{
		$.getJSON( "getRadioInfo.php?flux="+currentRadio+"&width=110&height=110", function( data ) 
		{
			var items = [];
			$.each( data, function( key, val ) 
			{
				if(key == 'cover')
				{
					$('.playerAudio_thumbnail_cover').attr('src',val);
				}
				
				if(key == 'song_artist')
				{
					$('.playerMusicTitle').html(val);
				}
				
				if(key == 'itunes_link')
				{
					$('.playerMusicCount').html('<a href="'+val+'" target="newpage"><img src="images/itunes_icon.png" title="Télécharger sur itunes"></a>');
				}
				else
				{
					$('.playerMusicCount').html('');
				}
			});
		
		});
	
		setTimeout('refreshCover()', 10000);
	}
}

function stopMusic()
{
	var v = document.getElementsByTagName("audio")[0];
	v.pause();
	v.currentTime = 0;
	$('#playerMusicButtonPlay').attr('src','images/player/playerMusic_play.png');
	showConnect();	
}

$("#nextMusic").click(function()
{
	nextTrack();
});

function nextTrack()
{
	currentplay = currentplay+1;
	if(currentplay >= numberplaylist)
	{
		currentplay = 0;
	}
	
	updateCurrentDataTrack();
}

$("#prevMusic").click(function()
{
	currentplay = currentplay-1;
	if(currentplay == -1)
	{
		currentplay = numberplaylist-1;
	}
	
	updateCurrentDataTrack();
});

$(function() 
{
	var v = document.getElementsByTagName("audio")[0];
	v.addEventListener("timeupdate", progress, false);
	var progress = $('#playerMusicTrackLength');
	nextactive = false;
	
	$( "#playerMusicVolume" ).slider(
	{
		orientation: "horizontal",
		min:0,
		max:100,
		range: "min",
		animate: true,
		value: 100,
		slide: function( event, ui )
		{
			v.volume = (ui.value / 100);
			if(ui.value == 0)
			{
				$('#iconVolume').removeClass('iconVolume');
				$('#iconVolume').addClass('iconVolumePlus');
			}
			else
			{
				$('#iconVolume').removeClass('iconVolumePlus');
				$('#iconVolume').addClass('iconVolume');
			}
			console.log(ui.value);
		}
	});
	
	function progress() 
	{
		if(!nextactive)
		{
			progress = $('#playerMusicTrackLength');
			if(progress.slider('value') > 98)
			{
				nextactive = true;
				nextTrack();
			}
		}
		progress.slider('value', ~~(100/v.duration*v.currentTime));
	}
	
	progress.slider( {
    value : v.currentTime,
    slide : function(ev, ui) 
	{
        v.currentTime = v.duration/100*ui.value;
    }
  });
});

function updateTrackTime(track)
{
	var currTimeDiv = track.currentTime;
	var durationDiv = track.duration;

	var currTime = Math.floor(track.currentTime).toString(); 
	var duration = Math.floor(track.duration).toString();
	
	$('#playerMusicCurrentTime').html(formatSecondsAsTime(currTime));

	if (isNaN(duration))
	{
		$('#playerMusicDurationTime').html('00:00');
	} 
	else
	{
		$('#playerMusicDurationTime').html(formatSecondsAsTime(duration));
	}
}

function formatSecondsAsTime(secs, format) {
  var hr  = Math.floor(secs / 3600);
  var min = Math.floor((secs - (hr * 3600))/60);
  var sec = Math.floor(secs - (hr * 3600) -  (min * 60));

  if (min < 10){ 
    min = "0" + min; 
  }
  if (sec < 10){ 
    sec  = "0" + sec;
  }

  return min + ':' + sec;
}

function updateCount()
{
	var jqxhr = $.get( "getSessionPlaylist.php?command=COUNT", function(data) 
	{
		numberplaylist = data;
	});
}

function updateCurrentDataTrack()
{
	var jqxhr = $.get("getSessionPlaylist.php?command=GETCURRENTMUSIC&number="+currentplay,function(data)
	{
		var value = data.split("|");
		title = value[0];
		coverurl = value[1];
		mp3url = value[2];
		artist = value[3];
		count = value[4];
		
		$('.playerAudio_thumbnail_cover').attr('src',coverurl);
		
		if(title != '')
		{
			$('.playerMusicTitle').html(title);
		}
		
		if(artist != '')
		{
			$('.playerMusicArtistTitle').html(artist);
		}
		$('.playerMusicCount').html(count);
		$('#audioplayer').attr('src',mp3url);
		$('#audioplayer').load();
		
		if(isplaying)
		{
			var v = document.getElementsByTagName("audio")[0];
			v.play();
			if(demo)
			{
				timeout = setTimeout('stopMusic()', 30000);
				clearTimeout(timeout);
			}
		}
	});
}

function addPlaylistToPlay(id)
{
	var jqxhr = $.get("getSessionPlaylist.php?command=ADDPLAYLIST&id="+id,function(data)
	{
		isradioplaying = false;
		updateCount();
		playLastTrack();
	});
}

function playLastTrack()
{
	var jqxhr = $.get("getSessionPlaylist.php?command=GETLASTMUSIC",function(data)
	{
		var value = data.split("|");
		title = value[0];
		coverurl = value[1];
		mp3url = value[2];
		artist = value[3];
		count = value[4];
		
		$('#playerMusicCurrentTime').css('display','block');
		$('#playerMusicTrackLength').css('display','block');
		$('#playerMusicDurationTime').css('display','block');
		
		$('.playerAudio_thumbnail_cover').attr('src',coverurl);
		$('.playerMusicTitle').html(title);
		$('.playerMusicArtistTitle').html(artist);
		$('.playerMusicCount').html(count);
		$('#audioplayer').attr('src',mp3url);
		$('#audioplayer').load();
		
		currentplay = numberplaylist-1;
		$('#playerMusicButtonPlay').attr('src','images/player/playerMusic_pause.png');
		isplaying = true;
		
		var v = document.getElementsByTagName("audio")[0];
		v.play();
		nextactive = false;	
		if(demo)
		{
			timeout = setTimeout('stopMusic()', 30000);
			clearTimeout(timeout);
		}
	});
}

function addPlaylist(id)
{
	var jqxhr = $.get("getSessionPlaylist.php?command=ADDPLAYLIST&id="+id,function(data)
	{
		updateCount();
	});
}

updateCount();
updateCurrentDataTrack();
</script>

<!-- END PAGE LEVEL JAVASCRIPTS -->