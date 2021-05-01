<?php 
    // Store loan details  
  if(IsSet($_POST['done1']) === true) {
	    $_SESSION['done1'] = "1";
        if (IsSet($_POST['latitudeTxt']) && $_POST['latitudeTxt'] !== "") { 
		  $_SESSION['latitudeTxt'] = strip_tags($_POST['latitudeTxt']);
        }
      
        if (IsSet($_POST['longitudeTxt']) && $_POST['longitudeTxt'] !== "") {
		  $_SESSION['longitudeTxt'] = strip_tags($_POST['longitudeTxt']);
        }
      
		if (IsSet($_POST['vatNoTxt']) && $_POST['vatNoTxt'] !== "") { 
		  $_SESSION['vatNoTxt'] = strip_tags($_POST['vatNoTxt']);
        }
      
        if (IsSet($_POST['dateRegTxt']) && $_POST['dateRegTxt'] !== "") {
		  $_SESSION['dateRegTxt'] = strip_tags($_POST['dateRegTxt']);
        }
        
        if (IsSet($_POST['fieldOffIDTxt']) && $_POST['fieldOffIDTxt'] !== "") { 
		  $_SESSION['fieldOffIDTxt'] = strip_tags($_POST['fieldOffIDTxt']);
        }
      
        if (IsSet($_POST['fieldOffNameTxt']) && $_POST['fieldOffNameTxt'] !== "") {
		  $_SESSION['fieldOffNameTxt'] = strip_tags($_POST['fieldOffNameTxt']);
        }
        
        if (IsSet($_POST['anchorCompTxt']) && $_POST['anchorCompTxt'] !== "") {
		  $_SESSION['anchorCompTxt'] = strip_tags($_POST['anchorCompTxt']);
        }
	
        if (IsSet($_POST['farmtype']) && $_POST['farmtype'] != NULL) { 
		  $farmtype = $_POST['farmtype'];
		  if (IsSet($farmtype[0]) && $farmtype[0] != NULL) {
		  $_SESSION['farmtype1'] = strip_tags($farmtype[0]);
		  } else {
			$_SESSION['farmtype1'] = "";
		  }
		  
		  if (IsSet($farmtype[1]) && $farmtype[1] != NULL) {
		  $_SESSION['farmtype2'] = strip_tags($farmtype[1]);
		  } else {
			$_SESSION['farmtype2'] = "";
		  }
		  
		  if (IsSet($farmtype[2]) && $farmtype[2] != NULL) {
		  $_SESSION['farmtype3'] = strip_tags($farmtype[2]);
		  } else {
			$_SESSION['farmtype3'] = "";
		  }
		  
		  if (IsSet($farmtype[2])) {
			$_SESSION['farmtype3'] = $farmtype[2];
			if (IsSet($_POST['otherFarmTypeTxt']) && $_POST['otherFarmTypeTxt'] !== "") {
			 $_SESSION['otherFarmTypeTxt'] = $_POST['otherFarmTypeTxt'];
			}
		  } else {
			 $_SESSION['otherFarmTypeTxt'] = "";
			}
		}
      
        if (IsSet($_POST['firstNameTxt']) && $_POST['firstNameTxt'] !== "") {
		  $_SESSION['firstNameTxt'] = strip_tags($_POST['firstNameTxt']);
        }
      
		if (IsSet($_POST['middleNameTxt']) && $_POST['middleNameTxt'] !== "") { 
		  $_SESSION['middleNameTxt'] = strip_tags($_POST['middleNameTxt']);
        }
      
        if (IsSet($_POST['lastNameTxt']) && $_POST['lastNameTxt'] !== "") {
		  $_SESSION['lastNameTxt'] = strip_tags($_POST['lastNameTxt']);
        }
        
        if (IsSet($_POST['sexChkBox']) && $_POST['sexChkBox'] !== "") { 
		  $_SESSION['sexChkBox'] = strip_tags($_POST['sexChkBox']);
        }
		
		 if (IsSet($_POST['dateBirthTxt']) && $_POST['dateBirthTxt'] !== "") { 
		  $_SESSION['dateBirthTxt'] = strip_tags($_POST['dateBirthTxt']);
        }
      
        if (IsSet($_POST['maritalStatChkBox']) && $_POST['maritalStatChkBox'] !== "") {
		  $_SESSION['maritalStatChkBox'] = strip_tags($_POST['maritalStatChkBox']);
        }
        
        if (IsSet($_POST['addressTxt']) && $_POST['addressTxt'] !== "") {
		  $_SESSION['addressTxt'] = strip_tags($_POST['addressTxt']);
        }
		
		if (IsSet($_POST['telNoTxt']) && $_POST['telNoTxt'] !== "") { 
		  $_SESSION['telNoTxt'] = strip_tags($_POST['telNoTxt']);
        }
      
        if (IsSet($_POST['villageTxt']) && $_POST['villageTxt'] !== "") {
		  $_SESSION['villageTxt'] = strip_tags($_POST['villageTxt']);
        }
        
        if (IsSet($_POST['wardTxt']) && $_POST['wardTxt'] !== "") { 
		  $_SESSION['wardTxt'] = strip_tags($_POST['wardTxt']);
        }
      
        if (IsSet($_POST['districtTxt']) && $_POST['districtTxt'] !== "") {
		  $_SESSION['districtTxt'] = strip_tags($_POST['districtTxt']);
        }
        
        if (IsSet($_POST['lgaTxt']) && $_POST['lgaTxt'] !== "") {
		  $_SESSION['lgaTxt'] = strip_tags($_POST['lgaTxt']);
        }
		
        if (IsSet($_POST['stateTxt']) && $_POST['stateTxt'] !== "") { 
		  $_SESSION['stateTxt'] = strip_tags($_POST['stateTxt']);
        }
	
		if (IsSet($_POST['bvnTxt']) && $_POST['bvnTxt'] !== "") {
		  $_SESSION['bvnTxt'] = strip_tags($_POST['bvnTxt']);
        }
        
        if (IsSet($_POST['acctNoTxt']) && $_POST['acctNoTxt'] !== "") {
		  $_SESSION['acctNoTxt'] = strip_tags($_POST['acctNoTxt']);
        }
		
        if (IsSet($_POST['bankNameTxt']) && $_POST['bankNameTxt'] !== "") { 
		  $_SESSION['bankNameTxt'] = strip_tags($_POST['bankNameTxt']);
        }
     
		if (IsSet($_POST['hectarageTxt']) && $_POST['hectarageTxt'] !== "") {
		  $_SESSION['hectarageTxt'] = strip_tags($_POST['hectarageTxt']);
        }
        
        if (IsSet($_POST['costPerHectareTxt']) && $_POST['costPerHectareTxt'] !== "") {
		  $_SESSION['costPerHectareTxt'] = strip_tags($_POST['costPerHectareTxt']);
        }
		
        if (IsSet($_POST['loanAmountTxt']) && $_POST['loanAmountTxt'] !== "") { 
		  $_SESSION['loanAmountTxt'] = strip_tags($_POST['loanAmountTxt']);
        }
	 
		if (IsSet($_POST['isOriginalOwner']) && $_POST['isOriginalOwner'] !== "") {
		  $_SESSION['isOriginalOwner'] = strip_tags($_POST['isOriginalOwner']);
        }
		if (IsSet($_POST['isOriginalOwner']) && ($_POST['isOriginalOwner'] == "No")) {
		  $_SESSION['isOriginalOwner'] = strip_tags($_POST['isOriginalOwner']);
			if (IsSet($_POST['nameOrigOwnerTxt']) && $_POST['nameOrigOwnerTxt'] !== "") { 
		     $_SESSION['nameOrigOwnerTxt'] = strip_tags($_POST['nameOrigOwnerTxt']);
            }
			if (IsSet($_POST['bvnOrigOwnerTxt']) && $_POST['bvnOrigOwnerTxt'] !== "") {
		     $_SESSION['bvnOrigOwnerTxt'] = strip_tags($_POST['bvnOrigOwnerTxt']);
            }
			if (IsSet($_POST['telOrigOwnerTxt']) && $_POST['telOrigOwnerTxt'] !== "") {
		     $_SESSION['telOrigOwnerTxt'] = strip_tags($_POST['telOrigOwnerTxt']);
            }
		  } else if (IsSet($_POST['isOriginalOwner']) && ($_POST['isOriginalOwner'] == "Yes")) {
		     $_SESSION['nameOrigOwnerTxt'] = "";
		     $_SESSION['bvnOrigOwnerTxt'] = "";
			 $_SESSION['telOrigOwnerTxt'] = "";
           }
		if (IsSet($_POST['isLandRegistered']) && $_POST['isLandRegistered'] !== "") {
		 $_SESSION['isLandRegistered'] = $_POST['isLandRegistered'];
		}
        if (IsSet($_POST['landAuthority']) && $_POST['landAuthority'] !== "") { 
		  $_SESSION['landAuthority'] = strip_tags($_POST['landAuthority']);
        }
	
		 // $_SESSION['next6'] = "1";
         // createLoanApplication();
		 if (formCreateLoan()) {
		   createLoanApplication();
		 }
	} 	
 // }
/*	else if (IsSet($_POST['continueSignUp'])) {
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
    } */
  // Proceed to sign user up.
?>