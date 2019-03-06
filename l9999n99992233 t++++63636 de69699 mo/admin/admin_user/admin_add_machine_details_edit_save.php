<?php

 error_reporting(4);
 session_start();
 ob_start();
if($_SESSION['admin']){
  require 'FlashMessages.php';
  require 'config.php';
  $msg = new \Preetish\FlashMessages\FlashMessages(); 
  // here information is received 
  $slno=$_POST['slno'];
  $edit_type=$_POST['edit_type'];
  $machine_unique_id=$_POST['machine_unique_id'];
  $machine_name=$_POST['machine_name'];
  $client_name=$_POST['client_name'];
  //$model_no=$_POST['model_no'];
  $machine_commissioning=date('Y-m-d',strtotime(trim($_POST['machine_commissioning'])));
 
  if($edit_type=="Few"){
    $query ="UPDATE `lt_master_machine_detail` SET `machine_name`='$machine_name',`machine_commissioning`='$machine_commissioning' where `m_slno`='$slno'";
     $query_exe = mysqli_query($conn,$query);
   
         if($query_exe){
              $msg->success('Successfull Machine Details Are Edited In our record');
              header('Location:admin_add_machine_details_view.php');
              exit;
         }else{
              $msg->error('Machine Details Edited Not Successfull');
              header("location:admin_dashboard.php");
              exit;
         }

    }else if($edit_type=="ALL"){
       $model_no=$_POST['model_no'];
       $query1 ="UPDATE `lt_master_machine_detail` SET `machine_name`='$machine_name',`client_name`='$client_name',`m_model_no`='$model_no',`machine_commissioning`='$machine_commissioning' where `m_slno`='$slno'";
     $query_exe1 = mysqli_query($conn,$query1);

     if($query_exe1){
              $msg->success('Successfull1 All Machine Details Are Edited In our record');
              header('Location:admin_add_machine_details_view.php');
              exit;
         }else{
              $msg->error('Machine Details Edited Not Successfull');
              header("location:admin_dashboard.php");
              exit;
            }

  }else{
     $msg->error('Something went wrong');
     header("location:admin_dashboard.php");
     exit;
  }
    
  
}else{
  header('Location:logout.php');
  exit;
}

?>       