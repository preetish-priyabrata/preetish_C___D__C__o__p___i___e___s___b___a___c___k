<?php
date_default_timezone_set("Asia/Kolkata");
session_start();
ob_start();
if($_SESSION['admin_emails']){

require 'FlashMessages.php';
include 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
// echo "<pre>";
// print_r($_REQUEST);
// exit;
// Array ( [date] => 07-04-2017 [time] => 08:29:35 pm [challen_no] => chal325784 [indent_id] => dis0004061 [issuer_id] => BR [receiver_id] => Pat [item_code] => Array ( [0] => ocp [1] => ocp ) [Item_type] => Array ( [0] => f [1] => p ) [item_quantity] => Array ( [0] => 10 [1] => 20 ) [item_quantity_issue] => Array ( [0] => 10 [1] => 20 ) [quantity_received] => Array ( [0] => 10 [1] => 20 ) [item_code_batch] => Array ( [0] => ocp [1] => ocp ) [Item_type_batch] => Array ( [0] => f [1] => p ) [batch_no] => Array ( [0] => b117 [1] => b765 ) [batch_quantity] => Array ( [0] => 10 [1] => 20 ) [date_expire] => Array ( [0] => 2017-04-29 [1] => 2017-04-10 ) ) 

// $date=$_REQUEST['date'];
// $time=$_REQUEST['time'];
$time=date('H:i:s');
$date=date('Y-m-d');
$challen_no=$_REQUEST['challen_no'];
$indent_id=$_REQUEST['indent_id'];
$user_id=$_SESSION['admin_emails'];

$item_code=$_REQUEST['item_code'];
$Item_type=$_REQUEST['Item_type'];
$item_quantity_issue=$_REQUEST['item_quantity_issue'];

$item_code_batch=$_REQUEST['item_code_batch'];
$Item_type_batch=$_REQUEST['Item_type_batch'];
$batch_no=$_REQUEST['batch_no'];
$batch_quantity=$_REQUEST['batch_quantity'];
$date_expire=$_REQUEST['date_expire'];

$issuer_id=$_REQUEST['issuer_id'];
$receiver_id=$_REQUEST['receiver_id'];

for ($i=0; $i <count($item_code) ; $i++) { 
	$item_codes=$item_code[$i];
	$Item_types=$Item_type[$i];
	$item_quantity_issues=$item_quantity_issue[$i];

	$array_list[]=$item_codes." ".$item_quantity_issues." ".$Item_types;

	$query_update_item_challan="UPDATE `rhc_master_district_item_details_challan_no` SET `quantity_received`='$item_quantity_issues',`status`='1' WHERE `challan_no`='$challen_no' and `item_code`='$item_codes' And `item_type`='$Item_types'";
	$sql_exe_update_item=mysqli_query($conn,$query_update_item_challan);

	$query_get_item_code_id="SELECT * FROM `rhc_master_stock_district_items` WHERE `item_types`='$Item_types' and `item_codes`='$item_codes' and `distrct_place_id`='$receiver_id'";
	$sql_exe_get_item_code_id=mysqli_query($conn,$query_get_item_code_id);
	
	$result_detail=mysqli_fetch_assoc($sql_exe_get_item_code_id);
	
	$item_quantity=$result_detail['item_quantity'];
	$cal=$item_quantity_issues+$item_quantity;
	
	$update="UPDATE `rhc_master_stock_district_items` SET `item_quantity`='$cal',`status`='1' WHERE `item_types`='$Item_types' and `item_codes`='$item_codes' and `distrct_place_id`='$receiver_id'";
	$sql_exe_update=mysqli_query($conn,$update);
}

$quer_challan_update="UPDATE `rhc_master_district_challan_no` SET `date_update_status`='$date',`time_update_status`='$time',`user_id`='$user_id',`status`='1' WHERE `challen_no`='$challen_no'";
$sql_exe_challan_update=mysqli_query($conn,$quer_challan_update);

for ($i=0; $i <count($item_code_batch) ; $i++) { 
	$item_code_batchs=$item_code_batch[$i];
	$Item_type_batchs=$Item_type_batch[$i];
	$batch_nos=$batch_no[$i];
	$batch_quantitys=$batch_quantity[$i];
	$date_expires=$date_expire[$i];

	$query_get_item_code_id1="SELECT * FROM `rhc_master_stock_district_items` WHERE `item_types`='$Item_type_batchs' and `item_codes`='$item_code_batchs' and `distrct_place_id`='$receiver_id'";
	$sql_exe_get_item_code_id1=mysqli_query($conn,$query_get_item_code_id1);
	$result_detail1=mysqli_fetch_assoc($sql_exe_get_item_code_id1);

	$district_stock_batch_id=$result_detail1['district_stock_batch_id'];

	 $batch_insert="INSERT INTO `rhc_master_stock_district_batch_details`(`slno`, `district_stock_batch_id`, `batch_nos`, `date_exp`, `total_quantity`, `remaining_quantity`, `status`, `date_creation`, `time_creation`, `district_place_id`) VALUES (NULL,'$district_stock_batch_id','$batch_nos','$date_expires','$batch_quantitys','$batch_quantitys','1','$date','$time','$receiver_id')";

	$sql_exe_batch_insert=mysqli_query($conn,$batch_insert);

}
	
	

	
	
	//$item_code=($_REQUEST['item_code']);
	$date=date('Y-m-d');
	$time=date('H:i:s');
	
	
	$code_details= implode(",",$array_list);
	$top_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `place_state_id`='$issuer_id' and `user_designation`='1' And `status`='1'";
	$sql_exe_top_level_mobile=mysqli_query($conn,$top_level_mobile);
	while($res_top_level_mobile=mysqli_fetch_assoc($sql_exe_top_level_mobile)){
		// print_r($res);
		$array_list_user_mobile[]=$res_top_level_mobile['user_mobile'];
	}
	 $mobileno_top=implode(";",$array_list_user_mobile);

	 $raise_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `place_district_id`='$receiver_id' and `user_designation`='2' And `status`='1'";
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
