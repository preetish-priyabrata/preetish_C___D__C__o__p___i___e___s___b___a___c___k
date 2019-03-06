<?php
session_start();

if($_SESSION['admin_emails']){

require 'FlashMessages.php';
include 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $challen=$_REQUEST['challen_no'];
 // finding challan no from the current table
$query_challan="SELECT * FROM `rhc_master_dh_block_challan_no` WHERE `challen_no`='$challen'";
$sql_exe_challan=mysqli_query($conn,$query_challan); // execation of database 
$result_fetch_challen =mysqli_fetch_assoc($sql_exe_challan); 
  $indent_id=$result_fetch_challen['indent_id'];
 $receiver_id=$place_id1=$result_fetch_challen['receiver_place_id'];
 $issuer_id=$place_id=$result_fetch_challen['issuer_place_id'];
  

   $query_list="SELECT * FROM `rhc_master_dh_block_indent` WHERE `indent_place_raised_by`='$place_id1' and `indent_id`='$indent_id' and `status`='1'";
  $sql_exe_list=mysqli_query($conn,$query_list);
   $num_rows_check=mysqli_num_rows($sql_exe_list);

  
                   
  
  
  $date=date('d-m-Y');
  $time=date('h:i:s a');
  $date1=date('Y-m-d');
  $time1=date('H:i:s');
 
  

  $desgination=$_SESSION['designation'];
     
  $x=1;
  $query_list_item="SELECT * FROM `rhc_master_dh_block_item_details_challan_no` WHERE `challan_no`='$challen'";
  $sql_exe_list_item=mysqli_query($conn,$query_list_item);
  while ($res_item=mysqli_fetch_assoc($sql_exe_list_item)) {
    $item_code[]=$res_item['item_code'];
    $Item_type[]=$res_item['item_type'];

    $item_quantity_issue[]=$res_item['quantity_issued'];
    $item_batch_id[]=$res_item['item_batch_id'];

    $item_batch_idm=$res_item['item_batch_id'];
    $query_batch_details="SELECT * FROM `rhc_master_dh_block_receive_batch_detail_item` WHERE `item_batch_id`='$item_batch_idm'";

    $sql_exe_batch_deatils=mysqli_query($conn,$query_batch_details);
    $num_rows_batch=mysqli_num_rows($sql_exe_batch_deatils);
    if($num_rows_batch!=0){
      while ($result_batch=mysqli_fetch_assoc($sql_exe_batch_deatils)) {
        
        $item_batch_idss[]=$res_item['item_batch_id'];
        $item_code_batch[]=$res_item['item_code'];
        $Item_type_batch[]=$res_item['item_type'];
        $batch_no[]=$result_batch['batch_no'];
        $batch_quantity[]=$result_batch['batch_quantity'];
        $date_expire[]=$result_batch['date_expire'];

      }
                       
    }
  }
 // print_r($batch_no);
 
  //insert into cancel table history
  $cancel_query="INSERT INTO `rhc_master_cancel_histroy`(`slno`, `cancel_from`, `cancel_to`, `challan_no`, `indent_no`, `date_creation`, `time_creation`, `flag_place`) VALUES (NULL,'$issuer_id','$receiver_id','$challen','$indent_id','$date','$time','$desgination')" ;
  $sql_exe=mysqli_query($conn,$cancel_query);
  $last_id = mysqli_insert_id($conn);
  $cancel_id="can".date('d-m-Y').$last_id;
  //update cancel_id
  $cancel_update="UPDATE `rhc_master_cancel_histroy` SET `cancel_id`='$cancel_id' WHERE `slno`='$last_id'";
  $sql_exe=mysqli_query($conn,$cancel_update);
  $store_array=array();
  // cancel Item is stored in cancel_table item
  for ($i=0; $i <count($item_code) ; $i++) { 
    $item_codes=$item_code[$i];
    $Item_types=$Item_type[$i];
    $item_quantitys=$item_quantity_issue[$i];
    $item_batch_ids=$item_batch_id[$i];
    // Query cancel Item is stored in cancel_table item
    $cancel_item="INSERT INTO `rhc_master_cancel_item`(`slno`, `challan_no`, `cancel_id`, `item_code`, `item_type`, `quantity_cancel`) VALUES (NULL,'$challen','$cancel_id','$item_codes','$Item_types','$item_quantitys')";
    $sql_exe=mysqli_query($conn,$cancel_item);
    $last_ids= mysqli_insert_id($conn);
    $cancel_batch="batch".date('dmy').$last_ids;
    $store_array[]=array('item_codes'=>$item_codes,'Item_types'=>$Item_types,'item_quantitys'=>$item_quantitys,'cancel_batch'=>$cancel_batch);
    $cancel_item_update="UPDATE `rhc_master_cancel_item` SET `cancel_batch_id`='$cancel_batch' WHERE `slno`='$last_ids'";
    $sql_exe=mysqli_query($conn,$cancel_item_update);

    $sql_stock_item="SELECT * FROM `rhc_master_stock_district_items` WHERE `item_codes`='$item_codes' And `item_types`='$Item_types' and `distrct_place_id`='$issuer_id'";//item_quantity
    $sql_exe_stock_item=mysqli_query($conn,$sql_stock_item);
    $num_stock_item=mysqli_num_rows($sql_exe_stock_item);
    if($num_stock_item!=0){
      $stock_fetch_item=mysqli_fetch_assoc($sql_exe_stock_item);
      $item_quantity=$stock_fetch_item['item_quantity'];
      $slno=$stock_fetch_item['slno'];
      $qty_item=$item_quantity+$item_quantitys;
      if($qty_item==0){
        $update_stock="UPDATE `rhc_master_stock_district_items` SET `item_quantity`='0' ,`status`='2' WHERE `slno`='$slno'";
      }else{
        $update_stock="UPDATE `rhc_master_stock_district_items` SET `item_quantity`='$qty_item' ,`status`='1' WHERE `slno`='$slno'";
      }
      $sql_exe=mysqli_query($conn,$update_stock);
    }
    // detele in issue stock table
    $sql_detele="DELETE FROM `rhc_master_dh_block_item_details_challan_no` WHERE `item_batch_id`='$item_batch_ids' AND `challan_no`='$challen'";
    $sql_exe=mysqli_query($conn,$sql_detele);

  }
  // Cancel 
  for ($i=0; $i <count($item_code) ; $i++) { 
    for ($j=0; $j <count($item_code_batch) ; $j++) { 
      $ty=$item_code[$i].$Item_type[$i];
      
      $ty1=$item_code_batch[$j].$Item_type_batch[$j];
      if($ty==$ty1){
        $item_batch_idss=$item_batch_id[$i];
        $item_code_batchs=$item_code_batch[$j];
        $Item_type_batchs=$Item_type_batch[$j];
        $batch_nos=$batch_no[$j];
        $batch_quantitys=$batch_quantity[$j];
        $date_expires=$date_expire[$j];

        // stock update
        $sql_stock_item="SELECT * FROM `rhc_master_stock_district_items` WHERE `item_codes`='$item_code_batchs' And `item_types`='$Item_type_batchs' and `state_place_id`='$issuer_id'";//item_quantity
        $sql_exe_stock_item=mysqli_query($conn,$sql_stock_item);
        $num_stock_item=mysqli_num_rows($sql_exe_stock_item);
        if($num_stock_item!=0){
          $stock_fetch_item=mysqli_fetch_assoc($sql_exe_stock_item);
          $district_stock_batch_id=$stock_fetch_item['district_stock_batch_id'];
          $stock_batch="SELECT * FROM `rhc_master_stock_district_batch_details` WHERE `district_stock_batch_id`='$district_stock_batch_id' and `batch_nos`='$batch_nos'";
          $sql_exe_stock_item_batch=mysqli_query($conn,$stock_batch);
          $num_stock_item_batch=mysqli_num_rows($sql_exe_stock_item_batch);
          if($num_stock_item_batch==1){
            $stock_fetch_item_batch=mysqli_fetch_assoc($sql_exe_stock_item_batch);
            $remaining_quantity=$stock_fetch_item_batch['remaining_quantity'];
            $slno=$stock_fetch_item_batch['slno'];
            $qty_remaining=$remaining_quantity+$batch_quantitys;
            if($qty_remaining==0){
              $update_stock_batch="UPDATE `rhc_master_stock_district_batch_details` SET `status`='2',`remaining_quantity`='0' WHERE `slno`='$slno'";
            }else{
              $update_stock_batch="UPDATE `rhc_master_stock_district_batch_details` SET `status`='1',`remaining_quantity`='$qty_remaining' WHERE `slno`='$slno'";
            }
            $sql_exe=mysqli_query($conn,$update_stock_batch);
          }

        }
        // 
        // cancel id
        $cancel_batch_ids=$store_array[$i]['cancel_batch'];
        // CANCEL TABLE INSERT
        $cancel_batch_query="INSERT INTO `rhc_master_cancel_batch`(`slno`, `challan_no`, `cancel_id`, `batch_no`, `expire_date`, `quantity_batch`, `cancel_batch_id`) VALUES (NULL,'$challen','$cancel_id','$batch_nos','$date_expires','$batch_quantitys','$cancel_batch_ids')";
        $sql_exe=mysqli_query($conn,$cancel_batch_query);
        // 
        $del_batch_issue_query="DELETE FROM `rhc_master_dh_block_receive_batch_detail_item` WHERE `item_batch_id`='$item_batch_idss' and `item_code`='$item_code_batchs' and `batch_no`='$batch_nos'";
        $sql_exe=mysqli_query($conn,$del_batch_issue_query);

      }
    }
  }
  
  $det_challan="DELETE FROM `rhc_master_dh_block_challan_no` WHERE `indent_id`='$indent_id' and `challen_no`='$challen'";
  $sql_exe=mysqli_query($conn,$det_challan);

    $msg->warning('Please update stock details');
    header('Location:admin_avaliable_stock_view.php');
    exit;

}else{
  header('Location:logout.php');
  exit;
}