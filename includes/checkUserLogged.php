<?php
    // Check to see if a user is logged in.
  	if (IsSet($_SESSION['logged_email'])) {
	  $email = $_SESSION['logged_email'];
	  $password = $_SESSION['logged_pass'];
	  $user_id = $_SESSION['logged_id'];
	  
	  // Construct query string to be used in querying the database
	  // so that we can retrieve user details.
	  $user_details_query = "SELECT * FROM user WHERE user_id = $user_id LIMIT 1";
	 		
	  // Send Error to server if any occurs.
	  $user_details_resultID = false;
	  try {
		 if (!$user_details_resultID = $my_handle->query($user_details_query)) {
		   throw new Exception("\n\n'User Details' Retrieval Error: " . $my_handle->error);
		 } 
	  } catch (Exception $e) {
		  $error_time = date('Y-m-d, H:i:s A e');
	      error_log("Time error occured: " . $error_time .
					"\n\n" .$e .
					"\n\nHint to DB Admin: Check and reference the field name(s) in the database tables properly.\n\n--------------------------------------------------------------------------------------------------------------------------\n\n", 3, 'C:\error_logs\error.txt');
	       // header('location: error.php');
	  }
		
	  // Retrieve result sets as arrays and assign to $row array
	  // Prevent website from crashing and cracking attempts.
	  if (Isset($user_details_resultID) && is_object($user_details_resultID)) {
		$user_details = $user_details_resultID->fetch_assoc();
	  }	  
	} else {
	  // header('location: sign_in.php');	
	}
?>