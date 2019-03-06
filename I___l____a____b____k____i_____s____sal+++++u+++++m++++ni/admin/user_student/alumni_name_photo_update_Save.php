<?php
    error_reporting(4);
    session_start();
    ob_start();
    // print_r($_POST);
    // print_r($_FILES);
    

    if($_SESSION['email']){
       require 'FlashMessages.php';
       include '../config.php';
       $msg = new \Preetish\FlashMessages\FlashMessages();
       $user_id=$_SESSION['email'];

    
       $name = $_POST['name'];
       $email = $_POST['email'];
       $phone =$_POST['phone'];
      

$dest="../uploads/photo/";
  if(!empty($_FILES['img']['name'])){
     $file_name=date('y-m-d').date('H:i:s').$_FILES['img']['name'];

    if(move_uploaded_file($_FILES['img']['tmp_name'],"$dest".$file_name)){
      
      echo $query = "UPDATE `master_user_registration` SET `name`='$name',`photo`='$file_name' where `user_id`='$user_id'";
          // echo $query;
      echo $query1 = "SELECT * FROM  `master_user_registration` where `email`='$email' AND `photo`='$file_name'"
        
          $query_exe = mysqli_query($conn,$query);
           
          if($query_exe){
            $msg->success('Updated Success-full');
            header("location:profile.php");
            exit;
      }else{
           $msg->error('Please Contact Maintance Support Team');
            header("location:alumni_dashboard.php");
            exit;
          }
          // move over
    }else{
     header('Location:logout.php');
     exit;
      }
   }
}
else{
  header('Location:logout.php');
  exit;
}
?>