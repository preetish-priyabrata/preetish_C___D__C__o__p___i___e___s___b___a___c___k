<?php
error_reporting(E_ALL);
session_start();
// ob_start();
if(isset($_SESSION['alumni_tech'])){
	require 'FlashMessages.php';
	include '../config.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();
    // print_r($_POST);
   //  print_r($_FILES);
     // exit();
	//$file_name=date('y-m-d').date('H:i:s').$_FILES['img']['name'];
	
    if(isset($_POST['submit'])){
	$date=date('Y-m-d');
	$time=date('H:i:s');   
	// $sharing_info_id=$_POST['$last_id'];
	$dest="../uploads/";

	$target_file = $dest . basename($_FILES["img"]["name"]);
	
	if(!empty($_FILES['img']['name'])){
		 $file_name=date('y-m-d').date('H:i:s').$_FILES['img']['name'];

		if(move_uploaded_file($_FILES['img']['tmp_name'],"$dest".$file_name)){
			
		$query_student="INSERT INTO `upload_photo_gallery`(`sl_no`,`date`,`time`,`photo`) VALUES (NULL,'$date','$time','$file_name')";
		
			 $sql_exe=mysqli_query($conn,$query_student);
         
			$msg->success('Photo Upload Successfull');
			header('Location:admin_upload_photo_gallery.php');
			exit();
		}else{
	       $msg->error('Some Error Is found');
			header('Location:admin_upload_photo_gallery.php');
			exit();
		}	
		
	}else{
		$msg->error('Photo Or File Is Not matched');
		header('Location:admin_upload_photo_gallery.php');
		exit();
	}

}
else{
		$msg->error('Please contact to team');
		header('Location:admin_upload_photo_gallery.php');
		exit();
      }
}
else{
	header('Location:logout.php');
	exit;
 }

 ?>