<?php
// print_r($_POST);
// exit;
session_start();
if($_SESSION['admin']){
	require 'FlashMessages.php';
	require '../config.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	// Array ( [hq_name] => Kansbahal ) 
 	// here information is received 
 	$component_category=mysqli_real_escape_string ($conn,strtolower($_POST['component_category']));
 	$date=date('Y-m-d'); // default time in online server
 	$time=date('H:i:s');// default time in online server


    echo $query_check="SELECT * FROM `lt_master_item_category` WHERE `category_name`='$component_category'";
    $query_exe=mysqli_query($conn,$query_check);
   echo  $num=mysqli_num_rows($query_exe);

    if($num==0) {
	 	// insert query 
	 	$query_insert="INSERT INTO `lt_master_item_category`(`slno`, `category_name`, `status`, `date`, `time`) VALUES (Null,'$component_category','1','$date','$time')";
	 	
	 	$sql_insert=mysqli_query($conn,$query_insert);
	 	// execute query
	 	
	 	$last_id=mysqli_insert_id($conn);
	 	// findind last inserted query
	 	 $component_unique_code="item_cat_00".$last_id;
	 	
	 	//here combination of our short code designed 

	 	// updated query insert in headquarter 
	 	$query_update="UPDATE `lt_master_item_category` SET `category_item_short`='$component_unique_code' WHERE `slno`='$last_id'";
	 	$sql_update=mysqli_query($conn,$query_update);

	 	// here success message is send 
	 	$msg->success('Successfull Component Category Is stored In our record');
	 	header('Location:admin_dashboard.php');
		exit;
	}else{
	    $msg->error('Component Category is already present in our record');
	 	header('Location:admin_dashboard.php');
		exit;

	}

}else{
	header('Location:logout.php');
	exit;
}


?>