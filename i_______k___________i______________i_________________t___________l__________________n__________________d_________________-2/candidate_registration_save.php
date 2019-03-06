<?php
session_start();
include 'admin_final/config.php';
require 'admin_final/FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
// Array ( [email] => PPRIYAB@ILAB.COM [First_name] => PREETISH [Middle_name] => [Last_name] => PRIYABRATA [gender] => M [Birth] => 11/08/2017 [Mobile] => 2222222 [Alternative] => 2222 [landlineNo] => 22 [City] => BBSR [District] => KHORDA [State] => EEE [Morning_FROM] => 07:33AM [Morning_TO] => 08:35AM [Evenging_FROM] => 07:26PM [Evenging_TO] => 08:45PM [College] => TEQWW [Board] => ERER [pass_year] => UIIIIU [Academic] => 1 [Branch] => 1 [10th_Marks] => 3323 [10_specialization] => All [10th_pass_year] => 2013 [school_name] => 2WWE [ITI_marks] => 4567 [ITI_specializaton] => 4 [ITI_pass_year] => 2017 [ITI_school_name] => EEEE [ITI_Board] => EEEE [Diploma_Marks] => [Diploma_Specialization] => [diploma_pass_year] => [diploma_school_name] => [diploma_board] => [Toatal_Experience] => 4 [exp_summery] => Online IT Test To Measure PHP programming Skills - Validated and Reliable ... Mettl's PHP Assessment helps companies screening potential hires by assessing [secure_hash_p] => +I1Q6JdGwYfuBjzaBfc4sId2Ddd0uVbPMKggE1u8Llk= [submit] => Submit ) Array ( [c_photo] => Array ( [name] => sidebar-4.jpg [type] => image/jpeg [tmp_name] => /tmp/phpH4dD1X [error] => 0 [size] => 386464 ) [attach_Id] => Array ( [name] => wearable.png [type] => image/png [tmp_name] => /tmp/phpPSku4d [error] => 0 [size] => 79406 ) [10th_attach_file] => Array ( [name] => login.jpeg [type] => image/jpeg [tmp_name] => /tmp/phpeGHo7t [error] => 0 [size] => 547677 ) [Attach_ITI_Marks] => Array ( [name] => sidebar-3.jpg [type] => image/jpeg [tmp_name] => /tmp/php3lYzaK [error] => 0 [size] => 377600 ) [diploma_attach_file] => Array ( [name] => [type] => [tmp_name] => [error] => 4 [size] => 0 ) )


$secure_hash_p=$_POST['secure_hash_p'];

// $c_photo=$_FILES['c_photo']['name'];
// $attach_Id=$_FILES['attach_Id']['name'];
// $TEN_10th_attach_file=$_FILES['10th_attach_file']['name'];
// $Attach_ITI_Marks=$_FILES['Attach_ITI_Marks']['name'];
// $diploma_attach_file=$_FILES['diploma_attach_file']['name'];

// Check if the form was submitted
// if($_SERVER["REQUEST_METHOD"] == "POST"){
//     // Check if file was uploaded without errors
//     if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
//         $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
//         $filename = $_FILES["photo"]["name"];
//         $filetype = $_FILES["photo"]["type"];
//         $filesize = $_FILES["photo"]["size"];
    
//         // Verify file extension
//         $ext = pathinfo($filename, PATHINFO_EXTENSION);
//         if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
//         // Verify file size - 5MB maximum
//         $maxsize = 5 * 1024 * 1024;
//         if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
//         // Verify MYME type of the file
//         if(in_array($filetype, $allowed)){
//             // Check whether file exists before uploading it
//             if(file_exists("upload/" . $_FILES["photo"]["name"])){
//                 echo $_FILES["photo"]["name"] . " is already exists.";
//             } else{
//                 move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/" . $_FILES["photo"]["name"]);
//                 echo "Your file was uploaded successfully.";
//             } 
//         } else{
//             echo "Error: There was a problem uploading your file. Please try again."; 
//         }
//     } else{
//         echo "Error: " . $_FILES["photo"]["error"];
//     }
// }

//profile picture
		 $dest="upload/open_photo/";
        if(!empty($_FILES['c_photo']['name'])){
             $file_name=date('Y-m-d').date('H:i:s').$_FILES['c_photo']['name'];
            if(move_uploaded_file($_FILES['c_photo']['tmp_name'],"$dest".$file_name)){
            	$c_photo=$file_name;
            }else{
            	$msg->error('File Unable To Upload');
                 // header('Location:banner_add.php');
                 // exit;
                 $c_photo="";
            }
        }else{
        	 $c_photo="";
        }
       // ATTACHED_ID
        $dest="upload/ATTACHED_ID/";
        if(!empty($_FILES['attach_Id']['name'])){
             $file_name=date('Y-m-d').date('H:i:s').$_FILES['attach_Id']['name'];
            if(move_uploaded_file($_FILES['attach_Id']['tmp_name'],"$dest".$file_name)){
            	$attach_Id=$file_name;
            }else{
            	$msg->error('File Unable To Upload');
                 // header('Location:banner_add.php');
                 // exit;
                 $attach_Id="";
            }
        }else{
        	 $attach_Id="";
        }
        // TEN_10th_attach_file
        $dest="upload/TEN_CERTIFICATE/";
        if(!empty($_FILES['10th_attach_file']['name'])){
             $file_name=date('Y-m-d').date('H:i:s').$_FILES['10th_attach_file']['name'];
            if(move_uploaded_file($_FILES['10th_attach_file']['tmp_name'],"$dest".$file_name)){
            	$TEN_10th_attach_file=$file_name;
            }else{
            	$msg->error('File Unable To Upload');
                 // header('Location:banner_add.php');
                 // exit;
                 $TEN_10th_attach_file="";
            }
        }else{
        	 $TEN_10th_attach_file="";
        }
        // ITI_CERTIFICATE
        $dest="upload/ITI_CERTIFICATE/";
        if(!empty($_FILES['Attach_ITI_Marks']['name'])){
             $file_name=date('Y-m-d').date('H:i:s').$_FILES['Attach_ITI_Marks']['name'];
            if(move_uploaded_file($_FILES['Attach_ITI_Marks']['tmp_name'],"$dest".$file_name)){
            	$Attach_ITI_Marks=$file_name;
            }else{
            	$msg->error('File Unable To Upload');
                 // header('Location:banner_add.php');
                 // exit;
                 $Attach_ITI_Marks="";
            }
        }else{
        	 $Attach_ITI_Marks="";
        }
        // DIPLOMA_CERTIFICATE
        $dest="upload/DIPLOMA_CERTIFICATE/";
        if(!empty($_FILES['diploma_attach_file']['name'])){
             $file_name=date('Y-m-d').date('H:i:s').$_FILES['diploma_attach_file']['name'];
            if(move_uploaded_file($_FILES['diploma_attach_file']['tmp_name'],"$dest".$file_name)){
            	$diploma_attach_file=$file_name;
            }else{
            	$msg->error('File Unable To Upload');
                 // header('Location:banner_add.php');
                 // exit;
                 $diploma_attach_file="";
            }
        }else{
        	 $diploma_attach_file="";
        }
        $email=$_POST['email'];
		$First_name=$_POST['First_name'];
		$Middle_name=$_POST['Middle_name'];
		$Last_name=$_POST['Last_name'];
		$gender=$_POST['gender'];
		$Birth=date('Y-m-d',strtotime(trim($_POST['Birth'])));
		$Mobile=$_POST['Mobile'];
		$Alternative=$_POST['Alternative'];
		$landlineNo=$_POST['landlineNo'];
		$City=$_POST['City'];
		$District=$_POST['District'];
		$State=$_POST['State'];

		// $Morning_FROM=date('H:i:s',strtotime(trim($_POST['Morning_FROM'])));
		// $Morning_TO=date('H:i:s',strtotime(trim($_POST['Morning_TO'])));
		$Evenging_FROM=$_POST['Evenging_FROM'];
		$Evenging_TO=$_POST['Evenging_TO'];
		$Morning_FROM=['Morning_FROM'];
		$Morning_TO=$_POST['Morning_TO'];

		$College=$_POST['College'];
		$Board=$_POST['Board'];
		$pass_year=$_POST['pass_year'];
		$Academic=$_POST['Academic'];
		$Branch=$_POST['Branch'];

		$TEN_10th_Marks=$_POST['10th_Marks'];
		$TEN_10_specialization=$_POST['10_specialization'];
		$TEN_10th_pass_year=$_POST['10th_pass_year'];
		$school_name=$_POST['school_name'];
		$Board_10=$_POST['Board_10'];

		$ITI_marks=$_POST['ITI_marks'];
		$ITI_specializaton=$_POST['ITI_specializaton'];
		$ITI_pass_year=$_POST['ITI_pass_year'];
		$ITI_school_name=$_POST['ITI_school_name'];
		$ITI_Board=$_POST['ITI_Board'];

		$Diploma_Marks=$_POST['Diploma_Marks'];
		$Diploma_Specialization=$_POST['Diploma_Specialization'];
		$diploma_pass_year=$_POST['diploma_pass_year'];
		$diploma_school_name=$_POST['diploma_school_name'];
		$diploma_board=$_POST['diploma_board'];

		$Toatal_Experience=$_POST['Toatal_Experience'];
		$exp_summery=$_POST['exp_summery'];

        $oldpassword=mt_rand();
		$oldpassword_hash = md5($oldpassword);
		$oldpassword_hash_id = $oldpassword;
		$date=date('Y-m-d');
		$time=date('H:i:s');

		$prefered_mng_time=$Morning_FROM.'-'.$Morning_TO;
		$prefered_eveng_time=$Evenging_FROM."-".$Evenging_TO;

		$check="SELECT * FROM `kiit_stud_login` WHERE `email`='$email'";
		$sql_check=mysqli_query($conn,$check);
		$num=mysqli_num_rows($sql_check);
		if($num==0){
			$name_user=$First_name." ".$Middle_name." ".$Last_name;
	        $login="INSERT INTO `kiit_stud_login`(`L_sl_no`, `password`, `name`, `email`, `mobile_no`, `stream`, `branch`, `user_login_status`, `date`, `time`) VALUES (Null,'$oldpassword_hash_id','$name_user','$email','$Mobile','$Academic','$Branch','0','$date','$time')";
	        $sql_login=mysqli_query($conn,$login);
            // echo mysqli_error($conn);
            // exit;
	        $last_id = mysqli_insert_id($conn);
	        $l_id="Kiit_".date('Y-m-d')."_".$last_id;
	        $update_login="UPDATE `kiit_stud_login` SET `L_user_id`='$l_id' WHERE `L_sl_no`='last_id'";
	        $sql_login=mysqli_query($conn,$update_login);

	        $query_personal="INSERT INTO `kiit_stud_personal_details`(`P_sl_no`, `P_userid`, `first_name`, `middle_name`, `last_name`, `gender`, `dob`, `user_photo`, `mobile_no`, `landline_no`, `alter_no`, `email`, `city`, `district`, `state`, `prefered_mng_time`, `prefered_eveng_time`, `date`, `time`, `status`) VALUES (Null,'$l_id','$First_name','$Middle_name','$Last_name','$gender','$Birth','$c_photo','$Mobile','$landlineNo','$Alternative','$email','$City','$District','$State','$prefered_mng_time','$prefered_eveng_time','$date','$time','1')";

	        $sql_personal=mysqli_query($conn,$query_personal);

	       $query_mark="INSERT INTO `kiit_stud_marks`(`M_slno`, `M_user_id`, `10th_marks`, `10th_pass_year`, `1oth_school_name`, `1oth_board`, `attach_1oth_marks`, `ITI_marks`, `ITI_pass_year`, `ITI_school_name`, `ITI_specialization`, `ITI_Board`, `attach_ITI_marks`, `diploma_marks`, `diploma_pass_year`, `diploma_school_name`, `diploma_board`, `attach_diploma_marks`, `diploma_specialization`, `date`, `time`, `status`) VALUES (Null,'$l_id','$TEN_10th_Marks','$TEN_10th_pass_year','$school_name','$Board_10','$TEN_10th_attach_file','$ITI_marks','$ITI_pass_year','$ITI_school_name','$ITI_specializaton','$ITI_Board','$Attach_ITI_Marks','$Diploma_Marks','$diploma_pass_year','$diploma_school_name','$diploma_board','$diploma_attach_file','$Diploma_Specialization','$date','$time','1')";

	        $sql_mark=mysqli_query($conn,$query_mark);

	        $query_work="INSERT INTO `kiit_stud_work_exp`(`w_slno`, `w_user_id`, `total_exp`, `exp_summery`,  `date`, `time`, `status`) VALUES (Null,'$l_id','$Toatal_Experience','$exp_summery','$date','$time','1')";
	        $sql_work=mysqli_query($conn,$query_work);

	        $query_academy="INSERT INTO `Kiit_stud_academy`(`A_slno`, `A_user_id`, `academic`, `specialization`, `college_name`, `branch`, `pass_year`, `board`, `attach_id`, `date`, `time`, `status`) VALUES (Null,'$l_id','$Academic','$Branch','$pass_year','$Branch','$attach_Id','$date','$time','1')";

	        $msg->success('Success-Fully Registered All detail Information  will be send to your mail id post  admin approval to ');
            header("location:candidate_registration.php");
            exit;
	        
	    }else{

	    	$msg->error('User Mail Id is already In our record');
	    	header('Location:candidate_registration.php');
            exit;
	    }
