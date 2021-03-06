<?php
session_start();
//ini_set('display_errors', 1); 
date_default_timezone_set("Europe/Paris");
include_once("class/core/constantes.core.php");
include_once("class/core/routes.core.class.php");

spl_autoload_register( function($class_name) {
    if (file_exists("class/controller/" . $class_name . ".controller.class.php"))
	{
		include_once("class/controller/" . $class_name . ".controller.class.php");
	}
	if (file_exists("class/core/" . $class_name . ".core.class.php"))
	{
		include_once("class/core/" . $class_name . ".core.class.php");
	}
	if (file_exists("class/modele/" . $class_name . ".modele.class.php"))
	{
		include_once("class/modele/" . $class_name . ".modele.class.php");
	}
});

$objet_method = array();
$routes = new routes;
$objet_method = $routes->get_route($_SERVER["REQUEST_URI"]);

$type_objet = (string)$objet_method[0];
$methode_objet = (string)$objet_method[1];

$args = array_merge($objet_method[2], $_POST);


if (class_exists($type_objet)){
	$objet = new $type_objet;
	if (is_callable([$type_objet, $methode_objet])){
		$objet->$methode_objet($args);
	}else{
		unset($objet);
		$objet = new notFound;
	}
}else{
	$objet = new notFound;
}

/*
$url = explode("/", trim($_SERVER['REQUEST_URI'], "/"));
$object = ($url[0] == "/" || $url[0] == "")?"index":$url[0];
unset($url[0]);
$action = (!isset($url[1]))?"defaultPage":$url[1];
unset($url[1]);
$args = array_merge($url, $_POST);
if (class_exists($object)){
	$obj = new $object;
	if (is_callable([$obj, $action]) && fonctions::is_controller($object)){
		$obj->$action($args);
		}else{
		unset($obj);
		$obj = new notFound;
	}
}else{
	$obj = new notFound;
}
*/
?>
