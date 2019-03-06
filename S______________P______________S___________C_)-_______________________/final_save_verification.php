<?php
error_reporting(0);
session_start();
include "config.php";
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();

if($_SESSION['final_verification_exam']){
	//
	$qry_email="SELECT * FROM `candidate_application_info` where `application_no`='$_POST[application_no]'";
			$sql_qry_email=mysqli_query($conn,$qry_email);
			$rest=mysqli_fetch_array($sql_qry_email);
			$email=$rest['candidate_email'];
		$date=date('Y-m-d');
	if(isset($_POST['conform'])){
		$qry_check="SELECT * FROM `candidate_application_verification_info` where `application_no`='$_POST[application_no]'";
		$sql_qry=mysqli_query($conn,$qry_check);
		$num_rows_check=mysqli_num_rows($sql_qry);
		
		if($num_rows_check==0){
			//insert

			$admin_name=$_SESSION['final_verification_exam'];
			$qry="INSERT INTO `candidate_application_verification_info`(`slno`, `application_no`,`candidate_email`,`personal_info_status`,`educational_info_status`,`employment_info_status`,`certificate_info_status`,`payment_info_status`,`declaration_status`,`application_status`,`approved_by_verification_info`) VALUES (NULL, '$_POST[application_no]' ,'$email','1','1','1','1','1','1','1','$admin_name')";
			$sql_qry=mysqli_query($conn,$qry);
			$qry_submit_status="UPDATE `candidate_application_info` t1, `candidate_certificate_uploads` t2, `candidate_declaration` t3, `candidate_educational_details` t4, `candidate_employment_details` t5, `candidate_payment_details` t6, `candidate_personal_details` t7 SET t1.application_verification_officer='1',t1.date_of_verification='$date', t1.application_verified_officer='$admin_name', t2.certificate_verif_status='1', t3.declaration_verif_status='1',t4.educational_verif_status='1',t5.employment_verif_status='1',t6.payment_verif_status='1',t7.personal_verif_status='1'  WHERE t1.application_no='$_POST[application_no]' AND t1.application_no=t2.application_no AND t1.application_no=t3.application_no AND t1.application_no=t4.application_no AND t1.application_no=t5.application_no AND t1.application_no=t6.application_no AND t1.application_no=t7.application_no";
		
		$res_status=mysqli_query($conn, $qry_submit_status);
		$to = $email;
		$subject = 'SPSC Application Verified Success-Fully';
		$message = "Your Appliaction Nos ".$_POST[application_no]." . Has Been Approved";
		mail($to, $subject, $message);
		$msg->success('Application Is verified Success-Fully');
		header("Location:final_vrf_verify_application.php");
		exit();
		}else{
			//update
			$admin_name=$_SESSION['final_verification_exam'];
			$qry_submit_status="UPDATE `candidate_application_verification_info` t0, `candidate_application_info` t1, `candidate_certificate_uploads` t2, `candidate_declaration` t3, `candidate_educational_details` t4, `candidate_employment_details` t5, `candidate_payment_details` t6, `candidate_personal_details` t7 SET t0.personal_info_status='1',t0.educational_info_status='1',t0.employment_info_status='1',t0.certificate_info_status='1',t0.payment_info_status='1',t0.declaration_status='1',t0.application_status='1',t0.approved_by_verification_info='$admin_name', t1.application_verification_officer='1',t1.date_of_verification='$date', t1.application_verified_officer='$admin_name' , t2.certificate_verif_status='1', t3.declaration_verif_status='1',t4.educational_verif_status='1',t5.employment_verif_status='1',t6.payment_verif_status='1',t7.personal_verif_status='1'  WHERE t0.application_no='$_POST[application_no]' AND t1.application_no='$_POST[application_no]' AND t1.application_no=t2.application_no AND t1.application_no=t3.application_no AND t1.application_no=t4.application_no AND t1.application_no=t5.application_no AND t1.application_no=t6.application_no AND t1.application_no=t7.application_no";
			$to = $email;
			$subject = 'SPSC Application Verified Success-Fully';
			$message = "Your Appliaction Nos ".$_POST[application_no]." . Has Been Approved";
			mail($to, $subject, $message);
			$sql_qry=mysqli_query($conn,$qry_submit_status);
			
		$msg->success('Application Is verified Success-Fully');
		header("Location:final_vrf_verify_application.php");
		exit();
		}
	}
	if(isset($_POST['rejected'])){

		
			$admin_name=$_SESSION['verification_exam'];
		
		$date=date('Y-m-d');

		$qry_submit_status="UPDATE `candidate_application_info` t1, `candidate_certificate_uploads` t2, `candidate_declaration` t3, `candidate_educational_details` t4, `candidate_employment_details` t5, `candidate_payment_details` t6, `candidate_personal_details` t7 SET t1.application_verification_officer='5',t1.date_of_verification='$date', t1.application_verified_officer='$admin_name', t1.rejected_reason='$_POST[reason]' , t2.certificate_verif_status='5', t3.declaration_verif_status='5',t4.educational_verif_status='5',t5.employment_verif_status='5',t6.payment_verif_status='5',t7.personal_verif_status='5'  WHERE t1.application_no='$_POST[application_no]' AND t1.application_no=t2.application_no AND t1.application_no=t3.application_no AND t1.application_no=t4.application_no AND t1.application_no=t5.application_no AND t1.application_no=t6.application_no AND t1.application_no=t7.application_no";
		
		$res_status=mysqli_query($conn, $qry_submit_status);
		$to = $email;
		$subject = 'SPSC Application Rejected ';
		$message = "Your Appliaction Nos ".$_POST[application_no]." . Has Been Rejected";
		mail($to, $subject, $message);
		if($res_status){
			$msg->success('Application No :-  '.$_REQUEST['application_no'].' Is Rejected Success-Fully');
			header("Location:final_vrf_verify_application.php");
			exit;
			
		}else{			
			header("Location:final_vrf_verify_application.php");
			exit;
		}
	}

}else{
	header('location:logout.php');
}
?>