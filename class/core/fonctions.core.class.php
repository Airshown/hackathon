<?php
class fonctions
{
    
    public static function is_controller($class_name)
    {
        if (file_exists("./class/controller/" . $class_name . ".controller.class.php")) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
	
    public static function trunque($str, $nb = 300)
    {
        if (strlen($str) > $nb) {
            $str             = substr($str, 0, $nb);
            $position_espace = strrpos($str, " ");
            $texte           = substr($str, 0, $position_espace);
            $str             = $texte . "...";
        }
        return $str;
    }
    
    public static function id_aleatoire($taille = 30)
    {
        $elements = "abcdefghijklmnopqrstuvwxyz0123456789AZERTYUIOPMLKJHGFDSQWXCVBN";
        $retour   = "";
        srand((double)microtime()*1000000);
        for ($ligne = 0; $ligne < 30; $ligne++) {
            $retour .= substr($elements, (rand() % (strlen($elements))), 1);
        }
        return sha1($retour . uniqid());
    }
	
	 public static function id_aleatoire2($taille = 120)
    {
        $elements = "abcdefghijklmnopqrstuvwxyz0123456789AZERTYUIOPMLKJHGFDSQWXCVBN";
        $retour   = "";
        srand((double)microtime()*1000000);
        for ($ligne = 0; $ligne < $taille; $ligne++) {
            $retour .= substr($elements, (rand() % (strlen($elements))), 1);
        }
        return $retour;
    }
	
    public static function api_key()
    {
        $elements = "abcdefghijklmnopqrstuvwxyz0123456789AZERTYUIOPMLKJHGFDSQWXCVBN";
        $retour   = "";
        srand(time());
        for ($ligne = 0; $ligne < 255; $ligne++) {
            $retour .= substr($elements, (rand() % (strlen($elements))), 1);
        }
        return $retour;
    }
    
    public static function genereMdp()
    {
        $elements = "abcdefghijklmnopqrstuvwxyz0123456789AZERTYUIOPMLKJHGFDSQWXCVBN";
        $retour   = "";
        srand(time());
        for ($ligne = 0; $ligne < 8; $ligne++) {
            $retour .= substr($elements, (rand() % (strlen($elements))), 1);
        }
        return $retour;
    }
    
    
    public static function is_serialized($data, $strict = true)
    {
        // if it isn't a string, it isn't serialized.
        if (!is_string($data)) {
            return false;
        }
        $data = trim($data);
        if ('N;' == $data) {
            return true;
        }
        if (strlen($data) < 4) {
            return false;
        }
        if (':' !== $data[1]) {
            return false;
        }
        if ($strict) {
            $lastc = substr($data, -1);
            if (';' !== $lastc && '}' !== $lastc) {
                return false;
            }
        } else {
            $semicolon = strpos($data, ';');
            $brace     = strpos($data, '}');
            // Either ; or } must exist.
            if (false === $semicolon && false === $brace)
                return false;
            // But neither must be in the first X characters.
            if (false !== $semicolon && $semicolon < 3)
                return false;
            if (false !== $brace && $brace < 4)
                return false;
        }
        $token = $data[0];
        switch ($token) {
            case 's':
                if ($strict) {
                    if ('"' !== substr($data, -2, 1)) {
                        return false;
                    }
                } elseif (false === strpos($data, '"')) {
                    return false;
                }
            // or else fall through
            case 'a':
            case 'O':
                return (bool) preg_match("/^{$token}:[0-9]+:/s", $data);
            case 'b':
            case 'i':
            case 'd':
                $end = $strict ? '$' : '';
                return (bool) preg_match("/^{$token}:[0-9.E-]+;$end/", $data);
        }
        return false;
    }
    
    public static function pagination($current_page, $nb_pages, $link = '/index/page/%d', $around = 3, $firstlast = 1)
    {
        $pagination = '';
        $link       = preg_replace('`%([^d])`', '%%$1', $link);
        if (!preg_match('`(?<!%)%d`', $link))
            $link .= '%d';
        if ($nb_pages > 1) {
            
            // Lien précédent
            if ($current_page > 1)
                $pagination .= '<a class="prevnext" href="' . sprintf($link, $current_page - 1) . '" title="Page pr&eacute;c&eacute;dente">&laquo; Pr&eacute;c&eacute;dent</a>';
            else
                $pagination .= '<span class="prevnext disabled">&laquo; Pr&eacute;c&eacute;dent</span>';
            
            // Lien(s) début
            for ($i = 1; $i <= $firstlast; $i++) {
                $pagination .= ' ';
                $pagination .= ($current_page == $i) ? '<span class="current">' . $i . '</span>' : '<a href="' . sprintf($link, $i) . '">' . $i . '</a>';
            }
            
            // ... après pages début ?
            if (($current_page - $around) > $firstlast + 1)
                $pagination .= ' &hellip;';
            
            // On boucle autour de la page courante
            $start = ($current_page - $around) > $firstlast ? $current_page - $around : $firstlast + 1;
            $end   = ($current_page + $around) <= ($nb_pages - $firstlast) ? $current_page + $around : $nb_pages - $firstlast;
            for ($i = $start; $i <= $end; $i++) {
                $pagination .= ' ';
                if ($i == $current_page)
                    $pagination .= '<span class="current">' . $i . '</span>';
                else
                    $pagination .= '<a href="' . sprintf($link, $i) . '">' . $i . '</a>';
            }
            
            // ... avant page nb_pages ?
            if (($current_page + $around) < $nb_pages - $firstlast)
                $pagination .= ' &hellip;';
            
            // Lien(s) fin
            $start = $nb_pages - $firstlast + 1;
            if ($start <= $firstlast)
                $start = $firstlast + 1;
            for ($i = $start; $i <= $nb_pages; $i++) {
                $pagination .= ' ';
                $pagination .= ($current_page == $i) ? '<span class="current">' . $i . '</span>' : '<a href="' . sprintf($link, $i) . '">' . $i . '</a>';
            }
            
            // Lien suivant
            if ($current_page < $nb_pages)
                $pagination .= ' <a class="prevnext" href="' . sprintf($link, ($current_page + 1)) . '" title="Page suivante">Suivant &raquo;</a>';
            else
                $pagination .= ' <span class="prevnext disabled">Suivant &raquo;</span>';
        }
        return $pagination;
    }
    
    public static function ariane()
    {
        $separator = " / ";
        $args      = explode("/", trim($_SERVER['REQUEST_URI'], "/"));
        
        if ($_SERVER['REQUEST_URI'] == "/" or substr($_SERVER['REQUEST_URI'], 0, 11) == "/index/page") {
            return "<a class=\"actual\" href=\"" . ADRESSE_SITE . "\">Accueil</a>";
        }
        
        if (!self::is_controller($args[0])) {
            $test = new test();
            if ($test->testArticle()) {
                $test->setFromBdd($test->result);
                return "<a class=\"notactive\" href=\"" . ADRESSE_SITE . "\">Accueil</a> / <span class=\"actual\">" . $test->get_titre() . "</span>";
            }
        }
        
        if (self::is_controller($args[0])) {
            if ($args[0] == "profil") {
                if ($args[1] == "view" && is_numeric($args[2])) {
                    $user = new users;
                    $user->getOneBy($args[2], "id", "users");
                    $user->setFromBdd($user->result);
                    return "<a class=\"notactive\" href=\"" . ADRESSE_SITE . "\">Accueil</a> / <span class=\"actual\">Profil utilisateur " . $user->get_pseudo() . "</span>";
                } elseif ($args[1] == "articles" && is_numeric($args[2])) {
                    $user = new users;
                    $user->getOneBy($args[2], "id", "users");
                    $user->setFromBdd($user->result);
                    return "<a class=\"notactive\" href=\"" . ADRESSE_SITE . "\">Accueil</a> / <a class=\"notactive\" href=\"" . ADRESSE_SITE . "/profil/view/" . $user->get_id() . "\" >Profil utilisateur " . $user->get_pseudo() . "</a> / <span class=\"actual\">Articles publiés par " . $user->get_pseudo() . "</span>";
                }
            }
        }
        
    }
    
    
    
    public static function remove_accents($str, $charset = 'utf-8')
    {
        $str = htmlentities($str, ENT_NOQUOTES, $charset);
        
        $str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
        $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
        $str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères
        
        return $str;
    }
    
    public static function getPostValeurs($post)
    {
        foreach ($post as $cle => $valeur) {
            if (is_array($valeur)) {
                foreach ($valeur as $tableau) {
                    //tableau checkbox
                    echo $tableau;
                }
            } else {
                $this->{$cle} = $valeur;
                //$this->{$cle}[1]=$cle;
                //$this->validation($cle, $valeur);
                //$this->nomDuChampHtml contient la valeur du champ html;
            }
        }
    }
    
    public static function cleanInput($input)
    {
        $search = array(
            '@<script[^>]*?>.*?</script>@si', // On enleve le javascript
            '@<[\/\!]*?[^<>]*?>@si', // On enleve le html
            '@<style[^>]*?>.*?</style>@siU', // On enleve le CSS
            '@<![\s\S]*?--[ \t\n\r]*>@' // On enleve les commentaires
        );
        
        $output = preg_replace($search, '', $input);
        return $output;
    }
    
    
    public static function sanitize($input)
    {
        if (is_array($input)) {
            foreach ($input as $var => $val) {
                $output[$var] = self::sanitize($val);
            }
        } else {
            if (get_magic_quotes_gpc()) {
                $input = stripslashes($input);
            }
            $output = self::cleanInput($input);
        }
        return $output;
    }
	
    public static function valideEmail($email)
    {
        $isValid = true;
        $atIndex = strrpos($email, "@");
        if (is_bool($atIndex) && !$atIndex) {
            $isValid = false;
        } else {
            $domain    = substr($email, $atIndex + 1);
            $local     = substr($email, 0, $atIndex);
            $localLen  = strlen($local);
            $domainLen = strlen($domain);
            if ($localLen < 1 || $localLen > 64) {
                // si taille email trop grande ou trop petite
                $isValid = false;
            } else if ($domainLen < 1 || $domainLen > 255) {
                // trop grand ou trop petit nom de domaine
                $isValid = false;
            } else if ($local[0] == '.' || $local[$localLen - 1] == '.') {
                // commence ou termine par un point
                $isValid = false;
            } else if (preg_match('/\\.\\./', $local)) {
                // deux points consecutifs dans le pre @
                $isValid = false;
            } else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain)) {
                // caractere pas valide
                $isValid = false;
            } else if (preg_match('/\\.\\./', $domain)) {
                // deux points consecutifs dans le domaine
                $isValid = false;
            } else if (!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace("\\\\", "", $local))) {
                // character not valid in local part unless 
                // local part is quoted
                if (!preg_match('/^"(\\\\"|[^"])+"$/', str_replace("\\\\", "", $local))) {
                    $isValid = false;
                }
            }
            if ($isValid && !(checkdnsrr($domain, "MX") || checkdnsrr($domain, "A"))) {
                // pas bon nom de domaine
                $isValid = false;
            }
        }
        return $isValid;
    }
    
    
    public static function envoieMail($contenu, $subject, $email, $name)
    {
        require("class/form/mailer/phpmailer/PHPMailerAutoload.php");
        //Create a new PHPMailer instance
        $mail = new PHPMailer;
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug  = 0;
        //Set the hostname of the mail server
        $mail->Host       = 'smtp.mandrillapp.com';
        //Set the SMTP port number - likely to be 25, 465 or 587
        $mail->Port       = 587;
        //Whether to use SMTP authentication
        $mail->SMTPAuth   = true;
        //Username to use for SMTP authentication
        $mail->Username   = 'ppg@lepetitrossignol.net';
        //Password to use for SMTP authentication
        $mail->Password   = 'g2PbWZ4G9DB6TyQFNkaFog';
        $mail->SMTPSecure = 'tls';
        //Set who the message is to be sent from
        $mail->setFrom('no-reply@ssl-siv.com', 'Carte Grise PRO | SSL SIV');
        //Set an alternative reply-to address
        $mail->addReplyTo('no-reply@ssl-siv.com', 'Carte Grise PRO | SSL SIV');
        //Set who the message is to be sent to
        $mail->addAddress($email, $name);
        //Set the subject line
        $mail->Subject = $subject;
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        $mail->msgHTML($contenu);
        //Replace the plain text body with one created manually
        $mail->AltBody = strip_tags($contenu);
        //Attach an image file
        //$mail->addAttachment('images/phpmailer_mini.png');
        //send the message, check for errors
        $mail->send();
    }
    
    public static function base64_url_encode($input)
    {
        return strtr(base64_encode($input), '+/=', '-_,');
    }
    
    public static function base64_url_decode($input)
    {
        return base64_decode(strtr($input, '-_,', '+/='));
    }
	
    public static function returndate($input)
    {
        sscanf($input, "%4s-%2s-%2s %2s:%2s:%2s", $an, $mois, $jour, $heure, $min, $sec);
		return ["an" => $an,
				"mois" => $mois,
				"jour" => $jour,
				"heure" => $heure,
				"min" => $min,
				"sec" => $sec
				];
        
    }
	
    public static function format_demarche($input)
    {
        switch ($input) {
            case ("cession"):
                return "Declaration de cession";
                break;
            case ("changementTitulaire"):
                return "Changement de titulaire";
                break;
            case ("changementLocataire"):
                return "Changement de locataire";
                break;
            case ("adresseLocataire"):
                return "Changement d'adresse de locataire";
                break;
			case ("declarationAchat"):
				return "Declaration d'achat";
				break;
			case ("leveeVd"):
				return "Levée de Démonstration";
				break;
			case ("neuf"):
				return "Immatriculation Véhicule neuf";
				break;
			case ("provisoire"):
				return "WW Provisoire";
				break;
            default:
                return "Demarche SIV";
                break;
        }
    }
    
	public static function liste_demarches(){
		return ["cession", "changementTitulaire", "changementLocataire", "adresseLocataire", "declarationAchat", "leveeVd", "neuf", "provisoire", "autre"];
	}
	
	public static function liste_status($status){
		$status_list = array(
				array(
					"success" => "Validé"
				),
				array(
					"info" => "Prefecture"
				),
				array(
					"info" => "Attente"
				),
				array(
					"danger" => "Non Réglé"
				)
			);
		return $status_list[$status];
	}
	
	
	
    public static function phonetic($sIn){
		$accents = array('É' => 'E', 'È' => 'E', 'Ë' => 'E', 'Ê' => 'E','Á' => 'A', 'À' => 'A', 'Ä' => 'A', 'Â' => 'A', 
						'Å' => 'A', 'Ã' => 'A', 'Æ' => 'E','Ï' => 'I', 'Î' => 'I', 'Ì' => 'I', 'Í' => 'I',
						'Ô' => 'O', 'Ö' => 'O', 'Ò' => 'O', 'Ó' => 'O', 'Õ' => 'O', 'Ø' => 'O', 'Œ' => 'OEU',
						'Ú' => 'U', 'Ù' => 'U', 'Û' => 'U', 'Ü' => 'U','Ñ' => 'N', 'Ç' => 'S', '¿' => 'E');
		
		$min2maj = array('é' => 'É', 'è' => 'È', 'ë' => 'Ë', 'ê' => 'Ê','á' => 'Á', 'â' => 'Â', 'à' => 'À', 'Ä' => 'A', 
						'Â' => 'A', 'å' => 'Å', 'ã' => 'Ã', 'æ' => 'Æ',	'ï' => 'Ï', 'î' => 'Î', 'ì' => 'Ì', 'í' => 'Í',
						'ô' => 'Ô', 'ö' => 'Ö', 'ò' => 'Ò', 'ó' => 'Ó','õ' => 'Õ', 'ø' => 'Ø', 'œ' => 'Œ',
						'ú' => 'Ú', 'ù' => 'Ù', 'û' => 'Û', 'ü' => 'Ü','ç' => 'Ç', 'ñ' => 'Ñ', 'ß' => 'S');				
		
					
		//$sIn = utf8_decode($sIn);						// Selon votre implémentation, vous aurez besoin de décoder ce qui arrive pour les caractères spéciaux
		$sIn = strtr( $sIn, $min2maj); 					// minuscules accentuées ou composées en majuscules simples
		$sIn = strtr( $sIn, $accents); 					// majuscules accentuées ou composées en majuscules simples
		$sIn = strtoupper( $sIn );     					// on passe tout le reste en majuscules
		$sIn = preg_replace( '`[^A-Z]`', '', $sIn ); 	// on garde uniquement les lettres de A à Z
		
		$sBack=$sIn;									// on sauve le code (utilisé pour les mots très courts)
		
		$sIn = preg_replace( '`O[O]+`', 'OU', $sIn ); 	// pré traitement OO... -> OU
		$sIn = preg_replace( '`SAOU`', 'SOU', $sIn ); 	// pré traitement SAOU -> SOU
		$sIn = preg_replace( '`OES`', 'OS', $sIn ); 	// pré traitement OES -> OS
		$sIn = preg_replace( '`CCH`', 'K', $sIn ); 		// pré traitement CCH -> K
		$sIn = preg_replace( '`CC([IYE])`', 'KS$1', $sIn ); // CCI CCY CCE
		$sIn = preg_replace( '`(.)\1`', '$1', $sIn ); 	// supression des répétitions
		
		// quelques cas particuliers
		if ($sIn=="CD") return($sIn);
		if ($sIn=="BD") return($sIn);
		if ($sIn=="BV") return($sIn);
		if ($sIn=="TABAC") return("TABA");
		if ($sIn=="FEU") return("FE");
		if ($sIn=="FE") return($sIn);
		if ($sIn=="FER") return($sIn);
		if ($sIn=="FIEF") return($sIn);
		if ($sIn=="FJORD") return($sIn);
		if ($sIn=="GOAL") return("GOL");
		if ($sIn=="FLEAU") return("FLEO");
		if ($sIn=="HIER") return("IER");
		if ($sIn=="HEU") return("E");
		if ($sIn=="HE") return("E");
		if ($sIn=="OS") return($sIn);
		if ($sIn=="RIZ") return("RI");
		if ($sIn=="RAZ") return("RA");
		
		// pré-traitements
		$sIn = preg_replace( '`OIN[GT]$`', 'OIN', $sIn );									// terminaisons OING -> OIN
		$sIn = preg_replace( '`E[RS]$`', 'E', $sIn ); 										// supression des terminaisons infinitifs et participes pluriels
		$sIn = preg_replace( '`(C|CH)OEU`', 'KE', $sIn ); 									// pré traitement OEU -> EU
		$sIn = preg_replace( '`MOEU`', 'ME', $sIn ); 										// pré traitement OEU -> EU
		$sIn = preg_replace( '`OE([UI]+)([BCDFGHJKLMNPQRSTVWXZ])`', 'E$1$2', $sIn ); 		// pré traitement OEU OEI -> E
		$sIn = preg_replace( '`^GEN[TS]$`', 'JAN', $sIn );									// pré traitement GEN -> JAN
		$sIn = preg_replace( '`CUEI`', 'KEI', $sIn ); 										// pré traitement accueil
		$sIn = preg_replace( '`([^AEIOUYC])AE([BCDFGHJKLMNPQRSTVWXZ])`', '$1E$2', $sIn ); 	// pré traitement AE -> E
		$sIn = preg_replace( '`AE([QS])`', 'E$1', $sIn ); 									// pré traitement AE -> E
		$sIn = preg_replace( '`AIE([BCDFGJKLMNPQRSTVWXZ])`', 'AI$1', $sIn );				// pré-traitement AIE(consonne) -> AI
		$sIn = preg_replace( '`ANIEM`', 'ANIM', $sIn ); 									// pré traitement NIEM -> NIM
		$sIn = preg_replace( '`(DRA|TRO|IRO)P$`', '$1', $sIn ); 							// P terminal muet
		$sIn = preg_replace( '`(LOM)B$`', '$1', $sIn ); 									// B terminal muet
		$sIn = preg_replace( '`(RON|POR)C$`', '$1', $sIn ); 								// C terminal muet
		$sIn = preg_replace( '`PECT$`', 'PET', $sIn ); 										// C terminal muet
		$sIn = preg_replace( '`ECUL$`', 'CU', $sIn ); 										// L terminal muet
		$sIn = preg_replace( '`(CHA|CA|E)M(P|PS)$`', '$1N', $sIn ); 		 				// P ou PS terminal muet
		$sIn = preg_replace( '`(TAN|RAN)G$`', '$1', $sIn ); 			 					// G terminal muet
		
		
		// sons YEUX
		$sIn = preg_replace( '`([^VO])ILAG`', '$1IAJ', $sIn );
		$sIn = preg_replace( '`([^TRH])UIL(AR|E)(.+)`', '$1UI$2$3', $sIn );
		$sIn = preg_replace( '`([G])UIL([AEO])`', '$1UI$2', $sIn ); 	
		$sIn = preg_replace( '`([NSPM])AIL([AEO])`', '$1AI$2', $sIn ); 	
		$convMIn  = array("DILAI","DILON","DILER","DILEM","RILON","TAILE","GAILET","AILAI","AILAR",
		"OUILA","EILAI","EILAR","EILER","EILEM","REILET","EILET","AILOL" );
		$convMOut = array( "DIAI", "DION","DIER", "DIEM", "RION", "TAIE", "GAIET", "AIAI", "AIAR", 
		"OUIA", "AIAI", "AIAR", "AIER", "AIEM",  "RAIET", "EIET", "AIOL" );
		$sIn = str_replace( $convMIn, $convMOut, $sIn );
		$sIn = preg_replace( '`([^AEIOUY])(SC|S)IEM([EA])`', '$1$2IAM$3', $sIn ); 	// IEM -> IAM
		$sIn = preg_replace( '`^(SC|S)IEM([EA])`', '$1IAM$2', $sIn ); 				// IEM -> IAM
		
		// MP MB -> NP NB
		$convMIn  = array( 'OMB', 'AMB', 'OMP', 'AMP', 'IMB', 'EMP','GEMB','EMB', 'UMBL','CIEN');
		$convMOut = array( 'ONB', 'ANB', 'ONP', 'ANP', 'INB', 'ANP','JANB','ANB', 'INBL','SIAN');
		$sIn = str_replace( $convMIn, $convMOut, $sIn ); 	
		
		// Sons en K
		$sIn = preg_replace( '`^ECHO$`', 'EKO', $sIn ); 	// cas particulier écho
		$sIn = preg_replace( '`^ECEUR`', 'EKEUR', $sIn ); 	// cas particulier écœuré
		// Choléra Chœur mais pas chocolat!
		$sIn = preg_replace( '`^CH(OG+|OL+|OR+|EU+|ARIS|M+|IRO|ONDR)`', 'K$1', $sIn ); 				//En début de mot
		$sIn = preg_replace( '`(YN|RI)CH(OG+|OL+|OC+|OP+|OM+|ARIS|M+|IRO|ONDR)`', '$1K$2', $sIn ); 	//Ou devant une consonne
		$sIn = preg_replace( '`CHS`', 'CH', $sIn );
		$sIn = preg_replace( '`CH(AIQ)`', 'K$1', $sIn );
		$sIn = preg_replace( '`^ECHO([^UIPY])`', 'EKO$1', $sIn );
		$sIn = preg_replace( '`ISCH(I|E)`', 'ISK$1', $sIn );
		$sIn = preg_replace( '`^ICHT`', 'IKT', $sIn );
		$sIn = preg_replace( '`ORCHID`', 'ORKID', $sIn );
		$sIn = preg_replace( '`ONCHIO`', 'ONKIO', $sIn );
		$sIn = preg_replace( '`ACHIA`', 'AKIA', $sIn );			// retouche ACHIA -> AKIA
		$sIn = preg_replace( '`([^C])ANICH`', '$1ANIK', $sIn );	// ANICH -> ANIK 	1/2
		$sIn = preg_replace( '`OMANIK`', 'OMANICH', $sIn ); 	// cas particulier 	2/2
		$sIn = preg_replace( '`ACHY([^D])`', 'AKI$1', $sIn );
		$sIn = preg_replace( '`([AEIOU])C([BDFGJKLMNPQRTVWXZ])`', '$1K$2', $sIn ); // voyelle, C, consonne sauf H
		$convPrIn  = array('EUCHA','YCHIA','YCHA','YCHO','YCHED','ACHEO','RCHEO','RCHES',
		'ECHN','OCHTO','CHORA','CHONDR','CHORE','MACHM','BRONCHO','LICHOS','LICHOC');
		$convPrOut = array('EKA',  'IKIA', 'IKA', 'IKO',  'IKED','AKEO','RKEO',  'RKES',
		'EKN',  'OKTO', 'KORA', 'KONDR' ,'KORE' ,'MAKM', 'BRONKO', 'LIKOS', 'LIKOC');
		$sIn = str_replace( $convPrIn, $convPrOut, $sIn ); 
		
		// Weuh (perfectible)
		$convPrIn  = array( 'WA','WO', 'WI','WHI','WHY','WHA','WHO');
		$convPrOut = array( 'OI', 'O','OUI','OUI','OUI','OUA', 'OU');
		$sIn = str_replace( $convPrIn, $convPrOut, $sIn );
		
		// Gueu, Gneu, Jeu et quelques autres
		$convPrIn  = array( 'GNES','GNET','GNER','GNE',  'GI', 'GNI','GNA','GNOU','GNUR','GY','OUGAIN',
		'AGEOL', 'AGEOT','GEOLO','GEOM','GEOP','GEOG','GEOS','GEORG','GEOR','NGEOT','UGEOT','GEOT','GEOD','GEOC','GEO','GEA','GE',
		'QU', 'Q',  'CY', 'CI', 'CN','ICM','CEAT','CE', 
		'CR', 'CO', 'CUEI','CU', 'VENCA','CA', 'CS','CLEN','CL', 'CZ', 'CTIQ',
		'CTIF','CTIC','CTIS','CTIL','CTIO','CTI', 'CTU', 'CTE','CTO','CTR','CT', 'PH', 'TH', 
		'OW', 'LH', 'RDL', 'CHLO', 'CHR', 'PTIA');
		$convPrOut = array( 'NIES','NIET','NIER', 'NE',  'JI',  'NI','NIA','NIOU','NIUR','JI','OUGIN',
		'AJOL',  'AJOT','JEOLO','JEOM','JEOP','JEOG','JEOS','JORJ','JEOR','NJOT','UJOT','JEOT','JEOD','JEOC', 'JO','JA' ,'JE',
		'K', 'K',  'SI', 'SI', 'KN','IKM', 'SAT','SE', 
		'KR', 'KO', 'KEI','KU', 'VANSA','KA', 'KS','KLAN','KL', 'KZ', 'KTIK',
		'KTIF','KTIS','KTIS','KTIL','KSIO','KTI', 'KTU', 'KTE','KTO','KTR','KT', 'F',  'T', 
		'OU',  'L',  'RL',  'KLO',  'KR', 'PSIA');
		$sIn = str_replace( $convPrIn, $convPrOut, $sIn );
		 
		$sIn = preg_replace( '`GU([^RLMBSTPZN])`', 'G$1', $sIn ); // Gueu !
		$sIn = preg_replace( '`GNO([MLTNRKG])`', 'NIO$1', $sIn ); // GNO ! Tout sauf S pour gnos
		$sIn = preg_replace( '`GNO([MLTNRKG])`', 'NIO$1', $sIn ); // bis -> gnognotte! Si quelqu'un sait le faire en une seule regexp...
		
		
		// TI -> SI v2.0
		$convPrIn  = array( 'BUTIE','BUTIA','BATIA','ANTIEL','RETION','ENTIEL','ENTIAL','ENTIO','ENTIAI','UJETION','ATIEM','PETIEN',
		'CETIE','OFETIE','IPETI','LBUTION','BLUTION','LETION','LATION','SATIET'); 
		$convPrOut = array( 'BUSIE','BUSIA','BASIA','ANSIEL','RESION','ENSIEL','ENSIAL','ENSIO','ENSIAI','UJESION','ASIAM','PESIEN',
		'CESIE','OFESIE','IPESI','LBUSION','BLUSION','LESION','LASION','SASIET');
		$sIn = str_replace( $convPrIn, $convPrOut, $sIn );
		$sIn = preg_replace( '`(.+)ANTI(AL|O)`', '$1ANSI$2', $sIn ); // sauf antialcoolique, antialbumine, antialarmer, ...
		$sIn = preg_replace( '`(.+)INUTI([^V])`', '$1INUSI$2', $sIn ); // sauf inutilité, inutilement, diminutive, ...
		$sIn = preg_replace( '`([^O])UTIEN`', '$1USIEN', $sIn ); // sauf soutien, ...
		$sIn = preg_replace( '`([^DE])RATI[E]$`', '$1RASI$2', $sIn ); // sauf xxxxxcratique, ...
		// TIEN TION -> SIEN SION v3.1
		$sIn = preg_replace( '`([^SNEU]|KU|KO|RU|LU|BU|TU|AU)T(IEN|ION)`', '$1S$2', $sIn );
		
		
		// H muet
		$sIn = preg_replace( '`([^CS])H`', '$1', $sIn ); 	// H muet
		$sIn = str_replace( "ESH", "ES", $sIn );			// H muet
		$sIn = str_replace( "NSH", "NS", $sIn );			// H muet
		$sIn = str_replace( "SH", "CH", $sIn );				// ou pas!
		
		// NASALES
		$convNasIn  = array( 'OMT','IMB', 'IMP','UMD','TIENT','RIENT','DIENT','IEN', 
		'YMU','YMO','YMA','YME', 'YMI','YMN','YM', 'AHO','FAIM','DAIM','SAIM','EIN','AINS');
		$convNasOut = array( 'ONT','INB', 'INP','OND','TIANT','RIANT','DIANT', 'IN', 
		'IMU','IMO','IMA','IME', 'IMI','IMN','IN',  'AO', 'FIN','DIN', 'SIN','AIN','INS');
		$sIn = str_replace( $convNasIn, $convNasOut, $sIn ); 				
		// AIN -> IN v2.0
		$sIn = preg_replace( '`AIN$`', 'IN', $sIn );
		$sIn = preg_replace( '`AIN([BTDK])`', 'IN$1', $sIn );
		// UN -> IN
		$sIn = preg_replace( '`([^O])UND`', '$1IND', $sIn ); // aucun mot français ne commence par UND!
		$sIn = preg_replace( '`([JTVLFMRPSBD])UN([^IAE])`', '$1IN$2', $sIn );
		$sIn = preg_replace( '`([JTVLFMRPSBD])UN$`', '$1IN', $sIn );
		$sIn = preg_replace( '`RFUM$`', 'RFIN', $sIn );
		$sIn = preg_replace( '`LUMB`', 'LINB', $sIn );
		// EN -> AN
		$sIn = preg_replace( '`([^BCDFGHJKLMNPQRSTVWXZ])EN`', '$1AN', $sIn ); 	
		$sIn = preg_replace( '`([VTLJMRPDSBFKNG])EN([BRCTDKZSVN])`', '$1AN$2', $sIn ); // deux fois pour les motifs recouvrants malentendu, pendentif, ...
		$sIn = preg_replace( '`([VTLJMRPDSBFKNG])EN([BRCTDKZSVN])`', '$1AN$2', $sIn ); // si quelqu'un sait faire avec une seule regexp!
		$sIn = preg_replace( '`^EN([BCDFGHJKLNPQRSTVXZ]|CH|IV|ORG|OB|UI|UA|UY)`', 'AN$1', $sIn );
		$sIn = preg_replace( '`(^[JRVTH])EN([DRTFGSVJMP])`', '$1AN$2', $sIn );
		$sIn = preg_replace( '`SEN([ST])`', 'SAN$1', $sIn );
		$sIn = preg_replace( '`^DESENIV`', 'DESANIV', $sIn );
		$sIn = preg_replace( '`([^M])EN(UI)`', '$1AN$2', $sIn );
		$sIn = preg_replace( '`(.+[JTVLFMRPSBD])EN([JLFDSTG])`', '$1AN$2', $sIn );
		// EI -> AI
		$sIn = preg_replace( '`([VSBSTNRLPM])E[IY]([ACDFRJLGZ])`', '$1AI$2', $sIn );
		
		// Histoire d'Ô
		$convNasIn  = array( 'EAU', 'EU',  'Y', 'EOI', 'JEA','OIEM','OUANJ','OUA','OUENJ');
		$convNasOut = array(   'O',  'E',  'I',  'OI', 'JA' ,'OIM' ,'OUENJ', 'OI','OUANJ');
		$sIn = str_replace( $convNasIn, $convNasOut, $sIn );
		$sIn = preg_replace( '`AU([^E])`', 'O$1', $sIn ); // AU sans E qui suit
		
		// Les retouches!
		$sIn = preg_replace( '`^BENJ`', 'BINJ', $sIn );				// retouche BENJ -> BINJ 
		$sIn = preg_replace( '`RTIEL`', 'RSIEL', $sIn );			// retouche RTIEL -> RSIEL
		$sIn = preg_replace( '`PINK`', 'PONK', $sIn );				// retouche PINK -> PONK
		$sIn = preg_replace( '`KIND`', 'KOND', $sIn );				// retouche KIND -> KOND
		$sIn = preg_replace( '`KUM(N|P)`', 'KON$1', $sIn );			// retouche KUMN KUMP
		$sIn = preg_replace( '`LKOU`', 'LKO', $sIn );				// retouche LKOU -> LKO
		$sIn = preg_replace( '`EDBE`', 'EBE', $sIn );				// retouche EDBE pied-bœuf
		$sIn = preg_replace( '`ARCM`', 'ARKM', $sIn );				// retouche SCH -> CH
		$sIn = preg_replace( '`SCH`', 'CH', $sIn );					// retouche SCH -> CH
		$sIn = preg_replace( '`^OINI`', 'ONI', $sIn );				// retouche début OINI -> ONI
		$sIn = preg_replace( '`([^NDCGRHKO])APT`', '$1AT', $sIn );	// retouche APT -> AT
		$sIn = preg_replace( '`([L]|KON)PT`', '$1T', $sIn );		// retouche LPT -> LT
		$sIn = preg_replace( '`OTB`', 'OB', $sIn );					// retouche OTB -> OB (hautbois)
		$sIn = preg_replace( '`IXA`', 'ISA', $sIn );				// retouche IXA -> ISA
		$sIn = preg_replace( '`TG`', 'G', $sIn );					// retouche TG -> G
		$sIn = preg_replace( '`^TZ`', 'TS', $sIn );					// retouche début TZ -> TS
		$sIn = preg_replace( '`PTIE`', 'TIE', $sIn );				// retouche PTIE -> TIE
		$sIn = preg_replace( '`GT`', 'T', $sIn );					// retouche GT -> T
		$sIn = str_replace( "ANKIEM", "ANKILEM", $sIn );			// retouche tranquillement
		$sIn = preg_replace( "`(LO|RE)KEMAN`", "$1KAMAN", $sIn );	// KEMAN -> KAMAN
		$sIn = preg_replace( '`NT(B|M)`', 'N$1', $sIn );			// retouche TB -> B  TM -> M
		$sIn = preg_replace( '`GSU`', 'SU', $sIn );					// retouche GS -> SU
		$sIn = preg_replace( '`ESD`', 'ED', $sIn );					// retouche ESD -> ED 
		$sIn = preg_replace( '`LESKEL`','LEKEL', $sIn );			// retouche LESQUEL -> LEKEL
		$sIn = preg_replace( '`CK`', 'K', $sIn );					// retouche CK -> K
		
		// Terminaisons
		$sIn = preg_replace( '`USIL$`', 'USI', $sIn ); 				// terminaisons USIL -> USI
		$sIn = preg_replace( '`X$|[TD]S$|[DS]$`', '', $sIn );		// terminaisons TS DS LS X T D S...  v2.0
		$sIn = preg_replace( '`([^KL]+)T$`', '$1', $sIn );			// sauf KT LT terminal
		$sIn = preg_replace( '`^[H]`', '', $sIn );					// H pseudo muet en début de mot, je sais, ce n'est pas une terminaison
		$sBack2=$sIn;												// on sauve le code (utilisé pour les mots très courts)
		$sIn = preg_replace( '`TIL$`', 'TI', $sIn );				// terminaisons TIL -> TI
		$sIn = preg_replace( '`LC$`', 'LK', $sIn );					// terminaisons LC -> LK
		$sIn = preg_replace( '`L[E]?[S]?$`', 'L', $sIn );			// terminaisons LE LES -> L
		$sIn = preg_replace( '`(.+)N[E]?[S]?$`', '$1N', $sIn );		// terminaisons NE NES -> N
		$sIn = preg_replace( '`EZ$`', 'E', $sIn );					// terminaisons EZ -> E
		$sIn = preg_replace( '`OIG$`', 'OI', $sIn );				// terminaisons OIG -> OI
		$sIn = preg_replace( '`OUP$`', 'OU', $sIn );				// terminaisons OUP -> OU
		$sIn = preg_replace( '`([^R])OM$`', '$1ON', $sIn );			// terminaisons OM -> ON sauf ROM
		$sIn = preg_replace( '`LOP$`', 'LO', $sIn );				// terminaisons LOP -> LO
		$sIn = preg_replace( '`NTANP$`', 'NTAN', $sIn );			// terminaisons NTANP -> NTAN
		$sIn = preg_replace( '`TUN$`', 'TIN', $sIn );				// terminaisons TUN -> TIN
		$sIn = preg_replace( '`AU$`', 'O', $sIn );					// terminaisons AU -> O
		$sIn = preg_replace( '`EI$`', 'AI', $sIn );					// terminaisons EI -> AI
		$sIn = preg_replace( '`R[DG]$`', 'R', $sIn );				// terminaisons RD RG -> R
		$sIn = preg_replace( '`ANC$`', 'AN', $sIn );				// terminaisons ANC -> AN
		$sIn = preg_replace( '`KROC$`', 'KRO', $sIn );				// terminaisons C muet de CROC, ESCROC
		$sIn = preg_replace( '`HOUC$`', 'HOU', $sIn );				// terminaisons C muet de CAOUTCHOUC
		$sIn = preg_replace( '`OMAC$`', 'OMA', $sIn );				// terminaisons C muet de ESTOMAC (mais pas HAMAC)
		$sIn = preg_replace( '`([J])O([NU])[CG]$`', '$1O$2', $sIn );// terminaisons C et G muet de OUC ONC OUG
		$sIn = preg_replace( '`([^GTR])([AO])NG$`', '$1$2N', $sIn );// terminaisons G muet ANG ONG sauf GANG GONG TANG TONG
		$sIn = preg_replace( '`UC$`', 'UK', $sIn );					// terminaisons UC -> UK
		$sIn = preg_replace( '`AING$`', 'IN', $sIn );				// terminaisons AING -> IN
		$sIn = preg_replace( '`([EISOARN])C$`', '$1K', $sIn );		// terminaisons C -> K
		$sIn = preg_replace( '`([ABD-MO-Z]+)[EH]+$`', '$1', $sIn );	// terminaisons E ou H sauf pour C et N
		$sIn = preg_replace( '`EN$`', 'AN', $sIn );					// terminaisons EN -> AN (difficile à faire avant sans avoir des soucis) Et encore, c'est pas top!
		$sIn = preg_replace( '`(NJ)EN$`', '$1AN', $sIn );			// terminaisons EN -> AN
		$sIn = preg_replace( '`^PAIEM`', 'PAIM', $sIn ); 			// PAIE -> PAI
		$sIn = preg_replace( '`([^NTB])EF$`', '\1', $sIn );			// F muet en fin de mot
		
		$sIn = preg_replace( '`(.)\1`', '$1', $sIn ); 				// supression des répétitions (suite à certains remplacements)
		
		// cas particuliers, bah au final, je n'en ai qu'un ici
		$convPartIn  = array( 'FUEL');
		$convPartOut = array( 'FIOUL');
		$sIn = str_replace( $convPartIn, $convPartOut, $sIn ); 		
		
		// Ce sera le seul code retourné à une seule lettre!
		if ($sIn=='O') return($sIn); 								
		 
		// seconde chance sur les mots courts qui ont souffert de la simplification
		if (strlen($sIn)<2) 
		{
			// Sigles ou abréviations
			if (preg_match("`[BCDFGHJKLMNPQRSTVWXYZ][BCDFGHJKLMNPQRSTVWXYZ][BCDFGHJKLMNPQRSTVWXYZ][BCDFGHJKLMNPQRSTVWXYZ]*`",$sBack)) 
				return($sBack);
			
			if (preg_match("`[RFMLVSPJDF][AEIOU]`",$sBack))
			{
				if (strlen($sBack)==3) 
					return(substr($sBack,0,2));// mots de trois lettres supposés simples
				if (strlen($sBack)==4) 
					return(substr($sBack,0,3));// mots de quatre lettres supposés simples
			}
			
			if (strlen($sBack2)>1) return $sBack2;
		}
		 
		if (strlen($sIn)>1)
			return substr($sIn,0,30); // Je limite à 16 caractères mais vous faites comme vous voulez!
		else
			return '';
		}
		
		public static function make_facture($id_garage){
			if (!is_dir($_SERVER['DOCUMENT_ROOT'].'/fichiers/factures/'.$id_garage.'/')) {
					@mkdir($_SERVER['DOCUMENT_ROOT'].'/fichiers/factures/'.$id_garage.'/');
			}
			
			if (!file_exists($_SERVER['DOCUMENT_ROOT'].'/fichiers/factures/'.$id_garage.'/countage.txt')) {
				$fp = fopen($_SERVER['DOCUMENT_ROOT'].'/fichiers/factures/'.$id_garage.'/countage.txt', 'x');
				flock($fp, LOCK_EX);
				fwrite($fp, "0");
				fclose($fp);
				unset($fp);
			}
			
			
			$filename = $_SERVER['DOCUMENT_ROOT'].'/fichiers/factures/'.$id_garage.'/countage.txt';
			$fp = fopen($filename, 'r+');
			flock($fp, LOCK_EX);
			$count = (int)fread($fp, 8);
			$count++;
			if($count <0 || $count > 99999999) {
				$count=0;
			}
			fseek($fp, 0);
			ftruncate($fp, 0);
			fwrite($fp, $count);
			flock($fp, LOCK_UN);
			fclose($fp);
			return(sprintf("%08d",$count));
		}
		
		public static function set_facture($id_garage, $numero_facture){
			if (!is_dir($_SERVER['DOCUMENT_ROOT'].'/fichiers/factures/'.$id_garage.'/')) {
					@mkdir($_SERVER['DOCUMENT_ROOT'].'/fichiers/factures/'.$id_garage.'/');
			}
			
			if (!file_exists($_SERVER['DOCUMENT_ROOT'].'/fichiers/factures/'.$id_garage.'/countage.txt')) {
				$fp = fopen($_SERVER['DOCUMENT_ROOT'].'/fichiers/factures/'.$id_garage.'/countage.txt', 'x');
				flock($fp, LOCK_EX);
				fwrite($fp, "0");
				fclose($fp);
				unset($fp);
			}
			
			
			$filename = $_SERVER['DOCUMENT_ROOT'].'/fichiers/factures/'.$id_garage.'/countage.txt';
			$fp = fopen($filename, 'r+');
			flock($fp, LOCK_EX);
			fseek($fp, 0);
			ftruncate($fp, 0);
			fwrite($fp, $numero_facture);
			flock($fp, LOCK_UN);
			fclose($fp);
			return(sprintf("%08d",$numero_facture));
		}
		
		
		public static function make_devis($id_garage){
			if (!is_dir($_SERVER['DOCUMENT_ROOT'].'/fichiers/factures/'.$id_garage.'/')) {
					@mkdir($_SERVER['DOCUMENT_ROOT'].'/fichiers/factures/'.$id_garage.'/');
			}
			
			if (!file_exists($_SERVER['DOCUMENT_ROOT'].'/fichiers/factures/'.$id_garage.'/countage_devis.txt')) {
				$fp = fopen($_SERVER['DOCUMENT_ROOT'].'/fichiers/factures/'.$id_garage.'/countage_devis.txt', 'x');
				flock($fp, LOCK_EX);
				fwrite($fp, "0");
				fclose($fp);
				unset($fp);
			}
			
			
			$filename = $_SERVER['DOCUMENT_ROOT'].'/fichiers/factures/'.$id_garage.'/countage_devis.txt';
			$fp = fopen($filename, 'r+');
			flock($fp, LOCK_EX);
			$count = (int)fread($fp, 8);
			$count++;
			if($count <0 || $count > 99999999) {
				$count=0;
			}
			fseek($fp, 0);
			ftruncate($fp, 0);
			fwrite($fp, $count);
			flock($fp, LOCK_UN);
			fclose($fp);
			return(sprintf("%08d",$count));
		}
		
		
		
		public static function purge_paiements($tableau){
			$i = 0;
			foreach($tableau as $key => $value){
				if ($value["description"] == "" && $value["mode"] == "" && $value["montant"] == ""){
					unset($tableau[$i]);
				}
				$i++;
			}
			return array_values($tableau); 
		}
		
		public static function purge_articles($tableau){
			$i = 0;
			foreach($tableau as $key => $value){
				if ($value["type"] == "" && $value["prix_ht"] == "" && $value["nom"] == ""){
					unset($tableau[$i]);
				}
				$i++;
			}
			return array_values($tableau); 
		}
		
		
}