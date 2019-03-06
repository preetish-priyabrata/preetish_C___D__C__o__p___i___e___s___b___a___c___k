<?php
error_reporting(4);
session_start();
ob_start();
print_r($_POST);
print_r($_FILES);
//exit();
if($_SESSION['user_principal']){
	include '../config.php';
	require 'FlashMessages.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();
	//Array ( [u_name] => meera [u_redg] => 123 [u_class] => 1st [u_section] => A [u_batch] => 2nd [u_jointsection] => C [u_jointbatch] => 2 [u_gender] => 0 [u_dob] => 92-02-23 [u_parentnm] => sasmita [u_parentph] => 9542986785 [Submit] => Submit ) 

	
		//$userid = $_POST['u_id'];
	if(isset($_POST['Submit']))
	{
		$s_name = $_POST['u_name'];
		$s_current_class = $_POST['u_class'];
		$s_current_section = $_POST['u_section'];
		$s_parent_ph_no = $_POST['u_parentph'];
		$s_parent_name =$_POST['u_parentnm'];
		$s_gender = $_POST['u_gender'];
		//$s_dob  = $_POST['u_dob'];
		$s_current_batch = $_POST['u_batch'];
		$s_join_batch = $_POST['u_jointbatch'];
		$s_join_section = $_POST['u_jointsection'];
		$s_redg_no = $_POST['u_redg'];
		$dir = "../assert/upload/student_pic";
		$file_name =date('h:i:s'). $_FILES['u_file']['name'];
		if(move_uploaded_file($_FILES['u_file']['tmp_name'],"$dir/".$file_name))
		{
	
		   $insert_query ="INSERT INTO `master_student_user`(`student_name`,`student_current_class`,`student_current_section`,`parent_ph_no`,`parent_name`,`student_gender`,`student_current_batch`,`student_join_batch`,`student_join_section`,`student_redg_no`,`student_photo`)VALUES('$s_name','$s_current_class','$s_current_section','$s_parent_ph_no','$s_parent_name','$s_gender','$s_current_batch','$s_join_batch','$s_join_section','$s_redg_no','$file_name')";
			
			 $query_insert_exe = mysqli_query($conn,$insert_query);
					if($query_insert_exe)
					{
		      			$msg->success('Student Name Added Success-full');
 			 			header("location:admin_student_user.php");
			  			exit; 

			  		}
		    	  else
		      		{
			      	$msg->error('Please Contact Maintance Support Team');
	 			  	header("location:admin_student_user.php");
				  	exit;
			      	}
			}
		else
		{
		$msg->error('Server Error Occured Please Contact Mantaince Person');
 		header("location:admin_student_user.php");
		exit;
		}

     }
	 else
	  
	 {
	
 	  header("location:logout.php");
	  exit;
	 }
  }	

?>