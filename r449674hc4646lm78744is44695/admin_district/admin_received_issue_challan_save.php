<?php
// echo "<pre>";
 
date_default_timezone_set("Asia/Kolkata");
session_start();
ob_start();
if($_SESSION['admin_emails']){

require 'FlashMessages.php';
include 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
echo "<pre>";
print_r($_REQUEST);
exit;
// Array ( [date] => 24-07-2017 [time] => 07:41:23 pm [challen_no] => chal509472 [indent_id] => dis0007064 [issuer_id] => BR [receiver_id] => Pat [item_code] => Array ( [0] => cc [1] => cc [2] => ocp [3] => ocp [4] => ecp [5] => ecp [6] => iucd [7] => cut [8] => nkit ) [Item_type] => Array ( [0] => f [1] => p [2] => f [3] => p [4] => f [5] => p [6] => f [7] => f [8] => f ) [item_quantity] => Array ( [0] => 99243 [1] => 347591 [2] => 2207 [3] => 14828 [4] => 1110 [5] => 1753 [6] => 702 [7] => 756 [8] => 18811 ) [item_quantity_issue] => Array ( [0] => 99243 [1] => 347591 [2] => 2207 [3] => 14828 [4] => 1110 [5] => 1753 [6] => 702 [7] => 756 [8] => 18811 ) [quantity_receiveds] => Array ( [0] => 99243 [1] => 347591 [2] => 2207 [3] => 14828 [4] => 1110 [5] => 1753 [6] => 702 [7] => 756 [8] => 18811 ) [quantity_received] => Array ( [0] => 99243 [1] => 347591 [2] => 2207 [3] => 14828 [4] => 1110 [5] => 1753 [6] => 702 [7] => 756 [8] => 18811 ) [item_batch_id_serial] => Array ( [0] => 1 [1] => 2 [2] => 3 [3] => 4 [4] => 5 [5] => 6 [6] => 7 [7] => 8 [8] => 9 [9] => 10 [10] => 11 [11] => 12 [12] => 13 [13] => 14 [14] => 15 [15] => 16 [16] => 17 ) [item_code_batch] => Array ( [0] => cc [1] => cc [2] => cc [3] => cc [4] => cc [5] => cc [6] => cc [7] => cc [8] => cc [9] => ocp [10] => ocp [11] => ocp [12] => ecp [13] => ecp [14] => iucd [15] => cut [16] => nkit ) [Item_type_batch] => Array ( [0] => f [1] => f [2] => f [3] => p [4] => p [5] => p [6] => p [7] => p [8] => p [9] => f [10] => p [11] => p [12] => f [13] => p [14] => f [15] => f [16] => f ) [batch_no] => Array ( [0] => P63409 [1] => P63406 [2] => P63410 [3] => P67041 [4] => M-039 [5] => M-040 [6] => M-057 [7] => M-052 [8] => P67040 [9] => MN-16-039 [10] => RF1493 [11] => RF1491 [12] => EP-16-008 [13] => EP03/15020 [14] => CU52216 [15] => CU17016 [16] => PNC0680117 ) [batch_no1] => Array ( [0] => P63409 [1] => P63406 [2] => P63410 [3] => P67041 [4] => M-039 [5] => M-040 [6] => M-057 [7] => M-052 [8] => P67040 [9] => MN-16-039 [10] => RF1493 [11] => RF1491 [12] => EP-16-008 [13] => EP03/15020 [14] => CU52216 [15] => CU17016 [16] => PNC0680117 ) [batch_quantity] => Array ( [0] => 66843 [1] => 21600 [2] => 108800 [3] => 4050 [4] => 194400 [5] => 124841 [6] => 12150 [7] => 8100 [8] => 4050 [9] => 2207 [10] => 7800 [11] => 7028 [12] => 1110 [13] => 1753 [14] => 702 [15] => 756 [16] => 18811 ) [batch_quantitys] => Array ( [0] => 66843 [1] => 21600 [2] => 108800 [3] => 4050 [4] => 194400 [5] => 124841 [6] => 12150 [7] => 8100 [8] => 4050 [9] => 2207 [10] => 7800 [11] => 7028 [12] => 1110 [13] => 1753 [14] => 702 [15] => 756 [16] => 18811 ) [date_expire1] => Array ( [0] => 2019-11-01 [1] => 2019-09-01 [2] => 2019-11-01 [3] => 2019-03-01 [4] => 2019-03-01 [5] => 2019-03-01 [6] => 2019-04-01 [7] => 2019-03-01 [8] => 2019-03-01 [9] => 2019-05-01 [10] => 2019-06-01 [11] => 2019-06-01 [12] => 2019-05-01 [13] => 2019-02-01 [14] => 2021-01-01 [15] => 2021-06-01 [16] => 2019-11-01 ) [date_expire] => Array ( [0] => 2019-11-01 [1] => 2019-09-01 [2] => 2019-11-01 [3] => 2019-03-01 [4] => 2019-03-01 [5] => 2019-03-01 [6] => 2019-04-01 [7] => 2019-03-01 [8] => 2019-03-01 [9] => 2019-05-01 [10] => 2019-06-01 [11] => 2019-06-01 [12] => 2019-05-01 [13] => 2019-02-01 [14] => 2021-01-01 [15] => 2021-06-01 [16] => 2019-11-01 ) [count] => 9 ) 
$item_batch_id_serial=$_REQUEST['item_batch_id_serial'];
$array_lists=array();
$time=date('H:i:s');
$date=date('Y-m-d');
$challen_no=$_REQUEST['challen_no'];
$indent_id=$_REQUEST['indent_id'];
$user_id=$_SESSION['admin_emails'];

$comment=$_REQUEST['comment'];

$batch_no1=$_REQUEST['batch_no'];
$date_expire1=$_REQUEST['date_expire1'];

$item_code=$_REQUEST['item_code'];
$Item_type=$_REQUEST['Item_type'];
$item_quantity_issue=$_REQUEST['item_quantity_issue'];
$quantity_receiveds=$_REQUEST['quantity_receiveds'];

$item_code_batch=$_REQUEST['item_code_batch'];
$Item_type_batch=$_REQUEST['Item_type_batch'];
$batch_no=$_REQUEST['batch_no'];
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
	$query_update_item_challan="UPDATE `rhc_master_district_item_details_challan_no` SET `quantity_received`='$quantity_receivedss',`status`='1' WHERE `challan_no`='$challen_no' and `item_code`='$item_codes' And `item_type`='$Item_types'";
	$sql_exe_update_item=mysqli_query($conn,$query_update_item_challan);

	$query_get_item_code_id="SELECT * FROM `rhc_master_stock_district_items` WHERE `item_types`='$Item_types' and `item_codes`='$item_codes' and `distrct_place_id`='$receiver_id'";
	$sql_exe_get_item_code_id=mysqli_query($conn,$query_get_item_code_id);
	
	$result_detail=mysqli_fetch_assoc($sql_exe_get_item_code_id);
	
	$item_quantity=$result_detail['item_quantity'];
	$cal=$quantity_receivedss+$item_quantity;
	
	$update="UPDATE `rhc_master_stock_district_items` SET `item_quantity`='$cal',`status`='1' WHERE `item_types`='$Item_types' and `item_codes`='$item_codes' and `distrct_place_id`='$receiver_id'";
	$sql_exe_update=mysqli_query($conn,$update);
}

$quer_challan_update="UPDATE `rhc_master_district_challan_no` SET `date_update_status`='$date',`time_update_status`='$time',`user_id`='$user_id',`status`='1',`comment`='$comment' WHERE `challen_no`='$challen_no'";
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
		$item_batch_serial=$item_batch_id_serial[$i];
		$x_item_batch=$item_code_batchs.$Item_type_batchs;
		$x_item_rec=$item.$type;
		if($x_item_batch==$x_item_rec){
			if($qnt!=0){

				$update_received_batches_info="UPDATE `rhc_master_district_receive_batch_detail_item` SET `rec_batch_no`='$batch_nos',`rec_batch_expire`='$date_expires',`rec_batch_quantity`='$batch_quantitys' WHERE`slno`='$item_batch_serial'";
				$sql_exe_received_batches_info=mysqli_query($conn,$update_received_batches_info);
				
				$query_get_item_code_id1="SELECT * FROM `rhc_master_stock_district_items` WHERE `item_types`='$Item_type_batchs' and `item_codes`='$item_code_batchs' and `distrct_place_id`='$receiver_id'";
				$sql_exe_get_item_code_id1=mysqli_query($conn,$query_get_item_code_id1);
				$result_detail1=mysqli_fetch_assoc($sql_exe_get_item_code_id1);

				$district_stock_batch_id=$result_detail1['district_stock_batch_id'];
				$district_check="SELECT * FROM `rhc_master_stock_district_batch_details` WHERE `district_stock_batch_id`='$district_stock_batch_id' and `batch_nos`='$batch_nos'";
				$sql_exe_check=mysqli_query($conn,$district_check);
				$num_check_batch=mysqli_num_rows($sql_exe_check);
				if($num_check_batch==0){
					$batch_insert="INSERT INTO `rhc_master_stock_district_batch_details`(`slno`, `district_stock_batch_id`, `batch_nos`, `date_exp`, `total_quantity`, `remaining_quantity`, `status`, `date_creation`, `time_creation`, `district_place_id`) VALUES (NULL,'$district_stock_batch_id','$batch_nos','$date_expires','$batch_quantitys','$batch_quantitys','1','$date','$time','$receiver_id')";
					$sql_exe_batch_insert=mysqli_query($conn,$batch_insert);
				}else{
					$fetch_stock=mysqli_fetch_assoc($sql_exe_check);
					$slno=$fetch_stock['slno'];
					$remaining_quantity=$fetch_stock['remaining_quantity'];
					$total_quantity=$fetch_stock['total_quantity'];
					$total_qnt=$total_quantity+$batch_quantitys;
					$remaining_qnt=$remaining_quantity+$batch_quantitys;
					if($remaining_qnt!=0){
						$batch_update="UPDATE `rhc_master_stock_district_batch_details` SET `total_quantity`='$total_qnt',`remaining_quantity`='$remaining_qnt',`status`='1',`date_creation`='$date',`time_creation`='$time' WHERE  `slno`='$slno'";
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
