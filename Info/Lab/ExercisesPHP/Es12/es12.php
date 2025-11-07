<!DOCTYPE html>
<html>
	<head>
		<?php
			require_once 'funzioni.php';
			require_once '../functions.php';
			$arts = leggiArticoli("articoli.csv");
		?>
		<!--
		Realizza un’applicazione web che visualizzi in una tabella i dati contenuti nel file articoli.csv fornito, composto dalle colonne codice, descrizione, tipologia e prezzo.
		Il file e la funzione PHP di supporto leggiArticoli($nomeFile) sono già forniti.
		L’applicazione deve includere un form che consenta all’utente di filtrare gli articoli in base alla tipologia, selezionabile da un menu a tendina con le opzioni “tutte”, “informatica”, “cartoleria” e “audio”.
		Devono essere mostrati solo gli articoli che rispettano i criteri di ricerca all’interno di una tabella HTML; se nessun articolo soddisfa i criteri, deve comparire il messaggio “Nessun articolo trovato”.
		Estensioni:
			- Aggiungere la possibilità di filtrare anche per prezzo;
			- Aggiungere la possibilità di cercare una parte di testo nella descrizione dell’articolo.
		-->
	</head>
	
	<body>
		<h2>Stampa Articoli</h2>
		<?php
			$artsAus = [];
			
			print_r($_POST);
			
			if(!empty($_POST)){
				if($_POST['tipo'] == 'all'){
					foreach($arts as $o){
						$artsAus[] = $o;
					}
				}
				else{
					foreach($arts as $o){
						if($o['tipologia'] == $_POST['tipo'])
							$artsAus[] = $o;
					}
				}
				
				if($_POST['pMin'] != "" && $_POST['pMin'] != null){
					for($k = 0; $k < count($artsAus); $k++){
						if($artsAus[$k]['prezzo'] < floatval($_POST['pMin']))
							array_splice($artsAus, $k, $k);
							#unset($artsAus[$k]);
					}
				}
				
				if($_POST['pMax'] != "" && $_POST['pMax'] != null){
					for($k = 0; $k < count($artsAus); $k++){
						if($artsAus[$k]['prezzo'] > floatval($_POST['pMax']))
							array_splice($artsAus, $k, $k);
							#unset($artsAus[$k]);
					}
				}
				
				if($_POST['desc'] != "" && $_POST['desc'] != null){
					for($k = 0; $k > count($artsAus); $k++){
						if(!str_contains($_POST['desc'], $artsAus[$k]['descrizione']))
							array_splice($artsAus, $k, $k);
							#unset($artsAus[$k]);
					}
				}
				
				echo "<table border=\"1\">";
				echo "<tr>";
				echo "<td>Codice</td><td>Descrizione</td><td>Tipo</td><td>Prezzo</td>";
				echo "</tr>";
				foreach($artsAus as $obj){
					echo "<tr>";
					
					foreach($obj as $v)
						echo "<td>$v</td>";
					
					echo "</tr>";
				}
				echo "</table>";
				
			}
			else{
				echo "<b>NESSUN ARTICOLO TROVATO</b>";
			}
		?>
	</body>
</html>