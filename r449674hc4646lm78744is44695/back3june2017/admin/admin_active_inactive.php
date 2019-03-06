<?php

session_start();
ob_start();
if($_SESSION['admin_emails']){
require 'FlashMessages.php';
require 'config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();

 $id=$_REQUEST['serial'];
$act=$_REQUEST['act'];
	if($act==1){
	 	$query="UPDATE `rhc_master_login_user` SET`status`='2' WHERE `slno`='$id'";
	  	$sql_exe=mysqli_query($conn,$query);
	  	if($sql_exe)	{
			$msg->success('User Status Is Update ');
	 		header("location:admin_user_list.php");
			exit;
		}else{
			$msg->error('Something Went Wrong Please Try It Again');
	 		header("location:admin_user_list.php");
			exit;
		}
	}else{
		$query="UPDATE `rhc_master_login_user` SET`status`='1' WHERE `slno`='$id'";
	  	$sql_exe=mysqli_query($conn,$query);
	  	if($sql_exe)	{
			$msg->success('User Status Is Update');
	 		header("location:admin_user_list.php");
			exit;
		}else{
			$msg->error('Something Went Wrong Please Try It Again');
	 		header("location:admin_user_list.php");
			exit;
		}
	}

}else{
  header('Location:logout.php');
  exit;
}