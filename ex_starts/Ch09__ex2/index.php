<?php 
// Amy Cathey WEB Ch09 ex-02

//set default values


$number1 = 78;

$number2 = -105.33;

$number3 = 0.0049;

$message = "Enter a number for each value above \n then click the Submit button.";



//process


$action = filter_input(INPUT_POST, 'action');

switch ($action) {

    case 'process_data':

        $number1 = filter_input(INPUT_POST, 'number1');

        $number2 = filter_input(INPUT_POST, 'number2');

        $number3 = filter_input(INPUT_POST, 'number3');

// make sure the user enters three numbers
		if (empty($number1) || empty($number2) ||empty($number3)) {
            $message = 'You must enter all three numbers.';
            break;
 }

// make sure the numbers are valid
        if (!is_numeric($number1) || !is_numeric($number2) || !is_numeric($number3)) {
            $message = 'You must enter three valid numbers.';
            break;
        }

// get the ceiling and floor for $number2
	    $ceil_number2 = ceil($number2);
        $floor_number2 = floor($number2);
        
// round $number3 to 3 decimal places
		$round_number3 = round($number3, 3);
		
// get the max and min values of all three numbers
		$max = max($number1, $number2, $number3);
        $min = min($number1, $number2, $number3);

// generate a random integer between 1 and 100
		 $random = mt_rand(1, 100);
 
// format the message
        $message =
            "Number 1: $number1\n" .
            "Number 2: $number2\n" .
            "Number 3: $number3\n" .
            "\n" .
            "Number 2 ceiling: $ceil_number2\n" .
            "Number 2 floor:  $floor_number2 \n" .
            "Number 3 rounded: $round_number3\n" .
            "\n" .
            "Min: $min\n" .
            "Max: $max\n" .
            "\n" .
            "Random: $random\n";

        break;
}

include 'number_tester.php';

?>