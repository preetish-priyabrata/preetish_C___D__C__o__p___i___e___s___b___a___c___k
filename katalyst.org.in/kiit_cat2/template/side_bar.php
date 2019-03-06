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
                 <li class="list-title">Menu</li>
                 <li><a href="enquiryList.php"><i class="icon-display4"></i><span class="list-label"> Enquiry List</span></a></li>
                 <li><a href="enrollList.php"><i class="icon-display4"></i><span class="list-label"> Enrollment List</span></a></li>
                 
                
                    <li><a href="#"><i class="icon-stack2"></i> <span>Certificate</span></a>
                        <ul> 
                            <li><a href=" certificate_add.php">Generate Certificate</a></li>
                            <li><a href="certificate_view.php">View Certificate</a></li>
                            <li><a href="certificate_view_roll.php">View Certificate By Roll</a></li>
                        </ul>
                    </li>
                    
                  
                    <li><a href="#"><i class="icon-stack2"></i> <span>Notice</span></a>
                        <ul> 
                            <li><a href="noticeForm.php">Add Notice</a></li>
                            <li><a href="manageNotice.php">Manage Notice</a></li>
                        </ul>
                    </li>
                   
                    
                  <li><a href="#"><i class="icon-stack2"></i> <span>Programs Details</span></a>
                        <ul> 
                            <li><a href="course_details.php">Add Program</a></li>
                            <li><a href="course_details_view.php">View Program</a></li>
                            <li><a href="course_details_view_ongoing.php">View Ongoing Program</a></li>
                            <li><a href="course_details_view_complete.php">View Completed Program</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="icon-stack2"></i> <span>Batch</span></a>
                        <ul> 
                            <li><a href="add_batch.php">Add Batch</a></li>
                            <li><a href="add_batch_view.php">View Batch</a></li>
                            <li><a href="add_batch_view_ongoing.php">View Ongoing Batch</a></li>
                            <li><a href="add_batch_view_complete.php">View Completed Batch</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="icon-stack2"></i> <span>Report</span></a>
                       <ul>                            
                            <li class="acc-parent-li">
                                <a href="#" class="acc-parent">Upcoming Program<span class="acc-icon"></span></a>
                                <ul style="display: block;">
                                    <li><a href="report_upcoming_event_inhouse.php"><small>In-House Comming Program</small></a></li>
                                    
                                    <li><a href="report_upcoming_event_vender.php"><small>Vendor Comming Program</small></a></li>
                                </ul>
                            </li>
                            <li class="acc-parent-li">
                                <a href="#" class="acc-parent">On-Going Program<span class="acc-icon"></span></a>
                                <ul style="display: block;">
                                    <li><a href="report_ongoing_program_inhouse.php"><small> In-House On-going Program</small></a></li>
                                    
                                    <li><a href="report_ongoing_program_vendor.php"><small> Vendor On-going Program</small></a></li>
                                </ul>
                            </li>
                            <li class="acc-parent-li">
                                <a href="#" class="acc-parent">Complteted Programs<span class="acc-icon"></span></a>
                                <ul style="display: block;">
                                    <li><a href="report_completed_program_inhouse.php">In-House Program</a></li>
                                    
                                    <li><a href="report_completed_program_vendor.php">Vendor Program</a></li>
                                 </ul>
                            </li>
                        </ul>
                    </li> 
<!--                     <li><a href="#"><i class="icon-stack2"></i> <span>Report</span></a>
                        <ul> 
                            <li><a href="report_upcoming_event.php">Upcoming Events</a></li>
                            <li><a href="#">View Batch</a></li>
                            <li><a href="#">View Ongoing Batch</a></li>
                            <li><a href="#">View Completed Batch</a></li>
                        </ul>
                    </li> -->
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

