<?php
if (IsSet($_SESSION['logged_id'])) {
$user_id = $_SESSION['logged_id'];
$username = $user_details['username'];
//$firstname = $user_details['firstname'] or die();

if (IsSet($profilePic) && IsSet($profile_pic)) {
unset($profilePic);
unset($profile_pic);
}
$profilePic_mobile = "./_members/$username" . $user_id . "/profile_pics/mobile_pic01.png";

if (file_exists($profilePic_mobile)) {
  $profile_pic_mobile = "<img src = $profilePic_mobile height = \"100%\" width = \"100%\" />";
} else {
  $profilePic_mobile = "./_members/$username" . $user_id . "/profile_pics/mobile_pic01.jpg";
}

if (file_exists($profilePic_mobile)) {
  $profile_pic_mobile = "<img src = $profilePic_mobile height = \"100%\" width = \"100%\"/>";
} else {
  $profilePic_mobile = "./_members/$username" . $user_id . "/profile_pics/mobile_pic01.gif";
}

$profilePic = "./_members/$username" . $user_id . "/profile_pics/pic01.png";

if (file_exists($profilePic)) {
  $profile_pic = "<img src = $profilePic height = \"10px\" width = \"80px\" /></a>";
} else {
  $profilePic = "./_members/$username" . $user_id . "/profile_pics/pic01.jpg";
}

if (file_exists($profilePic)) {
  $profile_pic = "<img src = $profilePic height = \"auto\" width = \"auto\"/></a>";
} else {
  $profilePic = "./_members/$username" . $user_id . "/profile_pics/pic01.gif";
}

if (file_exists($profilePic)) {
  $profile_pic = "<img src = $profilePic height = \"auto\" width = \"auto\"/>";
}


if (!file_exists($profilePic)) {
   $profile_pic_default = "<a<img src = \"./_members/default/default_pic_small.png\" height = \"200px\" width = \"200px\" />";
}


if (!file_exists($profilePic)) {
   $profile_pic_default_mobile = "<img src = \"./_members/default/default_pic_small.png\" height = \"200px\" width = \"200px\" />";
}
}
 $profile_pic_default = "<img src = \"./_members/default/default_pic_small.png\"  />";
  $profile_pic_default_mobile = "<img src = \"./_members/default/default_pic_small.png\"  />";

?>

<?php
  if (IsSet($_GET['id'])) {
	 $p_id = $_GET['id'];
	 
	 $p_user_details_query = "SELECT * FROM user WHERE user_id = '$p_id' LIMIT 1";
	
	  // Send Error to server if any occurs.
	  $p_user_details_resultID = false;
	  $p_user_course_resultID = false;
	  $p_user_faculty_resultID = false;
	  $p_user_school_resultID = false;
		$p_user_edu_profile_resultID = false;
		$p_user_social_resultID = false;
	  try {
		 if (!$p_user_details_resultID = $my_handle->query($p_user_details_query)) {
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
	  if (Isset($p_user_details_resultID) && is_object($p_user_details_resultID) && $p_user_details_resultID->num_rows !== "") {
		$p_user_details = $p_user_details_resultID->fetch_assoc();
	  }
	 
		if (IsSet($profilePic) && IsSet($profile_pic)){
		unset($profilePic);
		unset($profile_pic);
		}
		$profilePic = "./_members/". $p_user_details['username'] . $p_user_details['user_id'] . "/profile_pics/pic01.png";

if (file_exists($profilePic)) {
  $profile_pic = "<img src = $profilePic height = \"100%\" width = \"100%\" />";
} else {
  $profilePic = "./_members/". $p_user_details['username']  . $p_user_details['user_id'] . "/profile_pics/pic01.jpg";
} 

if (file_exists($profilePic)) {
  $profile_pic = "<img src = $profilePic />";
} else {
  $profilePic = "./_members/" .$p_user_details['username'] . $p_user_details['user_id'] . "/profile_pics/pic01.gif";
}
      
if (file_exists($profilePic)) {
  $profile_pic = "<img src = $profilePic />";
} 
      
if (!file_exists($profilePic)) {
   $profile_pic_default = "<img src = \"./_members/default/default_pic.png\" />";
}
      
if (!file_exists($profilePic)) {
   $profile_pic_default_mobile = "<img src = \"./SchoolBoss_members/default/default_pic_small.png\"  />";
}
}
?>