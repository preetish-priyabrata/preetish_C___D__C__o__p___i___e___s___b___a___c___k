<?php
error_reporting(0);
ob_start();
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
	
	$cert_sl_no1= test_input($_REQUEST['cert_sl_no1']);
	$cert_sl_no2= test_input($_REQUEST['cert_sl_no2']);
	$cert_sl_no3= test_input($_REQUEST['cert_sl_no3']);
	$cert_sl_no4= test_input($_REQUEST['cert_sl_no4']);
	$cert_sl_no5= test_input($_REQUEST['cert_sl_no5']);
	$cert_sl_no6= test_input($_REQUEST['cert_sl_no6']);
	$cert_iss_aut1= test_input($_REQUEST['cert_iss_aut1']);
	$cert_iss_aut2= test_input($_REQUEST['cert_iss_aut2']);
	$cert_iss_aut3= test_input($_REQUEST['cert_iss_aut3']);
	$cert_iss_aut4= test_input($_REQUEST['cert_iss_aut4']);
	$cert_iss_aut5= test_input($_REQUEST['cert_iss_aut5']);
	$cert_iss_aut6= test_input($_REQUEST['cert_iss_aut6']);
		
	if(!empty($_FILES['cert_name1']['name'])){

		$path_c_name1 = "uploads/certificates/obc_bl_pt_st_sc_certificate/";
		$upld_cert_name1 = time().$_FILES['cert_name1']['name'];
		$tmp_c_name1 = $_FILES['cert_name1']['tmp_name'];
		unlink("uploads/certificates/obc_bl_pt_st_sc_certificate/".$_REQUEST['upd_cert_name1']);
		$move_c_name1 = move_uploaded_file($tmp_c_name1,$path_c_name1.$upld_cert_name1);	

	}else{

		$upld_cert_name1 = $_REQUEST['upd_cert_name1'];	

	}
	
	
	if(!empty($_FILES['cert_name2']['name'])){

		$path_c_name2 = "uploads/certificates/Sikkim_Certificate_of_Identification/";
		$upld_cert_name2 = $_POST['appno']."-".date('dmy').'-'.time().$_FILES['cert_name2']['name'];
		$tmp_c_name2 = $_FILES['cert_name2']['tmp_name'];
			unlink("uploads/certificates/Sikkim_Certificate_of_Identification/".$_REQUEST['upd_cert_name2']);
		$move_c_name2 = move_uploaded_file($tmp_c_name2,$path_c_name2.$upld_cert_name2);

	}else{

		$upld_cert_name2 = $_REQUEST['upd_cert_name2'];	

	}
		
	if(!empty($_FILES['cert_name3']['name'])){

		$path_c_name3 ="uploads/certificates/candidates_COI/";
		$upld_cert_name3 = $_POST['appno']."-".date('dmy').'-'.time().$_FILES['cert_name3']['name'];
		$tmp_c_name3 = $_FILES['cert_name3']['tmp_name'];
			unlink("uploads/certificates/candidates_COI/".$_REQUEST['upd_cert_name3']);
		$move_c_name3 = move_uploaded_file($tmp_c_name3,$path_c_name3.$upld_cert_name3);
	}else{

		$upld_cert_name3 = $_REQUEST['upd_cert_name3'];	

	}
	
	if(!empty($_FILES['cert_name4']['name'])){

		$path_c_name4 = "uploads/certificates/ESM_SPEA_PWD_certificates/";
		$upld_cert_name4 = $_POST['appno']."-".date('dmy').'-'.time().$_FILES['cert_name4']['name'];
		$tmp_c_name4 = $_FILES['cert_name4']['tmp_name'];
		unlink("uploads/certificates/candidates_fathers_COI/".$_REQUEST['upd_cert_name4']);
		$move_c_name4 = move_uploaded_file($tmp_c_name4,$path_c_name4.$upld_cert_name4);
	}else{

		$upld_cert_name4 = $_REQUEST['upd_cert_name4'];	

	}
	
	if(!empty($_FILES['cert_name5']['name'])){

		
		$path_c_name5 ="uploads/certificates/Marriage_certificates/";
		$upld_cert_name5 = $_POST['appno']."-".date('dmy').'-'.time().$_FILES['cert_name5']['name'];
		$tmp_c_name5 = $_FILES['cert_name5']['tmp_name'];
		unlink("uploads/certificates/ESM_SPEA_PWD_certificates/".$_REQUEST['upd_cert_name5']);
		$move_c_name5 = move_uploaded_file($tmp_c_name5,$path_c_name5.$upld_cert_name5);

	}else{

		$upld_cert_name5 = $_REQUEST['upd_cert_name5'];	

	}
	
	
	
	
	
	//insert into "candidate_certificate_uploads" table
	$qry="UPDATE `candidate_certificate_uploads` SET `obc/bl/pt/st/sc_certificate_sl_no`='$cert_sl_no1',`obc/bl/pt/st/sc_certificate_issuing_authority`='$cert_iss_aut1',`obc/bl/pt/st/sc_certificate_name`='$upld_cert_name1',`sikkim_coi_sl_no`='$cert_sl_no2',`sikkim_coi_issuing_authority`='$cert_iss_aut2',`sikkim_coi_name`='$upld_cert_name2',`candidates_coi_sl_no`='$cert_sl_no3',`candidates_coi_issuing_authority`='$cert_iss_aut3',`candidates_coi_name`='$upld_cert_name3',`esm/spea/pwd_sl_no`='$cert_sl_no4',`esm/spea/pwd_issuing_authority`='$cert_iss_aut4',`esm/spea/pwd_name`='$upld_cert_name4',`mrg_certificate_sl_no`='$cert_sl_no5',`mrg_certificate_issuing_authority`='$cert_iss_aut5',`mrg_certificate_name`='$upld_cert_name5' WHERE  `application_no`='$_POST[appno]'";
	
	//exit;
	$res= mysqli_query($conn, $qry);
	if($res)
	{
	$msg->success('Certificate Uploads Information Success-Fully Updated');
    header("Location:edit_application.php#Upload");
    exit;
	}
	else
	{
	$msg->warning('Certificate Uploads Information Unable To Update Please Try Again !!!');	
    header("Location:edit_application.php#Upload");
    exit;
	}

}
ob_clean();
?>
