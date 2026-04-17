<!DOCTYPE html>

<html>
	<head>
		<title>Pag di upload</title>
	</head>
	
	<body>
		<h1>Pagina di test degli upload</h1>
		<form method="POST" enctype="multipart/form-data">
			Carica un auraFilet: <input type="file" name="testFile"><br>
			<input type="submit" value="Carica">
		</form>
		
		<?php
			if(!empty($_FILES)){
				print_r($_FILES);
				move_uploaded_file($_FILES['testFile']['tmp_name'], "Uploads/".$_FILES['testFile']['name']);
			}
		?>
	</body>
</html>