<!DOCTYPE html>
<html lang="en">

<head>
 <?php include 'head.php';
 $active='animal';?>
</head>
<?php //include 'head.php';?>
</head>
<?php
include 'db.php';
$message="";
$farm = $_SESSION['farm'];
if(isset($_POST['submit'])){
    $tagno = mysqli_real_escape_string($con,        ucwords($_POST['tagno']));
    $aname = mysqli_real_escape_string($con,        ucwords($_POST['aname']));
    $gender = mysqli_real_escape_string($con,       ucwords($_POST['gender']));
    $breed = mysqli_real_escape_string($con,        ucwords($_POST['breed']));
    $dob = mysqli_real_escape_string($con,          ucwords($_POST['dob']));
    $location = mysqli_real_escape_string($con,     ucwords($_POST['location']));
    $gp = mysqli_real_escape_string($con,           ucwords($_POST['gp']));
    $nod = mysqli_real_escape_string($con,          ucwords($_POST['nod']));
    $bod = mysqli_real_escape_string($con,          ucwords($_POST['bod']));
    $nos = mysqli_real_escape_string($con,          ucwords($_POST['nos']));
    $bos = mysqli_real_escape_string($con,          ucwords($_POST['bos']));
    //capturing the registrar of the data
    $entered_by =   $_SESSION['full_names'];
    $time =         date("Y-m-d H:i:s");
    $action =       "Registered Animal ".' '.$tagno;
    //checking if the tag Number already exists
    $check_account = mysqli_query($con,"select * from animal_registration where tagNo = '$tagno' and farm_id ='$farm'");
    if(mysqli_num_rows($check_account) > 0){
        //$message = "<div class=\"alert alert-danger\"><strong>Failed! The Tag Number was already assigned, Use another one</strong></div>";
        echo "<script>alert('Failed! The Tag Number was already assigned, Use another one');</script>";
    } else{
        //check if the animal Name already exists
        $check_username = mysqli_query($con,"select * from animal_registration where animal_name = '$aname' and farm_id ='$farm'");
        if(mysqli_num_rows($check_username) > 0){
            //$message = "<div class=\"alert alert-danger\"><strong>Failed! The Animal Name is Under use. Chose another one</strong></div>";
            echo "<script>alert('Failed! The Animal Name is Under use. Chose another one');</script>";
        }else{
            if($gp<50){
                echo "<script>alert('Failed! The genetic percentage must be greater than or equal to 50');</script>";
            }else{
                $sql_animal = "insert into animal_registration(farm_id,tagNo,animal_name,gender,breed,dob,location,genetic_percentage,name_of_dam,breed_of_dam,name_of_sire,breed_of_sire,status)
                        VALUES ('$farm','$tagno','$aname','$gender','$breed','$dob','$location','$gp','$nod','$bod','$nos','$bos','Present')";

                $sql_log  = "insert into transaction_logs(farm_id,transaction_action,transaction_time,transaction_by) VALUES ('$farm','$action','$time','$entered_by')";
                //Executing the queries;
                $insert_animal = mysqli_query($con,$sql_animal);
                $insert_transaction = mysqli_query($con,$sql_log);
                if($insert_animal && $insert_transaction ){
                    //$message = "<div class=\"alert alert-success\"><strong>Registration is Successful</strong></div>";
                    echo "<script>alert('Registration is Successful');</script>";
                }
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
                    <h4 class="page-title">Animal Registration Form</h4> </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                    <a href="javascript: void(0);" "></a>
                    <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Animal</a></li>
                        <li><a href="#">Animal Registration</a></li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!--.row-->
            <div class="row">

                <div class="col-md-9 col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">Animal Registration Form</h3>
                        <form action="register-animal" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-4 col-xs-12">

                                    <div class="form-group">
                                        <label for="exampleInputuname">Animal Name </label>
                                        <div class="input-group">
                                            <input type="text" name="aname" class="form-control" id="exampleInputuname" required autocomplete="off" placeholder="Animal Name">
                                            <div class="input-group-addon"><i class="ti-user"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">TagNo</label>
                                        <div class="input-group">
                                            <input type="text" name="tagno" required autocomplete="off" class="form-control" id="exampleInputEmail1" placeholder="Assign a TagNo">
                                            <div class="input-group-addon"><i class="ti-email"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputphone">Gender</label>
                                        <div class="input-group">
                                        <select class="form-control select2" name="gender" required>
                                            <option>Select</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                        <div class="input-group-addon"><i class="ti-email"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputpwd1">Breed</label>
                                        <div class="input-group">
                                            <select class="form-control select2" name="breed" required>
                                                <option>Select</option>
                                                <?php
                                                $select = mysqli_query($con,"select * from manage_breeds where  farm_id ='$farm'");
                                                while ($breed = mysqli_fetch_array($select)){
                                                    ?>
                                                    <option value="<?php echo $breed['breedname']; ?>"><?php echo $breed['breedname']; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                            <div class="input-group-addon"><i class="ti-email"></i></div>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputpwd2">Date of Birth</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" name="dob" id="datepicker" />
                                         <span class="input-group-addon"><i class="icon-calender"></i></span>
                                    </div>
                                </div>
                                    <div class="form-group">
                                        <label for="exampleInputuname">On Premise </label>
                                        <div class="input-group">
                                            <select class="form-control select2" name="location" required>
                                                <option>Select</option>
                                                <option value="On">Yes</option>
                                                <option value="Off">No</option>
                                            </select>
                                            <div class="input-group-addon"><i class="ti-location-arrow"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Genetic Percentage</label>
                                        <div class="input-group">
                                            <input class="form-control" name="gp" required autocomplete="off" placeholder="Genetic percentage" type="number" min="50" title="Value must be 50 and ABove" name="demo3">
                                            <div class="input-group-addon"><i class="ti-email"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputphone">Name of Sire </label>
                                        <div class="input-group">
                                            <input type="text" name="nos"  required autocomplete="off" class="form-control" id="exampleInputphone" placeholder="Name of Sire">
                                            <div class="input-group-addon"><i class="ti-mobile"></i></div>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputpwd1">Breed of Sire </label>
                                    <div class="input-group">
                                        <input type="text"  name="bos"  required autocomplete="off" class="form-control" id="exampleInputpwd1" placeholder="Breed of Sire">
                                        <div class="input-group-addon"><i class="ti-lock"></i></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputpwd2">Name of Dam </label>
                                    <div class="input-group">
                                        <input type="text"  name="nod"  required autocomplete="off" class="form-control" id="exampleInputpwd2" placeholder="Name of Dam">
                                        <div class="input-group-addon"><i class="ti-lock"></i></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputpwd2">Breed of Dam </label>
                                    <div class="input-group">
                                        <input type="text"  name="bod"  required autocomplete="off" class="form-control" id="exampleInputpwd2" placeholder="Breed of Dam ">
                                        <div class="input-group-addon"><i class="ti-lock"></i></div>
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
                <div class="col-md-3 col-sm-12">
                    <h4><b>Animal Registration Tips</b></h4>
                    <marquee  behavior="scroll" direction="up" id="mymarquee" scrollamount="2" onmouseover="this.stop();" onmouseout="this.start();">
                        <p style="text-align: justify">
                            <?php
                            $select = mysqli_query($con,"select * from farmertips where section='Profiling' ORDER BY id desc LIMIT 1 ");
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
