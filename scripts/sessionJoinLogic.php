<?php
  if (IsSet($_SESSION['username'])) {
    $_POST['username'] = $_SESSION['username']; 
	unset($_SESSION['username']);
  }
  
  if (IsSet($_SESSION['email'])) {
    $_POST['email'] = $_SESSION['email'];
	unset($_SESSION['email']);
  }
  
  if (IsSet($_SESSION['password'])) {
    $_POST['password'] = $_SESSION['password']; 
	unset($_SESSION['password']);
  }
?>