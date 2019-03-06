<?php
// Array ( [post_id] => 6 [status] => '1' ) 
session_start();
if($_SESSION['email']){
	require 'FlashMessages.php';
	include '../config.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();

	$sl_no_one=$_SESSION['sl_no'];

	$post_id=$_REQUEST['post_id'];	
	 $status=$_REQUEST['status'];
	
	$date=date('Y-m-d');
	$time=date('H:i:s');
	if($status=='1'){

		$sql_insert="INSERT INTO `master_user_wall_like`(`slno`, `post_id`, `like_status`, `user_id`, `date`, `time`) VALUES (Null,'$post_id','$status','$sl_no_one','$date','$time')";
		$sql_exe_insert=mysqli_query($conn,$sql_insert);

		$sql_query_check="SELECT * FROM `admin_user_post` WHERE `slno`='$post_id'";
		$sql_exe_check=mysqli_query($conn,$sql_query_check);

		$fetch=mysqli_fetch_assoc($sql_exe_check);
		$comment=$fetch['vote_up'];
		$update=$comment+1;

		$sql_update="UPDATE `admin_user_post` SET `vote_up`='$update' WHERE `slno`='$post_id'";
		$sql_exe_check=mysqli_query($conn,$sql_update);
		
		$msg->success('Successfully Like to Post');
		header('Location:alumni_dashboard.php');
		exit();
	}else{
		$msg->error('Invaild Like Post');
		header('Location:alumni_dashboard.php');
		exit();
	}

}else{

}