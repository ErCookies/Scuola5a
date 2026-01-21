<?php
	// Cucchi Francesco 5^AI funcEred.php

	include '../../func.php';
	
	function writeTry($user, $dataQuiz, $hasWon, $wWord, $userTry, $timestampTry){
		$file = fopen("history.csv", 'a');
		fwrite($file, $user.';'.$dataQuiz.';'.$hasWon.';'.$wWord.';'.$userTry.';'.$timestampTry.PHP_EOL);
		fclose($file);
	}
	
	function getHistory(){
		$rows = file('history.csv', FILE_SKIP_EMPTY_LINES);
		array_shift($rows);
		$rows = array_values($rows);
		$tries[] = array();
		foreach($rows as $row){
			$data = explode(';', $row);
			$tries[] = [
				'user' => $data[0],
				'dataQuiz' => $data[1],
				'hasWon' => ($data[2] == 'true'),
				'wWord' => $data[3],
				'userTry' => $data[4],
				'timestampTry' => $data[5]
			];
		}
		array_shift($tries);
		return $tries;
	}
	
	function getTry($user, $dataQuiz){
		$rows = file('history.csv');
		array_shift($rows);
		$try = null;
		for($k = 0; $k < count($rows) && $try == null; $k++){
			$data = explode(';', $rows[$k]);
			if($user == $data[0] && $dataQuiz == $data[1])
				$try = [
					'user' => $data[0],
					'dataQuiz' => $data[1],
					'hasWon' => ($data[2] == 'true'),
					'wWord' => $data[3],
					'userTry' => $data[4],
					'timestampTry' => $data[5]
				];
		}
		
		return $try;
	}
	
	function getAllQuizDates(){
		$quizFiles = array_values(array_diff(scandir("Quizzes"), [".", ".."]));
		$quizzes = array();
		foreach($quizFiles as $file){
			$quizzes[] = substr($file, 5, 8); // str, offset, len
		}
		return $quizzes;
	}
	
	function getNumUsers(){
		$x = 0;
		$users = importUsers('../../DataBase/');
		foreach($users as $user){
			if(!$user['isAdmin'])
				$x++;
		}
		return $x;
	}
?>