<?php

class commande
{
        private $idClient;
        private $idPanier;
        private $total;
        private $refCommande;
        private $etat;
        private $date;

    
    
    function __construct($idClient,$total,$idPanier)
    {
        $this->idClient=$idClient;
        $this->total=$total;
        $this->idPanier=$idPanier;
    }

    function getidClient(){
        return $this->idClient;}
    function getidPanier(){
            return $this->idPanier; }
    function gettotal(){
            return $this->total;}
    function getetat(){
            return $this->etat;}}
?>