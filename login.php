<!DOCTYPE html>
<html lang="en" >
<head>
<?php
include("dataconnection.php");
session_start();

$error_msg="";
$error="";
$pass_error="";
if(isset($_POST["loginbtn"]))
{
	
	$pass_count=0;
	$email=$_POST["loginemail"];
	$password=$_POST["loginpass"];
	
	
	$result=mysqli_query($connect, "SELECT * FROM login WHERE email='$email' AND password='$password'");
	
	$count=mysqli_num_rows($result);

	$row = mysqli_fetch_assoc($result);

	if(empty($email)) 
	{
		$error="Please enter this field.";	
	}
	else
	{
		$error="";	
	}
	

	if(empty($password)) 
	{
		$error="Please enter this field.";	
	}
	else
	{
		$error="";	
	}
	
	if($count==1)
	{
		
		$_SESSION['userid']=$row['id'];  
		header("location:index.php");
	}
	else
	{
		$error_msg="Your account email and/or password is incorrect, please try again";
	}
	
}

?>

  <meta charset="UTF-8">
  <title>Sign Up Form</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /><link rel="stylesheet" href="css/login.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="login-form">
  <div class="container">
    <div class="header">
      <h1>Sign In</h1>
    </div>
    <form name="login_frm" method="POST" id="form">
      <div class="input">
        <i class="fa-solid fa-envelope"></i>
        <input type="email" name="loginemail" placeholder="Email" />
      </div>
      <div class="input">
        <i class="fa-solid fa-lock"></i>
        <input type="password" name="loginpass" placeholder="Password" />
      </div>
      <input class="signup-btn" name="loginbtn" type="submit" value="Login" />
    </form>
  
    <a href="#">Forgot Password</a>
  </div>
</div>
<!-- partial -->
  
</body>
</html>
