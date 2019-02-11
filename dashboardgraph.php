<!DOCTYPE html>
<html lang="en">

<head>
<?php include 'head.php';

$active='dash';?>
</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svgm class="mcircular" viewBox="25 25 50 50">
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
                        <h4 class="page-title">WELCOME TO EFAMU</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                        <!--<a href="#" "></a>-->
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Dashboard 1</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- ============================================================== -->
                <!-- Different data widgets -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class="row row-in">
                                <div class="col-lg-4 col-sm-12 row-in-br">
                                    <ul class="col-in">
                                        <li>
                                            <span class="circle circle-md bg-danger"><i class="ti-clipboard"></i></span>
                                        </li>
                                        <li class="col-last">
                                            <h3 class="counter text-right m-t-15">
                                                <?php
                                                include 'db.php';
                                                $sql = mysqli_query($con,"select count(tagNo) as total_animals from animal_registration  where status ='Present' and farm_id = '$farm'");
                                                $total_animals = mysqli_fetch_array($sql);
                                                echo $total_animals['total_animals'];
                                                ?>
                                            </h3></li>
                                        <li class="col-middle">
                                            <h4>Total Animals</h4>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    <span class="sr-only">40% Complete (success)</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-4 col-sm-12  b-0">
                                    <ul class="col-in">
                                        <li>
                                            <span class="circle circle-md bg-success"><i class="fas fa-dollar-sign"></i></span>
                                        </li>
                                        <li class="col-last">
                                            <h3 class="counter text-right m-t-15">
                                                <?php
                                                $month = date("m");
                                                $year = date("Y");
                                                //echo $month;
                                                $sql=mysqli_query($con,"select sum(quantity) as total_milk from milkyield where MONTH (mdate)='$month' and YEAR (mdate)='$year' and farm_id = '$farm'");
                                                $ans = mysqli_fetch_array($sql);
                                                echo number_format($ans['total_milk'])." Ltrs";
												 $totalmilkcollected=$ans['total_milk'];
                                               
                                                $sql=mysqli_query($con,"select sum(qty) as total_milk_spoilt from milkusage 
												where MONTH (date)='$month' and YEAR (date)='$year' and farm_id = '$farm' AND usagetype='Spoilt'");
                                                $ans = mysqli_fetch_array($sql);
                                                echo number_format($ans['total_milk_spoilt'])." Ltrs";
												$totalmilkspoilt=$ans['total_milk_spoilt'];
                                                
												$sql=mysqli_query($con,"select sum(qty) as total_milk_home from milkusage 
												where MONTH (date)='$month' and YEAR (date)='$year' and farm_id = '$farm' 
												AND usagetype='Home Consumption'");
                                                $ans = mysqli_fetch_array($sql);
                                                echo number_format($ans['total_milk_home'])." Ltrs";
												
												$sql=mysqli_query($con,"select sum(qty) as total_milk_calves from milkusage 
												where MONTH (date)='$month' and YEAR (date)='$year' and farm_id = '$farm' 
												AND usagetype='Calves Feeding'");
                                                $ans = mysqli_fetch_array($sql);
                                                echo number_format($ans['total_milk_calves'])." Ltrs";
                                                
												
												?>
                                            </h3></li>
                                        <li class="col-middle">
                                            <h4>Milk Production </h4>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    <span class="sr-only">40% Complete (success)</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-4 col-sm-12  b-0">
                                    <ul class="col-in">
                                        <li>
                                            <span class="circle circle-md bg-warning"><i class="fas fa-dollar-sign"></i></span>
                                        </li>
                                        <li class="col-last">
                                            <h3 class="counter text-right m-t-15">
                                                <?php
                                                $month = date("m");
                                                $year = date("Y");
                                                //echo $month;
                                                $illness_results = mysqli_fetch_array(mysqli_query($con,"select COUNT(animal_id) as total_illness from disease_incidences where MONTH (tdate)='$month' and YEAR (tdate)='$year' and farm_id = '$farm'"));
                                                $total_illness = $illness_results['total_illness'];
                                                echo $total_illness;
                                                ?>
                                            </h3></li>
                                        <li class="col-middle">
                                            <h4>Total Illness </h4>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    <span class="sr-only">40% Complete (success)</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--row -->
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-12 col-lg-8 col-sm-12 col-xs-12">
                        <div class="white-box">
						
						<html>
<head>
	<title>My first chart using FusionCharts Suite XT</title>
	<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
	<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js></script>
	<script type="text/javascript">
		FusionCharts.ready(function(){
			var chartObj = new FusionCharts({
    type: 'column3d',
    renderAt: 'chart-container',
    width: '700',
    height: '400',
    dataFormat: 'json',
    dataSource: {
        "chart": {
            "caption": "Monthly revenue for last year",
            "subCaption": "Harry's SuperMart",
            "xAxisName": "Month",
            "yAxisName": "Revenues (In USD)",
            "numberPrefix": "$",
            "theme": "fusion"
        },
        "data": [{
                "label": "Jan",
                "value": "420000"
            },
            {
                "label": "Feb",
                "value": "810000"
            },
            {
                "label": "Mar",
                "value": "720000"
            },
            {
                "label": "Apr",
                "value": "550000"
            },
            {
                "label": "May",
                "value": "910000"
            },
            {
                "label": "Jun",
                "value": "510000"
            },
            {
                "label": "Jul",
                "value": "680000"
            },
            {
                "label": "Aug",
                "value": "620000"
            },
            {
                "label": "Sep",
                "value": "610000"
            },
            {
                "label": "Oct",
                "value": "490000"
            },
            {
                "label": "Nov",
                "value": "900000"
            },
            {
                "label": "Dec",
                "value": "730000"
            }
        ]
    }
});
			chartObj.render();
		});
	</script>
	</head>
	<body>
		<div id="chart-container">FusionCharts XT will load here!</div>
	</body>
</html>
						
						   <div class="chartcss">
<?php
 
        	
	$arrData = array(
        "chart" => array(
        	  "caption"=> "Students Performance Per Division  ",
            "xAxisname"=> "Students Performance Per Division",
            "yAxisName"=> "No Of Students",
            "numberPrefix"=> "",
            "plotFillAlpha"=> "8000",
        	  "showValues"=> "1",
        	  "placeValuesInside"=> "1",
        	  "usePlotGradientColor"=> "0",
        	  "rotateValues"=> "1",
        	  "valueFontColor"=> "#FFFFFF",
        	  "showHoverEffect"=> "1",
            "rotateValues"=> "1",
            "showXAxisLine"=> "1",
            "xAxisLineThickness"=> "1",
            "xAxisLineColor"=> "#999999",
            "showAlternateHGridColor"=> "0",
            "legendBgAlpha"=> "0",
            "legendBorderAlpha"=> "0",
            "legendShadow"=> "0",
            "legendItemFontSize"=> "18",
            "legendItemFontColor"=> "#666666",
            "theme"=> "fint"
          	)
         	);

        	// creating array for categories object
        	
        	//$categoryArray=array();
        	//$dataseries3=array();
        	//$dataseries4=array();
			
        	//$desc="";
          // pushing category array values
        	/*while($row = mysqli_fetch_array($result)) {	
$class='S'.$row["class"];			
				    array_push($categoryArray, array(
					  "label" => 'CLASS';
					)
				);
				
				array_push($dataseries3, array(
					"value" => $row["div1"]
					)
				);
				array_push($dataseries4, array(
					"value" => $row["div2"]
					)
				);
				array_push($dataseries5, array(
					"value" => $row["div3"]
					)
				);
				array_push($dataseries6, array(
					"value" => $row["div4"]
					)
				);
				array_push($dataseries7, array(
					"value" => $row["div9"]
					)
				);
				array_push($dataseries8, array(
					"value" => $row["divx"]
					)
				);
				
    
    	}*/
        	
    	//$arrData["categories"]=array(array("category"=>$categoryArray));

			// creating dataset object
			$arrData["dataset"] = array( array("seriesName"=> "Div 1", "data"=>$totalmilkspoilt),
			array("seriesName"=> "Div 2", 
			"data"=>$totalmilkcollected));
		
			
				

      $jsonEncodedData = json_encode($arrData);
            			
			// chart object
      $msChart = new FusionCharts("mscolumn3d", "chart1" , "100%", "900", "chart-container", "json", $jsonEncodedData);
      
      $msChart->render();
			 
      // closing db connection
      $dbhandle->close();
           
   
 
?>
</div>

<center>
 <div id="chart-container">Chart will render here!</div></center>
 </div>
   </body>
   
   
                            <script>
                                window.onload = function () {

                                    var chart = new CanvasJS.Chart("chartContainer", {
                                        animationEnabled: true,
                                        exportEnabled: true,
                                        title:{
                                            text: "Variations in Milk Production and Sales (This Month)"
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
                                        data: [{
                                            type: "spline",
                                            name: "Milk Produced",
                                            showInLegend: true,
                                            dataPoints: [
                                                <?php
                                                include 'db.php';
                                                //$result = mysqli_fetch_array(mysqli_query($con,"select * from generalexpenses"));
                                                //$qty = $result['qty'];
                                                // echo $qty."<br>";
                                                $month = date("m");
                                                $sno = 0;
                                                $date_from = date("Y-m-01");
                                                //$date_from = "2018-10-01";
                                                //$date_to = date ("Y-m-d", strtotime("+30 day", strtotime($date_from)));

                                                for($i=1;$i<=31;$i++){
                                                $select =mysqli_query($con,"select sum(quantity) as quantity , mdate from milkyield where mdate = '$date_from' and farm_id = '$farm'");
                                                $result = mysqli_fetch_array($select);
                                                $qty = $result['quantity'];
                                                $sno++;
                                                $y_axis_value  = "Day".$sno;
                                                ?>
                                                { label: "<?=$result['mdate']?>" , y: <?=number_format($qty);?> },
                                                <?php
                                                $date_from = date ("Y-m-d", strtotime("+1 day", strtotime($date_from)));
                                                }
                                                ?>
                                            ]
                                        },
                                            {
                                                type: "spline",
                                                name: "Milk Sold",
                                                showInLegend: true,
                                                dataPoints: [
                                                    <?php
                                                    include 'db.php';
                                                    //$result = mysqli_fetch_array(mysqli_query($con,"select * from generalexpenses"));
                                                    //$qty = $result['qty'];
                                                    // echo $qty."<br>";
                                                    $month = date("m");
                                                    $sno = 0;
                                                    $date_from = date("Y-m-01");
                                                    //$date_from = "2018-10-01";
                                                    //$date_to = date ("Y-m-d", strtotime("+30 day", strtotime($date_from)));

                                                    for($i=1;$i<=31;$i++){
                                                    $select =mysqli_query($con,"select sum(qty) as quantity , solddate from milksales where solddate = '$date_from' and farm_id = '$farm'");
                                                    $result = mysqli_fetch_array($select);
                                                    $qty_sold = $result['quantity'];
                                                    $sno++;
                                                    $y_axis_value  = "Day".$sno;
                                                    ?>
                                                    { label: "<?=$result['solddate']?>" , y: <?=number_format($qty_sold);?> },
                                                    <?php
                                                    $date_from = date ("Y-m-d", strtotime("+1 day", strtotime($date_from)));
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
                    </div>
                    <div class="col-md-12 col-lg-4 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-xs-8">
                                    <h2 class="m-b-0 font-medium">Week Sales</h2>
                                    <h5 class="text-muted m-t-0">Ios app - 160 sales</h5></div>
                                <div class="col-xs-4">
                                    <div class="circle circle-md bg-info pull-right m-t-10"><i class="ti-shopping-cart"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-theme-alt">
                        <?php 
                        $weather_query=mysqli_query($con,"select * from farms where farmid='$farm'");
$weather=mysqli_fetch_array($weather_query);

$cityId=$weather['address'];
    
    include "weather.html";

?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class="row row-in">
                                <div class="col-lg-4 col-sm-12 row-in-br">
                                    <ul class="col-in">
                                        <li>
                                            <span class="circle circle-md bg-danger"><i class="ti-clipboard"></i></span>
                                        </li>
                                        <li class="col-last">
                                            <h3 class="counter text-right m-t-15">
                                                <?php
                                                $month = date("m");
                                                $year = date("Y");
                                                //echo $month;
                                                $sql=mysqli_query($con,"select sum(sp) as total_milk_sales from milksales where MONTH (solddate)='$month' and YEAR (solddate)='$year' and farm_id = '$farm'");
                                                $mresults = mysqli_fetch_array($sql);
                                                $total_milk_sales = $mresults['total_milk_sales'];

                                                //Getting the total Animals sold this month
                                                $aresults = mysqli_fetch_array(mysqli_query($con,"select sum(sp) as total_animal_sales from animalsales where MONTH (solddate)='$month' and YEAR (solddate)='$year' and farm_id = '$farm'"));
                                                $total_animal_sales = $aresults['total_animal_sales'];

                                                $total_income = $total_animal_sales+$total_milk_sales;
                                                echo "Shs. ".number_format($total_income) ;
                                                ?>
                                            </h3></li>
                                        <li class="col-middle">
                                            <h4>Total Income </h4>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    <span class="sr-only">40% Complete (success)</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-4 col-sm-12  b-0">
                                    <ul class="col-in">
                                        <li>
                                            <span class="circle circle-md bg-success"><i class="fas fa-dollar-sign"></i></span>
                                        </li>
                                        <li class="col-last">
                                            <h3 class="counter text-right m-t-15">
                                                <?php
                                                $month = date("m");
                                                $year = date("Y");
                                                //echo $month;
                                                $sql=mysqli_query($con,"select sum(totalcost) as total_expenses from generalexpenses where MONTH (receiptdate)='$month' and YEAR (receiptdate)='$year' and farm_id = '$farm'");
                                                $eresults = mysqli_fetch_array($sql);
                                                $total_expenses = $eresults['total_expenses'];
                                                echo "Shs ".number_format($total_expenses);
                                                ?>
                                            </h3></li>
                                        <li class="col-middle">
                                            <h4>Total Expenses  </h4>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    <span class="sr-only">40% Complete (success)</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-4 col-sm-12  b-0">
                                    <ul class="col-in">
                                        <li>
                                            <span class="circle circle-md bg-warning"><i class="fas fa-dollar-sign"></i></span>
                                        </li>
                                        <li class="col-last">
                                            <h3 class="counter text-right m-t-15">
                                                <?php
                                                //calculating the gross profit
                                                $gp = ($total_income - $total_expenses);
                                                echo "Shs ".number_format($gp);
                                                ?>
                                            </h3></li>
                                        <li class="col-middle">
                                            <h4>Net Profit </h4>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    <span class="sr-only">40% Complete (success)</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				
				
				   <!--<div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">Visit from the countries</h3>
                            <ul class="country-state  p-t-20">
                                <li>
                                    <h2>6350</h2> <small>From India</small>
                                    <div class="pull-right">48% <i class="fa fa-level-up text-success"></i></div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:48%;"> <span class="sr-only">48% Complete</span></div>
                                    </div>
                                </li>
                                <li>
                                    <h2>3250</h2> <small>From UAE</small>
                                    <div class="pull-right">98% <i class="fa fa-level-up text-success"></i></div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-inverse" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:98%;"> <span class="sr-only">98% Complete</span></div>
                                    </div>
                                </li>
                                <li>
                                    <h2>1250</h2> <small>From Australia</small>
                                    <div class="pull-right">75% <i class="fa fa-level-down text-danger"></i></div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:75%;"> <span class="sr-only">75% Complete</span></div>
                                    </div>
                                </li>
                                <li>
                                    <h2>1350</h2> <small>From USA</small>
                                    <div class="pull-right">48% <i class="fa fa-level-up text-success"></i></div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:48%;"> <span class="sr-only">48% Complete</span></div>
                                    </div>
                                </li>
                                <li>
                                    <h2>3250</h2> <small>From UAE</small>
                                    <div class="pull-right">98% <i class="fa fa-level-up text-success"></i></div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-inverse" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:98%;"> <span class="sr-only">98% Complete</span></div>
                                    </div>
                                </li>
                                <li>
                                    <h2>1250</h2> <small>From Australia</small>
                                    <div class="pull-right">75% <i class="fa fa-level-down text-danger"></i></div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:75%;"> <span class="sr-only">75% Complete</span></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-8">
                        <div class="white-box bg-theme m-b-0">
                            <div class="city-weather-widget">
                                <h1>Kufri, Himachal Pradesh</h1>
                                <h4>Friday, 19 Jan 2017</h4>
                                <div class="row p-t-30">
                                    <div class="col-sm-6">
                                        <ul class="side-icon-text">
                                            <li><span class="di vm"><i class="wi wi-day-hail"></i></span>
                                                <div class="di vm">
                                                    <h1 class="m-b-0">23<sup>o</sup></h1>
                                                    <h5 class="m-t-0">Mostly Sunny</h5>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6">
                                        <ul class="list-icons pull-right text-white">
                                            <li><i class="wi wi-day-sunny m-r-5"></i>Humidity 38%</li>
                                            <li><i class=" wi wi-day-windy m-r-5"></i>Wind 38%</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-12">
                                        <div id="ct-city-wth" style="height:220px"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="row">
                                <ul class="list-unstyled city-weather-days">
                                    <li class="col-xs-4 col-sm-2"><span>Tue</span><i class="wi wi-day-sunny"></i><span>32<sup>°F</sup></span></li>
                                    <li class="col-xs-4 col-sm-2"><span>Wed</span><i class="wi wi-day-cloudy"></i><span>34<sup>°F</sup></span></li>
                                    <li class="col-xs-4 col-sm-2"><span>Thu</span><i class="wi wi-day-hail"></i><span>35<sup>°F</sup></span></li>
                                    <li class="col-xs-4 col-sm-2 active"><span>Fri</span><i class="wi wi-day-sprinkle"></i><span>34<sup>°F</sup></span></li>
                                    <li class="col-xs-4 col-sm-2"><span>Sat</span><i class="wi wi-day-snow"></i><span>30<sup>°F</sup></span></li>
                                    <li class="col-xs-4 col-sm-2"><span>Sun</span><i class="wi wi-day-sunny"></i><span>26<sup>°F</sup></span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>-->
				
				
				
                <!-- ============================================================== -->
                <!-- wallet, & manage users widgets -->
                <!-- ============================================================== -->
                <!-- .row -->
                <!-- /.row -->
                <!-- ============================================================== -->

                <!-- start right sidebar -->
                <!-- ============================================================== -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-theme="gray" class="yellow-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme">4</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                                <li class="full-width"><b>With Dark sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                                <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-theme="gray-dark" class="yellow-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme working">12</a></li>
                            </ul>
                          
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center">
            <?php include 'footer.php';?>
            </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Morris JavaScript -->
    <script src="plugins/bower_components/raphael/raphael-min.js"></script>
    <script src="plugins/bower_components/morrisjs/morris.js"></script>
    <!-- chartist chart -->
    <script src="plugins/bower_components/chartist-js/dist/chartist.min.js"></script>
    <script src="plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!-- Calendar JavaScript -->
    <script src="plugins/bower_components/moment/moment.js"></script>
    <script src="plugins/bower_components/calendar/dist/fullcalendar.min.js"></script>
    <script src="plugins/bower_components/calendar/dist/cal-init.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <script src="js/dashboard1.js"></script>
    <!-- Custom tab JavaScript -->
    <script src="js/cbpFWTabs.js"></script>
    <script type="text/javascript">
    (function() {
        [].slice.call(document.querySelectorAll('.sttabs')).forEach(function(el) {
            new CBPFWTabs(el);
        });
    })();
    </script>
    <script src="plugins/bower_components/toast-master/js/jquery.toast.js"></script>
    <!--Style Switcher -->
    <script src="plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
