<?php session_start();      
  include_once("../includes/connection.php");  
  include_once("../includes/functions.php");
  include_once("../scripts/format_time.php"); 
	date_default_timezone_set('UTC');
	
  if (IsSet($_POST['todo']) && $_POST['todo'] !== '' && 
      IsSet($_POST['user_id']) && $_POST['user_id'] !== '') {
	  $s_user_id = $_POST['user_id'];
	  $todo = $_POST['todo'];
    if (IsSet($_SESSION['logged_id'])) {
	    $s_user_id = $_SESSION['logged_id'];
	    $s_user_name = $_SESSION['user_name'];
		}
		
	$date = date('Y-m-d, H:i:s A');
    $date = $my_handle->real_escape_string($date);
			
	if ($todo == 'close_account') {
		// Build query string to insert message into the database.
    $action_query = "DELETE FROM user WHERE user.user_id = $s_user_id";
	
    $action_query2 = "DELETE FROM loan WHERE loan.user_id = '$s_user_id'";
									 
	}
	
	 try {
		 if (!$approve_resultID = $my_handle->query($action_query)) {
		   throw new Exception("\n\n'Loan Details' Retrieval Error: " . $my_handle->error);
		 } 
	  } catch (Exception $e) {
		  $error_time = date('Y-m-d, H:i:s A e');
	      error_log("Time error occured: " . $error_time .
					"\n\n" .$e . $action_query .
					"\n\nHint to DB Admin: Check and reference the field name(s) in the database tables properly.\n\n--------------------------------------------------------------------------------------------------------------------------\n\n", 3, 'C:\error_logs\error.txt');
	      // header('location: error.php');
	  }
	  
	   try {
		 if (!$approve_resultID2 = $my_handle->query($action_query2)) {
		   throw new Exception("\n\n'Loan Details' Retrieval Error: " . $my_handle->error);
		 } 
	  } catch (Exception $e) {
		  $error_time = date('Y-m-d, H:i:s A e');
	      error_log("Time error occured: " . $error_time .
					"\n\n" .$e . $action_query2 .
					"\n\nHint to DB Admin: Check and reference the field name(s) in the database tables properly.\n\n--------------------------------------------------------------------------------------------------------------------------\n\n", 3, 'C:\error_logs\error.txt');
	      // header('location: error.php');
	  }
	  
	   unlink("../_members/" . "$s_user_name" . "$s_user_id" . "/profile_pics");  // Remove the uploaded file from the PHP tmp folder
			// die("ERROR: Your file was laregr than 5 megabytes in size");
	
		signOut();	  
	  }
?>
<?php
 echo ("<meta http-equiv='refresh' content='0'>"); 
?>