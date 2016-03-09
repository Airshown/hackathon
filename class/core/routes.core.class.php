<?php
class routes{
	
	public $xml;
	
	public function __construct(){
		if (file_exists(rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/class/routes/routes.xml')) {
			$this->xml = simplexml_load_file(rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/class/routes/routes.xml');
		} else {
			return 'Echec lors de l\'ouverture du fichier de routes';
		}
	}
	
	public function get_route($url){
		foreach($this->xml as $key => $value){
			if ($url == $value->url){
				return [$value->controller, $value->action];
				break;
			}elseif(preg_match("#".$value->url."#", $url)){
				preg_match("#".$value->url."#", $url, $output);
				return [$value->controller, $value->action, $output];
				break;
			}
		}
	}
	
	
}