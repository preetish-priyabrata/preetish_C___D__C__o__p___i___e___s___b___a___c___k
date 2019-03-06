<?php
// s
session_start();
	if($_SESSION['admin_preexam']){
		require 'FlashMessages.php';
		require '../config.php';
		 $msg = new \Preetish\FlashMessages\FlashMessages();
// Array ( [id] => 1 [token] => 1 [type] => group ) 
// 
		$type=trim($_GET['type']);
		switch ($type) {
			case 'group':
				
				$id=$_GET['id'];
				$token=$_GET['token'];
				if($id=='1'){
					$update ="UPDATE `ilab_exam_group_assign_class` SET `status`='2' WHERE `group_slno` ='$token';";
					$update .="UPDATE `ilab_exam_group` SET `status`='2' WHERE`slno_group`='$token';";
					$update .="UPDATE `ilab_exam_group_assign_post` SET `status`='2' where `group_slno`='$token'";
					mysqli_multi_query($conn,$update);
					$msg->success('Successfull Group Is Now closed To start Roll No Generation');	
					header("location:admin_group_view");
					exit;
				}
				$msg->error('something went wrong');	
					header("location:admin_group_view");
					exit;
				break;

		   case 'centre':
				
				$id=$_GET['id'];
				$token=$_GET['token'];
				if($id=='1'){
					$update1="UPDATE `ilab_exam_center` SET `status_exam`='2' WHERE `slno_exam`='$token'";
					$update1_exe=mysqli_query($conn,$update1);

					$msg->success('This centre has been de-activated successfully ');	
					header("location:admin_exam_view");
					exit;
				}
				else{
					$update1="UPDATE `ilab_exam_center` SET `status_exam`='1' WHERE `slno_exam`='$token'";
					$update1_exe=mysqli_query($conn,$update1);

					$msg->success('This centre has been activated successfully ');	
					header("location:admin_exam_view");
					exit;
				}
				$msg->error('something went wrong');	
					header("location:admin_exam_view");
					exit;
				break;
			
			default:
				# code...
				break;
		}

	}else{
		header('Location:logout');
		exit;
	}

?>