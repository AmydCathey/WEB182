

<?php
// Amy Cathey WEB182 Ch09 ex 01

//set default values


$name = '';
$email = '';
$phone = '';
$message = 'Enter some data and click on the Submit button.';

//process

$action = filter_input(INPUT_POST, 'action');

switch ($action) {
    case 'process_data':
        $name = filter_input(INPUT_POST, 'name');

        $email = filter_input(INPUT_POST, 'email');

        $phone = filter_input(INPUT_POST, 'phone'); 
        
// trim the spaces from the start and end of all data
        $name = trim($name);
        $email = trim($email);
        $phone = trim($phone);

/************************************************** validate and process the name*********************************/
      // 1. make sure the user enters a name      
      if(empty($name)) {
	      $message = "Please enter a name.";
 }  	         
     // 2. display the name with only the first letter capitalized
     $name = strtolower($name);
     $name = ucwords($name);
     
     // 3. display the first name from whole name enter (page 268)
     $i = strpos($name, ' ');
     if($i ===false) {
	     $first_name = $name;
 }
 else {
	 $first_name = substr($name,0, $i); } 

/************************************************** validate and process the email address************************/
      // 1. make sure the user enters an email
      // 2. make sure the email address has at least one @ sign and one dot character
      
      if(empty($email)) {
	      $message = "Please enter a valid email address.";
	      break;
      }
      else if(strpos($email, '@') === false) {
	      $message = "The Email address must contain an @ sign.";
	      break;
      }
      else if (strpos($email, '.') === FALSE) {
	      $message = "The Email address must contain a dot character.";
	      break;
  	  }
  	  $e = (substr($email,strlen($email)-4,4));
  	  if ($e != '.com' && $e != '.net' && $e != '.edu' && $e != '.gov' && $e != '.org') {
	      $message = "The Email address must contain a correct domain suffix (.com,.org,.edu,.gov,.net)";
	      break;
  	  }     
      
/************************************************** validate and process the phone number*************************/
       // 1. make sure the user enters at least seven digits, not including formatting characters
       
       if (strlen($phone) < 7) {
            $message = "The phone number must contain a minimum of seven digits.";
            break;
        }
         // remove -, (, ) and blank spaces from phone number
         
            $phone = str_replace('-', '', $phone);
            $phone = str_replace('(', '', $phone);
            $phone = str_replace(')', '', $phone);
            $phone = str_replace(' ', '', $phone);

        // 2. format the phone number like this 123-4567 or this 123-456-7890
        
        if (strlen($phone) == 7) {
            $part1 = substr($phone, 0,3);
            $part2 = substr($phone,3);
            $phone = $part1 . '-' . $part2;
        } else {
            $part1 = substr($phone, 0, 3);
            $part2 = substr($phone, 3, 3);
            $part3 = substr($phone,6);
            $phone = $part1 . '-' . $part2 . '-' . $part3;
         }
        
/************************************************** Display the validation message********************************/

        $message = "Hello $first_name,\n\n". 
                   "Thank you for entering this data:\n\n" .
                   "Name: $name\n" .
                   "Email: $email\n" .
                   "Phone: $phone\n"; 

         break;
}

include 'string_tester.php';


?>