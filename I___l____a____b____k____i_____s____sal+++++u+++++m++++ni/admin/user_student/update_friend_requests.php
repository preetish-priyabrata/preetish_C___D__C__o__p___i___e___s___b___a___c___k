<?php

session_start();
ob_start();
if($_SESSION['email']){
require 'FlashMessages.php';
include '../config.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
// Array ( [serial] => 1 [status] => 1 ) Array ( [serial] => 1 [status] => 2 ) Array ( [serial] => 1 [status] => 2 [ids_uni] => 2 ) 
// no_of_friends
// 
	$sl_no_one=$_SESSION['sl_no'];  
	$status=$_REQUEST['status'];
	$serial=$_REQUEST['serial'];
	$ids_uni=$_REQUEST['ids_uni'];
	$date=date('Y-m-d');
	$time=date('H:i:s');

	$check_request="SELECT * FROM `master_friend_request` WHERE `sl_no`='$serial' and `friend_id_receive`='$sl_no_one' and `friend_id_send`='$ids_uni' and `status`='3'";
	$sql_exe=mysqli_query($conn,$check_request);
	$num=mysqli_num_rows($sql_exe);
	if($num==0){
		$msg->error('Unable find Request Please Try Again');
		header('Location:alumni_dashboard.php');
  		exit;
	}else{
		if($num==1){

			if($status=="1"){

				$find_sender="SELECT * FROM `master_user_registration` WHERE `sl_no`='$ids_uni'";
				$sql_exe_sender=mysqli_query($conn,$find_sender);
				$fetch_sender=mysqli_fetch_assoc($sql_exe_sender);
				$friend2=$fetch_sender['no_of_friends'];
				 $nos=$friend2+1;
				 $update_sender="UPDATE `master_user_registration` SET `no_of_friends`='$nos' WHERE `sl_no`='$ids_uni'";
				
				$update_sql_exe_sender=mysqli_query($conn,$update_sender);
				
				$find_receiver="SELECT * FROM `master_user_registration` WHERE `sl_no`='$sl_no_one'";
				$sql_exe_receiver=mysqli_query($conn,$find_receiver);
				$fetch_receiver=mysqli_fetch_assoc($sql_exe_receiver);
				$freind1=$fetch_receiver['no_of_friends'];
				$nos_rece=$freind1+1;
				$update_receiver="UPDATE `master_user_registration` SET `no_of_friends`='$nos_rece' WHERE `sl_no`='$sl_no_one'";
				$update_sql_exe_receiver=mysqli_query($conn,$update_receiver);

				$query_friend_table="UPDATE `master_friend_request` SET `status`='1',`date_change`='$date',`time_change`='$time' WHERE`sl_no`='$serial'";				
				$update_sql_exe_receiver=mysqli_query($conn,$query_friend_table);
				$msg->success('Friend Request Is Received');
				header('Location:friend_pending.php');
  				exit;
			}else{

				$query_friend_table="UPDATE `master_friend_request` SET `status`='2',`date_change`='$date',`time_change`='$time' WHERE`sl_no`='$serial'";				
				$update_sql_exe_receiver=mysqli_query($conn,$query_friend_table);
				$msg->warning('Friend Request Is Cancelled');
				header('Location:friend_pending.php');
  				exit;
			}

		}else{
			$msg->error('Something Goes Worng');
			header('Location:alumni_dashboard.php');
  			exit;
		}
	}
	
}else{
	header('Location:logout.php');
  	exit;
}