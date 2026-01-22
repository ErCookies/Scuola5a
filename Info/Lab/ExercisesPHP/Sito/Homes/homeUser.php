<?php
	// Cucchi Francesco 5^AI homeUser.php
	
	session_start();
	// Check if who's trying to access this page has the right role
	// Wrong role
	if(empty($_SESSION['role']) || $_SESSION['role'] != 'User'){
		if(empty($_SESSION['role']) || $_SESSION['role'] != 'Admin')
			header("Location: ../Functionalities/logout.php");
		else
			header("Location: homeAdmin.php");
	}
	// Correct role
	else{
?>

<!DOCTYPE html>
<html>
	<head>
		<title>HOME USER</title>
	</head>
	
	<body>
		<h1>HOME USER</h1>
		<?php
			echo "<p>Benvenuto/a, utente " . $_SESSION['user'] . "</p>";
		?>
		<a href="../Functionalities/logout.php"><button>LOGOUT</button></a>
		<br>
		<br>
		<span>Applicazioni disponibili:</span>
		<ul>
			<li><a href="../Applications/quizEredita/user.php">Quiz Eredit&agrave;</a></li>
		</ul>	
	</body>
</html>
<?php
	}
?>