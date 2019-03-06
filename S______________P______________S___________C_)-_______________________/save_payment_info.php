<?php
error_reporting(0);
session_start();
include "config.php";
if($_SESSION['cand_user'])
{
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
	$qry_login="SELECT `candidate_id` FROM `candidate_login_info` WHERE `emailid`='$_SESSION[cand_user]'";
	$sql_login=mysqli_query($conn, $qry_login);
	$res_login=mysqli_fetch_array($sql_login);
	
	//GET DATA
	function test_input($data)
	{
		 $data = trim($data);
		 $data = stripslashes($data);
		 $data = htmlspecialchars($data);
		 return $data;
	}
	$exam5= test_input($_REQUEST['exam5']);
	$appno5= test_input($_REQUEST['appno5']);
	$bank_rcpt_no= test_input($_REQUEST['bank_rcpt_no']);
	$pmnt_dt= test_input($_REQUEST['pmnt_dt']);
	$pmnt_amount= test_input($_REQUEST['pmnt_amount']);
	$pmnt_rcpt_doc= test_input($_FILES['pmnt_rcpt_doc']);
	
	$path_rcpt_doc = "uploads/candidate_payment_receipt/";
	$rcpt_doc = time().$_FILES['pmnt_rcpt_doc']['name'];
	$tmp_rcpt_doc = $_FILES['pmnt_rcpt_doc']['tmp_name'];
	$move_rcpt_doc = move_uploaded_file($tmp_rcpt_doc,$path_rcpt_doc.$rcpt_doc);
	
	$qry_check_appno="SELECT * FROM `candidate_application_info` WHERE `candidate_email`='$_SESSION[cand_user]' AND `application_no`='$appno5' ";
	$sql_check_appno=mysqli_query($conn, $qry_check_appno);
	$num_rows=mysqli_num_rows($sql_check_appno);
	if($num_rows==0)
	{
		$qry_insert_appno="INSERT INTO `candidate_application_info`(`slno`, `candidate_email`, `application_no`, `exam_name`) VALUES (NULL, '$_SESSION[cand_user]', '$appno5', '$exam5')";
		$sql_insert_appno=mysqli_query($conn, $qry_insert_appno);
	}
	$qry_check_payment="SELECT * FROM `candidate_payment_details#Payment` WHERE `application_no`='$appno5'";
	$sql_check_payment=mysqli_query($conn, $qry_check_payment);
	$num_rows_payment=mysqli_num_rows($sql_check_payment);
	if($sql_check_payment==0){
		//insert into "candidate_payment_details" table
		$qry="INSERT INTO `candidate_payment_details`(`slno`, `candidate_id`, `bank_rcpt_no`, `payment_dt`, `payment_amount`, `bank_rcpt_doc_name`, `application_no`) VALUES (NULL, '$res_login[candidate_id]', '$bank_rcpt_no', '$pmnt_dt', '$pmnt_amount', '$rcpt_doc', '$appno5')";	
		$res= mysqli_query($conn, $qry);
		if($res){
			$qry_check_status="SELECT * FROM `candidate_application_submit_info` WHERE `candidate_email`='$_SESSION[cand_user]'";
			$sql_check_status=mysqli_query($conn, $qry_check_status);
			$res_check_status=mysqli_fetch_array($sql_check_status);
			$row_no=mysqli_num_rows($sql_check_status);
			if($row_no==0){
				$qry_submit_status="INSERT INTO `candidate_application_submit_info`(`slno`, `candidate_email`, `application_no`, `payment_info_submtd`) VALUES (NULL, '$_SESSION[cand_user]', '$appno5', 'yes')";
			}else{
				$qry_submit_status="UPDATE `candidate_application_submit_info` SET `payment_info_submtd`='yes' WHERE `application_no`='$appno5'";
			}
			$res_status=mysqli_query($conn, $qry_submit_status);
			if($res_status){
				$msg->success('Payment Information Success-Fully Saved');
				header("Location:application_form.php#Declaration");
				exit;
			}else{
				$msg->warning('Payment Information Unable To Update Please Try Again !!!');
				header("Location:application_form.php#Payment");
				exit;
			}
		}
	}else{
		$msg->success('Payment Information Success-Fully Saved');
		header("Location:application_form.php#Declaration");
		exit;
	}

	

}
?>
