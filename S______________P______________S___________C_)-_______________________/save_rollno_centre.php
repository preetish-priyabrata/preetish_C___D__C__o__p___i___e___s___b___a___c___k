<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
if($_SESSION['preexam_user'])
{
	//GET DATA
	function test_input($data)
	{
		 $data = trim($data);
		 $data = stripslashes($data);
		 $data = htmlspecialchars($data);
		 return $data;
	}
	$fromrollno= test_input($_REQUEST['fromrollno']);
	$torollno= test_input($_REQUEST['torollno']);
	$center= test_input($_REQUEST['center']);
	
	$qry_roll_prefix="SELECT `rollno_prefix` FROM `preexam_rollno_status` WHERE `exam_name`='$_SESSION[exam]'";
	$sql_roll_prefix=mysqli_query($conn, $qry_roll_prefix);
	$res_roll_prefix=mysqli_fetch_array($conn, $sql_roll_prefix);
	$rollno_prefix = $res_roll_prefix["rollno_prefix"];
	
	//insert into "candidate_personal_details" table
	for($i=$fromrollno-1; $i<=$torollno; $i++)
	{
		if ($i < 10) 
			{
    		$n = '000'.$i;     // Prepend values smaller than 10 with triple zero
			}
			else if ($i < 100) 
			{
    		$n = '00'.$i;     // Prepend values smaller than 100 with double zero
			}
			else if ($i < 1000) 
			{
    		$n = '0'.$i;     // Prepend values smaller than 1000 with a zero
			} 
			else 
			{
    		$n = $i;
			}
	$rollno=$rollno_prefix.$n;
	$qry="UPDATE `candidate_application_info` SET `exam_centre`='$center' WHERE `roll_no`='$rollno'";
	$res= mysqli_query($conn, $qry);
	}
	
	header("Location:pe_assign_roll_to_center.php?msg=success");
			
	
}
ob_clean();
?>