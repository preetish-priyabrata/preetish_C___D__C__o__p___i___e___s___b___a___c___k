<?php
// print_r($_POST);
//exit;
error_reporting(4);
session_start();
require 'config.php';
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();

    // Array ( [email_id] => user@ilab.com [pass_word] => 1234 ) 
    $uid=mysqli_real_escape_string($conn,trim($_POST['email_id']));
    $pwd=mysqli_real_escape_string($conn,trim($_POST['pass_word']));

    // student check present or not
    if(isset($_POST['login']))
    {
     $query_login="SELECT * FROM `tbl_login_student` WHERE `L_student_email`= '$uid' and `L_password`='$pwd'";

     $sql_login=mysqli_query($conn,$query_login);   
     $login_num_row=mysqli_num_rows($sql_login);

     // next table where user viewer table information is stored
      if($login_num_row==1)
     {

            $msg->success('Welcome Student');
            header('Location:student/student_dashboard.php');
            exit; 
    }
     else
        {
            $msg->error('Invalid User');
            header('Location:index.php');
            exit; 
        }
    }
     else
        {
            $msg->error('Invalid User');
            header('Location:index.php');
            exit; 
        }

  ?>
