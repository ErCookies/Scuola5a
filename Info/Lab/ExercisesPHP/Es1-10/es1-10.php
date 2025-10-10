<!DOCTYPE html>

<html>
	<head>
		<!-- Cucchi Francesco 5AI es1-10.php -->
		<link rel="stylesheet" type="text/CSS" href="../style.css">
		
		<?php
			require_once '../functions.php'
		?>
	</head>
	
	<body>
		<h2>Esercizio 1</h2>
		<h3>Data e ora attuali</h3>
		<?php
			$today = date("Y/m/d, H:i");
			echo "<p> Data di oggi: $today</p>"
		?>
		<br>
		
		<h2>Esercizio 2</h2>
		<h3>Sequenza di Fibonacci</h3>
		<ul>
		<?php
			$num1 = 1;
			$num2 = 1;
			for($k = 0; $k < 15; $k++){
				$res = $num1 + $num2;
				echo "<li>". $k+1 ."°: $res</li>";
				$num1 = $num2;
				$num2 = $res;
			}
		?>
		</ul>
		<br>
		
		<h2>Esercizio 3</h2>
		<h3>Tavola pitagorica</h3>
		<table>
		<tbody>
		<?php
			$aus = true;
			for($k = 1; $k <= 10; $k++){
				echo "<tr>";
				for($j = 1; $j <= 10; $j++){
					if($aus)
						echo "<td class=\"blTile\">" . $k*$j ."</td>";
					else
						echo "<td class=\"whTile\">" . $k*$j ."</td>";
					$aus = !$aus;
				}
				$aus = !$aus;
				echo "</tr>";
			}
		?>
		</tbody>
		</table>
		<br>
		
		<h2>Esercizio 4</h2>
		<h3>Potenze di n.</h3>
		<table>
		<thead>
			<td>N</td>
			<td>Radice</td>
			<td>Quadrato</td>
			<td>Cubo</td>
		</thead>
		<tbody>
		<?php
			for($k = 1; $k <= 15; $k++){
				echo "<tr>";
				echo "<td>$k</td><td>" . round(sqrt($k), 2) . "</td><td>" . $k**2 . "</td><td>" . $k**3 . "</td>";
				echo "</tr>";
			}
		?>
		</tbody>
		</table>
		<br>
		
		<h2>Esercizio 5</h2>
		<h3>Tabella ASCII</h3>
		<table>
		<thead>
			<td>Decimal</td>
			<td>Binary</td>
			<td>Character</td>
		</thead>
		<tbody>
		<?php
			for($k = 33; $k <= 127; $k++){
				echo "<tr>";
				echo "<td>$k</td><td>" . str_pad(decbin($k), 7, "0", STR_PAD_LEFT) . "</td><td>" . chr($k) . "</td>";
				echo "</tr>";
			}
		?>
		</tbody>
		</table>
		<br>
		
		<h2>Esercizio 6</h2>
		<h3>Estrazioni del lotto</h3>
		<?php
			//5 random 1-90, tutti !=
			$numEstratti = randIntArr(1, 90, 5);
			sort($numEstratti);
			
			echo "Numeri estratti: ";
			for($k = 0; $k < 5; $k++){
				echo $numEstratti[$k] . " ";
			}
			
			//print_r($numEstratti);
		?>
		<br>
		
		<h2>Esercizio 7</h2>
		<h3>Fattoriale</h3>
		<ul>
		<?php
			for($k = 1; $k <= 50; $k++){
				$factorial = 1;
				for($j = $k; $j > 1; $j--)
					$factorial = $factorial * $j;
				
				echo "<li> $k! = " . $factorial . "</li>";
				//echo "<li>" . stats_stat_factorial($k) . "</li>";
				// Se utilizzata la PECL extension
			}
		?>
		</ul>
		<br>
		
		<h2>Esercizio 8</h2>
		<h3>Palindroma</h3>
		<form method="POST" action="riceviDaForm.php">
			Stringa cui verificare l'essere palindroma: <input type="text" name="stringa" pattern=".{2,}" required>
			<input type="submit" value="Verifica">
		</form>
		<br>
		
		<h2>Esercizio 9</h2>
		<h3>Immagine casuale</h3>
		<form method="POST" action="randomImage.php">
			<input type="submit" value="Genera Img Casuale">
		</form>
		<br>
		
		<h2>Esercizio 10</h2>
		<h3>Calcoli statistici</h3>
		<ul>
		<?php
			$nums = randIntArr(-1000, 1000, 20);
			echo "<li>Numeri: | ";
			$even = 0;
			$odd = 0;
			for($k = 0; $k < 20; $k++){
				echo $nums[$k] . " | ";
				
				if($nums[$k] % 2 == 0)
					$even++;
				else
					$odd++;
			}
			echo "</li>";
			//minimo, massimo, media aritm, deviazione standard, pari e dispari
			echo "<li>Minimo: " . min($nums) . "</li>";
			echo "<li>Massimo: " . max($nums) . "</li>";
			echo "<li>Media aritmetica: " . array_sum($nums) / count($nums) . "</li>";
			echo "<li>Deviazione standard: " . round(strDev($nums), 3) . "</li>";
			echo "<li>Pari: " . $even . "</li>";
			echo "<li>Dispari: " . $odd . "</li>";
		?>
		</ul>
	</body>
</html>