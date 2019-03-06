<?php
session_start();
ob_start();
if($_SESSION['employee_id']){
  include  '../config_file/config.php';
  require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();

  $password1=mysqli_real_escape_string($conn,$_POST['password1']);
 $password1_md=md5($password1);
 $user_id=mysqli_real_escape_string($conn,$_SESSION['employee_id']);
  $update="UPDATE `care_master_system_user` SET `password_hash`='$password1_md', `password`='$password1' WHERE `employee_id`='$user_id'";
 
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