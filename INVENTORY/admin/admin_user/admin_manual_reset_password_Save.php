<?php 
session_start();
if($_SESSION['admin']){
	require 'FlashMessages.php';
	require './config.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	$form_type=web_decryptIt(str_replace(" ", "+", $_REQUEST['form_type']));
 	if($form_type=='report3')
// Array ( [form_type] => S39+BJp5/9vHarwl0UQ+fOdyzQE0Kw7a7dCX0O0EXII= [u_slno] => 1 [unq_id] => user_001 [u_status] => 0 [new_password] => 12345 [get] => Update Password )
// $query="UPDATE `lt_master_user_system` SET `u_status`='1' where `u_slno`='$u_slno' AND `user_id`='$unq_id'";
 		$u_slno=$_REQUEST['u_slno'];
		$unq_id=$_REQUEST['unq_id'];
		$u_status=$_REQUEST['u_status'];
		$new_password=trim($_REQUEST['new_password']);
		$oldpassword_hash = md5($new_password);
		$query="UPDATE `lt_master_user_system` SET  `user_pass`='$oldpassword_hash',`password`='$new_password' where `u_slno`='$u_slno' AND `user_id`='$unq_id'";
		$sql_exe_insert=mysqli_query($conn,$query);
		$msg->success('User Password Successfull Update');
		header('Location:admin_add_Users_view.php');
			exit;


 }else{
 	header('Location:logout.php');
	exit;
 }