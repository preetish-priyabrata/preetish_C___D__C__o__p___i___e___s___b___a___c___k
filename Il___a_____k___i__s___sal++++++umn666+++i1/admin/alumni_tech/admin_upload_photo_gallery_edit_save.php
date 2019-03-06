<?php
   error_reporting(4);
    session_start();
    ob_start();
    // print_r($_POST);


if($_SESSION['alumni_tech']){
      require 'FlashMessages.php';
      include '../config.php';
      
       $msg = new \Preetish\FlashMessages\FlashMessages();
     
    $sl_no=$_POST['sl_no'];
    $date=date('Y-m-d');
    $time= time('H:i:s');
    $photo=$_POST['img'];
   
    $swl=mysqli_query("UPDATE `upload_photo_gallery` SET `date`='$date', `time`= '$time' where `sl_no`='$sl_no' ") or die("can not connect to mysql");
    // echo "UPDATE demo SET name='$name', email= '$email',zip='$zip',country=$country,gender=$gender  where id='$id' " ;
    // exit(0);
    //$res=mysql_query($swl);
  if($swl)  
  { 
  if($_FILES['img']['name'])
  { 
    // if(isset($image))
    // {
    //  unlink($image);
    // }    
      $org_image=$sl_no."_".$_FILES['img']['name'];
      move_uploaded_file($_FILES['img']['tmp_name'],"../uploads/".$org_image);
      
      $update="UPDATE `upload_photo_gallery` SET `photo`='$org_image' WHERE `sl_no`='$sl_no'";
      mysqli_query($update);
  }
}
}
else{
        $msg->error('Please Contact Maintance Support Team');
        header("location:admin_upload_photo_gallery_view.php?sl_no=".$sl_no);
        exit;
        }


    
?>