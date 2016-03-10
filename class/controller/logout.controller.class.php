<?php
class logout
{
    public function defaultPage($args){
		session_destroy();
		header('Location: http://www.coteauto.net/');
    }
	

	
}