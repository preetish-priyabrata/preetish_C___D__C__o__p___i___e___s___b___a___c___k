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
                    <a class="user-name hidden-xs" data-toggle="dropdown">Priteesh <i class="icon-more2"></i><small>Administrator</small></a>
                    <a href="#" class="btn-user dropdown-toggle hidden-xs" data-toggle="dropdown"><img src="../asserts/img/demo/img1.jpg" class="img-circle user" alt=""/></a>
                    <a href="#" class="dropdown-toggle visible-xs" data-toggle="dropdown"><i class="icon-more"></i></a>
                    <div class="dropdown-menu no-padding">
                        <div class="user-icon text-center p-t-15">
                            <img src="../asserts/img/demo/img1.jpg" class="img-circle" alt=""/>
                            <h5 class="text-center p-b-15 text-semibold">Hi! Priteesh</h5>
                        </div>
                        <!-- <ul class="user-links">
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
                 <li class="list-title">Site Store Menu</li>
                    <li><a href="#"><i class="icon-stack2"></i> <span>S.M.R Management</span></a>
                       <ul> 
                        <?php 
                        $zonal_place=$_SESSION['zonal_place'];  
                        $check_mr="SELECT * FROM `lt_master_zonal_material_requsition` WHERE `zmr_site_from_location_id`= '$zonal_place' and `status`='0'";
                        $sql_check_mr=mysqli_query($conn,$check_mr);
                        $num_check_mr=mysqli_num_rows($sql_check_mr);
                        if($num_check_mr=='0'){
                            ?>
                             <li><a href="zonal_mr_raised.php">Raise S.M.R <span class="label label-success">New</span></a></li>
                            <?php
                        }else{
                            $fetch_check_mr=mysqli_fetch_assoc($sql_check_mr);
                            $lid=web_encryptIt($fetch_check_mr['zmr_slno']);
                            $site_list=web_encryptIt($fetch_check_mr['zmr_unqiue_mr_id']);
                            ?>

                            <li><a href="zonal_mr_raised_detail.php?slno=<?=$lid?>&list=<?=$site_list?>">InComplete Site M.R</a></li>
                           
                        <?php }
                        ?>
                         <li><a href="zonal_mr_raised_request.php">Your Site M.R Request</a></li>
                                                       
                            <li class="acc-parent-li">
                                <a href="#" class="acc-parent">S.M.R Histroy<span class="acc-icon"></span></a>
                                <ul style="display: block;">
                                    
                                    
                                    <li><a href="zonal_mr_field_new_receive.php">Field M.R Received</a></li>
                                    <li><a href="zonal_mr_histroy.php">S.M.R Sent</a></li>
                                </ul>
                            </li>
                           
                        </ul>
                    </li> 
                 
                   
                    <li><a href="#"><i class="icon-stack2"></i> <span>Received Management</span></a>
                        <ul> 
                            <li><a href="zonal_mr_field_new.php">Field M.R Received <span class="label label-success">New</span></a></li>

                            <!-- <li><a href="#">Field M.R Received History</a></li> -->
                             <!-- <li><a href="#">Challan Received </a></li>
                              <li><a href="#">Challan Received History</a></li> -->
                        </ul>
                    </li>
                    <li><a href="#"><i class="icon-stack2"></i> <span>Challan Management</span></a>
                        <ul> 
                            <li><a href="zonal_Challan_new_issue.php">Challan Received  <span class="label label-success">New</span></a></li>
                             <li><a href="zonal_challan_new_receive_view.php">Challan Received History</a></li>
                            <li><a href="zonal_challan_new_issued_to_field_view.php">Challan Issued To Field</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="icon-stack2"></i> <span>Machine Management</span></a>
                        <ul> 
                            <li><a href="zonal_machine_efficencey.php">Machine Performance Add<span class="label label-success">New</span></a></li>
                            <li><a href="zonal_machine_efficencey_view.php">Machine Performance View</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="icon-stack2"></i> <span>Stock Management</span></a>
                        <ul> 
                            <li><a href="zonal_stock_view.php">View Stock</a></li>
                           
                        </ul>
                    </li>
                    <li><a href="#"><i class="icon-stack2"></i> <span>Return Management</span></a>
                        <ul> 
                            <li><a href="zonal_stock_challan_return.php">Generate Stock Return Challan</a></li>

                            <li><a href="zonal_stock_challan_return_save_view.php" >Generate Stock Return Challan History (HQ) </a></li>
                            <li><a href="zonal_stock_challan_return_field.php">Stock Return Challan (Field) <span class="label label-success">New</span> </a></li>
                            <!-- <li><a href="#">Stock Return Challan Received(Filed) History </a></li> -->

                        </ul>
                    </li>

                   <!-- <li><a href="#"><i class="icon-stack2"></i> <span>Transfer Management</span></a>
                        <ul> 
                            <li><a href="zonal_transfer_raise_t.php">Request Received<span class="label label-success">Received</span> </a></li>

                            <li><a href="zonal_transfer_raise_t_view_approved.php">Approved Request List</a></li>
                            <li><a href="zonal_transfer_raise_t_gen_view_issued.php">Issue Transfer Challan </a></li>
                            <li><a href="zonal_transfer_raise_t_gen_view_issued_history.php">History Of Transfer Challan</a></li>
                        </ul>
                    </li>  -->
                    
                    
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

