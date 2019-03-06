<?php 
// print_r($_REQUEST);

error_reporting(E_ALL);
session_start();
date_default_timezone_set("Asia/Kolkata");
if($_SESSION['admin_emails']){
  require 'FlashMessages.php';
  include "config.php";
   $msg = new \Preetish\FlashMessages\FlashMessages();
// print_r($_REQUEST);
   // Array ( [indent_id] => ind0030 [top_place_id] => Pat [raise_place_id] => ATHM )
  $indent_id=trim($_REQUEST['indent_id']);
  //$place_status=trim($_REQUEST['place_status']);
  $top_place_id=trim($_REQUEST['top_place_id']);
  $raise_place_id=trim($_REQUEST['raise_place_id']);
  //$item_code=($_REQUEST['item_code']);
  $date=date('Y-m-d');
  $time=date('H:i:s');
  $get_indent="SELECT * FROM `rhc_master_district_indent_id_details` WHERE `indent_id`='$indent_id'";
  $sql_exe_indent=mysqli_query($conn,$get_indent);
  while($res=mysqli_fetch_assoc($sql_exe_indent)){
    // print_r($res);
    $array_list[]=$res['item_code']." ".$res['item_quantity']." ".$res['Item_type'];
  }
  
  $code_details= implode(",",$array_list);
  $top_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `place_state_id`='$top_place_id' and `user_designation`='1' And `status`='1'";
  $sql_exe_top_level_mobile=mysqli_query($conn,$top_level_mobile);
  while($res_top_level_mobile=mysqli_fetch_assoc($sql_exe_top_level_mobile)){
    // print_r($res);
    $array_list_user_mobile[]=$res_top_level_mobile['user_mobile'];
  }
    $mobileno_top=implode(";",$array_list_user_mobile);

   $raise_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `place_district_id`='$raise_place_id' and `user_designation`='2' And `status`='1'";
  $sql_exe_raise_level_mobile=mysqli_query($conn,$raise_level_mobile);
  while($res_raise_level_mobile=mysqli_fetch_assoc($sql_exe_raise_level_mobile)){
    // print_r($res);
    $array_list_raise_user_mobile[]=$res_raise_level_mobile['user_mobile'];
  }
   $mobileno_raise=implode(";",$array_list_raise_user_mobile);
  
  $datetime=date('Y-m-d H:i:s');
   // $mobileno=$result_fetch1['user_mobile'];

   $new_message="Indent From ".$raise_place_id. '  with '.$code_details. ' has been raised on '.$datetime. ' against indent id  '.$indent_id;
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

     $new_message1='Indent Generated Success-fully ';
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
      $msg->success('Indent Rasied Success-fully');
      header('Location:admin_dashboard.php');
      exit;
    }else{
      $msg->success('Indent Rasied Success-fully');
      header('Location:admin_dashboard.php');
      exit;
    }
      }
  }else{
      $msg->success('Indent Rasied Success-fully');
      header('Location:admin_dashboard.php');
      exit;
  }









      
  }   
    

}else{
  header('Location:logout.php');
  exit;
}
?>