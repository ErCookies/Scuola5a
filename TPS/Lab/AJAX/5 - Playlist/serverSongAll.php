<?php
	require_once 'func.php';
	$songsFound = searchAllSongs();
	echo json_encode($songsFound);
?>