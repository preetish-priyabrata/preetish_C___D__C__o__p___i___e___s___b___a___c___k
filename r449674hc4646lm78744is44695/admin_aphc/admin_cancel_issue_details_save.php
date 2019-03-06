<?php
// echo "<pre>";
error_reporting(E_ALL);
session_start();
if($_SESSION['admin_emails']){
	date_default_timezone_set("Asia/Kolkata");
	require 'FlashMessages.php';
	include 'config.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();
	//print_r($_POST);
// Array ( [date] => 07-05-2017 [time] => 06:20:29 pm [challen_no] => chal381524 [indent_id] => dhb001 [receiver_id] => ATHM [issuer_id] => Pat [item_code] => Array ( [0] => ocp [1] => cc ) [Item_type] => Array ( [0] => f [1] => f ) [item_quantity_issue] => Array ( [0] => 200 [1] => 220 ) [quantity_received] => Array ( [0] => 200 [1] => 220 ) [item_batch_id] => Array ( [0] => batch009 [1] => batch0010 ) [item_code_batch] => Array ( [0] => ocp [1] => cc ) [Item_type_batch] => Array ( [0] => f [1] => f ) [batch_no] => Array ( [0] => b1 [1] => b4 ) [batch_quantity] => Array ( [0] => 200 [1] => 220 ) [date_expire] => Array ( [0] => 2017-07-03 [1] => 2017-06-09 ) ) 
// 
	$challen_no=$_POST['challen_no'];
	$indent_id=$_POST['indent_id'];
	$receiver_id=$_POST['receiver_id'];
	$issuer_id=$_POST['issuer_id'];
	$item_code=$_POST['item_code'];
	$Item_type=$_POST['Item_type'];
	$item_quantity_issue=$_POST['item_quantity_issue'];
	$item_code_batch=$_POST['item_code_batch'];
	$Item_type_batch=$_POST['Item_type_batch'];
	$batch_no=$_POST['batch_no'];
	$batch_quantity=$_POST['batch_quantity'];
	$date_expire=$_POST['date_expire'];
	$item_batch_id=$_POST['item_batch_id'];
	$desgination=$_SESSION['designation'];
	$date=date('Y-m-d');
	$time=date('H:i:s');
	$item_batch_idss=$_POST['item_batch_idss'];

	//insert into cancel table history
	$cancel_query="INSERT INTO `rhc_master_cancel_histroy`(`slno`, `cancel_from`, `cancel_to`, `challan_no`, `indent_no`, `date_creation`, `time_creation`, `flag_place`) VALUES (NULL,'$issuer_id','$receiver_id','$challen_no','$indent_id','$date','$time','$desgination')" ;
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
		$cancel_item="INSERT INTO `rhc_master_cancel_item`(`slno`, `challan_no`, `cancel_id`, `item_code`, `item_type`, `quantity_cancel`) VALUES (NULL,'$challen_no','$cancel_id','$item_codes','$Item_types','$item_quantitys')";
		$sql_exe=mysqli_query($conn,$cancel_item);
		$last_ids= mysqli_insert_id($conn);
		$cancel_batch="batch".date('dmy').$last_ids;
		$store_array[]=array('item_codes'=>$item_codes,'Item_types'=>$Item_types,'item_quantitys'=>$item_quantitys,'cancel_batch'=>$cancel_batch);
		$cancel_item_update="UPDATE `rhc_master_cancel_item` SET `cancel_batch_id`='$cancel_batch' WHERE `slno`='$last_ids'";
		$sql_exe=mysqli_query($conn,$cancel_item_update);

		$sql_stock_item="SELECT * FROM `rhc_master_stock_aphc_items` WHERE `item_codes`='$item_codes' And `item_types`='$Item_types' and `aphc_place_id`='$issuer_id'";//item_quantity
		$sql_exe_stock_item=mysqli_query($conn,$sql_stock_item);
		$num_stock_item=mysqli_num_rows($sql_exe_stock_item);
		if($num_stock_item!=0){
			$stock_fetch_item=mysqli_fetch_assoc($sql_exe_stock_item);
			$item_quantity=$stock_fetch_item['item_quantity'];
			$slno=$stock_fetch_item['slno'];
			$qty_item=$item_quantity+$item_quantitys;
			if($qty_item==0){
				$update_stock="UPDATE `rhc_master_stock_aphc_items` SET `item_quantity`='0' ,`status`='2' WHERE `slno`='$slno'";
			}else{
				$update_stock="UPDATE `rhc_master_stock_aphc_items` SET `item_quantity`='$qty_item' ,`status`='1' WHERE `slno`='$slno'";
			}
			$sql_exe=mysqli_query($conn,$update_stock);
		}
		// detele in issue stock table
		$sql_detele="DELETE FROM `rhc_master_aphc_asha_item_details_challan_no` WHERE `item_batch_id`='$item_batch_ids' AND `challan_no`='$challen_no'";
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
				$sql_stock_item="SELECT * FROM `rhc_master_stock_aphc_items` WHERE `item_codes`='$item_code_batchs' And `item_types`='$Item_type_batchs' and `aphc_place_id`='$issuer_id'";//item_quantity
				$sql_exe_stock_item=mysqli_query($conn,$sql_stock_item);
				$num_stock_item=mysqli_num_rows($sql_exe_stock_item);
				if($num_stock_item!=0){
					$stock_fetch_item=mysqli_fetch_assoc($sql_exe_stock_item);
					$block_stock_batch_id=$stock_fetch_item['phc_stock_batch_id'];
					$stock_batch="SELECT * FROM `rhc_master_stock_aphc_batch_details` WHERE `aphc_stock_batch_id`='$block_stock_batch_id' and `batch_nos`='$batch_nos'";
					$sql_exe_stock_item_batch=mysqli_query($conn,$stock_batch);
					$num_stock_item_batch=mysqli_num_rows($sql_exe_stock_item_batch);
					if($num_stock_item_batch==1){
						$stock_fetch_item_batch=mysqli_fetch_assoc($sql_exe_stock_item_batch);
						$remaining_quantity=$stock_fetch_item_batch['remaining_quantity'];
						$slno=$stock_fetch_item_batch['slno'];
						$qty_remaining=$remaining_quantity+$batch_quantitys;
						if($qty_remaining==0){
							$update_stock_batch="UPDATE `rhc_master_stock_aphc_batch_details` SET `status`='2',`remaining_quantity`='0' WHERE `slno`='$slno'";
						}else{
							$update_stock_batch="UPDATE `rhc_master_stock_aphc_batch_details` SET `status`='1',`remaining_quantity`='$qty_remaining' WHERE `slno`='$slno'";
						}
						$sql_exe=mysqli_query($conn,$update_stock_batch);
					}

				}
				// 
				// cancel id
				$cancel_batch_ids=$store_array[$i]['cancel_batch'];
				// CANCEL TABLE INSERT
				$cancel_batch_query="INSERT INTO `rhc_master_cancel_batch`(`slno`, `challan_no`, `cancel_id`, `batch_no`, `expire_date`, `quantity_batch`, `cancel_batch_id`) VALUES (NULL,'$challen_no','$cancel_id','$batch_nos','$date_expires','$batch_quantitys','$cancel_batch_ids')";
				$sql_exe=mysqli_query($conn,$cancel_batch_query);
				// 
				$del_batch_issue_query="DELETE FROM `rhc_master_aphc_aphc_receive_batch_detail_item` WHERE `item_batch_id`='$item_batch_idss' and `item_code`='$item_code_batchs' and `batch_no`='$batch_nos'";
				$sql_exe=mysqli_query($conn,$del_batch_issue_query);

			}
		}
	}
	
	$det_challan="DELETE FROM `rhc_master_aphc_asha_challan_no` WHERE `indent_id`='$indent_id' and `challen_no`='$challen_no'";
	$sql_exe=mysqli_query($conn,$det_challan);
	$det_update_sql="UPDATE `rhc_master_aphc_asha_indent` SET `status`='1' WHERE `indent_id`='$indent_id'";
	$sql_exe=mysqli_query($conn,$det_update_sql);

	$top_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `place_phc_aphc_id`='$issuer_id' and `user_designation`='5' and `status`='1' ";
				$sql_exe_top_level_mobile=mysqli_query($conn,$top_level_mobile);
				while($res_top_level_mobile=mysqli_fetch_assoc($sql_exe_top_level_mobile)){
					// print_r($res);
					$array_list_user_mobile[]=$res_top_level_mobile['user_mobile'];
				}
			 	$mobileno_top=implode(";",$array_list_user_mobile);

				$query_list="SELECT * FROM `rhc_master_phc_asha_indent` WHERE `indent_place_raised_to`='$issuer_id' and `indent_id`='$indent_id' ";
				$sql_exe_list=mysqli_query($conn,$query_list);
				$result_list=mysqli_fetch_assoc($sql_exe_list);
				if($result_list['place_status']=='1'){
					$raise_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `sub_center_id`='$receiver_id' and `user_designation`='8' and `status`='1'";
				}else{
					$raise_level_mobile="SELECT * FROM `rhc_master_login_user` WHERE `user_mobile`='$receiver_id' and `user_designation`='9' and `status`='1' ";
				}
				// receiver mobile no
				$array_list_raise_user_mobile=array();
				$sql_exe_raise_level_mobile=mysqli_query($conn,$raise_level_mobile);
				while($res_raise_level_mobile=mysqli_fetch_assoc($sql_exe_raise_level_mobile)){
	 // print_r($res);
					$array_list_raise_user_mobile[]=$res_raise_level_mobile['user_mobile'];
					$PHC=$res_raise_level_mobile['place_block_dh_id'];
				}
						  		
								 // PHC
				$raise_level_mobile3="SELECT * FROM `rhc_master_login_user` WHERE `place_block_dh_id`='$PHC' and `user_designation`='3' And `status`='1'";
				$sql_exe_raise_level_mobile3=mysqli_query($conn,$raise_level_mobile3);
				while($res_raise_level_mobile3=mysqli_fetch_assoc($sql_exe_raise_level_mobile3)){
					// print_r($res);
					$array_list_raise_user_mobile[]=$res_raise_level_mobile3['user_mobile'];
					$district=$res_raise_level_mobile3['place_district_id'];
				}
							    // district
				$raise_level_mobile2="SELECT * FROM `rhc_master_login_user` WHERE `place_district_id`='$district' and `user_designation`='2' And `status`='1'";
				$sql_exe_raise_level_mobile2=mysqli_query($conn,$raise_level_mobile2);
				while($res_raise_level_mobile2=mysqli_fetch_assoc($sql_exe_raise_level_mobile2)){
								    // print_r($res);
					$array_list_raise_user_mobile[]=$res_raise_level_mobile2['user_mobile'];
					$state=$res_raise_level_mobile2['place_state_id'];
				}
							  // state
				$raise_level_mobile1="SELECT * FROM `rhc_master_login_user` WHERE `place_state_id`='$state' and `user_designation`='1' And `status`='1'";
				$sql_exe_raise_level_mobile1=mysqli_query($conn,$raise_level_mobile1);
				while($res_raise_level_mobile1=mysqli_fetch_assoc($sql_exe_raise_level_mobile1)){
								    // print_r($res);
					$array_list_raise_user_mobile[]=$res_raise_level_mobile1['user_mobile'];
				}
						
				$mobileno_raise=implode(";",$array_list_raise_user_mobile);
	

	$datetime=date('Y-m-d H:i:s');
	 // $mobileno=$result_fetch1['user_mobile'];

	 $new_message='Stock Cancelled Successfully';
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
		 // $new_message1=$code_details. '  has been issued on '.$datetime. ' with Challan No '.$challen_no;
		  $new_message1="challan no :- ".$challen_no." has been cancelled on ".$datetime;
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
			$msg->success('Challan No:- "'.$challen_no.'" Cancelled  SuccessFully' );
			header('Location:admin_dashboard.php');
			exit;
		}else{
			$msg->success('Challan No:- "'.$challen_no.'" Cancelled  SuccessFully' );
			header('Location:admin_dashboard.php');
			exit;
		}
			}
	}else{
			$msg->success('Challan No:- "'.$challen_no.'" Cancelled  SuccessFully' );
			header('Location:admin_dashboard.php');
			exit;
	}
}
$msg->success('Challan No:- "'.$challen_no.'" Cancelled  SuccessFully' );
header('Location:admin_dashboard.php');
exit;

 // 	$msg->success('Challan No:- "'.$challen_no.'" Issued  SuccessFully' );
 	
	// header('Location:admin_dashboard.php');
	// exit;
 }else{
 	header('Location:logout.php');
  	exit;
 }

