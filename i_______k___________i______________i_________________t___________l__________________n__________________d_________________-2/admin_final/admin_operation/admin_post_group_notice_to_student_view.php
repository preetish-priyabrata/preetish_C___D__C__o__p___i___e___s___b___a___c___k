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
         Notice <small>New</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View sent Notice To Individual</li>
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
    <div class="panel-heading text-center success"> Notice</div>
    <div class="panel-body">
    <div class="col-lg-12 ">
       <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped text-center">
            <thead>
              <tr>
                <th>Sl.No</th>
                <th>Notice Short</th> 
                <th>Stream</th>               
                <th>Date</th>
                <th>Time</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $x=0;
              
              $sl_no_one=$_SESSION['sl_no'];
              $query_friend="SELECT * FROM `kitt_admin_send_group_notice` order by `sl_no` desc";
              $sql_exe=mysqli_query($conn,$query_friend);
              while($rec2=mysqli_fetch_array($sql_exe)){    
                $y++;            
              ?>
              <tr class="success">
                <td><?php echo $y ;?></td>
                <td><?php echo $rec2['title'];?></td>
                <td><?php echo $rec2['stream'];?>
                
               </td>       <!--   $var=$rec2['title'];
                         //trim message to 100 characters, regardless of where it cuts off
                        $msgTrimmed = mb_substr($var,0,100);

                        //find the index of the last space in the trimmed message
                        $lastSpace = strrpos($msgTrimmed, ' ', 0);

                        //now trim the message at the last space so we don't cut it off in the middle of a word
                        echo mb_substr($msgTrimmed,0,$lastSpace)."...";
                ?></td>               -->  
                <td><?php echo $rec2['date'];?></td>
                <td><?php echo $rec2['time'];?></td>
                <td>  <a class="btn btn-primary btn-xs" href="admin_post_group_notice_to_student_view_details.php?serial=<?=$rec2['sl_no']?>">View Notice</a> </td>
              </tr>

            
            <?php }
          
            
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
