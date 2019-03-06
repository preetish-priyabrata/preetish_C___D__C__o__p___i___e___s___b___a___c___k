<?php


print_r($_POST);
//exit();
//Array ( [exam_cat] => 1 [exam_name] => 2 [class_name] => 3 [section_name] => 5 [subject_name] => 3 [sub_skill] => 1 [OK] => OK ) 
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
		
		echo $exam_cat_id = $_POST['exam_cat'];
		$exam_name_id = $_POST['exam_name'];
		$class_id = $_POST['class_name'];
		$section_id = $_POST['section_name'];
        $subject_id=$_POST['subject_name'];
        $teacher_id=$_SESSION['teacher_id'];

		$date_year=date('Y');
		$date1=$date_year+1;
		$batch=$date_year.'-'.$date1;
        $time=date('H:i:s');
        $date=date('Y-m-d');
        $subskill=$_POST['sub_skill'];


         $query_exam_cat_id="SELECT * FROM `master_exam_result_list` WHERE `exam_name_id`='$exam_name_id' AND `exam_cat_id`='$exam_cat_id' AND `class_id`='$class_id' AND `section_id`='$section_id' aND `subject_id`='$subject_id' AND `batch_year`='$batch' and `status`='1'";
         $sql_exe_exam_cat_id=mysqli_query($conn,$query_exam_cat_id);
          $num_exam_id=mysqli_num_rows($sql_exe_exam_cat_id);

        if ($num_exam_id==0) {           
										 			
			 $insert_query="INSERT INTO `master_exam_result_list`(`sl_no`,`exam_cat_id`,`exam_name_id`,`class_id`,`section_id`,`subject_id`,`teacher_id`,`batch_year`,`date`,`time`,`subskill`) VALUES (NUll,'$exam_cat_id','$exam_name_id','$class_id','$section_id','$subject_id','$teacher_id','$batch','$date','$time ','$subskill')";

	$exe_insert_query=mysqli_query($conn,$insert_query);
			$last_id = mysqli_insert_id($conn);
             $get_id=$last_id; 
                        
			$msg->success('Add Exam Marks Success-full');
 			header("location:teacher_add_subkill_name.php?serial=".$get_id);
			exit;
		}else{	
			$msg->error('Server Error Occured Please Contact Mantaince Person');
			header("location:teacher_add_marks.php");
			exit;
        }
	}else{
		header('Location:logout.php');
		exit;
    }
}else{
	header('Location:logout.php');
	exit;
}

				  










