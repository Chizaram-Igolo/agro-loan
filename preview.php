<?php include_once ("./includes/header.php"); ?>
<?php include_once ("./includes/checkUserLogged.php"); ?>
<?php include_once ("./scripts/profileHeaderLogic.php"); ?>
<?php include_once ("./includes/create_header.php"); ?>

<?php  
  if (IsSet($_GET['param'])) {
    $_SESSION['param'] = $_GET['param'];
  }
?>

<?php //include_once ("./includes/profile_header.php"); ?>
  <div id = "mainBodyWrapper">
    <div id = "mainDiv" style = "min-width: 800px;">
                     
           <div class = "content_div">
          <br/>
         <div id = "formDiv"> 
        <form id = "createForm" enctype = "multipart/form-data" class = "edit" action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST">
			<p></p><br/>
		    <div id = "firstDivision">
		        
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
        <label>Crop</label><input type="checkbox" id = "farmtype1" name="farmtype[0]" value="Crop" <?php if (IsSet($_SESSION['farmtype1'])) { echo "checked"; } ?>>
        <label>Live Stock</label><input type="checkbox" id = "farmtype2" name="farmtype[1]" value="Live Stock" <?php if (IsSet($_SESSION['farmtype2'])) { echo "checked"; } ?>
        <label>Other</label><input type="checkbox" id = "farmtype3" name="farmtype[2]" value="Other" <?php if (IsSet($_SESSION['farmtype3'])) { echo "checked"; } ?>>
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
                     value = "<?php if (IsSet($_SESSION['firstNameTxt'])) { echo $_SESSION['firstNameTxt']; } ?>"/><br/>
		 </div>
		 
		  <div id = "div_4_2">
            <label>Middle Name</label>	
						<input type = "text" 
                     id = "middleNameTxt" 
                     name = "middleNameTxt" 
                     placeholder = "" 
                     value = "<?php if (IsSet($_SESSION['middleNameTxt'])) { echo $_SESSION['middleNameTxt']; } ?>"/><br/>
			</div>

          <div id = "div_4_3">    			
						<label>Surname</label>	
            <input type = "text" 
                     id = "lastNameTxt" 
                     name = "lastNameTxt" 
                     placeholder = "" 
                     value = "<?php if (IsSet($_SESSION['lastNameTxt'])) { echo $_SESSION['lastNameTxt']; } ?>"/><br/>
            </div>			
			
			<div id = "div_4_4">
			<label>Gender</label>	
			<div id = "div_4_4_1">	
            <label>Male</label><input type="radio" name="sexChkBox" value="Male" <?php if (IsSet($_SESSION['sexChkBox']) && ($_SESSION['sexChkBox'] == "Male")) { echo "checked"; } ?>>
            <label>Female</label><input type="radio" name="sexChkBox" value="Female" <?php if (IsSet($_SESSION['sexChkBox']) && ($_SESSION['sexChkBox'] == "Female")) { echo "checked"; } ?>>      
            </div>             
			</div>
			
            <div id = "div_4_5">			
          <label>Date of Birth</label>
		      <input type = "date" 
                     id = "dateBirthTxt" 
                     name = "dateBirthTxt" 
                     placeholder = "" 
                     value = "<?php if (IsSet($_SESSION['dateBirthTxt'])) { echo $_SESSION['dateBirthTxt']; } ?>"/><br/>
		   </div>	
		   </div>
          <div id = "div_5">		 
           <div id = "div_5_1">		  
          <label>Marital Status</label>
		   <div id = "div_5_1_1">	
          <label>Single</label><input type="radio" name="maritalStatChkBox" value="Single" <?php if (IsSet($_SESSION['maritalStatChkBox']) && ($_SESSION['maritalStatChkBox'] == "Single")) { echo "checked"; } ?>>
          <label>Married</label><input type="radio" name="maritalStatChkBox" value="Married" <?php if (IsSet($_SESSION['maritalStatChkBox']) && ($_SESSION['maritalStatChkBox'] == "Married")) { echo "checked"; } ?>>
         </div>	
		   </div>
		   
		    <div id = "div_5_2">
            <label>Address</label>
            <input type = "text" 
                     id = "addressTxt" 
                     name = "addressTxt" 
                     placeholder = "" 
                     value = "<?php if (IsSet($_SESSION['addressTxt'])) { echo $_SESSION['addressTxt']; } ?>"/><br/>
			</div>

            <div id = "div_5_3">			
            <label>Tel No</label>
            <input type = "number" 
                     id = "telNoTxt" 
                     name = "telNoTxt" 
                     placeholder = "" 
                     value = "<?php if (IsSet($_SESSION['telNoTxt'])) { echo $_SESSION['telNoTxt']; } ?>"/><br/> 
			</div>	
            </div>	
			<div id = "div_6">
			<div id = "div_6_1">
           <label>Village</label>
            <input type = "text" 
                     id = "villageTxt" 
                     name = "villageTxt" 
                     placeholder = "" 
                     value = "<?php if (IsSet($_SESSION['villageTxt'])) { echo $_SESSION['villageTxt']; } ?>"/>   
             </div>        
			 
			 <div id = "div_6_2">
            <label>Ward</label>
            <input type = "text" 
                     id = "wardTxt" 
                     name = "wardTxt" 
                     placeholder = "" 
                     value = "<?php if (IsSet($_SESSION['wardTxt'])) { echo $_SESSION['wardTxt']; } ?>"/>   
			</div>

			<div id = "div_6_3">
            <label>District</label>
            <input type = "text" 
                     id = "districtTxt" 
                     name = "districtTxt" 
                     placeholder = "" 
                     value = "<?php if (IsSet($_SESSION['districtTxt'])) { echo $_SESSION['districtTxt']; } ?>"/> 
            </div>

            <div id = "div_6_4">			
            <label>L.G.A</label>
            <input type = "text" 
                     id = "lgaTxt" 
                     name = "lgaTxt" 
                     placeholder = "" 
                     value = "<?php if (IsSet($_SESSION['lgaTxt'])) { echo $_SESSION['lgaTxt']; } ?>"/>
            </div>
			
			<div id = "div_6_5">
            <label>State</label>
            <input type = "text" 
                     id = "stateTxt" 
                     name = "stateTxt" 
                     placeholder = "" 
                     value = "<?php if (IsSet($_SESSION['stateTxt'])) { echo $_SESSION['stateTxt']; } ?>" /> 
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
                     value = "<?php if (IsSet($_SESSION['bvnTxt'])) { echo $_SESSION['bvnTxt']; } ?>"/>
            </div>

 			<div id = "div_7_2">
              <label>Account No (Nuban)</label>
            <input type = "number" 
                     id = "acctNoTxt" 
                     name = "acctNoTxt" 
                     placeholder = "" 
                     value = "<?php if (IsSet($_SESSION['acctNoTxt'])) { echo $_SESSION['acctNoTxt']; } ?>"/>
            </div>
			
			<div id = "div_7_3">
                <label>Bank</label>
            <input type = "text" 
                     id = "bankNameTxt" 
                     name = "bankNameTxt" 
                     placeholder = "" 
                     value = "<?php if (IsSet($_SESSION['bankNameTxt'])) { echo $_SESSION['bankNameTxt']; } ?>"/>    
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
                     value = "<?php if (IsSet($_SESSION['hectarageTxt'])) { echo $_SESSION['hectarageTxt']; } ?>"/> 
                </div>
				
            <div id = "div_8_2">
            <label>Cost Per Hectare</label>
            <input type = "number" 
                     id = "costPerHectareTxt" 
                     name = "costPerHectareTxt" 
                     placeholder = "" 
                     value = "<?php if (IsSet($_SESSION['costPerHectareTxt'])) { echo $_SESSION['costPerHectareTxt']; } ?>"/>
             </div>
			 
			 <div id = "div_8_3">
            <label>Loan Amount</label>
            <input type = "number" 
                     id = "loanAmountTxt" 
                     name = "loanAmountTxt" 
                     placeholder = "" 
                     value = "<?php if (IsSet($_SESSION['loanAmountTxt'])) { echo $_SESSION['loanAmountTxt']; } ?>"/>
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
<div class = "buttonsDiv">
		       <!--<input type = "reset" id = "reset" name = "update1" value = "Reset"/>-->
		       <input type = "submit" id = "done1" name = "done1" value = "Done"/>
		    </div><!--End of buttonsDiv-->
			
            </div><br/><br/><br/><br/><br/><br/><br/><br/>
			
         </form>
          </div>
        
         </div><!--End of form div.-->
          </div><!--End of content div-->
      </div><!--End of main-->
  </div>
		<script type = "text/javascript" src = "./js/edit_profile.js"></script>
<?php include_once("./includes/footer.php"); ?>
</section>
</body>
</html>