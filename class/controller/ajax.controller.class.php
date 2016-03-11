<?php
class ajax
{
    public function popup($args)
    {
		//$args[1];
		header("Access-Control-Allow-Origin: *");
		$notification = new notification;
		$notification->getOneBy($args[2], "id", "notification");
		$notification->setFromBdd($notification->result);
		$notification->set_is_done("1");
		$notification->save("notification");
		
		$feeling = new feeling;
		$feeling->set_type($args[1]);
		$feeling->set_user($notification->get_user());
		$feeling->set_activities($notification->get_activities());
		$feeling->set_date_heure(date('Y-m-d H:i:s'));
		$feeling->save("feeling");
		
		
    }
	
	public function notif($args)
    {
		//$args[1];
		header("Access-Control-Allow-Origin: *");
		$notification = new bdd;
		echo json_encode($notification->requete("SELECT * FROM activities, notification where notification.activities = activities.id and notification.user = '".security::returnId()."' and notification.is_done = '0' limit 0,1"));
		
		
    }
}