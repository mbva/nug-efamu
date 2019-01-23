<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head.php';
    $active='health';
    ?>
</head>
<?php
include 'db.php';
$message="";
$farm = $_SESSION['farm'];
if(isset($_POST['submit'])){
    $animal_id = mysqli_real_escape_string($con,        ucwords($_POST['animal_id']));
    $aname = mysqli_real_escape_string($con,        ucwords($_POST['aname']));
    $date = mysqli_real_escape_string($con,          ucwords($_POST['date']));
    $body_weight = mysqli_real_escape_string($con,       ucwords($_POST['bw']));
    $body_temperature = mysqli_real_escape_string($con,       ucwords($_POST['bt']));
    $signs = mysqli_real_escape_string($con,       ucwords($_POST['signs']));
    $disease = mysqli_real_escape_string($con,       ucwords($_POST['disease']));
    $recom_treatment = mysqli_real_escape_string($con,       ucwords($_POST['rt']));
    $act_treatment = mysqli_real_escape_string($con,       ucwords($_POST['at']));
    $dosage = mysqli_real_escape_string($con,       ucwords($_POST['dosage']));
    $treatment_length = mysqli_real_escape_string($con,       ucwords($_POST['lot']));
    $name_of_vet = mysqli_real_escape_string($con,       ucwords($_POST['nov']));
    $age = 0;

    //capturing the registrar of the data
    $entered_by =   $_SESSION['full_names'];
    $time =         date("Y-m-d H:i:s");
    $action =       "Entered Disease Incidence records of ".' '.$aname;

    //chcking for a record
    $check_record = mysqli_query($con,"select * from disease_incidences where animal_id='$animal_id' and tdate='$date' and farm_id ='$farm'");
    if(mysqli_num_rows($check_record)>0){
        echo "<script>alert('The Record was already taken');</script>";
    }else{
        $sql_deworm = "insert into disease_incidences(farm_id,animal_id,body_weight,body_temperature,tdate,signs,disease,rec_treatment,act_treatment,dosage,treatment_length,vet_name)
                        VALUES ('$farm','$animal_id','$body_weight','$body_temperature','$date','$signs','$disease','$recom_treatment','$act_treatment','$dosage','$treatment_length','$name_of_vet')";

        $sql_log  = "insert into transaction_logs(farm_id,transaction_action,transaction_time,transaction_by) VALUES ('$farm','$action','$time','$entered_by')";

        //Executing the queries;
        $insert_deworm = mysqli_query($con,$sql_deworm);
        if(!$insert_deworm){
            die('IM NOT ENTERED'.mysqli_error($con));
        }
        $insert_transaction = mysqli_query($con,$sql_log);
        if($insert_deworm && $insert_transaction ){
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
<div id="wrapper">
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
                    <h4 class="page-title">Disease Incidences Form</h4> </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                    <a href="javascript: void(0);" target="_blank" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Buy Admin Now</a>
                    <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Health</a></li>
                        <li><a href="#">Disease Incidences</a></li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!--.row-->
            <div class="row">

                <div class="col-md-9 col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">Disease Incidences Form</h3>
                        <form action="add-disease-incidences" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputpwd2">Incidence Date </label>
                                        <div class="input-group">
                                            <input type="date" class="form-control" name="date" id="datepicker" />
                                            <span class="input-group-addon"><i class="icon-calender"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputuname">Animal </label>
                                        <div class="input-group">
                                            <select class="form-control select2" name="animal_id" required>
                                                <option>Select</option>
                                                <?php
                                                $select_tag = mysqli_query($con,"select * from animal_registration where status ='Present' and farm_id ='$farm'");
                                                while ($tag = mysqli_fetch_array($select_tag)){
                                                    ?>
                                                    <option value="<?php echo $tag['animal_id']; ?>"><?php echo $tag['animal_name'].'('.$tag['tagNo'].')'; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                            <?php
                                            ?>
                                            <div class="input-group-addon"><i class="ti-pencil"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Body Weight</label>
                                        <div class="input-group">
                                            <input class="form-control" name="bw" required autocomplete="off" placeholder="Body Weight" type="number"  title="Value must be 50 and ABove">
                                            <div class="input-group-addon"><i class="ti-pencil-alt"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Body Temperature</label>
                                        <div class="input-group">
                                            <input class="form-control" name="bt" required autocomplete="off" placeholder="Body Temperature" type="number"  title="Value must be 50 and ABove">
                                            <div class="input-group-addon"><i class="ti-pencil-alt"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputphone">Signs and Observations </label>
                                        <div class="input-group">
                                            <textarea  name="signs" class="form-control" id="" rows="1" cols="100"  placeholder="Signs and Observations"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Disease</label>
                                        <div class="input-group">
                                            <input class="form-control" name="disease" required autocomplete="off" placeholder="Disease" type="text">
                                            <div class="input-group-addon"><i class="ti-pencil-alt"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Recommended Treatment </label>
                                        <div class="input-group">
                                            <input class="form-control" name="rt" required autocomplete="off" placeholder="Recommended Treatment" type="text">
                                            <div class="input-group-addon"><i class="ti-pencil-alt"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Actual Treatment</label>
                                        <div class="input-group">
                                            <input class="form-control" name="dosage" required autocomplete="off" placeholder="Actual Treatment" type="text">
                                            <div class="input-group-addon"><i class="ti-pencil-alt"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Dosage</label>
                                        <div class="input-group">
                                            <input class="form-control" name="dosage" required autocomplete="off" placeholder="Dosage" type="text">
                                            <div class="input-group-addon"><i class="ti-pencil-alt"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Length of Treatment </label>
                                        <div class="input-group">
                                            <input class="form-control" name="lot" required autocomplete="off" placeholder="Length of Treatment" type="text">
                                            <div class="input-group-addon"><i class="ti-pencil-alt"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputpwd1">Name of Vet</label>
                                        <div class="input-group">
                                            <select class="form-control select2" name="nov" required>
                                                <option>Select</option>
                                                <?php
                                                $select = mysqli_query($con,"select * from manage_doctors where farm_id ='$farm' ");
                                                while ($doctor = mysqli_fetch_array($select)){
                                                    ?>
                                                    <option value="<?php echo $doctor['vet_name']; ?>"><?php echo $doctor['vet_name']; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
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
                    <h4><b>Culling Tips</b></h4>


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
