<?php
session_start();
ob_start();
if(isset($_SESSION['alumni_tech'])){
require 'FlashMessages.php';
include '../config.php';
$slno=$_GET['slno'];
 $msg = new \Preetish\FlashMessages\FlashMessages();
?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
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
    <li class="active"><a data-toggle="pill" href="#home"><h4><b>View List Of Stream</b> </h4></a></li>
    
  </ul>
  
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <div class="container">
        <div class="col-lg-11 ">
      
        <div class="table-responsive col-lg-11">
          <table id="" class="table table-bordered table-striped text-center">
            <thead>
              <tr>
                <th>Sl.No</th>
                <th>Stream</th>
                <th>Date</th>
                <th>Time</th>
                <th>Action</th>
                                  
              </tr>
            </thead>
            <tbody>
            <?php
            $x=0;
            $query = "SELECT * FROM `admin_add_student_stream` WHERE `status`='1'";
            $query_exe = mysqli_query($conn,$query);
            if(mysqli_num_rows($query_exe)){
              While($rec=mysqli_fetch_array($query_exe)){    
              $x++;  
            ?>
           
              <tr>
                <td><?=$x?></td>
                
                <td><?php echo strtoupper($rec['stream']) ;?></td>
                <td><?php echo $rec['date'] ;?></td>
                <td><?php echo $rec['time'] ;?></td>
                <td>
                <a href="add_student_regd_stream_delete.php?slno=<?php echo $rec['slno'];?>" class="label label-danger" onclick="return confirm('Are you sure you want to delete your stream?');">Delete</a></td>
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
