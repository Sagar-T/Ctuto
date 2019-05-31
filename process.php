
<?php
session_start();
$email='';
$password='';
	 $email = $_POST['email'];
$password = md5($_POST['password']);
$_SESSION['email_id']=$email;
    //$username = $_POST['username'];
if(!isset($_SESSION['email_id'])){
	
	
	//readfile('index.html');
	//echo "welcome ".$_SESSION['email_id'];
	//echo "<a href='logout.php'><input type=button value=logout name=logout></a>";
	header("location: login.html");
}
else
{
	 $email = $_POST['email'];
$password = md5($_POST['password']);
$_SESSION['email_id']=$email;
	
$link = mysqli_connect("localhost", "root", "");
//$username = stripcslashes($username);
$email = stripcslashes($email);
$password = stripcslashes($password);
//$username = mysqli_real_escape_string($link,$username);
$email = mysqli_real_escape_string($link,$email);

$password = mysqli_real_escape_string($link,$password);



mysqli_select_db($link,"login");

//$sql = mysqli_query($link,"select * from users where username = '".$username."' and password = '".$password."'")
    //or die("Failed to query database".mysql_error());
$sql="select * from user where email='".$email."' AND password='".$password."' limit 1";
$result=mysqli_query($link, $sql);
if (!$result) {
    printf("Error: %s\n", mysqli_error($link));
    exit();
}
$row = mysqli_fetch_array($result);

if($row['email'] == $email  && $row['password'] == $password){
	
      	
//saving email of the logged in user
			$email=$_SESSION['email_id']=$email;
		//	$query="SELECT * FROM user WHERE email='$email'";
		//	$data=mysqli_query($link,$query);
			//$details=mysqli_fetch_assoc($data);
			//echo $details['username'];
				echo "welcome ".$_SESSION['email_id'];
	echo "<a href='logout.php'><input type=button value=logout name=logout></a>";
			//header( "refresh:0.01; url=index.html" ); 
		

}
else{
       	header( "refresh:0.01; url=login.html" ); 
echo "<script>alert('Email or Password is incorrect.');</script>";
}}
?>