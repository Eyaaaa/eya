<?PHP

include_once "../config.php";
include "../core/livraisonC.php";
$livraisonC=new livraisonC();
	$livraisonC->supprimerlivraison($_POST["id"]);
	header('Location: ../livraison.php');


?>