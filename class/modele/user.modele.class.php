<?php
class user extends bdd{
		
	protected $id;
	protected $nom;
	protected $prenom;
	protected $email;
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
	
	public function get_prenom(){
		return $this->prenom;
	}
	
	public function get_email(){
		return $this->email;
	}
	
	public function get_code_postal(){
		return $this->code_postal;
	}
	
	public function get_ville(){
		return $this->ville;
	}
	
	public function set_id($id){
		$this->id = $id;
	}
	
	public function set_nom($nom){
		$this->nom = $nom;
	}
	
	public function set_prenom($prenom){
		$this->prenom = $prenom;
	}
	
	public function set_email($email){
		$this->email = $email;
	}
	
	public function set_code_postal($code_postal){
		$this->code_postal = $code_postal;
	}
	
	public function set_ville($ville){
		$this->ville = $ville;
	}
}
	
?>