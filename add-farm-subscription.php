<!doctype html>
<html class="no-js" lang="">

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
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="left-sidebar-pro">
    <?php include 'side-menu.php';?>
</div>
<!-- Start Welcome area -->
<div class="all-content-wrapper">
    <?php $page_title = "Farm Registration";?>
    <?php include 'top-header.php';?>
    <!-- Advanced Form Start -->
    <div class="advanced-form-area mg-tb-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="sparkline8-list mt-b-30">

                        <div class="sparkline8-graph">
                            <div class="basic-login-form-ad">
                                <form action="" method="post" enctype="multipart/form-data">
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
                    </div>

                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="sparkline11-list mg-tb-30">
                        <div class="sparkline11-hd">
                            <div class="main-sparkline11-hd">
                                <h1>Select 2</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Advanced Form End-->
    <div class="footer-copyright-area">
        <?php include 'footer.php';?>
    </div>
</div>

<!-- jquery
    ============================================ -->
<script src="js/vendor/jquery-1.11.3.min.js"></script>
<!-- bootstrap JS
    ============================================ -->
<script src="js/bootstrap.min.js"></script>
<!-- wow JS
    ============================================ -->
<script src="js/wow.min.js"></script>
<!-- price-slider JS
    ============================================ -->
<script src="js/jquery-price-slider.js"></script>
<!-- meanmenu JS
    ============================================ -->
<script src="js/jquery.meanmenu.js"></script>
<!-- owl.carousel JS
    ============================================ -->
<script src="js/owl.carousel.min.js"></script>
<!-- sticky JS
    ============================================ -->
<script src="js/jquery.sticky.js"></script>
<!-- scrollUp JS
    ============================================ -->
<script src="js/jquery.scrollUp.min.js"></script>
<!-- mCustomScrollbar JS
    ============================================ -->
<script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/scrollbar/mCustomScrollbar-active.js"></script>
<!-- metisMenu JS
    ============================================ -->
<script src="js/metisMenu/metisMenu.min.js"></script>
<script src="js/metisMenu/metisMenu-active.js"></script>
<!-- touchspin JS
    ============================================ -->
<script src="js/touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="js/touchspin/touchspin-active.js"></script>
<!-- colorpicker JS
    ============================================ -->
<script src="js/colorpicker/jquery.spectrum.min.js"></script>
<script src="js/colorpicker/color-picker-active.js"></script>
<!-- datapicker JS
    ============================================ -->
<script src="js/datapicker/bootstrap-datepicker.js"></script>
<script src="js/datapicker/datepicker-active.js"></script>
<!-- input-mask JS
    ============================================ -->
<script src="js/input-mask/jasny-bootstrap.min.js"></script>
<!-- chosen JS
    ============================================ -->
<script src="js/chosen/chosen.jquery.js"></script>
<script src="js/chosen/chosen-active.js"></script>
<!-- select2 JS
    ============================================ -->
<script src="js/select2/select2.full.min.js"></script>
<script src="js/select2/select2-active.js"></script>
<!-- ionRangeSlider JS
    ============================================ -->
<script src="js/ionRangeSlider/ion.rangeSlider.min.js"></script>
<script src="js/ionRangeSlider/ion.rangeSlider.active.js"></script>
<!-- rangle-slider JS
    ============================================ -->
<script src="js/rangle-slider/jquery-ui-1.10.4.custom.min.js"></script>
<script src="js/rangle-slider/jquery-ui-touch-punch.min.js"></script>
<script src="js/rangle-slider/rangle-active.js"></script>
<!-- knob JS
    ============================================ -->
<script src="js/knob/jquery.knob.js"></script>
<script src="js/knob/knob-active.js"></script>
<!-- tab JS
    ============================================ -->
<script src="js/tab.js"></script>
<!-- plugins JS
    ============================================ -->
<script src="js/plugins.js"></script>
<!-- main JS
    ============================================ -->
<script src="js/main.js"></script>

<!-- notification JS
       ============================================ -->
<script src="js/notifications/Lobibox.js"></script>
<script src="js/notifications/notification-active.js"></script>
</body>

</html>