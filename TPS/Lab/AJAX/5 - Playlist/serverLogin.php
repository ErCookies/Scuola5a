<?php
	require_once 'func.php';
	if(isset($_POST['user']) && isset($_POST['pwd'])){
		$user = $_POST['user'];
		$pwd = $_POST['pwd'];
		$userFound = searchUser($user, $pwd);
		if($userFound != null){
			session_start();
			$_SESSION['username'] = $userFound[0]['username'];
			$_SESSION['nome'] = $userFound[0]['nome'];
			$_SESSION['cognome'] = $userFound[0]['cognome'];
			$risServer = "1";
		}else
			$risServer = "0";
	}
	else
		$risServer = 'ERROR';
	
	echo json_encode($risServer);
?>