<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
if($_SESSION['verification_exam'])
{
	
	
	//GET DATA
	function test_input($data)
	{
		 $data = trim($data);
		 $data = stripslashes($data);
		 $data = htmlspecialchars($data);
		 return $data;
	}

			$admin_name=$_SESSION['verification_exam'];
	
	$newpass= test_input($_REQUEST['newpass']);
	
	//insert into "user_master_data" table
	$qry="UPDATE `user_master_data` SET `password`='$newpass',`datetime`=NOW() WHERE `username`='$admin_name' AND `usertype`='verification exam'";
	
	$res= mysqli_query($conn, $qry);
	if($res){
		$msg->success('You have Change Your Password  Success-Fully ');
    	header("Location:vrf_change_password.php");
    	exit;
	}else{
		$msg->warning('Unable To Change Your Password Contact Tech-Admin Try Again !!!');
    	header("Location:vrf_change_password.php");
    	exit;
	}

}
ob_clean();
?>