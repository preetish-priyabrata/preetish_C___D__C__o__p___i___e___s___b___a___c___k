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
       Status Of Queries
        <small>List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Query</a></li>
        <li class="active">View Queries Status</li>
      </ol>
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
    <li class="active"><a data-toggle="pill" href="#home"> Status Of Queries </a></li>
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
                <th>Query</th>
                <th>Status</th>
                <th>Date</th>
                <th>Action</th> 
              </tr>
            </thead>
            <tbody>
            <?php
            $x=0;
            
            $alumni_tech=$_SESSION['alumni_tech'];
            $query = "SELECT * FROM `kiit_stud_queries` WHERE `status_answer`='2'  order By `sl_no` desc";
            $query_exe = mysqli_query($conn,$query);
            if(mysqli_num_rows($query_exe)){
              While($rec=mysqli_fetch_array($query_exe)){    
              $x++  
            ?>
              <tr>
                <td><?php echo $x ;?></td>
                <td><?php echo $rec['msg_query_details'];?></td>            
                <td><?php $assign_admin_id=$rec['status_answer'];
                if($assign_admin_id=='2'){
                  echo "<b style='color:green'>Replied</b>"; 
                }else{  
                  echo "<b style='color:red'>Not Replied</b>";
                }
                ?>
                </td>
                <td><?php echo $rec['date_query'].'/'.$rec['time_query'] ;?></td>
                <td>
                     <a class="btn btn-primary btn-xs" href="admin_view_replied_details.php?serial=<?=$rec['sl_no']?>">View</a> 
                  
                </td>                      
              </tr>

              <?php
            }
            }
            ?>
            <div>
              
            </div>
            </tbody>                 
           </table>
          </div>        
         </div>
        </div>
       </div>
      </div>
     <br>
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

