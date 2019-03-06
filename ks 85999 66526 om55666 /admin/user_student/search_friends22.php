<?php
session_start();
ob_start();
if($_SESSION['email']){
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
include '../config.php';
  if (isset($_POST['submit'])) {
    $Search=$_POST['Search'];
    // $query="SELECT * FROM `master_user_registration` WHERE `name` LIKE '%$Search%'" ;

    $query="SELECT * FROM `master_user_registration` WHERE `name` LIKE '%$Search%'" ;
    $sql_exe=mysqli_query($conn,$query);
    $x=mysqli_num_rows($sql_exe);

  }else{
     // $Search="";
    $query="SELECT * FROM `master_user_registration` " ;
    $sql_exe=mysqli_query($conn,$query);
    $x=mysqli_num_rows($sql_exe);
  }
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
       Searching Friends Here <small>New1</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Searching Friends</a></li>
       <li class="active">Search Friends</li>
      </ol>
    </section><br>
    <!-- Main content -->
    <section class="content">
      <div class="text-center">
      <?php $msg->display(); ?>
      </div>
      <div class="row">
      <!-- <div class="col-lg-3"></div> -->
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading"> 
              <h4><b>Search Friends</b></h4>
            </div>
            <div class="panel-body">
              <br>
              <form class="form-inline text-center" action="search_friends.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="control-label col-sm-2" for="Search">Search friends:</label>
                  <div class="col-sm-10">
                    <input type="text"  name="Search" value="<?=$Search?>" placeholder="Search" style="width: 300px;" required=""/><br><br>
                  </div>
                </div>
                <br><br>
                <div class="text-center">
                  <input type="submit" name="submit" class="btn btn-info" value="View Profile">
                </div><br><br>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php 
      // if(!empty($Search)){
        // if(0){
      ?>     
      <div class="row">
        <?php if($x=="0"){?>
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
                     <th>Action</th>                                     
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td colspan="6" class="text-center">No Friend Is Found</td>
                      
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        <?php }else{?> 
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
                       <th>Action</th>                                     
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $y=0;                    
                          while($rec=mysqli_fetch_array($sql_exe)){    
                          $y++  ;
                          $sl_no_one=$_SESSION['sl_no'];
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
                              $query_friend="SELECT `friend_id_send`, `friend_id_receive`, `status` FROM `master_friend_request` WHERE (`friend_id_send`='$sl_no_one' OR `friend_id_receive`='$sl_no_one') AND (friend_id_send='$sl_no_two' OR friend_id_receive='$sl_no_two')";
                                $sql_exe_friend=mysqli_query($conn,$query_friend);
                                 $user_friend=mysqli_num_rows($sql_exe_friend);
                                if($user_friend=="0" or $user_friend==""){
                            ?>
                              <a class="btn btn-primary btn-xs" href="  search_profile_details_view.php?serial=<?=$rec['sl_no']?>">View More</a>
                            <?php 
                            }else{
                              while($res_friend=mysqli_fetch_array($sql_exe_friend)){
                               $status=$res_friend['status'];
                            } 
                              switch ($status) {
                                case '1':
                                  echo "Friend";
                                  break;
                                case '3':
                                  echo "Pending";
                                  break;                                
                                default:
                                 ?>
                                   <a class="btn btn-primary btn-xs" href="  search_profile_details_view.php?serial=<?=$rec['sl_no']?>">View More</a>
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
                </div>
              </div>
            </div>
        <?php }?>
      </div>
      <?php }?>
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
