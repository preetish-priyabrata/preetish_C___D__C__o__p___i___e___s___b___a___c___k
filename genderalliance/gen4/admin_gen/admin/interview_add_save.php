<?php
session_start();
ob_start();

if (($_SESSION['userId']!="")) {
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
include 'config.php';
// print_r($_POST);
// exit; 
// whem madam come to office

// Array ( [title] => hello [url] => http://www.gstindia.com/about/ [submit] => Save ) 
// Array ( [title] => ssss [url] => http://www.gstindia.com/about/ ) 
if (isset($_POST['submit'])){
    $title =$_POST['title'];
    $url =$_POST['url'];
    $date=date("Y-m-d");
    $time=date("H:i:s");
    //$photo=$_POST['photo_name']

           $query_student="INSERT INTO `gen_interview`(`title`,`url`,`date`,`time`) VALUES ('$title','$url','$date','$time')";
         $sql_exe=mysqli_query($conn,$query_student); 
       
          if($sql_exe)
              {
              $msg->success('Interview Add Successfull');
              header('Location:interview_add.php');
              exit();
             }
         
         else{
           $msg->error('Some Error Is found');
            header('Location:interview_add.php');
            exit();
            }   
    }else{
        $msg->error('Url Is Not Submited');
        header('Location:interview_add.php');
        exit();
    }

            
               
 
}else{
    header('Location:logout.php');
    exit;
}

?>
