<?PHP

include_once "../config.php";
include "../core/livreurC.php";
include "../core/livraisonC.php";
$livreurC=new livreurC();
$livraisonC=new livraisonC();
	$livreurC->disponibilitelivreur(1,$_POST["livreur"]);
	$livraisonC->affecterLivraison($_POST["livreur"],$_POST["id"]);
	$livraisonC->etatLivraison(1,$_POST["id"]);
	header('Location: ../livraison.php');


?>