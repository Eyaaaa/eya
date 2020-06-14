<?php

class produit
{
	
		private $nom;
		private $idProduit;
		private $prix;
		private $image;
	
	function __construct($nom,$prix,$image)
	{
		$this->nom=$nom;
		$this->prix=$prix;
		$this->image=$image;
	}

    function getnom(){
    	return $this->nom;}
    function getnom(){
    	return $this->nom;}
    function getprix(){
    	return $this->prix;	}
    function getimage(){
    	return $this->image;	}

    function setnom($nom){
    	 $this->nom=$nom;}
    function setnom($nom){
    	 $this->nom=$nom;}
    function setprix($prix){
    	 $this->prix=$prix;	}
    function setimage($image){
    	 $this->image=$image;	
    		
    }
}
?>