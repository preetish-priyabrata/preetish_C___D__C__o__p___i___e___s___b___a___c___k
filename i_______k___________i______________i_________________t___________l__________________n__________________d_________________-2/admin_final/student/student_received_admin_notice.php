<?php
session_start();
ob_start();
if($_SESSION['admin_user']){
require 'FlashMessages.php';
include '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
     <section class="content-header">
      <h1>
         Notices <small>New1</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Notices Center</a></li>
       <li class="active">Admin Notices</li>
      </ol>
    </section>
    <br>
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
    <div class="panel-heading text-center success">Notices</div>
    <div class="panel-body">
    <div class="col-lg-12 ">
       <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped text-center">
            <thead>
              <tr>
                <th>Sl.No</th>
                <th>Notice Title</th>                
                <th>Date</th>
                <th>Time</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $x=0;
              $sl_no_one=$_SESSION['notice_id'];
              $query_friend="SELECT * FROM `kiit_student_notice_board` WHERE `notice_id`='$sl_no_one' order by `L_sl_no` desc";
              $sql_exe=mysqli_query($conn,$query_friend);
              while($rec2=mysqli_fetch_array($sql_exe)){    
                $y++;         
                if($rec2['status']=="1"){     
              ?>
              <tr class="success">
                <td><?php echo $y ;?></td>
                <td><?php $notice_id=$rec2['notice_id'];
                      $sql_post="SELECT * FROM `kitt_admin_send_individual_notice` WHERE `sl_no`='$notice_id'";
                      $sql_exe_post=mysqli_query($conn,$sql_post);
                      $fetch_post=mysqli_fetch_assoc($sql_exe_post);
                      $var=$fetch_post['title'];
                ?>
                </td>                
                <td><?php echo $rec2['date'];?></td>
                <td><?php echo $rec2['time'];?></td>
                <td><a class="btn btn-primary btn-xs" href="student_received_admin_notice_view.php?serial=<?=$rec2['sl_no']?>&receiver=<?=$sl_no_one?>&ids_uni=<?=$rec2['sl_no']?>">View Notice</a> </td>
              </tr>

              <?php
              }else{?>
                <tr class="warning">
                 <td><?php echo $y ;?></td>
                  <td><?php $sl_no=$rec2['sl_no'];
                       $sql_post="SELECT * FROM `kitt_admin_send_individual_notice` WHERE `sl_no`='$sl_no'";
                       $sql_exe_post=mysqli_query($conn,$sql_post);
                       $fetch_post=mysqli_fetch_assoc($sql_exe_post);
                       $var=$fetch_post['title'];
                  ?></td>                
                  <td><?php echo $rec2['date'];?></td>
                  <td><?php echo $rec2['time'];?></td>
                  <td><a class="btn btn-primary btn-xs" href="student_received_admin_notice_view.php?serial=<?=$rec2['slno']?>&receiver=<?=$sl_no_one?><?=$rec2['sl_no']?>">View Notice</a> </td>
                </tr>
              <?php }
            
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
