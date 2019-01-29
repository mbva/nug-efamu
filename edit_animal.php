<?php 
include 'db.php';
include 'head.php';?>

<?php
    $farm_id = mysqli_real_escape_string($con,    ucwords($_POST['farm_id']));
    $animal_id = mysqli_real_escape_string($con,    ucwords($_POST['animal_id']));
    $tagNo = mysqli_real_escape_string($con,    ucwords($_POST['tag']));
	$animalname = mysqli_real_escape_string($con,    ucwords($_POST['names']));
    $gender = mysqli_real_escape_string($con,  $_POST['gender']);
    $breed = mysqli_real_escape_string($con, $_POST['breed']);
    $dob = mysqli_real_escape_string($con, $_POST['dob']);
    $location = mysqli_real_escape_string($con, $_POST['location']);
    $genetic_percentage = mysqli_real_escape_string($con, $_POST['genetic_percentage']);
    $name_of_sire = mysqli_real_escape_string($con, $_POST['name_of_sire']);
    $breed_of_sire = mysqli_real_escape_string($con, $_POST['breed_of_sire']);
    $name_of_dam = mysqli_real_escape_string($con, $_POST['name_of_dam']);
    $breed_of_dam = mysqli_real_escape_string($con, $_POST['breed_of_dam']);
	


    //capturing the registrar of the data
    $entered_by =   $_SESSION['full_names'];
    $time =         date("Y-m-d H:i:s");
    $action =       "Edited animal ".' '.$animal_id;
 echo $farm_id ;
    echo $animal_id; 
    $update = mysqli_query($con,"UPDATE animal_registration SET tagNo='$tagNo',animal_name='$animalname',gender='$gender',breed='$breed',dob='$dob',location='$location',
	genetic_percentage='$genetic_percentage',name_of_dam='$name_of_dam',breed_of_dam='$name_of_dam',name_of_sire='$name_of_sire',breed_of_sire='$breed_of_sire' where animal_id = '$animal_id'");
    $sql_log  =  mysqli_query($con,"insert into transaction_logs(farm_id,transaction_action,transaction_time,transaction_by) VALUES ('$farm','$action','$time','$entered_by')");
    

  //Executing the queries;
if(!$update){
	die("not updated".mysqli_error($con));
}
	else{?>
		<script>alert('ANIMAL SUCCECCEFULY UPDATED');</script>
		<script>window.location="view-animal-registration";</script>
		<?php 
  
}
?>