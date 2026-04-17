<?php
	function searchGelName($nome){
		$gelati = array();
        $fp = fopen("gelati.csv", "r");
        if($fp)
        {
            while(($dati = fgetcsv($fp, 0, ";")))
            {
                if(str_contains($dati[0], $nome))
					$gelati[] = $dati[0] . " - " . $dati[1] . " - " . $dati[4];
            }
            fclose($fp);
        }
        return $gelati;
	}
	
	function searchGelData($data){
		$gelati = array();
        $fp = fopen("gelati.csv", "r");
        if($fp)
        {
            while(($dati = fgetcsv($fp, 0, ";")))
            {
                if(str_contains(strval($dati[1]), $data))
					$gelati[] = $dati[0] . " - " . $dati[1] . " - " . $dati[4];
            }
            fclose($fp);
        }
        return $gelati;
	}
	
	function searchGelProd($prod){
		$gelati = array();
        $fp = fopen("gelati.csv", "r");
        if($fp)
        {
            while(($dati = fgetcsv($fp, 0, ";")))
            {
                if(str_contains($dati[4], $prod))
					$gelati[] = $dati[0] . " - " . $dati[1] . " - " . $dati[4];
            }
            fclose($fp);
        }
        return $gelati;
	}
?>