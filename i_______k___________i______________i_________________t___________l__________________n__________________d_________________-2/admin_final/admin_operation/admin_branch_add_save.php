<?php
error_reporting(E_ALL);
session_start();
// ob_start();
if($_SESSION['alumni_tech']){
	require 'FlashMessages.php';
	include '../config.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();
    //
     //print_r($_POST);
    //print_r($_FILES);
	//$file_name=date('y-m-d').date('H:i:s').$_FILES['img']['name'];
	
	if (isset($_POST['submit']))
   {
	
	
	$B_academy_id=mysqli_real_escape_string($conn,$_POST['B_academy_id']);
	$B_branch=mysqli_real_escape_string($conn,$_POST['B_branch']);
	//$alumni_tech=$_SESSION['alumni_tech'];
	$B_date=date('Y-m-d');
	$B_time=date('H:i:s');   
	// $sharing_info_id=$_POST['$last_id'];
	
	     $query_student="INSERT INTO `kiit_branch`(`B_slno`,`B_academy_id`,`B_branch`,`B_date`,`B_time`) VALUES (NULL,'$B_academy_id','$B_branch','$B_date','$B_time')";
	     $sql_exe=mysqli_query($conn,$query_student); 
		
          if($sql_exe)
              {
              $msg->success('Branch Add Successfull');
			  header('Location:admin_dashboard.php');
			  exit();
             }
         
	     else{
	       $msg->error('Some Error Is found');
			header('Location:admin_dashboard.php');
			exit();
		    }	
	
		
	}else{
		$msg->error('Branch Name Is Not Submited');
		header('Location:admin_dashboard.php');
		exit();
	}

}else{
	header('Location:logout.php');
	exit;
 }

 ?>