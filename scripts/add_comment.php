<?php session_start();      
  include_once("../includes/connection.php");  
  include_once("format_time.php"); 
		
	date_default_timezone_set('UTC');
  if (IsSet($_POST['comment']) && $_POST['comment'] !== '') {
    if (IsSet($_SESSION['logged_id'])) {
	    $user_id = $_SESSION['logged_id'];
		}
		
		$user_name = $_SESSION['user_name'];
		$post_id = $_SESSION['post_id'];
			
    $commentText = $_POST['comment'];
    $commentText = $my_handle->real_escape_string($commentText);
		$comment_date = date('Y-m-d, H:i:s A');
    $comment_date = $my_handle->real_escape_string($comment_date);
				
		// Build query string to insert message into the database.
    $addComment_query = "INSERT INTO comments
		                      (post_id, comment_poster, comment_body, comment_date)
			                     VALUES ($post_id, '$user_name', '$commentText', '$comment_date')";
			
	  // Ensure that the message text is not an empty string.
		if (IsSet($commentText) && $commentText !== '') {
			global $my_handle;
		  $result_id = $my_handle->query($addComment_query) or die($my_handle->error);
		  $_POST['comment'] = "";
    	
		  // Retrieve private messages had with the other user sent by this user and vice versa.
      $comment_query = "SELECT * FROM comments WHERE comments.post_id = $post_id ORDER BY comment_id DESC LIMIT 1";			
		  $comment_query_resultID = $my_handle->query($comment_query);
			 
		}
	}
?>

<?php
	// Prevent the program from crashing
	if (IsSet($comment_query_resultID) && is_object($comment_query_resultID)) {
		while ($comment_query_row = $comment_query_resultID->fetch_assoc()) {
		  $comment_time =  formatTime($comment_query_row['comment_date']);	
?>
<?php if (IsSet($comment_query_row['comment_body']) && $comment_query_row['post_id'] == $post_id) { ?>
		<div class = "commentsDiv">
		<h3><?php echo substr($comment_query_row['comment_poster'], 0, 175); ?> said:</h3><span id = "commentDateSpan"><strong><?php echo $comment_time; ?></strong></span>
		<p><?php echo substr($comment_query_row['comment_body'], 0, 175); ?></p>
		</div>
<?php } else { ?>

<?php } } } ?>