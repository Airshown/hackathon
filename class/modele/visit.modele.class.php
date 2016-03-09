<?php
class visit extends bdd{
		
	protected $id;
	protected $user;
	protected $hotel;
	protected $date_debut;
	protected $date_fin;
	
				
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
	
	public function get_user(){
		return $this->user;
	}
	
	public function get_hotel(){
		return $this->hotel;
	}
	
	public function get_date_debut(){
		return $this->date_debut;
	}
	
	public function get_date_fin(){
		return $this->date_fin;
	}
	
	public function set_id($id){
		$this->id = $id;
	}
	
	public function set_user($user){
		$this->user = $user;
	}
	
	public function set_hotel($hotel){
		$this->hotel = $hotel;
	}
	
	public function set_date_debut($date_debut){
		$this->date_debut = $date_debut;
	}
	
	public function set_date_fin($date_fin){
		$this->date_fin = $date_fin;
	}


}
	
?>