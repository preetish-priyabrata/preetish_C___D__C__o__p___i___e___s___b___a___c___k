<?php

// print_r($_POST);
session_start();
ob_start();
if($_SESSION['admin_emails']){
require 'FlashMessages.php';
require 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
// Array ( [id] => 2 [Desigination_name] => DEMO [user_name] => District Officer 1 [user_email] => district@ilab.com [user_mobile] => 97760698810 [user_alt_mobile] => [user_id] => district@ilab.com ) 
$id=$_POST['id'];
$user_mobile=$_POST['user_mobile'];
  $query="UPDATE `rhc_master_login_user` SET`user_mobile`='$user_mobile' WHERE `slno`='$id'";
  $sql_exe=mysqli_query($conn,$query);
  if($sql_exe)	{
		$msg->success('User Mobile No Is changed ');
 		header("location:admin_dashboard.php");
		exit;
	}else{
		$msg->error('Something Went Wrong Please Try It Again');
 		header("location:admin_dashboard.php");
		exit;
	}
// 
}else{
  header('Location:logout.php');
  exit;
}