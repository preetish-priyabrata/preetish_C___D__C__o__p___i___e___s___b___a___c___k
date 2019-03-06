<?php

error_reporting(4);
session_start();
ob_start();
    //print_r($_POST);

if($_SESSION['admin_tech']){
require 'FlashMessages.php';
include '../config.php';

 $msg = new \Preetish\FlashMessages\FlashMessages();
  $t_name = $_POST['u_name'];
  $t_email = $_POST['u_email'];
  $t_mob = $_POST['u_phone'];
  $t_major = $_POST['u_major'];
  $file_name = $_POST['u_file'];
  $teacher_slno=$_POST['teacher_slno'];
  $dir = "../assert/upload/teacher";
  
  // check file is existed 
  if(!empty($_FILES['u_file']['name'])){ 

    $file_name =date('h:i:s'). $_FILES['u_file']['name'];
    // file move is process
    if(move_uploaded_file($_FILES['u_file']['tmp_name'],"$dir/".$file_name)){

      $query ="UPDATE `master_teacher_user` SET `teacher_name`='$t_name',`teacher_email`='$t_email',`teacher_mobile`='$t_mob',`teacher_subject`='$t_major',`teacher_photo`='$file_name' where `slno`='$teacher_slno'";
     
      $query_exe = mysqli_query($conn,$query);
    
      if($query_exe){
        $msg->success('Teacher Name Added Success-full');
              header("location:admin_teacher_user_edit.php?t_userid=".$teacher_slno);
        exit;
      }else{
           $msg->error('Please Contact Maintance Support Team');
            header("location:admin_teacher_user_edit.php?t_userid=".$teacher_slno);
            exit;
          }
          // move over
    }else{
      $msg->error('Teacher Name Added Success-full');
            header("location:admin_teacher_user_edit.php?t_userid=".$teacher_slno);
      exit;
    }
    //
  }else{
    $query ="UPDATE `master_teacher_user` SET `teacher_name`='$t_name',`teacher_email`='$t_email',`teacher_mobile`='$t_mob',`teacher_subject`='$t_major' where `slno`='$teacher_slno'";

      $query_exe = mysqli_query($conn,$query);

      if($query_exe){
        $msg->success('Teacher Name Added Success-full');
              header("location:admin_teacher_user_edit.php?t_userid=".$teacher_slno);
        exit;
      }else{
           $msg->error('Please Contact Maintance Support Team');
            header("location:admin_teacher_user_edit.php?t_userid=".$teacher_slno);
            exit;
          }

  }
 } else{$msg->error('Please Contact Maintance Support Team');
          header("location:admin_teacher_user_edit.php");
          exit;}
            
              
?>