<?php
error_reporting(1);
session_start();
if(!isset($_SESSION['memberid'])  || (trim($_SESSION['memberid']==''))){
    header("location:index.php");
    exit();
}
?>


