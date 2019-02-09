<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head.php';
    $active='settings';
    ?>
</head>
<?php
include 'db.php';
$message="";
$farm = $_SESSION['farm'];
if(isset($_POST['submit'])){
    $exdate = mysqli_real_escape_string($con,  ucwords($_POST['exdate']));
    $animal_id= mysqli_real_escape_string($con,   ucwords($_POST['animal_id']));
    
    $actual_date = mysqli_real_escape_string($con,   ucwords($_POST['actual']));
    
    $recdate = date("Y-m-d");
    $recby = $_SESSION['full_names'];
    $selects = mysqli_query($con,"select * from animal_registration where animal_id='$animal_id' and farm_id ='$farm'");
    $names=mysqli_fetch_array($selects);
    $aname=$names['animal_name'];

    //capturing the registrar of the data
    $entered_by =   $_SESSION['full_names'];
    $time =         date("Y-m-d H:i:s");
    $action =       "Recorded Heat Records For  $aname";
    //Check if the records exists
    $check_record = mysqli_query($con,"select * from heat_animals where animal_id='$animal_id' and status='Pending' and farm_id ='$farm'");
    if(mysqli_num_rows($check_record)>0){
        echo "<script>alert('Record already Exists');</script>";
    }
    else{
        //checking if the member was already paid
       $insert_record = mysqli_query($con,"insert into heat_animals(farm_id,animal_id,exp_heat,actualheatdate,status)VALUES ('$farm','$animal_id','$exdate','$actual_date','pending')");
         if(!$insert_record){
			 die('Not inserted'.mysqli_error($con));
		 }else{
			 echo "<script>alert('Recorded Successfully');</script>";
		$insert_log = mysqli_query($con,"insert into transaction_logs(farm_id,transaction_action,transaction_time,transaction_by) VALUES ('$farm','$action','$time','$entered_by')");

        if($insert_log){
            //$message = "<div class=\"alert alert-success\"><strong>Recorded Successfully</strong></div>";
            
        }else{
            echo mysqli_error($con);
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
                       Pending Heat Form
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
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">Animal Records Table</h3>

                        <div class="table-responsive">

                            <table id="example23" class="myTable table table-responsive color-table info-table display nowrap table table-hover table-striped" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th  > <?php
                                        function get_client_ip()
                                        {
                                            $ipaddress = '';
                                            if (getenv('HTTP_CLIENT_IP')){
                                                $ipaddress = getenv('HTTP_CLIENT_IP');
                                                echo "<h2> $ipaddress </h2>";
                                            }
                                            else if(getenv('HTTP_X_FORWARDED_FOR')){
                                                $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
                                                echo "<h2> $ipaddress </h2>";
                                            }
                                            else if(getenv('HTTP_X_FORWARDED')){
                                                $ipaddress = getenv('HTTP_X_FORWARDED');
                                                echo "<h2> $ipaddress </h2>";
                                            }
                                            else if(getenv('HTTP_FORWARDED_FOR')){
                                                $ipaddress = getenv('HTTP_FORWARDED_FOR');
                                                echo "<h2> $ipaddress </h2>";
                                            }
                                            else if(getenv('HTTP_FORWARDED')){
                                                $ipaddress = getenv('HTTP_FORWARDED');
                                                echo "<h2> $ipaddress </h2>";
                                            }

                                            else if(getenv('REMOTE_ADDR')){
                                                $ipaddress = getenv('REMOTE_ADDR');
                                                echo "<h2> $ipaddress </h2>";
                                            }
                                            else{
                                                $ipaddress = 'UNKNOWN';}
                                            return $ipaddress;
                                        }
                                        ?>ID</th>
                                    <th >Title</th>
                                    
                                    <th>Added By</th>
                                    <th>Date added</th>                                     
                                    <th >Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th >Title</th>
                                    <th>Added By</th>
                                    <th>Date added</th>                                     
                                    <th >Action</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php
                                include 'db.php';
                                $select = mysqli_query($con,"select * from farmerresources where farm_id ='$farm'");
                                $sno = 0;
                                while($results = mysqli_fetch_array($select)){
                                    $sno++
                                    ?>
                                    <tr><input type="hidden" id="id" name="id" value="<?=$results['id'];?>">
                                        <td><?=$sno;?></td>
                                        <td><?=$results['resourcetitle'];?></td>
                                        
                                        <td><?=$results['addby'];?></td>
                                        <td><?=$results['date_added'];?>
                                   <td><a target="_blank" href="<?php echo $results['resourceurl'];?>" style="color: white" class="btn btn-info"><i class="fa fa-eye fa-1x"></a></i></td>

                                         <td><a  style="color: white" class="btn btn-success"  href="edit-doctor?farm_id=<?=$results['farm_id']?>&&id=<?=$results['id'];?>"><i class="fa fa-edit fa-1x"></a></i></td>

                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
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
