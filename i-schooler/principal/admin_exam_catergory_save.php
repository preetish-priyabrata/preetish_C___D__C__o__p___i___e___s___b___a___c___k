<?php

error_reporting(4);
session_start();
ob_start();
// Array ( [exam_category] => first Term [submit] => Submit ) 
	// session match 
	if($_SESSION['user_principal']){
		// IF SESSION IS PRESENT THEN WILL ALLOW TO STORE DATA
		include '../config.php';
		require 'FlashMessages.php';
		$msg = new \Preetish\FlashMessages\FlashMessages();	
		// CHECKING IF FORM IS SUBMITTED
		
	  		// CHECKING WHETHER DATA IS BLANK OR NOT 
	  		if(!empty($exam_cat)){
	  			// IF EXAM CATEGORY IS PRESENT THEN IN THE VARIABLE 
	  			// THEN WILL ALLOW TO CHECK WHEATHER IT IS PRESENT IN DATABASE
	  			$query = "SELECT * FROM `master_exam_category` WHERE `exam_name_cat`='$exam_cat'"; // THSI QUERY CHECK IN DATABASE
	  			$query_exe = mysqli_query($conn,$query);
	  			$num = mysqli_num_rows($query_exe);
	  			// IF NUM IS 0 THEN INSERT WILL PROCESS
	  			
	  				if($query_exe){
	  		  			$msg->success('Success-Full Add Exam Category');// THIS MESSAGE SEND FOR SUCCESS OF STORING
 			  			header("location:admin_exam_catergory.php");
			  			exit;
			  			// IF NOT INSERT THEN IT WILL GOES FOR ELSE PART
	  				}else{
	  		   			$msg->error('Server Error Occured Please Contact Mantaince Person');// THIS MESSAGE SEND FOR ERROT IN  STORING
 	           			header("location:admin_exam_catergory.php");
	           			exit;	
	  				}
	  				//  NUM IS NOT 0 THEN IT WILL GOES FOR ELSE PART 
	  			}else{

	  		  		$msg->error('Examj Catagory Is Already Present'); // THIS MESSAGE SEND OF PRESENT IN DATABASE
 					header("location:admin_exam_catergory.php");
					exit;
				}
				       
		     }
		}else{
			// SUBMIT IS NOT HAPPEN LOGOUT
		 	   header("location:logout.php");
		       exit;
		   }

	


?>