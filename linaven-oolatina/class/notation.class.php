<?php

// Classe de notation copyright http://studio.shua-creation.com 2014

class sc_notation
{
	var $number_star;
	var $note;
	var $star_off;
	var $star_on;
	var $number_active;
	var $id;
	var $urlscript;
	
	// Constructeur
	public function __construct($number_star,$image_stars_on,$image_stars_off,$id,$urlscript)
	{
		$this->urlscript = $urlscript;
		$this->id = $id;
		$this->number_star = $number_star;
		$this->star_off = $image_stars_off;
		$this->star_on = $image_stars_on;
		$this->number_active = 0;
	}
	
	// Permet de set le nombre d'étoile
	public function setNumberStarsActive($number)
	{
		$this->number_active = $number;
	}
	
	// Permet l'affichage de la notation
	public function show()
	{	
		$nStars = 0;
		echo '<div class="stars_notation" id="'.$this->id.'">';
		for($x = 0;$x < $this->number_star;$x++)
		{
			if($nStars >= $this->number_active)
			{
				echo '<img src="'.$this->star_off.'" class="stars" id="'.($nStars).'-'.$this->number_star.'-'.$this->id.'">';
			}
			else
			{
				echo '<img src="'.$this->star_on.'" class="stars" id="'.($nStars).'-'.$this->number_star.'-'.$this->id.'">';
			}
			$nStars++;
		}
		echo '</div>';
	}
	
	// Permet la creation du script javascript requête ajax inclus pour l'update de la notation
	public function show_javascript()
	{
		echo '<script>
			$( ".stars" ).click(function() 
			{
				var id = $(this).attr(\'id\');
				var array = id.split(\'-\');
				var number = array[0];
				var total = array[1];
				var nid = array[2];
				
				var n = (number);
				for(var x=0;x<total;x++)
				{
					if(x <= n)
					{
						$(\'#\'+x+\'-\'+total+\'-\'+nid).attr(\'src\',\''.$this->star_on.'\');
					}
					else
					{
						$(\'#\'+x+\'-\'+total+\'-\'+nid).attr(\'src\',\''.$this->star_off.'\');
					}
				}
				
				$.get("'.$this->urlscript.'?nid="+nid+"&set="+number, function( data ) 
				{
					alert( "Load was performed." );
				});
				
			});
			</script>';
	}
}

?>