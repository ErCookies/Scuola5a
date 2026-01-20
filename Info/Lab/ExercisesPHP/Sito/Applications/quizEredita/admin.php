<?php
	// Cucchi Francesco 5^AI admin.php
	
	session_start();
	if(empty($_SESSION['role']) || $_SESSION['role'] != 'Admin'){
		if(empty($_SESSION['role']) || $_SESSION['role'] != 'User')
			header("Location: ../../Functionalities/logout.php");
		else
			header("Location: ../../Homes/homeUser.php");
	}
	$alrDone = file_exists("Quizzes/quiz_".date("Ymd").".csv")
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Inserimento Quiz - Admin Panel</title>
		<script src="script.js"></script>
	</head>
	
	<body>
		<h1>Inserimento Quiz - Admin Panel</h1>
		<a href="../../Homes/homeAdmin.php"><button>&rarr; TORNA ALLA HOME &larr;</button></a>
		<br>
		<br>
		<?php
			if($alrDone){
		?>
			<h3>Hai gi&agrave; creato il quiz per oggi</h3>
		<?php
				}
			else{
		?>
		<form method="POST" action="manageQuizWrite.php" onsubmit="return checkData(this);">
			<b>Inserire i dati del quiz:</b><br>
			<?php
				for($k = 1; $k <= 5; $k++){
					echo "Parola $k: <input type=\"text\" name=\"word$k\" required><br>";
				}
			?>
			Parola vincente: <input type="text" name="winWord"><br>
			<input type="submit" value="Invia">
		</form>
		<?php
				if(!empty($_GET['errVal']) && $_GET['errVal'] == 'true')
					echo "<p style=\"color:red; font-weight:bold;\">Nessuna delle parole pu&ograve; essere uguale ad un'altra!</p>";
				if(!empty($_GET['errFOp']) && $_GET['errFOp'] == 'true')
					echo "<p style=\"color:red; font-weight:bold;\">Errore nella scrittura del quiz. Riprovare pi&ugrave; tardi.</p>";
			}
		?>
	</body>
</html>