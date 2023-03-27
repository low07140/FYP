<?php
$connect=mysqli_connect("localhost","root","","fyp");

if($connect)
{
	echo" ";
}
else
{
	die("Could not connect".mysqli_connect_error());
}
?>