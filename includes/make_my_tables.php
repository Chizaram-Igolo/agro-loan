<?php
  error_reporting(E_ALL);                // Make PHP report all errors
  include_once("./connection.php");
     
   $query = "CREATE TABLE users (
             id INT(11) NOT NULL AUTO_INCREMENT,
			 firstname VARCHAR(30) NOT NULL,
			 lastname VARCHAR(30) NOT NULL,
			 email VARCHAR(50) NOT NULL,
			 date_of_birth VARCHAR(30) NOT NULL,
			 sex enum('M', 'F') NOT NULL,
			 primary key(id))";
			 
    $result = $my_handle->query($query);
	
	if ($result) { echo "Omewo ya"; } else {echo $my_handle->error; }
?>
