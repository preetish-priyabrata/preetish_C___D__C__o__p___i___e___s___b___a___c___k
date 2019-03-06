<?php
// print_r($_POST);
// exit;
session_start();
if($_SESSION['alumni_tech']){
require 'FlashMessages.php';
include '../config.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
// Array ( [serial] => [Message] => hello users [optradio] => 1 ) 
//print_r($_POST);
//exit;
	$serial=$_SESSION['alumni_tech'];	
	$optradio=$_POST['optradio'];
	$title=$_POST['title'];
	$Notice=$_POST['Notice'];
	$stream=$_POST['stream'];
	$date=date('Y-m-d');
	$time=date('H:i:s');
	//$A_slno=$_POST['A_slno'];

switch ($stream) {

	case 'All':
		    if ($optradio=='1'){ //group   // && ($optradio==2) 

		     	$query_check = "SELECT * FROM `kiit_accademy` where `A_Status`='1'";
	            $exe_check = mysqli_query($conn,$query_check);
	                				                
	            while($rec = mysqli_fetch_assoc($exe_check)){
	            	$stream_single=$rec['A_slno'];
  				echo $query_user="INSERT INTO `kitt_admin_send_group_notice`(`sl_no`,`title`, `notice`,`stream`, `user_slno`,`date`, `time` ) VALUES (Null,'$title','$Notice','$stream_single','$serial','$date','$time')";
				$sql_exe=mysqli_query($conn,$query_user);	
		     }
		     // echo mysqli_error($conn);
		     // exit;
			if($sql_exe){
				$msg->success('Success-Fully Send Notice Is Posted');
				header('Location:admin_dashboard.php');
				exit();
		    	} else{
                $msg->error('UnSuccess-Fully Notice is posted1.');
				header('Location:admin_dashboard.php');
				exit();

		       }

			}else if ($optradio=='2') {
			    	print_r($_POST);
			    	exit;

		     	
		     
		 }else{
                $msg->error('UnSuccess-Fully Notice is posted2.');
				header('Location:admin_dashboard.php');
				exit();

		       }
		break;


	default:
		  if ($optradio=='1') {	     	

  				$query_user="INSERT INTO `kitt_admin_send_group_notice`(`sl_no`,`title`, `notice`,`stream`, `user_slno`,`date`, `time` ) VALUES (Null,'$title','$Notice','$stream','$serial','$date','$time')";
				$sql_exe=mysqli_query($conn,$query_user);
                exit;
			
		     	$msg->success('Success-Fully Send Notice Is Posted');
				header('Location:admin_dashboard.php');
				exit();

		  }else  if ($optradio=='2') { //invidual

             
  			   echo $query_user="INSERT INTO `kitt_admin_send_individual_notice`(`sl_no`,`title`, `notice`,`stream`, `stud_slno`,`date`, `time` ) VALUES (Null,'$title','$Notice','$stream','$serial','$date','$time')";
			    $sql_exe=mysqli_query($conn,$query_user);	
		     	 $last_id=mysqli_insert_id($conn);
				unset($_POST);
		     	$msg->success('Please Select Student Want send message');
				header('Location:admin_send_notice_student_individual.php?notice_id='.$last_id.'stream='.$stream);
				exit();


		 }else {
                $msg->error('UnSuccess-Fully Notice is posted3.');
				header('Location:admin_dashboard.php');
				exit();

		       }
		break;
	}

	
}else{
	header('Location:logout.php');
  	exit;
}