<?PHP
class livreurC {
	function ajouterlivreur($livreur){
		$sql="insert into livreur (nomlivreur,prenomlivreur,ncin,npermis,disponibilite) values (:nomlivreur, :prenomlivreur,:ncin,:npermis,:disponibilite)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $nomlivreur=$livreur->getnomlivreur();
        $prenomlivreur=$livreur->getprenomlivreur();
        $ncin=$livreur->getncin();
        $npermis=$livreur->getnpermis();
        $disponibilite=$livreur->getdisponibilite();
		$req->bindValue(':nomlivreur',$nomlivreur);
		$req->bindValue(':prenomlivreur',$prenomlivreur);
		$req->bindValue(':ncin',$ncin);
		$req->bindValue(':npermis',$npermis);
		$req->bindValue(':disponibilite',$disponibilite);	
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherlivreur(){
		//$sql="SElECT * From livreur e inner join formationphp.livreur a on e.cin= a.cin";
		$sql="SElECT * From livreur";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerlivreur($idlivreur){
		$sql="DELETE FROM livreur where idlivreur= :idlivreur";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':idlivreur',$idlivreur);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierlivreur($livreur,$cin){
		$sql="UPDATE livreur SET nomlivreur=:nomlivreur, prenomlivreur=:prenomlivreur, ncin=:ncin, disponibilite=:disponibilite, npermis=:npermis WHERE idlivreur=:cin";
		
		$db = config::getConnexion();
		//$db->snpermistribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
        $nomlivreur=$livreur->getnomlivreur();
        $prenomlivreur=$livreur->getprenomlivreur();
        $ncin=$livreur->getncin();
        $npermis=$livreur->getnpermis();
        $disponibilite=$livreur->getdisponibilite();
		$req->bindValue(':nomlivreur',$nomlivreur);
		$req->bindValue(':prenomlivreur',$prenomlivreur);
		$req->bindValue(':ncin',$ncin);
		$req->bindValue(':disponibilite',$disponibilite);
		$req->bindValue(':npermis',$npermis);
		$req->bindValue(':cin',$cin);
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }
		
	}

	function disponibilitelivreur($idlivreur,$cin){
		$sql="UPDATE livreur SET disponibilite=:idlivreur WHERE idlivreur=:cin";
		
		$db = config::getConnexion();
		//$db->snpermistribute(PDO::ATTR_EMULATE_PREPARES,false);
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

	
	function recupererlivreur($idlivreur){
		$sql="SELECT * from livreur where idlivreur=$idlivreur";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function rechercherListelivreurs($tarif){
		$sql="SELECT * from livreur where idlivreur=$tarif";
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