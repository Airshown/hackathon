<?php
class backoffice
{
    public function defaultPage($args)
    {
		$view = new vue("index", "index", "backoffice.layout");
		
		$users = new bdd;
		$view->assign("tableau", $users->requete("SELECT * FROM visit, user where visit.hotel = 1 and visit.user = user.id and visit.date_debut < '".date("Y-m-d H:i:s")."' and visit.date_fin > '".date("Y-m-d H:i:s")."'"));
		
		
    }
}