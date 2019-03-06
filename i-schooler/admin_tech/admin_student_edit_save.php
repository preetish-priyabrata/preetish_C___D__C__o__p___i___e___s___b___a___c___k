<?php
    error_reporting(4);
    session_start();
    ob_start();
    // print_r($_POST);
    // print_r($_FILES);
    

    if($_SESSION['admin_tech']){
      require 'FlashMessages.php';
      include '../config.php';
      $msg = new \Preetish\FlashMessages\FlashMessages();
      //Array ( [student_slno] => 5 [u_name] => Sasmita Roy [u_class] => 6th [u_section] => C [u_jointsection] => class 6 [u_jointbatch] => 7th [u_gender] => Male [u_parentnm] => Meera Roy [u_parentph] => 9438147975 [submit] => Update ) Array ( [u_file] => Array ( [name] => preview.__large_preview.jpg [type] => image/jpeg [tmp_name] => /tmp/phpbYsmcG [error] => 0 [size] => 55048 ) ) 

       $st_name = $_POST['u_name'];
       $u_class = $_POST['u_class'];
       $u_section = $_POST['u_section'];
       $u_jointsection =$_POST['u_jointsection'];
       $u_jointbatch = $_POST['u_jointbatch'];
       $u_gender = $_POST['u_gender'];
       $u_parentnm =$_POST['u_parentnm'];
       $u_parentph = $_POST['u_parentph'];
       $student_slno = $_POST['student_slno'];
       $dir = "../assert/upload/student_pic";
       
         if(!empty($_FILES['u_file']['name'])){
        $file_name =date('h:i:s'). $_FILES['u_file']['name'];

    // file move is process

       if(move_uploaded_file($_FILES['u_file']['tmp_name'],"$dir/".$file_name)){

          $query = "UPDATE `master_student_user` SET `student_name`='$st_name',`student_current_class`='$u_class',`student_current_section`='$u_section',`student_join_section`='$u_jointsection',`student_join_batch`='$u_jointbatch',`student_gender`='$u_gender',`parent_name`='$u_parentnm',`parent_ph_no`='$u_parentph',`student_photo`='$file_name' where `student_slno`='$student_slno'";
          echo $query;
        
          $query_exe = mysqli_query($conn,$query);
           
          if($query_exe){
            $msg->success('Student Name Added Success-full');
            header("location:admin_student_edit.php?std_id=".$student_slno);
            exit;
      }else{
           $msg->error('Please Contact Maintance Support Team');
            header("location:admin_student_edit.php?std_id=".$student_slno);
            exit;
          }
          // move over
    }else{
      $msg->error('Student Name Added Success-full');
            header("location:admin_student_edit.php?std_id=".$student_slno);
      exit;
    }
    //
  }else{
     $query = "UPDATE `master_student_user` SET `student_name`='$st_name',`student_current_class`='$u_class',`student_current_section`='$u_section',`student_join_section`='$u_jointsection',`student_join_batch`='$u_jointbatch',`student_gender`='$u_gender',`parent_name`='$u_parentnm',`parent_ph_no`='$u_parentph' where `student_slno`='$student_slno'";

      $query_exe = mysqli_query($conn,$query);

      if($query_exe){
        $msg->success('Student Details Added Success-full');
              header("location:admin_student_edit.php?std_id=".$student_slno);
        exit;
      }else{
           $msg->error('Please Contact Maintance Support Team');
            header("location:admin_student_edit.php?std_id=".$student_slno);
            exit;
          }

  }
 } else{$msg->error('Please Contact Maintance Support Team');
          header("location:admin_student_edit.php");
          exit;}
            
              
?>
