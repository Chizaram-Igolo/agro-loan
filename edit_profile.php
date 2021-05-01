<?php include_once ("./includes/header.php"); ?>
<?php  include_once("./includes/checkUserLogged.php"); ?> 
<?php include_once ("./scripts/profileHeaderLogic.php"); ?>
<?php include_once ("./scripts/loadProfileStats.php"); ?>

<?php  
  if (IsSet($_POST['updatePersonal']) && $_POST['updatePersonal'] == "Save Changes") {
    if ((IsSet($_POST['firstname']) && $_POST['firstname'] !== "") &&
	  (IsSet($_POST['lastname']) && $_POST['lastname'] !== "") &&
	  (IsSet($_POST['othername']) &&  $_POST['othername'] !== "") || 
	  (IsSet($_POST['formBirthDate']) &&  $_POST['formBirthDate'] !== "") || 
	  (IsSet($_POST['formMaritalStatus']) &&  $_POST['formMaritalStatus'] !== "") || 
	  (IsSet($_POST['formPhoneNumber']) &&  $_POST['formPhoneNumber'] !== "")) {
    
	updateAccount1();
       echo ("<meta http-equiv='refresh' content='0'>");
  } 
      
  if ((IsSet($_POST['formHomeAddress']) && $_POST['formHomeAddress'] !== null) ||
  (IsSet($_POST['formVillage']) && $_POST['formVillage'] !== "") ||
	  (IsSet($_POST['formWard']) && $_POST['formWard'] !== "") ||
	  (IsSet($_POST['formDistrict']) && $_POST['formDistrict'] !== "") ||
	  (IsSet($_POST['formLGA']) && $_POST['formLGA'] !== "") ||
	  (IsSet($_POST['formState']) && $_POST['formState'] !== "")) {
      updateAccount2();
      echo ("<meta http-equiv='refresh' content='0'>");
	}
	  
	if ((IsSet($_POST['formAcctNo']) && $_POST['formAcctNo'] !== "") ||
		(IsSet($_POST['formBVN']) && $_POST['formBVN'] !== "") || 
		(IsSet($_POST['formBank']) && $_POST['formBank'] !== "")) {
	  updateAccount3();
      echo ("<meta http-equiv='refresh' content='0'>");
	}
	  
	if (IsSet($_FILES["uploadedPic"]) && $_FILES["uploadedPic"]["tmp_name"] !== "") {
	  $fileName = $_FILES["uploadedPic"]["name"];
    $fileTmpLoc = $_FILES["uploadedPic"]["tmp_name"];
    $fileType = $_FILES["uploadedPic"]["type"];
    $fileError = $_FILES["uploadedPic"]["error"];
    $fileSize = $_FILES["uploadedPic"]["size"];
    $fileNameParts = explode(".", $fileName);
		$fileExt = $fileNameParts[1];
			//var_dump(($_FILES["uploadedPic"]));
		if ($fileSize > 3145728) { 
			// If file size is larger than 2 megabyte
	    unlink($fileTmpLoc);  // Remove the uploaded file from the PHP tmp folder
			die("ERROR: Your file was laregr than 5 megabytes in size");
		} 
		else if (!strstr($fileName, "jpg") && !strstr($fileName, "png") && !strstr($fileName, "gif")) {
			// If the file uploaded is not of the required type
			unlink($fileTmpLoc);  // Remove the uploaded file from the PHP tmp folder
		  die("ERROR: Your file was not .gif, .jpg, or .png");
		} 
	  else if ($fileError == 1) {
			die("ERROR: An error occured while processing. Try again.");
		}
		
		if (strstr($fileName, "jpg")) {
		  $fileName = "pic01.jpg";
		} else if (strstr($fileName, "png")) {
		  $fileName = "pic01.png";
		} else if (strstr($fileName, "gif")) {
		  $fileName = "pic01.gif";
		}
		
		$moveResult = move_uploaded_file($fileTmpLoc, "./_members/$username$user_id/profile_pics/temp_$fileName");
		
		if ($moveResult !== true) {
		  unlink($fileTmpLoc);  // Remove the uploaded file from the PHP tmp folder
		  die("ERROR: File not uploaded. Try again.");
		} 
		else {
			// echo "SUCCESS: File uploaded was a success!";
		}
  
  unset($_FILES["uploadedPic"]);
	 
	 $target_file = "./_members/$username$user_id/profile_pics/temp_$fileName";
	 $resized_file = "./_members/$username$user_id/profile_pics/$fileName";
	 $resized_file_mobile = "./_members/$username$user_id/profile_pics/mobile_$fileName";
        
	 $cropped_file = "./_members/$username$user_id/profile_pics/$fileName"; 
	 $cropped_file_mobile = "./_members/$username$user_id/profile_pics/mobile_$fileName"; 
	 $wmax = 200;
	 $hmax = 200;
     /* For smaller displays. */
     $w_mobile_max = 100;
     $h_mobile_max = 100;

	 function img_crop($scaled_pic, $cropped_copy, $ext){
        /* Crop image */ 
          $img = "";
		 if ($ext == "gif" || $ext == "GIF") {
		   $img = imagecreatefromgif($scaled_pic);
           $size = min(imagesx($img), imagesy($img));
           $img2 = imagecrop($img, ['x' => 0, 'y' => 0, 'width' => $size, 'height' => $size]);
           if ($img2 !== FALSE) {
             return(imagegif($img2, $cropped_copy));
           }
		 } else if ($ext == "png" || $ext == "PNG") {
		   $img = imagecreatefrompng($scaled_pic);
           $size = min(imagesx($img), imagesy($img));
           $img2 = imagecrop($img, ['x' => 0, 'y' => 0, 'width' => $size, 'height' => $size]);
           if ($img2 !== FALSE) {
             return(imagepng($img2, $cropped_copy));
           }   
          } else {
		   $img = imagecreatefromjpeg($scaled_pic);
           $size = min(imagesx($img), imagesy($img));
           $img2 = imagecrop($img, ['x' => 0, 'y' => 0, 'width' => $size, 'height' => $size]);
           if ($img2 !== FALSE) {
            return(imagejpeg($img2, $cropped_copy));
           }
         }     
       }
      
      function ak_img_resize($target, $newcopy, $w, $h, $ext) {
       global $username;
       global $user_id;
	   list($w_orig, $h_orig) = getimagesize($target);
		 $scale_ratio = $w_orig/$h_orig;
		 if (($w/$h) > $scale_ratio) {
		   $w = $h * $scale_ratio;
		 } else {
		   $h = $w/$scale_ratio;
		 }
		 $img = "";
		 if ($ext == "gif" || $ext == "GIF") {
		   $img = imagecreatefromgif($target);
           $tci = imagecreatetruecolor($w, $h);
		   imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
		    imagegif($tci, $newcopy, 100);
             if (file_exists("_members/$username$user_id/profile_pics/pic01.png")) {
               unlink("_members/$username$user_id/profile_pics/pic01.png");
             }
              if (file_exists("_members/$username$user_id/profile_pics/mobile_pic01.png")) {
               unlink("_members/$username$user_id/profile_pics/mobile_pic01.png");
             } if (file_exists("_members/$username$user_id/profile_pics/temp_pic01.png")) {
               unlink("_members/$username$user_id/profile_pics/temp_pic01.png");
             }
             
              if (file_exists("_members/$username$user_id/profile_pics/pic01.jpg")) {
               unlink("_members/$username$user_id/profile_pics/pic01.jpg");
             }
              if (file_exists("_members/$username$user_id/profile_pics/mobile_pic01.jpg")) {
               unlink("_members/$username$user_id/profile_pics/mobile_pic01.jpg");
             } if (file_exists("_members/$username$user_id/profile_pics/temp_pic01.jpg")) {
               unlink("_members/$username$user_id/profile_pics/temp_pic01.jpg");
             }
       } else if ($ext == "png" || $ext == "PNG") {
		   $img = imagecreatefrompng($target);
           $tci = imagecreatetruecolor($w, $h);
		   imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
		   imagepng($tci, $newcopy, 9);
              if (file_exists("_members/$username$user_id/profile_pics/pic01.jpg")) {
               unlink("_members/$username$user_id/profile_pics/pic01.jpg");
             }
              if (file_exists("_members/$username$user_id/profile_pics/mobile_pic01.jpg")) {
               unlink("_members/$username$user_id/profile_pics/mobile_pic01.jpg");
             } if (file_exists("_members/$username$user_id/profile_pics/temp_pic01.jpg")) {
               unlink("_members/$username$user_id/profile_pics/temp_pic01.jpg");
             }
              if (file_exists("_members/$username$user_id/profile_pics/pic01.gif")) {
               unlink("_members/$username$user_id/profile_pics/pic01.gif");
             }
              if (file_exists("_members/$username$user_id/profile_pics/mobile_pic01.gif")) {
               unlink("_members/$username$user_id/profile_pics/mobile_pic01.gif");
             } if (file_exists("_members/$username$user_id/profile_pics/temp_pic01.gif")) {
               unlink("_members/$username$user_id/profile_pics/temp_pic01.gif");
             }
		 } else {
		   $img = imagecreatefromjpeg($target);
           $tci = imagecreatetruecolor($w, $h);
		   imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
		   imagejpeg($tci, $newcopy, 100);
              if (file_exists("_members/$username$user_id/profile_pics/pic01.png")) {
               unlink("_members/$username$user_id/profile_pics/pic01.png");
             }
              if (file_exists("_members/$username$user_id/profile_pics/mobile_pic01.png")) {
               unlink("_members/$username$user_id/profile_pics/mobile_pic01.png");
             } if (file_exists("_members/$username$user_id/profile_pics/temp_pic01.png")) {
               unlink("_members/$username$user_id/profile_pics/temp_pic01.png");
             }   
             
        if (file_exists("_members/$username$user_id/profile_pics/pic01.gif")) {
               unlink("_members/$username$user_id/profile_pics/pic01.gif");
             }
              if (file_exists("_members/$username$user_id/profile_pics/mobile_pic01.gif")) {
               unlink("_members/$username$user_id/profile_pics/mobile_pic01.gif");
             } if (file_exists("_members/$username$user_id/profile_pics/temp_pic01.gif")) {
               unlink("_members/$username$user_id/profile_pics/temp_pic01.gif");
             }
		 }
         
	 }
        
    img_crop($target_file, $cropped_file, $fileExt);
    img_crop($target_file, $cropped_file_mobile, $fileExt);
    ak_img_resize($cropped_file, $resized_file, $wmax, $hmax, $fileExt);
    ak_img_resize($cropped_file_mobile, $resized_file_mobile, $w_mobile_max, $h_mobile_max, $fileExt);
        
    echo ("<meta http-equiv='refresh' content='0'>");    
  }
 } 
  /* if (IsSet($_POST['update2']) && $_POST['update2'] == "Save Changes") {
    $department = $_POST['department'];
	$school = $_POST['school'];
	$institution = $_POST['institution'];
    
	if (($department != '') && ($school != '') && ($institution != '')) {
	  updateStudentBio2($department, $school, $institution);
	}
  }
  
  if (IsSet($_POST['update3'])&& $_POST['update3'] == "Update") {
    $educaHistory = $_POST['educaHistory'];
	$skills = $_POST['skills'];
	$summary = $_POST['summary'];
		 
	if (($educaHistory != '') || ($skills != '') || ($summary != '')) {
      updateStudentBio3($educaHistory, $skills, $summary);
    }
  }	 */ 
 
include_once ("./includes/profile_header.php"); ?>
  <div id = "mainBodyWrapper">
    <div id = "mainDiv">
      <div class = "content_div">
        <h3 class = "first_heading" id = "first_heading1">Your Bio <div class = "minimizerSpanBtn" id = "minimizerSpanBtn1">-</span><div class = "msbAnnot" id = "msbAnnot1">Hide This</div></h3>
         <div class = "formDiv" id = "formDiv1"> 
             <form id = "editForm" enctype = "multipart/form-data" class = "edit" style = "z-index: 100;" action = "<?php echo($_SERVER['PHP_SELF']); ?>" method = "POST">  
		    <?php //echo IsSet($status)?$status:''; ?>
			<p style = "font-size: 0.9em; margin-top: 15px;">Your Personal Details</p><br/>
		    <div id = "firstDivision" style = "float: left; width: 60%; border-right: 1px solid #ddd; padding-right: 20px;">
			  <!--<label>First Name:</label>-->
		      <input type = "text" 
                     id = "firstname" 
                     name = "firstname" 
                     placeholder = "First Name" 
                     value = "<?php if (IsSet($user_details['firstname'])) { echo $user_details['firstname']; } ?>"/><br/>
		      <!--<label>Last Name:</label>-->
		      <input type = "text" 
                     id = "lastname" 
                     name = "lastname" 
                     placeholder = "Last Name" 
                     value = "<?php if (IsSet($user_details['firstname'])) { echo $user_details['lastname']; } ?>"/><br/>
		      <!--<label>Other Name:</label>-->
		      <input type = "text" 
                     id = "othername" 
                     name = "othername" 
                     placeholder = "Other Name" 
                     value = "<?php if (IsSet($user_details['othername'])) { echo $user_details['othername']; }?>"/><br/>
			   		   
		      <input type = "date" 
                     id = "birthdate" 
                     name = "formBirthDate"  
                     value = "<?php if (IsSet($user_details['date_of_birth'])) { echo $user_details['date_of_birth']; } ?>"/><br/>
			       
			   <!--Acquire the user's marital status-->
			   <div id = "maritalDiv">
				 <select id = "formMaritalStatus" name = "formMaritalStatus"  style = "width: 100%;"> 
				   <option value = "" selected>Marital Status</option>
				   <?php if ($user_details['marital_status']) { ?>
				   <option value = "<?php if (IsSet($user_details['marital_status'])) 
				    { echo $user_details['marital_status']; }?>" selected = "selected" style = "background: #ee2;">
				<?php echo $user_details['marital_status']; ?></option>
				   <?php } ?>
				   
				   <option value = "Single">Single</option>
				   <option value = "Married">Married</option>
				 </select>
			   </div><!--End of sexDiv-->
			   
			   	 <input type = "tel" 
                     id = "phoneNumber" 
                     name = "formPhoneNumber" 
                     placeholder = "Phone Number" 
                     value = "<?php if (IsSet($user_details['phone_no'])) { echo $user_details['phone_no']; }?>"/><br/>
		  
			   
			  <!--<label>A one line description about yourself:</label>-->
		      <!--<input type = "text" 
                     id = "selfDescSum" 
                     name = "selfDescSum" 
                     maxlength =  "12"
                     placeholder = "Quote e.g Paint the spirit of the bird, not the colour of its feathers" 
                     value = "<?php if (IsSet( $user_edu_profile['desc_summary'])) { echo $user_edu_profile['desc_summary']; }?>"/><br/>
			   -->
                <input type = "file" 
                       id = "picFile" 
                       name = "uploadedPic" 
                       width = "1px" 
                       height = "1px" 
                       style = "display: none"/>         
			</div>
            
            <div id = "secondDivision" style = "float: left; width: 30%;">
              <div id = "imageHolder">
			    <div id = "trademarkDiv" style = "position: relative; width: auto; margin: 0px 34%; height: 60%;" ><span id = "firstBox"></span><span id = "secondBox"></span><span id = "thirdBox"></span><span id = "eye"></span><span id = "wing1"></span><span id = "wing2"></span>
                </div>
                <span id = "uploadButton" style = "">Upload Profile Image</span>
             </div>
             <div id = "imgStatus" style = "width: 94%; height: auto; margin: 0px 4% 0px 15%;"></div>
			 <div id = "instructDiv" style = "position: relative; width: 200px; margin-top: 16px; margin-left: 20px; text-align: center; font-size: 0.9em; line-height: 1.5em;">This will be your cover photo.<br/>Jpeg, png files not larger than 2MB.
             <br/><br/>Click "Save Changes" when you're done.
             </div><!--End of instructDiv-->
                
                 </div><!--End of secondDivision-->
				 
				 
                 <div class = "buttonsDiv">
		       <!--<input type = "reset" id = "reset" name = "update1" value = "Reset"/>-->
		       <input type = "submit" id = "updatePersonal" name = "updatePersonal" value = "Save Changes"/>
		    </div><!--End of buttonsDiv-->
			

                </form> 
				
         </div><!--End of form div.-->
          </div><!--End of content div-->
		  
		          <div class = "content_div" style = " width: 60%;">
        <h3 class = "first_heading" class = "first_heading2">Your Location  <span class = "minimizerSpanBtn" id = "minimizerSpanBtn2">-</span><div class = "msbAnnot" id = "msbAnnot2">Hide This</div></h3>
             <div class = "formDiv" id = "formDiv2"> 
             <form id = "editForm" enctype = "multipart/form-data" class = "edit" style = "z-index: 100;" action = "<?php echo($_SERVER['PHP_SELF']); ?>" method = "POST">  
		    <?php //echo IsSet($status)?$status:''; ?>
			<p style = "font-size: 0.9em; margin-top: 15px;">Your Location</p><br/>
		    <div id = "firstDivision" style = "float: left; width: 60%; padding-right: 20px;">
			  <!--<label>First Name:</label>-->
		      <input type = "text" 
                     id = "home_address" 
                     name = "formHomeAddress" 
                     placeholder = "Address" 
                     style = "padding-left: 0px;"
                     value = "<?php if (IsSet($user_details['home_address'])) { echo $user_details['home_address']; } ?>"/><br/>
			  <input type = "text" 
                     id = "village" 
                     name = "formVillage" 
                     placeholder = "Village" 
                     style = "padding-left: 0px;"
                     value = "<?php if (IsSet($user_details['village'])) { echo $user_details['village']; } ?>"/><br/>
              <input type = "text" 
                     id = "ward" 
                     name = "formWard" 
                     placeholder = "Enter your Ward here" 
                     style = "padding-left: 0px;"
                     value = "<?php if (IsSet($user_details['ward'])) { echo $user_details['ward']; } ?>"/><br/>					 
              <input type = "text" 
                     id = "district" 
                     name = "formDistrict" 
                     placeholder = "Your District" 
                     style = "padding-left: 0px;"
                     value = "<?php if (IsSet($user_details['district'])) { echo $user_details['district']; } ?>"/><br/>  
               <input type = "text" 
                     id = "lga" 
                     name = "formLGA" 
                     placeholder = "Your Local Government Area" 
                     style = "padding-left: 0px;"
                     value = "<?php if (IsSet($user_details['lga'])) { echo $user_details['lga']; } ?>"/><br/>
                <input type = "text" 
                     id = "state" 
                     name = "formState" 
                     placeholder = "Your State" 
                     style = "padding-left: 0px;"
                     value = "<?php if (IsSet($user_details['state'])) { echo $user_details['state']; } ?>"/><br/>					 
				</div>  
            <div id = "secondDivision" style = "float: left; width: 40%; padding-left: 10px;">
              <div class = "buttonsDiv" style = "float: left; position: relative; left: 0px;">
		       <!--<input type = "reset" id = "reset" name = "update1" value = "Reset"/>-->
		       <input type = "submit" id = "updatePersonal" name = "updatePersonal" value = "Save Changes"/>
		    </div><!--End of buttonsDiv-->
                 </div><!--End of secondDivision-->
                 
                </form> 
         </div><!--End of form div.-->
          
        </div> <!--End of content div.-->
		
		  <div class = "content_div">
        <h3 class = "first_heading" id = "first_heading3">Your Financial Details  <div class = "minimizerSpanBtn" id = "minimizerSpanBtn3">-</span><div class = "msbAnnot" id = "msbAnnot3">Hide This</div></h3>
             <div class = "formDiv" id = "formDiv3"> 
             <form id = "editForm3" enctype = "multipart/form-data" class = "edit" style = "z-index: 100;" action = "<?php echo($_SERVER['PHP_SELF']); ?>" method = "POST">  
		    <?php //echo IsSet($status)?$status:''; ?>
			<p style = "font-size: 0.9em; margin-top: 15px;">Please provide details about your Bank here.</p><br/>
		    <div id = "firstDivision" style = "float: left; width: 60%; border-right: 1px solid #ddd; padding-right: 20px;">
			  <!--<label>First Name:</label>-->
		      <input type = "number" 
                     id = "account_no" 
                     name = "formAcctNo" 
					 maxlength =  "10"
                     placeholder = "Account Number (NUBAN)" 
                     value = "<?php if (IsSet($user_details['acct_no'])) { echo $user_details['acct_no']; } ?>"/>
                 <div id = "popups_institution"> </div><br/>
		      <!--<label>Last Name:</label>-->
		      <input type = "number" 
                     id = "bvn" 
                     name = "formBVN" 
					 maxlength =  "10"
                     placeholder = "Bank Verification Details (BVN)" 
                     value = "<?php if (IsSet($user_details['bvn'])) { echo $user_details['bvn']; } ?>"/>
              <div id = "popups"> </div><br/>
		      <!--<label>Other Name:</label>-->
		      <input type = "text" 
                     id = "bank" 
                     name = "formBank" 
                     style = ""
                     placeholder = "Your Bank" 
                     value = "<?php if (IsSet($user_details['bank'])) { echo $user_details['bank']; }?>"/>				
                 <div id = "popups_degree"> </div>
				<br/><!--<span style = "float: left; font-size: 200%; color: #eee; line-height: 28px; padding-bottom: 0px; width: 24px; height: 24px; text-align: center; background: #47a; border-radius: 50%; display: inline-block; margin: -10px 8px;">+</span>-->
		  
			  
                <input type = "file" 
                       id = "picFile" 
                       name = "uploadedPic" 
                       width = "1px" 
                       height = "1px" 
                       style = "display: none"/>         
			</div>
            
            <div id = "secondDivision" style = "float: left; width: 40%; padding-left: 10px;">
<!--<label>First Name:</label>-->
		     <!-- <input type = "text" 
                     id = "firstname" 
                     name = "firstname" 
                     placeholder = "Your skills e.g C++, Outlook" 
                     style = "float: left; width: 80%;"
                     value = "<?php //if (IsSet($user_details['firstname'])) { echo $user_details['firstname']; } ?>"/><span style = "float: left; font-size: 200%; color: #eee; line-height: 28px; padding-bottom: 0px; width: 24px; height: 24px; text-align: center; background: #47a; border-radius: 50%; display: inline-block; margin: 8px 8px 18px 8px;">+</span><br/>
                 --></div><!--End of secondDivision-->
                 <div class = "buttonsDiv">
		       <!--<input type = "reset" id = "reset" name = "update1" value = "Reset"/>-->
		       <input type = "submit" id = "updatePersonal" name = "updatePersonal" value = "Save Changes"/>
		    </div><!--End of buttonsDiv-->
                </form> 
         </div><!--End of form div.-->
          
        </div> <!--End of content div.-->  
		  
		<script type = "text/javascript" src = "./js/edit_profile.js"></script>
<?php include_once("./includes/footer.php"); ?>
</section>
</body>
</html>