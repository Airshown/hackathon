<?php
class front
{
    public function defaultPage($args)
    {
		if (security::is_connected()){
			$view = new vue("index", "index", "index.layout");
			
			$sql = new bdd;
			$view->assign("tableau", $sql->requete("SELECT * FROM activities, feeling where feeling.activities = activities.id and feeling.user = '".security::returnId()."' order by date_heure DESC"));
		}else{
			$view = new vue("", "", "front_login.layout");
		}
		
    }
	
	public function login($args){
		
		if ($args["envoyer"] == "oui"){
			security::connected(["email" => $args["email"], "password" => $args["password"]]);
		}
		$view = new vue("", "", "front_login.layout");
		
	}
}