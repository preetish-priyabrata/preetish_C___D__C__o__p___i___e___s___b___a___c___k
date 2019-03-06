<?php
error_reporting(E_ALL);
session_start();
// ob_start();
if($_SESSION['email']){
	require 'FlashMessages.php';
	include '../config.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();
    // print_r($_POST);
    // print_r($_FILES);
	//$file_name=date('y-m-d').date('H:i:s').$_FILES['img']['name'];
	//exit();
	$title=trim($_POST['title']);
	$email=$_SESSION['email'];
	$date=date('Y-m-d');
	$time=date('H:i:s');   
	// $sharing_info_id=$_POST['$last_id'];
	$dest="../uploads/photo/";
	if(!empty($_FILES['img']['name'])){
		 $file_name=date('y-m-d').date('H:i:s').$_FILES['img']['name'];

		if(move_uploaded_file($_FILES['img']['tmp_name'],"$dest".$file_name)){
			
			$query_student="INSERT INTO `user_sharing_Info`(`sl_no`,`title`,`user_id`,`date_entry`,`time_entry`) VALUES (NULL,'$title','$email','$date','$time')";
			$sql_exe=mysqli_query($conn,$query_student);
			$last_id=mysqli_insert_id($conn);
			 $query_student1="INSERT INTO `user_sharing_info_details`(`sl_no`, `user_id`, `title`, `sharing_info_id`, `photo`, `post_type`, `date`, `time_entry`) VALUES (NULL,'$email','$title','$last_id','$file_name','1','$date','$time')";
			$sql_exe1=mysqli_query($conn,$query_student1);
			// echo mysqli_error($conn);
			// exit();
			$msg->success('Photo/File Sent Successfull');
			header('Location:alumni_dashboard.php');
			exit();
		}else{
	       $msg->error('Some Error Is found');
			header('Location:alumni_dashboard.php');
			exit();
		}	
		
	}else{
		$msg->error('Photo Or File Is Not matched');
		header('Location:alumni_dashboard.php');
		exit();
	}

}else{
	header('Location:logout.php');
	exit;
 }

 ?>