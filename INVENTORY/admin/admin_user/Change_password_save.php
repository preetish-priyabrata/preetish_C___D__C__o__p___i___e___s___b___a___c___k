<?php

session_start();
if($_SESSION['admin']){
	require 'FlashMessages.php';
	require '../config.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	$form_type=web_decryptIt(str_replace(" ", "+", $_REQUEST['form_type']));
 	if($form_type=='report3')
// Array ( [form_type] => S39+BJp5/9vHarwl0UQ+fOdyzQE0Kw7a7dCX0O0EXII= [u_slno] => 1 [unq_id] => user_001 [u_status] => 0 [new_password] => 12345 [get] => Update Password )
// $query="UPDATE `lt_master_user_system` SET `u_status`='1' where `u_slno`='$u_slno' AND `user_id`='$unq_id'";
 		$old_password=$_REQUEST['old_password'];
 		$u_slno=$_REQUEST['u_slno'];
		$unq_id=$_REQUEST['unq_id'];
		$u_status=$_REQUEST['u_status'];
		$new_password=trim($_REQUEST['new_password']);
		$oldpassword_hash = md5($new_password);
		$get_check="SELECT * FROM `lt_master_admin_login` WHERE `slno`='$u_slno'";
		$sql_check=mysqli_query($conn,$get_check);
		$num_rows=mysqli_num_rows($sql_check);
		if($num_rows=='1'){
			$result=mysqli_fetch_assoc($sql_check);
			$user_pass=$result['user_pass'];
			if($user_pass==$old_password){
				$query="UPDATE `lt_master_admin_login` SET `user_pass`='$new_password' WHERE`slno`='$u_slno'";
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