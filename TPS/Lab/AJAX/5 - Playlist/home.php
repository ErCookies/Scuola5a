<?php  
	// controllo se sessione esistente -> redirect
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
		<script src="script.js"></script>
	</head>
	
	<body>
		<h1>Home - Playlist</h1>
		<form id="frmCat" onsubmit="return false;">
			<button onclick="showAll();">Visualizza tutto</button><br>
			Cerca per categoria: <input type="text" name="cat" oninput="searchCat(frmCat);" placeholder="...">
		</form>
		<div id="ris"></div>
	</body>
</html>