<?php 
// echo "<pre>";
// print_r($_POST);

session_start();

if (($_SESSION['userId']!="")) {
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
include 'config.php';
	$course_name=$_POST['course_name'];
	$batch_name=$_POST['batch_name'];
	$mert_Complete_ref=$_POST['mert_Complete_ref'];
	$Complete_ref=$_POST['Complete_ref'];
	$merit_cert=$_POST['merit_cert'];
	$complete_cert=$_POST['complete_cert'];
	$date=date('Y-m-d');
	$time=date('H:i:s');

	$course_id=$course_name['course_id']; 
	$course_list="SELECT * FROM `tbl_course` WHERE `sl_no`='$course_id'";
	$sql_exe_course=mysqli_query($conn,$course_list);
	$res_course=mysqli_fetch_assoc($sql_exe_course);
	$student_course=$res_course['course_name'];

	for ($i=0; $i <count($complete_cert) ; $i++) { 
		$cer_complete=$Complete_ref.'/'.$complete_cert[$i];
		$enrollment_id=$complete_cert[$i];
		$Check="SELECT * FROM `tbl_enrollment` WHERE `enrollment_id`='$enrollment_id'";
		$check_sql=mysqli_query($conn,$check);
		$fetch_info=mysqli_fetch_assoc($check_sql);

		$student_name=$fetch_info['student_name'];
		$student_roll=$fetch_info['student_roll'];
		$student_email=$fetch_info['student_email'];
		$student_branch=$fetch_info['student_branch'];
		$student_semester=$fetch_info['student_semester'];
		$course_id=$fetch_info['student_course'];
		$batch_id=$fetch_info['course_batch_id'];



		$insert_cert="INSERT INTO `tbl_certificate_list`(`cert_id`, `certificate_reference_id`, `student_name`, `student_roll`, `student_email`, `student_branch`, `student_semester`, `student_course`, `course_id`, `batch_id`, `certificate_status`, `date`, `time`) VALUES (Null,'$cer_complete','$student_name','$student_roll','$student_email','$student_branch','$student_semester','$student_course','$course_id','$batch_id','1','$date','$time')";
		$sql_exe_insert=mysqli_query($conn,$insert_cert);
	}
	for ($i=0; $i <count($merit_cert) ; $i++) { 
		$cer_complete=$mert_Complete_ref.'/'.$merit_cert[$i];
		$enrollment_id=$merit_cert[$i];
		$Check="SELECT * FROM `tbl_enrollment` WHERE `enrollment_id`='$enrollment_id'";
		$check_sql=mysqli_query($conn,$check);
		$fetch_info=mysqli_fetch_assoc($check_sql);

		$student_name=$fetch_info['student_name'];
		$student_roll=$fetch_info['student_roll'];
		$student_email=$fetch_info['student_email'];
		$student_branch=$fetch_info['student_branch'];
		$student_semester=$fetch_info['student_semester'];
		$course_id=$fetch_info['student_course'];
		$batch_id=$fetch_info['course_batch_id'];



		$insert_cert="INSERT INTO `tbl_certificate_list`(`cert_id`, `certificate_reference_id`, `student_name`, `student_roll`, `student_email`, `student_branch`, `student_semester`, `student_course`, `course_id`, `batch_id`, `certificate_status`, `date`, `time`) VALUES (Null,'$cer_complete','$student_name','$student_roll','$student_email','$student_branch','$student_semester','$student_course','$course_id','$batch_id','2','$date','$time')";
		$sql_exe_insert=mysqli_query($conn,$insert_cert);
	}
	for ($i=0; $i <count($merit_cert) ; $i++) { 
		$cer_complete=$mert_Complete_ref.'/'.$merit_cert[$i];
		$enrollment_id=$merit_cert[$i];
		$Check="SELECT * FROM `tbl_enrollment` WHERE `enrollment_id`='$enrollment_id'";
		
	}
	$queryUpdateProgram = "UPDATE `tbl_batch` SET `status` = '2',`certificate_status`='1',`certificate_date`='$date',`certificate_time`='$time' WHERE `sl_no` = '$batch_name'";
    $resUpdateProgram = mysqli_query($conn, $queryUpdateProgram);


}else{
	header('Location:logout.php');
	exit;
}