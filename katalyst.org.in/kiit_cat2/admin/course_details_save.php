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
    $course_name = strtolower($_POST['course_name']);
    $course_type=$_POST['course_type'];
    $price = $_POST['price'];
    $no_of_session=$_POST['no_of_session'];
    $no_of_module=$_POST['no_of_module'];
    $Venue=$_POST['Venue'];
    $staring_date=date('Y-m-d',strtotime(trim($_POST['Starting_date'])));
    $ending_date=date('Y-m-d',strtotime(trim($_POST['ending_date'])));
    $date=date("Y-m-d");
    $time=date("H:i:s");
    $editor=$_POST['editor'];
    $Eligibility=$_POST['Eligibility'];

    // $query_check="SELECT * FROM `tbl_course` WHERE `course_name`='$course_name'" ;
    // $sql_check=mysqli_query($conn,$query_check);
    // $num=mysqli_num_rows($sql_check);

    if(1){
        // insert query 
          $query_insert="INSERT INTO `tbl_course`(`sl_no`, `course_name`,`course_type`,`course_descriptn`,`Eligibility`,`price`,`no_of_session`,`no_of_module`,`venue`, `status`,`starting_date`,`ending_date`, `date`, `time`) VALUES (NULL,'$course_name','$course_type','$editor','$Eligibility',$price','$no_of_session','$no_of_module','$Venue','0','$staring_date','$ending_date','$date','$time')";
     
         $sql_insert=mysqli_query($conn,$query_insert);
        // execute query
        $last_id = mysqli_insert_id($conn);
        // here success message is send 
        $msg->success('Successfull Course Added');
        header('Location:course_details_module.php?sl='.encryptIt_webs($last_id).'&moduleNumber='.encryptIt_webs($no_of_module));
        exit;
    }else{
        $msg->success('Course Name Is Already Stored In Our Record');
        header('Location:logout.php');
        exit;
    }


}else{
    header('Location:logout.php');
    exit;
}

?>
     
    