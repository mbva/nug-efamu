<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head.php';?>
</head>
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
<div id="wrapper">
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
                    <h4 class="page-title">
                        Animal Profile
                    </h4> </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                    <a href="javascript: void(0);" target="_blank" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Buy Admin Now</a>
                    <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Animal</a></li>
                        <li><a href="#">Animal Profile</a></li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!--.row-->
            <div class="row">

                <div class="col-md-12 col-sm-12">
                    <div class="white-box">

                        <div class="row">
                            <div class="col-sm-3 col-xs-12">
                                <form action="animal-profile2" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="exampleInputuname">Select Animal </label>
                                        <div class="input-group">
                                            <select class="form-control select2" name="animal_id" required>
                                                <option>Select</option>
                                                <?php
                                                $select_tag = mysqli_query($con,"select * from animal_registration where status='present' and farm_id ='$farm'");
                                                while ($result = mysqli_fetch_array($select_tag)){
                                                    $tagno = $result['tagNo'];
                                                    ?>
                                                    <option value="<?php echo $result['animal_name']; ?>"><?php echo $result['animal_name'].'('.$result['tagNo'].')'; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                            <div class="input-group-addon"><i class="ti-ink-pen"></i></div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" name="submit" class="btn btn-success waves-effect waves-light m-r-10">Search</button>
                                    </div>
                                </form>
                            </div>
                            <?php
                            if(isset($_POST['submit'])){
                            include 'db.php';
                            $tagNo = $_POST['tagno'];
                            $select = mysqli_query($con,"select * from animal_registration where tagNo = '$tagno'");
                            $animal_records = mysqli_fetch_array($select);
                            ?>
                            <div class="col-sm-9 col-xs-12">
                                <form class="form-horizontal" role="form">
                                    <div class="form-body">
                                       <div class="row">
                                           <div class="col-md-6">
                                               <h3 class="box-title">Animal Info</h3>
                                               <hr class="m-t-0 m-b-40">
                                               <div class="form-group">
                                                   <label class="control-label col-md-3">Name</label>
                                                   <div class="col-md-9">
                                                       <p class="form-control-static"> <?= $animal_records['animal_name']." ".($animal_records['tagNo']);?> </p>
                                                   </div>
                                               </div>
                                               <div class="form-group">
                                                   <label class="control-label col-md-3">Gender:</label>
                                                   <div class="col-md-9">
                                                       <p class="form-control-static"> <?=$animal_records['gender'];?> </p>
                                                   </div>
                                               </div>
                                               <div class="form-group">
                                                   <label class="control-label col-md-3">Date of Birth:</label>
                                                   <div class="col-md-9">
                                                       <p class="form-control-static"> <?=$animal_records['dob'];?> </p>
                                                   </div>
                                               </div>
                                               <div class="form-group">
                                                   <label class="control-label col-md-3">Age:</label>
                                                   <div class="col-md-9">
                                                       <p class="form-control-static"> <?=floor((time() - strtotime($animal_records['dob'])) / 31556926);;?></p>
                                                   </div>
                                               </div>
                                               <div class="form-group">
                                                   <label class="control-label col-md-3">Breed:</label>
                                                   <div class="col-md-9">
                                                       <p class="form-control-static"> <?=$animal_records['breed'];?> </p>
                                                   </div>
                                               </div>
                                               <div class="form-group">
                                                   <label class="control-label col-md-3">Genetic %:</label>
                                                   <div class="col-md-9">
                                                       <p class="form-control-static"> <?=$animal_records['genetic_percentage'];?> </p>
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="col-md-6">

                                               <div class="form-group">
                                                   <label class="control-label col-md-3">On Premise:</label>
                                                   <div class="col-md-9">
                                                       <p class="form-control-static"> <?php
                                                           if($animal_records['location']=="On"){
                                                               echo "True";
                                                           }
                                                           if($animal_records['location']=="Off"){
                                                               echo "False";
                                                           }
                                                           ?> </p>
                                                   </div>
                                               </div>
                                               <h3 class="box-title">Lineage</h3>
                                               <hr class="m-t-0 m-b-40">
                                               <div class="form-group">
                                                   <label class="control-label col-md-3">Sire:</label>
                                                   <div class="col-md-9">
                                                       <p class="form-control-static"> <?=$animal_records['name_of_sire'];?> </p>
                                                   </div>
                                               </div>
                                               <div class="form-group">
                                                   <label class="control-label col-md-3">Sire Breed:</label>
                                                   <div class="col-md-9">
                                                       <p class="form-control-static"> <?=$animal_records['breed_of_sire'];?> </p>
                                                   </div>
                                               </div>
                                               <div class="form-group">
                                                   <label class="control-label col-md-3">Dam:</label>
                                                   <div class="col-md-9">
                                                       <p class="form-control-static"> <?=$animal_records['name_of_dam'];?> </p>
                                                   </div>
                                               </div>
                                               <div class="form-group">
                                                   <label class="control-label col-md-3">Dam Breed:</label>
                                                   <div class="col-md-9">
                                                       <p class="form-control-static"> <?=$animal_records['breed_of_dam'];?> </p>
                                                   </div>
                                               </div>

                                           </div>
                                           <?php
                                           }
                                           ?>
                                       </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
