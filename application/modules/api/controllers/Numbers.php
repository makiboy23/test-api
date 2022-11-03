<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Numbers extends Api_Controller {
	private
		$post 	= null;

	public function after_init() {
		if ($this->JSON_POST() && $_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->post = $this->get_post();
		} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$this->post = $this->get_url_post();
		} else {
			// unauthorized access
			$this->output->set_status_header(401);	
		}
	}

	// #1 - RANDOM SHUFFLE
	private function get_random_shuffle($start, $end) {
		return mt_rand($start, $end);
	}

	public function random_shuffle() {
		$start	= isset($this->post['start']) ? $this->post['start'] : 1;
		$end	= isset($this->post['end']) ? $this->post['end'] : 54;

		$start	= is_numeric($start) ? $start : 1;
		$end	= is_numeric($end) ? $end : 54;

		$response = array(
			'response'	=> array(
				'desc'		=> 'Answer to question #1 (random_shuffle)',
				'inputs'	=> 'start(optional), end(optional)',		
				'result' 	=> $this->get_random_shuffle($start, $end)
			)
		);

		echo json_encode($response);
	}

	// #4 - RANDOM CORRESPONDING OUTPUT
	private function get_random_corresponding_output($input) {
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
					'input'		=> $input,
					'value'		=> 30 * $input
				); // A
			case ($c >= $input && $d > $input):
				return array(
					'letter'	=> "C",
					'input'		=> $input,
					'value'		=> 20 * $input
				);
			case ($d >= $input):
				return array(
					'letter'	=> "D",
					'input'		=> $input,
					'value'		=> 10 * $input
				);
			case ($b <= $input):
				return array(
					'letter'	=> "B",
					'input'		=> $input,
					'value'		=> 40 * $input
				);
		}
	
	}

	public function random_corresponding_output() {
		$value	= isset($this->post['value']) ? $this->post['value'] : mt_rand();

		$value	= is_numeric($value) ? $value : mt_rand();

		$response = array(
			'response'	=> array(
				'desc'		=> 'Answer to question #4 (random_number_corresponding_output)',
				'inputs'	=> 'value(optional)',
				'results' 	=> $this->get_random_corresponding_output($value)
			)
		);

		echo json_encode($response);
	}

	// #6 - BINARY SUM
	private function get_binary_sum($a, $b) {
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

	public function binary_sum() {
		$a	= isset($this->post['a']) ? $this->post['a'] : '1010';
		$b	= isset($this->post['b']) ? $this->post['b'] : '1011';

		$response = array(
			'response'	=> array(
				'desc'		=> 'Answer to question #6 (Binary Sum)',
				'inputs'	=> 'a, b',		
				'result' 	=> array(
					'sum'	=> $this->get_binary_sum($a, $b)
				)
			)
		);

		echo json_encode($response);
	}

	// #7 - RECURSION FACTORIAL
	private function get_recursion_factorial($number) {
		if ($number < 2) {
			return 1;
		}

		return ($number * $this->get_recursion_factorial($number-1));
	}

	public function recursion_factorial() {
		$number	= isset($this->post['number']) ? $this->post['number'] : mt_rand(1, 100);
		$number	= is_numeric($number) ? $number : mt_rand(1, 100);

		$response = array(
			'response'	=> array(
				'desc'		=> 'Answer to question #7 (Recursion Factorial)',
				'inputs'	=> 'number(optional else rand number)',		
				'result' 	=> array(
					'input'		=> $number,
					'factorial'	=> $this->get_recursion_factorial($number)
				)
			)
		);

		echo json_encode($response);
	}
}
