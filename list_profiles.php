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

	<div id = "mainDiv" style = "padding-top: 20px;">
	   
		<?php include_once ("./includes/profile_list.php"); ?>
	 </div>	 
	</div>

	<script language = "javascript" type = "text/javascript" src = "./js/slate.js"></script>

</div>
<?php // include_once("./includes/footer.php"); ?>
</body>
</html>