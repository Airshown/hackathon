<?php
class hotel extends bdd{
		
	protected $id;
	protected $nom;
	protected $numero;
	protected $complement_numero;
	protected $code_postal;
	protected $ville;
	
				
	public function __construct(){
		parent::__construct();
	}
	
	public function setFromBdd($var = []){
		foreach($var as $key => $value){
			$this->$key = $value;
		}
	}
	
	public function get_id(){
		return $this->id;
	}
	
	public function get_nom(){
		return $this->nom;
	}
	
	public function get_numero(){
		return $this->numero;
	}
	
	public function get_complement_numero(){
		return $this->complement_numero;
	}
	
	public function get_code_postal(){
		return $this->code_postal;
	}
	
	public function get_ville(){
		return $this->ville;
	}
	
	public function set_id(){
		$this->id = $id;
	}
	
	public function set_nom(){
		$this->nom = $nom;
	}
	
	public function set_numero(){
		$this->numero = $numeor;
	}
	
	public function set_complement_numero(){
		$this->complement_numero = $complement_numero;
	}
	
	public function set_code_postal(){
		$this->code_postal = $code_postal;
	}
	
	public function set_ville(){
		$this->ville = $ville;
	}
	
	
}
	
?>