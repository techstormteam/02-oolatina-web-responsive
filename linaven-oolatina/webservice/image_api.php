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