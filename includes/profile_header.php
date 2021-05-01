<div id = "profileHeader">
	<div id = "profileDetailsContainer">
		<?php if (IsSet($profile_pic)) { ?>
		<div id = "profilePicHolder">
		  <?php echo $profile_pic; ?>
		</div> 
        <div id = "profilePicHolder_mobile">
		  <?php echo $profile_pic_mobile; ?>
		</div>
		<?php } else { ?>
		  <div id = "profilePicHolder">
		  <?php echo $profile_pic_default; ?>
		  </div> 
          <div id = "profilePicHolder_mobile">
		  <?php echo $profile_pic_default_mobile; ?>
		  </div> 
		<?php } ?>
		
	  <div id = "profileDetails">
	  
	    <?php if (IsSet($p_user_details['firstname']) || IsSet($user_details['firstname']) ||
				  IsSet($p_user_details['othername']) || IsSet($user_details['othername']) ||
				  IsSet($p_user_details['lastname']) || IsSet($user_details['othername'])){ ?>
		      <div class = "profile-details-div">
			     <h1>
				    <?php
					    $user_firstname = "";
						$user_middlename = "";
						$user_lastname = "";
						
						$user_fullname = "";
						
						if (IsSet($p_user_details)) {
						  if (IsSet($p_user_details['firstname']) && $p_user_details['firstname'] !== "") {
					        $user_firstname = $p_user_details['firstname'];
					      }
						} else if (IsSet($user_details)) {
						  if (IsSet($user_details['firstname']) && $user_details['firstname'] !== "") {
					        $user_firstname = $user_details['firstname'];
					      } 
						}
					    $user_fullname .= $user_firstname;
						
					    if (IsSet($p_user_details)) {
						  if (IsSet($p_user_details['othername']) && $p_user_details['othername'] !== "") {
					        $user_middlename = $p_user_details['othername'];
					      }
						} else if (IsSet($user_details)) {
						  if (IsSet($user_details['othername']) && $user_details['othername'] !== "") {
					        $user_middlename = $user_details['othername'];
					      } 
						}
						$user_fullname .= " " . $user_middlename;
						
						if (IsSet($p_user_details)) {
						  if (IsSet($p_user_details['lastname']) && $p_user_details['lastname'] !== "") {
					        $user_lastname = $p_user_details['lastname'];
					      }
						} else if (IsSet($user_details)) {
						  if (IsSet($user_details['lastname']) && $user_details['lastname'] !== "") {
					        $user_lastname = $user_details['lastname'];
					      } 
						}					    
						$user_fullname .= " " . $user_lastname;
						
					    echo $user_fullname;
					  ?>  
					</h1>
			  </div>
		<?php } ?>
		
		  <?php if (IsSet($p_user_details['date_of_birth']) || IsSet($user_details['date_of_birth']) ) { ?>
		  <div class = "profile-details-div">
			<p>
			  <?php
				$user_dob = "";
				if (IsSet($p_user_details)) {
				  if (IsSet($p_user_details['date_of_birth'])  && $p_user_details['date_of_birth'] !== "") {
				    $user_dob = $p_user_details['date_of_birth'];
				  }
				} else if (IsSet($user_details)) {
				   if (IsSet($user_details['date_of_birth']) && $user_details['date_of_birth'] !== "") {
				   $user_dob = $user_details['date_of_birth'];
				  }
				} 	
				echo $user_dob;
			  ?>  
			</p>
	    </div>
		  <?php } ?>
		  
		  <?php if (IsSet($p_user_details['phone_no']) || IsSet($user_details['phone_no']) ) { ?>
		  <div class = "profile-details-div">
			<p>
			  <?php
				$user_phone_no = "";
			    if (IsSet($p_user_details)) {
				  if (IsSet($p_user_details['phone_no']) && $p_user_details['phone_no'] !== "") {
				    $user_phone_no = $p_user_details['phone_no'];
				  }
				} else if (IsSet($user_details)) { 
				   if (IsSet($user_details['phone_no']) && $user_details['phone_no'] !== "") {
				     $user_phone_no = $user_details['phone_no'];
				   } 
				}
				echo $user_phone_no;
			  ?>  
			</p>
	    </div>
		  <?php } ?>
		  
		   <?php if (IsSet($p_user_details['home_address']) || IsSet($user_details['home_address']) ) { ?>
		  <div class = "profile-details-div">
			<p>
			  <?php
				$user_home_address = "";
				if (IsSet($p_user_details)) {
				  if (IsSet($p_user_details['home_address']) && $p_user_details['home_address'] !== "") {
				    $user_home_address = "<span style = \"width: 16px; height: 16px; background: url('./styles/location.png') no-repeat;\">". "" . "</span>" . $p_user_details['home_address'];
				  }
				} else if (IsSet($user_details)) {
				if (IsSet($user_details['home_address']) && $user_details['home_address'] !== "") {
				  $user_home_address = "<span style = \"width: 16px; height: 16px; background: url('./styles/location.png') no-repeat;\">". "" . "</span>" . $user_details['home_address'];
				} 
				}
				echo $user_home_address;
			  ?>  
			</p>
	    </div>
		  <?php } ?>
	    
	     
		</div>
	 </div>
	  <div id = "profileHeaderMenu">
	    <ul><li>
		  <a href = "op_history.php">Operational History</a>
        </li></ul>
	  </div>
	</div>