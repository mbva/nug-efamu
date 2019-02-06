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
                    <h4 class="page-title">Graphical representation of milk Sales</h4> </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                    <a href="javascript: void(0);" "></a>
                    <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Health</a></li>
                        <li><a href="#">Vaccination</a></li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!--.row-->
            <div class="row">
                <script>
                    window.onload = function () {

                        var chart = new CanvasJS.Chart("chartContainer", {
                            animationEnabled: true,
                            exportEnabled: true,
                            title:{
                                text: "Variations in Milk Production and Sales (<?php
                                    if(isset($_POST['submit'])){
                                        $date = $_POST['date'];
                                        // $d = date_parse_from_format("Y-m-d", $date);
                                        $m =  date("F", strtotime($date));
                                        $y =  date("Y", strtotime($date));
                                        echo $m."-".$y;
                                    }else{
                                        $date = date("Y-m-d");
                                        // $d = date_parse_from_format("Y-m-d", $date);
                                        $m =  date("F", strtotime($date));
                                        $y =  date("Y", strtotime($date));
                                        echo $m."-".$y;
                                    }
                                    ?>)"
                            },
                            axisY:{
                                title: "Quantity of Milk in Litres"
                            },
                            toolTip: {
                                shared: true
                            },
                            legend:{
                                cursor:"pointer",
                                itemclick: toggleDataSeries
                            },
                            data: [
                                {
                                    type: "spline",
                                    name: "Milk Sold",
                                    showInLegend: true,
                                    dataPoints: [
                                        <?php
                                        include 'db.php';

                                        if(isset($_POST['submit'])){
                                        $date_from = $_POST['date'];
                                        $date_from2=$date_from;
                                        //echo "<h2> datefrom $date_from2 </h2>";
                                        $month = date("m");
                                        $sno = 0;
                                        //$date_from = date("Y-m-01");
                                        //$date_from = "2018-10-01";
                                        //$date_to = date ("Y-m-d", strtotime("+30 day", strtotime($date_from)));

                                        for($i=1;$i<=31;$i++){
                                        $select =mysqli_query($con,"select sum(qty) as quantity , solddate from milksales where solddate = '$date_from' and farm_id ='$farm'");
                                        $result = mysqli_fetch_array($select);
                                        $qty_sold = $result['quantity'];
                                        $sno++;
                                        $y_axis_value  = "Day".$sno;
                                        ?>
                                        { label: "<?=$result['solddate']?>" , y: <?=number_format($qty_sold);?> },
                                        <?php
                                        $date_from = date ("Y-m-d", strtotime("+1 day", strtotime($date_from)));
                                        }

                                        }else{
                                        $month = date("m");
                                        $sno = 0;
                                        $date_from = date("Y-m-01");

                                        //echo "<h1>moon $month <h1>";
                                        //$date_from = "2018-10-01";
                                        //$date_to = date ("Y-m-d", strtotime("+30 day", strtotime($date_from)));

                                        for($i=1;$i<=31;$i++){
                                        $select =mysqli_query($con,"select sum(qty) as quantity , solddate from milksales where solddate = '$date_from' and farm_id ='$farm'");
                                        $result = mysqli_fetch_array($select);
                                        $qty_sold = $result['quantity'];
                                        $sno++;
                                        $y_axis_value  = "Day".$sno;
                                        ?>
                                        { label: "<?=$result['solddate']?>" , y: <?=number_format($qty_sold);?> },
                                        <?php
                                        $date_from = date ("Y-m-d", strtotime("+1 day", strtotime($date_from)));
                                        }
                                        }
                                        ?>
                                    ]
                                },
                                {
                                    type: "spline",
                                    name: "Milk Produced",
                                    showInLegend: true,
                                    dataPoints: [
                                        <?php
                                        include 'db.php';

                                        if(isset($_POST['submit'])){
                                        $date_from = $_POST['date'];
                                        $month = date("m");
                                        $sno = 0;
                                        //$date_from = date("Y-m-01");
                                        //$date_from = "2018-10-01";
                                        //$date_to = date ("Y-m-d", strtotime("+30 day", strtotime($date_from)));

                                        for($i=1;$i<=31;$i++){
                                        $select =mysqli_query($con,"select sum(quantity) as quantity , mdate from milkyield where mdate = '$date_from' and farm_id ='$farm'");
                                        $result = mysqli_fetch_array($select);
                                        $qty = $result['quantity'];
                                        $sno++;
                                        $y_axis_value  = "Day".$sno;
                                        ?>
                                        { label: "<?=$result['mdate']?>" , y: <?=number_format($qty);?> },
                                        <?php
                                        $date_from = date ("Y-m-d", strtotime("+1 day", strtotime($date_from)));
                                        }

                                        }else{
                                        $month = date("m");
                                        $sno = 0;
                                        $date_from = date("Y-m-01");
                                        //$date_from = "2018-10-01";
                                        //$date_to = date ("Y-m-d", strtotime("+30 day", strtotime($date_from)));

                                        for($i=1;$i<=31;$i++){
                                        $select =mysqli_query($con,"select sum(quantity) as quantity , mdate from milkyield where mdate = '$date_from' and farm_id ='$farm'");
                                        $result = mysqli_fetch_array($select);
                                        $qty = $result['quantity'];
                                        $sno++;
                                        $y_axis_value  = "Day".$sno;
                                        ?>
                                        { label: "<?=$result['mdate']?>" , y: <?=number_format($qty);?> },
                                        <?php
                                        $date_from = date ("Y-m-d", strtotime("+1 day", strtotime($date_from)));
                                        }
                                        }
                                        ?>
                                    ]
                                }
                            ]
                        });

                        chart.render();

                        function toggleDataSeries(e) {
                            if(typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                                e.dataSeries.visible = false;
                            }
                            else {
                                e.dataSeries.visible = true;
                            }
                            chart.render();
                        }

                    }
                </script>

                <div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
                <script src="charts/canvasjs.min.js"></script>
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
