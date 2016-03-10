<?php
class notification extends bdd{
		
	protected $id;
	protected $user;
	protected $is_done;
	protected $activities;
	
				
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
	
	public function get_is_done(){
		return $this->is_done;
	}
	
	public function get_activities(){
		return $this->activities;
	}
	
	public function set_id($id){
		$this->id = $id;
	}
	
	public function set_user($user){
		$this->user = $user;;
	}
	
	public function set_is_done($is_done){
		$this->is_done = $is_done;
	}
	
	public function set_activities($activities){
		$this->activities = $activities;
	}

}
	
?>