<?php session_start();      
  include_once("../includes/connection.php");  
  include_once("format_time.php"); 
		
  date_default_timezone_set('UTC');

  if ((IsSet($_GET['rec_count']) && $_GET['comment_id'] !== '')) {
    if (IsSet($_SESSION['logged_id'])) {
	  $user_id = $_SESSION['logged_id'];
	}
	  
    $recommend_count = $_GET['rec_count'];
    $comment_id= $_GET['comment_id'];
	
    $recommend_date = date('Y-m-d, H:i:s A');
    $recommend_date = $my_handle->real_escape_string($recommend_date);
	  
    // Build query string to insert message into the database.
    $recommend_query = "UPDATE comments SET recommended = $recommend_count WHERE comment_id = '$comment_id'";
	$recommend_records_query = "INSERT INTO comments_recommend (user_id, comment_id, recommend_date_UTC) 
	                            VALUES ('$user_id', '$comment_id', '$recommend_date')";
			
	// Ensure that the message text is not an empty string.
	  if (IsSet($recommend_count) && $recommend_count !== '') {
	    global $my_handle;
		  
		$result_id = $my_handle->query($recommend_query) or die($my_handle->error);
		$result_id_2 = $my_handle->query($recommend_records_query) or die($my_handle->error);
		  
		$_GET['rec_count'] = "";

		} 
	 }
?>

<?php
  if (IsSet($result_id)) {
	  // Retrieve private messages had with the other user sent by this user and vice versa.
      $recommend_count_query = "SELECT recommended FROM comments WHERE comment_id = '$comment_id' LIMIT 1";			
	  $recommend_count_resultID = $my_handle->query($recommend_count_query); 
	  $new_recomment_count = $recommend_count_resultID->fetch_assoc();
	  
	  echo $new_recomment_count['recommended'];
  }
	// Prevent the program from crashing
	/* if (IsSet($pm_query_resultID) && is_object($pm_query_resultID)) {
		while ($pm_query_row = $pm_query_resultID->fetch_assoc()) {
		  $message_time =  formatTime($pm_query_row['message_date_UTC']);	
?>
<?php if (IsSet($pm_query_row['message_body']) && $pm_query_row['sender_id'] == $user_id) { ?>
		<div class = "messageHolderDivOne">
			<div class = "messageDiv">
			<span class = "messageNameTag">You:</span>
			<?php echo $pm_query_row['message_body']; echo "<span class = \"messageDateSpan\">" . $message_time . "</span>"; ?>
			</div>
		</div>	
<?php } else { ?>
		<div class = "messageHolderDivTwo">
			<div class = "messageDiv">
			<span class = "messageNameTag"><?php echo $friend_details_array2['firstname']; ?>:</span>
			<?php echo $pm_query_row['message_body']; echo "<span class = \"messageDateSpan\">" . $message_time . "</span>"; ?>
			</div>
		</div>	
<?php } } } */ ?> 