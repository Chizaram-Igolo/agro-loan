<?php 
      session_start();  // We need to know that a person has visited the site and track their events from the home page.
      include_once("classes.php");           // Includes the classes file which contain all the needed classes.
      include_once ("./includes/functions.php"); // Include all the necessary functions to make this web application work correctly.  

  if (formSignUp($_POST) === true) {
     // flush();
     // ob_flush();
     header('location: register_two.php');
  } else {
     // header('location: register.php');
  }
  
  if (IsSet($_POST['preview'])) {
     // flush();
     // ob_flush();
     header('location: preview.php');
  } else {
     // header('location: preview.php');
  }

  if (finishSignUp($_POST) === true) {
     // flush();
     // ob_flush();
     header('location: success.php');
  } else {
     // header('location: register.php');
  }

  if (IsSet($_POST['questionTxt']) && $_POST['questionTxt'] !== "") {
    $_SESSION['questionTxt'] = $_POST['questionTxt']; 
    header('location: ask_a_question.php');
   } else if (IsSet($_POST['postTxt']) && $_POST['postTxt'] !== "") {
    $_SESSION['postTxt'] = $_POST['postTxt']; 
    header('location: ask_a_question.php');
   } else if (IsSet($_POST['projectTxt']) && $_POST['projectTxt'] !== "") {
    $_SESSION['projectTxt'] = $_POST['projectTxt']; 
    header('location: create_project.php');
   }

  if (IsSet($_POST['createProject']) && IsSet($_SESSION['uid2']) && IsSet($_SESSION['uid'])) {
    header('location: user_profile.php');
}

    // Check if javascript is enabled 
	// if (IsSet($_POST['jsEnabled'])) {
	// Authenticate user before signing the user in.         
	// This function is declared in the "functions.php" file included above
     if (IsSet($_POST['signIn']))
	authUser();   // If user successfully and geniunely logs in.
	//}
    // Initiate sign up from the home page. Rest of sign up is finished at 'register.php'
	
    if (IsSet($_POST['signInButton'])) {
      authUser();
    }
	
	 if (IsSet($_GET['p']) && $_GET['p'] == 'signout') {
      signOut();
	}
	
	if (strstr($_SERVER['PHP_SELF'], "user_profile.php") && 
	     !IsSet($_SESSION['logged_email'])) {
	   header('location: sign_in.php');
	} 
	if (strstr($_SERVER['PHP_SELF'], "edit_profile.php") && 
	     !IsSet($_SESSION['logged_email'])) {
	   header('location: sign_in.php');
	} 
	if (strstr($_SERVER['PHP_SELF'], "create.php") && 
	     !IsSet($_SESSION['logged_email'])) {
	   header('location: sign_in.php');
	} 
	if (strstr($_SERVER['PHP_SELF'], "slate.php") && 
	     !IsSet($_SESSION['logged_email'])) {
	   header('location: sign_in.php');
	} 
	if (strstr($_SERVER['PHP_SELF'], "list_profiles.php") && 
	     !IsSet($_SESSION['logged_email'])) {
	   header('location: sign_in.php');
	} 
	if (strstr($_SERVER['PHP_SELF'], "settings.php") && 
	     !IsSet($_SESSION['logged_email'])) {
	   header('location: sign_in.php');
	} 
	if (strstr($_SERVER['PHP_SELF'], "create.php") && 
	     ($_SESSION['check_is_admin']) == "1") {
	   header('location: slate.php');
	} 
    if (strstr($_SERVER['PHP_SELF'], "list_profiles.php") && 
	     ($_SESSION['check_is_admin']) == "0") {
	   header('location: user_profile.php');
	} 
?>

<!DOCTYPE html>
<html>
  <head lang = "en">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0'/>
    <meta name = "keywords" content = "" charset= "utf-8" />
	  <?php
	    if (strstr($_SERVER['PHP_SELF'], "index")) {
		  echo "<title>" . COMPANY_NAME . " - Home</title>";
		} else if (strstr($_SERVER['PHP_SELF'], "about")) {
		  echo "<title>" . COMPANY_NAME . " - About</title>";
		} else if (strstr($_SERVER['PHP_SELF'], "contact")) {
		  echo "<title>" . COMPANY_NAME . " - Contact Us</title>";
		} else if (strstr($_SERVER['PHP_SELF'], "edit")) {
		  echo "<title>" . COMPANY_NAME . " - Edit Your Profile</title>";
		} else if (strstr($_SERVER['PHP_SELF'], "profile")) {
		  echo "<title>" . COMPANY_NAME . " - Your Profile</title>";
		} else if (strstr($_SERVER['PHP_SELF'], "privacy")) {
		  echo "<title>" . COMPANY_NAME . " - Privacy Policy</title>";
		}
	  ?>
    <?php include('./includes/styles.inc'); ?>
    <link rel = "icon" type = "image/png" href = "./styles/nirsal-favicon.png" />    
    <script language = "javascript" type = "text/javascript" src = "./js/jquery-3.1.0.min.js"></script>
		<script language = "javascript" type = "text/javascript" src = "./js/schoolboss.js"></script>
    <script language = "javascript" type = "text/javascript" src = "./js/register.js"></script>
    <script language = "javascript" type = "text/javascript" src = "./js/posts.js"></script>
		<script language = "javascript" type = "text/javascript" src = "./js/index.js"></script>
		<script language = "javascript" type = "text/javascript" src = "./js/contact.js"></script>
    <!--[if lte IE 8]>
        <link rel = "stylesheet" type = "text/css" href = "./styles/ie8_and_down.css" />
    <![endif]-->
      <!--[if lte IE 11]>
        <style style = "text/css">
     select {
          -webkit-appearance: none;
          -moz-appearance: none;
          -o-appearance: none;
          -ms-appearance: none;
          appearance: none;
          overflow: hidden;
          background: #fff; 
            }
</style>
<script>
  if ($.browser .msie) {
  $("#username").val('sss');
}
</script>
    <![endif]-->
 
  </head> 
  <body id = "body">
    <div id = "upgradeBrowserMessage"><h1>Oops, Your browser version is not supported.<br/><br/>Please upgrade your browser.&nbsp;<a href = "https://www.microsoft.com/en-us/download/internet-explorer-9-details.aspx">Download New Browser.</a></h1></div>
    <div id = "section">
    <div id = "header">  
      <div id = "colours">
        <span id = "darkGrey"></span><span id = "purple"></span>
        <span id = "darkOrange"></span><span id = "darkRed"></span>
        <span id = "darkGreen"></span>
      </div>	
      <div id = "mainNav">	
 	  <a href = "index.php"><div id = "trademarkDiv">
 	      <div class = "small_levels" id = "level_1">
 	      <span class = "small_boxes" id = "box_1"></span>
 	      <span class = "small_boxes" id = "box_2"></span>
 	      <span class = "small_boxes" id = "box_3"></span>
 	      <span class = "small_boxes" id = "box_4"></span>
 	      </div>
 	      <div class = "small_levels" id = "level_2">
 	      <span class = "small_boxes" id = "box_5"></span>
 	      <span class = "small_boxes" id = "box_6"></span>
 	      <span class = "small_boxes" id = "box_7"></span>
 	      <span class = "small_boxes" id = "box_8"></span>
 	      </div>
 	      <div class = "small_levels" id = "level_3">
 	      <span class = "small_boxes" id = "box_9"></span>
 	      <span class = "small_boxes" id = "box_10"></span>
 	      <span class = "small_boxes" id = "box_11"></span>
 	      <span class = "small_boxes" id = "box_12"></span>
 	      </div>
 	      <div class = "small_levels" id = "level_4">
 	      <span class = "small_boxes" id = "box_13"></span>
 	      <span class = "small_boxes" id = "box_14"></span>
 	      <span class = "small_boxes" id = "box_15"></span>
 	      <span class = "small_boxes" id = "box_16"></span>
 	      </div>
 	      <div class = "small_levels" id = "level_5">
 	      <span class = "small_boxes" id = "box_17"></span>
 	      <span class = "small_boxes" id = "box_18"></span>
 	      <span class = "small_boxes" id = "box_19"></span>
 	      <span class = "small_boxes" id = "box_20"></span>
 	      </div>
 	      <div class = "small_levels" id = "level_6">
 	      <span class = "small_boxes" id = "box_21"></span>
 	      <span class = "small_boxes" id = "box_22"></span>
 	      <span class = "small_boxes" id = "box_23"></span>
 	      <span class = "small_boxes" id = "box_24"></span>
 	      </div>
 	      <div class = "small_levels" id = "level_7">
 	      <span class = "small_boxes" id = "box_25"></span>
 	      <span class = "small_boxes" id = "box_26"></span>
 	      <span class = "small_boxes" id = "box_27"></span>
 	      <span class = "small_boxes" id = "box_28"></span>
 	      </div>
 	      <div class = "small_levels" id = "level_8">
 	      <span class = "small_boxes" id = "box_29"></span>
 	      <span class = "small_boxes" id = "box_30"></span>
 	      <span class = "small_boxes" id = "box_31"></span>
 	      <span class = "small_boxes" id = "box_32"></span>
 	      </div>
 	      <div class = "small_levels" id = "level_9">
 	      <span class = "small_boxes" id = "box_33"></span>
 	      <span class = "small_boxes" id = "box_34"></span>
 	      <span class = "small_boxes" id = "box_35"></span>
 	      <span class = "small_boxes" id = "box_36"></span>
 	      </div>
 	      <span id = "tradeName">DERDC</span>
        <!--<span id = "firstBox"></span><span id = "secondBox"></span><span id = "thirdBox"></span><span id = "brandName">NIRSAL</span><span id = "brandName2">&nbsp;</span>
        <!---<span id = "altBrandName">s</span><span id = "altBrandName2">b</span>-->
        </div>
        </a>
      
      <div id = "options-menu-button-div">
				  <ul id = "options-menu-list-ul">
					 <li id = "options-menu-list-li"><a href = "#" class = "helpLinks" id = "options-menu-button-link"><span id = "l_01"></span><span id = "l_02"></span><span id = "l_03"></span></a>
            <div class = "options-menu-list" id = "options-menu-list-div">
						<div id = "options-menu-list-anchor"></div><div>
         	    <ul>
								<div id = "small-links"><ul>
<?php if (!IsSet($_SESSION['logged_email'])) { ?>
<li><a href = "sign_in.php" class = "helpLinks">Sign In</a><a href = "register.php">Create An Account</a></li>
<?php } ?>
         	      <li><a href = "about.php">About <?php echo COMPANY_NAME; ?></a>
        <a href = "contact.php">Contact</a>
			<hr style = "clear: both; border: 1px solid #fafaef; color: #aa8; background: #aa8;" />

   	  <?php if (IsSet($_SESSION['logged_email']) && IsSet($_SESSION['check_is_admin']) && $_SESSION['check_is_admin'] == "1") { ?>
		 <li style = "text-align: center; font-size: .8em; padding-top: 10px; padding-bottom: 10px; margin-bottom: -10px;">View Users/Admins</li>
			 <li>
			   <a href = "list_profiles.php" style = "width: 33.333%; font-size: .9em; text-align: center;">Users</a>
			   <a href = "list_profiles.php" style = "width: 33.333%; font-size: .9em; text-align: center;">Admins</a>
			   <a href = "list_profiles.php" style = "width: 33.333%; font-size: .9em; text-align: center;">All</a></li>
			     <hr style = "clear: both; border: 1px solid #fafaef; color: #aa8; background: #aa8;" />

			  			<?php } ?>
			 <?php if (IsSet($_SESSION['logged_email'])) { ?>
					 <li style = "text-align: center; font-size: .8em; padding-top: 10px; padding-bottom: 10px; margin-bottom: -10px;">View Requests</li>
			 <li>
			   <a href = "slate.php?q=pending" style = "width: 33.333%; font-size: .9em; text-align: center;">Pending</a>
			   <a href = "slate.php?q=approved" style = "width: 33.333%; font-size: .9em; text-align: center;">Approved</a>
			   <a href = "slate.php?q=rejected" style = "width: 33.333%; font-size: .9em; text-align: center;">Rejected</a></li>
			   <hr style = "clear: both; border: 1px solid #fafaef; color: #aa8; background: #aa8;" />
			 <?php } ?>
      <li><a href = "terms_of_use.php">Terms of Use</a>
      <a href = "privacy_policy.php">Privacy Policy</a>
	  <?php if (IsSet($_SESSION['logged_email']) && strstr($_SERVER['PHP_SELF'], "user_profile")) { ?>
	    <li><a href = "#" id = "take_tutorial">Take Tutorial</a></li>
	  <?php } ?>
   	  <?php if (IsSet($_SESSION['logged_email'])) { ?>
			  <li><a href = "settings.php">Settings</a><a href = "index.php?p=signout">Sign Out</a></li>
			<?php } ?>
				 
								</ul></div>
							</ul></div>
         	  </div>
	        </li>
					</ul></div>
				</ul></div>
		
      </div>			
          
    <?php if (IsSet($_SESSION['logged_email'])) { ?>
        <div id = "accountOptions">
        <ul>
            <li><a href = "slate.php" class = "" id = "slateLink" title = "Post Slate"><span></span></a></li>
          <li><a href = "user_profile.php" class = "" id = "profileLink" title = "Your Profile"></a></li>
            <!--<li><a href = "private_message.php" class = "" id = "notifsLink"></a></li>-->
            <!--<li><a href = "notifications.php" class = "" id = "notifsLink" title = "Notifications"><?php if (IsSet($notifs_num) && $notifs_num > 0) { echo "<span style = \"display: inline-block; width: auto; height: auto; padding: 0px 4px; position: relative; left: 10px; background: #ee5a5a; color: #fff;\">" . $notifs_num . "</span>"; } ?></a></li>
            <li><a href = "settings.php" class = "" id = "settingsLink" title = "Settings"></a></li>-->
        </ul></div>
    <?php } ?>
       
		 <?php if (IsSet($_SESSION['check_is_admin']) && ($_SESSION['check_is_admin'] == "1")) { ?>
		  <div id = "admin-status-div">
			  <div id = "admin-status-text-div">
			   Logged in as Admin <?php echo (IsSet($_SESSION['logged_id'])?": " . $_SESSION['logged_id']:''); ?>
			  </div>
          </div>
			
		  <div id = "admin-status-div-small">
			  <div id = "admin-status-text-div-small">
			  Admin<?php echo (IsSet($_SESSION['logged_id'])?": " . 'd' . $_SESSION['logged_id']:''); ?>
			  </div>
		</div>
		 <?php } ?>
  </div>
</div>