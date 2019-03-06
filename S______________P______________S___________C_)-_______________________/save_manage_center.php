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
	
	$ename1= test_input($_REQUEST['ename1']);
	$doe1= test_input($_REQUEST['doe1']);
	$cen1= test_input($_REQUEST['cen1']);
	$adrs1= test_input($_REQUEST['adrs1']);
	$cp1= test_input($_REQUEST['cp1']);
	$cont1= test_input($_REQUEST['cont1']);
	$eid1= test_input($_REQUEST['eid1']);
	$sc1= test_input($_REQUEST['sc1']);
	$nor1= test_input($_REQUEST['nor1']);
	
	//insert into "candidate_declaration" table
	$qry="INSERT INTO `center_master_data`(`slno`, `examname`, `exam_date`, `examcenter`, `address`, `contact_person`, `contact_no`, `emailid`, `sitting_capacity`, `no_of_rooms`, `datetime_of_updation`) VALUES (NULL, '$ename1', '$doe1', '$cen1', '$adrs1', '$cp1', '$cont1', '$eid1', '$sc1', '$nor1', NOW())";
	
	$res= mysqli_query($conn, $qry);
	if($res)
	{
	 $_SESSION['mci_success'] = 1;
    session_write_close();
    header("Location:manage_centre.php");
    exit;
	}
	else
	{
		$_SESSION['mci_error'] = 1;
		session_write_close();
    header("Location:manage_centre.php");
    exit;
	}

}
ob_clean();
?>
