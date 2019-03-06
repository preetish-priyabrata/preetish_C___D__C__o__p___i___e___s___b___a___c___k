<?php
error_reporting(E_ALL);
ob_start();
session_start();
include "config.php";
require 'FlashMessages.php';
// echo "<pre>";
// print_r($_POST);
// print_r($_FILES);
// exit;
$msg = new \Preetish\FlashMessages\FlashMessages();
	if($_SESSION['admin_operational_exam']){
		//echo "<pre>";
		//print_r($_POST);
			//GET DATA
		function test_input($data)
		{
			 $data = trim($data);
			 $data = stripslashes($data);
			 $data = htmlspecialchars($data);
			 return $data;
		}
		//add center
		if(isset($_POST['save'])){
			
			//$newDate = date("d-m-Y", strtotime($originalDate));
			$exam_name= test_input($_REQUEST['exam_name']);
			 $start_date_exam= date("Y-m-d", strtotime(test_input($_REQUEST['start_date_exam'])));
			 $last_date_exam= date("Y-m-d", strtotime(test_input($_REQUEST['last_date_exam'])));
			
			$date_exam= date("Y-m-d", strtotime(test_input($_REQUEST['date_exam'])));
			
			$admin=test_input($_SESSION['admin_operational_exam']);
			$path_c_name1 = "uploads/exam/documents_to_submit/";
			$c_name1 = $exam_name."-".date('dmy').'-'.time().$_FILES['file_attach']['name'];
			$tmp_c_name1 = $_FILES['file_attach']['tmp_name'];
			$move_c_name1 = move_uploaded_file($tmp_c_name1,$path_c_name1.$c_name1);
			//insert into "center master" table
			$qry="INSERT INTO `exam_master_data`(`slno`, `examname`, `starting_date`, `exam_date`, `last_date`, `file_attach`, `admin_name`, `datetime`) VALUES (NULL, '$exam_name', '$start_date_exam', '$date_exam', '$last_date_exam','$c_name1', '$admin', NOW())";

			$res= mysqli_query($conn, $qry);
		
			if($res){ 	
	    		$msg->success('Success-Fully Add Center ');
	    		header("Location:admin_opreational_manage_exam.php");
	    		exit;
			}else{
				$msg->warning('Unable To Add Center Some Error Occurs !!!');
	    		header("Location:admin_opreational_manage_exam.php");
	   			exit;
			}
		}
		// update status
		if(isset($_GET['status'])){
			$status1=$_GET['status'];
			 $qry_answer="SELECT * FROM `exam_master_data` where slno='$status1'";
	      	$sql_answer=mysqli_query($conn,$qry_answer);
			
			while($row=mysqli_fetch_object($sql_answer)){
				$status_var=$row->status;
				if($status_var=='0'){
					$status_state=1;
				}else{
					$status_state=0;
				}
				$update=mysqli_query($conn,"update exam_master_data set status='$status_state' where slno='$status1' ");
				if($update){
					$msg->success('Status Update Success-Fully');
					header("Location:admin_opreational_manage_exam.php");
				}

			}
		}

		//deleted

		if(isset($_POST['Deleted'])){
			$slno=$_POST['slno'];
			$admin=test_input($_SESSION['admin_operational_exam']);
			$qry=" UPDATE `exam_master_data` SET `status`='3',`admin_name`='$admin' WHERE `slno`='$slno'";
		
			$res= mysqli_query($conn, $qry);
			if($res){
				$msg->success('Success-Fully Deleted Exam');
		    	header("Location:admin_opreational_manage_exam.php");
		    	exit;
			}else{
				$msg->warning('Unable To Deleted Exam Try Again !!!');	
		    	header("Location:admin_opreational_manage_exam.php");
		    	exit;
			}
		}
		// update exam
		if(isset($_POST['updated'])){
			$exam_name= test_input($_REQUEST['exam_name']);
			 $start_date_exam= date("Y-m-d", strtotime(test_input($_REQUEST['start_date_exam'])));
			 $last_date_exam= date("Y-m-d", strtotime(test_input($_REQUEST['last_date_exam'])));
			
			$date_exam= date("Y-m-d", strtotime(test_input($_REQUEST['date_exam'])));
			
			$admin=test_input($_SESSION['admin_operational_exam']);
			$date=date('Y-m-d');
			$slno=$_POST['slno'];
			if(!empty($_FILES['file_attach']['name'])){
			$path_c_name1 = "uploads/exam/documents_to_submit/";
			$c_name1 = $exam_name."-".date('dmy').'-'.time().$_FILES['upload_files']['name'];
			$tmp_c_name1 = $_FILES['upload_files']['tmp_name'];
			unlink("uploads/exam/documents_to_submit/".$_REQUEST['upload_file']);
			$move_c_name1 = move_uploaded_file($tmp_c_name1,$path_c_name1.$c_name1);
			}else{
				$c_name1=$_REQUEST['upload_file'];
			}
			$qry=" UPDATE `exam_master_data` SET `examname`='$exam_name', `starting_date`='$start_date_exam', `exam_date`='$date_exam', `last_date`='$last_date_exam', `file_attach`='$c_name1', `admin_name`='$admin', `datetime`=NOW() WHERE  `slno`='$slno'";
		
			$res= mysqli_query($conn, $qry);
			if($res){
				$msg->success('Success-Fully Update Exam');
	    		header("Location:admin_opreational_manage_exam.php");
	    		exit;
			}else{
				$msg->warning('Unable To Update Exam Try Again !!!');	
	    		header("Location:admin_opreational_manage_exam.php");
	    		exit;
			}

		}
	}