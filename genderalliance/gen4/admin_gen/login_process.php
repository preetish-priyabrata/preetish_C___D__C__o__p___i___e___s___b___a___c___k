

  <?php
// print_r($_POST);
// exit;
// Array ( [email_id] => admin@ilab.com [pass_word] => 1234 ) <?php
error_reporting(4);
session_start();

require 'config.php';
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();

    $uid=mysqli_real_escape_string($conn,trim($_POST['email_id']));
    $pwd=mysqli_real_escape_string($conn,trim($_POST['pass_word']));

    // master admin check present or not
    
    $query_login="SELECT * FROM `gen_master_login` WHERE `email_id`= '$uid' and `status`='1'";
    $sql_login=mysqli_query($conn,$query_login);   
    $login_num_row=mysqli_num_rows($sql_login);

    // next table where user viewer table information is stored
    // $query_login1="SELECT * FROM `lt_master_user_system` WHERE `user_email`='$userid' and `u_status`='1'";
    // $sql_login1=mysqli_query($conn,$query_login1);   
    // $login_num_row1=mysqli_num_rows($sql_login1);
    $login_num_row1=0;

     if(($login_num_row==1) && ($login_num_row1==0)){
        $res=mysqli_fetch_assoc($sql_login);
        if($res['email_id']==$uid && $res['password']==$pwd){
            $_SESSION['title']="ADMIN DASHBOARD";
            // $_SESSION['admin']=$userid;
            // $_SESSION['admin_type']="Master user";
            // $_SESSION['user_name']=$res['user_name'];
            //$_SESSION['L_student_roll']=$res['L_student_roll'];
            $_SESSION['userId'] = 'admin';
            $_SESSION['user_name']=$res['user_name'];
            $msg->success('Welcome Admin');
            header('Location:admin/admin_dashboard.php');
            exit;
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