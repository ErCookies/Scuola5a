<?php
	function connDB(){
		$host = 'localhost';
		$db = 'tps_05_playlist';
		$user = 'root';
		$pwd = '';
		$conn = null;
		
		try{
			$conn = new PDO("mysql:dbname=$db;host=$host", $user, $pwd);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e){
			$conn = null;
		}
		
		return $conn;
	}
	
	function execQuery($q){
		$result = null;
		$conn = connDB();
		if($conn){
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
	
	function searchUser($user, $pwd){
		$res = execQuery("SELECT * FROM users WHERE username='$user' AND password='$pwd'");
		return $res;
	}
	
	function searchSongs($cat){
		session_start();
		$u = $_SESSION['username'];
		$query = "SELECT b.* FROM brani AS b
					INNER JOIN categorie AS c ON b.categoria=c.id
					INNER JOIN playlists AS p ON b.ID=p.brano
					WHERE p.user='$u' AND c.nome LIKE '%$cat%';";
		$res = execQuery($query);
		return $res;
	}
	
	function searchAllSongs(){
		session_start();
		$u = $_SESSION['username'];
		$query = "SELECT b.* FROM brani AS b
					INNER JOIN playlists AS p ON b.ID=p.brano
					WHERE p.user='$u';";
		$res = execQuery($query);
		return $res;
	}
?>