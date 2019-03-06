<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
if($_SESSION['adminexam_user'])
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
	
	//insert into "user_master_data" table
	$qry="UPDATE `user_master_data` SET `password`='$newpass',`datetime`=NOW() WHERE `username`='$_SESSION[adminexam_user]' AND `usertype`='admin exam'";
	
	$res= mysqli_query($conn, $qry);
	if($res)
	{
	 $_SESSION['cpi_success'] = 1;
    session_write_close();
    header("Location:adminexam_change_password.php");
    exit;
	}
	else
	{
		$_SESSION['cpi_error'] = 1;
		session_write_close();
    header("Location:adminexam_change_password.php");
    exit;
	}

}
ob_clean();
?>
