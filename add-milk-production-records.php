<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head.php';
    $active='milk_production';
	//error_reporting(1);
    ?>
</head>
<?php
include 'db.php';
$message="";
$farm = $_SESSION['farm'];
if(isset($_POST['submit'])){
    $mdate = mysqli_real_escape_string($con,  ucwords($_POST['mdate']));
    $animal_id= mysqli_real_escape_string($con,   ucwords($_POST['animal_id']));
    //$aname = mysqli_real_escape_string($con,   ucwords($_POST['aname']));
    $qty = mysqli_real_escape_string($con,   ucwords($_POST['qty']));
    $mtime = mysqli_real_escape_string($con,   ucwords($_POST['time']));
    $recdate = date("Y-m-d");
    $recby = $_SESSION['full_names'];
    $selects = mysqli_query($con,"select * from animal_registration where animal_id='$animal_id' 
	and farm_id ='$farm'");
    $names=mysqli_fetch_array($selects);
    $aname=$names['animal_name'];

    //capturing the registrar of the data
    $entered_by =   $_SESSION['full_names'];
    $time =         date("Y-m-d H:i:s");
    $action =       "Recorded Milking yield";
    //Check if the records exists
    $check_record = mysqli_query($con,"select * from milkyield where mdate = '$mdate' and animal_id='$animal_id' and milkingtime='$mtime' and farm_id ='$farm'");
    if(mysqli_num_rows($check_record)>0){
        echo "<script>alert('Record already Exists');</script>";
    }
    else{
        //checking if the member was already paid
        $insert_record = mysqli_query($con,"insert into milkyield(farm_id,mdate,animal_id,quantity,milkingtime)VALUES ('$farm','$mdate','$animal_id','$qty','$mtime')");
        $insert_log = mysqli_query($con,"insert into transaction_logs(farm_id,transaction_action,transaction_time,transaction_by) VALUES ('$farm','$action','$time','$entered_by')");

        if($insert_record && $insert_log){
            //$message = "<div class=\"alert alert-success\"><strong>Recorded Successfully</strong></div>";
            echo "<script>alert('Recorded Successfully');</script>";
        }else{
            echo mysqli_error($con);
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
                        Milk Production Form
                    </h4> </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                    <a href="javascript: void(0);" "></a>
                    <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Milk Production</a></li>
                        <li><a href="#">Add Records</a></li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!--.row-->
            <div class="row">

                <div class="col-md-9 col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">  Milk Production Form</h3>
                        <form action="add-milk-production-records" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputpwd2">Milking Date</label>
                                        <div class="input-group">
                                            <input type="date" class="form-control" name="mdate" id="datepicker" />
                                            <span class="input-group-addon"><i class="icon-calender"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputuname">Animal</label>
                                        <div class="input-group">
                                            <select class="form-control select2" name="animal_id" required>
                                                <option value="">Select</option>
                                                <?php
                                                $select = mysqli_query($con,"select c.*,a.* from calving c,
												animal_registration a where c.animal_id=a.animal_id 
												AND c.farm_id=a.farm_id
												AND a.status='Present' and c.farm_id ='$farm'");
                                                while ($details = mysqli_fetch_array($select)){
                                                    $to_date = time(); // Input your date here e.g. strtotime("2014-01-02")
                                                    $from_date = strtotime($details['cdate']);
                                                    $day_diff = $to_date - $from_date;
                                                    $days =  floor($day_diff/(60*60*24))."\n";
													//checking the difference between when animal gave birth and date today//
                                                    if($days<=360){
                                                        ?>
                                                        <option value="<?php echo $details['animal_id']; ?>"><?php echo $details['animal_name'].'('. $details['tagNo'];?></option>
                                                        <?php
                                                    }

                                                }
												if($select){}else {echo "<h2>FAILED </h2>".mysqli_error($con); }
                                                ?>
                                            </select>
                                            <?php
                                            ?>
                                            <div class="input-group-addon"><i class="ti-pencil"></i></div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-6 col-xs-12">

                                    <div class="form-group">
                                        <label for="exampleInputuname">Milking Time</label>
                                        <div class="input-group">
                                            <select class="form-control select2" name="time" required>
                                                <option value="">Select</option>
                                                <option value="Morning">Morning</option>
                                                <option value="Afternoon">Afternoon</option>
                                                <option value="Evening">Evening</option>
                                            </select>
                                            <?php
                                            ?>
                                            <div class="input-group-addon"><i class="ti-pencil"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Quantity of Milk</label>
                                        <div class="input-group">
                                            <input class="form-control" name="qty" onkeypress="return isNumberKey(event)" required autocomplete="off" placeholder="Quantity of Milk Produced" type="number">
                                            <div class="input-group-addon"><i class="ti-pencil-alt"></i></div>
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
                    <h4><b>Milk Production Tips</b></h4>
                    <marquee  behavior="scroll" direction="up" id="mymarquee" scrollamount="2" onmouseover="this.stop();" onmouseout="this.start();">
                        <p style="text-align: justify">
                            <?php
                            $select = mysqli_query($con,"select * from farmertips where section='Milk' ORDER BY id desc LIMIT 1 ");
                            while ($tipscheck = mysqli_fetch_array($select)){

                                echo $tipscheck['tips'];

                            }
                            ?>
                        </p>
                    </marquee>

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
