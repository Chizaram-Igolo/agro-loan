<?php if(IsSet($_GET['formDeptVal']) && $_GET['formDeptVal'] == "School of Environmental Technology") {?>
<option value = "">Select your course of study...</option>
<option value = "Building">Building</option>
<option value = "Architecture">Architecture</option>
<option value = "Quantity Surveying">Quantity Surveying</option>
<option value = "Urban and Regional Planning">Urban and Regional Planning</option>

<?php } else if (IsSet($_GET['formDeptVal']) && $_GET['formDeptVal'] == "School of Engineering and Engineering Technology") { ?>
<option value = "">Select your course of study...</option>
<option value = "Mechanical Engingeering">Mechanical Engineering</option>
<option value = "Chemical Engingeering">Chemical Engineering</option>
<option value = "Electrical  Engingeering">Electrical Engineering</option>
<option value = "Civil Engingeering">Civil Engineering</option>
<option value = "Telecommunication Engingeering">Telecommunication Engineering</option>
<option value = "Computer Engingeering">Computer Engineering</option>

<?php } else if (IsSet($_GET['formDeptVal']) && $_GET['formDeptVal'] == "School of Information and Communication Technology") { ?>
<option value = "">Select your course of study...</option>
<option value = "Computer Science">Computer Science</option>
<option value = "Cyber-Security Science">Cyber-Security Science</option>
<option value = "Library and Information Technology">Library and Information Technology</option>
<option value = "Information and Media Technology">Information and Media Technology</option>

<?php } else if (IsSet($_GET['formDeptVal']) && $_GET['formDeptVal'] == "School of Entrepreneurship and Management Studies") { ?>
<option value = "">Select your course of study...</option>
<option value = "Estate Management Technology">Estate Management Technology</option>
<option value = "Transport Management Technology">Transport Management Technology</option>
<option value = "Project Management Technology">Project Management Technology</option>
<option value = "Entreneurship and Business Studies">Entrepreneurship and Business Studies</option>

<?php } else if (IsSet($_GET['formDeptVal']) && $_GET['formDeptVal'] == "School of Agriculture and Agricultural Technology") { ?>
<option value = "">Select your course of study...</option>
<option value = "Soil Science">Soil Science</option>
<option value = "Animal Production">Animal Production</option>
<option value = "Crop Production">Crop Production</option>
<option value = "Horticulture">Horticulture</option>
<option value = "Agricultural Economics and Extension">Agricultural Economics and Extension</option>
<option value = "Fisheries and Aquaculture">Fisheries and Aquaculture</option>

<?php } else if (IsSet($_GET['formDeptVal']) && $_GET['formDeptVal'] == "School of Science and Science Technology") { ?>
<option value = "">Select your course of study...</option>
<option value = "Biology">Biology</option>
<option value = "Chemistry">Chemistry</option>
<option value = "Physics">Physics</option>
<option value = "Mathematics">Mathematics</option>
<option value = "Geography">Geography</option>

<?php } ?>