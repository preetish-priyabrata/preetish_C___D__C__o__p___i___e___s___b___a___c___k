<?php

session_start();
ob_start();
if($_SESSION['admin_emails']){
require 'FlashMessages.php';
require 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $slno=$_REQUEST['serial_no'];
  $place_id_district=$_SESSION['place_id'];

 $query_item="SELECT * FROM `rhc_master_update_dh_block_stock` WHERE `updated_place_to`='$place_id_district' and `slno`='$slno'";
 $sql_exe_list=mysqli_query($conn,$query_item);
 echo $num=mysqli_num_rows($sql_exe_list);
 if($num==0){

    
    header('Location:admin_dashboard.php');
    exit;
  	
 }
 $list_details=mysqli_fetch_assoc($sql_exe_list);

if($list_details['place_status']=='1'){
    $block_id=$list_details['updated_place_from'];
    $get_block="SELECT * FROM `rhc_master_place_block` WHERE `place_block_id`='$block_id'";
    $sql_exec_block=mysqli_query($conn,$get_block);
    $block_fetch_detail=mysqli_fetch_assoc($sql_exec_block);
    $place_detail=strtoupper($block_fetch_detail['block_name']).'['.$block_fetch_detail['place_block_id'].']';
}else{
  if($list_details['place_status']=='2'){
    $dh_id=$list_details['updated_place_from'];
    $get_dh="SELECT * FROM `rhc_master_place_dh` WHERE `place_hostpital_id`='$dh_id'";
    $sql_exec_dh=mysqli_query($conn,$get_dh);
    $dh_fetch_detail=mysqli_fetch_assoc($sql_exec_dh);
    $place_detail=strtoupper($dh_fetch_detail['hosptial_name']).'['.$dh_fetch_detail['place_hostpital_id'].']';
  }else{
    $dh_id=$list_details['updated_place_from'];
    $get_dh="SELECT * FROM `rhc_master_place_uphc` WHERE `place_uphc_id`='$dh_id'";
    $sql_exec_dh=mysqli_query($conn,$get_dh);
    $dh_fetch_detail=mysqli_fetch_assoc($sql_exec_dh);
    $place_detail=strtoupper($dh_fetch_detail['uphc_name']).'['.$dh_fetch_detail['place_uphc_id'].']';
  }
}

?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Update Received History Detail
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Update</a></li>
        <li><a href="#">Update History</a></li>
        <li><a href="#"> Update Received History</a></li>
        <li class="active"><a href="#"> Update Received History Detail</a></li>
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
        <div class="panel-heading text-center" style="background-color: lightpink;"><strong> Update Received History Detail</strong></div>
        <div class="demo">
          <div class="panel-body">
            <form class="form-inline" id="issue_forms" >
              <div class="col-sm-6">
              <div class="form-group">
                <label for="email">Date :</label>
                <?=date('d-m-Y',strtotime(trim($list_details['date'])));?>
               
              </div>
              </div>
               <div class="col-sm-6">
              <div class="form-group ">
                <label for="pwd">Time :</label>
                <?=date('h:i:s a',strtotime(trim($list_details['time'])));?>
              </div>
              </div>  
               <div class="col-sm-6 pull-right">       
              <div class="form-group pull-right">
                <label for="email">Location :</label>
                <?=$place_detail?>
              </div>
              </div>
              
    
              <table id="myTable" class="table table-striped text-center" border="1">
              <thead align="center">
              <tr>
                <th>Slno</th>
                <th>Item Code</th>
                <th>Type</th>
                <th>Quantity</th>
                <!-- <th id="btnAdd" class="button-add">Add New Item</th> -->
              </tr>
              </thead>
              <tbody id="list_items_check">
              <?php
              	$updated_info=json_decode($list_details['updated_info'] , True);
              	
              	for ($i=0; $i < count($updated_info) ; $i++) {?>
              	<tr>
                  <td><?=$i+1?></td>
                  <td><?=$updated_info[$i]['item_codes']?></td>
                  <td><?=$updated_info[$i]['item_types']?></td>
                  <td><?=$updated_info[$i]['item_quantity']?></td>
                 </tr>
              	<?php 
              		# code...
              	}

              ?>
              </tbody>
            </table>
            <div class="row text-center">
              <span  id="error" style="color: red;"></span>
            </div>
            <div class="row">
            <div class="col-sm-12">

             <span class="text-left">
               <a href="admin_update_stock_received_list.php"  class="btn btn-default">Back</a>             
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