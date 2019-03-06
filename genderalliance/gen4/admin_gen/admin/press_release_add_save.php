<?php
//  print_r($_POST);
// print_r($_FILES);
// exit();
session_start();

if (($_SESSION['userId']!="")) {
require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
include 'config.php';
// Array ( [title] => hello [short_desc] => gd mng ) Array ( [photo_name] => Array ( [name] => rpday2011_6_big.jpg [type] => image/jpeg [tmp_name] => /tmp/php8EZj12 [error] => 0 [size] => 305341 ) ) 
    $title=$_POST['title'];
    $short_desc =$_POST['short_desc'];
    $date=date("Y-m-d");
    $time=date("H:i:s");
    $dest="../upload/";

        if(!empty($_FILES['photo_name']['name']))
        {
             $file_name=date('Y-m-d').date('H:i:s').$_FILES['photo_name']['name'];

            if(move_uploaded_file($_FILES['photo_name']['tmp_name'],"$dest".$file_name))
            {
                $query_insert="INSERT INTO `gen_press_release`(`sl_no`,`title`, `description`,`date`,`time`,`photo_name`) VALUES (NULL,'$title','$short_desc','$date','$time','$file_name')";     
                $sql_insert=mysqli_query($conn,$query_insert);

                $msg->success('Successfull Press Release Added');
                header('Location:press_release_add.php');
                exit;
            }
            else
            {
                 $msg->error('File Unable To Upload');
                 header('Location:press_release_add.php');
                 exit;
            }
            
                 // $msg->success('Successfull Press Release Added');
                 // header('Location:press_release_add.php');
                 // exit;
        }

        else
           {
            
                $msg->error('Please Contact Your Maintenance Team');
                header('Location:press_release_add.php');
                exit;
           }

 
}else{
    header('Location:logout.php');
    exit;
}

?>
     
    