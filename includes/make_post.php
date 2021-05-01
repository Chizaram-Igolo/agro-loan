<?php 
  if (IsSet($_SESSION['param']) && IsSet($_SESSION['questionTxt']) &&  IsSet($_POST['xhr_category'])) {
	  global $my_handle;
		
		$post_title = $_SESSION['questionTxt']; // Retrieve the question or post title.
        if (IsSet($_SESSION['questionContent'])) {  // Check to make sure that the question or post has a body.
		  $post_content= $_SESSION['questionContent'];
        } else {
          $post_content = '';
        }
        
        if (strstr($_SESSION['param'], "post")) {
          $post_type = "1";
        } else if (strstr($_SESSION['param'], "question")) {
          $post_type = "2";
        }
            
		$post_category = $_POST['xhr_category'];  // Retrieve the category of the post.
      if (IsSet($_SESSION['logged_id'])) {
        $poster_id = $_SESSION['logged_id'];
      }
      
        // Get rid of tags, slashes and escape html characters
		$post_title = strip_tags($post_title);
		$post_title = stripslashes($post_title);

		$post_content = strip_tags($post_content);
		$post_content = stripslashes($post_content);

		$post_category = strip_tags($post_category);
		$post_category = stripslashes($post_category);

		$post_title = $my_handle->real_escape_string($post_title);
		$post_category = $my_handle->real_escape_string($post_category);
		$post_content = $my_handle->real_escape_string($post_content);

		$post_date = date('Y-m-d, H:i:s A');
		$post_date = $my_handle->real_escape_string($post_date);

		if ($post_title !== '' && $post_category !== '' && $post_date !== '') {
		$insert_post_query = "INSERT INTO posts (poster_id, post_title, post_type, post_category, post_content, post_date) VALUES ('$poster_id, $post_title', $post_type, '$post_category', '$post_content', '$post_date')";
		//$insert_post_resultID = $my_handle->query($insert_post_query) or die($my_handle->error);
		//unset($_POST['title']);
            
         try {
		 if (!$insert_post_resultID = $my_handle->query($insert_post_resultID)) {
		   throw new Exception("\n\n'Error: " . $my_handle->error);
		 } 
	  } catch (Exception $e) {
		  $error_time = date('Y-m-d, H:i:s A e');
	      error_log($e, 3, 'C:\error_logs\error.txt');
	  }
		}
	}
?>