<?php
    // Store user's account details  
  if (IsSet($_POST['createAccount'])) {	
        if (IsSet($_POST['formUsername']) && $_POST['formUsername'] !== "") { 
		  $_SESSION['formUsername'] = strip_tags($_POST['formUsername']);
        }
      
        if (IsSet($_POST['formEmail']) && $_POST['formEmail'] !== "") {
		  $_SESSION['formEmail'] = strip_tags($_POST['formEmail']);
        }
		
		if (IsSet($_POST['formHidden']) && $_POST['formHidden'] !== "") {
		  $_SESSION['formHidden'] = strip_tags($_POST['formHidden']);
        }
      
		if (IsSet($_POST['formUsername']) && $_POST['formUsername'] !== "" &&
			IsSet($_POST['formEmail']) && $_POST['formEmail'] !== "" && 
			IsSet($_POST['formPassword']) && $_POST['formPassword'] !== "") {
			
		  // $_SESSION['formUsername'] = strip_tags($_POST['formUsername']);
		  // $_SESSION['formEmail'] = strip_tags($_POST['formEmail']);
		  
		  /* Secure password */
		  $local_pass = strip_tags($_POST['formPassword']);  // Get rid of tags.
		  
		  $p_salt = make_salt();  // Make a salt.
		  $crypt_pass = crypt($local_pass, $p_salt);
          
		  $_SESSION['crypt_pass'] = $crypt_pass;
		  $_SESSION['salt'] = $p_salt;
		  $_SESSION['step1_done'] = true;
	} 
 }
	else if (IsSet($_POST['continueSignUp'])) {
		// Store user's study details
		  unset($_POST['createAccount']);
		if (IsSet($_POST['formFaculty']) && $_POST['formFaculty'] !== "" &&
			IsSet($_POST['formInstitution']) && $_POST['formInstitution'] !== "" && 
			IsSet($_POST['formDepartment']) && $_POST['formDepartment'] !== "") {
		  $_SESSION['formFaculty'] = strip_tags($_POST['formFaculty']);
		  $_SESSION['formInstitution'] = strip_tags($_POST['formInstitution']);
		  $_SESSION['formDepartment'] = strip_tags($_POST['formDepartment']);
		  $_SESSION['step2_done'] = true;
	} 
  } else if (IsSet($_POST['finishSignUp'])) {
		// Store user's details
        
        if (IsSet($_POST['formFirstname']) && $_POST['formFirstname'] !== "") {
		  $_SESSION['formFirstname'] = strip_tags($_POST['formFirstname']);
        } 
        
        if (IsSet($_POST['formLastname']) && $_POST['formLastname'] !== "") {
		  $_SESSION['formLastname'] = strip_tags($_POST['formLastname']);
        } 
        
        if (IsSet($_POST['formDay']) && $_POST['formDay'] !== "") {
          $_SESSION['formDay'] = strip_tags($_POST['formDay']);
        }
        
        if (IsSet($_POST['formMonth']) && $_POST['formMonth'] !== "") {
          $_SESSION['formMonth'] = strip_tags($_POST['formMonth']);
        }
        
        if (IsSet($_POST['formYear']) && $_POST['formYear'] !== "") {
          $_SESSION['formYear'] = strip_tags($_POST['formYear']);
        }
        
        if (IsSet($_POST['formSex']) && $_POST['formSex'] !== "") {
		  $_SESSION['formSex'] = strip_tags($_POST['formSex']);
        }
		
		if (IsSet($_POST['formPhoneNumber']) && $_POST['formPhoneNumber'] !== "") {
		  $_SESSION['formPhoneNumber'] = strip_tags($_POST['formPhoneNumber']);
        }
        
		if (IsSet($_POST['formFirstname']) && $_POST['formFirstname'] !== "" &&
			IsSet($_POST['formLastname']) && $_POST['formLastname'] !== "" && 
			IsSet($_POST['formDay']) && $_POST['formDay'] !== "" &&
			IsSet($_POST['formMonth']) && $_POST['formMonth'] !== "" &&
			IsSet($_POST['formYear']) && $_POST['formYear'] !== "" && 
			IsSet($_POST['formSex']) && $_POST['formSex'] !== "") {
		  $_SESSION['step3_done'] = true;
        }
		  if(IsSet($_SESSION['step1_done']) && $_SESSION['step1_done'] === true && 
             //IsSet($_SESSION['step2_done']) && $_SESSION['step2_done'] === true && 
	         IsSet($_SESSION['step3_done']) && $_SESSION['step3_done'] === true) {
            $activ_pin = make_activ_pin(); // Make the activation pin.
            $_SESSION['activ_pin'] = $activ_pin;
            signUpUser();
		} else {
             // header('location: failure.php');
          }
    }
  // Proceed to sign user up.
?>

<?php include_once("./scripts/sessionJoinLogic.php"); ?>

<!--PHP script to pull items from database, for the number returned from 'num_rows'-->
  <div id = "mainBodyWrapper">
    <div class = "pageDivs" id = "leftDiv">&nbsp;</div>
	
	<div class = "pageDivs" id = "centreDiv">
 <!--<div id = "pageHeader"> 

    
      <div id = "introSplashDiv"></div>
       <!-- <div id = "introParDiv">
    <div id = "emblemDiv">
	    <!--<h2 id = "tradeName"><?php echo COMPANY_NAME; ?> - Sign Up</h2>
	    <p id = "slogan"> The Nigeria Incentive-Based Risk Sharing System For Agricultural Lending<br/>
	    <span>De-Risking Agriculture.</span><span>Facilitating Agribusiness.</span></p>
	  </div>End of emblemDiv  
	  </div>
	  
      </div>-->
	   
	  <?php if (strstr($_SERVER['PHP_SELF'], "about") || strstr($_SERVER['PHP_SELF'], "contact") || strstr($_SERVER['PHP_SELF'], "sign_in")) { ?>
	   <div id = "locRegStat">
	    <div id = "locRegStat3">
	    
	    </div>
		</div>
	  <?php } else if (strstr($_SERVER['PHP_SELF'], "register")) { ?>
	  <div id = "locRegStat">
	    <div id = "locRegStat1" <?php if (!IsSet($_POST['createAccount'])  && !IsSet($_POST['continueSignUp'])){ echo "style = \"background: #f8f8f8;\"";} ?>>
	      <h3>Step One</h3>
		  <span>Your Account Details</span>
	    </div><!--End of locRegStat1-->
		
	    <div id = "locRegStat2" <?php if (IsSet($_POST['continueSignUp']) ){ echo "style = \"background: #f8f8f8;\"";} ?>>
	      <h3>Step Two</h3>
		  <span>Your Biodata</span>
	    </div><!--End of locRegStat3-->
	   </div><!--End of locRegStat-->
	  <?php } ?>
	   