<?php 
  function authUserPass($saved_pass, $entered_pass) {
  if ($saved_pass === $entered_pass) {
	return TRUE;
   } else {
	 return FALSE;
  }
}
	
// Converts the provided email address into small letters.
function emailLowerCase($email) {
    $email = strtolower($email);
	return $email;	
}

function signOut() {
	unset($_POST['logInEmail']);
	unset($_POST['logInPass']);
	  
	// ensure we close the user's sessions
	if (IsSet($_SESSION['logged_email'])) {
	  unset($_SESSION['logged_email']);
	}
	if (IsSet($_SESSION['logged_pass'])) {
	  unset($_SESSION['logged_pass']);
	}
	if (IsSet($_SESSION['logged_id'])) {
	  unset($_SESSION['logged_id']);
	}
	if (IsSet($_SESSION['user_name'])) {
	  unset($_SESSION['user_name']);
	}
	if (IsSet($_SESSION['param'])) {
	  unset($_SESSION['param']);
	}
if (IsSet($_SESSION['has_visited'])) {
	  unset($_SESSION['has_visited']);
	}
	if (IsSet($_SESSION['check_is_admin'])) {
	  unset($_SESSION['check_is_admin']);
	}
	if (IsSet($_SESSION['user_name'])) {
	  unset($_SESSION['user_name']);
	}
	if (IsSet($_SESSION['param'])) {
	  unset($_SESSION['param']);
	}
	if (IsSet($_SESSION['failed_attempt'])) {
	  unset($_SESSION['failed_attempt']);
	}
	if (IsSet($_SESSION['activ_pin'])) {
	  unset($_SESSION['activ_pin']);
	}
	if (IsSet($_SESSION['done1'])) {
	  unset($_SESSION['done1']);
	}
	if (IsSet($_SESSION['is_activated'])) {
	  unset($_SESSION['is_activated']);
	}
	if (IsSet($_GET['p'])) {
	  unset($_GET['p']);
	}
	session_destroy();
}

function widgetSignUp() {
    
    if ( (IsSet($_POST['username']) || IsSet($_POST['email']) || IsSet($_POST['password'])) && 
		 (($_POST['username']) != ''|| ($_POST['email']) != '' || ($_POST['password']) != '')) {
	  $username = $_POST['username'];
	  $email = $_POST['email'];
	  $password = $_POST['password'];
	  
	  // Sanititize input
	  strip_tags($username);
	  addslashes($username);
	  
	  strip_tags($email);
	  addslashes($email);
	  
	  strip_tags($password);
	  addslashes($password);
	 
      if ($username != '') { 
	    $_SESSION['username'] = $username; 
	  }
      if ($email != '') {
	    $_SESSION['email'] = $email; 
	  }
      if ($password != '') { 
	    $_SESSION['password'] = $password; 
      } 	  
	  $status['username'] = "<span class = \"tip\" class = \"wrong\" style = \"color: #dd5959;\" id = \"status\">Wo-oops! Username already taken. Try another.</span>";
      $status['username'] = "<span class = \"tip\" class = \"correct\" style = \"color: #44b244;\" id = \"status\">Username available.</span>";

	  unset($username);
	  unset($email);
	  unset($password);
	  header('location: register.php');
	}
	
}

// Declare a status variable to store all error messages.
$status = array();
$status['usernameComp'] = "";
$status['emailComp'] = "";
$status['passwordComp'] = "";
$status['departmentComp'] = "";
$status['facultyComp'] = "";
$status['institutionComp'] = "";
$status['firstnameComp'] = "";
$status['lastnameComp'] = "";
$status['birthdayComp'] = "";
$status['birthmonthComp'] = "";
$status['birthyearComp'] = "";

$approved = array();
$approved[0] = false;
$approved[1] = false;
$approved[2] = false;

function finishSignUp() {
   // Make variables available to the function.
  global $status;
  global $approved;
	
	 if (IsSet($_POST['finishSignUp'])) {
    if (!IsSet($_POST['formFirstname']) || $_POST['formFirstname'] == "") {
      $status['firstnameComp'] = "Please enter in your first name.";
      $approved[0] = false;
    } else {
      $approved[0] = true;
    }
 
    if (!IsSet($_POST['formLastname']) || $_POST['formLastname'] == "") {
      $status['lastnameComp'] = "Please enter in your last name.";
	  $approved[1] = false;
    } else {
      $approved[1] = true;
    }

    if (!IsSet($_POST['formMonth']) || $_POST['formMonth'] == "") {
      $status['birthDateDetailsComp'] = "Please select a month.";
	  $approved[2]= false;
    } else if (!IsSet($_POST['formDay']) || $_POST['formDay'] == "") {
      $status['birthDateDetailsComp'] = "Please select a day.";
	  $approved[2]= false;
    } else if (!IsSet($_POST['formYear']) || $_POST['formYear'] == "") {
      $status['birthDateDetailsComp'] = "Please select a year.";
	  $approved[2]= false;
    } else {
      $approved[2] = true;
    }  
         
    if (!IsSet($_POST['formSex']) || $_POST['formSex'] == "") {
      $status['genderdetailsComp'] = "Please select your gender.";
	  $approved[3] = false;
    } else {
      $approved[3] = true;
    }
	
	if (!IsSet($_POST['formPhoneNumber']) || $_POST['formPhoneNumber'] == "") {
      $status['phonenumberComp'] = "Please enter in your phone number.";
	  $approved[4] = false;
    } else {
      $approved[4] = true;
    }
	// unset($_POST['continueSignUp']); 
    return ($approved[0] && $approved[1] && $approved[2] && $approved[3] && $approved[4]);
	
  }
}

function continueSignUp() {
   // Make variables available to the function.
  global $status;
  global $approved;
	
	 if (IsSet($_POST['continueSignUp'])) {
    if (!IsSet($_POST['formInstitution']) || $_POST['formInstitution'] == "") {
      $status['institutionComp'] = "<span class = \"tip\" class = \"wrong\" style = \"color: #f44;\" id = \"institutionStat\">Please choose and Institution.</span>";
      $approved[0] = false;
    } else {
      $approved[0] = true;
    }
 
    if (!IsSet($_POST['formFaculty']) || $_POST['formFaculty'] == "") {
      $status['facultyComp'] = "<span class = \"tip\" class = \"wrong\" style = \"color: #f44;\" id = \"facultyStat\">Please choose a school/faculty.</span>";
	  $approved[1] = false;
    } else {
      $approved[1] = true;
    }
  
    if (!IsSet($_POST['formDepartment']) || $_POST['formDepartment'] == "") {
      $status['departmentComp'] = "<span class = \"tip\" class = \"wrong\" style = \"color: #f44; margin-bottom: -28px;\" id = \"departmentStat\">Please choose a department.</span>";
	  $approved[2]= false;
    } else {
      $approved[2] = true;
    }  
	// unset($_POST['continueSignUp']);
    return ($approved[0] && $approved[1] && $approved[2]);
  }
}

function formSignUp() {
  // Make variables available to the function.
  global $status;
  global $approved;
	
  if (IsSet($_POST['createAccount'])) {
    if (!IsSet($_POST['formUsername']) || $_POST['formUsername'] == "") {
      $status['usernameComp'] = "Please enter in a user name.";
      $approved[0] = false;
    } else {
      $approved[0] = true;
    }
    
    global $my_handle;
      // var_dump($my_handle);
    if (IsSet($_POST['formUsername']) && $_POST['formUsername'] !== "") {  
		  global $my_handle;
      $query_username = "SELECT * FROM user where username = '" . $_POST['formUsername']. "'";
      $query_results = $my_handle->query($query_username) or die($my_handle->error);
      $count = $query_results->num_rows;
    if ($count == 0) {
      // Add new user to database
      $approved[2] = true;
    } else {
       $status['usernameComp'] = "This username is already being used!";
      $approved[2] = false;
    }
    }
 
    if (!IsSet($_POST['formEmail']) || $_POST['formEmail'] == "") {
      $status['emailComp'] = "Please enter in an email.";
	  $approved[1] = false;
    } else {
      $approved[1] = true;
    }
    
    if (IsSet($_POST['formEmail']) && $_POST['formEmail'] !== "") {  
      $query_email = "SELECT * FROM user where email_address = '" . $_POST["formEmail"]. "'";
      $query_results = $my_handle->query($query_email) or die($my_handle->error);
      $count = $query_results->num_rows;
    if ($count == 0) {
      // Add new user to database
      $approved[3] = true;
    } else {
       $status['emailComp'] = "This email is already being used!";
      $approved[3] = false;
    }
    }
  
    if (!IsSet($_POST['formPassword']) || $_POST['formPassword'] == "") {
      $status['passwordComp'] = "Please enter in a password.";
	  $approved[4]= false;
    } else {
	  $approved[4]= true;
	}
	  if (!IsSet($_POST['form2Password']) || $_POST['form2Password'] == "") {
	    $status['password2Comp'] = "Please confirm password.";  
        $approved[5] = false;
	  } else {
		$approved[5] = true;
	  }
	  if (($_POST['form2Password'] !== $_POST['formPassword'])) {
	    $status['password2Comp'] = "Please confirm password.";  
        $approved[5] = false;
	  } else {
		$approved[5] = true;  
	  }
	 // Sunset($_POST['createAccount']);
	 // $_SESSION['createAccount'] = TRUE;
    return ($approved[0] && $approved[1] && $approved[2] && $approved[3] && $approved[4] && $approved[5]);
  }
}



/********************************************************************************************************/
function signUpUser(){
	
	if (IsSet($_SESSION['formUsername']) && ($_SESSION['formUsername'] !== "") &&
			IsSet($_SESSION['formEmail']) && ($_SESSION['formEmail'] !== "") &&
			IsSet($_SESSION['crypt_pass']) && ($_SESSION['crypt_pass'] !== "") &&
			// IsSet($_SESSION['formFaculty']) && ($_SESSION['formFaculty'] !== "") &&
			// IsSet($_SESSION['formInstitution']) && ($_SESSION['formInstitution'] !== "") &&
			// IsSet($_SESSION['formDepartment']) && ($_SESSION['formDepartment'] !== "") &&
			IsSet($_SESSION['formFirstname']) && $_SESSION['formFirstname'] !== "" &&
			IsSet($_SESSION['formLastname']) && $_SESSION['formLastname'] !== "" && 
			IsSet($_SESSION['formDay']) && $_SESSION['formDay'] !== "" &&
			IsSet($_SESSION['formMonth']) && $_SESSION['formMonth'] !== "" &&
			IsSet($_SESSION['formYear']) && $_SESSION['formYear'] !== "" && 
			IsSet($_SESSION['formPhoneNumber']) && $_SESSION['formPhoneNumber'] !== "" &&
			IsSet($_SESSION['formSex']) && $_SESSION['formSex'] !== "" &&
	    IsSet($_SESSION['salt']) && $_SESSION['salt'] !== ""){
	$db_username = $_SESSION['formUsername'];
	$db_email = $_SESSION['formEmail'];
	$db_crypt_pass = $_SESSION['crypt_pass'];
	$db_salt = $_SESSION['salt'];
	$db_firstname = $_SESSION['formFirstname'];
	$db_lastname = $_SESSION['formLastname'];
	$db_day = $_SESSION['formDay'];
	$db_month = $_SESSION['formMonth'];
	$db_year = $_SESSION['formYear'];
	  switch($db_month) {
	  case "January":
			$db_month = "01";
			break;
	  case "February":
			$db_month = "02";
			break;
      case "March":
			$db_month = "03";
			break;
	  case "April":
			$db_month = "04";
			break;
	  case "May":
			$db_month = "05";
			break;
	  case "June":
			$db_month = "06";
			break;
	  case "July":
			$db_month = "07";
			break;
	  case "August":
			$db_month = "08";
			break;
      case "September":
			$db_month = "09";
			break;
	  case "October":
			$db_month = "10";
			break;
	  case "November":
			$db_month = "11";
			break;
	  case "December":
			$db_month = "12";
			break;
	  } 
	$db_date_of_birth = $db_year . "-" . $db_month . "-" . $db_day;
    $db_sex =  $_SESSION['formSex'];
	$db_phonenumber = $_SESSION['formPhoneNumber'];
	$db_activ_pin = $_SESSION['activ_pin'];
        
	// Prepare user's input for database insertion.
	$db_username = preg_replace('#[^A-Za-z0-9\']#i', '', $db_username);
	$db_username = stripslashes($db_username);
	$db_username = str_replace('`', '', $db_username);

	$db_email = preg_replace('#[^A-Za-z0-9@.]#i', '', $db_email);
	$db_email = stripslashes($db_email);
	$db_email = str_replace('`', '', $db_email);
	
	$db_firstname = preg_replace('#[^A-Za-z\']#i', '', $db_firstname);
	$db_firstname = stripslashes($db_firstname);
	$db_firstname = str_replace('`', '', $db_firstname);
	
	$db_lastname = preg_replace('#[^A-Za-z\']#i', '', $db_lastname);
	$db_lastname = stripslashes($db_lastname);
	$db_lastname = str_replace('`', '', $db_lastname);
	
	//$db_date_of_birth = preg_replace('#[^A-Za-z\']#i', '', $db_date_of_birth);
	//$db_date_of_birth = stripslashes($db_date_of_birth);
	//$db_date_of_birth = str_replace('`', '', $db_date_of_birth);
	
	// $db_phonenumber = preg_replace('#[^A-Za-z\']#i', '', $db_phonenumber);
	$db_phonenumber = stripslashes($db_phonenumber);
	$db_phonenumber = str_replace('`', '', $db_phonenumber);
	
	if (IsSet($_SESSION['formHidden'])) {
	  if ($_SESSION['formHidden'] == "admin") {
	    $db_is_admin = "1";
	  }
	} else {
	  $db_is_admin = "0";
	}
	
	// Don't trust the network.
	switch($db_sex) {
	  case "Male":
			$db_sex = "M";
			break;
		case "Female":
			$db_sex = "F";
			break;
	} 
	$db_passed_array['username'] = $db_username;
	$db_passed_array['email'] = $db_email;
	$db_passed_array['cryptPass'] = $db_crypt_pass;
	$db_passed_array['salt'] = $db_salt;
	$db_passed_array['firstname'] = $db_firstname;
	$db_passed_array['lastname'] = $db_lastname;
	$db_passed_array['sex'] = $db_sex;
	$db_passed_array['phoneNumber'] = $db_phonenumber;
	$db_passed_array['dob'] = $db_date_of_birth;
	$db_passed_array['activPin'] = $db_activ_pin;
	$db_passed_array['isAdmin'] = $db_is_admin;
	// $user_obj = new User($db_username, $db_email, $db_crypt_pass, $db_salt, $db_firstname, $db_lastname, '', $db_sex, $db_phonenumber, $db_date_of_birth, '', '', '', '', $db_activ_pin, $db_is_admin);
    $user_obj = new User($db_passed_array);
  
  if ($user_obj->create_user()) {
		$_SESSION['success'] = true;
		// header('location: register.php');
	}
}
}
/***************************************************************************************************/

function updateAccount1() {
  $firstName = strip_tags($_POST['firstname']);
  $firstName = preg_replace('#[^A-Za-z\']#i', '', $firstName);
  $firstName = stripslashes($firstName);
  $db_firstname = str_replace('`', '', $firstName);

  $lastName = strip_tags($_POST['lastname']);
  $lastName = preg_replace('#[^A-Za-z\']#i', '', $lastName);
  $lastName = stripslashes($lastName);
  $db_lastname = str_replace('`', '', $lastName);
	
  $otherName = strip_tags($_POST['othername']);
  $otherName = preg_replace('#[^A-Za-z\']#i', '', $otherName);
  $otherName = stripslashes($otherName);
  $db_othername = str_replace('`', '', $otherName);
  
  $birthDate = strip_tags($_POST['formBirthDate']);
  // $birthDate = preg_replace('#[^A-Za-z\']#i', '', $birthDate);
  $birthDate = stripslashes($birthDate);
  $db_birthDate = str_replace('`', '', $birthDate);
  
  $maritalStatus = strip_tags($_POST['formMaritalStatus']);
  $maritalStatus = preg_replace('#[^A-Za-z\']#i', '', $maritalStatus);
  $maritalStatus = stripslashes($maritalStatus);
  $db_maritalStatus = str_replace('`', '', $maritalStatus);
  
  $phoneNumber = strip_tags($_POST['formPhoneNumber']);
  // $phoneNumber = preg_replace('#[^A-Za-z\']#i', '', $phoneNumber);
  $phoneNumber = stripslashes($phoneNumber);
  $db_phoneNumber = str_replace('`', '', $phoneNumber);
  $db_passed_array['firstname'] = $db_firstname; 
  $db_passed_array['lastname'] = $db_lastname;
  $db_passed_array['othername'] = $db_othername; 
  $db_passed_array['dob'] = $db_birthDate; 
  $db_passed_array['maritalStatus'] = $db_maritalStatus; 
  $db_passed_array['phoneNumber'] = $db_phoneNumber; 
  
  $user_obj = new User($db_passed_array);
    if ($user_obj->update_user()) { 
  }
}

function updateAccount2() {
  $home_address = strip_tags($_POST['formHomeAddress']);
  $village = strip_tags($_POST['formVillage']);
  $ward = strip_tags($_POST['formWard']);
  $district = strip_tags($_POST['formDistrict']);
  $lga = strip_tags($_POST['formLGA']);
  $state = strip_tags($_POST['formState']);
  
  $db_homeaddress = stripslashes($home_address);  
  $db_village = stripslashes($village); 
  $db_ward = stripslashes($ward);  
  $db_district = stripslashes($district);
  $db_lga = stripslashes($lga);
  $db_state = stripslashes($state);
   
  $db_passed_array['homeAddress'] = $db_homeaddress; 
  $db_passed_array['village'] = $db_village;
  $db_passed_array['ward'] = $db_ward; 
  $db_passed_array['district'] = $db_district; 
  $db_passed_array['lga'] = $db_lga; 
  $db_passed_array['state'] = $db_state;   
  
	$user_obj = new User($db_passed_array);
	if ($user_obj->update_user_2()) { 
	}
}

function updateAccount3() {
  $account_no = strip_tags($_POST['formAcctNo']);
  $bvn = strip_tags($_POST['formBVN']);
  $bank = strip_tags($_POST['formBank']);
  
  $db_account_no = stripslashes($account_no);  
  $db_bvn = stripslashes($bvn); 
  $db_bank = stripslashes($bank);  
  
  $db_passed_array['acctNo'] = $db_account_no; 
  $db_passed_array['bvn'] = $db_bvn;
  $db_passed_array['bank'] = $db_bank;
  
  $user_obj = new User($db_passed_array);
    if ($user_obj->update_user_3()) { 
  }
}

function acceptLogin() {

	  $_SESSION['logged_email'] = $user_email;
	  $_SESSION['crypt_logged_pass'] = $row['password'];
	  $_SESSION['logged_id'] = $row['student_id'];

	  header('location: slate.php');
}

function rejectLogin() {
 $status_logged = "Wrong Username or Password";
	  
	// error_log(crypt($user_pass, SALT),  3, 'C:\error_logs\error.txt'); // Log error 	
}

function authUser() {
	$status_uname = "";
	$status_upass = "";
	$status_logged = "";
	
	if (IsSet($_POST['signIn']) || IsSet($_POST['signInButton']) ) {
	if ($_POST['signInEmailUsername'] == "" || $_POST['signInPass'] == ""|| $_POST['signInPass'] == "defaulttext") {
		if ($_POST['signInEmailUsername'] == "") {
		  $status_uname = "Please enter in a username/<wbr/>email!";
		}
		if ($_POST['signInPass'] == "") {
		  $status_upass = "Please enter in a password!";
	  }
		if ($_POST['signInEmailUsername'] == "" && $_POST['signInPass'] == "") {
		  $status_both = "Please enter in a username/email and password!";
	  }
		
		//header('location: index.php');
		if (IsSet($status_uname) && $status_uname !== "") {
		  $_SESSION['failed_attempt'] = $status_uname;
	  }
		if (IsSet($status_upass) && $status_upass !== "") {
		  $_SESSION['failed_attempt'] = $status_upass;
	  }
		if (IsSet($status_both) && $status_both !== "") {
		  $_SESSION['failed_attempt'] = $status_both;
	  }
	}

	elseif (IsSet($_POST['signInEmailUsername']) && IsSet($_POST['signInPass']) ) 
	{
		$emailUsername = trim($_POST['signInEmailUsername']);
		$emailUsername = emailLowerCase($emailUsername);
		
		$user_pass = trim($_POST['signInPass']);
	  
		global $my_handle;
		
		$query = "SELECT user_id, username, email_address, password, salt, is_admin, activ_state, has_visited, is_blocked FROM user WHERE email_address = '$emailUsername' OR username = '$emailUsername'";
		$result_id = $my_handle->query($query);
		
			if (is_object($result_id) && $result_id->num_rows !== 0) 
			{
				$row = $result_id->fetch_assoc();
				if (authUserPass($row['password'], crypt($user_pass, $row['salt']))) { 
					 if ($row['is_blocked'] == "1") {
						$status_logged = "Sorry, this account has been blocked.";
					    $_SESSION['failed_attempt'] = $status_logged; 
						
						return (0);
					 }
					 
				   $_SESSION['user_name'] = $row['username'];
					 $_SESSION['logged_email'] = $row['email_address'];
					 $_SESSION['logged_pass'] = $row['password'];
					 $_SESSION['logged_id'] = $row['user_id'];
					 $_SESSION['check_is_admin'] = $row['is_admin'];
					 $_SESSION['has_visited'] = $row['has_visited'];
					 $_SESSION['is_activated'] = $row['activ_state'];
					
					 $last_login_date = date('Y-m-d, H:i:s A');
					 $last_login_date = $my_handle->real_escape_string($last_login_date);
					
					 $query_2 = "UPDATE user SET last_login_date_UTC = '$last_login_date' WHERE email_address = email_address = '$emailUsername' OR username = '$emailUsername'";
		             $result_id_2 = $my_handle->query($query_2);
					
					 header('location: slate.php');
				 }
				 else {
				   $status_logged = "Incorrect username or password!";
					 $_SESSION['failed_attempt'] = $status_logged;
					}
	    }else {
					 $status_logged = "No account for that username/<wbr/>email and password exists!";
					 $_SESSION['failed_attempt'] = $status_logged;
					 //error_log(crypt($user_pass, $row['salt']),  3, 'C:\error_logs\error.txt');
		  } 
		  
	}	
}}

/* function createPost() {
  if (IsSet($_POST['postTitle']) && IsSet($_POST['postContent']) && IsSet($_SESSION['firstDiv_heading'])) {
	  global $my_handle;
		
		$post_title = $_POST['postTitle'];
		$post_content= $_POST['postContent'];
		$post_category = $_SESSION['firstDiv_heading'];

		$post_title = strip_tags($post_title);
		$post_title = stripslashes($post_title);

		$post_content = strip_tags($post_content);
		$post_content = stripslashes($post_content);

		$post_category = strip_tags($post_category);
		$post_category = stripslashes($post_category);

		$post_title = $my_handle->real_escape_string($post_title);
		$post_category = $my_handle->real_escape_string($post_category);
		$post_content = $my_handle->real_escape_string($post_content);

		$post_date = date('Y-m-d, H:i:s A');
		$post_date = $my_handle->real_escape_string($post_date);

		if ($post_title !== '' && $post_content !== '' && $post_category !== '' && $post_date !== '') {
		$insert_post_query = "INSERT INTO posts (post_title, post_category, post_content, post_date) 
												 VALUES ('$post_title', '$post_category', '$post_content', '$post_date')";
		$insert_post_resultID = $my_handle->query($insert_post_query);
		unset($_POST['postContent']);
		}
	}
} */

function createPost() {
  if (IsSet($_SESSION['param']) && IsSet($_SESSION['questionTxt']) &&  IsSet($_POST['xhr_category'])) {
	  global $my_handle;
		
		$post_title = $_SESSION['questionTxt']; // Retrieve the question or post title.
        if (IsSet($_SESSION['questionContent'])) {  // Check to make sure that the question or post has a body.
		  $post_content= $_SESSION['questionContent'];
        } else {
          $post_content = '';
        }
        
        if (substr($_SESSION['param'], "post")) {
          $post_type = "1";
        } else if (substr($_SESSION['param'], "question")) {
          $post_type = "2";
        }
            
		$post_category = $_POST['xhr_category'];  // Retrieve the category of the post.
        $poster_id = $_SESSION['logged_id'];
            
        // Get rid of tags, slashes and escape html characters
		$post_title = strip_tags($post_title);
		$post_title = stripslashes($post_title);

		$post_content = strip_tags($post_content);
		$post_content = stripslashes($post_content);

		$post_category = strip_tags($post_category);
		$post_category = stripslashes($post_category);

		$post_title = $my_handle->real_escape_string($post_title);
		$post_category = $my_handle->real_escape_string($post_category);
		$post_content = $my_handle->real_escape_string($post_content);

		$post_date = date('Y-m-d, H:i:s A');
		$post_date = $my_handle->real_escape_string($post_date);

		if ($post_title !== '' && $post_category !== '' && $post_date !== '') {
		$insert_post_query = "INSERT INTO posts (poster_id, post_title, post_type, post_category, post_content, post_date) VALUES ('$poster_id, $post_title', $post_type, '$post_category', '$post_content', '$post_date')";
		$insert_post_resultID = $my_handle->query($insert_post_query) or die($my_handle->error);
		unset($_POST['title']);
		}
	}
}

/* function formSignUp() {
  // Make variables available to the function.
  global $status;
  global $approved;
	
  if (IsSet($_POST['createAccount'])) {
    if (!IsSet($_POST['formUsername']) || $_POST['formUsername'] == "") {
      $status['usernameComp'] = "<span class = \"tip\" class = \"wrong\" style = \"color: #f44;\" id = \"usernameStat\">Please enter in a user name.</span>";
      $approved[0] = false;
    } else {
      $approved[0] = true;
    }
    
    global $my_handle;
      
    if (IsSet($_POST['formUsername']) && $_POST['formUsername'] !== "") {  
      $query_username = "SELECT * FROM user where username = '" . $_POST["formUsername"]. "'";
      $query_results = $my_handle->query($query_username) or die($my_handle->error);
      $count = $query_results->num_rows;
    if ($count == 0) {
      // Add new user to database
      $approved[2] = true;
    } else {
       $status['usernameComp'] = "<span class = \"tip\" class = \"wrong\" style = \"color: #f44;\" id = \"usernameStat\">This username is already being used!.</span>";
      $approved[2] = false;
    }
    }
 
    if (!IsSet($_POST['formEmail']) || $_POST['formEmail'] == "") {
      $status['emailComp'] = "<span class = \"tip\" class = \"wrong\" style = \"color: #f44;\" id = \"emailStat\">Please enter in an email.</span>";
	  $approved[1] = false;
    } else {
      $approved[1] = true;
    }
    
    if (IsSet($_POST['formEmail']) && $_POST['formEmail'] !== "") {  
      $query_email = "SELECT * FROM user where email_address = '" . $_POST["formEmail"]. "'";
      $query_results = $my_handle->query($query_email) or die($my_handle->error);
      $count = $query_results->num_rows;
    if ($count == 0) {
      // Add new user to database
      $approved[2] = true;
    } else {
       $status['emailComp'] = "<span class = \"tip\" class = \"wrong\" style = \"color: #f44;\" id = \"emailStat\">This email is already being used!.</span>";
      $approved[2] = false;
    }
    }
  
    if (!IsSet($_POST['formPassword']) || $_POST['formPassword'] == "") {
      $status['passwordComp'] = "<span class = \"tip\" class = \"wrong\" style = \"color: #f44; margin-bottom: -28px;\" id = \"passStat\">Please enter in a password.</span>";
	  $approved[3]= false;
    } else {
      $approved[3] = true;
    } 
	 // Sunset($_POST['createAccount']);
	 // $_SESSION['createAccount'] = TRUE;
    return ($approved[0] && $approved[1] && $approved[2] && $approved[3]);
  }
} */

function formCreateLoan() {
   global $user_details;
   global $errorStat;
   global $approved;
   global $username;
   global $user_id;
   
   $post_array = $_POST;
  // for each ($post_array as $x) {
	   
 //  }
  // var_dump($x);

   foreach ($_POST as $x) {
	  if (!IsSet($x) || $x == "") {
	     $errorStat = "Please Specify the following fields: <br/>";
	  }
   }
   
   
   if (!IsSet($_POST['latitudeTxt']) || $_POST['latitudeTxt'] == "") {
      $errorStat .= "<br/>- Latitude";
      $approved[0] = false;
    } else {
      $approved[0] = true;
    }
	 if (!IsSet($_POST['longitudeTxt']) || $_POST['longitudeTxt'] == "") {
      $errorStat .= "<br/>- Longitude";
      $approved[1] = false;
    } else {
      $approved[1] = true;
    }
	if (!IsSet($_POST['vatNoTxt']) || $_POST['vatNoTxt'] == "") {
      $errorStat .= "<br/>- Vat Number";
      $approved[2] = false;
    } else {
      $approved[2] = true;
    }
	if (!IsSet($_POST['dateRegTxt']) || $_POST['dateRegTxt'] == "") {
      $errorStat .= "<br/>- Entry Date";
      $approved[3] = false;
    } else {
      $approved[3] = true;
    }
	if (!IsSet($_POST['fieldOffIDTxt']) || $_POST['fieldOffIDTxt'] == "") {
      $errorStat .= "<br/>- Field Officer ID";
      $approved[4] = false;
    } else {
      $approved[4] = true;
    }
    if (!IsSet($_POST['fieldOffNameTxt']) || $_POST['fieldOffNameTxt'] == "") {
      $errorStat .= "<br/>- Field Officer Name";
      $approved[5] = false;
    } else {
      $approved[5] = true;
    }
	if (!IsSet($_POST['anchorCompTxt']) || $_POST['anchorCompTxt'] == "") {
      $errorStat .= "<br/>- Anchor/Offtake Company";
      $approved[6] = false;
    } else {
      $approved[6] = true;
    }
	if (!IsSet($_POST['farmtype']) || $_POST['farmtype'] == "") {
      $errorStat .= "<br/>- Farm Type";
      $approved[8] = false;
    } else {
      $approved[8] = true;
    }
	
	if (IsSet($_POST['farmtype']) && $_POST['farmtype'] !== "") {
      $farmtype = $_POST['farmtype'];
	  if (IsSet($farmtype[2]) && $farmtype[2] !== "" && (!IsSet($_POST['nameOrigOwnerTxt']) || $_POST['otherFarmTypeTxt'] == "")) {
		  $errorStat .= "<br/>- Other farm type";
          $approved[8] = false;
        } else {
        $approved[8] = true;
        }
	}
	if ((!IsSet($_POST['firstNameTxt']) || $_POST['firstNameTxt'] == "")
		&& (!IsSet($user_details['firstname']) || $user_details['firstname'] == ""))  {
      $errorStat .= "<br/>- First Name";
      $approved[9] = false;
    } else {
      $approved[9] = true;
    }
	/*if ((!IsSet($_POST['middleNameTxt']) || $_POST['middleNameTxt'] == "")
	     && (!IsSet($user_details['lastname']) || $user_details['othername'] == "")) {
      $errorStat .= "<br/>- Middle Name";
      $approved[9] = false;
    } else {
      $approved[9] = true;
    }*/
	if ((!IsSet($_POST['lastNameTxt']) || $_POST['lastNameTxt'] == "")
	     && (!IsSet($user_details['lastname']) || $user_details['lastname'] == "")) {
      $errorStat .= "<br/>- Surname";
      $approved[10] = false;
    } else {
      $approved[10] = true;
    }
	if ((!IsSet($_POST['sexChkBox']) || $_POST['sexChkBox'] == "") &&
        (!IsSet($user_details['sex']) || $user_details['sex'] == ""))	{
      $errorStat .= "<br/>- Marital Status";
      $approved[11] = false;
    } else {
      $approved[11] = true;
    }
	if ((!IsSet($_POST['dateBirthTxt']) || $_POST['dateBirthTxt'] == "") &&
        (!IsSet($user_details['date_of_birth']) || $user_details['date_of_birth'] == ""))	{
      $errorStat .= "<br/>- Date of Birth";
      $approved[12] = false;
    } else {
      $approved[12] = true;
    }
	if ((!IsSet($_POST['maritalStatChkBox']) || $_POST['maritalStatChkBox'] == "") &&
        (!IsSet($user_details['marital_status']) || $user_details['marital_status'] == ""))	{
      $errorStat .= "<br/>- Marital Status";
      $approved[13] = false;
    } else {
      $approved[13] = true;
    }
	if ((!IsSet($_POST['addressTxt']) || $_POST['addressTxt'] == "")
	     && (!IsSet($user_details['address']) || $user_details['address'] == "")) {
      $errorStat .= "<br/>- Address";
      $approved[14] = false;
    } else {
      $approved[14] = true;
    }	
	if ((!IsSet($_POST['telNoTxt']) || $_POST['telNoTxt'] == "")
	     && (!IsSet($user_details['phone_no']) || $user_details['phone_no'] == "")) {
      $errorStat .= "<br/>- Telephone Number";
      $approved[7] = false;
    } else {
      $approved[7] = true;
    }
	if ((!IsSet($_POST['villageTxt']) || $_POST['villageTxt'] == "")
	     && (!IsSet($user_details['village']) || $user_details['village'] == "")) {
      $errorStat .= "<br/>- Village";
      $approved[15] = false;
    } else {
      $approved[15] = true;
    }
	if ((!IsSet($_POST['wardTxt']) || $_POST['wardTxt'] == "")
	     && (!IsSet($user_details['ward']) || $user_details['ward'] == "")) {
      $errorStat .= "<br/>- Ward";
      $approved[16] = false;
    } else {
      $approved[16] = true;
    }
	if ((!IsSet($_POST['districtTxt']) || $_POST['districtTxt'] == "")
	     && (!IsSet($user_details['district']) || $user_details['district'] == "")) {
      $errorStat .= "<br/>- District";
      $approved[17] = false;
    } else {
      $approved[17] = true;
    }
	if ((!IsSet($_POST['lgaTxt']) || $_POST['lgaTxt'] == "")
	     && (!IsSet($user_details['lga']) || $user_details['lga'] == "")) {
      $errorStat .= "<br/>- Local Government Area";
      $approved[18] = false;
    } else {
      $approved[18] = true;
    }
	if ((!IsSet($_POST['stateTxt']) || $_POST['stateTxt'] == "")
	     && (!IsSet($user_details['state']) || $user_details['state'] == "")) {
      $errorStat .= "<br/>- State";
      $approved[19] = false;
    } else {
      $approved[19] = true;
    }
	if ((!IsSet($_POST['bvnTxt']) || $_POST['bvnTxt'] == "")
	     && (!IsSet($user_details['bvn']) || $user_details['bvn'] == "")) {
      $errorStat .= "<br/>- Bank Verification Number";
      $approved[20] = false;
    } else {
      $approved[20] = true;
    }
	if ((!IsSet($_POST['acctNoTxt']) || $_POST['acctNoTxt'] == "")
	     && (!IsSet($user_details['acct_no']) || $user_details['acct_no'] == "")) {
      $errorStat .= "<br/>- Account Number";
      $approved[21] = false;
    } else {
      $approved[21] = true;
    }
	if ((!IsSet($_POST['bankNameTxt']) || $_POST['bankNameTxt'] == "")
	     && (!IsSet($user_details['bank']) || $user_details['bank'] == "")) {
      $errorStat .= "<br/>- Bank";
      $approved[22] = false;
    } else {
      $approved[22] = true;
    }
	if (!IsSet($_POST['hectarageTxt']) || $_POST['hectarageTxt'] == "") {
      $errorStat .= "<br/>- Hectarage";
      $approved[23] = false;
    } else {
      $approved[23] = true;
    }
	if (!IsSet($_POST['costPerHectareTxt']) || $_POST['costPerHectareTxt'] == "") {
      $errorStat .= "<br/>- Cost Per Hectare";
      $approved[24] = false;
    } else {
      $approved[24] = true;
    }
	if (!IsSet($_POST['loanAmountTxt']) || $_POST['loanAmountTxt'] == "") {
      $errorStat .= "<br/>- Loan Amount";
      $approved[25] = false;
    } else {
      $approved[25] = true;
    }
	if (!IsSet($_POST['isOriginalOwner']) || $_POST['isOriginalOwner'] == "") {
      $errorStat .= "<br/>- Are you the Original Owner?";
      $approved[26] = false;
    } else {
      $approved[26] = true;
    }
	if (IsSet($_POST['isOriginalOwner']) && $_POST['isOriginalOwner'] == "No") {   
	  if ((!IsSet($_POST['nameOrigOwnerTxt']) || $_POST['nameOrigOwnerTxt'] == "") ||
	      (!IsSet($_POST['bvnOrigOwnerTxt']) || $_POST['bvnOrigOwnerTxt'] == "") ||
          (!IsSet($_POST['telOrigOwnerTxt']) || $_POST['telOrigOwnerTxt'] == "")) {
          $approved[26] = false;
        } else {
        $approved[26] = true;
        }
		if (!IsSet($_POST['nameOrigOwnerTxt']) || $_POST['nameOrigOwnerTxt'] == "") {
		  $errorStat .= "<br/>- Name of Original Owner";
        } else {
        }
		if (!IsSet($_POST['bvnOrigOwnerTxt']) || $_POST['bvnOrigOwnerTxt'] == "") {
		  $errorStat .= "<br/>- BVN of Original Owner";
        } else {
        }
		if (!IsSet($_POST['telOrigOwnerTxt']) || $_POST['telOrigOwnerTxt'] == "") {
		  $errorStat .= "<br/>- Telephone Number of Original Owner";
        } else {
        }
	}
	if (!IsSet($_POST['isLandRegistered']) || $_POST['isLandRegistered'] == "") {
      $errorStat .= "<br/>- Is Land Registered?";
      $approved[27] = false;
    } else {
      $approved[27] = true;
    }
	if (!IsSet($_POST['landAuthority']) || $_POST['landAuthority'] == "") {
      $errorStat .= "<br/>- Land Authority";
      $approved[28] = false;
    } else {
      $approved[28] = true;
    }
	if ((!file_exists("_members/$username$user_id/loan/passport/pic01.png") &&
	    !file_exists("_members/$username$user_id/loan/passport/pic01.jpg") &&
		!file_exists("_members/$username$user_id/loan/passport/pic01.gif")) ||
		(!file_exists("_members/$username$user_id/loan/thumb_sign/pic01.png") &&
	    !file_exists("_members/$username$user_id/loan/thumb_sign/pic01.jpg") &&
		!file_exists("_members/$username$user_id/loan/thumb_sign/pic01.gif"))) {
		  $errorStat .= "<br/>"; 
		}
		
    if (!file_exists("_members/$username$user_id/loan/passport/pic01.png") &&
	    !file_exists("_members/$username$user_id/loan/passport/pic01.jpg") &&
		!file_exists("_members/$username$user_id/loan/passport/pic01.gif")) {
	  $errorStat .= "<br/>- Please Upload a Passport";
      $approved[29] = false;
	} else {
      $approved[29] = true;
    }
	if (!file_exists("_members/$username$user_id/loan/thumb_sign/pic01.png") &&
	    !file_exists("_members/$username$user_id/loan/thumb_sign/pic01.jpg") &&
		!file_exists("_members/$username$user_id/loan/thumb_sign/pic01.gif")) {
	  $errorStat .= "<br/>- Please Upload a Thumbprint or Signature";
      $approved[30] = false;
	} else {
      $approved[30] = true;
    }
	$approved_bool_1 = $approved[0] && $approved[1] && $approved[2] && $approved[3] && $approved[4] && $approved[5];
	$approved_bool_2 = $approved[6] && $approved[7] && $approved[8] && $approved[9] && $approved[10] && $approved[11];
	$approved_bool_3 = $approved[12] && $approved[13] && $approved[14] && $approved[15] && $approved[16] && $approved[17];
	$approved_bool_4 = $approved[18] && $approved[19] && $approved[20] && $approved[21] && $approved[22] && $approved[23];
	$approved_bool_5 = $approved[24] && $approved[25] && $approved[26] && $approved[27] && $approved[28] && $approved[29] &&
	                  $approved[30];
	
	return ($approved_bool_1 && $approved_bool_2 && $approved_bool_3 && $approved_bool_4 && $approved_bool_5);
}

function createLoanApplication(){	
	if (IsSet($_SESSION['latitudeTxt']) && ($_SESSION['latitudeTxt'] !== "")) {
	  $db_latitudeTxt = $_SESSION['latitudeTxt'];
    }
	if (IsSet($_SESSION['longitudeTxt']) && ($_SESSION['longitudeTxt'] !== "")) {
	  $db_longitudeTxt = $_SESSION['longitudeTxt'];
	}
    if (IsSet($_SESSION['vatNoTxt']) && ($_SESSION['vatNoTxt'] !== "")) {
	  $db_vatNoTxt = $_SESSION['vatNoTxt'];
	}
	if (IsSet($_SESSION['dateRegTxt']) && ($_SESSION['dateRegTxt'] !== "")) {
	  $db_dateRegTxt = $_SESSION['dateRegTxt'];
	}
	if (IsSet($_SESSION['fieldOffIDTxt']) && ($_SESSION['fieldOffIDTxt'] !== "")) {
	  $db_fieldOffIDTxt = $_SESSION['fieldOffIDTxt'];
	}
	if (IsSet($_SESSION['fieldOffNameTxt']) && ($_SESSION['fieldOffNameTxt'] !== "")) {
	  $db_fieldOffNameTxt = $_SESSION['fieldOffNameTxt'];
	}
	if (IsSet($_SESSION['anchorCompTxt']) && ($_SESSION['anchorCompTxt'] !== "")) {
	  $db_anchorCompTxt =  $_SESSION['anchorCompTxt'];	
	}
	if (IsSet($_SESSION['farmtype1'])) {
      $db_farmtype1 = $_SESSION['farmtype1'];
	  switch($db_farmtype1) {
	  case "Crop":
			$db_farmtype1 = "1";
			break;
		case "":
			$db_farmtype1 = "0";
			break;
	  } 
	}		
	if (IsSet($_SESSION['farmtype2'])) {
	  $db_farmtype2 = $_SESSION['farmtype2'];
	  switch($db_farmtype2) {
	  case "Live Stock":
			$db_farmtype2 = "1";
			break;
		case "":
			$db_farmtype2 = "0";
			break;
	  } 
	}
	if (IsSet($_SESSION['farmtype3'])) {
	  $db_farmtype3 = $_SESSION['farmtype3'];
	  switch($db_farmtype3) {
	  case "Other":
			$db_farmtype3 = "1";
			break;
		case "":
			$db_farmtype3 = "0";
			break;
	  }
	}
	if (IsSet($_SESSION['otherFarmTypeTxt']) && ($_SESSION['otherFarmTypeTxt'] !== "")) {
	  $db_otherFarmTypeTxt = $_SESSION['otherFarmTypeTxt'];
	} else {
	  $db_otherFarmTypeTxt = "";	
	}
	if (IsSet($_SESSION['firstNameTxt']) && ($_SESSION['firstNameTxt'] !== "")) {
	  $db_firstNameTxt = $_SESSION['firstNameTxt'];
	}
	if (IsSet($_SESSION['middleNameTxt']) && ($_SESSION['middleNameTxt'] !== "")) {
	  $db_middleNameTxt = $_SESSION['middleNameTxt'];
	} else {
	  $db_middleNameTxt = "";
	}
	if (IsSet($_SESSION['lastNameTxt']) && ($_SESSION['lastNameTxt'] !== "")) {
      $db_lastNameTxt = $_SESSION['lastNameTxt']; 
	}	
	if (IsSet($_SESSION['sexChkBox']) && ($_SESSION['sexChkBox'] !== "")) {
	  $db_sexChkBox = $_SESSION['sexChkBox'];
	  switch($db_sexChkBox) {
	  case "Male":
			$db_sexChkBox = "M";
			break;
		case "Female":
			$db_sexChkBox = "F";
			break;
	  } 
	}	
	if (IsSet($_SESSION['dateBirthTxt']) && ($_SESSION['dateBirthTxt'] !== "")) {
	  $db_dateBirthTxt =  $_SESSION['dateBirthTxt'];
	}
	if (IsSet($_SESSION['maritalStatChkBox']) && ($_SESSION['maritalStatChkBox'] !== "")) {
	  $db_maritalStatChkBox = $_SESSION['maritalStatChkBox'];
	  switch($db_maritalStatChkBox) {
	  case "Single":
			$db_maritalStatChkBox = "N";
			break;
		case "Married":
			$db_maritalStatChkBox = "Y";
			break;
	  }
	}
	if (IsSet($_SESSION['addressTxt']) && ($_SESSION['addressTxt'] !== "")) {
	  $db_addressTxt = $_SESSION['addressTxt'];
	}
	if (IsSet($_SESSION['telNoTxt']) && ($_SESSION['telNoTxt'] !== "")) {
	  $db_telNoTxt = $_SESSION['telNoTxt'];
	}
	if (IsSet($_SESSION['villageTxt']) && ($_SESSION['villageTxt'] !== "")) {
	  $db_villageTxt = $_SESSION['villageTxt'];
	}
	if (IsSet($_SESSION['wardTxt']) && ($_SESSION['wardTxt'] !== "")) {
	  $db_wardTxt = $_SESSION['wardTxt'];
	}
	if (IsSet($_SESSION['districtTxt']) && ($_SESSION['districtTxt'] !== "")) {
	  $db_districtTxt = $_SESSION['districtTxt'];
	}
	if (IsSet($_SESSION['lgaTxt']) && ($_SESSION['lgaTxt'] !== "")) {
	  $db_lgaTxt = $_SESSION['lgaTxt'];
	}
	if (IsSet($_SESSION['stateTxt']) && ($_SESSION['stateTxt'] !== "")) {
      $db_stateTxt = $_SESSION['stateTxt'];
	}		
	if (IsSet($_SESSION['bvnTxt']) && ($_SESSION['bvnTxt'] !== "")) {
	  $db_bvnTxt = $_SESSION['bvnTxt'];
	}
	if (IsSet($_SESSION['acctNoTxt']) && ($_SESSION['acctNoTxt'] !== "")) {
	  $db_acctNoTxt = $_SESSION['acctNoTxt'];
	}
	if (IsSet($_SESSION['bankNameTxt']) && ($_SESSION['bankNameTxt'] !== "")) {
	  $db_bankNameTxt = $_SESSION['bankNameTxt'];
	}
	if (IsSet($_SESSION['hectarageTxt']) && ($_SESSION['hectarageTxt'] !== "")) {
	  $db_hectarageTxt = $_SESSION['hectarageTxt'];
	}
	if (IsSet($_SESSION['costPerHectareTxt']) && ($_SESSION['costPerHectareTxt'] !== "")) {
	  $db_costPerHectareTxt = $_SESSION['costPerHectareTxt'];
	}
	if (IsSet($_SESSION['loanAmountTxt']) && ($_SESSION['loanAmountTxt'] !== "")) {
	  $db_loanAmountTxt = $_SESSION['loanAmountTxt'];
	}
	if (IsSet($_SESSION['isOriginalOwner']) && ($_SESSION['isOriginalOwner'] !== "")) {
	  $db_isOriginalOwner = $_SESSION['isOriginalOwner'];
	      switch($db_isOriginalOwner) {
	 case "Yes":
		    $db_isOriginalOwner = "Y";
			break;
	 case "No":
 		 $db_isOriginalOwner = "N";
		    break;	
	  }
	}
	if (IsSet($_SESSION['isLandRegistered']) && ($_SESSION['isLandRegistered'] !== "")) {
	  $db_isLandRegistered = $_SESSION['isLandRegistered'];
	  switch ($db_isLandRegistered) {
	 case "Yes":
		    $db_isLandRegistered = "Y";
			break;
	case "No":
 		 $db_isLandRegistered = "N";
		    break;	
	  }
	}
	if (IsSet($_SESSION['nameOrigOwnerTxt'])) {
	  $db_nameOrigOwnerTxt = $_SESSION['nameOrigOwnerTxt'];
    }  	
    if (IsSet($_SESSION['bvnOrigOwnerTxt'])) {
	  $db_bvnOrigOwnerTxt = $_SESSION['bvnOrigOwnerTxt'];
	}
	if (IsSet($_SESSION['telOrigOwnerTxt'])) {
	  $db_telOrigOwnerTxt = $_SESSION['telOrigOwnerTxt'];
	}
	if (IsSet($_SESSION['landAuthority']) && ($_SESSION['landAuthority'] !== "")) {
	  $db_landAuthority = $_SESSION['landAuthority'];
	}

	if (IsSet($_SESSION['done1']) && ($_SESSION['done1'] !== "")) {
	  $done1 = $_SESSION['done1'];
	}
	// Prepare user's input for database insertion.
	// $db_latitudeTxt = preg_replace('#[^A-Za-z0-9\']#i', '', $db_latitudeTxt);
	// $db_latitudeTxt = stripslashes($db_latitudeTxt);
	// $db_latitudeTxt = str_replace('`', '', $db_latitudeTxt);

	/* $db_email = preg_replace('#[^A-Za-z0-9@.]#i', '', $db_email);
	$db_email = stripslashes($db_email);
	$db_email = str_replace('`', '', $db_email);
	
	$db_firstname = preg_replace('#[^A-Za-z\']#i', '', $db_firstname);
	$db_firstname = stripslashes($db_firstname);
	$db_firstname = str_replace('`', '', $db_firstname);
	
	$db_lastname = preg_replace('#[^A-Za-z\']#i', '', $db_lastname);
	$db_lastname = stripslashes($db_lastname);
	$db_lastname = str_replace('`', '', $db_lastname);
	
	$db_course = stripslashes($db_course);
	$db_course = str_replace('`', '', $db_course);
	
	$db_faculty = stripslashes($db_faculty);
	$db_faculty = str_replace('`', '', $db_faculty);
	
	$db_school = stripslashes($db_school);
	$db_school = str_replace('`', '', $db_school);
	
	// Don't trust the network.*/	
	
	$db_passed_array2['latitude'] = $db_latitudeTxt;
	$db_passed_array2['longitude'] = $db_longitudeTxt;
	$db_passed_array2['vatNo'] = $db_vatNoTxt;
	$db_passed_array2['dateReg'] = $db_dateRegTxt;
	$db_passed_array2['fieldOffID'] = $db_fieldOffIDTxt;
	$db_passed_array2['fieldOffName'] = $db_fieldOffNameTxt;
	$db_passed_array2['anchorComp'] = $db_anchorCompTxt;
	$db_passed_array2['farmtype1'] = $db_farmtype1;
	$db_passed_array2['farmtype2'] = $db_farmtype2;
	$db_passed_array2['farmtype3'] = $db_farmtype3;
	$db_passed_array2['firstName'] = $db_firstNameTxt;
	$db_passed_array2['middleName'] = $db_middleNameTxt;
	$db_passed_array2['lastName'] = $db_lastNameTxt;
	$db_passed_array2['sex'] = $db_sexChkBox;
	$db_passed_array2['dateOfBirth'] = $db_dateBirthTxt;
	$db_passed_array2['maritalStatus'] = $db_maritalStatChkBox;
	$db_passed_array2['address'] = $db_addressTxt;
	$db_passed_array2['telNo'] = $db_telNoTxt;
	$db_passed_array2['village'] = $db_villageTxt;
	$db_passed_array2['ward'] = $db_wardTxt;
	$db_passed_array2['district'] = $db_districtTxt;
	$db_passed_array2['lga'] = $db_lgaTxt;
	$db_passed_array2['state'] = $db_stateTxt;
	$db_passed_array2['bvn'] = $db_bvnTxt;
	$db_passed_array2['acctNo'] = $db_acctNoTxt;
	$db_passed_array2['bank'] = $db_bankNameTxt;
	$db_passed_array2['hectarage'] = $db_hectarageTxt;
	$db_passed_array2['costPerHectare'] = $db_costPerHectareTxt;
	$db_passed_array2['loanAmount'] = $db_loanAmountTxt;
	$db_passed_array2['isOriginalOwner'] = $db_isOriginalOwner;
	$db_passed_array2['isLandRegistered'] = $db_isLandRegistered;
	$db_passed_array2['nameOrigOwner'] = $db_nameOrigOwnerTxt;
	$db_passed_array2['bvnOrigOwner'] = $db_bvnOrigOwnerTxt;
	$db_passed_array2['telOrigOwner'] = $db_telOrigOwnerTxt;
	$db_passed_array2['landAuthority'] = $db_landAuthority;
	
	
    if (IsSet($done1) && IsSet($db_latitudeTxt)) {
	$loan_obj = new Loan_Application($db_passed_array2);
  if ($loan_obj->create_loan_application()) {
		// $_SESSION['success'] = true;
		if (IsSet($_SESSION['latitudeTxt'])) {
		  unset($_SESSION['latitudeTxt']);
		}
		if (IsSet($_SESSION['longitudeTxt'])) {
		  unset($_SESSION['longitudeTxt']);
		}
		if (IsSet($_SESSION['vatNoTxt'])) {
		  unset($_SESSION['vatNoTxt']);
		}
		if (IsSet($_SESSION['dateRegTxt'])) {
		  unset($_SESSION['dateRegTxt']);
		} 
		if (IsSet($_SESSION['fieldOffIDTxt'])) {
		  unset($_SESSION['fieldOffIDTxt']);
		}
        if (IsSet($_SESSION['fieldOffNameTxt'])) {
		  unset($_SESSION['fieldOffNameTxt']);
		} 		
		 if (IsSet($_SESSION['anchorCompTxt'])) {
		  unset($_SESSION['anchorCompTxt']);
		}
        if (IsSet($_SESSION['farmtype1'])) {
		  unset($_SESSION['farmtype1']);
		}
        if (IsSet($_SESSION['farmtype2'])) {
		  unset($_SESSION['farmtype2']);
		} 		
		 if (IsSet($_SESSION['farmtype3'])) {
		  unset($_SESSION['farmtype3']);
		} 		
		 if (IsSet($_SESSION['otherFarmTypeTxt'])) {
		  unset($_SESSION['otherFarmTypeTxt']);
		} 		
		if (IsSet($_SESSION['firstNameTxt'])) {
		  unset($_SESSION['firstNameTxt']);
		}
         if (IsSet($_SESSION['middleNameTxt'])) {
		  unset($_SESSION['middleNameTxt']);
		} 		
		 if (IsSet($_SESSION['lastNameTxt'])) {
		  unset($_SESSION['lastNameTxt']);
		} 
		if (IsSet($_SESSION['sexChkBox'])) {
		  unset($_SESSION['sexChkBox']);
		} 		
		 if (IsSet($_SESSION['dateBirthTxt'])) {
		  unset($_SESSION['dateBirthTxt']);
		}
        if (IsSet($_SESSION['maritalStatChkBox'])) {
		  unset($_SESSION['maritalStatChkBox']);
		}
        if (IsSet($_SESSION['addressTxt'])) {
		  unset($_SESSION['addressTxt']);
		} 		
		 if (IsSet($_SESSION['telNoTxt'])) {
		  unset($_SESSION['telNoTxt']);
		} 		
		 if (IsSet($_SESSION['villageTxt'])) {
		  unset($_SESSION['villageTxt']);
		} 		
		if (IsSet($_SESSION['wardTxt'])) {
		  unset($_SESSION['wardTxt']);
		}
         if (IsSet($_SESSION['districtTxt'])) {
		  unset($_SESSION['districtTxt']);
		} 		
		 if (IsSet($_SESSION['lgaTxt'])) {
		  unset($_SESSION['lgaTxt']);
		} 
		if (IsSet($_SESSION['stateTxt'])) {
		  unset($_SESSION['stateTxt']);
		}
		if (IsSet($_SESSION['bvnTxt'])) {
		  unset($_SESSION['bvnTxt']);
		}
		if (IsSet($_SESSION['acctNoTxt'])) {
		  unset($_SESSION['acctNoTxt']);
		}
		if (IsSet($_SESSION['bankNameTxt'])) {
		  unset($_SESSION['bankNameTxt']);
		} 
		if (IsSet($_SESSION['hectarageTxt'])) {
		  unset($_SESSION['hectarageTxt']);
		}
        if (IsSet($_SESSION['costPerHectareTxt'])) {
		  unset($_SESSION['costPerHectareTxt']);
		} 		
		 if (IsSet($_SESSION['anchorCompTxt'])) {
		  unset($_SESSION['anchorCompTxt']);
		}
        if (IsSet($_SESSION['loanAmountTxt'])) {
		  unset($_SESSION['loanAmountTxt']);
		}
        if (IsSet($_SESSION['isOriginalOwner'])) {
		  unset($_SESSION['isOriginalOwner']);
		} 		
		 if (IsSet($_SESSION['nameOrigOwnerTxt'])) {
		  unset($_SESSION['nameOrigOwnerTxt']);
		} 		
		 if (IsSet($_SESSION['bvnOrigOwnerTxt'])) {
		  unset($_SESSION['bvnOrigOwnerTxt']);
		} 		
		if (IsSet($_SESSION['telOrigOwnerTxt'])) {
		  unset($_SESSION['telOrigOwnerTxt']);
		}
         if (IsSet($_SESSION['isLandRegistered'])) {
		  unset($_SESSION['isLandRegistered']);
		} 		
		 if (IsSet($_SESSION['landAuthority'])) {
		  unset($_SESSION['landAuthority']);
		} 
        if (IsSet($_SESSION['formHidden'])) {
		  unset($_SESSION['formHidden']);
		}
		if (IsSet($_SESSION['param'])) {
		  unset($_SESSION['param']);
		}
		if (IsSet($_SESSION['done1'])) {
	      unset($_SESSION['done1']);
	    }
		// header('location: register.php');
	} 
	}
}
?>