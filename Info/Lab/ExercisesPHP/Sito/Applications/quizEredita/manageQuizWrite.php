<?php
	// Cucchi Francesco 5^AI checkUser.php
	
	require_once '../../func.php';
	
	// Check on page access method
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST) && !empty($_POST)){
		// Check data validity
		$w1 = $_POST['word1'];
		$w2 = $_POST['word2'];
		$w3 = $_POST['word3'];
		$w4 = $_POST['word4'];
		$w5 = $_POST['word5'];
		$ww = $_POST['winWord'];
		$val = ($w1 !== $w2 && $w1 !== $w3 && $w1 !== $w4 && $w1 !== $w5 && $w1 !== $ww &&
				$w2 !== $w3 && $w2 !== $w4 && $w2 !== $w5 && $w2 !== $ww &&
				$w3 !== $w4 && $w3 !== $w5 && $w3 !== $ww &&
				$w4 !== $w5 && $w4 !== $ww &&
				$w5 !== $ww);
		
		if(!$val)
			header("Location: admin.php?errVal=true");
		else{
			// Try to open the file
			$f = fopen("Quizzes/quiz_".date("Ymd").".csv", "w");
			if($f != null){
				// Write the quiz on the file
				fwrite($f, $w1.';'.$w2.';'.$w3.';'.$w4.';'.$w5.PHP_EOL.$ww);
				fclose($f);
				header("Refresh:3;url=../../Homes/homeAdmin.php");
				echo "<!DOCTYPE html><script>alert(\"Ritorno alla home in 3 secondi\")</script>";
			}
			else
				// Error Redirect
				header("Location: admin.php?errFOp=true");
		}
	}
	else
		header($_SERVER['SERVER_PROTOCOL'] . " 418 I'm a teapot");
		// Placeholder error
?>