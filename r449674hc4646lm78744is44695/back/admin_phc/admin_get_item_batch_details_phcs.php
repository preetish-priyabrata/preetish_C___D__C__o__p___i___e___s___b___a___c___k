<?php 
error_reporting(E_ALL);
session_start();
include "config.php";

// print_r($_REQUEST);
date_default_timezone_set("Asia/Kolkata");
// print_r($_REQUEST);

$date=date('Y-m-d');

// Array ( [itemtypes] => f [itemcodes] => cc [place_id] => Pat [qnt_issue] => 416 ) 
if($_POST['qnt_issue']!="" && $_POST['place_id']!="" && $_POST['itemtypes']!="" && $_POST['itemcodes']!=""){
	$item_type=$_POST['itemtypes'];
	$item_code=$_POST['itemcodes'];
	$place_id= $_POST['place_id'];
	$qnt_issue=$_POST['qnt_issue'];

	$query_item="SELECT * FROM `rhc_master_stock_phc_items` WHERE `status`='1' AND `phc_place_id`='$place_id' And `item_codes`='$item_code' And `item_types`='$item_type'";
	$sql_exe_item=mysqli_query($conn,$query_item);
	$num_rows=mysqli_num_rows($sql_exe_item);
	if($num_rows!=0){
		$result_fetch=mysqli_fetch_assoc($sql_exe_item);

		 $avaliable_stock=$result_fetch['item_quantity'];
		 $item_batch_id=$result_fetch['phc_stock_batch_id'];
		 $remain_stock=$avaliable_stock-$qnt_issue;
		if(0>$remain_stock){
			 $issue_stock=$qnt_issue+($remain_stock);
			echo $qunty_value=$issue_stock;
		}else{
			 $query_batch="SELECT * FROM `rhc_master_stock_phc_batch_details` WHERE `phc_stock_batch_id`='$item_batch_id' and `status`='1' and `date_exp`>'$date' ORDER BY YEAR(`date_exp`) ASC, MONTH(`date_exp`) ASC, DAY(`date_exp`) ASC";
			$sql_exe_batch=mysqli_query($conn,$query_batch);
			  $num_rows1=mysqli_num_rows($sql_exe_batch);
			
			$issue_stocks=0;
			if($num_rows1!=0){
				while ($res_batch=mysqli_fetch_assoc($sql_exe_batch)) {
					$issue_stocks2=0;
					$issue_stocks1=0;
					 $remaining_quantity=$res_batch['remaining_quantity'];
					 $issue_stocks2=$qnt_issue-$issue_stocks;
					 $check_avaialble=$remaining_quantity-$issue_stocks2;
					if($issue_stocks<$qnt_issue){
						if(0>$check_avaialble){
							$issue_stocks1=$issue_stocks2+($check_avaialble);
							 $issue_stocks=$issue_stocks1+$issue_stocks;
							
						}else{
							
							$issue_stocks1=$remaining_quantity-$check_avaialble;
							$issue_stocks=$issue_stocks1+$issue_stocks;
							 

						}
					}	
					
				}
				echo $issue_stocks;
				exit;
				// return $issue_stocks;

			}else{
				echo $issue_stocks;
				// echo $qunty_value="0";
				exit;
			 }
			
		}

	}else{
		echo $qunty_value='0';
		exit;

	}
}else{
	header('Location:logout.php');
	exit;
}
