<?php

// DatePicker BootStrap
// Linaven 2014

class datepickerBootstrap
{
	function showCSS()
	{
		if(file_exists('css/bootstrap-datepicker.css'))
		{
			echo "<link rel='stylesheet' href='css/bootstrap-datepicker.css' type='text/css' media='all' />";
		}
		else
		{
			echo "Fichier manquant : bootstrap-datepicker.css";
		}
		
		if(file_exists('css/bootstrap.css'))
		{
			echo "<link rel='stylesheet' href='css/bootstrap.css' type='text/css' media='all' />";
		}
		else
		{
			echo "Fichier manquant : bootstrap.css";
		}
	}
	
	function showJS()
	{
		if(file_exists('js/bootstrap-datepicker.js'))
		{
			echo "<script type='text/javascript' src='js/bootstrap-datepicker.js'></script>";
			echo "<script>";
			echo "$('.datepicker').datepicker();";
			echo "</script>";
		}
		else
		{
			echo "Fichier manquant : bootstrap-datapicker.js";
		}
	}
	
	function showDatePicker($placeholder,$value,$addcss)
	{
		echo '<input type="text" class="datepicker '.$addcss.'" placeholder="'.$placeholder.'" value="'.$value.'">';
	}
}

?>