<?php
    function searchUser($user, $pwd) {
		$utente = null;
        $fp = fopen("users.csv", "r");
        if($fp)
        {
            while(($dati = fgetcsv($fp, 0, ";")))
            {
                if($dati[0] == $user && $dati[1] == $pwd)
					$utente = $dati;
            }
            fclose($fp);
        }
        return $utente;       
    }
?>