<?php
session_start();
if($_SESSION['admin']){
  require 'FlashMessages.php';
  require 'config.php';
  $msg = new \Preetish\FlashMessages\FlashMessages();
 // print_r($_POST);
 // exit;

  $slno=$_POST['slno'];
  $field_name=$_POST['field_name'];

    // check unique no
  $check="SELECT * from `lt_master_field_place` where `field_name`='$field_name' ";
  $sql_check=mysqli_query($conn,$check);
  $num=mysqli_num_rows($sql_check); // check it number rows is affected 


   if($num==0){
          $query ="UPDATE `lt_master_field_place` SET `field_name`='$field_name' where `slno`='$slno'";
          $query_exe = mysqli_query($conn,$query);
          $msg->success('Successfull Field Name Is Edited In our record');
                header('Location:admin_location_add_Field_view.php');
                exit;
    
    }
  else{
         $msg->error('Field Name is already stored In our record');
               header('location:admin_dashboard.php');
               exit;
         }

   

}else{
  header('Location:logout.php');
  exit;
}