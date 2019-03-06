<?php
 //print_r($_GET);
// exit;
// Array ( [token_name] => TVGhMhqJNCoOSLGbQDiJe2LsbLRlyK eZ6vABEMsEZg= [token_id] => 8aOyw1KZ2tSLhqi0i089Myd0GDS4b7jdHsUSflFGhUQ= ) 
session_start();
if($_SESSION['admin_hq']){
	include  '../config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
	$title="Welcome To Dashboard Of HeadQuarter Officer";
	$hq_slno=web_decryptIt(str_replace(" ", "+", $_GET['token_name'])); //zmr_slno
  	$hqindi_return_challan_id=$hq_secondary_code=web_decryptIt(str_replace(" ", "+", $_GET['token_id']));

	$hqindi_date=date('Y-m-d');
	$hqindi_time=date('H:i:s');

	$Requsition_query="SELECT * FROM `lt_master_zonal_internal_damage_info` WHERE `zsindi_challan_no`='$hq_secondary_code'";
	$sql_Requsition_exe=mysqli_query($conn,$Requsition_query);
	while ($result=mysqli_fetch_assoc($sql_Requsition_exe)) { 
	$hqindi_primary_code=$result['zsindi_primary_code'];
	$hqindi_secondary_code=$result['zsindi_secondary_code'];
	$hqindi_component_name=$result['zsindi_component_name'];
	$hqindi_component_type_id=$result['zsindi_component_type_id'];
	$hqindi_component_type_name=$result['zsindi_component_type_name'];
	$hqindi_unit=$result['zsindi_unit'];
	$hqindi_qnt=$result['zsindi_qnt'];
	$hqindi_status='2';
	$hqindi_hqlocation_id=$result['zsindi_hqlocation_id'];
	$hqindi_return_challan_id=$result['zsindi_return_challan_id'];
	$hqindi_return_slno=$result['zsindi_return_slno'];
	$hqindi_return_location_id=$result['zsindi_return_location_id'];
		
	 $insert_damage="INSERT INTO `lt_master_hq_internal_damage_info`(`hqindi_sno`, `hqindi_primary_code`, `hqindi_secondary_code`, `hqindi_component_name`, `hqindi_component_type_id`, `hqindi_component_type_name`, `hqindi_unit`, `hqindi_qnt`, `hqindi_status`, `hqindi_date`, `hqindi_time`, `hqindi_hqlocation_id`, `hqindi_return_challan_id`, `hqindi_return_slno`, `hqindi_return_location_id`) VALUES (Null, '$hqindi_primary_code', '$hqindi_secondary_code', '$hqindi_component_name', '$hqindi_component_type_id', '$hqindi_component_type_name', '$hqindi_unit', '$hqindi_qnt', '$hqindi_status', '$hqindi_date', '$hqindi_time', '$hqindi_hqlocation_id', '$hqindi_return_challan_id', '$hqindi_return_slno', '$hqindi_return_location_id')";
		$sql_insert_damage=mysqli_query($conn,$insert_damage);
		

	}

	    $user_entry_id=$_SESSION['admin_hq'];

		$update_stock_damage="UPDATE `lt_master_zonal_challan_damage` SET `receive_status`='1',`date_receive`='$hqindi_date',`time_receive`='$hqindi_time',`user_entry_id`='$user_entry_id'  where `slno`='$hq_slno' and `zonal_damage_challan`='$hqindi_return_challan_id'";
		$sql_update_stock_damage=mysqli_query($conn,$update_stock_damage);

	if(($sql_insert_damage) && ($sql_update_stock_damage)){
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
