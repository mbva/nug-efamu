
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
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<?php
date_default_timezone_set('Africa/Kampala');
include 'db.php';
//session_start();
$message='';
session_start();
if (isset($_POST['login'])){
    $username = mysqli_real_escape_string($con,$_POST['username']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $pass = md5($password);
    $time =         date("Y-m-d H:i:s");

    $sql ="select * from users where username='$username' and password='$pass'";
    //getting the account status
    $user_status = mysqli_fetch_array(mysqli_query($con,$sql));
    //checking if the account exists
    if(mysqli_num_rows(mysqli_query($con,$sql))>0){
        //checking if the account is Active
        $farmid=$user_status['farm_id'];
        if($user_status['status']=='Activated' AND $farmid!=1){
            $_SESSION['memberid'] = $user_status['memberid'];
            $_SESSION['full_names'] = $user_status['full_names'];
            $_SESSION['farm'] = $user_status['farm_id'];
            $_SESSION['password'] = $pass;
            $accountnames = $user_status['full_names'];
            //capturing the time to record a log
            $time =date("Y-m-d H:i:s");
            $action = $_SESSION['full_names'].' '."Logged in";
//header("location:dashboard");
            $insert = mysqli_query($con,"insert into login_logs(login_action,login_time,username,accountnames)VALUES ('$action','$time','$username','$accountnames')");
            if($insert){

                header("location:dashboard");
                echo "<script>document.location='dashboard'</script>";
            }else{ //echo "<h2>insert $action </h2>".mysqli_error($con);

            }
        }
        elseif($user_status['status']=='Activated' AND $farmid=1){
            $_SESSION['memberid'] = $user_status['memberid'];
            $_SESSION['full_names'] = $user_status['full_names'];
            $_SESSION['farm'] = $user_status['farm_id'];
            $_SESSION['password'] = $pass;
            $accountnames = $user_status['full_names'];
            //capturing the time to record a log
            $time =date("Y-m-d H:i:s");
            $action = $_SESSION['full_names'].' '."Logged in";
//header("location:dashboard");
            $insert = mysqli_query($con,"insert into login_logs(login_action,login_time,username,accountnames)VALUES ('$action','$time','$username','$accountnames')");
            if($insert){

                header("location:admin/admin-dashboard");
                echo "<script>document.location='admin/admin-dashboard'</script>";
            }else{ //echo "<h2>insert $action </h2>".mysqli_error($con);

            }
        }elseif($user_status['status']=='Deactivated'){
            $message = "<div class=\"alert alert-danger\"><strong>The Account has not been Approved, Contact the administrator!</strong></div>";
        }
    }else{
        /* mysqli_query($con,"insert into loginfailure(login_time,username,password)VALUES ('$time','$username','$password')");*/
        $message = "<div class=\"alert alert-info\"><strong><h5>Incorrect Username or Password!</h5></strong></div>";
    }
}

function test_input($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<body>
<!-- Preloader -->
<div class="preloader">
    <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="new-login-register">
    <div class="lg-info-panel">
        <div class="inner-panel">
            <a href="javascript:void(0)" class="p-20 di"><img src="plugins/images/admin-logo.png"></a>
            <div class="lg-content">
                <h2>Welcome to Efamu Application</h2>
                <p class="text-muted">The Best online application to manage Cattle Farms In Uganda </p>
                <a href="#" class="btn btn-rounded btn-danger p-l-20 p-r-20"> Buy now</a>
            </div>
        </div>
    </div>
    <div class="new-login-box">
        <div class="white-box">
            <h3 class="box-title m-b-0">Sign In</h3>
            <small>Enter your details below</small>
            <form class="form-horizontal new-lg-form" id="loginform" method="post"  action="index" enctype="multipart/form-data">

                <div class="form-group  m-t-20">
                    <div class="col-xs-12">
                        <label>Username</label>
                        <input class="form-control" autocomplete="off" name="username" type="text" required placeholder="Username">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <label>Password</label>
                        <input class="form-control" autocomplete="off" type="password" name="password" required placeholder="Password">
                    </div>
                </div>
                <?php echo "$message"; ?>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="checkbox checkbox-info pull-left p-t-0">
                            <input id="checkbox-signup" type="checkbox">
                            <label for="checkbox-signup"> Remember me </label>
                        </div>
                        <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" name="login" type="submit">Log In</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                        <div class="social"><a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip"  title="Login with Facebook"> <i aria-hidden="true" class="fab fa-facebook-f"></i> </a> <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip"  title="Login with Google"> <i aria-hidden="true" class="fab fa-google-plus-g"></i> </a> </div>
                    </div>
                </div>
                <div class="form-group m-b-0">
                    <div class="col-sm-12 text-center">
                        <p>Don't have an account? <a href="register" class="text-primary m-l-5"><b>Sign Up</b></a></p>
                    </div>
                </div>
            </form>
            <form class="form-horizontal" id="recoverform" method="POST" action="forgotpass">
                <div class="form-group ">
                    <div class="col-xs-12">
                        <h3>Recover Password</h3>
                        <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="text"  required="" name="email" placeholder="Email">
                    </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


</section>
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
</html>
