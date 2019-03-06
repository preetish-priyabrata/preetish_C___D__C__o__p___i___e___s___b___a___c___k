<?php 
 error_reporting(4);
 session_start();
 ob_start();
if($_SESSION['email_id']){
	$email_id=$_SESSION['email_id'];
	include 'webconfig/config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();  $msg = new \Preetish\FlashMessages\	FlashMessages(); 
// Array ( [Surplus_job_code] => le150871 [Material_Code] => 772365abc [UOM] => no [Surplus_Quantity_Available] => 6 [unit_rate] => 215000 [person_responsible] => sandeep [Job_Description] => mcl - surface Miner ksm 303 [Material_Description] => gear box [Surplus_date] => 2018-05-17 [Amount] => 1290000 [Product_Group] => ksm )
// 
	$surplus_job_code=strtoupper(trim($_POST['Surplus_job_code']));
	$material_code=strtoupper(trim($_POST['Material_Code']));
	$uom=strtoupper(trim($_POST['UOM']));
	$quantity_available_surplus=strtoupper(trim($_POST['Surplus_Quantity_Available']));
	$unit_rate=strtoupper(trim($_POST['unit_rate']));
	$person_responsible=strtoupper(trim($_POST['person_responsible']));
	$job_description=strtoupper(trim($_POST['Job_Description']));
	$material_description=strtoupper(trim($_POST['Material_Description']));
	$surplus_declared_date=strtoupper(trim($_POST['Surplus_date']));
	$amount=strtoupper(trim($_POST['Amount']));
	$product_group=strtoupper(trim($_POST['Product_Group']));
	$Internal_Remarks=strtoupper($_POST['Internal_Remarks']);
	$date_entry=date('Y-m-d');

	$entry_item="INSERT INTO `ilab_master_field_surplus_material`(`slno_surplus`, `surplus_job_code`, `job_description`, `material_code`, `material_description`, `quantity_available_surplus`, `surplus_declared_date`, `unit_rate`, `amount`, `uom`, `product_group`, `person_responsible`, `total_qnty`, `status`, `entry_id`, `update_status`,`date_entry`,`Internal_Remarks`) VALUES (Null,'$surplus_job_code','$job_description','$material_code','$material_description','$quantity_available_surplus','$surplus_declared_date','$unit_rate','$amount','$uom','$product_group','$person_responsible','$quantity_available_surplus','1','$email_id','0','$date_entry','$Internal_Remarks')";

	 	$entry_item_sql=mysqli_query($conn,$entry_item);
	 	if($entry_item_sql){
		 	$msg->success('Successfull Single Entry Surplus Material Master');
			header('Location:admin_dashboard.php');
			exit;
		}else{
			$msg->error('Some thing went worng');
			header('Location:admin_dashboard.php');
			exit;	
		}

}else{
	header('Location:logout_time_out.php');
	exit;
}