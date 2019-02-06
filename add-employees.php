<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head.php';
    $active='employees';
    ?>
</head>
<?php
include 'db.php';
$message="";
$farm = $_SESSION['farm'];
if(isset($_POST['submit'])){
    //$empno = "EMP".rand(100,999);
    $fname = mysqli_real_escape_string($con,    ucwords($_POST['fname']));
    $lname = mysqli_real_escape_string($con,    ucwords($_POST['lname']));
    $gender = mysqli_real_escape_string($con,    ucwords($_POST['gender']));
    $dob = mysqli_real_escape_string($con,    ucwords($_POST['dob']));
    $salary = mysqli_real_escape_string($con,    ucwords($_POST['salary']));
    $designation = mysqli_real_escape_string($con,    ucwords($_POST['designation']));
    $email = mysqli_real_escape_string($con,    ucwords($_POST['email']));
    $contact = mysqli_real_escape_string($con,  $_POST['contact']);
    $nok = mysqli_real_escape_string($con,  $_POST['nok']);
    $nok_contact = mysqli_real_escape_string($con,  $_POST['nok_contact']);

    $full_names= $fname.' '.$lname;
    //capturing the registrar of the data
    $entered_by =   $_SESSION['full_names'];
    $time =         date("Y-m-d H:i:s");
    $action =       "Registered employee ".' '.$full_names;

    //checking if the member already exists
    $check_no = mysqli_query($con,"select * from employees where  empno = '$empno' and farm_id ='$farm' ");
    if(mysqli_num_rows($check_no)>0){
        $empno++;
    }else{
        //checking if the member already exists
        $check_account = mysqli_query($con,"select * from employees where  tel = '$contact' and farm_id ='$farm'");
        if(mysqli_num_rows($check_account) > 0){
            $message = "<div class=\"alert alert-danger\"><strong>Failed! The Employee already exists</strong></div>";
            echo "<script>alert('Failed! The Employee already exists');</script>";
        } else{
            $sql_emp = "insert into employees(farm_id,empname,gender,dob,salary,designation,email,tel,nextofkin_name,nextofkin_tel)VALUES ('$farm','$full_names','$gender','$dob','$salary','$designation','$email','$contact','$nok','$nok_contact')";
            $sql_log  = "insert into transaction_logs(farm_id,transaction_action,transaction_time,transaction_by) VALUES ('$farm','$action','$time','$entered_by')";

            //Executing the queries;
            $insert_emp = mysqli_query($con,$sql_emp);
            $insert_transaction = mysqli_query($con,$sql_log);
            if($insert_emp && $insert_transaction){
                //$message = "<div class=\"alert alert-success\"><strong>Registration is Successful</strong></div>";
                echo "<script>alert('Recorded Successfully');</script>";
            }
        }
    }
}
?>
<body class="fix-header">
<!-- ============================================================== -->
<!-- Preloader -->
<!-- ============================================================== -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
    </svg>
</div>
<!-- ============================================================== -->
<!-- Wrapper -->
<!-- ============================================================== -->
<div id="wrapper" >
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <nav class="navbar navbar-default navbar-static-top m-b-0">
        <?php include 'nav.php';?>
    </nav>
    <!-- End Top Navigation -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <div class="navbar-default sidebar" role="navigation">
        <?php include 'sidebar.php';?>
    </div>
    <!-- ============================================================== -->
    <!-- End Left Sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page Content -->
    <!-- ============================================================== -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">
                        Employee Registration Form
                    </h4> </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                    <a href="javascript: void(0);" "></a>
                    <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Employees</a></li>
                        <li><a href="#">Registration</a></li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!--.row-->
            <div class="row">

                <div class="col-md-9 col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">Employee Registration Form</h3>
                        <form action="add-employees" method="post" enctype="multipart/form-data">
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
                                        <label for="exampleInputuname">Gender</label>
                                        <div class="input-group">
                                            <select class="form-control select2" name="gender" required>
                                                <option value="">Select</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                            <?php
                                            ?>
                                            <div class="input-group-addon"><i class="ti-pencil"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputpwd2">Date of Birth</label>
                                        <div class="input-group">
                                            <input type="date" class="form-control" name="dob" id="datepicker" />
                                            <span class="input-group-addon"><i class="icon-calender"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Salary</label>
                                        <div class="input-group">
                                            <input class="form-control" name="salary" onkeypress="return isNumberKey(event)" required autocomplete="off" placeholder="Salary" type="number">
                                            <div class="input-group-addon"><i class="fa fa-money-bill-alt"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Designation</label>
                                        <div class="input-group">
                                            <input class="form-control" name="designation" required autocomplete="off" placeholder="Designation" type="text">
                                            <div class="input-group-addon"><i class="ti-pencil-alt"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email Address</label>
                                        <div class="input-group">
                                            <input class="form-control" name="email" required autocomplete="off" placeholder="Email Address" type="email">
                                            <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Contact</label>
                                        <div class="input-group">
                                            <input class="form-control" name="contact" onkeypress="return isNumberKey(event)" maxlength="10" required autocomplete="off" placeholder="Contact" type="text">
                                            <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Next of Kin</label>
                                        <div class="input-group">
                                            <input class="form-control" name="nok" required autocomplete="off" placeholder="Next of Kin" type="text">
                                            <div class="input-group-addon"><i class="ti-pencil-alt"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Contact</label>
                                        <div class="input-group">
                                            <input class="form-control" name="nok_contact" onkeypress="return isNumberKey(event)" maxlength="10" required autocomplete="off" placeholder="Next of Kin Contact" type="text">
                                            <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" name="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    <h4><b>Employee Registration Tips</b></h4>


                </div>
            </div>
            <!-- ============================================================== -->
        </div>
        <!-- /.container-fluid -->

        <?php include 'footer.php';?>
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
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

<script src="js/jasny-bootstrap.js"></script>
<script src="plugins/bower_components/switchery/dist/switchery.min.js"></script>
<script src="plugins/bower_components/custom-select/dist/js/select2.full.min.js" type="text/javascript"></script>
<script>
    $(function() {
        // Switchery
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());
        });
        // For select 2
        $(".select2").select2();
        $('.selectpicker').selectpicker();
        //Bootstrap-TouchSpin
        $(".vertical-spin").TouchSpin({
            verticalbuttons: true
        });
        var vspinTrue = $(".vertical-spin").TouchSpin({
            verticalbuttons: true
        });
        if (vspinTrue) {
            $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
        }
        $("input[name='tch1']").TouchSpin({
            min: 0,
            max: 100,
            step: 0.1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
            postfix: '%'
        });
        $("input[name='tch2']").TouchSpin({
            min: -1000000000,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: '$'
        });
        $("input[name='tch3']").TouchSpin();
        $("input[name='tch3_22']").TouchSpin({
            initval: 40
        });
        $("input[name='tch5']").TouchSpin({
            prefix: "pre",
            postfix: "post"
        });
        // For multiselect
        $('#pre-selected-options').multiSelect();
        $('#optgroup').multiSelect({
            selectableOptgroup: true
        });
        $('#public-methods').multiSelect();
        $('#select-all').click(function() {
            $('#public-methods').multiSelect('select_all');
            return false;
        });
        $('#deselect-all').click(function() {
            $('#public-methods').multiSelect('deselect_all');
            return false;
        });
        $('#refresh').on('click', function() {
            $('#public-methods').multiSelect('refresh');
            return false;
        });
        $('#add-option').on('click', function() {
            $('#public-methods').multiSelect('addOption', {
                value: 42,
                text: 'test 42',
                index: 0
            });
            return false;
        });
    });
</script>
<!--Style Switcher -->
<script src="plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
