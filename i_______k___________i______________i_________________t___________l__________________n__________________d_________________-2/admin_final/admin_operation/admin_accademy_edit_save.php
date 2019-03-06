<?php
session_start();
ob_start();
if($_SESSION['alumni_tech']){
require 'FlashMessages.php';
include '../config.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
$title="Edit Academy";

 	
  $A_slno=$_POST['A_slno'];
  $A_name=$_POST['A_name'];

  // check unique no
  // $check="SELECT * from `kiit_accademy` where `A_name`='$A_name' ";
  // $sql_check=mysqli_query($conn,$check);
  // $num=mysqli_num_rows($sql_check); // check it number rows is affected 
   
          $query ="UPDATE `kiit_accademy` SET `A_name`='$A_name' where `A_slno`='$A_slno'";
          $query_exe = mysqli_query($conn,$query);

          if ($query_exe) {
          	 $msg->success('Successfull Academy Name Is Edited In our record');
                header('Location:admin_accademy_view.php');
                exit;
          }

    
        else{
	         $msg->error('Academy Name is already stored In our record');
	               header('location:admin_dashboard.php');
	               exit;
         }
  
}else{
	$msg->error(' Academy Name Edited Not Successfull');
  header('Location:logout.php');
  exit;
}
?>