<?php include_once ("./includes/header.php");  // Includes the header file to be used on all pages. ?>
<?php include_once ("./includes/register_header.php"); ?> 
	 	 
	   <div id = "fullRegister">
	     <form id = "signUpForm" action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST"> 
          <p class = "infoPar" style= "color: #656565;">You're almost done!&nbsp;&nbsp;We need to know just a few more things about you.</p><br/><br/>
		   <label>First Name</label>
           <input type = "text" id = "formFirstname" name = "formFirstname" placeholder = "First Name" value = "<?php If (IsSet($_POST['formFirstname'])) { echo $_POST['formFirstname']; }?>" style = "margin-top: 10px;"/><br/>  
             <div class = "tip" id = "firstnameStat">
		     <?php if (IsSet($status['firstnameComp']) && $status['firstnameComp'] !== "") {?>
		         <div class = "error-div-container"><div class = "error-div-anchor"></div><div class = "error-div"><?php echo $status['firstnameComp'];?></div></div><br/>
				 <?php } else { ?>
					  Names may not contain spaces<br/><br/><br/>
				 <?php } ?>
					</div>
		   
		   <label>Last Name</label>
		   <input type = "text" id = "formLastname" name = "formLastname" placeholder = "Last Name" value = "<?php If (IsSet($_POST['formLastname'])) { echo $_POST['formLastname']; }?>" style = "margin-top: 10px;"/><br/>
		     <div class = "tip" id = "lastnameStat">
		     <?php if (IsSet($status['lastnameComp']) && $status['lastnameComp'] !== "") {?>
		         <div class = "error-div-container"><div class = "error-div-anchor"></div><div class = "error-div"><?php echo $status['lastnameComp'];?></div></div><br/>
				 <?php } else { ?>
					  
				 <?php } ?>
					</div>
		
		   <div id = "lastDetails" style = "padding-top: 4px; margin-top: 0em; width: 100%; height: auto;">
		   <!--Fetch the birth day-->
		     <div id = "dateofBirthDiv">
		       <label style = "display: inline-block; width: 100%;">Date of Birth</label>
               
		       <!--Fetch the birth month-->
		       <?php include('./includes/birth_months.inc'); ?>
                 
		       <select id = "formDay" name = "formDay" style = "float: left;"> 
		       <option value = "" selected = "selected" style = "background: #ee2;">Day</option>
               <?php if ($_POST['formDay']) { ?>
                 <option value = "<?php echo $_SESSION['formDay']; ?>" selected = "selected" style = "background: #ee2;"><?php echo $_SESSION['formDay']; ?></option>
               <?php } ?>
               
		       <?php 
		         for($int = 1; $int <= 31; $int++) {
			       print("<option style = \"height: 10px; padding-top: 4px;\">" . $int . "</option>");
			     }
		       ?>
               </select>
		       <!--Fetch the birth year-->
		       <?php include('./includes/birth_years.inc'); ?>
			   <div class = "tip" id = "birthDateDetailsStat">
		     <?php if (IsSet($status['birthDateDetailsComp']) && $status['birthDateDetailsComp'] !== "") {?><br/>
		         <div class = "error-div-container"><div class = "error-div-anchor"></div><div class = "error-div"><?php echo $status['birthDateDetailsComp'];?></div></div>
				 <?php } else { ?>
				 <?php } ?>
					</div>
		     </div><!--End of dateofBirthDiv-->
			 
               
		   <!--Acquire the new user's gender-->
		   <div id = "sexDiv">
		     <label style = "display: inline-block;  height: 20px; width: 100%;">Sex</label>
		     <select id = "formSex" name = "formSex"  style = "width: 100%;"> 
			   <option value = "" selected>Sex</option><?php if ($_SESSION['formSex']) { ?>
               <option value = "<?php echo $_SESSION['formSex']; ?>" selected = "selected" style = "background: #ee2;"><?php echo $_SESSION['formSex']; ?></option>
               <?php } ?>
               
               <option value = "Female">Female</option>
               <option value = "Male">Male</option>
             </select>
           </div><!--End of sexDiv-->
               
                  <div class = "tip" id = "genderdetailsStat">
		     <?php if (IsSet($status['genderdetailsComp']) && $status['genderdetailsComp'] !== "") {?><br/>
		         <div class = "error-div-container"><div class = "error-div-anchor"></div><div class = "error-div"><?php echo $status['genderdetailsComp'];?></div></div><br/>
				 <?php } else { ?>
				 <?php } ?>
					</div>
					
					<label id = "phoneStat">Phone Number</label>
					<input type = "tel" id = "formPhoneNumber" name = "formPhoneNumber" placeholder = "Phone Number" value = "<?php If (IsSet($_POST['formPhoneNumber'])) { echo $_POST['formPhoneNumber']; }?>" style = "margin-top: 10px;"/><br/>  
             <div class = "tip" id = "phonenumberStat">
		     <?php if (IsSet($status['phonenumberComp']) && $status['phonenumberComp'] !== "") {?>
		         <div class = "error-div-container"><div class = "error-div-anchor"></div><div class = "error-div"><?php echo $status['phonenumberComp'];?></div></div>
				 <?php } else { ?>
				 <?php } ?>
					</div>
		   </div><!--End of lastDetails--> 
			 
		   <div id = "horizontalRule" style = "margin-top: 0em;"></div>
           <div id = "signUpButtonDiv" style = "width: 100%;">
              <input type = "submit" name = "finishSignUp"  id = "finishSignUp" value = "Finish" style = "width: 150px; height: 40px; margin-top: 0.8em; margin-left: 0%;"/>
           </div>
		   
         </form>
		<div id = "rightBar">
          <div id = "featureDiv">
	     <img src = "./images/world.png" />
	   <div id = "caption">
	     <span>Digital Solutions for Community Development</span>
	   </div>	   
	</div>
        </div>		   
	 </div>
	
	</div>
	<div class = "pageDivs"  id = "rightDiv">
	</div>
	</div>
<?php include_once("./includes/footer.php"); ?>
</section>
</body>
</html>