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
         Messages <small>New1</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Messages Center</a></li>
       <li class="active">Message Received</li>
      </ol>
    </section><br>
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
    <div class="panel-heading text-center success"> Messages</div>
    <div class="panel-body">
    <div class="col-lg-12 ">
       <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped text-center">
            <thead>
              <tr>
                <th>Sl.No</th>
                <th>Friend Name</th>
                <th>Image</th>
                <th>Date</th>
                <th>Time</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $x=0;
              
              $sl_no_one=$_SESSION['sl_no'];
              $query_friend="SELECT `slno`, `friend_list_id_send`, `friend_list_slno`, `date_send`, `time_send`,`status` FROM `master_message_send_friend` WHERE `friend_list_id_received`='$sl_no_one'";
              $sql_exe=mysqli_query($conn,$query_friend);
              while($rec2=mysqli_fetch_array($sql_exe)){    
                $y++;      
                
                  $slno=$rec2['friend_list_id_send'];
                
                $query = "SELECT * FROM `master_user_registration` where `sl_no`='$slno'";
                $query_exe = mysqli_query($conn,$query);
                $rec=mysqli_fetch_assoc($query_exe); 
                if($rec2['status']=="0"){     
              ?>
              <tr class="success">
                <td><?php echo $y ;?></td>
                <td><?php echo $rec['name'] ;?></td>
                <td><img width="130" height="100" src="../upload/cadidate_reg_photo/<?php echo $rec['photo'];?>" ></td>
                <td><?php echo $rec2['date_send'];?></td>
                <td><?php echo $rec2['time_send'];?></td>
                <td>  <a class="btn btn-primary btn-xs" href="Received_Message_view.php?serial=<?=$rec2['slno']?>&receiver=<?=$sl_no_one?>&ids_uni=<?=$slno?>&friend_id=<?=$rec2['friend_list_slno']?>">View Message</a> </td>
              </tr>

              <?php
            }else{?>
              <tr class="warning">
                <td><?php echo $y ;?></td>
                <td><?php echo $rec['name'] ;?></td>
                <td><img width="130" height="100" src="../upload/cadidate_reg_photo/<?php echo $rec['photo'];?>" ></td>
                <td><?php echo $rec2['date_send'];?></td>
                <td><?php echo $rec2['time_send'];?></td>
                <td>  <a class="btn btn-primary btn-xs" href="Received_Message_view.php?serial=<?=$rec2['slno']?>&receiver=<?=$sl_no_one?>&ids_uni=<?=$slno?>&friend_id=<?=$rec2['friend_list_slno']?>">View Message</a> </td>
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
