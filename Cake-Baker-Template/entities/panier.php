<?php

class panier
{
        private $idClient;
        private $idPanier;
        private $total;

    
    
    function __construct($idClient,$total)
    {
        $this->idClient=$idClient;
        $this->total=$total;
    }

    function getidClient(){
        return $this->idClient;}
    function getidPanier(){
            return $this->idPanier; }
    function gettotal(){
            return $this->total;}
}
?>