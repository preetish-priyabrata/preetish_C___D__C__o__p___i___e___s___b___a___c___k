<?php

session_start();
if($_SESSION['admin_tech']){
	require 'FlashMessages.php';
	require '../config.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	// Array ( [hq_name] => Kansbahal ) 
 	// here information is received 
 	$class_name=mysqli_real_escape_string ($conn,strtolower($_POST['class_name']));
 	$date=date('Y-m-d'); // default time in online server
 	$time=date('H:i:s');// default time in online server


    $query_check="SELECT * FROM `ilab_class` WHERE `class_name`='$class_name'";
    $query_exe=mysqli_query($conn,$query_check);
    $num=mysqli_num_rows($query_exe);

    if($num==0) {
	 	// insert query 
	 	 $query_insert="INSERT INTO `ilab_class`(`slno_class`, `class_name`, `status`, `date`, `time`) VALUES (Null,'$class_name','1','$date','$time')";
	 	
	 	$sql_insert=mysqli_query($conn,$query_insert);
	 	// execute query
	 	
	 	 $last_id=mysqli_insert_id($conn);
	 	// findind last inserted query
	 	 $class_id="class00".$last_id;
	 	
	 	//here combination of our short code designed 

	 	// updated query insert in headquarter 
	 	$query_update="UPDATE `ilab_class` SET `class_id`='$class_id' WHERE `slno_class`='$last_id'";
	 	$sql_update=mysqli_query($conn,$query_update);

	 	// here success message is send 
	 	$msg->success('Successfull Class Is stored In our record');
	 	header('Location:admin_dashboard.php');
		exit;
	}else{
	    $msg->error('Class name is already present in our record');
	 	header('Location:admin_dashboard.php');
		exit;

	}

}else{
	header('Location:logout.php');
	exit;
}


?>