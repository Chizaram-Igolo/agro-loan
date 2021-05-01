<?php
  function formatTime($message_time, $style = "long") {
	  $message_time = preg_replace('#[^0-9]#i', '', $message_time);
		$year = substr($message_time, 0, 4);
		$month = substr($message_time, 4, 2);
		$day = substr($message_time, 6, 2);
		$hour = substr($message_time, 8, 2);
		$minute = substr($message_time, 10, 2);
		$second = substr($message_time, 12, 2);
	  //$message_time = date("D jS, M, h:i A", mktime($hour, $minute, $second, $month, $day, $year));
          //$message_time = date("jS, M", mktime($hour, $minute, $second, $month, $day, $year));
		if ($style == "long") {
          // If the message was written in the previous year. 
		  if ($year < date('Y')) {
            $message_time = date("jS F, Y", mktime($hour, $minute, $second, $month, $day, $year));
        } else {
            // If the message was written in the same month as the current month.
            if ($month == date('m')) { 
              $message_time = date("l, jS", mktime($hour, $minute, $second, $month, $day, $year));
        } else {
                // If the message was written in a different month.
               $message_time = date("D jS, F", mktime($hour, $minute, $second, $month, $day, $year));
            }
        }
            return $message_time;
		} 
		else if ($style == "short") {
		  //$message_time = date("D jS, M", mktime($hour, $minute, $second, $month, $day, $year));
        
        
      // $message_time = date("jS, M", mktime($hour, $minute, $second, $month, $day, $year));  
        if (date('Y') > 2016) {
           $message_time = date("jS, M, Y", mktime($hour, $minute, $second, $month, $day, $year));
        }
	    return $message_time;
		} 
      
      else if ($style == "day") {
		  //$message_time = date("D jS, M", mktime($hour, $minute, $second, $month, $day, $year));
        
        
      // $message_time = date("jS, M", mktime($hour, $minute, $second, $month, $day, $year));  
        if (date('Y') > 2016) {
           $message_time = date("l", mktime($hour, $minute, $second, $month, $day, $year));
        }
	    return $message_time;
		}
	  
	  else if ($style == "time") {
		  if  ($day == date('d')) {
		$message_time = date("H:i, A", mktime($hour, $minute, $second, $month, $day, $year));
	    return $message_time; 
		  }
		  else {
		  $message_time = date("H:i A, l jS", mktime($hour, $minute, $second, $month, $day, $year));
	    return $message_time;
		  }
	  }
	}
?>