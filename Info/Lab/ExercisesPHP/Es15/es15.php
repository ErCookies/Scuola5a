<?php
	# Cucchi Francesco 5AI es15.php
	
	$ckeVal = array();
	if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)){
		$ckeVal = (isset($_COOKIE['queue']) && !empty($_COOKIE['queue'])) ? explode(';', $_COOKIE['queue']) : array();
		
		print_r($ckeVal);
		
		if(isset($_POST['add'])){
			if(isset($_POST['nome']) && !empty($_POST['nome'])){
				array_push($ckeVal, $_POST['nome']);
				#$ckeVal[] = $_POST['nome'];
				setcookie('queue',implode(';', $ckeVal));
			}
		}
		elseif(isset($_POST['pop'])){
			if(count($ckeVal) > 1){
				array_shift($ckeVal);
				setcookie('queue',implode(';', $ckeVal));
			}
			elseif(count($ckeVal) == 1){
				array_shift($ckeVal);
				setcookie('queue',"");
			}
			else{
				$ckeVal = array();
				setcookie('queue',"");
			}
		}
		else{
			$ckeVal = array();
			setcookie('queue',"");
		}
		#
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Coda dal medico</title>
	</head>
	<body>
		<h1>Gestione coda</h1>

		<form method="POST">
			<input type="text" name="nome"><br><br>
			<input type="submit" name="add" value="Add In Coda"><br>
			<input type="submit" name="pop" value="POP"><br>
			<input type="submit" name="clear" value="Svuota Coda">
		</form>
		<br>
		<?php
			#foreach su array
			if(count($ckeVal) > 0){
				echo "MEDICO";
				foreach($ckeVal as $v){
					echo " &larr; " . $v;
				}
			}else{
				echo "CODA VUOTA";
			}
			echo "<br><br><br><b>DEBUG:</b>";
			echo "<br> Stampa arr: " . implode(";", $ckeVal);
			echo "<br> IS cookie SET (V/F - 1/0): " . isset($_COOKIE['queue']);
		?>
	</body>
</html>

