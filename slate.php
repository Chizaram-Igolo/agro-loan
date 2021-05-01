<?php include_once ("./includes/header.php"); ?>
<?php include_once ("./includes/checkUserLogged.php"); ?>
<?php include_once ("./scripts/profileHeaderLogic.php"); ?>
<?php include_once ("./scripts/format_time.php"); ?>
   <script type = "text/javascript">
	function alertMe() {
		//document.getElementById("statusNotifier").style.backgroundColor = "black";
		//document.getElementById("statusNotifier").width = "200px";
    //document.getElementById("statusNotifier").height = "300px"; 
	}
</script>
<?php  
    if (IsSet($_SESSION['logged_email']) && IsSet($_SESSION['logged_pass']) ) {
	  include_once ("./scripts/loadProfileStats.php");
	} else {
	  // header('location: index.php');
	}
?>
<?php
  if (IsSet($_GET['action']) && ($_GET['action'] == "approve")) {
	  
  }
?>
<div id = "mainBodyWrapper">	
<?php //include_once ("./includes/profile_header.php"); ?>
<?php if (IsSet($_SESSION['has_visited']) && $_SESSION['has_visited'] == '0') { 
?>
  <script language = "javascript" type = "text/javascript">
    $(document).ready(function(){
      $("#tourDiv1Holder").fadeIn("slow");
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
	      $("#tourDiv6Holder").fadeIn("slow");
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
 <!--<div id = "tourDiv6Holder">
  <div id = "tourDiv6Hook" style = "">
	</div>
  <div id = "tourDiv6" style = "">
	  <p>Welcome, <strong><?php echo $_SESSION['user_name']; ?>!</strong><span class = "pageNo">(1/7)</span></p><br/>
	  <p>This is your <strong>account dashboard</strong>.</p><br/>
		<p>From here you can customize your account, read messages, chat with a friend and much more.</p>
		<p><a href = "#" id = "closeBtn1">Ok, Got It!</a></p>
  </div>
	</div>
	
  <div id = "tourDiv2Holder">
	<div id = "tourDiv2Hook" style = "">
	</div>
	<div id = "tourDiv2" style = "">
	  <p>This is your <strong>account banner</strong>.<span class = "pageNo">(2/7)</span></p><br/>
		<p>It displays information about you and any other user that you view.</p>
		<p><a href = "#" id = "closeBtn2">Ok, Got It!</a></p>
  </div>
	</div>-->
	
	<div id = "tourDiv2Holder">
	<div id = "tourDiv2Hook" style = "">
	</div>
	<?php global $loan; ?>
	<div id = "tourDiv2" style = "">
	  <p>This is your <strong>profile slate</strong>.<span class = "pageNo">(2/7)</span></p><br/>
		<p>It displays anything you're working on at a given time.</p><br/>
        <p>Records show up here. <?php if (!IsSet($_SESSION['check_is_admin']) || $_SESSION['check_is_admin'] == "0") { ?>
		 Right now, you have no records.
		<?php } ?></p>
		<p style = "margin-top: 10px;"><a href = "#" id = "closeBtn2">Ok, Got It!</a></p>
  </div>
	</div>
	<!--
	<div id = "tourDiv4Holder">
	<div id = "tourDiv4Hook" style = "">
	</div>
	<div id = "tourDiv4" style = "">
	  <p>This are your <strong>quick feeds.</strong>.<span class = "pageNo">(4/7)</span></p><br/>
		<p>They display posts of interest over time to you.</p>
		<p><a href = "#" id = "closeBtn4">Ok, Got It!</a></p>
  </div>
	</div>
	
	<div id = "tourDiv5Holder">
	<div id = "tourDiv5Hook" style = "">
	</div>
	<div id = "tourDiv5" style = "">
	  <p><strong>Other Members</strong><span class = "pageNo">(5/7)</span></p><br/>
	  <p>Other members on this site are shown here over time.</p>
		<p><a href = "#" id = "closeBtn5">Ok, Got It!</a></p>
  </div>
	</div>-->
	
	<div id = "tourDiv1Holder">
	<div id = "tourDiv1Hook" style = "">
	</div>
	<div id = "tourDiv1" style = "">
	 <!-- <p><strong>Your Alias</strong><span class = "pageNo">(1/7)</span></p><br/>
	  <p>From here, you can access your library.</p>
		<p>Move your mouse over your alias to display your library.</p>
		<!--<p><a href = "#">Ok, Got It!</a></p>-->
    <p>Welcome, <strong><?php echo $_SESSION['user_name']; ?>!</strong><span class = "pageNo">(1/7)</span></p><br/>
	  <p>This is your <strong>account dashboard</strong>.</p><br/>
		<p>From here you can customize your account, read messages, chat with a friend and much more.</p>
		<p><a href = "#" id = "closeBtn1">Ok, Got It!</a></p>
  </div>
	</div>
	
	<!--<div id = "tourDiv7Holder">
	<div id = "tourDiv7Hook" style = "">
	</div>
	<div id = "tourDiv7" style = "">
	  <p><strong>Your Library</strong><span class = "pageNo">(7/7)</span></p><br/>
	  <p>Educational materials are available in your library.</p>
		<p><a href = "#" id = "closeBtn7">Ok, Got It!</a></p>
  </div>
	</div>-->
	<div id = "mainDiv">
	   
		<?php include_once ("./includes/post_list.php"); ?>
	 </div>	 
	</div>

	<script language = "javascript" type = "text/javascript" src = "./js/slate.js"></script>
<?php //include_once("./includes/footer.php"); ?>
</div>
</body>
</html>