<?PHP

class commandeC {

	
function ajoutercommande($commande){
		$sql="insert into commande (idClient,total,idPanier) values (:idClient,:total,:idPanier)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
        $idClient=$commande->getidClient();
        $total=$commande->gettotal(); 
        $idPanier=$commande->getidPanier(); 
		$req->bindValue(':idClient',$idClient);
		$req->bindValue(':total',$total);
		$req->bindValue(':idPanier',$idPanier);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
       }
		
	}
	
	function affichercommande(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From commande";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function Uncommande(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From commande order by refCommande DESC LIMIT 1";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimercommande($idcommande){
		$sql="DELETE FROM commande where refCommande= :idcommande";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':idcommande',$idcommande);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierEtat($idcommande){
		$sql="UPDATE commande SET etat=:etat WHERE refCommande=:idcommande";
		$fin="Terminee";
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
        $req->bindValue(':idcommande',$idcommande);
        $req->bindValue(':etat',$fin);
            $s=$req->execute(); 
       exit();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   /*
  print_r($datas);*/
        }
		
	}
	function recuperercommande($idcommande){
		$sql="SELECT * from commande where refCommande=$idcommande";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListecommande($idcommande){
		$sql="SELECT * from commande where refCommande=$idcommande";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	
}

?>