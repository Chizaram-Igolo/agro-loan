<?php global $user_id;
        if (IsSet($_GET['q']) && ($_GET['q'] == "approved" || $_GET['q'] == "rejected" || $_GET['q'] == "approved")) {
		  if ($_GET['q'] == "approved") {
			$filter_par_admin_string = "WHERE approval_status = 'approved'";
			$filter_par_user_string = "AND approval_status = 'approved'";
		  } else if ($_GET['q'] == "rejected") {
			$filter_par_admin_string  = "WHERE approval_status = 'rejected'";
			$filter_par_user_string = "AND approval_status = 'rejected'";
		  } else if ($_GET['q'] == "pending") {
			$filter_par_admin_string  = "WHERE approval_status = 'pending'";
			$filter_par_user_string = "AND approval_status = 'pending'";
		  } else if ($_GET['q'] == "all") {
			$filter_par_admin_string  = '';
			$filter_par_user_string = '';
		  }
		} else {
			$filter_par_admin_string = '';
			$filter_par_user_string = '';
		}
        if (IsSet($_SESSION['check_is_admin']) && $_SESSION['check_is_admin'] == "1") {
		$loan_query = "SELECT user_id, loan_id, latitude, longitude, vat_no, field_officer_id,
   		                           field_officer_name, anchor_company, entry_date, approval_status, is_flagged FROM loan $filter_par_admin_string ORDER BY loan_id ASC";
	    } else if (IsSet($_SESSION['check_is_admin']) && $_SESSION['check_is_admin'] == "0") {
		$loan_query = "SELECT user_id, loan_id, latitude, longitude, vat_no, field_officer_id,
   		                           field_officer_name, anchor_company, entry_date, approval_status, is_flagged FROM loan WHERE loan.user_id = $user_id $filter_par_user_string ORDER BY loan_id ASC";
		}
		if (IsSet($loan_query)) {
		  $loan_resultID = $my_handle->query($loan_query);
		}	
		
?>  

<?php if (IsSet($loan_resultID) && is_object($loan_resultID) && $loan_resultID->num_rows !== 0) { ?>
  <?php while ($loan = $loan_resultID->fetch_assoc()) { 
           $a = $loan['loan_id'];
           $poster_id = $loan['user_id'];
		   $approval_status = $loan['approval_status'];
		   $is_flagged = $loan['is_flagged'];
		   $s_user_id = $loan['user_id'];
		   
		  $s_user_query = "SELECT is_blocked FROM user WHERE user_id = '$s_user_id'";
		  if (IsSet($s_user_query)) {
		    $s_user_resultID = $my_handle->query($s_user_query);
		  }
		  if(IsSet($s_user_resultID) && is_object($s_user_resultID) && $s_user_resultID->num_rows !== 0) {
		    $s_user = $s_user_resultID->fetch_assoc();
			$s_user_is_blocked = $s_user['is_blocked'];  
		  }
		  
  ?>
	 <div class = "wrap-content-div" id = "wrap_content_div<?php echo $a; ?>" style = "min-width: 1000px; overflow: hidden;">
	 
	 <?php if (IsSet($_SESSION['check_is_admin']) &&  ($_SESSION['check_is_admin'] == "1")){ ?>	
	    	  
			 <div class = "pending-approved-status-div" style = "position: relative; top: 50px; left: 420px;
			  width: 140px; height: auto;
			  overflow; auto; margin: 0px auto; color: #fff; z-index: 100;">
			  
			  <?php if (IsSet($is_flagged) && ($is_flagged == "0")) { ?>
			  <div class = "admin_flag_request_div" id = "admin_flag_request_div<?php echo $a ?>" style = "position: absolute; float: left; width: 100%; color: #fff;  padding: 2px 2px; border-radius: 40px; text-align: center; height: 20px; font-size: .8em; background: #6699da;">
			    Flag this Request
			  </div>
			  <?php } else if (IsSet($is_flagged) && ($is_flagged == "1")) { ?>
			  <div class = "admin_unflg_request_div" id = "admin_unflg_request_div<?php echo $a ?>" style = "position: absolute; float: left; width: 100%; color: #fff;  padding: 2px 2px; border-radius: 40px; text-align: center; height: 20px; font-size: .8em; background: #6699da;">
			    Unflag this Request
			  </div>
			  <?php } else { ?>
			  <div class = "admin_flag_request_div" id = "admin_flag_request_div<?php echo $a ?>" style = "position: absolute; float: left; width: 100%; color: #fff;  padding: 2px 2px; border-radius: 40px; text-align: center; height: 20px; font-size: .8em; background: #6699da;">
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
			  <div class = "admin_delete_request_div" id = "admin_delete_request_div<?php echo $a ?>" style = "position: absolute; float: left; color: #fff;  width: 100%; padding: 2px 2px; border-radius: 40px; text-align: center; height: 20px; font-size: .8em; background: #6699da;">
			    Delete this Request
			  </div>
			  <!--<div style = "position: absolute; margin-left: 50%; float: left;  padding: 12px 2px; text-align: center; width: 49.25%; height: 40px; font-size: .8em; background: #e13834;">
			    Reject this Loan Request
			  </div>-->
			  </div>
			   <div class = "pending-approved-status-div" style = "position: relative; top: 110px; left: 420px;
			  width: 140px; height: auto;
			  overflow; auto; margin: 0px auto; z-index: 100;">
			   <?php if (IsSet($s_user_is_blocked) && ($s_user_is_blocked == "0")) { ?>
			  <div class = "admin_block_user_div" id = "admin_block_user_div<?php echo $a ?>" style = "position: absolute; float: left; width: 100%; color: #fff; padding: 2px 2px; border-radius: 40px; text-align: center; height: 20px; font-size: .8em; background: #6699da;">
			    Block this User
			  </div>
			   <?php } else if (IsSet($s_user_is_blocked) && ($s_user_is_blocked == 1)) { ?>
			  <div class = "admin_unblk_user_div" id = "admin_unblk_user_div<?php echo $a ?>" style = "position: absolute; float: left; width: 100%; color: #fff; padding: 2px 2px; border-radius: 40px; text-align: center; height: 20px; font-size: .8em; background: #6699da;">
			    Unblock this User
			  </div>
			   <?php } else { ?>
			    <div class = "admin_block_user_div" id = "admin_block_user_div<?php echo $a ?>" style = "position: absolute; float: left; width: 100%; color: #fff; padding: 2px 2px; border-radius: 40px; text-align: center; height: 20px; font-size: .8em; background: #6699da;">
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
		  <?php if (IsSet($poster_id)) {     
                
				$query = "SELECT username, email_address, firstname, lastname FROM  user WHERE user_id = $poster_id";
			  
			  $result_id = $my_handle->query($query);
			   $row = $result_id->fetch_assoc();	
				  $id = $poster_id;
				  $username = $row['username'];
				  $firstname = $row['firstname'];
				  $lastname = $row['lastname'];
				  $lastnameInit = substr($row['lastname'], 0, 0);
				 
		  
				  echo "<a href = \"user_profile.php?id=$poster_id\">";
                } else {
                    if (file_exists("./_members/" . $username . $poster_id."/profile_pics/pic01.jpg"))                   {
                  echo "<a href = \"./_members/" . $username . $poster_id . "/profile_pics/pic01.jpg\">";
                    }  else if (file_exists("./_members/" . $username . $poster_id."/profile_pics/pic01.png")) {
                  echo "<a href = \"./_members/" . $username . $id . "/profile_pics/pic01.png\">";
                    } else if (file_exists("./_members/" . $username . $id."/profile_pics/pic01.gif")) {
                  echo "<a href = \"./_members/" . $username . $id . "/profile_pics/pic01.gif\">";
                    } else {
                       echo "<a href = \"./_members/default/default_pic_small.png\">";
                   }   
                }
                                                                          
                  echo "<div class = \"thumbnail_others\" style = \"width: 48px; height: 48px; padding: 0px; float: left; position: relative; top: 14px; left: 10px; margin-right: 10px; border: 0px solid; box-shadow: 0px 0px 0px #000; background: transparent; z-index: 100;\"> ";
						    $profilePic = "./_members/" . $username . $poster_id . "/profile_pics/pic01.png";
			
				if (!file_exists($profilePic)) {
				  $profilePic = "./_members/" . $username . $poster_id . "/profile_pics/pic01.jpg";
				}
                if (!file_exists($profilePic)) {
				  $profilePic = "./_members/" . $username . $poster_id . "/profile_pics/pic01.gif";
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
		<a href = "loan_application.php?a=<?php echo $a; ?>">  	
         <div id = "formDiv"> 
        <form id = "createForm" enctype = "multipart/form-data" class = "edit" action = "<?php echo $_SERVER['PHP_SELF']; ?>?param=apply_loan" method = "POST">
			<p></p><br/>
		 
		        
		      <div id = "div_1">  
			  <label>LAT.</label>
		      <input type = "number" 
                     id = "latitudeTxt" 
                     name = "latitudeTxt" 
                     placeholder = "e.g 76.77"
                     value = "<?php echo (IsSet($loan['latitude'])?$loan['latitude']:''); ?>"/><br/>
                     
              <label>LONG.</label>
		      <input type = "number" 
                     id = "longitudeTxt" 
                     name = "longitudeTxt" 
                     placeholder = " e.g 30.2" 
                     value = "<?php echo (IsSet($loan['longitude'])?$loan['longitude']:''); ?>"/><br/>
              
              <label>VAT NO.</label>
		      <input type = "number" 
                     id = "vatNoTxt" 
                     name = "vatNoTxt" 
                     placeholder = " e.g 30.2" 
                     value = "<?php echo (IsSet($loan['vat_no'])?$loan['vat_no']:''); ?>"/><br/>
               </div>
                
              <div id = "div_2">   
					
              <label>Date (dd/mm/yy)</label>
		      <input type = "date" 
                     id = "dateRegTxt" 
                     name = "dateRegTxt"  
                     value = "<?php echo (IsSet($loan['entry_date'])?$loan['entry_date']:''); ?>"/><br/>
                     
              <label>Field Officer ID</label>
		      <input type = "number" 
                     id = "fieldOffIDTxt" 
                     name = "fieldOffIDTxt" 
                     placeholder = "" 
                     value = "<?php echo (IsSet($loan['field_officer_id'])?$loan['field_officer_id']:''); ?>"/><br/>
                     
              <label>Field Officer's Name</label>
		      <input type = "text" 
                     id = "fieldOffNameTxt" 
                     name = "fieldOffNameTxt" 
                     placeholder = " e.g 30.2" 
                     value = "<?php echo (IsSet($loan['field_officer_name'])?$loan['field_officer_name']:''); ?>"/>
                     
              <label>Anchor/Offtake Company</label>
		      <input type = "text" 
                     id = "anchorCompTxt" 
                     name = "anchorCompTxt" 
                     placeholder = "e.g 30.2" 
                     value = "<?php echo (IsSet($loan['anchor_company'])?$loan['anchor_company']:''); ?>"/><br/>
		    </div><br/></a>
			<?php if (IsSet($_SESSION['check_is_admin']) &&  ($_SESSION['check_is_admin'] == "1")){ ?>
			  <div class = "admin-approve-options-div" style = "position: relative; top: 146px; 
			  width: 52%; height: 40px;
			  overflow; auto; margin: 0px auto;">
			 
			 
			  <?php if (IsSet($approval_status) && $approval_status == "rejected") { ?>
			   <div id = "admin_approve_option_div<?php echo $a ?>" class = "admin-approve-option-div" style = "position: absolute; float: left; width: 49.25%; padding: 12px 2px; text-align: center; height: 40px; font-size: .8em; background: #6699da;">
			    Approve this Loan Request
			  </div>
			  <?php } else if (IsSet($approval_status) && $approval_status == "approved") { ?>
			  <div id = "admin_approvedone_option_div<?php echo $a ?>" class = "admin-approvedone-option-div" style = "position: absolute; float: left; width: 49.25%; padding: 12px 2px; text-align: center; height: 40px; font-size: .8em; background: #aaa;">
			    Approve this Loan Request
			  </div>
			  <?php } else { ?>
			  <div id = "admin_approve_option_div<?php echo $a ?>" class = "admin-approve-option-div" style = "position: absolute; float: left; width: 49.25%; padding: 12px 2px; text-align: center; height: 40px; font-size: .8em; background: #6699da;">
			    Approve this Loan Request
			  </div>
			  <?php } ?>
			  
			  <?php if (IsSet($approval_status) && $approval_status == "approved") { ?>
			  <div id = "admin_reject_option_div<?php echo $a ?>" class = "admin-reject-option-div" style = "position: absolute; margin-left: 50%; float: left;  padding: 12px 2px; text-align: center; width: 49.25%; height: 40px; font-size: .8em; background: #6666ac;">
			    Reject this Loan Request
			  </div>
			  <?php } else if (IsSet($approval_status) && $approval_status == "rejected") { ?>
			  <div id = "admin_rejectdone_option_div<?php echo $a ?>" class = "admin-rejectdone-option-div" style = "position: absolute; margin-left: 50%; float: left;  padding: 12px 2px; text-align: center; width: 49.25%; height: 40px; font-size: .8em; background: #aaa;">
			    Reject this Loan Request
			  </div>
			  <?php } else { ?>
			  <div id = "admin_reject_option_div<?php echo $a ?>" class = "admin-reject-option-div" style = "position: absolute; margin-left: 50%; float: left;  padding: 12px 2px; text-align: center; width: 49.25%; height: 40px; font-size: .8em; background: #6666ac;">
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
		 </div>
<?php }?>
<?php } else { ?>
<div class = "no_records"><div id = "background_div"><h1>There are no records yet. <a href = "create.php" style = "color: #77f;">Get Started.</a></h1></div>
<?php } ?>	 