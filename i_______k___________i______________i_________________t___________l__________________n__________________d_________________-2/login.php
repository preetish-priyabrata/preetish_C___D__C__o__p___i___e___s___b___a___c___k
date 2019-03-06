<?php
// print_r($_REQUEST);
// exit;
error_reporting(4);
session_start();
include 'admin_final/config.php';
require 'admin_final/FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();

// if(isset($_REQUEST['btn_login'])){
     /*Array ( [userid] => siprah@gmail.com [password] => 1234 )
     user assign
     */
     $userid=mysqli_real_escape_string($conn,trim($_POST['userid']));
     $pass=mysqli_real_escape_string($conn,trim($_POST['password']));

     $query_login="SELECT * FROM `kiit_master_user` where `user_id`='$userid' and `status`='1'";
     $sql_login=mysqli_query($conn,$query_login);
     $login_num_row=mysqli_num_rows($sql_login);

    $query_login1="SELECT * FROM `kiit_stud_login` where `email`='$userid' and `user_login_status`='1'";
    $sql_login1=mysqli_query($conn,$query_login1);
    $manage_login_num_row=mysqli_num_rows($sql_login1);

    if($login_num_row==1 && $manage_login_num_row==0){
        $res=mysqli_fetch_assoc($sql_login);
        if($res['user_id']==$userid && $res['password']==$pass){
           $user_role=$res['user_role'];
            switch ($user_role) {
                case '1':
                    $_SESSION['user_name']=$res['user_name']; 
                    $_SESSION['alumni_tech']=$res['user_id'];                     
                    $msg->success('Welcome Admin Operation');
                    header('Location:admin_final/admin_operation/admin_dashboard.php');
                   break;
                default:
                  $msg->warning("Please Enter Correct Email id And Password", null, true);
                    header('Location:login_new.php');
                    exit; 
                   break;
            }


        }else{
            $msg->warning("Please Enter Correct Email id And Password", null, true);
            header('Location:login_new.php');
            exit; 
        }

    }else if($manage_login_num_row==1 && $login_num_row==0){
        $res=mysqli_fetch_assoc($sql_login1);
            if($res['email']==$userid && $res['password']==$pass){
                $_SESSION['admin_user']=$userid;
                $_SESSION['adminid']=$res['sl_no'];
                $msg->success("Welcome Admin ".$userid, null, true);       
                header('Location:admin_final/student/student_dashboard.php');
                exit;
            }else{
                $msg->warning("Please Enter Correct Email id And Password", null, true);
                header('Location:login_new.php');
               
                exit; 
            }
    } else  {
     
                $msg->warning("Please Enter Correct Email id And Password", null, true);
                header('Location:login_new.php');
               
                exit; 
            }
              