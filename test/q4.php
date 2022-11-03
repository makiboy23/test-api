<?php
	// #4 - RANDOM CORRESPONDING OUTPUT
	function random_corresponding_output($input) {
		$starting_number = 140;
		$number_difference = 60; 	

		$a = $starting_number - ($number_difference * 2); // 20
		$b = $starting_number - ($number_difference * 3); // -40
		$c = $starting_number - ($number_difference * 1); // 80
		$d = $starting_number - ($number_difference * 0); // 140
		

		switch ($input) {
			case ($a >= $input && $c > $input):
				return array(
					'letter'	=> "A",
					'value'		=> 30 * $input
				); // A
			case ($c >= $input && $d > $input):
				return array(
					'letter'	=> "C",
					'value'		=> 20 * $input
				);
			case ($d >= $input):
				return array(
					'letter'	=> "D",
					'value'		=> 10 * $input
				);
			case ($b <= $input):
				return array(
					'letter'	=> "B",
					'value'		=> 40 * $input
				);
		}
	
	}

	/*
	* This line of code is for optional $_GET value
	* the default value is 20
	*/
	$value		= isset($_GET['value']) ? $_GET['value'] : 20;

	// to make sure numeric value
	$value		= is_numeric($value) ? $value : 20;

	$results 	= random_corresponding_output($value); // call function from above
	$letter		= $results['letter'];
	$result		= $results['value'];

	echo "The given value is {$value} and the answer is Letter is {$letter}";
?>