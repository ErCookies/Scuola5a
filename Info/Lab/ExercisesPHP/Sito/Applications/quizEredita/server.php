<?php
	require_once 'funcEred.php';
	if(isset($_POST['quiz'])){
		$qz = $_POST['quiz'];
		if($qz == '*')
			$serverAns = searchQuiz("");
		else
			$serverAns = searchQuiz($qz);
	}
	else
		$serverAns = "CON_ERR";
	
	echo json_encode($serverAns);
?>