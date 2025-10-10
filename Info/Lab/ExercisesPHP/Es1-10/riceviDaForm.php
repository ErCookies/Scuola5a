<?php
	require_once '../functions.php';
	
	$stringaDaForm = $_POST['stringa'];
	if($stringaDaForm != null){
		$esito = palindroma($stringaDaForm);
		if($esito)
			echo "<h1>La stringa e' palindroma</h1>";
		else
			echo "<h1>La stringa non e' palindroma</h1>";
	}
?>