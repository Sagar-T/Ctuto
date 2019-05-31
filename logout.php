<?php
session_start();
if(isset($_SESSION['email_id'])){
	session_destroy();
	
header("location:login.html");
}
else
{
	echo "<script>alert('you are not logged in')</script>";
}
?>
