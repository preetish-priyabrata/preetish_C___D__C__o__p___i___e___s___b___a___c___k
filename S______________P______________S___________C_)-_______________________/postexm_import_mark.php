<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
if($_SESSION['postexam_user'])
{
	$exam_name=$_REQUEST["exam"];
	
	$qry_check="SELECT * FROM `postexam_status` WHERE `exam_name`='$exam_name' AND `mark_upload_status`='uploaded'";
	$sql_check=mysqli_query($conn, $qry_check);
	$num_rows_check=mysqli_num_rows($sql_check);
	if($num_rows_check==0)
	{
	$mimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv','application/csv');

		if(in_array($_FILES['uploadmark']['type'],$mimes))
		{

			$filename=$_FILES["uploadmark"]["tmp_name"];
		

			 if($_FILES["uploadmark"]["size"] > 0)
			 {
				$file = fopen($filename, "r");
	
				fgetcsv($file, 10000, ",");
	
				 while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
	
				 {
				 
					//print_r($emapData);
					//It wiil insert a row to our subject table from our csv file`
					$sql = "INSERT into `candidate_exam_mark`(`slno`, `roll_no`, `exam_name`, `secured_mark`) values(NULL,'$emapData[1]', '$exam_name', '$emapData[2]')";
					
					$result = mysqli_query($conn, $sql);
				}
					 if($result )
					{
						$qry_status="INSERT INTO `postexam_status`(`slno`, `exam_name`, `mark_upload_status`) VALUES (NULL, '$exam_name', 'uploaded')";
						$sql_status=mysqli_query($conn, $qry_status);
						if($sql_status)
						{
						header("location:postexm_update_collect_mark.php?msg=success");
						}
					}
					else
					{
					header("location:postexm_update_collect_mark.php?msg=error1");
					}
	         		fclose($file);
	         }
		}
		else
		{
			header("location:postexm_update_collect_mark.php?msg=error2");
		}
	}
	else
	{
	header("location:postexm_update_collect_mark.php?msg=error3");
	}	
}
 //close of connection
			mysqli_close($conn);
ob_clean();
?>