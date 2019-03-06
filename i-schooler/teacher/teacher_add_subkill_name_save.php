<?php
print_r($_POST);
//exit();
error_reporting(4);
session_start();

ob_start();
print_r($_SESSION);
//exit();
if($_SESSION['user_teacher']){
	include '../config.php';
	require 'FlashMessages.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();
	if(isset($_POST['OK'])){
		// Array ( [sub_skill] => Array ( [0] => botany [1] => zology [2] => Physics [3] => chemistry [4] = >    quantum Chemistry [5] => biology [6] => bio-tech ) [serial_exam_list] => 13 [OK] => OK ) 
			// IF SUBMITED THE WILL ALLOWED TO STORED IN DATABASE
	  		$subskill = $_POST['sub_skill'];
	  		$exam_list_id=$_POST['serial_exam_list'];
	  		$date = date("y-m-d");
	  		// CHECKING WHETHER DATA IS BLANK OR NOT 
	  		if(!empty($subskill)){
	  			// IF EXAM CATEGORY IS PRESENT THEN IN THE VARIABLE 
	  			// THEN WILL ALLOW TO CHECK WHEATHER IT IS PRESENT IN DATABASE
	  			for ($i=0; $i < count($subskill); $i++) { 
	  				
	  			$subskill_name=$subskill[$i];
	  			
	  				 $insert_query = "INSERT INTO `master_add_subskill`(`subskill`,`exam_list_id`,`date`) VALUES('$subskill_name','$exam_list_id','$date')"; // THIS QUERY IS USED FOR STORING PURPOSE
	  				$query_exe = mysqli_query($conn,$insert_query);
	  				// CHECKING THE QUERY EXECUTE FOR INSERT
	  				if($query_exe){
	  		  			$msg->success('Success-Full Add Subskill');// THIS MESSAGE SEND FOR SUCCESS OF STORING
 			  			
			  			// IF NOT INSERT THEN IT WILL GOES FOR ELSE PART
	  				}else{
	  		   			$msg->error('Server Error Occured Please Contact Mantaince Person');// THIS MESSAGE SEND FOR ERROT IN  STORING
 	           			
	  				}
	  				//  NUM IS NOT 0 THEN IT WILL GOES FOR ELSE PART 
	  			}
	  			header("location:student_mark_entry.php?serial=".$exam_list_id);
			  			exit;
			
		}else{
			// SUBMIT IS NOT HAPPEN LOGOUT
		 	   header("location:logout.php");
		       exit;
		   }

	}else{
		// if session is not match logout
		header("location:logout.php");
		exit;	
	}
	}else{
		// if session is not match logout
		header("location:logout.php");
		exit;	
	}


?>

				  










