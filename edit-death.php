<!DOCTYPE html>
<html lang="en">

<head>
<?php include 'head.php';?>

</head>
<?php
$animal_id = $_GET['animal_id'];
$id = $_GET['id'];
$details = mysqli_fetch_array(mysqli_query($con,"select a.*,c.* from animal_registration a, death c where  c.animal_id ='$animal_id' and c.id='$id' "));


$farm = $_SESSION['farm'];
if(isset($_POST['submit'])){
    $animal_id = mysqli_real_escape_string($con,        ucwords($_POST['animal_id']));
    $id = mysqli_real_escape_string($con,        ucwords($_POST['id']));
    $doc = mysqli_real_escape_string($con,          ucwords($_POST['cdate']));
    $reason = mysqli_real_escape_string($con,          ucwords($_POST['reason']));
    $comment = mysqli_real_escape_string($con,          ucwords($_POST['comment']));
    //capturing the registrar of the data
    $entered_by =   $_SESSION['full_names'];
    $time =         date("Y-m-d H:i:s");
    $action =       "Entered death records of ".' '.$animal_id;
        $update = mysqli_query($con,"update death set date_of_death='$doc',reason='$reason',comment='$comment' where animal_id='$animal_id' and id='$id'");
        //inserting the log
    ?>
<script>location='view-deathrecord';</script>
<?php
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
                        <h4 class="page-title">Death Records</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                       
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Settings</a></li>
                            <li class="active">Edit Death</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
					<div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Edit Death Details</h3>
                            
                         <form action="" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                       <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                            <div class="basic-login-inner">

                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                            <div class="basic-login-inner">
                                                <div class="form-group-inner">
                                                    <label>death Date </label>
                                                    <input type="date" readonly value="<?=$details['date_of_death'];?>" class="form-control" name="cdate" />
                                                </div>
                                                <div class="form-group-inner">
                                                    <label> Animal</label>
                                                    <input type="text" readonly value="<?php
                                                    $aname = mysqli_fetch_array(mysqli_query($con,"select * from animal_registration where animal_id='$animal_id'"));
                                                    echo  $aname['animal_name']." (".$aname['tagNo'].")";?>" class="form-control" name="" id="datepicker" />
                                                    <input type="hidden" value="<?=$details['id'];?>" class="form-control" name="id" />
                                                    <input type="hidden" value="<?=$details['animal_id'];?>" class="form-control" name="animal_id" />
                                                </div>

                                                <div class="form-group-inner">
                                                    <label>Reason </label>
                                                    <input type="text" name="reason" value="<?=$details['reason'];?>" required autocomplete="off" class="form-control" placeholder="Reason of death " />
                                                </div>

                                                <div class="form-group-inner">
                                                    <label>Comment </label>
                                                    <input type="text" name="comment" value="<?=$details['comment'];?>" required autocomplete="off" class="form-control"/>
                                                </div>

                                                <div class="login-btn-inner">
                                                    <div class="inline-remember-me" style="text-align: center">
                                                        <button class="btn btn-lg btn-primary login-submit-cs" name="submit" type="submit">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                            <div class="basic-login-inner">

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
