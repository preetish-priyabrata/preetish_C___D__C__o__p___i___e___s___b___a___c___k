<?php
session_start();
ob_start();
if($_SESSION['email']){
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
include '../config.php';
  
?>
<style type="text/css">
  textarea {
    overflow-y: scroll;
    height: 100px;
    resize: none; /* Remove this if you want the user to resize the textarea */
}
</style>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Friends List <small>New</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Friends List</a></li>
       <li class="active">Friends</li>
      </ol>
    </section><br>
    <!-- Main content -->
    <section class="content">
      <div class="text-center">
      <?php $msg->display(); ?>
      </div>
     <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading"> 
            <h4><b>Friends Information</b></h4>
              </div>
                <div class="panel-body">
                 <table id="example1" class="table table-bordered table-striped text-center">
                  <thead>
                 <tr>
                   <th>Sl.No</th>
                   <th>Name</th>
                   <th>Image</th>
                   <th>Year Passing</th>
                   <th>Stream</th>
                                                          
                </tr>
               </thead>
              <tbody>
             <?php
              $x=0;
              
              $sl_no_one=$_SESSION['sl_no'];
              $query_friend="SELECT `sl_no`,`friend_id_send`, `friend_id_receive`, `status` FROM `master_friend_request` WHERE (`friend_id_send`='$sl_no_one' OR `friend_id_receive`='$sl_no_one') AND `status`='1'";
              $sql_exe=mysqli_query($conn,$query_friend);
              while($rec2=mysqli_fetch_array($sql_exe)){    
                $y++;      
                if($rec2['friend_id_send']!=$sl_no_one){
                  $slno=$rec2['friend_id_send'];
                }else if($rec2['friend_id_receive']!=$sl_no_one){
                  $slno=$rec2['friend_id_receive'];

                }
                $query = "SELECT * FROM `master_user_registration` where `sl_no`='$slno'";
                $query_exe = mysqli_query($conn,$query);
                $rec=mysqli_fetch_assoc($query_exe);      
              ?>
              <tr>
                <td><?php echo $y ;?></td>
                <td><?php echo $rec['name'] ;?></td>
                <td><img width="130" height="100" src="../upload/cadidate_reg_photo/<?php echo $rec['photo'];?>" ></td>
                <td><?php echo $rec['pass_year'];?></td>
                <td><?php echo $rec['stream'];?></td>
             <?php
                 }
              ?>

             </tbody>                 
            </table>
            <div class="text-center">
              <a href="alumni_dashboard.php" class="btn btn-info" role="button">Back</a>
          </div>
           </div>
          </div>
         </div>
       </div>
     
     </section>
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

