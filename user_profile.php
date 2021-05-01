<?php include_once ("./includes/header.php"); ?>
<?php include_once ("./includes/checkUserLogged.php"); ?>
<?php include_once ("./scripts/profileHeaderLogic.php"); ?>
<?php include_once ("./scripts/loadProfileStats.php"); ?>

   <script type = "text/javascript">
	function alertMe() {
		//document.getElementById("statusNotifier").style.backgroundColor = "black";
		//document.getElementById("statusNotifier").width = "200px";
    //document.getElementById("statusNotifier").height = "300px"; 
	}
</script>


<div id = "mainBodyWrapper">
 <script language = "javascript" type = "text/javascript">
    $(document).ready(function(){
	  $("#take_tutorial").click(function(){
        $("#tourDiv2Holder").fadeIn("slow");
	  })
    });
 </script>	
<?php include_once ("./includes/profile_header.php"); ?>
<?php if (IsSet($_SESSION['has_visited']) && $_SESSION['has_visited'] == '0') { $_SESSION['has_visited'] = '1'; 
$update_user_query = "UPDATE user SET has_visited = '1' WHERE user_id = '$user_id'";
$update_userID = $my_handle->query($update_user_query);
?>
  <script language = "javascript" type = "text/javascript">
    $(document).ready(function(){
      $("#tourDiv2Holder").fadeIn("slow");
    });
   	
		$(document).ready(function(){
		  $("#closeBtn1").click(function(){
        $("#tourDiv1Holder").css("display", "none");
	      $("#tourDiv2Holder").fadeIn("slow");
	    });
    });
		
		$(document).ready(function(){
		  $("#closeBtn2").click(function(){
        $("#tourDiv2Holder").css("display", "none");
	      $("#tourDiv3Holder").fadeIn("slow");
	    });
    });
		
		$(document).ready(function(){
		  $("#closeBtn3").click(function(){
        $("#tourDiv3Holder").css("display", "none");
	      $("#tourDiv4Holder").fadeIn("slow");
	    });
    });
		
		$(document).ready(function(){
		  $("#closeBtn4").click(function(){
        $("#tourDiv4Holder").css("display", "none");
	      $("#tourDiv5Holder").fadeIn("slow");
	    });
    });
		
		$(document).ready(function(){
		  $("#closeBtn5").click(function(){
        $("#tourDiv5Holder").css("display", "none");
	     // $("#tourDiv6Holder").fadeIn("slow");
	    });
    });
		function fadeDiv7() {
		  $("#tourDiv7Holder").fadeIn("slow");
		}
		var used = false;
		$(document).ready(function(){
		  $("#profileNameTagLink").mouseover(function(){
        // $("#tourDiv6Holder").css("display", "none");
	      $("#tourDiv6Holder").fadeOut("slow");
				if (!used) {
				  setTimeout(fadeDiv7, 500);
				}
				used = true;
	    });
    });
		
		$(document).ready(function(){
		  $("#closeBtn7").click(function(){
	      $("#tourDiv7Holder").css("display", "none");
	    });
    });
	</script>
<?php } ?>
  <!--<div id = "tourDiv1Holder">
  <div id = "tourDiv1Hook" style = "">
	</div>
  <div id = "tourDiv1" style = "">
	  <p>Welcome, <strong><?php // echo $_SESSION['user_name'];  ?></strong><span class = "pageNo">(1/5)</span></p><br/>
	  <p>This is your <strong>account dashboard</strong>.</p><br/>
		<p>From here you can customize your account and carry out operational tasks.</p>
		<p><a href = "#" id = "closeBtn1">Ok, Got It!</a></p>
  </div>
	</div>-->
	
  <div id = "tourDiv2Holder">
	<div id = "tourDiv2Hook" style = "">
	</div>
	<div id = "tourDiv2" style = "">
	  <p>This is your <strong>account banner</strong>.<span class = "pageNo">(1/4)</span></p><br/>
		<p>It displays information about you and any records you view.</p>
		<p><a href = "#" id = "closeBtn2">Ok, Got It!</a></p>
  </div>
	</div>
	
	<div id = "tourDiv3Holder">
	<div id = "tourDiv3Hook" style = "">
	</div>
	<div id = "tourDiv3" style = "">
	  <p>This is your <strong>profile slate</strong>.<span class = "pageNo">(2/4)</span></p><br/>
		<p>It displays anything you're working on at a given time.</p>
		<p><a href = "#" id = "closeBtn3">Ok, Got It!</a></p>
  </div>
	</div>
	
	<div id = "tourDiv4Holder">
	<div id = "tourDiv4Hook" style = "">
	</div>
	<div id = "tourDiv4" style = "">
	  <p>Go here for your <strong>history sheet</strong>.<span class = "pageNo">(3/4)</span></p><br/>
		<p>This displays your history over time to you.</p><br/>
		<p><a href = "#" id = "closeBtn4">Ok, Got It!</a></p>
  </div>
	</div>
	
	<div id = "tourDiv5Holder">
	<div id = "tourDiv5Hook" style = "">
	</div>
	<div id = "tourDiv5" style = "">
	  <p><strong>Done</strong><span class = "pageNo">(4/4)</span></p><br/>
	  <p>You're all set up! <br/><br/>You can alway revisit this tutorial by clicking the "Take tutorial" option when in Profile view.</p>
		<br/><p><a href = "#" id = "closeBtn5">Ok, Got It!</a></p>
  </div>
	</div>
	
	<div id = "tourDiv6Holder">
	<div id = "tourDiv6Hook" style = "">
	</div>
	<div id = "tourDiv6" style = "">
	  <p><strong>Your Alias</strong><span class = "pageNo">(6/7)</span></p><br/>
	  <p>From here, you can access your library.</p>
		<p>Move your mouse over your alias to display your library.</p>
		<!--<p><a href = "#">Ok, Got It!</a></p>-->
  </div>
	</div>
	
	<div id = "tourDiv7Holder">
	<div id = "tourDiv7Hook" style = "">
	</div>
	<div id = "tourDiv7" style = "">
	  <p><strong>Your Library</strong><span class = "pageNo">(7/7)</span></p><br/>
	  <p>Educational materials are available in your library.</p>
		<p><a href = "#" id = "closeBtn7">Ok, Got It!</a></p>
  </div>
	</div>
	
	<div id = "mainDiv" style = "min-width: 300px;">
	  <div id = "profileDashBoardContainer"> 
        <div id = "profileDashBoard">
          <?php //include_once ("./includes/profile_left_sideBar.php"); ?>
	 </div>
	 </div>
<div id = "profileSlate">
          <?php // if (IsSet($_SESSION['is_activated']) && $_SESSION['is_activated'] !== "1") { ?>
				 <!--	  <div class = "content_div" style = "min-width: 390px;">
					    <p id = "no_content_paragraph" class = "no_content_paragraph">
						  <span>Please activate your account to fully provision it!</span>
					    </p>
					  </div>0-->
		  <?php // } else { ?>
		    <?php if ($_SESSION['check_is_admin'] == "0") { ?>
              <div class = "content_div" "min-width: 200px;">
		        <a href = "create.php" style = "text-decoration: none; padding: 0px; ">
				  <p id = "no_content_paragraph" class = "no_content_paragraph" style = "padding: 0px 40px; margin-bottom: -15px;">
                    <span style = "display: inline-block; font-size: .76em; padding: 10px 30px;">Get Started!</span>
                  </p>
				</a>
			  </div>
			<?php }?>
		  <?php // } ?>
		  
		<?php if (IsSet($p_user_details)) { ?>
	      <?php if ((Isset($p_user_details['home_address']) && $p_user_details['home_address'] !== "") || 
	            (Isset($p_user_details['village']) && $p_user_details['village'] !== "") || 
	            (Isset($p_user_details['ward']) && $p_user_details['ward'] !== "") || 
	            (Isset($p_user_details['district']) && $p_user_details['district'] !== "") || 
	            (Isset($p_user_details['lga']) && $p_user_details['lga'] !== "") || 
	            (Isset($p_user_details['state']) && $p_user_details['state'] !== "")) { ?>
             <div class = "content_div" style = "clear: none; float: left; width: 60%;  margin-right: 10%; min-width: 400px;">
			 <h3 class = "first_heading">Address and Location</h3>
			 <p style = "padding: 20px; color: #777;">
			   <?php if (IsSet($p_user_details['home_address']) && 
						 $p_user_details['home_address'] !== "") {
			           echo "<span style = \"padding: 4px 4px; border-radius: 2px;\"><strong>Home Address: </strong>" .$p_user_details['home_address'] . "</span>"; 
		             }
			   ?>
			 </p>
			<p style = "padding: 20px; margin-top: -25px; color: #777;">
		       <?php if (IsSet($p_user_details['village']) && 
						 $p_user_details['village'] !== "") {
			           echo "<span style = \"padding: 4px 4px; border-radius: 2px;\"><strong>Village:</strong> " . $p_user_details['village'] . "</span>"; 
		             }
			   ?>
			 </p>
			 <p style = "padding: 20px; margin-top: -25px; color: #777;">
		       <?php if (IsSet($p_user_details['ward']) && 
						 $p_user_details['ward'] !== "") {
			           echo "<span style = \"padding: 4px 4px; border-radius: 2px;\"><strong>Ward:</strong> " . $p_user_details['ward'] . "</span>"; 
		             }
			   ?>
			 </p>
			 <p style = "padding: 20px; margin-top: -25px; color: #777;">
		       <?php if (IsSet($p_user_details['district']) && 
						 $p_user_details['district'] !== "") {
			           echo "<span style = \"padding: 4px 4px; border-radius: 2px;\"><strong>District:</strong> " . $p_user_details['district'] . "</span>"; 
		             }
			   ?>
			 </p>
			 <p style = "padding: 20px; margin-top: -25px; color: #777;">
		       <?php if (IsSet($p_user_details['lga']) && 
						 $p_user_details['lga'] !== "") {
			           echo "<span style = \"padding: 4px 4px; border-radius: 2px;\"><strong>L.G.A:</strong> " . $p_user_details['lga'] . "</span>"; 
		             }
			   ?>
			 </p>
			 <p style = "padding: 20px; margin-top: -25px; color: #777;">
		       <?php if (IsSet($p_user_details['state']) && 
						 $p_user_details['state'] !== "") {
			           echo "<span style = \"padding: 4px 4px; border-radius: 2px;\"><strong>State:</strong> " . $p_user_details['state'] . "</span>"; 
		             }
			   ?>
			 </p>
			</div>
            <?php } ?>
	  <?php if ((Isset($p_user_details['acct_no']) && $p_user_details['acct_no'] !== "") || 
	            (Isset($p_user_details['bvn']) && $p_user_details['bvn'] !== "") || 
	            (Isset($user_details['bank']) && $p_user_details['bank'] !== "")) { ?>
             <div class = "content_div" style = "clear: none; float: left; width: 30%; display: inline-block; min-width: 200px;">
			 <h3 class = "first_heading">Banking Details</h3>
			 <p style = "padding: 20px; color: #777;">
			   <?php if (IsSet($p_user_details['bank']) && 
						 $p_user_details['bank'] !== "") {
			           echo "<span style = \"padding: 4px 4px; border-radius: 2px;\"><strong>Bank: </strong>" . $p_user_details['bank'] . "</span>"; 
		             }
			   ?>
			 </p>
			<p style = "padding: 20px; margin-top: -25px; color: #777;">
		       <?php if (IsSet($p_user_details['acct_no']) && 
						 $p_user_details['acct_no'] !== "") {
			           echo "<span style = \"padding: 4px 4px; border-radius: 2px;\"><strong>Account No: </strong>" . $p_user_details['acct_no'] . "</span>"; 
		             }
			   ?>
			 </p>
			 <p style = "padding: 20px; margin-top: -25px; color: #777;">
		       <?php if (IsSet($p_user_details['bvn']) && 
						 $p_user_details['bvn'] !== "") {
			           echo "<span style = \"padding: 4px 4px; border-radius: 2px;\"><strong>BVN: </strong>" . $p_user_details['bvn'] . "</span>"; 
		             }
			   ?>
			 </p>
			</div>
            <?php } ?>
		<?php } else { ?>
	  <?php if ((Isset($user_details['home_address']) && $user_details['home_address'] !== "") || 
	            (Isset($user_details['village']) && $user_details['village'] !== "") || 
	            (Isset($user_details['ward']) && $user_details['ward'] !== "") || 
	            (Isset($user_details['district']) && $user_details['district'] !== "") || 
	            (Isset($user_details['lga']) && $user_details['lga'] !== "") || 
	            (Isset($user_details['state']) && $user_details['state'] !== "")) { ?>
             <div class = "content_div" style = "clear: none; float: left; width: 60%;  margin-right: 10%; min-width: 400px;">
			 <h3 class = "first_heading">Address and Location</h3>
			 <p style = "padding: 20px; color: #777;">
			   <?php if (IsSet($user_details['home_address']) && 
						 $user_details['home_address'] !== "") {
			           echo "<span style = \"padding: 4px 4px; border-radius: 2px;\"><strong>Home Address: </strong>" .$user_details['home_address'] . "</span>"; 
		             }
			   ?>
			 </p>
			<p style = "padding: 20px; margin-top: -25px; color: #777;">
		       <?php if (IsSet($user_details['village']) && 
						 $user_details['village'] !== "") {
			           echo "<span style = \"padding: 4px 4px; border-radius: 2px;\"><strong>Village:</strong> " . $user_details['village'] . "</span>"; 
		             }
			   ?>
			 </p>
			 <p style = "padding: 20px; margin-top: -25px; color: #777;">
		       <?php if (IsSet($user_details['ward']) && 
						 $user_details['ward'] !== "") {
			           echo "<span style = \"padding: 4px 4px; border-radius: 2px;\"><strong>Ward:</strong> " . $user_details['ward'] . "</span>"; 
		             }
			   ?>
			 </p>
			 <p style = "padding: 20px; margin-top: -25px; color: #777;">
		       <?php if (IsSet($user_details['district']) && 
						 $user_details['district'] !== "") {
			           echo "<span style = \"padding: 4px 4px; border-radius: 2px;\"><strong>District:</strong> " . $user_details['district'] . "</span>"; 
		             }
			   ?>
			 </p>
			 <p style = "padding: 20px; margin-top: -25px; color: #777;">
		       <?php if (IsSet($user_details['lga']) && 
						 $user_details['lga'] !== "") {
			           echo "<span style = \"padding: 4px 4px; border-radius: 2px;\"><strong>L.G.A:</strong> " . $user_details['lga'] . "</span>"; 
		             }
			   ?>
			 </p>
			 <p style = "padding: 20px; margin-top: -25px; color: #777;">
		       <?php if (IsSet($user_details['state']) && 
						 $user_details['state'] !== "") {
			           echo "<span style = \"padding: 4px 4px; border-radius: 2px;\"><strong>State:</strong> " . $user_details['state'] . "</span>"; 
		             }
			   ?>
			 </p>
			</div>
            <?php } ?>
	  <?php if ((Isset($user_details['acct_no']) && $user_details['acct_no'] !== "") || 
	            (Isset($user_details['bvn']) && $user_details['bvn'] !== "") || 
	            (Isset($user_details['bank']) && $user_details['bank'] !== "")) { ?>
             <div class = "content_div" style = "clear: none; float: left; width: 30%; display: inline-block; min-width: 200px;">
			 <h3 class = "first_heading">Banking Details</h3>
			 <p style = "padding: 20px; color: #777;">
			   <?php if (IsSet($user_details['bank']) && 
						 $user_details['bank'] !== "") {
			           echo "<span style = \"padding: 4px 4px; border-radius: 2px;\"><strong>Bank: </strong>" .$user_details['bank'] . "</span>"; 
		             }
			   ?>
			 </p>
			<p style = "padding: 20px; margin-top: -25px; color: #777;">
		       <?php if (IsSet($user_details['acct_no']) && 
						 $user_details['acct_no'] !== "") {
			           echo "<span style = \"padding: 4px 4px; border-radius: 2px;\"><strong>Account No: </strong>" . $user_details['acct_no'] . "</span>"; 
		             }
			   ?>
			 </p>
			 <p style = "padding: 20px; margin-top: -25px; color: #777;">
		       <?php if (IsSet($user_details['bvn']) && 
						 $user_details['bvn'] !== "") {
			           echo "<span style = \"padding: 4px 4px; border-radius: 2px;\"><strong>BVN: </strong>" . $user_details['bvn'] . "</span>"; 
		             }
			   ?>
			 </p>
			</div>
            <?php } ?>
		<?php } ?>
		
			<?php if (IsSet($p_user_details) && IsSet($p_user_details['user_id']) &&
			          $p_user_details['user_id'] !== $_SESSION['logged_id']) { ?>
					  
					  <?php } else { ?>
			<div class = "content_div" style = "min-width: 300px;">
			 <h3 class = "first_heading">About Yourself</h3>
              <a href = "edit_profile.php" style = "text-decoration: none;"><p id = "no_content_paragraph">
                    Add/Edit your profile details <span style = "font-size: 2em; display: inline-block; margin-top: 10px;">+</span>
                </p></a>
            </div>
			<?php } ?>
		 </div>
	</div>
    
<?php include_once("./includes/footer.php"); ?>
</section>
</body>
</html>