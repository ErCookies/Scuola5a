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
		<h1>Questa &egrave; una pagina</h1>
		
		<a href="es13.php"><button>&larr; Form</button></a>
		<a href="pag2.php"><button>&rarr; Pag 2</button></a>
	</body>
</html>