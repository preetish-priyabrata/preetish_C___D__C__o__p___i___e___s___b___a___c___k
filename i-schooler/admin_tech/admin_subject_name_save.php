<?php
// print_r($_POST);
// exit();
error_reporting(4);
session_start();
ob_start();
if($_SESSION['admin_tech']){
	include '../config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
	// Array ( [cate_name] => 1 [sub_name] => math2 [submit] => submit ) 
	if(isset($_POST['submit'])){
		$subj_cat = $_POST['cate_name'];
		$sub_name=$_POST['sub_name'];
		$date = date('Y-m-d');
		$tim  = date('H:i:s');
		
		// checking subject name is empty or not
		if(!empty($sub_name)){
			//checking subject name is present or nto (num row is 0 then insert otherwise will not insert)
      		$query = "SELECT * FROM `master_subject_name` WHERE `subject_name`='$sub_name'";
      		$query_check_exe =mysqli_query($conn,$query);
      		$num =mysqli_num_rows($query_check_exe);
      		// num ==0 checking of subject
      		if($num ==0){
      			// insert into masteter subject_name 
       			$insert_query="INSERT INTO `master_subject_name`( `subject_cat_id`, `subject_name`,  `date`, `time`) VALUES 
       			  ('$subj_cat','$sub_name' ,'$date','$tim')";
        		$query_insert_exe =mysqli_query($conn,$insert_query); 
  				// check inserted or not   			
  				if($query_insert_exe){
    				$msg->success('Subject Name Added Success-full');
 					header("location:admin_subject_name.php");
					exit;
				}else{
  					$msg->error('Server Error Occured Please Contact Mantaince Person');
 					header("location:admin_subject_name.php");
					exit;
				}

      		}else{
      			$msg->error('Subject Name Is Already Present');
 				header("location:admin_subject_name.php");
				exit;
			}
		}
	}else{
		// $msg->error('Subject Name Is Already Present');
 		header("location:logout.php");
		exit;
	}		
}else{
	header('Location:logout.php');
	exit;
}
?>