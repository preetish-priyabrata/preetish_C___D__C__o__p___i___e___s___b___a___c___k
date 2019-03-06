<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
session_start();
if($_SESSION['admin_hq']){
	require 'FlashMessages.php';
	include '../config.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();

	$hqini_primary_code=$single_primary=$_POST['hq_primary_code'];
	$hqini_secondary_code=$single_secondary=$_POST['hq_secondary_code'];
	$hqini_component_name=$single_itemname=$_POST['hq_component_name'];
	$hqini_component_type_name=$single_catergory=$_POST['hq_category_name'];
	$opening=$hq_qnty=$_POST['hq_qnty'];
	$hqini_component_type_id=$single_catergoryNO=$_POST['hq_category_id'];
	$hqini_unit=$single_unit=$_POST['hq_unit'];
	$hqini_qnt=$issue_qnty=$_POST['issue_qnty'];
	$single_qnty=$hq_qnty-$issue_qnty;
	$hqini_date=$DATE=date('Y-m-d');
	$hqini_time=$time=date('H:i:s');
	$hqini_hqlocation_id=$location=$_SESSION['hq_store_id'];
	$notes="Internal Issued For Office Use";

		$get_information="SELECT * FROM `lt_master_item_detail` WHERE `item_primary_code`='$single_primary'";
		$sql_get_information=mysqli_query($conn,$get_information);
		$fetch_get_information=mysqli_fetch_assoc($sql_get_information);

		$hqt_component_id=$single_slno=$fetch_get_information['slno'];
		

	$transfer_type="INSERT INTO `lt_master_hq_stock_transfer_info`(`hqt_slno`, `hqt_primary_code`, `hqt_secondary_code`, `hqt_component_name`, `hqt_component_id`, `hqt_category_name`, `hqt_category_id`, `hqt_unit`, `hqt_qnty`, `hqt_date`, `hqt_time`, `hqt_location_id`, `hqt_transfer_type`, `hqt_remark`,`hqt_opening_balance`,`hqt_closing_balance`,`hqt_transfer_location`) VALUES (Null,'$single_primary','$single_secondary','$single_itemname','$single_slno','$single_catergory','$single_catergoryNO','$single_unit','$issue_qnty','$DATE','$time','$location','3','$notes','$opening','$single_qnty','$location')";

	$inset="INSERT INTO `lt_master_hq_internal_issue_info`(`hqini_sno`, `hqini_primary_code`, `hqini_secondary_code`, `hqini_component_name`,`hqt_component_id`, `hqini_component_type_id`, `hqini_component_type_name`, `hqini_unit`, `hqini_qnt`, `hqini_status`, `hqini_date`, `hqini_time`, `hqini_hqlocation_id`) VALUES (Null, '$hqini_primary_code', '$hqini_secondary_code', '$hqini_component_name','$hqt_component_id', '$hqini_component_type_id', '$hqini_component_type_name', '$hqini_unit', '$hqini_qnt', '1', '$hqini_date', '$hqini_time', '$hqini_hqlocation_id')";

	$sql_exe=mysqli_query($conn,$transfer_type);
	$sql_exe2=mysqli_query($conn,$inset);

	$update="UPDATE `lt_master_hq_stock_info` SET `hq_qnty`='$single_qnty' WHERE `hq_location_id`='$location' and `hq_primary_code`='$single_primary'";
	$sql_exe1=mysqli_query($conn,$update);
	if(($sql_exe) && ($sql_exe1)){
		$msg->success('Successfull');
		header('Location:index.php');
		exit;	
	}else{
		$msg->error('Something went Worng');
		header('Location:index.php');
		exit;	
	}

// 
}else{
	header('Location:logout.php');
	exit;
}