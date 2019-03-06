<?php

date_default_timezone_set("Asia/Kolkata");
session_start();
ob_start();
if($_SESSION['admin_emails']){

require 'FlashMessages.php';
include 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();

$time=date('H:i:s');
$date=date('Y-m-d');


$issuer_id=$_REQUEST['top_place_id'];
$receiver_id=$_REQUEST['raise_place_id'];

$item_codes=$_REQUEST['item_codes'];
$item_types=$_REQUEST['item_types'];
$item_quantity=$_REQUEST['item_quantity'];
$item_quantity1=$_REQUEST['item_quantity1'];
$slno=$_REQUEST['slno'];
$total=$_REQUEST['total'];
$user=$_SESSION['admin_emails'];

for ($i=0; $i <$total ; $i++) { 
 $item_quantitys=$item_quantity[$i];
  if($item_quantitys>0){
     $updated_stock[] = array('item_codes' =>$item_codes[$i] ,'item_types' =>$item_types[$i],'item_quantity' =>$item_quantity[$i] );
     $array_list[]=$item_codes[$i]." ".$item_quantity[$i]." ".$item_types[$i];
     $present_stock[] = array('item_codes' =>$item_codes[$i] ,'item_types' =>$item_types[$i],'item_quantity' =>$item_quantity1[$i] );
  }else{
     $updated_stock[] = array('item_codes' =>$item_codes[$i] ,'item_types' =>$item_types[$i],'item_quantity' =>'0' );
     $array_list[]=$item_codes[$i]." "."0"." ".$item_types[$i];
     $present_stock[] = array('item_codes' =>$item_codes[$i] ,'item_types' =>$item_types[$i],'item_quantity' =>$item_quantity1[$i] );
  }
}
// print_r($updated_stock);
   $updtd_stock=json_encode($updated_stock);
   $pres_stock=json_encode($present_stock);
  for ($i=0; $i <$total ; $i++) {
    $item_quantitys=$item_quantity[$i];
     $item_quantitys=$item_quantity[$i];
      $slnos=$slno[$i];
    if($item_quantitys==0){
      
         $query_update="UPDATE `rhc_master_stock_district_hospital_items` SET `item_quantity`='$item_quantitys',`date_creation`='$date',`time_creation`='$time',`status`='2' WHERE `slno`='$slnos'";
     
     
    }else{
      if($item_quantitys>0){
      
       $query_update="UPDATE `rhc_master_stock_district_hospital_items` SET `item_quantity`='$item_quantitys',`date_creation`='$date',`time_creation`='$time',`status`='1' WHERE `slno`='$slnos'";
      }else{

         $query_update="UPDATE `rhc_master_stock_district_hospital_items` SET `item_quantity`='0',`date_creation`='$date',`time_creation`='$time',`status`='2' WHERE `slno`='$slnos'";
      }
    }
   $sql_exe=mysqli_query($conn,$query_update);
  }
   $insert_query="INSERT INTO `rhc_master_update_dh_block_stock`(`slno`, `updated_place_to`, `updated_place_from`, `present_info`, `updated_info`, `date`, `time`, `updated_user_id`,`place_status`) VALUES (NULL,'$issuer_id','$receiver_id','$pres_stock','$updtd_stock','$date','$time','$user','3')";
   $sql_exe_insert=mysqli_query($conn,$insert_query);
   // echo mysqli_error($conn);
   // exit;
   if($sql_exe_insert){
   
// sms
  //$item_code=($_REQUEST['item_code']);
  $date=date('Y-m-d');
  $time=date('H:i:s');
  
  
  $code_details= implode(",",$array_list);
  $array_list_user_mobile=array();
  $top_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `place_state_id`='$issuer_id' and `user_designation`='1' And `status`='1'";
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

  $raise_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `place_block_dh_id`='$receiver_id' and `user_designation`='11' and `status`='1'";

  $sql_exe_raise_level_mobile=mysqli_query($conn,$raise_level_mobile);
  while($res_raise_level_mobile=mysqli_fetch_assoc($sql_exe_raise_level_mobile)){
    // print_r($res);
    $array_list_raise_user_mobile[]=$res_raise_level_mobile['user_mobile'];
  }
   $mobileno_raise=implode(";",$array_list_raise_user_mobile);
  
  $datetime=date('Y-m-d H:i:s');
   // $mobileno=$result_fetch1['user_mobile'];

    $new_message="Stocks of ".$code_details.  ' on  '.$datetime. ' updated Success-fully ';
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

      $new_message1='Stock Updated Successfully';
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
     $msg->error('Please contact Support team');
      header('Location:admin_dashboard.php');
      exit;
   }



  
    

}else{
  header('Location:logout.php');
    exit;
}
