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
    
}