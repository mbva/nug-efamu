<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head.php';?>
</head>
<?php include 'head.php';
$active='animal';?>
</head>
<?php
include 'db.php';
$message="";
$farm = $_SESSION['farm'];
if(isset($_POST['submit'])){
    $animal_id = mysqli_real_escape_string($con,        ucwords($_POST['animal_id']));
    //$aname = mysqli_real_escape_string($con,        ucwords($_POST['aname']));
    $cdate = mysqli_real_escape_string($con,        ucwords($_POST['cdate']));

    $eoc = mysqli_real_escape_string($con,       ucwords($_POST['eoc']));
    $desc = mysqli_real_escape_string($con,        ucwords($_POST['desc']));
    $ymcp = mysqli_real_escape_string($con,          ucwords($_POST['ymcp']));
    $calgel = mysqli_real_escape_string($con,     ucwords($_POST['cg']));
    $probios = mysqli_real_escape_string($con,           ucwords($_POST['pb']));
    $ketogel = mysqli_real_escape_string($con,          ucwords($_POST['kg']));
    $other = mysqli_real_escape_string($con,          ucwords($_POST['other']));
    $calfalive = mysqli_real_escape_string($con,          ucwords($_POST['ca']));
    $col = mysqli_real_escape_string($con,          ucwords($_POST['col']));
    $dn = mysqli_real_escape_string($con,          ucwords($_POST['dn']));
    $vit = mysqli_real_escape_string($con,          ucwords($_POST['vit']));
    $weight = mysqli_real_escape_string($con,          ucwords($_POST['weight']));
    $bm = mysqli_real_escape_string($con,          ucwords($_POST['bm']));
    $mf = mysqli_real_escape_string($con,          ucwords($_POST['mf']));
    $expelled = mysqli_real_escape_string($con,          ucwords($_POST['expelled']));
    $ecp = mysqli_real_escape_string($con,          ucwords($_POST['ecp']));

    //capturing the registrar of the data
    $entered_by =   $_SESSION['full_names'];
    $time =         date("Y-m-d H:i:s");


    //checking if the tag Number matches the animal name
    /*$check_account = mysqli_query($con,"select * from animal_registration where id = '$animal_id '");
    $selected_details = mysqli_fetch_array($check_account);
    $selected_cow_name = $selected_details['animal_name'];

    if($aname!=$selected_cow_name){
        //$message = "<div class=\"alert alert-danger\"><strong>Failed! The Tag Number is not corresponding to the Animal Name</strong></div>";
        echo "<script>alert('Failed! The Tag Number is not corresponding to the Animal Name');</script>";
    }else{*/
    //checking if the record exists
    $action =       "Recorded Calving info for Animal With UID ".' '.$animal_id;
    if(mysqli_num_rows(mysqli_query($con,"select * from calving 
  where cdate='$cdate' and animal_id = '$animal_id ' and farm_id ='$farm'"))>0){
        echo "<script>alert('Record already Exists');</script>";
    }else{
        $insert_record = mysqli_query($con, "INSERT INTO calving ( farm_id,cdate, animal_id,eoc, des, ymcp, calgel, probios, ketogel, other, calfalive, colostrum, dipnavel, vitamins, weight, bloodymilk, milkfever, expelled, ecp)
          VALUES ('$farm','$cdate', '$animal_id ', '$eoc', '$desc', '$ymcp', '$calgel', '$probios', '$ketogel', '$other', '$calfalive', '$col', '$dn', '$vit', '$weight', '$bm', '$mf', '$expelled', '$ecp');");

        //////////////////////////////////////////
        //Calculating
        $maxcalving_date=date_create($cdate);
        //Getting the maximum heat date
        date_add($maxcalving_date,date_interval_create_from_date_string("90 days"));
        $max_heat_date =  date_format($maxcalving_date,"Y-m-d");
        //Inserting into the heat_animals
        mysqli_query($con,"insert into heat_animals
			(farm_id,animal_id,calving_date,exp_heat,status)VALUES ('$farm','$animal_id','$cdate','$max_heat_date','Pending')");
        $insert_log  = "insert into transaction_logs(farm_id,transaction_action,transaction_time,transaction_by)
		VALUES ('$farm','$action','$time','$entered_by')";

        if($insert_record && $insert_log ){
            // $message = "<div class=\"alert alert-success\"><strong>Registration is Successful</strong></div>";
            echo "<script>alert('Calf Calving Info Recorded Successfully!');</script>";
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
                    <h4 class="page-title">
                        Calving Form
                    </h4> </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                    <a href="javascript: void(0);" target="_blank" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Buy Admin Now</a>
                    <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Animal</a></li>
                        <li><a href="#">Calving</a></li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!--.row-->
            <div class="row">

                <div class="col-md-12 col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">Calving Form</h3>
                        <form action="add-calving" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-3 col-xs-12">
                                    <div class="form-group">
                                        <label for="exampleInputpwd2">Calving Date</label>
                                        <div class="input-group">
                                            <input type="date" class="form-control" name="cdate" id="datepicker" />
                                            <span class="input-group-addon"><i class="icon-calender"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputuname">Animal </label>
                                        <div class="input-group">
                                            <select class="form-control select2" name="animal_id" required>
                                                <option>Select</option>
                                                <?php
                                                $select = mysqli_query($con,"select * from animal_registration where  gender='Female' and status = 'Present' and farm_id ='$farm'");
                                                while ($results = mysqli_fetch_array($select)){
                                                    $tagno = $results['tagNo'];
                                                    //getting the age of the animal
                                                    $birth_date = $results['dob'];
                                                    $today_date=date("Y-m-d");
                                                    //$comp=$row['next_date'];
                                                    //  echo "<h3>sse $today_date $birth_date </h3>";
                                                    $date1=date_create($today_date);
                                                    $date2=date_create($birth_date);
                                                    $diff=date_diff($date1,$date2);
                                                    $age_days=$diff->format("%R%a");
                                                    $age_days=(-1*$age_days);
                                                    if($age_days>149){
                                                        ?>
                                                        <option value="<?php echo $results['animal_id']; ?>"><?php echo $results['animal_name']." (".$tagno.")"; ?></option>
                                                        <?php //}
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <?php
                                            ?>
                                            </select>
                                            <div class="input-group-addon"><i class="ti-location-arrow"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ease of Calving</label>
                                        <div class="input-group">
                                            <select class="form-control select2" name="eoc" required>
                                                <option>Select</option>
                                                <option value="No Problem">No Problem</option>
                                                <option value="Slight">Slight</option>
                                                <option value="Hard">Hard</option>
                                            </select>
                                            <div class="input-group-addon"><i class="ti-email"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputphone">Description</label>
                                        <div class="input-group">
                                            <textarea name="desc" class="form-control" id="" rows="1" cols="30"  placeholder="Description"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">YMCP</label>
                                        <div class="input-group">
                                        <div class="radio-list">
                                            <label class="radio-inline p-0">
                                                <div class="radio radio-info">
                                                    <input type="radio" name="ymcp" required value="Yes">
                                                    <label for="radio1">Yes</label>
                                                </div>
                                            </label>
                                            <label class="radio-inline">
                                                <div class="radio radio-info">
                                                    <input type="radio" name="ymcp" required  value="No">
                                                    <label for="radio2">No </label>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-xs-12">

                                    <div class="form-group">
                                        <label for="exampleInputuname">CAL GEL </label>
                                        <div class="input-group">
                                        <div class="radio-list">
                                            <label class="radio-inline p-0">
                                                <div class="radio radio-info">
                                                    <input type="radio" name="cg" required  value="Yes">
                                                    <label for="radio1">Yes</label>
                                                </div>
                                            </label>
                                            <label class="radio-inline">
                                                <div class="radio radio-info">
                                                    <input type="radio" name="cg" required  value="No">
                                                    <label for="radio2">No </label>
                                                </div>
                                            </label>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">PRO BIOS </label>
                                        <div class="input-group">
                                        <div class="radio-list">
                                            <label class="radio-inline p-0">
                                                <div class="radio radio-info">
                                                    <input type="radio" name="pb" required  value="Yes">
                                                    <label for="radio1">Yes</label>
                                                </div>
                                            </label>
                                            <label class="radio-inline">
                                                <div class="radio radio-info">
                                                    <input type="radio" name="pb" required  value="No">
                                                    <label for="radio2">No </label>
                                                </div>
                                            </label>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputphone">KETO GEL  </label>
                                        <div class="input-group">
                                            <div class="radio-list">
                                                <label class="radio-inline p-0">
                                                    <div class="radio radio-info">
                                                        <input type="radio" name="kg" required  value="Yes">
                                                        <label for="radio1">Yes</label>
                                                    </div>
                                                </label>
                                                <label class="radio-inline">
                                                    <div class="radio radio-info">
                                                        <input type="radio" name="kg" required  value="No">
                                                        <label for="radio2">No </label>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputphone">OTHER  </label>
                                        <div class="input-group">
                                            <div class="radio-list">
                                                <label class="radio-inline p-0">
                                                    <div class="radio radio-info">
                                                        <input type="radio" name="other" required  value="Yes">
                                                        <label for="radio1">Yes</label>
                                                    </div>
                                                </label>
                                                <label class="radio-inline">
                                                    <div class="radio radio-info">
                                                        <input type="radio" name="other" required  value="No">
                                                        <label for="radio2">No </label>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputpwd2">Calf Alive</label>
                                        <div class="input-group">
                                            <div class="radio-list">
                                                <label class="radio-inline p-0">
                                                    <div class="radio radio-info">
                                                        <input type="radio" name="ca" required  value="Yes">
                                                        <label for="radio1">Yes</label>
                                                    </div>
                                                </label>
                                                <label class="radio-inline">
                                                    <div class="radio radio-info">
                                                        <input type="radio" name="ca" required  value="No">
                                                        <label for="radio2">No </label>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-xs-12">

                                    <div class="form-group">
                                        <label for="exampleInputpwd2">Colostrum in 2 Hrs</label>
                                        <div class="input-group">
                                            <div class="radio-list">
                                                <label class="radio-inline p-0">
                                                    <div class="radio radio-info">
                                                        <input type="radio" name="col" required  value="Yes">
                                                        <label for="radio1">Yes</label>
                                                    </div>
                                                </label>
                                                <label class="radio-inline">
                                                    <div class="radio radio-info">
                                                        <input type="radio" name="col" required  value="No">
                                                        <label for="radio2">No </label>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputuname">Dip Navel </label>
                                        <div class="input-group">
                                            <div class="radio-list">
                                                <label class="radio-inline p-0">
                                                    <div class="radio radio-info">
                                                        <input type="radio" name="dn" required  value="Yes">
                                                        <label for="radio1">Yes</label>
                                                    </div>
                                                </label>
                                                <label class="radio-inline">
                                                    <div class="radio radio-info">
                                                        <input type="radio" name="dn" required  value="No">
                                                        <label for="radio2">No </label>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Vitamin A and D</label>
                                        <div class="input-group">
                                            <div class="radio-list">
                                                <label class="radio-inline p-0">
                                                    <div class="radio radio-info">
                                                        <input type="radio" name="vit" required  value="Yes">
                                                        <label for="radio1">Yes</label>
                                                    </div>
                                                </label>
                                                <label class="radio-inline">
                                                    <div class="radio radio-info">
                                                        <input type="radio" name="vit" required  value="No">
                                                        <label for="radio2">No </label>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Weight at Birth </label>
                                        <div class="input-group">
                                            <input class="form-control" name="weight" required autocomplete="off" placeholder="Weight at Birth" type="number" min="50" title="Value must be 50 and ABove">
                                            <div class="input-group-addon"><i class="ti-email"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputpwd1">Body Milk </label>
                                        <div class="input-group">
                                            <div class="radio-list">
                                                <label class="radio-inline p-0">
                                                    <div class="radio radio-info">
                                                        <input type="radio" name="bm" required  value="Yes">
                                                        <label for="radio1">Yes</label>
                                                    </div>
                                                </label>
                                                <label class="radio-inline">
                                                    <div class="radio radio-info">
                                                        <input type="radio" name="bm" required  value="No">
                                                        <label for="radio2">No </label>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-xs-12">

                                    <div class="form-group">
                                        <label for="exampleInputpwd2">Milk Fever </label>
                                        <div class="input-group">
                                            <div class="radio-list">
                                                <label class="radio-inline p-0">
                                                    <div class="radio radio-info">
                                                        <input type="radio" name="mf" required  value="Yes">
                                                        <label for="radio1">Yes</label>
                                                    </div>
                                                </label>
                                                <label class="radio-inline">
                                                    <div class="radio radio-info">
                                                        <input type="radio" name="mf" required  value="No">
                                                        <label for="radio2">No </label>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputpwd2">After Birth Expelled </label>
                                        <div class="input-group">
                                            <div class="radio-list">
                                                <label class="radio-inline p-0">
                                                    <div class="radio radio-info">
                                                        <input type="radio" name="expelled" required  value="Yes">
                                                        <label for="radio1">Yes</label>
                                                    </div>
                                                </label>
                                                <label class="radio-inline">
                                                    <div class="radio radio-info">
                                                        <input type="radio" name="expelled" required  value="No">
                                                        <label for="radio2">No </label>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputpwd2">ECP </label>
                                        <div class="input-group">
                                            <div class="radio-list">
                                                <label class="radio-inline p-0">
                                                    <div class="radio radio-info">
                                                        <input type="radio" name="ecp" required  value="Yes">
                                                        <label for="radio1">Yes</label>
                                                    </div>
                                                </label>
                                                <label class="radio-inline">
                                                    <div class="radio radio-info">
                                                        <input type="radio" name="ecp" required  value="No">
                                                        <label for="radio2">No </label>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-right">
                                        <button type="submit" name="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                        <button type="reset" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
