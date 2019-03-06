<?php
error_reporting(0);
session_start();
include "config.php";
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();

if($_SESSION['postexam_user']){
	//add
	if(isset($_POST['save'])){
	$exam_name=$_POST['exam'];
	$date=date('Y-m-d');
			$path_c_name1 = "uploads/answerkey/";
			$c_name1 = $exam_name."-".date('dmy').'-'.time().$_FILES['upload_files']['name'];
			$tmp_c_name1 = $_FILES['upload_files']['tmp_name'];
			$move_c_name1 = move_uploaded_file($tmp_c_name1,$path_c_name1.$c_name1);
	$qry="INSERT INTO `post_exam_upload_answer_key` (`slno`, `exam_name`, `file_name`,`date`) VALUES (NULL, '$exam_name ', '$c_name1','$date')";
		
		$res= mysqli_query($conn, $qry);
		if($res)
		{
		$msg->success('Success-Fully  Stored Answer-Key');
	    header("Location:post_exam_answer_key.php");
	    exit;
		}
		else
		{
		$msg->warning('Unable To Stored Answer-Key Try Again !!!');	
	    header("Location:post_exam_answer_key.php");
	    exit;
		}

	}
	// update status
	if(isset($_GET['status'])){
		$status1=$_GET['status'];
		 $qry_answer="SELECT * FROM `post_exam_upload_answer_key` where slno='$status1'";
      	$sql_answer=mysqli_query($conn,$qry_answer);
		
		while($row=mysqli_fetch_object($sql_answer)){
			$status_var=$row->status;
			if($status_var=='0'){
				$status_state=1;
			}else{
				$status_state=0;
			}
			$update=mysqli_query($conn,"update post_exam_upload_answer_key set status='$status_state' where slno='$status1' ");
			if($update){
				$msg->success('Status Update Success-Fully');
				header("Location:post_exam_answer_key.php");
			}

		}
	}
	// update

	if(isset($_POST['Updated'])){
	$exam_name=$_POST['exam'];
	$date=date('Y-m-d');
	$slno=$_POST['slno'];
			$path_c_name1 = "uploads/answerkey/";
			$c_name1 = $exam_name."-".date('dmy').'-'.time().$_FILES['upload_files']['name'];
			$tmp_c_name1 = $_FILES['upload_files']['tmp_name'];
			unlink("uploads/answerkey/".$_REQUEST['upload']);
			$move_c_name1 = move_uploaded_file($tmp_c_name1,$path_c_name1.$c_name1);
	$qry=" UPDATE `post_exam_upload_answer_key` SET `exam_name`='$exam_name',`file_name`='$c_name1',`date`='$date',`status`='0' WHERE  `slno`='$slno'";
		
		$res= mysqli_query($conn, $qry);
		if($res)
		{
		$msg->success('Success-Fully Update Answer-Key');
	    header("Location:post_exam_answer_key.php");
	    exit;
		}
		else
		{
		$msg->warning('Unable To Update Answer-Key Try Again !!!');	
	    header("Location:post_exam_answer_key.php");
	    exit;
		}

	}

}
ob_clean();
?>
