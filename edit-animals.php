<!DOCTYPE html>
<html lang="en">

<head>
<?php include 'head.php';?>

</head>
<?php 
include 'db.php';
$animal_id= $_GET['animalid'];
$farm_id  = $_GET['farm_id'];
$details = mysqli_fetch_array(mysqli_query($con,"select * from animal_registration where farm_id ='$farm_id' and animal_id='$animal_id'"));
if(!$details){
    echo mysqli_error($con);
}?>




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
				<?php 
				include "db.php";
/*if(isset($_POST['submit'])){
	?>
	<h1>YES HERE I REACH</h1>
	<?php 
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
 echo $farm_id ;
    echo $animal_id; 
    $update = mysqli_query($con,"UPDATE animal_registration SET tagNo='$tagNo',animal_name='$animalname',gender='$gender',breed='$breed',dob='$dob',location='$location',
	genetic_percentage='$genetic_percentage',name_of_dam='$name_of_dam',breed_of_dam='$name_of_dam',name_of_sire='$name_of_sire',breed_of_sire='$breed_of_sire', where animal_id = '$animal_id'");
    //$sql_log  =  mysqli_query($con,"insert into transaction_logs(farm_id,transaction_action,transaction_time,transaction_by) VALUES ('$farm','$action','$time','$entered_by')");
    //Executing the queries;
if(!$update){
	die("not updated".mysql_error());
}
	else{
		Echo "<h1>SUCCESS</H1>";
  
}
}*/
?>
					<div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Edit Animal Details</h3>
                            
                           <form action="edit_animal" method="post" enctype="multipart/form-data">
                                    
                        <div class="row">
                            <div class="col-sm-4 col-xs-12">

                                    <div class="form-group">
                                        <label for="exampleInputuname">Animal Name </label>
                                        <div class="input-group">
                                            <input type="text" value="<?=$details['animal_name']?>" name="names"   class="form-control" />
                                                    <input type="hidden" value="<?=$details['farm_id']?>" name="farm_id"   class="form-control" />
                                                    <input type="hidden" value="<?=$details['animal_id']?>" name="animal_id"   class="form-control" />
                                            <div class="input-group-addon"><i class="ti-user"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">TagNo</label>
                                        <div class="input-group">
                                             <input type="text" value="<?=$details['tagNo']?>" name="tag"   class="form-control" />
                                            <div class="input-group-addon"><i class="ti-email"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputphone">Gender</label>
                                        <div class="input-group">
                                        <select class="form-control select2" name="gender" required>
                                            <option value="<?=$details['gender']?>"><?=$details['gender']?></option>
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
                                                <option value="<?=$details['breed']?>"><?=$details['breed']?></option>
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
                                        <input type="date" value="<?=$details['dob']?>" name="dob"   class="form-control" />
                                         <span class="input-group-addon"><i class="icon-calender"></i></span>
                                    </div>
                                </div>
                                    <div class="form-group">
                                        <label for="exampleInputuname">On Premise </label>
                                        <div class="input-group">
                                            <select class="form-control select2" name="location" required>
                                                <option value="<?=$details['location']?>"><?=$details['location']?></option>
                                                        <option value="On">Yes</option>
                                                        <option value="Off">No</option>
                                            </select>
                                            <div class="input-group-addon"><i class="ti-location-arrow"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Genetic Percentage</label>
                                        <div class="input-group">
                                            <input class="form-control" value="<?=$details['genetic_percentage'];?>" name="genetic_percentage" required autocomplete="off" placeholder="Genetic percentage" type="text" min="50" title="Value must be 50 and ABove" name="demo3">
                                            <div class="input-group-addon"><i class="ti-email"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputphone">Name of Sire </label>
                                        <div class="input-group">
                                            <input type="text" value="<?=$details['name_of_sire'];?>" name="name_of_sire"  required autocomplete="off" class="form-control" placeholder="Name of Sire:" />
                                            <div class="input-group-addon"><i class="ti-mobile"></i></div>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputpwd1">Breed of Sire </label>
                                    <div class="input-group">
                                       <input type="text"  name="breed_of_sire"  value="<?=$details['breed_of_sire'];?>" required autocomplete="off" class="form-control" placeholder="Breed of Sire:" />
                                        <div class="input-group-addon"><i class="ti-lock"></i></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputpwd2">Name of Dam </label>
                                    <div class="input-group">
                                        <input type="text"  name="name_of_dam" value="<?=$details['name_of_dam'];?>" required autocomplete="off" class="form-control" placeholder="Name of Dam:" />
                                        <div class="input-group-addon"><i class="ti-lock"></i></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputpwd2">Breed of Dam </label>
                                    <div class="input-group">
                                        <input type="text" value="<?=$details['breed_of_dam'];?>"  name="breed_of_dam"  required autocomplete="off" class="form-control" placeholder="Breed of Dam:" />
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
                </div>
				
                
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
