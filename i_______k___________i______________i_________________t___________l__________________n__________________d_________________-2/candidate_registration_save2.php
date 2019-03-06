<?php
// ob_start();
// session_start();
// include '../config.php';
// // if($_SESSION['admin_emails']){
// 	require 'FlashMessages.php';
// 	$msg = new \Preetish\FlashMessages\FlashMessages();

// print_r($_POST);
// print_r($_FILE);
// exit;

// //personal details
// $email=$_POST['email'];
// $First_name=$_POST['First_name'];
// $Middle_name=$_POST['Middle_name'];
// $Last_name=$_POST['Last_name'];
// $gender=$_POST['gender'];
// $c_photo=$_POST['c_photo'];
// $Birth=$_POST['Birth'];
// $Mobile=$_POST['Mobile'];
// $Alternative=$_POST['Alternative'];
// $landlineNo=$_POST['landlineNo'];
// $City=$_POST['City'];
// $District=$_POST['District'];
// $State=$_POST['State'];
// $prefered_mng_time=$_POST['prefered_mng_time'];
// $prefered_eveng_time=$_POST['prefered_eveng_time'];

// //academy details
// // $Academic=$_POST['Academic'];
// // $Specialization=$_POST['Specialization'];
// // $Branch=$_POST['Branch'];
// // $College=$_POST['College'];
// // $Board=$_POST['Board'];
// // $pass_year=$_POST['pass_year'];
// // $attach_Id=$_POST['attach_Id'];

// //marks details
// $10th_Marks=$_POST['10th_Marks'];
// $10th_pass_year=$_POST['10th_pass_year'];
// $school_name=$_POST['school_name'];
// $Board=$_POST['Board'];
// $10th_attach_file=$_POST['10th_attach_file'];
// $ITI_marks=$_POST['ITI_marks'];
// $ITI_pass_year=$_POST['ITI_pass_year'];
// $ITI_school_name=$_POST['ITI_school_name'];
// $ITI_specializaton=$_POST['ITI_specializaton'];
// $ITI_Board=$_POST['ITI_Board'];
// $Attach_ITI_Marks=$_POST['Attach_ITI_Marks'];
// $Diploma_Marks=$_POST['Diploma_Marks'];
// $diploma_pass_year=$_POST['diploma_pass_year'];
// $diploma_school_name=$_POST['diploma_school_name'];
// $diploma_board=$_POST['diploma_board'];
// $diploma_attach_file=$_POST['diploma_attach_file'];
// $Diploma_Specialization=$_POST['Diploma_Specialization'];

// //work experience
// $Toatal_Experience=$_POST['Toatal_Experience'];
// $exp_summery=$_POST['exp_summery'];
// $Resume=$_POST['Resume'];

// //date/time
// $date=date('y-m-d');
// $time=date('H:i:s');


// $check_student="SELECT * FROM `kiit_stud_personal_details` WHERE `P_sl_no`='$P_sl_no'";
// $sql_exe_check=mysqli_query($conn,$check_student);
// $num_student=mysqli_num_rows($sql_exe_check);
// if($num_student==0){
// //insert personal info
	
//  $insert_query_personal="INSERT INTO `kiit_stud_personal_details`(`first_name`,`middle_name`,`last_name`,`gender`,`dob`,`user_photo`,`mobile_no`,`landline_no`,`alter_no`,`email`,`city`,`district`,`state`,`prefered_mng_time`,`prefered_eveng_time`,`date`,`time`) VALUES ('$First_name','$Middle_name','$Last_name','$gender','$Birth','$c_photo','$Mobile','$landlineNo','$Alternativ','$email','$City','$District','$State','$prefered_mng_time','$prefered_eveng_time','$date','$time')";

// $sql_exe_personal=mysqli_query($conn,$insert_query_personal);
// $last_id=mysqli_insert_id($conn); 

// //insert Academic info
//  $insert_query_Academic="INSERT INTO `Kiit_stud_academy`(`academic`,`specialization`,`college_name`,`branch`,`pass_year`,`board`,`attach_id`,`date`,`time`) values ('$Academic','$Specialization','$College','$Branch','$pass_year','$Board','$attach_Id','$date','$time')";

// //insert marks details info
// $insert_query_marks="INSERT INTO `kiit_stud_marks`(`10th_marks`,`10th_pass_year`,`1oth_school_name`,`1oth_board`,`attach_1oth_marks`,`ITI_marks`,`ITI_pass_year`,`ITI_shool_name`,`ITI_specialization`,`ITI_Board`,`attach_ITI_marks`,`diploma_marks`,`diploma_pass_year`,`diploma_school_name`,`diploma_board`,`attach_diploma_marks`,`diploma_specialization`,`date`,`time`) values ('$10th_Marks','$10th_pass_year','$school_name','$Board','$10th_attach_file','$ITI_marks','$ITI_pass_year','$ITI_school_name','$ITI_specializaton','$ITI_Board','$Attach_ITI_Marks','$Diploma_Marks','$diploma_pass_year','$diploma_school_name','$diploma_board','$diploma_attach_file','$Diploma_Specialization','$date','$time')";

// $insert_query_work_exp="INSERT INTO `kiit_stud_work_exp`(`total_exp`,`resume`,`exp_summery`,`date`,`time`) VALUES ('$Toatal_Experience','$exp_summery','$Resume','$date','$time')";

// $sql_exe_Academic=mysqli_query($conn,$insert_query_Academic);
// $sql_exe_work_exp=mysqli_query($conn,$insert_query_work_exp);
// $sql_exe_marks=mysqli_query($conn,$insert_query_marks);

// 	if($sql_exe_personal && $sql_exe_Academic && $sql_exe_marks && $sql_exe_work_exp){
// 		$msg->success('Welcome Student');
// 		header('Location:dashboard.php');
// 		exit;
// 	}else{
// 		$msg->error('Some Error Occured Please Contact System Incharge for it');
// 		header('Location:dashboard.php');
// 		exit;
// 	}
//  }else{
//  	header('Location:logout.php');
// 	exit;
//  }
		
?>