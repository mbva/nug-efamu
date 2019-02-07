<div style="overflow-y: scroll;">

<div class="sidebar-nav slimscrollsidebar" >
    <div class="sidebar-head">
        <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3> </div>
    <ul class="nav" id="side-menu">
        <li class="user-pro">

            <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
                <li><a href="javascript:void(0)"><i class="ti-user"></i> <span class="hide-menu">My Profiles</span></a></li>
                <li><a href="javascript:void(0)"><i class="ti-wallet"></i> <span class="hide-menu">My Balance</span></a></li>
                <li><a href="javascript:void(0)"><i class="ti-email"></i> <span class="hide-menu">Inbox</span></a></li>
                <li><a href="javascript:void(0)"><i class="ti-settings"></i> <span class="hide-menu">Account Setting</span></a></li>
                <li><a href="javascript:void(0)"><i class="fa fa-power-off"></i> <span class="hide-menu">Logout</span></a></li>
            </ul>
        </li>


        <li><a href="dashboard" class="waves-effect"><i class="mdi mdi-av-timer fa-dashboard"></i> <span class="hide-menu">Dashboard</span></a></li>
<li> <a href="javascript:void(0)" class="waves-effect <?php if($active=='settings') echo "active" ?>"><i class="mdi mdi-settings fa-gear"></i> <span class="hide-menu">System Settings<span class="fa arrow"></span></span></a>
            <ul class="nav nav-second-level">
                <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Manage Doctors </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">

                        <li> <a href="manage-doctors"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">New</span></a> </li>
                        <li> <a href="view-doctors"><i class="fa fa-eye-slash fa-fw"></i><span class="hide-menu">View</span></a> </li>

                    </ul>
                </li>
                <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon money fa-fw"></i><span class="hide-menu">Manage Expenses </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
               <li> <a href="manage-expense-items"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">New</span></a> </li>
                        <li> <a href="view-expenses-items"><i class="fa fa-eye-slash fa-fw"></i><span class="hide-menu">View</span></a> </li>

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
                        <li> <a href="javascript:void(0)"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">New</span></a> </li>
                        <li> <a href="javascript:void(0)"><i class="fa fa-eye-slash  fa-fw"></i><span class="hide-menu">View</span></a> </li>
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
                        <li> <a href="javascript:void(0)"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">New</span></a> </li>
                        <li> <a href="javascript:void(0)"><i class="fa fa-eye-slash  fa-fw"></i><span class="hide-menu">View</span></a> </li>
                    </ul>
                </li>
            </ul>
        </li>
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
		
		        <li> <a href="javascript:void(0)" class="waves-effect <?php if($active=='reports') echo "active" ?>"><i class="mdi mdi-chart-bar fa-fw"></i> <span class="hide-menu">Analysis Reports<span class="fa arrow"></span></span></a>
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
        </li>
		
		
		
		
        <li> <a href="javascript:void(0)" class="waves-effect <?php if($active=='finance') echo "active" ?>"><i class="mdi mdi-cash-multiple fa-fw"></i> <span class="hide-menu">Finance Manager<span class="fa arrow"></span></span></a>
            <ul class="nav nav-second-level">
                <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Animal Sales </span><span class="fa arrow"></span></a>
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

        <li> <a href="javascript:void(0)" class="waves-effect <?php if($active=='milk_production') echo "active" ?>"><i class="mdi mdi-beaker fa-fw"></i> <span class="hide-menu">Milk Production<span class="fa arrow"></span></span></a>
            <ul class="nav nav-second-level">
                <li> <a href="add-milk-production-records"><i data-icon="7" class="fa fa-user fa-fw"></i><span class="hide-menu">Add Records</span></a> </li>
                <li> <a href="view-milk-production-records"><i data-icon="7" class="fa fa-user fa-fw"></i><span class="hide-menu">View Records</span></a> </li>
            </ul>
        </li>
		
		       <li> <a href="javascript:void(0)" class="waves-effect <?php if($active=='users') echo "active" ?>"><i class="mdi  mdi-account fa-fw"></i> <span class="hide-menu">System Users<span class="fa arrow"></span></span></a>
            <ul class="nav nav-second-level">
                <li> <a href="add-users" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Register User </span></a>
                   
                </li>
				 <li> <a href="view-users" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">View Users </span></a>
                   
                </li>
               </ul>
        </li>
		
		<li> <a href="javascript:void(0)" class="waves-effect <?php if($active=='u-permissions') echo "active" ?>"><i class="mdi mdi-account-key fa-fw"></i> <span class="hide-menu">User Permissions<span class="fa arrow"></span></span></a>
            <ul class="nav nav-second-level">
                <li> <a href="permission_select" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Add Records </span></a>
                   
                </li>
				 <li> <a href="edit_permissions" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Edit Permissions </span></a>
                   
                </li>
				<li> <a href="view_permissions" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">View User Permissions </span></a>
                   
                </li>
               </ul>
        </li>
				
		       <li> <a href="javascript:void(0)" class="waves-effect <?php if($active=='employees') echo "active" ?>"><i class="mdi  mdi-bike fa-fw"></i> <span class="hide-menu">Employees<span class="fa arrow"></span></span></a>
            <ul class="nav nav-second-level">
                <li> <a href="add-employees" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Add Emloyee </span></a>
                   
                </li>
				 <li> <a href="view-employees" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">View Employees </span></a>
                   
                </li>
				</ul>
                
             
        </li>
		
			       <li> <a href="javascript:void(0)" class="waves-effect <?php if($active=='logs') echo "active" ?>"><i class="mdi mdi-checkbox-multiple-marked-outline fa-fw"></i> <span class="hide-menu">System Logs<span class="fa arrow"></span></span></a>
            <ul class="nav nav-second-level">
                <li> <a href="transaction-logs" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Transaction Logs </span></a>
                   
                </li>
				 <li> <a href="system-logs" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">View System Logs </span></a>
                   
                </li>
				</ul>
                
             
        </li>

       

        <li> <a href="javascript:void(0)" class="waves-effect <?php if($active=='breeding') echo "active" ?>"><i class="mdi mdi-checkbox-multiple-marked-outline fa-fw"></i> <span class="hide-menu">Breeding<span class="fa arrow"></span></span></a>
            <ul class="nav nav-second-level">
                <li> <a href="wheel-heat-animals"><i data-icon="7" class="fa fa-arrow-alt-circle-right fa-fw"></i><span class="hide-menu">Pending Heat</span></a> </li>
                <li> <a href="wheel-heat-test"><i data-icon="7" class="fa fa-arrow-alt-circle-right fa-fw"></i><span class="hide-menu">Monitor Signs of Heat</span></a> </li>
                <li> <a href="wheel-preg-test"><i data-icon="7" class="fa fa-arrow-alt-circle-right fa-fw"></i><span class="hide-menu">Pending Pregnancy Test</span></a> </li>
                <li> <a href="wheel-pregnant"><i data-icon="7" class="fa fa-arrow-alt-circle-right fa-fw"></i><span class="hide-menu">Expecting Mothers</span></a> </li>
            </ul>
        </li>
		
		
		
</ul>
</div>
</div>