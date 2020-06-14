<?PHP
class livraison{
	private $idlivraison;
	private $tempsestime;
	private $datelivraison;
	private $etat;
	private $idclient;
	private $refcommande;
	private $idlivreur;
	function __construct($etat,$idclient,$refcommande){
		$this->etat=$etat;
		$this->idclient=$idclient;
		$this->refcommande=$refcommande;
	}
	
	function getidlivraison(){
		return $this->idlivraison;
	}
	function gettempsestime(){
		return $this->tempsestime;
	}
	function getdatelivraison(){
		return $this->datelivraison;
	}
	function getetat(){
		return $this->etat;
	}
	function getidclient(){
		return $this->idclient;
	}
	function getrefcommande(){
		return $this->refcommande;
	}
	function getidlivreur(){
		return $this->idlivreur;
	}

	
}

?>