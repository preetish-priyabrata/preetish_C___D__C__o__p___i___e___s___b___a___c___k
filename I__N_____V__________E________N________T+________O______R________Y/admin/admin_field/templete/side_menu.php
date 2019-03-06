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
                    <a class="user-name hidden-xs" data-toggle="dropdown"><?=strtoupper($_SESSION['user_name']) ?>  <i class="icon-more2"></i><small>Field Officer</small></a>
                    <a href="#" class="btn-user dropdown-toggle hidden-xs" data-toggle="dropdown"><img src="../asserts/img/demo/img1.jpg" class="img-circle user" alt=""/></a>
                    <a href="#" class="dropdown-toggle visible-xs" data-toggle="dropdown"><i class="icon-more"></i></a>
                    <div class="dropdown-menu no-padding">
                        <div class="user-icon text-center p-t-15">
                            <img src="../asserts/img/demo/img1.jpg" class="img-circle" alt=""/>
                            <h5 class="text-center p-b-15 text-semibold">Hi! <?=strtoupper($_SESSION['user_name']) ?> </h5>
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
                 <li class="list-title">Field Store Menu</li>
                    <li><a href="#"><i class="icon-stack2"></i> <span>Requsition Management</span></a>
                       <ul> 
                            <?php 
                        $field_place=$_SESSION['field_place'];  
                        $check_mr="SELECT * FROM `lt_master_field_material_requsition` WHERE `fmr_site_from_location_id`= '$field_place' and `status`='0'";
                        $sql_check_mr=mysqli_query($conn,$check_mr);
                        $num_check_mr=mysqli_num_rows($sql_check_mr);
                        if($num_check_mr=='0'){
                            ?>
                             <li><a href="field_mr_raised_machine.php">Raise Field M.R <span class="label label-success">New</span></a></li>
                            <?php
                        }else{
                            $fetch_check_mr=mysqli_fetch_assoc($sql_check_mr);
                            $lid=web_encryptIt($fetch_check_mr['fmr_slno']);
                            $site_list=web_encryptIt($fetch_check_mr['fmr_unqiue_mr_id']);
                            $machine_no=$fetch_check_mr['machine_no'];
                            ?>

                            <li><a href="field_mr_raised_detail.php?slno=<?=$lid?>&token_list=<?=$site_list?>&machine_no=<?=$machine_no?>">InComplete Field M.R</a></li>
                        <?php }
                        ?>
                        <li><a href="field_mr_raised_request.php">Your Field M.R Request</a></li>
                          
                            <li class="acc-parent-li">
                                <a href="#" class="acc-parent">M.R Histroy<span class="acc-icon"></span></a>
                                <ul style="display: block;">
                                    <li><a href="field_mr_send_view.php">Field M.R Sent</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="icon-stack2"></i> <span>Challan Management</span></a>
                        <ul>
                            <li><a href="field_challan_new_issue.php">challan Receive<span class="label label-success">New</span></a></li>

                            <li><a href="field_challan_new_issue_receive_history.php">Challan History</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="icon-stack2"></i> <span>Stock Management</span></a>
                        <ul> 
                            <li><a href="field_stock_present_view.php">Stock View <span class="label label-success">New</span></a></li>
                            <!-- <li><a href="field_stock_damage_view.php">Stock Damage View <span class="label label-success">New</span></a></li> -->
                        </ul>
                    </li>
                    <li><a href="#"><i class="icon-stack2"></i> <span>Return Management</span></a>
                        <ul> 
                            <li><a href="field_stock_challan_return.php">Generate Stock Return Challan<span class="label label-success">New</span></a></li>
                            <li><a href="field_stock_challan_return_save_view.php">History Of Stock Return Generated<span class="label label-success"></span></a></li>
                           <!--  <li><a href="#.php">History Of Stock Return Transfered <span class="label label-success"></span></a></li> -->
                        </ul>
                    </li> 
                     <li><a href="#"><i class="icon-stack2"></i> <span>Maintenance Job Mgnt </span></a>
                        <ul> 
                            <li><a href="field_mr_create_job.php">Create Job Card<span class="label label-success">New</span></a></li>
                           <!--  <li><a href="field_mr_create_job_view.php">Issuance Of Job Card<span class="label label-success"></span></a></li> -->
                            <li><a href="field_issue_maintenance_job_view.php">View Job Card Issued<span class="label label-success"></span></a></li>
                            <li><a href="field_issue_maintenance_job_complete_view.php">Job Cards Completed<span class="label label-success"></span></a></li>
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

