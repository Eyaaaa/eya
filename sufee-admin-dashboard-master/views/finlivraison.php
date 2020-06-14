<?PHP

include_once "../config.php";
include_once "../core/livreurC.php";
include_once "../core/livraisonC.php";
include_once "../core/commandeC.php";
$commandeCC=new commandeC();
$livreur3C=new livreurC();
$livraisonC=new livraisonC();
	$livreur3C->disponibilitelivreur(0,$_GET["livreur"]);
	$livraisonC->affecterLivraison($_GET["livreur"],$_GET["id"]);
	$livraisonC->etatLivraison(2,$_GET["id"]);
	$livraisonC->finLivraison($_GET["id"]);
	$commandeCC->modifierEtat($_GET["commande"]);
	include_once "../phpmailer/receptCommande.php";
	
header('Location: ../livraison.php');


?>