<?php

// Menu

class menu
{
	var $arrayMenu;
	
	function addMenu($title,$link,$icon,$level,$sublevel,$load)
	{
		$array['title'] = $title;
		$array['link'] = $link;
		$array['icon'] = $icon;
		$array['type'] = $load;
			
		if($level == -1)
		{
			$this->arrayMenu[count($this->arrayMenu)] = $array;
		}
		else
		{
			if($sublevel == -1)
			{
				$this->arrayMenu[$level][count($this->arrayMenu[$level])] = $array;
			}
			else
			{
				$this->arrayMenu[$level][$sublevel][count($this->arrayMenu[$level][$sublevel])] = $array;
			}
		}
	}
	
	function showMenu()
	{
		print_r($this->arrayMenu);
	
		echo '<div style="position:absolute;top:65px;width:202px;height:450px;z-index:4;">'."\n";
		echo '<nav class="navigation">'."\n";
		
		for($x=0;$x<count($this->arrayMenu);$x++)
		{
			$array = $this->arrayMenu[$x];
			$nav_tag = NULL;
			if($x==0)
			{
				echo '<a href="#" onclick="loadpage(\''.$array['link'].'\')" class="active home">'."\n";
			}
			else
			{
				if(count($array) > 3)
				{
					$nav_tag = "nav_".$x;
					echo '<a href="#'.$nav_tag.'" class="pink">'."\n";
				}
				else
				{
					echo "<a href=\"#\" onclick=\"loadpage('".$array['link']."')\" class=\"pink\">"."\n";
				}
			}
			echo '<span class="icon"><i class="'.$array['icon'].'"></i></span> <span class="content">'.$array['title'].'</span>'."\n";
			echo '</a>';
			
			// Navtag
			if($nav_tag != NULL)
			{
				echo '<div class="hide second_level" id="'.$nav_tag.'">'."\n";
			    echo '<a href="#" class="back">'."\n";
				echo '<i class="icon-chevron-left"></i>'."\n";
				echo '</a>'."\n";
				echo '<div class="content">'."\n";
				
				for($i = 0;$i<count($array);$i++)
				{
					$a = $array[$i];
					if($array['type'] == 1)
					{
						echo '<span class="content"><a href="#" onclick="'.$a['link'].'">'.$a['title'].'</a></span>'."\n";
					}
					else
					{
						echo '<span class="content"><a href="#" onclick="loadpage(\''.$a['link'].'\')">'.$a['title'].'</a></span>'."\n";
					}
				}
				
				echo '</div>'."\n";
				echo '</div>'."\n";
			}
		}
		
		echo '</nav>';
		echo '</div>';
	}
	
	function debug()
	{
		print_r($this->arrayMenu);
	}
	
	function loadMenu()
	{
		// Todo load menu database
	}

	function construct()
	{
		/*<div style="position:absolute;top:65px;width:202px;height:450px;z-index:4;">
<nav class="navigation">
			      <a href="index.php" class="active home">
			        <span class="icon"><i class="icon-home"></i></span> <span class="content">Accueil</span>			      </a>
			      <a href="agenda.php" class="pink">
			        <span class="icon"><i class="icon-website"></i></span> <span class="content">Agenda</span>			      </a>
			      <a href="#movies_nav" class="pink">
			        <span class="icon"><i class="icon-youtube"></i></span> <span class="content">Photo</span>			      </a>
			      <a href="#music_nav" class="pink">
			        <span class="icon"><i class="icon-headphones"></i></span> <span class="content">Audio</span>			      </a>
			      <div class="hide second_level" id="music_nav">
			        <a href="#" class="back">
			          <i class="icon-chevron-left"></i>			        </a>
			        <div class="content">
			           <span class="content"><a href="#">Popular Music</a></span>
                       <ul class="unfold_menu" style="display:none;">
                       <li><a href="#">Menu 41</a></li>
                       <li><a href="#">Menu 42</a></li>
                       <li><a href="#">Menu 43</a></li>
                       <li><a href="#">Menu 44</a></li>
                       <li><a href="#">Menu 45</a></li>
                       </ul>
			           <span class="content"><a href="#">Most Viewed Music</a></span>
                       <ul class="unfold_menu" style="display:none;">
                       <li><a href="#">Menu 46</a></li>
                       <li><a href="#">Menu 47</a></li>
                       <li><a href="#">Menu 48</a></li>
                       <li><a href="#">Menu 49</a></li>
                       <li><a href="#">Menu 50</a></li>
                       </ul>
			           <span class="content"><a href="#">Most Commented Music</a></span>
                       <ul class="unfold_menu" style="display:none;">
                       <li><a href="#">Menu 51</a></li>
                       <li><a href="#">Menu 52</a></li>
                       <li><a href="#">Menu 53</a></li>
                       <li><a href="#">Menu 54</a></li>
                       <li><a href="#">Menu 55</a></li>
                       </ul>
                       <span class="content"><a href="#">Recent Music</a></span>
                       <ul class="unfold_menu" style="display:none;">
                       <li><a href="#">Menu 56</a></li>
                       <li><a href="#">Menu 57</a></li>
                       <li><a href="#">Menu 58</a></li>
                       <li><a href="#">Menu 59</a></li>
                       <li><a href="#">Menu 60</a></li>
                       </ul>
                       </div>
			      </div>
			      <a href="#books_nav" class="pink">
			        <span class="icon"><i class="icon-book"></i></span> <span class="content">Video</span>			      </a>
			      <div class="hide second_level" id="books_nav">
			        <a href="#" class="back">
			          <i class="icon-chevron-left"></i>			        </a>
			        <div class="content">
			           <span class="content"><a href="video.php">Dance Shows</a></span>
			           <span class="content"><a href="video.php">Dance Workshops</a></span>
			           <span class="content"><a href="video.php">Dance Party</a></span>
                       <span class="content"><a href="video.php">Salsa Cubaine</a></span>
                       <span class="content"><a href="video.php">Salsa Portoricaine</a></span>
					   <span class="content"><a href="video.php">Bachata</a></span>
					   <span class="content"><a href="video.php">Kizomba</a></span>
					   <span class="content"><a href="video.php">Reggeaton</a></span>
                       </div>
			      </div>
			      <a href="#magazines_nav" class="pink">
			        <span class="icon"><i class="icon-picture"></i></span> <span class="content">Radio</span>			      </a>
			      <div class="hide second_level" id="magazines_nav">
			        <a href="#" class="back">
			          <i class="icon-chevron-left"></i>			        </a>
			        <div class="content">
			           <span class="content"><a href="#">Salsa Cubaine</a></span>
			           <span class="content"><a href="#">Bachata</a></span>
			           <span class="content"><a href="#">Salsa Portoricaine</a></span>
			           <span class="content"><a href="#">Kizomba</a></span>
                       </div>
			      </div>
			      <a href="#devices_nav" class="pink">
			        <span class="icon"><i class="icon-screen"></i></span> <span class="content">TV</span>			      </a>
			      <div class="hide second_level" id="devices_nav">
			        <a href="#" class="back">
			          <i class="icon-chevron-left"></i>			        </a>
			        <div class="content">
                       <span class="content"><a href="#">Salsa Cubaine</a></span>
                       <span class="content"><a href="#">Bachata</a></span>
                       <span class="content"><a href="#">Salsa Portoricaine</a></span>
                       <span class="content"><a href="#">Kizomba</a></span>
                       </div>
			      </div>
				  <a href="#devices_nav" class="pink">
			        <span class="icon"><i class="icon-screen"></i></span> <span class="content">Suivez-nous</span>			      </a>
			      <div class="hide second_level" id="devices_nav">
			        <a href="#" class="back">
			          <i class="icon-chevron-left"></i>			        </a>
			        <div class="content">
                       <span class="content"><a href="#">Nord-Ouest</a></span>
                       <ul class="unfold_menu" style="display:none;">
                       <li><a href="#">Basse Normandie</a></li>
                       <li><a href="#">Haute Normandie</a></li>
                       <li><a href="#">Bretagne</a></li>
                       <li><a href="#">Pays-de-la-loire</a></li>
                       <li><a href="#">Poitou-Charentes</a></li>
                       </ul>
                       <span class="content"><a href="#">Nord & Nord Est</a></span>
                       <ul class="unfold_menu" style="display:none;">
                       <li><a href="#">Menu 106</a></li>
                       <li><a href="#">Menu 107</a></li>
                       <li><a href="#">Menu 108</a></li>
                       <li><a href="#">Menu 109</a></li>
                       <li><a href="#">Menu 110</a></li>
                       </ul>
                       <span class="content"><a href="#">Centre</a></span>
                       <ul class="unfold_menu" style="display:none;">
                       <li><a href="#">Menu 111</a></li>
                       <li><a href="#">Menu 112</a></li>
                       <li><a href="#">Menu 113</a></li>
                       <li><a href="#">Menu 114</a></li>
                       <li><a href="#">Menu 115</a></li>
                       </ul>
                       <span class="content"><a href="#">Sud Est & Ouest</a></span>
                       <ul class="unfold_menu" style="display:none;">
                       <li><a href="#">Menu 116</a></li>
                       <li><a href="#">Menu 117</a></li>
                       <li><a href="#">Menu 118</a></li>
                       <li><a href="#">Menu 119</a></li>
                       <li><a href="#">Menu 120</a></li>
                       </ul>
					    <span class="content"><a href="#">Ile de France & Domtom</a></span>
                       <ul class="unfold_menu" style="display:none;">
                       <li><a href="#">Menu 116</a></li>
                       <li><a href="#">Menu 117</a></li>
                       <li><a href="#">Menu 118</a></li>
                       <li><a href="#">Menu 119</a></li>
                       <li><a href="#">Menu 120</a></li>
                       </ul>
                       </div>
			      </div>
			    </nav>
	      	</div>
		</div>
</div>*/
	}

	function showJS()
	{
		echo '<script>
			  $(window).load(function () {
				$(".navigation > a").click(function() {
				  if (!$(this).hasClass("active")) {
					$(".navigation").unbind(\'mouseleave\');
					$(".navigation .second_level").removeClass("animated fadeInDown").hide();
					var el = $(this);
					el.addClass("hover");
					$(".navigation > a.active").fadeOut("fast", function() {
					  var prev = $(this)
					  prev.removeClass(\'active\');
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
					  $(this).unbind(\'mouseleave\');
					  $(".navigation > a:visible:not(.active)").hide().removeClass("fadeInLeft animated");
					  el.closest(".second_level").addClass("animated fadeInDown").show();
					});
				  });
			  });
			</script>';
	}
}

?>