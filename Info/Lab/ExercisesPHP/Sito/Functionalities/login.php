<?php
	// Cucchi Francesco 5^AI login.php
	
	session_start();
	if(!empty($_SESSION['role']) && ($_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'User')){
		if($_SESSION['role'] == 'Admin')
			header("Location: ../Homes/homeAdmin.php");
		elseif($_SESSION['role'] == 'User')
			header("Location: ../Homes/homeUser.php");
		else
			header("Location: logout.php");
	}
	else{
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Login Page</title>
	</head>
	
	<body>
		<h1>Pagina di Log-In</h1>
		<form method="POST" action="checkUser.php">
			Username: <input type="text" name="user" placeholder="User..." required>
			<br>
			Password: <input type="password" name="pwd" placeholder="Pwd..." required>
			<br>
			<input type="submit" name="login" value="ACCEDI">
			<input type="submit" name="reg" value="REGISTRATI">
		</form>
		<?php
		if(isset($_GET['errLog']) && $_GET['errLog'])
			echo "<p><b style=\"color:red;\"> Credenziali errate, ritenta l'accesso</b></p>";
		if(isset($_GET['errReg']) && $_GET['errReg'])
			echo "<p><b style=\"color:red;\"> Utente gi&agrave; esistente, impossibile completare la registrazione</b></p>";
		if(isset($_GET['regCompl']) && $_GET['regCompl'])
			echo "<p><b style=\"color:green;\"> Utente creato, procedere con il login</b></p>";
	}
			else{
		?>
		<p><b>HAI GI&Agrave; EFFETTUATO IL LOGIN</b></p>
		<?php
				echo "<a href=\"../Homes/home" . $_SESSION['role'] . ".php\"><button>TORNA ALLA HOME</button></a>";
			}
		?>
	</body>
</html>