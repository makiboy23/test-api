<?php
	$counter_index = 0;

	// #5 - BINARY SEARCH RECURSION
	function binary_search_recursion($x, $a) {
		global $counter_index;

		$limit = count($x);

		if ($limit - 1 < $counter_index) {
			echo "Find value: {$a} is not found in the inputs: (" . implode(', ', $x) .")";
			return;
		}

		$value = $x[$counter_index];
		$counter_index++;
		if ($value == $a) {
			echo "Find_value: {$a} has found in the inputs: (" . implode(', ', $x) .")";
			return;
		}

		binary_search_recursion($x, $a);
	}

	/*
	* This line of code is for optional $_GET value
	* the default value of inputs is [1, 2, 3, 4, 5]
	* the default value of find is random range of 1-10
	*/
	$inputs	= isset($_GET['inputs']) ? $_GET['inputs'] : [1, 2, 3, 4, 5];
	$find	= isset($_GET['find']) ? $_GET['find'] : mt_rand(1, 10);

	// validate if correct data
	$inputs	= is_array($inputs) ? $inputs : [];
	$find	= is_numeric($find) ? $find : mt_rand();

	binary_search_recursion($inputs, $find); // call function from above
?>