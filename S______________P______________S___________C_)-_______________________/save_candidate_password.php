<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";

require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
if($_SESSION['cand_user'])
{
	
	
	//GET DATA
	function test_input($data)
	{
		 $data = trim($data);
		 $data = stripslashes($data);
		 $data = htmlspecialchars($data);
		 return $data;
	}
	
	$newpass= test_input($_REQUEST['newpass']);
	
	//insert into "candidate_login_info" table
	$qry="UPDATE `candidate_login_info` SET `password`='$newpass',`cp_date_time`=NOW() WHERE `emailid`='$_SESSION[cand_user]'";
	
	$res= mysqli_query($conn, $qry);
	if($res){
		$msg->success('Your Password Is Change  Success-Fully ');
	    header("Location:change_password.php");
	    exit;
	}else{
		$msg->warning('Your Password Is   Unable To Change  Please Try Again !!!');
	    header("Location:change_password.php");
	    exit;
	}

}
ob_clean();
?>
