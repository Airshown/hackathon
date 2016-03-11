<?php
class backoffice
{
    public function defaultPage($args){
		if (security::is_connected() && $_SESSION["is_admin"] == 1){
			$view = new vue("admin", "index", "backoffice.layout");
			
			$users = new bdd;
			$view->assign("tableau", $users->requete("SELECT * FROM visit, user where visit.hotel = 1 and visit.user = user.id and visit.date_debut < '".date("Y-m-d H:i:s")."' and visit.date_fin > '".date("Y-m-d H:i:s")."'"));	
			$view->assign("nombrevisites", $users->requete("SELECT count(*) as nombre FROM user, visit where visit.date_debut < '".date("Y-m-d H:i:s")."' and visit.date_fin > '".date("Y-m-d H:i:s")."' and visit.user = user.id"));			
			$view->assign("visite", $users->requete("SELECT count(*) as nombre, activities.name, visit.hotel FROM activities, feeling, visit, hotel WHERE feeling.activities = activities.id and visit.hotel = activities.hotel and hotel.id = '1' and visit.date_debut < '".date("Y-m-d H:i:s")."' and visit.date_fin > '".date("Y-m-d H:i:s")."' group by activities.id order by nombre DESC"));			
	
			$view->assign("tauxpositif", $users->requete("SELECT AVG(REPLACE(type,'smile', '1')) as tauxpositif FROM feeling"));
		}else{
			header('Location: http://www.coteauto.net/');
		}
		
    }
	
	public function notification($args){
		if (security::is_connected() && $_SESSION["is_admin"] == 1){

			if ($args["envoyer"] == "oui"){
				$notification = new notification;
				$notification->set_user($args["utilisateur"]);
				$notification->set_activities($args["type"]);
				$notification->set_is_done(0);
				$notification->save("notification");
			}
			$view = new vue("admin", "notification", "backoffice.layout");
			
			$requete = new bdd;
			$resultat = $requete->getResultsClause(["hotel" => 1], "activities", "");
			$view->assign("resultat", $resultat);
			
			$view->assign("resultatUsers", $requete->requete("SELECT * FROM visit, user where visit.hotel = 1 and visit.user = user.id and visit.date_debut < '".date("Y-m-d H:i:s")."' and visit.date_fin > '".date("Y-m-d H:i:s")."'"));	
		}else{
			header('Location: http://www.coteauto.net/');
		}
	}
	
	public function map($args){
		if (security::is_connected() && $_SESSION["is_admin"] == 1){
			$view = new vue("admin", "map", "backoffice.layout");
			
		}else{
			header('Location: http://www.coteauto.net/');
		}
		
    }
	
	
	public function login($args){
		
		if ($args["envoyer"] == "oui"){
			security::connected(["email" => $args["email"], "password" => $args["password"]]);
		}
		$view = new vue("", "", "backoffice_login.layout");
		
	}
	
}