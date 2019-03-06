<?php
//  print_r($_REQUEST);
// exit;
date_default_timezone_set("Asia/Kolkata");
session_start();
ob_start();
if($_SESSION['admin_emails']){

require 'FlashMessages.php';
include 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
// Array ( [date] => 09-04-2017 [time] => 08:46:07 pm [challen_no] => chal345271 [indent_id] => dhb001 [receiver_id] => ATHM [issuer_id] => Pat [item_code] => Array ( [0] => ocp [1] => ocp ) [Item_type] => Array ( [0] => f [1] => p ) [item_quantity] => Array ( [0] => 5 [1] => 10 ) [item_quantity_issue] => Array ( [0] => 5 [1] => 10 ) [quantity_received] => Array ( [0] => 5 [1] => 10 ) [item_code_batch] => Array ( [0] => ocp [1] => ocp ) [Item_type_batch] => Array ( [0] => f [1] => p ) [batch_no] => Array ( [0] => b117 [1] => b765 ) [batch_quantity] => Array ( [0] => 5 [1] => 10 ) [date_expire] => Array ( [0] => 2017-04-29 [1] => 2017-04-10 ) ) 
// 
$item_batch_id_serial=$_REQUEST['item_batch_id_serial'];

$comment=$_REQUEST['comment'];

$batch_no1=$_REQUEST['batch_no'];
$date_expire1=$_REQUEST['date_expire1'];
$array_lists=array();
$date=$_REQUEST['date'];
$time=$_REQUEST['time'];
 $date=date('Y-m-d');
  $time=date('H:i:s');
$challen_no=$_REQUEST['challen_no'];
$indent_id=$_REQUEST['indent_id'];
$user_id=$_SESSION['admin_emails'];

$item_code=$_REQUEST['item_code'];
$Item_type=$_REQUEST['Item_type'];
$item_quantity_issue=$_REQUEST['item_quantity_issue'];
$quantity_receiveds=$_REQUEST['quantity_receiveds'];

$item_code_batch=$_REQUEST['item_code_batch'];
$Item_type_batch=$_REQUEST['Item_type_batch'];
$batch_no=$_REQUEST['batch_no'];
// $batch_quantity=$_REQUEST['batch_quantity'];
// check of batch quantity
$batch_quantity_manual=$_REQUEST['batch_quantity'];
$batch_quantity=$_REQUEST['batch_quantitys'];
if(count($batch_quantity_manual)==count($batch_quantity)){

  for ($i=0; $i <count($batch_quantity_manual) ; $i++) { 
    if($batch_quantity[$i]!=""){
      if($batch_quantity[$i]>0){
        if($batch_quantity[$i]>$batch_quantity_manual[$i]){
          $msg->warning("Received batch quantity cannot exceed issued batch quantity");
          header('Location:admin_received_issue_challan.php?challen_no='.$challen_no);
          exit;
        }
      }else if ($batch_quantity[$i] == 0){

      }else{
        $msg->warning("Quanity cannot be negative");
        header('Location:admin_received_issue_challan.php?challen_no='.$challen_no);
        exit;
      }

    }else{
      $msg->warning("Batch quantity field cannot be left blank");
      header('Location:admin_received_issue_challan.php?challen_no='.$challen_no);
      exit;
    }
  
  }
}else{
  $msg->warning('Missing batch quantity');
  header('Location:admin_received_issue_challan.php?challen_no='.$challen_no);
  exit;
}
$date_expire=$_REQUEST['date_expire'];

$issuer_id=$_REQUEST['issuer_id'];
$receiver_id=$_REQUEST['receiver_id'];

for ($i=0; $i <count($item_code) ; $i++) { 
  $item_codes=$item_code[$i];
  $Item_types=$Item_type[$i];
  $item_quantity_issues=$item_quantity_issue[$i];
  $quantity_receivedss=$quantity_receiveds[$i];

  $array_list[]=$item_codes." ".$quantity_receivedss." ".$Item_types;
  $array_lists[]=array('item'=>$item_codes,'type'=>$Item_types,'qnt'=>$quantity_receivedss);
  $query_update_item_challan="UPDATE `rhc_master_dh_block_item_details_challan_no` SET `quantity_received`='$quantity_receivedss',`status`='1' WHERE `challan_no`='$challen_no' and `item_code`='$item_codes' And `item_type`='$Item_types'";
  $sql_exe_update_item=mysqli_query($conn,$query_update_item_challan);

  $query_get_item_code_id="SELECT * FROM `rhc_master_stock_uphc_items` WHERE `item_types`='$Item_types' and `item_codes`='$item_codes' and `uphc_place_id`='$receiver_id'";
  $sql_exe_get_item_code_id=mysqli_query($conn,$query_get_item_code_id);
  
  $result_detail=mysqli_fetch_assoc($sql_exe_get_item_code_id);
  
  $item_quantity=$result_detail['item_quantity'];
  $cal=$quantity_receivedss+$item_quantity;
  
  $update="UPDATE `rhc_master_stock_uphc_items` SET `item_quantity`='$cal',`status`='1' WHERE `item_types`='$Item_types' and `item_codes`='$item_codes' and `uphc_place_id`='$receiver_id'";
  $sql_exe_update=mysqli_query($conn,$update);
}

$quer_challan_update="UPDATE `rhc_master_dh_block_challan_no` SET `date_update_status`='$date',`time_update_status`='$time',`user_id`='$user_id',`status`='1' ,`comment`='$comment' WHERE `challen_no`='$challen_no'";
$sql_exe_challan_update=mysqli_query($conn,$quer_challan_update);

for ($i=0; $i <count($item_code_batch) ; $i++) { 
  for ($j=0; $j <count($array_lists) ; $j++) { 

  $item_code_batchs=$item_code_batch[$i];
  $Item_type_batchs=$Item_type_batch[$i];
  $batch_nos=$batch_no[$i];
  $batch_quantitys=$batch_quantity[$i];
  $date_expires=$date_expire[$i];
  $item=$array_lists[$j]['item'];
    $type=$array_lists[$j]['type'];
    $qnt=$array_lists[$j]['qnt'];
    $x_item_batch=$item_code_batchs.$Item_type_batchs;
    $item_batch_serial=$item_batch_id_serial[$i];
    $x_item_rec=$item.$type;
    if($x_item_batch==$x_item_rec){
      if($qnt!=0){

        $update_received_batches_info="UPDATE `rhc_master_dh_block_receive_batch_detail_item` SET `rec_batch_no`='$batch_nos',`rec_batch_expire`='$date_expires',`rec_batch_quantity`='$batch_quantitys' WHERE`slno`='$item_batch_serial'";
        $sql_exe_received_batches_info=mysqli_query($conn,$update_received_batches_info);

        $query_get_item_code_id1="SELECT * FROM `rhc_master_stock_uphc_items` WHERE `item_types`='$Item_type_batchs' and `item_codes`='$item_code_batchs' and `uphc_place_id`='$receiver_id'";
        $sql_exe_get_item_code_id1=mysqli_query($conn,$query_get_item_code_id1);
        $result_detail1=mysqli_fetch_assoc($sql_exe_get_item_code_id1);

        $uphc_stock_batch_id=$result_detail1['uphc_stock_batch_id'];
        $dh_check="SELECT * FROM `rhc_master_stock_uphc_batch_details` WHERE `uphc_stock_batch_id`='$uphc_stock_batch_id' and `batch_nos`='$batch_nos'";
        $sql_exe_check=mysqli_query($conn,$dh_check);
        $num_check_batch=mysqli_num_rows($sql_exe_check);
        if($num_check_batch==0){
          $batch_insert="INSERT INTO `rhc_master_stock_uphc_batch_details`(`slno`, `uphc_stock_batch_id`, `batch_nos`, `date_exp`, `total_quantity`, `remaining_quantity`, `status`, `date_creation`, `time_creation`, `uphc_place_id`) VALUES (NULL,'$uphc_stock_batch_id','$batch_nos','$date_expires','$batch_quantitys','$batch_quantitys','1','$date','$time','$receiver_id')";

          $sql_exe_batch_insert=mysqli_query($conn,$batch_insert);
        }else{
          $fetch_stock=mysqli_fetch_assoc($sql_exe_check);
          $slno=$fetch_stock['slno'];
          $remaining_quantity=$fetch_stock['remaining_quantity'];
          $total_quantity=$fetch_stock['total_quantity'];
          $total_qnt=$total_quantity+$batch_quantitys;
          $remaining_qnt=$remaining_quantity+$batch_quantitys;
          if($remaining_qnt!=0){
            $batch_update="UPDATE `rhc_master_stock_uphc_batch_details` SET `total_quantity`='$total_qnt',`remaining_quantity`='$remaining_qnt',`status`='1',`date_creation`='$date',`time_creation`='$time' WHERE  `slno`='$slno'";
            $sql_exe_batch_insert=mysqli_query($conn,$batch_update);

          }
        }

      }
    }
  }
}
  

  
  
  //$item_code=($_REQUEST['item_code']);
  $date=date('Y-m-d');
  $time=date('H:i:s');
  
  
  $code_details= implode(",",$array_list);
  $array_list_user_mobile=array();
  $top_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `place_district_id`='$issuer_id' and `user_designation`='2' and `status`='1' ";
  $sql_exe_top_level_mobile=mysqli_query($conn,$top_level_mobile);
  while($res_top_level_mobile=mysqli_fetch_assoc($sql_exe_top_level_mobile)){
    // print_r($res);
    $array_list_user_mobile[]=$res_top_level_mobile['user_mobile'];
     $state=$res_top_level_mobile['place_state_id'];
  }
    //state
    $top_level_mobile1="SELECT * FROM `rhc_master_login_user` WHERE `place_state_id`='$state' and `user_designation`='1' And `status`='1'";
  $sql_exe_top_level_mobile1=mysqli_query($conn,$top_level_mobile1);
  while($res_top_level_mobile1=mysqli_fetch_assoc($sql_exe_top_level_mobile1)){
    // print_r($res);
    $array_list_user_mobile[]=$res_top_level_mobile1['user_mobile'];
  }
   $mobileno_top=implode(";",$array_list_user_mobile);

    $query_list="SELECT * FROM `rhc_master_dh_block_indent` WHERE `indent_place_raised_to`='$issuer_id' and `indent_id`='$indent_id' ";
  $sql_exe_list=mysqli_query($conn,$query_list);
$result_list=mysqli_fetch_assoc($sql_exe_list);
   if($result_list['place_status']=='1'){
      $raise_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `place_block_dh_id`='$receiver_id' and `user_designation`='3' and `status`='1'";
    }else{
      if($result_list['place_status']=='1'){
      $raise_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `place_block_dh_id`='$receiver_id' and `user_designation`='4' and `status`='1' ";
      }else{
        $raise_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `place_block_dh_id`='$receiver_id' and `user_designation`='11' and `status`='1' ";
      }

    }

   
  $sql_exe_raise_level_mobile=mysqli_query($conn,$raise_level_mobile);
  while($res_raise_level_mobile=mysqli_fetch_assoc($sql_exe_raise_level_mobile)){
    // print_r($res);
    $array_list_raise_user_mobile[]=$res_raise_level_mobile['user_mobile'];
  }
   $mobileno_raise=implode(";",$array_list_raise_user_mobile);
  
  $datetime=date('Y-m-d H:i:s');
   // $mobileno=$result_fetch1['user_mobile'];

   $new_message=$code_details. " with Challan No ".$challen_no.  ' on  '.$datetime. ' Received Success-fully ';
   $no_charaater1=strlen($new_message);
  $api_params = 'username=innova&password=Kumar@12#1&senderid=innova&to='.$mobileno_top.'&text='.$new_message.'&route=Informative&type=text&datetime='. $datetime.'';
    $smsGatewayUrl = "https://promo.webtwosms.com/api/api_http.php?";  
    $smsgatewaydata = $smsGatewayUrl.$api_params;
    $url = $smsgatewaydata;
    $ch = curl_init();
  $query1="INSERT INTO `rhc_master_sms`(`slno`, `messages`, `mobileno`, `item_details`, `no_charaater`,`status` ,`date`, `time`) VALUES (NULL, '$new_message','$mobileno_top','$code_details','$no_charaater1','2','$date','$time')";
  $sql_exe_sms1=mysqli_query($conn,$query1);
  if($sql_exe_sms1){        
  curl_setopt($ch, CURLOPT_URL,$smsGatewayUrl);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS,$api_params);

  // in real life you should use something like:
  // curl_setopt($ch, CURLOPT_POSTFIELDS, 
  //          http_build_query(array('postvar1' => 'value1')));

  // receive server response ...
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

   $server_output = curl_exec ($ch);

  curl_close ($ch);     
  if($server_output){
    $datetime=date('Y-m-d H:i:s');
   // $mobileno=$result_fetch1['user_mobile'];

     $new_message1='Receipt Confirmation Sent Success-fully'.$datetime;
    $no_charaater1=strlen($new_message1);
    $api_params1 = 'username=innova&password=Kumar@12#1&senderid=innova&to='.$mobileno_raise.'&text='.$new_message1.'&route=Informative&type=text&datetime='. $datetime.'';
      $smsGatewayUrl1 = "https://promo.webtwosms.com/api/api_http.php?";  
       $smsgatewaydata = $smsGatewayUrl.$api_params;
      $url = $smsgatewaydata;
      $ch1 = curl_init();
    $query11="INSERT INTO `rhc_master_sms`(`slno`, `messages`, `mobileno`, `item_details`, `no_charaater`,`status` ,`date`, `time`) VALUES (NULL, '$new_message1','$mobileno_raise','$new_message1','$no_charaater1','2','$date','$time')";
    $sql_exe_sms11=mysqli_query($conn,$query11);
    if($sql_exe_sms11){        
    curl_setopt($ch1, CURLOPT_URL,$smsGatewayUrl1);
    curl_setopt($ch1, CURLOPT_POST, 1);
    curl_setopt($ch1, CURLOPT_POSTFIELDS,$api_params1);

  // in real life you should use something like:
  // curl_setopt($ch, CURLOPT_POSTFIELDS, 
  //          http_build_query(array('postvar1' => 'value1')));

  // receive server response ...
    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);

    $server_output1 = curl_exec ($ch1);

    curl_close ($ch1);
    if($server_output1){
      $msg->success('Receipt Confirmation Submited  Success-fully');
      header('Location:admin_dashboard.php');
      exit;
    }else{
      $msg->success('Receipt Confirmation Submited  Success-fully');
      header('Location:admin_dashboard.php');
      exit;
    }
      }
  }else{
      $msg->success('Receipt Confirmation Submited  Success-fully');
      header('Location:admin_dashboard.php');
      exit;
  }









      
  }   
    

}else{
  header('Location:logout.php');
    exit;
}
