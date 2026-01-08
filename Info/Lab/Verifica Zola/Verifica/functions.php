<?php
	# Cucchi Francesco 5AI 24/11/2025 functions.php
	function cookieToArray($ckeStr){
		$arrToReturn = array();
		if($ckeStr != ""){
			$first = true;
			$tok = strtok($ckeStr, ';');
			$tok2 = strtok(';');
			
			while($tok != false){
				$arrToReturn[$tok] = [$tok2];
				
				$tok = strtok(';');
				$tok2 = strtok(';');
			}
		}
		
		return $arrToReturn;
	}
?>