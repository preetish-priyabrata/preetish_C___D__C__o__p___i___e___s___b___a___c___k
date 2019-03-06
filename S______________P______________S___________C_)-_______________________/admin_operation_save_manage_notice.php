<?php
error_reporting(E_ALL);
ob_start();
session_start();
include "config.php";
require 'FlashMessages.php';
date_default_timezone_set('Asia/Calcutta');

			//GET DATA
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
			$notice_heading= test_input($_REQUEST['notice_heading']);
			
			
			$admin=test_input($_SESSION['admin_operational_exam']);
			$path_c_name1 = "uploads/notices/";
			$c_name1 = $notice_heading."-".date('dmy').'-'.time().$_FILES['file_attach']['name'];
			$tmp_c_name1 = $_FILES['file_attach']['tmp_name'];
			$move_c_name1 = move_uploaded_file($tmp_c_name1,$path_c_name1.$c_name1);
			
			 $time= date("H:i:s");
			
			//insert into "center master" table
			$qry="INSERT INTO `notice_master_data`(`slno`, `heading`, `notice_attachment`, `admin_name`, `date`,`time`) VALUES (NULL, '$notice_heading', '$c_name1', '$admin', NOW(),'$time')";

			$res= mysqli_query($conn, $qry);
			
			if($res){ 	
	    		$msg->success('Success-Fully Add Center ');
	    		header("Location:admin_opreational_manage_notice.php");
	    		exit;
			}else{
				$msg->warning('Unable To Add Center Some Error Occurs !!!');
	    		header("Location:admin_opreational_manage_notice.php");
	   			exit;
			}
		}
		// update status
		if(isset($_GET['status'])){
			$status1=$_GET['status'];
			 $qry_answer="SELECT * FROM `notice_master_data` where slno='$status1'";
	      	$sql_answer=mysqli_query($conn,$qry_answer);
			
			while($row=mysqli_fetch_object($sql_answer)){
				$status_var=$row->status;
				if($status_var=='0'){
					$status_state=1;
				}else{
					$status_state=0;
				}
				$update=mysqli_query($conn,"update notice_master_data set status='$status_state' where slno='$status1' ");
				if($update){
					$msg->success('Status Update Success-Fully');
					header("Location:admin_opreational_manage_notice.php");
				}

			}
		}

		//deleted

		if(isset($_POST['Deleted'])){
			$slno=$_POST['slno'];
			$admin=test_input($_SESSION['admin_operational_exam']);
			$qry=" UPDATE `notice_master_data` SET `status`='3',`admin_name`='$admin' WHERE `slno`='$slno'";
		
			$res= mysqli_query($conn, $qry);
			if($res){
				$msg->success('Success-Fully Deleted Exam');
		    	header("Location:admin_opreational_manage_notice.php");
		    	exit;
			}else{
				$msg->warning('Unable To Deleted Exam Try Again !!!');	
		    	header("Location:admin_opreational_manage_notice.php");
		    	exit;
			}
		}
		// update exam
		if(isset($_POST['update_notice'])){
			$notice_heading= test_input($_REQUEST['notice_heading']);
			
			$admin=test_input($_SESSION['admin_operational_exam']);
			$date=date('Y-m-d');
			$slno=$_POST['slno'];
			if(!empty($_FILES['file_attach']['name'])){
			$path_c_name1 = "uploads/notices/";
			$c_name1 = $notice_heading."-".date('dmy').'-'.time().$_FILES['file_attach']['name'];
			$tmp_c_name1 = $_FILES['file_attach']['tmp_name'];
			unlink("uploads/notices/".$_REQUEST['upload_file']);
			$move_c_name1 = move_uploaded_file($tmp_c_name1,$path_c_name1.$c_name1);
			}else{
				$c_name1=$_REQUEST['upload_file'];
			}
			$time=date('H:i:s');
			$qry=" UPDATE `notice_master_data` SET `heading`='$notice_heading',   `notice_attachment`='$c_name1', `admin_name`='$admin', `date`=NOW(),`time`='$time' WHERE  `slno`='$slno'";
		
			$res= mysqli_query($conn, $qry);
			if($res){
				$msg->success('Success-Fully Update Exam');
	    		header("Location:admin_opreational_manage_notice.php");
	    		exit;
			}else{
				$msg->warning('Unable To Update Exam Try Again !!!');	
	    		header("Location:admin_opreational_manage_notice.php");
	    		exit;
			}

		}
	}