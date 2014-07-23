<?php

class panier
{
	var $debugActive;

	public function __construct($debug = NULL)
	{
		if($debug)
		{
			$this->debugActive = $debug;
		}
		else
		{
			$this->debugActive = false;
		}
		
		session_start();
		if(!isset($_SESSION['panier']))
		{
			if($this->debugActive)
			{
				echo "Construction du panier...";
			}
			$_SESSION['panier'] = array();
		}
	}
	
	// Ajout d'un produit, Simple, Avec une Option, Avec des Suppléments.
	public function addProduct($id,$optionid = NULL,$arraySupplement = NULL)
	{
		// Recherche si le produit n'as pas déjà été ajouter
		for($x=0;$x<count($_SESSION['panier']);$x++)
		{
			if($_SESSION['panier'][$x]['id'] == $id)
			{
				if(isset($_SESSION['panier'][$x]['optionid']))
				{
					if($_SESSION['panier'][$x]['optionid'] == $optionid)
					{
						if(isset($_SESSION['panier'][$x]['supplement']))
						{
							if(isset($arraySupplement))
							{
								if($_SESSION['panier'][$x]['supplement'] == $arraySupplement)
								{
									$_SESSION['panier'][$x]['quantity'] = $_SESSION['panier'][$x]['quantity']+1;
									return;
								}
							}
						}
						else
						{
							$_SESSION['panier'][$x]['quantity'] = $_SESSION['panier'][$x]['quantity']+1;
							return;
						}
					}
				}
				else
				{
					$_SESSION['panier'][$x]['quantity'] = $_SESSION['panier'][$x]['quantity']+1;
					return;
				}
			}
		}
	
		// Si le produit n'as pas été trouver il est ajouter normalement.
		$count = count($_SESSION['panier']);
		$_SESSION['panier'][$count]['quantity'] = 1;
		$_SESSION['panier'][$count]['id'] = $id;
		if($optionid)
		{
			$_SESSION['panier'][$count]['optionid'] = $optionid;
		}
		if($arraySupplement)
		{
			$_SESSION['panier'][$count]['supplement'] = $arraySupplement;
		}
	}
	
	// Permet la suppression complete d'un produit.
	public function deleteProduct($arrayNumber)
	{
		unset($_SESSION['panier'][$arrayNumber]);
		$_SESSION['panier'] = array_values($_SESSION['panier']);
	}
	
	// Permet de changer la quantity dynamiquement
	public function setQuantityProduct($arrayNumber,$quantity)
	{
		$_SESSION['panier'][$arrayNumber]['quantity'] = $quantity;
	}
	
	// Renvoie le nombre d'élément dans le panier
	public function count()
	{
		$count = 0;
		if(isset($_SESSION['panier']))
		{
			for($x=0;$x<count($_SESSION['panier']);$x++)
			{
				$qty = $_SESSION['panier'][$x]['quantity'];
				$count = $count+$qty;
			}
			return $count;
		}
		
		return $count;
	}
	
	public function debug()
	{
		if($this->debugActive)
		{
			if(isset($_SESSION['panier']))
			{
				echo "Count Panier : ".count($_SESSION['panier'])."<br>";
				print_r($_SESSION['panier']);
			}
			else
			{
				echo "Panier non initialisé...";
			}
		}
	}
	
	// Renvoie la liste du Panier
	public function getArrayPanier()
	{
		$array = array();
		if(isset($_SESSION['panier']))
		{
			for($x=0;$x<count($_SESSION['panier']);$x++)
			{
				$qty = $_SESSION['panier'][$x]['quantity'];
				$id = $_SESSION['panier'][$x]['id'];
				if(isset($_SESSION['panier'][$x]['supplement']))
				{
					$array[$x]['arrayNumber'] = $x;
					$array[$x]['qty'] = $qty;
					$array[$x]['id'] = $id;
					if(isset($_SESSION['panier'][$x]['optionid']))
					{
						$array[$x]['optionid'] = $_SESSION['panier'][$x]['optionid'];
					}
					$array[$x]['supplement'] = $_SESSION['panier'][$x]['supplement'];
				}
				else
				{
					$array[$x]['arrayNumber'] = $x;
					$array[$x]['qty'] = $qty;
					$array[$x]['id'] = $id;
					if(isset($_SESSION['panier'][$x]['optionid']))
					{
						$array[$x]['optionid'] = $_SESSION['panier'][$x]['optionid'];
					}
				}
			}
		}
		return $array;
	}
	
	// Destruction du panier
	public function clean()
	{
		unset($_SESSION['panier']);		
	}
}

?>