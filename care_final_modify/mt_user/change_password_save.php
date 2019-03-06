<?php
session_start();
ob_start();
if($_SESSION['mt_user']){
  include  '../config_file/config.php';
  require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();

  $password1=mysqli_real_escape_string($conn,$_POST['password1']);
 $password1_md=md5($password1);
 $user_id=mysqli_real_escape_string($conn,$_SESSION['mt_user']);
  $update="UPDATE `care_master_admin_info` SET `cama_password`='$password1_md', `cama_pass_id`='$password1' WHERE `cama_email`='$user_id'";
 
 $sql_exe__insert_admin=mysqli_query($conn,$update);
     if($sql_exe__insert_admin){ //check if error is in the record
          $msg->success('SuccessFully Password Is changed');
          header('Location:index.php');
          exit;
        }else{
          $msg->error('Some Problem Occur');
          header('Location:index.php');
          exit;
        }

 }else{
  header('Location:logout.php');
  exit;
}