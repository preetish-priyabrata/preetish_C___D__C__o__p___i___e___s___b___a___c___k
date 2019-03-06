<?php
// print_r($_POST);
// exit;
session_start();
if($_SESSION['admin']){
	require 'FlashMessages.php';
	require 'config.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	//Array ( [hq_code] => hq1 [zonal_code] => zonal001 [field_name] => hingulaocp [field_name_code] => HOCP ) 
 		// here information is received 
 	$hq_code=mysqli_real_escape_string($conn,$_POST['hq_code']);
 	$field_name_code=mysqli_real_escape_string($conn,strtolower($_POST['field_name_code']));
 	$zonal_code=mysqli_real_escape_string($conn,$_POST['zonal_code']);
 	$field_name=mysqli_real_escape_string($conn,$_POST['field_name']);
 	$date=date('Y-m-d'); // default time in online server
 	$time=date('H:i:s');// default time in online server
	$address1=mysqli_real_escape_string($conn,$_POST['address1']);
 	$address2=mysqli_real_escape_string($conn,$_POST['address2']);
 	$address3=mysqli_real_escape_string($conn,$_POST['address3']);
 	$address4=mysqli_real_escape_string($conn,$_POST['address4']);
 	$address5=mysqli_real_escape_string($conn,$_POST['address5']);
 	$address6=mysqli_real_escape_string($conn,$_POST['address6']);
 	$address7=mysqli_real_escape_string($conn,$_POST['address7']);
 	$address8=mysqli_real_escape_string($conn,$_POST['address8']);


 	$check_insert="SELECT * FROM `lt_master_field_place` WHERE `manual_field_code`='$field_name_code'";
 	$sql_check=mysqli_query($conn,$check_insert);
 	$num=mysqli_num_rows($sql_check);
	if($num=="0"){
	 	// insert query 
	 	 $query_insert="INSERT INTO `lt_master_field_place`(`slno`, `field_name`,`manual_field_code`, `zonal_code`, `hq_code`, `district_code`, `state_code`, `country_code`, `status`, `date`, `time`,`address_1`,`address_2`,`address_3`,`address_4`,`address_5`,`address_6`,`address_7`,`address_8`) VALUES (Null,'$field_name','$field_name_code','$zonal_code','$hq_code','d001','s001','c001','1','$date','$time','$address1','$address2','$address3','$address4','$address5','$address6','$address7','$address8')";
	 	;
	 	$sql_insert=mysqli_query($conn,$query_insert);
	 	// execute query
	 	
	 	 $last_id=mysqli_insert_id($conn);
	 	// findind last inserted query
	 	 $field_code="field00".$last_id;
	 	
	 	//here combination of our short code designed 

	 	// updated query insert in headquarter 
	 	$query_update="UPDATE `lt_master_field_place` SET `field_code`='$field_code' WHERE`slno`='$last_id'";
	 	$sql_update=mysqli_query($conn,$query_update);

	 	// here success message is send 
	 	$msg->success('Successfull Field Is stored In our record');
	 	header('Location:admin_dashboard.php');
		exit;
	}else{
		$msg->error('Unable save Field Short Code Is In our record');
	 	header('Location:admin_dashboard.php');
		exit;	
	}

}else{
	header('Location:logout.php');
	exit;
}


?>

