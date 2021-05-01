<?php session_start();      
  include_once("../includes/connection.php");  
  include_once("../includes/functions.php");
  include_once("../scripts/format_time.php"); 
	date_default_timezone_set('UTC');
	
  if (IsSet($_POST['pic']) && $_POST['pic'] !== '') {
	  // $s_user_id = $_POST['user_id'];
	  // $todo = $_POST['todo'];
	  $passed_pic = $_POST['pic'];
    if (IsSet($_SESSION['logged_id'])) {
	    $s_user_id = $_SESSION['logged_id'];
	    $s_user_name = $_SESSION['user_name'];
		}
		
	$date = date('Y-m-d, H:i:s A');
    $date = $my_handle->real_escape_string($date);
	
		  
    global $image_dir;
	global $image_arg;
	global $image_uploaded;
	
	function image_process($image_dir, $image_arg) { 
	global $username;
	global $user_id;
	
	global $image_dir;
	global $image_arg;
	global $image_uploaded;
	var_dump($_FILES);
	  $fileName = $passed_pic["{$image_uploaded}"]["name"];
    $fileTmpLoc = $_FILES["{$image_uploaded}"]["tmp_name"];
    $fileType = $_FILES["{$image_uploaded}"]["type"];
    $fileError = $_FILES["{$image_uploaded}"]["error"];
    $fileSize = $_FILES["{$image_uploaded}"]["size"];
    $fileNameParts = explode(".", $fileName);
		$fileExt = $fileNameParts[1];
			//var_dump(($_FILES["{$image_uploaded}"]));
		if ($fileSize > 3145728) { 
			// If file size is larger than 2 megabyte
	    unlink($fileTmpLoc);  // Remove the uploaded file from the PHP tmp folder
			die("ERROR: Your file was laregr than 5 megabytes in size");
		} 
		else if (!strstr($fileName, "jpg") && !strstr($fileName, "png") && !strstr($fileName, "gif")) {
			// If the file uploaded is not of the required type
			unlink($fileTmpLoc);  // Remove the uploaded file from the PHP tmp folder
		  die("ERROR: Your file was not .gif, .jpg, or .png");
		} 
	  else if ($fileError == 1) {
			die("ERROR: An error occured while processing. Try again.");
		}
		
		if (strstr($fileName, "jpg")) {
		  $fileName = "pic01.jpg";
		} else if (strstr($fileName, "png")) {
		  $fileName = "pic01.png";
		} else if (strstr($fileName, "gif")) {
		  $fileName = "pic01.gif";
		}
		
		$moveResult = move_uploaded_file($fileTmpLoc, "./_members/$username$user_id/{$image_dir}/temp_$fileName");
		
		if ($moveResult !== true) {
		  unlink($fileTmpLoc);  // Remove the uploaded file from the PHP tmp folder
		  die("ERROR: File not uploaded. Try again.");
		} 
		else {
			// echo "SUCCESS: File uploaded was a success!";
		}
  
  unset($_FILES["uploadedPic"]);
	 
	 $target_file = "./_members/$username$user_id/{$image_dir}/temp_$fileName";
	 $resized_file = "./_members/$username$user_id/{$image_dir}/$fileName";
	 $resized_file_mobile = "./_members/$username$user_id/{$image_dir}/mobile_$fileName";
        
	 $cropped_file = "./_members/$username$user_id/{$image_dir}/$fileName"; 
	 $cropped_file_mobile = "./_members/$username$user_id/{$image_dir}/mobile_$fileName"; 
	 $wmax = 200;
	 $hmax = 200;
     /* For smaller displays. */
     $w_mobile_max = 100;
     $h_mobile_max = 100;

	 function img_crop($scaled_pic, $cropped_copy, $ext){
		 global $image_dir;
		 global $image_arg;
		 
        /* Crop image */ 
          $img = "";
		 if ($ext == "gif" || $ext == "GIF") {
		   $img = imagecreatefromgif($scaled_pic);
           $size = min(imagesx($img), imagesy($img));
           $img2 = imagecrop($img, ['x' => 0, 'y' => 0, 'width' => $size, 'height' => $size]);
           if ($img2 !== FALSE) {
             return(imagegif($img2, $cropped_copy));
           }
		 } else if ($ext == "png" || $ext == "PNG") {
		   $img = imagecreatefrompng($scaled_pic);
           $size = min(imagesx($img), imagesy($img));
           $img2 = imagecrop($img, ['x' => 0, 'y' => 0, 'width' => $size, 'height' => $size]);
           if ($img2 !== FALSE) {
             return(imagepng($img2, $cropped_copy));
           }   
          } else {
		   $img = imagecreatefromjpeg($scaled_pic);
           $size = min(imagesx($img), imagesy($img));
           $img2 = imagecrop($img, ['x' => 0, 'y' => 0, 'width' => $size, 'height' => $size]);
           if ($img2 !== FALSE) {
            return(imagejpeg($img2, $cropped_copy));
           }
         }     
       }
      
      function ak_img_resize($target, $newcopy, $w, $h, $ext) {
       global $username;
       global $user_id;
	   
	   global $image_dir;
	   global $image_arg;
	   list($w_orig, $h_orig) = getimagesize($target);
		 $scale_ratio = $w_orig/$h_orig;
		 if (($w/$h) > $scale_ratio) {
		   $w = $h * $scale_ratio;
		 } else {
		   $h = $w/$scale_ratio;
		 }
		 $img = "";
		 if ($ext == "gif" || $ext == "GIF") {
		   $img = imagecreatefromgif($target);
           $tci = imagecreatetruecolor($w, $h);
		   imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
		    imagegif($tci, $newcopy, 100);
		 if (file_exists("_members/$username$user_id/{$image_dir}/{$image_arg}01.png")) {
               unlink("_members/$username$user_id/{$image_dir}/{$image_arg}01.png");
             }
              if (file_exists("_members/$username$user_id/{$image_dir}/mobile_{$image_arg}01.png")) {
               unlink("_members/$username$user_id/{$image_dir}/mobile_{$image_arg}01.png");
             } if (file_exists("_members/$username$user_id/{$image_dir}/temp_{$image_arg}01.png")) {
               unlink("_members/$username$user_id/{$image_dir}/temp_{$image_arg}01.png");
             }
             
              if (file_exists("_members/$username$user_id/{$image_dir}/{$image_arg}01.jpg")) {
               unlink("_members/$username$user_id/{$image_dir}/{$image_arg}01.jpg");
             }
              if (file_exists("_members/$username$user_id/{$image_dir}/mobile_{$image_arg}01.jpg")) {
               unlink("_members/$username$user_id/{$image_dir}/mobile{$image_arg}01.jpg");
             } if (file_exists("_members/$username$user_id/{$image_dir}/temp{$image_arg}01.jpg")) {
               unlink("_members/$username$user_id/{$image_dir}/temp{$image_arg}01.jpg");
             }
       } else if ($ext == "png" || $ext == "PNG") {
		   $img = imagecreatefrompng($target);
           $tci = imagecreatetruecolor($w, $h);
		   imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
		   imagepng($tci, $newcopy, 9);
              if (file_exists("_members/$username$user_id/{$image_dir}/{$image_arg}01.jpg")) {
               unlink("_members/$username$user_id/{$image_dir}/{$image_arg}01.jpg");
             }
              if (file_exists("_members/$username$user_id/{$image_dir}/mobile{$image_arg}01.jpg")) {
               unlink("_members/$username$user_id/{$image_dir}/mobile{$image_arg}01.jpg");
             } if (file_exists("_members/$username$user_id/{$image_dir}/temp_{$image_arg}01.jpg")) {
               unlink("_members/$username$user_id/{$image_dir}/temp_{$image_arg}01.jpg");
             }
              if (file_exists("_members/$username$user_id/{$image_dir}/{$image_arg}01.gif")) {
               unlink("_members/$username$user_id/{$image_dir}/{$image_arg}01.gif");
             }
              if (file_exists("_members/$username$user_id/{$image_dir}/mobile_{$image_arg}01.gif")) {
               unlink("_members/$username$user_id/{$image_dir}/mobile_{$image_arg}01.gif");
             } if (file_exists("_members/$username$user_id/{$image_dir}/temp_{$image_arg}01.gif")) {
               unlink("_members/$username$user_id/{$image_dir}/temp_{$image_arg}01.gif");
             }
		 } else {
		   $img = imagecreatefromjpeg($target);
           $tci = imagecreatetruecolor($w, $h);
		   imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
		   imagejpeg($tci, $newcopy, 100);
              if (file_exists("_members/$username$user_id/{$image_dir}/{$image_arg}01.png")) {
               unlink("_members/$username$user_id/{$image_dir}/{$image_arg}01.png");
             }
              if (file_exists("_members/$username$user_id/{$image_dir}/mobile_{$image_arg}01.png")) {
               unlink("_members/$username$user_id/{$image_dir}/mobile_{$image_arg}01.png");
             } if (file_exists("_members/$username$user_id/{$image_dir}/temp_{$image_arg}01.png")) {
               unlink("_members/$username$user_id/{$image_dir}/temp_{$image_arg}01.png");
             }   
             
        if (file_exists("_members/$username$user_id/{$image_dir}/{$image_arg}01.gif")) {
               unlink("_members/$username$user_id/{$image_dir}/{$image_arg}01.gif");
             }
              if (file_exists("_members/$username$user_id/{$image_dir}/mobile_{$image_arg}01.gif")) {
               unlink("_members/$username$user_id/{$image_dir}/mobile_{$image_arg}01.gif");
             } if (file_exists("_members/$username$user_id/{$image_dir}/temp_{$image_arg}01.gif")) {
               unlink("_members/$username$user_id/{$image_dir}/temp_{$image_arg}01.gif");
             }
		 }
         
	 }
        
    img_crop($target_file, $cropped_file, $fileExt);
    img_crop($target_file, $cropped_file_mobile, $fileExt);
    ak_img_resize($cropped_file, $resized_file, $wmax, $hmax, $fileExt);
    ak_img_resize($cropped_file_mobile, $resized_file_mobile, $w_mobile_max, $h_mobile_max, $fileExt);
        
    // echo ("<meta http-equiv='refresh' content='0'>");    
	}
	
	
		$image_dir = "loan/passport";
		$image_arg = "pic";
		// $image_uploaded = "uploadedPic";
		image_process($image_dir, $image_arg);
	/*
	$image_dir = "loan/thumb_sign";
		$image_arg = "pic";
		$image_uploaded = "uploadedPic2";
		image_process($image_dir, $image_arg, $image_uploaded);	
	*/

  }
?>
<?php
 echo ("<meta http-equiv='refresh' content='0'>"); 
 var_dump($passed_pic);
?>