<?php
// print_r($_POST);
// exit();
error_reporting(4);
session_start();
ob_start();
//Array ( [cate_name] => [exam_name] => hdgf [submit] => submit ) 

if($_SESSION['user_teacher']){
	include '../config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();

	 if(isset($_POST['submit'])){		
		$exam_name=trim(strtolower($_POST['exam_name']));
		$date = date('y-m-d');
		$exam_cat=$_POST['cate_name'];		
		// checking subject name is empty or not
			if(!empty($exam_name)){
			//checking subject name is present or not (num row is 0 then insert otherwise will not insert)
      	      	$query = "SELECT * FROM `master_exam_name` WHERE `exam_name`='$exam_name'";
      		  	$sql_exe =mysqli_query($conn,$query);
      		  	$num =mysqli_num_rows($sql_exe);
      		  // num ==0 checking of subject
      	   		if($num ==0){
            // insert into master exam_name 
       		   		$insert_query = "INSERT INTO `master_exam_name`(`exam_cat_id`,`exam_name`,`date`) VALUES ('$exam_cat','$exam_name','$date')";
       			
        	   		$sql_exe =mysqli_query($conn,$insert_query); 
        				if($sql_exe)
        				{
							$msg->success('Exam Name Added Success-full');
 							header("location:admin_exam_name.php");
							exit;
		    			}
		    			else
		    			{
							$msg->error('Server Error Occured Please Contact Mantaince Person');
 							header("location:admin_exam_name.php");
							exit;
		   				 }
				}
		   		else
		      		{
      					$msg->error('Exam Nmae Is Already Present');
 						header("location:admin_exam_name.php");
						exit;
		      		}
	   			}
				else
					{
	
						header("location:logout.php");
						exit;
					}
	}
       else
           {
				header("location:logout.php");
				exit;
	}
}

?>