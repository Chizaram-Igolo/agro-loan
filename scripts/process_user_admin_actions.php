<?php session_start();      
  include_once("../includes/connection.php");  
  include_once("format_time.php"); 
	date_default_timezone_set('UTC');
  if (IsSet($_POST['todo']) && $_POST['todo'] !== '' && IsSet($_POST['loan_id']) && $_POST['loan_id'] !== '') {
	  $post_id = $_POST['loan_id'];
	  $todo = $_POST['todo'];
    if (IsSet($_SESSION['logged_id'])) {
	    $user_id = $_SESSION['logged_id'];
		}
		
	$date = date('Y-m-d, H:i:s A');
    $date = $my_handle->real_escape_string($date);
			
	if ($todo == 'approve') {
		// Build query string to insert message into the database.
    $action_query = "UPDATE loan SET approval_status = 'approved', 
	                                  approved_by_id = '$user_id',
									  approve_date = '$date',
                                      rejected_by_id = NULL,	
                                      reject_date = '0000-00-00, 00:00 AM'				  
									  WHERE loan_id = '$post_id'";									 
	} else if ($todo == 'reject') {
		// Build query string to insert message into the database.
    $action_query = "UPDATE loan SET approval_status = 'rejected',
                                      approved_by_id = NULL,	
									  approve_date = '0000-00-00, 00:00 AM',
	                                  rejected_by_id = '$user_id',
									  reject_date = '$date'
									  WHERE loan_id = '$post_id'";
	} else if ($todo == 'flag') {
		// Build query string to insert message into the database.
    $action_query = "UPDATE loan SET is_flagged = '1',	
	                                  flagged_by_id = '$user_id',
									  flag_date = '$date'
									  WHERE loan_id = '$post_id'";
	} else if ($todo == 'unflag') {
		// Build query string to insert message into the database.
    $action_query = "UPDATE loan SET is_flagged = '0', flagged_by_id = NULL, flag_date = NULL WHERE loan_id = '$post_id'";
	} else if ($todo == 'block') {
		// Build query string to insert message into the database.	
	$select_id_query = "SELECT user_id FROM loan WHERE loan_id = '$post_id'";
$select_id_resultID = $my_handle->query($select_id_query);

	  
		$selected_user = $select_id_resultID->fetch_assoc();
		$selected_user_id = $selected_user['user_id'];
	 
     $action_query = "UPDATE user SET is_blocked = '1', blocked_by_id = '$user_id', block_date = '$date'
									  WHERE user_id = '$selected_user_id'";
									  $is_blocked = "1";
	 
	} else if ($todo == 'unblock') {
		// Build query string to insert message into the database.	
	$select_id_query = "SELECT user_id FROM loan WHERE loan_id = '$post_id'";
$select_id_resultID = $my_handle->query($select_id_query);

	  
		$selected_user = $select_id_resultID->fetch_assoc();
		$selected_user_id = $selected_user['user_id'];
	 
     $action_query = "UPDATE user SET is_blocked = '0', blocked_by_id = NULL, block_date = NULL
									  WHERE user_id = '$selected_user_id'";
	 
	} else if ($todo == 'delete') {
		// Build query string to insert message into the database.
    $action_query = "DELETE FROM loan WHERE loan_id = '$post_id'";
	}
	
	 try {
		 if (!$approve_resultID = $my_handle->query($action_query)) {
		   throw new Exception("\n\n'Loan Details' Retrieval Error: " . $my_handle->error);
		 } 
	  } catch (Exception $e) {
		  $error_time = date('Y-m-d, H:i:s A e');
	      error_log("Time error occured: " . $error_time .
					"\n\n" .$e . $select_id_query .
					"\n\nHint to DB Admin: Check and reference the field name(s) in the database tables properly.\n\n--------------------------------------------------------------------------------------------------------------------------\n\n", 3, 'C:\error_logs\error.txt');
	      // header('location: error.php');
	  }
	  }
?>

<?php
	// Prevent the program from crashing
	$renew_query = "SELECT user_id, loan_id, latitude, longitude, vat_no, field_officer_id,
   		                           field_officer_name, anchor_company, entry_date, approval_status, is_flagged FROM loan WHERE loan_id = '$post_id'";
	$renew_resultID = $my_handle->query($renew_query);
	if (IsSet($renew_resultID) && is_object($renew_resultID)) {
		while ($renew = $renew_resultID->fetch_assoc()) {
		 // $message_time =  formatTime($pm_query_row['message_date_UTC'], "time");
         $poster_id = $renew['user_id'];	
         $approval_status =  $renew['approval_status'];
         $is_flagged =  $renew['is_flagged'];
		 
		     
				$query = "SELECT username, email_address, firstname, lastname, is_blocked FROM  user WHERE user_id = '$poster_id'";
			  
			  $result_id = $my_handle->query($query);
			   $row = $result_id->fetch_assoc();	
				  $id = $poster_id;
				  $username = $row['username'];
				  $firstname = $row['firstname'];
				  $lastname = $row['lastname'];
				  $lastnameInit = substr($row['lastname'], 0, 0);
				  $is_blocked =  $row['is_blocked'];
				  
?>
	 <?php if (IsSet($_SESSION['check_is_admin']) &&  ($_SESSION['check_is_admin'] == "1")){ ?>	
	    	  
			 <div class = "pending-approved-status-div" style = "position: relative; top: 50px; left: 420px;
			  width: 140px; height: auto;
			  overflow; auto; margin: 0px auto; color: #fff; z-index: 100;">
			  
			  <?php if (IsSet($is_flagged) && ($is_flagged == "0")) { ?>
			  <div class = "admin_flag_request_div" id = "admin_flag_request_div<?php echo $post_id ?>" style = "position: absolute; float: left; width: 100%; color: #fff;  padding: 2px 2px; border-radius: 40px; text-align: center; height: 20px; font-size: .8em; background: #6699da;">
			    Flag this Request
			  </div>
			  <?php } else if (IsSet($is_flagged) && ($is_flagged == "1")) { ?>
			  <div class = "admin_unflg_request_div" id = "admin_unflg_request_div<?php echo $post_id ?>" style = "position: absolute; float: left; width: 100%; color: #fff;  padding: 2px 2px; border-radius: 40px; text-align: center; height: 20px; font-size: .8em; background: #6699da;">
			    Unflag this Request
			  </div>
			  <?php } else { ?>
			  <div class = "admin_flag_request_div" id = "admin_flag_request_div<?php echo $post_id ?>" style = "position: absolute; float: left; width: 100%; color: #fff;  padding: 2px 2px; border-radius: 40px; text-align: center; height: 20px; font-size: .8em; background: #6699da;">
			    Flag this Request
			  </div>
			  <?php }?>
			  <!--<div style = "position: absolute; margin-left: 50%; float: left;  padding: 12px 2px; text-align: center; width: 49.25%; height: 40px; font-size: .8em; background: #e13834;">
			    Reject this Loan Request
			  </div>-->
			  </div>
			  
			  <div class = "pending-approved-status-div" style = "position: relative; top: 80px; left: 420px;
			  width: 140px; height: auto;
			  overflow; auto; margin: 0px auto; z-index: 100;">
			  <div class = "admin_delete_request_div" id = "admin_delete_request_div<?php echo $post_id ?>" style = "position: absolute; float: left; color: #fff;  width: 100%; padding: 2px 2px; border-radius: 40px; text-align: center; height: 20px; font-size: .8em; background: #6699da;">
			    Delete this Request
			  </div>
			  <!--<div style = "position: absolute; margin-left: 50%; float: left;  padding: 12px 2px; text-align: center; width: 49.25%; height: 40px; font-size: .8em; background: #e13834;">
			    Reject this Loan Request
			  </div>-->
			  </div>
			   <div class = "pending-approved-status-div" style = "position: relative; top: 110px; left: 420px;
			  width: 140px; height: auto;
			  overflow; auto; margin: 0px auto; z-index: 100;">
			   <?php if (IsSet($is_blocked) && ($is_blocked == "0")) { ?>
			  <div class = "admin_block_user_div" id = "admin_block_user_div<?php echo $post_id ?>" style = "position: absolute; float: left; width: 100%; color: #fff; padding: 2px 2px; border-radius: 40px; text-align: center; height: 20px; font-size: .8em; background: #6699da;">
			    Block this User
			  </div>
			   <?php } else if (IsSet($is_blocked) && ($is_blocked == "1")) { ?>
			  <div class = "admin_unblk_user_div" id = "admin_unblk_user_div<?php echo $post_id ?>" style = "position: absolute; float: left; width: 100%; color: #fff; padding: 2px 2px; border-radius: 40px; text-align: center; height: 20px; font-size: .8em; background: #6699da;">
			    Unblock this User
			  </div>
			   <?php } else { ?>
			    <div class = "admin_block_user_div" id = "admin_block_user_div<?php echo $post_id ?>" style = "position: absolute; float: left; width: 100%; color: #fff; padding: 2px 2px; border-radius: 40px; text-align: center; height: 20px; font-size: .8em; background: #6699da;">
			    Block this User
			  </div>
			   <?php } ?>
			  <!--<div style = "position: absolute; margin-left: 50%; float: left;  padding: 12px 2px; text-align: center; width: 49.25%; height: 40px; font-size: .8em; background: #e13834;">
			    Reject this Loan Request
			  </div>-->
			  </div>
	 <?php } ?>
	<div class = "content_div" name = "" style = "min-width: 800px; width: 84%; position: relative">
	
	 
	 <?php if (IsSet($_SESSION['check_is_admin'])){ ?>	
	 <div class = "pending-approved-status-div" style = "position: absolute; top: 48px; left: 170px; 
			  width: 120px; height: auto;
			  overflow; auto; margin: 0px auto; color: #fff; ;">
			  <?php if (IsSet($approval_status) && $approval_status == "approved") { ?>
			  <div style = "position: absolute; float: left; width: 100%; padding: 2px 2px; border-radius: 40px; text-align: center; height: 20px; font-size: .8em; background: #64bf56;">
			    Accepted
			  </div>
			  <?php } else if (IsSet($approval_status) && $approval_status == "rejected") { ?>
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
	   <div id = "firstDivision">
			
          <br/>
		  <?php 
                    if (file_exists("../_members/" . $username . $poster_id."/profile_pics/pic01.jpg"))                   {
                  echo "<a href = \"../_members/" . $username . $poster_id . "/profile_pics/pic01.jpg\">";
                    }  else if (file_exists("./_members/" . $username . $poster_id."/profile_pics/pic01.png")) {
                  echo "<a href = \"../_members/" . $username . $id . "/profile_pics/pic01.png\">";
                    } else if (file_exists("../_members/" . $username . $id."/profile_pics/pic01.gif")) {
                  echo "<a href = \"./_members/" . $username . $id . "/profile_pics/pic01.gif\">";
                    } else {
                       echo "<a href = \"./_members/default/default_pic_small.png\">";
                   }
				   
                  echo "<div class = \"thumbnail_others\" style = \"width: 48px; height: 48px; padding: 0px; float: left; position: relative; top: 14px; left: 10px; margin-right: 10px; border: 0px solid; box-shadow: 0px 0px 0px #000; background: transparent; z-index: 100;\"> ";
						    $profilePic = "../_members/" . $username . $poster_id . "/profile_pics/pic01.png";
			
				if (!file_exists($profilePic)) {
				  $profilePic = "../_members/" . $username . $poster_id . "/profile_pics/pic01.jpg";
				}
                if (!file_exists($profilePic)) {
				  $profilePic = "../_members/" . $username . $poster_id . "/profile_pics/pic01.gif";
				}                                                        
				if (!file_exists($profilePic)) {
				  $profilePic = "../_members/default/default_pic_small.png";
				} 
				echo "<img src = $profilePic style = \" display: block; margin: auto auto; max-height: 48px; max-width: 48px;\"/>";
			
				
				echo "<span class = \"name\">";
			    echo $username . " " . $lastname . "";
				  
				echo "</span>";
				echo "</div>";
				echo "</a>"; ?>
		<a href = "loan_application.php?a=<?php echo $post_id; ?>">  	
         <div id = "formDiv"> 
        <form id = "createForm" enctype = "multipart/form-data" class = "edit" action = "<?php echo $_SERVER['PHP_SELF']; ?>?param=apply_loan" method = "POST">
			<p></p><br/>
		 
		        
		      <div id = "div_1">  
			  <label>LAT.</label>
		      <input type = "number" 
                     id = "latitudeTxt" 
                     name = "latitudeTxt" 
                     placeholder = "e.g 76.77"
                     value = "<?php echo (IsSet($renew['latitude'])?$renew['latitude']:''); ?>"/><br/>
                     
              <label>LONG.</label>
		      <input type = "number" 
                     id = "longitudeTxt" 
                     name = "longitudeTxt" 
                     placeholder = " e.g 30.2" 
                     value = "<?php echo (IsSet($renew['longitude'])?$renew['longitude']:''); ?>"/><br/>
              
              <label>VAT NO.</label>
		      <input type = "number" 
                     id = "vatNoTxt" 
                     name = "vatNoTxt" 
                     placeholder = " e.g 30.2" 
                     value = "<?php echo (IsSet($renew['vat_no'])?$renew['vat_no']:''); ?>"/><br/>
               </div>
                
              <div id = "div_2">   
					
              <label>Date (dd/mm/yy)</label>
		      <input type = "date" 
                     id = "dateRegTxt" 
                     name = "dateRegTxt"  
                     value = "<?php echo (IsSet($renew['entry_date'])?$renew['entry_date']:''); ?>"/><br/>
                     
              <label>Field Officer ID</label>
		      <input type = "number" 
                     id = "fieldOffIDTxt" 
                     name = "fieldOffIDTxt" 
                     placeholder = "" 
                     value = "<?php echo (IsSet($renew['field_officer_id'])?$renew['field_officer_id']:''); ?>"/><br/>
                     
              <label>Field Officer's Name</label>
		      <input type = "text" 
                     id = "fieldOffNameTxt" 
                     name = "fieldOffNameTxt" 
                     placeholder = " e.g 30.2" 
                     value = "<?php echo (IsSet($renew['field_officer_name'])?$renew ['field_officer_name']:''); ?>"/>
                     
              <label>Anchor/Offtake Company</label>
		      <input type = "text" 
                     id = "anchorCompTxt" 
                     name = "anchorCompTxt" 
                     placeholder = "e.g 30.2" 
                     value = "<?php echo (IsSet($renew ['anchor_company'])?$renew ['anchor_company']:''); ?>"/><br/>
		    </div><br/></a>
			<?php if (IsSet($_SESSION['check_is_admin']) &&  ($_SESSION['check_is_admin'] == "1")){ ?>
			  <div class = "admin-approve-options-div" style = "position: relative; top: 146px; 
			  width: 52%; height: 40px;
			  overflow; auto; margin: 0px auto;">
			  <?php if (IsSet($approval_status) && $approval_status == "rejected") { ?>
			  <div id = "admin_approve_option_div<?php echo $post_id ?>" class = "admin-approve-option-div" style = "position: absolute; float: left; width: 49.25%; padding: 12px 2px; text-align: center; height: 40px; font-size: .8em; background: #6699da;">
			    Approve this Loan Request
			  </div>
			  <?php } else if (IsSet($approval_status) && $approval_status == "approved") { ?>
			  <div id = "admin_approvedone_option_div<?php echo $post_id ?>" class = "admin-approvedone-option-div" style = "position: absolute; float: left; width: 49.25%; padding: 12px 2px; text-align: center; height: 40px; font-size: .8em; background: #aaa;">
			    Approve this Loan Request
			  </div>
			  <?php } else { ?>
			  <div id = "admin_approve_option_div<?php echo $post_id ?>" class = "admin-approve-option-div" style = "position: absolute; float: left; width: 49.25%; padding: 12px 2px; text-align: center; height: 40px; font-size: .8em; background: #6699da;">
			    Approve this Loan Request
			  </div>
			  <?php } ?>
			  
			  <?php if (IsSet($approval_status) && $approval_status == "approved") { ?>
			  <div id = "admin_reject_option_div<?php echo $post_id ?>" class = "admin-reject-option-div" style = "position: absolute; margin-left: 50%; float: left;  padding: 12px 2px; text-align: center; width: 49.25%; height: 40px; font-size: .8em; background: #6666ac;">
			    Reject this Loan Request
			  </div>
			  <?php } else if (IsSet($approval_status) && $approval_status == "rejected") { ?>
			  <div id = "admin_rejectdone_option_div<?php echo $post_id ?>" class = "admin-rejectdone-option-div" style = "position: absolute; margin-left: 50%; float: left;  padding: 12px 2px; text-align: center; width: 49.25%; height: 40px; font-size: .8em; background: #aaa;">
			    Reject this Loan Request
			  </div>
			  <?php } else { ?>
			  <div id = "admin_reject_option_div<?php echo $post_id ?>" class = "admin-reject-option-div" style = "position: absolute; margin-left: 50%; float: left;  padding: 12px 2px; text-align: center; width: 49.25%; height: 40px; font-size: .8em; background: #6666ac;">
			    Reject this Loan Request
			  </div>
			  <?php } ?>
			  </div>
			  <br/><br/><br/><br/><br/>
            <?php } ?>
            </div>
         </form>
          </div>
		  </a>
         </div><!--End of content div.-->
<?php		 } } ?>