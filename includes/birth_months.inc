<select id = "formMonth" name = "formMonth" > 
		    <option value = "" selected style = "background: #ee2;">Month</option>
             <?php if ($_SESSION['formMonth']) { ?>
                 <option value = "<?php echo $_SESSION['formMonth']; ?>" selected = "selected" style = "background: #ee2;"><?php echo $_SESSION['formMonth']; ?></option>
               <?php } ?>
            <option value = "January">January</option>
            <option value = "February">February</option>
            <option value = "March">March</option>
            <option value = "April">April</option>
            <option value = "May">May</option>
            <option value = "June">June</option>
            <option value = "July">July</option>
            <option value = "August">August</option>
            <option value = "September">September</option>
            <option value = "October">October</option>
            <option value = "November">November</option>
            <option value = "December">December</option>
</select>