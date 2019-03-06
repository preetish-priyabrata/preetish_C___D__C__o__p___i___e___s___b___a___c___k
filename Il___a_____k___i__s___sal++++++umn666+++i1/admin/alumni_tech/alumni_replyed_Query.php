<?php
session_start();
ob_start();
if($_SESSION['alumni_tech']){
require 'FlashMessages.php';
include '../config.php';

 $msg = new \Preetish\FlashMessages\FlashMessages();
?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
<section class="content-header">
      <h1>
       View Queries Status
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
    <li class="active"><a data-toggle="pill" href="#home">Queries Status </a></li>
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
                <th>Admin </th>
                <th>User</th>
                <th>Date</th>
                <!-- <th>Action</th> -->
              </tr>
            </thead>
            <tbody>
            <?php
            $x=0;
            
            $alumni_tech=$_SESSION['alumni_tech'];
            $query = "SELECT * FROM `master_queries_student` WHERE `status_answer`!='0' order By `slno` desc";
            $query_exe = mysqli_query($conn,$query);
            if(mysqli_num_rows($query_exe)){
              While($rec=mysqli_fetch_array($query_exe)){    
              $x++  
            ?>
            
              <tr>
                <td><?php echo $x ;?></td>
                <td><?php echo $rec['msg_query_details'];?></td>
                <td><?php $status=$rec['assign_status'];
                if($status==0){
                  echo "<b style='color:red'>Not Assigned</b>"; 
                }else{  
                  echo "<b style='color:green'>Assigned</b>";
                }
                ?></td>

             <td><?php $assign_admin_id=$rec['status_answer'];
                if($assign_admin_id=='1'){
                  echo "<b style='color:green'>Replied</b>"; 
                }else{  
                  echo "<b style='color:red'>Not Replied</b>";
                }
                ?></td>


              <!--another table to view name by using userid..// fetching coding-->
                  <td><?php $rec['assign_admin_id'] ;?>
                 <?php
                  $assign_admin_id=$rec['assign_admin_id'];
                  $query ="SELECT * FROM `admin_user_table` where `sl_no`='$assign_admin_id'";
                  $exe =mysqli_query($conn,$query);
                  $recd = mysqli_fetch_array($exe);
                  echo $recd['name'];
                  ?>
               
               </td>


                <td><?php echo $rec['date_query'].'/'.$rec['time_query'] ;?></td>
                <td>
                  <?php if($assign_admin_id==NULL){?>
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
         </div>
        </div>        
       </div>
      </form>
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

