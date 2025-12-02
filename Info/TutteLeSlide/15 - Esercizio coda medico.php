<?php
$nomi = isset($_COOKIE['coda']) ? $_COOKIE['coda'] : "";

// Aggiungi persona
if (isset($_GET['add'])) {
    if (!empty($_GET['nome'])) {
        if ($nomi == "")
            $nomi = $_GET['nome'];
        else
            $nomi .= ", " . $_GET['nome'];
    }
    setcookie("coda", $nomi, time() + 3600);
}

// Rimuovi prima persona
if (isset($_GET['rem'])) {
    if ($nomi != "") {
        $v = explode(", ", $nomi);
        array_shift($v);
        $nomi = implode(", ", $v);
    }
    setcookie("coda", $nomi, time() + 3600);
}

// Svuota coda
if (isset($_GET['clear'])) {
    $nomi = "";
    setcookie("coda", "", time() - 3600); // cancella cookie
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Coda dal medico</title>
</head>
<body>
    <h1>Gestione coda</h1>

    <form>
        <input type="text" name="nome"><br><br>
        <input type="submit" name="add" value="Aggiungi in coda"><br>

        <input type="submit" name="rem" value="Rimuovi il primo dalla coda"><br>
        <input type="submit" name="clear" value="Svuota completamente la coda">
    </form>

    <br>

    <?php
        if ($nomi == "")
            echo "Nessuno in CODA";
        else {
    		$v = explode(", ", $nomi);
    		echo "MEDICO ";
    		echo "&larr; " . implode(" &larr; ", $v);
		}
    ?>
</body>
</html>
