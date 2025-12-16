<?php
	# Cucchi Francesco 5^AI checkUser.php
	
	require_once 'func.php';
	
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST) && !empty($_POST)){
		$myUser = ["user" => $_POST['user'],
					"pwd" => $_POST['pwd'],
					"isAdmin" => false];
		$aus = isValidUser($myUser);
		if($aus != null){
			$myUser['isAdmin'] = $aus['isAdmin'];
			unset($aus);
			
			session_start();
			
			$_SESSION['user'] = $myUser['user'];
			$_SESSION['role'] = ($myUser['isAdmin']) ? "Admin" : "Cli";
			
			header("Location: home" . $_SESSION['role'] . ".php");
		}
		else{
			header("Location: login.php?err=true");
		}
	}
	else
		header($_SERVER['SERVER_PROTOCOL'] . " 418 I'm a teapot");
?>