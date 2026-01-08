<?php
	# Cucchi Francesco 5AI 24/11/2025 index.php
	
	require_once 'functions.php';
	
	$ckeVal = array();
	if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)){
		$ckeVal = (isset($_COOKIE['pagella']) && !empty($_COOKIE['pagella'])) ? cookieToArray($_COOKIE['pagella']) : array();
		if(isset($_POST['add'])){
			if(isset($_POST['voto']) && !empty($_POST['voto']) && intval($_POST['voto']) >= 1 && intval($_POST['voto']) <=10){
				$ckeVal[$_POST['materia']] = $_POST['voto'];
				setcookie('pagella', implode(';', $ckeVal));
			}
		}
		else{
			$ckeVal = array();
			setcookie('pagella',"");
		}
	}
?>

<!DOCTYPE html>

<html>
	<head>
		<title>Pagella</title>
		<script src="script.js"></script>
	</head>
	
	<body>
		
		<form method="POST" onsubmit="return checkForm(this);">
			Materia: <select name="materia">
				<option value="Matematica">Matematica</option>
				<option value="Italiano">Italiano</option>
				<option value="Storia">Storia</option>
				<option value="Informatica">Informatica</option>
				<option value="TPS">TPS</option>
				<option value="Sistemi">Sistemi</option>
				<option value="Inglese">Inglese</option>
			</select>
			<br>
			Voto: <input type="text" name="voto" id="inVoto" placeholder="Voto (1-10)...">
			<br>
			<input type="submit" name="add" value="Aggiungi Voto">
			<input type="submit" name="clear" value="SVUOTA PAGELLA">
		</form>
		
		<?php
			$tot = 0;
			if(count($ckeVal) > 0){
				echo "<table border=1><thead><th>Materia</th><th>Voto</th></thead><tbody>";
				foreach($ckeVal as $mat => $vt){
					echo "<tr><td>$mat</td><td>$vt</td></tr>";
					$tot += intval($vt);
				}
				echo "<tr><td>Media</td><td>" . round($tot/count($ckeVal), 2) . "</td></tr>";
				echo "</tbody></table>";
			}
			else
				echo "<p><b>Nessun Voto Inserito</b></p>";
			
			echo "<br><br><br> <h2>DEBUG:</h2>";
			print_r($ckeVal);
			echo "<br>" . implode(';',$ckeVal);
		?>
		
	</body>
</html>