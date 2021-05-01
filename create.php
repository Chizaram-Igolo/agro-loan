<?php include_once ("./includes/header.php"); ?>
<?php include_once ("./includes/checkUserLogged.php"); ?>
<?php include_once ("./scripts/profileHeaderLogic.php"); ?>
<?php include_once ("./includes/create_header.php"); ?>

<?php  
  if (IsSet($_GET['param'])) {
    $_SESSION['param'] = $_GET['param'];
  }
?>

<?php  
  if (IsSet($_POST['donePic1']) ||   
      IsSet($_POST['donePic2'])) {
	  
    global $image_dir;
	global $image_arg;
	global $image_uploaded;
	
	function image_process($image_dir, $image_arg, $image_uploaded) { 
	global $username;
	global $user_id;
	
	global $image_dir;
	global $image_arg;
	global $image_uploaded;
	  $fileName = $_FILES["{$image_uploaded}"]["name"];
    $fileTmpLoc = $_FILES["{$image_uploaded}"]["tmp_name"];
    $fileType = $_FILES["{$image_uploaded}"]["type"];
    $fileError = $_FILES["{$image_uploaded}"]["error"];
    $fileSize = $_FILES["{$image_uploaded}"]["size"];
    $fileNameParts = explode(".", $fileName);
		$fileExt = $fileNameParts[1];
			//var_dump(($_FILES["{$image_uploaded}"]));
		if ($fileSize > 3145728) { 
			// If file size is larger than 2 megabyte
	    unlink($fileTmpLoc);  // Remove the uploaded file from the PHP tmp folder
			//die("ERROR: Your file was larger than 5 megabytes in size");
		  echo ("<meta http-equiv='refresh' content='0'>"); 
		  $_SESSION['errorStat'] = "Your file was larger than 5 megabytes in size"; 
		} 
		else if (!strstr($fileName, "jpg") && !strstr($fileName, "png") && !strstr($fileName, "gif")) {
			// If the file uploaded is not of the required type
			unlink($fileTmpLoc);  // Remove the uploaded file from the PHP tmp folder
		  //die("ERROR: Your file was not .gif, .jpg, or .png");
		  echo ("<meta http-equiv='refresh' content='0'>"); 
		  $_SESSION['errorStat'] = "Your file was not .gif, .jpg, or .png"; 
		} 
	  else if ($fileError == 1) {
			// die("ERROR: An error occured while processing. Try again.");
		  echo ("<meta http-equiv='refresh' content='0'>"); 
		  $_SESSION['errorStat'] = "An error occured while processing. Try again."; 
		}
		
		if (strstr($fileName, "jpg") || strstr($fileName, "JPG") || strstr($fileName, "JPEG")) {
		  $fileName = "pic01.jpg";
		} else if (strstr($fileName, "png") || strstr($fileName, "PNG")) {
		  $fileName = "pic01.png";
		} else if (strstr($fileName, "gif") || strstr($fileName, "GIF")) {
		  $fileName = "pic01.gif";
		}
		
		$target_file = "./_members/$username$user_id/{$image_dir}/temp_$fileName";
	 $resized_file = "./_members/$username$user_id/{$image_dir}/$fileName";
	 $resized_file_mobile = "./_members/$username$user_id/{$image_dir}/mobile_$fileName";
        
	 $cropped_file = "./_members/$username$user_id/{$image_dir}/$fileName"; 
	 $cropped_file_mobile = "./_members/$username$user_id/{$image_dir}/mobile_$fileName"; 
	 $wmax = 200;
	 $hmax = 200;
     /* For smaller displays. */
     $w_mobile_max = 100;
     $h_mobile_max = 100;

	 function img_crop($scaled_pic, $cropped_copy, $ext){
		 global $image_dir;
		 global $image_arg;
		 
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
	   
	   global $image_dir;
	   global $image_arg;
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
		 if (file_exists("_members/$username$user_id/{$image_dir}/{$image_arg}01.png")) {
               unlink("_members/$username$user_id/{$image_dir}/{$image_arg}01.png");
             }
              if (file_exists("_members/$username$user_id/{$image_dir}/mobile_{$image_arg}01.png")) {
               unlink("_members/$username$user_id/{$image_dir}/mobile_{$image_arg}01.png");
             } if (file_exists("_members/$username$user_id/{$image_dir}/temp_{$image_arg}01.png")) {
               unlink("_members/$username$user_id/{$image_dir}/temp_{$image_arg}01.png");
             }
             
              if (file_exists("_members/$username$user_id/{$image_dir}/{$image_arg}01.jpg")) {
               unlink("_members/$username$user_id/{$image_dir}/{$image_arg}01.jpg");
             }
              if (file_exists("_members/$username$user_id/{$image_dir}/mobile_{$image_arg}01.jpg")) {
               unlink("_members/$username$user_id/{$image_dir}/mobile{$image_arg}01.jpg");
             } if (file_exists("_members/$username$user_id/{$image_dir}/temp{$image_arg}01.jpg")) {
               unlink("_members/$username$user_id/{$image_dir}/temp{$image_arg}01.jpg");
             }
       } else if ($ext == "png" || $ext == "PNG") {
		   $img = imagecreatefrompng($target);
           $tci = imagecreatetruecolor($w, $h);
		   imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
		   imagepng($tci, $newcopy, 9);
              if (file_exists("_members/$username$user_id/{$image_dir}/{$image_arg}01.jpg")) {
               unlink("_members/$username$user_id/{$image_dir}/{$image_arg}01.jpg");
             }
              if (file_exists("_members/$username$user_id/{$image_dir}/mobile{$image_arg}01.jpg")) {
               unlink("_members/$username$user_id/{$image_dir}/mobile{$image_arg}01.jpg");
             } if (file_exists("_members/$username$user_id/{$image_dir}/temp_{$image_arg}01.jpg")) {
               unlink("_members/$username$user_id/{$image_dir}/temp_{$image_arg}01.jpg");
             }
              if (file_exists("_members/$username$user_id/{$image_dir}/{$image_arg}01.gif")) {
               unlink("_members/$username$user_id/{$image_dir}/{$image_arg}01.gif");
             }
              if (file_exists("_members/$username$user_id/{$image_dir}/mobile_{$image_arg}01.gif")) {
               unlink("_members/$username$user_id/{$image_dir}/mobile_{$image_arg}01.gif");
             } if (file_exists("_members/$username$user_id/{$image_dir}/temp_{$image_arg}01.gif")) {
               unlink("_members/$username$user_id/{$image_dir}/temp_{$image_arg}01.gif");
             }
		 } else {
		   $img = imagecreatefromjpeg($target);
           $tci = imagecreatetruecolor($w, $h);
		   imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
		   imagejpeg($tci, $newcopy, 100);
              if (file_exists("_members/$username$user_id/{$image_dir}/{$image_arg}01.png")) {
               unlink("_members/$username$user_id/{$image_dir}/{$image_arg}01.png");
             }
              if (file_exists("_members/$username$user_id/{$image_dir}/mobile_{$image_arg}01.png")) {
               unlink("_members/$username$user_id/{$image_dir}/mobile_{$image_arg}01.png");
             } if (file_exists("_members/$username$user_id/{$image_dir}/temp_{$image_arg}01.png")) {
               unlink("_members/$username$user_id/{$image_dir}/temp_{$image_arg}01.png");
             }   
             
        if (file_exists("_members/$username$user_id/{$image_dir}/{$image_arg}01.gif")) {
               unlink("_members/$username$user_id/{$image_dir}/{$image_arg}01.gif");
             }
              if (file_exists("_members/$username$user_id/{$image_dir}/mobile_{$image_arg}01.gif")) {
               unlink("_members/$username$user_id/{$image_dir}/mobile_{$image_arg}01.gif");
             } if (file_exists("_members/$username$user_id/{$image_dir}/temp_{$image_arg}01.gif")) {
               unlink("_members/$username$user_id/{$image_dir}/temp_{$image_arg}01.gif");
             }
		 }
         
	 }
		
		$moveResult = move_uploaded_file($fileTmpLoc, "./_members/$username$user_id/{$image_dir}/temp_$fileName");
		
		if ($moveResult !== true) {
		  unlink($fileTmpLoc);  // Remove the uploaded file from the PHP tmp folder
		  die("ERROR: File not uploaded. Try again.");
		} 
		else {
			// echo "SUCCESS: File uploaded was a success!";
		}
  
  unset($_FILES["{$image_uploaded}"]);
	 
	 
        
    img_crop($target_file, $cropped_file, $fileExt);
    img_crop($target_file, $cropped_file_mobile, $fileExt);
    ak_img_resize($cropped_file, $resized_file, $wmax, $hmax, $fileExt);
    ak_img_resize($cropped_file_mobile, $resized_file_mobile, $w_mobile_max, $h_mobile_max, $fileExt);
        
    // echo ("<meta http-equiv='refresh' content='0'>");    
	}
	
	if (IsSet($_FILES["uploadedPic"]) && $_FILES["uploadedPic"]["tmp_name"] !== "") {
		$image_dir = "loan/passport";
		$image_arg = "pic";
		$image_uploaded = "uploadedPic";
		image_process($image_dir, $image_arg, $image_uploaded);
	} else if (IsSet($_FILES["uploadedPic2"]) && $_FILES["uploadedPic2"]["tmp_name"] !== "") {		
		$image_dir = "loan/thumb_sign";
		$image_arg = "pic";
		$image_uploaded = "uploadedPic2";
		image_process($image_dir, $image_arg, $image_uploaded);	
	}
 }
?>

<?php //include_once ("./includes/profile_header.php"); ?>
  <div id = "mainBodyWrapper">
    <?php if (IsSet($_GET['param']) && $_GET['param'] == "apply_loan") { ?>
    <div id = "mainDiv" style = "min-width: 900px;">
           <div class = "content_div">
		    <div class = "tip" id = "errorStat">
				<?php if ((IsSet($errorStat) && $errorStat !== "") || 
				      (IsSet($_SESSION['errorStat']) && $_SESSION['errorStat'] !== "")) { ?>
		      <div class = "error-div-container"><div class = "error-div-anchor"></div><div class = "error-div">
			  <?php 
			    if ((IsSet($errorStat) && $errorStat !== "")) {
			      echo $errorStat;
				} else if (IsSet($_SESSION['errorStat']) && $_SESSION['errorStat'] !== "") {
				  echo $_SESSION['errorStat'];
				  unset($_SESSION['errorStat']);
				}
			 ?>
			</div></div><br/>
		      <?php	} else { ?>
				 
				 <?php } ?>
				</div>  
          <br/>
         <div id = "formDiv"> 
        <form id = "createForm" name = "formCreateLoan" enctype = "multipart/form-data" class = "edit" action = "<?php echo $_SERVER['PHP_SELF']; ?>?param=apply_loan" method = "POST">
			<p></p><br/>
		    		    <div id = "firstDivision">
		      <div class = "header-div">
			  <div class = "logo-div">
			  </div>
			  <div class = "tagline-div">
			   <div class = "first-line">
			     <h2>Enhance Anchor Borrower Programme</h2>
			   </div>
			   <div class = "second-line">
			     <h3>Farmer Registration & Loan Application</h3>
			   </div>
			  </div>
			  </div>
			  
			  <!---->
			  
			        <input type = "file" 
                       id = "picFile" 
                       name = "uploadedPic" 
                       width = "1px" 
                       height = "1px" 
                       style = "display: none"/> 
            <?php
               if (file_exists("./_members/" . $username . $user_id."/loan/passport/pic01.jpg")) { ?>
    <div id = "secondDivision" style = 'position: absolute; top: 30px; right: -10px; width: 130px; height: 130px; border: 0px solid; padding: 0px; background: url("./_members/<?php echo $username . $user_id; ?>/loan/passport/pic01.jpg") 0px 0px/100% 100%;' >
              <div id = "imageHolder" style = "position: relative; width: 140px; height: 10px; padding: 0px; margin: 0px; border: 0px solid;  background: transparent;" >
			    <div id = "trademarkDiv" style = "position: relative; width: auto; margin: 0px 34%; height: 60%; background: transparent;" >
                </div>
               <!-- <span id = "uploadButton" style = "">Sweet</span>-->
             </div>
             <div id = "imgStatus" style = "width: 100%; height: auto; margin: 0px 4% 0px 0%;"></div>
			
                
                 </div>                   
				<?php   }  else if (file_exists("./_members/" . $username . $user_id."/loan/passport/pic01.png")) { ?>
                   <div id = "secondDivision" style = 'position: absolute; top: 30px; right: -10px; width: 130px; height: 130px; border: 0px solid; padding: 0px; background: url("./_members/<?php echo $username . $user_id; ?>/loan/passport/pic01.png") 0px 0px/100% 100%;' >
              <div id = "imageHolder" style = "position: relative; width: 140px; height: 140px; padding: 0px; margin: 0px; border: 0px solid;  background: transparent;" >
			    <div id = "trademarkDiv" style = "position: relative; width: auto; margin: 0px 34%; height: 60%; background: transparent;" >
                </div>
               <!-- <span id = "uploadButton" style = "">Sweet</span>-->
             </div>
             <div id = "imgStatus" style = "width: 100%; height: auto; margin: 0px 4% 0px 0%;"></div>
			
                
                 </div>            
				 <?php } else if (file_exists("./_members/" . $username . $user_id."/loan/passport/pic01.gif")) { ?>
				     <div id = "secondDivision" style = 'position: absolute; top: 30px; right: -10px; width: 130px; height: 130px; border: 0px solid; padding: 0px; background: url("./_members/<?php echo $username . $user_id; ?>/loan/passport/pic01.gif") 0px 0px/100% 100%;' >
              <div id = "imageHolder" style = "position: relative; width: 140px; height: 140px; padding: 0px; margin: 0px; border: 0px solid;  background: transparent;" >
			    <div id = "trademarkDiv" style = "position: relative; width: auto; margin: 0px 34%; height: 60%; background: transparent;" >
                </div>
               <!-- <span id = "uploadButton" style = "">Sweet</span>-->
             </div>
             <div id = "imgStatus" style = "width: 100%; height: auto; margin: 0px 4% 0px 0%;"></div>
			
                
                 </div> 
                  <?php   } else { ?>
					  <div id = "secondDivision" style = "position: absolute; top: 30px; right: -10px; width: auto; padding: 0px;">
              <div id = "imageHolder" style = "position: relative; width: 140px; height: 140px; padding: 0px; margin: 0px;" >
			    <div id = "trademarkDiv" style = "position: relative; width: auto; margin: 0px 34%; height: 60%;" ><span id = "firstBox"></span><span id = "secondBox"></span><span id = "thirdBox"></span><span id = "eye"></span><span id = "wing1" style = "position: relative; top: 3px;"></span><span id = "wing2" style = "position: relative; top: 3px;"></span>
                </div>
                <span id = "uploadButton" style = "">Upload Passport</span>
             </div>
             <div id = "imgStatus" style = "width: 100%; height: auto; margin: 0px 4% 0px 0%;"></div>
			
                
                 </div>
                         <?php   }  ?>
			  <!---->
			  
			  
			  <div class = "clear-float-div"></div>
		      <div id = "div_1">  
		      <p>Farm coordinates</p>
			  <label>LAT.</label>
		      <input type = "number" 
                     id = "latitudeTxt" 
                     name = "latitudeTxt" 
                     placeholder = "e.g 76.77"
                     value = "<?php if (IsSet($_SESSION['latitudeTxt'])) { echo $_SESSION['latitudeTxt']; } ?>"/><br/>  
              <label>LONG.</label>
		      <input type = "number" 
                     id = "longitudeTxt" 
                     name = "longitudeTxt" 
                     placeholder = " e.g 30.2" 
                     value = "<?php if (IsSet($_SESSION['longitudeTxt'])) { echo $_SESSION['longitudeTxt']; } ?>"/><br/>
              
              <label>VAT NO.</label>
		      <input type = "number" 
                     id = "vatNoTxt" 
                     name = "vatNoTxt" 
                     placeholder = " e.g 30.2" 
                     value = "<?php if (IsSet($_SESSION['vatNoTxt'])) { echo $_SESSION['vatNoTxt']; } ?>"/><br/>
               </div>
				
              <div id = "div_2">   

		      <p>&nbsp;</p>						
              <label>Date (dd/mm/yy)</label>
		      <input type = "date" 
                     id = "dateRegTxt" 
                     name = "dateRegTxt"  
                     value = "<?php if (IsSet($_SESSION['dateRegTxt'])) { echo $_SESSION['dateRegTxt']; } ?>"/><br/>
                     
              <label>Field Officer ID</label>
		      <input type = "number" 
                     id = "fieldOffIDTxt" 
                     name = "fieldOffIDTxt" 
                     placeholder = "" 
                     value = "<?php if (IsSet($_SESSION['fieldOffIDTxt'])) { echo $_SESSION['fieldOffIDTxt']; } ?>"/><br/>
                     
              <label>Field Officer's Name</label>
		      <input type = "text" 
                     id = "fieldOffNameTxt" 
                     name = "fieldOffNameTxt" 
                     placeholder = " e.g 30.2" 
                     value = "<?php if (IsSet($_SESSION['fieldOffNameTxt'])) { echo $_SESSION['fieldOffNameTxt']; } ?>"/>
                     
              <label>Anchor/Offtake Company</label>
		      <input type = "text" 
                     id = "anchorCompTxt" 
                     name = "anchorCompTxt" 
                     placeholder = "e.g 30.2" 
                     value = "<?php if (IsSet($_SESSION['anchorCompTxt'])) { echo $_SESSION['anchorCompTxt']; } ?>"/>
              <br/><br/><br/><br/>
		    </div><br/><br/><br/><br/><br/><br/><br/><br/><br/>
			<div id = "div_3">
			<hr/><br/>
		 <p><em>Farm Registration Form</em></p>
		 
		 <p><strong>1. Farmer Profile</strong></p>
		 <hr/><br/>
		 <p>Farmer Type (mark all that apply)</p>
        <label>Crop</label><input type="checkbox" id = "farmtype1" name="farmtype[0]" value="Crop" <?php if (IsSet($_SESSION['farmtype1']) && $_SESSION['farmtype1'] !== "") { echo "checked"; } ?>>
        <label>Live Stock</label><input type="checkbox" id = "farmtype2" name="farmtype[1]" value="Live Stock" <?php if (IsSet($_SESSION['farmtype2']) && $_SESSION['farmtype2'] !== "") { echo "checked"; } ?>>
        <label>Other</label><input type="checkbox" id = "farmtype3" name="farmtype[2]" value="Other" <?php if (IsSet($_SESSION['farmtype3']) && $_SESSION['farmtype3'] !== "") { echo "checked"; } ?>>
	      <input type = "text" 
                     id = "otherFarmTypeTxt" 
                     name = "otherFarmTypeTxt" 
                     placeholder = "Please specify" 
                     value = "<?php if (IsSet($_SESSION['otherFarmTypeTxt'])) { echo $_SESSION['otherFarmTypeTxt']; } ?>"/><br/>
		 </div>
		 <div id = "div_4">
		 <div id = "div_4_1">
						<label>First Name</label>	
          	<input type = "text" 
                     id = "firstNameTxt" 
                     name = "firstNameTxt" 
                     placeholder = ""
                     value = "<?php if (IsSet($user_details['firstname'])) { echo $user_details['firstname']; } else if (IsSet($_SESSION['firstNameTxt'])) { echo $_SESSION['firstNameTxt']; } ?>"/><br/>
		 </div>
		 
		  <div id = "div_4_2">
            <label>Middle Name</label>	
						<input type = "text" 
                     id = "middleNameTxt" 
                     name = "middleNameTxt" 
                     placeholder = "" 
                     value = "<?php if (IsSet($user_details['othername'])) { echo $user_details['othername']; } else if (IsSet($_SESSION['middleNameTxt'])) { echo $_SESSION['middleNameTxt']; } ?>"/><br/>
			</div>

          <div id = "div_4_3">    			
						<label>Surname</label>	
            <input type = "text" 
                     id = "lastNameTxt" 
                     name = "lastNameTxt" 
                     placeholder = "" 
                     value = "<?php if (IsSet($user_details['lastname'])) { echo $user_details['lastname']; } else if (IsSet($_SESSION['lastNameTxt'])) { echo $_SESSION['lastNameTxt']; } ?>"/><br/>
            </div>			
			
			<div id = "div_4_4">
			<label>Gender</label>	
			<div id = "div_4_4_1">	
            <label>Male</label><input type="radio" name="sexChkBox" value="Male" <?php if (IsSet($user_details['sex']) && ($user_details['sex'] == "M")) { echo "checked"; } else if (IsSet($_SESSION['sexChkBox']) && ($_SESSION['sexChkBox'] == "Male")) { echo "checked"; } ?>>
            <label>Female</label><input type="radio" name="sexChkBox" value="Female" <?php if (IsSet($user_details['sex']) && ($user_details['sex'] == "F")) { echo "checked"; } else if (IsSet($_SESSION['sexChkBox']) && ($_SESSION['sexChkBox'] == "Female")) { echo "checked"; } ?>>      
            </div>             
			</div>
			
            <div id = "div_4_5">			
          <label>Date of Birth</label>
		      <input type = "date" 
                     id = "dateBirthTxt" 
                     name = "dateBirthTxt" 
                     placeholder = "" 
                     value = "<?php if (IsSet($user_details['date_of_birth'])) { echo $user_details['date_of_birth']; } else if (IsSet($_SESSION['dateBirthTxt']) && $_SESSION['dateBirthTxt'] !== "") { echo $_SESSION['dateBirthTxt']; } ?>"/><br/>
		   </div>	
		   </div>
          <div id = "div_5">		 
           <div id = "div_5_1">		  
          <label>Marital Status</label>
		   <div id = "div_5_1_1">	
          <label>Single</label><input type="radio" name="maritalStatChkBox" value="Single" <?php if (IsSet($user_details['marital_status']) && ($user_details['marital_status'] == "Single")) { echo "checked"; } else if (IsSet($_SESSION['maritalStatChkBox']) && ($_SESSION['maritalStatChkBox'] == "Single")) { echo "checked"; } ?>>
          <label>Married</label><input type="radio" name="maritalStatChkBox" value="Married" <?php if (IsSet($user_details['marital_status']) && ($user_details['marital_status'] == "Married")) { echo "checked"; }if (IsSet($_SESSION['marital_status']) && ($_SESSION['marital_status'] == "Married")) { echo "checked"; } ?>>
         </div>	
		   </div>
		   
		    <div id = "div_5_2">
            <label>Address</label>
            <input type = "text" 
                     id = "addressTxt" 
                     name = "addressTxt" 
                     placeholder = "" 
                     value = "<?php if (IsSet($user_details['home_address']) && $user_details['home_address'] !== "") { echo $user_details['home_address']; } else if (IsSet($_SESSION['addressTxt'])) { echo $_SESSION['addressTxt']; } ?>"/><br/>
			</div>

            <div id = "div_5_3">			
            <label>Tel No</label>
            <input type = "number" 
                     id = "telNoTxt" 
                     name = "telNoTxt" 
                     placeholder = "" 
                     value = "<?php if (IsSet($user_details['phone_no']) && $user_details['phone_no'] !== "") { echo $user_details['phone_no']; } else if (IsSet($_SESSION['telNoTxt'])) { echo $_SESSION['telNoTxt']; } ?>"/><br/> 
			</div>	
            </div>	
			<div id = "div_6">
			<div id = "div_6_1">
           <label>Village</label>
            <input type = "text" 
                     id = "villageTxt" 
                     name = "villageTxt" 
                     placeholder = "" 
                     value = "<?php if (IsSet($user_details['village']) && $user_details['village'] !== "") { echo $user_details['village']; } else if (IsSet($_SESSION['villageTxt'])) { echo $_SESSION['villageTxt']; } ?>"/>   
             </div>        
			 
			 <div id = "div_6_2">
            <label>Ward</label>
            <input type = "text" 
                     id = "wardTxt" 
                     name = "wardTxt" 
                     placeholder = "" 
                     value = "<?php if (IsSet($user_details['ward']) && $user_details['ward'] !== "") { echo $user_details['ward']; } else if (IsSet($_SESSION['wardTxt']) && $_SESSION['wardTxt'] !== "") { echo $_SESSION['wardTxt']; } ?>"/>   
			</div>

			<div id = "div_6_3">
            <label>District</label>
            <input type = "text" 
                     id = "districtTxt" 
                     name = "districtTxt" 
                     placeholder = "" 
                     value = "<?php if (IsSet($user_details['district']) && $user_details['district'] !== "") { echo $user_details['district']; } else if (IsSet($_SESSION['districtTxt']) && $_SESSION['districtTxt'] !== "") { echo $_SESSION['districtTxt']; } ?>"/> 
            </div>

            <div id = "div_6_4">			
            <label>L.G.A</label>
            <input type = "text" 
                     id = "lgaTxt" 
                     name = "lgaTxt" 
                     placeholder = "" 
                     value = "<?php if (IsSet($user_details['lga']) && $user_details['lga'] !== "") { echo $user_details['lga']; } else if (IsSet($_SESSION['lgaTxt']) && $_SESSION['lgaTxt'] !== "") { echo $_SESSION['lgaTxt']; } ?>"/>
            </div>
			
			<div id = "div_6_5">
            <label>State</label>
            <input type = "text" 
                     id = "stateTxt" 
                     name = "stateTxt" 
                     placeholder = "" 
                     value = "<?php if (IsSet($user_details['state']) && $user_details['state'] !== "") { echo $user_details['state']; } else if (IsSet($_SESSION['stateTxt']) && $_SESSION['stateTxt'] !== "") { echo $_SESSION['stateTxt']; } ?>" /> 
            </div>
            </div><br/><br/><br/><br/><br/><br/><br/><br/><br/>
			
			<hr/><br/>
			<div id = "div_7">
			 <p><strong>2. Financial Details</strong></p>
			 <div id = "div_7_1">
            <label>Bank Verification Number (BVN)</label>
            <input type = "number" 
                     id = "bvnTxt" 
                     name = "bvnTxt" 
                     placeholder = "" 
                     value = "<?php if (IsSet($user_details['bvn']) && $user_details['bvn'] !== "") { echo $user_details['bvn']; } else if (IsSet($_SESSION['bvnTxt']) && $_SESSION['bvnTxt'] !== "") { echo $_SESSION['bvnTxt']; } ?>"/>
            </div>

 			<div id = "div_7_2">
              <label>Account No (Nuban)</label>
            <input type = "number" 
                     id = "acctNoTxt" 
                     name = "acctNoTxt" 
                     placeholder = "" 
                     value = "<?php if (IsSet($user_details['acct_no']) && $user_details['acct_no'] !== "") { echo $user_details['acct_no']; } else if (IsSet($_SESSION['acctNoTxt']) && $_SESSION['acctNoTxt'] !== "") { echo $_SESSION['acctNoTxt']; } ?>"/>
            </div>
			
			<div id = "div_7_3">
                <label>Bank</label>
            <input type = "text" 
                     id = "bankNameTxt" 
                     name = "bankNameTxt" 
                     placeholder = "" 
                     value = "<?php if (IsSet($user_details['bank']) && $user_details['bank'] !== "") { echo $user_details['bank']; } else if (IsSet($_SESSION['bankNameTxt']) && $_SESSION['bankNameTxt'] !== "") { echo $_SESSION['bankNameTxt']; } ?>"/>    
            </div>    
            </div>
			
			<br/><br/><br/><br/>
			
			<hr/><br/>
			<div id = "div_8">
			 <p><strong>3. Production Economics</strong></p>
			 <div id = "div_7_1">
			<label>Hectarage</label>
            <input type = "number" 
                     id = "hectarageTxt" 
                     name = "hectarageTxt" 
                     placeholder = "" 
                     value = "<?php if (IsSet($_SESSION['hectarageTxt']) && $_SESSION['hectarageTxt'] !== "") { echo $_SESSION['hectarageTxt']; } ?>"/> 
                </div>
				
            <div id = "div_8_2">
            <label>Cost Per Hectare</label>
            <input type = "number" 
                     id = "costPerHectareTxt" 
                     name = "costPerHectareTxt" 
                     placeholder = "" 
                     value = "<?php if (IsSet($_SESSION['costPerHectareTxt']) && $_SESSION['costPerHectareTxt'] !== "") { echo $_SESSION['costPerHectareTxt']; } ?>"/>
             </div>
			 
			 <div id = "div_8_3">
            <label>Loan Amount</label>
            <input type = "number" 
                     id = "loanAmountTxt" 
                     name = "loanAmountTxt" 
                     placeholder = "" 
                     value = "<?php if (IsSet($_SESSION['loanAmountTxt']) && ($_SESSION['loanAmountTxt'] !== "") && $_SESSION['loanAmountTxt'] !== "") { echo $_SESSION['loanAmountTxt']; } ?>"/>
            </div><br/><br/>   
            </div>
			<br/><br/>
			
			<hr/><br/>
			<div id = "div_9">
		 <p><strong>4. Land Ownership</strong></p>		 
          <label>Are you the Original Owner?</label>
   
   <div id = "div_9_1">
  <label>Yes</label><input type="radio" id = "isOriginalOwner" name="isOriginalOwner" value="Yes" <?php if (IsSet($_SESSION['isOriginalOwner']) && ($_SESSION['isOriginalOwner'] == "Yes")) { echo "checked"; } ?>>
  <label>No</label><input type="radio" id = "isOriginalOwner2" name="isOriginalOwner" value="No" <?php if (IsSet($_SESSION['isOriginalOwner']) && ($_SESSION['isOriginalOwner'] == "No")) { echo "checked"; } ?>>
  </div>
  <label>Is the Land registered?</label>
  <div id = "div_9_2"> 
              <label>Yes</label><input type="radio" id = "isLandRegistered" name="isLandRegistered" value="Yes" <?php if (IsSet($_SESSION['isLandRegistered']) && ($_SESSION['isLandRegistered'] == "Yes")) { echo "checked"; } ?>>
<label>No</label><input type="radio" id = "isLandRegistered" name="isLandRegistered" value="No" <?php if (IsSet($_SESSION['isLandRegistered']) && ($_SESSION['isLandRegistered'] == "No")) { echo "checked"; } ?>>
           </div>
		   </div>
		
		<div id = "div_10">   
		 <p><strong>5. Original Land Holding</strong></p>
		<div id = "div_10_1">   	
           <label>Name of Original Owner</label>
            <input type = "text" 
                     id = "nameOrigOwnerTxt" 
                     name = "nameOrigOwnerTxt" 
                     placeholder = "" 
                     value = "<?php if (IsSet($_SESSION['nameOrigOwnerTxt'])) { echo $_SESSION['nameOrigOwnerTxt']; } ?>"/> 
					 
		   <br/>
              <label>Land Authority</label>
            <div id = "div_10_1_1">
  <label>STATE</label><input type="radio" name="landAuthority" value="State" <?php if (IsSet($_SESSION['landAuthority']) && ($_SESSION['landAuthority'] == "State")) { echo "checked"; } ?>>
  <label>LGA</label><input type="radio" name="landAuthority" value="LGA" <?php if (IsSet($_SESSION['landAuthority']) && ($_SESSION['landAuthority'] == "LGA")) { echo "checked"; } ?>>
           </div>
		   </div>
		   
		   <div id = "div_10_2">   
           <label>BVN of Original Owner</label>
            <input type = "number" 
                     id = "bvnOrigOwnerTxt" 
                     name = "bvnOrigOwnerTxt" 
                     placeholder = "" 
                     value = "<?php if (IsSet($_SESSION['bvnOrigOwnerTxt'])) { echo $_SESSION['bvnOrigOwnerTxt']; } ?>"/> 
            </div>
			
			<div id = "div_10_3">   
            <label>Tel No of Original Owner</label>
            <input type = "number" 
                     id = "telOrigOwnerTxt" 
                     name = "telOrigOwnerTxt" 
                     placeholder = "" 
                     value = "<?php if (IsSet($_SESSION['telOrigOwnerTxt'])) { echo $_SESSION['telOrigOwnerTxt']; } ?>"/>
            </div>
</div><br/><br/><br/><br/><br/><br/><br/><br/><br/>

			<hr/><br/>
<div id = "div_11">
			 <p><strong>4. Declarations</strong></p>            
                             <p>1. I hereby give consent to NIRSAL Plc to instruct my bank to debit my account and pay the insurance premium, 
                       input suppliers and other service providers through my Bank Account.</p>
                 <p>2. I hereby apply for the facility(ies) detailed herein, and confirm that the information provided herein is 
                       accurate. I also confirm that if, before this application is decided, there is a material change in my/our 
                       circumstances or new information relevant to this application becomes available, I will promptly inform NIRSAL.</p>     
			</div>
			
			 <!---->
			  
			        <input type = "file" 
                       id = "picFile2" 
                       name = "uploadedPic2" 
                       width = "1px" 
                       height = "1px" 
                       style = "display: none"/> 
					   
					  <input type = "submit" 
                       id = "donePic1" 
                       name = "donePic1" 
                       width = "1px" 
                       height = "1px" 
					   value = "donePic1"
                       style = "display: none"/> 
					   
					  <input type = "submit" 
                       id = "donePic2" 
                       name = "donePic2" 
                       width = "1px" 
                       height = "1px" 
					   value = "donePic2"
                       style = "display: none"/>
            <?php
               if (file_exists("./_members/" . $username . $user_id."/loan/thumb_sign/pic01.jpg")) { ?>
    <div id = "secondDivision" style = 'position: relative; top: 30px; left: 40%; width: 130px; height: 130px; border: 0px solid; padding: 0px; background: url("./_members/<?php echo $username . $user_id; ?>/loan/thumb_sign/pic01.jpg") 0px 0px/100% 100%;' >
              <div id = "imageHolder2" style = "position: relative; width: 140px; height: 120px; padding: 0px; margin: 0px; border: 0px solid;  background: transparent;" >
			    <div id = "trademarkDiv" style = "position: relative; width: auto; margin: 0px 34%; height: 60%; background: transparent;" >
                </div>
               <!-- <span id = "uploadButton" style = "">Sweet</span>-->
             </div>
             <div id = "imgStatus2" style = "width: 100%; height: auto; margin: 0px 4% 0px 0%;"></div>
			
                
                 </div>                   
				<?php   }  else if (file_exists("./_members/" . $username . $user_id."/loan/thumb_sign/pic01.png")) { ?>
                   <div id = "secondDivision" style = 'position: relative;top: 30px; left: 40%; margin: 0px auto; width: 130px; height: 130px; border: 0px solid; padding: 0px; background: url("./_members/<?php echo $username . $user_id; ?>/loan/thumb_sign/pic01.png") 0px 0px/100% 100%;' >
              <div id = "imageHolder2" style = "position: relative; width: 140px; height: 120px; padding: 0px; margin: 0px; border: 0px solid;  background: transparent;" >
			    <div id = "trademarkDiv" style = "position: relative; width: auto; margin: 0px 34%; height: 60%; background: transparent;" >
                </div>
               <!-- <span id = "uploadButton" style = "">Sweet</span>-->
             </div>
             <div id = "imgStatus2" style = "width: 100%; height: auto; margin: 0px 4% 0px 0%;"></div>
			
                
                 </div>            
				 <?php } else if (file_exists("./_members/" . $username . $user_id."/loan/thumb_sign/pic01.gif")) { ?>
					          <div id = "secondDivision" style = 'position: relative;top: 30px; left: 40%; margin: 0px auto; width: 130px; height: 130px; border: 0px solid; padding: 0px; background: url("./_members/<?php echo $username . $user_id; ?>/loan/thumb_sign/pic01.gif") 0px 0px/100% 100%;' >
              <div id = "imageHolder2" style = "position: relative; width: 140px; height: 120px; padding: 0px; margin: 0px; border: 0px solid;  background: transparent;" >
			    <div id = "trademarkDiv" style = "position: relative; width: auto; margin: 0px 34%; height: 60%; background: transparent;" >
                </div>
               <!-- <span id = "uploadButton" style = "">Sweet</span>-->
             </div>
             <div id = "imgStatus2" style = "width: 100%; height: auto; margin: 0px 4% 0px 0%;"></div>
			
                
                 </div>    
                    <?php } else { ?>
					  <div id = "secondDivision" style = "position: relative; top: 30px; left: 40%; width: auto; padding: 0px;">
              <div id = "imageHolder2" style = "position: relative; width: 140px; height: 120px; padding: 0px; margin: 0px;" >
			    <div id = "trademarkDiv" style = "position: relative; width: auto; margin: 0px 34%; height: 60%;" ><span id = "firstBox"></span><span id = "secondBox"></span><span id = "thirdBox"></span><span id = "eye"></span><span id = "wing1" style = "position: relative; top: 0px;"></span><span id = "wing2" style = "position: relative; top: 0px;"></span>
                </div>
                <span id = "uploadButton" style = "padding: 20px 4px;">Upload Signature or Thumb Print</span>
             </div>
             <div id = "imgStatus2" style = "width: 100%; height: auto; margin: 0px 4% 0px 0%;"></div>
			
                
                 </div>
                         <?php   }  ?>
			  <!---->
			
<div class = "buttonsDiv">
		       <!--<input type = "reset" id = "reset" name = "update1" value = "Reset"/>-->
		       <input type = "submit" id = "done1" name = "done1" value = "Done"/>
		    </div><!--End of buttonsDiv-->
			
            </div><br/><br/><br/><br/><br/><br/><br/><br/>
			<!--<div class = "buttonsDiv">-->
		       <!--<input type = "reset" id = "reset" name = "update1" value = "Reset"/>-->
		       <!--<input type = "submit" id = "done1" name = "next1" value = "Next"/>
		      </div>-->
         </form>
          </div> 
         </div><!--End of content div-->
          </div><!--End of main-->
        <?php } else { ?>
	    <div id = "mainDiv" style = "min-width: 240px;">
         <div class = "content_div" style="padding-bottom: 40px;">
          <br/>
         <div id = "formDiv"> 
             <form id = "editForm" enctype = "multipart/form-data" class = "edit" style = "z-index: 100;" action = "<?php echo($_SERVER['PHP_SELF']); ?>" method = "POST">  
		               <a href="create.php?param=apply_loan" style = "margin-bottom: 0px;">
									 <div id = "firstDivision" 
									     style = "float: left; width: 100%; margin-bottom: 0px; padding: 0px 30px 0px 0px;">
              <div class = "illusHolder" id = "createIllusHolder"  style = "width: 30%; min-width: 190px; margin: 0px solid;">
			    <div class = "trademarkDiv" id = "trademarkDiv1" style = "position: relative; width: auto; margin: 0px 34%; height: 60%;" >
					<span class = "firstBox"></span>
					<span class = "secondBox"></span>
					<span class = "thirdBox"></span>
					<span class = "eye"></span>
					<span class = "wing1"></span><span class = "wing2"></span>
                </div>
                <span class = "caption" style = "">Request a Loan</span>
             </div>
			 <div class = "createOptions" id = "createOption1" style = "padding: 0px 0px;">Make a Loan Request<br/>
             <br/><br/>
             </div><!--End of instructDiv-->
                </div></a><!--End of firstDivision-->
                </form>
                </div>
                </div>
         </div><!--End of content div-->
          </div><!--End of main-->
             <?php } ?>
      </div>
  </div>
		<script type = "text/javascript" src = "./js/create.js"></script>
<?php include_once("./includes/footer.php"); ?>
</section>
</body>
</html>