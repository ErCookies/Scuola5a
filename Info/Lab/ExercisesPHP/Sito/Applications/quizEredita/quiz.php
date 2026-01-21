<?php
	// Cucchi Francesco 5^AI quiz.php
	require_once 'funcEred.php';
	
	session_start();
	if(empty($_SESSION['role']) || $_SESSION['role'] != 'User'){
		if(empty($_SESSION['role']) || $_SESSION['role'] != 'Admin')
			header("Location: ../../Functionalities/logout.php");
		else
			header("Location: ../../Homes/homeAdmin.php");
	}
	else{
		$dataQuiz = ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET) && !empty($_GET)) ? $_GET['dataQuiz'] : null;
		if($dataQuiz == null)
			header("Location: user.php?errDataQuiz=true");
		else{
			$quizExists = file_exists("Quizzes/quiz_".$dataQuiz.".csv");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Ghigliottina - Eredit&agrave;</title>
		<!-- <script src="script.js"></script> -->
	</head>
	
	<body>
		<h1>Ghigliottina - Eredit&agrave;</h1>
		<a href="../../Homes/homeUser.php"><button>&rarr; TORNA ALLA HOME &larr;</button></a>
		<br>
		<?php
			if($quizExists){
				$rows = file("Quizzes/quiz_".$dataQuiz.".csv");
				echo "<p><b>Parole indizio:</b><ul>";
				$aus = explode(";", $rows[0]);
				foreach($aus as $word){
					echo "<li>$word</li>".PHP_EOL;
				}
				echo "</ul></p>";
				// Search for try from this user for this quiz in the file history.csv
				$tryFound = getTry($_SESSION['user'], $dataQuiz);
				if($tryFound == null){
					if(empty($_GET['tryGiven'])){
		?>
		<form>
			Parola vincente: <input type="text" name="userTry" required>
			<input style="display:none" type="text" name="dataQuiz" value="<?=$dataQuiz?>">
			<input type="submit" name="tryGiven" value="Tenta la vittoria">
		</form>
		<?php
					}
					else{
						$uWord = strtolower($_GET['userTry']);
						$winW = strtolower($rows[1]);
						$esito = ($uWord == $winW) ? 'true' : 'false';
						if($uWord == $winW){
							echo "<p><b>Hai indovinato la parola: $winW</b></p>";
						}
						else{
							echo "<p><b>Non hai indovinato la parola: hai tentato con $uWord, ma quella corretta era $winW</b></p>";
						}
						writeTry($_SESSION['user'], $dataQuiz, $esito, $winW, $uWord, strtotime(date("Ymd")));
					}
				} // qui sopra try da dare
				else{
					if($tryFound['hasWon']){
						echo "<p>Hai gi&agrave; tentato questo quiz in data " . date("d/m/Y", $tryFound['timestampTry']) . ", vincendo con la parola <b style=\"color:green\">" . $tryFound['wWord'] . "</b></p>";
					}
					else{
						echo "<p>Hai gi&agrave; tentato questo quiz in data " . date("d/m/Y", $tryFound['timestampTry']) . ", perdendo con la parola <b style=\"color:red\">" . $tryFound['userTry'] . "</b>, dato che quella vincente era <b style=\"color:green\">" . $tryFound['wWord'] . "</b></p>";
					}
				}
			}
			else{ // quiz non creato
		?>
		<p><b>Non &egrave; stato creato un quiz in data <?=date("d/m/Y", strtotime($_GET['dataQuiz']));?></b></p>
	</body>
</html>

<?php
			}
	}
	}
?>