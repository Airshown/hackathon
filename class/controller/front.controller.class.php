<?php
class front
{
    public function defaultPage($args)
    {
		$view = new vue("index", "index", "index.layout");
		
		$sql = new bdd;
		$view->assign("tableau", $sql->getResultsClause(["user" => 1], "feeling", "order by date_heure DESC"));
    }
}