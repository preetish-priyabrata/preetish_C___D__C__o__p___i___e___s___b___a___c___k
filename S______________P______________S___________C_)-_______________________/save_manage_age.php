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
	
	$icage= test_input($_REQUEST['icage']);
	$tsage= test_input($_REQUEST['tsage']);
	$urage= test_input($_REQUEST['urage']);
	$rcage= test_input($_REQUEST['rcage']);
	
	
	
	//insert into "age_master_data" table
	$qry="INSERT INTO `age_master_data`(`slno`, `inservice_candidates`, `temporary_service`, `unreserved`, `reserved`, `datetime_of_updation`) VALUES (NULL, '$icage', '$tsage', '$urage', '$rcage', NOW())";
	
	$res= mysqli_query($conn, $qry);
	if($res)
	{
	 $_SESSION['enqi_success'] = 1;
    session_write_close();
    header("Location:manage_age.php");
    exit;
	}
	else
	{
		$_SESSION['enqi_error'] = 1;
		session_write_close();
    header("Location:manage_age.php");
    exit;
	}
}
$contents = ob_get_contents();
ob_clean();

include_once'template.php';
?>