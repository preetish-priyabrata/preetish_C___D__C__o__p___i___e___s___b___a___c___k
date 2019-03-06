<?php

session_start();
if($_SESSION['admin']){
	require 'FlashMessages.php';
	require 'config.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	// Array ( [hq_name] => Kansbahal ) 
 	// here information is received 
 	$hq_name=mysqli_real_escape_string($conn,$_POST['hq_name']);
 	$date=date('Y-m-d'); // default time in online server
 	$time=date('H:i:s');// default time in online server

 	// insert query 
 	 $query_insert="INSERT INTO `lt_master_HQ_place`(`slno`, `hq_name`, `district_code`, `state_code`, `country_code`, `status`, `date`, `time`) VALUES (Null,'$hq_name','d001','s001','c001','1','$date','$time')";
 	;
 	$sql_insert=mysqli_query($conn,$query_insert);
 	// execute query
 	
 	 $last_id=mysqli_insert_id($conn);
 	// findind last inserted query
 	 $hq_code="hq".$last_id;
 	
 	//here combination of our short code designed 

 	// updated query insert in headquarter 
 	$query_update="UPDATE `lt_master_HQ_place` SET `hq_code`='$hq_code' WHERE`slno`='$last_id'";
 	$sql_update=mysqli_query($conn,$query_update);

 	// here success message is send 
 	$msg->success('Successfull HeadQuarter Is stored In our record');
 	header('Location:admin_dashboard.php');
	exit;

}else{
	header('Location:logout.php');
	exit;
}


?>

