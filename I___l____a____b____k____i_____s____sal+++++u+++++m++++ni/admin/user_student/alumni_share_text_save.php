<?php
error_reporting(E_ALL);
session_start();
// ob_start();
if($_SESSION['email']){
	require 'FlashMessages.php';
	include '../config.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();
    //
    // print_r($_POST);
    //print_r($_FILES);
	//$file_name=date('y-m-d').date('H:i:s').$_FILES['img']['name'];
	// exit();
	if (isset($_POST['submit']))
   {
	$title=mysqli_real_escape_string($conn,trim($_POST['title']));
	$text=mysqli_real_escape_string($conn,$_POST['text']);
	$email=$_SESSION['email'];
	$date=date('Y-m-d');
	$time=date('H:i:s');   
	// $sharing_info_id=$_POST['$last_id'];
	
	         $query_student="INSERT INTO `user_sharing_Info`(`sl_no`,`title`,`user_id`,`date_entry`,`time_entry`) VALUES (NULL,'$title','$email','$date','$time')";
			 $sql_exe=mysqli_query($conn,$query_student);
			 $last_id=mysqli_insert_id($conn);
			
			 $query_student1="INSERT INTO `user_sharing_info_details`(`sl_no`, `user_id`, `title`, `sharing_info_id`,`text`, `post_type`, `date`, `time_entry`) VALUES (NULL,'$email','$title','$last_id','$text','2','$date','$time')";
			 $sql_exe1=mysqli_query($conn,$query_student1);
			
          if($sql_exe1)
              {
              $msg->success('Text Sent Successfull');
			header('Location:alumni_dashboard.php');
			exit();
             }
         
	     else{
	       $msg->error('Some Error Is found');
			header('Location:alumni_dashboard.php');
			exit();
		    }	
	
		
	}else{
		$msg->error('Text Is Not Submited');
		header('Location:alumni_dashboard.php');
		exit();
	}

}else{
	header('Location:logout.php');
	exit;
 }

 ?>