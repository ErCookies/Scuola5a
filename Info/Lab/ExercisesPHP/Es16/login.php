<?php
	# Cucchi Francesco 5^AI login.php
	
	if(!isset($_SESSION['role'])){
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Esercizio 16</title>
	</head>
	
	<body>
		<h1>Pagina di Log-In</h1>
		<form method="POST" action="checkUser.php">
			Username: <input type="text" name="user" placeholder="User..." required>
			<br>
			Password: <input type="password" name="pwd" placeholder="Pwd..." required>
			<br>
			<input type="submit" value="ACCEDI">
		</form>
		
		<?php
		if(isset($_GET['err']) && $_GET['err'])
			echo "<p><b style=\"color:red;\"> Credenziali errate, ritenta l'accesso</b></p>";
	}
			else{
		?>
		<p><b>HAI GI&Agrave; EFFETTUATO IL LOGIN</b></p>
		<?php
				echo "<a href=\"home" . $_SESSION['role'] . ".php\"><button>TORNA ALLA HOME</button></a>";
			}
		?>
	</body>
</html>