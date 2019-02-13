<!DOCTYPE html>
<html lang="en">

<head>
<?php include 'head.php';
$active='payments';?>
<script src="resources/jquery-min.js"></script>
<script type="text/javascript">

    $(document).ready(function(){
         $("select.pmode").change(function(){
            var selectedpmode = $(".pmode option:selected").val();
            $.ajax({
                type: "POST",
                url: "process_methods.php",
                data: { pmode : selectedpmode } 
            }).done(function(data){
                $("#response").html(data);
            });
        });
		 });

		 
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
    $quantity = mysqli_real_escape_string($con,  $_POST['quantity']);
	$hay = mysqli_real_escape_string($con,   $_POST['hay']);
	$silage = mysqli_real_escape_string($con,   $_POST['silage']);
	$dailylevel= mysqli_real_escape_string($con,   $_POST['daily-level']);
    $frequency = mysqli_real_escape_string($con,  $_POST['frequency']);
    $number = mysqli_real_escape_string($con, $_POST['animalnumber']);
    $recdate = date("Y-m-d");
    $recby = $_SESSION['full_names'];

	
	if($feed_type=='Total Mixed Ratio'){
		$quantity=($dailylevel+$hay+$silage);
	}
	$feed_type=$feed_type.'(Hay:'.$hay.',Silage:'.$silage.'Daily Level:'.$dailylevel.')';
$dailytotqty=($quantity*$frequency*$number);


    //capturing the registrar of the data
    $entered_by =   $_SESSION['full_names'];
    $time =         date("Y-m-d H:i:s");
    $action =       "Entered  Feeding records for".$class;

?>
<!--<script>alert('this is farm <?php echo $farm;?>')</script>-->
<?php 


//echo '<<h1>THIS IS FARM $farm</h1>';
    //checking if the member was already paid
    if(mysqli_num_rows(mysqli_query($con,"select * from animal_feeding where animalclass='$class' and fdate='$date' and farm_id ='$farm' "))>0){

        echo "<script>alert('These Feeding Records were already Taken');</script>";
    }else{
        $insert_record = mysqli_query($con,"INSERT INTO animal_feeding (daily_tot_qty,farm_id,fdate, animalclass, feedtype, quantityfed, frequency, numberofanimals,recby,recdate) 
                                                VALUES ('$dailytotqty','$farm','$date', '$class', '$feed_type', '$quantity', '$frequency', '$number','$recby','$recdate');");
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
        <?php include 'admin-nav.php';?>
    </nav>
    <!-- End Top Navigation -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <div class="navbar-default sidebar" role="navigation">
        <?php include 'admin-sidebar.php';?>
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
  </h4> </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                    <a href="javascript: void(0);" "></a>
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
                       <form method="POST" action="">
			
               
       


	
<div class="form-group">
                                     <div class="input-group">
                                         <div class="input-group-addon">
                                             <i class="glyphicon glyphicon-date"></i>
											 Payment Mode:
                                         </div>
			<select name="pmode" class="form-control pmode" required>
			<option value="">Select Mode</option>
			<option value="bank">Bank</option>
			<!--<option value="Sacco">Sacco</option>-->
			
			<option value="mobile">Mobile Money</option>
               </select>
            </div>
			
        </div>
		<div  id="response">
			
			
			</div>
			 
                 
                      <button class="btn btn-lg btn-block btn-primary" id="daterange-btn" name="add" type="submit"  tabindex="7">
                        SAVE
                      </button>
					  <button class="btn btn-lg btn-block" id="daterange-btn" type="reset"  tabindex="8">
                        <a href="cancel.php?cid=<?php echo $cid ?>">Cancel </a>
                      </button>
              
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
  
      $("#cash").click(function(){
          $("#tendered").show('slow');
          $("#change").show('slow');
      });

    $(function() {

      $(".btn_delete").click(function(){
      var element = $(this);
      var id = element.attr("id");
      var dataString = 'id=' + id;
      if(confirm("Sure you want to delete this item?"))
      {
	$.ajax({
	type: "GET",
	url: "temp_trans_del.php",
	data: dataString,
	success: function(){
		
	      }
	  });
	  
	  $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
	  .animate({ opacity: "hide" }, "slow");
      }
      return false;
      });

      });
    </script>
	
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,x`
          "info": true,
          "autoWidth": false
        });
      });
    </script>
     <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment()
            },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>
<!--Style Switcher -->
<script src="plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
