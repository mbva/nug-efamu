<div class="sidebar-nav slimscrollsidebar">
    <div class="sidebar-head">
        <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3> </div>
    <ul class="nav" id="side-menu">
        <li class="user-pro">
            <a href="#" class="waves-effect"><img src="../plugins/images/users/varun.jpg" alt="user-img" class="img-circle"> <span class="hide-menu">
                       <?php
                       include '../db.php';
                       $user_id = $_SESSION['memberid'];
                       $mnames = mysqli_fetch_array(mysqli_query($con,"select full_names from users where memberid='$user_id'"));
                       echo $mnames['full_names'];
                       ?>
                    <span class="fa arrow"></span></span>
            </a>
            <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
                <li><a href="javascript:void(0)"><i class="ti-user"></i> <span class="hide-menu">My Profile</span></a></li>
                <li><a href="javascript:void(0)"><i class="ti-wallet"></i> <span class="hide-menu">My Balance</span></a></li>
                <li><a href="javascript:void(0)"><i class="ti-email"></i> <span class="hide-menu">Inbox</span></a></li>
                <li><a href="javascript:void(0)"><i class="ti-settings"></i> <span class="hide-menu">Account Setting</span></a></li>
                <li><a href="javascript:void(0)"><i class="fa fa-power-off"></i> <span class="hide-menu">Logout</span></a></li>
            </ul>
        </li>

        <li><a href="admin-dashboard.php" class="waves-effect"><i class="mdi mdi-av-timer fa-fw"></i> <span class="hide-menu">Dashboard</span></a></li>

        <li> <a href="javascript:void(0)" class="waves-effect"><i class="mdi mdi-checkbox-multiple-marked-outline fa-fw"></i> <span class="hide-menu">Animal<span class="fa arrow"></span></span></a>
            <ul class="nav nav-second-level">
                <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Registration </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li> <a href="register-animal"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">New</span></a> </li>
                        <li> <a href="view-animal-registration"><i class="fa fa-eye-slash fa-fw"></i><span class="hide-menu">View</span></a> </li>
                    </ul>
                </li>
                <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Calving </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li> <a href="add"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">New</span></a> </li>
                        <li> <a href="javascript:void(0)"><i class="fa fa-eye-slash fa-fw"></i><span class="hide-menu">View</span></a> </li>
                    </ul>
                </li>
                <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Weight Tracker </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li> <a href="javascript:void(0)"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">New</span></a> </li>
                        <li> <a href="javascript:void(0)"><i class="fa fa-eye-slash fa-fw"></i><span class="hide-menu">View</span></a> </li>
                    </ul>
                </li>
                <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">10 Day </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li> <a href="javascript:void(0)"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">New</span></a> </li>
                        <li> <a href="javascript:void(0)"><i class="fa fa-eye-slash  fa-fw"></i><span class="hide-menu">View</span></a> </li>
                    </ul>
                </li>
                <li> <a href="javascript:void(0)"><i data-icon="7" class="fa fa-user fa-fw"></i><span class="hide-menu">Animal Profile</span></a> </li>
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

        <li> <a href="javascript:void(0)" class="waves-effect"><i class="mdi mdi-checkbox-multiple-marked-outline fa-fw"></i> <span class="hide-menu">Breeding<span class="fa arrow"></span></span></a>
            <ul class="nav nav-second-level">
                <li> <a href="javascript:void(0)"><i data-icon="7" class="fa fa-arrow-alt-circle-right fa-fw"></i><span class="hide-menu">Pending Heat</span></a> </li>
                <li> <a href="javascript:void(0)"><i data-icon="7" class="fa fa-arrow-alt-circle-right fa-fw"></i><span class="hide-menu">Monitor Signs of Heat</span></a> </li>
                <li> <a href="javascript:void(0)"><i data-icon="7" class="fa fa-arrow-alt-circle-right fa-fw"></i><span class="hide-menu">Pending Pregnancy Test</span></a> </li>
                <li> <a href="javascript:void(0)"><i data-icon="7" class="fa fa-arrow-alt-circle-right fa-fw"></i><span class="hide-menu">Expecting Mothers</span></a> </li>
            </ul>
        </li>

        <li> <a href="javascript:void(0)" class="waves-effect"><i class="mdi mdi-checkbox-multiple-marked-outline fa-fw"></i> <span class="hide-menu">System Settings<span class="fa arrow"></span></span></a>
            <ul class="nav nav-second-level">
                <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Manage Doctors </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li> <a href="javascript:void(0)"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">New</span></a> </li>
                        <li> <a href="javascript:void(0)"><i class="fa fa-eye-slash fa-fw"></i><span class="hide-menu">View</span></a> </li>
                    </ul>
                </li>
                <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Manage Expenses </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li> <a href="javascript:void(0)"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">New</span></a> </li>
                        <li> <a href="javascript:void(0)"><i class="fa fa-eye-slash fa-fw"></i><span class="hide-menu">View</span></a> </li>
                    </ul>
                </li>
                <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Manage Acaricides </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li> <a href="javascript:void(0)"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">New</span></a> </li>
                        <li> <a href="javascript:void(0)"><i class="fa fa-eye-slash fa-fw"></i><span class="hide-menu">View</span></a> </li>
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
                        <li> <a href="javascript:void(0)"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">New</span></a> </li>
                        <li> <a href="javascript:void(0)"><i class="fa fa-eye-slash  fa-fw"></i><span class="hide-menu">View</span></a> </li>
                    </ul>
                </li>
                <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Manage Breeds </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li> <a href="javascript:void(0)"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">New</span></a> </li>
                        <li> <a href="javascript:void(0)"><i class="fa fa-eye-slash  fa-fw"></i><span class="hide-menu">View</span></a> </li>
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
        <li> <a href="javascript:void(0)" class="waves-effect"><i class="mdi mdi-checkbox-multiple-marked-outline fa-fw"></i> <span class="hide-menu">User Permissions<span class="fa arrow"></span></span></a>
            <ul class="nav nav-second-level">
                <li> <a href="javascript:void(0)"><i data-icon="7" class="fa fa-arrow-alt-circle-right fa-fw"></i><span class="hide-menu">Add</span></a> </li>
                <li> <a href="javascript:void(0)"><i data-icon="7" class="fa fa-arrow-alt-circle-right fa-fw"></i><span class="hide-menu">View </span></a> </li>
                <li> <a href="javascript:void(0)"><i data-icon="7" class="fa fa-arrow-alt-circle-right fa-fw"></i><span class="hide-menu">edit</span></a> </li>
            </ul>
        </li>
        <li> <a href="javascript:void(0)" class="waves-effect"><i class="mdi mdi-checkbox-multiple-marked-outline fa-fw"></i> <span class="hide-menu">System Logs<span class="fa arrow"></span></span></a>
            <ul class="nav nav-second-level">
                <li> <a href="javascript:void(0)"><i data-icon="7" class="fa fa-arrow-alt-circle-right fa-fw"></i><span class="hide-menu">Add</span></a> </li>
                <li> <a href="javascript:void(0)"><i data-icon="7" class="fa fa-arrow-alt-circle-right fa-fw"></i><span class="hide-menu">View </span></a> </li>
                <li> <a href="javascript:void(0)"><i data-icon="7" class="fa fa-arrow-alt-circle-right fa-fw"></i><span class="hide-menu">edit</span></a> </li>
            </ul>
        </li>
        <li> <a href="javascript:void(0)" class="waves-effect"><i class="mdi mdi-checkbox-multiple-marked-outline fa-fw"></i> <span class="hide-menu">Recycle Bin<span class="fa arrow"></span></span></a>
            <ul class="nav nav-second-level">
                <li> <a href="javascript:void(0)"><i data-icon="7" class="fa fa-arrow-alt-circle-right fa-fw"></i><span class="hide-menu">View</span></a> </li>
            </ul>
        </li>
        <li> <a href="javascript:void(0)" class="waves-effect"><i class="mdi mdi-checkbox-multiple-marked-outline fa-fw"></i> <span class="hide-menu">System Logs<span class="fa arrow"></span></span></a>
            <ul class="nav nav-second-level">
                <li> <a href="javascript:void(0)"><i data-icon="7" class="fa fa-arrow-alt-circle-right fa-fw"></i><span class="hide-menu">View Transaction Logs</span></a> </li>
                <li> <a href="javascript:void(0)"><i data-icon="7" class="fa fa-arrow-alt-circle-right fa-fw"></i><span class="hide-menu">View System Logs</span></a> </li>
            </ul>
        </li>
    </ul>
</div>