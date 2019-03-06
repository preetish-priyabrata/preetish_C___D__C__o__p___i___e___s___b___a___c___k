<?php
error_reporting(4);
session_start();

require 'config.php';
require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();

   $userid=mysqli_real_escape_string($conn,trim($_POST['userid']));
   $pass=mysqli_real_escape_string($conn,trim($_POST['password']));
   
    $query_login="SELECT * FROM `master_admin` where `user_id`='$userid' and `status`='1'";
    $sql_login=mysqli_query($conn,$query_login);   
     $login_num_row=mysqli_num_rows($sql_login);

    $login_num_row1=0;
    if(($login_num_row==1) && ($login_num_row1==0)){

        $res=mysqli_fetch_assoc($sql_login);
        if($res['user_id']==$userid && $res['password']==$pass){
            $_SESSION['admin_tech']=$userid;
            $_SESSION['user_name']=$res['user_name'];  
            $_SESSION['admin_type']="Technical Admin";                      
            $msg->success('Welcome Tech Admin  ');
            header('Location:admin_tech/admin_dashboard.php');
            exit;          
        }else{
            $msg->error(' User-Id & Password Is Invalid Please Try Again !!!');
            header('Location:index.php');
            exit;
        }        

    }else if(($login_num_row1==1) && ($login_num_row==0)){
        echo "well";
    }else if(($login_num_row1==0) && ($login_num_row==0)){
        $msg->error(' User-Id & Password Is Invalid Please Try Again !!!');
        header('Location:index.php');
        exit;
    }