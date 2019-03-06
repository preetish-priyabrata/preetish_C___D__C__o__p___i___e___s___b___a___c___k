<?php
error_reporting(0);
session_start();
    include 'config.php';
    require 'FlashMessages.php';
    $msg = new \Preetish\FlashMessages\FlashMessages();

       
        $email=$_POST['email'];
        $reg_no=$_POST['reg_no'];
        $password=$_POST['password'];
        $query="SELECT * FROM `master_user_registration`  WHERE `email`='$email' and `status`='1'";
        $result=mysqli_query($conn,$query);
        $num=mysqli_num_rows($result);

    //echo mysqli_error($conn);
    if($num==1){
        $fetch_details=mysqli_fetch_assoc($result);
        // if($reg_no==$fetch_details['reg_no'] && $password==$fetch_details['password']){
        if( $password==$fetch_details['password']){
            $_SESSION['update_profile']=$fetch_details['update_profile'];
            $_SESSION['reg_no']=$fetch_details['reg_no'];
            $_SESSION['email']=$fetch_details['email'];
            $_SESSION['name']=$fetch_details['name'];
            $_SESSION['photo']=$fetch_details['photo'];
            $_SESSION['sl_no']=$fetch_details['sl_no'];
            $_SESSION['Year']=$fetch_details['pass_year'];
            $_SESSION['Stream']=$fetch_details['stream'];
            $_SESSION['Mobile']=$fetch_details['Mobile_no'];

            $msg->success('Welcome '.$fetch_details['name']);
            // header("location:update_details.php");
            header("location:admin/user_student/alumni_dashboard.php");
	        exit;
       }else{
       $msg->error('Insert Properly');
       	
        header('location:user_login.php');
        exit;

       }
    }
    else{
	
	$msg->error('Incorrect Username and Password, Please login with proper ID and Password.');
	header("location:user_login.php");
	exit;

    }


?>