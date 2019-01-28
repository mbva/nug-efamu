<!DOCTYPE html>
<html lang="en">

<head>
<?php include 'head.php';?>

</head>
<?php 
include 'db.php';

$animal_id = $_GET['animal_id'];
$id = $_GET['id'];
$detail = mysqli_fetch_array(mysqli_query($con,"select v.*, a.*  from vaccination v,animal_registration a where v.animal_id='$animal_id' and v.id='$id'and v.animal_id = a.animal_id"))

?>
<?php 
$farm = $_SESSION['farm'];
if(isset($_POST['submit'])){
    $animal_id = mysqli_real_escape_string($con,        ucwords($_POST['animal_id']));
    $id = mysqli_real_escape_string($con,        ucwords($_POST['id']));
    $dov = mysqli_real_escape_string($con,          ucwords($_POST['dow']));
    $vaccine = mysqli_real_escape_string($con,          ucwords($_POST['vaccine']));
    $roa = mysqli_real_escape_string($con,          ucwords($_POST['roa']));
    $doctor = mysqli_real_escape_string($con,          ucwords($_POST['doctor']));

        $update = mysqli_query($con,"update vaccination set date_of_vaccination='$dov',vaccine='$vaccine',route_of_admin='$roa',vet_doctor='$doctor' where animal_id='$animal_id' and id='$id'");
        //Executing the queries;
        $insert_deworm = mysqli_query($con,"insert into transaction_logs(farm_id,transaction_action,transaction_time,transaction_by) VALUES ('$farm','$action','$time','$entered_by')");

		if(!$update){
			die('NOT UPDATED'.mysql_error());
		}else{
			?>
			<script>alert("SUCESSFULY UPDATED");</script>
		<script>window.location='view-vaccination-records';</script>
		<?php 
		}
}
			
?>
<body>

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
           <?php include('nav.php');
		   ?>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3> </div>
                <?php  $active='animal';
				include('sidebar.php');
				?>
            </div>
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
                        <h4 class="page-title">Animal Records</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                       
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Animals</a></li>
                            <li class="active">Edit Animals</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
					<div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Edit Animal Details</h3>
                            
                            <form action="" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="basic-login-inner">
                                                <div class="form-group-inner">
                                                    <label>Vaccination Date </label>
                                                    <input type="text" readonly value="<?=$detail['date_of_vaccination'] ?>" class="form-control" name="dow"/>
                                                </div>
                                                <div class="form-group-inner">
                                                    <label>Animal </label>
                                                    <input type="text" readonly value="<?=$detail['animal_name']." (".$detail['tagNo'].")" ?>" class="form-control" name="animal_name"/>
                                                    <input type="hidden" value="<?=$detail['animal_id'] ?>" class="form-control" name="animal_id"/>
                                                    <input type="hidden" value="<?=$detail['id'] ?>" class="form-control" name="id"/>

                                                </div>
                                                     <div class="form-group">
                                        <label for="exampleInputuname">Vaccine </label>
                                        <div class="input-group">
                                            <select class="form-control select2" name="vaccine" required>
                                                <option>Select</option>
                                                <?php
                                                $select = mysqli_query($con,"select * from manage_vaccines where farm_id ='$farm'");
                                                while ($vaccine = mysqli_fetch_array($select)){
                                                    ?>
                                                    <option value="<?php echo $vaccine['vaccine']; ?>"><?php echo $vaccine['vaccine']; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                            <?php
                                            ?>
                                            <div class="input-group-addon"><i class="ti-pencil"></i></div>
                                        </div>
                                    </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="basic-login-inner">


                                            </div>
                                             <div class="form-group">
                                        <label for="exampleInputuname">Route of administering  </label>
                                        <div class="input-group">
                                            <select class="form-control select2" name="roa" required>
                                                <option>Select</option>
                                                <option value="Sublingual">Sublingual</option>
                                                <option value="Rectal">Rectal</option>
                                                <option value="Topical">Topical</option>
                                                <option value="Parenteral">Parenteral</option>
                                                <option value="Intravenous Injection">Intravenous Injection</option>
                                            </select>
                                            <?php
                                            ?>
                                            <div class="input-group-addon"><i class="ti-pencil"></i></div>
                                        </div>
                                    </div>
                                            <div class="form-group-inner">
                                                <label>Vet Doctor  </label>
                                                <input type="text" readonly value="<?=$detail['vet_doctor'] ?>" class="form-control" name="doctor"/>
                                            </div>
                                            <div class="login-btn-inner">
                                                <div class="inline-remember-me" style="text-align: center">
                                                    <button class="btn btn-lg btn-primary login-submit-cs" name="submit" type="submit">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                            </div>
                            </form>
                    </div>
                  
             
                    </div>
                </div>
				<?php 
				if(isset($_POST['submit'])){
    $farm_id = mysqli_real_escape_string($con,    ucwords($_POST['farm_id']));
    $animal_id = mysqli_real_escape_string($con,    ucwords($_POST['animal_id']));
    $tagNo = mysqli_real_escape_string($con,    ucwords($_POST['tag']));
	$animalname = mysqli_real_escape_string($con,    ucwords($_POST['names']));
    $gender = mysqli_real_escape_string($con,  $_POST['gender']);
    $breed = mysqli_real_escape_string($con, $_POST['breed']);
    $dob = mysqli_real_escape_string($con, $_POST['dob']);
    $location = mysqli_real_escape_string($con, $_POST['location']);
    $genetic_percentage = mysqli_real_escape_string($con, $_POST['genetic_percentage']);
    $name_of_sire = mysqli_real_escape_string($con, $_POST['name_of_sire']);
    $breed_of_sire = mysqli_real_escape_string($con, $_POST['breed_of_sire']);
    $name_of_dam = mysqli_real_escape_string($con, $_POST['name_of_dam']);
    $breed_of_dam = mysqli_real_escape_string($con, $_POST['breed_of_dam']);

    //capturing the registrar of the data
    $entered_by =   $_SESSION['full_names'];
    $time =         date("Y-m-d H:i:s");
    $action =       "Edited animal ".' '.$animal_id;

    $update = mysqli_query($con,"update animal_registration set animal_name='$animalname', tagNo='$tagNo' gender='$gender', breed='$breed',dob='$dob',location='$location',genetic_percentage='$genetic_percentage',name_of_sire='$name_of_sire',name_of_dam='$name_of_dam',breed_of_sire='$breed_of_sire',breed_of_dam='$breed_of_dam' where farm_id = '$farm_id' and animal_id = '$animal_id'");
    //$sql_log  =  mysqli_query($con,"insert into transaction_logs(farm_id,transaction_action,transaction_time,transaction_by) VALUES ('$farm','$action','$time','$entered_by')");
    //Executing the queries;
 if(!$update){
	 die("not".mysqli_error($con));
 }
    else{
        header("location:view-animal-registration");
    }
   
}
?>
                
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- /.container-fluid -->
           <?php include('footer.php');?>
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
    <script src="plugins/bower_components/datatables/datatables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script>
    $(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary m-r-10');
    </script>
    <!--Style Switcher -->
    <script src="plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
