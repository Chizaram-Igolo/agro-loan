<?php 
  if(IsSet($_GET['formInstVal']) && $_GET['formInstVal'] == "Federal University of Technology, Minna") {
?>

<option value = "">Select your school/faculty...</option>
<option value = "School of Environmental Technology">School of Environmental Technology</option>
<option value = "School of Agriculture and Agricultural Technology">School of Agriculture and Agricultural Technology</option>
<option value = "School of Engineering and Engineering Technology">School of Engineering and Engineering Technology</option>
<option value = "School of Entrepreneurship and Management Studies">School of Entrepreneurship and Management Studies</option>
<option value = "School of Science and Science Technology">School of Science and Science Technology</option>
<option value = "School of Information and Communication Technology">School of Information and Communication Technology</option>

<?php } else { ?>
 <option value = "School of Information and Communication Technology">Turf, Men</option>

 <?php } ?>