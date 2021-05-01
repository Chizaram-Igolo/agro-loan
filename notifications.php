<?php include_once ("./includes/header.php"); ?>
<?php include_once ("./includes/checkUserLogged.php"); ?>
<?php include_once ("./scripts/profileHeaderLogic.php"); ?>
<?php //include_once ("./includes/profile_header.php"); ?>
<?php include_once ("./scripts/format_time.php"); ?>

<?php
  if (IsSet($_SESSION['logged_email']) && IsSet($_SESSION['logged_pass']) ) {	  
	} else {
	  header('location: index.php');
	}
?>

<div id = "mainBodyWrapper">
  <?php 
	   if (IsSet($_GET['id'])) {
	     $id = $_GET['id'];
	     $self_url = $_SERVER['PHP_SELF'] . "?id=$id";
		 $checkIfPosse_query = "SELECT * FROM friends
		                        WHERE (mem_id = $id AND mem_id_2 = $user_id)  OR (mem_id = $id AND mem_id_2 = $user_id)";
		 $result_query = $my_handle->query($checkIfPosse_query);
		 if ($result_query->num_rows > 0) {
		 }  else {
	     $form =  "<div style = \"clear: both; position: relative; left: 70%; padding: 10px; margin-top: -85px; \">";
		 $form .= "<form action = \"$self_url\" method = \"post\" name = \"addToPosseForm\">";
		 $form .= $add_to_posse_button; //$pm_button;
		 $form .= "</form>";
		 $form .= "</div>";
		 echo $form;
	   }} 
		 
		/* $friends_query= "SELECT friendship_id FROM friends WHERE mem_id = $user_id OR mem_id_2 = $user_id";	   
	   $friends_resultID = $my_handle->query($friends_query);
		 $friends_num = $friends_resultID->num_rows;
		 
		 $friend_requests_query= "SELECT request_id FROM friend_requests WHERE mem_id_2 = $user_id AND request_granted = '0'";	   
	   $friend_requests_resultID = $my_handle->query($friend_requests_query);
		 $friend_requests_num = $friend_requests_resultID->num_rows;*/

	  // Find out if there are any friend requests.
    /* friend_requests_query = "SELECT * FROM friend_requests WHERE mem_id_2 = $user_id AND request_granted = '0'";
	  $friend_requests_resultID = $my_handle->query($friend_requests_query );
		$friend_requests_num = $friend_requests_resultID->num_rows; */
	?>
    <?php
	  if (IsSet($_POST['acceptPosseRequest']) and $_POST['acceptPosseRequest'] == 'Accept') {
		  $asker_id = $_POST['asker_id'];
		  $acceptPosse_query = "UPDATE friend_requests SET request_granted = '1' WHERE mem_id = $asker_id AND mem_id_2 = $user_id";
		  $result_id = $my_handle->query($acceptPosse_query);
		  
	    $friended_date = date('Y-m-d, H:i:s A');
      $friended_date = $my_handle->real_escape_string($friended_date);
		  if (IsSet($_POST['asker_id'])){
		  $makePosse_query = "INSERT INTO friends (mem_id, mem_id_2, mem_friended_date_UTC) VALUES ($asker_id, $user_id, '$friended_date')";
		  $result_id = $my_handle->query($makePosse_query);
		  unset($_POST['acceptPosseRequest']);
		 }
		 
		 // cheader('location: notification.php');
		}
	 ?>
  <div id = "mainDiv">
	  <script type = "text/javascript" src = "./js/private_message.js"></script>
		<div id = "profileSlate">			
	    <div>
			<?php
			  if (IsSet($_GET['id'])) {
				  $message_partnerID = $_GET['id'];   // Ensure we get the alphabetical characters out of the way.
				  $_SESSION['message_partnerID'] = $_GET['id'];   // Ensure we get the alphabetical characters out of the way.					
			    
					/* Prevent cracking attempts */
					$message_partnerID = strip_tags($message_partnerID);
					$message_partnerID = preg_replace('#[^0-9]#i', '', $message_partnerID);
					$message_partnerID = stripslashes($message_partnerID);
					$message_partnerID = str_replace('`', '', $message_partnerID);
					
					if (IsSet($message_partnerID)) {
						// Retrieve private messages sent by both users.
						$pm_query = "SELECT * FROM private_messages WHERE (sender_id = $user_id AND   receiver_id = $message_partnerID) OR (sender_id = $message_partnerID AND receiver_id = $user_id) ORDER BY message_id ASC";
						$pm_query_resultID = $my_handle->query($pm_query);
						
						
						$friend_details_query2 = "SELECT username, firstname, lastname, othername, last_login_date_UTC, desc_summary FROM user, user_bio_info, user_edu_profile WHERE user_edu_profile.user_id = user_bio_info.user_id AND user_bio_info.user_id = user.user_id AND user.user_id = $message_partnerID";
					
						$friend_details_resultID2 = $my_handle->query($friend_details_query2);
						$friend_details_array2 = $friend_details_resultID2->fetch_assoc();
						$friend_username2 =   $friend_details_array2['username'];
					}
				 }
				?>
            
             <?php /*
             $posse_query = "SELECT mem_id FROM friend_requests WHERE mem_id_2 = $user_id AND request_granted = '0'";
             $posse_query = $my_handle->query($posse_query);
             
              if (IsSet($posse_query) && $posse_query->num_rows > 0 && !IsSet($pm_query_resultID)) { ?> 
              <div class = "content_div">
                  <h1>You have <?php echo $posse_query->num_rows; ?> posse requests.</h1>
              </div>
            <?php } else if (IsSet($pm_query_resultID) && $pm_query_resultID->num_rows > 0 && !IsSet($posse_query)) { ?>
              <div class = "content_div">
                  <h1>You have <?php echo $posse_query->num_rows; ?> posse requests.</h1>
              </div> 
            <?php } else if (IsSet($posse_query) && $posse_query->num_rows > 0 && IsSet($pm_query_resultID) && $pm_query_resultID->num_rows > 0 ) { ?>
              <div class = "content_div">
                  <h1>You have <?php echo $posse_query->num_rows; ?> posse requests and <?php echo $pm_query_resultID->num_rows; ?> messages.</h1>
              </div> 
            <?php } */?>
            
				<?php 
				  // Prevent the program from crashing
				  if (IsSet($pm_query_resultID) && is_object($pm_query_resultID)) {
			      while ($pm_query_row = $pm_query_resultID->fetch_assoc()) {
						 $message_time =  formatTime($pm_query_row['message_date_UTC']);
				?>
				<?php if (IsSet($pm_query_row['message_body']) && $pm_query_row['sender_id'] == $user_id) { ?>
				    <!--Retrieve the messages sent by this user with a little bit of HTML formatting-->
					  <div class = "messageHolderDivOne">
  				    <div class = "messageDiv">
		          <span class = "messageNameTag">You:</span>
						
				      <?php echo $pm_query_row['message_body']; echo "<span class = \"messageDateSpan\">" . $message_time . "</span>"; ?>
					    </div>
						</div>	
			  <?php } else { ?>
				    s<!--Retrieve the messages sent by the other users with a little bit of HTML formatting-->
				    <div class = "messageHolderDivTwo">
						  <div class = "messageDiv">
		          <span class = "messageNameTag"><?php echo $friend_details_array2['firstname']; ?>:</span>
				      <?php echo $pm_query_row['message_body']; echo "<span class = \"messageDateSpan\">" . $message_time . "</span>"; ?>
					    </div>
						</div>	
				<?php } } }?>
                
            <!--------------------->
		    <?php
			// Find out if there are any friend requests.
			
			// $no_of_rows = $posse_query->num_rows;
			 // $asker_id = $_SESSION['logged_id'];
            if (IsSet($posse_query) && is_object($posse_query)) {
                
			while($posse_array = $posse_query->fetch_assoc()) {
			     
				$asker_id = $posse_array['mem_id'];
				 
				$asker_details_query = "SELECT user.user_id, username, firstname, lastname, sex, user_edu_profile.desc_summary FROM user, user_bio_info, user_edu_profile WHERE user_edu_profile.user_id = user_bio_info.user_id AND
																user_bio_info.user_id = user.user_id AND
																user.user_id = $asker_id LIMIT 1";
				$asker_details_resultID  = $my_handle->query($asker_details_query) or die($my_handle->error);
				$asker_details = $asker_details_resultID->fetch_assoc();
				
			  $asker_edu_profile_query = "SELECT * FROM user, user_bio_info WHERE user.user_id = $user_id";
				$asker_edu_profile_resultID = $my_handle->query($asker_edu_profile_query);
				$asker_edu_profile = $asker_edu_profile_resultID->fetch_assoc(); 
                
				echo "<div class = 'postList'>";
                echo "<div class = \"posseRequestDiv\">";
                echo "<a href = \"user_profile.php?id=$asker_id\" class = \"userProfileLink\">";
                echo "<div class = \"thumbnail_others\"> ";
				
                $profilePic = "./_members/" . $asker_details['username'] . $asker_id . "/profile_pics/pic01.png";
			
				if (!file_exists($profilePic)) {
				  $profilePic = "./_members/" . $asker_details['username'] . $asker_id . "/profile_pics/pic01.jpg";
				}
				if (!file_exists($profilePic)) {
				  $profilePic = "./_members/default/default_pic_small.png";
				} 
				echo "<img src = $profilePic style = \" display: block; margin: auto auto; max-height: 48px; max-width: 48px;\"/>";
				
				echo "<span class = \"name\" id = \"requestName\">";
			    echo $asker_details['firstname'] . " " . $asker_details['lastname'];
				echo "</span>";
				echo "</a>"; 
                echo "</div>";
				echo "</div>";
				
                
		   if ($asker_details['sex'] == 'M') {
		     $pronoun = "His";
		   } else {
		      $pronoun = "Her";
		   }
		   
		   echo "<div class = \"requestTextDiv\">";
		   if (IsSet($asker_details['desc_summary'])) {
           }
		    echo "<p style = \"\">has requested to add you to " . $pronoun . " Posse.</p></div>";
		  $self_url = $_SERVER['PHP_SELF'];
	     $form =  "<div class = \"requestTextFormDiv\">";
		 $form .= "<form action = \"$self_url\" method = \"post\">";
		 $form .= "<input type = \"submit\" name = \"acceptPosseRequest\" value = \"Accept\" style = \"border-radius: 0px; font-size: 110%; background: #6f8ab2;\"/>";
		 $form .= "<input type = \"hidden\" name = \"asker_id\" value = \"$asker_id\" />";
		 $form .= "   " . "<input type = \"submit\" name = \"rejectPosseRequest\" value = \"Decline\" style = \"background: #a54; border-radius: 0px; font-size: 110%; margin-left: 5px;\"/>";
		 $form .= "</form>";
		 $form .= "</div>";
		 echo $form;
		   echo "";
		   echo "</div>"; 
           echo "</div>";
			 }}
		    ?>
            <!----------------------->
            <?php if (!IsSet($posse_query)) 
						{ 
					     // $posse_query->num_rows == 0;
						} else { ?> 
             
            <div class = "no_msg_notif"><h1 class = "no_msg_notif_h1" style= "background: url('styles/no_mail.png') no-repeat 20px 20px;">You have no new messages or notifications.</h1></div>
            <?php } ?>
           </div>
                
	
				<!--<div id = "messageFormDiv">
				  <form id = "messageForm" method = "post">
				    <span id = "friendLinkSpan">
						  <a href = "#">View <?php //echo $friend_details_array2['firstname']; ?>'s Wall</a>
						</span>
			      <textarea id = "messageText" name = "messageText" placeholder = "Type your message here..."></textarea>
			      <div>
						  <span id = "status"></span>
						</div>
						<div id = "sendButtonDiv">
						 <button type = "button" name = "sendMessage" onclick = "send_message()">Send Message</button>
						</div>
			      <input type = "hidden" name =  "" value = "37.8" />
			    </form>
				</div>-->
		</div><!--End of profileSlate-->
	</div><!--End of mainDiv-->
	
	</div><!--End of mainBodyWrapper-->
<?php include_once("./includes/footer.php"); ?>
	</section>
	</body>
</html>