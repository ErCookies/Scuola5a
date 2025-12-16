<?php
	# Cucchi Francesco 5^AI func.php

	function importUsers(){
		$rows = file("users.csv");
		array_shift($rows);		# skip heading row
		$users = array();
		foreach($rows as $row){
			$aus = explode(";", $row);
			$users[] = [
				"user" => $aus[0],
				"pwd" => $aus[1],
				"isAdmin" => $aus[2]
			];
		}
		
		return $users;
	}
	
	function isValidUser($user){
		$allUsers = importUsers();
		$found = false;
		
		for($k = 0; $k < count($allUsers) && !$found; $k++){
			$found = ($user['user'] === $allUsers[$k]['user'] && $user['pwd'] === $allUsers[$k]['pwd']);
		}
		
		return ($found) ? $allUsers[$k] : null;
	}
?>