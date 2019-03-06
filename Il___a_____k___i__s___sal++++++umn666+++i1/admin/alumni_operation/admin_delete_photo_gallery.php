<?php

    session_start();
    ob_start();
    


if(isset($_SESSION['alumni_tech'])){
      require 'FlashMessages.php';
      include '../config.php';
      //$sl_no=$_GET['sl_no'];
      $msg = new \Preetish\FlashMessages\FlashMessages();

  if ($_POST['click']=='Delete') {
     $sl_no=$_POST['sl_no'];
     $result = mysqli_query("DELETE * FROM upload_photo_gallery WHERE sl_no=$sl_no")
     or die(mysqli_error());
     $exe=mysql_query($conn,$result);
     
     $msg->success('Image delete Success-full');
     header("location:admin_upload_photo_gallery_view.php");
     exit;
     }
     else{
     $msg->error('Image delete Not Success-full');
     header("Location:admin_upload_photo_gallery_view.php");
     exit;
    }

}
else
  {
  $msg->error('Please check your internet');
  header("Location:admin_upload_photo_gallery_view.php");
  exit;
  }


?>