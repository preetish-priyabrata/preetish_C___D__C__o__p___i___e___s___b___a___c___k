<?php
session_start();
if($_SESSION['admin_zonal']){
	require 'FlashMessages.php';
	require '../config.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	$form_type=web_decryptIt(str_replace(" ", "+", $_REQUEST['form_type']));
 	if($form_type=='report3')

 		$old_password=trim($_REQUEST['old_password']);
 		$old_password_hash = md5($old_password);
 		$u_slno=$_REQUEST['u_slno'];		
		$new_password=trim($_REQUEST['new_password']);
		$new_password_hash = md5($new_password);
		$get_check="SELECT * FROM `lt_master_user_system` WHERE `u_slno`='$u_slno'";
		$sql_check=mysqli_query($conn,$get_check);
		$num_rows=mysqli_num_rows($sql_check);
		if($num_rows=='1'){
			$result=mysqli_fetch_assoc($sql_check);
			$user_pass=$result['user_pass'];
			if($user_pass==$old_password_hash){
				$query="UPDATE `lt_master_user_system` SET `user_pass`='$new_password_hash',`password`='$new_password' WHERE`u_slno`='$u_slno'";
				$sql_exe_insert=mysqli_query($conn,$query);
				$msg->success('Password Successfull Update Please Login Again');
				header('Location:logout.php');
					exit;
			}else{
				$msg->error('Old Password Mismatch');
				header('Location:index.php');
				exit;
			}

			
		}else{
			$msg->error('Old Password Mismatch');
			header('Location:logout.php');
			exit;
		}


 }else{
 	header('Location:logout.php');
	exit;
 }