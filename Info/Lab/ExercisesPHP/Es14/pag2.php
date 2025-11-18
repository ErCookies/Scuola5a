<!DOCTYPE html>
<html>
	<head>
		<title>PAGINA 1</title>
		
		<?php
			$colChosen = (isset($_COOKIE['favColor'])) ? $_COOKIE['favColor'] : null;
			
			if($colChosen == null)
				echo "<style>html {background-color: white;}</style>";
			else
				echo "<style>html {background-color: $colChosen;}</style>";
		?>
	</head>
	
	<body>
		<h1>Questa &egrave; un'altra pagina</h1>
		
		<a href="es13.php"><button>&larr; Form</button></a>
		<a href="pag1.php"><button>&rarr; Pag 1</button></a>
	</body>
</html>