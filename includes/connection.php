<?php  require_once("constants.php");   // Fetch all parameters for the connection.
    $my_handle = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!$my_handle) {
   	echo $my_handle -> error;
   	die();
  } 
?>