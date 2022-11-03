<?php
	// #6 - BINARY SUM
	function binary_sum($a, $b) {
		$result = ""; // Initialize result
		$s = 0;     // Initialize digit 
	  
		$i = strlen($a) - 1;
		$j = strlen($b) - 1;
		while ($i >= 0 || $j >= 0 || $s == 1)
		{
			// Compute sum of last digits and carry
			$s += (($i >= 0)? ord($a[$i]) - 
							  ord('0'): 0);
			$s += (($j >= 0)? ord($b[$j]) - 
							  ord('0'): 0);
	  
			// If current digit sum is 1 or 3, 
			// add 1 to result
			$result = chr($s % 2 + ord('0')) . $result;
	  
			// Compute carry
			$s = (int)($s / 2);
	  
			// Move to next digits
			$i--; $j--;
		}
		return $result;	
	}

	/*
	* This line of code is for optional $_GET value
	* the default value is '1010' and '1011'
	*/
	$a	= isset($_GET['a']) ? $_GET['a'] : '1010';
	$b	= isset($_GET['b']) ? $_GET['b'] : '1011';
	
	$result = binary_sum($a, $b); // call function from above

	echo "The sum of binary a: {$a} + b: {$b} = {$result}";
?>