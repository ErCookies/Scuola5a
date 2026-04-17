<?php
	require_once 'func.php';
	if(isset($_POST['nome'])){
		$nome = $_POST['nome'];
		$risServer = execQuery("SELECT * FROM gelati WHERE nome LIKE '%$nome%';");
	}
	elseif(isset($_POST['data'])){
		$data = $_POST['data'];
		$risServer = execQuery("SELECT * FROM gelati WHERE dataScadenza LIKE '%$data%';");
	}
	elseif(isset($_POST['prod'])){
		$prod = $_POST['prod'];
		$risServer = execQuery("SELECT * FROM gelati WHERE produttore LIKE '%$prod%';");
	}
	else
		$risServer = 'ERROR';
	
	echo json_encode($risServer);
?>