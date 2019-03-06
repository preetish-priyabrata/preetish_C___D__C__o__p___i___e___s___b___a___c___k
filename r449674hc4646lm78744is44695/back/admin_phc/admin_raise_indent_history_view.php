<?php
session_start();
ob_start();
if($_SESSION['admin_emails']){
$indent_id=$_GET['indent_id'];
require 'FlashMessages.php';
include 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
  $place_id=$_SESSION['place_id'];
  $query_list="SELECT * FROM `rhc_master_phc_aphc_indent` WHERE `indent_place_raised_by`='$place_id' and `indent_id`='$indent_id' ";
  $sql_exe_list=mysqli_query($conn,$query_list);
  $num_rows=mysqli_num_rows($sql_exe_list);
  if($num_rows==0){
    
    header('Location:admin_dashboard.php');
    exit;
  }
  $date=date('d-m-Y');
  $time=date('h:i:s a');
  $date1=date('Y-m-d');
  $time1=date('H:i:s');
  $result_list=mysqli_fetch_assoc($sql_exe_list);
 

  
 $place_block_id=$result_list['indent_place_raised_to'];
    $get_block="SELECT * FROM `rhc_master_place_block` WHERE `place_block_id`='$place_block_id'";
    $sql_exec_block=mysqli_query($conn,$get_block);
    $block_fetch_detail=mysqli_fetch_assoc($sql_exec_block);;
  $user_palce=strtoupper($block_fetch_detail['block_name']).'['.$block_fetch_detail['place_block_id'].']';

  

    $place_phc_id=$result_list['indent_place_raised_by'];
    $get_block="SELECT * FROM `rhc_master_place_phc` WHERE `place_phc_id`='$place_phc_id'";
    $sql_exec_block=mysqli_query($conn,$get_block);
    $block_fetch_detail=mysqli_fetch_assoc($sql_exec_block);
    $user_palce1= strtoupper($block_fetch_detail['phc_name']).'['.$block_fetch_detail['place_phc_id'].']';

  
                      
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View indent Details
        <mdall></mdall>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Indent</a></li>
        <li><a href="admin_receive_indent_history.php">Indent History</a></li>
        <li class="active"><a href="#">View Indent Details</a></li>
        <!-- <li class="active">Blank page</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="text-center">
      <?php $msg->display(); ?>
    </div>
    <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <!-- end message displayed -->
      <div class="panel panel-default">
        <div class="panel-heading text-center" style="background-color: lightpink;"><strong>Detail Indent</strong></div>
        <div class="demo">
          <div class="panel-body">
            <form class="form-inline" id="issue_forms" action="admin_issue_indent_save.php" method="POST">
            <div class="col-md-12">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="email">Date :</label>                 
                    <?=$date?>  
                  <input type="hidden" class="form-control" name="date" value="<?=$date1?>" > 
                </div>
              </div>
              <div class="col-md-6">
              <div class="form-group ">
                <label for="pwd">Time :</label>
                <input type="hidden" class="form-control" name="time" value="<?=$time1?>">
                <?=$time?>  
              </div> 
              </div> 
              <!-- <div class="col-md-6">
              <div class="form-group">
                <label for="email">Challan No :</label>
                 <?=$challen_no?>
                 <input type="hidden" name="challen_no" value="<?=$challen_no?>">
                <input type="email" class="form-control" id="email">
              </div>
              </div>   -->
              <div class="col-md-6">
              <div class="form-group">
                <label for="email">Indent No :</label>
                  <?=$result_list['indent_id'];?>
                <input type="hidden" class="form-control" name="indent_id" value="<?=$result_list['indent_id'];?>">
              </div>
              </div> 
              
              <div class="col-md-6">      
              <div class="form-group">
                <label for="email">Indent Location :</label>
                <input type="hidden" name="receiver_id" value="<?=$district_fetch_detail['place_district_id']?>">
                <?php echo $user_palce1?>
                <!-- <input type="email" class="form-control" id="email" value="Maner" readonly=""> -->
              </div>
              </div>
              <div class="col-md-6">
               <div class="form-group">
                <label for="email">Issue Location :</label>
                <input type="hidden" name="issuer_id" id="issuer_id" value="<?=$place_id?>">
                 <?php echo $user_palce?>
                <!-- <input type="email" class="form-control" id="email" value="Maner" readonly=""> -->
              </div>
              </div>
              <div class="col-md-6">
               <div class="form-group">
                <label for="email">Status :</label>
                <input type="hidden" name="issuer_id" id="issuer_id" value="<?=$place_id?>">
                <?php if($result_list['status']==1){?>
                <span style="color: red">Not Issued</span>
                <?php }else{
                  ?>
                  <span style="color: green">Issued</span>
             <?php   }?>
                <!-- <input type="email" class="form-control" id="email" value="Maner" readonly=""> -->
              </div>
              </div>
            </div>
              
 
    
              <table id="myTable" class="table table-striped text-center" border="1">
              <thead align="center">
              <tr>
                <th>Slno</th>
                <th>Item Code</th>
                <th>Type</th>
                <th>Qty Indented</th>
                 <!-- <th>Qty to Be Issued</th> -->
                <!-- <th id="btnAdd" class="button-add">Add New Item</th> -->
              </tr>
              </thead>
              <tbody>
                  <?php 
                  $x=0;
                $query_list_item="SELECT * FROM `rhc_master_phc_aphc_indent_id_details` WHERE `indent_id`='$indent_id'";
                $sql_exe_list_item=mysqli_query($conn,$query_list_item);

                while ($res_item=mysqli_fetch_assoc($sql_exe_list_item)) {
                  $x++
                  ?>
                <tr>
                    <td><?=$x?></td>
                    <td><?=$res_item['item_code']?>
                      <input type="hidden" name="item_code[]" id="item_code<?=$x?>" value="<?=$res_item['item_code']?>">
                    </td>
                    <td><?=$res_item['Item_type']?>
                      <input type="hidden" name="Item_type[]" id="Item_type<?=$x?>" value="<?=$res_item['Item_type']?>">
                    </td>
                    <td><?=$res_item['item_quantity']?>
                      <input type="hidden" name="item_quantity[]" id="item_quantity<?=$x?>" value="<?=$res_item['item_quantity']?>">
                    </td>
                   <!--  <td><input type="text" name="qnt_issue[]" onclick="get_batch(<?=$x?>)" id="qnt_issue<?=$x?>" value="<?=$res_item['item_quantity']?>">
                    <br>
                    <span id="error<?=$x?>" style="color: red;"></span>
                    </td> -->
                </tr>
                <?php  ; }?>
                <input type="hidden" name="ids" id="ids" value="<?=$x?>">
              </tbody>
            </table>
            <a href="admin_raise_indent_history.php"  class="btn btn-default">Back</a> 
           <!-- <button type="button" onclick="check_before_submit();" class="btn btn-default pull-right">Submit</button> -->

                           
            
          </form>
        </div>
      </div>
      </div>
      </div>
      <!-- <div class="col-md-5">
        <div class="panel panel-default">
          <div class="panel-heading text-center" style="background-color: palevioletred;"><strong>Item Batch Details</strong></div>
          <div class="panel-body">
            <table class="table table-striped" >
              <tr>
                <th>Item Code</th>
                <th>Type</th>
                <th>Batch No</th>
                <th>Qty</th>
                <th>Date Of Exp.</th>
              </tr>
              <tbody id="details">
                
              </tbody>

            </table>
          </div>
        </div>

      </div> -->
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
