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
		$c_photo_name =$_POST['appno'].'-'.date('dmY').time().$_FILES['noc_certifcate']['name'];
		$c_photo_tmp = $_FILES['noc_certifcate']['tmp_name'];
		unlink("uploads/candidate_noc/".$_REQUEST['noc_certifcates']);
		$move_c_photo = move_uploaded_file($c_photo_tmp,$path_c_photo.$c_photo_name);	
	}else{
		$c_photo_name =$_REQUEST['noc_certifcates'];	
	}
	
	
	//insert into "candidate_employment_details" table
	$qry="UPDATE `candidate_employment_details` SET `employment_card_no`='$emp_card_no',`issuing_authority`='$emp_card_iss_aut',`issue_district`='$emp_card_dist',`whether_employed`='$wh_emp',`employment_nature`='$noe',`employment_department`='$emp_dep',`age_relaxation`='$age_rel',`Org_prog_proj_name`='$opp_name',`upload_noc`='$c_photo_name' WHERE `application_no`='$_POST[appno]'";
	
	$res= mysqli_query($conn, $qry);
	if($res)
	{
	$msg->success('Employment Information Success-Fully Updated');
    header("Location:edit_application.php#Employment");
    exit;
	}
	else
	{
	$msg->warning('Employment Information Unable To Update Please Try Again !!!');	
    header("Location:edit_application.php#Employment");
    exit;
	}

}
ob_clean();
?>
