<!DOCTYPE html>

<?php
function palindroma($str){
	$test = array_reverse(str_split($str));
	return implode($test) == $str;
}

function randIntArr($rMin, $rMax, $amount){	
	$nums = range($rMin,$rMax);
	shuffle($nums);
	$nums = array_slice($nums, 0, $amount);
	return $nums;
}

function strDev($array){
	$var = 0.0;
	$numEl = count($array);
	$aver = array_sum($array) / $numEl;
	
	foreach($array as $k)
		$var += ($k - $aver) ** 2;
		
	$var = sqrt($var / $numEl);
	
	return $var;
}
?>