<?php include_once ("./includes/header.php");  // Includes the header file to be used on all pages. ?>
<?php include_once ("./includes/register_header.php"); ?> 

	   <div id = "fullRegister">
	     <form id = "signUpForm" action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST"> 
          <p style = "color: #434343;">Setup your account</p><br/><br/>
          <label id = "usernameLabel">Username</label>
          <input type = "text" 
                id = "formUsername" 
                name = "formUsername" 
                maxlength = "30" 
                placeholder = "Pick a userName" 
                value = "<?php If (IsSet($_POST['username'])) { echo $_POST['username']; } If (IsSet($_SESSION['formUsername'])) { echo $_SESSION['formUsername']; } If (IsSet($_SESSION['username'])) { echo $_SESSION['username']; }?>" />
		    <div class = "tip" id = "usernameStat">
				<?php if (IsSet($status['usernameComp']) && $status['usernameComp'] !== "") { ?>
		      <div class = "error-div-container"><div class = "error-div-anchor"></div><div class = "error-div"><?php echo $status['usernameComp'];?></div></div><br/>
		   <?php	} else { ?>
				  Your username on <?php echo COMPANY_NAME; ?>. It should be at least 6 characters long and should contain at least a letter.<br/><br/><br/>
				 <?php } ?>
				</div>
		  
		  <label id = "emailLabel">Email Address</label>
		  <input type = "email" 
                 id = "formEmail" 
                 onchange = "return false" 
                 name = "formEmail" 
                 placeholder = "Your email address" 
                 maxlength = "40" 
                 value = "<?php If (IsSet($_POST['email'])) { echo $_POST['email']; }  If (IsSet($_SESSION['formEmail'])) { echo $_SESSION['formEmail']; }?>"/>
		  <div class = "tip" id = "emailStat">
		     <?php if (IsSet($status['emailComp']) && $status['emailComp'] !== "") {?>
		         <div class = "error-div-container"><div class = "error-div-anchor"></div><div class = "error-div"><?php echo $status['emailComp'];?></div></div><br/>
				 <?php } else { ?>
					  When required, you will receive account related emails and updates.<br/><br/><br/>
				 <?php } ?>
					</div>
             
          <label id = "passwordLabel">Password</label>
		  <input type = "password" 
                 id = "formPassword" 
                 name = "formPassword" 
                 placeholder = "Create a Password" 
                 maxlength = "25" 
                 value = "<?php // If (IsSet($_POST['password'])) { echo $_POST['password']; } ?>"/>
		 <div class = "tip" id = "passStat">
				  <?php 
		      if (IsSet($status['passwordComp']) && $status['passwordComp'] !== "") { ?>
					 <div class = "error-div-container"><div class = "error-div-anchor"></div><div class = "error-div"><?php echo $status['passwordComp']; ?></div></div><br/>
		  <?php } else { ?>
			<br/>
			<?php } ?>
						</div>	

			<label id = "passwordLabel2">Confirm Password</label>
		  <input type = "password" 
                 id = "form2Password" 
                 name = "form2Password" 
                 placeholder = "Confirm your Password" 
                 maxlength = "25" 
                 value = "<?php // If (IsSet($_POST['password'])) { echo $_POST['password']; } ?>"/>
		 <div class = "tip" id = "pass2Stat"><br/>
				  <?php 
		      if (IsSet($status['password2Comp']) && $status['password2Comp'] !== "") { ?>
					 <div class = "error-div-container"><div class = "error-div-anchor"></div><div class = "error-div"><?php echo $status['password2Comp']; ?></div></div>
		  <?php } else { ?>
			<br/><br/>
			<?php } ?>
						</div>	

    <input type = "hidden" name = "formHidden" value = "admin" />
		 <!--<span class = "tip" style = "margin-top: -1.2em;">For strong passwords, use at least one letter, a number and seven characters.</span>-->
		    <div  style = "margin-top: -0.2em; background-color: #ddd; width: 100%; height: 1px;"></div>
			
		   <span class = "tip" style = "font-size: 0.8em; display: inline-block; margin: 0 auto; margin-top: 10px; margin-bottom: -52px;">By creating an account, you acknowledge our <a href = "./terms_of_use.php">terms of use</a> and <a href = "./privacy_policy.php">privacy policy</a></span>
    
            <div id = "signUpButtonDiv" style = "margin-top: -0.4em; width:100%;">
              <input type = "submit" style = "width: 150px; height: 40px;" name = "createAccount"  id = "createAccount" value = "Create an Account"/>
            </div>		    
           
         </form>
		<div id = "rightBar">
          <div id = "featureDiv">
	        <img src = "./images/feature1.png" />
	     <div id = "caption">
	        <span>Research and Development</span>
	     </div>   
	</div>
        </div>	   
	 </div>
	
	</div>
	</div>
<?php include_once("./includes/footer.php"); ?>
</section>
</body>
</html>