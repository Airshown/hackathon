<?php
class backoffice
{
    public function defaultPage($args)
    {
		$view = new vue("index", "index", "backoffice.layout");
		
		$users = new bdd;
		$view->assign("tableau", $users->requete("SELECT * FROM visit, user where visit.hotel = 1 and visit.user = user.id and visit.date_debut < '".date("Y-m-d H:i:s")."' and visit.date_fin > '".date("Y-m-d H:i:s")."'"));	
		$view->assign("nombrevisites", $users->requete("SELECT COUNT(*) as nombre FROM visit, user where visit.hotel = 1 and visit.user = user.id and visit.date_debut < '".date("Y-m-d H:i:s")."' and visit.date_fin > '".date("Y-m-d H:i:s")."'"));			
		
		$view->assign("tauxpositif", $users->requete("SELECT AVG(REPLACE(type,'smile', '1')) as tauxpositif FROM feeling"));	
		
		
		
		
		
		
    }
}