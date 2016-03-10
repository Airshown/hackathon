<?php
class backoffice
{
    public function defaultPage($args){
		$view = new vue("admin", "index", "backoffice.layout");
		
		$users = new bdd;
		$view->assign("tableau", $users->requete("SELECT * FROM visit, user where visit.hotel = 1 and visit.user = user.id and visit.date_debut < '".date("Y-m-d H:i:s")."' and visit.date_fin > '".date("Y-m-d H:i:s")."'"));	
		$view->assign("nombrevisites", $users->requete("SELECT count(*) as nombre FROM user, visit where visit.date_debut < '".date("Y-m-d H:i:s")."' and visit.date_fin > '".date("Y-m-d H:i:s")."' and visit.user = user.id"));			
		$view->assign("visite", $users->requete("SELECT count(*) as nombre, activities.name, visit.hotel FROM activities, feeling, visit, hotel WHERE feeling.activities = activities.id and visit.hotel = activities.hotel and hotel.id = '1' and visit.date_debut < '".date("Y-m-d H:i:s")."' and visit.date_fin > '".date("Y-m-d H:i:s")."' group by activities.id order by nombre DESC"));			

		$view->assign("tauxpositif", $users->requete("SELECT AVG(REPLACE(type,'smile', '1')) as tauxpositif FROM feeling"));	
    }
	
	public function notification($args){
		$view = new vue("admin", "notification", "backoffice.layout");
	}
}