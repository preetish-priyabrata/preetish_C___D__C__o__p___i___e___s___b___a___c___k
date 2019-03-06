<header class="main-nav clearfix">
    <div class="navbar-left pull-left">
        <div class="clearfix">
            <ul class="left-branding pull-left">
                <li class="visible-handheld"><span class="left-toggle-switch"><i class="icon-menu7"></i></span></li>
                <li>
                    <a href="admin_dashboard.php"><div class="logo"></div></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="navbar pull-right">
        <div class="clearfix">
            <ul class="pull-right top-icons">
                <li><a href="#" class="btn-top-search visible-xs"><i class="icon-search4"></i></a></li>
                <!-- User dropdown -->
                <li class="dropdown user-dropdown">
                    <a class="user-name hidden-xs" data-toggle="dropdown">Jane Elliott <i class="icon-more2"></i><small>Administrator</small></a>
                    <a href="#" class="btn-user dropdown-toggle hidden-xs" data-toggle="dropdown"><img src="../asserts/img/demo/img1.jpg" class="img-circle user" alt=""/></a>
                    <a href="#" class="dropdown-toggle visible-xs" data-toggle="dropdown"><i class="icon-more"></i></a>
                    <div class="dropdown-menu no-padding">
                        <div class="user-icon text-center p-t-15">
                            <img src="../asserts/img/demo/img1.jpg" class="img-circle" alt=""/>
                            <h5 class="text-center p-b-15 text-semibold">Hi! Jane Elliott</h5>
                        </div>
                        <ul class="user-links">
                            <li><a href="#"><i class="icon-profile"></i> My profile</a></li>
                            <li><a href="#"><i class="icon-envelop5"></i> Inbox <span class="badge badge-danger pull-right">4</span></a></li>
                            <li><a href="#"><i class="icon-cogs"></i> Profile settings</a></li>
                            <li><a href="#"><i class="icon-lock5"></i> Lock screen</a></li>
                        </ul>
                        <div class="text-center p-10"><a href="../logout.php" class="btn btn-block"><i class="icon-exit3 i-16 position-left"></i> Logout</a></div>
                    </div>
                </li>
                    <!-- /User dropdown -->
            </ul>
        </div>
    </div>
        <!-- /Navbar icons -->
</header>
<!-- /Header ends -->
<!-- Sidebar -->
 <aside class="menu">
    <div class="left-aside-container">
       <div class="menu-container handheld">
         </div>
            <div class="menu-container screen">
               <ul class="sidebar-accordion">
                 <li class="list-title">General Setting</li>
                    <li><a href="#"><i class="icon-compass4"></i> <span>Location Setting</span></a>
                       <ul>                            
                            <li class="acc-parent-li">
                                <a href="#" class="acc-parent">HeadQuarter Location<span class="acc-icon"></span></a>
                                <ul style="display: block;">
                                
                                    
                                    <li><a href="admin_location_add_hq_view.php">View HeadQuarter</a></li>
                                </ul>
                            </li>
                            <li class="acc-parent-li">
                                <a href="#" class="acc-parent">Zonal Location<span class="acc-icon"></span></a>
                                <ul style="display: block;">
                                    <li><a href="admin_location_add_Zonal.php">Add Zonal <span class="label label-success">New</span></a></li>
                                    
                                    <li><a href="admin_location_add_Zonal_view.php">View Zonal</a></li>
                                </ul>
                            </li>
                            <li class="acc-parent-li">
                                <a href="#" class="acc-parent">Field Location<span class="acc-icon"></span></a>
                                <ul style="display: block;">
                                    <li><a href="admin_location_add_Field.php">Add Field <span class="label label-success">New</span></a></li>
                                    
                                    <li><a href="admin_location_add_Field_view.php">View Field</a></li>
                                 </ul>
                            </li>
                        </ul>
                    </li> 
           
                    <li><a href="#"><i class="icon-stack2"></i> <span>Unit System</span></a>
                        <ul> 
                            <li><a href="admin_add_unit.php">Add Unit <span class="label label-success">New</span></a></li>
                            <li><a href="admin_add_unit_view.php">View Unit</a></li>
                        </ul>
                    </li>  
                   
                    <li><a href="#"><i class="icon-stack2"></i> <span>Machine Model No Info</span></a>
                        <ul> 
                            <li><a href="admin_add_machine_model_no.php">Add Model No <span class="label label-success">New</span></a></li>
                            <li><a href="admin_add_machine_model_no_view.php">View Model No </a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="icon-stack2"></i> <span>Machine Information</span></a>
                        <ul> 
                            <li><a href="admin_add_machine_details.php">Add Machine Detail<span class="label label-success">New</span></a></li>
                            <li><a href="admin_add_machine_details_view.php">View Machine List</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="icon-stack2"></i> <span>Assign Machine Info</span></a>
                        <ul> 
                            <li><a href="admin_assign_machine_details.php">Assign Machine <span class="label label-success">New</span></a></li>
                            <li><a href="admin_assign_machine_details_view.php">View Machine Assigned List</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="icon-stack2"></i> <span>Component Information</span></a>
                        <ul> 
                            <li><a href="admin_add_item.php">Add Component <span class="label label-success">New</span></a></li>
                            <li><a href="admin_add_item_view.php">View Component List</a></li>
                            <li><a href="admin_add_item_model_view.php">View Component Model List</a></li>
                        </ul>
                    </li>

                    <li><a href="#"><i class="icon-stack2"></i> <span>Users Information</span></a>
                        <ul> 
                            <li><a href="admin_add_Users.php">Add Users <span class="label label-success">New</span></a></li>
                            <li><a href="admin_add_Users_view.php">View Users List</a></li>
                            <!-- <li><a href="admin_add_item_model_view.php">View Material Model List</a></li> -->
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /Main menu -->
            <style>
            @media screen and (min-width: 1024px){
                .menu-container.screen{
                    display: inherit;
                }
                .menu-container.handheld{
                    display: none;
                }
            }
            @media screen and (max-width: 1023px){
                .menu-container.screen{
                    display: none;
                }
                .menu-container.handheld{
                    display: inherit;
                }
            }
            </style>
        </div>
    </aside>
    <!-- /Sidebar -->

