<?php

session_start();
ob_start();
if($_SESSION['alumni_tech']){
require 'FlashMessages.php';
include '../config.php';
$sl_no=$_POST['slno'];
$email=$_POST['email'];
// Array ( [slno] => 1 [email] => sunita@ilab.com [click] => Approved [submit] => Ok ) 
 $msg = new \Preetish\FlashMessages\FlashMessages();

      if ($_POST['click']=='Approved') {
             $query ="UPDATE `master_user_registration` set `status`='1' where `sl_no`='$sl_no'";
 

             $query_exe = mysqli_query($conn,$query);
             $sql_insert_personal="INSERT INTO `master_personal_profile`(`sl_no`, `user_id`) VALUES (NUll,'$email')";
             $query_exe_personal = mysqli_query($conn,$sql_insert_personal);
             $sql_insert_family="INSERT INTO `master_family_Profile`(`sl_no`, `user_id`) VALUES (NUll,'$email')";
             $query_exe_family = mysqli_query($conn,$sql_insert_family);
             $sql_insert_present_address="INSERT INTO `master_present_address_profile`(`sl_no`, `user_id`) VALUES (NUll,'$email')";
             $query_exe_present_address = mysqli_query($conn,$sql_insert_present_address);
             $sql_insert_permanet_address="INSERT INTO `master_permanent_address_profile`(`sl_no`, `user_id`) VALUES (NUll,'$email')";
             $query_exe_permanet_address = mysqli_query($conn,$sql_insert_permanet_address);
             $query_flag="INSERT INTO `profile_table_flag`(`sl_no`, `user_id`) VALUES (NUll,'$email')";
             $query_exe_flag= mysqli_query($conn,$query_flag);
             $msg->success('Approved Successfull');
             header("location:alumni_dashboard.php");
             
          }
      else{
             $query ="DELETE FROM `master_user_registration` WHERE `sl_no`='$sl_no'";
             $query_exe = mysqli_query($conn,$query);
             $msg->error('Profile Rejected');
             header("location:alumni_dashboard.php");
             exit;

          }

}else{
  header('Location:logout.php');
  exit;
}

?>