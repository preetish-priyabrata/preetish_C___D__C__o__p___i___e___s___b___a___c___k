<?php 

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
	$student_rolls=$_POST['student_roll'];
	$met=$_POST['met'];
	$comp=$_POST['comp'];

	$course_ids=$course_name; 
	$course_list="SELECT * FROM `tbl_course` WHERE `sl_no`='$course_ids'";
	$sql_exe_course=mysqli_query($conn,$course_list);
	$res_course=mysqli_fetch_assoc($sql_exe_course);
	$student_course=$res_course['course_name'];
	// checking 
	if(!empty($student_rolls) && !empty($batch_name) && !empty($mert_Complete_ref) && !empty($Complete_ref) && !empty($course_name) && !empty($time) && !empty($date) && !empty($comp) && !empty($met)){
		// compltete certificate
		for ($i=0; $i <count($student_rolls) ; $i++) { 
			$cer_complete=$Complete_ref.'/'.$student_rolls[$i];
			$enrollment_id=$student_rolls[$i];
			$Check="SELECT * FROM `tbl_enrollment` WHERE `enrollment_id`='$enrollment_id'";
			$check_sql=mysqli_query($conn,$Check);
			$fetch_info=mysqli_fetch_assoc($check_sql);

			$student_name=$fetch_info['student_name'];
			$student_roll=$fetch_info['student_roll'];
			$student_email=$fetch_info['student_email'];
			$student_branch=$fetch_info['student_branch'];
			$student_semester=$fetch_info['student_semester'];
			$course_id=$fetch_info['student_course'];
			$batch_id=$fetch_info['course_batch_id'];
			if(in_array($enrollment_id,$complete_cert)){
				
				 $insert_cert="INSERT INTO `tbl_certificate_list`(`cert_id`, `certificate_reference_id`, `student_name`, `student_roll`, `student_email`, `student_branch`, `student_semester`, `student_course`, `course_id`, `batch_id`, `certificate_status`, `date`, `time`,`type_cer`) VALUES (Null,'$cer_complete','$student_name','$student_roll','$student_email','$student_branch','$student_semester','$student_course','$course_id','$batch_id','1','$date','$time','9')";
			}else{
				
				$insert_cert="INSERT INTO `tbl_certificate_list`(`cert_id`, `certificate_reference_id`, `student_name`, `student_roll`, `student_email`, `student_branch`, `student_semester`, `student_course`, `course_id`, `batch_id`, `certificate_status`, `date`, `time`,`type_cer`) VALUES (Null,'$cer_complete','$student_name','$student_roll','$student_email','$student_branch','$student_semester','$student_course','$course_id','$batch_id','3','$date','$time','9')";
			}

			$sql_exe_insert=mysqli_query($conn,$insert_cert);
		}
		// merit cerificate
		for ($j=0; $j <count($student_rolls) ; $j++) { 
			$cer_complete=$mert_Complete_ref.'/'.$student_rolls[$j];
			$enrollment_idj=$student_rolls[$j];
			$Check="SELECT * FROM `tbl_enrollment` WHERE `enrollment_id`='$enrollment_idj'";
			$check_sql=mysqli_query($conn,$Check);
			$fetch_info=mysqli_fetch_assoc($check_sql);

			$student_name=$fetch_info['student_name'];
			$student_roll=$fetch_info['student_roll'];
			$student_email=$fetch_info['student_email'];
			$student_branch=$fetch_info['student_branch'];
			$student_semester=$fetch_info['student_semester'];
			$course_id=$fetch_info['student_course'];
			$batch_id=$fetch_info['course_batch_id'];
		

			if(in_array($enrollment_idj,$merit_cert)){			
				$insert_cert_mert="INSERT INTO `tbl_certificate_list`(`cert_id`, `certificate_reference_id`, `student_name`, `student_roll`, `student_email`, `student_branch`, `student_semester`, `student_course`, `course_id`, `batch_id`, `certificate_status`, `date`, `time`,`type_cer`) VALUES (Null,'$cer_complete','$student_name','$student_roll','$student_email','$student_branch','$student_semester','$student_course','$course_id','$batch_id','2','$date','$time','8')";
			}else{
				$insert_cert_mert="INSERT INTO `tbl_certificate_list`(`cert_id`, `certificate_reference_id`, `student_name`, `student_roll`, `student_email`, `student_branch`, `student_semester`, `student_course`, `course_id`, `batch_id`, `certificate_status`, `date`, `time`,`type_cer`) VALUES (Null,'$cer_complete','$student_name','$student_roll','$student_email','$student_branch','$student_semester','$student_course','$course_id','$batch_id','4','$date','$time','8')";
			}
			$sql_exe_insert=mysqli_query($conn,$insert_cert_mert);
		}
		// enrolle stude update
		for ($k=0; $k <count($student_rolls) ; $k++) { 		
			$enrollment_idk=$student_rolls[$k];
			$Check_update="UPDATE `tbl_enrollment` SET `certificate_status`='1', `enrollment_status`='0' WHERE`enrollment_id`='$enrollment_idk'";
			$sql_exe_update=mysqli_query($conn,$Check_update);
		}
		// batch update
		$queryUpdateProgram = "UPDATE `tbl_batch` SET `status` = '2',`certificate_status`='1',`certificate_date`='$date',`certificate_time`='$time' WHERE `sl_no` = '$batch_name'";
	    $resUpdateProgram = mysqli_query($conn, $queryUpdateProgram);
	    
	    
	    $msg->success('Successfull Generated Certificate');
        header('Location:certificate_add.php');
        exit;
	}else{
		header('Location:logout.php');
		exit;
	}

}else{
	header('Location:logout.php');
	exit;
}