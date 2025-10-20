<!DOCTYPE html>

<html>
	<head>
		<!-- Cucchi Francesco 5AI es11.php -->
		<link rel="stylesheet" type="text/CSS" href="../style.css">
		
		<?php
			require_once '../functions.php'
		?>
	</head>
	
	<body>
		<!--
			BMI
			altezza e peso
			altezza in cm
			peso in kg
			controllo dati lato client e server
			ogni categoria mostra un'img diversa

			foreach($vettore as $key=>$value)
		-->
		<h2>Esercizio 11</h2>
		<?php 
			foreach($_POST as $k => $v)
				echo " | $k=>$v | ";
				
			if(isset($_POST['altezza']) && isset($_POST['massa'])){
				if(is_numeric($_POST['altezza']) && is_numeric($_POST['massa'])){
					
					$bmi = calcolaBMI($_POST['altezza'], $_POST['massa']);
					echo "<br>BMI = " . round($bmi, 2) . "<br>";
					
					$imgName = "";
					
					if($bmi < 18.5){
						echo "Sei SOTTOPESO";
						$imgName = "sottopeso";
					}
					else if ($bmi >=18.5 && $bmi < 24.9){
						echo "Sei NORMOPESO";
						$imgName = "normopeso";
					}
					else if ($bmi >=24.9 && $bmi < 29.9){
						echo "Sei SOVRAPPESO";
						$imgName = "sovrappeso";
					}
					else{
						echo "Sei OBESO";
						$imgName = "obeso";
					}
					
					echo "<br> immagine: $imgName";
					
					echo "<br> <img src=\"../imgs/" . $imgName . ".jpg\">";
					
				}
				else
					echo "<b>I dati inseriti non sono validi</b>";
			}
			else
				echo "<b>Non tutti i dati sono stati inseriti</b>";
		?>
	</body>
</html>
