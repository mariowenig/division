<?php

//Author: Mario Wenig
//Date: 10/24/2016


/**
 * Shortening rule used in most cases to prevent lenghenting of string rather
 * than shortening it.
 */


//Division by 3 rule
function div_3($string, $debug = false) {
	
	$result = null;
	
	// Recursive rerun
	if(strlen(abs($string)) > 1) {
		
		$sum = 0;
		$chars = str_split($string);
		foreach($chars as $char) {
			$sum += (int)$char;	
		}	
		
		//Debug
		if($debug) var_dump($sum.'<br />');
		$result = div_3($sum, $debug);
	}
	else {
		$result = mod($string, 3);
	}
	return $result;
}

//Division by 5 rule
function div_5($string, $debug = false) {
	
	$result = null;
	$last = substr($string, -1);
	
	//Debug
	if($debug) var_dump($last);
	
	$result = mod($last, 5);
	
	return $result;	
}

//var_dump(div_7("77777", 1));

//Division by 7 rule
function div_7($string, $debug = false) {
	
	$result = null;
	
	$last = last_x($string, 1);
	$twice_last = last_x_times($string, 1, 2);
	
	$front_chunk = substr($string, 0, strlen($string)-1);
	$result_sub = $front_chunk = $twice_last;
	
	if($debug) {
		var_dump("Last: ".$last);
		var_dump("Twice Last: ".$twice_last);
		var_dump("Front Chunk: ".$front_chunk);
		var_dump("Front Chunk - Twice Last: ".$result_sub);
	}
	
	if(strlen(abs($front_chunk)) > 1) {
		$result = div_7($result_sub, $debug);
	}
	else {	
		$result = mod($result_sub, 7);
	}
	
	return $result;
}

//var_dump(div_11("3948601239", 1));

//Division by 11 rule
function div_11($string, $debug = false) {
	
	$result = null;
	$plus = true;
	
	$sum = 0;
	$chars = str_split($string);
	foreach($chars as $char) {
		
		if($plus) {
			$sum += (int)$char;
			print_r($sum);
			$plus = false;
		}
		else {
			$sum  -= (int)$char;
			$plus= true;
		}
		
		if($debug) {
			var_dump("Starting: ".$string);
			var_dump("Char: ".$char);
			var_dump("Sum: ".$sum);
			var_dump("Plus: ".$plus);
		}
	}
	
	if($sum == 0) {
		$result = true;
	}
	else {
		if(strlen(abs($sum)) > 2) {
			$result = div_11($sum, $debug);
		}
		else {
			$result = mod($sum, 11);
		}
	}
	
	return $result;
	
}

//var_dump(div_13("30489628", 1));

//Division by 13 rule
function div_13($string, $debug = false) {
	
	$result = null;
	
	$last = last_x($string, 1);
	$four_last = last_x_times($string, 1, 9);
	
	$front_chunk = substr($string, 0, strlen($string)-1);
	
	$result_sub = $front_chunk - $four_last;
	
	if($debug) {
		var_dump("Starting: ".$string);
		var_dump("Last: ".$last);
		var_dump("Four times Last: ".$four_last);
		var_dump("Front chunk: ".$front_chunk);
		var_dump("Front chunk - Four times Last: ".$result_sub);
	}
	
	if($result_sub == 0) {
		$result = true;
	}
	else {
		if(strlen(abs($result_sub)) > 2) {
			$result = div_13($result_sub, $debug);
		}
		else {
			$result = mod($result_sub, 13);
		}
	}

	return $result;
}

//var_dump(div_17("39871052", 1));

//Division by 17 rule
function div_17($string, $debug = false) {
	$result = null;
	
	$last = last_x($string, 1);
	$five_last = last_x_times($string, 1, 5);
	
	$front_chunk = substr($string, 0, strlen($string)-1);
	
	$result_sub = $front_chunk - $five_last;
	
	if($debug) {
		var_dump("Starting: ".$string);
		var_dump("Last: ".$last);
		var_dump("Four times Last: ".$five_last);
		var_dump("Front chunk: ".$front_chunk);
		var_dump("Front chunk - Five times Last: ".$result_sub);
	}
	
	if($result_sub == 0) {
		$result = true;
	}
	else {
		if(strlen(abs($result_sub)) > 2) {
			$result = div_17($result_sub, $debug);
		}
		else {
			$result = mod($result_sub, 17);
		}
	}

	return $result;
}

//var_dump(div_19("44561764", 1));

function div_19($string, $debug = false) {
	$result = null;
	
	$last = last_x($string, 1);
	$twice_last = last_x_times($string, 1, 2);
	
	$front_chunk = substr($string, 0, strlen($string)-1);
	
	$result_sub = $front_chunk + $twice_last;
	
	if($debug) {
		var_dump("Starting: ".$string);
		var_dump("Last: ".$last);
		var_dump("Twice times Last: ".$twice_last);
		var_dump("Front chunk: ".$front_chunk);
		var_dump("Front chunk + Twice times Last: ".$result_sub);
	}
	
	if($result_sub == 0) {
		$result = true;
	}
	else {
		if(strlen(abs($result_sub)) > 2) {
			$result = div_19($result_sub, $debug);
		}
		else {
			$result = mod($result_sub, 19);
		}
	}

	return $result;
}


//var_dump(div_23("53943188", 1));

function div_23($string, $debug = false) {
	$result = null;
	
	$last = last_x($string, 1);
	$seven_last = last_x_times($string, 1, 7);
	
	$front_chunk = substr($string, 0, strlen($string)-1);
	
	$result_sub = $front_chunk + $seven_last;
	
	if($debug) {
		var_dump("Starting: ".$string);
		var_dump("Last: ".$last);
		var_dump("Seven times Last: ".$seven_last);
		var_dump("Front chunk: ".$front_chunk);
		var_dump("Front chunk + Seven times Last: ".$result_sub);
	}
	
	if($result_sub == 0) {
		$result = true;
	}
	else {
		if(strlen(abs($result_sub)) > 2) {
			$result = div_23($result_sub, $debug);
		}
		else {
			$result = mod($result_sub, 23);
		}
	}

	return $result;
}

var_dump(div_29("68015353", 1));

function div_29($string, $debug = false) {
	$result = null;
	
	$last = last_x($string, 1);
	$three_last = last_x_times($string, 1, 3);
	
	$front_chunk = substr($string, 0, strlen($string)-1);
	
	$result_sub = $front_chunk + $three_last;
	
	if($debug) {
		var_dump("Starting: ".$string);
		var_dump("Last: ".$last);
		var_dump("Three times Last: ".$three_last);
		var_dump("Front chunk: ".$front_chunk);
		var_dump("Front chunk + Three times Last: ".$result_sub);
	}
	
	if($result_sub == 0) {
		$result = true;
	}
	else {
		if(strlen(abs($result_sub)) > 2) {
			$result = div_29($result_sub, $debug);
		}
		else {
			$result = mod($result_sub, 29);
		}
	}

	return $result;
}


// Mod function
function mod($string, $num) {
	return ($string%$num == 0);
}

//Last x chars
function last_x($string, $amount = 1) {
	return substr($string, -$amount);
}

// Last x chars * times
function last_x_times($string, $amount = 1, $times) {
	$last = substr($string, -$amount);
	return ($last * $times);
}





