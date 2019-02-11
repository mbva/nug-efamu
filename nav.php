<div class="navbar-header">
    <div class="top-left-part">
        <!-- Logo -->
        <a class="logo" href="dashboard">

             <img src="plugins/images/logo.png" alt="home" width="150" class="light-logo" />

        </a>
    </div>
    <!-- /Logo -->
    <!-- Search input and Toggle icon -->
    <ul class="nav navbar-top-links navbar-left">
        <li><a href="javascript:void(0)" class="open-close waves-effect waves-light"><i class="ti-menu"></i></a></li>
        <li class="dropdown">
            <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"> Farmer Library<i class="mdi mdi-book"></i>
                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
            </a>
            <ul class="dropdown-menu mailbox animated bounceInDown">
                <li>
                    <div class="drop-title">Latest From Library</div>
                </li>
                <li>
                    <div class="message-center">
					 <?php
    $select_tag = mysqli_query($con,"select * from farmerresources ORDER BY id desc LIMIT 7");
                              while ($tag = mysqli_fetch_array($select_tag)){
                                                                ?>

                                                             
                                                             
                                    <a target="_blank" href="<?php echo $tag['resourceurl']; ?>">
                                        <div class="mail-contnet">
                                            <h5><?php echo $tag['resourcetitle'];?></h5>  </div>
                                    </a>
									   <?php
                                                            }
                                                            ?>
                        
                    </div>
                </li>
                <li>
                    <a class="text-center" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                </li>
            </ul>
            <!-- /.dropdown-messages -->
        </li>
        <!-- .Task dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#">Analysis Reports <i class="mdi mdi-check-circle"></i>
                <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
            </a>
            <ul class="dropdown-menu dropdown-tasks animated slideInUp">
                <li>
                    <a href="graph-milk-sales">
                        <div>
                          Milk Sales
                        </div>
                    </a>
                </li>
               <li class="divider"></li>
               <li>
                    <a href="graph-weight-tracking">
                        <div>
                         Weight Tracking
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
               <li>
                    <a href="graph-animal-sales">
                        <div>
                         Animal Sales
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="graph-cashflow">
                        <div>
                          Income Flow
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a class="text-center" href="#"> <strong>See All Tasks</strong> <i class="fa fa-angle-right"></i> </a>
                </li>
            </ul>
        </li>
		
		<!-- .Megamenu -->
        <li class="mega-dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><span class="hidden-xs">Advanced Settings</span> <i class="icon-options-vertical"></i></a>
            <ul class="dropdown-menu mega-dropdown-menu animated bounceInDown">
                <li class="col-sm-2">
                    <ul>
                        <li class="dropdown-header">Manage Permissions </li>
                        <li><a href="permission_select">Add Permissions</a></li>
                        <li><a href="view_permissions">View Permissions</a></li>
                        <li><a href="edit_permissions">Edit Permissions</a></li>
                    </ul>
                </li>
				
				
				 <li class="col-sm-2">
                    <ul>
                        <li class="dropdown-header">System Audit </li>
                        <li><a href="transaction-logs">Transaction Logs</a></li>
                        <li><a href="system-logs">System Logs</a></li>
                        
                    </ul>
                </li>

				
				 <li class="col-sm-2">
                    <ul>
                        <li class="dropdown-header">Manage Users </li>
                        <li><a href="add-users">Add New User</a></li>
                        <li><a href="view-users">View Existing Users</a></li>
                        
                    </ul>
                </li>
				 <li class="col-sm-2">
                    <ul>
                        <li class="dropdown-header">Manage Employees </li>
                        <li><a href="add-employees">Add Employees</a></li>
                        <li><a href="view-employees">View Employees</a></li>
                        
                    </ul>
                </li>
               
            </ul>
        </li>
        <!-- /.Megamenu -->
		
		<!-- .Megamenu -->
       
       
    </ul>
    <ul class="nav navbar-top-links navbar-right pull-right">
        <li>
            <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="plugins/images/users/user.png" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">
                    <?php
                    include 'db.php';
                    $user_id = $_SESSION['memberid'];
                    $mnames = mysqli_fetch_array(mysqli_query($con,"select full_names from users where memberid='$user_id'"));
                    echo $mnames['full_names'];
                    ?>
                </b><span class="caret"></span> </a>
            <ul class="dropdown-menu dropdown-user animated flipInY">
                <li>
                    <div class="dw-user-box">
                        <div class="u-img"><img src="plugins/images/users/user.png" alt="user" /></div>
                        <div class="u-text">
                            <h4><?php echo $mnames['full_names'];?></h4>
                           <a href="#" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                    </div>
                </li>
                <li role="separator" class="divider"></li>
                <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                <!--
                <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                <li role="separator" class="divider"></li>
                -->
                <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="logout"><i class="fa fa-power-off"></i> Logout</a></li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
</div>
<!-- /.navbar-header -->
<!-- /.navbar-top-links -->
<!-- /.navbar-static-side -->