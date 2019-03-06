<?php
// print_r($_POST);
// exit;
session_start();
if($_SESSION['admin']){
	require 'FlashMessages.php';
	require 'config.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	// Array ( [hq_code] => hq1 [zonal_name] => zonal1 )  	// here information is received 
 	$hq_code=mysqli_real_escape_string($conn,$_POST['hq_code']);
 	$zonal_name=mysqli_real_escape_string($conn,$_POST['zonal_name']);
 	$address1=mysqli_real_escape_string($conn,$_POST['address1']);
 	$address2=mysqli_real_escape_string($conn,$_POST['address2']);
 	$address3=mysqli_real_escape_string($conn,$_POST['address3']);
 	$address4=mysqli_real_escape_string($conn,$_POST['address4']);
 	$address5=mysqli_real_escape_string($conn,$_POST['address5']);
 	$address6=mysqli_real_escape_string($conn,$_POST['address6']);
 	$address7=mysqli_real_escape_string($conn,$_POST['address7']);
 	$address8=mysqli_real_escape_string($conn,$_POST['address8']);
 	$address9=mysqli_real_escape_string($conn,$_POST['address9']);

 	$date=date('Y-m-d'); // default time in online server
 	$time=date('H:i:s');// default time in online server

 	// insert query 
 	 $query_insert="INSERT INTO `lt_master_zonal_place`(`slno`, `zonal_name`,`address_1`,`address_2`,`address_3`,`address_4`,`address_5`,`address_6`,`address_7`,`address_8`,`hq_code`, `district_code`, `state_code`, `country_code`, `status`, `date`, `time`,`address9`) VALUES (Null,'$zonal_name','$address1','$address2','$address3','$address4','$address5','$address6','$address7','$address8','$hq_code','d001','s001','c001','1','$date','$time','$address9')";
 	;
 	$sql_insert=mysqli_query($conn,$query_insert);
 	// execute query

 	 $last_id=mysqli_insert_id($conn);
 	// findind last inserted query
 	 $zonal_code="zonal00".$last_id;
 	
 	//here combination of our short code designed 

 	// updated query insert in headquarter 
 	$query_update="UPDATE `lt_master_zonal_place` SET `zonal_code`='$zonal_code' WHERE`slno`='$last_id'";
 	$sql_update=mysqli_query($conn,$query_update);

 	// here success message is send 
 	$msg->success('Successfull Zonal Is stored In our record');
 	header('Location:admin_dashboard.php');
	exit;

}else{
	header('Location:logout.php');
	exit;
}


?>

