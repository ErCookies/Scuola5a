<?php
	// Cucchi Francesco 5^AI ereditaAdmin.php
	// require_once '.php';
	// date("Ymd") --> 20260112 / AnnoMeseGiorno
	session_start();
	if(empty($_SESSION['role']) || $_SESSION['role'] != 'Admin'){
		if(empty($_SESSION['role']) || $_SESSION['role'] != 'User')
			header("Location: ../../Functionalities/logout.php");
		else
			header("Location: ../../Homes/homeUser.php");
	}
	$file = fopen("Quizzes/quiz_".date("Ymd").".csv", "r");
	$alrDone = ($file != false);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Inserimento Quiz - Admin Panel</title>
		<script src="script.js"></script>
	</head>
	
	<body>
		<h1>Inserimento Quiz - Admin Panel</h1>
		<?php
			if($alrDone){
		?>
			<h3>Hai gi&agrave; creato il quiz per oggi</h3>
			<a href="../Homes/homeAdmin.php"><button>&rarr; TORNA ALLA HOME &larr;</button></a>
		<?php
				}
			else{
		?>
		<form method="POST" action="manageQuizWrite.php" onsubmit="return checkData();">
			<?php
				for($k = 1; $k <= 5; $k++){
					echo "Parola $k: <input type=\"text\" name=\"word$k\" required><br>";
				}
			?>
			Parola vincente: <input type="text" name="winWord"><br>
			<input type="submit" value="Invia">
		</form>
		<?php
			}
		?>
	</body>
</html>