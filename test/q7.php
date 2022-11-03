<?php
	// #7 - RECURSION FACTORIAL
	function recursion_factorial($number) {
		if ($number < 2) {
			return 1;
		}

		return ($number * recursion_factorial($number-1));
	}

	/*
	* This line of code is for optional $_GET value
	* the default value of number is 4
	*/
	$number	= isset($_GET['number']) ? $_GET['number'] : 4;

	// validate to make sure the number is numeric
	$number	= is_numeric($number) ? $number : 4;

	$result = recursion_factorial($number); // call function from above

	echo "The recursion factorial of {$number} is {$result}";
?>