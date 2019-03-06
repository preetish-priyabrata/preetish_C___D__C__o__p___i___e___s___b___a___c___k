<?php
session_start();
ob_start();
if($_SESSION['email']){
require 'FlashMessages.php';
include '../config.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
// print_r($_POST);
// Array ( [serial] => 3 [sender] => 2 [ids_uni] => 5 [user_receiver_name] => Arati Sahoo [Message] => welcome this kiss alumni have some4 fun here ) 
// 
// 
	$serial=$_POST['serial'];
	$sender=$_POST['sender'];
	$ids_uni=$_POST['ids_uni'];
	$user_receiver_name=$_POST['user_receiver_name'];
	$Message=$_POST['Message'];
	$date=date('Y-m-d');
	$time=date('H:i:s');
	$dest="../uploads/message/";
	if(!empty($_FILES['file_upload']['name'])){
		 $file_name=date('y-m-d').date('H:i:s').$_FILES['file_upload']['name'];

		if(move_uploaded_file($_FILES['file_upload']['tmp_name'],"$dest".$file_name)){
			if(!empty($Message)){
				$query_user="INSERT INTO `master_message_send_friend`(`slno`, `message_detail`,`attach_file`, `friend_list_id_send`, `friend_list_id_received`, `status`, `friend_list_slno`, `date_send`, `time_send`) VALUES (Null,'$Message','$file_name','$sender','$ids_uni','0','$serial','$date','$time')";
				$sql_exe=mysqli_query($conn,$query_user);

				$msg->success('Success-Fully Send Message To '.$user_receiver_name);
				header('Location:alumni_dashboard.php');
				exit();


			}else{
				$msg->error('Sorry Something went wrong');
				header('Location:alumni_dashboard.php');
				exit();
			}
		}else{
			$msg->error('Sorry Something went wrong');
			header('Location:alumni_dashboard.php');
			exit();
		}
	}else{
		if(!empty($Message)){
			$query_user="INSERT INTO `master_message_send_friend`(`slno`, `message_detail`, `friend_list_id_send`, `friend_list_id_received`, `status`, `friend_list_slno`, `date_send`, `time_send`) VALUES (Null,'$Message','$sender','$ids_uni','0','$serial','$date','$time')";
			$sql_exe=mysqli_query($conn,$query_user);

			$msg->success('Success-Fully Send Message To '.$user_receiver_name);
			header('Location:alumni_dashboard.php');
			exit();

		}else{
			$msg->error('Sorry Something went wrong');
			header('Location:alumni_dashboard.php');
			exit();
		}

	}
}else{
	header('Location:logout.php');
  	exit;
}