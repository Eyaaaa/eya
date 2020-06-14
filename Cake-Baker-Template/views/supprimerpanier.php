<?PHP
include "../config.php";
include "../core/panierC.php";
include "../core/lignepanierC.php";
$panier1=new panierC();
$lignepanier1=new lignepanierC();

if (isset($_POST["panier"])){
	$panier1->supprimerpanier($_POST["panier"]);
	$lignepanier1->supprimerlignepanier($_POST["panier"]);
	header('Location:../product_list_php.php');
}

?>