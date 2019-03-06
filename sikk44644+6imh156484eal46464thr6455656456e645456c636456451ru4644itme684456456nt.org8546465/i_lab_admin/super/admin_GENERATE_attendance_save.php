<?php
session_start();
if($_SESSION['admin_preexam']){
	require 'FlashMessages.php';
	require '../config.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
	$exam=trim($_POST['exam']);
	$date_query="SELECT * FROM `ilab_assign_date_time` WHERE `exam_slno`='$exam'";
	$sql_date=mysqli_query($conn,$date_query);
	$fetch_date=mysqli_fetch_assoc($sql_date);
	
	$exam_date=$fetch_date['exam_date'];
	$first_session_start=$fetch_date['first_session_start'];
	$first_session_end=$fetch_date['first_session_end'];
	$get_first=$first_session_start."-".$first_session_end;
	$second_session_start=$fetch_date['second_session_start'];
	$second_session_end=$fetch_date['second_session_end'];
	$get_second=$second_session_start."-".$second_session_end;
	
	$get_candidate="SELECT * FROM `ilab_pre_exam_roll_no_exam_center` WHERE `group_exam_slno`='$exam' and `generate_attendance`='0'";
	$sql_get_candidate=mysqli_query($conn,$get_candidate);
	while ($res=mysqli_fetch_assoc($sql_get_candidate)){
		
		$session_no=$res['session_no'];
		$slno_roll_id=$res['slno_roll_id'];

		if($session_no=='1'){
			$get_update="UPDATE `ilab_pre_exam_roll_no_exam_center` SET  `date_exam`='$exam_date', `time_exam`='$get_first', `generate_attendance`='1' WHERE `slno_roll_id`='$slno_roll_id'";
		}else if($session_no=='2'){
			$get_update="UPDATE `ilab_pre_exam_roll_no_exam_center` SET  `date_exam`='$exam_date', `time_exam`='$get_second', `generate_attendance`='1' WHERE `slno_roll_id`='$slno_roll_id'";
		}
		mysqli_query($conn,$get_update);

	}

	$update="UPDATE `ilab_exam_group` SET `generate_all_status`='1' WHERE `slno_group`='$exam'";
	$update_exe=mysqli_query($conn,$update);

	if ($update_exe) {
		$msg->success('Sucessfully Attendance Generated');
		 	header('Location:index');
			exit;
	}else{
		$msg->error('Unsuccessfull, Attendance Generated');
		 	header('Location:index');
			exit;
	}


}else{
	header('Location:logout');
	exit;
}
