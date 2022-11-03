<?php
	// #3 - REVERSE ARRAY
	function reverse($arr) {
		return array_reverse($arr);
	}

	/*
	* This line of code is for optional $_GET value
	* the default value is [1, 2, 3, 4, 5] empty array
	*/
	$inputs	= isset($_GET['inputs']) ? $_GET['inputs'] : [1, 2, 3, 4, 5];

	// validation input if valid array
	$inputs	= is_array($inputs) ? $inputs : [1, 2, 3, 4, 5];
	
	$results = reverse($inputs); // call function from above
	$results = implode(', ', $results);

	echo "The reverse array of inputs: (" . implode(', ', $inputs) . ") is :" . $results;
?>