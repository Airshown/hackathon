<?php
class security{
		
	public static function is_connected(){
		if (isset($_SESSION['session'])){
			$utilisateur = new users;
			$utilisateur->getOneBy($_SESSION["session"], "session", "users");
			$utilisateur->setFromBdd($utilisateur->result);
				if ($utilisateur->get_id() != 0 && $utilisateur->get_id_garage() != 0 && $utilisateur->get_is_activate() == 1){
					$garage = new garage();
					$garage->getOneBy($utilisateur->get_id_garage(), "id", "garage");
					$garage->setFromBdd($garage->result);
					if ($garage->get_is_actif() == 1){
						return TRUE;
					}else{
						return FALSE;
					}
				}else{
					return FALSE;
				}
			}else{
			return FALSE;
		}
	}
	
	
	public static function is_actif_apikey($apiKey){
			$keyring = new keyring();
			$keyring->getOneBy($apiKey, "apikey", "keyring");
			$keyring->setFromBdd($keyring->result);
			if ($keyring->get_is_actif() == 1 && $keyring->get_is_actif_admin() == 1){
				$utilisateur = new users;
				$utilisateur->getOneBy($keyring->get_id_utilisateur(), "id", "users");
				$utilisateur->setFromBdd($utilisateur->result);
				if ($utilisateur->get_id() != 0 && $utilisateur->get_is_activate() == 1){
					$garage = new garage;
					$garage->getOneBy($utilisateur->get_id_garage(), "id", "garage");
					$garage->setFromBdd($garage->result);
					if ($garage->get_is_actif() == 1){
						return TRUE;
					}else{
					return FALSE;
				}
				}else{
					return FALSE;
				}
			}else{
					return FALSE;
				}
	}
	
	
	public static function returnIdGarage(){
		if (self::is_connected()){
			$utilisateur = new users;
			$utilisateur->getOneBy($_SESSION["session"], "session", "users");
			return $utilisateur->result["id_garage"];
		}else{
			return FALSE;
		}
	}
	
	public static function returnTauxTva(){
		if (self::is_connected()){
			$garage = new garage;
			$garage->getOneBy(self::returnIdGarage(), "id", "garage");
			return $garage->result["taux_tva"];
		}else{
			return FALSE;
		}
	}
	
	public static function returnId(){
		if (self::is_connected()){
			$utilisateur = new users;
			$utilisateur->getOneBy($_SESSION["session"], "session", "users");
			return $utilisateur->result["id"];
		}else{
			return FALSE;
		}
	}
	
	public static function connected($elements){
		//Création d'une variable de session
		//redirection
		$utilisateur = new users;
		$elements = security::sanitize($elements);
		$utilisateur->getOneBy($elements["email"], "email", "users");
		$utilisateur->setFromBdd($utilisateur->result);
		if ($utilisateur->get_password() == self::makePassword($elements["password"]) && $utilisateur->get_is_activate() == 1){
			$uniqid = fonctions::id_aleatoire();
			$_SESSION['session'] = $uniqid;
			$_SESSION['nomUtilisateur'] = $utilisateur->get_prenom();
			$_SESSION['mdp_generate'] = $utilisateur->get_mdp_generate();
			$utilisateur->set_session($uniqid);
			$utilisateur->set_token_validation("");
			$utilisateur->save("users");
			header('HTTP/1.0 302 Found');
			header("Location: ".ADRESSE_SITE."/index");
			exit;
		}else{
			$_SESSION['erreur'] = "Il est impossible de vous identifier avec les identifiants saisis";
			header('HTTP/1.0 302 Found');
			header("Location: ".ADRESSE_SITE."/login/quickLogin");
			exit;
		}
	}	
	
	public static function disconnect(){
		//Suppression des variables de session
		//redirection
		session_unset();
		session_destroy();
		header('HTTP/1.0 302 Found');
		header("Location: ".ADRESSE_SITE."/login/quickLogin");
		exit;
	}
	
	public static function get_id_by_api($api_key){
			$utilisateur = new users;
			$utilisateur->getOneBy($api_key, "api_key", "users");
            $utilisateur->setFromBdd($utilisateur->result);
			if ($utilisateur->get_id() != ""){
				return $utilisateur->get_id();
			}else{
				return FALSE;	
			}
	}
	
	public static function get_can_modify_user($id){
			$utilisateur = new users;
			$utilisateur->getOneBy($id, "id", "users");
            $utilisateur->setFromBdd($utilisateur->result);
			if ($utilisateur->get_can_modify_user() == 1){
				return TRUE;
			}else{
				return FALSE;	
			}
	}
	
	public static function get_can_modify_facture($id){
			$utilisateur = new users;
			$utilisateur->getOneBy($id, "id", "users");
            $utilisateur->setFromBdd($utilisateur->result);
			if ($utilisateur->get_can_modify_facture() == 1){
				return TRUE;
			}else{
				return FALSE;	
			}
	}
	
	public static function get_can_modify_cartegrise($id){
			$utilisateur = new users;
			$utilisateur->getOneBy($id, "id", "users");
            $utilisateur->setFromBdd($utilisateur->result);
			if ($utilisateur->get_can_modify_cartegrise() == 1){
				return TRUE;
			}else{
				return FALSE;	
			}
	}
	
	public static function get_can_modify_societe($id){
			$utilisateur = new users;
			$utilisateur->getOneBy($id, "id", "users");
            $utilisateur->setFromBdd($utilisateur->result);
			if ($utilisateur->get_can_modify_societe() == 1){
				return TRUE;
			}else{
				return FALSE;	
			}
	}
	
	public static function get_can_modify_prestations($id){
			$utilisateur = new users;
			$utilisateur->getOneBy($id, "id", "users");
            $utilisateur->setFromBdd($utilisateur->result);
			if ($utilisateur->get_can_modify_prestations() == 1){
				return TRUE;
			}else{
				return FALSE;	
			}
	}
	
	public static function get_can_modify_cle($id){
			$utilisateur = new users;
			$utilisateur->getOneBy($id, "id", "users");
            $utilisateur->setFromBdd($utilisateur->result);
			if ($utilisateur->get_can_modify_cle() == 1){
				return TRUE;
			}else{
				return FALSE;	
			}
	}
	
	public static function makePassword($pass){
		return hash("sha256", "iiP8RAcljwO8bZ6W4Moo081j67M5q68Ke9kIn948H7Pn8x7F8499ihK2P6C55V3tveEs1ea1AZgUqNchK0X9q66Y86BvDK1YwA7yFirc5L8Kwl8Jb4vJvbE52sKo6CDI1rK7U3Y4X17R3YTT980k749w1O7r736o4j80kYN0YexEHM4VVhxUJlEWN48ypH49TLVBf7pX567Ih00wD3mPw65kt28HqaV23j7rAanrx91uvz5Mh48WHHE8pxJWf8S2UIt5xF103NJYMp6mmp91Wws34F96E5uTw2xiVCZZwG0mAmx2CVvOjRQXv3qt7m7ErLtMFq67X6RzhPux70H1aNhOIZkpLQg707K7f564U2ALlvOEwjbN8ibm2IIQjSwJm10vu08fdnQN8n5o".$pass."m5mm79J7D5T4q5Z2L8I6fxhWXc2wPZFz4h0009sy1qWx7LzGAUb3VETJiOFc967x51wU9dGrKR91sF7olhay1SlsLV3FkBRmb69wgC8N971r45nnS8ox772UM9HRWpn9DJX3f56u12m4BxVv3rE3JPXi6GqyQHd1uHZ5Yn3j59RtW96pfjRA6PT3J4yrKjD1RXAn4n4yK14Hi6qaIPK0Y7We28Ec5wK7k3M6cv7ys3sPudkAZh3BW1204q7jmPYbc690R8hx8FyP486uBDJ7Mm3R4791R86JCKv44t8mygeJC7Lf9L4qiRFWvAlc6z1rB99tCtOR3mEvH4oj6XELA71Hv55ZK9h8hrxXzp");
	}
	
	public static function getPostValeurs($post){
		foreach($post as $cle => $valeur ) {
    		if( is_array( $valeur ) ) {
    		    foreach( $valeur as $tableau ) {
					//tableau checkbox
    	 	       echo $tableau;
    		    }
  	 		 } else {
    	 	    $this->{$cle}=$valeur;
				//$this->{$cle}[1]=$cle;
				//$this->validation($cle, $valeur);
				//$this->nomDuChampHtml contient la valeur du champ html;
   			 }
		} 
	}
	
	public static function cleanInput($input){
	 $search = array(
    '@<script[^>]*?>.*?</script>@si',   // On enleve le javascript
    '@<[\/\!]*?[^<>]*?>@si',            // On enleve le html
    '@<style[^>]*?>.*?</style>@siU',    // On enleve le CSS
    '@<![\s\S]*?--[ \t\n\r]*>@'         // On enleve les commentaires
  );

    $output = preg_replace($search, '', $input);
    return $output;
  }
  
  
  public static function sanitize($input) {
    if (is_array($input)) {
        foreach($input as $var=>$val) {
            $output[$var] = self::sanitize($val);
        }
    }
    else {
        if (get_magic_quotes_gpc()) {
            $input = stripslashes($input);
        }
         $output  = self::cleanInput($input);
    }
    return $output;
}
	private function valideEmail($email)
{
   $isValid = true;
   $atIndex = strrpos($email, "@");
   if (is_bool($atIndex) && !$atIndex)
   {
      $isValid = false;
   }
   else
   {
      $domain = substr($email, $atIndex+1);
      $local = substr($email, 0, $atIndex);
      $localLen = strlen($local);
      $domainLen = strlen($domain);
      if ($localLen < 1 || $localLen > 64)
      {
         // si taille email trop grande ou trop petite
         $isValid = false;
      }
      else if ($domainLen < 1 || $domainLen > 255)
      {
         // trop grand ou trop petit nom de domaine
         $isValid = false;
      }
      else if ($local[0] == '.' || $local[$localLen-1] == '.')
      {
         // commence ou termine par un point
         $isValid = false;
      }
      else if (preg_match('/\\.\\./', $local))
      {
         // deux points consecutifs dans le pre @
         $isValid = false;
      }
      else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain))
      {
         // caractere pas valide
         $isValid = false;
      }
      else if (preg_match('/\\.\\./', $domain))
      {
         // deux points consecutifs dans le domaine
         $isValid = false;
      }
      else if (!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace("\\\\","",$local)))
      {
         // character not valid in local part unless 
         // local part is quoted
         if (!preg_match('/^"(\\\\"|[^"])+"$/',
             str_replace("\\\\","",$local)))
         {
            $isValid = false;
         }
      }
      if ($isValid && !(checkdnsrr($domain,"MX") || checkdnsrr($domain,"A")))
      {
         // pas bon nom de domaine
         $isValid = false;
      }
   }
   return $isValid;
}
	
}