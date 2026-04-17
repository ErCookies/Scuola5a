<?php
	function connDB(){
		// hostname, dbName, user, pwd
		$host = 'localhost';
		$db = 'bollette';
		$user = 'root';
		$pwd = '';
		$conn = null;
		try{
			$conn = new PDO("mysql:dbname=$db;host=$host", $user, $pwd);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e){
			# throw $e;
			$conn = null;
		}
		
		return $conn;
	}
	
	function execQuery($q){
		$result = null;
		$conn = connDB();
		
		if($conn != null){
			try{
				$stmt = $conn->prepare($q);
				$stmt -> execute();
				
				// $result = $stmt -> fetchAll();
				$result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
			}
			catch(PDOException $e){
				$conn = null;
			}
		}
		
		return $result;
	}
?>