<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head.php';
    $active='finance';?>
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
                    <h4 class="page-title">
                        Milk Sales Records
                    </h4>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">


                    <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Finance</a></li>
                        <li class="active">Milk Sales Records</li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">

                        <div class="row">
                            <div class="col-md-4"> <h3 class="box-title m-b-0">Milk Sales Records</h3></div>
                            <div class="col-md-8">
                                <form action="" method="post">
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="input-daterange input-group" >
                                                    <input type="date" class="form-control" name="sdate" id="datepicker"  />
                                                    <span class="input-group-addon">to</span>
                                                    <input type="date" class="form-control" name="tdate" id="datepicker"  />
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="login-btn-inner">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <button style="float: right" name="submit" class="btn btn-sm btn-primary login-submit-cs" type="submit">Search</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive">

                            <table id="example23" class="myTable table table-responsive color-table info-table display nowrap table table-hover table-striped" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th><?php
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
                                    <th>Date</th>
                                    <th>Quantity</th>
                                    <th>Amount</th>
                                    <th>Sold By</th>
                                    <?php if($updaten==1){?>
                                        <th >Action</th>
                                    <?php } if($deleten==1){?>
                                        <th >Action</th>
                                    <?php }?>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                include 'db.php';

                                if(isset($_POST['submit'])){
                                    $today = date("Y-m-d");
                                    $date_to             = $_POST['tdate'];
                                    $date_from           = $_POST['sdate'];

                                    $select = mysqli_query($con,"select * from milksales where solddate >= '$date_from' AND solddate<='$date_to' and farm_id ='$farm'");

                                }else{
                                    $current_month = date("m");
                                    //$current_month = 10;
                                    $select = mysqli_query($con,"select * from milksales where MONTH (solddate)='$current_month' and farm_id ='$farm'");

                                }
                                $sno = 0;
                                $totalamount=0;
                                while($results = mysqli_fetch_array($select)){
                                    $totalamount=  $results['sp'];
                                    $mid=  $results['id'];
                                    $sno++;
                                    ?>
                                    <tr>
                                        <td><?=$sno;?></td>
                                        <td><input type="text" id="fname" name="tagno" value="<?=$results['solddate'];?>"></td>
                                        <td><input type="text" id="fname" name="aname" value="<?=$results['qty'];?>"></td>
                                        <td><input type="text" id="fname" name="gender" value="<?= "Shs ".number_format($results['sp']);?>"></td>
                                        <td><input type="text" id="fname" name="gender" value="<?= $results['soldby'];?>"></td>
                                        <?php if($updaten==1){?>
                                            <td><a  style="color: white" class="btn btn-success" href="edit-milksales?mid=<?=$results['id'];?>"><i class="fa fa-edit fa-1x"></a></i></td>
                                        <?php } if($deleten==1){?>
                                            <td><a  style="color: white" class="btn btn-danger" onclick="return deleted()" href=""><i class="fa fa-trash fa-1x"></a></i></td>
                                        <?php }?>
                                    </tr>
                                    <?php
                                }
                                ?>

                                </tbody>
                                <tfoot>
                                <tr style="background: indianred;color: white;">
                                    <th data-field="state" data-checkbox="false"></th>
                                    <th data-field="id">Summation</th>
                                    <th data-editable="true"></th>
                                    <th data-editable="true"></th>
                                    <th data-editable="true"><?="Shs. ".number_format($totalamount);?></th>
                                    <?php if($updaten==1){?>
                                        <th ></th>
                                    <?php } if($deleten==1){?>
                                        <th ></th>
                                    <?php }?>
                                </tr>
                                </tfoot>
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
