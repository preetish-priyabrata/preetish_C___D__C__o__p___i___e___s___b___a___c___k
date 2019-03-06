

<link rel="stylesheet" href="https://use.fontawesome.com/6667a26d4c.css">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>I</b>-LAB</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Innovadors</b>LAB</span>
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
              <span class="hidden-xs"><?=$_SESSION['admin_type']?></span>
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
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
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
          <p><?=ucwords($_SESSION['user_name'])?></p>
          <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Principal Tech Menu</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-braille"></i>
            <span>Exam Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
           
          </a>
          <ul class="treeview-menu">
            <li><a href="admin_exam_catergory.php"><i class="fa fa-circle-o"></i>View Exam Category</a></li>
            <li><a href="admin_exam_name.php"><i class="fa fa-circle-o"></i> View Exam Name</a></li>
          </ul>
        </li>
       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cubes"></i>
            <span>Master Subject</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
           
          </a>
          <ul class="treeview-menu">
            <li><a href="admin_subject_catagory.php"><i class="fa fa-circle-o"></i>View Suject Category</a></li>
            <li><a href="admin_subject_name.php"><i class="fa fa-circle-o"></i>View Subject Name</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cubes"></i>
            <span>Master Teacher</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
           
          
          </a>
          <ul class="treeview-menu">
          <li><a href="admin_teacher_user.php"><i class="fa fa-circle-o"></i>View All Teachers </a></li>
          <li><a href="admin_asign_class_teacher.php"><i class="fa fa-circle-o"></i>View Assign Class Teacher</a></li>
          <li><a href="admin_assign_teacher_subject.php"><i class="fa fa-circle-o"></i>View Assign Subject Teacher</a></li>
         </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-cubes"></i>
            <span>Master Student</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
           
          </a>
          <ul class="treeview-menu">
            <li><a href="admin_student_user.php"><i class="fa fa-circle-o"></i> View All Student</a></li>
            <!-- <li><a href="#"><i class="fa fa-circle-o"></i>Assign Teacher</a></li> -->
          </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-cubes"></i>
            <span>Master Grade</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
           
          </a>
          <ul class="treeview-menu">
            <li><a href="admin_grade_1_to_10.php"><i class="fa fa-circle-o"></i>View Grade 0 - 10</a></li>
            <li><a href="admin_grade_1_to_90.php"><i class="fa fa-circle-o"></i>View Grade 0 - 30</a></li>
            <li><a href="admin_grade_1_to_50.php"><i class="fa fa-circle-o"></i>View Grade 0 - 50 </a></li>
            <!--<li><a href="admin_subject_name.php"><i class="fa fa-circle-o"></i>Add Subject Name</a></li>-->
          </ul>
            <!-- <ul class="treeview-menu">
            
            <li><a href="admin_subject_name.php"><i class="fa fa-circle-o"></i>Add Subject Name</a></li>
          </ul> -->
        </li>




        <li class="treeview">
          <a href="#">
            <i class="fa fa-cog"></i> <span>Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="admin_school.php"><i class="fa fa-circle-o"></i>Manage School Details</a></li>
           
          </ul>
        </li>
        
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
