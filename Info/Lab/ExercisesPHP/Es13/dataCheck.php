<?php
	function dataCheck($arr, &$errMex){
		$alos = false;
		$nameErr = false;
		
		foreach($arr as $k => $v){
			if($k === "nome"){
				$nameErr = (htmlspecialchars($v) == null || htmlspecialchars($v) === "");
			}
			else{
				if(!$alos && $v == "on") # on --> se checkbox selezionata setta "on"
					$alos = true;
			}
		}
		
		if(!$alos && $nameErr)
			$errMex = "<p>Nome inserito non valido</p><p>Selezionare almeno un corso</p>"
						. "<a href=\"" . $_SERVER['PHP_SELF'] ."\"><button>&larr; TORNA INDIETRO</button></a>";
		else if(!$alos)
			$errMex = "<p>Selezionare almeno un corso</p>"
						. "<a href=\"" . $_SERVER['PHP_SELF'] ."\"><button>&larr; TORNA INDIETRO</button></a>";
		else if($nameErr)
			$errMex = "<p>Nome inserito non valido</p>"
						. "<a href=\"" . $_SERVER['PHP_SELF'] ."\"><button>&larr; TORNA INDIETRO</button></a>";
		else
			$errMex = "";
		
		#return !($nome == null || $nome === "");
		return $errMex === "";
	}
?>