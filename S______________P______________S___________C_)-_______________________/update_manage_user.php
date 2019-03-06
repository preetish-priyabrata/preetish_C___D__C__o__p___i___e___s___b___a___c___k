<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
if($_SESSION['user']=="admintech@gmail.com")
{
	
	
	//GET DATA
	function test_input($data)
	{
		 $data = trim($data);
		 $data = stripslashes($data);
		 $data = htmlspecialchars($data);
		 return $data;
	}
	$utype2= test_input($_REQUEST['utype2']);
	$uname2= test_input($_REQUEST['uname2']);
	$phone2= test_input($_REQUEST['phone2']);
	$pw2= test_input($_REQUEST['pw2']);
	
	//insert into "user_master_data" table
	$qry="UPDATE `user_master_data` SET `phoneno`= '$phone2',`password`='$pw2',`datetime`=NOW() WHERE `usertype`='$utype2' AND `username`='$uname2'";
	
	$res= mysqli_query($conn, $qry);
	if($res)
	{
	 $to = $uname2;
		$subject = 'SPSC login info..';
		$message = 'Your password : '.$pw2.'"\r\n"
					E-mail: '.$uname2.'"\r\n"
					Now you can login with this email and password.';
		mail($to, $subject, $message);
		if(mail($to, $subject, $message))
		{			
	 $_SESSION['muui_success'] = 1;
    session_write_close();
    header("Location:manage_user.php");
    exit;
	}
	else
	{
		$_SESSION['muui_error'] = 1;
		session_write_close();
    header("Location:manage_user.php");
    exit;
	}
	}

}
ob_clean();
?>
