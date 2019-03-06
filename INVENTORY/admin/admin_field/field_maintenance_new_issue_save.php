<?php 
// print_r($_POST);
// exit;
session_start();
if($_SESSION['admin_field']){
	// Array ( [form_type] => bks2N3VzekYreTdOSFU0aDdGMVNBZz09 [user_location] => field0010 [date_info] => 2018-08-22 [maintenance_id] => scheduled [Time_info] => 20:14:50 [machine_no] => ksm403-u46 [model_id] => md2 [challan] => field0010-2018-08-22-mjob-00/4 [main_slno] => Array ( [0] => 8 [1] => 9 ) [fmgd_secondary_id] => Array ( [0] => sm40360 [1] => sm40358 ) [price_charge_unit] => Array ( [0] => 595 [1] => 69 ) [zqzis_issue_qnt] => Array ( [0] => 3 [1] => 50 ) ) 
	require 'FlashMessages.php';
	include '../config.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();
	
	$fqt_transfer_location=$fqt_location_id=$zonal_location_id=$zonal_place=$_SESSION['field_place'];
	$challan=$_POST['challan'];
	$main_slno=$_POST['main_slno'];
	$zqzis_issue_qnt=$_POST['zqzis_issue_qnt'];
	$fmgd_secondary_id=$_POST['fmgd_secondary_id'];
	$machine_no=$_POST['machine_no'];
	$fqt_date=$date=date('Y-m-d');
	$fqt_time=$time=date('H:i:s');
	for ($i=0; $i <count($fmgd_secondary_id); $i++) { 
		echo $total_item_issue=$fqt_qnty=$single_zqzis_issue_qnt=$zqzis_issue_qnt[$i];
		$field_secondary_code_s=$fmgd_secondary_id[$i];
		$main_slno_single=$main_slno[$i];

		$get_details="SELECT * FROM `lt_master_field_stock_info` WHERE `field_secondary_code`='$field_secondary_code_s' and `field_location_id`='$zonal_place'";
		$sql_exe=mysqli_query($conn,$get_details);
		$fetch_material=mysqli_fetch_assoc($sql_exe);
		$SLNO_ITEM=$fetch_material['field_slno'];
		$fqt_primary_code=$field_primary_code=$fetch_material['field_primary_code'];
		$fqt_secondary_code=$field_secondary_code=$fetch_material['field_secondary_code'];
		$fqt_component_name=$field_component_name=$fetch_material['field_component_name'];
		$fqt_component_id=$field_component_id=$fetch_material['field_component_id'];
		$fqt_category_name=$field_category_name=$fetch_material['field_category_name'];
		$fqt_category_id=$field_category_id=$fetch_material['field_category_id'];
		$fqt_unit=$field_unit=$fetch_material['field_unit'];
		$fqt_opening_balance=$field_qnty=$fetch_material['field_qnty'];
		$price_issue_rate=$price_charge_unit=$fetch_material['price_charge_unit'];
		$total_price=$fetch_material['total_price'];
		$fqt_hsn_code=$field_hsn_code=$fetch_material['field_hsn_code'];
		


		if($field_qnty!=0){

				if($single_zqzis_issue_qnt < $field_qnty){
					$remain1=$field_qnty-$single_zqzis_issue_qnt;

				}else if($single_zqzis_issue_qnt == $field_qnty){
					$remain1=$field_qnty-$single_zqzis_issue_qnt;
				}else if($single_zqzis_issue_qnt > $field_qnty){
					$remain1=$field_qnty-$single_zqzis_issue_qnt;

				}
				echo "<br>";
				if($remain1<0){
					echo $new=$single_zqzis_issue_qnt-$field_qnty;
					$single_zqzis_issue_qnt=$single_zqzis_issue_qnt-$remain;
				}else{
					echo $new=$field_qnty-$single_zqzis_issue_qnt;
				}
			
			
			$total_receive_price=$new_total_qnty=$price_charge_unit*$single_zqzis_issue_qnt;
			$fqt_closing_balance=$new;
			$update_total_price=$total_price-$new_total_qnty;
			$fqt_transfer_type='4';
			$damage_loss='0';
			$damage_loss_status='0';
			$fqt_remark="Internal user on machine on ".$machine_no;
			$total_price_item='0';
			$transit_loss_no='0';
			//$new=$field_qnty-$single_zqzis_issue_qnt;
			// `fqt_slno`, `fqt_hsn_code`, `fqt_primary_code`, `fqt_secondary_code`, `fqt_component_name`, `fqt_component_id`, `fqt_category_name`, `fqt_category_id`, `fqt_unit`, `fqt_qnty`, `fqt_date`, `fqt_time`, `fqt_location_id`, `fqt_transfer_location`, `fqt_transfer_type`, `fqt_remark`, `fqt_opening_balance`, `fqt_closing_balance`, `damage_loss`, `damage_loss_status`, `total_item_issue`, `price_issue_rate`, `total_price_item`, `total_receive_price`, `transit_loss_no`
			echo $insert="INSERT INTO `lt_master_field_stock_transfer_info`(`fqt_slno`, `fqt_hsn_code`, `fqt_primary_code`, `fqt_secondary_code`, `fqt_component_name`, `fqt_component_id`, `fqt_category_name`, `fqt_category_id`, `fqt_unit`, `fqt_qnty`, `fqt_date`, `fqt_time`, `fqt_location_id`, `fqt_transfer_location`, `fqt_transfer_type`, `fqt_remark`, `fqt_opening_balance`, `fqt_closing_balance`, `damage_loss`, `damage_loss_status`, `total_item_issue`, `price_issue_rate`, `total_price_item`, `total_receive_price`, `transit_loss_no`) VALUES (Null,'$fqt_hsn_code','$fqt_primary_code', '$fqt_secondary_code', '$fqt_component_name', '$fqt_component_id', '$fqt_category_name', '$fqt_category_id', '$fqt_unit', '$fqt_qnty','$fqt_date','$fqt_time','$fqt_location_id','$fqt_transfer_location','$fqt_transfer_type','$fqt_remark','$fqt_opening_balance','$fqt_closing_balance','$damage_loss','$damage_loss_status',$total_item_issue,'$price_issue_rate','$total_price_item','$total_receive_price','$transit_loss_no')";
			$sql_exe_insert=mysqli_query($conn,$insert);
			// UPDATE `lt_master_field_stock_info` SET `field_qnty`='42',`3450`='2898' WHERE`field_slno`='1'UPDATE `lt_master_field_maintenance_job_detail` SET `fmgd_hsn_id`='8431 4990',`fmgd_issue_quantity_id`='8',`fmgd_issue_status`='1' ,`rate_unit_charged`='69' where `fmgd_slno`='2'
			echo $UPDATE_STOCK="UPDATE `lt_master_field_stock_info` SET `field_qnty`='$new',`total_price`='$update_total_price' WHERE`field_slno`='$SLNO_ITEM'";
			$sql_exe_UPDATE_STOCK=mysqli_query($conn,$UPDATE_STOCK);

			echo $MATAIN="UPDATE `lt_master_field_maintenance_job_detail` SET `fmgd_hsn_id`='$field_hsn_code',`fmgd_issue_quantity_id`='$single_zqzis_issue_qnt',`fmgd_issue_status`='1'  ,`rate_unit_charged`='$price_charge_unit' where `fmgd_slno`='$main_slno_single'";
			$sql_exe_MATAIN=mysqli_query($conn,$MATAIN);
		}

	}
	echo $updete_m_job="UPDATE `lt_master_field_maintenance_job` SET `fmg_status`='2',`fmg_issue_date`='$date', `fmg_issue_time`='$time' WHERE`fmg_job_id`='$challan'";
	$sql_exe_updete_m_job=mysqli_query($conn,$updete_m_job);

	$msg->success('Success-Fully Issue Material for Machine Maintenance material for Use');
	 		header('Location:index.php');
			exit;
}else{
	header('Location:logout.php');
	exit;
}