<?PHP
include "../config.php";
include ("../entities/livraison.php");
include ("../core/livraisonC.php");

$livraison1=new livraison(0,1,1);
//Partie2
/*
var_dump($livraison1);
}
*/
//Partie3
$livraison1C=new livraisonC();
$livraison1C->ajouterLivraison($livraison1);
//header("location:../contact.php")
	
//*/

?>