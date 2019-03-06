<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
if($_SESSION['cand_user']){

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
	
	$bank_rcpt_no= test_input($_REQUEST['bank_rcpt_no']);
	$pmnt_dt= test_input($_REQUEST['pmnt_dt']);
	$pmnt_amount= test_input($_REQUEST['pmnt_amount']);
	$pmnt_rcpt_doc= test_input($_FILES['pmnt_rcpt_doc']);
	
	
	if(!empty($_FILES['pmnt_rcpt_doc']['name'])){
		$path_rcpt_doc = "uploads/candidate_payment_receipt/";
		$rcpt_doc = time().$_FILES['pmnt_rcpt_doc']['name'];
		$rcpt_doc_tmp = $_FILES['pmnt_rcpt_doc']['tmp_name'];
		unlink("uploads/candidate_payment_receipt/".$_REQUEST['upd_pmnt_rcpt']);
		$move_rcpt_doc = move_uploaded_file($rcpt_doc_tmp,$path_rcpt_doc.$rcpt_doc);
	}else{
		$rcpt_doc = $_REQUEST['upd_pmnt_rcpt'];	
	}
	
	
	//insert into "candidate_payment_details" table
	$qry="UPDATE `candidate_payment_details` SET `bank_rcpt_no`='$bank_rcpt_no',`payment_dt`='$pmnt_dt',`payment_amount`='$pmnt_amount',`bank_rcpt_doc_name`='$rcpt_doc' WHERE `application_no`='$_POST[appno]'";
	
	$res= mysqli_query($conn, $qry);
	if($res){
		$msg->success('Payment Information Success-Fully Updated');
	    header("Location:edit_application.php#Payment");
	    exit;
	}else{
		$msg->warning('Payment Information Unable To Update Please Try Again !!!');	
   		header("Location:edit_application.php#Payment");
    	exit;
	}

}
ob_clean();
?>
