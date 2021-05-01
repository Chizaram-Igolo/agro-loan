<div id = "footer">
  <div class = "floatDivs" id = "first">
    <div id = "address">&copy; 
	  <?php 
	     echo date('Y'); 
	  ?>
	  <span id = "first">, <?php echo COMPANY_NAME; ?></span><br/>
      <span id = "second">Content herein may not be used without expressive permission of <?php echo COMPANY_NAME; ?> or 
	  its franchises, please see our <a href = "./terms_of_use.php" style = "text-decoration: underline; font-family: calibri;">Terms of Use</a>.
	  </span>
	</div>
  </div>
  
  <div class = "floatDivs" id = "second">
    <ul>
      <li><a href = "./about.php">About</a></li>
      <li><a href = "./contact.php">Contact</a></li>
      <li><a href = "./terms_of_use.php">Terms of Use</a></li>
      <li><a href = "./privacy_policy.php">Privacy Policy</a></li>
    </ul>
  </div><br/>
	
  <div class = "floatDivs" id = "third">
   <!-- <ul>
      <li><a href = "#">Facebook</a></li>
      <li><a href = "#">Twitter</a></li>
      <li><a href = "#">Google+</a></li>
    </ul>-->
  </div>
  <?php 
     // Close the mysql connection after serving up the page.
     $my_handle->close();
  ?>
</div>