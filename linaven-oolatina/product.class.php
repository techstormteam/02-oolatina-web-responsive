<?php

// Classe produit

class product
{
	var $idproduct;
	var $idoption;
	var $supplementArray;

	public function __construct()
	{
		$this->clear();
	}
	
	public function setIdProduct($id)
	{
		$this->idproduct = $id;
	}
	
	public function setOption($id)
	{
		$this->idoption = $id;
	}
	
	public function addSupplement($id)
	{
		$this->supplementArray[count($this->supplementArray)] = $id;
	}
	
	public function clear()
	{
		$this->idproduct = NULL;
		$this->idoption = NULL;
		$this->supplementArray = array();		
	}
}

?>