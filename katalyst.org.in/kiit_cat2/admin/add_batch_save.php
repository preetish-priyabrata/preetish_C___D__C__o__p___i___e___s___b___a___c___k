<?php
// print_r($_POST);
// exit();
session_start();

if (($_SESSION['userId']!="")) {
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
include 'config.php';
// print_r($_POST);
// exit;
    //$model_id_no=strtolower($_POST['model_no']);
    //Array ( [batch] => b7 [stud_course] => 1 [no_seat] => 60 [start_time] => 10:15 [end_time] => 15:20 [Venue] => kiit campus 15 [days] => Array ( [0] => Tuesday [1] => Wednesday [2] => Thursday [3] => Saturday [4] => Sunday ) ) 
    $batch = strtolower($_POST['batch']);
    $stud_course=$_POST['stud_course'];
    $no_seat = $_POST['no_seat'];
    // $start_time=$_POST['start_time'];
    // $end_time=$_POST['end_time'];
    $Venue=$_POST['Venue'];
    $start_time=date('H:i:s',strtotime(trim($_POST['start_time'])));
    $end_time=date('H:i:s',strtotime(trim($_POST['end_time'])));
    $days=serialize($_POST['days']);
    $date=date("Y-m-d");
    $time=date("H:i:s");

    $query_check="SELECT * FROM `tbl_batch` WHERE `batch_name`='$batch'" ;
    $sql_check=mysqli_query($conn,$query_check);
    $num=mysqli_num_rows($sql_check);

    if($num=="0"){
        // insert query 
          $query_insert="INSERT INTO `tbl_batch`(`sl_no`, `batch_name`,`course_id`,`no_of_sheet`,`remain_seat`,`start_time`,`end_time`,`venue`,`days`, `date`,`time`) VALUES (NULL,'$batch','$stud_course','$no_seat','$no_seat','$start_time','$end_time','$Venue','$days','$date','$time')";
     
         $sql_insert=mysqli_query($conn,$query_insert);
        
        // execute query
        $last_id = mysqli_insert_id($conn);
        // here success message is send 
        $msg->success('Successfull Batch Added');
        header('Location:add_batch.php');
        exit;
    }else{
        $msg->error('Batch Name Is Already Stored In Our Record');
        header('Location:add_batch.php');
        exit;
    }


}else{
    header('Location:logout.php');
    exit;
}

?>
     
    