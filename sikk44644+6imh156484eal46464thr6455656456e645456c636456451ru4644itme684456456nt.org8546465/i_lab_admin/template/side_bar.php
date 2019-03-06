<header class="main-nav clearfix">
    <div class="navbar-left pull-left">
        <div class="clearfix">
            <ul class="left-branding pull-left">
                <li class="visible-handheld"><span class="left-toggle-switch"><i class="icon-menu7"></i></span></li>
                <li>
                    <a href="index"><div class="logo"></div></a>
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
                    <a class="user-name hidden-xs" data-toggle="dropdown">Admin <i class="icon-more2"></i><small>Administrator</small></a>
                    <a href="#" class="btn-user dropdown-toggle hidden-xs" data-toggle="dropdown"><img src="../asserts/img/demo/img1.jpg" class="img-circle user" alt=""/></a>
                    <a href="#" class="dropdown-toggle visible-xs" data-toggle="dropdown"><i class="icon-more"></i></a>
                    <div class="dropdown-menu no-padding">
                        <div class="user-icon text-center p-t-15">
                            <img src="../asserts/img/demo/img1.jpg" class="img-circle" alt=""/>
                            <h5 class="text-center p-b-15 text-semibold">Hi! <?=$_SESSION['user_name']?></h5>
                        </div>
                        <ul class="user-links">
                           
                        </ul>
                        <div class="text-center p-10"><a href="../logout" class="btn btn-block"><i class="icon-exit3 i-16 position-left"></i> Logout</a></div>
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
                 <?php 
                    if ($_SESSION['admin_tech']) {?>
                        <li class="list-title">Admin  Menu</li>
                <?php 
                    }else if ($_SESSION['admin_tech_s']) {?>
                        <li class="list-title">Super Menu</li>
                <?php 
                    }else if ($_SESSION['admin_preexam']) {?>
                        <li class="list-title">Pre-Exam Menu</li>
                <?php 
                    }else if ($_SESSION['admin_Pre_tech_s']) {?>
                        <li class="list-title">Pre-Exam Super Menu</li>
                <!-- admin_Pre_tech_s -->
                 <?php 
                    }else{
                      header('Location:logout');
                      exit;  
                    }        
                 ?>
                <?php 
                    if (!empty($_SESSION['admin_preexam']) || !empty($_SESSION['admin_tech_s'])) {

                ?>
                    <!-- <li><a href="#"><i class="icon-stack2"></i> <span>online Group</span></a>
                        <ul> 
                            <li><a href="admin_group_view">View Group<span style="color: red">New</span></a></li>
                            <li><a href="admin_exam_view">View Exam Center</a></li>
                        </ul>
                    </li> -->
                    <li><a href="#"><i class="icon-stack2"></i> <span>Manage Exam Center </span></a>
                        <ul> 
                            <!-- <li><a href="admin_exam_add">Add Exam Center  <span style="color: red">New</span></a></li> -->
                            <li><a href="admin_exam_view">View Exam Center</a></li>
                        </ul>
                    </li>
                    <!-- <li><a href="#"><i class="icon-stack2"></i> <span>Manage Roll No </span></a>
                        <ul> 
                            <li><a href="admin_generate_roll">Generate Roll No <span style="color: red">New</span></a></li>
                            <li><a href="admin_exam_view">View Exam Center <span style="color: red">New</span> </a></li>
                        </ul>
                    </li> -->
                    <!-- <li><a href="#"><i class="icon-stack2"></i> <span>Manage Roll to Center</span></a>
                        <ul> 
                            <li><a href="admin_assign_roll_to_center_new">Assign Roll to Center <span style="color: red">New</span></a></li>
                            <li><a href="admin_exam_view">View Exam Center <span style="color: red">New</span> </a></li>
                        </ul>
                    </li> -->
                    <!-- <li><a href="#"><i class="icon-stack2"></i> <span>Manage Assign Date To Exam</span></a>
                        <ul> 
                            <li><a href="admin_manage_assign_date_to_form">Assign Date To Exam <span style="color: red">New</span></a></li>

                            <li><a href="admin_manage_assign_date_to_form_view">View Assigned Date To Exam </a></li>
                        </ul>
                    </li> -->
                   <!--  <li><a href="#"><i class="icon-stack2"></i> <span>View Center Status</span></a>
                        <ul> 
                            <li><a href="view_center_status">Status Centers</a></li>
                            <li><a href="admin_exam_view">View Exam Center <span style="color: red">New</span> </a></li>
                        </ul>
                    </li> -->
                    <!-- <li><a href="#"><i class="icon-stack2"></i> <span>View Center Status</span></a></li> -->
                    <li><a href="#"><i class="icon-stack2"></i> <span>Manage Attendance Sheet</span></a>
                        <ul> 
                            <li><a href="admin_GENERATE_roll">View Center wise Roll List<span style="color: red">New</span></a></li>
                            <li><a href="admin_GENERATE_attendance_view">View Attendance Sheet </a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="icon-stack2"></i> <span>Manage Admit Card</span></a>
                        <ul> 
                            <!-- <li><a href="generate_admit_card">Generate Admit Card<span style="color: red">New</span></a></li> -->
                            <li><a href="generate_admit_card_list">Preview Admit Card</a></li>
                            <!-- <li><a href="#">Find Admit Card</a></li> -->
                        </ul>
                    </li>
                    <?php  if($_SESSION['admin_tech_s']) {?>
                             <li><a href="#"><i class="icon-stack2"></i> <span>Manage Candidate</span></a>
                               <ul> 
                                 <li><a href="view_new">Find Application </a></li>
                                 <li><a href="admin_candidate_appl_form_view_paid_driver" title="Candidates submitted application form(candidates made successfull payment) ">List Of Complete Payment For Driver </a></li>
                                  <li><a href="admin_candidate_appl_form_view_paid_group_d" title="Candidates submitted application form(candidates made successfull payment for Group D) ">List Of Complete Payment For Driver </a></li>
                                   <li><a href="admin_candidate_appl_form_view_paid" title="Candidates submitted application form(candidates made successfull payment) ">List Of Complete Payment</a></li>
                                    <li><a href="admin_candidate_appl_form_view_not_paid" title="Candidates submitted application form( candidates made Not Paid) ">List Of Not Complete Payment</a></li>

                                 <li><a href="admin_candidate_appl_form_view" title="Candidates submitted application form(incliding candidates made successfull payment) ">List Of Complete Details</a></li>
                                 <li><a href="admin_candidate_appl_form_view_ssc" title="Candidate completed sikkim subject details but not submitted application form. ">List Of Complete SSC</a></li>
                                 <li><a href="admin_candidate_appl_form_view_non_ssc" title=" Candidate registered but not completed sikkim subject details.">List Of Not Completed SSC</a></li>
                                 
                               </ul>
                            </li>
                            <li><a href="#"><i class="icon-stack2"></i> <span>Manage Candidate 2</span></a>
                               <ul> 
                                 <!-- <li><a href="view_new">Find Application </a></li> -->
                                 <!-- <li><a href="admin_candidate_appl_form_view_paid_driver" title="Candidates submitted application form(candidates made successfull payment) ">List Of Complete Payment For Driver </a></li> -->
                                  <!-- <li><a href="admin_candidate_appl_form_view_paid_group_d" title="Candidates submitted application form(candidates made successfull payment for Group D) ">List Of Complete Payment For Group D </a></li> -->
                                   <!-- <li><a href="admin_candidate_appl_form_view_paid" title="Candidates submitted application form(candidates made successfull payment) ">List Of Complete Payment</a></li> -->
                                    <!-- <li><a href="admin_candidate_appl_form_view_not_paid" title="Candidates submitted application form( candidates made Not Paid) ">List Of Not Complete Payment</a></li> -->

                                 <li><a href="admin_candidate_appl_form_view_2" title="Candidates submitted application form(incliding candidates made successfull payment) ">List Of Complete Details</a></li>
                                 <li><a href="admin_candidate_appl_form_view_ssc" title="Candidate completed sikkim subject details but not submitted application form. ">List Of Complete SSC</a></li>
                                 <li><a href="admin_candidate_appl_form_view_non_ssc" title=" Candidate registered but not completed sikkim subject details.">List Of Not Completed SSC</a></li>
                                 
                               </ul>
                            </li>
                            <li><a href="#"><i class="icon-stack2"></i> <span>Manage Payment</span></a>
                               <ul> 
                                 <li><a href="view_payment_sucess"> View Success Payment</a></li>
                                 <li><a href="view_payment_not_paid"> View Unpaid List</a></li>
                                 
                                 
                                 <li><a href="view_payment_fail">Fail Payment</a></li>
                                 
                               </ul>
                            </li>
                            <li><a href="#"><i class="icon-stack2"></i> <span>Message Notification</span></a>
                               <ul> 
                                 <li><a href="message_not">Bulk Message</a></li>
                                 <li><a href="message_not_view"> View Message Send</a></li>
                                 
                                 
                                 <!-- <li><a href="view_payment_fail">Fail Payment</a></li> -->
                                 
                               </ul>
                            </li>


                <?php 
                        }
                    }else if($_SESSION['admin_tech']) {

                ?>                
                     <li><a href="#"><i class="icon-stack2"></i> <span>Manage Candidate</span></a>
                       <ul> 
                         <li><a href="view_new">Find Application </a></li>
                         
                          <li><a href="admin_candidate_appl_form_view_paid_driver" title="Candidates submitted application form(candidates made successfull payment for Driver) ">List Of Complete Payment For Driver </a></li>
                          <li><a href="admin_candidate_appl_form_view_paid_group_d" title="Candidates submitted application form(candidates made successfull payment for Group D) ">List Of Complete Payment For Group D </a></li>

                         <li><a href="admin_candidate_appl_form_view" title="Candidates submitted application form(incliding candidates made successfull payment) ">List Of Complete Details</a></li>
                                 <li><a href="admin_candidate_appl_form_view_ssc" title="Candidate completed sikkim subject details but not submitted application form. ">List Of Complete SSC</a></li>
                                 <li><a href="admin_candidate_appl_form_view_non_ssc" title=" Candidate registered but not completed sikkim subject details.">List Of Not Completed SSC</a></li>
                         <li><a href="admin_candidate_appl_form_view_otp_gen" title=" Candidate registered but not OTP Generated details.">List Of Generated OTP Not Submit</a></li>
                         
                       </ul>
                    </li>
                    <li><a href="#"><i class="icon-stack2"></i> <span>Manage Payment</span></a>
                               <ul> 
                                 <li><a href="view_payment_sucess"> View Success Payment</a></li>
                                 <li><a href="view_payment_not_paid"> View Unpaid List</a></li>
                                 
                                 
                                 <li><a href="view_payment_fail">Fail Payment</a></li>
                                 
                               </ul>
                            </li>
                    <li><a href="#"><i class="icon-stack2"></i> <span>Message Notification</span></a>
                        <ul> 
                            <li><a href="message_not">Bulk Message</a></li>
                            <li><a href="message_not_view"> View Message Send</a></li>  
                        </ul>
                    </li>

                <?php 
                    }else if($_SESSION['admin_Pre_tech_s']){ ?>
                     <li><a href="#"><i class="icon-stack2"></i> <span>online Group</span></a>
                        <ul> 
                            <li><a href="admin_group_view">View Group<span style="color: red">New</span></a></li>
                            <!-- <li><a href="admin_exam_view">View Exam Center</a></li> -->
                        </ul>
                    </li>
                    <li><a href="#"><i class="icon-stack2"></i> <span>Group Paid Candidate</span></a>
                        <ul> 
                            <li><a href="admin_group_candidate_paid_list">View Group Paid Candidate <span style="color: red">New</span></a></li>
                            <li><a href="admin_group_candidate_paid_list_tranfer">Transfer Paid </a></li>
                            <li><a href="admin_group_candidate_paid_list_tranfer_info">Transfer Paid Info </a></li>
                            <li><a href="admin_application_candidate_paid_save">Application Paid Info </a></li>
                             <li><a href="admin_application_candidate_paid_group_save">Application Paid Info </a></li>
                            
                        </ul>
                    </li>
                     <li><a href="#"><i class="icon-stack2"></i> <span>Manage Admit Card</span></a>
                        <ul> 
                            <!-- <li><a href="generate_admit_card">Generate Admit Card<span style="color: red">New</span></a></li> -->
                            <li><a href="generate_admit_card_list">Preview Admit Card</a></li>
                            <li><a href="send_sms">Send Sms</a></li>
                        </ul>
                    </li>


                <?php } ?>

                    
                    
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

