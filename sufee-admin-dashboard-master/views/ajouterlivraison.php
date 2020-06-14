<?PHP
include_once "../config.php";
include_once ("../entities/livreur.php");
include_once ("../core/livreurC.php");

$livreur1=new livreur(0,1,1);
//Partie2
/*
var_dump($livreur1);
}
*/
//Partie3
$livreur1C=new livreurC();
$livreur1C->ajouterlivreur($livreur1);
//header("location:../contact.php")
	
//*/

?>