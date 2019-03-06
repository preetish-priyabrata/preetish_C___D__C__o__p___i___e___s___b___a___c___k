<?php
error_reporting(4);
session_start();
print_r($_POST);
//exit();
require '../config.php';
require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();

   $userid=mysqli_real_escape_string($conn,trim($_POST['userid']));
   $pass=mysqli_real_escape_string($conn,trim($_POST['password']));
                                        
  
     $query_login="SELECT * FROM `master_admin` where `user_id`='$userid' and `status`='1'";
     $sql_login=mysqli_query($conn,$query_login);   
     $login_num_row=mysqli_num_rows($sql_login);

     $query_login1="SELECT * FROM `master_student_user` WHERE `student_redg_no` ='$userid' `password`='$pass'";
     $sql_login1=mysqli_query($conn,$query_login1);   
     $login_num_row1=mysqli_num_rows($sql_login1);
      
    
      
      if(($login_num_row==1) && ($login_num_row1==0)){
      $res=mysqli_fetch_assoc($sql_login);
      if($res['user_id']==$userid && $res['password']==$pass){
              $_SESSION['title']="ADMIN DASHBOARD";
              $_SESSION['admin_tech']=$userid;
              $_SESSION['admin_type']="Master";
              $_SESSION['user_name']=$res['user_name'];                   
              $msg->success('Welcome Admin  ');
              header('Location:admin/admin_dashboard.php');
              exit;
      }else{
            $msg->error('Invalid User');
            header('Location:index.php');
            exit; 
           }

      }else if(($login_num_row==0) && ($login_num_row1==1)){

        $res=mysqli_fetch_assoc($sql_login1);
         if($res['user_id']==$userid && $res['password']==$pass){
           $user_role = $res['user_role'];
          
         switch($user_role){
         // here admin
            case "1":
            $_SESSION['admin_tech']=$userid;
            $_SESSION['user_name']=$res['user_name'];                      
            $msg->success('Welcome Tech Admin  ');
            header('Location:admin_tech/admin_dashboard.php');
            exit;
            break;

            case '2':
            // here student
                  
            $_SESSION['user_student']=$userid;
            $_SESSION['password']==$pass)
            $_SESSION['student_redg_no']=$res['student_redg_no'];                      
            $msg->success('Welcome  Student ');
            header('Location:student/student_dashboard.php');
            exit;
            break;
           
                
            case '3':

            $msg->error('Invalid User');
            header('Location:index.php');
            exit; 
            break;

            case '4':
            $msg->error('Invalid User');
            header('Location:index.php');
            exit; 
            break;  

            default:
            $msg->error('Invalid User');
            header('Location:index.php');
            exit; 
            break;
          }
      
          
        }else{
        $msg->error('Invalid User');
        header('Location:index.php');
        exit; 
        }

    }else{
        $msg->error('Invalid User');
        header('Location:index.php');
        exit;
     }

                                