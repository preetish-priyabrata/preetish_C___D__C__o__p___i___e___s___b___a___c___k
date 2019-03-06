<?php 

session_start();
if($_SESSION['admin_field']){
	require 'FlashMessages.php';
	include '../config.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();
	
	$zonal_location_id=$zonal_place=$_SESSION['field_place'];
	$challan=$_POST['challan'];
	$main_slno=$_POST['main_slno'];
	$zqzis_issue_qnt=$_POST['zqzis_issue_qnt'];
	$fmgd_secondary_id=$_POST['fmgd_secondary_id'];
	$machine_no=$_POST['machine_no'];
	$date=date('Y-m-d');
	$time=date('H:i:s');
	for ($i=0; $i <count($fmgd_secondary_id); $i++) { 
		$single_zqzis_issue_qnt=$zqzis_issue_qnt[$i];
		$field_secondary_code_s=$fmgd_secondary_id[$i];
		$main_slno_single=$main_slno[$i];

		$get_details="SELECT * FROM `lt_master_field_stock_info` WHERE `field_secondary_code`='$field_secondary_code_s' and `field_location_id`='$zonal_place'";
		$sql_exe=mysqli_query($conn,$get_details);
		$fetch_material=mysqli_fetch_assoc($sql_exe);
		$SLNO_ITEM=$fetch_material['field_slno'];
		$field_primary_code=$fetch_material['field_primary_code'];
		$field_secondary_code=$fetch_material['field_secondary_code'];
		$field_component_name=$fetch_material['field_component_name'];
		$field_component_id=$fetch_material['field_component_id'];
		$field_category_name=$fetch_material['field_category_name'];
		$field_category_id=$fetch_material['field_category_id'];
		$field_unit=$fetch_material['field_unit'];
		$field_qnty=$fetch_material['field_qnty'];
		$price_charge_unit=$fetch_material['price_charge_unit'];
		$total_price=$fetch_material['total_price'];
		$field_hsn_code=$fetch_material['field_hsn_code'];
		


		if($field_qnty!=0){

				if($single_zqzis_issue_qnt < $field_qnty){
					$remain1=$field_qnty-$single_zqzis_issue_qnt;

				}else if($single_zqzis_issue_qnt == $field_qnty){
					$remain1=$field_qnty-$single_zqzis_issue_qnt;
				}else if($single_zqzis_issue_qnt > $field_qnty){
					$remain1=$field_qnty-$single_zqzis_issue_qnt;

				}

				if($remain1<0){
					$new=$single_zqzis_issue_qnt-$field_qnty;
					$single_zqzis_issue_qnt=$single_zqzis_issue_qnt-$remain;
				}else{
					$new=$field_qnty-$single_zqzis_issue_qnt;
				}
			
			
			$new_total_qnty=$price_charge_unit*$single_zqzis_issue_qnt;

			$update_total_price=$total_price-$new_total_qnty;


			//$new=$field_qnty-$single_zqzis_issue_qnt;

			$insert="INSERT INTO `lt_master_field_stock_transfer_info`(`fqt_slno`, `fqt_primary_code`, `fqt_secondary_code`, `fqt_component_name`, `fqt_component_id`, `fqt_category_name`, `fqt_category_id`, `fqt_unit`, `fqt_qnty`, `fqt_date`, `fqt_time`, `fqt_location_id`, `fqt_transfer_location`, `fqt_transfer_type`, `fqt_remark`, `fqt_opening_balance`, `fqt_closing_balance`, `damage_loss`, `damage_loss_status``fqt_hsn_code`,`price_issue_rate`, `total_price_item`, `total_receive_price`, `transit_loss_no`) VALUES (Null,'$field_primary_code', '$field_secondary_code', '$field_component_name', '$field_component_id', '$field_category_name', '$field_category_id', '$field_unit', '$single_zqzis_issue_qnt','$date','$time','$zonal_location_id','$zonal_location_id','4','Internal user on machine on $machine_no','$field_qnty','$new',0,0,'$field_hsn_code','$price_charge_unit','0','$new_total_qnty','0')";
			$sql_exe_insert=mysqli_query($conn,$insert);

			$UPDATE_STOCK="UPDATE `lt_master_field_stock_info` SET `field_qnty`='$new',`$total_price`='$update_total_price' WHERE`field_slno`='$SLNO_ITEM'";
			$sql_exe_UPDATE_STOCK=mysqli_query($conn,$UPDATE_STOCK);

			$MATAIN="UPDATE `lt_master_field_maintenance_job_detail` SET `fmgd_hsn_id`='$field_hsn_code',`fmgd_issue_quantity_id`='$single_zqzis_issue_qnt',`fmgd_issue_status`='1'  ,`rate_unit_charged`='$price_charge_unit' where `fmgd_slno`='$main_slno_single'";
			$sql_exe_MATAIN=mysqli_query($conn,$MATAIN);
		}

	}
	$updete_m_job="UPDATE `lt_master_field_maintenance_job` SET `fmg_status`='2',`fmg_issue_date`='$date', `fmg_issue_time`='$time' WHERE`fmg_job_id`='$challan'";
	$sql_exe_updete_m_job=mysqli_query($conn,$updete_m_job);

	$msg->success('Success-Fully Issue Material for Machine Maintenance material for Use');
	 		header('Location:index.php');
			exit;
}else{
	header('Location:logout.php');
	exit;
}