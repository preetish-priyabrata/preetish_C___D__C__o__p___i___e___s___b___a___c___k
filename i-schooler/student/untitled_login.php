<?php
error_reporting(4);
session_start();

require '../config.php';
require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();

   $userid=mysqli_real_escape_string($conn,trim($_POST['userid']));
   $pass=mysqli_real_escape_string($conn,trim($_POST['password']));
                                        
   
     $query_login="SELECT * FROM `master_admin` where `user_id`='$userid' and `status`='1'";
     $sql_login=mysqli_query($conn,$query_login);   
     $login_num_row=mysqli_num_rows($sql_login);

     $query_login1="SELECT * FROM `master_teacher_user` where `teacher_email`='$userid' and `status`='1'";
     $sql_login1=mysqli_query($conn,$query_login1);   
     $login_num_row1=mysqli_num_rows($sql_login1);

    // $query_login2="SELECT * FROM `master_student_user` where `student_redg_no`='$userid' and `status`='1'";
    // $sql_login2=mysqli_query($conn,$query_login2);   
    // $login_num_row2=mysqli_num_rows($sql_login2);
     $query_login2="SELECT * FROM `master_student_user` WHERE `student_redg_no` ='$userid' `password`='$pass'";
     $sql_login2=mysqli_query($conn,$query_login2);   
     $login_num_row2=mysqli_num_rows($sql_login2);

    $login_num_row1=0;   $login_num_row=0;
    if(($login_num_row==1) && ($login_num_row1==0) && ($login_num_row2==0)){

        $res=mysqli_fetch_assoc($sql_login);
        if($res['user_id']==$userid && $res['password']==$pass){
           $user_role = $res['user_role'];
          
           switch($user_role){

            case "1":
            $_SESSION['admin_tech']=$userid;
            $_SESSION['user_name']=$res['user_name'];                      
            $msg->success('Welcome Tech Admin  ');
            header('Location:admin_tech/admin_dashboard.php');
            break;

            case "2":
            $_SESSION['user_principal']=$userid;
            $_SESSION['user_principal_name']=$res['user_name'];                      
            $msg->success('Welcome Principal');
            header('Location:principal/principal_dashboard.php');
            break;

            default:
            $msg->error('User-Id & Password Is Invalid Please Try Again !!!');
            header('Location:index.php');
      
            }                      
                     
        }else{
            $msg->error(' User-Id & Password Is Invalid Please Try Again !!!');
            header('Location:index.php');
            exit;
            }        

       }

       else if(($login_num_row1==1) && ($login_num_row==0) && ($login_num_row2==0)){
            $res=mysqli_fetch_assoc($sql_login1);
            if($res['teacher_email']==$userid && $res['password']==$pass){
            $_SESSION['user_teacher']=$userid;
            $_SESSION['user_teacher_name']=$res['teacher_name'];
            $_SESSION['teacher_id']=$res['slno'];                      
            $msg->success('Welcome  Teacher  ');
            header('Location:teacher/teacher_dashboard.php');
            
        }

       else if(($login_num_row1==1) && ($login_num_row==0) && ($login_num_row2==1)){
            $res=mysqli_fetch_assoc($sql_login1);
            if($res['student_redg_no']==$userid && $res['password']==$pass){
            $_SESSION['user_student']=$userid;
            // $_SESSION['user_student_name']=$res['user_name'];
            $_SESSION['student_redg_no']=$res['student_slno'];                      
            $msg->success('Welcome  Student ');
            header('Location:student/student_dashboard.php');
            
        }


    else{
             $msg->error(' User-Id & Password Is Invalid Please Try Again !!!');
             header('Location:index.php');
             exit;
        }
    }else if(($login_num_row1==0) && ($login_num_row==0) && ($login_num_row2==1)){
             echo "well";

    }else if(($login_num_row1==0) && ($login_num_row==0) && ($login_num_row2==0)){
            $msg->error(' User-Id & Password Is Invalid Please Try Again !!!');
            header('Location:index.php');
            exit;
    }