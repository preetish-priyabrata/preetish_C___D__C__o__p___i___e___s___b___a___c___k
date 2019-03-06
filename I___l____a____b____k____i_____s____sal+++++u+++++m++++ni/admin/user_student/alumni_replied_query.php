<?php
session_start();
ob_start();
if($_SESSION['email']){
require 'FlashMessages.php';
include '../config.php';

 $msg = new \Preetish\FlashMessages\FlashMessages();
?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
<section class="content-header">
      <h1>
       Queries Status
        <small>List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Query</a></li>
        <li class="active">View Queries</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content ">
    <!-- success or error message alert -->
      <div class="text-center ">
       
        <?php $msg->display(); ?>
    
      </div>
      <div class="row">
    <!-- end success or errot message alert  -->
    <div class="col-lg-12 ">
    <div class="box">
    <div class="panel panel-default">
    <div class="panel-heading text-center success"> Queries Status</div>
    <div class="panel-body">
    <div class="col-lg-12 ">
       <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped text-center">
            <thead>
              <tr>
                <th>Sl.No</th>
                <th>Query</th>
                <th>Status</th>
                <th>Date</th>
                <th>Response</th>                                      
              </tr>
            </thead>
            <tbody>
            <?php
            $x=0;
            
            $s_user_id=$_SESSION['email'];
            $query = "SELECT * FROM `master_queries_student` WHERE `s_user_id`='$s_user_id' order By `slno` desc";
            $query_exe = mysqli_query($conn,$query);
            if(mysqli_num_rows($query_exe)){
            while($rec=mysqli_fetch_array($query_exe)){    
            $x++  ;
            ?>
            <tr>
              <td><?php echo $x ;?></td>
              <td><?php echo $rec['msg_query_details'] ;?></td>
              <td><?php $status=$rec['status_answer'] ;
              if($status==0){
                  echo "<b style='color:red'>Not Replied</b>";
                }else{  
                  echo "<b style='color:green'>Replied</b>";
                }
                ?>
              </td>
              <td><?php echo $rec['date_query'].'/'.$rec['time_query'] ;?></td>
              <td>

                <!-- if status 1 then view pages should be displayed -->

                  <?php if($status==1){?>
                    <a class="btn btn-primary btn-xs" href="view_replied_details.php?serial=<?=$rec['slno']?>">View</a>
                    <?php 
                  }
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
          <br>
          <div class="row">
          <a href="alumni_dashboard.php" class="btn btn-info" role="button">Back</a>
          </div>
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
