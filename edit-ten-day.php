<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head.php';
    $active='animal';
	$animal_id= $_GET['animalid'];
$farm_id  = $_GET['farm_id'];
$ten_id=$_GET['id'];
?>
</head>
<?php
include 'db.php';
$farm = $_SESSION['farm'];

if(isset($_POST['save'])){
    $animal_id = mysqli_real_escape_string($con,        ucwords($_POST['animal_id']));
    $input_days =   mysqli_real_escape_string($con,        ucwords($_POST['days']));
    $ga =               mysqli_real_escape_string($con,        ucwords($_POST['ga']));
    $appetite =         mysqli_real_escape_string($con,        ucwords($_POST['appetite']));
    $eyes_bright =      mysqli_real_escape_string($con,        ucwords($_POST['eyes_bright']));
    $ear_warm =         mysqli_real_escape_string($con,        ucwords($_POST['ear_warm']));
    $urine_discharge =  mysqli_real_escape_string($con,        ucwords($_POST['urine_discharge']));
    $placenta =         mysqli_real_escape_string($con,        ucwords($_POST['placenta']));
    $milk_volume =      mysqli_real_escape_string($con,        ucwords($_POST['milk_volume']));
    $udder =            mysqli_real_escape_string($con,        ucwords($_POST['udder']));
    $lameness =         mysqli_real_escape_string($con,        ucwords($_POST['lameness']));
    $manure =           mysqli_real_escape_string($con,        ucwords($_POST['manure']));
    $ketotic =          mysqli_real_escape_string($con,        ucwords($_POST['ketotic']));
    $temperature =      mysqli_real_escape_string($con,        ucwords($_POST['temperature']));

    //capturing the registrar of the data
    $entered_by =   $_SESSION['full_names'];
    $recdate =         date("Y-m-d");
    $time =         date("Y-m-d H:i:s");
    $action =       "Edted Calving 10 Day Sheet info for ".' '.$animal_id;


        $insert = mysqli_query($con,"UPDATE ten_day_sheet set days='$input_days', gappearance='$ga', appetite='$appetite', eyes_ears='$eyes_bright', warm_ears='$ear_warm', uterine_discharge='$urine_discharge', 
		retained_placenta='$placenta', milk_volume='$milk_volume', udder_edema='$udder', lameness='$lameness', manure='$manure', ketotic='$ketotic', temperature='$temperature' WHERE id='$animal_id'");
        $sql_transaction  = mysqli_query($con,"insert into transaction_logs(farm_id,transaction_action,transaction_time,transaction_by) VALUES ('$farm','$action','$time','$entered_by')");
        if($insert && $sql_transaction ){
            $message = "<div class=\"alert alert-success\"><strong>Registration is Successful</strong></div>";
            echo "<script>alert('Registration is Successful');</script>";
			 echo "<script>window.location='view-ten-day-records';</script>";
        }else{
            echo mysqli_error($con);
        }
    }
    //}
    // else{
    //write here the code if false
    //  echo "<script>alert('You Cant enter records for future Dates');</script>";
    //}
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
                        10 Day Form
                    </h4> </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                    <a href="javascript: void(0);" "></a>
                    <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Animal</a></li>
                        <li><a href="#">10 Day</a></li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!--.row-->
            <div class="row">

                <div class="col-md-12 col-sm-12">
                    <div class="white-box">

                            <div class="row">
                               
                                <div class="col-sm-9 col-xs-12">
                                    <?php
                                   
                                    $select_tag = mysqli_query($con,"select * from calving where  farm_id ='$farm'");
                                    $tag = mysqli_fetch_array($select_tag);
                                    $to_date = time(); // Input your date here e.g. strtotime("2014-01-02")
                                    $from_date = strtotime($tag['cdate']);
                                    $day_diff = $to_date - $from_date;
                                    $days =  floor($day_diff/(60*60*24))."\n";


                                    $select = mysqli_query($con,"select * from animal_registration where animal_id = '$animal_id' and farm_id ='$farm'");
                                    $animal_records = mysqli_fetch_array($select);
                                    $tagno=$animal_records['tagNo'];
                                    $animal_name=$animal_records['animal_name'];

                                    ?>
                                    <form action="" method="post" enctype="multipart/form-data">
                                       <div class="row">
                                           <div class="col-md-6">
                                               <div class="form-group">
                                                   <label for="exampleInputpwd2">Animal </label>
                                                   <div class="input-group">
                                                       <input type="text"  name="tagno" value="<?php echo "$animal_name ($tagno)"; ?>" readonly required autocomplete="off" class="form-control" id="exampleInputpwd2" placeholder="Breed of Dam ">
                                                       <input type="hidden" name="animal_id" value="<?php echo $animal_id;?>" />
                                                       <div class="input-group-addon"><i class="ti-lock"></i></div>
                                                   </div>
                                               </div>
                                               <div class="form-group">
                                                   <label for="exampleInputpwd2">Nth Day </label>
                                                   <div class="input-group">
                                                       <?php
                                                       include 'db.php';
                                                       //selecing to see the biggest day in the ten day table
                                                       $check_days = mysqli_fetch_array(mysqli_query($con,"select * from ten_day_sheet WHERE id='$ten_id'"));
                                                       $day= $check_days['days'];
                                                       ?>
                                                       <input type="text"   name="days"  value="<?=$day;?>" readonly required autocomplete="off" class="form-control" id="exampleInputpwd2" placeholder="Breed of Dam ">
                                                       <div class="input-group-addon"><i class="ti-lock"></i></div>
                                                   </div>
                                               </div>
                                               <div class="form-group">
                                                   <label class="control-label">General Appearance</label>
                                                   <div class="input-group">
                                                       <div class="radio-list">
                                                           <label class="radio-inline p-0">
                                                               <div class="radio radio-info">
                                                                   <input type="radio" name="ga" required value="Ok">
                                                                   <label for="radio1">Ok</label>
                                                               </div>
                                                           </label>
                                                           <label class="radio-inline">
                                                               <div class="radio radio-info">
                                                                   <input type="radio" name="ga" required  value="Not Ok">
                                                                   <label for="radio2">Not Ok </label>
                                                               </div>
                                                           </label>
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="form-group">
                                                   <label class="control-label">APPETITE/DMI</label>
                                                   <div class="input-group">
                                                       <div class="radio-list">
                                                           <label class="radio-inline p-0">
                                                               <div class="radio radio-info">
                                                                   <input type="radio" name="appetite" required value="Ok">
                                                                   <label for="radio1">Ok</label>
                                                               </div>
                                                           </label>
                                                           <label class="radio-inline">
                                                               <div class="radio radio-info">
                                                                   <input type="radio" name="appetite" required  value="Not Ok">
                                                                   <label for="radio2">Not Ok </label>
                                                               </div>
                                                           </label>
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="form-group">
                                                   <label class="control-label">EYES BRIGHT/EARS UP</label>
                                                   <div class="input-group">
                                                       <div class="radio-list">
                                                           <label class="radio-inline p-0">
                                                               <div class="radio radio-info">
                                                                   <input type="radio" name="eyes_bright" required value="Ok">
                                                                   <label for="radio1">Ok</label>
                                                               </div>
                                                           </label>
                                                           <label class="radio-inline">
                                                               <div class="radio radio-info">
                                                                   <input type="radio" name="eyes_bright" required  value="Not Ok">
                                                                   <label for="radio2">Not Ok </label>
                                                               </div>
                                                           </label>
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="form-group">
                                                   <label class="control-label">EARS WARM</label>
                                                   <div class="input-group">
                                                       <div class="radio-list">
                                                           <label class="radio-inline p-0">
                                                               <div class="radio radio-info">
                                                                   <input type="radio" name="ear_warm" required value="Ok">
                                                                   <label for="radio1">Ok</label>
                                                               </div>
                                                           </label>
                                                           <label class="radio-inline">
                                                               <div class="radio radio-info">
                                                                   <input type="radio" name="ear_warm" required  value="Not Ok">
                                                                   <label for="radio2">Not Ok </label>
                                                               </div>
                                                           </label>
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="form-group">
                                                   <label class="control-label">UTERINE DISCHARGE</label>
                                                   <div class="input-group">
                                                       <div class="radio-list">
                                                           <label class="radio-inline p-0">
                                                               <div class="radio radio-info">
                                                                   <input type="radio" name="urine_discharge" required value="Ok">
                                                                   <label for="radio1">Ok</label>
                                                               </div>
                                                           </label>
                                                           <label class="radio-inline">
                                                               <div class="radio radio-info">
                                                                   <input type="radio" name="urine_discharge" required  value="Not Ok">
                                                                   <label for="radio2">Not Ok </label>
                                                               </div>
                                                           </label>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="col-md-6">
										   <br><br>
                                               <div class="form-group">
                                                   <label class="control-label">RETAINED PLACENTA AFTER BIRTH</label>
                                                   <div class="input-group">
                                                       <div class="radio-list">
                                                           <label class="radio-inline p-0">
                                                               <div class="radio radio-info">
                                                                   <input type="radio" name="placenta" required value="Ok">
                                                                   <label for="radio1">Ok</label>
                                                               </div>
                                                           </label>
                                                           <label class="radio-inline">
                                                               <div class="radio radio-info">
                                                                   <input type="radio" name="placenta" required  value="Not Ok">
                                                                   <label for="radio2">Not Ok </label>
                                                               </div>
                                                           </label>
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="form-group">
                                                   <label class="control-label">Milk Volume </label>
                                                   <div class="input-group">
                                                       <div class="radio-list">
                                                           <label class="radio-inline p-0">
                                                               <div class="radio radio-info">
                                                                   <input type="radio" name="milk_volume" required value="Ok">
                                                                   <label for="radio1">Ok</label>
                                                               </div>
                                                           </label>
                                                           <label class="radio-inline">
                                                               <div class="radio radio-info">
                                                                   <input type="radio" name="milk_volume" required  value="Not Ok">
                                                                   <label for="radio2">Not Ok </label>
                                                               </div>
                                                           </label>
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="form-group">
                                                   <label class="control-label">UDDER EDEMA </label>
                                                   <div class="input-group">
                                                       <div class="radio-list">
                                                           <label class="radio-inline p-0">
                                                               <div class="radio radio-info">
                                                                   <input type="radio" name="udder" required value="Ok">
                                                                   <label for="radio1">Ok</label>
                                                               </div>
                                                           </label>
                                                           <label class="radio-inline">
                                                               <div class="radio radio-info">
                                                                   <input type="radio" name="udder" required  value="Not Ok">
                                                                   <label for="radio2">Not Ok </label>
                                                               </div>
                                                           </label>
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="form-group">
                                                   <label class="control-label">LAMENESS </label>
                                                   <div class="input-group">
                                                       <div class="radio-list">
                                                           <label class="radio-inline p-0">
                                                               <div class="radio radio-info">
                                                                   <input type="radio" name="lameness" required value="Ok">
                                                                   <label for="radio1">Ok</label>
                                                               </div>
                                                           </label>
                                                           <label class="radio-inline">
                                                               <div class="radio radio-info">
                                                                   <input type="radio" name="lameness" required  value="Not Ok">
                                                                   <label for="radio2">Not Ok </label>
                                                               </div>
                                                           </label>
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="form-group">
                                                   <label class="control-label">MANURE </label>
                                                   <div class="input-group">
                                                       <div class="radio-list">
                                                           <label class="radio-inline p-0">
                                                               <div class="radio radio-info">
                                                                   <input type="radio" name="manure" required value="Ok">
                                                                   <label for="radio1">Ok</label>
                                                               </div>
                                                           </label>
                                                           <label class="radio-inline">
                                                               <div class="radio radio-info">
                                                                   <input type="radio" name="manure" required  value="Not Ok">
                                                                   <label for="radio2">Not Ok </label>
                                                               </div>
                                                           </label>
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="form-group">
                                                   <label class="control-label">KETOTIC </label>
                                                   <div class="input-group">
                                                       <div class="radio-list">
                                                           <label class="radio-inline p-0">
                                                               <div class="radio radio-info">
                                                                   <input type="radio" name="ketotic" required value="Ok">
                                                                   <label for="radio1">Ok</label>
                                                               </div>
                                                           </label>
                                                           <label class="radio-inline">
                                                               <div class="radio radio-info">
                                                                   <input type="radio" name="ketotic" required  value="Not Ok">
                                                                   <label for="radio2">Not Ok </label>
                                                               </div>
                                                           </label>
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="form-group">
                                                   <label class="control-label">TEMPERATURE </label>
                                                   <div class="input-group">
                                                       <div class="radio-list">
                                                           <label class="radio-inline p-0">
                                                               <div class="radio radio-info">
                                                                   <input type="radio" name="temperature" required value="Ok">
                                                                   <label for="radio1">Ok</label>
                                                               </div>
                                                           </label>
                                                           <label class="radio-inline">
                                                               <div class="radio radio-info">
                                                                   <input type="radio" name="temperature" required  value="Not Ok">
                                                                   <label for="radio2">Not Ok </label>
                                                               </div>
                                                           </label>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="text-right">
                                               <button type="submit" name="save" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                           </div>
                                       </div>
                                    </form>

                                  
                                   
                                </div>
                            </div>
                    </div>
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
