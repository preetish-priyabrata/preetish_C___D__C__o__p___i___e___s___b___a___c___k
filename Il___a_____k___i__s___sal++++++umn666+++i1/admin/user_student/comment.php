<?php

session_start();
if($_SESSION['email']){
	require 'FlashMessages.php';
	include '../config.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();
	// Array ( [post_id] => 5 [comment] => POST ) 
	// 
	$post_id_type=$_POST['post_id_type'];
	$sl_no_one=$_SESSION['sl_no'];
	$post_id=$_POST['post_id'];
	$comment=$_POST['comment'];
	$date=date('Y-m-d');
	$time=date('H:i:s');
	$comment_detail=$_POST['comment_detail'];

	if($post_id_type=="11"){

		$sql_query="INSERT INTO `master_comment`(`slno`, `post_id`,`user_id`, `message`, `status`, `date`, `time`) VALUES (Null,'$post_id','$sl_no_one','$comment_detail','1','$date','$time')";
		$sql_exe=mysqli_query($conn,$sql_query);

		$sql_query_check="SELECT * FROM `admin_user_post` WHERE `slno`='$post_id'";
		$sql_exe_check=mysqli_query($conn,$sql_query_check);

		$fetch=mysqli_fetch_assoc($sql_exe_check);
		$comment=$fetch['comment'];
		$update=$comment+1;

		$sql_update="UPDATE `admin_user_post` SET `comment`='$update' WHERE `slno`='$post_id'";
		$sql_exe_check=mysqli_query($conn,$sql_update);

		$msg->success('Comment Successfully Add to Post');
		header('Location:alumni_dashboard.php');
		exit();
	}else if($post_id_type=="22"){
		$sql_query="INSERT INTO `master_admin_comment`(`slno`, `post_id`,`user_id`, `message`, `status`, `date`, `time`) VALUES (Null,'$post_id','$sl_no_one','$comment_detail','1','$date','$time')";
		$sql_exe=mysqli_query($conn,$sql_query);

		$sql_query_check="SELECT * FROM `admin_admin_post` WHERE `slno`='$post_id'";
		$sql_exe_check=mysqli_query($conn,$sql_query_check);

		$fetch=mysqli_fetch_assoc($sql_exe_check);
		$comment=$fetch['comment'];
		$update=$comment+1;

		$sql_update="UPDATE `admin_admin_post` SET `comment`='$update' WHERE `slno`='$post_id'";
		$sql_exe_check=mysqli_query($conn,$sql_update);

		$msg->success('Comment Successfully Add to Post');
		header('Location:alumni_dashboard.php');
		exit();
	}else if($post_id_type=="33"){
	$user_post_id_type=$_POST['user_post_id_type'];	
		$sql_query="INSERT INTO `master_admin_comment_temp`(`slno`, `post_id`,`user_id`, `message`, `status`, `date`, `time`) VALUES (Null,'$post_id','$sl_no_one','$comment_detail','1','$date','$time')";
		$sql_exe=mysqli_query($conn,$sql_query);

		$sql_query_check="SELECT * FROM `admin_admin_post_temp` WHERE `slno`='$post_id'";
		$sql_exe_check=mysqli_query($conn,$sql_query_check);

		$fetch=mysqli_fetch_assoc($sql_exe_check);
		$comment=$fetch['comment'];
		$update=$comment+1;

		$sql_update="UPDATE `admin_admin_post_temp` SET `comment`='$update' WHERE `slno`='$post_id'";
		$sql_exe_check=mysqli_query($conn,$sql_update);
		// SELECT * FROM `master_user_post_admin` WHERE `reply_details``slno`
		$sql_query_check1="SELECT * FROM `master_user_post_admin` WHERE `slno`='$user_post_id_type'";
		$sql_exe_check1=mysqli_query($conn,$sql_query_check1);

		$fetch1=mysqli_fetch_assoc($sql_exe_check1);
		$comment1=$fetch1['reply_details'];
		$update1=$comment1+1;

		$sql_update1="UPDATE `master_user_post_admin` SET `reply_details`='$update1' WHERE `slno`='$user_post_id_type'";
		$sql_exe_check1=mysqli_query($conn,$sql_update1);

		$msg->success('Comment Successfully Add to Post');
		header('Location:Received_Message_admin.php');
		exit();
	}else{
		header('Location:logout.php');
  		exit;
	}

}else{
	header('Location:logout.php');
  	exit;
}