<?php
error_reporting(4);
session_start();

require 'config.php';
require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();

    $userid=mysqli_real_escape_string($conn,trim($_POST['userid']));
    $pass=mysqli_real_escape_string($conn,trim($_POST['password']));
                                        
   
    $query_login="SELECT * FROM `master_alumni` where `user_id`='$userid' and `password`='$pass'";
    $sql_login=mysqli_query($conn,$query_login);   
    $login_num_row=mysqli_num_rows($sql_login);

    if($sql_login)
    {
        //echo 'Welcome Alumni_Tech';
        $msg->success('Welcome Tech Alumni');
        header('Location:alumni_tech/alumni_dashboard.php');
        exit;  
    }

    else
    {
        echo'Error in Connection';
    }
    