<?php
 // print_r($_REQUEST);
 // exit;
// Array ( [challen] => chal_791238 [indent] => ind001 ) 
session_start();
ob_start();
if($_SESSION['admin_emails']){
//$indent_id=$_GET['indent'];
require 'FlashMessages.php';
include 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 // Array ( [date] => 26-03-2017 [time] => 05:46:22 pm [challen_no] => chal_478513 [indent_id] => ind001 [receiver_id] => ATHM [issuer_id] => Pat ) 
	$date=$_REQUEST['date'];
	$time=$_REQUEST['time'];
	$challen_no=$_REQUEST['challen_no'];
	$indent_id=$_REQUEST['indent_id'];
	 $receiver_id=$_REQUEST['receiver_id'];
	$issuer_id=$_REQUEST['issuer_id'];
 	$challen_no=$_REQUEST['challen_no'];

 	 $query_update_indent="UPDATE `rhc_master_district_indent` SET `status`='2' WHERE `indent_id`='$indent_id' ";
		$sql_exe_update_indent=mysqli_query($conn,$query_update_indent);

	 $query_update_status_challan="UPDATE `rhc_master_district_challan_no` SET `status`='0' WHERE `challen_no`='$challen_no'";
	$sql_exe_update_status_challan=mysqli_query($conn,$query_update_status_challan);
 	// $msg->success('Challan No:- "'.$challen_no.'" To '.$receiver_id.' on Date ' .$date.' '.$time. ' SuccessFully' );
 	if($sql_exe_update_indent){
	if($sql_exe_update_status_challan){
	//$item_code=($_REQUEST['item_code']);
	$date=date('Y-m-d');
	$time=date('H:i:s');
	$get_item="SELECT * FROM `rhc_master_district_item_details_challan_no` WHERE `challan_no`='$challen_no'";
	$sql_exe_indent=mysqli_query($conn,$get_item);
	while($res=mysqli_fetch_assoc($sql_exe_indent)){
		// print_r($res);
		$array_list[]=$res['item_code']." ".$res['quantity_issued']." ".$res['item_type'];
	}
	
	
	$code_details= implode(",",$array_list);
	$top_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `place_state_id`='$issuer_id' and `user_designation`='1' and `status`='1'";
	$sql_exe_top_level_mobile=mysqli_query($conn,$top_level_mobile);
	while($res_top_level_mobile=mysqli_fetch_assoc($sql_exe_top_level_mobile)){
		// print_r($res);
		$array_list_user_mobile[]=$res_top_level_mobile['user_mobile'];
	}
	 $mobileno_top=implode(";",$array_list_user_mobile);

	 $raise_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `place_district_id`='$receiver_id' and `user_designation`='2' and `status`='1'";
	$sql_exe_raise_level_mobile=mysqli_query($conn,$raise_level_mobile);
	while($res_raise_level_mobile=mysqli_fetch_assoc($sql_exe_raise_level_mobile)){
		// print_r($res);
		$array_list_raise_user_mobile[]=$res_raise_level_mobile['user_mobile'];
	}
	  $mobileno_raise=implode(";",$array_list_raise_user_mobile);
	
	

	$datetime=date('Y-m-d H:i:s');
	 // $mobileno=$result_fetch1['user_mobile'];

	 $new_message='Stock Issued Successfully ';
	 $no_charaater1=strlen($new_message);
	$api_params = 'username=innova&password=Kumar@12#1&senderid=innova&to='.$mobileno_top.'&text='.$new_message.'&route=Informative&type=text&datetime='. $datetime.'';
    $smsGatewayUrl = "https://promo.webtwosms.com/api/api_http.php?";  
    $smsgatewaydata = $smsGatewayUrl.$api_params;
    $url = $smsgatewaydata;
    $ch = curl_init();
	$query1="INSERT INTO `rhc_master_sms`(`slno`, `messages`, `mobileno`, `item_details`, `no_charaater`,`status` ,`date`, `time`) VALUES (NULL, '$new_message','$mobileno_top','$code_details','$new_message','2','$date','$time')";
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
		 $new_message1=$code_details. '  has been issued on '.$datetime. ' with Challan No '.$challen_no;
	 	$no_charaater1=strlen($new_message1);
		$api_params1 = 'username=innova&password=Kumar@12#1&senderid=innova&to='.$mobileno_raise.'&text='.$new_message1.'&route=Informative&type=text&datetime='. $datetime.'';
   	 	$smsGatewayUrl1 = "https://promo.webtwosms.com/api/api_http.php?";  
   		 $smsgatewaydata = $smsGatewayUrl.$api_params;
    	$url = $smsgatewaydata;
    	$ch1 = curl_init();
		$query11="INSERT INTO `rhc_master_sms`(`slno`, `messages`, `mobileno`, `item_details`, `no_charaater`,`status` ,`date`, `time`) VALUES (NULL, '$new_message1','$mobileno_raise','$code_details','$no_charaater1','2','$date','$time')";
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
			$msg->success('Challan No:- "'.$challen_no.'" Issued  SuccessFully' );
			header('Location:admin_dashboard.php');
			exit;
		}else{
			$msg->success('Challan No:- "'.$challen_no.'" Issued  SuccessFully' );
			header('Location:admin_dashboard.php');
			exit;
		}
			}
	}else{
			$msg->success('Challan No:- "'.$challen_no.'" Issued  SuccessFully' );
			header('Location:admin_dashboard.php');
			exit;
	}
}

}else{
	header('Location:logout.php');
  	exit;
}
}else{
	header('Location:logout.php');
  	exit;
}








 // 	$msg->success('Challan No:- "'.$challen_no.'" Issued  SuccessFully' );
 	
	// header('Location:admin_dashboard.php');
	// exit;
 }else{
 	header('Location:logout.php');
  	exit;
 }

