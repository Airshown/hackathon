<?php
class vue {
	
	private $layout;
	private $data = [];
	
	public function __construct($controller, $action = "index", $layout = "index.layout"){
		$this->data['controller'] = $controller;
		$this->data['action'] = $action;
		$this->layout = $layout;
	}
	
	public function __destruct(){
		$this->renderer();
	}
	
	public function assign($variable, $value){
		$this->data[$variable] = $value;
	}
	
	public function renderer(){
		extract($this->data);
		//include_once("vue/includes/head.inc.php");
		//include_once("vue/includes/menu.inc.php");
		include("vue/layout/".$this->layout.".php");
		//include_once("vue/includes/footer.inc.php");
	}
}