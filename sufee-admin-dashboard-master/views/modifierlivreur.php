<?PHP
include_once "../config.php";
include_once ("../entities/livreur.php");
include_once ("../core/livreurC.php");

$livreur1=new livreur($_POST['prenom'],$_POST['nom'],$_POST['ncin'],$_POST['npermis'],0);
//Partie2
/*
var_dump($livreur1);
}
*/
//Partie3
$livreur1C=new livreurC();
$livreur1C->modifierlivreur($livreur1,$_POST['id']);
	header('Location: ../livreur.php');
	
//*/

?>