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
                    <h4 class="page-title">Graphical Weight Tracking Analysis</h4> </div>
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
            <div class="row">

                <div class="col-md-8">
                    <form action="" method="post">
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="graph-form" style="background: rebeccapurple;padding-left: 10%">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <div class="input-daterange input-group" >
                                            <select class="form-control select2" name="animal_id">
                                                <option value="">**** Animal****</option>
                                                <?php
                                                $select = mysqli_query($con,"select * from animal_registration where status = 'Present' and farm_id ='$farm'");
                                                while ($results = mysqli_fetch_array($select)){
                                                    ?>
                                                    <option value="<?php echo $results['animal_id'];?>"><?php echo $results['animal_name']." (".$results['tagNo'].")"; ?></option>
                                            </select>
                                            <input type="hidden" name="aname" value="<?php echo $results['animal_name']; ?>">
                                            <input type="hidden" name="tagNo" value="<?php echo $results['tagNo']; ?>">
                                            <?php
                                            }
                                            ?>
                                        </div>

                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
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
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
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
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
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
            <!--.row-->
            <div class="row">
                <script>
                    window.onload = function () {

                        var chart = new CanvasJS.Chart("chartContainer", {
                            animationEnabled: true,
                            exportEnabled: true,
                            title:{
                                text: " (<?php
                                    if(isset($_POST['submit'])){
                                        //$date = $_POST['date'];
                                        $tagno = $_POST['tagno'];
                                        $aname = $_POST['aname'];
                                        // $d = date_parse_from_format("Y-m-d", $date);
                                        $m =  $_POST['month'];
                                        $y =  $_POST['year'];
                                        echo $aname. " Weight Analysis as at ".$m."-".$y;
                                    }else{
                                        echo "Annual Representation of Herd Average Weight";
                                    }
                                    ?>)"
                            },
                            axisY:{
                                title: "Average Weight (Kgs)"
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
                                    name: "Average Weight",
                                    showInLegend: true,
                                    dataPoints: [
                                        <?php
                                        include 'db.php';

                                        if(isset($_POST['submit'])){
                                        $m = $_POST['month'];
                                        $y = $_POST['year'];
                                        $date_from = "$y-$m-01";
                                        $animal_id =$_POST['animal_id'];

                                        for($i=1;$i<=31;$i++){
                                        $select =mysqli_query($con,"select AVG (weight) as daily_avg_weight , wdate from weight where animal_id = '$animal_id' AND wdate = '$date_from' and farm_id ='$farm'");
                                        $result = mysqli_fetch_array($select);
                                        $daily_avg_weight = $result['daily_avg_weight'];
                                        ?>
                                        { label: "<?=$result['wdate']?>" , y: <?=number_format($daily_avg_weight);?> },
                                        <?php
                                        $date_from = date ("Y-m-d", strtotime("+1 day", strtotime($date_from)));
                                        }
                                        }else{
                                        for($iM =1;$iM<=12;$iM++){
                                        $month =  date("m", strtotime("$iM/12/10"));
                                        $x_axis = date("M", strtotime("$iM/12/10"));
                                        $select =mysqli_query($con,"select AVG (weight) as avg_weight  from weight where MONTH (wdate)= '$month' and farm_id ='$farm'");
                                        $result = mysqli_fetch_array($select);
                                        ?>
                                        { label: "<?=$x_axis?>" , y: <?=number_format($result['avg_weight']);?>},
                                        <?php
                                        }
                                        }
                                        ?>
                                    ]
                                },
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
