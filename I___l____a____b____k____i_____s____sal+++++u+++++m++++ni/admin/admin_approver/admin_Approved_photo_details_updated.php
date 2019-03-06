<?php

session_start();
ob_start();
if(isset($_SESSION['alumni_tech'])){
require 'FlashMessages.php';
include '../config.php';
$sl_no=$_POST['slno'];
$alumni_tech=$_SESSION['alumni_tech'];
 $msg = new \Preetish\FlashMessages\FlashMessages();
$date=date('Y-m-d');
$time=date('H:i:s');
// Array ( [text_id] => 1 [slno] => 1 [click] => Approved [submit] => Verified ) 
      if ($_POST['click']=='Approved') {
             $query ="UPDATE `user_gallery_upload` SET `operation_status`='1',`moderator_status`='1',`approval_status`='1' WHERE`sl_no`='$sl_no'";
 

             $query_exe = mysqli_query($conn,$query);
             

             $msg->success('Approved Successfull');
             header("location:admin_dashboard.php");
          }
      else{
             $query ="UPDATE `user_gallery_upload` SET `operation_status`='1',`moderator_status`='1',`approval_status`='2' WHERE`sl_no`='$sl_no'";
 

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