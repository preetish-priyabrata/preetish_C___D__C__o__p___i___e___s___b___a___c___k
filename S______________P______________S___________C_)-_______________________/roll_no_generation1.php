<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
if($_SESSION['preexam_user'])
{
	print_r($_REQUEST);
	exit;
	//GET DATA
	function test_input($data)
	{
		 $data = trim($data);
		 $data = stripslashes($data);
		 $data = htmlspecialchars($data);
		 return $data;
	}
	$rlno_prefix= test_input($_REQUEST['rlno_prefix']);
	$exam= test_input($_REQUEST['exam']);
	
	$qry_chk_status="SELECT * FROM `preexam_rollno_status` WHERE `exam_name`='$exam' AND `rollno_status`='generated'";
	$sql_chk_status=mysqli_query($conn, $qry_chk_status);
	$num_chk_status=mysqli_num_rows($sql_chk_status);
	
	if($num_chk_status==0)
	{
		$qry_check_appno="SELECT * FROM `candidate_application_info` WHERE `exam_name`='$exam' AND `application_submitted`='yes'";
		$sql_check_appno=mysqli_query($conn, $qry_check_appno);
		$num_rows=mysqli_num_rows($sql_check_appno);
		if($num_rows!=0)
		{
			$i=0000;
			while($res_app=mysqli_fetch_array($sql_check_appno))
			{
				$i++;
				if ($i < 10) 
				{
				$n = '000'.$i;     // Prepend values smaller than 10 with a zero
				}
				else if ($i < 100) 
				{
				$n = '00'.$i;     // Prepend values smaller than 10 with a zero
				}
				else if ($i < 1000) 
				{
				$n = '0'.$i;     // Prepend values smaller than 10 with a zero
				} 
				else 
				{
				$n = $i;
				}
				
				$rollno=$rlno_prefix.$n;
				$qry_gen_roll="UPDATE `candidate_application_info` SET `roll_no`='$rollno' WHERE `application_no`='$res_app[application_no]'";
				$sql_gen_roll=mysqli_query($conn, $qry_gen_roll);
				
			}
		
			$qry_status="INSERT INTO `preexam_rollno_status`(`slno`, `exam_name`, `rollno_prefix`, `rollno_status`) VALUES (NULL, '$exam', '$rlno_prefix', 'generated')";
			$sql_status=mysqli_query($conn, $qry_status);
			if($sql_status)
			{
			header("location:pe_generate_rollno.php?msg=success");
			}
			else
			{
			header("location:pe_generate_rollno.php?msg=error1");
			}
		}
		else
		{
		header("location:pe_generate_rollno.php?msg=error2");
		}
	}
	else
	{
	header("location:pe_generate_rollno.php?msg=error3");
	}
}
ob_clean();
?>
