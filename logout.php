<?php
/*
error_reporting(0);
include 'head.php';
//echo $_SESSION['full_names'];
//capturing the logs details
date_default_timezone_set('Africa/Kampala');
//capturing the time to record a log
$time =         date("Y-m-d H:i:s");
$action = $_SESSION['full_names'].' '."Logged out";

$insert = mysqli_query($con,"insert into login_logs(login_action,login_time)VALUES ('$action','$time')");
*/
//Logging out
session_start();
if(session_destroy()) // Destroying All Sessions
{
    header("location:index.php"); // Redirecting To Home Page
}
?>