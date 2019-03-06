<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
if($_SESSION['admin_operational_exam'])
{
	
	
	//GET DATA
	function test_input($data)
	{
		 $data = trim($data);
		 $data = stripslashes($data);
		 $data = htmlspecialchars($data);
		 return $data;
	}

			echo $admin_name=$_SESSION['admin_operational_exam'];
	
	$newpass= test_input($_REQUEST['newpass']);
	
	//insert into "user_master_data" table
	$qry="UPDATE `user_master_data` SET `password`='$newpass',`temp_pass`='$newpass',`datetime`=NOW() WHERE `userid`='$admin_name' AND `usertype`='admin operational'";
	
	$res= mysqli_query($conn,$qry);
	
	if($res){
		$msg->success('You have Change Your Password  Success-Fully ');
    	header("Location:admin_opreational_manage_change_password.php");
    	exit;
	}else{
		$msg->warning('Unable To Change Your Password Contact Tech-Admin Try Again !!!');
    	header("Location:admin_opreational_manage_change_password.php");
    	exit;
	}

}else{
	header("location:logout.php");
	exit;
}
ob_clean();
?>