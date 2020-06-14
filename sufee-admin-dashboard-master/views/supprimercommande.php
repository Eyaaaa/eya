<?PHP

include_once "../config.php";
include "../core/commandeC.php";
$commandeC=new commandeC();
	$commandeC->supprimercommande($_POST["id"]);
	header('Location: ../commande.php');


?>