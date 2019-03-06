<?php 
error_reporting(E_ALL);
session_start();
include "config.php";
date_default_timezone_set("Asia/Kolkata");
// print_r($_REQUEST);

$date=date('Y-m-d');
// Array ( [itemtypes] => f [itemcodes] => cc [place_id] => Pat [qnt_issue] => 416 ) 
if($_POST['qnt_issue']!="" && $_POST['place_id']!="" && $_POST['itemtypes']!="" && $_POST['itemcodes']!=""){
	$item_type=$_POST['itemtypes'];
	$item_code=$_POST['itemcodes'];
	$place_id= $_POST['place_id'];
	$qnt_issue=$_POST['qnt_issue'];

	$query_item="SELECT * FROM `rhc_master_stock_state_items` WHERE `status`='1' AND `state_place_id`='$place_id' And `item_codes`='$item_code' And `item_types`='$item_type'";
	$sql_exe_item=mysqli_query($conn,$query_item);
	$num_rows=mysqli_num_rows($sql_exe_item);
	if($num_rows!=0){
		$result_fetch=mysqli_fetch_assoc($sql_exe_item);

		 $available_stock=$result_fetch['item_quantity'];
		 $item_batch_id=$result_fetch['state_stock_batch_id'];
		 $remain_stock=$available_stock-$qnt_issue;
		if(0>$remain_stock){
			$issue_stock=$qnt_issue+($remain_stock);
			$qnt_issue1=$issue_stock;

			$query_batch="SELECT * FROM `rhc_master_stock_state_batch_details` WHERE `state_stock_batch_id`='$item_batch_id' and `status`='1' and `date_exp`>'$date' ORDER BY YEAR(`date_exp`) ASC, MONTH(`date_exp`) ASC, DAY(`date_exp`) ASC";
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
							?>
							<tr>
								<td><?=$item_code?></td>
								<td><?=$item_type?></td>
								<td><?=$res_batch['batch_nos']?></td>
								<td><?=$res_batch['remaining_quantity']?></td>
								<td><?=$res_batch['date_exp']?></td>
							</tr>
							<?php 
						}else{
							
							$issue_stocks1=$remaining_quantity-$check_avaialble;
							$issue_stocks=$issue_stocks1+$issue_stocks;
							?>
							<tr>
								<td><?=$item_code?></td>
								<td><?=$item_type?></td>
								<td><?=$res_batch['batch_nos']?></td>
								<td><?=$issue_stocks1?></td>
								<td><?=$res_batch['date_exp']?></td>
							</tr>
							<?php 

						}
					}	
					
				}

			}else{?>
				<tr>
					<td colspan="5">No Stock Is Available</td>
				</tr>
			<?php }
		}else{
			 $query_batch="SELECT * FROM `rhc_master_stock_state_batch_details` WHERE `state_stock_batch_id`='$item_batch_id' and `status`='1' and `date_exp`>'$date' ORDER BY YEAR(`date_exp`) ASC, MONTH(`date_exp`) ASC, DAY(`date_exp`) ASC";
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
							echo $issue_stocks=$issue_stocks1+$issue_stocks;
							?>
							<tr>
								<td><?=$item_code?></td>
								<td><?=$item_type?></td>
								<td><?=$res_batch['batch_nos']?></td>
								<td><?=$res_batch['remaining_quantity']?></td>
								<td><?=$res_batch['date_exp']?></td>
							</tr>
							<?php 
						}else{
							
							$issue_stocks1=$remaining_quantity-$check_avaialble;
							$issue_stocks=$issue_stocks1+$issue_stocks;
							?>
							<tr>
								<td><?=$item_code?></td>
								<td><?=$item_type?></td>
								<td><?=$res_batch['batch_nos']?></td>
								<td><?=$issue_stocks1?></td>
								<td><?=$res_batch['date_exp']?></td>
							</tr>
							<?php 

						}
					}	
					
				}
				// echo $issue_stocks;
			}else{?>
				<tr>
					<td colspan="5">No Stock Is Available</td>
				</tr>
			<?php }
		}

	}else{?>
		<tr>
		<td colspan="5">Out Of Stock</td>
		</tr>
<?php
	}
}else{
	header('Location:logout.php');
	exit;
}
