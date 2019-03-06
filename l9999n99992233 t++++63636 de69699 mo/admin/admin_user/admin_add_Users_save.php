<?php
session_start();
if($_SESSION['admin']){
	require 'FlashMessages.php';
	require 'config.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
// Array ( [name_user] => sam [user_id] => sam007 [email_id] => ppriyabrata8888@gmail.com [designation_name] => test [mobile_no] => 34343343 [dob] => 01/31/1980 [user_role] => 1 [headquarter] => hq1 ) 
// 
// Array ( [name_user] => sam [user_id] => sam007 [email_id] => ppriaybrata8888@gmail.com [designation_name] => test [mobile_no] => 00000 [dob] => 08/28/2017 [user_role] => 2 [headquarter] => hq1 ) 
// 
// Array ( [name_user] => sam [user_id] => sam007 [email_id] => ppriyabrat8888@gmail.com [designation_name] => test [mobile_no] => 9040777073 [dob] => 09/01/2017 [user_role] =>3 [headquarter] => hq1 [site_store_name] =>ggg ) 
// 
// Array ( [name_user] => sam [user_id] => sam007 [email_id] => ppriyabrata8888@gmail.com [designation_name] => test [mobile_no] => 9040777073 [dob] => 09/02/2017 [user_role] => 4 [headquarter] => hq1 [site_store_name] => zonal001 [site_field_name] => field001 ) 
// 


	$name_user=$_POST['name_user'];
	// $user_id=$_POST['user_id'];
	$email_id=$_POST['email_id'];
	$designation_name=$_POST['designation_name'];
	$mobile_no=$_POST['mobile_no'];
	$dob=date('Y-m-d',strtotime(trim($_POST['dob'])));;
	$user_role=$_POST['user_role'];
	$headquarter=$_POST['headquarter'];

	$oldpassword=mt_rand();
	$oldpassword_hash = md5($oldpassword);
	$oldpassword_hash_id = $oldpassword;
	$date=date('Y-m-d');
	$time=date('H:i:s');

	 // check user email id is present in database
	$check="SELECT * FROM `lt_master_user_system` WHERE `user_email`='$email_id'";
	$sql_exe_check=mysqli_query($conn,$check);
	$num_check=mysqli_num_rows($sql_exe_check);
	if($num_check=="0"){

		switch ($user_role) {
			case '1': // FOR HEADQUATER 
				$sql_insert="INSERT INTO `lt_master_user_system`(`u_slno`, `user_name`, `user_email`,`user_mobile`, `user_pass`,`password`, `user_designation`, `user_dob`, `user_level`, `hq_store_id`, `date`, `time`) VALUES (NULL,'$name_user','$email_id','$mobile_no','$oldpassword_hash','$oldpassword_hash_id','$designation_name','$dob','$user_role','$headquarter','$date','$time')";
				break;
			case '2': // FOR APPROVER USE4
				$sql_insert="INSERT INTO `lt_master_user_system`(`u_slno`, `user_name`, `user_email`,`user_mobile`, `user_pass`,`password`, `user_designation`, `user_dob`, `user_level`, `hq_store_id`, `date`, `time`) VALUES (NULL,'$name_user','$email_id','$mobile_no','$oldpassword_hash','$oldpassword_hash_id','$designation_name','$dob','$user_role','$headquarter','$date','$time')";
				break;
			case '3': // FOR SITE STORE KEEPER	
				$site_store_name=$_POST['site_store_name'];
				$sql_insert="INSERT INTO `lt_master_user_system`(`u_slno`, `user_name`, `user_email`,`user_mobile`, `user_pass`,`password`, `user_designation`, `user_dob`, `user_level`, `hq_store_id`, `sub_site_store_id`, `date`, `time`) VALUES (NULL,'$name_user','$email_id','$mobile_no','$oldpassword_hash','$oldpassword_hash_id','$designation_name','$dob','$user_role','$headquarter','$site_store_name','$date','$time')";
				break;
			case '4': // FOR FIELD STORE KEEPER
				$site_store_name=$_POST['site_store_name'];
				$site_field_name=$_POST['site_field_name'];
				$sql_insert="INSERT INTO `lt_master_user_system`(`u_slno`, `user_name`, `user_email`, `user_mobile`,`user_pass`,`password`, `user_designation`, `user_dob`, `user_level`, `hq_store_id`, `sub_site_store_id`, `sub_field_store_id` , `date`, `time`) VALUES (NULL,'$name_user','$email_id','$mobile_no','$oldpassword_hash','$oldpassword_hash_id','$designation_name','$dob','$user_role','$headquarter','$site_store_name','$site_field_name','$date','$time')";
				break;
			
			default:
				header('Location:logout.php');
				exit;
				break;
		}
		
		$sql_exe_insert=mysqli_query($conn,$sql_insert);
	 	// execute query

	 	$last_id=mysqli_insert_id($conn);
	 	// findind last inserted query
	 	$user_id="user_00".$last_id;

	 	$update="UPDATE `lt_master_user_system` SET `user_id`='$user_id' WHERE `u_slno`='$last_id'";
		$sql_exe_update=mysqli_query($conn,$update);

		$subject = "This Mail Is regarding For Creating User In L&T System";
		$to = $email_id;

		$from = "info@innovadorslab.co.in";

		//data
		$message1 = "NAME: "  .$name_user    ."<br>\n";
		$message1 .= "EMAIL: "  .$email_id    ."<br>\n";
		$message1 .= "PASSWORD: "  .$oldpassword_hash_id    ."<br>\n";
		$message1 .= "WEBSITE: http://innovadorslab.co.in/lntdemo<br>\n";
		

		//Headers
		
		$headers = "From:info@innovadorslab.com \r\n";
		$headers .= "Bcc:ppriyabrata8888@gmail.com \r\n";
		 $headers .= "MIME-Version: 1.0\r\n";
         $headers .= "Content-type: text/html\r\n";

		if(mail($to, $subject, $message1, $headers)){

		$msg->success('Successfull Save In our Record');
	 	header('Location:admin_add_Users.php');
		exit;
		}else{
			$msg->success('Successfull Save In our Record');
	 		header('Location:admin_add_Users.php');
			exit;
		}

	}else{
		$msg->error('Email id already exist In our please try another Email ids');
		header('Location:admin_add_Users.php');
		exit;
	}

}else{
	header('Location:logout.php');
	exit;
}
