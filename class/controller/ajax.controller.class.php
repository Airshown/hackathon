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
		
		$notification = new notification;
		$notification->getOneBy($args[2], "id", "notification");
		$notification->setFromBdd($notification->result);
		$notification->set_is_done(1);
		$notification->save("notification");
    }
	
	public function notif($args)
    {
		//$args[1];
		header("Access-Control-Allow-Origin: *");
		$notification = new bdd;
		$notification->requete("SELECT * FROM activities, notification where notification.activities = activities.id and notification.user = '1' limit 0,1");
		echo json_encode($notification->requete("SELECT * FROM activities, notification where notification.activities = activities.id and notification.user = '1' limit 0,1"));
		
		
    }
}