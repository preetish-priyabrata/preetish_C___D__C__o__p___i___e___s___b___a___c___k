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
	$exam1= test_input($_REQUEST['exam1']);
	$appno1= test_input($_REQUEST['appno1']);
	$c_name= test_input($_REQUEST['c_name']);
	$c_photo= test_input($_FILES['c_photo']);
	$c_f_name= test_input($_REQUEST['c_f_name']);
	$c_h_name= test_input($_REQUEST['c_h_name']);
	$gender= test_input($_REQUEST['gender']);
	$c_dob= test_input($_REQUEST['c_dob']);
	$c_age= test_input($_REQUEST['c_age']);
	$c_pob_vill= test_input($_REQUEST['c_pob_vill']);
	$c_pob_city= test_input($_REQUEST['c_pob_city']);
	$c_pob_dist= test_input($_REQUEST['c_pob_dist']);
	$c_pob_state= test_input($_REQUEST['c_pob_state']);
	$c_ca_add= test_input($_REQUEST['c_ca_add']);
	$c_ca_city= test_input($_REQUEST['c_ca_city']);
	$c_ca_dist= test_input($_REQUEST['c_ca_dist']);
	$c_ca_pin= test_input($_REQUEST['c_ca_pin']);
	$c_ca_phno= test_input($_REQUEST['c_ca_phno']);
	$c_ca_mob= test_input($_REQUEST['c_ca_mob']);
	$c_pa_add= test_input($_REQUEST['c_pa_add']);
	$c_pa_city= test_input($_REQUEST['c_pa_city']);
	$c_pa_dist= test_input($_REQUEST['c_pa_dist']);
	$c_pa_pin= test_input($_REQUEST['c_pa_pin']);
	$c_pa_phno= test_input($_REQUEST['c_pa_phno']);
	$c_pa_mob= test_input($_REQUEST['c_pa_mob']);
	$c_email= test_input($_REQUEST['c_email']);
	$c_cat= test_input($_REQUEST['c_cat']);
	$c_bpl_cert_no= test_input($_REQUEST['c_bpl_cert_no']);
	$c_bpl_iss_aut= test_input($_REQUEST['c_bpl_iss_aut']);
	$c_bpl_iss_dt= test_input($_REQUEST['c_bpl_iss_dt']);
	$oth_cat= test_input($_REQUEST['oth_cat']);
	$c_sc_id_no= test_input($_REQUEST['c_sc_id_no']);
	$c_sc_iss_aut= test_input($_REQUEST['c_sc_iss_aut']);
	$c_sc_dist= test_input($_REQUEST['c_sc_dist']);
	$c_emp_card_no= test_input($_REQUEST['c_emp_card_no']);
	
	$path_photo = "uploads/candidate_photos/";
	$photo = time().$_FILES['c_photo']['name'];
	$tmp_photo = $_FILES['c_photo']['tmp_name'];
	$move_photo = move_uploaded_file($tmp_photo,$path_photo.$photo);
	
	$qry_check_appno="SELECT * FROM `candidate_application_info` WHERE `candidate_email`='$_SESSION[cand_user]' And `application_no`='$appno1' ";
	$sql_check_appno=mysqli_query($conn, $qry_check_appno);
	$num_rows=mysqli_num_rows($sql_check_appno);
	
	
	if($num_rows==0){
		$qry_insert_appno="INSERT INTO `candidate_application_info`(`slno`, `candidate_email`, `category`, `application_no`, `exam_name`) VALUES (NULL, '$_SESSION[cand_user]', '$c_cat', '$appno1', '$exam1')";	
	}else{
		$qry_insert_appno="UPDATE `candidate_application_info` SET `category`='$c_cat' WHERE `candidate_email`='$_SESSION[cand_user]'";		
	}
	$sql_insert_appno=mysqli_query($conn, $qry_insert_appno);
	if($sql_insert_appno){
		$qry_check_personal="SELECT * FROM `candidate_personal_details` WHERE  `application_no`='$appno1' ";
		$sql_check_personal=mysqli_query($conn, $qry_check_personal);
		$num_rows_personal=mysqli_num_rows($sql_check_personal);
		
		if($num_rows_personal==0){
			//insert into "candidate_personal_details" table
			$qry="INSERT INTO `candidate_personal_details`(`slno`, `candidate_id`, `candidate_name`, `father's_name`, `husband's_name`, `gender`, `dob`, `age`, `pob_village`, `pob_city`, `pob_district`, `pob_state`, `ca_address`, `ca_city`, `ca_district`, `ca_pincode`, `ca_phoneno`, `ca_mobno`, `pa_address`, `pa_city`, `pa_district`, `pa_pincode`, `pa_phoneno`, `pa_mobno`, `email_id`, `category`, `bpl_certificate_no`, `bpl_issuing_authority`, `bpl_issue_date`, `other_category`, `sikkim_certificate_id_no`, `sikkim_certificate_issuing_authority`, `sikkim_certificate_district`, `employee_card_no`, `candidate_photo`, `application_no`) VALUES (NULL, '$res_login[candidate_id]', '$c_name', '$c_f_name', '$c_h_name', '$gender', '$c_dob', '$c_age', '$c_pob_vill', '$c_pob_city', '$c_pob_dist', '$c_pob_state', '$c_ca_add', '$c_ca_city', '$c_ca_dist', '$c_ca_pin', '$c_ca_phno', '$c_ca_mob', '$c_pa_add', '$c_pa_city', '$c_pa_dist', '$c_pa_pin', '$c_pa_phno', '$c_pa_mob', '$c_email', '$c_cat', '$c_bpl_cert_no', '$c_bpl_iss_aut', '$c_bpl_iss_dt', '$oth_cat', '$c_sc_id_no', '$c_sc_iss_aut', '$c_sc_dist', '$c_emp_card_no', '$photo', '$appno1')";

			$res= mysqli_query($conn, $qry);
			
			if($res){
				$qry_check_status="SELECT * FROM `candidate_application_submit_info` WHERE `candidate_email`='$_SESSION[cand_user]' And `application_no`='$appno1'";
				$sql_check_status=mysqli_query($conn, $qry_check_status);
				$res_check_status=mysqli_fetch_array($sql_check_status);
				$row_no=mysqli_num_rows($sql_check_status);
				if($row_no==0){
					$qry_submit_status="INSERT INTO `candidate_application_submit_info`(`slno`, `candidate_email`, `application_no`, `personal_info_submtd`) VALUES (NULL, '$_SESSION[cand_user]', '$appno1', 'yes')";
				}else{
					$qry_submit_status="UPDATE `candidate_application_submit_info` SET `personal_info_submtd`='yes' WHERE `application_no`='$appno1'";
				}
				$res_status=mysqli_query($conn, $qry_submit_status);
				if($res_status)	{
					$msg->success('Personal Information Success-Fully Saved');
					header("Location:application_form.php#Educational");
					exit;
				}else{
					$msg->warning('Personal Information Unable To Update Please Try Again !!!');
					header("Location:application_form.php#Personal");
					exit;
				}
			}
		}else{
			$msg->success('Personal Information Success-Fully Saved');
			header("Location:application_form.php#Educational");
			exit;
		}
	}
	
	
	
}

?>