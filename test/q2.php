<?php
	// #2 - SUM AVERAGE
	function sum_average($arr) {
		$average	= 'Can\'t get average division by zero, please provide inputs!';
		$sum 		= array_sum($arr); // sum of array

		if ($sum == 0) {
			goto end;
		}

		$average = array_sum($arr)/count($arr); // average of array

		end:
		return array(
			'sum'		=> $sum,
			'average'	=> $average
		);
	}

	/*
	* This line of code is for optional $_GET value
	* the default value is [1, 2, 3, 4, 5] empty array
	*/
	$inputs	= isset($_GET['inputs']) ? $_GET['inputs'] : [1, 2, 3, 4, 5];

	// validation input if valid array
	$inputs	= is_array($inputs) ? $inputs : [1, 2, 3, 4, 5];

	$sum_average 	= sum_average($inputs); // call function from above
	$sum			= $sum_average['sum']; // get sum
	$avg 			= $sum_average['average']; // get average

	echo "The sum is {$sum}, and the average is {$avg}";
?>