<?php
session_start();
ob_start();
if($_SESSION['email']){
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
include '../config.php';
$sl_no_one=$_SESSION['sl_no'];
  
    $query="SELECT * FROM `master_user_registration` where `sl_no`!='$sl_no_one' and `status`='1' " ;
    $sql_exe=mysqli_query($conn,$query);
    $x=mysqli_num_rows($sql_exe);
  
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
       Finding A Friend <small>New1</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Explore</a></li>
       <li class="active">Find A Friend</li>
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
                  <h4><b>Friends You May Know</b></h4>
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
                          while($rec=mysqli_fetch_array($sql_exe)){    
                          $y++  ;
                          $sl_no_two=$rec['sl_no'];
                          
                          // SELECT 'friend_one','friend_two','status' FROM friends
                          // WHERE
                          // (friend_one="$user_id" OR friend_two="$user_id")
                          // AND
                          // (friend_one="$friend_id" OR friend_two="$friend_id")

                      ?>
                      <tr>
                        <td><?php echo $y ;?></td>
                        <td><?php echo $rec['name'] ;?></td>
                        <td><img width="130" height="100" src="../upload/cadidate_reg_photo/<?php echo $rec['photo'];?>" ></td>
                        <td><?php echo $rec['pass_year'];?></td>
                        <td><?php echo $rec['stream'];?></td>
                        <td>
                            <?php 
                              $query_friend="SELECT `sl_no`,`friend_id_send`, `friend_id_receive`, `status` FROM `master_friend_request` WHERE (`friend_id_send`='$sl_no_one' OR `friend_id_receive`='$sl_no_one') AND (friend_id_send='$sl_no_two' OR friend_id_receive='$sl_no_two')";
                                $sql_exe_friend=mysqli_query($conn,$query_friend);
                                 $user_friend=mysqli_num_rows($sql_exe_friend);
                                if($user_friend=="0" or $user_friend==""){
                            ?>
                              <a class="btn btn-primary btn-xs" href="  search_profile_details_view.php?serial=<?=$rec['sl_no']?>">View More</a> || <a class="btn btn-primary btn-xs" href="user_unblock_friend.php?sl_no_one=<?=$sl_no_one?>&status=1&sl_no_two=<?=$sl_no_two?>&email_user=<?=$rec['email']; ?>">Block</a>
                            <?php 
                            }else{

                              while($res_friend=mysqli_fetch_array($sql_exe_friend)){
                                
                                    
                                   if($res_friend['status']==5){
                                      $status=$res_friend['status'];
                                      break;
                                   }else{
                                     $status=$res_friend['status'];
                                   }
                                  
                            } 
                              switch ($status) {
                                case '1':
                                  echo "Friend";
                                  break;
                                case '3':
                                if($res_friend['friend_id_send']==$sl_no_one){
                                  echo "Pending";
                                }else{?>
                                <a class="btn btn-primary btn-xs" href="update_friend_requests.php?serial=<?=$res_friend['sl_no']?>&status=1&ids_uni=<?=$sl_no_two?>">Accept Request</a>
                                <a class="btn btn-primary btn-xs" href="update_friend_requests.php?serial=<?=$res_friend['sl_no']?>&status=2&ids_uni=<?=$sl_no_two?>">Reject Request</a>
                               <?php }
                                break;
                                case '5':
                                if($res_friend['friend_id_send']==$sl_no_one){?>
                                  <a class="btn btn-primary btn-xs" href="user_unblock_friend.php?serial=<?=$res_friend['sl_no']?>&status=2">Unblock</a>
                               <?php  }else{
                                  echo "You have been blocked";
                                }
                               break;

                                default:
                                 ?>
                                   <a class="btn btn-primary btn-xs" href="  search_profile_details_view.php?serial=<?=$rec['sl_no']?>">View More</a>|| <a class="btn btn-primary btn-xs" href="user_unblock_friend.php?sl_no_one=<?=$sl_no_one?>&status=1&sl_no_two=<?=$sl_no_two?>&email_user=<?=$rec['email']; ?>">Block</a>
                                 <?php 
                                  break;
                              }
                               }?>
                          
                        </td>                      
                      </tr>

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
