<?php
session_start();
if($_SESSION['admin_preexam']){
	require 'FlashMessages.php';
	require '../config.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
		$exam=$_POST['exam'];
		$location=$_POST['location'];
		$Preference=$_POST['Preference'];
		$session=$_POST['session'];
		$Center_name=$_POST['Center_name'];
		$slno_roll=$_POST['slno_roll'];
		$roll_no=$_POST['roll_no'];
		$date_assign_roll_center=date('Y-m-d');
		for ($i=0; $i <$session ; $i++) {
			for ($j=0; $j <count($slno_roll[$i]) ; $j++) {
				 $slno_roll_single=$slno_roll[$i][$j];
				 $roll_no_single=$roll_no[$i][$j];
				 $session_no=$i+1;
				 $get_info="SELECT * FROM `ilab_pre_exam_roll_no` WHERE `slno_roll_id`='$slno_roll_single' and `roll_no`='$roll_no_single'";
				 $sql_get=mysqli_query($conn,$get_info);
				 $num_rows=mysqli_num_rows($sql_get);
				 if($num_rows!=0){
				 	$fetch_info=mysqli_fetch_assoc($sql_get);
				 	$candidate_moblie=$fetch_info['candidate_moblie'];
				 	$candidate_application=$fetch_info['candidate_application'];
				 	$group_exam_slno=$fetch_info['group_exam_slno'];
				 	$status_roll=$fetch_info['status_roll'];
				 	$date=$fetch_info['date'];
				 	$time=$fetch_info['time'];
				 	$paid_slno=$fetch_info['paid_slno'];
				 	$location_one=$fetch_info['location_one'];
				 	$location_two=$fetch_info['location_two'];

				 	$update="UPDATE `ilab_pre_exam_roll_no` SET `assign_roll_center`='1',`date_assign_roll_center`='$date_assign_roll_center',`center_id`='$Center_name' WHERE`slno_roll_id`='$slno_roll_single'";
				 	mysqli_query($conn,$update);
				 	$insert="INSERT INTO `ilab_pre_exam_roll_no_exam_center`(`slno_roll_id`, `roll_slno`, `candidate_moblie`, `candidate_application`, `group_exam_slno`, `roll_no`, `status_roll`, `date`, `time`, `paid_slno`, `assign_roll_center`, `date_assign_roll_center`, `location_one`, `location_two`, `center_id`, `final_location`, `session_no`) VALUES (Null,'$slno_roll_single','$candidate_moblie','$candidate_application','$group_exam_slno','$roll_no_single','$status_roll','$date','$time','$paid_slno','1','$date_assign_roll_center','$location_one','$location_two','$Center_name','$Preference','$session_no')";
				 	mysqli_query($conn,$insert);
				 }


			}
		}
		$date_entry=date('Y-m-d');
		$time_entry=date('H:i:s');
		$center_assigned="INSERT INTO `ilab_assign_center_table`(`slno_assign_center`, `group_slno_id`, `exam_center_slno`, `assign_status`, `no_session`, `date`, `time`) VALUES (Null,'$exam','$Center_name','1','$session','$date','$time')";
		if(mysqli_query($conn,$center_assigned)){
			$msg->success('Center successfully Assigned');
			header('Location:index');
			exit;
		}else{
			$msg->error('Something went worng');
			header('Location:index');
			exit;
		}
	}else{
	header('Location:logout');
	exit;
}