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
       $time=time('H:i:s');
       $dir = "../uploads/";

        if ($_POST['submit']=='Update') {
       
         if(!empty($_FILES['u_file']['name'])){
        $file_name =date('h:i:s'). $_FILES['u_file']['name'];

    // file move is process

                 if(move_uploaded_file($_FILES['u_file']['tmp_name'],"$dir/".$file_name)){

                 echo $query = "UPDATE `upload_photo_gallery` SET `date`='$date',`time`='$time',`photo`='$file_name' where `sl_no`='$sl_no'";
                   $query_exe = mysqli_query($conn,$query);
                   exit;
           
                        if($query_exe){
                             $msg->success('Image Upload Success-full');
                             header("location:admin_upload_photo_gallery_view.php?sl_no=".$sl_no);
                             exit;
                        }else{
                              $msg->error('Image upload Not Success-full');
                              header("location:admin_upload_photo_gallery_view.php?sl_no=".$sl_no);
                              exit;
                              }
          // move over
                 }else{
                    $msg->error('Please Contact Maintance Support Team');
                    header("location:admin_upload_photo_gallery_view.php?sl_no=".$sl_no);
                    exit;
                      }
    
        }else{
              $query1 = "UPDATE `upload_photo_gallery` SET `date`='$date',`time`='$time' where `sl_no`='$sl_no'";
               $query_exe1 = mysqli_query($conn,$query1);

               if($query_exe1){
               $msg->success('Image Upload Success-full');
               header("location:admin_upload_photo_gallery_view.php?sl_no=".$sl_no);
               exit;
               
              }else{
                $msg->error('Please Contact Maintance Support Team');
                header("location:admin_upload_photo_gallery_view.php?sl_no=".$sl_no);
                exit;
                }

            }
    }
      else{
        $msg->error('Please Contact Maintance Support Team');
        header("location:admin_upload_photo_gallery_view.php?sl_no=".$sl_no);
        exit;
        }
 }else{
        $msg->error('Please Contact Maintance Support Team');
        header("location:admin_upload_photo_gallery_view.php?sl_no=".$sl_no);
        exit;
        }
            
              
?>
