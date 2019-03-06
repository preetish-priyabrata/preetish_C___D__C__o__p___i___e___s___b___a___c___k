<?php

session_start();
ob_start();
if(isset($_SESSION['admin_moderator'])){
require 'FlashMessages.php';
include '../config.php';
$slno=$_POST['slno'];
$admin_moderator=$_SESSION['admin_moderator'];
 $msg = new \Preetish\FlashMessages\FlashMessages();
$date=date('Y-m-d');
$time=date('H:i:s');
      if ($_POST['click']=='Approved') {
             $query ="UPDATE `admin_user_post` set `status`='1',`date`='$date',`time`='$time' where `slno`='$slno'";
 

             $query_exe = mysqli_query($conn,$query);
             $msg->success('Approved Successfull');
             header("location:admin_dashboard.php");
          }
      else{
             $query ="UPDATE `admin_user_post` set `status`='2',`date`='$date',`time`='$time' where `slno`='$slno'";
             $query_exe = mysqli_query($conn,$query);
             $msg->error('Rejected');
             header("location:admin_dashboard.php");
             exit;

          }

}else{
  header('Location:logout.php');
  exit;
}

?>