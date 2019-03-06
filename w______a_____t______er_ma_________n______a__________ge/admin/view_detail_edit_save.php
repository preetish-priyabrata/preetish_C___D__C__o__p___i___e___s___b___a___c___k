<?php
//print_r($_POST);
//print_r($_FILES);


// Array ( [crop_type] => agri0011 [crop_name] => crop0011 [season] => session0012 [land] => land0011 [water] => water0011 [editor1] =>

// Transplanted Rice
// ) Array ( [image] => Array ( [name] => cPanel - Addon Domains 2015-08-31 12-15-57.png [type] => [tmp_name] => [error] => 3 [size] => 0 ) ) 
?>
<?php
session_start();
// print_r($_POST);
// print_r($_FILES);
if($_SESSION['email_id']){
	include 'webconfig/config.php';
	require 'FlashMessages.php';
 	$msg = new \Preetish\FlashMessages\FlashMessages();
 	$folder="../upload/details/";
$sl_num_id=$_POST['sl_num_id'];
$crop_type=$_POST['crop_type'];
$crop_name=$_POST['crop_name'];
$season=$_POST['season'];
$land_type=$_POST['land'];
$Water_type=$_POST['water'];
$method_of_cultivation=$_POST['cultivation'];
$description=$_POST['editor1'];
$date_entry=date('Y-m-d');
	
 		$check="SELECT * FROM `detail_php` WHERE `crop_type`='$crop_type' and  `crop_name`='$crop_name' and  `season`='$season' and  `land_type`='$land_type' and  `Water_type`='$Water_type' and  `method_of_cultivation`='$method_of_cultivation' ";
			$check_sql_exe=mysqli_query($conn,$check);
			$num_check=mysqli_num_rows($check_sql_exe);
 			if ($num_check==0){

	 			$insert="UPDATE `detail_php` SET  `crop_type`='$crop_type' ,  `crop_name`='$crop_name' ,  `season`='$season' ,  `land_type`='$land_type' ,  `Water_type`='$Water_type' ,  `method_of_cultivation`='$method_of_cultivation' ,`description`='$description' WHERE `sl_num`='$sl_num_id'";

				$insert_exe=mysqli_query($conn,$insert);
				if($insert_exe){
					if(!empty($_FILES['image']['name'])){
	 					$file_name=date('y-m-d').date('H:i:s').$_FILES['image']['name'];
 
						if(move_uploaded_file($_FILES['image']['tmp_name'],"$folder".$file_name)){
							 $image="UPDATE `detail_php` SET  `image_file_name`='$file_name' WHERE `sl_num`='$sl_num_id'";
							 $image_exe=mysqli_query($conn,$image);
							  if($image_exe){
							 	$msg->success("SuccessFully add");
							 }else{
							 	$error=$_FILES['image_1']['error'];
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
 								$msg->error('Image 1 File Unable Upload Please Contact Administrator following Error is "'.$error_id.'"');
							 }
						}
					}
					if(!empty($_FILES['image_1']['name'])){
	 					$file_name_1=date('y-m-d').date('H:i:s').$_FILES['image_1']['name'];
 
						if(move_uploaded_file($_FILES['image_1']['tmp_name'],"$folder".$file_name_1)){
							 $image_1="UPDATE `detail_php` SET  `image_file_name_two`='$file_name_1' WHERE `sl_num`='$sl_num_id'";
							 $image_1_exe=mysqli_query($conn,$image_1);
							  if($image_1_exe){
							 	$msg->success("SuccessFully add");
							 }else{
							 	$error=$_FILES['image_1']['error'];
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
 								$msg->error('Image 2 File Unable Upload Please Contact Administrator following Error is "'.$error_id.'"');
							 }
						}
					}
					if(!empty($_FILES['image_2']['name'])){
	 					$file_name_2=date('y-m-d').date('H:i:s').$_FILES['image_2']['name'];
 
						if(move_uploaded_file($_FILES['image_2']['tmp_name'],"$folder".$file_name_2)){
							 $image_2="UPDATE `detail_php` SET  `image_file_name_three`='$file_name_2' WHERE `sl_num`='$sl_num_id'";
							 $image_2_exe=mysqli_query($conn,$image_2);
							 if($image_2_exe){
							 	$msg->success("SuccessFully add");
							 }else{
							 	$error=$_FILES['image_2']['error'];
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
 								$msg->error('Image 3 File Unable Upload Please Contact Administrator following Error is "'.$error_id.'"');
							 }
						}
					}
				 	$msg->success("SuccessFully add");
				 	header("Location:admin_dashboard.php");
				 	exit;
				 	$msg->success("SuccessFully add");
				 	header("Location:admin_dashboard.php");
				 	exit;
				}else{
					$msg->error("Some thing went worng please try again");
					header("Location:admin_dashboard.php");
					exit;
				}
			}else if ($num_check==1){
				$fetch_get_details=mysqli_fetch_assoc($check_sql_exe);
				$sl_id=$fetch_get_details['sl_num'];
				if($sl_id==$sl_num_id){
					$insert="UPDATE `detail_php` SET  `crop_type`='$crop_type' ,  `crop_name`='$crop_name' ,  `season`='$season' ,  `land_type`='$land_type' ,  `Water_type`='$Water_type' ,  `method_of_cultivation`='$method_of_cultivation',`description`='$description' WHERE `sl_num`='$sl_num_id'";

					$insert_exe=mysqli_query($conn,$insert);
				if($insert_exe){
					if(!empty($_FILES['image']['name'])){
	 					$file_name=date('y-m-d').date('H:i:s').$_FILES['image']['name'];
 
						if(move_uploaded_file($_FILES['image']['tmp_name'],"$folder".$file_name)){
							 $image="UPDATE `detail_php` SET  `image_file_name`='$file_name' WHERE `sl_num`='$sl_num_id'";
							 $image_exe=mysqli_query($conn,$image);
							  if($image_exe){
							 	$msg->success("SuccessFully add");
							 }else{
							 	$error=$_FILES['image_1']['error'];
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
 								$msg->error('Image 1 File Unable Upload Please Contact Administrator following Error is "'.$error_id.'"');
							 }
						}
					}
					if(!empty($_FILES['image_1']['name'])){
	 					$file_name_1=date('y-m-d').date('H:i:s').$_FILES['image_1']['name'];
 
						if(move_uploaded_file($_FILES['image_1']['tmp_name'],"$folder".$file_name_1)){
							 $image_1="UPDATE `detail_php` SET  `image_file_name_two`='$file_name_1' WHERE `sl_num`='$sl_num_id'";
							 $image_1_exe=mysqli_query($conn,$image_1);
							  if($image_1_exe){
							 	$msg->success("SuccessFully add");
							 }else{
							 	$error=$_FILES['image_1']['error'];
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
 								$msg->error('Image 2 File Unable Upload Please Contact Administrator following Error is "'.$error_id.'"');
							 }
						}
					}
					if(!empty($_FILES['image_2']['name'])){
	 					$file_name_2=date('y-m-d').date('H:i:s').$_FILES['image_2']['name'];
 
						if(move_uploaded_file($_FILES['image_2']['tmp_name'],"$folder".$file_name_2)){
							 $image_2="UPDATE `detail_php` SET  `image_file_name_three`='$file_name_2' WHERE `sl_num`='$sl_num_id'";
							 $image_2_exe=mysqli_query($conn,$image_2);
							 if($image_2_exe){
							 	$msg->success("SuccessFully add");
							 }else{
							 	$error=$_FILES['image_2']['error'];
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
 								$msg->error('Image 3 File Unable Upload Please Contact Administrator following Error is "'.$error_id.'"');
							 }
						}
					}
				 	$msg->success("SuccessFully add");
				 	header("Location:admin_dashboard.php");
				 	exit;
				}else{
					$msg->error("Some thing went worng please try again");
					header("Location:admin_dashboard.php");
					exit;
				}
				}else{
					$msg->error("It Is Already In Our Record");
					header("Location:admin_dashboard.php");
					exit;	
				}

			}else{
				$msg->error("It Is Already In Our Record");
				header("Location:admin_dashboard.php");
				exit;
			}
 		
 	

 }else{
 	header('Location:logout_time_out.php');
	exit;
 }