<?php
include 'db.php';
include 'session.php';
$memberid = $_GET['memberid'];
$action = $_GET['action'];
$subject = $_GET['subject'];
$farm = $_SESSION['farm'];
$message="";

//Managing Doctors
if($action=='activate-doctor'){
    $transaction = mysqli_query($con,"update manage_doctors set status='Activated' where id = '$memberid' and farm_id ='$farm'");
    if($transaction){
        //recording the log;
        $action     =           "Activated account for".' '.$subject;
        $time       =           date("Y-m-d H:i:s");
        $by         =           $_SESSION['full_names'];
        //Recording the log
        mysqli_query($con,"insert into transaction_logs(farm_id,transaction_action,transaction_time,transaction_by) VALUES ('$farm','$action','$time','$by')");
        header("location: view-doctors");
    }
}
if($action=='deactivate-doctor'){
    $transaction = mysqli_query($con,"update manage_doctors set status='Deactivated' where id = '$memberid' and farm_id ='$farm'");
    if($transaction){
        //recording the log;
        $action     =           "Deactivated account for".' '.$subject;
        $time       =           date("Y-m-d H:i:s");
        $by         =           $_SESSION['full_names'];
        //Recording the log
        mysqli_query($con,"insert into transaction_logs(farm_id,transaction_action,transaction_time,transaction_by) VALUES ('$farm','$action','$time','$by')");
        header("location: view-doctors");
    }
}

//Managing Expense Items

if($action=='activate-item'){
    $transaction = mysqli_query($con,"update expensesitems set status='Activated' where id = '$memberid' and farm_id ='$farm'");
    if($transaction){
        //recording the log;
        $action     =           "Activated ".' '.$subject;
        $time       =           date("Y-m-d H:i:s");
        $by         =           $_SESSION['full_names'];
        //Recording the log
        mysqli_query($con,"insert into transaction_logs(farm_id,transaction_action,transaction_time,transaction_by) VALUES ('$farm','$action','$time','$by')");
        header("location: view-expenses-items");
    }
}
if($action=='deactivate-item'){
    $transaction = mysqli_query($con,"update expensesitems set status='Deactivated' where id = '$memberid' and farm_id ='$farm'");
    if($transaction){
        //recording the log;
        $action     =           "Deactivated".' '.$subject;
        $time       =           date("Y-m-d H:i:s");
        $by         =           $_SESSION['full_names'];
        //Recording the log
        mysqli_query($con,"insert into transaction_logs(farm_id,transaction_action,transaction_time,transaction_by) VALUES ('$farm','$action','$time','$by')");
        header("location: view-expenses-items");
    }
}


//Managing Acaricides
if($action=='activate-acaricide'){
    $transaction = mysqli_query($con,"update manage_acaricide set status='Activated' where id = '$memberid' and farm_id ='$farm'");
    if($transaction){
        //recording the log;
        $action     =           "Activated ".' '.$subject;
        $time       =           date("Y-m-d H:i:s");
        $by         =           $_SESSION['full_names'];
        //Recording the log
        mysqli_query($con,"insert into transaction_logs(farm_id,transaction_action,transaction_time,transaction_by) VALUES ('$farm','$action','$time','$by')");
        header("location: view-acaricides");
    }
}
if($action=='deactivate-acaricide'){
    $transaction = mysqli_query($con,"update manage_acaricide set status='Deactivated' where id = '$memberid' and farm_id ='$farm'");
    if($transaction){
        //recording the log;
        $action     =           "Deactivated".' '.$subject;
        $time       =           date("Y-m-d H:i:s");
        $by         =           $_SESSION['full_names'];
        //Recording the log
        mysqli_query($con,"insert into transaction_logs(farm_id,transaction_action,transaction_time,transaction_by) VALUES ('$farm','$action','$time','$by')");
        header("location: view-acaricides");
    }
}

//Managing Vaccines
if($action=='activate-vaccine'){
    $transaction = mysqli_query($con,"update manage_vaccines set status='Activated' where id = '$memberid' and farm_id ='$farm'");
    if($transaction){
        //recording the log;
        $action     =           "Activated ".' '.$subject;
        $time       =           date("Y-m-d H:i:s");
        $by         =           $_SESSION['full_names'];
        //Recording the log
        mysqli_query($con,"insert into transaction_logs(farm_id,transaction_action,transaction_time,transaction_by) VALUES ('$farm','$action','$time','$by')");
        header("location: view-manage-vaccines");
    }
}
if($action=='deactivate-vaccine'){
    $transaction = mysqli_query($con,"update manage_vaccines set status='Deactivated' where id = '$memberid' and farm_id ='$farm'");
    if($transaction){
        //recording the log;
        $action     =           "Deactivated".' '.$subject;
        $time       =           date("Y-m-d H:i:s");
        $by         =           $_SESSION['full_names'];
        //Recording the log
        mysqli_query($con,"insert into transaction_logs(farm_id,transaction_action,transaction_time,transaction_by) VALUES ('$farm','$action','$time','$by')");
        header("location: view-manage-vaccines");
    }
}


//Managing Breeds
if($action=='activate-breed'){
    $transaction = mysqli_query($con,"update manage_breeds set status='Activated' where id = '$memberid' and farm_id ='$farm'");
    if($transaction){
        //recording the log;
        $action     =           "Activated Breed".' '.$subject;
        $time       =           date("Y-m-d H:i:s");
        $by         =           $_SESSION['full_names'];
        //Recording the log
        mysqli_query($con,"insert into transaction_logs(farm_id,transaction_action,transaction_time,transaction_by) VALUES ('$farm','$action','$time','$by')");
        header("location: view-breeds");
    }
}
if($action=='deactivate-breed'){
    $transaction = mysqli_query($con,"update manage_breeds set status='Deactivated' where id = '$memberid' and farm_id ='$farm'");
    if($transaction){
        //recording the log;
        $action     =           "Deactivated Breed".' '.$subject;
        $time       =           date("Y-m-d H:i:s");
        $by         =           $_SESSION['full_names'];
        //Recording the log
        mysqli_query($con,"insert into transaction_logs(farm_id,transaction_action,transaction_time,transaction_by) VALUES ('$farm','$action','$time','$by')");
        header("location: view-breeds");
    }
}
//Managing Users
if($action=='activate-user'){

    $transaction = mysqli_query($con,"update users set status='Activated' where id='$memberid' and farm_id ='$farm'");
    if($transaction){
        //recording the log;
        $action     =           "Activated User".' '.$subject;
        $time       =           date("Y-m-d H:i:s");
        $by         =           $_SESSION['full_names'];
        //Recording the log
        mysqli_query($con,"insert into transaction_logs(farm_id,transaction_action,transaction_time,transaction_by) VALUES ('$farm','$action','$time','$by')");
        header("location: view-users");
    }
}
if($action=='deactivate-user'){
    $transaction = mysqli_query($con,"update users set status='Deactivated' where id = '$memberid' and farm_id ='$farm'");
    if($transaction){
        //recording the log;
        $action     =           "Deactivated User".' '.$subject;
        $time       =           date("Y-m-d H:i:s");
        $by         =           $_SESSION['full_names'];
        //Recording the log
        mysqli_query($con,"insert into transaction_logs(farm_id,transaction_action,transaction_time,transaction_by) VALUES ('$farm','$action','$time','$by')");
        header("location: view-users");
    }
}

//Managing Farms
if($action=='activate-farm'){

    $transaction = mysqli_query($con,"update farms set status='Active' where farmid='$memberid'");
    if($transaction){
        //recording the log;
        $action     =           "Activated Farm".' '.$subject;
        $time       =           date("Y-m-d H:i:s");
        $by         =           $_SESSION['full_names'];
        //Recording the log
        mysqli_query($con,"insert into transaction_logs(farm_id,transaction_action,transaction_time,transaction_by) VALUES ('$farm','$action','$time','$by')");
        header("location: view-farms");
    }
}
if($action=='deactivate-farm'){
    $transaction = mysqli_query($con,"update farms set status='Inactive' where farmid = '$memberid'");
    if($transaction){
        //recording the log;
        $action     =           "Deactivated Farm".' '.$subject;
        $time       =           date("Y-m-d H:i:s");
        $by         =           $_SESSION['full_names'];
        //Recording the log
        mysqli_query($con,"insert into transaction_logs(farm_id,transaction_action,transaction_time,transaction_by) VALUES ('$farm','$action','$time','$by')");
        header("location: view-farms");
    }
}
?>