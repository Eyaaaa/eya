<?PHP
class livreur{
	private $idlivreur;
	private $prenomlivreur;
	private $nomlivreur;
	private $ncin;
	private $npermis;
	private $disponibilite;
	function __construct($prenomlivreur,$nomlivreur,$ncin,$npermis,$disponibilite){
		$this->prenomlivreur=$prenomlivreur;
		$this->nomlivreur=$nomlivreur;
		$this->ncin=$ncin;
		$this->npermis=$npermis;
		$this->disponibilite=$disponibilite;
	}
	
	function getidlivreur(){
		return $this->idlivreur;
	}
	function getprenomlivreur(){
		return $this->prenomlivreur;
	}
	function getnomlivreur(){
		return $this->nomlivreur;
	}
	function getncin(){
		return $this->ncin;
	}
	function getnpermis(){
		return $this->npermis;
	}
	function getdisponibilite(){
		return $this->disponibilite;
	}

	
}

?>