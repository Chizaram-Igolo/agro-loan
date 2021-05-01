<?php ini_set('display_errors', 1); ?>
<?php include_once ("./includes/header.php");  // Includes the header file to be used on all pages. ?>

<?php
  // If the user clicks the 'sign out' link.
  if (IsSet($_GET['p']) && $_GET['p'] == 'signout') {
    signOut();
  } else if (IsSet($_POST['signInEmail']) || IsSet($_SESSION['logged_email'])) {
    // Else header them back to the user profile page.
   // header('location: user_profile.php');
  }
  
  // For every new sign up attempt.
  if (IsSet($_SESSION)) {
    unset($_SESSION['formUsername']);
  }

  if (IsSet($_SESSION)) {
    unset($_SESSION['questionContent']);
    unset($_SESSION['questionTxt']);
    unset($_SESSION['param']);
  }

   if (IsSet($_SESSION['has_visited'])) {
    // unset($_SESSION['has_visited']);
  }
	
  unset($_SESSION['formEmail']);
  unset($_SESSION['crypt_pass']);
  unset($_SESSION['salt']);
  unset($_SESSION['formDepartment']);
  unset($_SESSION['formFaculty']);
  unset($_SESSION['formInstitution']);
  unset($_SESSION['formFirstname']);
  unset($_SESSION['formLastname']);
  unset($_SESSION['formDay']);
  unset($_SESSION['formMonth']);
  unset($_SESSION['formYear']);
  unset($_SESSION['formSex']); 
  unset($_SESSION['success']);
  unset($_SESSION['step1_done']);
  unset($_SESSION['step2_done']);
  unset($_SESSION['step3_done']);
  unset($_SESSION['error']);
  // unset($_SESSION['failed_attempt']);
?>
<!--PHP script to pull items from database, for the number returned from 'num_rows'-->
<script type = "text/javascript"></script>
<div id = "mainBodyWrapper">
  <div id = "backgroundDiv1">
   <div id = "div-back-design-1">
   </div>
   <div id = "div-back-design-2">
   </div>
   <div id = "center-div-back-design">
   <div id = "div-back-design-3">
   </div>
   <div id = "div-back-design-4">
   </div>
   <div id = "div-back-design-5">
   </div>
   <div id = "div-back-design-6">
   </div>
   <div id = "div-back-design-7">
   </div>
   </div>
   <div id = "div-back-design-8">
   </div>
   <div id = "div-back-design-9">
   </div>
  </div>

  <div id = "homeSplash">
  
    <div id = "register">
	
      <form id = "signUpForm" action = "<?php echo($_SERVER['PHP_SELF']); ?>" method = "POST">  
        <p></p><br/>
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

        <input type = "text" 
		       id = "username" 
               name = "signInEmailUsername" 
               placeholder = "Username or Email"
			   value = "<?php If (IsSet($_POST['signInEmailUsername'])) { echo $_POST['signInEmailUsername']; }?>" /><br/>
				   
       <!-- <input type = "email" 
			   id = "email" 
               name = "email" 
               placeholder = "Your email address" /><br/>-->
				   
			<input type = "password" 
			       id = "password" 
				   name = "signInPass" 
				   placeholder = "*********" 
				   value = "<?php If (IsSet($_POST['signInPass'])) { echo $_POST['signInPass']; }?>" /><br/>
				   
			<span class = "tip">Can't remember your Username or Password? <a href = "forgot.php" class = "index-links">Click here to retrieve it.</a></span>
			<div id = "signUpButtonDiv">
			  <input type = "submit" 
			         name = "signInButton"  
					 id = "signUpButton" 
					 value = "Log into <?php echo COMPANY_NAME; ?>"/>
			</div>
			<span class = "tip" id = "termsTip">New here?  <a href = "register.php" class = "index-links">Sign Up and get started here.</a></span>
		  </form> <!--End of homeSplash div-->
		</div>  <!--End of register div-->

	  </div><!--End of homeSplash-->
    
		  
        <!-------Div housing creedo, tagline, watch-word of the company-------->
	  <!--<div id = "philosophySplash">
		<p>NIRSAL does <strong class = "highlight">this</strong>, <strong class = "highlight">this</strong> and <strong class = "highlight">this</strong></p>   
	    <h2>Agricultural Loans you can Trust on.</h2>
	  </div>-->
</div><!--End of mainBodyWrapper--->
	
<?php include_once("./includes/footer.php"); ?>
</div>
<script type = "text/javascript" src = "./js/schoolboss.js"></script>
</body>
</html>