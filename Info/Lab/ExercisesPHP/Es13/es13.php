<?php
	# Cucchi Francesco 5AI es13.php
	require_once '../functions.php';
	require_once 'dataCheck.php';
	
	$conv = ezImport("txt.txt");
	
	$reqValida = false;
	$datiValidi = false;
	$errMex = "";
	
	if(!empty($_POST) && $_SERVER['REQUEST_METHOD'] === 'POST'){
		$reqValida = true;
		$datiValidi = dataCheck($_POST, $errMex);
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title> Esercizio 13 </title>
		<script src="es13.js"></script>
	</head>
	
	<body>
		<?php
			if(!$reqValida){
		?>
		
		<form method="POST" onsubmit="return checkForm(this);">
			Nome: <input type="text" name="nome" placeholder="Nome...">
			<br>
			<?php
				foreach($conv as $v){
					echo "$v: <input type=\"checkbox\" name=\"$v\"><br>";
				}
			?>
			<input type="submit" value="INVIA">
		</form>
		
		<?php
			}
			else if(!$datiValidi){
				echo $errMex;
			}
			else{
				if(count($_POST) == 2){
					$aus;
					foreach($_POST as $k => $v){
						if($k != "nome")
							$aus = $k;
					}
					echo "<p> Ciao " . $_POST['nome'] . ", ti sei iscritto/a al seguente corso: \"" . $aus . "\"</p>";
				}
				else{
					echo "<p> Ciao " . $_POST['nome'] . ", ti sei iscritto/a ai seguenti corsi: <ul>";
					foreach($_POST as $k => $v){
						if($k != "nome")
							echo "<li>$k</li>";
					}
					echo "</ul></p>";
				}
			}
		?>
	</body>
</html>