<!-- <?php

// session_start();

?>
 -->
<link rel="stylesheet" href="https://use.fontawesome.com/6667a26d4c.css">

  <header class="main-header">
    <!-- Logo -->
    <a href="alumni_dashboard.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>I</b>-LAB</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Alumni </b>Profile</span>
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
              <?php
            if(!empty($_SESSION['photo'])){?>
              <img src="../upload/cadidate_reg_photo/<?php echo $_SESSION['photo']?>" width="160" height="160" class="user-image" alt="User Image">
              <?php }else if(empty($_SESSION['photo'])){?>
              <img src="../assert/dist/img/avatar2.png" class="user-image" alt="User Image">
              <!-- 160X160 -->
              <?php }?>
              
            
              <span class="hidden-xs"><?=ucwords($_SESSION['name'])?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
               <?php
                if(!empty($_SESSION['photo'])){?>
                  <img src="../upload/cadidate_reg_photo/<?php echo $_SESSION['photo']?>" class="img-circle" alt="User Image">
                <?php }else if(empty($_SESSION['photo'])){?>
                <img src="../assert/dist/img/avatar2.png" class="img-circle" alt="User Image">
                <?php  }?>
                <p>
                  
                  <small><?=ucwords($_SESSION['name'])?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <!-- <a href="#">Followers</a> -->
                  </div>
                  <div class="col-xs-4 text-center">
                    <!-- <a href="alumni_name_photo_update.php">Setting</a> -->
                  </div>
                  <div class="col-xs-4 text-center">
                    <!-- <a href="#">Friends</a> -->
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <!-- <div class="center-block">...</div> -->
               <!--  <div class="text-center">
                  <a href="logout.php" class="btn btn-default btn-flat">Setting</a>
                </div> -->
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

  <!-- =================================================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
        <?php
          if(!empty($_SESSION['photo'])){?>
            <img src="../upload/cadidate_reg_photo/<?php echo $_SESSION['photo']?>" class="img-circle" alt="User Image">
            <?php }else if(empty($_SESSION['photo'])){?>
           <img src="../assert/dist/img/avatar2.png" class="img-circle" alt="User Image">
          <?php }?>
        </div>
        <div class="pull-left info">
          <p><?=ucwords($_SESSION['name'])?></p>
        </div>
      </div>
     
      <ul class="sidebar-menu">
        <li class="header">Alumni User Menu</li>
         </li>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-braille"></i>
            <span>Query</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
               <ul class="treeview-menu">
                   <li><a href="alumni_sent_query.php" title="Link for sending any relevant query to the admin-operation by any registered alumni."><i class="fa fa-square"></i>Send A Query <small style="color:red">New</small></a></li>
         
                   <li><a href="alumni_replied_query.php" title="List of queries sent by any registered alumni over a period with current status and response received."><i class="fa fa-square"></i>View Queries List</a></li>
               </ul> 
         
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-braille"></i>
            <span>Sharing Platform</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a href="alumni_sharing_details.php" title="Link for sharing any information in the form of text, photos, pdf and links."><i class="fa fa-square"></i>New Information <small style="color:red";>New</small></a></li>

            <li><a href="alumni_view_own_approved_photo.php" title="List of approved photos gets approved by an approver, out of list of photos uploaded by any registered alumni."><i class="fa fa-square"></i>Published Photo List</a></li>


            <li><a href="alumni_view_own_approved_post.php" title="List of approved texts, documents, links gets approved by an approver, out of list of texts, documents, and links uploaded by any registered alumni."><i class="fa fa-square"></i>Published Information List</a></li>
        </ul> 
       </li> 
       <li class="treeview">
          <a href="#">
            <i class="fa fa-braille"></i>
            <span>Explore</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a href="search_friends.php"><i class="fa fa-square"></i>Find A Friend</small></a></li>
             <li><a href="friend_list.php"><i class="fa fa-square"></i>Friend List</a></li>
             <li><a href="friend_pending.php"><i class="fa fa-square"></i>Pending Friend Request</a></li>
          </ul> 
         
        </li> 
        <li class="treeview">
          <a href="#">
            <i class="fa fa-braille"></i>
            <span>Message Center</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">         
             <li><a href="friend_message_list.php"><i class="fa fa-square"></i>Send A Meassge To Friend</a></li>
             <li><a href="Received_Message.php"><i class="fa fa-square"></i>Message Received <small style="color:red";>New</small></a></li>
             <li><a href="Received_Message_admin.php"><i class="fa fa-square"></i>Admin Message<small style="color:red";>New</small></a></li>
          </ul> 
        </li> 
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
