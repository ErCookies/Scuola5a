<?php
	// Cucchi Francesco 5^AI admin.php
	require_once 'funcEred.php';
	
	session_start();
	// Check if who's trying to access this page has the right role
	// Wrong role
	if(empty($_SESSION['role']) || $_SESSION['role'] != 'Admin'){
		if(empty($_SESSION['role']) || $_SESSION['role'] != 'User')
			header("Location: ../../Functionalities/logout.php");
		else
			header("Location: ../../Homes/homeUser.php");
	}
	// Correct role
	else{
		// Check if an admin has already created a quiz today
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
				// Create input field for 5 words
				for($k = 1; $k <= 5; $k++){
					echo "Parola $k: <input type=\"text\" name=\"word$k\" required><br>";
				}
			?>
			Parola vincente: <input type="text" name="winWord"><br>
			<input type="submit" value="Invia">
		</form>
		<?php
				// Some errors
				if(!empty($_GET['errVal']) && $_GET['errVal'] == 'true')
					echo "<p style=\"color:red; font-weight:bold;\">Nessuna delle parole pu&ograve; essere uguale ad un'altra!</p>";
				if(!empty($_GET['errFOp']) && $_GET['errFOp'] == 'true')
					echo "<p style=\"color:red; font-weight:bold;\">Errore nella scrittura del quiz. Riprovare pi&ugrave; tardi.</p>";
			}
		?>
		<h1>Statistiche quiz</h1>
		<ul>
		<?php
			// Get all dates of quizzes, all tries from all users and number of users
			$quizDates = getAllQuizDates();
			$history = getHistory();
			$numUsers = getNumUsers();
			$totTry = count($history);
			echo "<li><b>Numero utenti: $numUsers | Numero tentativi: $totTry</b></li>";
			foreach($quizDates as $date){
				$numTry = 0;
				$numWon = 0;
				foreach($history as $try){
					if($try['dataQuiz'] == $date){
						$numTry++;
						if($try['hasWon'])
							$numWon++;
					}
				}
				if($numTry != 0)
					echo "<li>Quiz " . date("d/m/Y", strtotime($date)) . ": $numTry tentativi (" . round(($numTry/$totTry)*100, 1) . "% sul totale), $numWon utenti hanno indovinato (" . round(($numWon/$numTry)*100, 1) . "%)</li>";
				else
					echo "<li>Quiz " . date("d/m/Y", strtotime($date)) . ": $numTry tentativi </li>";
			}
			echo "</ul>";
		?>
	</body>
</html>
<?php
	}
?>