
<style type="text/css">
    .navbar-brand
{
    position: absolute;
    width: 100%;
    left: 0;
    text-align: center;
    margin:0 auto;
    font-size: 2em;
}

</style>
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
    <a class="navbar-brand" href="index.php"><b class="text-uppercase">Inventory Management System</b></a>
    
    <div class="navbar pull-right">
        <div class="clearfix">
            <ul class="pull-right top-icons">
                <li><a href="#" class="btn-top-search visible-xs"><i class="icon-search4"></i></a></li>
                <!-- User dropdown -->
                <li class="dropdown user-dropdown">
                    <a class="user-name hidden-xs" data-toggle="dropdown"> <?=strtoupper($_SESSION['user_name']) ?>   <i class="icon-more2"></i><small>Head Quater</small></a>
                    <a href="#" class="btn-user dropdown-toggle hidden-xs" data-toggle="dropdown"><img src="../asserts/img/demo/img1.jpg" class="img-circle user" alt=""/></a>
                    <a href="#" class="dropdown-toggle visible-xs" data-toggle="dropdown"><i class="icon-more"></i></a>
                    <div class="dropdown-menu no-padding">
                        <div class="user-icon text-center p-t-15">
                            <img src="../asserts/img/demo/img1.jpg" class="img-circle" alt=""/>
                            <h5 class="text-center p-b-15 text-semibold">Hi! <?=strtoupper($_SESSION['user_name']) ?><br><small>Head Quater</small> </h5>
                        </div>
                        <ul class="user-links">
                            <li><a href="change_password.php"><i class="icon-cogs"></i> Change Password </a></li>
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
                 <li class="list-title">Head Quarter Store Menu</li>               
                    <li><a href="#"><i class="icon-stack2"></i> <span>S.M.R Management</span></a>
                       <ul> 
                            <li><a href="headquarter_receive_site_mr_list.php">S.M.R Received <span class="label label-success">New</span></a></li>
                            <li><a href="headquarter_receive_site_mr_save_challan.php">Saved Challan</a></li>
                            <li><a href="headquarter_receive_site_mr_complete_list.php">History Of S.M.R Received </a></li>
                        
                           
                        </ul>
                    </li> 
                 
                    <li><a href="#"><i class="icon-stack2"></i> <span> Challan Management</span></a>
                        <ul> 
                            <li><a href="headquarter_received_site_challan_history.php">History Of Challan Issued</a></li>
                        </ul>
                    </li>

                    <li><a href="#"><i class="icon-stack2"></i> <span>Return Challan Mgnt</span></a>
                        <ul> 
                           <!--  <li><a href="headquarter_return_challan_list.php">Return Challan<span class="label label-success">New</span> </a></li> -->
                            <li><a href="headquarter_return_history_challan_list.php">History Of Return Challan Received  </a></li>
                        </ul>
                    </li>

                    <li><a href="#"><i class="icon-stack2"></i> <span>Invoice</span></a>
                        <ul> 
                            <li><a href="headquarter_invoice_add_new.php">Add Invoice<span class="label label-success">New</span> </a></li>
                            <li><a href="headquarter_invoice_add_view.php">View Invoice  </a></li> 
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
                    <li><div class="logo_lab"><img src="../asserts/img/logo-light1.png"></div></li>
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

