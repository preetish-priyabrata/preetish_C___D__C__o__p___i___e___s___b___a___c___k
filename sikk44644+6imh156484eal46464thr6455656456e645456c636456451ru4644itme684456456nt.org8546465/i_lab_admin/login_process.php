<?php
// print_r($_POST);
// exit;
// Array ( [userid] => admin@ilab.com [password] => 1234 ) 
error_reporting(4);
session_start();
require 'config.php';
require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();

   $userid=mysqli_real_escape_string($conn,trim($_POST['userid']));
   $pass=mysqli_real_escape_string($conn,trim($_POST['password']));
                                        
   // SELECT * FROM `master_admin` where `user_id`='' and `status`='1'0

    $query_login="SELECT * FROM `master_admin` WHERE `user_id`='$userid' AND `status`='1'";
    $sql_login=mysqli_query($conn,$query_login);   
    echo $login_num_row=mysqli_num_rows($sql_login);
   
    if(($login_num_row==1)){

        $res=mysqli_fetch_assoc($sql_login);
        if($res['user_id']==$userid && $res['pass_hash']==md5($pass)){
           $user_role = $res['user_role'];
          
            switch($user_role){
              case "1":
                $_SESSION['admin_tech_s']="";
                $_SESSION['admin_preexam']="";
                $_SESSION['admin_tech']=$userid;
                $_SESSION['user_name']=$res['user_name'];                      
                $msg->success('Welcome Tech Admin  ');
                header('Location:admin_tech/index');
              break;
              case "2":
                $_SESSION['admin_tech_s']="";
                $_SESSION['admin_tech']="";
                $_SESSION['admin_preexam']=$userid;
                $_SESSION['user_name']=$res['user_name'];                      
                $msg->success('Welcome Pre-exam Admin  ');
                header('Location:admin_pre_exam/index');
              break;
              case "100":
                // $_SESSION['admin_tech']="";
                $_SESSION['admin_tech_s']=$userid;
                $_SESSION['admin_tech']=$userid;
                $_SESSION['admin_preexam']=$userid;
                $_SESSION['user_name']=$res['user_name'];                      
                $msg->success('Welcome Pre-exam Admin  ');
                header('Location:super/index');
              break;
            case "101":
                // $_SESSION['admin_tech']="";
                $_SESSION['admin_Pre_tech_s']=$userid;
                // $_SESSION['admin_tech']=$userid;
                // $_SESSION['admin_preexam']=$userid;
                $_SESSION['user_name']=$res['user_name'];                      
                $msg->success('Welcome Pre-exam Admin  ');
                header('Location:pre_super_exam/index');
              break;

              default:
                $msg->error(' User-Id & Password Is Invalid Please Try Again1 !!!');
                header('Location:index');
              break;  
           }
        }else{
          $msg->error(' User-Id & Password Is Invalid Please Try Again2 !!!');
          header('Location:index.php');
          exit;
        }        
    }else{
         $msg->error(' User-Id & Password Is Invalid Please Try Again3 !!!');
        header('Location:index.php');
        exit;
    }