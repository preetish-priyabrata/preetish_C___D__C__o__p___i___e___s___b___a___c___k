<?php
session_start();
if($_SESSION['admin_emails']){
require 'config.php';
	$mobile=$_REQUEST['user_mobiles'];
	if($mobile!=""){
		$query="SELECT * FROM `rhc_master_login_user` WHERE `user_mobile`='$mobile'";
		$sql_exe=mysqli_query($conn,$query);
		$nun=mysqli_num_rows($sql_exe);
		if($nun==0){
			echo "1";
			return;
		}else{
			echo "2";
			return;
		}
	}else{
		echo "3";
		return;
	}

}else{
	header('Location:logout.php');
}	exit;