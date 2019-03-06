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
       <li class="active">Admin Message</li>
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
                <th>Message Short</th>                
                <th>Date</th>
                <th>Time</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $x=0;
              
              $sl_no_one=$_SESSION['sl_no'];
              $query_friend="SELECT * FROM `master_user_post_admin` WHERE `user_id`='$sl_no_one' order by `slno` desc";
              $sql_exe=mysqli_query($conn,$query_friend);
              while($rec2=mysqli_fetch_array($sql_exe)){    
                $y++;      
                
                  
                if($rec2['view_status']=="1"){     
              ?>
              <tr class="success">
                <td><?php echo $y ;?></td>
                <td><?php $sl_no=$rec2['sl_no'];
                         $sql_post="SELECT * FROM `admin_send_individual_notice` WHERE `sl_no`='$sl_no'";
                         $sql_exe_post=mysqli_query($conn,$sql_post);
                         $fetch_post=mysqli_fetch_assoc($sql_exe_post);
                         $var=$fetch_post['notice'];
                         //trim message to 100 characters, regardless of where it cuts off
                        $msgTrimmed = mb_substr($var,0,100);

                        //find the index of the last space in the trimmed message
                        $lastSpace = strrpos($msgTrimmed, ' ', 0);

                        //now trim the message at the last space so we don't cut it off in the middle of a word
                        echo mb_substr($msgTrimmed,0,$lastSpace)."...";
                ?></td>                
                <td><?php echo $rec2['date'];?></td>
                <td><?php echo $rec2['time'];?></td>
                <td>  <a class="btn btn-primary btn-xs" href="Received_Message_view_admin.php?serial=<?=$rec2['sl_no']?>&receiver=<?=$sl_no_one?>&ids_uni=<?=$rec2['sl_no']?>">View Notice</a> </td>
              </tr>

              <?php
            }else{?>
              <tr class="warning">
               <td><?php echo $y ;?></td>
                <td><?php $sl_no=$rec2['sl_no'];
                         $sql_post="SELECT * FROM `admin_send_individual_notice` WHERE `sl_no`='$sl_no'";
                         $sql_exe_post=mysqli_query($conn,$sql_post);
                         $fetch_post=mysqli_fetch_assoc($sql_exe_post);
                         $var=$fetch_post['notice'];
                         //trim message to 100 characters, regardless of where it cuts off
                        $msgTrimmed = mb_substr($var,0,100);

                        //find the index of the last space in the trimmed message
                        $lastSpace = strrpos($msgTrimmed, ' ', 0);

                        //now trim the message at the last space so we don't cut it off in the middle of a word
                        echo mb_substr($msgTrimmed,0,$lastSpace)." ...";
                ?></td>                
                <td><?php echo $rec2['date'];?></td>
                <td><?php echo $rec2['time'];?></td>
                <td>  <a class="btn btn-primary btn-xs" href="Received_Message_view_admin.php?serial=<?=$rec2['sl_no']?>&receiver=<?=$sl_no_one?>&ids_uni=<?=$rec2['sl_no']?>">View Notice</a> </td>
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
