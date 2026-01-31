<?php
	// Cucchi Francesco 5^AI user.php
	require_once 'funcEred.php';
	
	session_start();
	// Check if who's trying to access this page has the right role
	// Wrong role
	if(empty($_SESSION['role']) || $_SESSION['role'] != 'User'){
		if(empty($_SESSION['role']) || $_SESSION['role'] != 'Admin')
			header("Location: ../../Functionalities/logout.php");
		else
			header("Location: ../../Homes/homeAdmin.php");
	}
	// Correct role
	else{
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
		<?="<a href=\"quiz.php?dataQuiz=" . getLastQuizDate() . "\"><button>Vai all'ultimo quiz</button></a>"?>
		<?php
			echo "<h2>Statistiche personali</h2>";
			$allTries = getHistory($_SESSION['user']);
			if($allTries == null)
				echo "<p><b>Non hai ancora tentato nessun quiz! Ne hai ben " . count(array_values(array_diff(scandir("Quizzes"), [".", ".."]))) . " a disposizione</b></p>";
			else{	
				echo "<ul>";
				$numWon = 0;
				foreach($allTries as $try){
					if($try['hasWon'])
						$numWon++;
					$color = ($try['hasWon']) ? 'green' : 'red';
					echo "<li style=\"color:$color;\">Quiz " . date("d/m/Y", strtotime($try['dataQuiz'])) . ": " . $try['userTry'] . " (tentativo dato il giorno " . date("d/m/Y", $try['timestampTry']) . ")</li>";
				}
				echo "<li>Riepilogo: " . count($allTries) . " quiz fatti, $numWon vinti (" . round(($numWon/count($allTries))*100, 1) . "%)</li></ul>";
			}
		?>
	</body>
</html>
<?php
	}
?>