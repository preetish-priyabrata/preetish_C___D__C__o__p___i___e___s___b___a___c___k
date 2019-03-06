<?php

  error_reporting(4);
  session_start();
  ob_start();
  if(($_SESSION['L_student_roll']!="")){
    require 'FlashMessages.php';
    require 'config.php';
    $msg = new \Preetish\FlashMessages\FlashMessages(); 
    // here information is received 
        $L_slno=$_POST['L_slno'];
        $old_pwd=$_POST['old_pwd']; 
        $new_pwd=$_POST['new_pwd'];
        $con_pwd=$_POST['con_pwd'];

          $check="SELECT * from `tbl_login_student` where `L_slno`='$L_slno' ";
          $sql_check1=mysqli_query($conn,$check);
          $sql_check=mysql_fetch_array($sql_check1);

          $data_pwd==$sql_check['L_password'];

                    if($data_pwd==$old_pwd){
                    if($new_pwd==$con_pwd){

                      $query ="UPDATE `tbl_login_student` SET `L_password`='$new_pwd' where `L_slno`='$L_slno'";
                              $query_exe = mysqli_query($conn,$query);
                              $msg->success('Successfull Student Password Is Changed In our record');
                              header('Location:stud_change_password.php');
                              exit;
                        }

                    else{
                              $msg->error('Your New and Retype Password is not match');
                              header("location:student_dashboard.php");
                              exit;
                        } 

                   }

                    else{
                              $msg->error('Your old password is wrong');
                              header("location:student_dashboard.php");
                              exit;
                         }    
                }   
                else{
                  header('Location:logout.php');
                  exit;
                }

                ?>
