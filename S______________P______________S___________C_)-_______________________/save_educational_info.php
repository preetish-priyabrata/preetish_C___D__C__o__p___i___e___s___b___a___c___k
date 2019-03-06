<?php
error_reporting(E_ALL);
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
	$exam2= test_input($_REQUEST['exam2']);
	$appno2= test_input($_REQUEST['appno2']);	
	$opt_sub= test_input($_REQUEST['opt_sub']);	
	$perc_obt=($_REQUEST['perc_obt']);
	$qlfy_exam=($_REQUEST['qlfy_exam']);
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
    		 $newFilePath =$appno2.'-'.date('dmY').time().$_FILES['mark_upload']['name'][$i];

    		//Upload the file into the temp dir
    		if(move_uploaded_file($tmpFilePath,$path_c_name1.$newFilePath)) {

      			$uploadsmark[]=trim($newFilePath);

    		}
  		}else{
  			$uploadsmark[]="";
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
    		$newFilePath_cert =$appno2.'-'.date('dmY').time(). $_FILES['cer_upload']['name'][$i];

    		//Upload the file into the temp dir
    		if(move_uploaded_file($tmpFilePath_cert,$path_cert.$newFilePath_cert)) {

      			$uploadscert[]=trim($newFilePath_cert);

    		}
  		}else{
  			$uploadscert[]="";
  		}	
	}
	
	$upload_mark_implode=implode(", ",$uploadsmark);	
	$upload_cert_implode=implode(", ",$uploadscert);

	$qry_check_appno="SELECT * FROM `candidate_application_info` WHERE `candidate_email`='$_SESSION[cand_user]' AND `application_no`='$appno2'";
	$sql_check_appno=mysqli_query($conn, $qry_check_appno);
	 $num_rows=mysqli_num_rows($sql_check_appno);
	
	if($num_rows==0){

		$qry_insert_appno="INSERT INTO `candidate_application_info`(`slno`, `candidate_email`, `application_no`, `exam_name`) VALUES (NULL, '$_SESSION[cand_user]', '$appno2', '$exam2')";
		

		$sql_insert_appno=mysqli_query($conn, $qry_insert_appno);
	}
	
	//insert into "candidate_educational_details" table
	$qry_check_appno_ed="SELECT * FROM `candidate_educational_details` WHERE `application_no`='$appno2'";
	$sql_check_appno_ed=mysqli_query($conn, $qry_check_appno_ed);
	$num_rows_ed=mysqli_num_rows($sql_check_appno_ed);
	//echo "appl1". mysqli_error($conn);
	if($num_rows_ed==0){
		$qry="INSERT INTO `candidate_educational_details`(`slno`, `candidate_id`, `qualifying_exam_name`, `percntg_obtained`, `optional_subject`, `application_no`,`mark_upload`,`upload_cert`) VALUES (NULL, '$res_login[candidate_id]', '$qlfy_exam_implode','$perc_obt_implode', '$opt_sub', '$appno2','$upload_mark_implode','$upload_cert_implode')";
		
		$res= mysqli_query($conn, $qry);
		// if(!$res){
		// 	echo "appl1". mysqli_error($conn);
		// }
		
		if($res){
			$qry_check_status="SELECT * FROM `candidate_application_submit_info` WHERE `candidate_email`='$_SESSION[cand_user]'";
			$sql_check_status=mysqli_query($conn, $qry_check_status);
			$res_check_status=mysqli_fetch_array($sql_check_status);
			$row_no=mysqli_num_rows($sql_check_status);
			if($row_no==0){
				$qry_submit_status="INSERT INTO `candidate_application_submit_info`(`slno`, `candidate_email`, `application_no`, `educational_info_submtd`) VALUES (NULL, '$_SESSION[cand_user]', '$appno2', 'yes')";
			}else{
				$qry_submit_status="UPDATE `candidate_application_submit_info` SET `educational_info_submtd`='yes' WHERE `application_no`='$appno2'";
			}
			$res_status=mysqli_query($conn, $qry_submit_status);
		// 	if(!$res_status){
		// 	echo "appl13". mysqli_error($conn);
		// }
		// 	exit;
			if($res_status)
			{
				
				$msg->success('Educational Information Success-Fully Saved');
				header("Location:application_form.php#Employment");
				exit;
			}
			else
			{
				
				$msg->warning('Educational Information Unable To Update Please Try Again !!!');	
				header("Location:application_form.php#Educational");
				exit;
			}
		}
		
	}else{
		$msg->success('Educational Information Success-Fully Saved');
		header("Location:application_form.php#Employment");
				exit;
	}

}

?>
