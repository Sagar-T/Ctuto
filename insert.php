<?php
$email='';
$password='';
$username='';
$password2='';
session_start();

$con = mysqli_connect('localhost', 'root', '');
    if(!$con)
    {
        echo 'not connected to data base server';
    }
    if(!mysqli_select_db($con,'login'))
    {
        echo 'database not selected';
    }
	
	if(isset($_POST['send'])){
    $username = $_POST['username'];
	   $email = $_POST['email'];
    $password = md5($_POST['password']);
	  $password2 = md5($_POST['password2']);
	}
	else
	{
		//else redirect to register only
		header("location: register.php");
		
	}

    $check_username=mysqli_query($con,"select * from user where username='$username'");
	 $checkrows_username=mysqli_num_rows($check_username);
	    $check_email=mysqli_query($con,"select * from user where   email='$email'");
    $checkrows_email=mysqli_num_rows($check_email);
if($checkrows_username>0) {
     	   	header( "refresh:0.01; url=register.html" ); 
echo "<script> alert('Username exists');</script>";
   } 
   elseif($checkrows_email>0) {
      	   	header( "refresh:0.01; url=register.html" ); 
echo "<script> alert('Email id exists');</script>";
   } 
   elseif($_POST['password']!= $_POST['password2'])
   {
	   	header( "refresh:0.01; url=register.html" ); 
echo "<script> alert('Oops! Password did not match! Try again.');</script>";
      
	  }
	  else
		  {  
    //insert results from the form input
      $query = "INSERT IGNORE INTO user(username, password,email) VALUES('$username','$password', '$email')";
	  

      $result = mysqli_query($con, $query) or die('Error querying database.');

      mysqli_close($con);
	  echo "Successfully Registered";
    }
    
    
	/*
$query=mysqli_query($con,"insert into user(username,email,password) values ('$username','$email','$password')");

if($query)
{
	$check_duplicate_username= "SELECT username FROM user WHERE username ='$username'";
$result = mysqli_query($con,$check_duplicate_username);
$count = mysqli_num_rows($result);
echo "$count";

$check_duplicate_email= "SELECT email FROM user WHERE email ='$email'";
$result1 = mysqli_query($con,$check_duplicate_email);
$count1 = mysqli_num_rows($result1);
echo "$count1";
if($count>0)
{
	echo "<script>alert('Username already taken')</script>";
	header( "refresh:0.5; url=register.html" ); 
}
	
elseif($count1>0)
{
	echo "<script>alert('Email already taken')</script>";
	header( "refresh:0.5; url=register.html" ); 
}
elseif ($_POST['password']!= $_POST['password2'])
 { 
	header( "refresh:0.5; url=register.html" ); 
echo "<script> alert('Oops! Password did not match! Try again.');</script>";

    
 }
 else
 {
	echo "<script>alert('Successfully Registered. You can login now');</script>";
	//header('location:user-login.php');
}
}*/