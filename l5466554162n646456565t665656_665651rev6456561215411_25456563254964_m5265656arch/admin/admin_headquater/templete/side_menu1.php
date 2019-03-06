<?php 
// include  '../config.php';
?>
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
                    <a class="user-name hidden-xs" data-toggle="dropdown">Sipra Hota <i class="icon-more2"></i><small>Administrator</small></a>
                    <a href="#" class="btn-user dropdown-toggle hidden-xs" data-toggle="dropdown"><img src="../asserts/img/demo/img1.jpg" class="img-circle user" alt=""/></a>
                    <a href="#" class="dropdown-toggle visible-xs" data-toggle="dropdown"><i class="icon-more"></i></a>
                    <div class="dropdown-menu no-padding">
                        <div class="user-icon text-center p-t-15">
                            <img src="../asserts/img/demo/img1.jpg" class="img-circle" alt=""/>
                            <h5 class="text-center p-b-15 text-semibold">Hi! Sipra</h5>
                        </div>
                       <!--  <ul class="user-links">
                            <li><a href="#"><i class="icon-profile"></i> My profile</a></li>
                            <li><a href="#"><i class="icon-envelop5"></i> Inbox <span class="badge badge-danger pull-right">4</span></a></li>
                            <li><a href="#"><i class="icon-cogs"></i> Profile settings</a></li>
                            <li><a href="#"><i class="icon-lock5"></i> Lock screen</a></li>
                        </ul> -->
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
                 <li class="list-title">Head Quarter Store Menu</li>
                <!--  <li><a href="#"><i class="icon-stack2"></i> <span>Stock Management</span></a>
                        <ul> 
                            <li><a href="headquarter_add_stock.php">Add Stock <span class="label label-success">New</span></a></li>

                            <li><a href="headquarter_view_stock.php">View HQ Stock</a></li>
                        </ul>
                    </li> -->
                    <li><a href="#"><i class="icon-stack2"></i> <span>S.M.R Management</span></a>
                       <ul> 
                            <li><a href="headquarter_receive_site_mr_list.php">S.M.R Received <span class="label label-success">New</span></a></li>
                            <li><a href="headquarter_receive_site_mr_complete_list.php">History Of S.M.R Received </a></li>
                          <!--   <li><a href="headquarter_view_site_mr_list.php">View M.R List </a></li> -->
                        <!--<li class="acc-parent-li">
                                <a href="#" class="acc-parent">M.R Histroy<span class="acc-icon"></span></a>
                                <ul style="display: block;">
                                <li><a href="zonal_.php">Field M.R Received</a></li>
                                <li><a href="zonal_mr_histroy.php">Site M.R Send</a></li>
                                </ul>
                            </li> -->
                           
                        </ul>
                    </li> 
                 
                    <li><a href="#"><i class="icon-stack2"></i> <span> Challan Management</span></a>
                        <ul> 
                            <li><a href="headquarter_received_site_challan_history.php">History Of Challan Issued</a></li>
                        </ul>
                    </li>

                    <li><a href="#"><i class="icon-stack2"></i> <span>Return Challan Mgnt</span></a>
                        <ul> 
                            <li><a href="headquarter_return_challan_list.php">Return Challan<span class="label label-success">New</span> </a></li>
                            <li><a href="headquarter_return_history_challan_list.php">History Of Return Challan Received  </a></li>
                        </ul>
                    </li>

                    <li><a href="#"><i class="icon-stack2"></i> <span>Invoice</span></a>
                        <ul> 
                            <li><a href="headquarter_invoice_add_new.php">Add Invoice<span class="label label-success">New</span> </a></li>
                            <li><a href="headquarter_invoice_add_view.php">View Invoice  </a></li> 
                        </ul>
                    </li>

                    <li><a href="#"><i class="icon-stack2"></i> <span>Transfer Management</span></a>
                        <ul> 
                            <li><a href="hq_transfer_raise.php">Raise Request To Transfer </a></li>
                            <!-- <li><a href="hq_transfer_raise_t.php">Send Request To Transfer  </a></li> -->
                            <li><a href="hq_transfer_raise_t_issue.php">Send Request To Transfer</a></li>
                            <li><a href="hq_transfer_raise_t_issue_T.php">Generate Transfer Challan </a></li>
                            <li><a href="hq_transfer_raise_t_complete_transfer_view.php">List Of Transfer Request Completed </a></li>
                        </ul>
                    </li>


                    <li><a href="#"><i class="icon-stack2"></i> <span>Reporting</span></a>
                        <ul> 
                        <li><a href="hq_report1.php">Machine Spare Consumption</a></li>
                        <li><a href="hq_report2.php">Lead Time Analysis</a></li>
                        <li><a href="hq_report3.php">Report On Site Stock</a></li>
                        <li><a href="hq_report4.php">Report On Site Return</a></li>
                        <li><a href="hq_report5.php">Report On Site Material Requsition</a></li>
                        <li><a href="hq_report6.php">Material Dispatch To Site</a></li>
                        <li><a href="hq_report7.php">Machine Efficency </a></li>
                        <li><a href="hq_report8.php">Report On Material Issue(Machine)</a></li> 
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

