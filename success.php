<?php include_once ("./includes/header.php");  // Includes the header file to be used on all pages. ?>
<?php include_once ("./includes/functions.php"); ?> 
<?php include_once ("./includes/register_header.php"); ?> 
<?php
     // if (Isset($_SESSION['activ_pin'])) {
     // $actual_link = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . "activate.php?activ_pin=" . $_SESSION['activ_pin'];
    /*  $this->toEmail = $this->email;
      $this->subject = "DERDC Registration Activation Email";
      $this->content = "Click this link to activation your account. <a href = '" . $actual_link . "'>" . $actual_link . "</a>";
      $this->mailHeaders = "From: The DERDC Team\r\n";
      if (mail($this->toEmail, $this->subject, $this->content, $this->mailHeaders)) {
        $_SESSION['messageForPage'] = "You have registered and the activation mail is sent to your email. Click the activation link to activate you account.";
      } else {
         $_SESSION['messageForPage'] = "sorry";
      }*/
	 // } 
		
	// require_once('./includes/PHPMailerAutoload.php'); // path to the PHPMailerAutoload.php file.
	// $mail = new PHPMailer;
	// var_dump($mail);
	/*$mail->setFrom('emmacudman@gmail.com', 'Your Name');
	$mail->addAddress('chizaram.igolo@yahoo.com', '');
	$mail->Subject  = "DERDC Registration Activation Email";;
	$mail->Body     = "Click this link to activation your account. <a href = '" . $actual_link . "'>" . $actual_link . "</a>";
	if(!$mail->send()) {
	  echo 'Message was not sent.';
	  echo 'Mailer error: ' . $mail->ErrorInfo;
	} else {
	  echo 'Message has been sent.';
	}*/
	
	/* $mail->IsSMTP();
	$mail->Mailer = "smtp";
	$mail->Host = "mail.gmail.com";
	$mail->Port = 25; // 2525, 8025, 587 and 25 can also be used. Use Port 465 for SSL.
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'tls';
	$mail->Username = "emmacudman@gmail.com";
	$mail->Password = "Iambolder3";

	$mail->From = "emmacudman@gmail.com";
	$mail->FromName = "The DERDC Team";
	$mail->AddAddress("chizaram.igolo@yahoo.com", "");
	$mail->AddReplyTo("emmacudman@gmail.com", "The DERDC Team");

	$mail->Subject = "Hi!";
	$mail->Body = "Hi! How are you?";
	$mail->WordWrap = 50; 
	if(!$mail->Send()) {
	echo "<br/><br/><br/><br/><br/><br/><br/><br/><br/>";
	echo 'Message was not sent.';
	echo 'Mailer error: ' . $mail->ErrorInfo;
	exit;
	} else {
	echo 'Message has been sent.';
	}
     */
	
	// else { echo "Isn't set"; }
?>
	   <div id = "fullRegister" style = "background: #fff;">
	   <form id = "signUpForm" 
	   <div id = "successMessage" style = "width: 100%"><br/><br/>
	 <h1>Successful Registration</h1>
	       <p style = "font-size: 0.9em; color: #434343; line-height: 1.7em;">Dear User,<br/><br/>
	       You have registered successfully.<br/>
	       <!--We have <span style = "font-size: 1.15em; background: #ddf4dd; padding:0.2em; color: #a0bf20;">sent a link</span> to your email. <span style = "font-size: 1.15em; background: #ddf4dd; padding:0.2em; color: #a0bf20; margin-right: 5px;">Click on the link </span> to activate your account.<br/>-->
	       Thank you. <a href = "index.php" style = "font-size: 0.8em;">Click Here</a><span style = "font-size: 0.8em;"> to return to the home page and</span><a href = "sign_in.php" style = "font-size: 0.8em;"> here to sign in.</p>
		   <p style = "font-size: 0.9em; width: 50%; margin-top: 30px; position: relative; left: 50%;"><?php echo "- " . COMPANY_NAME; ?></p>
	     </div><!--End of successMessage-->
		 </form>
	 </div>
	<?php // if (Isset($_SESSION['messageForPage'])){echo $_SESSION['messageForPage'];}?>
	</div>
	<div class = "pageDivs"  id = "rightDiv">
	</div>
	</div>
<?php include_once("./includes/footer.php"); ?>
</section>
</body>
</html>