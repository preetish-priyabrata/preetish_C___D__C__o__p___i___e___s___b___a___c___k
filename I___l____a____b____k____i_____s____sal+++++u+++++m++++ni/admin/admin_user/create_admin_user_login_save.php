<?php

session_start();
ob_start();

//exit;
if(isset($_SESSION['admin_user'])){
    include '../config.php';
    require 'FlashMessages.php';
    $msg = new \Preetish\FlashMessages\FlashMessages();

    $email=mysqli_real_escape_string($conn,trim($_POST['email']));
    $pass=mysqli_real_escape_string($conn,trim($_POST['pwd']));
                                        
    $query_login="SELECT * FROM `admin_user_table` where `email`='$email' and `password`='$pass'";
    $sql_login=mysqli_query($conn,$query_login);   
    $login_num_row=mysqli_num_rows($sql_login);

    if($login_num_row==1)
    {
        //echo 'Welcome Alumni_Tech';
        $msg->success('Welcome To User Profile');
        header('Location:admin_user_dashboard.php');
        exit;  
    }

    else
    {
        $msg->error('Email/Password is Wrong.');
        header('Location:create_admin_user_login.php');
        exit;  
        
    }
}

else
    {
        $msg->error('Error in Connection.');
        header('Location:create_admin_user_login.php');
        exit;  
        
    }

?>