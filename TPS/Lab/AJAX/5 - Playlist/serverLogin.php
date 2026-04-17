<?php
	require_once 'func.php';
	if(isset($_POST['user']) && isset($_POST['pwd'])){
		$user = $_POST['user'];
		$pwd = $_POST['pwd'];
		$risServer = searchUser($user, $pwd);
		if($risServer != null){
			session_start();
			$_SESSION['user'] = $user;
			$risServer = "1";
		}else
			$risServer = "0";
	}
	else
		$risServer = 'ERROR';
	
	echo json_encode($risServer);
?>