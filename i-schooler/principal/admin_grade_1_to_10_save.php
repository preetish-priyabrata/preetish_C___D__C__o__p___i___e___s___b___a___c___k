<?php
error_reporting(4);
session_start();
ob_start();
// print_r($_POST);
// exit();
if($_SESSION['user_principal']){
	include '../config.php';
	require 'FlashMessages.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();
	
	//$userid = $_POST['u_id'];
	 if(isset($_POST['Submit'])){
		$points = $_POST['points'];
		$grading_details = $_POST['grade'];
		$date = date('Y-m-d');
		$time  = date('H:i:s');
		 // checking point and grade catagory is empty or not
	   if(!empty($points)){
			//checking grade catagory is present or not (num row is 0 then insert otherwise will not insert)
      		$query = "SELECT * FROM `master_grade_type` WHERE `points`='$points'";

      		$sql_exe=mysqli_query($conn,$query);
      		$num =mysqli_num_rows($sql_exe);
      	

      		// num ==0 checking of grade
      	

      	 if($num==0){
            
        // 	$query1 = "SELECT * FROM `master_grade_type` WHERE `grading_details`='$grading_details'";

      		// $sql_exe1=mysqli_query($conn,$query1);
      		// $num1 =mysqli_num_rows($sql_exe1);
        // 	if($num1=0){
                $insert_query ="INSERT INTO `master_grade_type`(`points`,`grading_details`,`date`,`time`) values('$points','$grading_details','$date','$time')"; 
            	$query_insert_exe = mysqli_query($conn,$insert_query);
                    // mysqli_error($conn);
  					if($query_insert_exe){
						$msg->success('Success-Full Add Grade Category');
 						header("location:admin_grade_1_to_10.php");
						exit;
		    		}else{
						$msg->error('Server Error Occured Please Contact Mantaince Person');
 						header("location:admin_grade_1_to_10.php");
						exit;
		   			}

      //        }else{
      //           $msg->error('Grading Is already Existed');
 					// 	header("location:admin_grade_1_to_10.php");
						// exit;

      //   	 }
        }else{
      		$msg->error('Point Is Already Present');
 			header("location:admin_grade_1_to_10.php");
			exit;
		}

	  }else{	
		$msg->error('Point is Left Blank');
 		header("location:admin_grade_1_to_10.php");
		exit;
	  }
	}else{
		header("location:logout.php");
		exit;
	}
}else{
	header("location:logout.php");
	exit;
}

?>

