      
	 	  <style>
            .scroll{ 
        height=70%
  overflow: auto;
               
            } 
			  </style>
			 <?php
			include 'db.php';
$message="";
$farm = $_SESSION['farm'];
	$sess=$_SESSION['memberid'];
	$username=$_SESSION['full_names'];
     $select_tag = mysqli_query($con,"select * from users where memberid='$sess' and full_names='$username'");
     while ($tag = mysqli_fetch_array($select_tag)){
		 $user_id=$tag['memberid'];
		
	 }
		?>

      
<div class="scroll">

<div class="sidebar-nav slimscrollsidebar"  style="overflow-y: scroll;">
    <div class="sidebar-head" style="overflow-y: scroll;">
        <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3> </div>
    <ul class="nav" id="side-menu">
        <li class="user-pro" style="overflow-y: scroll;">

            <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
                <li><a href="javascript:void(0)"><i class="ti-user"></i> <span class="hide-menu">My Profiles</span></a></li>
                <li><a href="javascript:void(0)"><i class="ti-wallet"></i> <span class="hide-menu">My Balance</span></a></li>
                <li><a href="javascript:void(0)"><i class="ti-email"></i> <span class="hide-menu">Inbox</span></a></li>
                <li><a href="javascript:void(0)"><i class="ti-settings"></i> <span class="hide-menu">Account Setting</span></a></li>
                <li><a href="javascript:void(0)"><i class="fa fa-power-off"></i> <span class="hide-menu">Logout</span></a></li>
            </ul>
        </li>


        <li><a href="dashboard" class="waves-effect"><i class="mdi mdi-av-timer fa-dashboard"></i> <span class="hide-menu">Dashboard</span></a></li>
		
		<?php 
	

               $psetting = mysqli_query($con, "SELECT * FROM emp_permission WHERE user_id = '$user_id' and module_name='Settings'") or die (mysqli_error($con));
while($setting = mysqli_fetch_array($psetting))
{
	
	$updates= $setting['pupdate'];
	$deletes= $setting['pdelete'];
	$reads= $setting['pread'];
	$creates= $setting['pcreate'];
	$setting_permission=($reads+$creates+$deletes+$updates);
}

	if($setting_permission>0){
?>
		
<li> <a href="javascript:void(0)" class="waves-effect <?php if($active=='settings') echo "active" ?>"><i class="mdi mdi-settings fa-gear"></i> <span class="hide-menu">System Settings<span class="fa arrow"></span></span></a>
            <ul class="nav nav-second-level">
                <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Manage Doctors </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">

                        <li> <a href="manage-doctors"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">New</span></a> </li>
                        <li> <a href="view-doctors"><i class="fa fa-eye-slash fa-fw"></i><span class="hide-menu">View</span></a> </li>

                    </ul>
                </li>
                <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon money fa-fw"></i><span class="hide-menu">Expenses Categories </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
               <li> <a href="manage-expense-items"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">New</span></a> </li>
                        <li> <a href="view-expenses-items"><i class="fa fa-eye-slash fa-fw"></i><span class="hide-menu">View</span></a> </li>

                    </ul>
                </li>
				   <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon money fa-fw"></i><span class="hide-menu">Income Categories </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
               <li> <a href="add-income-categories"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">New</span></a> </li>
                        <li> <a href="view-income-categories"><i class="fa fa-eye-slash fa-fw"></i><span class="hide-menu">View</span></a> </li>

                    </ul>
                </li>
				
                <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Manage Acaricides </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">

                        <li> <a href="manage-acaricides"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">New</span></a> </li>
                        <li> <a href="view-acaricides"><i class="fa fa-eye-slash fa-fw"></i><span class="hide-menu">View</span></a> </li>

                    </ul>
                </li>
                <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Manage Farmer Library </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li> <a href="add-farmerresources"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">New</span></a> </li>
                        <li> <a href="view-farmerresources"><i class="fa fa-eye-slash  fa-fw"></i><span class="hide-menu">View</span></a> </li>
                    </ul>
                </li>
                <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Manage Vaccines</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">

                        <li> <a href="manage-vaccinaes"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">New</span></a> </li>
                        <li> <a href="view-manage-vaccines"><i class="fa fa-eye-slash  fa-fw"></i><span class="hide-menu">View</span></a> </li>

                    </ul>
                </li>
                <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Manage Breeds </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">

                        <li> <a href="manage-breeds"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">New</span></a> </li>
                        <li> <a href="view-breeds"><i class="fa fa-eye-slash  fa-fw"></i><span class="hide-menu">View</span></a> </li>

                    </ul>
                </li>
                <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Manage Module Tips </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li> <a href="add-farmertips"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">New</span></a> </li>
                        <li> <a href="view-moduletips"><i class="fa fa-eye-slash  fa-fw"></i><span class="hide-menu">View</span></a> </li>
                    </ul>
                </li>
            </ul>
        </li>
	<?php }
               $panimals = mysqli_query($con, "SELECT * FROM emp_permission WHERE user_id = '$user_id' and module_name='Animals'") or die (mysqli_error($con));
while($have = mysqli_fetch_array($panimals))
{
	
	$updatep= $have['pupdate'];
	$deletep= $have['pdelete'];
	$readp= $have['pread'];
	$createp= $have['pcreate'];
	$anypermission=($readp+$createp+$deletep+$updatep);

}

	if($anypermission>0){
?>
        <li> <a href="javascript:void(0)" class="waves-effect <?php if($active=='animal') echo "active" ?>"><i class="mdi  mdi-linux fa-fw"></i> <span class="hide-menu">Animal<span class="fa arrow"></span></span></a>
            <ul class="nav nav-second-level">
                <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Registration </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li> <a href="register-animal"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">Register Animal</span></a> </li>
                        <li> <a href="view-animal-registration"><i class="fa fa-eye-slash fa-fw"></i><span class="hide-menu">View Animals</span></a> </li>
                    </ul>
                </li>
                <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Calving </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li> <a href="add-calving"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">Enter Calving Records</span></a> </li>
                        <li> <a href="view-calving-records"><i class="fa fa-eye-slash fa-fw"></i><span class="hide-menu">View Calving Records</span></a> </li>
                    </ul>
                </li>
                <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Weight Tracker </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li> <a href="weight-track"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">New</span></a> </li>
                        <li> <a href="view-weight-tracks"><i class="fa fa-eye-slash fa-fw"></i><span class="hide-menu">View Records</span></a> </li>
                    </ul>
                </li>
                <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">10 Day </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li> <a href="ten-day"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">New</span></a> </li>
                        <li> <a href="view-ten-day-records"><i class="fa fa-eye-slash  fa-fw"></i><span class="hide-menu">View Records</span></a> </li>
                    </ul>
                </li>
                <li> <a href="animal-profile2"><i data-icon="7" class="fa fa-user fa-fw"></i><span class="hide-menu">Animal Profile</span></a> </li>
            </ul>
        </li>
	<?php }?>
		<?php 
	
               $pherd = mysqli_query($con, "SELECT * FROM emp_permission WHERE user_id = '$user_id' and module_name='Herd Health'") or die (mysqli_error($con));
while($herd = mysqli_fetch_array($pherd))
{
	
	$updateh= $herd['pupdate'];
	$deleteh= $herd['pdelete'];
	$readh= $herd['pread'];
	$createh= $herd['pcreate'];
	$herd_permission=($readh+$createh+$deleteh+$updateh);
}

	if($herd_permission>0){
?>
	
	
        <li> <a href="javascript:void(0)" class="waves-effect <?php if($active=='health') echo "active" ?>"><i class="mdi mdi-ambulance fa-fw"></i> <span class="hide-menu">Health<span class="fa arrow"></span></span></a>
            <ul class="nav nav-second-level">
                <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Culling </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li> <a href="add-culling"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">New</span></a> </li>
                        <li> <a href="view-culling-records"><i class="fa fa-eye-slash fa-fw"></i><span class="hide-menu">View</span></a> </li>
                    </ul>
                </li>
                <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Diesiese Incidence </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li> <a href="add-disease-incidences"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">New</span></a> </li>
                        <li> <a href="view-disease-incidences"><i class="fa fa-eye-slash fa-fw"></i><span class="hide-menu">View</span></a> </li>
                    </ul>
                </li>
                <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Spraying </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li> <a href="add-spraying-records"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">New</span></a> </li>
                        <li> <a href="view-spraying-records"><i class="fa fa-eye-slash fa-fw"></i><span class="hide-menu">View</span></a> </li>
                    </ul>
                </li>
                <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Vaccination </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li> <a href="add-vaccination-records"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">New</span></a> </li>
                        <li> <a href="view-vaccination-records"><i class="fa fa-eye-slash  fa-fw"></i><span class="hide-menu">View</span></a> </li>
                    </ul>
                </li>
            </ul>
        </li>
	<?php }
               $pfeed = mysqli_query($con, "SELECT * FROM emp_permission WHERE user_id = '$user_id' and module_name='Feeding'") or die (mysqli_error($con));
while($feed = mysqli_fetch_array($pfeed))
{
	
	$updatef= $feed['pupdate'];
	$deletef= $feed['pdelete'];
	$readf= $feed['pread'];
	$createf= $feed['pcreate'];
	$feed_permission=($readf+$createf+$deletef+$updatef);
}

	if($feed_permission>0){
?>
 <li> <a href="javascript:void(0)" class="waves-effect <?php if($active=='feeding') echo "active" ?>"><i class="mdi mdi-barley fa-fw"></i> <span class="hide-menu">Feeding<span class="fa arrow"></span></span></a>
            <ul class="nav nav-second-level">
                <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Calf </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li> <a href="add-calf-feeding-records"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">Add Records</span></a> </li>
                        <li> <a href="view-calf-feeding-records"><i class="fa fa-eye-slash fa-fw"></i><span class="hide-menu">View Records</span></a> </li>
                    </ul>
                </li>
                <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Adult </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li> <a href="add-animal-feeding-records"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">New Records</span></a> </li>

                        <li> <a href="view-adults-feeding-records"><i class="fa fa-eye-slash fa-fw"></i><span class="hide-menu">View Records</span></a> </li>

                    </ul>
                </li>
            </ul>
        </li>
	<?php }?>
		
		        <!--<li> <a href="javascript:void(0)" class="waves-effect <?php if($active=='reports') echo "active" ?>"><i class="mdi mdi-chart-bar fa-fw"></i> <span class="hide-menu">Analysis Reports<span class="fa arrow"></span></span></a>
            <ul class="nav nav-second-level">
                <li> <a href="graph-milk-sales" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Milk Sales</span><span class="fa arrow"></span></a>
                   
                </li>
                <li> <a href="graph-weight-tracking" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Weight Tracking</span><span class="fa arrow"></span></a>
       
                </li>
				<li> <a href="graph-animal-sales" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Animal Sales</span><span class="fa arrow"></span></a>
                   
                </li>
                <li> <a href="graph-cashflow" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Income Flows</span><span class="fa arrow"></span></a>
       
                </li>
            </ul>
        </li>-->
		
		
		
			<?php   
				$pfinance = mysqli_query($con, "SELECT * FROM emp_permission WHERE user_id = '$user_id' and module_name='Finance Manager'") or die (mysqli_error($con));
while($finance = mysqli_fetch_array($pfinance))
{
	
	$updaten= $finance['pupdate'];
	$deleten= $finance['pdelete'];
	$readn= $finance['pread'];
	$createn= $finance['pcreate'];
	$finance_permission=($readn+$createn+$deleten+$updaten);
}

	if($finance_permission>0){
?>
        <li> <a href="javascript:void(0)" class="waves-effect <?php if($active=='finance') echo "active" ?>"><i class="mdi mdi-cash-multiple fa-fw"></i> <span class="hide-menu">Finance Manager<span class="fa arrow"></span></span></a>
            <ul class="nav nav-second-level">
                <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Animal Sales</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li> <a href="add-animal-sales"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">Add Records</span></a> </li>
                        <li> <a href="view-animal-sales"><i class="fa fa-eye-slash fa-fw"></i><span class="hide-menu">View Records</span></a> </li>
                    </ul>
                </li>
                <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Expenses</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li> <a href="add-expenses"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">Add Records</span></a> </li>
                        <li> <a href="view-expenses"><i class="fa fa-eye-slash fa-fw"></i><span class="hide-menu">View Records</span></a> </li>
                    </ul>
                </li>
				 <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Incomes</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li> <a href="add-income"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">Add Records</span></a> </li>
                        <li> <a href="view-incomes"><i class="fa fa-eye-slash fa-fw"></i><span class="hide-menu">View Records</span></a> </li>
                    </ul>
                </li>
				
                <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Milk Sales</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li> <a href="add-milk-sales"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">Add Records</span></a> </li>
                        <li> <a href="view-milk-sales"><i class="fa fa-eye-slash fa-fw"></i><span class="hide-menu">View Records</span></a> </li>
                    </ul>
                </li>
                <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Salaries</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li> <a href="add-salaries"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">Add Records</span></a> </li>
                        <li> <a href="view-calf-feeding-records"><i class="fa fa-eye-slash fa-fw"></i><span class="hide-menu">View Records</span></a> </li>
                    </ul>
                </li>
            </ul>
        </li>
	
	<?php }   
	$pmilk = mysqli_query($con, "SELECT * FROM emp_permission WHERE user_id = '$user_id' and module_name='Milk Production'") or die (mysqli_error($con));
while($milk = mysqli_fetch_array($pmilk))
{
	
	$updatem= $milk['pupdate'];
	$deletem= $milk['pdelete'];
	$readm= $milk['pread'];
	$createm= $milk['pcreate'];
	$milk_permission=($readm+$createm+$deletem+$updatem);
}

	if($milk_permission>0){
?>
  <li> <a href="javascript:void(0)" class="waves-effect <?php if($active=='milk_production') echo "active" ?>"><i class="mdi mdi-beaker fa-fw"></i> <span class="hide-menu">Milk Management<span class="fa arrow"></span></span></a>
            <ul class="nav nav-second-level">
                <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Milk Production </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li> <a href="add-milk-production-records"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">Add Records</span></a> </li>
                        <li> <a href="view-milk-production-records"><i class="fa fa-eye-slash fa-fw"></i><span class="hide-menu">View Records</span></a> </li>
                    </ul>
                </li>
                <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Milk Usage </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li> <a href="milk-usage"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">New Records</span></a> </li>

                        <li> <a href="view-milk-production-records"><i class="fa fa-eye-slash fa-fw"></i><span class="hide-menu">View Records</span></a> </li>

                    </ul>
                </li>
            </ul>
        </li>
		
        
	<?php}
               $pbreed = mysqli_query($con, "SELECT * FROM emp_permission WHERE user_id = '$user_id' and module_name='Breeding'") or die (mysqli_error($con));
while($breed = mysqli_fetch_array($pbreed))
{
	
	$updateb= $breed['pupdate'];
	$deleteb= $breed['pdelete'];
	$readb= $breed['pread'];
	$createb= $breed['pcreate'];
	$breead_permission=($readb+$createb+$deleteb+$updateb);
}

	if($breead_permission>0){
?>

        <li> <a href="javascript:void(0)" class="waves-effect <?php if($active=='breeding') echo "active" ?>"><i class="mdi mdi-checkbox-multiple-marked-outline fa-fw"></i> <span class="hide-menu">Breeding<span class="fa arrow"></span></span></a>
            <ul class="nav nav-second-level">
               <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">pending Heat </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li> <a href="add_pending_heat"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">New</span></a> </li>
                        <li> <a href="wheel-heat-animals"><i class="fa fa-eye-slash  fa-fw"></i><span class="hide-menu">View Records</span></a> </li>
                    </ul>
                </li>
				<li> <a href="wheel-heat-test"><i data-icon="7" class="fa fa-arrow-alt-circle-right fa-fw"></i><span class="hide-menu">Monitor Signs of Heat</span></a> </li>
                <li> <a href="wheel-preg-test"><i data-icon="7" class="fa fa-arrow-alt-circle-right fa-fw"></i><span class="hide-menu">Pending Pregnancy Test</span></a> </li>
                <li> <a href="wheel-pregnant"><i data-icon="7" class="fa fa-arrow-alt-circle-right fa-fw"></i><span class="hide-menu">Expecting Mothers</span></a> </li>
            </ul>
        </li>
	<?php }?>
		
		
		
</ul>
</div>
</div>