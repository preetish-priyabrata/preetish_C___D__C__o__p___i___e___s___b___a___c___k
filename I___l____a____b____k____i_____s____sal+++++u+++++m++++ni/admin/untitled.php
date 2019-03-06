<?php
// print_r($_REQUEST);
// exit;
error_reporting(4);
session_start();

require 'config.php';
require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();

// if(isset($_REQUEST['btn_login'])){
	/*
		user assign
	 */
     $userid=mysqli_real_escape_string($conn,trim($_POST['userid']));
     $pass=mysqli_real_escape_string($conn,trim($_POST['password']));
     if(isset($_REQUEST['userid'])){
	// print_r($_POST);
     $query_login="SELECT * FROM `master_alumni` where `user_id`='$userid' and `status`='1'";
	 $sql_login=mysqli_query($conn,$query_login);
     $login_num_row=mysqli_num_rows($sql_login);

     $query_login1="SELECT * FROM `admin_user_table` where `email`='$userid' and `status`='1'";
     $sql_login1=mysqli_query($conn,$query_login1);
     $manage_login_num_row=mysqli_num_rows($sql_login1);
     // exit();

     // $manage_login_num_row=0;

    if($login_num_row==1 && $manage_login_num_row==0){
            $res=mysqli_fetch_assoc($sql_login);
            if($res['user_id']=$userid && $res['password']==$pass)
            {
            $_SESSION['user_name']=$res['user_name']; 

            $_SESSION['alumni_tech']=$res['user_id'];                     
            $msg->success('Welcome Tech Alumni');
            header('Location:alumni_tech/alumni_dashboard.php');

            exit;

            }
            else{
                $msg->warning("Please Enter Correct Email id And Password", null, true);
                header('Location:index.php');
                exit; 
            }

    }else if($manage_login_num_row==1 && $login_num_row==0){
      $res=mysqli_fetch_assoc($sql_login1);
            if($res['email']==$userid && $res['password']==$pass)
            {
                $_SESSION['admin_user']=$userid;
                $_SESSION['adminid']=$res['sl_no'];
                $msg->success("Welcome Admin ".$userid, null, true);       
                header('Location:admin_user/admin_user_dashboard.php');
                exit;
            }else{
                $msg->warning("Please Enter Correct Email id And Password", null, true);
                header('Location:alumni_final/index.php');
               
                exit; 
            }
    } else  {
     
                $msg->warning("Please Enter Correct Email id And Password", null, true);
                header('Location:alumni_final/index.php');
               
                exit; 
            }
    

 	
   }else{
	  $msg->warning("Please Fill Field", null, true);
	  header('Location:alumni_final/index.php');
      exit;
}

?>