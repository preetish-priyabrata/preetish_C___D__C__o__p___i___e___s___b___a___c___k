<?php
session_start();
include 'config.php';
if($_SESSION['user_no']){
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();

 	$sikkim_status_subject=mysqli_real_escape_string($conn,trim($_POST['sikkim_status_subject']));
 	$sikkim_subject_no=mysqli_real_escape_string($conn,trim($_POST['sikkim_subject_no']));

 	$query_sikkim="SELECT * FROM `application_form` WHERE `sikkim_subject_no`='$sikkim_subject_no'";
 	$query_sikkim_sql=mysqli_query($conn, $query_sikkim);
 	$num_rows_sikkim=mysqli_num_rows($query_sikkim_sql);
 	if($num_rows_sikkim==0){
 		
 		$candidate_dob=mysqli_real_escape_string($conn,trim($_POST['candidate_dob']));
		$c_age=mysqli_real_escape_string($conn,trim($_POST['c_age']));
			if($c_age>=42){
			 	$msg->error('Age is exceed 40');
			 	header('Location:basic_registration');
			}else if (17>$c_age) {
			 	$msg->error('Age is less than 18');
			 	header('Location:basic_registration');
			}else {
				$qry_check_appno="SELECT * FROM `candidate_application_info` WHERE `candidate_mobile`='$_SESSION[user_no]'";
				$sql_check_appno=mysqli_query($conn, $qry_check_appno);
				$num_rows=mysqli_num_rows($sql_check_appno);
				if($num_rows=="0"){
					$qry_basic_status="SELECT * FROM `ilab_login` WHERE `mobile_no_L`='$_SESSION[user_no]' and `basic_status`='0'";
					$sql_basic_status=mysqli_query($conn, $qry_basic_status);
					$num_rows_basic_status=mysqli_num_rows($sql_basic_status);
					if($num_rows_basic_status==1){
						while(1){
							// generate unique random number
							$numbers ="0123456789";
							$appno_no = substr(str_shuffle( $numbers ), 0, 6 );
							$appno=date('Y-m-d').$appno_no;
							// check if it exists in database
							$qry_check = "SELECT * FROM `candidate_application_info` WHERE `application_no`='$appno'";
							$sql_check = mysqli_query($conn, $qry_check);
							$rowCount = mysqli_num_rows($sql_check);
				    
							// if not found in the db (it is unique), break out of the loop
							if($rowCount < 1) 
							{
								break;
				    		}
						}
						$insert="INSERT INTO `candidate_application_info`(`slno`, `candidate_mobile`, `application_no`) VALUES (Null,'$_SESSION[user_no]','$appno')";
						$insert_sql=mysqli_query($conn, $insert);
						$insert_applicatio_form="INSERT INTO `application_form`(`slno`,`application_no`, `candidate_mobile`, `sikkim_subject_no_status`, `sikkim_subject_no`,`candidate_dob`,`c_age`) VALUES (Null,'$appno','$_SESSION[user_no]','1','$sikkim_subject_no','$candidate_dob','$c_age')";
						$insert_applicatio_form_sql=mysqli_query($conn, $insert_applicatio_form);
						$qry_basic_status1="SELECT * FROM `ilab_login` WHERE `mobile_no_L`='$_SESSION[user_no]' and `basic_status`='0'";
						$sql_basic_status1=mysqli_query($conn, $qry_basic_status1);
						$num_rows_basic_status1=mysqli_num_rows($sql_basic_status1);
						if($num_rows_basic_status1=='1'){
							$update_sql="UPDATE `ilab_login` SET `basic_status`='1' WHERE `mobile_no_L`='$_SESSION[user_no]'";
							$sql_check_appno=mysqli_query($conn, $update_sql);
							$_SESSION['active_basic_status']=1;
							$_SESSION['application_no']=$appno;
							$msg->success('1st Process has been completed please fill basic information to system');
							header('Location:detail_application');
					 		exit;

						}else{
							header('Location:logout');
	 						exit;
						}
					}else{
						header('Location:logout');
	 					exit;
					}

				}else{
					header('Location:logout');
	 				exit;
				}

				header('Location:logout');
	 			exit;
			}



 	}else{
 		$msg->error('This certificate no is already in our record.To contnue kindly login with your linked mobile or for any assistance contact administrator');
 		header('Location:basic_registration');
		exit;
 	}


}else{
	header('Location:logout');
 	exit;
}
