<?PHP

class panierC {

	
function ajouterpanier($panier){
		$sql="insert into panier (idClient,total) values (:idClient,:total)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
        $idClient=$panier->getidClient();
        $total=$panier->gettotal(); 
		$req->bindValue(':idClient',$idClient);
		$req->bindValue(':total',$total);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
       }
		
	}
	
	function afficherpanier(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From panier";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function Unpanier(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From panier order by idPanier DESC LIMIT 1";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerpanier($idPanier){
		$sql="DELETE FROM panier where idPanier= :idPanier";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':idPanier',$idPanier);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifier($panier,$idPanier){
		$sql="UPDATE panier SET idClient=:idClient,total =:total, WHERE idPanier=:idPanier";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
        $idPanier=$panier->getidPanier();
        $idClient=$panier->getidClient();
        $total=$panier->gettotal();
        $req->bindValue(':idPanier',$idPanier);
		$req->bindValue(':idClient',$idClient);
		$req->bindValue(':total',$total);
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
	function recupererpanier($idPanier){
		$sql="SELECT * from panier where idPanier=$idPanier";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListepanier($idPanier){
		$sql="SELECT * from panier where idPanier=$idPanier";
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