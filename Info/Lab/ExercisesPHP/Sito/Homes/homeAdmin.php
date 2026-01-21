<?php
	// Cucchi Francesco 5^AI homeAdmin.php
	
	session_start();
	if(empty($_SESSION['role']) || $_SESSION['role'] != 'Admin'){
		if(empty($_SESSION['role']) || $_SESSION['role'] != 'User')
			header("Location: ../Functionalities/logout.php");
		else
			header("Location: homeUser.php");
	}
	else{
?>

<!DOCTYPE html>
<html>
	<head>
		<title>HOME ADMIN</title>
	</head>
	
	<body>
		<h1>HOME ADMIN</h1>
		<?php
			echo "<p>Benvenuto/a, admin " . $_SESSION['user'] . "</p>";
		?>
		<a href="../Functionalities/logout.php"><button>LOGOUT</button></a>
		<br>
		<br>
		<span>Applicazioni disponibili:</span>
		<ul>
			<li><a href="../Applications/quizEredita/admin.php">Quiz Eredit&agrave;</a></li>
		</ul>
	</body>
</html>
<?php
	}
?>