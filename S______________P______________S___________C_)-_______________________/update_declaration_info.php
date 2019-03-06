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
	
	$place= test_input($_REQUEST['place']);
	$decl_dt= test_input($_REQUEST['decl_dt']);
	$sign= test_input($_FILES['sign']);
	
	if(!empty($_FILES['sign']['name'])){
		$path_sign_img = "uploads/candidate_signature/";
		$sign_img = time().$_FILES['sign']['name'];
		$sign_img_tmp = $_FILES['sign']['tmp_name'];
		unlink("uploads/candidate_signature/".$_REQUEST['upd_sign_img']);
		$move_sign_img = move_uploaded_file($sign_img_tmp,$path_sign_img.$sign_img);	
	}else{
		$sign_img = $_REQUEST['upd_sign_img'];	
	}
	if(($_REQUEST['place']!="") && ($_REQUEST['decl_dt']!="") && ($sign_img!="")){
		$decl_status="true";
	}else{
		$decl_status="false";
	}
	
	//insert into "candidate_declaration" table
	$qry="UPDATE `candidate_declaration` SET `place`='$place',`date`='$decl_dt',`signature`='$sign_img',`declaration_status`='$decl_status' WHERE `application_no`='$_POST[appno]'";
	
	$res= mysqli_query($conn, $qry);
	if($res){
		$msg->success('Declaration Information Success-Fully Updated');
   		header("Location:edit_application.php#Declaration");
   		exit;
	}else{
		$msg->warning('Declaration Information Unable To Update Please Try Again !!!');
    	header("Location:edit_application.php#Declaration");
    	exit;
	}

}
ob_clean();
?>
