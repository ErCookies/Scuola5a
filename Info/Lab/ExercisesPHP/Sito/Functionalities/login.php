<?php
	// Cucchi Francesco 5^AI login.php
	
	session_start();
	// Check if who's trying to login is not already logged in
	// Already logged in
	if(!empty($_SESSION['role']) && ($_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'User')){
		if($_SESSION['role'] == 'Admin')
			header("Location: ../Homes/homeAdmin.php");
		elseif($_SESSION['role'] == 'User')
			header("Location: ../Homes/homeUser.php");
		else
			header("Location: logout.php");
	}
	// Not logged in
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
			// Some errors
			if(isset($_GET['errLog']) && $_GET['errLog'])
				echo "<p><b style=\"color:red;\"> Credenziali errate, ritenta l'accesso</b></p>";
			if(isset($_GET['errReg']) && $_GET['errReg'])
				echo "<p><b style=\"color:red;\"> Utente gi&agrave; esistente, impossibile completare la registrazione</b></p>";
			if(isset($_GET['regCompl']) && $_GET['regCompl'])
				echo "<p><b style=\"color:green;\"> Utente creato, procedere con il login</b></p>";
	}
		?>
	</body>
</html>