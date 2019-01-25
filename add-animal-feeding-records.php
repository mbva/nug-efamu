<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head.php';
    $active='feeding';
    ?>
	
	<script type="text/javascript">
    $(document).ready(function(){
        $("select.feedtype").change(function(){
            var selectedfeedtype = $(".feedtype option:selected").val();
            $.ajax({
                type: "POST",
                url: "process_feedtype.php",
                data: { feedtype : selectedfeedtype } 
            }).done(function(data){
                $("#response").html(data);
            });
        });
		 });
	
		var $select1 = $( '#select1' ),
		$select2 = $( '#select2' ),
    $options = $select2.find( 'option' );
    
$select1.on( 'change', function() {
	$select2.html( $options.filter( '[value="' + this.value + '"]' ) );
} ).trigger( 'change' );
</script>
</head>
<?php
include 'db.php';
$message="";
$farm= $_SESSION['farm'];
if(isset($_POST['submit'])){
    $date = mysqli_real_escape_string($con,  ucwords($_POST['sdate']));
    $class = mysqli_real_escape_string($con,   ucwords($_POST['animalclass']));
    $feed_type = mysqli_real_escape_string($con,   ucwords($_POST['feedtype']));
    $quantity = mysqli_real_escape_string($con,   ucwords($_POST['quantity']));
    $frequency = mysqli_real_escape_string($con,   ucwords($_POST['frequency']));
    $number = mysqli_real_escape_string($con,   ucwords($_POST['animalnumber']));
    $recdate = date("Y-m-d");
    $recby = $_SESSION['full_names'];

    //capturing the registrar of the data
    $entered_by =   $_SESSION['full_names'];
    $time =         date("Y-m-d H:i:s");
    $action =       "Entered  Feeding records for".$class;



    //checking if the member was already paid
    if(mysqli_num_rows(mysqli_query($con,"select * from animal_feeding where animalclass='$class' and fdate='$date' and farm_id ='$farm' "))>0){
        //$message = "<div class=\"alert alert-danger\"><strong>These Feeding Records were already Taken</strong></div>";
        echo "<script>alert('These Feeding Records were already Taken');</script>";
    }else{
        $insert_record = mysqli_query($con,"INSERT INTO animal_feeding (farm_id,fdate, animalclass, feedtype, quantityfed, frequency, numberofanimals,recby,recdate) 
                                                VALUES ('$farm','$date', '$class', '$feed_type', '$quantity', '$frequency', '$number','$recby','$recdate');");

        $insert_log = mysqli_query($con,"insert into transaction_logs(farm_id,transaction_action,transaction_time,transaction_by) VALUES ('$farm','$action','$time','$entered_by')");

        if($insert_record && $insert_log){
            //$message = "<div class=\"alert alert-success\"><strong>Insertion is Successful</strong></div>";
            echo "<script>alert('Recorded is Successfully');</script>";
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
                        Animal Feeding Form
                    </h4> </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                    <a href="javascript: void(0);" target="_blank" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Buy Admin Now</a>
                    <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Feeding</a></li>
                        <li><a href="#">  Animal Feeding Form</a></li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!--.row-->
            <div class="row">

                <div class="col-md-9 col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0"> Animal Feeding Form</h3>
                        <form action="add-animal-feeding-records" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputpwd2">Feeding Date</label>
                                        <div class="input-group">
                                            <input type="date" class="form-control" name="sdate" id="datepicker" />
                                            <span class="input-group-addon"><i class="icon-calender"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputuname">Animal</label>
                                        <div class="input-group">
                                            <select class="form-control select2" name="animalclass" required>
                                                <option value="">Select</option>
                                                <option value="Dry feeding">Dry feeding</option>
                                                <option value="Breeding heard">Breeding heard</option>
                                                <option value="Milking Heard">Milking Heard</option>
                                            </select>
                                            <?php
                                            ?>
                                            <div class="input-group-addon"><i class="ti-pencil"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputuname">Feed Type </label>
                                        <div class="input-group">
                                            <select class="form-control feedtype select2" name="feedtype" required>
                                                <option value="">Select</option>
                                                <option value="Pasture">Pasture</option>
                                                <option value="ff">Total Mixed ratio</option>
                                                <option value="Supplement">Supplement</option>
                                            </select>
                                            <?php
                                            ?>
                                            <div class="input-group-addon"><i class="ti-pencil"></i></div>
                                        </div>
										</div>
										<div  id="response">
			
			
			                                </div>
											<div class="col-xs-6">
  <select class="form-control" name="select1" id="select1">
    <option value="1">Fruit</option>
    <option value="2">Animal</option>
    <option value="3">Bird</option>
    <option value="4">Car</option>
  </select>
</div>
<div class="col-xs-6">
  <select class="form-control" name="select2" id="select2">
    <option value="1">Banana</option>
    <option value="1">Apple</option>
    <option value="1">Orange</option>
    <option value="2">Wolf</option>
    <option value="2">Fox</option>
    <option value="2">Bear</option>
    <option value="3">Eagle</option>
    <option value="3">Hawk</option>
    <option value="4">BWM<option>
</select>
</div>
                                    
									
									
                                </div>
                                <div class="col-sm-6 col-xs-12">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Quantity</label>
                                        <div class="input-group">
                                            <input class="form-control" name="quantity" required autocomplete="off" placeholder="Quantity Given" type="number">
                                            <div class="input-group-addon"><i class="ti-pencil-alt"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Frequency</label>
                                        <div class="input-group">
                                            <input class="form-control" name="frequency" required autocomplete="off" placeholder="Frequency of feeding" type="number">
                                            <div class="input-group-addon"><i class="ti-pencil-alt"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Number of Animals </label>
                                        <div class="input-group">
                                            <input class="form-control" name="animalnumber" required autocomplete="off" placeholder="Number of Animals Fed" type="number">
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
                    <h4><b>Animal Feeding Tips</b></h4>


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
