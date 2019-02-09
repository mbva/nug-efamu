<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <title>Welcome to Efamu</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/default.css" id="theme"  rel="stylesheet">
 

</head>

<body>

<?php
include 'db.php';
$message="";

if(isset($_POST['submit'])){
    $member_id = "EFAMU-".rand(10000,99999);
    $fname = mysqli_real_escape_string($con,    ucwords($_POST['fname']));
    $lname = mysqli_real_escape_string($con,    ucwords($_POST['lname']));
    $contact = mysqli_real_escape_string($con,  $_POST['contact']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
	$district = mysqli_real_escape_string($con, $_POST['district']);
	
	 /*$farmname= mysqli_real_escape_string($con,  $_POST['farmname']);
    $farmowner = mysqli_real_escape_string($con, $_POST['farmowner']);
	$farmcontact = mysqli_real_escape_string($con, $_POST['farmcontact']);
	$districtfarm=mysqli_real_escape_string($con, $_POST['districtfarm']);
	*/
	
    $password = mysqli_real_escape_string($con, md5($_POST['password']));
    $full_names= $fname.' '.$lname;
    // $farm = mysqli_real_escape_string($con,    ucwords($_POST['farmid']));

    //capturing the registrar of the data
    $entered_by ='Self Register';
    $time =         date("Y-m-d H:i:s");
    $action =       "Registered user ".' '.$full_names;
	
	
	 $owner = mysqli_real_escape_string($con,          ucwords($_POST['owner']));
    $farmname = mysqli_real_escape_string($con,          ucwords($_POST['farmname']));
    $address = mysqli_real_escape_string($con,          ucwords($_POST['address']));
    $ownercontact = mysqli_real_escape_string($con,          ucwords($_POST['contact']));

    //capturing the registrar of the data
    $entered_by ='Self Register';
    $time =         date("Y-m-d H:i:s");
    $action =       "Registered a farm $farmname";

    //checking records
    $check_records= mysqli_query($con,"select * from farms where farmname ='$farmname' 
	and owner ='$owner' and contact='$contact'");
    if(mysqli_num_rows($check_records)>0){
        echo "<script>alert('The Farm  ($farmname) already exists');</script>";
    }else{
        $sql_spray = mysqli_query($con,"insert into farms(farmname,owner,address,contact,status,regby,regtime)
		VALUES ('$farmname','$owner','$address','$ownercontact','Deactive','Self Register','$time')");

        $sql_log  = mysqli_query($con,"insert into transaction_logs(transaction_action,transaction_time,transaction_by) VALUES ('$action','$time','Self Register')");

        if($sql_spray && $sql_log){
       
$select_farmid="SELECT * FROM farms ORDER by farmid desc limit 1";
$lastfarmid=mysqli_query($con,$select_farmid) or die("ERROR : " . mysqli_error($con));

while ($lfarmid = mysqli_fetch_array($lastfarmid,MYSQLI_ASSOC)){
$farmid = $lfarmid['farmid'];
		}
    



    //checking if the id doesn't exist
    $check_id = mysqli_query($con,"select * from users where memberid = '$member_id'");
    if(mysqli_num_rows($check_id) > 0){
        $member_id++;
    }else{
        //checking if the member already exists
        $check_account = mysqli_query($con,"select * from users where contact = '$contact'");
        if(mysqli_num_rows($check_account) > 0){
            //$message = "<div class=\"alert alert-danger\"><strong>Failed! The account already exists</strong></div>";
            echo "<script>alert('Failed! The account already exists');</script>";
        } else{
            //check if the username already exists
            $check_username = mysqli_query($con,"select * from users where username = '$username'");
            if(mysqli_num_rows($check_username) > 0){
                $message = "<div class=\"alert alert-danger\"><strong>Failed! The Username already taken. Chose another one</strong></div>";
            }else{
                $sql_user = "insert into users(district,farm_id,memberid,full_names,contact,username,password,photo,status)
				VALUES ('$district','$farmid','$member_id','$full_names','$contact','$username','$password','','Deactivated')";
                $sql_log  = "insert into transaction_logs(farm_id,transaction_action,transaction_time,
				transaction_by) VALUES ('$farmid','$action','$time','$entered_by')";
                //Executing the queries;
                $insert_user = mysqli_query($con,$sql_user);
                $insert_transaction = mysqli_query($con,$sql_log);
                if($insert_user && $insert_transaction){
                  
//SEND EMAIL TO SYSTEM ADMIN ON NEW FARM REGISTRATION
$email='vmatsiko@gmail.com';
$msg1 = "Dear  Admin ,\n ";
		$msg1 .= "Anew farm has been registered at EFAMU.   \n ";
		$msg1 .= "See the farm details below:  \n ";
		$msg1 .= "Farm Name:$farmname \n ";
		$msg1 .= "District/Address:$address \n ";
		$msg1 .= "Farm Owner:$owner \n ";
		$msg1 .= "Owner Contact:$ownercontact \n ";
		$msg1 .= "Registered By:$fname $lname (New User) \n ";
		
		
		$msg1 .= "Click on the link below to login and approve the Farm\n ";
		
		$msg1 .= "\nhttp://{$_SERVER['SERVER_NAME']}/efamunew/";
		$msg1 .="\nThank You";
					$msg1 .="\n EFAMU Admin";
					$msg1 .="\nNote! This an auto generated mail . Donot reply it!";
					$headers .= 'From: <admin@nugsoft.com>' . "\r\n";
					
mail("$email","New Farm Registration",$msg1,$headers);

//SEND EMAIL ABOUT NEW ACCOUNT Registration

//SEND EMAIL TO SYSTEM ADMIN ON NEW FARM REGISTRATION
$email='vmatsiko@gmail.com';
$msg1 = "Dear  Admin ,\n ";
		$msg1 .= "Anew User has been registered at EFAMU.   \n ";
		$msg1 .= "See the farm details below:  \n ";
		$msg1 .= "Name:$fname $lname \n ";
		$msg1 .= "District/Address:$district \n ";
		
		$msg1 .= "Owner Contact:$contact \n ";
		$msg1 .= "Registered By:Self \n ";
		
		
		$msg1 .= "Click on the link below to login and approve the Farm\n ";
		
		$msg1 .= "\nhttp://{$_SERVER['SERVER_NAME']}/efamunew/";
		$msg1 .="\nThank You";
					$msg1 .="\n EFAMU Admin";
					$msg1 .="\nNote! This an auto generated mail . Donot reply it!";
					$headers .= 'From: <admin@nugsoft.com>' . "\r\n";
					
mail("$email","New Farm Registration",$msg1,$headers);

	
				  echo "<script>alert('Registration is Successful');</script>";
                }
            }
        }
    }
}
	}
}

?>

    <!-- Preloader -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
        </svg>
    </div>
    <section id="wrapper" class="new-login-register">
        <div class="lg-info-panel">
            <div class="inner-panel">
                <a href="javascript:void(0)" class="p-20 di"><img src="plugins/images/admin-logo.png"></a>
                <div class="lg-content">
                    <h2>EFAMU DAIRY</h2>
                    <p class="text-muted">For all your Dairy farm Solutions </p> <a href="#" class="btn btn-rounded btn-danger p-l-20 p-r-20"> Buy now</a> </div>
            </div>
        </div>
        <div class="new-login-box">
            <div class="white-box">
                <h3 class="box-title m-b-0">Sign UP </h3> <small>Enter your details below</small>
              <form action="signup" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">First Name</label>
                                        <div class="input-group">
                                            <input class="form-control" name="fname" required autocomplete="off" placeholder="First Name" type="text">
                                            <div class="input-group-addon"><i class="ti-pencil-alt"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Last Name</label>
                                        <div class="input-group">
                                            <input class="form-control" name="lname" required autocomplete="off" placeholder="Last Name" type="text">
                                            <div class="input-group-addon"><i class="ti-pencil-alt"></i></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Contact</label>
                                        <div class="input-group">
                                            <input class="form-control" name="contact" onkeypress="return isNumberKey(event)" maxlength="10" required autocomplete="off" placeholder="Contact" type="text">
                                            <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Username</label>
                                        <div class="input-group">
                                            <input class="form-control" name="username"  required autocomplete="off" placeholder="Username" type="text">
                                            <div class="input-group-addon"><i class="fa fa-user-circle"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Password</label>
                                        <div class="input-group">
                                            <input class="form-control" name="password" required autocomplete="off" placeholder="Password" type="text">
                                            <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                                        </div>
                                    </div>
									
									  <div class="form-group">
                                        <label for="exampleInputuname">District </label>
                                        <div class="input-group">
										 <select class="form-control select2" name="district" required>
                                                <option>Select</option>
                                                <?php
                                                $select = mysqli_query($con,"select * from districts ");
                                                while ($district = mysqli_fetch_array($select)){
                                                    ?>
                                                    <option value="<?php echo $district['district']; ?>"><?php echo $district['district']; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                             
                                           
                                            <?php
                                            ?>
                                            <div class="input-group-addon"><i class="ti-pencil"></i></div>
                                        </div>
                                    </div>

                                    
                                </div>
                            </div>
							<h4><b>FARM DETAILS</b></H4>
							         <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Farm Name</label>
                                        <div class="input-group">
                                            <input class="form-control" name="farmname" required autocomplete="off" placeholder="Farm Name" type="text">
                                            <div class="input-group-addon"><i class="ti-pencil-alt"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Farm Owner</label>
                                        <div class="input-group">
                                            <input class="form-control" name="owner" required autocomplete="off" placeholder="Farm Owner" type="text">
                                            <div class="input-group-addon"><i class="ti-pencil-alt"></i></div>
                                        </div>
                                    </div>

                                   
                                </div>
                                <div class="col-sm-6">
								 <div class="form-group">
                                        <label for="exampleInputEmail1">Contact</label>
                                        <div class="input-group">
                                            <input class="form-control" name="contact" onkeypress="return isNumberKey(event)" maxlength="10" required autocomplete="off" placeholder="Contact" type="text">
                                            <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label for="exampleInputuname">District(Location) </label>
                                        <div class="input-group">
										 <select class="form-control select2" name="address" required>
                                                <option>Select</option>
                                                <?php
                                                $select = mysqli_query($con,"select * from districts ");
                                                while ($district = mysqli_fetch_array($select)){
                                                    ?>
                                                    <option value="<?php echo $district['district']; ?>"><?php echo $district['district']; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                             
                                           
                                            <?php
                                            ?>
                                            <div class="input-group-addon"><i class="ti-pencil"></i></div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" name="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                    </div>
                                </div>
                        </form>
            </div>
        </div>
    </section>
    <!-- jQuery -->
   <!-- jQuery -->
<script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>

<!--slimscroll JavaScript -->
<script src="js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="js/waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="js/custom.min.js"></script>
<!--Style Switcher -->
<script src="plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>