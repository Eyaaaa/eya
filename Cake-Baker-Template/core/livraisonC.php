<?PHP
class livraisonC {
	function ajouterLivraison($livraison){
		$sql="insert into livraison (idclient,etat,refcommande) values (:idclient,:etat,:refcommande)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $idclient=$livraison->getidclient();
        $etat=$livraison->getetat();
        $refcommande=$livraison->getrefcommande();
		$req->bindValue(':idclient',$idclient);
		$req->bindValue(':etat',$etat);
		$req->bindValue(':refcommande',$refcommande);	
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherLivraison(){
		//$sql="SElECT * From livraison e inner join formationphp.livraison a on e.cin= a.cin";
		$sql="SElECT * From livraison";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerLivraison($idlivraison){
		$sql="DELETE FROM livraison where idlivraison= :idlivraison";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':idlivraison',$idlivraison);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function affecterLivraison($idlivreur,$cin){
		$sql="UPDATE livraison SET idlivreur=:idlivreur WHERE idlivraison=:cin";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$idlivreur=$idlivreur;
		$req->bindValue(':idlivreur',$idlivreur);
		$req->bindValue(':cin',$cin);
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }
		
	}

	function etatLivraison($idlivreur,$cin){
		$sql="UPDATE livraison SET etat=:idlivreur WHERE idlivraison=:cin";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$idlivreur=$idlivreur;
		$req->bindValue(':idlivreur',$idlivreur);
		$req->bindValue(':cin',$cin);
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }
		
	}

	function finLivraison($idlivreur,$cin){
		$sql="UPDATE livraison SET datelivraison=:datelivraison, etat=:idlivreur WHERE idlivraison=:cin";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$idlivreur=$idlivreur;
		$datelivraison=time();
		$req->bindValue(':idlivreur',$idlivreur);
		$req->bindValue(':datelivraison',$datelivraison);
		$req->bindValue(':cin',$cin);
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }
		
	}
	function recupererLivraison($idlivraison){
		$sql="SELECT * from livraison where idlivraison=$idlivraison";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function recupererclient($idclient){
		$sql="SELECT * from client where idclient=$idclient";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListeLivraisons($tarif){
		$sql="SELECT * from livraison where idlivreur=$tarif";
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