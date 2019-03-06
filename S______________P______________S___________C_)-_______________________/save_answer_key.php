<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
if($_SESSION['adminexam_user'])
{	
	
	//GET DATA
	function test_input($data)
	{
		 $data = trim($data);
		 $data = stripslashes($data);
		 $data = htmlspecialchars($data);
		 return $data;
	}
	
	$exam= test_input($_REQUEST['exam']);
	$year= test_input($_REQUEST['year']);
	$mnth= test_input($_REQUEST['mnth']);
	
	
	$path_ans_key = "uploads/exam_ans_key/";
	$ans_key = time().$_FILES['upload_ans']['name'];
	$tmp_ans_key = $_FILES['upload_ans']['tmp_name'];
	$move_ans_key = move_uploaded_file($tmp_ans_key,$path_ans_key.$ans_key);
	
	
	
	//insert into "exam_answer_key" table
	$qry="INSERT INTO `exam_answer_key`(`slno`, `exam_name`, `answer_key`) VALUES (NULL, '$exam', '$ans_key')";
	
	$res= mysqli_query($conn, $qry);
	if($res)
	{
	 $_SESSION['aki_success'] = 1;
    session_write_close();
    header("Location:adminexam_upload_ans_key.php");
    exit;
	}
	else
	{
		$_SESSION['aki_error'] = 1;
		session_write_close();
    header("Location:adminexam_upload_ans_key.php");
    exit;
	}

}
ob_clean();
?>
