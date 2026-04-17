<?php
	require_once 'func.php';
	if(isset($_POST['nome'])){
		$nome = $_POST['nome'];
		$risServer = searchGelName($nome);
	}
	elseif(isset($_POST['data'])){
		$data = $_POST['data'];
		$risServer = searchGelData($data);
	}
	elseif(isset($_POST['prod'])){
		$prod = $_POST['prod'];
		$risServer = searchGelProd($prod);
	}
	else
		$risServer = 'ERROR';
	
	echo json_encode($risServer);
?>