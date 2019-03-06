<?php 
 error_reporting(4);
 session_start();
 ob_start();
if($_SESSION['email_id']){
	$delete_id=$_SESSION['email_id'];
	include 'webconfig/config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();  $msg = new \Preetish\FlashMessages\	FlashMessages();
// Array ( [slno_surplus] => 0qkgUfUknFP5duX kz 31BwGThyQvL8or84Q7V FYnA= [Surplus_job_code] => LE150876 [Material_Code] => 772365ADF [UOM] => NO [Reserved_Quantity] => 8 [Surplus_Quantity_Available] => 8 [Material_Description] => OIL [Surplus_date] => 2018-05-18 [person_responsible] => Sandeep ku ) 
	$slno_surplus=preetishweb_decryptIt(str_replace(" ", "+", $_POST['slno_surplus']));

	$Surplus_job_code=strtoupper(trim($_POST['Surplus_job_code']));
	$Material_Code=strtoupper(trim($_POST['Material_Code']));
	$Surplus_Quantity_Available=strtoupper(trim($_POST['Surplus_Quantity_Available']));
	$Material_Description=strtoupper(trim($_POST['Material_Description']));
	$Reserved_On_Date=strtoupper(trim($_POST['Surplus_date']));
	$Reserved_By=strtoupper(trim($_POST['person_responsible']));
	$UOM=strtoupper(trim($_POST['UOM']));
	$Reserved_Quantity=strtoupper(trim($_POST['Reserved_Quantity']));
	$Reserve_job_Code=strtoupper(trim($_POST['Reserve_job_Code']));
	$date_entry=date('Y-m-d');
	$new_qnty=$Surplus_Quantity_Available-$Reserved_Quantity;

	$insert="INSERT INTO `ilab_reservation_master`(`slno`, `status`, `date`, `Material_code`, `Material_Description`, `UOM`, `Reserved_Job_Code`, `Reserved_Quantity`, `Reserved_On_Date`, `Reserved_By`, `slno_surplus_id`) VALUES (Null,'1','$date_entry','$Material_Code','$Material_Description','$UOM','$Reserve_job_Code','$Reserved_Quantity','$Reserved_On_Date','$Reserved_By','$slno_surplus')";
	$entry_item_insert_sql=mysqli_query($conn,$insert);

	$query_update="UPDATE `ilab_master_field_surplus_material` SET `quantity_available_surplus`='$new_qnty',`status`='1' ,`update_status`='1' ,`surplus_declared_date`='$date_entry' WHERE `slno_surplus`='$slno_surplus'";

		$entry_item_sql=mysqli_query($conn,$query_update);
		 	if($entry_item_sql){
			 	$msg->success('Successfull Reserved Surplus Material Code '.$_POST['Material_Code']);
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