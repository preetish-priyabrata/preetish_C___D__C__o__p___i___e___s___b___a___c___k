<?php

session_start();
ob_start();
if($_SESSION['admin_tech']){
require 'FlashMessages.php';
require '../config.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
$title="View Candidate Application Form List";
//$slno=$_POST['slno'];
?>

<!--Page Header-->
<div class="header">
  <div class="header-content">
    <div class="page-title"><i class="icon-display4"></i>Candidate Application Form List Not Paid Fee</div>
    <ul class="breadcrumb">
      <li><a href="admin_dashboard.php"></a></li>
      <li><a href="#"></a>Candidate Application Form System</li>
      <li class="active">Application Form List List Not Paid Fee</li>
    </ul>
  </div>
</div>
<div class="container-fluid page-content">
  <div class="row">
    <div class="col-md-12 col-sm-12">
      <?php $msg->display(); ?>
    </div>
  </div>
</div>
  <!-- /Page Header-->
  <div class="container-fluid page-content">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <!-- Basic inputs -->
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="panel-title">Candidate Application Form List Not Paid Fee</div>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <form method="POST" enctype="multipart/form-data" action="">
                            <table id="example" class="display nowrap" width="100%" cellspacing="0">
                    <thead>
                        <tr style="text-align: center;">
                            <th>Slno</th>
                            <th>Candidate Name</th>
                            <th>Candidate Mobile</th>
                            <th>Candidate Application</th>
                            <th>Slno_id</th>
                            <th>sikkim_subject_no</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Group Applied For</th>
                            <th>Action</th>
                           
                                                
                        </tr>
                    </thead>
                    <tfoot>
                        <tr style="text-align: center;">
                             <th>Slno</th>
                            <th>Candidate Name</th>
                            <th>Candidate Mobile</th>
                            <th>Candidate Application</th>
                            <th>Slno_id</th>
                            <th>sikkim_subject_no</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Group Applied For</th>
                            <th>Action</th>
                         
                    </tfoot>
                    <tbody>
                      <?php 
                        $x=0;
                        $get_mobile="SELECT * FROM `ilab_login` WHERE `status`='1' and`basic_status`='1' and `complete_status`='1'";

                        $sql_exe_get_mobile=mysqli_query($conn,$get_mobile);
                        // o mysqli_num_rows($sql_exe_get_mobile)."-";
                        while ($get_mobile_fetch=mysqli_fetch_assoc($sql_exe_get_mobile)) {
                          $candidate_mobile=$get_mobile_fetch['mobile_no_L'];
                        $query_sql="SELECT * FROM `application_form` WHERE `candidate_mobile`='$candidate_mobile'and`status`='1'";
                        $sql_exe=mysqli_query($conn,$query_sql);
                        $result=mysqli_fetch_assoc($sql_exe);
                     
                       $paids="SELECT * FROM `ilab_group_candidate_info` WHERE `candidate_mobile`='$result[candidate_mobile]' AND `paid_status`='1'";
                        $sql_exe_paids=mysqli_query($conn,$paids);
                        // echo $result['candidate_mobile'].",";
                        // echo $num=mysqli_num_rows($sql_exe_paids).",";
                        if(mysqli_num_rows($sql_exe_paids)=='0'){
                         
                            $x++;
                            
                            
                            ?>
                          <tr style="text-align: center;">
                          <td><?=$x?></td>
                          <td><?=$result['candidate_name']?></td>
                          <td><?=$result['candidate_mobile']?></td>
                          <td><?=$result['application_no']?></td>
                         <td><?=$result['candidate_mobile']?>[<?=$result['slno']?>][<?=$get_mobile_fetch['slno_L']?>]</td>
                          <td><?=$result['sikkim_subject_no']?></td>
                          <td><?=$result['date']?></td>
                          <td><?=$result['time']?></td>
                          <td>
                            <?php 
                                if($result_paid['group_id_slno']==1){
                                    echo "Driver";
                                }else{
                                    echo "Group D";
                                }
                            ?>
                          </td>
                          <!-- <td><?=$result['status']?></td> -->
                          <td><a href="admin_candidate_appl_form_view_details?slno=<?=$result['slno']?>" class="btn btn-success">View</a>
                          
                          <a href="admin_candidate_appl_form_edit_details?slno=<?=$result['slno']?>" class="btn btn-success">Edit</a>
                          </td>
                        </tr>
                      <?php 
                    // }
                      }
                    }?>
                    </tbody>
                </table>
              </form>
                     </div>
          </div>
        </div>            
       </div>
    </div>
  </div>

<?php
}else{
  header('Location:logout');
  exit;
}
$contents = ob_get_contents();
ob_clean();
include '../template/header.php';

?>
