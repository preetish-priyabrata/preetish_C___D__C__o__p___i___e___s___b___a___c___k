<?php 
 error_reporting(4);
 session_start();
 ob_start();
if($_SESSION['email_id']){
	$delete_id=$_SESSION['email_id'];
	include 'webconfig/config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();  $msg = new \Preetish\FlashMessages\	FlashMessages();
 	$date_entry=date('Y-m-d'); 
// Array ( [slno_surplus] => 93Z/d1ygfbtPCPZ0WGuQwDDYiDCFkSlW29n6UYHfRrg= [Surplus_job_code] => LE150871 [Material_Code] => 7723652ABC [UOM] => NO [Surplus_Quantity_Available] => 6 [unit_rate] => 215000 [person_responsible] => SANDEEP [Job_Description] => MCL - SURFACE MINER KSM 303 [Material_Description] => GEAR BOX [Surplus_date] => 2018-05-18 [Amount] => 1290000 [Product_Group] => KSM [Internal_Remarks] => TTT ) 
	$slno_surplus=preetishweb_decryptIt(str_replace(" ", "+", $_POST['slno_surplus']));
	$query_update="UPDATE `ilab_master_field_surplus_material` SET `status`='2' ,`delete_id`='$delete_id' ,`delete_date`='$date_entry' WHERE `slno_surplus`='$slno_surplus'";

	$entry_item_sql=mysqli_query($conn,$query_update);
	 	if($entry_item_sql){
		 	$msg->success('Successfull Delete  Surplus Job Code '.$_POST['Surplus_job_code']);
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