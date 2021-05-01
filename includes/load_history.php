<?php global $user_id;
		$user_query = "SELECT * FROM user where user_id = $user_id";
		if (IsSet($user_query)) {
		  $user_resultID = $my_handle->query($user_query);
		}		
		$op_query = "SELECT * FROM loan where user_id = $user_id";
		if (IsSet($user_query)) {
		  $op_resultID = $my_handle->query($op_query);
		}	
?>  

<?php if (IsSet($user_resultID) && is_object($user_resultID) && $user_resultID->num_rows !== 0) { ?>
  <?php $user = $user_resultID->fetch_assoc();
		   //$is_flagged = $user['is_flagged'];
		   $s_user_id = $user['user_id'];
		   $is_blocked = $user['is_blocked'];    
  ?>
  <div class = "wrap-content-div" id = "wrap_content_div<?php echo $s_user_id; ?>" style = "min-width: 1000px; overflow: hidden;">
 <div class = "content_div" name = "" style = "min-width: 800px; width: 84%; position: relative; margin-top: 0px; padding-bottom: 30px;">
	 
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
                                                                          
                  echo "<div class = \"thumbnail_others\" style = \"width: 48px; height: 48px; float: left; position: relative; top: 14px; left: 10px; margin-right: 10px; border: 0px solid; box-shadow: 0px 0px 0px #000; background: transparent; z-index: 100;\"> ";
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
			</div>
		  <?php }  ?>
         </div> 
		 
	 <div id = "firstDivision" style = "margin-top: 20px;">
 <?php  
		while ($op = $op_resultID->fetch_assoc()) { 
		   //$is_flagged = $user['is_flagged'];
		   $op_id = $op['loan_id'];
		  // $is_blocked = $user['is_blocked'];   
		  
  ?>
  	 
		  <?php if ((IsSet($op['loan_id']) && $op['loan_id'] !== "") ||
		            (IsSet($op['loan_amount']) && $op['loan_amount'] !== "") ||
					(IsSet($user['home_address']) && $user['home_address'] !== "") ||
					(IsSet($user['last_login_date_UTC']) && $user['last_login_date_UTC'] !== "")) { ?>
			  <div style = "clear: both; position: relative; left: 60px; font-size: .8em;">
			    <?php if (IsSet($op['loan_id']) && $op['loan_id'] !== "") { ?>
                  <span style = "clear: both; display: inline-block; height: 20px;">					
			        <?php echo $op['loan_id']; ?>
			      </span>
				<?php } ?>
				<?php if (IsSet($op['loan_amount']) && $op['loan_amount'] !== "") { ?>
                  <span style = "">					
			        <?php echo $op['loan_amount']; ?>
			      </span>
				<?php } ?>
				 <?php if (IsSet($op['approval_status']) && $op['approval_status'] !== "") { ?>
                  <span style = "clear: both; display: inline-block; height: 20px;">					
			        <?php echo $op['approval_status']; ?>
			      </span>
				<?php } else { ?>
				 <span style = "clear: both; display: inline-block; height: 20px;">		
				   <?php echo "pending"; ?>
				    </span>
				<?php } ?>
				<?php if (IsSet($op['entry_date']) && $op['entry_date'] !== "") { ?>
                  <span >					
			        <?php echo $op['entry_date']; ?>
			      </span>
				<?php } ?>
			</div>
		  <?php }  ?>
       
<?php }?>
  </div>
</div>
</div>
<?php } else { ?>
<div class = "no_records"><div id = "background_div"><h1>There are no records yet. <a href = "create.php" style = "color: #77f;">Get Started.</a></h1></div>
<?php } ?>	 