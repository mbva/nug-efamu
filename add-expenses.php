<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head.php';
    $active='finance';
    ?>
</head>
<?php
include 'db.php';
$message="";
$farm = $_SESSION['farm'];
if(isset($_POST['submit'])){
    $item = mysqli_real_escape_string($con,        ucwords($_POST['item']));
    $quantity = mysqli_real_escape_string($con,        ucwords($_POST['quantity']));
    $ucost = mysqli_real_escape_string($con,          ucwords($_POST['ucost']));
    $dop = mysqli_real_escape_string($con,          ucwords($_POST['dop']));
    $recno = mysqli_real_escape_string($con,          ucwords($_POST['recno']));
    $entrydate = date("Y-m-d");
    $totalcost = ($quantity*$ucost);
    // Getting the category

    $cat = mysqli_fetch_array(mysqli_query($con,"select * from expensesitems where item ='$item' and farm_id ='$farm'"));
    $category = $cat['cat_id'];

    //capturing the registrar of the data
    $entered_by =   $_SESSION['full_names'];
    $time =         date("Y-m-d H:i:s");
    $action =       "Entered Expense records";

    //checking if the Receipt Number exists already
    $check_receipt = mysqli_query($con,"select * from generalexpenses where recno = '$recno' and receiptdate='$dop' and item='$item' and farm_id ='$farm'");

    if(mysqli_num_rows($check_receipt)>0){
        //$message = "<div class=\"alert alert-danger\"><strong>Failed! The Receipt Number is already under Use</strong></div>";
        echo "<script>alert('The Record already Exists');</script>";
    }else{
        $sql_expense = "insert into generalexpenses(farm_id,item,cat,qty,unitcost,totalcost,recno,receiptdate,recordedby,entrydate)
                        VALUES ('$farm','$item','$category','$quantity','$ucost','$totalcost','$recno','$dop','$entered_by','$entrydate')";

        $sql_log  = "insert into transaction_logs(farm_id,transaction_action,transaction_time,transaction_by) VALUES ('$farm','$action','$time','$entered_by')";

        //Executing the queries;
        $insert_expense = mysqli_query($con,$sql_expense);
        $insert_transaction = mysqli_query($con,$sql_log);
        if($insert_expense && $insert_transaction){
            //$message = "<div class=\"alert alert-success\"><strong>Registration is Successful</strong></div>";
            echo "<script>alert('Registration is Successful');</script>";
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
                    <h4 class="page-title">
                        Expenses Form
                    </h4> </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                    <a href="javascript: void(0);" "></a>
                    <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Finance Manager</a></li>
                        <li><a href="#">Expenses</a></li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!--.row-->
            <div class="row">

                <div class="col-md-9 col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">Expenses Form</h3>
                        <form action="add-expenses" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputpwd2">Expense Date</label>
                                        <div class="input-group">
                                            <input type="date" class="form-control" name="dop" id="datepicker" />
                                            <span class="input-group-addon"><i class="icon-calender"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputuname">Item</label>
                                        <div class="input-group">
                                            <select class="form-control select2" name="item" required>
                                                <option value="">Select</option>
                                                <?php
                                                $select = mysqli_query($con,"select * from expensesitems where  farm_id ='$farm'");
                                                while ($name = mysqli_fetch_array($select)){
                                                    ?>
                                                    <option value="<?php echo $name['item']; ?>"><?php echo $name['item']; ?></option>
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
                                        <label for="exampleInputEmail1">Quantity</label>
                                        <div class="input-group">
                                            <input class="form-control" name="quantity" onkeypress="return isNumberKey(event)" required autocomplete="off" placeholder="Quantity" type="number">
                                            <div class="input-group-addon"><i class="ti-pencil-alt"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Unit Cost</label>
                                        <div class="input-group">
                                            <input class="form-control" name="ucost" onkeypress="return isNumberKey(event)" required autocomplete="off" placeholder="Unit Cost" type="number">
                                            <div class="input-group-addon"><i class="ti-pencil-alt"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Receipt Number.</label>
                                        <div class="input-group">
                                            <input class="form-control" name="recno" required autocomplete="off" placeholder="Receipt Number" type="text">
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
                    <h4><b>Expense Tips</b></h4>


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
