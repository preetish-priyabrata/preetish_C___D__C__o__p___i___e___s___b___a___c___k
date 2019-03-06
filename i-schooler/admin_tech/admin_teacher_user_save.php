<?php

error_reporting(4);
session_start();
ob_start();

// Array ( [u_id] => 123 [u_name] => 112 [u_email] => 111 [u_phone] => 333 [u_major] => 111 [u_pass] => 1456 [Submit] => Submit ) Array ( [u_file] => Array ( [name] => user-bg.jpg [type] => image/jpeg [tmp_name] => /tmp/phpc6LTfd [error] => 0 [size] => 34580 ) ) 
if($_SESSION['admin_tech']){
	include '../config.php';
	require 'FlashMessages.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();

	
		//$userid = $_POST['u_id'];
		$t_name = $_POST['u_name'];
		$t_email = $_POST['u_email'];
		$t_mob = $_POST['u_phone'];
		$t_major = $_POST['u_major'];
		$t_pass =rand();
		$date = date('Y-m-d');
		$tim  = date('H:i:s');
		$dir = "../assert/upload/teacher";
		$file_name =date('h:i:s'). $_FILES['u_file']['name'];
		if(move_uploaded_file($_FILES['u_file']['tmp_name'],"$dir/".$file_name)){
			$insert_query ="INSERT INTO `master_teacher_user`(`teacher_name`,`teacher_email`,`teacher_mobile`,`teacher_photo`,`teacher_subject`,`password` ,`date`,`time`)VALUES('$t_name','$t_email','$t_mob','$file_name','$t_major','$t_pass','$date','$tim')";
			
			
		     $query_insert_exe = mysqli_query($conn,$insert_query);
		     
		      if($query_insert_exe){
		      	$msg->success('Teacher Name Added Success-full');
 			 	header("location:admin_teacher_user.php");
			  	exit;

		      }else{
		      	$msg->error('Please Contact Maintance Support Team');
 			  	header("location:admin_teacher_user.php");
			  	exit;
		      }
		}else{
			$msg->error('Server Error Occured Please Contact Mantaince Person');
 			header("location:admin_teacher_user.php");
			exit;
			}

}else{
	
 	header("location:logout.php");
	exit;
}
?>