<?PHP

include_once "../config.php";
include "../core/livreurC.php";
$livreurC=new livreurC();
	$livreurC->supprimerlivreur($_POST["id"]);
	header('Location: ../livreur.php');


?>