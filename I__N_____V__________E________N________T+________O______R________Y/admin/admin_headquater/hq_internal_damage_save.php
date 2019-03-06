<?php
print_r($_POST);

error_reporting(E_ALL);
ini_set('display_errors',1);
session_start();
if($_SESSION['admin_hq']){
	require 'FlashMessages.php';
	include '../config.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();

    $hqindi_primary_code=$single_primary=$_POST['hq_primary_code'];
	$hqindi_secondary_code=$single_secondary=$_POST['hq_secondary_code'];
	$hqindi_component_name=$single_itemname=$_POST['hq_component_name'];
	$hqindi_component_type_name=$single_catergory=$_POST['hq_category_name'];
	$opening=$hq_qnty=$_POST['hq_qnty'];
	$hqindi_component_type_id=$single_catergoryNO=$_POST['hq_category_id'];
	$hqindi_unit=$single_unit=$_POST['hq_unit'];
	$hqindi_qnt=$issue_qnty=$_POST['damage_qnty'];
	$single_qnty=$hq_qnty-$issue_qnty;
	$hqindi_date=$DATE=date('Y-m-d');
	$hqindi_time=$time=date('H:i:s');
	$hqindi_hqlocation_id=$location=$_SESSION['hq_store_id'];
	$notes="Damage Issued For Office Use";

		$get_information="SELECT * FROM `lt_master_item_detail` WHERE `item_primary_code`='$single_primary'";
		$sql_get_information=mysqli_query($conn,$get_information);
		$fetch_get_information=mysqli_fetch_assoc($sql_get_information);
		$single_slno=$fetch_get_information['slno'];
		

	 $transfer_type="INSERT INTO `lt_master_hq_stock_transfer_info`(`hqt_slno`, `hqt_primary_code`,`hqt_secondary_code`, `hqt_component_name`, `hqt_component_id`, `hqt_category_name`, `hqt_category_id`, `hqt_unit`, `hqt_qnty`, `hqt_date`, `hqt_time`, `hqt_location_id`, `hqt_transfer_type`, `hqt_remark`,`hqt_opening_balance`,`hqt_closing_balance`,`hqt_transfer_location`) VALUES (Null,'$single_primary','$single_secondary','$single_itemname','$single_slno','$single_catergory','$single_catergoryNO','$single_unit','$issue_qnty','$DATE','$time','$location','4','$notes','$opening','$single_qnty','$location')";

    $damage="INSERT INTO `lt_master_hq_internal_damage_info`(`hqindi_sno`, `hqindi_primary_code`, `hqindi_secondary_code`, `hqindi_component_name`, `hqindi_component_type_id`, `hqindi_component_type_name`, `hqindi_unit`, `hqindi_qnt`, `hqindi_status`, `hqindi_date`, `hqindi_time`, `hqindi_hqlocation_id`) VALUES (NULL,'$hqindi_primary_code','$hqindi_secondary_code','$hqindi_component_name','$hqindi_component_type_id','$hqindi_component_type_name','$hqindi_unit','$hqindi_qnt','1','$hqindi_date','$hqindi_time','$hqindi_hqlocation_id')";

    $sql_exe=mysqli_query($conn,$transfer_type);
    $sql_exe2=mysqli_query($conn,$damage);

 	$update="UPDATE `lt_master_hq_stock_info` SET `hq_qnty`='$single_qnty' WHERE `hq_location_id`='$location' and `hq_primary_code`='$single_primary'";
	 $sql_exe1=mysqli_query($conn,$update);

	if(($sql_exe) && ($sql_exe1)){
		$msg->success('Successfully Transfer For HeadQuater For Damage Use');
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