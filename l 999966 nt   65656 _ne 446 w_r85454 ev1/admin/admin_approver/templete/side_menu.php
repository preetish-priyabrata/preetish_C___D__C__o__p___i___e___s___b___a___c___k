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
                    <a class="user-name hidden-xs" data-toggle="dropdown">Jane Elliott <i class="icon-more2"></i><small>Administrator</small></a>
                    <a href="#" class="btn-user dropdown-toggle hidden-xs" data-toggle="dropdown"><img src="../asserts/img/demo/img1.jpg" class="img-circle user" alt=""/></a>
                    <a href="#" class="dropdown-toggle visible-xs" data-toggle="dropdown"><i class="icon-more"></i></a>
                    <div class="dropdown-menu no-padding">
                        <div class="user-icon text-center p-t-15">
                            <img src="../asserts/img/demo/img1.jpg" class="img-circle" alt=""/>
                            <h5 class="text-center p-b-15 text-semibold">Hi! Jane Elliott</h5>
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
                 <li class="list-title">Approver Menu</li>
                    <li><a href="#"><i class="icon-stack2"></i> <span>Requsition Management</span></a>
                       <ul> 
                        <?php 
                        $user_id=$_SESSION['user_id'];  
                        $check_mr="SELECT * FROM `lt_master_zonal_material_requsition` WHERE `zmr_forward_id`= '$user_id' and `status`='1' and `sent_status`='1' and `forward_status`='0'";
                        $sql_check_mr=mysqli_query($conn,$check_mr);
                        $num_check_mr=mysqli_num_rows($sql_check_mr);
                       
                            ?>
                             <li><a href="approver_mr_receiver_list.php">Received S.M.R List <span class="badge badge-flat border-success text-success-600"><?=$num_check_mr?></span></a></li>
                         
                             <li><a href="approver_mr_receiver_approved_list.php">View Approved S.M.R List </a></li>
                                                       
<!--                             <li class="acc-parent-li">
                                <a href="#" class="acc-parent">M.R Histroy<span class="acc-icon"></span></a>
                                <ul style="display: block;">
                                    
                                    
                                    <li><a href="zonal_.php">Field M.R Received</a></li>
                                    <li><a href="zonal_mr_histroy.php">Site M.R Send</a></li>
                                </ul>
                            </li> -->
                           
                        </ul>
                    </li> 
                 
                   
                    <!-- <li><a href="#"><i class="icon-stack2"></i> <span>Issue M.R Information</span></a>
                        <ul> 
                            <li><a href="admin_add_machine_model_no.php">M.R Received<span class="label label-success">New</span></a></li>

                            <li><a href="admin_add_machine_model_no_view.php">M.R Issued</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="icon-stack2"></i> <span>Recieved Information</span></a>
                        <ul> 
                            <li><a href="admin_add_machine_details.php">Challan Received<span class="label label-success">New</span></a></li>
                            <li><a href="admin_add_machine_details_view.php">Challan Histroy</a></li>
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

