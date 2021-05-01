<?php include_once ("./includes/header.php"); ?>
<?php include_once ("./includes/checkUserLogged.php"); ?>
<?php include_once ("./scripts/profileHeaderLogic.php"); ?>
<?php include_once ("./scripts/loadProfileStats.php"); ?>

<div id = "mainBodyWrapper">	
<?php // include_once ("./includes/profile_header.php"); ?>	
	<div id = "mainDiv" style = "min-width: 300px;">
<div id = "profileSlate">
<br/><br/><br/>
             <div class = "content_div" style = "clear: none; float: left; width: 60%;  margin-right: 10%; min-width: 400px;">
			 <h3 class = "first_heading">Page Settings</h3>
			 
			<p style = "padding: 10px 10px 0px 20px; font-size: 1.em;" title = "How you want records to display on a page.">Page Presentation</p>
			<p id = "" style = "padding: 10px 10px 60px 20px; font-size: 1.em;">
			 <label>Endless Scroll</label><input type="checkbox" id = "endless_scroll" name="page_presentation[0]" value="Endless Scroll" <?php if (IsSet($_SESSION['farmtype1']) && $_SESSION['farmtype1'] !== "") { echo "checked"; } ?>>
        <label>Paginated</label><input type="checkbox" id = "paginated" name="page_presentation[1]" value="Paginated" <?php if (IsSet($_SESSION['farmtype2']) && $_SESSION['farmtype2'] !== "") { echo "checked"; } ?>>
       		</p>
			</div>
             <div class = "content_div" style = "clear: none; float: left; width: 30%; display: inline-block; min-width: 200px;">
			 <h3 class = "first_heading">Account</h3>
			<p id = "" style = "padding: 10px 0px 10px 0px; font-size: 100%;">
                 <span class = "close_account_span" id = "close_account_span<?php echo $user_id; ?>" style = "font-size: 1.0em; display: inline-block; margin: 8px 10px; background: #6f8ab2; color: #fff; padding: 8px 18px">
				 Close Account
				 </span>
                   </p>
			</div>
		 </div>
	</div>  
   <script type = "text/javascript" src = "./js/settings.js"></script>
<?php include_once("./includes/footer.php"); ?>
</section>
</body>
</html>