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
        Pending Friend Request
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Explore</a></li>
        <li class="active">Pending List</li> 
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    	<div class="text-center">
			 <?php $msg->display(); ?>
		  </div>
      <div class="row">
        <div class="col-lg-12">
              <div class="panel panel-default">
                <div class="panel-heading"> 
                  <h4><b>Pending List</b></h4>
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
                       <th>Action</th>                                     
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $y=0; 
                        $sl_no_one=$_SESSION['sl_no'];       
                           
                          $query_friend="SELECT `sl_no`,`friend_id_send`, `friend_id_receive`, `status` FROM `master_friend_request` WHERE `friend_id_receive`='$sl_no_one' AND `status`='3'";  
                            $sql_exe=mysqli_query($conn,$query_friend);
                            while($rec2=mysqli_fetch_array($sql_exe)){    
                              $y++;      
                               // if($rec2['friend_id_send']!=$sl_no_one){
                                 $slno=$rec2['friend_id_send'];
                               // }else if($rec2['friend_id_receive']!=$sl_no_one){
                                   //$slno=$rec2['friend_id_receive'];
                               // }
                               
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
                            <td> 
                              <a class="btn btn-primary btn-xs" href="update_friend_requests.php?serial=<?=$rec2['sl_no']?>&status=1&ids_uni=<?=$slno?>">Accept Request</a>
                              <a class="btn btn-primary btn-xs" href="update_friend_requests.php?serial=<?=$rec2['sl_no']?>&status=2&ids_uni=<?=$slno?>">Reject Request</a>
                            </td>

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
