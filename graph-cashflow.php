<!DOCTYPE html>
<html lang="en">
<?php $active='reports';?>
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
                    <h4 class="page-title">Graphical Variations in Income and Expenses</h4> </div>
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

                <div class="col-md-8">
                    <form action="" method="post">
                        <div class="form-group-inner">
                            <div class="row">
                               <div class="graph-form" style="background: rebeccapurple;padding-left: 30%">
                                   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                       <div class="input-daterange input-group" >
                                           <select class="form-control select2" name="month">
                                               <option value="">**** Month****</option>
                                               <?php
                                               for($i=1;$i<13;$i++)
                                                   print("<option>".date('F',strtotime('01.'.$i.'.2001'))."</option>");
                                               ?>
                                           </select>
                                       </div>

                                   </div>
                                   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                       <div class="input-daterange input-group" >
                                           <select class="form-control select2" name="year">
                                               <option value="">**** Year****</option>
                                               <?php
                                               // Sets the top option to be the current year. (IE. the option that is chosen by default).
                                               $currently_selected = date('Y');
                                               // Year to start available options at
                                               $earliest_year = 1950;
                                               // Set your latest year you want in the range, in this case we use PHP to just set it to the current year.
                                               $latest_year = date('Y');
                                               // Loops over each int[year] from current year, back to the $earliest_year [1950]
                                               foreach ( range( $latest_year, $earliest_year ) as $i ) {
                                                   // Prints the option with the next year in range.
                                                   print '<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                                               };
                                               ?>
                                           </select>
                                       </div>
                                   </div>
                                   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
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
                        </div>
                    </form>
                </div>
            </div>
            <br>
            <br>
                            <div class="row">
                                <script>
                                    window.onload = function () {

                                        var chart = new CanvasJS.Chart("chartContainer", {
                                            animationEnabled: true,
                                            exportEnabled: true,
                                            title:{
                                                text: "Variations in Income and Expenses(<?php
                                                    if(isset($_POST['submit'])){
                                                       /* $date = $_POST['date'];
                                                        // $d = date_parse_from_format("Y-m-d", $date);
                                                        $m =  date("F", strtotime($date));
                                                        $y =  date("Y", strtotime($date));
                                                       */
                                                       $m = $_POST['month'];
                                                       $y = $_POST['year'];
                                                        echo $m."-".$y;
                                                    }else{
                                                        $date = date("Y-m-d");
                                                        // $d = date_parse_from_format("Y-m-d", $date);
                                                        $m =  date("F", strtotime($date));
                                                        $y =  date("Y", strtotime($date));
                                                        echo "Annually ".$y;
                                                    }
                                                    ?>)"
                                            },
                                            axisY:{
                                                title: "Amount (Shs)"
                                            },
                                            axisX:{
                                                title: "(<?php
                                                    if(isset($_POST['submit'])){
                                                        echo "Days of the Month";
                                                    }else{
                                                        echo "Months of the Year";
                                                    }
                                                    ?>)"
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
                                                    name: "Expenses",
                                                    showInLegend: true,
                                                    dataPoints: [
                                                        <?php
                                                        include 'db.php';
                                                        if(isset($_POST['submit'])){
                                                        $month = $_POST['month'];
                                                        $year = $_POST['year'];
                                                        $date_from = "$y-$m-01";
                                                        $sno = 0;

                                                        //$date_from = "2018-10-01";
                                                        //$date_to = date ("Y-m-d", strtotime("+30 day", strtotime($date_from)));
                                                        for($i=1;$i<=31;$i++){

                                                        //calculating incomes from milk sales
                                                        $select_expenses =mysqli_query($con,"select sum(totalcost) as totalexpenses from generalexpenses where receiptdate = '$date_from' and farm_id ='$farm'");
                                                        $mresults = mysqli_fetch_array($select_expenses);
                                                        $total_expenses = $mresults['totalexpenses']+0;

                                                        //formating the axis value
                                                        $x_axis_value = $i."/".date('F', strtotime($date_from));

                                                        ?>
                                                        { label: "<?=$x_axis_value?>" , y: <?=$total_expenses;?> },
                                                        <?php
                                                        $date_from = date ("Y-m-d", strtotime("+1 day", strtotime($date_from)));
                                                        }
                                                        }else{
                                                        $month = date("m");
                                                        $sno = 0;
                                                        $date_from = date("Y-m-01");
                                                        //$date_from = "2018-10-01";
                                                        //$date_to = date ("Y-m-d", strtotime("+30 day", strtotime($date_from)));


                                                        for($iM =1;$iM<=12;$iM++){
                                                        $month =  date("m", strtotime("$iM/12/10"));
                                                        $x_axis = date("M", strtotime("$iM/12/10"));
                                                        //calculating incomes from milk sales
                                                        $select =mysqli_query($con,"select sum(totalcost) as totalexpenses from generalexpenses where MONTH (receiptdate) = '$month' and farm_id ='$farm'");
                                                        $eresults = mysqli_fetch_array($select);
                                                        $total_expenses = $eresults['totalexpenses']+0;
                                                        ?>
                                                        { label: "<?=$x_axis?>" , y: <?=$total_expenses;?>},
                                                        <?php
                                                        }
                                                        }
                                                        ?>
                                                    ]
                                                },
                                                {
                                                    type: "spline",
                                                    name: "Income",
                                                    showInLegend: true,
                                                    dataPoints: [
                                                        <?php
                                                        include 'db.php';

                                                        if(isset($_POST['submit'])){
                                                        $month = $_POST['month'];
                                                        $year = $_POST['year'];
                                                        $date_from = "$y-$m-01";

                                                        for($i=1;$i<=31;$i++){

                                                        //calculating incomes from milk sales
                                                        $select_milk_sales = mysqli_query($con,"select sum(sp) as total_milk_sales from milksales where solddate = '$date_from' and farm_id ='$farm'");
                                                        $mresults = mysqli_fetch_array($select_milk_sales);
                                                        $total_milk_sales = $mresults['total_milk_sales'];
                                                        //calculating incomes from animals sales
                                                        $select_animal_sales =mysqli_query($con,"select sum(sp) as total_animal_sales from animalsales where solddate = '$date_from' and farm_id ='$farm'");
                                                        $aresults = mysqli_fetch_array($select_animal_sales);
                                                        $total_animal_sales = $aresults['total_animal_sales'];
                                                        $total_income = $total_animal_sales+$total_milk_sales;
                                                        //formating the axis value
                                                        $x_axis_value = $i."/".date('F', strtotime($date_from));
                                                        ?>
                                                        { label: "<?=$x_axis_value?>" , y: <?=$total_income;?> },
                                                        <?php
                                                        $date_from = date ("Y-m-d", strtotime("+1 day", strtotime($date_from)));
                                                        }
                                                        }else{
                                                        //For income it works well
                                                        for($iM =1;$iM<=12;$iM++){
                                                        $month =  date("m", strtotime("$iM/12/10"));
                                                        $x_axis = date("M", strtotime("$iM/12/10"));
                                                        //calculating incomes from milk sales
                                                        $select_milk_sales =mysqli_query($con,"select sum(sp) as total_milk_sales from milksales where MONTH (solddate)= '$month' and farm_id ='$farm'");
                                                        $mresults = mysqli_fetch_array($select_milk_sales);
                                                        $total_milk_sales = $mresults['total_milk_sales'];
                                                        //calculating incomes from animals sales
                                                        $select_animal_sales =mysqli_query($con,"select sum(sp) as total_animal_sales from animalsales where MONTH (solddate)= '$month' and farm_id ='$farm'");
                                                        $aresults = mysqli_fetch_array($select_animal_sales);
                                                        $total_animal_sales = $aresults['total_animal_sales'];
                                                        $total_income = $total_animal_sales+$total_milk_sales;
                                                        ?>
                                                        { label: "<?=$x_axis?>" , y: <?=$total_income;?>},
                                                        <?php
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
