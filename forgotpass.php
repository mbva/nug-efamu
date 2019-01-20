
<?php

if(isset($_POST['email'])){
$email=$_POST['email'];

include("db.php");

//$email = stripslashes($email);

//$email = mysqli_real_escape_string($dbconnection,$email);
$sql="SELECT * FROM users WHERE email='$email'";
$result=mysqli_query($con,$sql) or die("ERROR : " . mysqli_error($con));

$checkexistance=mysqli_num_rows($result);
if($checkexistance>0){
	while ($user = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
$id=$user['id'];
$name=$user['full_names'];
$username=$user['username'];

	}

$msg1 = "Dear  $name ,\n ";
		$msg1 .= "It seems you forgot your Login Credentials at EFAMU.   \n ";
		$msg1 .= "See Beow your account details:  \n ";
		$msg1 .= "Username:$username \n ";
		
		
		
		$msg1 .= "Click on the link below to to reset your password\n ";
		
		$msg1 .= "\nhttp://{$_SERVER['SERVER_NAME']}/efamunew/resetpass?vm=$email";
		$msg1 .="\nThank You";
					$msg1 .="\n Farmer's Market Info- Admin";
					$msg1 .="\nNote! This an auto generated mail . Donot reply it!";
					$headers .= 'From: <admin@nugsoft.com>' . "\r\n";
					
mail("$email","Forgot Password",$msg1,$headers);
 
// header("location:index.php?msgsent=user");	
echo "<script type='text/javascript'>alert('Password Reset email has been sent')</script>"; 
  echo "<script>document.location='index'</script>";
}else{
	echo "<script type='text/javascript'>alert('Email:  $email doesnot exist ')</script>";
	echo "<script>document.location='index'</script>";
}
 
 }

 ob_end_flush();
?>
