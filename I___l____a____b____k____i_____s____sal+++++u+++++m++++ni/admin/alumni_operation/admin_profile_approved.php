<?php
session_start();
ob_start();
if(isset($_SESSION['alumni_tech'])){
require 'FlashMessages.php';
include '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      List Of Approved Registration
        <small> </small>
      </h1>
      <!---<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Exam Master</a></li>
        <li class="active"><b>View Exam & Add Category</b></li>
      </ol>-->
    </section>

    <!-- Main content -->
    <section class="content ">
    <!-- success or error message alert -->
      <div class="text-center ">
       
        <?php $msg->display(); ?>
    
      </div>
    <!-- end success or errot message alert  -->
    <div class="box">
     <ul class="nav nav-pills nav-tabs nav-justified">
    <li class="active"><a data-toggle="pill" href="#home"> List Of Approved Registration </a></li>
    <!--<li><a data-toggle="pill" href="#menu1">Teachers Add  Category</a></li>-->
    <!-- <li><a data-toggle="pill" href="#menu2">Menu 2</a></li>
    <li><a data-toggle="pill" href="#menu3">Menu 3</a></li> -->
  </ul>
  
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <div class="container">
        <div class="col-lg-11 ">
      
        <div class="table-responsive col-lg-11">
        <br>
          <table id="example1" class="table table-bordered table-striped text-center">
            <thead>
              <tr>
                <th>Sl.No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Redg.No</th>
                <th>Status</th>                                       
              </tr>
            </thead>
            <tbody>
            <?php
            $x=0;
            $query = "SELECT * FROM `master_user_registration` where `status`!='0'";
            $query_exe = mysqli_query($conn,$query);
            if(mysqli_num_rows($query_exe)){
              While($rec=mysqli_fetch_array($query_exe)){  
              $x++;    
            ?>
            
              <tr>
                <td><?php echo $x ;?></td>
                <td><?php echo $rec['name'] ;?></td>
                <td><?php echo $rec['email'] ;?></td>
                <td><?php echo $rec['reg_no'] ;?></td>
                <td>
                  <?php $status=$rec['status'] ;
                     if($status=="2"){ ?>
                          <a href="admin_update_status_alumni.php?slno=<?=$rec['sl_no']?>&status=<?=$rec['status']?>">In-Active</a>
                        <?php }else{  ?>
                          <a href="admin_update_status_alumni.php?slno=<?=$rec['sl_no']?>&status=<?=$rec['status']?>">Active</a>
                        <?php }
                  ?>
                </td>                      
              </tr>

              <?php
            }
            }
            ?>
            </tbody>                 
          </table>
        </div>
      </div>
    </div>        
    </div>
    </div>
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php

}else{
  header('Location:logout.php');
  exit;
}
$contents = ob_get_contents();
ob_clean();
include 'templates/template.php';

?>
