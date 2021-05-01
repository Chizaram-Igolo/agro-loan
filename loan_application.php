<?php include_once ("./includes/header.php"); ?>
<?php include_once ("./includes/checkUserLogged.php"); ?>
<?php include_once ("./scripts/profileHeaderLogic.php"); ?>
<?php include_once ("./includes/create_header.php"); ?>

<?php  
  if (IsSet($_GET['param'])) {
    $_SESSION['param'] = $_GET['param'];
  }
  if (IsSet($_GET['a'])) {
    // $_SESSION['param'] = $_GET['param'];
	$a = $_GET['a'];
	$a = $my_handle->real_escape_string($a);
  }
  global $user_id;
?>

<?php //include_once ("./includes/profile_header.php"); ?>
  <div id = "mainBodyWrapper">
  
<?php if (IsSet($a) && $a !== "") { ?>
<?php 
    if ($_SESSION['check_is_admin'] && $_SESSION['check_is_admin'] == "0" ) {
	  $loan_query = "SELECT * FROM loan WHERE loan_id = '$a' && user_id = $user_id";
    } else {
	  $loan_query = "SELECT * FROM loan WHERE loan_id = '$a'";
	}
	$loan_resultID = $my_handle->query($loan_query);
  	
 ?> 
    <div id = "mainDiv" style = "min-width: 900px;">
           <?php if (IsSet($loan_resultID) && is_object($loan_resultID) && $loan_resultID->num_rows !== 0) { 
           $loan = $loan_resultID->fetch_assoc(); 
           $a = $loan['loan_id'];
           $poster_id = $loan['user_id'];
		   $approval_status = $loan['approval_status'];
           $s_user_query = "SELECT * FROM user WHERE user_id = '$poster_id'";
		   $s_user_resultID = $my_handle->query($s_user_query);
		   
		   if (IsSet($s_user_resultID) && is_object($s_user_resultID) && $s_user_resultID->num_rows !== 0) {
		     $s_user = $s_user_resultID->fetch_assoc();
			 $s_username = $s_user['username'];
		   }
		   ?>     
 <div class = "wrap-content-div" style = "min-width: 1000px; overflow: hidden;">
	 
	  <?php if (IsSet($_SESSION['check_is_admin']) &&  ($_SESSION['check_is_admin'] == "1")){ ?>	
	    	  
			 <div class = "pending-approved-status-div" style = "position: fixed; top: 180px; left: -1%;
			  width: 140px; height: auto;
			  overflow; auto; margin: 0px auto; color: #fff; z-index: 100;">
			  
			  <?php if (IsSet($is_flagged) && ($is_flagged == "0")) { ?>
			  <div class = "admin_flag_request_div" id = "admin_flag_request_div<?php echo $a ?>" style = "position: absolute; float: left; width: 100%; color: #fff;  padding: 2px 2px; border-radius: 40px; text-align: center; height: 20px; font-size: .8em; background: #6699da;">
			    Flag this Request
			  </div>
			  <?php } else if (IsSet($is_flagged) && ($is_flagged == "1")) { ?>
			  <div class = "admin_unflg_request_div" id = "admin_unflg_request_div<?php echo $a ?>" style = "position: absolute; float: left; width: 100%; color: #fff;  padding: 2px 2px; border-radius: 40px; text-align: center; height: 20px; font-size: .8em; background: #6699da;">
			    Unflag this Request
			  </div>
			  <?php } else { ?>
			  <div class = "admin_flag_request_div" id = "admin_flag_request_div<?php echo $a ?>" style = "position: absolute; float: left; width: 100%; color: #fff;  padding: 2px 2px; border-radius: 40px; text-align: center; height: 20px; font-size: .8em; background: #6699da;">
			    Flag this Request
			  </div>
			  <?php }?>
			  <!--<div style = "position: absolute; margin-left: 50%; float: left;  padding: 12px 2px; text-align: center; width: 49.25%; height: 40px; font-size: .8em; background: #e13834;">
			    Reject this Loan Request
			  </div>-->
			  </div>
	  <?php } ?>

			  <div class = "pending-approved-status-div" style = "position: fixed; top: 220px; left: -1%;
			  width: 140px; height: auto;
			  overflow; auto; margin: 0px auto; z-index: 100;">
			  <div class = "admin_delete_request_div" id = "admin_delete_request_div<?php echo $a ?>" style = "position: absolute; float: left; color: #fff;  width: 100%; padding: 2px 2px; border-radius: 40px; text-align: center; height: 20px; font-size: .8em; background: #6699da;">
			    Delete this Request
			  </div>
			  <!--<div style = "position: absolute; margin-left: 50%; float: left;  padding: 12px 2px; text-align: center; width: 49.25%; height: 40px; font-size: .8em; background: #e13834;">
			    Reject this Loan Request
			  </div>-->
			  </div>
			  
			  <?php if (IsSet($_SESSION['check_is_admin']) &&  ($_SESSION['check_is_admin'] == "1")){ ?>
			   <div class = "pending-approved-status-div" style = "position: fixed; top: 260px; left: -1%;
			  width: 140px; height: auto;
			  overflow; auto; margin: 0px auto; z-index: 100;">
			   <?php if (IsSet($s_user_is_blocked) && ($s_user_is_blocked == "0")) { ?>
			  <div class = "admin_block_user_div" id = "admin_block_user_div<?php echo $a ?>" style = "position: absolute; float: left; width: 100%; color: #fff; padding: 2px 2px; border-radius: 40px; text-align: center; height: 20px; font-size: .8em; background: #6699da;">
			    Block this User
			  </div>
			   <?php } else if (IsSet($s_user_is_blocked) && ($s_user_is_blocked == 1)) { ?>
			  <div class = "admin_unblk_user_div" id = "admin_unblk_user_div<?php echo $a ?>" style = "position: absolute; float: left; width: 100%; color: #fff; padding: 2px 2px; border-radius: 40px; text-align: center; height: 20px; font-size: .8em; background: #6699da;">
			    Unblock this User
			  </div>
			   <?php } else { ?>
			    <div class = "admin_block_user_div" id = "admin_block_user_div<?php echo $a ?>" style = "position: absolute; float: left; width: 100%; color: #fff; padding: 2px 2px; border-radius: 40px; text-align: center; height: 20px; font-size: .8em; background: #6699da;">
			    Block this User
			  </div>
			   <?php } ?>
			  <!--<div style = "position: absolute; margin-left: 50%; float: left;  padding: 12px 2px; text-align: center; width: 49.25%; height: 40px; font-size: .8em; background: #e13834;">
			    Reject this Loan Request
			  </div>-->
			  </div>
	 <?php } ?>	   
           <div class = "content_div" style = "min-width: 900px; width: 84%;">
          <br/>
         <div id = "formDiv"> 
        <form id = "createForm" enctype = "multipart/form-data" class = "edit" action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST">
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
			 
               if (file_exists("./_members/" . $s_username . $poster_id."/loan/passport/passport" . $a . ".jpg")) { ?>
    <div id = "secondDivision" style = 'position: absolute; top: 30px; right: -10px; width: 130px; height: 130px; border: 0px solid; padding: 0px; background: url("./_members/<?php echo $s_username . $poster_id; ?>/loan/passport/passport<?php echo $a; ?>.jpg") 0px 0px/100% 100%;' >
              <div id = "imageHolder" style = "position: relative; width: 140px; height: 140px; padding: 0px; margin: 0px; border: 0px solid;  background: transparent;" >
			    <div id = "trademarkDiv" style = "position: relative; width: auto; margin: 0px 34%; height: 60%; background: transparent;" >
                </div>
               <!-- <span id = "uploadButton" style = "">Sweet</span>-->
             </div>
             <div id = "imgStatus" style = "width: 100%; height: auto; margin: 0px 4% 0px 0%;"></div>
			
                
                 </div>             
				<?php   }  else if (file_exists("./_members/" . $s_username . $poster_id . "/loan/passport/passport" . $a . ".png")) { ?>
				
                   <div id = "secondDivision" style = 'position: absolute; top: 30px; right: -10px; width: 130px; height: 130px; border: 0px solid; padding: 0px; background: url("./_members/<?php echo $s_username . $poster_id; ?>/loan/passport/passport<?php echo $a; ?>.png") 0px 0px/100% 100%;' >
              <div id = "imageHolder" style = "position: relative; width: 140px; height: 140px; padding: 0px; margin: 0px; border: 0px solid;  background: transparent;" >
			    <div id = "trademarkDiv" style = "position: relative; width: auto; margin: 0px 34%; height: 60%; background: transparent;" >
                </div>
               <!-- <span id = "uploadButton" style = "">Sweet</span>-->
             </div>
             <div id = "imgStatus" style = "width: 100%; height: auto; margin: 0px 4% 0px 0%;"></div>
                 </div>            
				 <?php } else if (file_exists("./_members/" . $s_username . $poster_id . "/loan/passport/passport" . $a . ".gif")) { ?>
					  <div id = "secondDivision" style = 'position: absolute; top: 30px; right: -10px; width: 130px; height: 130px; border: 0px solid; padding: 0px; background: url("./_members/<?php echo $s_username . $poster_id; ?>/loan/passport/passport<?php echo $a; ?>.gif") 0px 0px/100% 100%;' >
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
			    <div id = "trademarkDiv" style = "position: relative; width: auto; margin: 0px 34%; height: 60%;" ><span id = "firstBox"></span><span id = "secondBox"></span><span id = "thirdBox"></span><span id = "eye"></span><span id = "wing1" style = "position: relative; top: 0px;"></span><span id = "wing2" style = "position: relative; top: 0px;"></span>
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
                     value = "<?php echo (IsSet($loan['latitude'])?$loan['latitude']:''); ?>"/><br/>
                     
              <label>LONG.</label>
		      <input type = "number" 
                     id = "longitudeTxt" 
                     name = "longitudeTxt" 
                     placeholder = " e.g 30.2" 
                     value = "<?php echo (IsSet($loan['longitude'])?$loan['longitude']:''); ?>"/><br/>
              
              <label>VAT NO.</label>
		      <input type = "number" 
                     id = "vatNoTxt" 
                     name = "vatNoTxt" 
                     placeholder = " e.g 30.2" 
                     value = "<?php echo (IsSet($loan['vat_no'])?$loan['vat_no']:''); ?>"/><br/>
               </div>
				
              <div id = "div_2">   

		      <p>&nbsp;</p>						
              <label>Date (dd/mm/yy)</label>
		      <input type = "date" 
                     id = "dateRegTxt" 
                     name = "dateRegTxt"  
                     value = "<?php echo (IsSet($loan['entry_date'])?$loan['entry_date']:''); ?>"/><br/>
                     
              <label>Field Officer ID</label>
		      <input type = "number" 
                     id = "fieldOffIDTxt" 
                     name = "fieldOffIDTxt" 
                     placeholder = "" 
                     value = "<?php echo (IsSet($loan['field_officer_id'])?$loan['field_officer_id']:''); ?>"/><br/>
                     
              <label>Field Officer's Name</label>
		      <input type = "text" 
                     id = "fieldOffNameTxt" 
                     name = "fieldOffNameTxt" 
                     placeholder = " e.g 30.2" 
                     value = "<?php echo (IsSet($loan['field_officer_name'])?$loan['field_officer_name']:''); ?>"/>
                     
              <label>Anchor/Offtake Company</label>
		      <input type = "text" 
                     id = "anchorCompTxt" 
                     name = "anchorCompTxt" 
                     placeholder = "e.g 30.2" 
                     value = "<?php echo (IsSet($loan['anchor_company'])?$loan['anchor_company']:''); ?>"/>
              <br/><br/><br/><br/>
		    </div><br/><br/><br/><br/><br/><br/><br/><br/><br/>
			<div id = "div_3">
			<hr/><br/>
		 <p><em>Farm Registration Form</em></p>
		 
		 <p><strong>1. Farmer Profile</strong></p>
		 <hr/><br/>
		 <p>Farmer Type (mark all that apply)</p>
        <label>Crop</label><input type="checkbox" id = "farmtype1" name="farmtype[0]" value="Crop" <?php if (IsSet($loan['crop']) && $loan['crop'] == "1") { echo "checked"; } ?>>
        <label>Live Stock</label><input type="checkbox" id = "farmtype2" name="farmtype[1]" value="Live Stock"  <?php if (IsSet($loan['livestock']) && $loan['livestock'] == "1") { echo "checked"; } ?>>
        <label>Other</label><input type="checkbox" id = "farmtype3" name="farmtype[2]" value="Other"  <?php if (IsSet($loan['other']) && $loan['other'] == "1") { echo "checked"; } ?> >
	      <input type = "text" 
                     id = "otherFarmTypeTxt" 
                     name = "otherFarmTypeTxt" 
                     placeholder = "Please specify" 
                     value = "<?php if (IsSet($loan['other_text']) && ($loan['other_text'] != '')) { echo $loan['other_text']; } ?>"/><br/>
		 </div>
		 <div id = "div_4">
		 <div id = "div_4_1">
						<label>First Name</label>	
          	<input type = "text" 
                     id = "firstNameTxt" 
                     name = "firstNameTxt" 
                     placeholder = ""
                     value = "<?php echo (IsSet($loan['firstname'])?$loan['firstname']:''); ?>"/><br/>
		 </div>
		 
		  <div id = "div_4_2">
            <label>Middle Name</label>	
						<input type = "text" 
                     id = "middleNameTxt" 
                     name = "middleNameTxt" 
                     placeholder = "" 
                     value = "<?php echo (IsSet($loan['middlename'])?$loan['middlename']:''); ?>"/><br/>
			</div>

          <div id = "div_4_3">    			
						<label>Surname</label>	
            <input type = "text" 
                     id = "lastNameTxt" 
                     name = "lastNameTxt" 
                     placeholder = "" 
                     value = "<?php echo (IsSet($loan['lastname'])?$loan['lastname']:''); ?>"/><br/>
            </div>			
			
			<div id = "div_4_4">
			<label>Gender</label>	
			<div id = "div_4_4_1">	
            <label>Male</label><input type="radio" name="sexChkBox" value="Male" <?php if (IsSet($loan['sex']) && $loan['sex'] == "M") { echo "checked"; } ?>>
            <label>Female</label><input type="radio" name="sexChkBox" value="Female" <?php if (IsSet($loan['sex']) && $loan['sex'] == "F") { echo "checked"; } ?>>      
            </div>             
			</div>
			
            <div id = "div_4_5">			
          <label>Date of Birth</label>
		      <input type = "date" 
                     id = "dateBirthTxt" 
                     name = "dateBirthTxt" 
                     placeholder = "" 
                     value = "<?php echo (IsSet($loan['date_of_birth'])?$loan['date_of_birth']:''); ?>"/><br/>
		   </div>	
		   </div>
          <div id = "div_5">		 
           <div id = "div_5_1">		  
          <label>Marital Status</label>
		   <div id = "div_5_1_1">	
          <label>Single</label><input type="radio" name="maritalStatChkBox" value="Single" <?php if (IsSet($loan['marital_status']) && $loan['marital_status'] == "N") { echo "checked"; } ?>>
          <label>Married</label><input type="radio" name="maritalStatChkBox" value="Married" <?php if (IsSet($loan['marital_status']) && $loan['marital_status'] == "Y") { echo "checked"; } ?>>
         </div>	
		   </div>
		   
		    <div id = "div_5_2">
            <label>Address</label>
            <input type = "text" 
                     id = "addressTxt" 
                     name = "addressTxt" 
                     placeholder = "" 
                     value = "<?php echo (IsSet($loan['address'])?$loan['address']:''); ?>"/><br/>
			</div>

            <div id = "div_5_3">			
            <label>Tel No</label>
            <input type = "number" 
                     id = "telNoTxt" 
                     name = "telNoTxt" 
                     placeholder = "" 
                     value = "<?php echo (IsSet($loan['tel_no'])?$loan['tel_no']:''); ?>"/><br/> 
			</div>	
            </div>	
			<div id = "div_6">
			<div id = "div_6_1">
           <label>Village</label>
            <input type = "text" 
                     id = "villageTxt" 
                     name = "villageTxt" 
                     placeholder = "" 
                     value = "<?php echo (IsSet($loan['village'])?$loan['village']:''); ?>"/>   
             </div>        
			 
			 <div id = "div_6_2">
            <label>Ward</label>
            <input type = "text" 
                     id = "wardTxt" 
                     name = "wardTxt" 
                     placeholder = "" 
                     value = "<?php echo (IsSet($loan['ward'])?$loan['ward']:''); ?>"/>   
			</div>

			<div id = "div_6_3">
            <label>District</label>
            <input type = "text" 
                     id = "districtTxt" 
                     name = "districtTxt" 
                     placeholder = "" 
                     value = "<?php echo (IsSet($loan['district'])?$loan['district']:''); ?>"/> 
            </div>

            <div id = "div_6_4">			
            <label>L.G.A</label>
            <input type = "text" 
                     id = "lgaTxt" 
                     name = "lgaTxt" 
                     placeholder = "" 
                     value = "<?php echo (IsSet($loan['lga'])?$loan['lga']:''); ?>"/>
            </div>
			
			<div id = "div_6_5">
            <label>State</label>
            <input type = "text" 
                     id = "stateTxt" 
                     name = "stateTxt" 
                     placeholder = "" 
                     value = "<?php echo (IsSet($loan['state'])?$loan['state']:''); ?>" /> 
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
                     value = "<?php echo (IsSet($loan['bvn'])?$loan['bvn']:''); ?>"/>
            </div>

 			<div id = "div_7_2">
              <label>Account No (Nuban)</label>
            <input type = "number" 
                     id = "acctNoTxt" 
                     name = "acctNoTxt" 
                     placeholder = "" 
                     value = "<?php echo (IsSet($loan['acct_no'])?$loan['acct_no']:''); ?>"/>
            </div>
			
			<div id = "div_7_3">
                <label>Bank</label>
            <input type = "text" 
                     id = "bankNameTxt" 
                     name = "bankNameTxt" 
                     placeholder = "" 
                     value = "<?php echo (IsSet($loan['bank'])?$loan['bank']:''); ?>"/>    
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
                     value = "<?php echo (IsSet($loan['hectarage'])?$loan['hectarage']:''); ?>"/> 
                </div>
				
            <div id = "div_8_2">
            <label>Cost Per Hectare</label>
            <input type = "number" 
                     id = "costPerHectareTxt" 
                     name = "costPerHectareTxt" 
                     placeholder = "" 
                     value = "<?php echo (IsSet($loan['cost_per_hectare'])?$loan['cost_per_hectare']:''); ?>"/>
             </div>
			 
			 <div id = "div_8_3">
            <label>Loan Amount</label>
            <input type = "number" 
                     id = "loanAmountTxt" 
                     name = "loanAmountTxt" 
                     placeholder = "" 
                     value = "<?php echo (IsSet($loan['loan_amount'])?$loan['loan_amount']:''); ?>"/>
            </div><br/><br/>   
            </div>
			<br/><br/>
			
			<hr/><br/>
			<div id = "div_9">
		 <p><strong>4. Land Ownership</strong></p>		 
          <label>Are you the Original Owner?</label>
   
   <div id = "div_9_1">
  <label>Yes</label><input type="radio" id = "isOriginalOwner" name="isOriginalOwner" value="Yes" <?php if (IsSet($loan['is_land_owner']) && $loan['is_land_owner'] == "Y") { echo "checked"; } ?>>
  <label>No</label><input type="radio" id = "isOriginalOwner2" name="isOriginalOwner" value="No" <?php if (IsSet($loan['is_land_owner']) && $loan['is_land_owner'] == "N") { echo "checked"; } ?>>
  </div>
  <label>Is the Land registered?</label>
  <div id = "div_9_2"> 
              <label>Yes</label><input type="radio" id = "isLandRegistered" name="isLandRegistered" value="Yes" <?php if (IsSet($loan['is_land_registered']) && $loan['is_land_registered'] == "Y") { echo "checked"; } ?>>
<label>No</label><input type="radio" id = "isLandRegistered" name="isLandRegistered" value="No" <?php if (IsSet($loan['is_land_registered']) && $loan['is_land_registered'] == "N") { echo "checked"; } ?>>
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
                     value = "<?php echo (IsSet($loan['name_orig_owner'])?$loan['name_orig_owner']:''); ?>"/> 
					 
		   <br/>
              <label>Land Authority</label>
            <div id = "div_10_1_1">
  <label>STATE</label><input type="radio" name="landAuthority" value="State" <?php if (IsSet($loan['land_authority']) && ($loan['land_authority'] == "State")) { echo "checked"; } ?>>
  <label>LGA</label><input type="radio" name="landAuthority" value="LGA" <?php if (IsSet($loan['land_authority']) && ($loan['land_authority'] == "LGA")) { echo "checked"; } ?>>
           </div>
		   </div>
		   
		   <div id = "div_10_2">   
           <label>BVN of Original Owner</label>
            <input type = "number" 
                     id = "bvnOrigOwnerTxt" 
                     name = "bvnOrigOwnerTxt" 
                     placeholder = "" 
                     value = "<?php if (IsSet($loan['bvn_orig_owner']) && ($loan['bvn_orig_owner'] != "0")) { echo $loan['bvn_orig_owner']; } ?>"/> 
            </div>
			
			<div id = "div_10_3">   
            <label>Tel No of Original Owner</label>
            <input type = "number" 
                     id = "telOrigOwnerTxt" 
                     name = "telOrigOwnerTxt" 
                     placeholder = "" 
                     value = "<?php if (IsSet($loan['tel_no_orig_owner']) && ($loan['tel_no_orig_owner'] != "0")) { echo $loan['tel_no_orig_owner']; } ?>"/>
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
            <?php
               if (file_exists("_members/" . $s_username . $poster_id . "/loan/thumb_sign/thumb_sign" . $a . ".jpg")) { ?>
    <div id = "secondDivision" style = 'position: relative; top: 30px; left: 40%; width: 130px; height: 130px; border: 0px solid; padding: 0px; background: url("./_members/<?php echo $s_username . $poster_id; ?>/loan/thumb_sign/thumb_sign<?php echo $a; ?>.jpg") 0px 0px/100% 100%;' >
              <div id = "imageHolder2" style = "position: relative; width: 140px; height: 120px; padding: 0px; margin: 0px; border: 0px solid;  background: transparent;" >
			    <div id = "trademarkDiv" style = "position: relative; width: auto; margin: 0px 34%; height: 60%; background: transparent;" >
                </div>
               <!-- <span id = "uploadButton" style = "">Sweet</span>-->
             </div>
             <div id = "imgStatus2" style = "width: 100%; height: auto; margin: 0px 4% 0px 0%;"></div>
			
                
                 </div>                   
				<?php   }  else if (file_exists("./_members/" . $s_username . $poster_id."/loan/thumb_sign/thumb_sign" . $a . ".png")) { ?>
                 
				 <div id = "secondDivision" style = 'position: relative;top: 30px; left: 40%; margin: 0px auto; width: 130px; height: 130px; border: 0px solid; padding: 0px; background: url("./_members/<?php echo $s_username . $poster_id; ?>/loan/thumb_sign/thumb_sign<?php echo $a; ?>.png") 0px 0px/100% 100%;' >
              <div id = "imageHolder2" style = "position: relative; width: 140px; height: 120px; padding: 0px; margin: 0px; border: 0px solid;  background: transparent;" >
			    <div id = "trademarkDiv" style = "position: relative; width: auto; margin: 0px 34%; height: 60%; background: transparent;" >
                </div>
               <!-- <span id = "uploadButton" style = "">Sweet</span>-->
             </div>
             <div id = "imgStatus2" style = "width: 100%; height: auto; margin: 0px 4% 0px 0%;"></div>
			
                
                 </div>            
				 <?php } else if (file_exists("./_members/" . $s_username . $poster_id."/loan/thumb_sign/thumb_sign" . $a . ".gif")) { ?>
					  <div id = "secondDivision" style = 'position: relative;top: 30px; left: 40%; margin: 0px auto; width: 130px; height: 130px; border: 0px solid; padding: 0px; background: url("./_members/<?php echo $username . $poster_id; ?>/loan/thumb_sign/thumb_sign<?php echo $a; ?>.gif") 0px 0px/100% 100%;' >
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
						 <br/><br/>
						 	
				<?php if (IsSet($_SESSION['check_is_admin']) &&  ($_SESSION['check_is_admin'] == "1")){ ?>
			  <div class = "admin-approve-options-div" style = "position: relative; top: 146px; 
			  width: 52%; height: 40px;
			  overflow; auto; margin: 0px auto;">
			 
			 
			  <?php if (IsSet($approval_status) && $approval_status == "rejected") { ?>
			   <div id = "admin_approve_option_div<?php echo $a ?>" class = "admin-approve-option-div" style = "position: absolute; float: left; width: 49.25%; padding: 12px 2px; text-align: center; height: 40px; font-size: .8em; background: #6699da;">
			    Approve this Loan Request
			  </div>
			  <?php } else if (IsSet($approval_status) && $approval_status == "approved") { ?>
			  <div id = "admin_approvedone_option_div<?php echo $a ?>" class = "admin-approvedone-option-div" style = "position: absolute; float: left; width: 49.25%; padding: 12px 2px; text-align: center; height: 40px; font-size: .8em; background: #aaa;">
			    Approve this Loan Request
			  </div>
			  <?php } else { ?>
			  <div id = "admin_approve_option_div<?php echo $a ?>" class = "admin-approve-option-div" style = "position: absolute; float: left; width: 49.25%; padding: 12px 2px; text-align: center; height: 40px; font-size: .8em; background: #6699da;">
			    Approve this Loan Request
			  </div>
			  <?php } ?>
			  
			  <?php if (IsSet($approval_status) && $approval_status == "approved") { ?>
			  <div id = "admin_reject_option_div<?php echo $a ?>" class = "admin-reject-option-div" style = "position: absolute; margin-left: 50%; float: left;  padding: 12px 2px; text-align: center; width: 49.25%; height: 40px; font-size: .8em; background: #6666ac;">
			    Reject this Loan Request
			  </div>
			  <?php } else if (IsSet($approval_status) && $approval_status == "rejected") { ?>
			  <div id = "admin_rejectdone_option_div<?php echo $a ?>" class = "admin-rejectdone-option-div" style = "position: absolute; margin-left: 50%; float: left;  padding: 12px 2px; text-align: center; width: 49.25%; height: 40px; font-size: .8em; background: #aaa;">
			    Reject this Loan Request
			  </div>
			  <?php } else { ?>
			  <div id = "admin_reject_option_div<?php echo $a ?>" class = "admin-reject-option-div" style = "position: absolute; margin-left: 50%; float: left;  padding: 12px 2px; text-align: center; width: 49.25%; height: 40px; font-size: .8em; background: #6666ac;">
			    Reject this Loan Request
			  </div>
			  <?php } ?>
			  </div>
			  <br/><br/><br/><br/><br/>
            <?php } ?>			
			  <!---->
			
<!--<div class = "buttonsDiv">-->
		       <!--<input type = "reset" id = "reset" name = "update1" value = "Reset"/>-->
		       <!--<input type = "submit" id = "done1" name = "done1" value = "Done"/>
		    </div>--><!--End of buttonsDiv-->
			
            </div><br/><br/><br/><br/><br/><br/><br/><br/>
			
         </form>
          </div>
        
         </div><!--End of content div.-->
		 <?php } else {	 ?>
<div class = "no_records"><div id = "background_div"><h1>No Results for that Request. <a href = "slate.php" style = "color: #77f;">Go back to Records.</a></h1></div>

<?php } ?>
		 </div>
  <?php } else {	 ?>
   <div id = "mainDiv" style = "min-width: 900px;">
<div class = "no_records"><div id = "background_div"><h1>No Results for that Request. <a href = "slate.php" style = "color: #77f;">Go back to Records.</a></h1></div>
</div>
<?php } ?>
          </div>
		  
      </div><!--End of main-->

  </div>
		<!--<script type = "text/javascript" src = "./js/edit_profile.js"></script>-->
		
	<script language = "javascript" type = "text/javascript" src = "./js/slate.js"></script>
<?php include_once("./includes/footer.php"); ?>
</section>
</body>
</html>