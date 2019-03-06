<?php
// print_r($_REQUEST);exit;
// Array ( [challen] => chal_791238 [indent] => ind001 ) 
session_start();
ob_start();
if($_SESSION['admin_emails']){
// $indent_id=$_GET['indent'];
require 'FlashMessages.php';
include 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $challen=$_REQUEST['challen_no'];
$query_challan="SELECT * FROM `rhc_master_phc_asha_challan_no` WHERE `challen_no`='$challen'";
$sql_exe_challan=mysqli_query($conn,$query_challan);
$result_fetch_challen =mysqli_fetch_assoc($sql_exe_challan); 
 $indent_id=$result_fetch_challen['indent_id'];
 $place_id1=$result_fetch_challen['receiver_place_id'];
  $place_id=$result_fetch_challen['issuer_place_id'];
  

  $query_list="SELECT * FROM `rhc_master_phc_asha_indent` WHERE `indent_place_raised_by`='$place_id1' and `indent_id`='$indent_id' and `status`='2'";
  $sql_exe_list=mysqli_query($conn,$query_list);
   $num_rows_check=mysqli_num_rows($sql_exe_list);
  
 $get_block="SELECT * FROM `rhc_master_place_phc` WHERE `place_phc_id`='$place_id'";
    $sql_exec_block=mysqli_query($conn,$get_block);
    $block_fetch_detail=mysqli_fetch_assoc($sql_exec_block);
    $place_full_name1=strtoupper($block_fetch_detail['phc_name']).'['.$block_fetch_detail['place_phc_id'].']';
  $result_list=mysqli_fetch_assoc($sql_exe_list);
   

    if($result_list['place_status']=='1'){
    $receiver_id=$result_list['indent_place_raised_by'];
    $get_phc="SELECT * FROM `rhc_master_place_phc_sub_center` WHERE `place_phc_sub_id`='$receiver_id'";
    $sql_exec_phc=mysqli_query($conn,$get_phc);
    $phc_fetch_detail=mysqli_fetch_assoc($sql_exec_phc);                           
    $place_full_name=strtoupper($phc_fetch_detail['phc_sub_center_name']).'['.$phc_fetch_detail['place_phc_sub_id'].']'; 
    }else{
      $place_full_name=$receiver_id=$result_list['indent_place_raised_by'];
      // $get_aphc="SELECT * FROM `rhc_master_place_aphc` WHERE `place_aphc_id`='$receiver_id'";
      // $sql_exec_aphc=mysqli_query($conn,$get_aphc);
      // $aphc_fetch_detail=mysqli_fetch_assoc($sql_exec_aphc);                  
      // $place_full_name=strtoupper($aphc_fetch_detail['aphc_name']).'['.$aphc_fetch_detail['place_aphc_id'].']';
    }
    $date=date('d-m-Y');
    $time=date('h:i:s a');
    $date1=date('Y-m-d');
    $time1=date('H:i:s');

            
?>
<style type="text/css">
    
    .center {
    text-align: center;
    /*border: 3px solid green;*/
}
.row .row, .row-fluid .row-fluid {
    margin-bottom: 6px;
}
@media print{
    table td.shrink {
      white-space:nowrap
  }
  table td.expand {
      width: 99%
  }
  .clearfix:after {
    clear: both;
}
}
  </style>
  <style>
.panel-body {
    background-color: white;
}
#wrapper_menu {
  margin-bottom: -66px;
}
.btn-primary {
    color: #fff;
    background-color: #7eacd4;
    border-color: #357ebd;
    border-radius: 5px;
    padding: 5px;
}
.panel-primary > .panel-heading {
    color: #fff;
    background-color: #15c011;
    border-color: #428bca;
}
#candidate_list {
    margin-left: 21px;
    margin-right: 16px;
}
.btn-primarys {
    color: #fff;
    background-color: #16e08e;
    border-color: #1c7510;
    border-radius: 5px;
    padding: 5px;
}
fieldset {
    display: block;
    -webkit-margin-start: 2px;
    -webkit-margin-end: 2px;
    -webkit-padding-before: 0.35em;
    -webkit-padding-start: 0.75em;
    -webkit-padding-end: 0.75em;
    -webkit-padding-after: 0.625em;
    min-width: -webkit-min-content;
    border-width: 2px;
    border-style: groove;
    border-color: threedface;
    border-image: initial;
}
legend {
    display: block;
    width: 100%;
    padding: 0;
    margin-bottom: 20px;
    font-size: 21px;
    line-height: inherit;
    color: #333;
    border: 0;
    }
   
</style>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Issued Details Of Commodities
        <mdall></mdall>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Issue </a></li>
        <li class="active"><a href="#">Issued Details Of Commodities</a></li>
        <!-- <li class="active">Blank page</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="text-center">
      <?php $msg->display(); ?>
    </div>
    <div class="row">
    <div class="col-md-12">
      <!-- end message displayed -->
      <div class="panel panel-default">
        <div class="panel-heading text-center" style="background-color: lightpink;"><strong>Issued Details  </strong></div>
        <div class="demo">
          <div class="panel-body">
            <form class="form-inline"  >
        <div  id="printarea">
      <div id="section-to-print">
            <div class="col-md-12">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="email">Date :</label>                 
                    <?=$date1=date('d-m-Y',strtotime(trim($result_fetch_challen['date_creation'])));?>  
                  <input type="hidden" class="form-control" name="date" value="<?=$date1?>" > 
                </div>
              </div>
              <div class="col-md-6">
              <div class="form-group ">
                <label for="pwd">Time :</label>
                
                <?=$time1=date('h:i:s a',strtotime(trim($result_fetch_challen['time_creation'])));?>
                <input type="hidden" class="form-control" name="time" value="<?=$time1?>"> 
              </div> 
              </div> 
              <div class="col-md-6">
              <div class="form-group">
                <label for="email">Challan No :</label>
                 <?=$challen?>
                 <input type="hidden" name="challen_no" value="<?=$challen?>">
                <!-- <input type="email" class="form-control" id="email"> -->
              </div>
              </div>  
              <div class="col-md-6">
              <div class="form-group">
                <label for="email">Indent No :</label>
                  <?=$result_fetch_challen['indent_id'];?>
                <input type="hidden" class="form-control" name="indent_id" value="<?=$result_fetch_challen['indent_id'];?>">
              </div>
              </div> 
              
              <div class="col-md-6">      
              <div class="form-group">
                <label for="email">Indent Location :</label>
                <input type="hidden" name="receiver_id" value="<?=$receiver_id?>">
                 <?=$place_full_name?>
                <!-- <input type="email" class="form-control" id="email" value="Maner" readonly=""> -->
              </div>
              </div>
              <div class="col-md-6">
               <div class="form-group">
                <label for="email">Issue Location :</label>
                <input type="hidden" name="issuer_id" id="issuer_id" value="<?=$place_id?>">
                <?=$place_full_name1?>
                <!-- <input type="email" class="form-control" id="email" value="Maner" readonly=""> -->
              </div>
              </div>
            </div>
              
 
    
              <table id="myTable" class="table table-striped text-center" align="center" border="1" width="100%">
              <thead align="center">
              <tr>
                <th>Slno</th>
                <th>Item Code</th>
                <th>Type</th>
                <th>Qty Indented</th>
                 <th>Qty Issued</th>
                <th>Batch Details</th>
              </tr>
              </thead>
              <tbody align="center">
                  <?php 
                  $x=1;
                $query_list_item="SELECT * FROM `rhc_master_phc_asha_item_details_challan_no` WHERE `challan_no`='$challen'";
                $sql_exe_list_item=mysqli_query($conn,$query_list_item);

                while ($res_item=mysqli_fetch_assoc($sql_exe_list_item)) {?>
                 <tr>
                    <td><?=$x?></td>
                    <td><?=$res_item['item_code']?>
                      <input type="hidden" name="item_code[]" id="item_code<?=$x?>" value="<?=$res_item['item_code']?>">
                    </td>
                    <td><?=$res_item['item_type']?>
                      <input type="hidden" name="Item_type[]" id="Item_type<?=$x?>" value="<?=$res_item['item_type']?>">
                    </td>
                    <td><?=$res_item['quantity_indent']?>
                      <input type="hidden" name="item_quantity[]" id="item_quantity<?=$x?>" value="<?=$res_item['quantity_indent']?>">
                    </td>
                    <td>
                      <?=$res_item['quantity_issued']?>
                    <input type="hidden" name="item_quantity_issue[]" id="item_quantity<?=$x?>" value="<?=$res_item['quantity_issued']?>">
                    <input type="hidden" name="quantity_received[]" id="quantity_received<?=$x?>" value="<?=$res_item['quantity_issued']?>">
                    </td>
                    <td>
                      <table class="table table-striped" border="1" width="100%">
                        <thead>
                          <tr>
                            <th>Batch No</th>
                            <th>Qty</th>
                            <th>Date Exp</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $item_batch_id=$res_item['item_batch_id'];
                          $query_batch_details="SELECT * FROM `rhc_master_phc_asha_receive_batch_detail_item` WHERE `item_batch_id`='$item_batch_id'";

                          $sql_exe_batch_deatils=mysqli_query($conn,$query_batch_details);
                          $num_rows_batch=mysqli_num_rows($sql_exe_batch_deatils);
                          if($num_rows_batch!=0){
                            while ($result_batch=mysqli_fetch_assoc($sql_exe_batch_deatils)) {?>
                             <tr>
                             <input type="hidden" name="item_code_batch[]" id="item_code_batch<?=$x?>" value="<?=$res_item['item_code']?>">
                             <input type="hidden" name="Item_type_batch[]" id="Item_type_batch<?=$x?>" value="<?=$res_item['item_type']?>">
                              <td><?=$result_batch['batch_no']?>
                                 <input type="hidden" name="batch_no[]" id="batch_no<?=$x?>" value="<?=$result_batch['batch_no']?>">
                              </td>
                              <td><?=$result_batch['batch_quantity']?>
                                <input type="hidden" name="batch_quantity[]" id="batch_quantity<?=$x?>" value="<?=$result_batch['batch_quantity']?>">
                              </td>
                              <td><?=$result_batch['date_expire']?>
                                <input type="hidden" name="date_expire[]" id="date_expire<?=$x?>" value="<?=$result_batch['date_expire']?>">
                              </td>

                            </tr>
                          <?php }

                          }else{ ?>
                          <tr>
                              <td>N/A</td>
                              <td>N/A</td>
                              <td>N/A</td>

                            </tr>

                          <?php }
                          ?>
                        </tbody>
                      </table>
                   
                    </td>
                </tr>
                <?php $x++ ; }?>
              </tbody>
            </table>
            

        </div>
        </div>                   
            <a href="admin_issue_history.php"  class="btn btn-default">Back</a>             
           
          </form>
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
<script type="text/javascript">
//   $(document).on("keypress", "form", function(event) { 
//     return event.keyCode != 13;
// });
</script> 
