<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
if($_SESSION['user']=="admintech@gmail.com")
{	
	
	//GET DATA
	function test_input($data)
	{
		 $data = trim($data);
		 $data = stripslashes($data);
		 $data = htmlspecialchars($data);
		 return $data;
	}
	
	$ename2= test_input($_REQUEST['ename2']);
	$dep2= test_input($_REQUEST['dep2']);
	$doe2= test_input($_REQUEST['doe2']);
	$ven2= test_input($_REQUEST['ven2']);
	
	//insert into "exam_master_data" table
	$qry="UPDATE `exam_master_data` SET `exam_date`='$doe2',`venue`='$ven2',`datetime`=NOW() WHERE `examname`='$ename2' AND `department`='$dep2',";
	
	$res= mysqli_query($conn, $qry);
	if($res)
	{
	 $_SESSION['umei_success'] = 1;
    session_write_close();
    header("Location:manage_exam.php");
    exit;
	}
	else
	{
		$_SESSION['umei_error'] = 1;
		session_write_close();
    header("Location:manage_exam.php");
    exit;
	}

}
ob_clean();
?>
