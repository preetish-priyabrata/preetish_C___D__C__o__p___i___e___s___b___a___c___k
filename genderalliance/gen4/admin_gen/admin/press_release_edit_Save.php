<?php

 error_reporting(4);
 session_start();
 ob_start();
 //print_r($_POST);
 //exit;
if(($_SESSION['userId']!="")){
  require 'FlashMessages.php';
  require 'config.php';
  $msg = new \Preetish\FlashMessages\FlashMessages(); 
  
$title=$_POST['title'];
$description = $_POST['description'];
$sl_no = $_POST['sl_no'];

$dest="../upload/";
  if(!empty($_FILES['photo_name']['name'])){
     $file_name=date('y-m-d').date('H:i:s').$_FILES['photo_name']['name'];

    if(move_uploaded_file($_FILES['photo_name']['tmp_name'],"$dest".$file_name)){
      
       $query = "UPDATE `gen_press_release` SET `title`='$title',`description`='$description',`photo_name`='$file_name' where `sl_no`='$sl_no'";
          // echo $query;
      // echo $query1 = "SELECT * FROM  `gen_banner` where `sl_no`='$sl_no' AND `photo_name`='$file_name'";
        
          $query_exe = mysqli_query($conn,$query);
           
          if($query_exe){
            $msg->success('Updated Success-full');
            header("location:press_release_edit.php?sl_no=".$sl_no);
            exit;
          }else{
           $msg->error('Please Contact Maintance Support Team');
            header("location:admin_dashboard.php");
            exit;
          }
          // move over
    }else{
     header('Location:logout.php');
     exit;
      }
   }else{
     $query = "UPDATE `gen_press_release` SET `description`='$description' where `sl_no`='$sl_no'";
     $query_exe = mysqli_query($conn,$query);
           
          if($query_exe){
            $msg->success('Updated Success-full');
            header("location:press_release_edit.php?sl_no=".$sl_no);
            exit;
          }else{
           $msg->error('Please Contact Maintance Support Team');
            header("location:admin_dashboard.php");
            exit;
          }
   }
}else{
  header('Location:logout.php');
  exit;
}

?>
  