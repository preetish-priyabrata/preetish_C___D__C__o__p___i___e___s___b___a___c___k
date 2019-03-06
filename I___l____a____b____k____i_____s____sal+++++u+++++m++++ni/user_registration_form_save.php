<?php
error_reporting(E_ALL);
session_start();
ob_start();
	include 'config.php';
require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();

if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$mobile=$_POST['mobile'];
	$join_pass_year=$_POST['join_pass_year'];
	$pass_year=$_POST['pass_year'];
	$stream=$_POST['stream'];
	$password=$_POST['password'];
	$cn_password=$_POST['cn_password'];
	// $reg_no=$_POST['reg_no'];
	$reg_no="1234";
	$dest="admin/upload/cadidate_reg_photo/";
	if(!empty($_FILES['img']['name'])){
		 $file_name=date('y-m-d').date('H:i:s').$_FILES['img']['name'];

		if(move_uploaded_file($_FILES['img']['tmp_name'],"$dest".$file_name)){
			$sql_query="INSERT into `master_user_registration`(`name`,`email`,`Mobile_no`,`join_pass_year`,`pass_year`,`stream`,`password`,`cn_password`,`reg_no`,`photo`) values('$name','$email','$mobile','$join_pass_year','$pass_year','$stream','$password','$cn_password','$reg_no','$file_name')";

  			$sql_exe=mysqli_query($conn,$sql_query); 			
  			// echo mysqli_error($conn);

  			if($sql_exe){
				echo 'Registration successfully';  
				 $msg->success('Registered Successfully '); 
				  $msg->success('Your Approval Details Shall We Sent Your Registered Email Id ');header("location:user_login.php");
    			exit;
			}else{
	       		 $msg->error('Image file is not attached '); 
	       		// header("location:index.php");
	       		header('Location:user_login.php');
    			exit;
			}
		
		//echo $_FILES['img']['error'];
	}else{
		 $msg->error('Network Failed'); 
		// header("location:index.php");
		header('Location:user_login.php');
    	exit;
	 }

}else{
	$msg->error('Network Failed'); 
	header("location:index.php");
	//header('Location:http://alumni.ksom.ac.in');
    exit;
  }
 
}else{
		$msg->error('Network Failed'); 
		header("location:index.php");
		//header('Location:http://alumni.ksom.ac.in');
    	exit;
}
  


?>