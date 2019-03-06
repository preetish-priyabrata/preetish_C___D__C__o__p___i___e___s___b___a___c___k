<?php

error_reporting(0);
ob_start();
session_start();
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
include "config.php";
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
	
	$c_name= test_input($_REQUEST['c_name']);
	//$c_photo= $_FILES['c_photo'];
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
	
	if(!empty($_FILES['c_photo']['name'])){
		$path_c_photo = "uploads/candidate_photos/";
		$c_photo_name = time().$_FILES['c_photo']['name'];
		$c_photo_tmp = $_FILES['c_photo']['tmp_name'];
		unlink("uploads/candidate_photos/".$_REQUEST['upd_photo']);
		$move_c_photo = move_uploaded_file($c_photo_tmp,$path_c_photo.$c_photo_name);	
	}else{
		$c_photo_name = $_REQUEST['upd_photo'];	
	}
	
	
	//insert into "candidate_personal_details" table
	$qry="UPDATE `candidate_personal_details` SET `candidate_name`='$c_name',`father's_name`='$c_f_name',`husband's_name`='$c_h_name',`gender`='$gender',`dob`='$c_dob',`age`='$c_age',`pob_village`='$c_pob_vill',`pob_city`='$c_pob_city',`pob_district`='$c_pob_dist',`pob_state`='$c_pob_state',`ca_address`='$c_ca_add',`ca_city`='$c_ca_city',`ca_district`='$c_ca_dist',`ca_pincode`='$c_ca_pin',`ca_phoneno`='$c_ca_phno',`ca_mobno`='$c_ca_mob',`pa_address`='$c_pa_add',`pa_city`='$c_pa_city',`pa_district`='$c_pa_dist',`pa_pincode`='$c_pa_pin',`pa_phoneno`='$c_pa_phno',`pa_mobno`='$c_pa_mob',`email_id`='$c_email',`category`='$c_cat',`bpl_certificate_no`='$c_bpl_cert_no',`bpl_issuing_authority`='$c_bpl_iss_aut',`bpl_issue_date`='$c_bpl_iss_dt',`other_category`='$oth_cat',`sikkim_certificate_id_no`='$c_sc_id_no',`sikkim_certificate_issuing_authority`='$c_sc_iss_aut',`sikkim_certificate_district`='$c_sc_dist',`employee_card_no`='$c_emp_card_no',`candidate_photo`='$c_photo_name' where `application_no`='$_POST[appno]'";
	
	$res= mysqli_query($conn, $qry);
	
	if($res)
	{
	 // $_SESSION['pi_success'] = 1;
  //   session_write_close();
     $msg->success('Personal Information Success-Fully Updated');
    header('Location:edit_application.php#Personal');
   
    exit;
	}
	else
	{
		// $_SESSION['pi_error'] = 1;
		// session_write_close();
		 $msg->warning('Personal Information Unable To Update Please Try Again !!!');
    header("Location:edit_application.php#Personal");
   
    exit;
	}

}
ob_clean();
?>
