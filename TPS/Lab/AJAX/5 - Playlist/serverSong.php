<?php
	require_once 'func.php';
	if(isset($_POST['cat'])){
		$cat = $_POST['cat'];
		$songsFound = searchSongs($cat);
		if($songsFound != null){
			$risServer = $songsFound;
		}
		else
			$risServer = "0";
	}
	else
		$risServer = 'ERROR';
	
	echo json_encode($risServer);
?>