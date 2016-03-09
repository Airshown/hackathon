<?php
class activities extends bdd{
		
	protected $id;
	protected $name;
	protected $hotel;	
				
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
	
	public function get_name(){
		return $this->name;
	}
	
	public function get_hotel(){
		return $this->hotel;
	}
	
	
	public function set_id($id){
		$this->id = $id;
	}
	
	public function set_name($name){
		$this->name = $name;
	}
	
	public function set_hotel($hotel){
		$this->hotel = $hotel;
	}
	
}
?>