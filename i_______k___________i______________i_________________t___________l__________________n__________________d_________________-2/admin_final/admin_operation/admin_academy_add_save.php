<?php
error_reporting(E_ALL);
session_start();
// ob_start();
if($_SESSION['alumni_tech']){
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
	
	$accademy_name=mysqli_real_escape_string($conn,$_POST['accademy_name']);
	//$alumni_tech=$_SESSION['alumni_tech'];
	$A_date=date('Y-m-d');
	$A_time=date('H:i:s');   
	// $sharing_info_id=$_POST['$last_id'];
	
	         $query_student="INSERT INTO `kiit_accademy`(`A_slno`,`A_name`,`A_date`,`A_time`) VALUES (NULL,'$accademy_name','$A_date','$A_time')";
			 $sql_exe=mysqli_query($conn,$query_student); 
          if($sql_exe)
              {
              $msg->success('Academy Add Successfull');
			  header('Location:admin_dashboard.php');
			  exit();
             }
         
	     else{
	       $msg->error('Some Error Is found');
			header('Location:admin_dashboard.php');
			exit();
		    }	
	
		
	}else{
		$msg->error('Academy Name Is Not Submited');
		header('Location:admin_dashboard.php');
		exit();
	}

}else{
	header('Location:logout.php');
	exit;
 }

 ?>