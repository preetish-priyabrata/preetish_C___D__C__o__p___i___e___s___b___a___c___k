<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
if($_SESSION['preexam_user']){
	
	
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
	$qry_chk_status="SELECT * FROM `exam_master_data` WHERE `examname`='$exam' AND `roll_prefix_status`='0'";
	$sql_chk_status=mysqli_query($conn, $qry_chk_status);
	$num_chk_status=mysqli_num_rows($sql_chk_status);
	if($num_chk_status==1){
		$qry_check_appno="SELECT * FROM `candidate_application_info` WHERE `exam_name`='$exam' AND `application_submitted`='yes' AND `application_verification_officer`='1' AND `roll_gen_status`='0'";
		$sql_check_appno=mysqli_query($conn, $qry_check_appno);
		$num_rows=mysqli_num_rows($sql_check_appno);
		if($num_rows!=0){
			$i=0000;
			while($res_app=mysqli_fetch_array($sql_check_appno)){
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
				$qry="INSERT INTO `pre_exam_candidate`(`slno`, `candidate_email`, `category`, `application_no`, `exam_name`, `roll_no`) VALUES (NULL, '$res_app[candidate_email]','$res_app[category]','$res_app[application_no]','$exam','$rollno')";
				$sql_gen_roll=mysqli_query($conn, $qry);
				
				$qry_gen_roll="UPDATE `candidate_application_info` SET `roll_gen_status`='1' WHERE `application_no`='$res_app[application_no]'";
				$sql_gen_rolls=mysqli_query($conn, $qry_gen_roll);
				
			}
			$qry_statuss="INSERT INTO `preexam_rollno_status`(`slno`, `exam_name`, `rollno_prefix`, `rollno_status`) VALUES (NULL, '$exam', '$rlno_prefix', '1')";
			$sql_statuss=mysqli_query($conn, $qry_statuss);
			$qry_status="UPDATE `exam_master_data` SET `roll_prefix_status`='1' WHERE `examname`='$exam'";
			$sql_status=mysqli_query($conn, $qry_status);
			if($sql_status){
				$msg->success('Success-Fully Generated Roll No');
				header("location:pe_generate_rollno.php");
				exit;
			}else{
				$msg->warning('Unable To Generated Roll No Try Again !!!');	
				header("location:pe_generate_rollno.php");
				exit;
			}

		}else{
			// no one is verified till now after verification come here to generated the rool no
			$msg->warning('No One Is Verified Till Now After Verification Come Here To Generated The Roll No For '.$exam);	
			header("location:pe_generate_rollno.php");
			exit;
		}

	}else{
		$msg->warning('NO Such Exam Is Present  '.$exam);
		header("location:pe_generate_rollno.php");
		exit;

	}


}
ob_clean();
?>
	