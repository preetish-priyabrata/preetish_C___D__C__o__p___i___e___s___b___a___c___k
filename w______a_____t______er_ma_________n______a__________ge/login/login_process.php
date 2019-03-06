<?php
// print_r($_POST);
include '../webconfig/config.php';
session_start();
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
// Array ( [userid] => admin@ilab.com [password] => 1234 ) 
$userid=mysqli_real_escape_string($conn,trim($_POST['userid']));
$password=mysqli_real_escape_string($conn,trim($_POST['password']));

if(!empty($password) && !empty($userid)){
 	$query_login="SELECT * FROM `ilab_water_master_admin` where `admin_email`='$userid' and `status`='1'";
    $sql_login=mysqli_query($conn,$query_login);   
    $login_num_row=mysqli_num_rows($sql_login);
    if($login_num_row==1){
    	$result_login=mysqli_fetch_assoc($sql_login);
    	$password_db=$result_login['pasword_hash'];
    	$enter_password_hash=md5($password);
    	
    	if($password_db==$enter_password_hash){
    		$_SESSION['email_id']=trim($_POST['userid']);
    		$_SESSION['user_name']=trim($result_login['admin_name']);
    		$msg->success('Welcome Admin Dashboard');
    		header('Location:../admin/admin_dashboard.php');
	    	exit;
	    }else{
    		$msg->error('Invalid Email Id and Password1');
	    	header('Location:index.php');
	    	exit;
    	}

    }else{
    	$msg->error('Invalid Email Id and Password');
	    header('Location:index.php');
	    exit;	
    }

}else{
	$msg->error('Field Should Not Left Blank');
    header('Location:index.php');
    exit;
}


?>