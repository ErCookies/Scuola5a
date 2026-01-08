<?php
	# Cucchi Francesco 5^AI homeCli.php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>HOME CLIENTE</title>
	</head>
	
	<body>
		<h1>HOME CLIENTE</h1>
		<?php
			echo "<p>Benvenuto, cliente " . $_SESSION['user'] . "</p>";
		?>
		<a href="logout.php"><button>LOGOUT</button></a>
	</body>
</html>