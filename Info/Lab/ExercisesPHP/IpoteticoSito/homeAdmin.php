<?php
	# Cucchi Francesco 5^AI homeAdmin.php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>HOME ADMIN</title>
	</head>
	
	<body>
		<h1>HOME ADMIN</h1>
		<?php
			echo "<p>Benvenuto, amministratore " . $_SESSION['user'] . "</p>";
		?>
		<a href="logout.php"><button>LOGOUT</button></a>
	</body>
</html>