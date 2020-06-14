<?php
session_start();
include_once "../config.php";
include_once ("../entities/commande.php");
include_once ("../core/commandeC.php");
include_once "../entities/panier.php";
include_once "../core/panierC.php";
include_once "../entities/lignepanier.php";
include_once "../core/lignepanierC.php";
$user=$_SESSION['user'];

$panier1 = new panier ($user['id'],$_GET['total'],0,$_GET['total']) ;
$panier1C = new panierC();
$panier1C->ajouterpanier($panier1);
$panier2 = $panier1C->Unpanier();
$lignes=$_SESSION['panier'];
$nombre=0;
foreach ($panier2 as $raw) {
	foreach ($lignes as $row) {
		if($nombre!=1)
                  {$nombre=1;}
                else{
		$lignepanier1 = new lignepanier ($row['id'],$raw['idPanier'],$row['quantite']) ;
		$commande1=new commande($user['id'],$_GET['total'],$raw['idPanier']);
$lignepanier1C = new lignepanierC();
$lignepanier1C->ajouterlignepanier($lignepanier1);
$commande1C=new commandeC();
$commande1C->ajoutercommande($commande1);
}
	}
}
$id = $raw['idPanier'];
unset($_SESSION['panier']);
?>
