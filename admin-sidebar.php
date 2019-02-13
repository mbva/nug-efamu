      
	 	  <style>
            .scroll{ 
        height=70%
  overflow: auto;
               
            } 
			  </style>
			 

      
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


        <li><a href="admin-dashboard" class="waves-effect"><i class="mdi mdi-av-timer fa-dashboard"></i> <span class="hide-menu">Dashboard</span></a></li>
		
<li> <a href="javascript:void(0)" class="waves-effect <?php if($active=='settings') echo "active" ?>"><i class="mdi mdi-settings fa-gear"></i> <span class="hide-menu">System Settings<span class="fa arrow"></span></span></a>
            <ul class="nav nav-second-level">
                <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Farms</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">

                        <li> <a href="manage-farms"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">New</span></a> </li>
                       
					   <li> <a href="view-farms"><i class="fa fa-eye-slash fa-fw"></i><span class="hide-menu">View</span></a> </li>

                    </ul>
                </li>
        
                <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Manage Farmer Library </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
					
                        <li> <a href="add-farmerresources"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">New</span></a> </li>
                      
						<li> <a href="view-farmerresources"><i class="fa fa-eye-slash  fa-fw"></i><span class="hide-menu">View</span></a> </li>
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
		
		<li> <a href="javascript:void(0)" class="waves-effect <?php if($active=='settings') echo "active" ?>"><i class="mdi mdi-cash-multiple fa-setting"></i> <span class="hide-menu">Payments<span class="fa arrow"></span></span></a>
            <ul class="nav nav-second-level">
                <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Farm Subscription</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">

                        <li> <a href="farm-subscription"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">New</span></a> </li>
                       
					   <li> <a href="view-farms"><i class="fa fa-eye-slash fa-fw"></i><span class="hide-menu">View</span></a> </li>

                    </ul>
                </li>
             <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Payment Methods</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
					

                        <li> <a href="add-payment-method"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">New</span></a> </li>
                     
						<li> <a href="view-payment-methods"><i class="fa fa-eye-slash fa-fw"></i><span class="hide-menu">View</span></a> </li>

                    </ul>
                </li>
                <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Manage Farmer Library </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
					
                        <li> <a href="add-farmerresources"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">New</span></a> </li>
                      
						<li> <a href="view-farmerresources"><i class="fa fa-eye-slash  fa-fw"></i><span class="hide-menu">View</span></a> </li>
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
			
			<li> <a href="javascript:void(0)" class="waves-effect <?php if($active=='settings') echo "active" ?>"><i class="mdi  mdi-home-variant fa-setting"></i> <span class="hide-menu">Farms<span class="fa arrow"></span></span></a>
            <ul class="nav nav-second-level">
                <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Manage Farms</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">

                        <li> <a href="add-farms"><i class="fa fa-plus-square fa-fw"></i><span class="hide-menu">New</span></a> </li>
                       
					   <li> <a href="view-farms"><i class="fa fa-eye-slash fa-fw"></i><span class="hide-menu">View</span></a> </li>

                    </ul>
                </li>
				</ul>
				</li>
				
            </ul>
		
</ul>
</div>
</div>