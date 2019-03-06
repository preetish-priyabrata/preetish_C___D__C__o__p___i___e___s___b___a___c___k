<?php 
// print_r($_POST);
// exit;
 error_reporting(4);
 session_start();
 ob_start();
if($_SESSION['email_id']){
	$email_id=$_SESSION['email_id'];
	include 'webconfig/config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();  $msg = new \Preetish\FlashMessages\	FlashMessages(); 
// Array ( [slno_surplus] => 3 [Surplus_job_code] => LE150871 [Material_Code] => 7723653ABC [UOM] => No [Surplus_Quantity_Available] => 6 [unit_rate] => 215000 [person_responsible] => Sandeep [Job_Description] => MCL - Surface Miner KSM 303 [Material_Description] => Gear Box [Surplus_date] => 2019-05-23 [Amount] => 1290000 [Product_Group] => KSM [Internal_Remarks] => material is ready to use ) 
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
	$slno_surplus=$_POST['slno_surplus'];
	$date_entry=date('Y-m-d');

	 $query_update="UPDATE `ilab_master_field_surplus_material` SET `surplus_job_code`='$surplus_job_code',`job_description`='$job_description',`material_code`='$material_code',`material_description`='$material_description',`quantity_available_surplus`='$quantity_available_surplus',`surplus_declared_date`='$surplus_declared_date',`unit_rate`='$unit_rate',`amount`='$amount',`uom`='$uom',`product_group`='$product_group',`person_responsible`='$person_responsible',`total_qnty`='$quantity_available_surplus',`date_entry`='$date_entry',`Internal_Remarks`='$Internal_Remarks' WHERE `slno_surplus`='$slno_surplus'";
	


	// $entry_item="INSERT INTO `ilab_master_field_surplus_material`(`slno_surplus`, `surplus_job_code`, `job_description`, `material_code`, `material_description`, `quantity_available_surplus`, `surplus_declared_date`, `unit_rate`, `amount`, `uom`, `product_group`, `person_responsible`, `total_qnty`, `status`, `entry_id`, `update_status`,`date_entry`,`Internal_Remarks`) VALUES (Null,'$surplus_job_code','$job_description','$material_code','$material_description','$quantity_available_surplus','$surplus_declared_date','$unit_rate','$amount','$uom','$product_group','$person_responsible','$quantity_available_surplus','1','$email_id','0','$date_entry','$Internal_Remarks')";

	 	$entry_item_sql=mysqli_query($conn,$query_update);
	 	if($entry_item_sql){
		 	$msg->success('Successfull Update Entry Surplus Material Master');
			header('Location:admin_View_Surplus_Material_Master.php');
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