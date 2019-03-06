<?php
session_start();
// print_r($_POST);
// print_r($_FILES);
// exit;
if($_SESSION['email_id']){
	// Array ( [sub_menu_agri] => Cereal [Save] => Submit Query ) Array ( [file_ing_sub] => Array ( [name] => 1483282971.jpg [type] => image/jpeg [tmp_name] => /tmp/phpz8qA2x [error] => 0 [size] => 261205 ) ) 
	include 'webconfig/config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	
 	$folder="../upload/sub_menu_image/";


	$sub_menu_name=strtolower($_POST['sub_menu_agri']);
	
	$Date= date("Y-m-d");
	$Time=date('H:i:s');
	// $sub_menu_id=$_POST['sub_menu_id'];
	$main_id=1;
	
	if(!empty($_FILES['file_ing_sub']['name'])){
	 	$file_name=date('y-m-d').date('H:i:s').$_FILES['file_ing_sub']['name'];
 
		if(move_uploaded_file($_FILES['file_ing_sub']['tmp_name'],"$folder".$file_name)){

			$check_query= "SELECT * FROM `ilab_water_sub_menu` WHERE`sub_menu_name`='$sub_menu_name'";


			$check_sql_exe=mysqli_query($conn,$check_query);

			$num_check=mysqli_num_rows($check_sql_exe);
 			if ($num_check==0){

				 $insert="INSERT INTO `ilab_water_sub_menu`(`sub_menu_name`, `image_file_name`, `Date`, `time`,  `main_id`) VALUES ('$sub_menu_name','$file_name','$Date','$Time','$main_id')";
 				$insert_exe=mysqli_query($conn,$insert);

 				$sl_num=$last_id=mysqli_insert_id($conn);

 				$sub_menu_id="agri001".$last_id;

 				$update_query="UPDATE `ilab_water_sub_menu` SET `sub_menu_id`='$sub_menu_id' where `sl_num`='$sl_num'";
 				$update_exe=mysqli_query($conn,$update_query);

 				if($insert_exe){
 					$msg->success("SuccessFully Sub-menu Added To Agriculture " .$sub_menu_name);
 					header("Location:admin_new_sub_menu.php");
 					exit;
 				}else{
 					$msg->error("Some thing went worng please try again");
 					header("Location:admin_new_sub_menu.php");
 					exit;
 				}


 			}else{
 				$msg->error($sub_menu_name.' This Agriculture Sub menu is present in our record ');
 				header("Location:admin_new_sub_menu.php");
 				exit;
 			}
 		}else{
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
 			header("Location:admin_new_sub_menu.php");
 				exit;
 		}

 	}else{
 		$msg->error('Please Attach Image File To upload');
 			header("Location:admin_new_sub_menu.php");
 				exit;
 		
 	}

 }else{
 	header('Location:logout_time_out.php');
	exit;
 }
