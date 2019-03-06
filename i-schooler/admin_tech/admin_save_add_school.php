<?php

session_start();
if($_SESSION['admin_tech']){
	include '../config.php';
	require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();

//  Array
// (
//     [School_name] => 1234567
//     [School_address] => 2213232343y tr ebgb be vva  
//     [web_site] => http://www.google.com
//     [Location_name] => sdjljo js j
//     [Contact_no] => 067425934712
//     [contact_person] => sipra hota
//     [email_id] => siprah@innovadorslab.com
//     [add_new_app] => Save
// )
// Array
// (
//     [photo] => Array
//         (
//             [name] => 1.jpg
//             [type] => image/jpeg
//             [tmp_name] => /tmp/phpEjbRn6
//             [error] => 0
//             [size] => 57305
//         )

// )
// 
// 
//print_r($_FILES);
		$School_name=trim($_POST['School_name']);
		$School_address=trim($_POST['School_address']);
		$web_site=trim($_POST['web_site']);
		$Location_name=trim($_POST['Location_name']);
		$Contact_no=trim($_POST['Contact_no']);
		$contact_person=trim($_POST['contact_person']);
		$email_id=trim($_POST['email_id']);
		$targetDir = "../assert/upload/school_logo";
		if($_POST['add_new_app']=='Save'){
			if(is_array($_FILES)) {

				if(is_uploaded_file($_FILES['photo']['tmp_name'])) {

					$photo=date('Y-m-d').$_FILES['photo']['name'];

					if(move_uploaded_file($_FILES['photo']['tmp_name'],"$targetDir/".$photo)) {
						
						$insert="INSERT INTO `manage_school_details`(`slno`, `school_name`, `school_contact`, `school_address`, `location_name`, `school_website`, `school_logo`,`contact_person`,`contact_email`) VALUES (NULL,'$School_name','$Contact_no','$School_address','$Location_name','$web_site','$photo','contact_person','$email_id')";
						$personal=mysqli_query($conn, $insert);       
	        			$last_id=mysqli_insert_id($conn); 
	        			$school_id="inn_eschool0".$last_id;
	        			if($personal){
	        				$update="UPDATE `manage_school_details` SET `school_id`='$school_id' WHERE `slno`='$last_id'";
	        				$mys_update=mysqli_query($conn, $update);
	        				if($mys_update){
	        					$msg->success(' School Detail Is Added To Record');
	    						header('Location:admin_school.php');
	    						exit;	
	        				}else{
	        					$msg->error(' Please Contact Mantaince1 !!!');
	    						header('Location:admin_add_school.php');
	    						exit;	
	        				}
	        			}else{
	        				$msg->error(' Please Contact Mantaince !!!');
	    					header('Location:admin_add_school.php');
	    					exit;
	        			}
						
					}else{
						
						$msg->error(' File Path Is Not Found Please Contact Mantaince !!!');
	    				header('Location:admin_add_school.php');
	    				exit;
					}
				}else{
					$msg->error('Server Is Down Please Try Again !!!');
					header('Location:admin_add_school.php');
					exit;
				}
			}else{
				$msg->error(' File Is not Be Selected !!!');
	    		header('Location:admin_add_school.php');
	    		exit;
			}
		}else{

		}


}else{
	
    header('Location:logout.php');
    exit;
}