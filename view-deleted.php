<!DOCTYPE html>
<html lang="en">

<head>
<?php include 'head.php';?>

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
                <?php  $active='r-bin';
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
                        <h4 class="page-title">Recycle Bin</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                       
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Recycle Bin</a></li>
                            <li class="active">View Recycle Bin</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
					<div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Recycle Bin</h3>
							    <div class="row">
                                <div class="col-md-6">
                                </div>
                                <div class="col-md-12">
                                    <div class="main-sparkline10-hd">
                                        <h3 style="color:red">Select Date Range and Category</h3>
                                    </div>
                                    <div class="basic-login-form-ad">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="basic-login-inner inline-basic-form">
                                                    <form action="" method="post">
                                                        <div class="form-group-inner">
														
                                                            <div class="row">
															 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
																
                                                                    <div class="input-daterange input-group" >
                                                                        <input  required type="date" class="form-control" name="sdate" id="datepicker"  />
                                                                        <span class="input-group-addon">to</span>
                                                                        <input required type="date" class="form-control" name="tdate" id="datepicker"  />
                                                                    </div>
                                                                </div>
															
                                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									
                                                                    <div class="input-daterange input-group" >
                                                                        
                                                    <select name="category" required data-placeholder="Choose a tag" class="form-control" tabindex="-1" required>
                                                        <option value="" selected >Select Category</option>
														<option value="all">All Categories</option>
                                                        <?php
                                                        $select = mysqli_query($con,"select distinct category  from deleted ");
                                                        while ($details = mysqli_fetch_array($select)){
                                                            ?>

															 <option value="<?php echo $details['category']; ?>"><?php echo $details['category']; ?></option>
															 
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                    <div class="login-btn-inner">
                                                                        
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <button style="float: right" name="submit" class="btn btn-sm btn-primary login-submit-cs" type="submit">Search</button>
                                                                            </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<br>
                            
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
                                       
                                        
                                        <th data-editable="true">Date</th>
										<th data-editable="true">Name</th>
                                        <th data-editable="true">Category</th>
                                      <th data-editable="true">Description</th>
                                        <th data-editable="true">Deleted By</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                     <?php
                                    include 'db.php';
                                    if(isset($_POST['submit'])){
                                        $today = date("Y-m-d");
                                        $date_to             = $_POST['tdate'];
                                        $date_from           = $_POST['sdate'];
										 $cat          = $_POST['category'];
										if ($cat ='all'){

                                        $select = mysqli_query($con,"select * from deleted  where delete_date BETWEEN '$date_from' AND '$date_to' and farm_id ='$farm'");
										}
										else {
											  $select = mysqli_query($con,"select * from deleted  where delete_date BETWEEN '$date_from' AND '$date_to' and farm_id ='$farm' and category='$cat'");
										}
									}
									 else{
                                        $current_month = date("m");
                                        //$current_month = 10;
                                       
										 $select = mysqli_query($con,"select * from deleted  where MONTH(delete_date)='$current_month' and farm_id ='$farm' ");
									 }
										$sno = 0;
										
                                        while($results = mysqli_fetch_array($select)){
                                            $sno++
                                            ?>

                                            <tr>
                                                    <input type="hidden" id="id" name="id" value="<?=$results['id'];?>">
                                                    <td><?=$sno;?></td>
                                                    <td><?=$results['delete_date'];?></td>
                                                    <td><?=$results['name'];?></td>
                                                    <td><?=$results['category'];?></td>
                                                    <td><?=$results['description'];?></td>
                                                    <td><?=$results['Deleted_by'];?></td>
                                                    
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
