<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head.php';?>
</head>
<?php include 'head.php';
$active='u-permissions';?>
</head>
<?php
if(isset($_POST['save']))
{
//$id = $_POST['selector'];
    $user_id =$_POST['member_id'];
//echo $user_id;
    $verify = mysqli_query($con,"SELECT * FROM emp_permission WHERE user_id = '$user_id'");

    if(!$verify){
        die("Error:" .mysqli_error($con));

    }
    $get_verify=mysqli_num_rows($verify);
    if($get_verify >0)
    {
        echo "<script>alert('Error: Permission Already granted. Please visit permission list to see!!'); </script>";
    }
    else{
//Starting of first module
        $module1 = mysqli_real_escape_string($con, $_POST['animalp']);
        $pcreate1 = (isset($_POST['animals_create'])) ? 1 : 0;
        $pread1 = (isset($_POST['animals_read'])) ? 1 : 0;
        $pupdate1 = (isset($_POST['animals_update'])) ? 1 : 0;
        $pdelete1 = (isset($_POST['animals_delete'])) ? 1 : 0;

        $insert1 = mysqli_query($con, "INSERT INTO emp_permission VALUES('','$user_id','$module1','$pcreate1','$pread1','$pupdate1','$pdelete1')") or die ("Error: " . mysqli_error($con));
//End of first module

//Starting of second module
        $module2 = mysqli_real_escape_string($con, $_POST['breedingp']);
        $pcreate2 = (isset($_POST['breeding_create'])) ? 1 : 0;
        $pread2 = (isset($_POST['breeding_read'])) ? 1 : 0;
        $pupdate2 = (isset($_POST['breeding_update'])) ? 1 : 0;
        $pdelete2 = (isset($_POST['breeding_delete'])) ? 1 : 0;

        $insert1 = mysqli_query($con, "INSERT INTO emp_permission VALUES('','$user_id','$module2','$pcreate2','$pread2','$pupdate2','$pdelete2')") or die ("Error: " . mysqli_error($con));
//End of second module

//Starting of third module
        $module3 = mysqli_real_escape_string($con, $_POST['settingp']);
        $pcreate3 = (isset($_POST['settings_create'])) ? 1 : 0;
        $pread3 = (isset($_POST['settings_read'])) ? 1 : 0;
        $pupdate3 = (isset($_POST['settings_update'])) ? 1 : 0;
        $pdelete3 = (isset($_POST['settings_delete'])) ? 1 : 0;

        $insert1 = mysqli_query($con, "INSERT INTO emp_permission VALUES('','$user_id','$module3','$pcreate3','$pread3','$pupdate3','$pdelete3')") or die ("Error: " . mysqli_error($con));
//End of third module

//Starting of fourth module
        $module4 = mysqli_real_escape_string($con, $_POST['herdp']);
        $pcreate4 = (isset($_POST['herdp_create'])) ? 1 : 0;
        $pread4 = (isset($_POST['herdp_read'])) ? 1 : 0;
        $pupdate4 = (isset($_POST['herdp_update'])) ? 1 : 0;
        $pdelete4 = (isset($_POST['herdp_delete'])) ? 1 : 0;

        $insert1 = mysqli_query($con, "INSERT INTO emp_permission VALUES('','$user_id','$module4','$pcreate4','$pread4','$pupdate4','$pdelete4')") or die ("Error: " . mysqli_error($con));
//End of fourth module

//Starting of fifth module
        $module5 = mysqli_real_escape_string($con, $_POST['feedingp']);
        $pcreate5 = (isset($_POST['feeding_create'])) ? 1 : 0;
        $pread5 = (isset($_POST['feeding_read'])) ? 1 : 0;
        $pupdate5 = (isset($_POST['feeding_update'])) ? 1 : 0;
        $pdelete5 = (isset($_POST['feeding_delete'])) ? 1 : 0;

        $insert1 = mysqli_query($con, "INSERT INTO emp_permission VALUES('','$user_id','$module5','$pcreate5','$pread5','$pupdate5','$pdelete5')") or die ("Error: " . mysqli_error($con));
//End of fifth module

//Starting of sixth module
        $module6 = mysqli_real_escape_string($con, $_POST['analysisp']);
        $pcreate6 = (isset($_POST['analysis_create'])) ? 1 : 0;
        $pread6 = (isset($_POST['analysis_read'])) ? 1 : 0;
        $pupdate6 = (isset($_POST['analysis_update'])) ? 1 : 0;
        $pdelete6 = (isset($_POST['analysis_delete'])) ? 1 : 0;

        $insert1 = mysqli_query($con, "INSERT INTO emp_permission VALUES('','$user_id','$module6','$pcreate6','$pread6','$pupdate6','$pdelete6')") or die ("Error: " . mysqli_error($con));
//End of sixth module

//Starting of seventh module
        $module7 = mysqli_real_escape_string($con, $_POST['financep']);
        $pcreate7 = (isset($_POST['finance_create'])) ? 1 : 0;
        $pread7 = (isset($_POST['finance_read'])) ? 1 : 0;
        $pupdate7 = (isset($_POST['finance_update'])) ? 1 : 0;
        $pdelete7 = (isset($_POST['finance_delete'])) ? 1 : 0;

        $insert1 = mysqli_query($con, "INSERT INTO emp_permission VALUES('','$user_id','$module7','$pcreate7','$pread7','$pupdate7','$pdelete7')") or die ("Error: " . mysqli_error($con));
//End of seventh module

//Starting of eight module
        $module8 = mysqli_real_escape_string($con, $_POST['milkp']);
        $pcreate8 = (isset($_POST['milk_create'])) ? 1 : 0;
        $pread8 = (isset($_POST['milk_read'])) ? 1 : 0;
        $pupdate8 = (isset($_POST['milk_update'])) ? 1 : 0;
        $pdelete8 = (isset($_POST['milk_delete'])) ? 1 : 0;

        $insert1 = mysqli_query($con, "INSERT INTO emp_permission VALUES('','$user_id','$module8','$pcreate8','$pread8','$pupdate8','$pdelete8')") or die ("Error: " . mysqli_error($con));
//End of eight module

//Starting of ninth module
        $module9 = mysqli_real_escape_string($con, $_POST['permissionp']);
        $pcreate9 = (isset($_POST['permission_create'])) ? 1 : 0;
        $pread9 = (isset($_POST['permission_read'])) ? 1 : 0;
        $pupdate9 = (isset($_POST['permission_update'])) ? 1 : 0;
        $pdelete9 = (isset($_POST['permission_delete'])) ? 1 : 0;

        $insert1 = mysqli_query($con, "INSERT INTO emp_permission VALUES('','$user_id','$module9','$pcreate9','$pread9','$pupdate9','$pdelete9')") or die ("Error: " . mysqli_error($con));
//End of ninth module

//Starting of tenth module
        $module10 = mysqli_real_escape_string($con, $_POST['employeesp']);
        $pcreate10 = (isset($_POST['employees_create'])) ? 1 : 0;
        $pread10 = (isset($_POST['employees_read'])) ? 1 : 0;
        $pupdate10 = (isset($_POST['employees_update'])) ? 1 : 0;
        $pdelete10 = (isset($_POST['employees_delete'])) ? 1 : 0;

        $insert1 = mysqli_query($con, "INSERT INTO emp_permission VALUES('','$user_id','$module10','$pcreate10','$pread10','$pupdate10','$pdelete10')") or die ("Error: " . mysqli_error($con));
//End of tenth module

//Starting of eleventh module
        $module11 = mysqli_real_escape_string($con, $_POST['usersp']);
        $pcreate11 = (isset($_POST['users_create'])) ? 1 : 0;
        $pread11 = (isset($_POST['users_read'])) ? 1 : 0;
        $pupdate11 = (isset($_POST['users_update'])) ? 1 : 0;
        $pdelete11 = (isset($_POST['users_delete'])) ? 1 : 0;

        $insert1 = mysqli_query($con, "INSERT INTO emp_permission VALUES('','$user_id','$module11','$pcreate11','$pread11','$pupdate11','$pdelete11')") or die ("Error: " . mysqli_error($con));
//End of eleventh module

        if(!$insert1)
        {
            echo "<script>alert('Record not inserted.....Please try again later!'); </script>";
        }
        else{
            echo "<script>alert('Permission Added Successfully!!'); </script>";
            echo "<script>window.location='permission_select'; </script>";
        }
    }
    $action =       "Entered permissions records for".$user_id;

    $insert_log = mysqli_query($con,"insert into transaction_logs(transaction_action,transaction_time,transaction_by) VALUES ('$action','$time','$entered_by')");

    if($insert_record && $insert_log){
        echo "<script>alert('Recorded is Successfully');</script>";
    }else{
        echo mysqli_error($con);
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
                        Add User Permissions
                    </h4> </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                    <a href="javascript: void(0);" "></a>
                    <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Permissions</a></li>
                        <li><a href="#">Add User Permissions</a></li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!--.row-->
            <div class="row">

                <div class="col-md-12 col-sm-12">
                    <div class="white-box">
                        <div class="row">
                            <?php
                            $user_id =$idm = $_GET['id'];
                            $user = mysqli_query($con, "SELECT * FROM users WHERE memberid = '$user_id'") or die (mysqli_error($con));
                            while($us = mysqli_fetch_array($user))
                            {
                                $name= $us['full_names'];

                            }?>
                            <center><h3 style="color:blue">Edit Permissions for: <?PHP echo $name;?> </h3></center>

                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <table id="example23" class="myTable table table-responsive color-table info-table display nowrap table table-hover table-striped" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>S/No.</th>
                                        <th>Module Name</th>
                                        <th><div align="center">Create</div></th>
                                        <th><div align="center">Read</div></th>
                                        <th><div align="center">Update</div></th>
                                        <th><div align="center">Delete</div></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    $i = 0;
                                    $search = mysqli_query($con, "SELECT * FROM emp_permission WHERE user_id = '$user_id'") or die (mysqli_error($con));
                                    while($have = mysqli_fetch_array($search))
                                    {
                                        $idme= $have['id'];
                                        ?>
                                        <tr>
                                            <td><?php echo $idme; ?><input id="optionsCheckbox" class="uniform_on" name="selector[<?php echo $i; ?>]" type="hidden" value="<?php echo $idme; ?>" checked></td>
                                            <td><?php echo $have['module_name']; ?></td>
                                            <td><div align="center"><input id="optionsCheckbox" class="checkbox" name="pcreate[<?php echo $i; ?>]" type="checkbox" value="<?php echo ($have['pcreate'] == "0") ? 1 : $have['pcreate']; ?>" <?php echo ($have['pcreate'] == "0") ? '' : 'checked'; ?>></div></td>
                                            <td><div align="center"><input id="optionsCheckbox" class="checkbox" name="pread[<?php echo $i; ?>]" type="checkbox" value="<?php echo ($have['pread'] == "0") ? 1 : $have['pread']; ?>" <?php echo ($have['pread'] == "0") ? '' : 'checked'; ?>></div></td>
                                            <td><div align="center"><input id="optionsCheckbox" class="checkbox" name="pupdate[<?php echo $i; ?>]" type="checkbox" value="<?php echo ($have['pupdate'] == "0") ? 1 : $have['pupdate']; ?>" <?php echo ($have['pupdate'] == "0") ? '' : 'checked'; ?>></div></td>
                                            <td><div align="center"><input id="optionsCheckbox" class="checkbox" name="pdelete[<?php echo $i; ?>]" type="checkbox" value="<?php echo ($have['pdelete'] == "0") ? 1 : $have['pdelete']; ?>" <?php echo ($have['pdelete'] == "0") ? '' : 'checked'; ?>></div></td>
                                        </tr>
                                        <?php
                                        if(isset($_POST['update']))
                                        {
                                            $ide = $_GET['id'];
                                            $selector = $_POST['selector'];
                                            $i = 0;
                                            foreach($selector as $s)
                                            {
//$module = mysqli_real_escape_string($link, $_POST['module'][$i]);
                                                $pcreate = (isset($_POST['pcreate']) && ($_POST['pcreate'][$i] == '1')) ? 1 : 0;
                                                $pread = (isset($_POST['pread']) && ($_POST['pread'][$i] == '1'))  ? 1 : 0;
                                                $pupdate = (isset($_POST['pupdate']) && ($_POST['pupdate'][$i] == '1'))  ? 1 : 0;
                                                $pdelete = (isset($_POST['pdelete']) && ($_POST['pdelete'][$i] == '1'))  ? 1 : 0;

                                                $update_sel = mysqli_query($con, "UPDATE emp_permission SET pcreate = '$pcreate', pread = '$pread', pupdate ='$pupdate', pdelete ='$pdelete' WHERE id ='$s'") or die ("Error: " . mysqli_error($con));
                                                $i++;

                                                if(!$update_sel)
                                                {
                                                    echo "<script>alert('Record not update.....Please try again later!'); </script>";
                                                }
                                                else{
                                                    echo "<script>alert('Update Successfully!!'); </script>";
                                                    echo "<script>window.location='edit_perm?id=".$ide."'; </script>";
                                                }
                                            }
                                        }
                                        $i++;
                                    }
                                    ?>
                                    </tbody>
                                </table>

                            </div>
                            <div class="row">
                                <div class="text-center">
                                    <button type="submit" name="update" class="btn btn-success waves-effect waves-light m-r-10"><i class="fa fa-save"></i> Submit</button>
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
