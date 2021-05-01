<?php  require_once("connection.php");   // Fetch all parameters for the connection.
require_once("./includes/salt.php");
require_once("./includes/activation_pin.php");
date_default_timezone_set('UTC');
 
/*
  We need a class "User" to deal with every possible operation we would want to carry out on a user profile
  We need several functions within this class:

  create_user()
*/
global $message;

class User {
  var $username, $email, $password, $salt, $firstname, $lastname, $sex, $phone_no, $date_of_birth, 
      $home_address, $village, $ward, $district, $lga, $state, $course, $faculty, $school, $selfDescSum, $activ_pin, 
	  $is_admin, $toEmail, $subject, $content, $mailHeaders, $message, $activ_state, $has_visited, $acct_no, $bvn, $bank;

  //function __construct($username, $email, $password, $salt, $firstname, $lastname, $othername, $sex, $phone_no, $date_of_birth, $course, $faculty, $school, $selfDescSum, $activ_pin, $is_admin, $village, $ward, $district, $lga, $state, $home_address) {
function __construct($db_passed_array) {
   $this->username = Isset($db_passed_array['username']) ? $db_passed_array['username'] : "";
   $this->email = Isset($db_passed_array['email']) ? $db_passed_array['email'] : "";
   $this->password  = Isset($db_passed_array['cryptPass']) ? $db_passed_array['cryptPass'] : "";
   $this->salt = Isset($db_passed_array['salt']) ? $db_passed_array['salt'] : "";
   $this->firstname = Isset($db_passed_array['firstname']) ? $db_passed_array['firstname'] : "";
   $this->lastname = Isset($db_passed_array['lastname']) ? $db_passed_array['lastname'] : "";
   $this->othername = Isset($db_passed_array['othername']) ? $db_passed_array['othername'] : "";
   $this->sex = Isset($db_passed_array['sex']) ? $db_passed_array['sex'] : "";
   $this->phone_no = Isset($db_passed_array['phoneNumber']) ? $db_passed_array['phoneNumber'] : "";
   $this->marital_status = Isset($db_passed_array['maritalStatus']) ? $db_passed_array['maritalStatus'] : "";
   $this->dob = Isset($db_passed_array['dob']) ? $db_passed_array['dob'] : "";
   /* $this->course = Isset($course) ? $course : "";
	  $this->faculty = Isset($faculty) ? $faculty : "";
	  $this->school = Isset($school) ? $school : ""; */
   $this->selfDescSum= Isset($db_passed_array['selfDescSum']) ? $db_passed_array['selfDescSum'] : "";
   $this->activ_pin = Isset($db_passed_array['activPin']) ? $db_passed_array['activePin'] : "";
   $this->is_admin = Isset($db_passed_array['isAdmin']) ? $db_passed_array['isAdmin'] : "";
   $this->activ_state = "0";
   $this->has_visited = "0";
   //$this->date_of_birth = $date_of_birth;
   $this->home_address = Isset($db_passed_array['homeAddress']) ? $db_passed_array['homeAddress'] : "";
   $this->village = Isset($db_passed_array['village']) ? $db_passed_array['village'] : ""; 
   $this->ward = Isset($db_passed_array['ward']) ? $db_passed_array['ward'] : "";
   $this->district = Isset($db_passed_array['district']) ? $db_passed_array['district'] : ""; 
   $this->lga = Isset($db_passed_array['lga']) ? $db_passed_array['lga'] : "";
   $this->state = Isset($db_passed_array['state']) ? $db_passed_array['state'] : "";    
   $this->acct_no = Isset($db_passed_array['acctNo']) ? $db_passed_array['acctNo'] : ""; 
   $this->bvn = Isset($db_passed_array['bvn']) ? $db_passed_array['bvn'] : "";
   $this->bank = Isset($db_passed_array['bank']) ? $db_passed_array['bank'] : ""; 
  }
  
  function create_user() {
    global $my_handle;  // Make our database connection handle available.
	   
	  // Ensure all special characters are properly escaped for database insertion.
    $this->username = $my_handle->real_escape_string($this->username);
	  $this->email = $my_handle->real_escape_string($this->email);
	  $this->password = $my_handle->real_escape_string($this->password);
    $this->firstname = $my_handle->real_escape_string($this->firstname);
	  $this->lastname = $my_handle->real_escape_string($this->lastname);
	  $this->othername = $my_handle->real_escape_string($this->lastname);
	  $this->sex = $my_handle->real_escape_string($this->sex);	 
	  $this->phone_no = $my_handle->real_escape_string($this->phone_no);
	  $this->dob = $my_handle->real_escape_string($this->dob);	
	  $this->password = $my_handle->real_escape_string($this->password);
	  $this->salt = $my_handle->real_escape_string($this->salt);
	  $this->is_admin = $my_handle->real_escape_string($this->is_admin);
      $this->activ_pin = $my_handle->real_escape_string($this->activ_pin);
	  //$this->selfDescSum = $my_handle->real_escape_string($this->selfDescSum);
	 
	 $sign_up_date = date('Y-m-d, H:i:s A');
    $sign_up_date = $my_handle->real_escape_string($sign_up_date);
	 $sign_up_ip = $_SERVER['REMOTE_ADDR'];
	 $sign_up_ip = $my_handle->real_escape_string($sign_up_ip);
	 
    // $this->date_of_birth = $my_handle->real_escape_string($this->date_of_birth);
	 /* $search_query = "SELECT * FROM student
		                 WHERE email  = '$this->email'"; */
	 //$result_id = $my_handle->query($search_query);
	 /*if ($result_id->num_rows != 0) {
		 $status['emailComp'] = "That email already exists!";
		 header("location: index.php");
	} else { */
	    
	 // Build Queries
	 $user_query = "INSERT INTO user (username, email_address, password, salt, sign_up_date_UTC, 
	                sign_up_ip, activ_pin, activ_state, has_visited, is_admin, firstname, lastname, sex, phone_no, date_of_birth) 
					VALUES ('$this->username', '$this->email', '$this->password', '$this->salt', '$sign_up_date', 
					'$sign_up_ip', '$this->activ_pin', '$this->activ_state', '$this->has_visited', '$this->is_admin', '$this->firstname', '$this->lastname', '$this->sex', '$this->phone_no', '$this->dob')";
						
	 try { // Error handling
		if (!$user_resultID = $my_handle->query($user_query)) {
			throw new Exception($my_handle->error);
		    die($my_handle->error);
		}
	 /* } catch (Exception $e) {
		$_SESSION['error'] = $e;
		header("location: register.php");
	 } */
	} catch (Exception $e) {
		  $error_time = date('Y-m-d, H:i:s A e');
	      error_log("Time error occured: " . $error_time .
					"\n\n" .$e .
					"\n\nHint to DB Admin: Check and reference the field name(s) in the database tables properly.\n\n--------------------------------------------------------------------------------------------------------------------------\n\n", 3, 'C:\error_logs\error.txt');
	       // header('location: error.php');
	  }
	 
	 $user_id = $my_handle->insert_id;
    
	/* $user_edu_query = "INSERT INTO user_edu_profile (user_id) VALUES ($user_bio_id)";
     $user_edu_resultID = $my_handle->query($user_edu_query) or die($my_handle->error); */
      
	 // $course_query = "SELECT course_id FROM course_of_study WHERE course = '$this->course'";
	 // $course_resultID = $my_handle->query($course_query);
	 // $course_result = $course_resultID->fetch_array();
	 // $course_id = $course_result['course_id'];
	 // var_dump($course_id);
       
	 // $faculty_query = "SELECT faculty_id FROM faculty WHERE faculty.faculty = '$this->faculty'";
	 // $faculty_resultID = $my_handle->query($faculty_query);
	 // $faculty_result = $faculty_resultID->fetch_array();
	 // $faculty_id = $faculty_result['faculty_id'];
	 
	 // $school_query = "SELECT school_id FROM school WHERE school.school = '$this->school'";
	 // $school_resultID = $my_handle->query($school_query);
	 // $school_result = $school_resultID->fetch_array();
	 // $school_id = $school_result['school_id'];
	 
	 // $user_course_query = "INSERT INTO user_course (user_id, course_id) VALUES ($user_bio_id, $course_id)";
	 // $user_faculty_query = "INSERT INTO user_faculty (user_id, faculty_id) VALUES ($user_bio_id, $faculty_id)";
// $user_school_query = "INSERT INTO user_school (user_id, school_id) VALUES ($user_bio_id, $school_id)";
	 // $user_edu_profile_query = "INSERT INTO user_edu_profile (user_id) VALUES ($user_bio_id)";
	 // $user_social_query = "INSERT INTO user_social (user_id) VALUES ($user_bio_id)";
								  
   // $user_course_resultID = $my_handle->query($user_course_query) or die($my_handle->error);
	 // $user_faculty_resultID = $my_handle->query($user_faculty_query);
	 // $user_school_resultID = $my_handle->query($user_school_query);
// $user_edu_profile_resultID = $my_handle->query($user_edu_profile_query);
	// $user_social_resultID = $my_handle->query($user_social_query);
	
	 if ($my_handle->affected_rows && $my_handle->affected_rows == 1) {
	   //$this->clear_values(); 
	   if (!file_exists("../_members/{$this->username}". "$user_id")) {
	     mkdir("./_members/{$this->username}". "$user_id", 0777);
	   }
		 if (!file_exists("../_members/{$this->username}". "$user_id" . "/profile_pics")) {
	     mkdir("./_members/{$this->username}". "$user_id" . "/profile_pics", 0777);
	   }
		  if (!file_exists("_members/{$this->username}". "$user_id" . "/albums")) {
	     mkdir("./_members/{$this->username}". "$user_id" . "/albums", 0777);
	   }
	    if (!file_exists("_members/{$this->username}". "$user_id" . "/loan")) {
	     mkdir("./_members/{$this->username}". "$user_id" . "/loan", 0777);
	   }
	   if (!file_exists("_members/{$this->username}". "$user_id" . "/loan")) {
	     mkdir("./_members/{$this->username}". "$user_id" . "/loan", 0777);
	   }
	   if (!file_exists("_members/{$this->username}". "$user_id" . "/loan/passport")) {
	     mkdir("./_members/{$this->username}". "$user_id" . "/loan/passport", 0777);
	   }
	    if (!file_exists("_members/{$this->username}". "$user_id" . "/loan/thumb_sign")) {
	     mkdir("./_members/{$this->username}". "$user_id" . "/loan/thumb_sign", 0777);
	   }
    }
	 return (IsSet($user_resultID));
  }
  
	function update_user() {
	  global $my_handle;
    global $user_id;
     
    if (($this->firstname !== '') && ($this->lastname !== '')) {
	  $user_update_query = "UPDATE user SET firstname = '$this->firstname', 
	                                            lastname = '$this->lastname', 
												othername = '$this->othername',
                                                phone_no = '$this->phone_no',
                                                date_of_birth = '$this->dob',
                                                marital_status = '$this->marital_status'
												WHERE user_id = $user_id";
												
	 $user_update_resultID = $my_handle->query($user_update_query);
      return (IsSet($user_update_resultID));										
    }
  }
    
    function update_user_2() {
	  global $my_handle;
      global $user_id;
		
	  $user_update_query = "UPDATE user SET village = '$this->village',
											ward = '$this->ward', 
	                                        district = '$this->district', 
											lga = '$this->lga', 
	                                        state = '$this->state',
	                                        home_address = '$this->home_address'
											WHERE user_id = $user_id";

	  $user_update_resultID = $my_handle->query($user_update_query);
      return (IsSet($user_update_resultID));
    }
	
	function update_user_3() {
	  global $my_handle;
	  global $user_id;
	  $user_update_query = "UPDATE user SET acct_no = '$this->acct_no', 
	                                        bvn = '$this->bvn',
                                            bank = '$this->bank'
											WHERE user_id = $user_id";
	  $user_update_resultID = $my_handle->query($user_update_query);
      return (IsSet($user_update_resultID));
    }
}

class Loan_Application {
  var $latitude, $longitude, $vatno, $datereg, $fieldOffID, $fieldOffName, $anchorComp, $farmtype1, 
      $farmtype2, $farmtype3, $otherFarmTypeTxt, $firstName, $middleName, $lastName, $sex, $dateBirth,
	  $maritalStatus, $address, $telephone, $village, $ward, $district, $lga, $state, 
	  $bvn, $acctNo, $bank, $hectarage, $costPerHectare, $loanAmount, 
	  $isOriginalOwner, $isLandRegistered, $nameOrigOwner, $bvnOrigOwner, 
	  $telOrigOwnerTxty, $landAuthority;

  function __construct($db_passed_array2) {
    $this->latitude = Isset($db_passed_array2['latitude']) ? $db_passed_array2['latitude'] : "";
    $this->longitude = Isset($db_passed_array2['longitude']) ? $db_passed_array2['longitude'] : "";
	$this->vatno  = Isset($db_passed_array2['vatNo']) ? $db_passed_array2['vatNo'] : "";
	$this->datereg = Isset($db_passed_array2['dateReg']) ? $db_passed_array2['dateReg'] : "";
	$this->fieldOffID = Isset($db_passed_array2['fieldOffID']) ? $db_passed_array2['fieldOffID'] : "";
	$this->fieldOffName = Isset($db_passed_array2['fieldOffName']) ? $db_passed_array2['fieldOffName'] : "";
	$this->anchorComp = Isset($db_passed_array2['anchorComp']) ? $db_passed_array2['anchorComp'] : "";
    $this->farmtype1 = Isset($db_passed_array2['farmtype1']) ? $db_passed_array2['farmtype1'] : "";
    $this->farmtype2 = Isset($db_passed_array2['farmtype2']) ? $db_passed_array2['farmtype2'] : "";
	$this->farmtype3  = Isset($db_passed_array2['farmtype3']) ? $db_passed_array2['farmtype3'] : "";
	$this->otherFarmTypeTxt = Isset($otherFarmTypeTxt) ? $otherFarmTypeTxt : "";
	$this->firstName = Isset($db_passed_array2['firstName']) ? $db_passed_array2['firstName'] : "";
	$this->middleName = Isset($db_passed_array2['middleName']) ? $db_passed_array2['middleName'] : "";
	$this->lastName = Isset($db_passed_array2['lastName']) ? $db_passed_array2['lastName'] : "";
    $this->sex = Isset($db_passed_array2['sex']) ? $db_passed_array2['sex'] : "";
	 $this->dateBirth = Isset($db_passed_array2['dateOfBirth']) ? $db_passed_array2['dateOfBirth'] : "";
    $this->maritalStatus = Isset($db_passed_array2['maritalStatus']) ? $db_passed_array2['latitude'] : "";
	  $this->address = Isset($db_passed_array2['address']) ? $db_passed_array2['address'] : "";
		$this->telephone = Isset($db_passed_array2['telNo']) ? $db_passed_array2['telNo'] : "";
		$this->village = Isset($db_passed_array2['village']) ? $db_passed_array2['village'] : "";
	  $this->ward = Isset($db_passed_array2['ward']) ? $db_passed_array2['ward'] : "";
	  $this->district = Isset($db_passed_array2['district']) ? $db_passed_array2['district'] : "";
	  $this->lga = Isset($db_passed_array2['lga']) ? $db_passed_array2['latitude'] : "";
	  $this->state = Isset($db_passed_array2['state']) ? $db_passed_array2['state'] : "";
	  $this->bvn =  Isset($db_passed_array2['bvn']) ? $db_passed_array2['bvn'] : "";
	  $this->acctNo =  Isset($db_passed_array2['acctNo']) ? $db_passed_array2['acctNo'] : "";
	  $this->bank =  Isset($db_passed_array2['bank']) ? $db_passed_array2['bank'] : "";
	   $this->hectarage =  Isset($db_passed_array2['hectarage']) ? $db_passed_array2['hectarage'] : "";
	  $this->costPerHectare = Isset($db_passed_array2['costPerHectare']) ? $db_passed_array2['costPerHectare'] : "";
	  $this->loanAmount = Isset($db_passed_array2['loanAmount']) ? $db_passed_array2['loanAmount'] : "";
	  $this->isOriginalOwner = Isset($db_passed_array2['isOriginalOwner']) ? $db_passed_array2['isOriginalOwner'] : "";
	  $this->isLandRegistered = Isset($db_passed_array2['isLandRegistered']) ? $db_passed_array2['isLandRegistered'] : "";
	  $this->nameOrigOwner = Isset($db_passed_array2['nameOrigOwner']) ? $db_passed_array2['nameOrigOwner'] : "";
	  $this->bvnOrigOwner = Isset($db_passed_array2['bvnOrigOwner']) ? $db_passed_array2['bvnOrigOwner'] : ""; 
	  $this->telOrigOwner = Isset($db_passed_array2['telOrigOwner']) ? $db_passed_array2['telOrigOwner'] : "";
	  $this->landAuthority = Isset($db_passed_array2['landAuthority']) ? $db_passed_array2['landAuthority'] : "";
  }
  
  function create_loan_application() {
    global $my_handle;  // Make our database connection handle available.
	global $username;
    global $user_id;
	   
	  // Ensure all special characters are properly escaped for database insertion.
    $this->latitude = $my_handle->real_escape_string($this->latitude);
	  $this->longitude = $my_handle->real_escape_string($this->longitude);
	  $this->vatno = $my_handle->real_escape_string($this->vatno);
    $this->datereg = $my_handle->real_escape_string($this->datereg);
	  $this->fieldOffID = $my_handle->real_escape_string($this->fieldOffID);
	  $this->fieldOffName = $my_handle->real_escape_string($this->fieldOffName);
	  $this->anchorComp = $my_handle->real_escape_string($this->anchorComp);
	  
	   $this->otherFarmTypeTxt = $my_handle->real_escape_string($this->otherFarmTypeTxt);
	  $this->firstName = $my_handle->real_escape_string($this->firstName);
	  $this->middleName = $my_handle->real_escape_string($this->middleName);
    $this->lastName = $my_handle->real_escape_string($this->lastName);
	  $this->sex = $my_handle->real_escape_string($this->sex);
	  $this->address = $my_handle->real_escape_string($this->address);
	  $this->telephone = $my_handle->real_escape_string($this->telephone);
	  
	   $this->village = $my_handle->real_escape_string($this->village);
	  $this->ward = $my_handle->real_escape_string($this->ward);
	  $this->district = $my_handle->real_escape_string($this->district);
    $this->lga = $my_handle->real_escape_string($this->lga);
	  $this->state = $my_handle->real_escape_string($this->state);
	  
	  $this->bvn = $my_handle->real_escape_string($this->bvn);
	  $this->acctNo = $my_handle->real_escape_string($this->acctNo);
	   $this->bank = $my_handle->real_escape_string($this->bank);
	   
	  $this->hectarage = $my_handle->real_escape_string($this->hectarage);
	  $this->costPerHectare = $my_handle->real_escape_string($this->costPerHectare);
    $this->loanAmount = $my_handle->real_escape_string($this->loanAmount);
	
	  $this->nameOrigOwner = $my_handle->real_escape_string($this->nameOrigOwner);
	  $this->bvnOrigOwner = $my_handle->real_escape_string($this->bvnOrigOwner);
	  $this->telOrigOwner = $my_handle->real_escape_string($this->telOrigOwner);
	  
	 
	/* $sign_up_date = date('Y-m-d, H:i:s A');
    $sign_up_date = $my_handle->real_escape_string($sign_up_date); */
	 
    // $this->date_of_birth = $my_handle->real_escape_string($this->date_of_birth);
	 /* $search_query = "SELECT * FROM student
		                 WHERE email  = '$this->email'"; */
	 //$result_id = $my_handle->query($search_query);
	 /*if ($result_id->num_rows != 0) {
		 $status['emailComp'] = "That email already exists!";
		 header("location: index.php");
	} else { */
	    
	 // Build Queries
	 $loan_query = "INSERT INTO loan (user_id, latitude, longitude, vat_no, field_officer_id, field_officer_name, anchor_company, entry_date, 
	                crop, livestock, other, other_text, firstname, middlename, lastname, sex, date_of_birth, 
					marital_status, address, tel_no, village, ward, district, lga, state, bvn, acct_no, bank, 
					hectarage, cost_per_hectare, loan_amount, is_land_registered, bvn_orig_owner, name_orig_owner, 
					is_land_owner, tel_no_orig_owner, land_authority)
                   VALUES ($user_id, '$this->latitude', '$this->longitude', '$this->vatno', '$this->fieldOffID', '$this->fieldOffName', '$this->anchorComp', '$this->datereg', 
				           '$this->farmtype1', '$this->farmtype2', '$this->farmtype3', '$this->otherFarmTypeTxt', '$this->firstName', 
					       '$this->middleName', '$this->lastName', '$this->sex', '$this->dateBirth','$this->maritalStatus', 
						   '$this->address', '$this->telephone', '$this->village', '$this->ward', '$this->district', '$this->lga', '$this->state', 
						   '$this->bvn', '$this->acctNo', '$this->bank', '$this->hectarage', '$this->costPerHectare', 
					       '$this->loanAmount', '$this->isLandRegistered', '$this->bvnOrigOwner', '$this->nameOrigOwner', 
						   '$this->isOriginalOwner', '$this->telOrigOwner', '$this->landAuthority')";
						
	 try { // Error handling
		if (!$loan_resultID = $my_handle->query($loan_query)) {
			throw new Exception($my_handle->error);
		    // die($my_handle->error);
		} else {
		   $loan_id = $my_handle->insert_id;
		   if (file_exists("_members/" . $username . $user_id . "/loan/passport/pic01.jpg")) {
	         rename("./_members/" . $username . $user_id . "/loan/passport/pic01.jpg", 
			        "./_members/" . $username . $user_id . "/loan/passport/" . "passport" . $loan_id . ".jpg");
	       }
           if (file_exists("_members/" . $username . $user_id . "/loan/passport/pic01.png")) {
	         rename("./_members/" . $username . $user_id . "/loan/passport/pic01.png", 
			        "./_members/" . $username . $user_id . "/loan/passport/" . "passport" . $loan_id . ".png");
	       }
           if (file_exists("_members/" . $username . $user_id . "/loan/passport/pic01.gif")) {
	         rename("./_members/" . $username . $user_id . "/loan/passport/pic01.gif", 
			        "./_members/" . $username . $user_id . "/loan/passport/" . "passport" . $loan_id . ".gif");
	       }	
            if (file_exists("_members/" . $username . $user_id . "/loan/thumb_sign/pic01.jpg")) {
	         rename("./_members/" . $username . $user_id . "/loan/thumb_sign/pic01.jpg", 
			        "./_members/" . $username . $user_id . "/loan/thumb_sign/" . "thumb_sign" . $loan_id . ".jpg");
	       }
           if (file_exists("_members/" . $username . $user_id . "/loan/thumb_sign/pic01.png")) {
	         rename("./_members/" . $username . $user_id . "/loan/thumb_sign/pic01.png", 
			        "./_members/" . $username . $user_id . "/loan/thumb_sign/" . "thumb_sign" . $loan_id . ".png");
	       }
           if (file_exists("_members/" . $username . $user_id . "/loan/thumb_sign/pic01.gif")) {
	         rename("./_members/" . $username . $user_id . "/loan/thumb_sign/pic01.gif", 
			        "./_members/" . $username . $user_id . "/loan/thumb_sign/" . "thumb_sign" . $loan_id . ".gif");
	       }		   
		   
		}
	 } catch (Exception $e) {
		$_SESSION['error'] = $e;
		/* header("location: register.php"); */
	 }
	 
	$loan_id = $my_handle->insert_id;
	
	 return (IsSet($loan_resultID));
      
    /* if (Isset($this->activ_pin)) {
      $actual_link = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . "activate.php?activ_pin=" . $this->activ_pin;
      $this->toEmail = $this->email;
      $this->subject = "SchoolBoss Registration Activation Email";
      $this->content = "Click this link to activation your account. <a href = '" . $actual_link . "'>" . $actual_link . "</a>";
      $this->mailHeaders = "From: The SchoolBoss Team\r\n";
      if (mail($this->toEmail, $this->subject, $this->content, $this->mailHeaders)) {
        $_SESSION['messageForPage'] = "You have registered and the activation mail is sent to your email. Click the activation link to activate you account.";
      } else {
         $_SESSION['messageForPage'] = "sorry";
      }
    } else { echo "Isn't set"; } */
  }
  
	/* function update_user() {
	  global $my_handle;
    global $user_id;
     
    if (($this->firstname !== '') && ($this->lastname !== '')) {
	  $user_bio_update_query = "UPDATE user_bio_info SET firstname = '$this->firstname', lastname = '$this->lastname', othername = '$this->othername' WHERE user_id = $user_id";
    }
	  $user_edu_profile_query = "UPDATE user_edu_profile SET desc_summary = '$this->selfDescSum' WHERE user_id = $user_id";
     if (IsSet($user_bio_update_query)) {
	  $user_bio_update_resultID = $my_handle->query($user_bio_update_query);
    $user_edu_profile_resultID = $my_handle->query($user_edu_profile_query) or die($my_handle->error);
     }
		return (IsSet($user_bio_update_resultID) && IsSet($user_edu_profile_resultID));
	}
    
    function update_user_2() {
	  global $my_handle;
      global $user_id;
		
	  $user_bio_update_query = "UPDATE user_bio_info SET home_address = '$this->location' WHERE user_id = $user_id";

	  $user_bio_update_resultID = $my_handle->query($user_bio_update_query);
    return (IsSet($user_bio_update_resultID));
  }
	
	function update_user_3() {
	  global $my_handle;
	  global $user_id;
	  $user_bio_update_query = "UPDATE user_edu_profile SET institution = '$this->school', course = '$this->course' WHERE user_id = $user_id";
	   $user_bio_update_resultID = $my_handle->query($user_bio_update_query);
    return (IsSet($user_bio_update_resultID));
  } */ 
} 

?>