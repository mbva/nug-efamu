<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head.php';?>
	
	

<?php
include 'db.php';
$message="";
$active='settings';
$farm = $_SESSION['farm'];
$id = $_GET['memberid'];

 $action ="Deleted Income Categories";

        $update = mysqli_query($con,"delete from incomecategories where id='$id'");
        $insert_transaction = mysqli_query($con,"insert into transaction_logs(farm_id,transaction_action,transaction_time,transaction_by) VALUES ('$farm','$action','$time','$entered_by')");
if(!$update){
die('not deleted'.mysqli_error($con));
}else{
	echo 'NOY';
	
		?>
		<script>alert=('view-income-categories');</script>
<script>window.location="view-income-categories";</script>

<?php }?>
