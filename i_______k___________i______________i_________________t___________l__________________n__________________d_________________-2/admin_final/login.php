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

     $query_login="SELECT * FROM `kiit_master_user` where `user_id`='$userid' and `status`='1'";
     $sql_login=mysqli_query($conn,$query_login);
     $login_num_row=mysqli_num_rows($sql_login);

     $query_login1="SELECT * FROM `kiit_stud_login` where `email`='$userid' and `user_login_status`='1'";
     $sql_login1=mysqli_query($conn,$query_login1);
      $manage_login_num_row=mysqli_num_rows($sql_login1);
    
    // $manage_login_num_row=0;
     if($login_num_row==1 && $manage_login_num_row==0){
            $res=mysqli_fetch_assoc($sql_login);
            if($res['user_id']==$userid && $res['password']==$pass){
                $user_role=$res['user_role'];
              
               switch ($user_role) {
                    case '1':
                        $_SESSION['user_name']=$res['user_name']; 
                        $_SESSION['alumni_tech']=$res['user_id'];                     
                        $msg->success('Welcome Admin Operation');
                        header('Location:admin_operation/admin_dashboard.php');
                       break;
                    case '2':
                        $_SESSION['student']=$res['user_id'];
                        $_SESSION['user_name']=$res['user_name']; 
                        $_SESSION['student']=$res['user_id'];                     
                        $msg->success('Welcome Student');
                        header('Location:student/student_dashboard.php');
                       break;
                    // case '3':
                    //     $_SESSION['admin_user']=$res['user_id'];
                    //     $_SESSION['user_name']=$res['user_name']; 
                    //     $_SESSION['alumni_tech']=$res['user_id'];                     
                    //     $msg->success('Welcome Approver');
                    //     header('Location:admin_approver/admin_dashboard.php');
                    //    break;
                    // case '4':
                    //     $_SESSION['admin_user']=$res['user_id'];
                    //     $_SESSION['admin_moderator']=$res['user_id'];
                    //     $_SESSION['user_name']=$res['user_name']; 
                    //     $_SESSION['alumni_tech']=$res['user_id'];                     
                    //     $msg->success('Welcome Publisher');
                    //     header('Location:admin_publish/admin_dashboard.php');
                    //     break;
                    // case '5':
                    //     $_SESSION['admin_moderator']=$res['user_id'];
                    //     $_SESSION['user_name']=$res['user_name']; 
                    //     $_SESSION['alumni_tech']=$res['user_id'];                     
                    //     $msg->success('Welcome Admin Tech');
                    //     header('Location:admin_tech/admin_dashboard.php');
                    //    break;
                   default:
                      $msg->warning("Please Enter Correct Email id And Password", null, true);
                        header('Location:index.php');
                        exit; 
                       break;
               }

            exit;

            }else{
                $msg->warning("Please Enter Correct Email id And Password", null, true);
                header('Location:index.php');
                exit; 
            }

    }else if($manage_login_num_row==1 && $login_num_row==0){
      $res=mysqli_fetch_assoc($sql_login1);
            if($res['email']==$userid && $res['password']==$pass){
                $_SESSION['admin_user']=$userid;
                $_SESSION['adminid']=$res['sl_no'];
                $msg->success("Welcome Admin ".$userid, null, true);       
                header('Location:student/student_dashboard.php');
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
      header('Location:index.php');
      exit;
}

?>