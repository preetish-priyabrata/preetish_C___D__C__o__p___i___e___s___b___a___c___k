<?php
error_reporting(E_ALL);
session_start();
// ob_start();
if($_SESSION['email']){
	require 'FlashMessages.php';
	include '../config.php';
	$msg = new \Preetish\FlashMessages\FlashMessages();
    // print_r($_POST);
    // print_r($_FILES);
	//$file_name=date('y-m-d').date('H:i:s').$_FILES['img']['name'];
	//exit();
	$title=trim($_POST['title']);
	$email=$_SESSION['email'];
	$date=date('Y-m-d');
	$time=date('H:i:s');   
	// $sharing_info_id=$_POST['$last_id'];
	$dest="../uploads/gallery/";
	$dest1="../uploads/gallery_big/";
	if(!empty($_FILES['img']['name'])){
		$files=$_FILES['img']['name'];
		 $file_name=date('y-m-d').date('H:i:s').$files;
		 	$file = $_FILES['img']['tmp_name']; 
			$source_properties = getimagesize($file);
			$image_type = $source_properties[2]; 
			if( $image_type == IMAGETYPE_JPEG ) {   
				$image_resource_id = imagecreatefromjpeg($file);  
				$target_layer = fn_resize($image_resource_id,$source_properties[0],$source_properties[1]);
				$image=imagejpeg($target_layer,"$dest".date('y-m-d').date('H:i:s').$files. "_thump.jpg");
				$ids=date('y-m-d').date('H:i:s').$files. "_thump.jpg";
			}elseif( $image_type == IMAGETYPE_GIF )  {  
				$image_resource_id = imagecreatefromgif($file);
				$target_layer = fn_resize($image_resource_id,$source_properties[0],$source_properties[1]);
				$image=imagegif($target_layer,"$dest".date('y-m-d').date('H:i:s').$files. "_thump.gif");
				$ids=date('y-m-d').date('H:i:s').$files. "_thump.gif";

			}elseif( $image_type == IMAGETYPE_PNG ) {
				$image_resource_id = imagecreatefrompng($file); 
				$target_layer = fn_resize($image_resource_id,$source_properties[0],$source_properties[1]);
				$image=imagepng($target_layer,"$dest".date('y-m-d').date('H:i:s').$files . "_thump.png");
				$ids=date('y-m-d').date('H:i:s').$files. "_thump.png";
			}else{
				$msg->error('Sorry This not Photo File');
				header('Location:alumni_dashboard.php');
				exit();
			}
			// exit;
		
			if($image=="1"){
				if(move_uploaded_file($file,"$dest1".$file_name)){
			
				$query_student1="INSERT INTO `user_gallery_upload`(`sl_no`, `title`, `photo`,`thumb`, `date`, `time`, `user_id`) VALUES (NULL,'$title','$file_name','$ids','$date','$time','$email')";
				$sql_exe1=mysqli_query($conn,$query_student1);
				// echo mysqli_error($conn);
				// exit();
				$msg->success('Photo Sent Successfull');
				header('Location:alumni_dashboard.php');
				exit();
			}else{
				$msg->error('Some Error Is found');
				header('Location:alumni_dashboard.php');
				exit();
			}
		}else{
	       $msg->error('Some Error Is found');
			header('Location:alumni_dashboard.php');
			exit();
		}	
		
	}else{
		$msg->error('Photo Or File Is Not matched');
		header('Location:alumni_dashboard.php');
		exit();
	}

}else{
	header('Location:logout.php');
	exit;
 }
function fn_resize($image_resource_id,$width,$height) {
$target_width =150;
$target_height =200;
$target_layer=imagecreatetruecolor($target_width,$target_height);
imagecopyresampled($target_layer,$image_resource_id,0,0,0,0,$target_width,$target_height, $width,$height);
return $target_layer;
}
 ?>