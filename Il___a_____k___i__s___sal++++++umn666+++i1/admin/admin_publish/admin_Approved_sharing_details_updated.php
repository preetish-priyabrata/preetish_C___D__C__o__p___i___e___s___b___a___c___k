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
      if ($_POST['click']=='Approved') {
             $query ="UPDATE `user_sharing_info_details` set `status`='1',`date_approved`='$date',`time_approved`='$time' where `sl_no`='$sl_no'";
 

             $query_exe = mysqli_query($conn,$query);
             $query_info ="UPDATE `user_sharing_Info` set `admin_status`='1',`admin_id`='$alumni_tech',`approve_date`='$date',`approve_time`='$time' where `sl_no`='$sl_no'";           
               $query_exe = mysqli_query($conn,$query_info);

             $msg->success('Successfull Published');
             header("location:admin_dashboard.php");
          }
      else{
             $query ="UPDATE `user_sharing_info_details` set `status`='2',`date_approved`='$date',`time_approved`='$time' where `sl_no`='$sl_no'";
             $query_exe = mysqli_query($conn,$query);
              $query_info ="UPDATE `user_sharing_Info` set `admin_status`='1' ,`admin_id`='$alumni_tech',`approve_date`='$date',`approve_time`='$time' where `sl_no`='$sl_no'";  
                 $query_exe = mysqli_query($conn,$query_info);
             $msg->error('Rejected');
             header("location:admin_dashboard.php");
             exit;

          }

}else{
  header('Location:logout.php');
  exit;
}
