<?php
session_start();
// print_r($_POST);
// print_r($_FILES);
if($_SESSION['email_id']){
	include 'webconfig/config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	$folder="../upload/details/";

$crop_type=$_POST['crop_type'];
$crop_name=$_POST['crop_name'];
$season=$_POST['season'];
$land_type=$_POST['land'];
$Water_type=$_POST['water'];
$method_of_cultivation=$_POST['cultivation'];
$description=$_POST['editor1'];
$date_entry=date('Y-m-d');
	if(!empty($_FILES['image']['name'])){
	 	$file_name=date('y-m-d').date('H:i:s').$_FILES['image']['name'];
	 	if(!empty($_FILES['image']['name'])){
	 		$file_name_1=date('y-m-d').date('H:i:s').$_FILES['image_1']['name'];
	 		move_uploaded_file($_FILES['image_1']['tmp_name'],"$folder".$file_name_1);
	 	}else{
	 		$file_name_1="";
	 	}
	 	if(!empty($_FILES['image']['name'])){
	 		$file_name_2=date('y-m-d').date('H:i:s').$_FILES['image_2']['name'];
	 		move_uploaded_file($_FILES['image_2']['tmp_name'],"$folder".$file_name_2);
	 	}else{
	 		$file_name_2="";
	 	}
 
		if(move_uploaded_file($_FILES['image']['tmp_name'],"$folder".$file_name)){
			echo $check="SELECT * FROM `detail_php` WHERE `crop_type`='$crop_type' and  `crop_name`='$crop_name' and  `season`='$season' and  `land_type`='$land_type' and  `Water_type`='$Water_type' and  `method_of_cultivation`='$method_of_cultivation'";
			$check_sql_exe=mysqli_query($conn,$check);
			$num_check=mysqli_num_rows($check_sql_exe);
 			if ($num_check==0){

	 			 $insert="INSERT INTO `detail_php`(`crop_type`, `crop_name`, `season`, `land_type`, `Water_type`, `method_of_cultivation`, `description`,`image_file_name`,`date_entry`,`image_file_name_two`, `image_file_name_three`) VALUES ('$crop_type','$crop_name','$season','$land_type','$Water_type','$method_of_cultivation','$description','$file_name','$date_entry','$file_name_1','$file_name_2')";

				$insert_exe=mysqli_query($conn,$insert);
				if($insert_exe){
				 	$msg->success("SuccessFully add");
				 	header("Location:detail.php");
				 	exit;
				}else{
					$msg->error("Some thing went worng please try again");
					header("Location:detail.php");
					exit;
				}
			}else{
				$msg->error("It Is Already In Our Record");
				header("Location:detail.php");
				exit;
			}
			$error=$_FILES['file_ing_sub']['error'];
 			switch ($error) {
 				case '1':
 					$error_id="Value: 1; The uploaded file exceeds the upload_max_filesize directive";
 					break;
 				case '2':
 					$error_id="Value: 2; The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form. ";
 					break;
 				case '3':
 					$error_id="Value: 3; The uploaded file was only partially uploaded. ";
 					break;
 				case '6':
 					$error_id="Value: 6; Missing a temporary folder";
 					break;
 				case '4':
 					$error_id="Value: 4; No file was uploaded. ";
 					break;
 				case '7':
 					$error_id="Value: 7; Failed to write file to disk.";
 					break;
 				case '8':
 					$error_id="Value: 8; A extension stopped the file upload, does not provide a way to ascertain which extension caused the file upload to stop;";
 					break;
 				default:
 					$error_id="some thing fail find";
 					break;
 			}
 			$msg->error('Image File Unable Upload Please Contact Administrator following Error is "'.$error_id.'"');
 			header("Location:detail.php");
 				exit;
 		}

 	}else{
 		$msg->error('Please Attach Image File To upload');
 			header("Location:detail.php");
 				exit;
 		
 	}

 }else{
 	header('Location:logout_time_out.php');
	exit;
 }