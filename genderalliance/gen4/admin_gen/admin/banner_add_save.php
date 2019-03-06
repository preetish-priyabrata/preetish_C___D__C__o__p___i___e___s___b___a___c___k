<?php
 //print_r($_POST);
// print_r($_FILES);
// exit();
session_start();

if (($_SESSION['userId']!="")) {
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
include 'config.php';
// print_r($_POST);
// exit;
    $short_desc =mysqli_real_escape_string($conn,$_POST['short_desc']);
    $date=date("Y-m-d");
    $time=date("H:i:s");
    //$photo=$_POST['photo_name']

    $dest="../upload/";
        if(!empty($_FILES['photo_name']['name']))
        {
             $file_name=date('Y-m-d').date('H:i:s').$_FILES['photo_name']['name'];

            if(move_uploaded_file($_FILES['photo_name']['tmp_name'],"$dest".$file_name))
            {
                $query_insert="INSERT INTO `gen_banner`(`sl_no`, `short_desc`,`date`,`time`,`photo_name`) VALUES (NULL,'$short_desc','$date','$time','$file_name')";     
                $sql_insert=mysqli_query($conn,$query_insert);

                $msg->success('Successfull Banner Added');
                header('Location:banner_add.php');
                exit;
            }
            else
            {
                 $msg->error('File Unable To Upload');
                 header('Location:banner_add.php');
                 exit;
            }
            
                $msg->error('Please Contact Your Maintenance Team');
                header('Location:banner_add.php');
                exit;
        }

        else
           {
             $msg->success('Successfull Banner Added');
             header('Location:banner_add.php');
             exit;
           }

 
}else{
    header('Location:logout.php');
    exit;
}

?>
     
    