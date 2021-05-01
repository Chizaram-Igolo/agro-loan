<?php include_once ("./includes/header.php");  // Includes the header file to be used on all pages. ?>
<?php include_once ("./includes/functions.php"); ?> 
<?php include_once ("./includes/register_header.php"); ?> 
	 	 
	   <div id = "fullRegister">
	     <?php if (IsSet($_SESSION['error'])) { ?>
		  
	      <div id = "failureMessage" style = "width: 150%">
	       <h1 style = "color: #d44">Oops! Something went wrong.</h1>
	       <p style = "font-size: 0.9em; color: #434343; line-height: 1.9em;">
	       Sorry, we had trouble signing you up.<br/>
		   <a href = "register.php" style = "text-decoration: none;"><span style = "font-size: 1.15em; background: #ddf4dd; padding:0.2em; color: #a0bf20; margin-right: 5px;">Please, Click Here</span></a> to reattempt the sign up process.<br/>
		   If you keep seeing this page, <a href = "contact.php">click here</a><br/>
		   <a href = "index.php" style = "font-size: 0.8em;">Click Here</a><span style = "font-size: 0.8em;"> to return to the home page.</span></p>
		   <p style = "font-size: 0.9em; width: 50%; margin-top: 20px; position: relative; left: 58%;">- The SchoolBoss Team</p>
	     </div><!--End of successMessage-->
<?php } ?>
         </form>   
	 </div>
	
	</div>
	<div class = "pageDivs"  id = "rightDiv">
	</div>
	</div>
<?php include_once("./includes/footer.php"); ?>
</section>
</body>
</html>