<?php
class feeling extends bdd{
		
	protected $id;
	protected $type;
	protected $user;
	protected $activities;
	protected $date_heure;
				
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
	
	public function get_type(){
		return $this->type;
	}
	
	public function get_user(){
		return $this->user;
	}
	
	public function get_activities(){
		return $this->activities;
	}
	
	
	public function get_date_heure(){
		return $this->date_heure;
	}
	
	
	public function set_id($id){
		$this->id = $id;
	}
	
	public function set_type($type){
		$this->type = $type;
	}
	
	public function set_user($user){
		$this->user = $user;
	}
	
	public function set_activities($activities){
		$this->activities = $activities;
	}
	
	
	public function set_date_heure($date_heure){
		$this->date_heure = $date_heure;
	}
	
}
	
?>