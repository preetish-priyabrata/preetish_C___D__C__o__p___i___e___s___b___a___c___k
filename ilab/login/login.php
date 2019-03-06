<?php
// print_r($_REQUEST);
error_reporting(4);
session_start();

require 'config.php';
require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 // check whether it is come admin or any hackerto tying pass
if($_REQUEST['login_admin']=='chech_admin'){
	//Array ( [user_id] => hello [pass_id] => 123 [login_admin] => chech_admin [submit] => SIGN IN ) 
	$user_id=trim($_REQUEST['user_id']);
	$pass_id=trim($_REQUEST['pass_id']);
	$sql_query="SELECT * FROM `master_admin` WHERE  `email`='$user_id' AND `status`='1' ";

	$sql_exe=mysqli_query($conn,$sql_query);
	$num=mysqli_num_rows($sql_exe);
	
	if($num=='0'){
		$msg->error(' User-Id & Password Is Invalid Please Try Again !!!');
    	header('Location:index.php');
    	exit;
	}else if($num=='1'){
		$fetch_detail=mysqli_fetch_assoc($sql_exe);
		if($fetch_detail['email']==$user_id && $fetch_detail['password']==$pass_id){
			$_SESSION['admin_user']=$userid;
            $_SESSION['user_name']=$fetch_detail['user_name'];  
            $_SESSION['admin_type']="Admin User";                      
            $msg->success('Welcome '.ucwords($$fetch_detail['user_name']));
            header('Location:admin_dashboard.php');
            exit;  
		}else{
			$msg->error(' User-Id & Password Is Invalid Please Try Again !!!');
    		header('Location:index.php');
    		exit;
		}
	}else{
		$msg->error(' User-Id & Password Is Invalid Please Try Again !!!');
    	header('Location:index.php');
    	exit;
	}
}else{
	$msg->error(' User-Id & Password Is Invalid Please Try Again !!!');
    header('Location:index.php');
    exit;
}