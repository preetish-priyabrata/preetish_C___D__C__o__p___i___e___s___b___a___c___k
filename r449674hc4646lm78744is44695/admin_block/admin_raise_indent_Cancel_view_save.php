<?php

error_reporting(4);
session_start();
ob_start();
if($_SESSION['admin_emails']){
  // Array ( [date] => 2017-05-16 [time] => 21:20:28 [indent_id] => dis0005122 [receiver_id] => Pat [issuer_id] => BR [item_code] => Array ( [0] => ocp ) [Item_type] => Array ( [0] => f ) [item_quantity] => Array ( [0] => 50000 ) [ids] => 1 )


$indent_id=$_REQUEST['indent_id'];
$raise_place_id=$_REQUEST['receiver_id'];
$top_place_id=$_REQUEST['issuer_id'];
require 'FlashMessages.php';
include 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
  $place_id=$_SESSION['place_id'];
    $cancel_indent="UPDATE `rhc_master_dh_block_indent` SET `status`='0' WHERE `indent_id`='$indent_id'";
    $sql_exe=mysqli_query($conn,$cancel_indent);

  // if($num_rows==0){
    
  //   header('Location:admin_dashboard.php');
  //   exit;
  // }
  $date=date('Y-m-d');
  $time=date('H:i:s');
  $date1=date('Y-m-d');
  $time1=date('H:i:s');

 
 $array_list_user_mobile=array();
	$top_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `place_district_id`='$top_place_id' and `user_designation`='2' and `status`='1'";
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

   $raise_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `place_block_dh_id`='$raise_place_id' and `user_designation`='3' and `status`='1'";
	$sql_exe_raise_level_mobile=mysqli_query($conn,$raise_level_mobile);
	while($res_raise_level_mobile=mysqli_fetch_assoc($sql_exe_raise_level_mobile)){
		// print_r($res);
		$array_list_raise_user_mobile[]=$res_raise_level_mobile['user_mobile'];
	}
  
  $datetime=date('Y-m-d H:i:s');
   // $mobileno=$result_fetch1['user_mobile'];

   $new_message="Indent Id is ".$indent_id." Cancelled Successfully";
   $code_details=$no_charaater1=strlen($new_message);
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

     $new_message1="Indent Id is ".$indent_id." Cancelled Successfully";
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
      $msg->success('Indent Id is '.$indent_id.' Cancel Successfully');
      header('Location:admin_dashboard.php');
      exit;
    }else{
      $msg->success('Indent Id is '.$indent_id.' Cancel Successfully');
      header('Location:admin_dashboard.php');
      exit;
    }
      }
  }else{
      $msg->success('Indent Id is '.$indent_id.' Cancel Successfully');
      header('Location:admin_dashboard.php');
      exit;
  }



 // 





      
  }   
// mysqli_error($conn);
  $msg->success("Indent Id is ".$indent_id." Cancel Successfully");
      header('Location:admin_dashboard.php');
      exit;

}else{
    header('Location:logout.php');
    exit;
}
?>