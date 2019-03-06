<?php
error_reporting(0);
session_start();
include "config.php";
if($_SESSION['cand_user']){
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
	$exam3= test_input($_REQUEST['exam3']);
	$appno3= test_input($_REQUEST['appno3']);
	$emp_card_no= test_input($_REQUEST['emp_card_no']);
	$emp_card_iss_aut= test_input($_REQUEST['emp_card_iss_aut']);
	$emp_card_dist= test_input($_REQUEST['emp_card_dist']);
	$wh_emp= test_input($_REQUEST['wh_emp']);
	$noe= test_input($_REQUEST['noe']);
	$emp_dep= test_input($_REQUEST['emp_dep']);
	$age_rel= test_input($_REQUEST['age_rel']);
	$opp_name= test_input($_REQUEST['opp_name']);
	
	if(!empty($_FILES['noc_certifcate']['name'])){
		$path_c_photo = "uploads/candidate_noc/";
		$c_photo_name =$appno3.'-'.date('dmY').time().$_FILES['noc_certifcate']['name'];
		$c_photo_tmp = $_FILES['noc_certifcate']['tmp_name'];
		//unlink("uploads/candidate_photos/".$_REQUEST['upd_photo']);
		$move_c_photo = move_uploaded_file($c_photo_tmp,$path_c_photo.$c_photo_name);	
	}else{
		$c_photo_name = "";	
	}
	$qry_check_appno="SELECT * FROM `candidate_application_info` WHERE `candidate_email`='$_SESSION[cand_user]' AND `application_no`='$appno3'";
	$sql_check_appno=mysqli_query($conn, $qry_check_appno);
	$num_rows=mysqli_num_rows($sql_check_appno);
	if($num_rows==0){
		$qry_insert_appno="INSERT INTO `candidate_application_info`(`slno`, `candidate_email`, `application_no`, `exam_name`) VALUES (NULL, '$_SESSION[cand_user]', '$appno3', '$exam3')";
		$sql_insert_appno=mysqli_query($conn, $qry_insert_appno);
	}
	$qry_check_employee="SELECT * FROM `candidate_employment_details` WHERE `application_no`='$appno3'";
	$sql_check_employee=mysqli_query($conn, $qry_check_employee);
	$num_rows_employee=mysqli_num_rows($sql_check_employee);
	if($num_rows_employee==0){
		//insert into "candidate_employment_details" table
		$qry="INSERT INTO `candidate_employment_details`(`slno`, `candidate_id`, `employment_card_no`, `issuing_authority`, `issue_district`, `whether_employed`, `employment_nature`, `employment_department`, `age_relaxation`, `Org_prog_proj_name`, `application_no`,`upload_noc`) VALUES(NULL, '$res_login[candidate_id]', '$emp_card_no',  '$emp_card_iss_aut', '$emp_card_dist', '$wh_emp','$noe', '$emp_dep', '$age_rel', '$opp_name', '$appno3','$c_photo_name')";		
		$res= mysqli_query($conn, $qry);
		if($res){
			$qry_check_status="SELECT * FROM `candidate_application_submit_info` WHERE `candidate_email`='$_SESSION[cand_user]'";
			$sql_check_status=mysqli_query($conn, $qry_check_status);
			$res_check_status=mysqli_fetch_array($sql_check_status);
			$row_no=mysqli_num_rows($sql_check_status);
			if($row_no==0){
				$qry_submit_status="INSERT INTO `candidate_application_submit_info`(`slno`, `candidate_email`, `application_no`, `employment_info_submtd`) VALUES (NULL, '$_SESSION[cand_user]', '$appno3', 'yes')";
			}else{
				$qry_submit_status="UPDATE `candidate_application_submit_info` SET `employment_info_submtd`='yes' WHERE `application_no`='$appno3'";
			}
			$res_status=mysqli_query($conn, $qry_submit_status);
			if($res_status){
				$msg->success('Employment Information Success-Fully Saved');
				header("Location:application_form.php#Upload");
				exit;
			}else{
				$msg->warning('Employment Information Unable To Update Please Try Again !!!');	
				header("Location:application_form.php#Employment");
				exit;
			}
		}
	}else{
		$msg->success('Employment Information Success-Fully Saved');
		header("Location:application_form.php#Upload");
		exit;
	}
	
}

?>
