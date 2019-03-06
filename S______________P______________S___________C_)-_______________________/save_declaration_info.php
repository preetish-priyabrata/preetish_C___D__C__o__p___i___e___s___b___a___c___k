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
	$exam6= test_input($_REQUEST['exam6']);
	$appno6= test_input($_REQUEST['appno6']);
	$place= test_input($_REQUEST['place']);
	$decl_dt= test_input($_REQUEST['decl_dt']);
	$sign= test_input($_FILES['sign']);
	
	$path_sign_img = "uploads/candidate_signature/";
	$sign_img = time().$_FILES['sign']['name'];
	$tmp_sign_img = $_FILES['sign']['tmp_name'];
	$move_sign_img = move_uploaded_file($tmp_sign_img,$path_sign_img.$sign_img);
	
	if(($_REQUEST['place']!="") && ($_REQUEST['decl_dt']!="") && ($_FILES['sign']!=""))
	{
	$decl_status="true";
	}
	else
	{
	$decl_status="false";
	}
	
	
	//insert into "candidate_declaration" table
	$qry="INSERT INTO `candidate_declaration`(`slno`, `candidate_id`, `place`, `date`, `signature`, `declaration_status`, `application_no`) VALUES (NULL, '$res_login[candidate_id]', '$place', '$decl_dt', '$sign_img', '$decl_status', '$appno6')";
	
	$res= mysqli_query($conn, $qry);
	if($res)
	{
		
			$qry_submit_status="UPDATE `candidate_application_submit_info` t1, `candidate_application_info` t2 SET t1.declaration_submtd='yes', t1.application_submitted='yes', t2.application_submitted='yes', t2.date_of_submit='$decl_dt' WHERE t1.application_no='$appno6' AND t1.application_no=t2.application_no";
		
		$res_status=mysqli_query($conn, $qry_submit_status);
		if($res_status)
		{
			$query_email="SELECT * FROM `candidate_application_info` where `application_no`='$appno6'";
			$res_email=mysqli_query($conn, $query_email);
			$res_fetch_email=mysqli_fetch_array($res_email);
			$to = $res_fetch_email['candidate_email'];
				$subject = 'Success-Fully Submiting Appliaction';
				$message = "Your Application No : ".$appno6."\r\n For Exam :- ".$exam6."\r\n Applied success full  Thank You .";
				mail($to, $subject, $message);
				$msg->success('Sucess-Fully Applied For Exam '.$exam6);
			header("Location:application_form.php#Declaration");
			exit;
			
		}
		else
		{
			$msg->warning('Declaration Information Unable To Update Please Try Again !!!');
			header("Location:application_form.php#Declaration");
			exit;
		}
	}else{
		$msg->success('Sucess-Fully Applied For Exam '.$exam6);
			header("Location:application_form.php#Declaration");
			exit;
	}

}

?>
