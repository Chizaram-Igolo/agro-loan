<?php
$user_email = trim($_POST['logInEmail']);
$user_pass = trim($_POST['logInPass']);

global $my_handle;
$query = "SELECT email, password 
	FROM student WHERE 
	email = '$user_email'";
$result_id = $my_handle->query($query);

if ($result_id->num_rows !== 0) 
{
$row = $result_id->fetch_assoc();
echo "<br/><br/><br/><br/>";
echo $row['password'];
echo "<br/>";
echo crypt($user_pass, $row['password']);
if (authUserPass($row['password'], crypt($user_pass, SALT))) 
{
   $_SESSION['logged_email'] = $user_email;
   $_SESSION['logged_pass'] = $row['password'];
   header('location: user_profile.php');
 } 
else 
{
   $status_logged = "Wrong Username or Password";
   error_log($my_handle->error,  3, 'C:\error_logs\error.txt');
}
}
?>