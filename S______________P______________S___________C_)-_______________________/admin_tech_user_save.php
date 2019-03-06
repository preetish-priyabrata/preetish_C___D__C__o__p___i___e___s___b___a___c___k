<?php
error_reporting(E_ALL);
ob_start();
session_start();
include "config.php";

require 'FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
	if($_SESSION['admintech_exam']){
		//add new admin user
		if(isset($_POST['add_user'])){
			function test_input($data){
				 $data = trim($data);
				 $data = stripslashes($data);
				 $data = htmlspecialchars($data);
				 return $data;
			}
			$utype1= test_input($_REQUEST['utype1']);
			$uname1= test_input($_REQUEST['uname1']);
			$phone= test_input($_REQUEST['phone']);
			$uname= test_input($_REQUEST['uname']);
			switch ($utype1) {
				case 'pre exam':
					$user="preexam";
					break;
				case 'post exam':
					$user="postexam";
					break;
				case 'admin exam':
					$user="adminexam";
					break;
				case 'verification exam':
					$user="verificationexam";
					break;
				case 'admintech exam':
					$user="admintechexam";
					break;
				case 'admin normal':
					$user="adminnormalexam";
					break;
				case 'admin operational':
					$user="adminoperationalexam";
					break;
				
				default:
					# code...
					break;
			}


		    
		     while(1){        
		        // generate unique random number
		         $numbers = "0123456789";
		         $appno = substr( str_shuffle( $numbers ), 0, 6 );
		          $userid=$user.$appno;
		        // check if it exists in database
		        $qry_check ="SELECT * FROM `user_master_data` WHERE `user_email`='$uname1' And  `status`!='3' and `usertype`='$utype1' and `userid`='$userid'";       
		        $sql_check = mysqli_query($conn, $qry_check);         
		         $rowCount = mysqli_num_rows($sql_check);      
		        // if not found in the db (it is unique), break out of the loop
		        if($rowCount < 1){
		          break;
		        }
		    }
			// Generating Password
			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
			$pass = substr( str_shuffle( $chars ), 0, 8 );

			//$password= sha1($pass); //Encrypting Password

			$qry="INSERT INTO `user_master_data`(`slno`, `usertype`,`user_email`,`userid`, `username`, `phoneno`, `password`, `datetime`,`temp_pass`) VALUES (NULL, '$utype1', '$uname1','$userid','$uname', '$phone', '$pass', NOW(),'$pass')";
			
			$res= mysqli_query($conn, $qry);
			if($res){
			 $to = $uname1;
				$subject = 'SPSC '.$utype1.'  login info..';
				$message = "Your password : ".$pass." \r\n
							Userid : ".$userid." \r\n Now you can login with this email and password.";
				mail($to, $subject, $message);
				if(mail($to, $subject, $message)){			
			 		$msg->success('Success-Fully Add Admin User and Send maill To The Email');
		    		header("Location:admin_tech_user.php");
		    		exit;
				}else{
					$msg->warning('Unable To Send Email Some Error Occurs !!!');
		    		header("Location:admin_tech_user.php");
		   			 exit;
				}
			}else{
				$msg->warning('Unable To Add Admin User  Some Error Occurs !!!');
				header("Location:admin_tech_user.php");
		   		exit;
			}

		}

		// update status
		if(isset($_GET['status'])){
			$status1=$_GET['status'];
			 $qry_answer="SELECT * FROM `user_master_data` where slno='$status1'";
	      	$sql_answer=mysqli_query($conn,$qry_answer);
			
			while($row=mysqli_fetch_object($sql_answer)){
				$status_var=$row->status;
				if($status_var=='0'){
					$status_state=1;
				}else{
					$status_state=0;
				}
				$update=mysqli_query($conn,"update user_master_data set status='$status_state' where slno='$status1' ");
				if($update){
					$msg->success('Status Update Success-Fully');
					header("Location:admin_tech_user.php");
				}

			}
		}
		if(isset($_GET['passwordreset'])){
			$status1=$_GET['passwordreset'];
			$qry_answer="SELECT * FROM `user_master_data` where slno='$status1'";
	      	$sql_answer=mysqli_query($conn,$qry_answer);
			
			while($row=mysqli_fetch_object($sql_answer)){
				$user_email=$row->user_email;
				$userid=$row->userid;
				$utype1=$row->usertype;
				 $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
				$pass = substr( str_shuffle( $chars ), 0, 8 );
				//$password= sha1($pass); //Encrypting Password

		         $update=mysqli_query($conn,"update user_master_data set password='$pass' ,temp_pass='$pass' where slno='$status1' ");

		         if($update){

					$msg->success('Success-Fully Reset Password');
					$to = $user_email;
					$subject = 'SPSC '.$utype1.' Reset Pasword Info..';
					$message = "Your reset is password : ".$pass." \r\n
							Userid : ".$userid." \r\n Now you can login with this email and password.";
					mail($to, $subject, $message);
					if(mail($to, $subject, $message)){			
			 			$msg->success('Success-Fully Reset Password  Admin User and Send maill To The Email');
		    			header("Location:admin_tech_user.php");
		    			exit;
					}else{
						$msg->warning(' Success-Fully Reset Password  Admin User Unable To Send Email Some Error Occurs !!!');
		    			header("Location:admin_tech_user.php");
		   				 exit;
					}
					
				}

			}

		}
		//deleted

		if(isset($_POST['Deleted'])){
			$slno=$_POST['slno'];
			$qry=" UPDATE `user_master_data` SET `status`='3' WHERE `slno`='$slno'";
		
		$res= mysqli_query($conn, $qry);
		if($res)
		{
		$msg->success('Success-Fully Deleted Admin user Answer-Key');
	    header("Location:admin_tech_user.php");
	    exit;
		}
		else
		{
		$msg->warning('Unable To Deleted Admin user Try Again !!!');	
	    header("Location:admin_tech_user.php");
	    exit;
		}
		}


	}
	ob_clean();