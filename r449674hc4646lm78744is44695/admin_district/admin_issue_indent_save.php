<?php 

error_reporting(E_ALL);
session_start();
if($_SESSION['admin_emails']){

require 'FlashMessages.php';
include 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
date_default_timezone_set("Asia/Kolkata");
//  print_r($_REQUEST);
// exit;
// echo "<pre>";
$date1=date('Y-m-d');
$time1=date('H:i:s');
// Array ( [date] => 2017-03-25 [time] => 19:16:22 [challen_no] => chal_018269 [indent_id] => ind001 [receiver_id] => ATHM [issuer_id] => Pat [item_code] => Array ( [0] => cc [1] => tr ) [Item_type] => Array ( [0] => f [1] => p ) [item_quantity] => Array ( [0] => 416 [1] => 326 ) [qnt_issue] => Array ( [0] => 416 [1] => 326 ) )
$date=$_POST['date'];
$time=$_POST['time'];
$challen_no=$_POST['challen_no'];
$indent_id=$_POST['indent_id'];
$receiver_id=$_POST['receiver_id'];
$issuer_id=$_POST['issuer_id'];
$item_code=$_POST['item_code'];
$Item_type=$_POST['Item_type'];
$item_quantity=$_POST['item_quantity'];
$qnt_issue=$_POST['qnt_issue'];
$user_name=$_SESSION['admin_emails'];
// chalan value is inserted
$sql_check="SELECT * FROM `rhc_master_dh_block_challan_no` WHERE `indent_id`='$indent_id' and `status`!='5'";
$sql_exe_checks_indent_issued=mysqli_query($conn,$sql_check);
$num_indents=mysqli_num_rows($sql_exe_checks_indent_issued);
// check whether it issued
if($num_indents==0){
	  $query_challen="INSERT INTO `rhc_master_dh_block_challan_no`(`slno`, `receiver_place_id`, `issuer_place_id`, `indent_id`, `challen_no`, `date_creation`, `time_creation`, `issuer_id`,`status`) VALUES (NULL,'$receiver_id','$issuer_id' ,'$indent_id','$challen_no','$date','$time','$user_name','4')";
	$sql_exe_challen=mysqli_query($conn,$query_challen);
		// $item_details=array();
	for ($i=0; $i <count($item_code) ; $i++) { 
	
		 $item_code_single=$item_code[$i];
		$Item_type_single=$Item_type[$i];
		$item_quantity_single=$item_quantity[$i];
		$qnt_issue_single=$qnt_issue[$i];
		// challen item value is inserted
		 $query_item="INSERT INTO `rhc_master_dh_block_item_details_challan_no` (`slno`, `challan_no`, `receiver_place_id`, `issuer_place_id`, `item_code`, `item_type`, `quantity_indent`, `quantity_issued`,`date_creation`, `time_creation`) VALUES (NULL, '$challen_no','$receiver_id','$issuer_id','$item_code_single','$Item_type_single','$item_quantity_single','$qnt_issue_single','$date','$time')";

		$sql_exe_item_challen=mysqli_query($conn,$query_item);

		$last_id = mysqli_insert_id($conn);
		$item_batch_id="batch00".$last_id;
		$item_batch_array[] = array('item_code_single' =>"$item_code_single" ,'Item_type_single'=>"$Item_type_single",'item_batch_id'=>"$item_batch_id" ,"qnt_issue_single"=>"$qnt_issue_single" );

		//challen item batch id is update 
		$quer_item_update="UPDATE `rhc_master_dh_block_item_details_challan_no` SET `item_batch_id`='$item_batch_id' WHERE  `slno`='$last_id'";
		$sql_exe_update_batch_challen=mysqli_query($conn,$quer_item_update);
	// }
	// for ($i=0; $i <count($item_code) ; $i++) { 
	// 	$item_code_single=$item_code[$i];
	// 	$Item_type_single=$Item_type[$i];
	// 	$item_quantity_single=$item_quantity[$i];
	// 	$qnt_issue_single=$qnt_issue[$i];

		$query_check="SELECT * FROM `rhc_master_stock_district_items` WHERE `status`='1' AND `distrct_place_id`='$issuer_id' And `item_codes`='$item_code_single' And `item_types`='$Item_type_single'";
		$sql_exe_item=mysqli_query($conn,$query_check);
		$num_rows=mysqli_num_rows($sql_exe_item);
		$result_fetch=mysqli_fetch_assoc($sql_exe_item);
		$district_item_quantity=$result_fetch['item_quantity'];
		if($num_rows!=0){
		

			$available_stock=$result_fetch['item_quantity'];
		 	$district_batch_id_stock=$result_fetch['district_stock_batch_id'];
		 	$remain_stock=$available_stock-$qnt_issue_single;
			if(0>$remain_stock){
				$issue_stock=$qnt_issue_single+($remain_stock);
				$qnt_issue1=$issue_stock;

				$query_batch="SELECT * FROM `rhc_master_stock_district_batch_details` WHERE `district_stock_batch_id`='$district_batch_id_stock' and `status`='1' and `date_exp`>'$date' ORDER BY YEAR(`date_exp`) ASC, MONTH(`date_exp`) ASC, DAY(`date_exp`) ASC";
				$sql_exe_batch=mysqli_query($conn,$query_batch);
				$num_rows1=mysqli_num_rows($sql_exe_batch);
				$issue_stocks=0;
				if($num_rows1!=0){
					while ($res_batch=mysqli_fetch_assoc($sql_exe_batch)) {
						$issue_stocks2=0;
						$issue_stocks1=0;
					 	$remaining_quantity=$res_batch['remaining_quantity'];
					 	$issue_stocks2=$qnt_issue1-$issue_stocks;
					 	$check_avaialble=$remaining_quantity-$issue_stocks2;
						if($issue_stocks<$qnt_issue1){
							if(0>$check_avaialble){
								$issue_stocks1=$issue_stocks2+($check_avaialble);
							 	$issue_stocks=$issue_stocks1+$issue_stocks;
							
								$batch_nos=$res_batch['batch_nos'];
								$remaining_quantity=$res_batch['remaining_quantity'];
								$remaining_quantity1=$res_batch['remaining_quantity'];
								$date_exp=$res_batch['date_exp'];
						
								$item_details[]=array("district_batch_id_stock"=>"$district_batch_id_stock","item_code_single"=>"$item_code_single","Item_type_single"=>"$Item_type_single","batch_nos"=>"$batch_nos","remaining_quantity"=>"$remaining_quantity","date_exp"=>"$date_exp","remaining_quantity1"=>"$remaining_quantity1",'district_item_quantity'=>"$district_item_quantity");

							}else{
							
								$issue_stocks1=$remaining_quantity-$check_avaialble;
								$issue_stocks=$issue_stocks1+$issue_stocks;
								$batch_nos=$res_batch['batch_nos'];
								$remaining_quantity=$issue_stocks1;
								$date_exp=$res_batch['date_exp'];
								$remaining_quantity1=$res_batch['remaining_quantity'];

								$item_details[]=array("district_batch_id_stock"=>"$district_batch_id_stock","item_code_single"=>"$item_code_single","Item_type_single"=>"$Item_type_single","batch_nos"=>"$batch_nos","remaining_quantity"=>"$remaining_quantity","date_exp"=>"$date_exp","remaining_quantity1"=>"$remaining_quantity1",'district_item_quantity'=>"$district_item_quantity");
							}
						}
					}
				}else{
					$item_details[]=array("district_batch_id_stock"=>"0","item_code_single"=>"$item_code_single","Item_type_single"=>"$Item_type_single","batch_nos"=>"0","remaining_quantity"=>"0","date_exp"=>"0",'remaining_quantity1'=>"0",'district_item_quantity'=>"$district_item_quantity");
			 	}
			}else{
			 	$query_batch="SELECT * FROM `rhc_master_stock_district_batch_details` WHERE `district_stock_batch_id`='$district_batch_id_stock' and `status`='1' and `date_exp`>'$date' ORDER BY YEAR(`date_exp`) ASC, MONTH(`date_exp`) ASC, DAY(`date_exp`) ASC";
				$sql_exe_batch=mysqli_query($conn,$query_batch);
				$num_rows1=mysqli_num_rows($sql_exe_batch);
				$issue_stocks=0;
				if($num_rows1!=0){
					while ($res_batch=mysqli_fetch_assoc($sql_exe_batch)) {
						$issue_stocks2=0;
						$issue_stocks1=0;
					 	$remaining_quantity=$res_batch['remaining_quantity'];
					 	$issue_stocks2=$qnt_issue_single-$issue_stocks;
					 	$check_avaialble=$remaining_quantity-$issue_stocks2;
						if($issue_stocks<$qnt_issue_single){
							if(0>$check_avaialble){
								$issue_stocks1=$issue_stocks2+($check_avaialble);
							 	$issue_stocks=$issue_stocks1+$issue_stocks;
							
								$batch_nos=$res_batch['batch_nos'];
								$remaining_quantity=$res_batch['remaining_quantity'];
								$date_exp=$res_batch['date_exp'];
								$remaining_quantity1=$res_batch['remaining_quantity'];
							
								$item_details[]=array("district_batch_id_stock"=>"$district_batch_id_stock","item_code_single"=>"$item_code_single","Item_type_single"=>"$Item_type_single","batch_nos"=>"$batch_nos","remaining_quantity"=>"$remaining_quantity","date_exp"=>"$date_exp","remaining_quantity1"=>"$remaining_quantity1",'district_item_quantity'=>"$district_item_quantity");
							}else{
							
								$issue_stocks1=$remaining_quantity-$check_avaialble;
								$issue_stocks=$issue_stocks1+$issue_stocks;
							
							
								$batch_nos=$res_batch['batch_nos'];
								$remaining_quantity=$issue_stocks1;
								$date_exp=$res_batch['date_exp'];
								$remaining_quantity1=$res_batch['remaining_quantity'];
						 
								$item_details[]=array("district_batch_id_stock"=>"$district_batch_id_stock","item_code_single"=>"$item_code_single","Item_type_single"=>"$Item_type_single","batch_nos"=>"$batch_nos","remaining_quantity"=>"$remaining_quantity","date_exp"=>"$date_exp","remaining_quantity1"=>"$remaining_quantity1",'district_item_quantity'=>"$district_item_quantity");
							}
						}						
					}
				// echo $issue_stocks;
				}else{
					$item_details[]=array("district_batch_id_stock"=>"0","item_code_single"=>"$item_code_single","Item_type_single"=>"$Item_type_single","batch_nos"=>"0","remaining_quantity"=>"0","date_exp"=>"0",'remaining_quantity1'=>"0",'district_item_quantity'=>"$district_item_quantity");
			 	}
			}

		}else{
			$item_details[]=array("district_batch_id_stock"=>"0","item_code_single"=>"$item_code_single","Item_type_single"=>"$Item_type_single","batch_nos"=>"0","remaining_quantity"=>"0","date_exp"=>"0",'remaining_quantity1'=>"0",'district_item_quantity'=>"$district_item_quantity");
		}

	}
	// echo "<pre>";
	//  print_r($item_details);
	// batch detailsid
	
  // print_r($item_batch_array);

		// store batch information in block tables AND UPDATE DISTICT BATCH STOCK  AS WELL AS DISTICT ITEM STOCK
		for ($i=0; $i <count($item_batch_array) ; $i++) { 
			for ($j=0; $j <count($item_details) ; $j++) { 
				$ty=$item_batch_array[$i]['item_code_single'].$item_batch_array[$i]['Item_type_single'];
				
				$ty1=$item_details[$j]['item_code_single'].$item_details[$j]['Item_type_single'];
				if($ty==$ty1){
					

					$code_item=$item_details[$j]['item_code_single'];
					$type_item=$item_details[$j]['Item_type_single'];
					$batch_no=$item_details[$j]['batch_nos'];
					$batch_quantity=$item_details[$j]['remaining_quantity'];
					$total_remain_batch_quantity=$item_details[$j]['remaining_quantity1'];
					$date_expire=$item_details[$j]['date_exp'];
					$item_batch_id=$item_batch_array[$i]['item_batch_id'];
					$district_stock_batch_id=$item_details[$j]['district_batch_id_stock'];
					$district_item_quantity=$item_details[$j]["district_item_quantity"];

					// $district_remain_qnt=$total_remain_batch_quantity-$batch_quantity;
					
					if($district_stock_batch_id!="0"){
						if($ty==$ty1){

							$query_store_batch="INSERT INTO `rhc_master_dh_block_receive_batch_detail_item`(`slno`, `received_place_id`, `issued_place_id`, `item_code`, `item_type`, `batch_no`, `batch_quantity`, `date_expire`, `date_creation`, `time_creation`, `item_batch_id`) VALUES (NULL,'$receiver_id','$issuer_id','$code_item','$type_item','$batch_no','$batch_quantity','$date_expire','$date1','$time1','$item_batch_id')";
						
					 	 $sql_exe_batch_insert=mysqli_query($conn,$query_store_batch);
						
						$remain_qnt=$total_remain_batch_quantity-$batch_quantity;
						if($remain_qnt==0){
						 	$status="2";
						
							$stock_update_district="UPDATE `rhc_master_stock_district_batch_details` SET `remaining_quantity`='$remain_qnt',`status`='$status',`date_creation`='$date1',`time_creation`='$time1' WHERE `district_stock_batch_id`='$district_stock_batch_id' AND `batch_nos`='$batch_no' ";
						}else{
						 	$status="1";
							$stock_update_district="UPDATE `rhc_master_stock_district_batch_details` SET `remaining_quantity`='$remain_qnt',`status`='$status',`date_creation`='$date1',`time_creation`='$time1' WHERE `district_stock_batch_id`='$district_stock_batch_id' AND `batch_nos`='$batch_no' ";
						}
						 $sql_exe_update_batch_district=mysqli_query($conn,$stock_update_district);
						}
					}
				}

			}
			
			if($district_item_quantity!="0"){
				$qnt_issue_single=$item_batch_array[$i]['qnt_issue_single'];
				$district_remain_qnt=$district_item_quantity-$qnt_issue_single;
				if($district_remain_qnt==0){
					$status1="2";
					$query_stock_item_update="UPDATE `rhc_master_stock_district_items` SET `item_quantity`='$district_remain_qnt',`date_creation`='$date1',`time_creation`='$time1',`status`='$status1' WHERE `district_stock_batch_id`='$district_stock_batch_id' and `item_codes`='$code_item' and `item_types`='$type_item' and `distrct_place_id`='$issuer_id'  ";

				}else{
					$status1="1";
					$query_stock_item_update="UPDATE `rhc_master_stock_district_items` SET `item_quantity`='$district_remain_qnt',`date_creation`='$date1',`time_creation`='$time1',`status`='$status1' WHERE `district_stock_batch_id`='$district_stock_batch_id' and `item_codes`='$code_item' and `item_types`='$type_item' and `distrct_place_id`='$issuer_id'  ";

				}
				// echo $query_stock_item_update;
				// exit;
				 $sql_exe_update_item_district=mysqli_query($conn,$query_stock_item_update);
				
			}
		}
		
		$query_update_challen="UPDATE `rhc_master_challan_no_creation` SET `status`='1' WHERE `challen_no`='$challen_no'";
		$sql_exe_update_challen=mysqli_query($conn,$query_update_challen);
		if($sql_exe_update_challen){
			// $msg->success('Indent Rasied Success-fully');
				header('Location:admin_issue_indent_save_print.php?challen='.$challen_no.'&indent='.$indent_id);
				exit;
		}else{
			$msg->error('There Is Some Error Please Contact System Admin');
			header('Location:admin_dashboard.php');
			exit;
		}
		// email Or SmS
	}else{
		$fetch_mist=mysqli_fetch_assoc($sql_exe_checks_indent_issued);
		$challen_no=$fetch_mist['challen_no'];
		header('Location:admin_issue_indent_save_print.php?challen='.$challen_no.'&indent='.$indent_id);
		exit;
	}

}else{
	header('Location:logout.php');
  	exit;
}
?>