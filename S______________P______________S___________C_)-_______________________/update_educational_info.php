<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
echo "<pre>";
print_r($_REQUEST);
print_r($_FILES);
if($_SESSION['cand_user'])
{
	//get candidate id
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
	
	$qlfy_exam[0]= test_input($_REQUEST['qlfy_exam'][0]);
	$qlfy_exam[1]= test_input($_REQUEST['qlfy_exam'][1]);
	$qlfy_exam[2]= test_input($_REQUEST['qlfy_exam'][2]);
	$qlfy_exam[3]= test_input($_REQUEST['qlfy_exam'][3]);
	$qlfy_exam[4]= test_input($_REQUEST['qlfy_exam'][4]);
	$qlfy_exam[5]= test_input($_REQUEST['qlfy_exam'][5]);
	
	$perc_obt[0]= test_input($_REQUEST['perc_obt'][0]);
	$perc_obt[1]= test_input($_REQUEST['perc_obt'][1]);
	$perc_obt[2]= test_input($_REQUEST['perc_obt'][2]);
	$perc_obt[3]= test_input($_REQUEST['perc_obt'][3]);
	$perc_obt[4]= test_input($_REQUEST['perc_obt'][4]);
	$perc_obt[5]= test_input($_REQUEST['perc_obt'][5]);
	$opt_sub= test_input($_REQUEST['opt_sub']);
	
	$qlfy_exam_implode=implode(", ",$qlfy_exam);
	
	$perc_obt_implode=implode(", ",$perc_obt);
	$total = count($_FILES['mark_upload']['name']);
	$path_c_name1 = "uploads/candidate_education/education_marks/";
		// Loop through each file
		for($i=0; $i<$total; $i++) {
  		//Get the temp file path
  		
  			$tmpFilePath = $_FILES['mark_upload']['tmp_name'][$i];

  			//Make sure we have a filepath
  		if ($tmpFilePath != ""){
    		//Setup our new file path
    		 $newFilePath =$_POST['appno'].'-'.date('dmY').time().$_FILES['mark_upload']['name'][$i];
    		 unlink("uploads/candidate_education/education_marks/".$_REQUEST['mark_uploads'][$i]);
    		//Upload the file into the temp dir
    		if(move_uploaded_file($tmpFilePath,$path_c_name1.$newFilePath)) {

      			$uploadsmark[]=trim($newFilePath);

    		}
  		}else{
  			$uploadsmark[]=$_REQUEST['mark_uploads'][$i];
  		}	
	}
	$total_cert = count($_FILES['cer_upload']['name']);
	$path_cert = "uploads/candidate_education/education_cert/";
		// Loop through each file
		for($i=0; $i<$total_cert; $i++) {
  		//Get the temp file path
  		
  			$tmpFilePath_cert = $_FILES['cer_upload']['tmp_name'][$i];

  			//Make sure we have a filepath
  		if ($tmpFilePath_cert != ""){
    		//Setup our new file path
    		$newFilePath_cert =$_POST['appno'].'-'.date('dmY').time(). $_FILES['cer_upload']['name'][$i];

    		//Upload the file into the temp dir
    		if(move_uploaded_file($tmpFilePath_cert,$path_cert.$newFilePath_cert)) {

      			$uploadscert[]=trim($newFilePath_cert);

    		}
  		}else{
  			$uploadscert[]=$_REQUEST['upload_certs'][$i];
  		}	
	}
	
	 $upload_mark_implode=implode(",",$uploadsmark);	echo "<br>";
	 $upload_cert_implode=implode(",",$uploadscert);
	
	
	//insert into "candidate_educational_details" table
	$qry="UPDATE `candidate_educational_details` SET `qualifying_exam_name`='$qlfy_exam_implode',`mark_upload`='$upload_mark_implode',`upload_cert`='$upload_cert_implode',`percntg_obtained`='$perc_obt_implode',`optional_subject`='$opt_sub' WHERE `application_no`='$_POST[appno]'";
	
	$res= mysqli_query($conn, $qry);
	if($res)
	{
	$msg->success('Educational Information Success-Fully Updated');
    header("Location:edit_application.php#Educational");
    exit;
	}
	else
	{
	$msg->warning('Educational Information Unable To Update Please Try Again !!!');	
    header("Location:edit_application.php#Educational");
    exit;
	}

}
ob_clean();
?>
