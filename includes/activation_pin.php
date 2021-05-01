<?php
  $char_bank = "abcdefghijklmnopqrstuvwxyzlABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^&*()-+,./`~";
  $string_rand = str_shuffle($char_bank);

  // Function to make seed random number generator
  /* function make_seed() {
	list($usec, $sec) = explode(' ', microtime());
	return (float)$sec + ((float)$usec * 100000);
  }
	srand(make_seed());
*/

  // Declare variable to hold activation pin
  function make_activ_pin() {
    global $string_rand;
    $activ_pin = "";
	  
    for ($i = 0; $i < 24; $i++) {
	  $rand_pos = rand(0, 76);
	  $activ_pin .= substr($string_rand, $rand_pos, 1);	
	}
    return $activ_pin;
}
?>