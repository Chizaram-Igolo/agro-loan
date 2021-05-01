<?php 
			  $query = "SELECT user.user_id, username, email_address, firstname, lastname FROM 
			             user, user_bio_info WHERE user.user_id = user_bio_info.user_id AND user.user_id != $user_id ORDER BY RAND() LIMIT 6";
			  
			  $result_id = $my_handle->query($query);
			 			  
			  $i = 0;
if (IsSet($result_id) && is_object($result_id)) {
			  while($row = $result_id->fetch_assoc()) {
			    $i++;
				if ($row['user_id'] !== $user_id) {
				  $id = $row['user_id'];
				  $username = $row['username'];
				  $firstname = $row['firstname'];
				  $lastname = $row['lastname'];
				  $lastnameInit = substr($row['lastname'], 0, 0);
				  if (strlen($firstname)) {
					$firstname = substr($firstname, 0, 1);
				  }
				echo "<a href = \"user_profile.php?id=$id\"  title = \"$firstname $lastname\">";
			    echo "<div class = \"thumbnail_others\"> ";
						    $profilePic = "./_members/" .$username. $id . "/profile_pics/pic01.png";
			
				if (!file_exists($profilePic)) {
				  $profilePic = "./_members/" . $username. $id . "/profile_pics/pic01.jpg";
				}
				if (!file_exists($profilePic)) {
				  $profilePic = "./_members/default/default_pic_small.png";
				} 
				echo "<img src = $profilePic style = \" display: block; margin: auto auto; max-height: 96px; max-width: 96px;\"/>";
				
				echo "<span class = \"name\">";
			    echo $firstname . " " . $lastnameInit . "";
				  
				echo "</span>";
				echo "</div>";
				echo "</a>";
				// Incase the returned result set exceeds 12 items
				if ($i > 12) {
				  break;
				  }
			  }
			  
			  }
}
			 
?>   