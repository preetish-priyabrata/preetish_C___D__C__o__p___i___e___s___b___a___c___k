<div class="wrapper">
        <!-- BEGIN LEFTSIDE -->
        <div class="leftside">
            <div class="sidebar">
            <!-- BEGIN RPOFILE -->
                <div class="nav-profile">
                    <div class="thumb">
                        <img src="../assert_admin/assets/img/avatar.jpg" class="img-circle" alt="" />
                        <!-- <span class="label label-danger label-rounded">3</span> -->
                    </div>
                    <div class="info">
                        <a href="admin_"><?=$_SESSION['user_name']?></a>
                        <!-- <ul class="tools list-inline">
                            <li><a href="#" data-toggle="tooltip" title="Settings"><i class="ion-gear-a"></i></a></li>
                            <li><a href="#" data-toggle="tooltip" title="Events"><i class="ion-earth"></i></a></li>
                            <li><a href="#" data-toggle="tooltip" title="Downloads"><i class="ion-archive"></i></a></li>
                        </ul> -->
                        <a href="login.html" class="button" title="Logout"><i class="ion-log-out"></i></a>
                    </div>
                    
                </div>
                <!-- END RPOFILE -->
                <!-- BEGIN NAV -->
                <div class="title">Navigation</div>
                    <ul class="nav-sidebar">
                        <li>
                            <a href="enquiryList.php">
                                <i class="ion-help"></i> <span>Enquiry List</span>
                            </a>
                        </li>
                        <li>
                            <a href="enrollList.php">
                                <i class="ion-information-circled"></i> <span>Enrollment List</span>
                            </a>
                        </li>
                          <li>
                            <a href="uploadCERT.php">
                                <i class="ion-android-upload"></i> <span>Upload Certificate</span>
                            </a>
                        </li>                        
                        <li class="nav-dropdown">
                            <a href="#">
                                <i class="ion-erlenmeyer-flask"></i> <span>Training</span>
                                <i class="ion-chevron-right pull-right"></i>
                            </a>
                            <ul>
                                <li><a href="panels.html">Add Training</a></li>
                                <li><a href="tiles.html">Manage Notice</a></li>                           
                            </ul>
                        </li>
                        <li class="nav-dropdown">
                            <a href="#">
                                <i class="ion-cube"></i> <span>Notice</span>
                                <i class="ion-chevron-right pull-right"></i>
                            </a>
                            <ul>
                                <li><a href="panels.html">Add Notice</a></li>
                                <li><a href="tiles.html">Manage Notice</a></li>
                                
                            </ul>
                        </li>
                        
                    </ul>
                    <!-- END NAV -->
                    
                   
            </div><!-- /.sidebar -->
        </div>
        <!-- END LEFTSIDE -->