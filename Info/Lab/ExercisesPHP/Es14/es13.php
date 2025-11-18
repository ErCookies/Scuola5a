<?php
	if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST))
		setcookie('favColor',$_POST['col'],0,'/');

	$colChosen = (isset($_COOKIE['favColor'])) ? $_COOKIE['favColor'] : null;
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Es 13</title>
		<?php
			if($colChosen == null)
				echo "<style>html {background-color: white;}</style>";
			else
				echo "<style>html {background-color: $colChosen;}</style>";
		?>
	</head>
	
	<body>
		<form method="POST">
			Il tuo colore preferito: <input type="color" name="col">
			<input type="submit" value="INVIA">
		</form>
		<br>
		<br>
		<a href="pag1.php"><button>&larr; Pag 1</button></a>
		<a href="pag2.php"><button>&rarr; Pag 2</button></a>
	</body>
</html>