<?php  ///php
session_name('fms');
session_start();
date_default_timezone_set("Africa/Nairobi");
ob_start();
if(isset($_GET['vm'])){
$email=$_GET['vm'];
}
if(isset($_POST['password'])){
$newpass=$_POST['newpass'];

include("db.php");

$sql="UPDATE  users SET password=md5('$newpass') WHERE email='$email'";
$result=mysqli_query($con,$sql) or die("ERROR : " . mysqli_error($con));
while ($user = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
$id=$user['id'];
$name=$user['full_names'];
$username=$user['username'];

	}
if($result){

$msg1 = "Dear  $name ,\n ";
		$msg1 .= "You have changed your password at EFAMU  \n ";
		
		$msg1 .= " Click on the link below to to login to your account\n ";
		
		$msg1 .= "\nhttp://{$_SERVER['SERVER_NAME']}/efamunew/";
		
		$msg1 .= "Incase you didnot initiate this change, Contact your EFAMU Support Team  \n ";
		$msg1 .="\nThank You";
					$msg1 .="\n EFAMU ADMIN";
					$msg1 .="\nNote! This an auto generated mail . Donot reply it!";
					$headers .= 'From: <admin@efamu.com>' . "\r\n";
					
mail("$email","Pasword Change",$msg1,$headers);
echo "<script type='text/javascript'>alert('Password Changed Successfully,Please Login ')</script>";
	echo "<script>document.location='index'</script>";	
}else{
	echo "<script type='text/javascript'>alert('Password Change Failed ')</script>";
	echo "<script>document.location='index'</script>";
}
 
 }

 ob_end_flush();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Farmer System</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/select2/select2.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- Bootstrap CSS
    ============================================ -->
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/animate.css">
<!-- normalize CSS
    ============================================ -->
<link rel="stylesheet" href="css/normalize.css">
<!-- meanmenu icon CSS
    ============================================ -->
<link rel="stylesheet" href="css/meanmenu.min.css">
<!-- main CSS
    ============================================ -->
<link rel="stylesheet" href="css/main.css">
</head>   

<body> 
<div class="container">    
        <div id="loginbox" style="margin-top:200px;" class="mainbox col-md-4 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
					<?php if(isset($_GET['err'])){
						$err=$_GET['err'];
						echo '<font color="red">'."<p>$err </p>".'</font>';
					}?>
                        <div class="panel-title">Reset Account</div>
                        
                    </div>     

                    <div style="padding-top:20px; padding-bottom:1px;" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginform" class="form-horizontal" role="form" method="POST" action="">
                                    
                            <div style="margin-bottom: 30px" class="input-group">
                                        <span class="input-group-addonc"><i clagss="glyphicon glyphicon-envelope"></i></span>
                                        <input id="login-username" type="password" class="form-control" name="newpass" size="80%"  placeholder="Enter New Password">                                        
                                    </div>
                                
                            
                                    
                       
                            <div class="form-group">
                                    <div class="col-sm-4">
                                    </div>
                                    <div class="col-sm-5">
                                        <button type="submit" name="password" class="btn btn-primary" style="padding: 5px 38px;"> Submit </button>
                                    </div>
                            </div>

                        </form>     

                    </div>                     
            </div>  
        </div>
    </div>
</body>
</html>