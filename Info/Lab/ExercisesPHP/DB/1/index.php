<html>
	<head>
		<title>DB test</title>
	</head>
	
	<body>
		<?php
			require_once 'conDB.php';
			$res = execQuery('select * from bollette;');
			echo "<pre>";
			print_r($res);
			echo "</pre>";
		?>
		aura
	</body>
</html>