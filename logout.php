<?php
include("dataconnection.php");
session_start();

//session_undet(); remove the data of all session variables

unset($_SESSION["id"]);//remove this data 

session_destroy();

header("location:index.php");
?>