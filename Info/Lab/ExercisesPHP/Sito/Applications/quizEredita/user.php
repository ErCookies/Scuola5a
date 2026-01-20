<?php
	// Cucchi Francesco 5^AI user.php
	// require_once '.php';
	
	session_start();
	if(empty($_SESSION['role']) || $_SESSION['role'] != 'User'){
		if(empty($_SESSION['role']) || $_SESSION['role'] != 'Admin')
			header("Location: ../../Functionalities/logout.php");
		else
			header("Location: ../../Homes/homeAdmin.php");
	}else{
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Selezione quiz</title>
	</head>
	
	<body>
		<h1>Seleziona il quiz interessato</h1>
		<?php
			if(!empty($_GET['errDataQuiz']) && $_GET['errDataQuiz'] == true){
				echo "<p style=\"color:red;\"><b>Errore nella comunicazione con il server</b></p>";
			}
		?>
		<a href="../../Homes/homeUser.php"><button>&rarr; TORNA ALLA HOME &larr;</button></a>
		<br><br>
		<form action="quiz.php">
			Data quiz yyyyMMdd: <input type="text" name="dataQuiz" placeholder="yyyyMMdd" pattern="\d{8}" required><br>
			<input type="submit" value="Ricerca">
		</form>
	</body>
</html>
<?php
	}
?>