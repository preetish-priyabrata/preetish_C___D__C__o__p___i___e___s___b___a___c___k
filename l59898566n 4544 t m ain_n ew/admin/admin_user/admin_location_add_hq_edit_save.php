<?php
session_start();
if($_SESSION['admin']){
  require 'FlashMessages.php';
  require 'config.php';
  $msg = new \Preetish\FlashMessages\FlashMessages();
 // print_r($_POST);
 // exit;

  $slno=$_POST['slno'];
  $headquarter=$_POST['hq_name'];


 $query ="UPDATE `lt_master_HQ_place` SET `hq_name`='$headquarter' where `slno`='$slno'";
 $query_exe = mysqli_query($conn,$query);
   
         if($query_exe){
              $msg->success('Successfull Headquarter Is Edited In our record');
              header('Location:admin_location_add_hq_view.php');
              exit;
         }else{
              $msg->error(' Headquarter Edited Not Successfull');
              header("location:admin_dashboard.php");
              exit;
         }

  
}else{
  header('Location:logout.php');
  exit;
}
