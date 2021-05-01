<?php global $user_id;
		$user_query = "SELECT * FROM user";
		if (IsSet($user_query)) {
		  $user_resultID = $my_handle->query($user_query);
		}		
?>  

<?php if (IsSet($user_resultID) && is_object($user_resultID) && $user_resultID->num_rows !== 0) { ?>
  <?php while ($user = $user_resultID->fetch_assoc()) { 
		   //$is_flagged = $user['is_flagged'];
		   $s_user_id = $user['user_id'];
		   $is_blocked = $user['is_blocked'];    
  ?>
	 <div class = "wrap-content-div" id = "wrap_content_div<?php echo $s_user_id; ?>" style = "min-width: 1000px; overflow: hidden;">
	 
	 <?php if (IsSet($_SESSION['check_is_admin']) &&  ($_SESSION['check_is_admin'] == "1")){ ?>	
	    	  
			 <div class = "pending-approved-status-div" style = "position: relative; top: 20px; left: 420px;
			  width: 140px; height: auto;
			  overflow; auto; margin: 0px auto; color: #fff; z-index: 100;">
			  
			  <?php if (IsSet($is_blocked) && ($is_blocked == "0")) { ?>
			  <div class = "admin_flag_request_div" id = "admin_flag_user_div<?php echo $s_user_id ?>" style = "position: absolute; float: left; width: 100%; color: #fff;  padding: 2px 2px; border-radius: 40px; text-align: center; height: 20px; font-size: .8em; background: #6699da;">
			    Flag this User
			  </div>
			  <?php } else if (IsSet($is_blocked) && ($is_blocked == "1")) { ?>
			  <div class = "admin_unflg_request_div" id = "admin_unflg_user_div<?php echo $s_user_id ?>" style = "position: absolute; float: left; width: 100%; color: #fff;  padding: 2px 2px; border-radius: 40px; text-align: center; height: 20px; font-size: .8em; background: #6699da;">
			    Unflag this User
			  </div>
			  <?php } else { ?>
			  <div class = "admin_flag_request_div" id = "admin_flag_user_div<?php echo $s_user_id ?>" style = "position: absolute; float: left; width: 100%; color: #fff;  padding: 2px 2px; border-radius: 40px; text-align: center; height: 20px; font-size: .8em; background: #6699da;">
			    Flag this User
			  </div>
			  <?php }?>
			  <!--<div style = "position: absolute; margin-left: 50%; float: left;  padding: 12px 2px; text-align: center; width: 49.25%; height: 40px; font-size: .8em; background: #e13834;">
			    Reject this Loan Request
			  </div>-->
			  </div>
			  
			  <div class = "pending-approved-status-div" style = "position: relative; top: 50px; left: 420px;
			  width: 140px; height: auto;
			  overflow; auto; margin: 0px auto; z-index: 100;">
			  <div class = "admin_delete_request_div" id = "admin_delete_user_div<?php echo $s_user_id ?>" style = "position: absolute; float: left; color: #fff;  width: 100%; padding: 2px 2px; border-radius: 40px; text-align: center; height: 20px; font-size: .8em; background: #6699da;">
			    Delete this User
			  </div>
			  <!--<div style = "position: absolute; margin-left: 50%; float: left;  padding: 12px 2px; text-align: center; width: 49.25%; height: 40px; font-size: .8em; background: #e13834;">
			    Reject this Loan Request
			  </div>-->
			  </div>
			   <div class = "pending-approved-status-div" style = "position: relative; top: 80px; left: 420px;
			  width: 140px; height: auto;
			  overflow; auto; margin: 0px auto; z-index: 100;">
			   <?php if (IsSet($s_user_is_blocked) && ($s_user_is_blocked == "0")) { ?>
			  <div class = "admin_block_user_div" id = "admin_block_user_div<?php echo $s_user_id ?>" style = "position: absolute; float: left; width: 100%; color: #fff; padding: 2px 2px; border-radius: 40px; text-align: center; height: 20px; font-size: .8em; background: #6699da;">
			    Block this User
			  </div>
			   <?php } else if (IsSet($s_user_is_blocked) && ($s_user_is_blocked == 1)) { ?>
			  <div class = "admin_unblk_user_div" id = "admin_unblk_user_div<?php echo $s_user_id ?>" style = "position: absolute; float: left; width: 100%; color: #fff; padding: 2px 2px; border-radius: 40px; text-align: center; height: 20px; font-size: .8em; background: #6699da;">
			    Unblock this User
			  </div>
			   <?php } else { ?>
			    <div class = "admin_block_user_div" id = "admin_block_user_div<?php echo $s_user_id ?>" style = "position: absolute; float: left; width: 100%; color: #fff; padding: 2px 2px; border-radius: 40px; text-align: center; height: 20px; font-size: .8em; background: #6699da;">
			    Block this User
			  </div>
			   <?php } ?>
			  <!--<div style = "position: absolute; margin-left: 50%; float: left;  padding: 12px 2px; text-align: center; width: 49.25%; height: 40px; font-size: .8em; background: #e13834;">
			    Reject this Loan Request
			  </div>-->
			  </div>
	 <?php } ?>
	<div class = "content_div" name = "" style = "min-width: 800px; width: 84%; position: relative; margin-top: 0px; padding-bottom: 30px;">
	
	 <?php if (IsSet($_SESSION['check_is_admin'])){ ?>	
	 <div class = "pending-approved-status-div" style = "position: absolute; top: 28px; left: 170px; 
			  width: 120px; height: auto;
			  overflow; auto; margin: 0px auto; color: #fff; ;">
			  <?php if (IsSet($is_blocked) && $is_blocked == "1") { ?>
			  <div style = "position: absolute; float: left; width: 100%; padding: 2px 2px; border-radius: 40px; text-align: center; height: 20px; font-size: .8em; background: #64bf56; background: #ee0022;">
			    Blocked
			  </div>
			  <?php } else if (IsSet($is_blocked) && $is_blocked == "0") { ?>
			  <div style = "position: absolute; float: left; width: 100%; padding: 2px 2px; border-radius: 40px; text-align: center; height: 20px; font-size: .8em; background: #ee0022;">
			    Rejected
			  </div>
			  <?php } else { ?>
			  <div style = "position: absolute; float: left; width: 100%; padding: 2px 2px; border-radius: 40px; text-align: center; height: 20px; font-size: .8em; background: #eeaa22;">
			    Pending
			  </div>
			  <?php } ?>
			  <!--<div style = "position: absolute; margin-left: 50%; float: left;  padding: 12px 2px; text-align: center; width: 49.25%; height: 40px; font-size: .8em; background: #e13834;">
			    Reject this Loan Request
			  </div>-->
			  </div>
		  <?php } ?>
	   <div id = "firstDivision" style = "margin-top: -20px;">
			
          <br/>
		  <?php if (IsSet($s_user_id)) {     
				  $id = $s_user_id;
				  $username = $user['username'];
				  $firstname = $user['firstname'];
				  $lastname = $user['lastname'];
				  $lastnameInit = substr($user['lastname'], 0, 0);
				 
		  
				  echo "<a href = \"user_profile.php?id=$s_user_id\">";
                } else {
                    if (file_exists("./_members/" . $username . $s_user_id."/profile_pics/pic01.jpg"))                   {
                  echo "<a href = \"./_members/" . $username . $s_user_id . "/profile_pics/pic01.jpg\">";
                    }  else if (file_exists("./_members/" . $username . $s_user_id."/profile_pics/pic01.png")) {
                  echo "<a href = \"./_members/" . $username . $id . "/profile_pics/pic01.png\">";
                    } else if (file_exists("./_members/" . $username . $id."/profile_pics/pic01.gif")) {
                  echo "<a href = \"./_members/" . $username . $id . "/profile_pics/pic01.gif\">";
                    } else {
                       echo "<a href = \"./_members/default/default_pic_small.png\">";
                   }   
                }
                                                                          
                  echo "<div class = \"thumbnail_others\" style = \"width: 48px; height: 48px; padding: 0px; float: left; position: relative; top: 14px; left: 10px; margin-right: 10px; border: 0px solid; box-shadow: 0px 0px 0px #000; background: transparent; z-index: 100;\"> ";
						    $profilePic = "./_members/" . $username . $s_user_id . "/profile_pics/pic01.png";
			
				if (!file_exists($profilePic)) {
				  $profilePic = "./_members/" . $username . $s_user_id . "/profile_pics/pic01.jpg";
				}
                if (!file_exists($profilePic)) {
				  $profilePic = "./_members/" . $username . $s_user_id . "/profile_pics/pic01.gif";
				}                                                        
				if (!file_exists($profilePic)) {
				  $profilePic = "./_members/default/default_pic_small.png";
				} 
				echo "<img src = $profilePic style = \" display: block; margin: auto auto; max-height: 48px; max-width: 48px;\"/>";
			
				
				echo "<span class = \"name\">";
			    echo $firstname . " " . $lastname . "";
				  
				echo "</span>";
				echo "</div>";
				echo "</a>"; ?>
		<a href = "user_profile.php?p=<?php echo $s_user_id; ?>">  	
         
		  </a>
		  <?php if ((IsSet($user['phone_no']) && $user['phone_no'] !== "") ||
		            (IsSet($user['email_address']) && $user['email_address'] !== "") ||
					(IsSet($user['home_address']) && $user['home_address'] !== "") ||
					(IsSet($user['last_login_date_UTC']) && $user['last_login_date_UTC'] !== "")) { ?>
			  <div style = "clear: both; position: relative; left: 60px; font-size: .8em;">
			    <?php if (IsSet($user['phone_no']) && $user['phone_no'] !== "") { ?>
                  <span style = "clear: both; display: inline-block; height: 20px;">					
			        <?php echo $user['phone_no']; ?>
			      </span>
				<?php } ?>
				<?php if (IsSet($user['email_address']) && $user['email_address'] !== "") { ?>
                  <span style = "background: url(./styles/mail.png) no-repeat; padding: 0px 0px 0px 20px;">					
			        <?php echo $user['email_address']; ?>
			      </span><br/>
				<?php } ?>
				 <?php if (IsSet($user['home_address']) && $user['home_address'] !== "") { ?>
                  <span style = "clear: both; display: inline-block; height: 20px; background: url(./styles/location.png) no-repeat; padding: 0px 0px 0px 20px;">					
			        <?php echo $user['home_address']; ?>
			      </span><br/>
				<?php } ?>
				<?php if (IsSet($user['last_login_date_UTC']) && $user['last_login_date_UTC'] !== "") { ?>
                  <span >					
			        <?php echo  "<strong>Last Login Date: </strong>" . $user['last_login_date_UTC']; ?>
			      </span>
				<?php } ?>
			</div><!--End of content div.-->
		  <?php }  ?>
         </div><!--End of content div.-->
		 </div>
<?php }?>
<?php } else { ?>
<div class = "no_records"><div id = "background_div"><h1>There are no records yet. <a href = "create.php" style = "color: #77f;">Get Started.</a></h1></div>
<?php } ?>	 