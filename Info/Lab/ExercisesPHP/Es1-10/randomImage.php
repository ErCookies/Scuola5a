<?php
	require_once '../functions.php';
	
	$index = randIntArr(1, 10, 1)[0];
	if($index == 6)
		echo "<img src=\"../imgs/$index.gif\">";
	else
		echo "<img src=\"../imgs/$index.jpg\">";
?>