<?php
session_start();
if($_SESSION['admin_zonal']){

	$zsindi_return_location_id=$location_from=$_SESSION['zonal_place'];
	$zsindi_hqlocation_id=$location_to=$_SESSION['top_place'];

	require 'FlashMessages.php';
	include '../config.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();
	
	$zonal_slno=$_POST['zonal_slno'];
	$zonal_primary_code=$_POST['zonal_primary_code'];
	$zonal_secondary_code=$_POST['zonal_secondary_code'];
	$zonal_hsn_code=$_POST['zonal_hsn_code'];
	$zonal_component_name=$_POST['zonal_component_name'];
	$zonal_component_id=$_POST['zonal_component_id'];
	$zonal_category_name=$_POST['zonal_category_name'];
	$zonal_category_id=$_POST['zonal_category_id'];
	$zonal_unit=$_POST['zonal_unit'];
	$damage_loss=$_POST['damage_loss'];
	$damage_loss_status=$_POST['damage_loss_status'];
	$zonal_location_id=$_POST['zonal_location_id'];
	$damage_qnty=$_POST['damage_qnty'];
	$count=count($zonal_primary_code);
	$zsindi_date=$date_entry=$date_approve=$date_issue=$date=date('Y-m-d');
	$zsindi_time=$time_entry=$time_approve=$time_issue=$time=date('H:i:s');
	$user_entry_id=$user_issue_id=$user_approve_id=$_SESSION['admin_zonal'];
	$price_charge_unit=$_POST['price_charge_unit'];
	// $zonal_damage_challan
	$insert="INSERT INTO `lt_master_zonal_challan_damage`(`slno`, `location_to`, `status`, `approve_status`, `issue_status`, `receive_status`, `no_items`, `date_entry`, `date_approve`,  `date_issue`, `time_entry`, `time_approve`,`time_issue`, `user_entry_id`, `user_issue_id`, `user_approve_id`, `location_from`) VALUES (Null,'$location_to','1','1','1','0','$count', '$date_entry', '$date_approve',  '$date_issue', '$time_entry', '$time_approve','$time_issue','$user_entry_id','$user_issue_id','$user_approve_id','$location_from')";
	$sql_insert=mysqli_query($conn,$insert);

	$zsindi_return_slno=$last_id=mysqli_insert_id($conn);
	 			// findind last inserted query
	$zsindi_challan_no=$zsindi_return_challan_id=$zonal_damage_challan=date('Y-m-d')."-"."Zonal_dam".$last_id;
	 	
	$update_challan="UPDATE `lt_master_zonal_challan_damage` SET `zonal_damage_challan`='$zonal_damage_challan' where `slno`='$last_id'";
	$sql_update_challan=mysqli_query($conn,$update_challan);

	for ($i=0; $i <count($zonal_primary_code) ; $i++) { 
		// zsindi_challan_no
		$zonal_slno_single=$zonal_slno[$i];
		$zsindi_primary_code=$zonal_primary_code[$i];
		$zsindi_secondary_code=$zonal_secondary_code[$i];
		$zsindi_component_name=$zonal_component_name[$i];
		$zsindi_component_type_id=$zonal_category_id[$i];
		$zsindi_component_type_name=$zonal_category_name[$i];
		$zsindi_unit=$zonal_unit[$i];
		$zsindi_qnt=$damage_loss[$i];
		$zsindi_status=1;
		$zsindi_hsn_code=$zonal_hsn_code[$i];
		$rate_price_unit=$price_charge_unit[$i];

		$insert_damage="INSERT INTO `lt_master_zonal_internal_damage_info`(`zsindi_sno`, `zsindi_challan_no`, `zsindi_primary_code`, `zsindi_secondary_code`, `zsindi_component_name`, `zsindi_component_type_id`, `zsindi_component_type_name`, `zsindi_unit`, `zsindi_qnt`, `zsindi_status`, `zsindi_date`, `zsindi_time`, `zsindi_hqlocation_id`, `zsindi_return_challan_id`, `zsindi_return_slno`, `zsindi_return_location_id`,`zsindi_hsn_code`,`rate_price_unit`) VALUES (Null, '$zsindi_challan_no', '$zsindi_primary_code', '$zsindi_secondary_code', '$zsindi_component_name', '$zsindi_component_type_id', '$zsindi_component_type_name', '$zsindi_unit', '$zsindi_qnt', '$zsindi_status', '$zsindi_date', '$zsindi_time', '$zsindi_hqlocation_id', '$zsindi_return_challan_id', '$zsindi_return_slno', '$zsindi_return_location_id','$zsindi_hsn_code','$rate_price_unit')";
		$sql_insert_damage=mysqli_query($conn,$insert_damage);

		$update_stock_damage="UPDATE `lt_master_zonal_stock_info` SET `damage_loss`='0',`damage_loss_status`='0' where `zonal_slno`='$zonal_slno_single'";
		$sql_update_stock_damage=mysqli_query($conn,$update_stock_damage);
	}
	if(($sql_insert) && ($sql_update_challan)){
		$msg->success('Successfully Transfer damage To HeadQuater From Zonal');
		header('Location:index.php');
		exit;	
	}else{
		$msg->error('Something went Worng');
		header('Location:index.php');
		exit;	
	}

}else{
	header('Location:logout.php');
	exit;
}