<?php
	// Cucchi Francesco 5^AI stats.php
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
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Statistiche Quiz - Admin Panel</title>
		<script src="script.js"></script>
	</head>
	
	<body>
		<h1>Statistiche Quiz - Admin Panel</h1>
		<a href="../../Homes/homeAdmin.php"><button>&rarr; TORNA ALLA HOME &larr;</button></a>
		<a href="admin.php"><button>&rarr; Vai all'inserimento &larr;</button></a>
		<br>
		<br>
		<form id="formettino" name="quizForm" onsubmit="return false;">
			<b>Quiz:</b> <input type="text" id="inTxtQuiz" name="quizD" placeholder="* | yyyyMMdd...">
		</form>
		<br>
		<div id="ans">Cominciare a digitare per cercare un quiz</div>
	</body>
</html>
<?php
	}
?>