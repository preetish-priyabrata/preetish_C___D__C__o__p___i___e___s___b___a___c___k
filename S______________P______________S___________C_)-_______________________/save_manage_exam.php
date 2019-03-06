<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
if($_SESSION['user']=="admintech@gmail.com")
{	
	
	//GET DATA
	function test_input($data)
	{
		 $data = trim($data);
		 $data = stripslashes($data);
		 $data = htmlspecialchars($data);
		 return $data;
	}
	
	$ename1= test_input($_REQUEST['ename1']);
	$dep1= test_input($_REQUEST['dep1']);
	$doe1= test_input($_REQUEST['doe1']);
	$ven1= test_input($_REQUEST['ven1']);
	$ins1= test_input($_REQUEST['ins1']);
	$insupld1= test_input($_REQUEST['insupld1']);
	$dtbs1= test_input($_REQUEST['dtbs1']);
	$dtbsupld1= test_input($_REQUEST['dtbsupld1']);
	$ec1= test_input($_REQUEST['ec1']);
	$ecupld1= test_input($_REQUEST['ecupld1']);
	
	$path_inst_doc = "uploads/exam/instructions/";
	$inst_doc = time().$_FILES['insupld1']['name'];
	$tmp_inst_doc = $_FILES['insupld1']['tmp_name'];
	$move_inst_doc = move_uploaded_file($tmp_inst_doc,$path_inst_doc.$inst_doc);
	
	$path_doc_sub = "uploads/exam/documents_to_submit/";
	$doc_sub = time().$_FILES['dtbsupld1']['name'];
	$tmp_doc_sub = $_FILES['dtbsupld1']['tmp_name'];
	$move_doc_sub = move_uploaded_file($tmp_doc_sub,$path_doc_sub.$doc_sub);
	
	$path_ec_doc = "uploads/eligibility_criteria/";
	$ec_doc = time().$_FILES['ecupld1']['name'];
	$tmp_ec_doc = $_FILES['ecupld1']['tmp_name'];
	$move_ec_doc = move_uploaded_file($tmp_ec_doc,$path_ec_doc.$ec_doc);
	
	
	
	//insert into "exam_master_data" table
	$qry="INSERT INTO `exam_master_data`(`slno`, `examname`, `department`, `exam_date`, `venue`, `instructions`, `inst_attach`, `doc_to_submit`, `dtbs_attatch`, `eligibility`, `eligibility_attach`, `datetime`) VALUES (NULL, '$ename1', '$dep1', '$doe1', '$ven1', '$ins1', '$inst_doc', '$dtbs1', '$doc_sub', '$ec1', '$ec_doc', NOW())";
	
	$res= mysqli_query($conn, $qry);
	
	if($res)
	{
	 $_SESSION['mei_success'] = 1;
    session_write_close();
    header("Location:manage_exam.php");
    exit;
	}
	else
	{
		$_SESSION['mei_error'] = 1;
		session_write_close();
    header("Location:manage_exam.php");
    exit;
	}

}
ob_clean();
?>
