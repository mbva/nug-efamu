<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <title>Efamu </title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="plugins/bower_components/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Menu CSS -->
    <link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/megna-dark.css" id="theme" rel="stylesheet">

	 <link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <link href="plugins/bower_components/tablesaw-master/dist/tablesaw.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

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
           <?php include('topnav.php');
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
                <?php
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
                            <li class="active">View Animals</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
					<div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Data Table</h3>
                            <p class="text-muted m-b-30">Data table example</p>
                            <div class="table-responsive">
							 
                              <table id="example23" class="myTable table table-responsive color-table info-table display nowrap table table-hover table-striped" cellspacing="0" width="100%">
                                    <thead>
                                         <tr>
                                        <th  >ID</th>
                                        <th  >TagNo</th>
                                        <th >Name</th>
                                        <th >Gender</th>
                                        <th >DOB</th>
                                        <th >Breed</th>
                                        <th >Premise</th>
                                        <th >Genetic Percentage</th>
                                        <th >Dam Name</th>
                                        <th >Breed</th>
                                        <th >Sire Name</th>
                                        <th >Breed</th>
                                        <th >Profile</th>
                                       
                                            <th >Action</th>
                                
                                       
                                            <th >Action</th>
                                      
                                    </tr>
                                    </thead>
                                    <tfoot>
                                         <tr>
                                        <th  >ID</th>
                                        <th  >TagNo</th>
                                        <th >Name</th>
                                        <th >Gender</th>
                                        <th >DOB</th>
                                        <th >Breed</th>
                                        <th >Premise</th>
                                        <th >Genetic Percentage</th>
                                        <th >Dam Name</th>
                                        <th >Breed</th>
                                        <th >Sire Name</th>
                                        <th >Breed</th>
                                        <th >Profile</th>
                                       
                                            <th >Action</th>
                                
                                       
                                            <th >Action</th>
                                      
                                    </tr>
                                    </tfoot>
                                    <tbody>
									                                    <?php
                                    include 'db.php';
                                    $select = mysqli_query($con,"select * from animal_registration where status ='Present'");
                                    $sno = 0;
                                    while($results = mysqli_fetch_array($select)) {
                                        $sno++
                                        ?>
                                        <tr><input type="hidden" id="id" name="id" value="<?=$results['animal_id'];?>">
                                                <td><?=$sno;?></td>
                                                <td><?=$results['tagNo'];?></td>
                                                <td><?=$results['animal_name'];?></td>
                                                <td><?=$results['gender'];?></td>
                                                <td><?=$results['dob'];?></td>
                                                <td><?=$results['breed'];?></td>
                                                <td><?=$results['location'];?></td>
                                                <td><?=$results['genetic_percentage'];?></td>
                                                <td><?=$results['name_of_dam'];?></td>
                                                <td><?=$results['breed_of_dam'];?></td>
                                                <td><?=$results['name_of_sire'];?></td>
                                                <td><?=$results['breed_of_sire'];?></td>
                                                <td><a href="animal-profile?tagNo=<?=$results['tagNo'];?>" class="btn btn-warning"><i class="fa fa-eye-slash fa-1x"></a></i></a></td>
                                                <td><a  style="color: white" class="btn btn-success" href="edit-animals?animalid=<?=$results['animal_id'];?>&&farm_id=<?=$results['farm_id'];?>"><i class="fa fa-edit fa-1x"></a></i></td>
                                                <td><a  style="color: white" class="btn btn-danger" onclick="return deleted()" href=""><i class="fa fa-trash fa-1x"></a></i></td>



                                            </tr>
                                        <?php

                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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