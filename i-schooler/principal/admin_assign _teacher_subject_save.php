<?php
error_reporting(4);
session_start();
ob_start();
print_r($_POST);
//exit;
if($_SESSION['user_principal']){
	include '../config.php';
	require 'FlashMessages.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();
	if(isset($_POST['submit'])){
		// Array ( [teacher_name] => 1 [class_name] => 10 [section_name] => 28 [submit] => submit ) SELECT * FROM `master_teacher_user` WHERE `teacher_name` ='1'
		$teacher_id = $_POST['teacher_name'];
		$class_id  = $_POST['class_name'];
		$section_id = $_POST['section_name'];


				   
		$date_year=date('Y');
		$date1=$date_year+1;
		$batch=$date_year.'-'.$date1;
        $time=date('H:i:s');
        $date=date('Y-m-d');



        $query_teacher_name="SELECT * FROM `master_asign_teacher_class` WHERE `teacher_id`='$teacher_id' AND `batch_year`='$batch'";
        $sql_exe_teacher_name=mysqli_query($conn,$query_teacher_name);
        $num=mysqli_num_rows($sql_exe_teacher_name);

        if ($num==0) 
           {
               
		       $query_class_name="SELECT * FROM `master_asign_teacher_class` WHERE `class_id`='$class_id' AND `section_id`='$section_id' AND `batch_year`='$batch'";
		        $sql_exe_class_name=mysqli_query($conn,$query_class_name);
		        $num_class=mysqli_num_rows($sql_exe_class_name);

		             if ($num_class==0)
                      {   
                            $query_teacher_name="SELECT * FROM `master_teacher_user` WHERE `slno`='$teacher_id'";
					        $sql_exe_teacher_name=mysqli_query($conn,$query_teacher_name);
					       	$num0=mysqli_num_rows($sql_exe_teacher_name);
					       	$result_teacher=mysqli_fetch_assoc($sql_exe_teacher_name);
					         $teacher_name=$result_teacher['teacher_name'];


					        $query_class_name="SELECT * FROM `master_class` WHERE `slno_class`='$class_id'";
					        $sql_exe_class_name=mysqli_query($conn,$query_class_name);
					       	$num1=mysqli_num_rows($sql_exe_class_name);
					       	$result_class=mysqli_fetch_assoc($sql_exe_class_name);
					          $class_name=$result_class['class_name'];

					        $query_section_name="SELECT * FROM `master_class_section` WHERE `Slno`='$section_id'";
					        $sql_exe_section_name=mysqli_query($conn,$query_section_name);
					       	$num2=mysqli_num_rows($sql_exe_section_name);
					       	$result_section=mysqli_fetch_assoc($sql_exe_section_name);
					        $section_name=$result_section['section'];
		               

			                       
								 if(($num==1) && ($num1==1) && ($num2==1)){
									echo $insert_query ="INSERT INTO `master_asign_teacher_class`(`teacher_id`,`teacher_name`,`class_id`,`class_name`,`section_id`,`section_name`,`batch_year`,`date`,`time`)VALUES('$teacher_id','$teacher_name','$class_id','$class_name','$section_id','$section_name','$batch','$date','$time')";
										 			
										$exe_insert_query=mysqli_query($conn,$insert_query);
										$msg->success('Teacher Assigned Success-full');
 							            header("location:admin_asign_class_teacher.php");
							             exit;
										 			
										 			
									}else{
										
				      					$msg->error('Teacher Already Assigned');
				 						header("location:admin_asign_class_teacher.php");
										exit;
									     }

						}else{
							   echo "error";
							 }
                   }else{
			                echo "not possible";
			             }



			}else{
					header('Location:logout.php');
					exit;
				}
		}
		else{
			header('Location:logout.php');
			exit;
	}

				  








