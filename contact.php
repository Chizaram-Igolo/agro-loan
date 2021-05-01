<?php include_once ("./includes/header.php");  // Includes the header file to be used on all pages. ?>
<?php include_once ("./includes/register_header.php"); ?> 

	   <div id = "fullRegister">
	     <div id = "aboutDiv"> 
	  	<h3>FAQ</h3>
	  	<h3>What is DERDC?</h3>
      <p>DERDC stands for Digital Education, Research and Development Company. We are a team of dedicated experts across different fields seeking to bridge the gap between Education and Industry.</p>
             		
			<h3>What do we do?</h3>
      <p>We provide technological solutions to needs in the community. We also empower youths.</p>
     

            <br/>
            </div>
            
		   <div id = "horizontalRule" style = "margin-top: 0em;"></div>
		   
            <form id = "signUpForm" action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST"> 
            <h3>Like to get in touch with us?</h3>
          <p class = "infoPar" style= "color: #656565;"></p><br/><br/>
		   <label>Name</label>
           <input type = "text" id = "formFirstname" name = "formFirstname" placeholder = "Name" value = "<?php If (IsSet($_SESSION['formFirstname'])) { echo $_SESSION['formFirstname']; }?>" style = "margin-top: 10px; margin-bottom: -10px;"/><br/>  
           <?php
		      if (IsSet($status['firstnameComp']) && $status['firstnameComp'] !== "") {
		         echo $status['firstnameComp']; 
				} else { ?>
		   <?php } ?><br/><br/>
		   <label id = "emailLabel">Email Address</label>
		  <input type = "email" 
                 id = "formEmail" 
                 onchange = "return false" 
                 name = "formEmail" 
                 placeholder = "Your email address" 
                 maxlength = "40" 
                 value = "<?php If (IsSet($_POST['email'])) { echo $_POST['email']; }  If (IsSet($_SESSION['formEmail'])) { echo $_SESSION['formEmail']; }?>"/>
		   <?php 
		      if (IsSet($status['emailComp']) && $status['emailComp'] !== "") {
		         echo $status['emailComp']; 
				} else { ?>
<?php } ?><br/><br/>
		   <div id = "lastDetails" style = "padding-top: 4px; margin-top: 0em; width: 100%; height: auto;">
		   
		   <label id = "emailLabel">Your message or question</label>
		   <textarea rows = "4" cols = "50"></textarea>
		   </div><!--End of lastDetails--> 
			 
		   <div id = "horizontalRule" style = "margin-top: 0em;"></div>
           <div id = "signUpButtonDiv" style = "width: 100%;">
              <input type = "submit" name = "finishSignUp"  id = "finishSignUp" value = "Send" style = "width: 150px; height: 40px; margin-top: 0.8em; margin-left: 0%;"/>
           </div>
		   
         </form>
	 </div>
	
	</div>
	</div>
<?php include_once("./includes/footer.php"); ?>
</section>
</body>
</html>