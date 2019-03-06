<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";

if($_SESSION['user']=="admintech@gmail.com" OR $_SESSION['admintech exam'])
{
	
	
	//GET DATA
	function test_input($data)
	{
		 $data = trim($data);
		 $data = stripslashes($data);
		 $data = htmlspecialchars($data);
		 return $data;
	}
	$utype1= test_input($_REQUEST['utype1']);
	$uname1= test_input($_REQUEST['uname1']);
	$phone1= test_input($_REQUEST['phone1']);
	
	// Generating Password
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
	$pass = substr( str_shuffle( $chars ), 0, 8 );
	$password= sha1($password); //Encrypting Password
	
	//insert into "user_master_data" table
	$qry="INSERT INTO `user_master_data`(`slno`, `usertype`, `username`, `phoneno`, `password`, `datetime`) VALUES (NULL, '$utype1', '$uname1', '$phone1', '$pass', NOW())";
	
	$res= mysqli_query($conn, $qry);
	if($res)
	{
	 $to = $uname1;
		$subject = 'SPSC '.$utype1.'  login info..';
		$message = "Your password : ".$pass." \r\n
					E-mail: ".$uname1." \r\n Now you can login with this email and password.";
		mail($to, $subject, $message);
		if(mail($to, $subject, $message))
		{			
	 $_SESSION['mui_success'] = 1;
    session_write_close();
    header("Location:manage_user.php");
    exit;
	}
	else
	{
		$_SESSION['mui_error'] = 1;
		session_write_close();
    header("Location:manage_user.php");
    exit;
	}
	}

}
ob_clean();
?>
