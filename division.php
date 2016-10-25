<?php

/*
 * Division class
 * Contains Division rule functions
 */

class division {
	
	/*
	 * General Division rule for divisors ending in 1,3,7,9
	 * Factor mapping: 1 -> 9, 3 -> 3, 7 -> 7, 9 -> 1
	 * Factor mapping example: divisor = 17, ends in 7 -> factor = 7
	 * Factor mapping example: divisor = 11, ends in 1 -> factor = 9
	 * 
	 * Function: m = (divisor * factor + 1)/10
	 * Function: m * q + t = resulting number to check for division by divisor
	 * 
	 * Example: N = 913
	 * t = 913/10 = floor(91.3) = 91 (or sub string of N)
	 * q = last digit of N = 3
	 * factor = 9, divisor ends in 1 (factor mapping)
	 * m = (divisor * factor + 1)/10
	 * m = (11 * 9 + 1)/10 = 10
	 * m * q + t = 10 * 3 + 91 = 121 = resulting number 121%11 = 0, 121 divisible by 11, 913 divisible by 11 (can be applied recurisvely)
	 */
	function div_odd($string, $divisor, $debug = false) {

		// Defaults
		$factor = null; // Factor
		$m = null;
		$t = null;

		//Resolve q
		$q = last_x($string, 1);

		//Resolve t
		$t = substr($string, 0, strlen($string)-1);

		// Divisor last int for Factor mapping
		$divisor_last_int = last_x($divisor, 1);

		// Factor mapping
		switch($divisor_last_int) {
			case 1: $factor = 9; break;
			case 3: $factor = 3; break;
			case 7: $factor = 7; break;
			case 9: $factor = 1; break;
			default: $factor = null; break;
		}

		//Resolve m
		$m = (($divisor * $factor) + 1)/10;

		$res = ($m * $q) + $t;

		// Debugging
		if($debug) {
			var_dump("D: ".$divisor);
			var_dump("Q: ".$q);
			var_dump("M: ".$m);
			var_dump("T: ".$t);
			var_dump("R: ".$res);
		}

		if(strlen($res) > strlen($divisor)+1) {
			//Recursion
			$result = self::div_odd($res, $divisor, $debug);
		}
		else {
			//Mod limit 2^32 = 4.294.967.296
			$result = mod($res, $divisor);
		}
		return $result;
	}
}

