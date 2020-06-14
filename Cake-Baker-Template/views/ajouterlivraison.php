<?PHP
include_once "../config.php";
include_once ("../entities/livraison.php");
include_once ("../core/livraisonC.php");
include_once ("../core/commandeC.php");
include_once ("../views/ajouterpanier.php");

$commande1C=new commandeC();
$commande2 = $commande1C->Uncommande();
foreach ($commande2 as $row) {
	$livraison1=new livraison(0,1,$row['refCommande']);
}

//Partie2
/*
var_dump($livraison1);
}
*/
//Partie3
$livraison1C=new livraisonC();
$livraison1C->ajouterLivraison($livraison1);
//
	
include_once ("../phpmailer/emailCommande.php");
header("location:../checkout.php");
//*/

?>