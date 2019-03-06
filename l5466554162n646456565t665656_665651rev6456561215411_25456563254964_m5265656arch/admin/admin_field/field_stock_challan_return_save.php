
<?php 
session_start();
if($_SESSION['admin_field']){

	$fsindi_return_location_id=$location_from=$_SESSION['field_place'];
	$fsindi_hqlocation_id=$location_to=$_SESSION['zonal_place'];

	require 'FlashMessages.php';
	include '../config.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();

	$field_slno=$_POST['field_slno'];
	$field_primary_code=$_POST['field_primary_code'];
	$field_secondary_code=$_POST['field_secondary_code'];
	$field_component_name=$_POST['field_component_name'];
	$field_component_id=$_POST['field_component_id'];
	$field_category_name=$_POST['field_category_name'];
	$field_category_id=$_POST['field_category_id'];
	$field_unit=$_POST['field_unit'];
	$damage_loss=$_POST['damage_loss'];
	$damage_loss_status=$_POST['damage_loss_status'];
	$field_location_id=$_POST['field_location_id'];
	$damage_qnty=$_POST['damage_qnty'];
	$count=count($field_primary_code);
	$fsindi_date=$date_entry=$date_approve=$date_issue=$date=date('Y-m-d');
	$fsindi_time=$time_entry=$time_approve=$time_issue=$time=date('H:i:s');
	$user_entry_id=$user_issue_id=$user_approve_id=$_SESSION['admin_field'];
	// $field_damage_challan

	$insert="INSERT INTO `lt_master_field_challan_damage`(`slno`, `location_to`, `status`, `approve_status`, `issue_status`, `receive_status`, `no_items`, `date_entry`, `date_approve`, `date_issue`, `time_entry`, `time_approve`,`time_issue`, `user_entry_id`, `user_issue_id`, `user_approve_id`, `location_from`) VALUES (Null,'$location_to','1','1','1','0','$count', '$date_entry', '$date_approve',  '$date_issue', '$time_entry', '$time_approve','$time_issue','$user_entry_id','$user_issue_id','$user_approve_id','$location_from')";
	$sql_insert=mysqli_query($conn,$insert);

	$fsindi_return_slno=$last_id=mysqli_insert_id($conn);
	 			// findind last inserted query
	$fsindi_challan_no=$fsindi_return_challan_id=$field_damage_challan=date('Y-m-d')."-"."field_dam".$last_id;
	 	
	$update_challan="UPDATE `lt_master_field_challan_damage` SET `field_damage_challan`='$field_damage_challan' where `slno`='$last_id'";
	$sql_update_challan=mysqli_query($conn,$update_challan);

	for ($i=0; $i < count($field_primary_code);$i++) { 
		$field_slno_single=$field_slno[$i];
    //$fsindi_challan_no
    $fsindi_primary_code=$field_primary_code[$i];
    $fsindi_secondary_code=$field_secondary_code[$i];
    $fsindi_component_name=$field_component_name[$i];
    $fsindi_component_type_id=$field_category_id[$i];
    $fsindi_component_type_name=$field_category_name[$i];
    $fsindi_unit=$field_unit[$i];
    $fsindi_qnt=$damage_loss[$i];
    $fsindi_status=1;
   
    $insert_damage="INSERT INTO `lt_master_field_internal_damage_info`(`fsindi_sno`, `fsindi_challan_no`, `fsindi_primary_code`, `fsindi_secondary_code`, `fsindi_component_name`, `fsindi_component_type_id`, `fsindi_component_type_name`, `fsindi_unit`, `fsindi_qnt`, `fsindi_status`, `fsindi_date`, `fsindi_time`, `fsindi_hqlocation_id`, `fsindi_return_challan_id`, `fsindi_return_slno`, `fsindi_return_location_id`) VALUES (NULL,'$fsindi_challan_no','$fsindi_primary_code','$fsindi_secondary_code','$fsindi_component_name','$fsindi_component_type_id','$fsindi_component_type_name','$fsindi_unit','$fsindi_qnt','$fsindi_status','$fsindi_date','$fsindi_time','$fsindi_hqlocation_id','$fsindi_return_challan_id','$fsindi_return_slno','$fsindi_return_location_id')";
    	$sql_insert_damage=mysqli_query($conn,$insert_damage);

    	$update_stock="UPDATE `lt_master_field_stock_info` SET `damage_loss`='0',`damage_loss_status`='0' WHERE `field_slno`='field_slno_single'";
    	$sql_update_stock=mysqli_query($conn,$update_stock);
	}
	if(($sql_insert) && ($sql_update_challan)){
		$msg->success('Successfully Transfer damage To Zonal From Field');
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



