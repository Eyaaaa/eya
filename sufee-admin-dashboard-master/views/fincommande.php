<?PHP
include_once "../core/commandeC.php";
$commandeC=new commandeC();
	$commandeC->modifierEtat($_GET["commande"]);
	include_once "../phpmailer/receptCommande.php";
?>