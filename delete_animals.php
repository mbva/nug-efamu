<!doctype html>
<html class="no-js" lang="">

<head>
    <?php include 'head.php';?>

	<script>
	var txt;
var r = confirm("Are you sure you want to delete?");
if (r == true) {
  txt = "";
} else {
window(location="view-animal-registration");
}
</script>

</head>
<?php
include 'db.php';
$animal_id= $_GET['animalid'];
$farm_id  = $_GET['farm_id'];
 $entered_by =   $_SESSION['full_names'];
    $time =         date("Y-m-d H:i:s");
    $action =       "Deleted animal ".' '.$animal_id;
     $select = mysqli_query($con,"select * from animal_registration where status ='Present' and animal_id= '$animal_id'  and farm_id='$farm_id'");
                                   
									if(! $select){
			die("not selected".mysqli_error($con));
		} 
		else{
                                    while($results = mysqli_fetch_array($select)) {
										$farms=$results['farm_id'];
										$animal_id=$results['animal_id'];
										$dname=$results['animal_name'];
										$describe=$results['tagNo'];
									$category="Animals";
									}
		}
										
       $deletion_record=mysqli_query($con,"insert into deleted (name,description,category,farm_id,delete_date,deleted_by) VALUES('$dname','$describe','$category','$farm_id',NOW(),'$entered_by')");                          
        if(!$deletion_record){
			die("not deleted".mysqli_error($con));
		} 
		else{
    
	$delete = mysqli_query($con,"delete From animal_registration where animal_id='$animal_id' and farm_id = '$farm_id'");
    $sql_log  =  mysqli_query($con,"insert into transaction_logs(farm_id,transaction_action,transaction_time,transaction_by) VALUES ('$farm','$action','$time','$entered_by')");
    //Executing the queries;
 if(!$delete){
	 die("noy".mysqli_error($con));
 }
    else if($delete ){?>
<
	 <script> alert('Animal Deleted Successfuly');</script>

     <script>window(location="view-animal-registration");</script>
	 
	 <?php 
    }

}

?>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="left-sidebar-pro">
    <?php include 'side-menu.php';?>
</div>
<!-- Start Welcome area -->
<div class="all-content-wrapper">
    <?php $page_title = "Edit Animals";?>
    <?php include 'top-header.php';?>
    <!-- Advanced Form Start -->
    <div class="advanced-form-area mg-tb-15">
        <div class="container-fluid">

                    <div class="sparkline8-list mt-b-30">

                        <div class="sparkline8-graph">
                          
                        </div>
                    </div>

        </div>
    </div>
    <!-- Advanced Form End-->
    <div class="footer-copyright-area">
        <?php include 'footer.php';?>
    </div>
</div>

<!-- jquery
    ============================================ -->
<script src="js/vendor/jquery-1.11.3.min.js"></script>
<!-- bootstrap JS
    ============================================ -->
<script src="js/bootstrap.min.js"></script>
<!-- wow JS
    ============================================ -->
<script src="js/wow.min.js"></script>
<!-- price-slider JS
    ============================================ -->
<script src="js/jquery-price-slider.js"></script>
<!-- meanmenu JS
    ============================================ -->
<script src="js/jquery.meanmenu.js"></script>
<!-- owl.carousel JS
    ============================================ -->
<script src="js/owl.carousel.min.js"></script>
<!-- sticky JS
    ============================================ -->
<script src="js/jquery.sticky.js"></script>
<!-- scrollUp JS
    ============================================ -->
<script src="js/jquery.scrollUp.min.js"></script>
<!-- mCustomScrollbar JS
    ============================================ -->
<script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/scrollbar/mCustomScrollbar-active.js"></script>
<!-- metisMenu JS
    ============================================ -->
<script src="js/metisMenu/metisMenu.min.js"></script>
<script src="js/metisMenu/metisMenu-active.js"></script>
<!-- touchspin JS
    ============================================ -->
<script src="js/touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="js/touchspin/touchspin-active.js"></script>
<!-- colorpicker JS
    ============================================ -->
<script src="js/colorpicker/jquery.spectrum.min.js"></script>
<script src="js/colorpicker/color-picker-active.js"></script>
<!-- datapicker JS
    ============================================ -->
<script src="js/datapicker/bootstrap-datepicker.js"></script>
<script src="js/datapicker/datepicker-active.js"></script>
<!-- input-mask JS
    ============================================ -->
<script src="js/input-mask/jasny-bootstrap.min.js"></script>
<!-- chosen JS
    ============================================ -->
<script src="js/chosen/chosen.jquery.js"></script>
<script src="js/chosen/chosen-active.js"></script>
<!-- select2 JS
    ============================================ -->
<script src="js/select2/select2.full.min.js"></script>
<script src="js/select2/select2-active.js"></script>
<!-- ionRangeSlider JS
    ============================================ -->
<script src="js/ionRangeSlider/ion.rangeSlider.min.js"></script>
<script src="js/ionRangeSlider/ion.rangeSlider.active.js"></script>
<!-- rangle-slider JS
    ============================================ -->
<script src="js/rangle-slider/jquery-ui-1.10.4.custom.min.js"></script>
<script src="js/rangle-slider/jquery-ui-touch-punch.min.js"></script>
<script src="js/rangle-slider/rangle-active.js"></script>
<!-- knob JS
    ============================================ -->
<script src="js/knob/jquery.knob.js"></script>
<script src="js/knob/knob-active.js"></script>
<!-- tab JS
    ============================================ -->
<script src="js/tab.js"></script>
<!-- plugins JS
    ============================================ -->
<script src="js/plugins.js"></script>
<!-- main JS
    ============================================ -->
<script src="js/main.js"></script>

<!-- notification JS
       ============================================ -->
<script src="js/notifications/Lobibox.js"></script>
<script src="js/notifications/notification-active.js"></script>
</body>

</html>