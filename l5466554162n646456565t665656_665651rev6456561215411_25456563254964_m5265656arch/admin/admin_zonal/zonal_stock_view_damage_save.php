<?php 
session_start();
if($_SESSION['admin_zonal']){
	require 'FlashMessages.php';
	include '../config.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();

	$zonal_slno=$_POST['zonal_slno'];
	$zonal_primary_code=$_POST['zonal_primary_code'];
	$zonal_secondary_code=$_POST['zonal_secondary_code'];
	$zonal_component_name=$_POST['zonal_component_name'];
	$zonal_component_id=$_POST['zonal_component_id'];
	$zonal_category_name=$_POST['zonal_category_name'];
	$zonal_category_id=$_POST['zonal_category_id'];
	$zonal_unit=$_POST['zonal_unit'];
	$zonal_qnty=$_POST['zonal_qnty'];
	$damage_loss=$_POST['damage_loss'];
	$damage_loss_status=$_POST['damage_loss_status'];
	$zonal_location_id=$_POST['zonal_location_id'];
	$damage_qnty=$_POST['damage_qnty'];
	$date=date('Y-m-d');
	$time=date('H:i:s');
	$damage_loss_s=$damage_loss+$damage_qnty;
	$closed=$zonal_qnty-$damage_qnty;

	$insert="INSERT INTO `lt_master_zonal_stock_transfer_info`(`zqt_slno`, `zqt_primary_code`, `zqt_secondary_code`, `zqt_component_name`, `zqt_component_id`, `zqt_category_name`, `zqt_category_id`, `zqt_unit`, `zqt_qnty`, `zqt_date`, `zqt_time`, `zqt_location_id`, `zqt_transfer_location`, `zqt_transfer_type`, `zqt_remark`, `zqt_opening_balance`, `zqt_closing_balance`, `damage_loss`, `damage_loss_status`) VALUES (Null,'$zonal_primary_code','$zonal_secondary_code','$zonal_component_name','$zonal_component_id','$zonal_category_name','$zonal_category_id','$zonal_unit','$damage_qnty','$date','$time','$zonal_location_id','$zqt_transfer_location','5','damage was found please in stock','$zonal_qnty','$closed','$damage_qnty','1')";
	$sql_insert=mysqli_query($conn,$insert);
	$update="UPDATE `lt_master_zonal_stock_info` SET `damage_loss`='$damage_loss_s',`zonal_qnty`='$closed',`damage_loss_status`='1' WHERE  `zonal_slno`='$zonal_slno'";
	$sql_update=mysqli_query($conn,$update);

	if(($sql_insert) && ($sql_update)){
		$msg->success('Successfully Transfer For Zonal For Damage Use');
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