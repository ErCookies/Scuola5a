<?php
	// redirect se sessione esistente
?>

<!DOCTYPE html>
<html>
	<head>
		<title> Login </title>
		<script src="script.js"></script>
	</head>
	
	<body>
		<h1>Login</h1>
		<div id='ris' style="color:red"></div>
		<form id="frmLogin" onsubmit="serverQuery(frmLogin); return false;">
			Username: <input type="text" name="user"><br>
			Password: <input type="password" name="pwd"><br>
			<input type="submit" value="LOGIN" id='btnSub'>
		</form>
	</body>
</html>