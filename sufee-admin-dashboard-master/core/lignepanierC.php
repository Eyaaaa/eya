<?PHP

class lignepanierC {

	
function ajouterlignepanier($lignepanier){
		$sql="insert into lignepanier (idProduit,idPanier,Qte) values (:idProduit,:idPanier, :Qte)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
        $idProduit=$lignepanier->getidProduit();
        $idPanier=$lignepanier->getidPanier();
        $Qte=$lignepanier->getQte(); 
        $req->bindValue(':idProduit',$idProduit);
		$req->bindValue(':idPanier',$idPanier);
		$req->bindValue(':Qte',$Qte);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
       }
		
	}
	
	function afficherlignepanier(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From lignepanier";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerlignepanier($idLig){
		$sql="DELETE FROM lignepanier where idPanier= :idLig";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':idLig',$idLig);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifier($lignepanier,$idLig){
		$sql="UPDATE lignepanier SET idProduit=:idProduit, idPanier=:idPanier, Qte =:Qte WHERE idLig=:idLig";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$idProduit=$lignepanier->getidProduit();
        $idPanier=$lignepanier->getidPanier();
        $Qte=$lignepanier->getQte();
		$req->bindValue(':idLig',$idLig);
		$req->bindValue(':idProduit',$idProduit);
		$req->bindValue(':idPanier',$idPanier);
		$req->bindValue(':Qte',$Qte);
		
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
	function recupererlignepanier($idLig){
		$sql="SELECT * from lignepanier where idPanier=$idLig";
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