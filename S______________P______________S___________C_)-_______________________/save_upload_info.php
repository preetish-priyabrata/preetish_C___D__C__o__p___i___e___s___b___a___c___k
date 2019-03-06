<?php
error_reporting(0);
session_start();
include "config.php";
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
if($_SESSION['cand_user'])
{
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
	// echo "<pre>";
	// print_r($_FILES);
	// print_r($_REQUEST);
	// exit();
	$exam4= test_input($_REQUEST['exam4']);
	$appno4= test_input($_REQUEST['appno4']);
	$cert_sl_no1= test_input($_REQUEST['cert_sl_no1']);
	$cert_sl_no2= test_input($_REQUEST['cert_sl_no2']);
	$cert_sl_no3= test_input($_REQUEST['cert_sl_no3']);
	$cert_sl_no4= test_input($_REQUEST['cert_sl_no4']);
	$cert_sl_no5= test_input($_REQUEST['cert_sl_no5']);
	//$cert_sl_no6= test_input($_REQUEST['cert_sl_no6']);
	$cert_iss_aut1= test_input($_REQUEST['cert_iss_aut1']);
	$cert_iss_aut2= test_input($_REQUEST['cert_iss_aut2']);
	$cert_iss_aut3= test_input($_REQUEST['cert_iss_aut3']);
	$cert_iss_aut4= test_input($_REQUEST['cert_iss_aut4']);
	$cert_iss_aut5= test_input($_REQUEST['cert_iss_aut5']);
	//$cert_iss_aut6= test_input($_REQUEST['cert_iss_aut6']);
	$cert_name1= test_input($_FILES['cert_name1']);
	$cert_name2= test_input($_FILES['cert_name2']);
	$cert_name3= test_input($_FILES['cert_name3']);
	$cert_name4= test_input($_FILES['cert_name4']);
	$cert_name5= test_input($_FILES['cert_name5']);
	//$cert_name6= test_input($_FILES['cert_name6']);
	
	if(!empty($_FILES['cert_name1']['name'])){
		$path_c_name1 = "uploads/certificates/obc_bl_pt_st_sc_certificate/";
		$c_name1 = $appno4."-".date('dmy').'-'.time().$_FILES['cert_name1']['name'];
		$tmp_c_name1 = $_FILES['cert_name1']['tmp_name'];
		$move_c_name1 = move_uploaded_file($tmp_c_name1,$path_c_name1.$c_name1);
	}else{
		$c_name1="";
	}
	if(!empty($_FILES['cert_name2']['name'])){
		$path_c_name2 = "uploads/certificates/Sikkim_Certificate_of_Identification/";
		$c_name2 = $appno4."-".date('dmy').'-'.time().$_FILES['cert_name2']['name'];
		$tmp_c_name2 = $_FILES['cert_name2']['tmp_name'];
		$move_c_name2 = move_uploaded_file($tmp_c_name2,$path_c_name2.$c_name2);
	}else{
		$c_name2="";
	}
	if(!empty($_FILES['cert_name3']['name'])){
		$path_c_name3 = "uploads/certificates/candidates_COI/";
		$c_name3 = $appno4."-".date('dmy').'-'.time().$_FILES['cert_name3']['name'];
		$tmp_c_name3 = $_FILES['cert_name3']['tmp_name'];
		$move_c_name3 = move_uploaded_file($tmp_c_name3,$path_c_name3.$c_name3);
	}else{
		$c_name3="";

	}
	
	if(!empty($_FILES['cert_name4']['name'])){	
		$path_c_name4 = "uploads/certificates/ESM_SPEA_PWD_certificates/";
		$c_name4 = $appno4."-".date('dmy').'-'.time().$_FILES['cert_name4']['name'];
		$tmp_c_name4 = $_FILES['cert_name4']['tmp_name'];
		$move_c_name4 = move_uploaded_file($tmp_c_name4,$path_c_name4.$c_name4);
	}else{
		$c_name4="";
	}
	if(!empty($_FILES['cert_name5']['name'])){
		$path_c_name5 = "uploads/certificates/Marriage_certificates/";
		$c_name5 = $appno4."-".date('dmy').'-'.time().$_FILES['cert_name5']['name'];
		$tmp_c_name5 = $_FILES['cert_name5']['tmp_name'];
		$move_c_name5 = move_uploaded_file($tmp_c_name5,$path_c_name5.$c_name5);
	}else{
		$c_name5="";
	}
	
	$qry_check_appno="SELECT * FROM `candidate_application_info` WHERE `candidate_email`='$_SESSION[cand_user]' AND `application_no`='$appno4'";
	$sql_check_appno=mysqli_query($conn, $qry_check_appno);
	$num_rows=mysqli_num_rows($sql_check_appno);
	if($num_rows==0)
	{
		$qry_insert_appno="INSERT INTO `candidate_application_info`(`slno`, `candidate_email`, `application_no`, `exam_name`) VALUES (NULL, '$_SESSION[cand_user]', '$appno4', '$exam4')";
		$sql_insert_appno=mysqli_query($conn, $qry_insert_appno);
	}
	$qry_check_upload="SELECT * FROM `candidate_certificate_uploads` WHERE `application_no`='$appno4'";
	$sql_check_upload=mysqli_query($conn, $qry_check_upload);
	$num_rows_upload=mysqli_num_rows($sql_check_upload);
	if($num_rows_upload==0){
				//insert into "candidate_personal_details" table
		$qry="INSERT INTO `candidate_certificate_uploads`(`slno`, `candidate_id`, `obc/bl/pt/st/sc_certificate_sl_no`, `obc/bl/pt/st/sc_certificate_issuing_authority`, `obc/bl/pt/st/sc_certificate_name`, `sikkim_coi_sl_no`, `sikkim_coi_issuing_authority`, `sikkim_coi_name`, `candidates_coi_sl_no`, `candidates_coi_issuing_authority`, `candidates_coi_name`, `esm/spea/pwd_sl_no`, `esm/spea/pwd_issuing_authority`, `esm/spea/pwd_name`, `mrg_certificate_sl_no`, `mrg_certificate_issuing_authority`, `mrg_certificate_name`, `application_no`) VALUES (NULL, '$res_login[candidate_id]', '$cert_sl_no1', '$cert_iss_aut1', '$c_name1', '$cert_sl_no2', '$cert_iss_aut2', '$c_name2', '$cert_sl_no3', '$cert_iss_aut3', '$c_name3', '$cert_sl_no4', '$cert_iss_aut4', '$c_name4', '$cert_sl_no5', '$cert_iss_aut5', '$c_name5', '$appno4')";
		
		$res= mysqli_query($conn, $qry);
		if($res){
			$qry_check_status="SELECT * FROM `candidate_application_submit_info` WHERE `candidate_email`='$_SESSION[cand_user]'";
			$sql_check_status=mysqli_query($conn, $qry_check_status);
			$res_check_status=mysqli_fetch_array($sql_check_status);
			$row_no=mysqli_num_rows($sql_check_status);
			if($row_no==0){
				$qry_submit_status="INSERT INTO `candidate_application_submit_info`(`slno`, `candidate_email`, `application_no`, `certificate_info_submtd`) VALUES (NULL, '$_SESSION[cand_user]', '$appno4', 'yes')";
			}else{
				$qry_submit_status="UPDATE `candidate_application_submit_info` SET `certificate_info_submtd`='yes' WHERE `application_no`='$appno4'";
			}
			$res_status=mysqli_query($conn, $qry_submit_status);
			if($res_status){
				$msg->success('certificates Information Success-Fully Saved');
				header("Location:application_form.php#Payment");
				exit;
			}else{
				$msg->warning('certificates Information Unable To Update Please Try Again !!!');
				header("Location:application_form.php#Upload");
				exit;
			}
		}
	}else{
		$msg->success('certificates Information Success-Fully Saved');
		header("Location:application_form.php#Payment");
		exit;
	}


}
?>
