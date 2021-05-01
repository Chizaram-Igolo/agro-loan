<?php  
    // Confirm that user is properly logged in.
	// If so, load the user's details.
	// If not, header them back to the home page.
    if (IsSet($_SESSION['logged_email']) && IsSet($_SESSION['logged_pass']) ) {
	  include_once ("./scripts/loadProfileStats.php");
	} else {
	 // header('location: index.php');
	}
	
	// If another user's profile is in view by this user
	// Display the appropriate options to add this user
	// as a friend.
    if (IsSet($_GET['id'])) {
	}
	
	// If the add to posse button is clicked, attempt to
	// add the user to the friends' list.
    if (IsSet($_POST['addToPosse']) && $_POST['addToPosse'] == "Add To Posse") {
      include_once ("./scripts/sendPosseRequest.php"); 
    } else if (IsSet($_POST['cancelPosseRequest']) && $_POST['cancelPosseRequest'] == "Cancel Request") {
      include_once ("./scripts/cancelPosseRequest.php"); 
    }
	
	// If the sign in attempt was unsuccessful or a hacking
	// attempt was made, header them to the home page.
    
    if (!IsSet($_POST['signInEmail']) && !IsSet($_SESSION['logged_email']) && $_SERVER['PHP_SELF'] !== "user_profile") {
	  // header('location: index.php');
	}
      if (!IsSet($_POST['signInEmail']) && !IsSet($_SESSION['logged_email']) && strstr($_SERVER['PHP_SELF'], "user_profile")) {
	  // header('location: index.php');
	}
?>