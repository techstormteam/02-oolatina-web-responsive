<?php

// Image Traitement - http://studio.shua-creation.com
// Copyright 2014

class image_api
{
	var $image;
	var $width;
	var $height;

	// Chargement de l'image
	function loadImage($filename)
	{
		$extension = strtolower($filename);
		$extension = explode(".",$filename);
		$extension = $extension[count($extension)-1];
		if($extension == 'jpg')
		{
			$this->image = imagecreatefromjpeg($filename);
			$this->width = imagesx($this->image);
			$this->height = imagesy($this->image);
			
		}
		else if($extension == 'png')
		{
			$this->image = imagecreatefrompng($filename);
			$this->width = imagesx($this->image);
			$this->height = imagesy($this->image);
		}
		else if($extension == 'gif')
		{
			$this->image = imagecreatefromgif($filename);
			$this->width = imagesx($this->image);
			$this->height = imagesy($this->image);
		}
		else
		{
			echo "*** ERREUR *** Image non supporté";
			exit;
		}
	}
	
	// Force resizing image
	function forceResize($width,$height)
	{
		$img = imagecreatetruecolor($width,$height);
		imagecopyresized($img,$this->image,0,0,0,0,$width,$height,$this->width,$this->height);
		return $img;
	}
	
	// Force resample image
	function forceResample($width,$height)
	{
		$img = imagecreatetruecolor($width,$height);
		imagecopyresampled($img,$this->image,0,0,0,0,$width,$height,$this->width,$this->height);
		return $img;
	}
	
	// Resize Respect Ratio
	function respectRatioResize($width,$height,$format)
	{
		$widthOrigin = imagesx($this->image);
		$heigthOrigin = imagesy($this->image);

		$img = imagecreatetruecolor($width,$height);

		if ($widthOrigin > $heigthOrigin) 
		{
		  $image_height = floor(($heigthOrigin/$widthOrigin)*$width);
		  $image_width  = $width;
		}
		else 
		{
		  $image_width  = floor(($widthOrigin/$heigthOrigin)*$height);
		  $image_height = $height;
		}
				
		imagecopyresampled($img ,$this->image,($width-$image_width)/2,($image_height-$height)/2,0,0,$image_width,$image_height,$widthOrigin, $heigthOrigin);
		$this->showImageHeader($format,$img);
	}
	
	function respectRatioResize2($width,$height,$format)
	{
		$widthOrigin = imagesx($this->image);
		$heigthOrigin = imagesy($this->image);
		
		$img = imagecreatetruecolor($width,$height);
		
		if($width > $height)
		{
			$nRatio = $width;
		}
		else
		{
			$nRatio = $height;
		}
		
		if($widthOrigin > $heigthOrigin)
		{
			$ratio = $widthOrigin / $nRatio;
		}
		else
		{
			$ratio = $heigthOrigin / $nRatio;
		}
		
		if($heigthOrigin/$ratio < $height)
		{
			$heightComp = ($height-($heigthOrigin/$ratio))/2;
		}
		
		if($widthOrigin/$ratio < $width)
		{
			$widthComp = ($width-($widthOrigin/$ratio))/2;
		}
		
		imagecopyresampled($img ,$this->image,$widthComp,$heightComp,0,0,$widthOrigin/$ratio,$heigthOrigin/$ratio,$widthOrigin,$heigthOrigin);
		$this->showImageHeader($format,$img);
	}
	
	function saveImage($format,$img,$path,$quality)
	{
		if($format == 'jpg')
		{
			imagejpeg($img,$path,$quality);
		}
		
		if($format == 'gif')
		{
			imagegif($img,$path);
		}
		
		if($format == 'png')
		{
			imagepng($img,$path);
		}
	}
	
	// Show image header
	function showImageHeader($format,$img)
	{
		if($format == 'gif')
		{
			header("Content-type: image/gif");
			imagegif($img);
		}
		
		if($format == 'png')
		{
			header("Content-type: image/png");
			imagepng($img);
		}
		
		if($format == 'jpg')
		{
			header("Content-type: image/jpeg");
			imagejpeg($img);
		}
	}
}

?>