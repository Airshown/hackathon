<?php
class front
{
    public function defaultPage($args)
    {
		$view = new vue("index", "index", "index.layout");
		
		$sql = new bdd;
		$view->assign("tableau", $sql->requete("SELECT * FROM activities, feeling where feeling.activities = activities.id and feeling.user = '1' order by date_heure DESC"));
		
    }
}