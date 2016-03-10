<?php
class ajax
{
	public function __construct($args){
		
	}
	
    public function popup($args)
    {
		//$args[1];
		header("Access-Control-Allow-Origin: *");
		$feeling = new feeling;
		$feeling->set_type($args[1]);
		$feeling->set_user(1);
		$feeling->set_activities(2);
		$feeling->set_date_heure(date('Y-m-d H:i:s'));
		$feeling->save("feeling");
    }
}