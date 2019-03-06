<?php
error_reporting(E_ALL);
ob_start();
session_start();
include "config.php";
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();

if($_SESSION['preexam_user']){
	$exam=$_REQUEST["exam"];
	$center=$_REQUEST["center_assign"];

	$qry_exam_info="SELECT * FROM `exam_master_data` WHERE `examname`='$exam'";
	$sql_exam_info=mysqli_query($conn, $qry_exam_info);
	$res_exam_info=mysqli_fetch_array($sql_exam_info);
	
	$qry="SELECT * FROM `pre_exam_roll_center` WHERE `exam_name`='$exam' AND `admit_card_status`='0' AND `center_name`='$center'";
	$sql=mysqli_query($conn, $qry);

	while($res=mysqli_fetch_array($sql)){
		

		$qry_check="SELECT * FROM `candidate_admit_card` WHERE `roll_no`='$res[roll_no]'";
		 $sql_check=mysqli_query($conn, $qry_check);
		 $num_rows=mysqli_num_rows($sql_check);
		
		if($num_rows==0){
			$qry_cand_info="SELECT * FROM `candidate_personal_details` WHERE `application_no`='$res[application_no]'";
			$sql_cand_info=mysqli_query($conn, $qry_cand_info);
			$res_cand_info=mysqli_fetch_array($sql_cand_info);

			$qry_insert="INSERT INTO `candidate_admit_card`(`slno`, `application_no`, `roll_no`, `candidate_name`, `candidate_photo`, `exam_name`, `exam_center`) VALUES (NULL, '$res[application_no]', '$res[roll_no]', '$res_cand_info[candidate_name]', '$res_cand_info[candidate_photo]', '$res[exam_name]', '$res[center_name]')";
			
			$sql_insert=mysqli_query($conn, $qry_insert);
			
			
			$qry_submit_status="UPDATE `candidate_application_info` t1, `pre_exam_roll_center` t2 SET t1.admit_status='1',  t2.admit_card_status='1'  WHERE t1.application_no='$res[application_no]' AND t1.application_no=t2.application_no";
			$sql_statuss=mysqli_query($conn, $qry_submit_status);

			if($sql_statuss){
				$qry_submit_email="SELECT * FROM `candidate_application_info` WHERE `application_no`='$res[application_no]'";
			$sql_email=mysqli_query($conn, $qry_submit_email);
			$res_email_info=mysqli_fetch_array($sql_email);
				$to = $res_email_info['candidate_email'];
				$subject = 'SPSC Download Admit Card..';
				$message = "Please download the Admit Card from website. This has reference to your application for the ".$exam." This will not be sent by post.";
				mail($to, $subject, $message);
			}

		}
	}
	
	$qry_status="UPDATE `assign_exam_center` SET `generated_admit_card`='1' WHERE `exam_name`='$exam' AND `center_name`='$center'";
			$sql_status=mysqli_query($conn, $qry_status);
			if($sql_status){
				$msg->success('Success-Fully Generated Admit Card Exam '.$exam .' For Center '.$center);
				header("location:pre_preview_admit_card.php");
				exit;
			}else{
				$msg->warning('Unable To enerated Admit Card Exam '.$exam .' For Center '.$center.' Try Again !!!');	
				header("location:pe_generate_admit_card.php");
				exit;
			}
}
ob_clean();
?>

