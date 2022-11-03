<?php
    #1 - RANDOM SHUFFLE
    function random_shuffle($start, $end) {
		return mt_rand($start, $end);
	}

    /*
    * This line of code is for optional $_GET value
    * the default value in $start = 1, $end = 54
    */
    $start	= isset($_GET['start']) ? $_GET['start'] : 1;
    $end	= isset($_GET['end']) ? $_GET['end'] : 54;

    // validation if numeric input
    $start	= is_numeric($start) ? $start : 1;
    $end	= is_numeric($end) ? $end : 54;

    $result = random_shuffle($start, $end); // call function from above

    echo "The random shuffle number from ({$start}-{$end}) the result is {$result}";
?>