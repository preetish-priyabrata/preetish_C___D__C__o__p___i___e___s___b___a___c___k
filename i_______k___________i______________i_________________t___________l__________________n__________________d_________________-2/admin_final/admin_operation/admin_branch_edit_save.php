<?php
session_start();
ob_start();
if($_SESSION['alumni_tech']){
require 'FlashMessages.php';
include '../config.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
$title="Edit Branch";

 	
  $B_slno=$_POST['B_slno'];
  $B_branch=$_POST['B_branch'];

    // check unique no
  $check="SELECT * from `kiit_branch` where `B_branch`='$B_branch' ";
  $sql_check=mysqli_query($conn,$check);
  $num=mysqli_num_rows($sql_check); // check it number rows is affected 


   if($num==0){
          $query ="UPDATE `kiit_branch` SET `B_branch`='$B_branch' where `B_slno`='$B_slno'";
          $query_exe = mysqli_query($conn,$query);
          $msg->success('Successfull Branch Name Is Edited In our record');
                header('Location:admin_branch_view.php');
                exit;
    
    }
  else{
         $msg->error('Branch Name is already stored In our record');
               header('location:admin_dashboard.php');
               exit;
         }

   

}else{
  header('Location:logout.php');
  exit;
}
