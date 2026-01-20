<?php
	// Cucchi Francesco 5^AI func.php

	// Function that returns an array containing every user in the database
	function importUsers(){
		$rows = file("../DataBase/users.csv", FILE_SKIP_EMPTY_LINES);
		array_shift($rows);		# skip heading row
		$users = array();
		foreach($rows as $row){
			$aus = explode(";", $row);
			$users[] = [
				"user" => $aus[0],
				"pwd" => $aus[1],
				"isAdmin" => ($aus[2] === "true")
			];
		}
		
		return $users;
	}
	
	// Function that checks if a given user exists in the database,
	// returning it if found, null otherwise
	function isValidUser($user){
		$allUsers = importUsers();
		$found = false;
		
		for($k = 0; $k < count($allUsers) && !$found; $k++){
			$found = ($user['user'] === $allUsers[$k]['user'] && $user['pwd'] === $allUsers[$k]['pwd']);
		}
		
		return ($found) ? $allUsers[($k-1)] : null;
	}
	
	// Function that checks if a given username is already present in
	// the database returning True/False accordingly
	function checkUsername($name){
		$allUsers = importUsers();
		$found = false;
		
		for($k = 0; $k < count($allUsers) && !$found; $k++){
			$found = $name === $allUsers[$k]['user'];
		}
		
		return $found;
	}
	
	// Function that writes a new user in the database
	function writeUser($user, $pwd, $isAdmin){
		$file = fopen("../DataBase/users.csv", "a");
		
		if($file){
			fwrite($file, $user.";".$pwd.";".$isAdmin.";".PHP_EOL);
			fclose($file);
		}
	}
?>