<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head.php';?>
</head>
<?php
include 'db.php';
$message="";
if(isset($_POST['submit'])){
    $owner = mysqli_real_escape_string($con,          ucwords($_POST['owner']));
    $farmname = mysqli_real_escape_string($con,          ucwords($_POST['farmname']));
    $address = mysqli_real_escape_string($con,          ucwords($_POST['address']));
    $contact = mysqli_real_escape_string($con,          ucwords($_POST['contact']));

    //capturing the registrar of the data
    $entered_by =   $_SESSION['full_names'];
    $time =         date("Y-m-d H:i:s");
    $action =       "Registered a farm $farmname";

    //checking records
    $check_records= mysqli_query($con,"select * from farms where farmname ='$farmname' and owner ='$owner' and contact='$contact'");
    if(mysqli_num_rows($check_records)>0){
        echo "<script>alert('The Farm  ($farmname) already exists');</script>";
    }else{
        $sql_spray = mysqli_query($con,"insert into farms(farmname,owner,address,contact,status,regby,regtime)VALUES ('$farmname','$owner','$address','$contact','Active','$entered_by','$time')");

        $sql_log  = mysqli_query($con,"insert into transaction_logs(transaction_action,transaction_time,transaction_by) VALUES ('$action','$time','$entered_by')");

        if($sql_spray && $sql_log){
            // $message = "<div class=\"alert alert-success\"><strong>Registration is Successful</strong></div>";
            echo "<script>alert('Recorded is Successfully');</script>";
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
                    <h4 class="page-title">incomes categories</h4> </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                    <a href="javascript: void(0);" "></a>
                    <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">System Settings</a></li>
                        <li><a href="#">incomes categories</a></li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!--.row-->
            <div class="row">

                <div class="col-md-9 col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">Manage incomes categories</h3>
                       <form action="add-farm" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                            <div class="basic-login-inner">

                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                            <div class="basic-login-inner">
                                                <div class="form-group-inner">
                                                    <label>Farm Name</label>
                                                    <input type="text" name="farmname" required autocomplete="off" class="form-control" placeholder="Farm Name" />
                                                </div>
                                                <div class="form-group-inner">
                                                    <label>Owner</label>
                                                    <input type="text" name="owner" required autocomplete="off" class="form-control" placeholder="Farm Owner" />
                                                </div>
                                                <div class="form-group-inner">
                                                    <label>Address</label>
                                                    <input type="text" name="address" required autocomplete="off" class="form-control" placeholder="Address" />
                                                </div>
                                                <div class="form-group-inner">
                                                    <label>Contact </label>
                                                    <input class="form-control"  required onkeypress="return isNumberKey(event)"  title= "Numbers only" name="contact"  autocomplete="off" placeholder="Contact " type="text" >
                                                </div>
                                                <div class="login-btn-inner">
                                                    <div class="inline-remember-me" style="text-align: center">
                                                        <button class="btn btn-lg btn-primary login-submit-cs" name="submit" type="submit">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                            <div class="basic-login-inner">

                                            </div>
                                        </div>

                                    </div>
                                </form>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    <h4><b>Tips</b></h4>


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
