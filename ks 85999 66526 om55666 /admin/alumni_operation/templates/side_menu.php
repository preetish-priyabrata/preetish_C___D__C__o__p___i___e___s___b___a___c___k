

<link rel="stylesheet" href="https://use.fontawesome.com/6667a26d4c.css">

  <header class="main-header">
    <!-- Logo -->
    <a href="alumni_dashboard.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>I</b>-LAB</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin </b> Profile</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../assert/dist/img/avatar2.png" class="user-image" alt="User Image">
              <!-- 160X160 -->
              <span class="hidden-xs"><?=$_SESSION['user_name']?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../assert/dist/img/avatar2.png" class="img-circle" alt="User Image">

                <p>
                  
                  <small><?=ucwords($_SESSION['user_name'])?></small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <!-- <a href="#" class="btn btn-default btn-flat">Profile</a> -->
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>

  <!-- ================================================================================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../assert/dist/img/avatar2.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=ucwords($_SESSION['user_name'])?></p>
          <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
        </div>
      </div>
 
      <ul class="sidebar-menu">
        <li class="header"><center>Operational Menu</center></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-braille"></i>
            <span title="It manages any new registration by any alumni.">Registration Management</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!--  <li><a href="alumni_personal_profile.php"><i class="fa fa-square"></i>Alumni Form</a></li> -->
         
             <li><a href="admin_new_alumni_profile.php" title="Displays list of alumni registration details not screened by an approver."><i class="fa fa-square"></i>View Unapproved Registration</a></li>
            <li><a href="admin_profile_approved.php" title="Displays list of alumni details whose registration has been approved."><i class="fa fa-square"></i>View Approved Registration</a></li> 
          </ul> 
         
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-braille"></i>
            <span>Message To Alumni</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!--  <li><a href="alumni_personal_profile.php"><i class="fa fa-square"></i>Alumni Form</a></li> -->
         
             <li><a href="admin_send_messages_alumni.php" title="Messages/Notifications to be sent to a group of alumni or an individual alumni."><i class="fa fa-square"></i>Send A Message </a></li>
           <!--  <li><a href="admin_send_messages_alumni_group.php" title="View messages sent to a group of alumni."><i class="fa fa-square"></i>View sent Message To Group</a></li>  -->
             <li><a href="admin_send_messages_alumni_individual.php" title="View messages sent to a individual of alumni."><i class="fa fa-square"></i>View sent Message To  Individual</a></li> 
          </ul> 
         
        </li>

          <li class="treeview">
          <a href="#">
            <i class="fa fa-braille"></i>
            <span>Query Management</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a href="alumni_Received_Query.php" title="Link to send replies to any new query received from the registered alumni."><i class="fa fa-square"></i>Reply new queries <small style="color:green">New</small></a></li>
         
             <li><a href="alumni_replyed_Query.php" title="Status of the queries redirected to expert user, such as assigned or not assigned, if assigned to whom it has been assigned etc."><i class="fa fa-square"></i>Query Status</a></li>
             <!--  <li><a href="view_replied_details_faculty.php"><i class="fa fa-square"></i>View replied details</a></li> 
              <li><a href="alumni_assigned_query.php"><i class="fa fa-square"></i>View Assigned details</a></li> -->
        </ul> 
         
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-braille"></i>
            <span title="Managing Information shared by any registered alumni">Information Management</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">


             <li><a href="admin_UnApproved_sharing_details.php" title="List of information has been shared by the registered alumni which are due for approval."><i class="fa fa-square"></i>Information List</a></li>

            <li><a href="admin_forwarded_text_pdf_url_list.php" title="List of documents has been forwarded for verification"><i class="fa fa-square"></i>Forwarded Pdf/text/url list</a></li>
           
        </ul> 
         
        </li>

          <li class="treeview">
          <a href="#">
            <i class="fa fa-braille"></i>
            <span>Alumni Photo Gallery</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a href="admin_upload_photo_gallery.php" title="List of photo graphs has been shared by the registered alumni which are due for approval."><i class="fa fa-square"></i>New Uploaded Photo List</a></li>
             
            <li><a href="admin_forwarded_photo_gallery_list.php" title="List of photo graphs has been shared by the registered alumni which are already forwarded."><i class="fa fa-square"></i>Forwarded Photo List</a></li>
              
          </ul> 
         
        </li>

         <li class="treeview">
          <a href="#">
            <i class="fa fa-braille"></i>
            <span>Published List View</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li><a href="admin_Approved_sharing_details.php" title="List of information shared by any registered alumni which has been published."><i class="fa fa-square"></i>Published Sharings <small style="color:green">New</small></a></li>

           <li><a href="admin_Approved_photo_list.php" title="List of photos shared by any registered alumni which has been published."><i class="fa fa-square"></i>Published Photos <small style="color:green">New</small></a></li>
              
              
          </ul> 
         
        </li>
    
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
