<?php
session_start();
ob_start();
if($_SESSION['admin_emails']){
require 'FlashMessages.php';
require 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View User List 
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> UserCreation</a></li>
        <li class="active"><a href="#"> View User List </a></li>
        <!-- <li class="active">Blank page</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="text-center">
      <?php $msg->display(); ?>
    </div>
     <div class="row">
    <div class="col-sm-12">
    <div class="box box-info">
      <!-- end message displayed -->
      <div class="panel panel-default">
        <div class="panel-heading text-center" style="background-color: lightpink;"><strong>List Of User</strong></div>
        <div class="demo">
          <div class="panel-body">
         
    
              <table id="example1" class="table table-striped text-center" border="1">
              <thead align="center">
              <tr>
                <th>Slno</th>
                <th>User Level</th>
                 <th>User Name</th>
                <th>User Deignation</th>            
                <th>Mobile</th>
                <th>User id</th>
                <th>Place short Name</th>
                <th>Status</th>
                 <th>Action</th>
              </tr>
              </thead>
              <tbody>
              <?php 
              $x=0;
              $query="SELECT * FROM `rhc_master_login_user`";
              $sql_exe=mysqli_query($conn,$query);
              while($res=mysqli_fetch_assoc($sql_exe)){
                $x++;
                ?>
               <tr>
                <td><?=$x?></td>
                <td><?php
                  $desigination_level=$res['user_designation'];
                  $query_designation="SELECT * FROM `rhc_master_designation` WHERE `slno`='$desigination_level'";
                  $sql_exe_degination=mysqli_query($conn,$query_designation);
                  $res_degination=mysqli_fetch_assoc($sql_exe_degination);
                  echo $res_degination['designation_name'];
                ?>
                </td>
                <td><?=strtoupper($res['user_name']);?></td>
                <td><?php 
                if(!empty($res['user_designation_name'])){

                  echo strtoupper($res['user_designation_name']);
                }else{
                  echo "<b style='color:green'>Demo</b>";
                }
                ?></td>
                
                <td><?=$res['user_mobile'];?></td>
                <td><?=$res['user_email'];?></td>
                <td><?php 
                  switch ($desigination_level) {
                    case '1':
                    echo strtoupper($place_id=$res['place_state_id']);
                      break;
                    case '2':
                    echo strtoupper($place_id=$res['place_district_id']);  
                      break;
                    case '3':
                     echo strtoupper($place_id=$res['place_block_dh_id']); 
                      break;
                    case '4':
                     echo strtoupper($place_id=$res['place_block_dh_id']); 
                      break;
                    case '5':
                     echo strtoupper($place_id=$res['place_phc_aphc_id']); 
                      break;
                    case '6':
                     echo strtoupper($place_id=$res['place_phc_aphc_id']); 
                      break;
                    case '7':
                     echo strtoupper($place_id=$res['sub_center_id']); 
                      break;
                    case '8':
                     echo strtoupper($place_id=$res['sub_center_id']); 
                      break;
                    case '9':
                      if($res['asha_top_level']==1){
                         echo strtoupper($place_id=$res['place_phc_aphc_id']);
                      }
                      if($res['asha_top_level']==2){
                         echo strtoupper($place_id=$res['sub_center_id']);
                      }
                      if($res['asha_top_level']==3){
                         echo strtoupper($place_id=$res['place_phc_aphc_id']);
                      }
                      if($res['asha_top_level']==4){
                         echo strtoupper($place_id=$res['sub_center_id']);
                      }
                      
                    case '10':
                      if($res['asha_top_level']==1){
                         echo strtoupper($place_id=$res['place_phc_aphc_id']);
                      }
                      if($res['asha_top_level']==2){
                         echo strtoupper($place_id=$res['sub_center_id']);
                      }
                      if($res['asha_top_level']==3){
                         echo strtoupper($place_id=$res['place_phc_aphc_id']);
                      }
                      if($res['asha_top_level']==4){
                         echo strtoupper($place_id=$res['sub_center_id']);
                      }
                       if($res['asha_top_level']==5){
                         echo strtoupper($place_id=$res['place_block_dh_id']);
                      }
                      break;
                    case '11':
                     echo strtoupper($place_id=$res['place_block_dh_id']); 
                      break;
                    
                    default:
                      # code...
                      break;
                  }
                ?></td>
                <td><?php 
                if($res['status']==1){
                  echo "<b style='color:green'>Active</b>";
                }else{
                  echo "<b style='color:red'>Inactive</b>";
                }?>
                </td>
                <td><a href="admin_user_edit_mobile.php?id=<?=$res['slno']?>" class="btn btn-default">Edit Mobile No</a></td>
              </tr>
              <?php }?>
              </tbody>
            </table>
            <div class="row">
            <div class="col-sm-12">
             <span class="text-left">
               <a href="admin_dashboard.php"  class="btn btn-default">Back</a>             
            </spam>
          
           </div>
        </div>
          </form>
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
