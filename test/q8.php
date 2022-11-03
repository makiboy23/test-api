<?php
    // #8 - SORTED MEGE
	function sorted_merge($nums1, $nums2) {
		$results = array_merge($nums1, $nums2);
		sort($results);
		return $results;
	}

    /*
	* This line of code is for optional $_GET value
	* the default value of $nums1 is [1, 2, 3, 4, 5]
    * the default value of $nums2 is [6, 7, 8, 9, 10]
	*/
    $nums1	= isset($_GET['nums1']) ? $_GET['nums1'] : [1, 2, 3, 4, 5];
    $nums2	= isset($_GET['nums2']) ? $_GET['nums2'] : [6, 7, 8, 9, 10];

    // validate to make sure the inputs is valid array
    $nums1	= is_array($nums1) ? $nums1 : [1, 2, 3, 4, 5];
    $nums2	= is_array($nums2) ? $nums2 : [6, 7, 8, 9, 10];

    $sorted_merge = sorted_merge($nums1, $nums2); // call function from above
    $sorted_merge = implode(',', $sorted_merge); // to string format
		
	echo "The sorted merge result is {$sorted_merge}";	
	
?>