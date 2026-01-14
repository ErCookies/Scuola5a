<?php
	// Cucchi Francesco 5^AI checkUser.php
	
	require_once '../func.php';
	
	// Check on page access method
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST) && !empty($_POST)){
		// If user is trying to login
		if(isset($_POST['login'])){
			// Create array containing form data
			$myUser = ["user" => $_POST['user'],
						"pwd" => $_POST['pwd'],
						"isAdmin" => false];
			// Validation check
			$aus = isValidUser($myUser);
			// User found
			if($aus != null){
				// Set correct rights (Admin/User)
				$myUser['isAdmin'] = $aus['isAdmin'];
				unset($aus);
				
				session_start();
				
				$_SESSION['user'] = $myUser['user'];
				$_SESSION['role'] = ($myUser['isAdmin']) ? "Admin" : "User";
				
				// Home redirection
				header("Location: ../Homes/home" . $_SESSION['role'] . ".php");
			}
			// User not found
			else{
				// Login page redirection w\error
				header("Location: login.php?errLog=true");
			}
		}
		// If user is trying to register
		else{
			// Username already taken
			if(checkUsername($_POST['user']))
				// Login page redirection w\error
				header("Location: login.php?errReg=true");
			// Username avaiable
			else{
				// Write new user on database + login page redirection
				writeUser($_POST['user'], $_POST['pwd'], "false");
				header("Location: login.php?regCompl=true");
			}
		}
	}
	else
		header($_SERVER['SERVER_PROTOCOL'] . " 418 I'm a teapot");
		// Placeholder error
?>