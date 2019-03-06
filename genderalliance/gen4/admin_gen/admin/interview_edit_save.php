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


$title =$_POST['title'];
$url =$_POST['url'];
$sl_no = $_POST['sl_no'];

      
       $query = "UPDATE `gen_interview` SET `title`='$title',`url`='$url' where `sl_no`='$sl_no'";
          // echo $query;
      // echo $query1 = "SELECT * FROM  `gen_banner` where `sl_no`='$sl_no' AND `photo_name`='$file_name'";
        
          $query_exe = mysqli_query($conn,$query);
           
          if($query_exe){
            $msg->success('Updated Success-full');
            header("location:interview_edit.php?sl_no=".$sl_no);
            exit;
          }else{
           $msg->error('Please Contact Maintance Support Team');
            header("location:interview_view.php");
            exit;
          }
          // move over

}else{
  header('Location:logout.php');
  exit;
}

?>