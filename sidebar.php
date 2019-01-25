
<div class="sidebar-nav slimscrollsidebar">
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


        <li><a href="dashboard" class="waves-effect"><i class="mdi mdi-av-timer fa-fw"></i> <span class="hide-menu">Dashboard</span></a></li>

        <li> <a href="javascript:void(0)" class="waves-effect <?php if($active=='animal') echo "active" ?>"><i class="mdi mdi-checkbox-multiple-marked-outline fa-fw"></i> <span class="hide-menu">Animal<span class="fa arrow"></span></span></a>
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
        <li> <a href="javascript:void(0)" class="waves-effect <?php if($active=='health') echo "active" ?>"><i class="mdi mdi-checkbox-multiple-marked-outline fa-fw"></i> <span class="hide-menu">Health<span class="fa arrow"></span></span></a>
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

        <li> <a href="javascript:void(0)" class="waves-effect <?php if($active=='feeding') echo "active" ?>"><i class="mdi mdi-checkbox-multiple-marked-outline fa-fw"></i> <span class="hide-menu">Feeding<span class="fa arrow"></span></span></a>
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

        <li> <a href="javascript:void(0)" class="waves-effect"><i class="mdi mdi-checkbox-multiple-marked-outline fa-fw"></i> <span class="hide-menu">Farm<span class="fa arrow"></span></span></a>
            <ul class="nav nav-second-level">
                <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Registration </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li> <a href="javascript:void(0)"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">New</span></a> </li>
                        <li> <a href="javascript:void(0)"><i class="fa fa-eye-slash fa-fw"></i><span class="hide-menu">View</span></a> </li>
                    </ul>
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

        <li> <a href="javascript:void(0)" class="waves-effect <?php if($active=='settings') echo "active" ?>"><i class="mdi mdi-checkbox-multiple-marked-outline fa-fw"></i> <span class="hide-menu">System Settings<span class="fa arrow"></span></span></a>
            <ul class="nav nav-second-level">
                <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Manage Doctors </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">

                        <li> <a href="manage-doctors"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">New</span></a> </li>
                        <li> <a href="view-doctors"><i class="fa fa-eye-slash fa-fw"></i><span class="hide-menu">View</span></a> </li>

                    </ul>
                </li>
                <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Manage Expenses </span><span class="fa arrow"></span></a>
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
        <li> <a href="javascript:void(0);" class="waves-effect <?php if($active=='u-permissions') echo "active" ?>"><i class="mdi mdi-checkbox-multiple-marked-outline fa-fw"></i> <span class="hide-menu">User Permissions<span class="fa arrow"></span></span></a>
            <ul class="nav nav-second-level">
                <li> <a href="register-animal"><i data-icon="7" class="fa fa-arrow-alt-circle-right fa-fw"></i><span class="hide-menu">Add</span></a> </li>
                <li> <a href="view-animal-registration"><i data-icon="7" class="fa fa-arrow-alt-circle-right fa-fw"></i><span class="hide-menu">View </span></a> </li>
                <li> <a href="javascript:void(0)"><i data-icon="7" class="fa fa-arrow-alt-circle-right fa-fw"></i><span class="hide-menu">edit</span></a> </li>
            </ul>
        </li>
        <li> <a href="javascript:void(0)" class="waves-effect <?php if($active=='recycle') echo "logs"; ?>"><i class="mdi mdi-checkbox-multiple-marked-outline fa-fw"></i> <span class="hide-menu">System Logs<span class="fa arrow"></span></span></a>
            <ul class="nav nav-second-level">
                <li> <a href="javascript:void(0)"><i data-icon="7" class="fa fa-arrow-alt-circle-right fa-fw"></i><span class="hide-menu">Add</span></a> </li>
                <li> <a href="javascript:void(0)"><i data-icon="7" class="fa fa-arrow-alt-circle-right fa-fw"></i><span class="hide-menu">View </span></a> </li>
                <li> <a href="javascript:void(0)"><i data-icon="7" class="fa fa-arrow-alt-circle-right fa-fw"></i><span class="hide-menu">edit</span></a> </li>
            </ul>
        </li>
        <li> <a href="javascript:void(0)" class="waves-effect <?php if($active=='recycle') echo "active"; ?>"><i class="mdi mdi-checkbox-multiple-marked-outline fa-fw"></i> <span class="hide-menu">Recycle Bin<span class="fa arrow"></span></span></a>
            <ul class="nav nav-second-level">
                <li> <a href="javascript:void(0)"><i data-icon="7" class="fa fa-arrow-alt-circle-right fa-fw"></i><span class="hide-menu">View</span></a> </li>
            </ul>
        </li>
        <li> <a href="javascript:void(0)" class="waves-effect <?php if($active=='logs') echo "active"; ?>"><i class="mdi mdi-checkbox-multiple-marked-outline fa-fw"></i> <span class="hide-menu">System Logs<span class="fa arrow"></span></span></a>
            <ul class="nav nav-second-level">
                <li> <a href="javascript:void(0)"><i data-icon="7" class="fa fa-arrow-alt-circle-right fa-fw"></i><span class="hide-menu">View Transaction Logs</span></a> </li>
                <li> <a href="javascript:void(0)"><i data-icon="7" class="fa fa-arrow-alt-circle-right fa-fw"></i><span class="hide-menu">View System Logs</span></a> </li>
            </ul>
        </li>
    </ul>
</div>