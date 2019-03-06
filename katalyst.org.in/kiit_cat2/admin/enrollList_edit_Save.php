<?php

 error_reporting(4);
 session_start();
 ob_start();
if(($_SESSION['userId']!="")){
  require 'FlashMessages.php';
  require 'config.php';
  $msg = new \Preetish\FlashMessages\FlashMessages(); 
  // here information is received 
  $enrollment_id=$_POST['enrollment_id'];
  $student_name=$_POST['student_name'];
  $student_roll=$_POST['student_roll'];
  $student_email=$_POST['student_email'];
  $student_phone=$_POST['student_phone'];
  $student_course=$_POST['stud_course'];
 

    $query ="UPDATE `tbl_enrollment` SET `student_name`='$student_name',`student_roll`='$student_roll',`student_email`='$student_email',`student_phone`='$student_phone',`student_course`='$student_course' where `enrollment_id`='$enrollment_id'";
     $query_exe = mysqli_query($conn,$query);
   
         if($query_exe){
              $msg->success('Successfull Enrollment Details Are Edited In our record');
              header('Location:enrollList.php');
              exit;
         }else{
              $msg->error('Enrollment Details Edited Not Successfull');
              header("location:admin_dashboard.php");
              exit;
         }

   
    
  
}else{
  header('Location:logout.php');
  exit;
}


?>


  
  
            
          