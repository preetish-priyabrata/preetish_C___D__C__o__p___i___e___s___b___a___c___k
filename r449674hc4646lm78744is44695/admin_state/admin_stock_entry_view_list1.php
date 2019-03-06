<?php
session_start();
ob_start();
if($_SESSION['admin_emails']){
require 'FlashMessages.php';
require 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Qc Sample Issued List
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Stock</a></li>
        <li><a href="#"> Qc Stock Test</a></li>
        <li class="active"><a href="#">Qc Stock View List</a></li>
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
        <div class="panel-heading text-center" style="background-color: lightpink;"><strong>Qc Sample Issued List</strong></div>
        <div class="demo">
          <div class="panel-body">
                         <?php 
                // item code 
                $query_item_code="SELECT * FROM `rhc_master_item_code_list` WHERE `status`='1'";
                $sql_exe_item_code=mysqli_query($conn,$query_item_code);
                //item type             
                $query_item_type="SELECT * FROM `rhc_master_item_type` WHERE `status`='1'";
                $sql_exe_item_type=mysqli_query($conn,$query_item_type);
              ?>

              <table class="table ">
                <tr>
                  <th>QC Challan No</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th></th>
                </tr>
              <tr>
               
               <?php 
                  $get_list="SELECT * FROM `rhc_master_chall_state`where `status`='1' ";
                  $sql_exe_list=mysqli_query($conn,$get_list);
                  while ($res=mysqli_fetch_assoc($sql_exe_list)) {
                  ?>
                  
                  <tr>
                  <th><a href="admin_stock_entry_view_detail.php?qc_challan=<?=$res['challan_no']?>"><?=$res['challan_no']?></a></th>
                  <th><?=$res['date']?></th>
                  <th><?=$res['time']?></th>
                   <th>
                    <a href="admin_stock_entry_view_detail2.php?qc_challan=<?=$res['challan_no']?>">Qc Return Issue Test</a>
                   </th>
                </tr>
                <?php }?>
              </table>
    
             
             

              
            <span class="text-left">
               <a href="admin_dashboard.php"  class="btn btn-default">Back</a>             
            </spam>
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
