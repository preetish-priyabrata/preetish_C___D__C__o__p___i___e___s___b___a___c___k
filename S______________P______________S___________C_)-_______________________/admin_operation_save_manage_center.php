<?php
error_reporting(E_ALL);
ob_start();
session_start();
include "config.php";
require 'FlashMessages.php';

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
		$center_name= test_input($_REQUEST['center_name']);
		$center_address= test_input($_REQUEST['center_address']);
		$contact_person= test_input($_REQUEST['contact_person']);
		$contact_mobile= test_input($_REQUEST['contact_mobile']);
		$contact_email= test_input($_REQUEST['contact_email']);
		$alt_conatct_person= test_input($_REQUEST['alt_conatct_person']);
		$alt_conatct_mobile= test_input($_REQUEST['alt_conatct_mobile']);
		$alt_conatct_email= test_input($_REQUEST['alt_conatct_email']);
		$capacity_center= test_input($_REQUEST['capacity_center']);
		$admin=test_input($_SESSION['admin_operational_exam']);
		//insert into "center master" table
		$qry="INSERT INTO `center_master_data`(`slno`,`examcenter`, `address`, `contact_person`, `contact_no`, `emailid`, `sitting_capacity`, `alt_contact_person`, `alt_mobile_no`, `alt_email_id`,`user_name_entry`, `datetime_of_updation`) VALUES (NULL, '$center_name', '$center_address', '$contact_person', '$contact_mobile', '$contact_email', '$capacity_center', '$alt_conatct_person', '$alt_conatct_mobile', '$alt_conatct_email','$admin', NOW())";
		$res= mysqli_query($conn, $qry);

		if($res){ 	
    		$msg->success('Success-Fully Add Center ');
    		header("Location:admin_opreational_manage_center.php");
    		exit;
		}else{
			$msg->warning('Unable To Add Center Some Error Occurs !!!');
    		header("Location:admin_opreational_manage_center.php");
   			exit;
		}
	}
	// update status
		if(isset($_GET['status'])){
			$status1=$_GET['status'];
			 $qry_answer="SELECT * FROM `center_master_data` where slno='$status1'";
	      	$sql_answer=mysqli_query($conn,$qry_answer);
			
			while($row=mysqli_fetch_object($sql_answer)){
				$status_var=$row->status;
				if($status_var=='0'){
					$status_state=1;
				}else{
					$status_state=0;
				}
				$update=mysqli_query($conn,"update center_master_data set status='$status_state' where slno='$status1' ");
				if($update){
					$msg->success('Status Update Success-Fully');
					header("Location:admin_opreational_manage_center.php");
				}

			}
		}

		//deleted

		if(isset($_POST['Deleted'])){
			$slno=$_POST['slno'];
			$admin=test_input($_SESSION['admin_operational_exam']);
			$qry=" UPDATE `center_master_data` SET `status`='3',`user_name_entry`='$admin' WHERE `slno`='$slno'";
		
			$res= mysqli_query($conn, $qry);
			if($res){
				$msg->success('Success-Fully Deleted Center');
		    	header("Location:admin_opreational_manage_center.php");
		    	exit;
			}else{
				$msg->warning('Unable To Deleted Center Try Again !!!');	
		    	header("Location:admin_opreational_manage_center.php");
		    	exit;
			}
		}
		// update

		if(isset($_POST['update'])){
			$slno=$_POST['slno'];
			$center_name= test_input($_REQUEST['center_name']);
		$center_address= test_input($_REQUEST['center_address']);
		$contact_person= test_input($_REQUEST['contact_person']);
		$contact_mobile= test_input($_REQUEST['contact_mobile']);
		$contact_email= test_input($_REQUEST['contact_email']);
		$alt_conatct_person= test_input($_REQUEST['alt_conatct_person']);
		$alt_conatct_mobile= test_input($_REQUEST['alt_conatct_mobile']);
		$alt_conatct_email= test_input($_REQUEST['alt_conatct_email']);
		$capacity_center= test_input($_REQUEST['capacity_center']);
		$admin=test_input($_SESSION['admin_operational_exam']);
			$admin=test_input($_SESSION['admin_operational_exam']);
			$qry=" UPDATE `center_master_data` SET `examcenter`='$center_name', `address`='$center_address', `contact_person`='$contact_person', `contact_no`='$contact_mobile', `emailid`='$contact_email', `sitting_capacity`='$capacity_center', `alt_contact_person`='$alt_conatct_person', `alt_mobile_no`='$alt_conatct_mobile', `alt_email_id`='$alt_conatct_email',`user_name_entry`='$admin', `datetime_of_updation`=NOW() WHERE `slno`='$slno'";
		
			$res= mysqli_query($conn, $qry);
			
			if($res){
				$msg->success('Success-Fully Update Center ');
		    	header("Location:admin_opreational_manage_center.php");
		    	exit;
			}else{
				$msg->warning('Unable To Update Center Try Again !!!');	
		    	header("Location:admin_opreational_manage_center.php");
		    	exit;
			}
		}
	}else{
		header('location:logout.php');
		exit;
	}