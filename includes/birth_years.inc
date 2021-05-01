<select id = "formYear" name = "formYear" style = "display: margin: 0px; inline-block;" >";
  echo "<option value = "" selected style = "background: #ee2;">Year</option>";
  
  <?php if ($_SESSION['formYear']) { ?>
    <option value = "<?php echo $_SESSION['formYear']; ?>" selected = "selected" style = "background: #ee2;">
     <?php echo $_SESSION['formYear']; ?>
    </option>";
 <?php } ?> 
  
<?php
  // User should be at least 13 years old.
  for ($y = date('Y')-13; $y >= 1900; $y--) {
    echo "<option value = " . "'$y'>";
	echo "$y";
	echo "</option>";
   }
?>
   
</select>

