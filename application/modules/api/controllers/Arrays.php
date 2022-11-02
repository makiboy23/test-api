<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arrays extends Api_Controller {
	private
		$post 	= null,
		$count	= 0;

	public function init() {}

	public function after_init() {
		if ($this->JSON_POST() && $_SERVER['REQUEST_METHOD'] != 'POST') {
			// unauthorized access
			$this->output->set_status_header(401);	
		}

		$this->post = $this->get_post();
	}

	// #2 - SUM AVERAGE
	private function get_sum_average($arr) {
		$sum 		= array_sum($arr); // sum of array
		$average 	= array_sum($arr)/count($arr); // average of array

		return array(
			'sum'		=> $sum,
			'average'	=> $average
		);
	}

	public function sum_average() {
		$inputs	= isset($this->post['inputs']) ? $this->post['inputs'] : [];
		$inputs	= is_array($inputs) ? $inputs : [];

		$response = array(
			'response'	=> array(
				'desc'		=> 'Answer to question #2 (sum_average)',
				'inputs'	=> 'inputs[array]',		
				'results' 	=> $this->get_sum_average($inputs)
			)
		);

		echo json_encode($response);
	}

	// #3 - REVERSE ARRAY
	private function get_reverse($arr) {
		return array_reverse($arr);
	}

	public function reverse() {
		$inputs	= isset($this->post['inputs']) ? $this->post['inputs'] : [];
		$inputs	= is_array($inputs) ? $inputs : [];

		$results = $this->get_reverse($inputs);

		$response = array(
			'response'	=> array(
				'desc'		=> 'Answer to question #3 (array_reverse)',
				'inputs'	=> 'inputs[array]',		
				'results' 	=> array(
					'array_format'	=> $results,
					'string_format' => implode(', ', $results)
				)
			)
		);

		echo json_encode($response);
	}

	// #5 - BINARY SEARCH RECURSION
	private function get_binary_search_recursion($x, $a) {
			$limit = count($x);
	
			$response = array(
				'desc'		=> 'Answer to question #5 (Binary Search Recursion)',
				'inputs'	=> 'inputs[array], find(optional else rand number)'
			);

			if ($limit - 1 < $this->count) {
				$response = array(
					array_merge(
						$response,
						array(
							'results' => array(
								'desc'		=> 'Is not found in the inputs!',
								'find'		=> $a,
								'inputs'	=> array(
									'str_format'	=> implode(', ', $x),
									'array_format'	=> $x
								)
							)
						)
					)
				);

				$response = array(
					'response' => $response
				);

				echo json_encode($response);
				return;
			}
	
			$value = $x[$this->count];
			$this->count++;
			if ($value == $a) {
				$response = array(
					array_merge(
						$response,
						array(
							'results' => array(
								'desc'		=> 'Has found in the inputs!',
								'find'		=> $a,
								'inputs'	=> array(
									'str_format'	=> implode(', ', $x),
									'array_format'	=> $x
								)
							)
						)
					)
				);

				$response = array(
					'response' => $response
				);

				echo json_encode($response);
				return;
			}
	
			$this->get_binary_search_recursion($x, $a);
	}

	public function binary_search_recursion() {
		$inputs	= isset($this->post['inputs']) ? $this->post['inputs'] : [];
		$inputs	= is_array($inputs) ? $inputs : [];

		$find	= isset($this->post['find']) ? $this->post['find'] : mt_rand();
		$find	= is_numeric($find) ? $find : mt_rand();

		$this->get_binary_search_recursion($inputs, $find);
	}

	// #8 - SORTED MEGE
	private function get_sorted_merge($nums1, $nums2) {
		$results = array_merge($nums1, $nums2);
		sort($results);
		return $results;
	}

	public function sorted_merge() {
		$nums1	= isset($this->post['nums1']) ? $this->post['nums1'] : [];
		$nums1	= is_array($nums1) ? $nums1 : [];

		$nums2	= isset($this->post['nums2']) ? $this->post['nums2'] : [];
		$nums2	= is_array($nums2) ? $nums2 : [];

		$sorted_merge = $this->get_sorted_merge($nums1, $nums2);

		$response = array(
			'response'	=> array(
				'desc'		=> 'Answer to question #8 (Merge two sorted arrays)',
				'inputs'	=> 'nums1, nums2',		
				'result' 	=> array(
					'nums1'						=> implode(',', $nums1),
					'nums2'						=> implode(',', $nums2),
					'sorted_merge_str_format'	=> implode(',', $sorted_merge),
					'sorted_merge_arr_format'	=> $sorted_merge
				)
			)
		);

		echo json_encode($response);
	}
}
