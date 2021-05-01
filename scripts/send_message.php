<?php session_start();      
  include_once("../includes/connection.php");  
  include_once("format_time.php"); 
		
	date_default_timezone_set('UTC');
  if (IsSet($_POST['messageContent']) && $_POST['messageContent'] !== '') {
    if (IsSet($_SESSION['logged_id'])) {
	    $user_id = $_SESSION['logged_id'];
		}
		
		$message_partnerID = $_SESSION['message_partnerID'];
			
    $messageText = $_POST['messageContent'];
	 
	 $tags = array("<div>", "</div>", "<br>", "<br/>");
     $messageText = str_replace($tags, "", $messageText);
	 $messageText = stripslashes($messageText);
	  
    $messageText = $my_handle->real_escape_string($messageText);
		$message_date = date('Y-m-d, H:i:s A');
    $message_date = $my_handle->real_escape_string($message_date);
				
		// Build query string to insert message into the database.
    $makeMessage_query = "INSERT INTO private_messages
		                      (sender_id, receiver_id, message_body, message_date_UTC)
			                     VALUES ($user_id, $message_partnerID, '$messageText', '$message_date')";
			
	  // Ensure that the message text is not an empty string.
		if (IsSet($messageText) && $messageText !== '') {
			global $my_handle;
		  $result_id = $my_handle->query($makeMessage_query) or die($my_handle->error);
		  $_POST['messageContent'] = "";
    	
		  // Retrieve private messages had with the other user sent by this user and vice versa.
      $pm_query = "SELECT * FROM private_messages WHERE 
									 (sender_id = $user_id AND receiver_id = $message_partnerID) OR
									 (sender_id = $message_partnerID AND receiver_id = $user_id) ORDER BY message_id DESC LIMIT 1";			
		  $pm_query_resultID = $my_handle->query($pm_query);
			 
		}
	}
?>

<?php
	// Prevent the program from crashing
	if (IsSet($pm_query_resultID) && is_object($pm_query_resultID)) {
		while ($pm_query_row = $pm_query_resultID->fetch_assoc()) {
		  $message_time =  formatTime($pm_query_row['message_date_UTC'], "time");	
?>
<?php if (IsSet($pm_query_row['message_body']) && $pm_query_row['sender_id'] == $user_id) { ?>
		 <div class = "messageHolderDivOne">
  				    <div>
		              <!--<span class = "messageNameTag">
					    <?php // echo "You" . ":"; ?>	
				      </span> -->
					    <?php echo ""; ?>
						<?php echo "<div style = \"border: 0px solid; border-left: 4px solid #bdb; box-shadow: 0px 0px 0px #333; padding: 0px 15px 0px 15px; font-size: 105%; line-height: 1.3em;\">" . $pm_query_row['message_body'] . "<p style = \"clear: both; width: auto; display: inline-block; margin-top: 2px; position: absolute; right: 2%; font-size: 95%;\">" . $message_time . "</p>" . "</div>"; ?>
					</div>
				</div>	
<?php } else { ?>
		 <div class = "messageHolderDivTwo">
  				    <div>
		              <!--<span class = "messageNameTag">
					    <?php // echo "You" . ":"; ?>	
				      </span> -->
					    <?php echo ""; ?>
						<?php echo "<div style = \"border: 0px solid; border-left: 4px solid #bdb; box-shadow: 0px 0px 0px #333; padding: 0px 15px 0px 15px; font-size: 105%; line-height: 1.3em;\">" . $pm_query_row['message_body'] . "<p style = \"clear: both; width: auto; display: inline-block; margin-top: 2px; position: absolute; right: 2%; font-size: 95%;\">" . $message_time . "</p>" . "</div>"; ?>
					</div>
				</div>
<?php } } } ?>