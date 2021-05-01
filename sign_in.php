<?php include_once ("./includes/header.php");  // Includes the header file to be used on all pages. ?>
<?php include_once ("./includes/register_header.php"); ?> 

	   <div id = "fullRegister">
	     <form id = "signUpForm" action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST"> 
		      <br/><br/><br/><br/>
		  <?php if (IsSet($_SESSION['failed_attempt']) && $_SESSION['failed_attempt'] !== "") { ?>
		    <div id = "errorBasket">
			<div id = "errorDivAnchor"></div>
			<div id = "errorDiv">
			<div id = "errorMessage"><span id = "label-span">Sign In:</span>&nbsp;
			  <?php
			  
			    echo $_SESSION['failed_attempt'];
				unset($_POST['signIn']);
				unset($_POST['signInEmailUsername']);
				unset($_POST['signInPass']);
				unset($_SESSION['failed_attempt']);
			  ?>
			</div>
			</div>
			</div>
		  <?php } ?>
          <label id = "usernameLabel">Username</label>
          <input type = "text" 
                id = "formUsername" 
                name = "signInEmailUsername" 
                maxlength = "30" 
                placeholder = "Username or Email" 
                value = "<?php If (IsSet($_POST['signInEmailUsername'])) { echo $_POST['signInEmailUsername']; } ?>" />
		  <?php
		      if (IsSet($status['usernameComp']) && $status['usernameComp'] !== "") {
		         echo $status['usernameComp']; 
				} else { ?>
		    <span class = "tip" id = "usernameStat"></span>
		  <?php } ?>
		
          <label id = "passwordLabel">Password</label>
		  <input type = "password" 
                 id = "formPassword" 
                 name = "signInPass" 
                 placeholder = "************" 
                 maxlength = "25" 
                 value = "<?php If (IsSet($_POST['signInPass'])) { echo $_POST['signInPass']; }?>"/>
		 <?php 
		      if (IsSet($status['passwordComp']) && $status['passwordComp'] !== "") {
		         echo $status['passwordComp']; 
				} else { ?>
		    
<span class = "tip" id = "passStat" style = "font-size: 0.9em; display: inline-block; height: auto; margin: 0 auto; margin-top: 10px; 
margin-bottom: -28px; padding-left: 90px; "></span>		  
<?php } ?>
    
		 <!--<span class = "tip" style = "margin-top: -1.2em;">For strong passwords, use at least one letter, a number and seven characters.</span>-->
		    <div  style = "margin-top: -0.2em; background-color: #ddd; width: 100%; height: 1px;"></div>
		       <div id = "signUpButtonDiv" style = "margin-top: -0.4em; width:100%;">
              <input type = "submit" style = "width: 150px; height: 40px;" name = "signIn"  id = "createAccount" value = "Sign In"/>
            </div>		    
         </form>	
<div id = "rightBar">
          <div id = "featureDiv" style = "margin-top: -50px;">
	        <img src = "./images/feature1.png" />
	     <div id = "caption">
	        <span>Research and Development</span>
	     </div>
	    <?php if (IsSet($_POST['createAccount']) && ($_POST['createAccount']) == "Create an Account"){ ?>
	   <img src = "./images/world.png" />
	   <div id = "caption">
	     <span>Digital Solutions for Community Development</span>
	   </div>
	  <?php } else if (IsSet($_POST['finishSignUp']) && ($_POST['finishSignUp']) == "Finish"){ ?>
	 
	  <?php } else { ?>
	   <!--<img src = "./images/desk.png" />
	   <div id = "caption">
	     <span>Set up your own workbench</span>
	   </div>-->
	   <?php } ?>
	   
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