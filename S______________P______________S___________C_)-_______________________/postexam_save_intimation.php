<?php 
error_reporting(0);
ob_start();
session_start();
include "config.php";

require 'FlashMessages.php';

$msg = new \Preetish\FlashMessages\FlashMessages();
	if($_SESSION['postexam_user']){
		$exam=$_REQUEST["exam"];
		$category_name=$_REQUEST["category_name"];
		$total_app=$_REQUEST['total_app'];
		$cut_off=$_REQUEST['cut_off'];
		$total_qualfi=$_REQUEST['total_qualfi'];
		$rank=$_REQUEST['rank'];
		$no_call=$_REQUEST['no_call'];
		for ($i=0; $i <count($category_name) ; $i++) {
		$qry="SELECT * FROM `post_generate_report_exam_category` WHERE `exam_name`='$exam' AND `category_name`='$category_name[$i]'";
		
		$sql=mysqli_query($conn, $qry);
		$num_rows=mysqli_num_rows($sql);

		if($num_rows==0){
			$qry_insert="INSERT INTO `post_generate_report_exam_category`(`slno`, `category_name`, `total_app`, `exam_name`, `total_qualfi`,`cut_off`,`rank`,`no_call`) VALUES (NULL,'$category_name[$i]','$total_app[$i]','$exam', '$total_qualfi[$i]','$cut_off[$i]','$rank[$i]','$no_call[$i]')";
			$sql=mysqli_query($conn, $qry_insert);
		}
	}
	$date_now=date('Y-m-d');
	$qry_status_updates="INSERT INTO `generate_intiamation_exam`(`slno`, `exam_name`,`date`) VALUES (NULL,'$exam','$date_now')";

			$sql_status_updated=mysqli_query($conn, $qry_status_updates); 

			if($sql_status_updated){
				for ($j=0; $j <count($category_name) ; $j++) { 
					$sql_qry_check="SELECT * FROM `postexam_publish_result` where `category_name`='$category_name[$j]' ";
					$sql_check=mysqli_query($conn, $sql_qry_check);
					 $num_rows_check=mysqli_num_rows($sql_check);
					
					if($num_rows_check!='0'){
						//limit
						$qry_limit="SELECT * FROM `post_generate_report_exam_category` WHERE `exam_name`='$exam' AND `category_name`='$category_name[$j]'";		
						$sql_limit=mysqli_query($conn, $qry_limit);
						$res_limit=mysqli_fetch_assoc($sql_limit);
						 	$no_call=$res_limit['no_call'];
						
						//limit check
						$sql_qry_check1="SELECT * FROM `postexam_publish_result` where `category_name`='$category_name[$j]' Limit $no_call";
						
						$sql_check1=mysqli_query($conn, $sql_qry_check1);
					
						while ($res_check1=mysqli_fetch_assoc($sql_check1)) {
							// check previously inserted
							$qry="SELECT * FROM `postexam_intimation_list` WHERE `exam_name`='$exam' AND `category_name`='$category_name[$j]' AND `roll_no`='$res_check1[roll_no]' AND `application_no`='$res_check1[application_no]' ";
							
							$sql=mysqli_query($conn, $qry);
							echo $num_rows=mysqli_num_rows($sql);
							//email
							$qry_email="SELECT * from `candidate_application_info` where `application_no`='$res_check1[application_no]'";
							$sql_email=mysqli_query($conn, $qry_email);
							$res_email=mysqli_fetch_assoc($sql_email);
							$email=$res_email['candidate_email'];
							if($num_rows==0){
								$qry_insert="INSERT INTO `postexam_intimation_list`(`slno`, `category_name`, `roll_no`, `exam_name`, `application_no`,`marks`,`candidate_name`,`candidate_email`) VALUES (NULL,'$category_name[$j]','$res_check1[roll_no]','$exam', '$res_check1[application_no]','$res_check1[mark]','$res_check1[candidate_name]','$email')";
								
								$sql=mysqli_query($conn, $qry_insert);
								$to = $email;
								$subject = 'SPSC Qulified For '.$exam;
								$message = "You Have Success-Fully Qulified For Exam Date For Intimation Of Interview Will Publish In SPSC Website Kind visit  >";
								mail($to, $subject, $message);
							}
							
						}

					}				
				}
			}else{
				$msg->warning('Unable Intimation Of Result For The  Exam '.$exam );
				header("location:generate_intimation.php");
				exit;
			}
			
			$date_now=date('Y-m-d');
			$qry_intimation_updates="INSERT INTO `post_exam_intimation_list_report`(`slno`, `exam_name`,`date`) VALUES (NULL,'$exam','$date_now')";

			$sql_intimation_updated=mysqli_query($conn, $qry_intimation_updates); 
			if($sql_intimation_updated){
				$msg->success('Success-Fully Intimation  Of Result For The  Exam '.$exam );
				header("location:generate_intimation.php");
				exit;
			}else{
				$msg->warning('Unable Intimation Of Result For The  Exam '.$exam );
				header("location:generate_intimation.php");
				exit;
			}


	}else{
		header("location:logout.php");
	exit;
	}