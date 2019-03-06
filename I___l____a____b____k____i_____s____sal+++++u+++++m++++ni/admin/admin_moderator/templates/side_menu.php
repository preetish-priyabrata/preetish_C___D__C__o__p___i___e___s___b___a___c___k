

<link rel="stylesheet" href="https://use.fontawesome.com/6667a26d4c.css">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>I</b>-LAB</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Moderator </b>Profile</span>
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
              <span class="hidden-xs"><?=$_SESSION['admin_moderator']?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../assert/dist/img/avatar2.png" class="img-circle" alt="User Image">

                <p>
                  
                  <small><?=ucwords($_SESSION['admin_moderator'])?></small>
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

  <!-- =============================================== -->

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
          <p><?=ucwords($_SESSION['admin_moderator'])?></p>
          <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
        </div>
      </div>


      <ul class="sidebar-menu">
      <li class="header">Moderator Menu</li>

      <li class="treeview">
           <a href="#">
             <i class="fa fa-braille"></i>
              <span>Information Management</span>
              <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
             </span>
           </a>
          <ul class="treeview-menu">
             <li><a href="admin_moderator_list_unapproved.php" title="List of new Information  such as text, URL Link & pdf received  from admin-operation for verification to be posted in Student Sharing Wall."><i class="fa fa-square"></i>Received Information<small style="color:green"> New</small></a></li>

             <li><a href="admin_moderator_unapproved_photo.php" title="List of new photographs received from admin-operation  for verification to be uploaded in student photo gallery."><i class="fa fa-square"></i>Received Photo Gallery</a></li>
         </ul> 
     </li>


      <li class="treeview">
          <a href="#">
            <i class="fa fa-braille"></i>
            <span>Information View</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
       <ul class="treeview-menu">
           <li><a href="admin_moderator_approved_photo_list.php" title="List of photos has been Verified by Moderator."><i class="fa fa-square"></i>Verified Photo sharing list</a></li>

          <li><a href="admin_moderator_approved_text_pdf_url_list.php" title="List of text/Url Links/Pdf has been Verified by Moderator."><i class="fa fa-square"></i>Verified Text/Pdf/Url sharing list</a></li>


       </ul> 
         
     </li>
       <li class="treeview">
          <a href="#">
            <i class="fa fa-braille"></i>
            <span>User Posts View</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
       <ul class="treeview-menu">
           <li><a href="admin_moderator_unapproved_user_dashboard_post_list.php" ><i class="fa fa-square"></i>Unapproved User Post List</a></li>

          <li><a href="admin_moderator_approved_user_dashboard_post_list.php" title="List of User Post has been Approved by Moderator."><i class="fa fa-square"></i>Approved User Post list</a></li>
          <li><a href="admin_moderator_rejected_user_dashboard_post_list.php" title="List of User Post has been Rejected by Moderator."><i class="fa fa-square"></i>Rejected User Post list</a></li>


       </ul> 
         
     </li>
        
        
  </ul>
    
   
    </section>
    <!-- /.sidebar -->
  </aside>



 
