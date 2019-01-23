<?php
include 'db.php';
include 'session.php';
$farm = $_SESSION['farm'];
$action = $_GET['action'];
if($action=='heat_positive'){
    $animal_id =$_GET['animal_id'];
    //mysqli_query($con,"delete from animal_serving where eartag = '$tagno'");

}
if($action=='heat_negative'){
    $animal_id =$_GET['animal_id'];
    $date = date("Y-m-d");
    mysqli_query($con,"update animal_serving set sohdate = '$date',
	soh_status='Negative' where animal_id ='$animal_id' and farm_id ='$farm'");
    //Inserting into pregnancy_test table
    //getting the serving table
    $result = mysqli_fetch_array(mysqli_query($con,"select * from animal_serving 
	where animal_id ='$animal_id' and farm_id ='$farm'"));
    $serve_date = $result['servedate'];
    mysqli_query($con,"update heat_animals set actualheatdate = '$serve_date' where animal_id='$animal_id' and farm_id ='$farm'");
    $preg_test_date=date_create($serve_date);

    date_add($preg_test_date,date_interval_create_from_date_string("60 days"));
    $preg_test_date =  date_format($preg_test_date,"Y-m-d");

    $insertpregtest=mysqli_query($con,"insert into pregnancy_test(farm_id,animal_id,servedate,expected_preg_test,status)
	VALUES ('$farm','$animal_id','$serve_date','$preg_test_date','Pending')");
    header("location:wheel-heat-test");
    if($insertpregtest){
    }else{echo "<h2>FAILED </h2>".mysqli_error($con);
    }
}

if($action=='heat_positive'){
    $animal_id=$_GET['animal_id'];
    $date = date("Y-m-d");
    //Getting the last id of the caif to get the calving date
    $fetch =mysqli_fetch_array(mysqli_query($con,"select calving_date from heat_animals where animal_id='$animal_id' and farm_id ='$farm' ORDER BY id DESC limit 1"));
    $calvingdate = $fetch['calving_date'];
    mysqli_query($con,"insert into heat_animals(farm_id,animal_id,calving_date,exp_heat,actualheatdate,status)VALUES ('$farm','$animal_id','$calvingdate','$date','$date','Pending')");
    //Updating the heat table
    mysqli_query($con,"update animal_serving set soh_status = 'Positive' where animal_id='$animal_id' and farm_id ='$farm'");
    header("location:wheel-heat-test");
}

if($action=='pregnant'){
    $animal_id =$_GET['animal_id'];
    $date = date("Y-m-d");
    mysqli_query($con,"update pregnancy_test set confirmation_date = '$date',status='Pregnant' where animal_id= '$animal_id' and farm_id ='$farm'");
    mysqli_query($con,"update animal_serving set soh_status='Pregnant' where animal_id = '$animal_id' and farm_id ='$farm'");
    header("location:wheel-preg-test");
}

?>