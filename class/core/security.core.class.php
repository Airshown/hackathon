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
	
	
	
	public static function makePassword($pass){
		return hash("sha256", "9gc9EtkmnbsjhUsq9BTBSzYey74heg24DB9c0T94b49Jz2NiI58Z572JZ2EmNe0oojB2cxBv9D58029ts6FENSOEw3ZfnvWRZC7esbVYH2srNjmq8b9gyMN692TRD7965BO70dAKaxU0VYSuK153RVCJY93pl82uFIg8y36ar0drac4B43f3ItT5pX4FH36b91D46eSdmfjNmp9283253AuELQjnz09I7bCX31Ks6Cn1L2IU6ZkcX4ArBq6Y4RIh".$pass."hSQe3ll1Y0Dsk5j47RC4FvZcWZZQpDd5E6itpyGf07DtauyWVunP9IRQ37YiwuYMjqBs8eTqnL74k3wB541sVC6l21cH1Pk2xg85kVt463m2d7eqO0ocrMN4cXnO2y83125649r63hOFCU55JYE01Og91UMg8BeBZd5jpKU6RBbV0wMx1VXo83209F95NA64d3Kk88Wt6MKH7cRZ7bC4cYZ703K9i9ORR75v0rP5vZPx2pf1Du5rQDpqzBNb6nfj");
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