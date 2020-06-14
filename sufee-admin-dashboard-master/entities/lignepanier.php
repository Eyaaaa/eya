<?php

class Lignepanier
{
	
		private $idLig;
		private $idProduit;
		private $idPanier;
		private $Qte;
	
	function __construct($idProduit,$idPanier,$Qte)
	{
		$this->idProduit=$idProduit;
		$this->idPanier=$idPanier;
		$this->Qte=$Qte;
	}

    function getidLig(){
    	return $this->idLig;}
    function getidProduit(){
    	return $this->idProduit;}
    function getidPanier(){
    	return $this->idPanier;	}
    function getQte(){
    	return $this->Qte;	}

    function setidLig($idLig){
    	 $this->idLig=$idLig;}
    function setidProduit($idProduit){
    	 $this->idProduit=$idProduit;}
    function setidPanier($idPanier){
    	 $this->idPanier=$idPanier;	}
    function setQte($Qte){
    	 $this->Qte=$Qte;	
    		
    }
}
?>